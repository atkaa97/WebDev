<?php

include('connection.php');
include('user.php');
// include('query.php');


try {
    $selectData = $connect->prepare('SELECT * FROM users');
    $selectData->execute();
    $selectData->setFetchMode(PDO::FETCH_ASSOC);
    $allData = $selectData->fetchAll();

    // echo '<pre>'; var_dump($allData);exit;

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Users</title>
        <style>
            table {
                border-collapse: collapse;
                width: 75%;
                margin: 40px auto;
            }

            th, td {
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even){
                    background-color: #f2f2f2
            }

            th {
                background-color: #4CAF50;
                color: white;
            }
        </style>
    </head>

    <body>

        <table>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
            </tr>

            <?php
            foreach ($allData as $value) {
                echo '<tr>';
                $user = new User();
                $user->setAndPrint('firstname', $value['firstname']);
                $user->setAndPrint('lastname', $value['lastname']);
                $user->setAndPrint('email', $value['email']);
                echo '</tr>';
            }
            ?>
        </table>

    </body>
</html>