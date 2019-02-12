<h2>Registration</h2>

<form action="/auth/registerSubmit" method="post">
    <div class="form-group">
        <label for="username" class="control-label">
            Username
        </label>
        <input type="text" class="form-control" name="username" id="username"
               value="<?= isset(session()->get('old')['username']) ? session()->get('old')['username'] : ''; ?>">
        <?php if (isset(session()->get('errors')['username'])) : ; ?>
            <p class="help-block">
                <span class="text-danger">
                <?php foreach (session()->get('errors')['username'] as $key => $value): ?>
                    <?= $value; ?>
                    <br>
                <?php endforeach; ?>
                </span>
            </p>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="email" class="control-label">
            Email
        </label>
        <input type="email" class="form-control" name="email" id="email"
               value="<?= isset(session()->get('old')['email']) ? session()->get('old')['email'] : ''; ?>">
        <?php if (isset(session()->get('errors')['email'])) : ; ?>
            <p class="help-block">
                <span class="text-danger">
                <?php foreach (session()->get('errors')['email'] as $key => $value): ?>
                    <?= $value; ?>
                    <br>
                <?php endforeach; ?>
                </span>
            </p>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="first_name" class="control-label">
            First Name
        </label>
        <input type="text" class="form-control" name="first_name" id="first_name"
               value="<?= isset(session()->get('old')['first_name']) ? session()->get('old')['first_name'] : ''; ?>">
        <?php if (isset(session()->get('errors')['first_name'])) : ; ?>
            <p class="help-block">
                <span class="text-danger">
                <?php foreach (session()->get('errors')['first_name'] as $key => $value): ?>
                    <?= $value; ?>
                    <br>
                <?php endforeach; ?>
                    </span>
            </p>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="last_name" class="control-label">
            Last Name
        </label>
        <input type="text" class="form-control" name="last_name" id="last_name"
               value="<?= isset(session()->get('old')['last_name']) ? session()->get('old')['last_name'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="age" class="control-label">
            Age
        </label>
        <input type="number" class="form-control" name="age" id="age"
               value="<?= isset(session()->get('old')['age']) ? session()->get('old')['age'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="password" class="control-label">
            Password
        </label>
        <input type="password" class="form-control" name="password" id="password">
        <?php if (isset(session()->get('errors')['password'])) : ; ?>
            <p class="help-block">
                <span class="text-danger">
                <?php foreach (session()->get('errors')['password'] as $key => $value): ?>
                    <?= $value; ?>
                    <br>
                <?php endforeach; ?>
                    </span>
            </p>
        <?php endif; ?>
    </div>

    <input type="submit" value="Register" class="btn btn-primary">
</form>
