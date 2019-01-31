<?php

function func1(){
    echo 'OK!';
}

function func2($a=2,$b=3){
   $result =  $a * $b;
   echo $result;
}

function func3($a){
    $result =  $a * $a;
    echo $result;
 }

 function func4($a,$b=10,$c=20){
    $result =  $a + $b + $c;
    echo $result;
 }

 function func5(){
    $myvar = 5;
    echo $myvar;
 }


?>