<?php

//server default
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'crudsurvey';

//koneksi ke database
$koneksi = mysqli_connect($host, $user, $pass, $database);

//menampilkan pesan jika koneksi tidak terbentuk
if(!$koneksi){
    die("Connection Failed" . mysqli_connect_error());
}

?>