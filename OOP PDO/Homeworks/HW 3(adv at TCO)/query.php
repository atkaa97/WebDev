<?php

include('connection.php');

$users = [
    [
        'firstname' => 'Vardan',
        'lastname' => 'Petrosyan',
        'email' => 'vardan.petrosyan.1976@gmail.com',
    ],
    [
        'firstname' => 'Armen',
        'lastname' => 'Gabrielian',
        'email' => 'gabrielyan.arm.1998@gmail.com',
    ],
    [
        'firstname' => 'Arthur',
        'lastname' => 'Margarian',
        'email' => 'arthurmargarian1997@gmai.com',
    ],
    [
        'firstname' => 'Garnik',
        'lastname' => 'Vardanyan',
        'email' => 'grnojanmailjan@gmai.com',
    ]
];

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


foreach ($users as $user) {
    try {
        $insert = $connect->prepare("INSERT INTO users (firstname,lastname,email) VALUES (:firstname,:lastname,:email)");
        $insert->execute([
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>