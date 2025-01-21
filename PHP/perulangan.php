<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perulangan Pada PHP</title>
</head>
<body>
    <h2>Perulangan Daftar nama Barang menggunakan PHP</h2>
    <ol>
        <?php
        for($a = 1; $a <= 50; $a++){
            echo "<li>Barang Ke-$a</li>";
        }
        ?>
    </ol>
</body>
</html>