<?php $this->start('head') ?>
<?php $this->setSiteTitle('Registration') ?>
<?php $this->setSiteIcon('user') ?>
<?php $this->end() ?>

<?php $this->start('body') ?>
<div class='col-md-6'>
    <form class="form" action="#" method="post">
        <h3 class="text-center p-2 text-primary">Registration</h3>
        <div class="form-group col-md-12">
            <label for="user_name">Username</label>
            <input type="text" name="user_name" id="user_name" value="" class="form-control mb-4"
                   placeholder="<?=Valid::errorPlaceholder('user_name',5)?>" >
        </div>
        <div class="form-group col-md-12">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="" class="form-control mb-4"
                   placeholder="<?=Valid::errorPlaceholder('email',6)?>" >
        </div>
        <div class="form-group col-md-6">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" value=""
                   class="form-control mb-4 " placeholder="<?=Valid::errorPlaceholder('first_name',2)?>">
        </div>
        <div class="form-group col-md-6">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" value="" class="form-control mb-4"
                   placeholder="<?=Valid::errorPlaceholder('last_name',2)?>" >
        </div>
        <div class="form-group col-md-6">
            <label for="age">Age</label>
            <input type="number" name="age" id="age" value="" class="form-control mb-4"
                   placeholder="<?=Valid::errorPlaceholder('age')?>">
        </div>
        <div class="form-group col-md-6">
            <label for="phone">Phone</label>
            <input type="number" name="phone" id="phone" value="" class="form-control mb-4"
                   placeholder="<?=Valid::errorPlaceholder('phone',6)?>">
        </div>
        <div class="form-group col-md-12">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="" class="form-control mb-4"
                   placeholder="<?=Valid::errorPlaceholder('password',6)?>">
        </div>
        <div class="form-group col-md-12">
            <input type="submit" value="Register" name="register" class="btn btn-primary btn-block">
        </div>
    </form>
</div>

<?php
//dd(Valid::$errorBool);
$this->end();
//Test::setInfo();
?>

