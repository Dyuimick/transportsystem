<?php

namespace App\Tests;

use App\Model\Engine\ElectricEngine;
use App\Model\Engine\EngineInterface;
use App\Model\Engine\GasEngine;
use App\Model\Stop;
use App\Model\Transport\AbstractTransport;
use App\Model\Transport\Tram;
use PHPUnit\Framework\TestCase;

class TramTest extends TestCase {

    protected $tram;

    public function setUp() : void{
        $stopMock = $this->createMock(Stop::class);
        $this->tram = new Tram('AA33', $stopMock);
    }

    public function testCanGetNumber()
    {
        $this->assertEquals('AA33', $this->tram->getNumber());
    }

    public function testCanGetCurrentStop()
    {
        $this->assertInstanceOf(Stop::class, $this->tram->getCurrentStop());
    }

    public function testCanSetCurrentStop()
    {
        $stop = new Stop('Test2',15,30);
        $result = $this->tram->setCurrentStop($stop);
        $this->assertInstanceOf(AbstractTransport::class, $result);
        $this->assertInstanceOf(Stop::class, $this->tram->getCurrentStop());
    }

    public function testCanSetCarriages(){
        $this->tram->setCarriages(25);
        $this->assertEquals(25, $this->tram->carriageCount);
    }

    public function testCanGetCarriages()
    {
        $this->tram->setCarriages(13);
        $this->assertEquals(13, $this->tram->getCarriages());
    }

    public function testCanGetEngine()
    {
        $this->assertEquals(new ElectricEngine(), $this->tram->getEngine());
    }

    public function testCanSetEngine()
    {
        $engineMock = $this->createMock(GasEngine::class);
        $this->tram->setEngine($engineMock);

        $this->assertInstanceOf(EngineInterface::class, $this->tram->getEngine());
    }

    public function testCanStartStop()
    {
        $engineMock = $this->createMock(ElectricEngine::class);
        $engineMock->expects($this->once())->method('start');

        $this->tram->setEngine($engineMock);
        $this->tram->start();

        $engineMock->expects($this->once())->method('stop');
        $this->tram->stop();
    }

    public function testCanMoveTo()
    {
        $stop = new Stop('TestStop2', 15,20);

        $this->tram->moveTo($stop);

        $this->assertInstanceOf(Stop::class, $this->tram->getCurrentStop());
        $this->assertEquals($stop,$this->tram->getCurrentStop());
    }
}