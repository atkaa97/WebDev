<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='icon' href="https://cdn4.iconfinder.com/data/icons/scripting-and-programming-languages/512/php-512.png">
    <title>PHP | Homework</title>
</head>
<body>
    <?php
   
    function searchName($name){
        $cars = array('BMW','Mercedes','Honda','Kia','Audi','Skoda','Kiu');
        $text = '';
        for($i=0;$i < count($cars);$i++){
            $number = 0;
            for($j=0;$j < strlen($cars[$i]);$j++){
                if($name[$j] == $cars[$i][$j]){
                    $number++;
                }
                if ( $j == strlen($name) - 1) {
                    break;
                }
            }
            if($number >= strlen($cars[$i]) - 1){
                $text .= $cars[$i] . '<br>';
            }
        }
        return $text;
    }

    echo searchName('BMW');
    ?>
</body>
</html>