<?php

class  User extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('default');
    }

    public function loginAction()
    {
        $this->view->rander('user/login');
    }

    public function RegisterAction()
    {
        $db = DB::getInstance();
//        if (!empty($_POST)) {
//            $fields = [
//                'user_name' => $_SESSION['user_name'],
//                'email' => $_SESSION['email'],
//                'first_name' => $_SESSION['first_name'],
//                'last_name' => $_SESSION['last_name'],
//                'age' => $_SESSION['age'],
//                'phone' => $_SESSION['phone'],
//                'password' => $_SESSION['password']
//            ];
//            $contactsQuery = $db->insert('users', $fields);
//        }


        $this->view->rander('user/register');
    }
}