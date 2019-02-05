<?php

class Router
{
    protected $uri;
    protected $controller;
    protected $action;
    protected $params;

    public function getUri()
    {
        return $this->uri;
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

    public function __construct($uri)
    {
        $this->uri = urldecode($uri);
        $path_parts = explode('/', $uri);
        array_shift($path_parts);

        if (count($path_parts)) {

            if (current($path_parts)) {
                $this->controller = strtolower(current($path_parts));
                array_shift($path_parts);
            }

            if (current($path_parts)) {
                $this->action = strtolower(current($path_parts));
                array_shift($path_parts);
            }

            $this->params = $path_parts;
        }

    }


}