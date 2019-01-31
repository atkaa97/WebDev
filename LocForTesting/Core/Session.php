<?php

namespace Core;

class Session
{
	private static $_instance;

	public static function init()
	{
		if (!self::$_instance) {
			self::$_instance = new self();
			session_start();
		}
		return self::$_instance;
	}

	public function set($key, $value)
	{
		if (is_array($value)) {
			$value = json_encode($value);
		}
		$_SESSION[$key] = $value;
		return $value;
	}

	public function get($key)
	{
		if (isset($_SESSION[$key])) {
			$value = $_SESSION[$key];
			return is_json($value) ? json_decode($value, true) : $value;
		}
		return null;
	}

	public function remove($key)
	{
		if (isset($_SESSION[$key])) {
			unset($_SESSION[$key]);
		}
	}

	public function pull($key)
	{
		$value = $this->get($key);
		$this->remove($key);
		return $value;
	}

	public function all()
	{
		return $_SESSION;
	}
}