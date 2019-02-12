<?php

namespace Core;

class Request
{
	private static $_instance;

	// create instance of class if not exist and return that
	public static function init()
	{
		if (!self::$_instance) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	// get value from request
	public function get($field = null)
	{
		if ($field) {
			return isset($_REQUEST[$field]) ? $_REQUEST[$field] : null;
		}
		return null;
	}

    // get all values from request
	public function all()
	{
		$data = $_REQUEST;
		return $data;
	}

    // get values from request except $field
	public function except($field)
	{
		$array = $this->all();
		unset($array[$field]);
		return $array;
	}
}