<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
                <title><?= $this->siteTitle() ?></title>
        <link rel="stylesheet" href="<?= HEAD_PATH ?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= HEAD_PATH ?>css/style.css">
       <link rel="icon" href="--><?//= HEAD_PATH ?><!--img/php.png">  <!-- es xi chelav vor? :D-->
        <?= $this->content('head'); ?>
    </head>

    <body>
        <?= $this->content('body'); ?>

        <script src="<?= HEAD_PATH ?>js/jQuery-3.3.1.min.js"></script>
        <script src="<?= HEAD_PATH ?>js/bootstrap.min.js"></script>
    </body>
</html>