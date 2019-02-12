<?php

// ;load config and helper functions

require_once(ROOT . DS . 'config' . DS . 'config.php');
require_once(ROOT . DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'functions.php');

// Autoload Classes
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
    } else {
//        echo 'a0';
        header('Location :../app/views.error.php');
    }
}

// Route the request

Router::route($url);
