<?php
// public
// protected
// private
class User{
    protected $a = 'Value';

    public function login(){
        echo '"login" method from User Class<br>User Login<hr>';
    }

    public function logut(){

    }
}

class Admin extends User {
    
    public function login(){
        parent::login();
        echo '"login" method from Admin Class<br>Admin Login';
    }

    public function addUser(){
        echo $this->a;
    }

    public function deleteUser(){

    }
}

$object = new Admin();
$object->login();

?>

