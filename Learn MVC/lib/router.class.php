<?php

class Router
{
    protected $uri;
    protected $controller;
    protected $action;
    protected $params;
//    protected $route;
//    protected $method_prefix;
//    protected $language;

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

//    public function getMethodPrefix()
//    {
//        return $this->method_prefix;
//    }
//
//    public function getLanguage()
//    {
//        return $this->language;
//    }
//
//    public function getRoute()
//    {
//        return $this->route;
//    }

    public function __construct($uri)
    {
        $this->uri = urldecode($uri);

        $this->controller = Config::get('default_controller');
        $this->action = Config::get('default_action');
//        $this->language = Config::get('default_language');
//        $routes = Config::get('routes');
//        $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
//        $this->route = Config::get('default_route');

        $path_parts = explode('/', $uri);
        array_shift($path_parts);

        if (count($path_parts)) {
//            if (in_array(strtolower(current($path_parts)), array_keys($routes))) {
//                $this->route = strtolower(current($path_parts));
//                $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
//                array_shift($path_parts);
//            }
//            elseif (in_array(strtolower(current($path_parts)), Config::get('languages'))) {
//                $this->language = strtolower(current($path_parts));
//                array_shift($path_parts);
//            }

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