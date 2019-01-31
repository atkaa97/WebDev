
<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='icon' href="https://cdn4.iconfinder.com/data/icons/scripting-and-programming-languages/512/php-512.png">
    <title>PHP | Homework 6</title>
    <style> i{color: orangered;} input{margin-right: 10px;} </style>
</head>

<body>

    <?php
        if (isset($_POST['logOut'])) {
            session_destroy();
            header("Location: index.php");
        }
        $errors = [
            'email' => '',
            'password' => ''
        ];
        $emailValid = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
        if (isset($_POST['signIn'])) {
            $errors['email'] =  (!preg_match($emailValid, $_POST['email'])) ? '<i>Please enter your E-mail </i>' : '';
            $errors['password'] = strlen($_POST['password']) <= 6 ? '<i>Yor password must be at least 6 character</i>' : '';
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['signin'] = $errors['email'] == '' && $errors['password'] == '' ? true : false;
        }

        if (isset($_POST['info'])) {
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['surname'] = $_POST['surname'];
            $_SESSION['birthday'] = $_POST['birthday'];
            $_SESSION['info'] = $_POST['name'] != '' &&  $_POST['surname'] != '' &&  $_POST['birthday'] != '' &&  $_FILES['image']['error'] == 0  ? true : false;
            if ($_SESSION['info']) {
                $tmp_name = $_FILES['image']['tmp_name'];
                $move_to = 'upimage/';
                $file_name = $_FILES['image']['name'];
                $file_path = $move_to . $file_name;
                move_uploaded_file($tmp_name, $file_path);
                $_SESSION['url'] = $file_path;
            }
        }

        function showErrors($inputName){
            return isset($_POST['info']) && empty($_POST[$inputName]) ? '<i>Please enter your ' . $inputName . '</i>' : '';
        }
        function returnOldValue($inputName){
            return isset($_POST[$inputName]) ? $_POST[$inputName] : '';
        }   
    ?>

    <?php if(isset($_SESSION['info']) && $_SESSION['info'] && $_SESSION['signin']) :?>
        <ul>
            <li>Name: <?= $_SESSION['name']?></li>
            <li>Surname: <?= $_SESSION['surname']?></li>
            <li>Birthday: <?= $_SESSION['birthday']?></li>
        </ul>

        <h3>Photo:</h3>    <img src="<?= $_SESSION['url'] ?>" alt="">

        <form action="" method='post'>
            <button type='submit' name='logOut'>Log out</button>
        </form>
    <?php elseif(isset($_SESSION['signin']) && $_SESSION['signin']) :?>
        <form action="" method='post' enctype="multipart/form-data">
            <label for="name">Name</label><br>
                <input type="text" name='name' id='name' value='<?= returnOldValue('name')?>' ><?=showErrors('name')?><br><br>
            <label for="surname">Surname</label><br>
                <input type="text" name='surname' id='surname' value='<?= returnOldValue('surname')?>'><?=showErrors('surname')?><br><br>
            <label for="birthday">Birthday</label><br>
                <input type="date" name='birthday' id='birthday' value='<?= returnOldValue('birthday')?>'><?=showErrors('birthday')?><br><br>
            <label>Image</label><br>
                <input type="file" name='image'><?=showErrors('image')?><br><br>
            <button type='submit' name='info'>Submit</button> 
        </form>
    <?php else :?>
        <form action="" method='post'>
            <label for="email">E-mail</label><br>    
                <input type="text" name='email' id='email' value='<?= returnOldValue('email')?>'><?=$errors['email']?><br><br>
            <label for="password">Password</label><br>    
                <input type="password" name='password' id='password'><?=$errors['password']?><br><br>
            <button type='submit' name='signIn'>Sign in</button>
        </form>
    <?php endif;?>

</body>
</html>
