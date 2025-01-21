<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echo&Print PHP</title>
</head>
<body>
    <h1>Penggunaan Print dan Echo</h1>
    <p>Echo dan print kurang lebih memiliki fungsi yang sama. Keduanya digunakan untuk
    menampilkan data ke layar. Terdapat perbedaan kecil:
    Echo tidak memiliki nilai kembalian sedangkan print memiliki nilai kembalian 1
    sehingga dapat digunakan dalam ekspresi. Echo dapat mengambil beberapa
    parameter (walaupun penggunaan seperti itu jarang terjadi) sementara print dapat
    mengambil satu argumen. Echo sedikit lebih cepat daripada print.
    </p>
    <h3>ECHO</h3>
    <?php 
    //deklarasi variable data kampus
        $prod = array("RPL","ABI","AKP");
        $kampus = "Politeknik Balekambang"; 
        $lokasi = "Balekambang, RT.02/RW.07, Gemiring Lor, Kec. Nalumsari, Kabupaten Jepara, Jawa Tengah 59465";
        $prodi = "Terdapat 3 Prodi: <ol><li>$prod[0]</li> <li>$prod[1]</li> <li>$prod[2]</li></ol>";
        $telp = '085641111267';

    //deklarasi variable data diri
        $nama = "Andhika Aji Ardhana";
        $kampus = "Politeknik Balekambang";
        $semester = 3;
        $jurusan = "Rekayasa Perangkat Lunak";
        $_statusMHS = "Aktif";
    //menampilkan variable dengan echo
        echo 'Nama Kampus: '.$kampus;
        echo '<br/> Lokasi '.$lokasi;
        echo '<br/> Prodi: <br/> '.$prodi;
        echo 'No Telpon: '.$telp;

    //menampilkan data diri dengan print dengan warna setiap baris

    print "<p style='color: purple;'>Hallo Nama Saya ".$nama."</p>";
    print "<p style='color: limegreen;'>Saya Kuliah Di Kampus ".$kampus. "</p>" ;
    print "<p style='color: red;'>Saya Mengambil Jurusan ".$jurusan." dan merupakan Mahasiswa Semester ".$semester . "</p>";
    print "<p style='color: crimson;'>Saya Berstatus Sebagai Mahasiswa ".$_statusMHS."</p>";
    ?>

</body>
</html>