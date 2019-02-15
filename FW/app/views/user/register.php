<?php $this->start('head') ?>
<?php $this->setSiteTitle('Registration') ?>
<?php $this->setSiteIcon('user') ?>
<?php $this->end() ?>

<?php $this->start('body') ?>
<div class='col-md-4 card m-3 m-auto mt-lg-3'>
    <form class="form" action="#" method="post">
        <h3 class="text-center p-2 text-primary">Registration</h3>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="" class="form-control mb-4">
        </div>
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" value="" class="form-control mb-4">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" value="" class="form-control mb-4">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="" class="form-control mb-4">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="" class="form-control mb-4">
        </div>
        <div class="form-group">
            <input type="submit" value="Register" class="btn btn-primary btn-block">
        </div>
    </form>
</div>

<?php $this->end() ?>
