<?php

namespace Core;

class Request
{
	private static $_instance;

	public static function init()
	{
		if (!self::$_instance) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function get($field = null)
	{
		if ($field) {
			return isset($_REQUEST[$field]) ? $_REQUEST[$field] : null;
		}
		return null;
	}

	public function all()
	{
		$data = $_REQUEST;
		if (isset($data['route'])) {
			unset($data['route']);
		}
		return $data;
	}

	public function except($field)
	{
		$array = $this->all();
		unset($array[$field]);
		return $array;
	}
}