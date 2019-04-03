<?php

namespace Core;

class Config
{
    public function __construct()
    {
        $config = require_once(BASE_PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'main.php');

        if (!defined('DATABASE_HOST')) {
            define('DATABASE_HOST', $config['database']['host']);
        }
        if (!defined('DATABASE_USER')) {
            define('DATABASE_USER', $config['database']['user']);
        }
        if (!defined('DATABASE_PASS')) {
            define('DATABASE_PASS', $config['database']['pass']);
        }
        if (!defined('DATABASE_NAME')) {
            define('DATABASE_NAME', $config['database']['name']);
        }
        if (!defined('APP_NAME')) {
            define('APP_NAME', $config['app_name']);
        }
    }
}