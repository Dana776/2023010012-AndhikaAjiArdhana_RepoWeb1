<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lingkup Variable dalam PHP</title>
</head>
<body>
    <h2>Cakupan Variable Ada 3: GLOBAL, LOCAL, STATIS</h2>
    <?php 
    $x = 10; //global scope
    $y = 8; //global scope
    function myTest()
    {
        //penggunaan x didalam function akan menghasilkan error
        echo "<p>Variable x didalam function is:$x</p>";
    }
    myTest();

    echo "<p>Variable x diluar function is:$x</p>";

    //Menggunakan variable lingkup lokal di function
    function myLocalVar()
    {
        $x = 7;
        //penggunaan x didalam function akan menghasilkan angka 7
        echo "<p>Variable x didalam function is:$x</p>";
    }
    myLocalVar();

    echo "<p>Variable x diluar function is:$x</p>";

    //menggunakan variable global di dalam function
    function myGlobalVar()
    {
        global $x, $y; //menggambil variable global(diluar function)
        echo '$x = '.$x.'<br/>';
        echo '$y = '.$y.'<br/>';
        $y = $x + $y;
    }

    myGlobalVar();
    echo 'Otomatis Mengubah $y karena kita declare ulang di function myGlobalVar() menjadi $y = $x+$y = '.$y;



    ?>
</body>
</html>