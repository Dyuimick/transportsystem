<?php

namespace App\Model\Transport;

use App\Model\Stop;

class TramTechnical extends Tram {

    /**
     * TramTechnical constructor.
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
     * @return $this
     */
    public function action()
    {
        $this->log(' Doing Some Work ');

        return $this;
    }
}