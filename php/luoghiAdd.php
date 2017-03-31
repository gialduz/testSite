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


    $lettera= test_input($phpAV[0]);
    $colore = test_input($phpAV[1]);
    $nome = test_input($phpAV[2]);
    $nome= str_replace("'", "''",$nome);
    $latitudine = $phpAV[3];
    $longitudine = $phpAV[4];
    $citta = $phpAV[5];
    $tipo_via = $phpAV[6];
    $via = $phpAV[7];
    $numero_civico = $phpAV[8];

    //TIPO DA STRINGA A NUMERO (id di tipologiaEvento)
    /*switch ($tipo) {
        case "spettacolo":
            $tipo=1;
            break;
        case "laboratorio":
            $tipo=2;
            break;
        case "formazione":
            $tipo=3;
            break;
        case "film":
            $tipo=4;
            break;
        default:
            echo "Tipologia non inserita!";
    }*/

    $sql = "INSERT INTO Luogo VALUES (NULL, '".$lettera."', ".$colore.", '".$nome."', ".$latitudine.", ".$longitudine.", '".$citta."', '".$tipo_via."', '".$via."', ".$numero_civico.")";
    
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //header("location: processaEvento.php");
?>