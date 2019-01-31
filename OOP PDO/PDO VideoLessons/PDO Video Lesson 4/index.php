<?php

require_once('connection.php');


$firstName = 'SecurityName';
$lastName = 'SecurityLastName';
$email = 'Securityail@gmail.com';
$password = 'forTest';


$insert = $con->prepare("INSERT INTO  users (first_name, last_name, email, password, date) VALUES(?,?,?,?, now())");

$insert->execute(array($firstName, $lastName, $email, $password)) ;


if ($insert) {
    echo 'Insert is competed!';
} else {
    echo 'Something goes wrong!';
}

?>