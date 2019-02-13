<?php

class Home extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
    }


    public function indexAction()
    {
        $db = DB::getInstance();
        $fields = [
            'fname' => 'Vacho',
            'lname' => 'Vachoyan',
            'email' => 'vacho@gmail.com'
        ];

        $contactsQuery = $db->insert('contacts', $fields);
        $this->view->rander('home/index');
    }
}