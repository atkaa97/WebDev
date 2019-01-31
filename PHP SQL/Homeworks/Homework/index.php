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

        $nums=array('21','43','48','55','16','722','6456','69','1780','36');
        $bool = true;

        echo '<pre>';
        print_r($nums);
        echo '</pre>';        

        for($j = 0; $j < count($nums); $j ++) {
            for($i = 0; $i < count($nums)-1; $i++){
                if($bool ? $nums[$i] > $nums[$i+1] : $nums[$i] < $nums[$i+1]) {
                    $second = $nums[$i+1];
                    $nums[$i+1]=$nums[$i];
                    $nums[$i]=$second;
                }       
            }
        }
        
        echo '<hr><pre>';
        print_r($nums);
        echo '</pre>';

    ?>
</body>
</html>