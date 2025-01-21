<?php
include '../../db.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $ket1 = $_POST['ket1'];
    $ket2 = $_POST['ket2'];
    $pengalaman = $_POST['pengalaman'];
    $booking = $_POST['booking'];

    // File berhasil diunggah, lakukan pembaruan
    $stmt = $koneksi->prepare("UPDATE about SET ket1 = ?, ket2 = ?, pengalaman = ?, booking = ? WHERE id = ?");
    $stmt->bind_param("ssiii", $ket1,  $ket2, $pengalaman, $booking, $id);

    if ($stmt->execute()) {
        // Redirect ke halaman tabel dengan pesan sudah
        header("Location: ../../tb_about.php?update-berhasil=1");
         exit();
    } else {
        // Redirect ke halaman tabel dengan pesan gagal
        header("Location: ../../tb_about.php?update-gagal=1");
        exit();
    }
 } else {
         // Jika file gagal diunggah
        header("Location: ../../tb.php?gagal=1");
        exit();
}

?>
