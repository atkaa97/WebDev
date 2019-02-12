<?php

class View
{
    protected $_head;
    protected $_body;
    protected $_siteTitle = SITE_TITLE;
    protected $_htmlContent;
    protected $_layout = DEFAULT_LAYOUT;

    public function show($viewName)
    {
        $viewArr = explode('/', $viewName);
        $viewString = implode(DS, $viewArr);
        $viewPath = ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php';
        $layoutPath = ROOT . DS . 'app' . DS . 'views' . DS . 'layouts' . DS . $this->_layout . '.php';
//        dd($viewPath);
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
        $this->_htmlContent = $type;
        ob_start();
    }

    public function end()
    {
        if ($this->_htmlContent == 'head') {
            $this->_head = ob_get_clean();

        } elseif ($this->_htmlContent == 'body') {
            $this->_body = ob_get_clean();
        } else {
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

















