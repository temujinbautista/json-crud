<?php
include 'inc/header.php';
require_once 'users/users.php';

$uid = $_GET['uid'];
if (!isset($_GET['uid'])) {
    include 'inc/notfound.php';
    exit;
}


$user = getUserById($uid);
if (!$user) {
    include 'inc/notfound.php';
    exit;
}

?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>
                <b><img style="width: 60px" src="<?php echo "users/images/${user['id']}.${user['extension']}" ?>" alt=""></b>
                VIEWING: <b><?php echo $user['name']; ?></b>
            </h3>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <td>Name:</td>
                    <td><?php echo $user['name']; ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?php echo $user['email']; ?></td>
                </tr>
                <tr>
                    <td>Phone No.:</td>
                    <td><?php echo $user['phone']; ?></td>
                </tr>
                <tr>
                    <td>Website:</td>
                    <td><a target="_blank" href="http://<?php echo $user['website']; ?>"><?php echo $user['website']; ?></a></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="index.php?" class="btn btn-outline-success">BACK</a>
                        <a href="update.php?uid=<?php echo $user['id']; ?>" class="btn btn-outline-secondary">UPDATE</a>
                        <a href="delete.php?uid=<?php echo $user['id']; ?>" class="btn btn-outline-danger">DELETE</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>


<?php include 'inc/footer.php'; ?>