<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator</title>
</head>
<body>
    <h3>Operasi Aritmatika Umum</h3><hr>
    <h4>Perkalian, pengurangan, pembagian, dll</h4>
    <?php
    $x = 10;
    $y = 4;
    echo '$x = 10, $y = 4 = <br>';
    echo('10 + 4 = '.$x+$y.'<br>');
    echo('10 - 4 = '.$x-$y.'<br>');
    echo('10 * 4 = '.$x*$y.'<br>');
    echo('10 / 4 = '.$x/$y.'<br>');
    echo('10 % 4 = '.$x%$y.'<br><hr>');
    ?>
    <h3>PHP Assignments Operators</h3><hr>
    <h4>Operator penugasan digunakan untuk menetapkan nilai ke variabel. Berikut daftar
    lengkap operator penugasan PHP</h4>
    <?php
    $x = 10;
    echo '$x = 10 <br>';

    $x = 20;
    echo '20 += 30 = ';
    $x += 30;
    echo $x.'<br>';    // 50

    $x = 50;
    echo '50 -= 20 = ';
    $x -= 20;
    echo $x .'<br>';    // 30

    $x = 5;
    echo '5 *= 25 = ';
    $x *= 25;
    echo $x.'<br>';    // 125

    $x = 50;
    echo '50 /= 10 = ';
    $x /= 10;
    echo $x.'<br>';    // 5

    $x = 100;
    echo '100 %= 15 = ';
    $x %= 15;
    echo $x.'<br>';    // 10

    ?>
    <h3>PHP Comparison Operators</h3><hr>
    <h4>Operator perbandingan digunakan untuk membandingkan dua nilai dengan cara
    Boolean</h4>
    <?php
    $x = 25;
    $y = 35;
    $z = "25";
    var_dump($x == $z); // Outputs: boolean true
    var_dump($x === $z); // Outputs: boolean false
    var_dump($x != $y); // Outputs: boolean true
    var_dump($x !== $z); // Outputs: boolean true
    var_dump($x < $y); // Outputs: boolean true
    var_dump($x > $y); // Outputs: boolean false
    var_dump($x <= $y); // Outputs: boolean true
    var_dump($x >= $y); // Outputs: boolean false
    ?>

    <h3>PHP Incrementing and Decrementing Operators</h3><hr>
    <h4>Operator kenaikan/penurunan digunakan untuk menambah/mengurangi nilai
    variabel.</h4>
    <?php
    $x = 10;
    echo ++$x; // Outputs: 11
    echo '<br>';
    echo $x; // Outputs: 11
    echo '<br>';
    $x = 10;
    echo $x++; // Outputs: 10
    echo '<br>';
    echo $x; // Outputs: 11
    echo '<br>';
    $x = 10;
    echo --$x; // Outputs: 9
    echo '<br>';
    echo $x; // Outputs: 9
    echo '<br>';
    $x = 10;
    echo $x--; // Outputs: 10
    echo '<br>';
    echo $x; // Outputs: 9
    ?>


    <h3>PHP Logical Operators</h3><hr>
    <h4>Operator logika biasanya digunakan untuk menggabungkan pernyataan kondisional.    </h4>
    <?php
    $year = 2024;
    // Leap years are divisible by 400 or by 4 but not 100
    if(($year % 400 == 0) || (($year % 100 != 0) && ($year % 4 ==
    0))){
    echo "$year is a leap year.";
    } else{
    echo "$year is not a leap year.";
    }
    ?>

    <h3>PHP String Operators</h3><hr>
    <h4>Ada dua operator yang dirancang khusus untuk string.</h4>
    <?php
    $x = "Hello";
    $y = " World!";
    echo $x . $y; // Outputs: Hello World!
    echo '<br>';
    $x .= $y;
    echo $x; // Outputs: Hello World!
    ?>

    <h3> PHP Array Operators</h3><hr>
    <h4>Operator array digunakan untuk membandingkan array:</h4>
    <?php
    $x = array("a" => "Red", "b" => "Green", "c" => "Blue");
    $y = array("u" => "Yellow", "v" => "Orange", "w" => "Pink");
    $z = $x + $y; // Union of $x and $y
    var_dump($z);
    echo '<br>';
    var_dump($x == $y); // Outputs: boolean false
       echo '<br>';
    var_dump($x === $y); // Outputs: boolean false
       echo '<br>';
    var_dump($x != $y); // Outputs: boolean true
       echo '<br>';
    var_dump($x <> $y); // Outputs: boolean true
       echo '<br>';
    var_dump($x !== $y); // Outputs: boolean true
    ?>

</body>
</html>