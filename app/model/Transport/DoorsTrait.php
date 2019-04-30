<?php
/**
 * Created by PhpStorm.
 * User: dyuimick
 */

namespace App\Model\Transport;


trait DoorsTrait {

    public $isDoorsOpen = false;

    /**
     * @return $this
     */
    public function openDoors()
    {
        $this->log('Opening Doors');
        $this->isDoorsOpen = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function closeDoors()
    {
        $this->log('Closing Doors');
        $this->isDoorsOpen = false;

        return $this;
    }
}