<?php
include '../lib/router.class.php';
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
require_once(ROOT . DS . 'lib' . DS . 'init.php');

$router = new Router($_SERVER['REQUEST_URI']);

//$uri = $_SERVER['REQUEST_URI'];
//
//print_r($uri);

//echo '<br>Route : ' . $router->getRoute();
echo '<br>Controller : ' . $router->getController();
//echo '<br>Language : ' . $router->getLanguage();
echo '<br>Action : ' /* . $router->getMethodPrefix() */. $router->getAction();
echo '<br>Params : ';
foreach ($router->getParams() as $key => $value) {
    $key +=1;
    echo '<br>' . $key . ' : ' . $value;
}
