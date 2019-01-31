<?php
// public
// protected
// private
class User{
    protected $a = 'Value';

    public function login()
    {

    }

    public function logut()
    {

    }
}

class Admin extends User {

    public function addUser()
    {
        echo $this->a;
    }

    public function deleteUser()
    {

    }
}

$object = new Admin();
$object->addUser();

?>

