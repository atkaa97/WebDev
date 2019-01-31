<?php

include('connection.php');

// $firstname = 'Vardan';
// $lastname = 'Petrosyan';
// $email = 'vardan.petrosyan.1976@gmail.com';

// $firstname = 'Armen';
// $lastname = 'Gabrielian';
// $email = 'gabrielyan.arm.1998@gmail.com';

$firstname = 'Arthur';
$lastname = 'Margarian';
$email = 'arthurmargarian1997@gmai.com';

try {
    $createTable = $connect->prepare("CREATE TABLE IF NOT EXISTS Users (
      id INT(11) AUTO_INCREMENT PRIMARY KEY, 
      firstname VARCHAR(100),
      lastname VARCHAR(100),
      email VARCHAR(100)
    )");
    $createTable->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
}


try {
    $insert = $connect->prepare("INSERT INTO users (firstname,lastname,email) VALUES(?,?,?)");
    $insert->execute([$firstname, $lastname, $email]);
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>