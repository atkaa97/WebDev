<!DOCTYPE html>
<html>
<body>

<?php
$people = array("Glenn", "Joe", "Cleveland");

echo current($people) . "<br>";

if (count($people) > 5) {
    echo 'count > 5';
} else {
    $e = new Exception();
    echo  $e->getMessage() . '<br>count < 5';
}



?>

</body>
</html>