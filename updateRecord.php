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
    $nome= test_input($phpAV[1]);
    $nome= str_replace("'", "''",$nome);
    $durata= ($phpAV[2]);
    $tipo= test_input($phpAV[3]);
    $min= ($phpAV[4]);
    $max= ($phpAV[5]);
    $ticket= ($phpAV[6]);
    $speciale_ragazzi= $phpAV[7];

    //TIPO DA STRINGA A NUMERO (id di tipologiaEvento)
    switch ($tipo) {
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
    }



    $sql = "UPDATE Evento SET nome='".$nome."', durata=".$durata.", tipologia=".$tipo.", eta_min=".$min.", eta_max=".$max.", ticket=".$ticket.", speciale_ragazzi=".$speciale_ragazzi." WHERE id=".$id;

    
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //header("location: processaEvento.php");
?>