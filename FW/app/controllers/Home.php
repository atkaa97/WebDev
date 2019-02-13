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
        $sql = 'SELECT * FROM contacts';
        $contactsQuery = $db->query($sql);
        dd($contactsQuery);
        $this->view->rander('home/index');
    }
}