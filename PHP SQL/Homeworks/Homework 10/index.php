<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Speak</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
          crossorigin="anonymous">
    <link rel="icon" href="images/page-icon.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=cyrillic,cyrillic-ext,latin-ext,vietnamese"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:700" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database_name = 'Speak';
date_default_timezone_set('Asia/Yerevan');
$at_this_moment = date('Y-m-d H:i:s', time());

$connect = mysqli_connect($servername, $username, $password, $database_name);
if (!$connect) {
    echo 'Something went wrong! <hr>' . mysqli_connect_error();
    exit;
}
//  $query_create_db = 'CREATE DATABASE Speak';
// if(!mysqli_query($connect,$query_create_db)){
//     echo 'Something went wrong! <hr>' . mysqli_error($connect); exit;
// }

// $query_create_table = 'CREATE TABLE IF NOT EXISTS users(
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     firstname VARCHAR(255) NOT NULL,
//     lastname VARCHAR(255) NOT NULL,
//     email VARCHAR(255) NOT NULL,
//     pw VARCHAR(255) NOT NULL,
//     birthday DATETIME NOT NULL,
//     gender VARCHAR(6) NOT NULL
// )';
// if(!mysqli_query($connect,$query_create_table)){
//     echo 'Something went wrong! <hr>' . mysqli_error($connect); exit;
// }
$query_select_all_data = "SELECT * FROM users";
$result = mysqli_query($connect, $query_select_all_data);
$all_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

$errors = [
    'email' => '',
    'password' => '',
    'signup_firstname' => '',
    'signup_email' => '',
    'signup_password' => '',
    'signup_birthday' => '',
];
$oldValue = [
    'email' => '',
    'signup_firstname' => '',
    'signup_email' => '',
    'signup_birthday' => '',

];
$emailValid = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

if (isset($_POST['login_button'])) {
    $errors['email'] = !preg_match($emailValid, $_POST['email']) ? 'error' : '';
    $errors['password'] = strlen($_POST['password']) <= 6 ? 'error' : '';
    $oldValue['email'] = !preg_match($emailValid, $_POST['email']) ? '' : $_POST['email'];
}

if (isset($_POST['signup_button'])) {
    $errors['signup_password'] = strlen($_POST['signup_password']) <= 6 ? 'error' : '';
    $oldValue['signup_email'] = !preg_match($emailValid, $_POST['signup_email']) ? '' : $_POST['signup_email'];
    function returnOldValue($inputName)
    {
        return $oldValue[$inputName] = empty($_POST[$inputName]) ? '' : $_POST[$inputName];
    }

    $errors['signup_email'] = !preg_match($emailValid, $_POST['signup_email']) ? 'error' : '';
    function returnError($inputName)
    {
        return $errors[$inputName] = empty($_POST[$inputName]) ? 'error' : '';
    }
} else {
    function returnError($inputName)
    {
        return $errors[$inputName] = '';
    }

    function returnOldValue($inputName)
    {
        return $oldValue[$inputName] = '';
    }
}

if (isset($_POST['signup_button'])) {
    $_SESSION['email'] = preg_match($emailValid, $_POST['signup_email']) ? $_POST['signup_email'] : '';

    if ($_POST['signup_firstname'] == '' || $_POST['signup_lastname'] == '' || $oldValue['signup_email'] == '' || $_POST['signup_birthday'] == '' || strlen($_POST['signup_password']) <= 6) {
        $_SESSION['registered'] = false;
    } else {
        // header("Location: index.php");
        $_SESSION['registered'] = true;

        $query_insert_user_info = "INSERT INTO users (firstname, lastname, email, pw, birthday,gender) VALUES ('" . $_POST['signup_firstname'] . "','" . $_POST['signup_lastname'] . "','" . $_POST['signup_email'] . "','" . $_POST['signup_password'] . "','" . $_POST['signup_birthday'] . "','" . $_POST['gender'] . "')";
        mysqli_query($connect, $query_insert_user_info);

        // $query_select_firstname = "SELECT firstname  FROM users WHERE email = '".$_SESSION['email']."' ";
        // $result = mysqli_query($connect, $query_select_firstname);
        // $selected_firstname = mysqli_fetch_array($result, MYSQLI_ASSOC);

    }
}

if (isset($_POST['create_new_account'])) {
    $_SESSION['registered'] = false;
}

if (isset($_POST['email'])) {
    foreach ($all_data as $value) {
        if ($value['email'] == $_POST['email'] && $value['pw'] == $_POST['password']) {
            header("Location: logined.php");
        }
    }
}

?>

<header>
    <div class="header clearfix container">
        <div class="header-left clearfix">
            <div class="header-page-logo">
                <img src="images/header-icon.png" alt="Speak With The World">
            </div>
            <div class="header-page-slogan">
                <span title="Speak With The World">speak</span>
            </div>
        </div>
        <div class="header-right">
            <form action="index.php" method="POST">
                <div class="login-form clearfix">
                    <div class="email-input">
                        <label for="email">Email</label>
                        <input type="text" class='<?= $errors['email'] ?>' name="email" id="email"
                               placeholder="Enter Your E-mail" value='<?= $oldValue['email'] ?>'>
                    </div>
                    <div class="password-input">
                        <label for="password">Password</label>
                        <input type="password" class='<?= $errors['password'] ?>' name="password" id="password"
                               placeholder="Enter Your Password">
                    </div>
                    <div class="login-button">
                        <button type="submit" name="login_button">Log In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</header>
<main>
    <div class="main container clearfix">
        <div class="main-left">
            <div class="main-left-header">
                <h1>speak with the world</h1>
            </div>
            <div class="main-left-banner">
                <img src="images/main-banner.png" alt="Social World" title="Social World">
            </div>
        </div>
        <?php if ($_SESSION['registered'] == true) : ?>
            <div class="main-right-header">
                <h2>you have successfully <br> registered on SPEAK</h2>
                <h3 class='welcomeDear'>Welcome <!-- <?= $selected_firstname['firstname']; ?> --></h3>
                <form action="index.php" method='post'>
                    <button type="submit" id="create_new_account" name="create_new_account">Create A New Account
                    </button>
                </form>
            </div>
        <?php else : ?>
            <div class="main-right">
                <div class="main-right-header">
                    <h1>Create a New Account</h1>
                </div>
                <div class="signup-form">
                    <form action="index.php" method="POST">
                        <input type="text" class='<?= returnError('signup_firstname') ?>' id="signup_firstname"
                               name='signup_firstname' placeholder="First Name"
                               value='<?= returnOldValue('signup_firstname') ?>'>
                        <input type="text" class='<?= returnError('signup_lastname') ?>' id="signup_lastname"
                               name='signup_lastname' placeholder="Last Name"
                               value='<?= returnOldValue('signup_lastname') ?>'>
                        <input type="text" id="signup_email" class='<?= $errors['signup_email'] ?>' name='signup_email'
                               placeholder="E-mail" value='<?= $oldValue['signup_email'] ?>'>
                        <input type="password" class='<?= $errors['signup_password'] ?>' id="signup_password"
                               name='signup_password' placeholder="Password">
                        <label for="signup_dirthday">Birthday</label>
                        <input type="date" class='<?= returnError('signup_birthday') ?>' id="signup_dirthday"
                               name='signup_birthday' value='<?= returnOldValue('signup_birthday') ?>'>
                        <input type="radio" id="male" name="gender" value="male" checked="checked"> <label for="male">
                            Male &nbsp;&nbsp;</label>
                        <input type="radio" id="female" name="gender" value="female"> <label for="female">
                            Female</label>
                        <button type="submit" id="signup_button" name="signup_button">Sign Up</button>
                    </form>
                </div>
            </div>

        <?php endif; ?>

    </div>
</main>

</body>

</html>

