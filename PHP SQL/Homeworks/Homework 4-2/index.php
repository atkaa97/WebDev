<?php 
    session_start();
    $_SESSION['userName'] = isset($_POST['submit']) && (!empty($_POST['userName'])) ? $_POST['userName'] : '';
    $_SESSION['password'] = isset($_POST['submit']) && (!empty($_POST['password'])) ? $_POST['password'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='icon' href="https://cdn4.iconfinder.com/data/icons/scripting-and-programming-languages/512/php-512.png">
    <title>PHP | Homework 4-2</title>
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
        $errors['userName'] =  isset($_POST['submit']) && empty($_POST['userName']) ? '<i> ' . $errorText . ' Username </i>' : '';
        $errors['password'] =  isset($_POST['submit']) && empty($_POST['password']) ? '<i> ' . $errorText . ' Password </i>' : '';
        function returnOldValue($name){
            return isset($_POST[$name]) ? $_POST[$name] : '';
        }
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
        <form action="index.php" method='GET'>
          <button type='submit' name="logOut">Log Out</button>
        </form>
        <?php 
            var_dump($_SESSION); 
            var_dump($_GET);
        ?>
    <?php else:?>
        <form action="index.php" method='POST'>
            <label for="userName">Username: </label> 
            <input id='userName' name='userName' type="text" value = '<?= returnOldValue('userName') ?>' ><?= $errors['userName'] ?><br><br>
            <label for="password">Password: </label> 
            <input type="password" id="password" name="password" value = '<?= returnOldValue('password') ?>' ><?= $errors['password'] ?><br><br>
            <button type='submit' name="submit">Submit</button>
        </form>
        
        <?php 
        if(isset($_GET['logOut'])){
            unset($_SESSION['password']);
            unset($_SESSION['userName']); 
            var_dump($_SESSION); 
            var_dump($_GET) ;
        }
        ?>
    <?php endif;?>
</body>

</html>
