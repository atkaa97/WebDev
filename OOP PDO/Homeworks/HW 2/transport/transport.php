<?php

abstract class Transport{
    public $maxSpeed;
    public $model;
    public $year;
    public $type;
    
    abstract public function type();
    abstract public function maxSpeed();
    abstract public function model();
    abstract public function year();
    
}

?>