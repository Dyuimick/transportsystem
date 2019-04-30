<?php

namespace App\Model;

use App\Model\Transport\AbstractTransport;

class TransportSystem {

    private $transports = [];
    private $loops = [];
    private $stops = [];

    /**
     * @param AbstractTransport $transport
     * @return TransportSystem
     */
    public function addTransport(AbstractTransport $transport)
    {
        $this->transports[$transport->getNumber()] = $transport;

        return $this;
    }

    /**
     * @param string $number
     * @return AbstractTransport
     */
    public function getTransportByNumber(string $number)
    {
        return $this->transports[$number];
    }

    /**
     * @param Loop $loop
     * @return TransportSystem
     */
    public function addLoop(Loop $loop)
    {
        $this->loops[$loop->getNumber()] = $loop;

        return $this;
    }

    /**
     * @param int $number
     * @return Loop
     */
    public function getLoopByNumber(int $number)
    {
        return $this->loops[$number];
    }

    /**
     * @param Stop $stop
     * @return TransportSystem
     */
    public function addStop(Stop $stop)
    {
        $this->stops[$stop->getName()] = $stop;

        return $this;
    }

    /**
     * @param string $name
     * @return Stop
     */
    public function getStopByName(string $name)
    {
        return $this->stops[$name];
    }

    /**
     * @param AbstractTransport $transport
     * @param Loop $loop
     * @return TransportSystem
     */
    public function moveByLoop(AbstractTransport $transport, Loop $loop)
    {
        foreach ($loop->getStops() as $stop)
        {
            $this->moveTo($transport, $stop);
        }

        return $this;
    }

    /**
     * @param AbstractTransport $transport
     * @param Stop $stop
     * @return TransportSystem
     */
    public function moveTo(AbstractTransport $transport, Stop $stop)
    {
        $transport
            ->start()
            ->moveTo($stop)
            ->stop()
            ->action();

        return $this;
    }

}