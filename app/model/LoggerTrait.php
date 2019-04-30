<?php

namespace App\Model;

trait LoggerTrait {

    protected $enabled;

    protected function log(string $message)
    {
        if ($this->enabled)
        {
            echo $message . PHP_EOL;
        }
    }

    public function enableLogs()
    {
        $this->enabled = true;

        return $this;
    }
}