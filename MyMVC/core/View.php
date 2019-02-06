<?php

class View
{
    protected $_head;
    protected $_body;
    protected $_siteTitle = SITE_TITLE;
    protected $_outputBuffer;
    protected $_layout = DEFAULT_LAYOUT;

    public function __construct()
    {

    }

    public function rander($viewName)
    {
        $viewArr = explode('/', $viewName);
        $viewString = implode(DS, $viewArr);
        $viewPath = ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php';
        $layoutPath = ROOT . DS . 'app' . DS . 'views' . DS . 'layouts' . DS . $this->_layout . '.php';
        if (file_exists($viewPath)) {
            include($viewPath);
            include($layoutPath);
        } else {
            die('The view\"' . $viewName . '\"does not exist');
        }
    }

    public function content($type)
    {
        if ($type == 'head') {
            return $this->_head;
        } elseif ($type == 'body') {
            return $this->_body;
        }
        return false;
    }

    public function start($type)
    {
        $this->_outputBuffer = $type;
        ob_start();
    }

    public function end()
    {
        if($this->_outputBuffer == 'head'){
            $this->_head = ob_get_clean();

        }elseif($this->_outputBuffer=='body'){
            $this->_body = ob_get_clean();
        }else{
            die('Start method not face');
        }
    }

    public function siteTitle()
    {
        return $this->_siteTitle;
    }

    public function setSiteTitle($title)
    {
        $this->_siteTitle = $title;
    }

    public function setLayout($path)
    {
        $this->_layout = $path;
    }

}

















