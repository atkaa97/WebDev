<?php

include('interfaces/truckI.php');


class Truck extends Transport implements TruckI{
    use myTrait;

    public $maxWeight;
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
    public function maxWeight(){
        return $this->setStrong($this->maxWeight);
    }

}


?>