<?php

class User
{
    public static $counter = '<hr> Static : Vacho <hr>';
    const NAME = '<hr> Constant(already constant) : Arthur <hr>';

    // public function __construct($name){
    //     echo $name . '<br>';
    //     self::$counter+=1;
    //     echo self::$counter . '<br>';

    // }
}

// $user1 = new User('John');
// $user2 = new User('Vacho');

echo User::$counter;

echo User::NAME;
?>