<?php

namespace App\Model\Transport;

use App\Model\Engine\ElectricEngine;
use App\Model\Stop;

class Tram extends AbstractTransport {

    public $carriageCount;

    /**
     * Tram constructor.
     * @param string $number
     * @param Stop $currentStop
     */
    public function __construct(string $number, Stop $currentStop)
    {
        parent::__construct($number, new ElectricEngine(), $currentStop);

        $this->setCarriages(1);
    }

    /**
     * @param int $count
     * @return Tram
     */
    protected function setCarriages(int $count)
    {
        $this->carriageCount = $count;

        return $this;
    }

    /**
     * @return int
     */
    public function getCarriages()
    {
        return $this->carriageCount;
    }

    /**
     * @return Tram
     */
    public function start()
    {
        $this->getEngine()->start();
        $this->log(sprintf('Start %s Engine', $this->getEngine()->getType()));

        return $this;
    }

    /**
     * @return Tram
     */
    public function stop()
    {
        $this->getEngine()->stop();
        $this->log(sprintf('Stop %s Engine', $this->getEngine()->getType()));

        return $this;
    }

    /**
     * @param Stop $stop
     * @return Tram
     */
    public function moveTo(Stop $stop)
    {
        $this->log(sprintf('Move by rails to %s ', $stop->getName()));
        $this->setCurrentStop($stop);

        return $this;
    }

    /**
     * @return $this
     */
    public function action()
    {
        $this->log(' Doing Nothing ');

        return $this;
    }
}