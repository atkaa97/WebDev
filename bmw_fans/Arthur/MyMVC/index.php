<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));

$url = isset($_SERVER['REQUEST_URI']) ? explode('/', ltrim($_SERVER['REQUEST_URI'], '/')) : [];

require_once(ROOT . DS . 'config' . DS . 'config.php');
require_once(ROOT . DS . 'app' . DS . 'lib' . DS . 'helpers.php');

spl_autoload_register('classAutoload');
function classAutoload($className)
{
    $path = [
        'class' => ROOT . DS . 'core' . DS . $className . '.php',
        'controller' => ROOT . DS . 'app' . DS . 'controllers' . DS . $className . '.php',
        'model' => ROOT . DS . 'app' . DS . 'models' . DS . $className . '.php'
    ];

    if (file_exists($path['class'])) {
        require_once($path['class']);
    } elseif (file_exists($path['controller'])) {
        require_once($path['controller']);
    } elseif (file_exists($path['model'])) {
        require_once($path['model']);
    }
}

Router::route($url);

