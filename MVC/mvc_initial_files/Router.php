<?php

namespace Core;

class Router
{
    public function __construct()
    {
        $route = $_SERVER['REQUEST_URI'];

        $controllerAction = explode('/', $route);
        array_shift($controllerAction);

        if ((isset($controllerAction[0]) && ($controllerAction[0] == ''))) {
            $controllerAction[0] = 'home';
        }

        if (count($controllerAction) < 2) {
            $controllerAction[] = 'index';
        }

        $controllerName = $controllerAction[0];
        $actionName = ($controllerAction[1]);

        if ($controllerName == 'public') {
            return include_once(BASE_PATH . DIRECTORY_SEPARATOR . $controllerName . DIRECTORY_SEPARATOR . $actionName . DIRECTORY_SEPARATOR . $controllerAction[2]);
        }

        $controllerNamespace = "App\\Controllers\\";
        $controllerClassName = ucfirst($controllerName) . 'Controller';
        $controllerClass = $controllerNamespace . $controllerClassName;

        if (!class_exists($controllerClass)) {
            redirect('/error');
        }

        $controller = new $controllerClass();

        if (!method_exists($controller, $actionName)) {
            redirect('/error');
        }

        $controller->$actionName();
    }
}