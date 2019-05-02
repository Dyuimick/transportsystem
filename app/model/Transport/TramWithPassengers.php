<?php

namespace App\Model\Transport;

use App\Model\Stop;

class TramWithPassengers extends Tram {

    use PassengersTrait;

    const MAX_PASSENGERS_PER_CARRIAGE = 10;

    /**
     * TramWithPassengers constructor.
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
            ->passengersOut($this->getCurrentStop())
            ->passengersIn($this->getCurrentStop());

        return $this;
    }
}