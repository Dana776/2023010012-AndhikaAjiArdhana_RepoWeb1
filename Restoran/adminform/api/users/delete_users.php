<?php
session_start();
include '../../db.php';

// Validasi Hanya Admin yang dapat menghapus user
if($_SESSION['role'] !== 'admin'){
    header("Location: ../../index.php?error=not_authorized");
    exit();
}

// Menangkap data dari form delete user
if($_SERVER['REQUEST_METHOD'] === 'GET') {
    $user_id = $_GET['id'];

    // Delete query
    $stmt = $koneksi->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    
    if($stmt->execute()) {
        // Redirect ke halaman table user
        header("Location:../../tb_users.php?success_delete=1");
        exit();
    } else {
        header("Location:../../tb_users.php?error_delete=1");
        exit();
    }
    
    $stmt->close();
}
?>