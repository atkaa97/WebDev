<?php

require_once(ROOT . DS . 'config' . DS . 'main.php');

//function __autoloader($class_name)
//{
//    $core_path = ROOT . DS . 'Core' . DS . strtolower($class_name) . '.php';
//    $controllers_path = ROOT . DS . 'App/Controllers' . strtolower($class_name) . '.php';
//    $model_path = ROOT . DS . 'App/Models' . DS . strtolower($class_name) . '.php';
//
//    if (file_exists($core_path)) {
//        require_once($core_path);
//    } elseif (file_exists($controllers_path)) {
//        require_once($controllers_path);
//    } elseif (file_exists($model_path)) {
//        require_once($model_path);
//    } else {
//        throw new Exception('Failed to include class' . $class_name);
//    }
//
//}