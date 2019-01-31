<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'my_database';

$conn = mysqli_connect($servername, $username, $password, $database);

// $query = "SELECT name, AVG(age) FROM `company` GROUP BY `name`";
// $query = "SELECT name, MAX(age) FROM `company` GROUP BY `name`";
// $query = "SELECT name, MIN(age) FROM `company` GROUP BY `name`";
// $query = "SELECT name, SUM(age) FROM `company` GROUP BY `name`";
// $query = "SELECT name, ROUND(age) FROM `company` GROUP BY `name`";
// $query = "SELECT name, COUNT(age) FROM `company` GROUP BY `name`";

// SELECT name, LENGTH(age) FROM `company` GROUP BY `name`
// SELECT UCASE(name), LENGTH(age) FROM `company` GROUP BY `name`
// SELECT LCASE(name), LENGTH(age) FROM `company` GROUP BY `name`
// SELECT CONCAT(name, ', ', age), LENGTH(age) FROM `company` GROUP BY `name`

// mysqli_real_escape_string($conn, $value)

// SELECT * FROM `company` WHERE `name` LIKE '%com%'


$result = mysqli_query($conn, $alter_table);


// MYSQL FUNCTIONS
// GROUP BY
// LIKE OPERATOR
// mysqli_real_escape_string()


mysqli_close($conn);
?>