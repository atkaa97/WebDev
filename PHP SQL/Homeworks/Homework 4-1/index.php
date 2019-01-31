<?php 
    $nameValue = isset($_POST['submit']) && (!empty($_POST['name'])) ? $_POST['name'] : ''; 
    $dateValue = isset($_POST['submit']) && (!empty($_POST['date'])) ? $_POST['date'] : '';
    setcookie('nameCookie',$nameValue,time() + 120);
    setcookie('dateCookie',$dateValue,time() + 120);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='icon' href="https://cdn4.iconfinder.com/data/icons/scripting-and-programming-languages/512/php-512.png">
    <title>PHP | Homework 4-1</title>
    <style>
        i{
            color:orangered;
            padding-left: 10px;
        }
    </style>
</head>

<body>
    <?php 
        $formOrResult = false;
        $today =  date("Y-m-d");
        $errors = [];
        $errorText = 'Please Enter Your';
        $errors['name'] =  isset($_POST['submit']) && empty($_POST['name']) ? '<i> ' . $errorText . ' Name </i>' : '';
        $errors['birthday'] =  isset($_POST['submit']) && empty($_POST['date']) ? '<i> ' . $errorText . ' Birthday </i>' : '';
        if (isset($_POST['submit'])) {
            foreach ($errors as $value) {
                if ($value != '') {
                    $formOrResult = false;
                    break;
                }else{
                    $formOrResult = true;
                }
            }
        }
    ?>
    <?php if($formOrResult) :?>
        <?= $dateValue == $today  ? 'Today is '.$nameValue.'\'s birthday.' : ''.$nameValue.'\'s birthday at '.$dateValue.'.' ; ?>
    <?php else:?>
        <form action="index.php" method='POST'>
            <label for="name">Name: </label> 
            <input id='name' name='name' type="text" value = '<?= $nameValue ?>'><?= $errors['name'] ?><br><br>
            <label for="date">Birthday: </label> 
            <input type="date" id="date" name="date" value = '<?= $dateValue ?>'><?= $errors['birthday'] ?><br><br>
            <button type='submit' name="submit">Submit</button>
        </form>
    <?php endif;?>
</body>

</html>