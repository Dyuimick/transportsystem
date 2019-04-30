<?php

namespace App\Model\Engine;


class GasEngine implements EngineInterface {

    protected $type;

    public function __construct()
    {
        $this->type = 'Gas';
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