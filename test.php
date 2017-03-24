<!DOCTYPE html>
<html>
    
<head>
    <title>Test singolo evento</title>
    <link rel="stylesheet" href="w3.css">
    <link rel="stylesheet" href="stile.css">

    
    
</head>

<body style="max-width:650px; margin:0 auto;" class="w3-border w3-border-red">
    
    
    <?php
    // set the default timezone to use. Available since PHP 5.1
    date_default_timezone_set('UTC');
    
    include 'mieFunzioni.php';
    
    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $dbname = "segni";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    
    $numeroEvento = 3;
    stampaEventoTest($numeroEvento, $conn);
    echo "<br>ENZODOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOONG<br>";
    $numeroEvento = 15;
    stampaEventoFotoTest($numeroEvento, $conn);
    echo "<br>ENZODOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOONG<br>";

    stampaListaIstanzeEventoTest($conn);
    
    
    


    
    echo "<p class='txtWhite'>Posso dirti che son calmo anche se non lo sono</p> ";
    
    $conn->close();
    ?>
</body>

</html>