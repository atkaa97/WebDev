<?php

include('interfaces/busI.php');

class Bus extends Transport implements BusI{
    use myTrait;

    public $seats;

    public function type(){
        return $this->setStrong($this->type);
    }
    
    public function MaxSpeed(){
        return $this->setStrong($this->maxSpeed);
    }

    public function Model(){
        return $this->setStrong($this->model);
    }

    public function Year(){
        return $this->setStrong($this->year);
    }

      public function Seats(){
        return $this->setStrong($this->seats);
    }
  
}


?>