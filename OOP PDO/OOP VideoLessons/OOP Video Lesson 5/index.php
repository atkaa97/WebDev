<?php

class User
{
    public $a = 'Value1';
    public $b = 'Value2';
    public $c = 'Value3';

    public function __construct($var1 = false, $var2 = false, $var3 = false)
    {
        $this->a = $var1;
        $this->b = $var2;
        $this->c = $var3;
    }

    public function login()
    {
        echo '<br> User Login';
    }

    public function logout()
    {
        echo '<br> User Logout';
    }
}

class Admin extends User
{

}


$user = new User('User 1', 'User 2', 'User 3');
$admin = new Admin();

echo '<br> Class name of Admin : ' . get_class($admin);
echo '<br> Parent Class Name of Admin : ' . get_parent_class($admin);
echo '<br> Is correct Name or Not(1 = correct, 0 = Not correct) : ' . is_a($user, 'User');
echo '<br><br> Get Class Methods : <br>';
var_dump(get_class_methods($user));
echo '<br> Get Class Variables : <br>';
var_dump(get_class_vars('User'));
echo '<br> Get Object Variables : <br>';
var_dump(get_object_vars($user));


?>