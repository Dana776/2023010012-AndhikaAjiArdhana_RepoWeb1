<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipe Data di php</title>
</head>
<body>
    <h3>Ini adalah tipe data integer</h3>
    <h4>Ada beberapa jenis bilangan</h4>
    <ol>
        <li>Bilangan Bulat Desimal (0-9)</li>
        <li>Bilangan Negative (-1 - -n)</li>
        <li>Bilangan Hexadesimal</li>
        <li>Bilangan Octal</li>
        <li>Float atau angka desimal pecahan</li>
    </ol>
    <?php 
    $desimal = 123;
    var_dump($desimal);
    echo "<br/>";

    $negative = -123;
    var_dump($negative);
    echo "<br/>";

    $hexadesimal = 0x1A;
    var_dump($hexadesimal);
    echo "<br/>";

    $octal = 0123;
    var_dump($octal);
    echo "<br/>";

    $float = 1.234;
    var_dump($float);
    echo "<br/>";

    $float1 = 10.2e3;
    var_dump($float1);
    echo "<br/>";

    $float2 = 10.2e3;
    var_dump($float2);
    echo "<br/>";
    ?>

    <h3>Tipe data Boolean</h3>
    <h4>Tipe data Ini Terdiri dari dua nilai saja yaitu true dan false</h4>
    <?php
    //Memasukan Nilai True ke variable
    $show_error = true;
    var_dump($show_error);
    ?>

    <h3>Tipe Data Array</h3>
    <h4>Tipe data array seperti sebuah lemari yang terdapat banyak varian baju yang berbeda dan bisa di ambil satu-persatu atau banyak</h4>
    <?php
    $bajuku = array('Merah', 'Hijau', 'Biru');
    var_dump($bajuku);
    echo '<hr/>';

    $kode_warna_bajuku = array(
        'Merah' => '#ff0000',
        'Hijau' => '#00ff00',
        'biru' => '#0000ff'
    );

    var_dump($kode_warna_bajuku);
    echo "<hr/>".$kode_warna_bajuku['Merah'];
    ?>

    <hr>
    <h3>Tipe Data Object</h3>
    <h4>Objek adalah tipe data yang tidak hanya memungkinkan penyimpanan data tetapi
    juga informasi tentang cara memproses data tersebut.</h4>

    <?php 
    //mendefinisikan class
    class sapa{
        //property
        public $halo = 'Hallo Aku Adalah Object';

        //methods
        function tampilkan_sapa(){
            return $this->halo;
        }
    }
    $pesan = new sapa;
    var_dump($pesan);
    echo '<hr/>';

    $a = NULL;
    echo $a;
    echo '<hr/>';
    ?>

    <h3>Resource</h3>
    <h4>Sebuah sumber daya adalah variabel khusus, memegang referensi ke sumber daya
eksternal. Variabel sumber daya biasanya menahan penangan khusus untuk
membuka file dan koneksi database</h4>

<?php
//membuka file untuk di baca
$text = fopen('tulisan.text', 'r');
var_dump($text);
echo '<hr/>';

//connect ke database mySQL server default setting
$link = mysqli_connect("localhost", "root", "");
var_dump($link);
?>    
</body>
</html>