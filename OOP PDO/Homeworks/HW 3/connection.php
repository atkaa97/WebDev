<?php

$username = 'root';
$password = '';
$dsn = 'mysql:host=localhost;dbname=my_base';

try {
    $connect = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}