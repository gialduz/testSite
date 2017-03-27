



<html>

<head>
    <meta name="viewport" content="initial-scale=1.0">
    <!--<meta charset="utf-8">-->
    
    <title>tabella evento</title>
    
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/stile.css">
</head>

<body style="max-width:1200px; margin:0 auto;" class="w3-border w3-border-red">
    
    
    
    

    
    
    
    
    
    
    <?php
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
    
    
    

    
// QUERY SELECT TABELLA EVENTO
    
    $sql = "SELECT * FROM Evento";
    $result = $conn->query($sql);
    
    
    $daRitornare="<table style='width:100%'>
                    <th>id</th>
                    <th>nome</th>
                    <th>durata</th>
                    <th>tipologia</th>
                    <th>eta_min</th>
                    <th>eta_max</th>
                    <th>ticket</th>
                    <th>speciale_ragazzi</th>
                    <th>descrizioni?</th>";
    


    
    
    
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $daRitornare.= "<tr>"."<td>" . $row["id"]."</td><td>" . $row["nome"]. "</td><td> " . $row["durata"]. "</td><td> " . $row["tipologia"]."</td><td> " . $row["eta_min"]."</td><td> " . $row["eta_max"]. "</td><td> " . $row["ticket"]. "</td><td> " . $row["speciale_ragazzi"]. "</td><tr>";
        }
    } else {
        echo "0 results";
    }
    
    
    $daRitornare.= "</table>";
    
    
    
    echo $daRitornare."<p class='w3-text-white'>Posso dirti di esser calmo anche se non lo sono</p> ";
    
    
    
    // QUERY ADD NEW RECORD
    $sqlAdd = "INSERT INTO Evento (id, nome, durata, tipologia, eta_min, eta_max, ticket, speciale_ragazzi, descrizione_ita, descrizione_eng)
    VALUES (NULL, 'eventoTest', 999, 1, 0, 0, 1, 1, 'descrizione di test', 'test description')";

    /*if ($conn->query($sqlAdd) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }*/
    
    
    
    $conn->close();
    ?>
    
    aggiungiRecord()
    <form action="addRecord.php" method="post">
        
        Nome: <input type="text" name="nome"><br>
        Durata: <input type="number" name="durata"><br>
        Tipo: <input type="number" name="tipologia"><br>
        Età minima: <input type="number" name="eta_min"><br>
        Età massima: <input type="number" name="eta_max"><br>
        ticket: <input type="number" value="0" min="0" max="1" name="ticket"><br>
        speciale_ragazzi: <input type="number" value="0" min="0" max="1" name="speciale_ragazzi"><br>
        <!--descrizioneIta: <input type="text" name="descrizione_ita"><br>
        descrizioneEng: <input type="text" name="descrizione_eng"><br>-->
        
    <input type="submit">
    </form>
    
    rimuoviRecord()
    <form action="deleteRecord.php" method="post">
        
        id: <input type="number" name="daCancellare"><br>
    
        
    <input type="submit">
    </form>
    
     UPDATERecord()
    <form action="updateRecord.php" method="post">
        id: <input type="number" name="daAggiornare"><br>
        Nome: <input type="text" name="nome"><br>
        Durata: <input type="number" name="durata"><br>
        Tipo: <input type="number" name="tipologia"><br>
        Età minima: <input type="number" name="eta_min"><br>
        Età massima: <input type="number" name="eta_max"><br>
        ticket: <input type="number" value="0" min="0" max="1" name="ticket"><br>
        speciale_ragazzi: <input type="number" value="0" min="0" max="1" name="speciale_ragazzi"><br>
        <!--descrizioneIta: <input type="text" name="descrizione_ita"><br>
        descrizioneEng: <input type="text" name="descrizione_eng"><br>-->
        
    <input type="submit">
    </form>
    
    
</body>

</html>