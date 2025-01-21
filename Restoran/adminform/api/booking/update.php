<?php
session_start();
include '../../db.php';

// Menangkap data dari form update user
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cust_id = $_POST['id'];
    $nama_customer = $_POST['nama'];
    $status = $_POST['status'];


    // Update query
    $stmt = $koneksi->prepare("UPDATE bookings SET nama_customer = ?, status = ? WHERE id = ?");
    $stmt->bind_param("ssi", $nama_customer, $status, $cust_id);
    
    if($stmt->execute()) {
        // Redirect ke halaman table user
        header("Location: ../../tb_booking.php?success=1");
        exit();
    } else {
        header("Location:../../tb_booking.php?gagal=1");
        exit();
    }
    
    $stmt->close();
}
?>