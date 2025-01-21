<?php
//ambil data file
$foto = $_FILES['berkas']['name'];
$fotoSementara = $_FILES['berkas']['tmp_name'];

//tentukan lokasi file akan di pindahkan
$dirUpload = "terupload";

//pindahkan file
$terupload = move_uploaded_file($fotoSementara, $dirUpload.$foto);

if($terupload){
    echo 'upload berhasil<br>';
    echo "Link: <a href='".$dirUpload.$foto."'>".$foto."</a>";
} else{
    echo "upload gagal.";
}
?>