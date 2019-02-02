<?php
include "../lib/config.class.php";
Config::set('site_name', 'Your Site Name');
//Config::set('languages', ['en', 'fr']);

//Routes

//Config::set('routes', [
//    'default' => '',
//    'admin' => 'admin_view',
//]);

//Config::set('default_route', 'default');
//Config::set('default_language', 'en');
Config::set('default_controller', 'pages');
Config::set('default_action', 'index');