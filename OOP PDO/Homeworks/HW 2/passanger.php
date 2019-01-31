<?php


include('interfaces/passangerI.php');

class Passanger extends Transport implements PassangerI{
    use myTrait;

    public $doors;
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

    public function Doors(){
        return $this->setStrong($this->doors);
    }

    public function Seats(){
        return $this->setStrong($this->seats);
    }

}


?>