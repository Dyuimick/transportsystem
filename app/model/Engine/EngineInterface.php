<?php

namespace App\Model\Engine;

interface EngineInterface {

    public function start();

    public function stop();

    public function getType();

}