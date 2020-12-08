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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    deleteUser($uid);
    header("Location: index.php");
}
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>
                <b><img style="width: 60px" src="<?php echo "users/images/${user['id']}.${user['extension']}" ?>" alt=""></b>
                DELETING: <b><?php echo $user['name']; ?></b>
            </h3>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="">
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
                            <button class="btn btn-outline-danger">CONFIRM DELETION</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>


<?php include 'inc/footer.php'; ?>