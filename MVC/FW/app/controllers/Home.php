<?php

class Home extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
    }


    public function indexAction()
    {
//        $db = DB::getInstance();
////////////////////////////////////////////////////////////////////////// TODO Query start
//        $sql = 'SELECT * FROM contacts WHERE id = 1';
//        $contactsQ = $db->query($sql);
//        dd($contactsQ);
////////////////////////////////////////////////////////////////////////// Query end
//
//
////////////////////////////////////////////////////////////////////////// TODO Insert start
//        $fields = [
//            'fname' => 'Garnik',
//            'lname' => 'Gexaddyan',
//            'email' => 'qwertyui@gmail.com',
//            'phone' => '47883115',
//            'city' => 'Zxcvbnm'
//        ];
//        $contactsQuery = $db->insert('contacts', $fields);
////////////////////////////////////////////////////////////////////////// Insert end
//
////////////////////////////////////////////////////////////////////////// TODO Uptade start
//
//        $fields = [
//            'fname' => 'Arthur',
//            'lname' => 'Gasparyan',
//            'email' => 'vtesto@gmail.com'
//        ];
//        $contactsQuery = $db->update('contacts',3, $fields);
////////////////////////////////////////////////////////////////////////// Update end
//
//
////////////////////////////////////////////////////////////////////////// TODO Delete start
//        $contactsQuery = $db->delete('contacts',4);
////////////////////////////////////////////////////////////////////////// Delete end
//
//
////////////////////////////////////////////////////////////////////////// TODO Results start
//        $contacts = $db->query("SELECT * FROM contacts ORDER BY lname, fname")->results();
//        dd($contacts[0]['fname']);
//        $columns = $db->get_columns('contacts');
//        dd($columns);
////////////////////////////////////////////////////////////////////////// Results end

//        $contacts = $db->find('contacts',[
//           "whereFields" => ['lname = ?'],
//            "whereValues" => ['Vachoyan'],
//            "order" => "id",
//            "limit" => '100 '
//        ]);
//        dd($contacts);
//
//        $contactFirts = $db->findFirst('contacts',[
//            "whereFields" => ['fname = ?'],
//            "whereValues" => ['Garnik'],
//        ]);
//        dd($contactFirts);

        $this->view->rander('home/index');
    }
}