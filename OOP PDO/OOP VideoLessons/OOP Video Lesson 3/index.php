<?php

class User
{
    public $counter = 0;

    public function __construct($name)
    {
        echo $name . '<br>';
        $this->counter += 1;
        echo $this->counter . '<br>';
    }

    const NAME = 'John';
}

$user1 = new User('John');
$user1 = new User('James');
// public static $counter = 0;
// public function __construct($name){
//     self::$counter += 1;
//     echo 'User number '. self::$counter . ' : '. $name . '. <br>';
// }


// $user1 = new User('John');
// $user2 = new User('James');
// $user3 = new User('Chris');
// echo User::$counter;
echo User::NAME;
?>