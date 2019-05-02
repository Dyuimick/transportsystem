<?php

namespace App\Model\Transport;

use App\Model\Engine\EngineInterface;
use App\Model\
{
    Stop, LoggerTrait
};

abstract class AbstractTransport {

    use LoggerTrait;

    protected $engine;
    public $number;
    protected $currentStop;

    public function __construct(string $number, EngineInterface $engine, Stop $currentStop)
    {
        $this->setNumber($number)->setEngine($engine)->setCurrentStop($currentStop);
    }

    abstract public function moveTo(Stop $stop);

    abstract public function start();

    abstract public function stop();

    abstract public function action();

    /**
     * @param string $number
     * @return AbstractTransport
     */
    public function setNumber(string $number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param Stop $stop
     * @return AbstractTransport
     */
    public function setCurrentStop(Stop $stop)
    {
        $this->currentStop = $stop;

        return $this;
    }

    /**
     * @return Stop
     */
    public function getCurrentStop()
    {
        return $this->currentStop;
    }

    /**
     * @param EngineInterface $engine
     * @return AbstractTransport
     */
    public function setEngine(EngineInterface $engine)
    {
        $this->engine = $engine;

        return $this;
    }

    /**
     * @return EngineInterface
     */
    public function getEngine()
    {
        return $this->engine;
    }
}