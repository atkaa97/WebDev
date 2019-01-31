<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='icon' href="https://cdn4.iconfinder.com/data/icons/scripting-and-programming-languages/512/php-512.png">
    <title>PHP | Homework 9cvvex<!--  ]]  ]-UH --> </title>
    <style>
       
    </style>
</head>

<body>
    <?php

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database_name = 'my_db';
    date_default_timezone_set('Asia/Yerevan');
    $at_this_moment = date('Y-m-d H:i:s', time());
    
    $connect= mysqli_connect($servername, $username, $password,$database_name);
    if(!$connect){
        echo 'Something went wrong! <hr>' . mysqli_connect_error();
        exit;
    }
    
    // $query_create_db = 'CREATE DATABASE my_db';
    // if(!mysqli_query($connect,$query_create_db)){
    //     echo 'Something went wrong! <hr>' . mysqli_error($connect); exit; 
    // }
    // $query_create_table = 'CREATE TABLE IF NOT EXISTS posts(
    //     id INT AUTO_INCREMENT PRIMARY KEY ,
    //     title TEXT NOT NULL,
    //     content TEXT NOT NULL,
    //     created_at TIMESTAMP,
    //     updated_at DATETIME
    // )';
    // if(!mysqli_query($connect,$query_create_table)){
    //     echo 'Something went wrong! <hr>' . mysqli_error($connect); exit; 
    // }
?>

    <form action="index.php" method='post'>
        <label for="title">Title</label><br> <input type="text" id='title' name='title'><br><br>
        <label for="content">Content</label><br> <textarea id='content' name='textarea'></textarea><br><br>
        <label for="active_till">Active Till</label><br> <input type="date" id='date' name='active_till'><br><br>
        <label>Choose post category:</label><br>
        <input type="radio" name="category" value="news" id='news'>  <label for="news">News</label><br>
        <input type="radio" name="category" value="history" id='history'> <label for="history">History</label><br>
        <input type="radio" name="category" value="politics" id='politics'> <label for="politics">Politics</label><br><br>
        <input type="submit" value = 'Create Post' name='enter-info'> <br><br>
    </form>
    <form action="posts.php" method='post'>
        <button type='submit'  name='show_posts'>Show Your Posts</button>
    </form>
    <?php  
        $query_add_columns = 'ALTER TABLE posts ADD COLUMN active_till DATETIME AFTER Updated_at, ADD COLUMN category VARCHAR(255) AFTER Content'; 
        if(mysqli_query($connect,$query_add_columns)){
            echo mysqli_error($connect);
        }
        $categores = ['news','history','politics'];

        if(isset($_POST['category']) &&  in_array($_POST['category'], $categores)){
            echo '<br>Please Enter Correct Category.';
        }

        if(isset($_POST['enter-info']) && $_POST['textarea'] != '' && $_POST['title'] != '' && isset($_POST['category']) ) {
            echo '<script>alert("Your Post Successfully Created.")</script>';
            $title = mysqli_real_escape_string($connect, $_POST['title']);
            $textarea = mysqli_real_escape_string($connect, $_POST['textarea']);

            $query_insert_post = "INSERT INTO posts (Title, Content, category, Created_at, Updated_at,active_till)
                VALUES ('".$title."','".$textarea."','".$_POST['category']."','".$at_this_moment."','".$at_this_moment."','".$_POST['active_till']."')";
            if(!mysqli_query($connect,$query_insert_post)){
                echo 'Something went wrong! <hr>' . mysqli_error($connect); exit; 
            }
            
        } else{
            echo '<hr> Please fill all inputs,if you want create post.';
        }
        mysqli_close($connect);
    ?>
</body>

</html>