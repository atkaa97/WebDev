<?php

class Router
{
    public static function route($url)
    {
        $controller = isset($url[0]) && $url[0] != '' ? ucwords($url[0]) : DEFAULT_CONTROLLER;
        $controller_name = $controller;
        array_shift($url);

        $action = isset($url[0]) && $url[0] != '' ? $url[0] . 'Action' : 'indexAction';
        array_shift($url);

        if (class_exists($controller)) {
        $dispatch = new $controller($controller_name, $action);
            if (method_exists($controller, $action)) {
                $dispatch->$action();
            } else {
//                die('The "' . $action . '" method does not exists in the controller "' . $controller_name . '"');
                header('Location: /notfound');
            }
        } else {
//            die("The \"$controller\" controller does not exists!");
            header('Location: /notfound');
        }
    }
}