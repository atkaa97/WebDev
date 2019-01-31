<?php

class User
{

    protected $a = 'Value';

    public function login()
    {
        echo '<br> User Login';
    }

    public function logout()
    {

    }

}

class Admin extends User
{

    public function login()
    {
        parent::login();
        echo '<br> Admin Login';
    }

    public function addUser()
    {
        echo $this->a;
    }

    public function deleteUser()
    {

    }
}


$obj = new Admin();
echo $obj->addUser();
$obj->login();
?>