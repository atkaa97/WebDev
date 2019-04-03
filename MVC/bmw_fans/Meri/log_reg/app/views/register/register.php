<?php $this->start('head');?>
<?php $this->end();?>
<?php $this->start('body');?>
<div class="col-md-6 col-md-offset-3  well">
    <h3 class="text-center">Register Here</h3>
    <form class="form" action ="<?=PROOT?>register/login" method="post">
        <div class="bg-danger"><?=$this->displayErrors ?></div>
        <div class="form-group">
            <label for="first_name">First_name</label>
            <input type="text" name="first_name" id="first_name"  class="form-control" value="<?=$this->post['first_name']?>">
        </div>
        <div class="form-group">
            <label for="last_name">Last_name</label>
            <input type="text" name="last_name" id="last_name"  class="form-control" value="<?=$this->post['last_name']?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email"  class="form-control" value="<?=$this->post['email']?>" >
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username"  class="form-control" value="<?=$this->post['username']?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password"  class="form-control" value="<?=$this->post['password']?>">
        </div>
        <div class="form-group">
            <label for="confirm">Confirm Password</label>
            <input type="password" name="confirm" id="confirm"  class="form-control" value="<?=$this->post['confirm']?>">
        </div>
        <div class="pull-right">
            <input type="submit" value="Register" class="btn btn-large btn-primary">
        </div>
    </form>
</div>
<?php $this->end();?>

