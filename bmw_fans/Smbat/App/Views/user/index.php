<div class="container">
    <h2>Users List</h2>
    <table class="table table-condensed">
        <thead>
        <tr>
            <th>ID</th>
            <th>UserName</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($users)) {
            foreach ($users as $user) {
                $buttons = "";
                if (\Core\Auth::isAdmin() || $user->id == \Core\Auth::getId()) {
                    $buttons = "<a class='btn btn-xs btn-warning' href='/user/edit/$user->id'>Edit</a>
                    <button class='btn btn-xs btn-danger delete-user' data-id='$user->id'>Delete</button>";
                }
                echo "<tr>
                <td>$user->id</td>
                <td>$user->username</td>
                <td>$user->email</td>
                <td>
                    <a class='btn btn-xs btn-primary' href='/user/show/$user->id'>Show</a>
                    $buttons
                </td>
            </tr>";
            }
        } ?>
        </tbody>
    </table>
</div>