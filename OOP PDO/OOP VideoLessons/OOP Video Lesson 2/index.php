<?php

class User
{
    private $name = 'Arthur';
    private $surname = 'Margarian';
    private $gender = 'Male';

    // public function __get($var){
    //     echo  $this->$var . '<br>';
    // }

    // public function __set($var,$value){
    //     echo $this->$var = $value . '<br>';
    // }

    // private function test($var1,$var2){
    //     echo $var1;
    //     echo '<br>';
    //     echo $var2;
    // }

    // public function __call($name,$value)
    // {
    //     $this->$name($value[0],$value[1]);
    // }

    public function __toString()
    {
        return 'It\'s called by STRING <br>';
    }

    public function __invoke()
    {
        return 'It\'s called by FUNCTION';
    }
}


$obj = new User();

// $obj-> name;
// $obj->surname = 'Margaryan';
// $obj->test(1,2);
echo $obj;
echo $obj();
?>