<?php

define('BASE_PATH', dirname(dirname(__FILE__)));

require_once(BASE_PATH . DIRECTORY_SEPARATOR . 'Core' . DIRECTORY_SEPARATOR . 'helpers.php');

define('APP_PATH', base_path('App'));

spl_autoload_register(function ($className) {
    $pathName = BASE_PATH . str_replace("\\", DIRECTORY_SEPARATOR, "\\" . $className . '.php');
    if (file_exists($pathName)) {
        require_once($pathName);
    }
});

$router = new Core\Router();