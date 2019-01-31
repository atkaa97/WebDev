<?php

//AutoLoad Version 1

// function myAutoloader($className){
//     require('class/class'.$className.'.php');
// }
// spl_autoload_register('myAutoloader');



//AutoLoad Version 2

spl_autoload_register(function($className){
    require('class/class'.$className.'.php');
});

$user = new User();
echo '<hr>';
$payment = new Payment();

?>