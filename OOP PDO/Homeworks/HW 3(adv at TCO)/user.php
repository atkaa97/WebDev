<?php

class User
{
    protected $firstname;
    protected $lastname;
    protected $email;

    public function setAndPrint($var, $value)
    {
        $this->$var = $value;
        echo "<td>" . $this->$var . "</td>";
    }

}


?>