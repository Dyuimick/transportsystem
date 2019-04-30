<?php

namespace App\Model\Transport;

use App\Model\
{
    LoggerTrait, Stop
};

trait PassengersTrait {

    use LoggerTrait;

    protected $maxPassengers;
    protected $passengersCount = 0;


    abstract protected function setMaxPassengers();

    /**
     * @return int
     */
    public function getMaxPassengers()
    {
        return $this->maxPassengers;
    }

    /**
     * @param int $count
     * @return $this
     */
    private function setPassengersCount(int $count)
    {
        $this->passengersCount = $count;

        return $this;
    }

    /**
     * @return int
     */
    public function getPassengersCount()
    {
        return $this->passengersCount;
    }

    /**
     * @return integer
     */
    public function getFreeSeatsCount()
    {
        return $this->maxPassengers - $this->passengersCount;
    }

    /**
     * @param Stop $stop
     * @return $this
     */
    public function passengersIn(Stop $stop)
    {
        $income = ($stop->getPassengersIn() > $this->getFreeSeatsCount()) ? $stop->passengersToTransport($this->getFreeSeatsCount()) : $stop->passengersToTransport($stop->getPassengersIn());
        $this->setPassengersCount($this->getPassengersCount() + $income);

        $this->log(sprintf('%d Passangers : Station -> Transport', $income));

        return $this;
    }

    /**
     * @param Stop $stop
     * @return $this
     */
    public function passengersOut(Stop $stop)
    {
        $outcome = (($stop->getPassengersOut() == -1) || ($stop->getPassengersOut() > $this->getPassengersCount())) ?
            $this->getPassengersCount() : $stop->getPassengersOut();

        $this->setPassengersCount($this->getPassengersCount() - $outcome);
        $this->log(sprintf('%d Passangers : Transport -> Station', $outcome));

        return $this;
    }

}