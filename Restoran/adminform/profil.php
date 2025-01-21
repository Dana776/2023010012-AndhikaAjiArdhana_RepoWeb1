<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // Jika tidak, redirect ke halaman login
    header("Location: index.php?belum_login=1");
    exit();
}
include 'db.php';
?>
<?php include 'partials/header.php'?>
<div id="content-wrapper">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4 class="text-primary">User Profile</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" value="<?php echo $_SESSION['username']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" value="<?php echo '********'; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="created_at">Created At:</label>
                        <input type="text" class="form-control" id="created_at" value="<?php echo $_SESSION['created_at']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="updated_at">Updated At:</label>
                        <input type="text" class="form-control" id="updated_at" value="<?php echo $_SESSION['updated_at']; ?>" readonly>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="tables.php" class="btn btn-warning btn-icon-split border border-dark"><span class="icon text-white-50"><i class="fas fa-arrow-alt-circle-left"></i></span> <span class="text">Kembali</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'?>
