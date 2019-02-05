<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

spl_autoload_register('autoLoad');

function autoLoad($class_name)
{
    $lib_path = ROOT . DS . 'lib' . DS . strtolower($class_name) . '.class.php';
    if (file_exists($lib_path)) {
        require_once($lib_path);
    }

}
$router = new Router($_SERVER['REQUEST_URI']);

echo '<br>Controller : ' . $router->getController();
echo '<br>Action : ' .  $router->getAction();
echo '<br>Params : ';

foreach ($router->getParams() as $key => $value) {
//    $key +=1;
    echo '<br>' . $key . ' : ' . $value;
}
