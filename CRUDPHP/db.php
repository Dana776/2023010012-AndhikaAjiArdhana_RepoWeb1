<?php

//server dengan default settings (user = 'root' no password)
$host = 'localhost'; //server
$user = 'root';
$pass = "";
$database = 'crudphp'; //nama database

// mengkoneksikan dengan mysql
$koneksi = mysqli_connect($host, $user, $pass, $database);

//untuk memunculkan pesan error ketika koneksi tidak terbentuk
if(!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}
?>