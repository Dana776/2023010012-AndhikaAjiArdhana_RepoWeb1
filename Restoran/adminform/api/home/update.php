<?php
session_start();
include '../../db.php';

// Menangkap data dari form update user
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $judul1 = $_POST['judul1'];
    $judul2 = $_POST['judul2'];
    $keterangan = $_POST['keterangan'];


    // Update query
    $stmt = $koneksi->prepare("UPDATE home SET judul1 = ?, judul2 = ?, keterangan = ? WHERE id = ?");
    $stmt->bind_param("sssi", $judul1, $judul2, $keterangan, $id);
    
    if($stmt->execute()) {
        // Redirect ke halaman table user
        header("Location:../../tb_home.php?success_update=1");
        exit();
    } else {
        header("Location:../../tb_users.php?error_update=1");
        exit();
    }
    
    $stmt->close();
}
?>