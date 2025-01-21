<?php
session_start();
include '../../db.php';


// Menangkap data dari form delete user
if($_SERVER['REQUEST_METHOD'] === 'GET') {
    $cust_id = $_GET['id'];

    // Delete query
    $stmt = $koneksi->prepare("DELETE FROM bookings WHERE id = ?");
    $stmt->bind_param("i", $cust_id);
    
    if($stmt->execute()) {
        // Redirect ke halaman table user
        header("Location:../../tb_booking.php?delete-berhasil=1");
        exit();
    } else {
        header("Location:../../tb_booking.php?delete-gagal=1");
        exit();
    }
    
    $stmt->close();
}
?>