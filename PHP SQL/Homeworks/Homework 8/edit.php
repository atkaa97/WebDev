<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='icon' href="https://cdn4.iconfinder.com/data/icons/scripting-and-programming-languages/512/php-512.png">
    <title>PHP | Homework 8 |Edit</title>
    <style>
       
    </style>
</head>

<body>
    <?php
        date_default_timezone_set('Asia/Yerevan');
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $database_name = 'my_db';
        $at_this_moment = date('Y-m-d H:i:s', time());       

        $connect= mysqli_connect($servername, $username, $password,$database_name);
        if(!$connect){
            echo 'Something went wrong! <hr>' . mysqli_connect_error();
            exit;
        }
        $query_select_record_data = "SELECT id, Title,Content FROM posts WHERE id = 1 ";
        $result = mysqli_query($connect, $query_select_record_data);
        $record_data = mysqli_fetch_array($result, MYSQLI_ASSOC);

        
    ?>
    <form action="edit.php" method='post'>
        <label for="title">Title</label><br> <input type="text" id='title' name='title' value='<?=$record_data['Title']?>'><br><br>
        <label for="content">Content</label><br> <textarea id='content' name='textarea' value='<?=$record_data['Content']?>'><?=$record_data['Content']?></textarea><br><br>
        <input type="submit" value = 'Edit Post' name='edit'> <br><br>
    </form>
    <?php 
        if(isset($_POST['edit'])){
            $query_update_record = "UPDATE posts SET Title = '".$_POST['title']."', Content ='".$_POST['textarea']."',Updated_at ='".$at_this_moment."'  WHERE id = 1 ";

        if (!mysqli_query($connect, $query_update_record)) {
            echo "Err" . mysqli_error($connect);
        } else {
            echo "done";
        }
        }
        mysqli_close($connect);
    ?>
</body>

</html>