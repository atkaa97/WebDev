<?php

class User{
    public $a = 'Value 1';
    public $b = 'Value 2';

    public function __construct($var1 = false,$var2 = false){
        $this->a = $var1;
        $this->b = $var2;
    }

    public function login(){
        echo 'User Login';
    }

    public function logout(){
        echo 'User Logout';
    }
}

class Admin extends User{

}

$user = new User('User 1', 'User 2');
$admin = new Admin();

echo get_class($user);
echo '<br>';
echo get_parent_class($admin);
echo '<br>';
echo is_a($user,'User');
echo '<br>';
var_dump(get_class_methods($user));
echo '<br>';
var_dump(get_class_vars('User'));
echo '<br>';
var_dump(get_object_vars($user));
echo '<br>';



?>