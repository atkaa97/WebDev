<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="col-md-6 col-md-offset-3  well">
   <form class="form" action ="<?=PROOT?>register/login" method="post">
        <div class="bg-danger"><?=$this->displayErrors ?></div>
        <h3 class="text-center">Log In</h3>
        <div class="form-group has-error">
            <label for="username">Username</label>
            <input type="text" name="username" id="username"  class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password"  class="form-control">
        </div>
        <!--
        <div class="form-group">
            <label for="first_name">First_name</label>
            <input type="text" name="first_name" id="first_name"  class="form-control">
        </div>
        <div class="form-group">
            <label for="last_name">Last_name</label>
            <input type="text" name="last_name" id="last_name"  class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email"  class="form-control">
        </div>
        -->
        <div class="form-group">
            <input type="submit" value="Login" class="btn btn-large btn-primary">
        </div>
        <div class="text-right">
            <a href="<?=PROOT?>register/register" class="text-primary">Register</a>
        </div>
    </form>
</div>
<?php $this->end(); ?>


