<?php
require_once 'users/users.php';

$users = getUsers();
include 'inc/header.php';

?>
<div class="container">
    <div class="card">
        <p><a href="create.php?" class="btn btn-success">CREATE NEW USER</a></p>
        <table class="table">
            <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Website</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>

                    <tr>
                        <td>
                            <?php if (isset($user['extension'])) : ?>
                                <img style="width: 60px" src="<?php echo "users/images/${user['id']}.${user['extension']}" ?>" alt="">
                            <?php endif; ?>
                        </td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['phone']; ?></td>
                        <td>
                            <a target="_blank" href="http://<?php echo $user['website']; ?>"><?php echo $user['website']; ?></a>
                        </td>
                        <td>
                            <a href="view.php?uid=<?php echo $user['id']; ?>" class="btn btn-sm btn-outline-info">VIEW</a>
                            <a href="update.php?uid=<?php echo $user['id']; ?>" class="btn btn-sm btn-outline-secondary">UPDATE</a>
                            <a href="delete.php?uid=<?php echo $user['id']; ?>" class="btn btn-sm btn-outline-danger">DELETE</a>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'inc/footer.php'; ?>