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

    $nome= test_input($phpAV[0]);
    $nome= str_replace("'", "''",$nome);
    $durata = $phpAV[1];
    $tipo = $phpAV[2];
    $eta_min = $phpAV[3];
    $eta_max = $phpAV[4];
    $ticket = $phpAV[5];
    $speciale_ragazzi = $phpAV[6];
    
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

    $sql = "INSERT INTO Evento (id, nome, durata, tipologia, eta_min, eta_max, ticket, speciale_ragazzi, descrizione_ita, descrizione_eng)
    VALUES (NULL, '".$nome."', ".$durata.", ".$tipo.", ".$eta_min.", ".$eta_max.", ".$ticket.", ".$speciale_ragazzi.", 'descrizione di test', 'test description')";
    
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //header("location: processaEvento.php");
?>