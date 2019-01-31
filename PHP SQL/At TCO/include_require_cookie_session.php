<?php 
	// setcookie('name', 'a', time() + 3600);
	// session_start();
	// $_SESSION['name'] = 'Gago';

	setcookie('visit_count', 0);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
// incluce & require

// include('asd.php');
// include_once('simple_form.php');
// require('simple_form.php');
// require_once('simple_form.php');


// date, time

// time() + 3600;
// echo strtotime('+1 week');
// echo date('Y/m/d H:i:s', strtotime('+1 week'));

// cookie
// print_r(count());

// session
// if ($_SESSION['name']) {
// 	session_unset();
// 	session_destroy();
// };

?>

<?php


$count = $_COOKIE['visit_count'];
echo $count;
$count++;
setcookie('visit_count', $count);

?>
</body>
</html>