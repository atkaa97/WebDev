<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
require_once(ROOT . DS . 'Core' . DS . 'Router.php');
require_once(ROOT . DS . 'Core' . DS . 'init.php');

$router = new Router($_SERVER['REQUEST_URI']);
//
//$url = $_SERVER['REQUEST_URI'];
//echo $url;

?>