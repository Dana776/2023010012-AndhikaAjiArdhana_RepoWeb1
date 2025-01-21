<?php 
include '../../db.php';
// Fungsi upload file
function uploadFile($file)
{
    $targetDir = "../../uploads/";
    $fileName = basename($file["name"]);
    $targetFilePath = $targetDir . $fileName;

    // Pindahkan file ke folder uploads
    if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
        return $fileName;
    } else {
        return null;
    }
}
    // Tambah data ke database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $gambar = uploadFile($_FILES['gambar']);
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];

    if ($gambar) {
        $stmt = $koneksi->prepare("INSERT INTO menus (gambar, nama, kategori, harga) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $gambar, $nama, $kategori, $harga);

        if ($stmt->execute()) {
            //redirect ke tables.php setelah sukses
            header("Location:../../tables.php?success=1");
            exit();
        } else {
            header("Location:../../tables.php?error=1");
            exit();
        }
        $stmt->close();
    } else {
        header("Location:../../tables.php?gagal=1");
        exit();
    }
}


?>