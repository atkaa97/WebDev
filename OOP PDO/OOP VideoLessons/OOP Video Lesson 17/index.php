<?php

abstract class Test{
    public function doSomething(){
        echo 'Do Something.';
    }

    abstract public function hi();

    final public function bye(){
        echo 'Bye Everbody.';
    }
}

class someName extends Test {
    public function hi(){
        echo 'Hi Everbody.';
        echo '<br>';
        $this->doSomething();
        echo '<br>';
        $this->bye();
    }
}

$object = new someName();
$object->hi();

?>