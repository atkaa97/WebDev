<?php

include('interfaces/motoI.php');


class Moto extends Transport implements MotoI{
    use myTrait;

    public $seats;
    public $horsePower;

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

    public function horsePower(){
        return $this->setStrong($this->horsePower);
    }

}


?>