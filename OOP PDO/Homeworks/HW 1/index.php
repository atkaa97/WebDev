<?php
    include('student\student.php');

    $objStudent1 = new Student;
    $objStudent2 = new Student;

    $objStudent1->firstname = 'Arthur';
    $objStudent1->lastname = 'Margarian';
    $objStudent1->yearAtUniversity = 2;
    $objStudent1->age = 21;
    $objStudent1->pension = '0 AMD :(';

    $objStudent2->firstname = 'Anna';
    $objStudent2->lastname = 'Ghazaryan';
    $objStudent2->yearAtUniversity = 2;
    $objStudent2->age = 19;
    $objStudent2->pension = '0 AMD :(';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Students</title>
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
                <th>Age</th>
                <th>Year At University</th>
                <th>Pension</th>
            </tr>
            <tr>
                <td><?= $objStudent1->firstname?></td>
                <td><?= $objStudent1->lastname?></td>
                <td><?= $objStudent1->age?></td>
                <td><?= $objStudent1->yearAtUniversity?></td>
                <td><?= $objStudent1->pension?></td>
            </tr>
            <tr>
                <td><?= $objStudent2->firstname?></td>
                <td><?= $objStudent2->lastname?></td>
                <td><?= $objStudent2->age?></td>
                <td><?= $objStudent2->yearAtUniversity?></td>
                <td><?= $objStudent2->pension?></td>
            </tr>
        </table>

    </body>
</html>