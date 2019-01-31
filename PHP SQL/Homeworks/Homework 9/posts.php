<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='icon' href="https://cdn4.iconfinder.com/data/icons/scripting-and-programming-languages/512/php-512.png">
    <title>PHP | Homework 9 | Posts</title>
    <style>
        table {border-collapse: collapse; width: 100%;}
        th, td {text-align:left; padding: 8px;}
        tr:nth-child(even) {background-color: #f2f2f2;}
    </style>
</head>

<body>

    <?php   
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $database_name = 'my_db'; 

        $connect= mysqli_connect($servername, $username, $password,$database_name);
        if(!$connect){
            echo 'Something went wrong! <hr>' . mysqli_connect_error();
            exit;
        }
        
        $query_select_all_data = "SELECT * FROM posts WHERE active_till >= NOW() ORDER BY Created_at DESC";
        $result = mysqli_query($connect, $query_select_all_data);
        $all_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

    <table>
        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Content</th>
            <th>Category</th>
            <th>Active Till</th>
            <th>Edit</th>
        </tr>
        <?php
            foreach ($all_data as $value) {
                    echo 
                    '<tr>
                        <td>'.$value['id'].'</td>
                        <td>'.$value['title'].'</td>
                        <td>'.$value['content'].'</td>
                        <td>'.$value['category'].'</td>
                        <td>'.$value['active_till'].'</td>
                        <td>
                            <form action="posts.php" method="post">
                                <input type="submit" value="Delete">
                                <input type="hidden" name="delete" value='.$value['id'].'>
                            </form><br>
                            <form action="edit.php" method="get">
                                <input type="submit" value="Edit">
                                <input type="hidden" name="edit" value='.$value['id'].'>
                            </form>
                        </td>
                    </tr>';
                    if(isset($_POST['delete']) && $_POST['delete'] == $value['id']){
                        header("Location: posts.php");
                        $query_delete_record = "DELETE FROM posts WHERE id=".$value['id']."";
                        mysqli_query($connect, $query_delete_record);
                    }
                    
            }
            mysqli_close($connect);
        ?>
    </table>
    <form action="index.php" method='post'>
        <br><input type="submit" value = 'Create Post'>
    </form>
</body>

</html>