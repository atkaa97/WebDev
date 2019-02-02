<?php

class App
{
    protected static $router;

    public static function getRouter()
    {
        return self::$router;
    }

    public static function run($uri)
    {
        self::$router = new Router($uri);

        $controller_class = ucfirst(self::$router->getController()) . 'Controller';
        $controller_method = strtolower(self::$router->getAction());

        $controller_object = new $controller_class();
    }

}
