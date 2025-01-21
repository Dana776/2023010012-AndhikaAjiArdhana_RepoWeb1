<!-- header -->
 <?php include "../header.php" ?>
 <?php
if(isset($_GET['delete'])) {
    $userid = $_GET['delete'];
    ///sql delete
    $query = "DELETE FROM users WHERE id=$userid";
    $delete_query = mysqli_query($koneksi, $query);
    header("Location: home.php");
}
 ?>
 <!-- footer -->
  <?php include "footer.php" ?>