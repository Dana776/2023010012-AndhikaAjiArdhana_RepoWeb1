<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Case Sensitive Variable</title>
</head>
<body>
    <h1>Ini Adalah Variable PHP</h1>
    <p>Variable Di PHP merupakan Case Sensitive, yang berarti besar kecil variable sangat berpengaruh.</p>
    <?php
        $warna = "Red";
        echo "Rumah Saya " . $warna . "<br/>";
        echo "Mobil Saya ".$WARNA."<br/>";
        echo "Sepeda Saya ".$WARna."<br/>";
    ?>
</body>
</html>