<?php

if (!empty($_FILES)) {
	echo "<pre>";

	$directory = 'uploads/';
	$file = basename($_FILES['myFile']['name']);
	$file_name = $directory . $file;

	$tmp_name = $_FILES['myFile']['tmp_name'];

	$extension = pathinfo($file, PATHINFO_EXTENSION);

	if (!is_dir('uploads')) {
		mkdir('uploads');
	}

	move_uploaded_file($tmp_name, $file_name);
	// unlink($file_name); delete files
}

?>