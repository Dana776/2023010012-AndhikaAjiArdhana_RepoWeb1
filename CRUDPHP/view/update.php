<!-- header -->
 <?php include "../header.php" ?>

 <?php
 //cek apakah id nya sudah terambil
 if(isset($_GET['user_id'])) {
    $userid = $_GET['user_id'];
 }

 // SQL query mengambil semua data dari table where id=$userid
$query = "SELECT * FROM users WHERE ID = $userid";
$view_users = mysqli_query($koneksi, $query);

while($row = mysqli_fetch_assoc($view_users)) {
    $id = $row['ID'];
    $user = $row['username'];
    $email = $row['email'];
    $pass = $row['password'];
}

//proses data ketika from di submit
    if (isset($_POST['update'])) {
        $user = $_POST['user'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $query = "UPDATE users SET username = '{$user}', email ='{$email}' , password = '{$pass}' WHERE id = $userid";
        $update_user = mysqli_query($koneksi, $query);
        echo "<script type='text/javascript'>alert('User data updated successfully!');</script>";
}


?>

<h1 class="text-center">Update User Details</h1>
<div class="container ">
    <form action="" method="post">
        <div class="form-group">
            <label for="user">Username</label>
            <input type="text" name="user" class="form-control" value="<?php echo $user ?>">
        </div>
        <div class="form-group">
            <label for="email">Email ID</label>
            <input type="text" name="email" class="form-control" value="<?php echo $email ?>">
        </div>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
        else.</small>
        <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" name="pass" class="form-control" value="<?php echo $pass ?>">
        <div class="form-group">
            <input type="submit" name="update" class="btn btn-primary mt-2" value="Update">
        </div>
    </form>
</div>

<!-- a BACK button to go to the home page -->
<div class="container text-center mt-5">
<a href="home.php" class="btn btn-warning mt-5"><i class="bi bi-back"></i> Back
</a>
<div>
<!-- Footer -->
<?php include "../footer.php" ?>