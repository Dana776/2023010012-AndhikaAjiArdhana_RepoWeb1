<?php
session_start();
include '../../db.php';

// Validasi Hanya Admin yang dapat menambah user
if($_SESSION['role'] !== 'admin'){
    header("Location: ../../index.php?error=not_authorized");
    exit();
}

//Menangkap data dari form tambah user
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    //validasi role hanya 'admin' dan 'staff'
    if(!in_array($role, ['admin', 'staff'])) {
        header("Location:../../index.php?error=1");
        exit();
    }

    $stmt = $koneksi->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss",$username, $password, $role);
    if($stmt->execute()) {
        //redirect ke halaman table user
        header("Location:../../tb_users.php?success=1");
        exit();
    }else{
        header("Location:../../tb_users.php?gagal=1");
        exit();
    }
    $stmt->close();
}
?>