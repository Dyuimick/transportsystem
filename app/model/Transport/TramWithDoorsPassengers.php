<?php

namespace App\Model\Transport;

use App\Model\Stop;

class TramWithDoorsPassengers extends Tram {

    use PassengersTrait, DoorsTrait;

    const MAX_PASSENGERS_PER_CARRIAGE = 15;

    /**
     * TramWithDoorsPassengers constructor.
     * @param string $number
     * @param int $carriageCount
     * @param Stop $currentStop
     */
    public function __construct(string $number, int $carriageCount, Stop $currentStop)
    {
        parent::__construct($number, $currentStop);

        $this->setCarriages($carriageCount);
    }

    /**
     * @param $count
     * @return Tram
     */
    public function setCarriages(int $count)
    {
        parent::setCarriages($count);
        $this->setMaxPassengers();

        return $this;
    }

    /**
     * @return Tram
     */
    protected function setMaxPassengers()
    {
        $this->maxPassengers = $this->getCarriages() * static::MAX_PASSENGERS_PER_CARRIAGE;

        return $this;
    }

    /**
     * @return $this
     */
    public function action()
    {
        $this
            ->openDoors()
            ->passengersOut($this->getCurrentStop())
            ->passengersIn($this->getCurrentStop())
            ->closeDoors();

        return $this;
    }
}