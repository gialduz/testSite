<?php
// QUERY ADD NEW RECORD
    // set the default timezone to use. Available since PHP 5.1
    date_default_timezone_set('UTC');
    
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

    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    
    $phpAV = $_POST["arrayValue"];


    $nome = $phpAV[0];
    $durata = $phpAV[1];
    $tipo = $phpAV[2];
    $eta_min = $phpAV[3];
    $eta_max = $phpAV[4];
    $ticket = $phpAV[5];
    $speciale_ragazzi = $phpAV[6];

    




    $sql = "INSERT INTO Evento (id, nome, durata, tipologia, eta_min, eta_max, ticket, speciale_ragazzi, descrizione_ita, descrizione_eng)
    VALUES (NULL, '".$nome."', ".$durata.", ".$tipo.", ".$eta_min.", ".$eta_max.", ".$ticket.", ".$speciale_ragazzi.", 'descrizione di test', 'test description')";
    
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //header("location: processaEvento.php");
?>