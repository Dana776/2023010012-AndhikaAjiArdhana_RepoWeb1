<!-- header -->
 <?php include '../header.php'?>

 <h1 class="text-center">User Details</h1>
 <div class="container">
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                //kita cek dahulu menggunakan 'isset() func apakah variable id sudah di ambil
                //memproses form data ketika form di submit
                if(isset($_GET['user_id'])){
                    //kita ambil id user
                    $userid = $_GET['user_id'];
                    
                    //QUery Sql untuk menampilkan dat dimana id=$userid & storing data in view_user
                    $query = "SELECT * FROM users WHERE ID = {$userid}";
                    $view_users = mysqli_query($koneksi, $query);

                    while($row = mysqli_fetch_assoc($view_users)) {
                        $id = $row['ID'];
                        $user = $row['username'];
                        $email = $row['email'];
                        $pass = $row['password'];
                        echo "<tr >";
                        echo " <td >{$id}</td>";
                        echo " <td > {$user}</td>";
                        echo " <td > {$email}</td>";
                        echo " <td >{$pass} </td>";
                        echo " </tr> ";
                    }

                }
                ?>
            </tr>
        </tbody>
    </table>
 </div>

 <!-- a BACK Button to go to pervious page -->
<div class="container text-center mt-5">
<a href="home.php" class="btn btn-warning mt-5"> Back
</a>
<div>
<!-- Footer -->
<?php include "../footer.php" ?>