<?php

$loader = require 'vendor/autoload.php';

use App\Model\
{
    TransportSystem, Stop, Loop
};

use App\Model\Transport\
{
    TramTechnical, TramWithDoorsPassengers, TramWithPassengers
};

$ts = new TransportSystem();

$ts
    ->addStop(new Stop('Depo', 0, -1))
    ->addStop(new Stop('Stop1', 10, 15))
    ->addStop(new Stop('Stop2', 15, 5))
    ->addStop(new Stop('Stop3', 15, 10))
    ->addStop(new Stop('Stop4', 10, 5))
    ->addStop(new Stop('Stop5', 5, 15));

$ts
    ->addLoop(new Loop('10', [
        $ts->getStopByName('Stop2'),
        $ts->getStopByName('Stop3'),
        $ts->getStopByName('Stop5'),
        $ts->getStopByName('Stop4'),
        $ts->getStopByName('Stop2'),
    ]));


$tram = new TramWithDoorsPassengers('AA3456', 1, $ts->getStopByName('Depo'));

$ts->addTransport($tram->enableLogs());

$ts->moveByLoop($ts->getTransportByNumber('AA3456'), $ts->getLoopByNumber(10));
$ts->moveTo($ts->getTransportByNumber('AA3456'), $ts->getStopByName('Depo'));
