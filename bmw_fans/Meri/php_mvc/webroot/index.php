<?php
    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT', dirname(dirname(__FILE__)));
    define('VIEWS_PATH', ROOT.DS.'views');
    require_once(ROOT.DS.'lib'.DS.'init.php');
   /* $router = new Router ($_SERVER['REQUEST_URI']);
    $uri = $_SERVER['REQUEST_URI'];
    echo $uri;
   echo "<pre>";
   echo'Route: ' . $router->getRoute() ."<br>";
    echo'Controller: ' . $router->getController() ."<br>";
    echo'Action: ' . $router->getMethodPrefix().$router->getAction() ."<br>";

    */
  // var_dump($_SERVER['REQUEST_URI']);exit;
   App::run($_SERVER['REQUEST_URI']);