<?php

interface Test{
    public function doSomething();
}

class User implements Test {

    public function login(){
        echo 'User Login';
    }

    public function logout(){
        echo 'User Logout';
    }
    public function doSomething(){

    }
}

$user = new User();


?>