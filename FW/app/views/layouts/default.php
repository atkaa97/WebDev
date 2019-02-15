<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->siteTitle() ?></title>
    <link rel="icon" href="/public/img/<?= $this->siteIcon() ?>.png">
    <?= $this->content('head'); ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        body {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABZ0RVh0Q3JlYXRpb24gVGltZQAxMC8yOS8xMiKqq3kAAAAcdEVYdFNvZnR3YXJlAEFkb2JlIEZpcmV3b3JrcyBDUzVxteM2AAABHklEQVRIib2Vyw6EIAxFW5idr///Qx9sfG3pLEyJ3tAwi5EmBqRo7vHawiEEERHS6x7MTMxMVv6+z3tPMUYSkfTM/R0fEaG2bbMv+Gc4nZzn+dN4HAcREa3r+hi3bcuu68jLskhVIlW073tWaYlQ9+F9IpqmSfq+fwskhdO/AwmUTJXrOuaRQNeRkOd5lq7rXmS5InmERKoER/QMvUAPlZDHcZRhGN4CSeGY+aHMqgcks5RrHv/eeh455x5KrMq2yHQdibDO6ncG/KZWL7M8xDyS1/MIO0NJqdULLS81X6/X6aR0nqBSJcPeZnlZrzN477NKURn2Nus8sjzmEII0TfMiyxUuxphVWjpJkbx0btUnshRihVv70Bv8ItXq6Asoi/ZiCbU6YgAAAABJRU5ErkJggg==);
        }

        footer {
            background-color: #0f334a;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 35px;
            text-align: center;
            color: #CCC;
        }

        footer p {
            padding: 10.5px;
            margin: 0px;
            line-height: 100%;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-light">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/preview">Social Site</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="/home">Home</a></li>
            <li><a href="/about">About Us</a></li>
            <li><a href="/contacts">Contacts</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/user/register"><span class="glyphicon glyphicon-user"></span> Register</a></li>
            <li><a href="/user/login"><span class="glyphicon glyphicon-log-in"></span> Log In</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <?= $this->content('body'); ?>
</div>
<footer>
    <p>© 2019 <a style="color:#0a93a6; text-decoration:none;" href="/preview"> Social Site</a> | All Rights Reserved.
        </p>
</footer>

</body>
</html>