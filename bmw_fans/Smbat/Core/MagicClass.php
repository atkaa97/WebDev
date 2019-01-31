<?php

namespace Core;

class MagicClass
{
	public $simple_property = 13;

	public $some_serious_data = [
		'john',
		'james',
		'jack',
	];

	public function __construct($property_value = 45)
	{
		echo "constructing... <br/>";
		$this->simple_property = $property_value;
	}

	public function __get($property_name)
	{
		if ($property_name == 'unknown_property') {
			return "I am unknown property's unknown value";
		} else {
			echo "Calling unknown property " . $property_name;
		}
	}

	public function __toString()
	{
		return json_encode($this->some_serious_data); // same as JSON.stringify in javascript
		// json_decode($string) // same as JSON.parse in javascript
		// return "Converting this object to a string.. because magic is real";
	}

	public function __set($name, $value)
	{
		if ($name === 'super_secret_field') {
			die('You can\'t change this field');
		}
		if ($name === 'some_field') {
			$this->some_serious_data[] = $value;
		}
	}

	public function __destruct()
	{
		echo "Deleting everything from memory";
	}

	public function __call($methodName, $arg2)
	{
		if ($methodName === 'doSomethingIncredible') {
			$this->marvelous($arg2);
		}
	}

	public static function __callStatic($methodName, $arg2)
	{
		var_dump($methodName, $arg2);
	}

	private function marvelous()
	{
		echo "Doing something marvellous";
	}
}