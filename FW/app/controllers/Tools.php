<?php

class Tools extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('default');
    }

    public function indexAction()
    {
        $this->view->rander('tools/index');
    }

    public function firstAction()
    {
        $this->view->rander('tools/first');
    }

    public function secondAction()
    {
        $this->view->rander('tools/second');
    }

    public function thirdAction()
    {
        $this->view->rander('tools/third');
    }
}