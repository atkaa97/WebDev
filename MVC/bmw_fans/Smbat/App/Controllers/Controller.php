<?php

namespace App\Controllers;

use Core\Config;
use Core\Connection;

class Controller
{
    public function __construct()
    {
        $config = new Config();
        $conn = new Connection();
    }

    // requests validation method
    protected function validate($request, $rules)
	{
		$errors = [];
		foreach ($rules as $field => $fieldRules) {
			foreach (explode('|', $fieldRules) as $rule) {
				$ruleParams = explode(':', $rule);
				$rule = array_shift($ruleParams);
				switch ($rule) {
					case 'required':
						if (!$request->get($field)) {
							$errors[$field][] = $field . ' is required';
						}
						break;
					case 'email':
						preg_match("/[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/i", $request->get($field), $matches);
						if (empty($matches)) {
							$errors[$field][] = $field . ' is not a valid email address';
						}
						break;
					case 'max':
						if (count($ruleParams)) {
							if (strlen($request->get($field)) > $ruleParams[0]) {
								$errors[$field][] = $field . ' may not be longer than ' . $ruleParams[0];
							}
						}
						break;
					case 'min':
						if (count($ruleParams)) {
							if (strlen($request->get($field)) < $ruleParams[0]) {
								$errors[$field][] = $field . ' must be longer or equal to ' . $ruleParams[0];
							}
						}
						break;
					default:
						break;
				}
			}
		}
		return $errors;
	}
}