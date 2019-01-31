<?php

namespace App\Models;

use Core\ORMBase;

class People extends ORMBase
{
	public function getFullName()
	{
		return $this->first_name . ' ' . $this->last_name;
	}
}