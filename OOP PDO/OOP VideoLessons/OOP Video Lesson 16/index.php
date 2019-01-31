<?php

trait hiThere{
    public function hi(){
        echo 'Hi There.';
    }
}

class someName{
    use hiThere;

    public function doSomething(){
        $this->hi();
    }
}

$object = new someName();
$object->doSomething();
?>