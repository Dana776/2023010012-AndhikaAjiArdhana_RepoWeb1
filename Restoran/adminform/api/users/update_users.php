<?php
session_start();
include '../../db.php';

// Validasi Hanya Admin yang dapat mengupdate user
if($_SESSION['role'] !== 'admin'){
    header("Location: ../../index.php?error=not_authorized");
    exit();
}

// Menangkap data dari form update user
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['id'];
    $username = $_POST['username'];
    $new_password = $_POST['password'];
    $role = $_POST['role'];

    // Validasi role hanya 'admin' dan 'staff'
    if(!in_array($role, ['admin', 'staff'])) {
        header("Location:../../index.php?error=1");
        exit();
    }

    // Hash password baru
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update query
    $stmt = $koneksi->prepare("UPDATE users SET username = ?, password = ?, role = ? WHERE id = ?");
    $stmt->bind_param("sssi", $username, $hashed_password, $role, $user_id);
    
    if($stmt->execute()) {
        // Redirect ke halaman table user
        header("Location:../../tb_users.php?success_update=1");
        exit();
    } else {
        header("Location:../../tb_users.php?error_update=1");
        exit();
    }
    
    $stmt->close();
}
?>