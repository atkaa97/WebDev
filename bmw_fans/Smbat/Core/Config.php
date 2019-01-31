<?php

namespace Core;

class Config implements Component
{
	public function initialize()
	{
		$config = require_once(BASE_PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'main.php');
		$localConfigPath = BASE_PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'main-local.php';
		if (file_exists($localConfigPath)) {
			$localConfig = require_once($localConfigPath);
			foreach ($config as $config_group => $values) {
				$config[$config_group] = isset($localConfig[$config_group]) ? array_merge($config[$config_group], $localConfig[$config_group]) : $config[$config_group];
			}
		}

		define('DATABASE_HOST', $config['database']['host']);
		define('DATABASE_USER', $config['database']['user']);
		define('DATABASE_PASS', $config['database']['pass']);
		define('DATABASE_NAME', $config['database']['name']);
	}
}