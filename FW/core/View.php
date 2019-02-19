<?php

class View
{
    protected $_head;
    protected $_body;
    protected $_siteTitle = SITE_TITLE;
    protected $_siteIcon = SITE_ICON;
    protected $_tagName;
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
//            die('The view\"' . $viewName . '\"does not exist');
            header('Location: /notfound');
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
        $this->_tagName = $type;
        ob_start();
    }

    public function end()
    {
        if ($this->_tagName == 'head') {
            $this->_head = ob_get_clean();

        } elseif ($this->_tagName == 'body') {
            $this->_body = ob_get_clean();
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

    public function siteIcon()
    {
        return $this->_siteIcon;
    }

    public function setSiteIcon($icon)
    {
        $this->_siteIcon = $icon;
    }

    public function setLayout($path)
    {
        $this->_layout = $path;
    }

}

















