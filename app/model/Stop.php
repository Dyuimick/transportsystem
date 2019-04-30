<?php

namespace App\Model;

class Stop {

    private $passengersIn;
    private $passengersOut;
    public $name;

    /**
     * Stop constructor.
     * @param string $name
     * @param int $passengersInCount
     * @param int $passengersOutCount
     */
    public function __construct(string $name, int $passengersInCount, int $passengersOutCount)
    {
        $this->setPassengersIn($passengersInCount)
            ->setPassengersOut($passengersOutCount)
            ->setName($name);
    }

    /**
     * @param int $passengersInCount
     * @return Stop
     */
    public function setPassengersIn(int $passengersInCount)
    {
        $this->passengersIn = $passengersInCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getPassengersIn()
    {
        return $this->passengersIn;
    }

    /**
     * @param int $passengersOutCount
     * @return Stop
     */
    public function setPassengersOut(int $passengersOutCount)
    {
        $this->passengersOut = $passengersOutCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getPassengersOut()
    {
        return $this->passengersOut;
    }

    /**
     * @param string $name
     * @return Stop
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $number
     * @return int
     */
    public function passengersToTransport(int $number)
    {
        $passengersToTransport = ($this->getPassengersIn() <= $number) ? $this->getPassengersIn() : $number;
        $this->setPassengersIn($this->getPassengersIn() - $passengersToTransport);

        return $passengersToTransport;
    }

}