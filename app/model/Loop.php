<?php

namespace App\Model;

class Loop {

    private $stops;
    private $number;

    /**
     * Loop constructor.
     * @param string $number
     * @param Stop[] $stops
     */
    public function __construct(string $number, $stops)
    {
        $this->setNumber($number);
        $this->setStops($stops);
    }

    /**
     * @param $stops
     * @return Loop
     */
    private function setStops($stops)
    {
        foreach ($stops as $stop)
        {
            $this->addStop($stop);
        }

        return $this;
    }

    /**
     * @param Stop $stop
     * @return Loop
     */
    public function addStop(Stop $stop)
    {
        $this->stops[$stop->name] = $stop;

        return $this;
    }

    /**
     * @return array
     */
    public function getStops()
    {
        return $this->stops;
    }

    /**
     * @param string $number
     * @return Loop
     */
    private function setNumber(string $number)
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

}