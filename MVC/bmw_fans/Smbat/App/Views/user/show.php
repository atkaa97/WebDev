<div class="container">
    <h2>Username: <?= $user->username ?></h2>
    <h4>Email: <strong><?= $user->email ?></strong></h4>
    <h4>First Name: <strong><?= $user->first_name ?></strong></h4>
    <h4>Last Name: <strong><?= $user->last_name ?></strong></h4>
    <h4>Age: <strong><?= $user->age ?></strong></h4>
    <h4>Admin: <strong><?= $user->is_admin ? 'Yes' : 'No' ?></strong></h4>
    <?php if (\Core\Auth::isAdmin() || $user->id == \Core\Auth::getId()) {
        echo "<div class='pull-right'>
            <a class='btn btn-warning' href='/user/edit/$user->id'>Edit</a>
            <button class='btn btn-danger delete-user' data-page='show' data-id='$user->id'>Delete</button>
            </div>";
    } ?>
</div>
