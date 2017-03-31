<?php
// QUERY ADD NEW RECORD
    // set the default timezone to use. Available since PHP 5.1
    date_default_timezone_set('UTC');

    // Create connection
    $conn = new mysqli("localhost", "root", "mysql", "segni");
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


    $id= $phpAV[0];
    $lettera= test_input($phpAV[1]);
    $colore= $phpAV[2];
    $nome= $phpAV[3];
    $nome= str_replace("'", "''",$nome);
    $latitudine= ($phpAV[4]);
    $longitudine= test_input($phpAV[5]);
    $citta= ($phpAV[6]);
    $tipoVia= ($phpAV[7]);
    $via= ($phpAV[8]);
    $nCivico= $phpAV[9];


    $sql = "UPDATE Luogo SET lettera='".$lettera."', colore='".$colore."', nome='".$nome."', latitudine=".$latitudine.", longitudine=".$longitudine.", citta='".$citta."', tipo_via='".$tipoVia."', via='".$via."', numero_civico=".$nCivico." WHERE id=".$id;

    
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //header("location: processaEvento.php");
?>