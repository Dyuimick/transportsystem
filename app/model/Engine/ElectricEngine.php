<?php

namespace App\Model\Engine;


class ElectricEngine implements EngineInterface {

    protected $type;

    public function __construct()
    {
        $this->type = 'Electric';
    }

    public function start()
    {

    }

    public function stop()
    {

    }

    public function getType()
    {
        return $this->type;
    }
}