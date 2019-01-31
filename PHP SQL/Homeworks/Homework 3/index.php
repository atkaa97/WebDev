<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='icon' href="https://cdn4.iconfinder.com/data/icons/scripting-and-programming-languages/512/php-512.png">
    <title>PHP | Homework 3</title>
    <style>
        table {
            width: 80%;
            margin:0 auto;
        }

        th,td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        i{
            color:orangered;
            padding-left: 10px;
        }
    </style>
</head>
<body>
    <?php
        $formOrResult = false;
        $errorText = 'Please Enter Your';
        $errors = [];
        $errors['name'] =  isset($_POST['submit']) && empty($_POST['name']) ? '<i> ' . $errorText . ' Name </i>' : '';
        $errors['surname'] = isset($_POST['submit']) && empty($_POST['surname']) ? '<i> ' . $errorText . ' SurName </i>' : '';
        $errors['age'] =  isset($_POST['submit']) && empty($_POST['age']) ? '<i> ' . $errorText . ' Age </i>' : '';
        $errors['email'] =  isset($_POST['submit']) && empty($_POST['email']) ? '<i> ' . $errorText . ' Email </i>' : '';
        $errors['number'] =  isset($_POST['submit']) && empty($_POST['number']) ? '<i> ' . $errorText . ' Number </i>' : '';
        $errors['gender'] =  isset($_POST['submit']) && !isset($_POST['gender']) ? '<i> ' . $errorText . ' Gender </i>' : '';
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

        function returnOldValue($name){
            return isset($_POST[$name]) ? $_POST[$name] : '';
        }

        function checkRadio($name, $current){
            return isset($_POST[$name]) && $_POST[$name] == $current ? 'checked' : '';
        }
    ?>
    <?php if($formOrResult) :?>
        <table>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Age</th>
                <th>E-mail</th>
                <th>Gender</th>
                <th>Phone Number</th>
                <th>Work Experience</th>
            </tr>
            <tr>
                <td><?= $_POST['name']?></td>
                <td><?= $_POST['surname']?></td>
                <td><?= $_POST['age']?></td>
                <td><?= $_POST['email']?></td>
                <td><?= $_POST['gender']?></td>
                <td><?= $_POST['number']?></td>
                <td><?= isset($_POST['workexp']) ? $_POST['workexp']: '-'  ?></td>
            </tr>
        </table>
    <?php else:?>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'])?>" method='POST' id='form'>
            <label for="name">Name: </label>
                <input type="text" id='name' name ='name' value="<?= returnOldValue('name') ?>">
                <?= $errors['name']  ?><br><br>
            <label for="surname">Surname: </label> 
                <input type="text" id='surname' name ='surname' value="<?= returnOldValue('surname') ?>">
                <?= $errors['surname']  ?><br><br>
            <label for="age">Age: </label>
                <input type="number" id='age' name ='age' value="<?= returnOldValue('age') ?>">
                <?= $errors['age']  ?><br><br>
            <label for="email">E-mail: </label>
                <input type="email" id='email' name ='email' value="<?= returnOldValue('email') ?>">
                <?= $errors['email']  ?><br><br>
            <label>Gender: </label>
                <input type="radio" id="male" <?= checkRadio('gender', 'Male')?> name="gender" value='Male'><label for="male">Male </label> 
                <input type="radio" id="female" <?= checkRadio('gender', 'Female')?> name="gender" value='Female'><label for="female">Female </label>
                <?= $errors['gender']  ?><br><br>
            <label for="number">Phone Number: </label>
                <input type="number" id='number' name ='number' value="<?= returnOldValue('number') ?>">
                <?= $errors['number']  ?><br><br>
            <label>Work Experience:</label><br>
                <input type="checkbox" name="workexp" value="Have" id ='workexp'><label for='workexp'>Have</label><br><br>
            <button type='submit' name="submit">Submit</button>
        </form>
    <?php endif;?>
</body>

</html>
