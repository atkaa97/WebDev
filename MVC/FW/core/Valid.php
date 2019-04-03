<?php

class Valid
{

    public static $errorPlaceholder = '', $currentValue = '';

    public static $errorBool = [
        'user_name' => false,
        'email' => false,
        'first_name' => false,
        'last_name' => false,
        'age' => false,
        'phone' => false,
        'password' => false
    ];

    public static function errorPlaceholder($name, $minSize = 1)
    {
        if (empty($_POST[$name])) {
            self::$errorBool[$name] = true;
            self::$errorPlaceholder = 'Please Fill Input.';
        } elseif (strlen($_POST[$name]) < $minSize) {
            self::$errorPlaceholder = 'Length at least ' . $minSize . ' charaacters';
        } else {
            self::$errorPlaceholder = '';
            self::$errorBool[$name] = false;
        }

        return self::$errorPlaceholder;
    }

    public static function currentValue($name){
        if (!self::$errorBool[$name]){
            self::$currentValue = $_POST[$name];
        }else{
            self::$currentValue = '';
        }
        return self::$currentValue;
    }


}