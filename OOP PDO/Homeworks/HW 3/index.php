<?php

include('connection.php');
include('user.php');
// include('insert.php');


try {
    $selectData = $connect->prepare('SELECT * FROM users');
    $selectData->execute();
    $selectData->setFetchMode(PDO::FETCH_ASSOC);
    $allData = $selectData->fetchAll();
} catch (PDOException $e) {
    echo $e->getMessage();
}

$obj_User0 = new User();
$obj_User1 = new User();
$obj_User2 = new User();

$user0 = [
    'firstname' => $obj_User0->setAndPrint('firstname', $allData[0]['firstname']),
    'lastname' => $obj_User0->setAndPrint('lastname', $allData[0]['lastname']),
    'email' => $obj_User0->setAndPrint('email', $allData[0]['email'])
];

$user1 = [
    'firstname' => $obj_User1->setAndPrint('firstname', $allData[1]['firstname']),
    'lastname' => $obj_User1->setAndPrint('lastname', $allData[1]['lastname']),
    'email' => $obj_User1->setAndPrint('email', $allData[1]['email'])
];

$user2 = [
    'firstname' => $obj_User2->setAndPrint('firstname', $allData[2]['firstname']),
    'lastname' => $obj_User2->setAndPrint('lastname', $allData[2]['lastname']),
    'email' => $obj_User2->setAndPrint('email', $allData[2]['email'])
];

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
            <tr>
                <td><?= $user0['firstname'] ?></td>
                <td><?= $user0['lastname'] ?></td>
                <td><?= $user0['email'] ?></td>
            </tr>
            <tr>
                <td><?= $user1['firstname'] ?></td>
                <td><?= $user1['lastname'] ?></td>
                <td><?= $user1['email'] ?></td>
            </tr>
            <tr>
                <td><?= $user2['firstname'] ?></td>
                <td><?= $user2['lastname'] ?></td>
                <td><?= $user2['email'] ?></td>
            </tr>
        </table>

    </body>
</html>