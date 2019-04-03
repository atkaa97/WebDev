<?php

namespace Core;

use PDO;
use PDOException;

class Connection
{
	public function __construct()
	{
		global $pdh;

		try {
			$pdh = new PDO('mysql:host=' . DATABASE_HOST . ';dbname=' . DATABASE_NAME, DATABASE_USER, DATABASE_PASS);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}