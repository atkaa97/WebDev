<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='icon' href="https://cdn4.iconfinder.com/data/icons/scripting-and-programming-languages/512/php-512.png">
    <title>PHP | Homework 7</title>
    <style>
       
    </style>
</head>

<body>
    <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = 'users';

        $connect = mysqli_connect($servername, $username, $password,$db);

        if (!$connect) {
            echo "Connection failed: " . mysqli_connect_error(); 
            exit;
        }

        // $create_database = "CREATE DATABASE users";
        // if (!mysqli_query($connect, $create_database)) {
        //    echo "Error creating database: " . mysqli_error($connect);
        // } 

        // $createTable = "CREATE TABLE users_info (
        //     id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        //     firstname VARCHAR(255),
        //     lastname VARCHAR(255) NOT NULL,
        //     email VARCHAR(255)NOT NULL,
        //     registered_at VARCHAR(255) NOT NULL
        //     )";
        // if (!mysqli_query($connect, $createTable)) {
        //     echo "Error creating table: " . mysqli_error($connect);
        // }

        date_default_timezone_set('Asia/Yerevan');
        $thistime = date('m/d/Y h:i:s a', time());
        $errorText = 'Please Enter Your';
        $errors = [];
        $errors['firstname'] =  isset($_POST['submit']) && empty($_POST['firstname']) ? '<i> ' . $errorText . ' Name </i>' : '';
        $errors['lastname'] = isset($_POST['submit']) && empty($_POST['lastname']) ? '<i> ' . $errorText . ' Surname </i>' : '';
        $errors['email'] =  isset($_POST['submit']) && empty($_POST['email']) ? '<i> ' . $errorText . ' Email </i>' : '';
        function returnOldValue($name){
            return isset($_POST[$name]) ? $_POST[$name] : '';
        }
    ?>
    <form action="" method='post'>
        <label for="firstname">Name: </label>
            <input type="text" id='firstname' name ='firstname' value="<?= returnOldValue('firstname') ?>"><?= $errors['firstname']  ?><br><br>
        <label for="lastname">Surname: </label> 
            <input type="text" id='lastname' name ='lastname' value="<?= returnOldValue('lastname') ?>"><?= $errors['lastname']  ?><br><br>
        <label for="email">E-mail: </label>
            <input type="email" id='email' name ='email' value="<?= returnOldValue('email') ?>"><?= $errors['email']  ?><br><br>
        <button type='submit' name="submit">Submit</button>
    </form>
        <?php 
            if(isset($_POST['submit']) && $errors['firstname'] == '' && $errors['lastname'] == '' && $errors['email'] == ''){
              $insert_user = "INSERT INTO users_info (firstname, lastname, email, registered_at)
                VALUES ('".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["email"]."','".$thistime."')";
            
                if (!mysqli_query($connect, $insert_user)) {
                    echo "Error: " . $insert_user . "<br>" . mysqli_error($connect);
                } 
            }else{
                echo 'Something goes wrong!';
            }
        ?>

</body>

</html>