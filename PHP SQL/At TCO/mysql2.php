<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'my_database';

// $create_table = "CREATE TABLE IF NOT EXISTS company(
//     		id INT AUTO_INCREMENT,
//     		name VARCHAR(255) NOT NULL DEFAULT 'company',
//     		address VARCHAR(255),
//     		PRIMARY KEY(id)
// 		);";

$conn = mysqli_connect($servername, $username, $password, $database);

// if (!$conn) {
// 	die(mysqli_connect_error()); //connection error
// } else {
// 	echo 'success <br>';
// }

// if (!mysqli_query($conn, $create_table)) {
// 	echo mysqli_error($conn); //return query error
// } else {
// 	echo 'successfully created company table';
// }


//MYSQL INSERT QUERY
// $insert_query = "INSERT INTO company (name) VALUES('company 2');";
// $insert_query .= "INSERT INTO company (name) VALUES('company 3');";

// if (!mysqli_multi_query($conn, $insert_query)) {
// 	echo mysqli_error($conn);
// } else {
// 	echo 'company tco added to "company" table';
// }

$select_query = "SELECT * FROM company WHERE name = 'company 2' AND address = 'add 2' ";
$result = mysqli_query($conn, $select_query);

if (!$result) {
	echo mysqli_error($conn); //return query error
} else {
	if (mysqli_num_rows($result) > 0) {
		// $a = mysqli_fetch_all($result, MYSQLI_ASSOC); // return all records from database in assocative array
		// $a = mysqli_fetch_assoc($result); // return one record from database in assocative array
		$a = mysqli_fetch_row($result); // return one record from database in array
		echo '<pre>';
		var_dump($a);
	} else {
		echo 'no result for ' . $select_query;
	}
}

mysqli_close($conn);
?>