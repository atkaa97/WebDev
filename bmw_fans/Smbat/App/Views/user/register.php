<h2>Registration</h2>

<form action="/?route=user/login-submit" method="post">
	<div class="form-group">
		<label for="username" class="control-label">
			Username
		</label>
		<input type="text" class="form-control" name="username" id="username">
	</div>
	<div class="form-group">
		<label for="email" class="control-label">
			Email
		</label>
		<input type="email" class="form-control" name="email" id="email">
	</div>
	<div class="form-group">
		<label for="password" class="control-label">
			Password
		</label>
		<input type="password" class="form-control" name="password" id="password">
	</div>

	<input type="submit" value="Register" class="btn btn-primary">
</form>
