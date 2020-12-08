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
        updateUser($_POST, $uid);
        uploadImage($_FILES['picture'], $user);
        header("Location: index.php");
}

?>


<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>
                <b><img style="width: 60px" src="<?php echo "users/images/${user['id']}.${user['extension']}" ?>" alt=""></b>
                UPDATING: <b><?php echo $user['name']; ?></b>
            </h3>
        </div>
        <div class="card-body">

            <form method="post" enctype="multipart/form-data" action="">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" required name="name" value="<?php echo $user['name']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" required name="email" value="<?php echo $user['email']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" required name="phone" value="<?php echo $user['phone']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Website</label>
                    <input type="text" required name="website" value="<?php echo $user['website']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="picture" class="form-control-file">
                </div>
                <div class="form-group">
                    <a href="index.php?" class="btn btn-outline-success">BACK</a>
                    <button class="btn btn-secondary float-right">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>