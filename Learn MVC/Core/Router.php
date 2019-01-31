<?php

class Router
{
    protected $url;
    protected $controller;
    protected $action;
    protected $params;


   public function getUrl()
   {
       return $this->url;
   }

  public function getController()
  {
      return $this->controller;
  }

  public function getAction()
  {
      return $this->action;
  }

  public function getParams()
  {
      return $this->params;
  }

  public function __construct($url)
  {
      echo 'OK! Router was called with url: ' . $url;
  }
}