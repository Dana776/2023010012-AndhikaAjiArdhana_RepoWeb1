<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variable Dalam PHP</title>
</head>
<body>
    <h2>Ini Adalah Contoh Penggunaan dan Pendeklarasi-an variable dalam PHP</h2>
    <p>Syarat dan larangan ketika membuat sebuah variable</p>
    <ol>
        <li>Variable Harus Dimulai dengan tanda ($) dan Langsung di kasih value contoh $var_name = value</li>
        <li>Nama Variable Tidak Boleh Diawali Dengan Angka</li>
        <li>Nama Variable Boleh Dimulai Dengan Tanda underscore "_"</li>
        <li>Nama Variable Tidak boleh di spasi</li>
    </ol>
    <?php
    //deklarasi variable
    $nama = "Andhika Aji Ardhana";
    $kampus = "Politeknik Balekambang";
    $semester = 3;
    $jurusan = "Rekayasa Perangkat Lunak";
    $_statusMHS = "Aktif";
    ?>
    <?=
    "<p style='color: purple;'>Hallo Nama Saya ".$nama."<br/>".
    "Saya Kuliah Di Kampus ".$kampus. "<br/>" .
    "Saya Mengambil Jurusan ".$jurusan." dan merupakan Mahasiswa Semester ".$semester . "<br/>" .
    "Saya Berstatus Sebagai Mahasiswa ".$_statusMHS . "</p>"
    ?>
</body>
</html>