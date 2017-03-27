<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    
    <title>Test singolo evento</title>
    
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/stile.css">
</head>

<body style="max-width:650px; margin:0 auto;" class="w3-border w3-border-red">
    
    
    
    

    
    
    
    
    
    
    <?php
    // set the default timezone to use. Available since PHP 5.1
    date_default_timezone_set('UTC');
    
    include 'php/mieFunzioni.php';

    
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
    
    
    /*$numeroEvento = 3;
    echo stampaEventoTest($numeroEvento, $conn);
    echo "<br>ENZODOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOONG<br>";
    $numeroEvento = 15;
    echo stampaEventoFotoTest($numeroEvento, $conn);
    echo "<br>ENZODOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOONG<br>";

    echo stampaListaIstanzeEventoTest($conn);*/
    
    $numeroEvento = 15;
    echo stampaEventoFotoTest($numeroEvento, $conn);
    
    echo stampaMappaLuoghi($conn);
    
    echo '';
    
    
    
    echo stampaElencoLuoghi($conn);


    
    echo "<p class='w3-text-white'>Posso dirti di esser calmo anche se non lo sono</p> ";
    
    $conn->close();
    ?>
</body>

</html>