<?php

require_once('connection.php');

$insert = $con->prepare("INSERT INTO `users`(`first_name`,`email`,`password`,`date`) VALUES('Arahur', 'gmasdas@gmial.com', 'passsdas' , now())");

$insert->execute();


if ($insert) {
    echo 'Insert is competed!';
} else {
    echo 'Something goes wrong!';
}

?>