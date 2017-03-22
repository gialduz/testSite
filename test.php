<!DOCTYPE html>
<html>
    
<head>
    <title>Test singolo evento</title>
    <link rel="stylesheet" href="w3.css">
    <link rel="stylesheet" href="stile.css">

    
    
</head>

<body style="max-width:500px; margin:0 auto;" class="w3-border w3-border-red">
    <?php
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
    echo "<br>ENZODOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOONG<br>";
    $numeroEvento = 15;
    stampaEventoTest($numeroEvento, $conn);


    
    echo "<p class='txtWhite'>Posso dirti che son calmo anche se non lo sono</p> ";
    
    $conn->close();
    ?>
</body>

</html>