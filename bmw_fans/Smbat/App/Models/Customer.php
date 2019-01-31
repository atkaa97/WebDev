<?php

namespace App\Models;

class Customer extends \Core\ORMBase
{
	public $table = 'customers';

	public function full_name()
	{
		return $this->first_name . ' ' . $this->last_name;
	}
}