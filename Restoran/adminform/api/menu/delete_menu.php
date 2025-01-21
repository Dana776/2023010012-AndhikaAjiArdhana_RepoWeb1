<?php
include '../../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];

    $stmt = $koneksi->prepare("DELETE FROM menus WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ../../tables.php?delete-berhasil=1");
        exit();
    } else {
        header("Location: ../../tables.php?delete-gagal=1");
        exit();
    }
    $stmt->close();
}
?>
