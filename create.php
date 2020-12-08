<?php
include 'inc/header.php';
require_once 'users/users.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = createUser($_POST);
    uploadImage($_FILES['picture'], $user);
    header("Location: index.php");
}

?>


<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>CREATE NEW USER</b></h3>
        </div>
        <div class="card-body">

            <form method="post" enctype="multipart/form-data" action="">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" required name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" required name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" required name="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label>Website</label>
                    <input type="text" required name="website" class="form-control">
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