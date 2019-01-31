<?php

//create database
$create_database = "CREATE DATABASE my_database";

//create table
$create_table = "CREATE TABLE IF NOT EXISTS zzz(
    		id INT AUTO_INCREMENT,
    		name VARCHAR(255) NOT NULL DEFAULT 'gago',
    		PRIMARY KEY(id)
		);";

$get_users = "SELECT id, name FROM users WHERE id = 1";

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'my_database';

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn) {
	var_dump(mysqli_query($conn, $create_table));
} else {
	echo 'you have not connected';
}


?>