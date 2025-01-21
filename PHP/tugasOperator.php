<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar operator php</title>
</head>
<body>
    <hr>
    <h3>Operator Aritmatika Umum</h3>
    <?php
    $x = 5;
    $y = 10;
    echo('5 + 10 = '.$x+$y.'<br>');
    echo('5 - 10 = '.$x-$y.'<br>');
    echo('5 * 10 = '.$x*$y.'<br>');
    echo('5 / 10 = '.$x/$y.'<br>');
    echo('5 % 10 = '.$x%$y.'<br>');
    echo('5 ** 10 = '.$x**$y.'<br>');
    echo('-a = '.$x-$y.'<br>');
    ?>
    <hr>
    <h3>Operator penugasan</h3>
    <?php
    $x = 15;
    var_dump($x);
    $x -= 20;
    var_dump($x);
    $x -= 495;
    var_dump($x);
    $x += 450;
    var_dump($x);
    ?>
    <hr>
    <h3>Operator Perbandingan</h3>
    <?php
    //Variable
    $a = 90;
    $b = 80;
    $c = 3;
    $d = 5;
    $e = 6;

    //Perbandingan
    $lebihdari = $a > $b;
    $lebihsamadgn = $c >= $c;
    $kurangdari = $c < $e;
    $kurangsamadgn = $d <= $c;

    //output
    echo('90 > 80 = ');
    var_dump($lebihdari);
    echo ('<br>');
    echo('3 >= 3 = ');
    var_dump($lebihsamadgn);
    echo ('<br>');
    echo('3 < 6 = ');
    var_dump($kurangdari);
    echo ('<br>');
    echo('5 <= 3 = ');
    var_dump($kurangsamadgn);
    echo ('<br>');
    echo("'a' < 'b' = ");
    var_dump($kurangdari);
    echo ('<br>');
    echo("'abc' < 'b' = ");
    var_dump($kurangdari);
    echo ('<br>');
    ?>
</body>
</html>