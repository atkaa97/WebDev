<?php $this->start('head') ?>
<?php $this->setSiteTitle('Log In') ?>
<?php $this->setSiteIcon('login') ?>
<?php $this->end() ?>

<?php $this->start('body') ?>
<div class='col-md-4 card m-3 m-auto mt-lg-3'>
    <form class="form" action="#" method="post">
        <h3 class="text-center p-2 text-primary">Log In</h3>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="" class="form-control mb-4">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="" class="form-control mb-4">
        </div>
        <div class="form-group">
            <label for="remember_me">Remember Me <input type="checkbox" id="remember_me" name="remeber_me" value="on"></label>
        </div>
        <div class="form-group">
            <input type="submit" value="Login" class="btn btn-primary btn-block">
        </div>
    </form>
</div>

<?php $this->end() ?>
