<?php

class  User extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('default');
    }
    public function loginAction(){
        $this->view->rander('user/login');
    }
    public function RegisterAction(){
        $this->view->rander('user/register');
    }
}