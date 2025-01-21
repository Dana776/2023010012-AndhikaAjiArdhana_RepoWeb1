<?php
include '../../db.php';

function uploadFile($file, $currentImage)
{
    // Jika tidak ada file yang diunggah, kembalikan gambar saat ini
    if ($file['error'] === UPLOAD_ERR_NO_FILE) {
        return $currentImage; // Kembalikan gambar saat ini
    }

    $targetDir = "../../uploads/";
    $fileName = basename($file["name"]);
    $targetFilePath = $targetDir . $fileName;

    // Pindahkan file ke folder uploads
    if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
        return $fileName; // Kembalikan nama file jika berhasil diunggah
    } else {
        return null; // Kembalikan null jika gagal
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Ambil gambar saat ini dari database
    $stmt = $koneksi->prepare("SELECT gambar FROM menus WHERE id = ?");   
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($currentImage);
    $stmt->fetch();
    $stmt->close();

    // Mengunggah file dan menggunakan gambar saat ini jika tidak ada file baru
    $gambar = uploadFile($_FILES['gambar'], $currentImage);
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];

    // Memastikan gambar tidak null
    if ($gambar !== null) {
        // Lakukan pembaruan
        $stmt = $koneksi->prepare("UPDATE menus SET gambar = ?, nama = ?, harga = ?, kategori = ? WHERE id = ?");
        $stmt->bind_param("ssisi", $gambar, $nama, $harga, $kategori, $id);

        if ($stmt->execute()) {
            // Redirect ke halaman tabel dengan pesan berhasil
            header("Location: ../../tables.php?update-berhasil=1");
            exit();
        } else {
            // Redirect ke halaman tabel dengan pesan gagal
            header("Location: ../../tables.php?update-gagal=1");
            exit();
        }
        $stmt->close();
    } else {
        // Jika file gagal diunggah
        header("Location: ../../tables.php?gagal=1");
        exit();
    }
}
?>