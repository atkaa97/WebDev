<h2>Login</h2>

<form action="/?route=user/login-submit" method="post">
	<div class="form-group <?= isset(session()->get('errors')['email']) ? 'has-error' : '';?>">
		<label for="email" class="control-label">
			Email
		</label>
		<input type="email" class="form-control" name="email" id="email" value="<?= isset(session()->get('old')['email']) ? session()->get('old')['email'] : ''; ?>">
		<?php if (isset(session()->get('errors')['email'])) : ;?>
			<p class="help-block">
				<?php foreach (session()->get('errors')['email'] as $key => $value): ?>
					<?= $value; ?>
					<br>
				<?php endforeach;?>
			</p>
		<?php endif;?>
	</div>
	<div class="form-group <?= isset(session()->get('errors')['password']) ? 'has-error' : '';?>">
		<label for="password" class="control-label">
			Password
		</label>
		<input type="password" class="form-control" name="password" id="password">
		<?php if (isset(session()->get('errors')['password'])) : ;?>
			<p class="help-block">
				<?php foreach (session()->get('errors')['password'] as $key => $value): ?>
					<?= $value; ?>
					<br>
				<?php endforeach;?>
			</p>
		<?php endif;?>
	</div>

	<input type="submit" value="Log In" class="btn btn-primary">
</form>
