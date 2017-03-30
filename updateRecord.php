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
    
    //$form= $_POST["arrayValue"];
    $nome= test_input($_POST["nome"]);
    $nome= str_replace("'", "''",$nome);
    $durata= test_input($_POST["durata"]);
    $tipo= test_input($_POST["tipologia"]);
    $min= test_input($_POST["eta_min"]);
    $max= test_input($_POST["eta_max"]);
    $ticket= test_input($_POST["ticket"]);
    $speciale_ragazzi=test_input($_POST["speciale_ragazzi"]);

    echo $tipo;

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



    $sql = "UPDATE Evento SET nome='".$nome."', durata=".$durata.", tipologia=".$tipo.", eta_min=".$min.", eta_max=".$max.", ticket=".$ticket.", speciale_ragazzi=".$speciale_ragazzi." WHERE id=50";

    
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //header("location: processaEvento.php");
?>