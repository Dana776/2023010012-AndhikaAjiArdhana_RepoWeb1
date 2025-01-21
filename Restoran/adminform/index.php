<?php
session_start();
include 'db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  //cari user berdasakan username
  if (!empty($username)) {
    // Query untuk mencari user berdasarkan username
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("s", $username); // Bind parameter dengan tipe string (s)
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    //validasi password
    if($user && password_verify($password, $user['password'])) {
      //simpan data ke session
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['role'] = $user['role'];
      $_SESSION['created_at'] = $user['created_at'];
      $_SESSION['updated_at'] = $user['updated_at'];


      //redirect ke tables users
      header("Location: tables.php");
      exit();
    }else{
      header("Location:index.php?error=1");
      exit();
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LOGIN</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta2/css/bootstrap.min.css">

</head>

<body class="bg bg-secondary">

    <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="card my-5">
    
              <form action="" method="POST" class="card-body cardbody-color p-lg-5">
    
                <div class="text-center">
                  <img src="img/logo-login.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3 border-primary"
                    width="200px" alt="profile">
                    <h3 class="h3 text-primary">Halaman Login</h3>
                </div>
                <?php
                    if(isset($_GET['not_authorized']) && $_GET['not_authorized'] == 1) {
                        echo "<div class='alert alert-danger w-100' role='alert'>Anda bukan Admin!</div>";
                    }
                    if(isset($_GET['error']) && $_GET['error'] == 1){
                        echo "<div class='alert alert-danger w-100' role='alert'>Username Atau Password Salah!</div>";
                    }
                    if(isset($_GET['belum_login']) && $_GET['belum_login'] == 1){
                      echo "<div class='alert alert-danger w-100' role='alert'>Kamu Belum Login!</div>";
                  }
                  if(isset($_GET['bukan-admin']) && $_GET['bukan-admin'] == 1){
                    echo "<div class='alert alert-danger w-100' role='alert'>Kamu Bukan Admin!</div>";
                  }
                    ?>
                <div class="mb-3">
                  <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp"
                    placeholder="Masukkan Username">
                </div>
                <div class="mb-3">
                  <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Password">
                </div>
                <div class="text-center"><button type="submit" class="btn btn-lg btn-primary px-5 mb-5 w-100">Login</button></div>
              </form>
            </div>
    
          </div>
        </div>
      </div>
      
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>