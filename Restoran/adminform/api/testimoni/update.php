<?php
session_start();
include '../../db.php';

// Menangkap data dari form update user
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $via = $_POST['via'];
    $keterangan = $_POST['keterangan'];


    // Update query
    $stmt = $koneksi->prepare("UPDATE tb_testimoni SET nama = ?, via = ?, keterangan = ? WHERE id = ?");
    $stmt->bind_param("sssi", $nama, $via, $keterangan, $id);
    
    if($stmt->execute()) {
        // Redirect ke halaman table user
        header("Location:../../tb_testimoni.php?success_update=1");
        exit();
    } else {
        header("Location:../../tb_testimoni.php?error_update=1");
        exit();
    }
    
    $stmt->close();
}
?>