<?php

class User
{
    protected $firstname;
    protected $lastname;
    protected $email;

    public function setAndPrint($var, $value)
    {
       return $this->$var = $value;
        // return $var . ' : ' . $value;
    }
}


?>