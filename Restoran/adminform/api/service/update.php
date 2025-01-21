<?php
session_start();
include '../../db.php';

// Menangkap data dari form update user
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $ketchef = $_POST['ketchef'];
    $ketmakanan = $_POST['ketmakanan'];
    $ketorder = $_POST['ketorder'];
    $ketlayanan = $_POST['ketlayanan'];


    // Update query
    $stmt = $koneksi->prepare("UPDATE tb_service SET ket_chef = ?, ket_makanan = ?, ket_order = ?, ket_layanan = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $ketchef, $ketmakanan, $ketorder, $ketlayanan, $id);
    
    if($stmt->execute()) {
        // Redirect ke halaman table user
        header("Location:../../tb_service.php?success_update=1");
        exit();
    } else {
        header("Location:../../tb_service.php?error_update=1");
        exit();
    }
    
    $stmt->close();
}
?>