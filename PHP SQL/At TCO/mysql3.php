<?php

//how to prevent SQL injection in php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'my_database';

$conn = mysqli_connect($servername, $username, $password, $database);


// $select_query = "SELECT * FROM company LIMIT 2 OFFSET 2"; // limit, offset
// $select_query = "SELECT * FROM company WHERE address IS NULL"; // IS NULL / IS NOT NULL
// $select_query = "SELECT * FROM company ORDER BY `name` ASC,	`id` DESC"; // order ASC/DESC
// $select_query = "SELECT name FROM company WHERE address IS NOT NULL ORDER BY id LIMIT 2"; //

// $delete_query = "DELETE FROM company WHERE id = 8"; //DELETE SOME RECORD
// $delete_query = "TRUNCATE company"; //DELETE ALL RECORDS FROM TABLE
// $delete_table = "DROP TABLE company"; //DELETE TABLE
// $delete_db = "DROP DATABASE my_database"; //DELETE DATABASE

// $update_query = "UPDATE company SET address='Yerevan' WHERE name = 'company 2'"; //update record in db
// $alter_table = "ALTER TABLE company MODIFY COLUMN name text";
// $alter_table = "ALTER TABLE company CHANGE address addr VARCHAR(190)";
// $alter_table = "ALTER TABLE company ADD COLUMN age INT AFTER name";
// $alter_table = "ALTER TABLE company DROP COLUMN age";

$result = mysqli_query($conn, $alter_table);

//password_hash('pass', PASSWORD_DEFAULT);
//password_verify('pass', $passwordFromDatabase);


mysqli_close($conn);
?>