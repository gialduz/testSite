<!DOCTYPE html>
<html>
    
<head>
    <title>Test singolo evento</title>
    <link rel="stylesheet" href="w3.css">
    <link rel="stylesheet" href="stile.css">

    
    
</head>

<body style="max-width:500px; margin:0 auto;" class="w3-border w3-border-red">
    <?php
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
    
    /*
    //TABELLA LUOGO
    $sql = "SELECT id, nome, tipoVia, via FROM Luogo WHERE 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Nome: " . $row["nome"]. " -> " . $row["tipoVia"]. " " .$row["via"] .  "<br>";
        }
    } else {
        echo "0 results";
    }
    
    echo "<br><br>";
    
    //TABELLA EVENTO
    $sql = "SELECT * FROM Evento WHERE 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Nome: " . $row["nome"]. " Durata: " . $row["durata"]. " PAGAMENTO: " .$row["ticket"] .  "<br>";
        }
    } else {
        echo "0 results";
    }
    
    
    //TABELLA istanzeEvento
    echo "<br><br><h2>EventoLuogoData</h2>";
    
    $sqlTabellaIstanzeEventi=   "SELECT E.nome AS Evento, eld.data AS data, eld.orario AS orario, L.nome AS dove, eld.speciale AS speciale FROM ((Evento AS E INNER JOIN eventoLuogoData AS eld ON E.id = eld.id_evento) INNER JOIN Luogo AS L ON L.id = eld.id_luogo)  ORDER BY data, orario, Evento;";
    
    $result = $conn->query($sqlTabellaIstanzeEventi);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<br> <div style='width:20%; float:left;'>EVENTO: " . $row["Evento"]. "</div><div style='width:20%; float:left;'> DATA: " . $row["data"]. "</div><div style='width:20%; float:left;'> ORA: " . $row["orario"]. "</div><div style='width:40%; float:left;'> LUOGO: " . $row["dove"]."</div>";
            if ($row["speciale"]) {echo "<b> SPECIALE</b>";}
        }
    } else {
        echo "0 results";
    }
    
    */
    
    echo "<h3>Prova evento - Europa qualcosa</h3>";
    echo "<br><div class='w3-center'>----------------------------------------------------------------</div>";
    
    
    $numeroEvento = 15;
    $sql = "SELECT * FROM Evento WHERE id=" . $numeroEvento;
    $sql = "SELECT E.nome AS Evento, E.desc_ita AS itaTxt, E.desc_eng AS engTxt, E.eta_min AS min, E.eta_max AS max, E.ticket, E.durata, E.tipologia, eld.data AS data, eld.orario AS orario, L.nome AS dove, L.id_lettera AS doveLettera, eld.speciale AS speciale FROM ((Evento AS E INNER JOIN eventoLuogoData AS eld ON E.id = eld.id_evento) INNER JOIN Luogo AS L ON L.id = eld.id_luogo) WHERE E.id=". $numeroEvento;
    
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
        
    
    
    
    echo "<div class='w3-row-padding'>";
    
    echo    "<div class='l12 w3-center w3-blue'>";
    echo        "<h1>" . $row["Evento"] . "</h1>";
    echo    "</div>";
    echo    "<div class='w3-half'>";
    echo        "2";
    echo    "</div>";
    echo    "<div class='w3-half'>";
    echo        "3";
    echo    "</div>";
    echo    "<div class='l12 w3-justify'>";
    echo        "<p>" . $row["itaTxt"] . "</p>";
    echo    "</div>";
    echo    "<div class='l12 w3-justify w3-yellow w3-padding-small'>";
    echo        "<p>" . $row["engTxt"] . "</p>";
    echo    "</div>";
    echo    "<div class='l12'>";
    echo        "<h2> DOVE:" . $row["dove"] . "<h2>";
    echo    "</div>";
    echo    "<hr>";
    echo    "<div class='l12 w3-blue'>";
    echo        "<p> CALENDARIO </p>";
    echo    "</div>";
    
    echo    "<div class='unquinto w3-blue'>";
    echo        "<p>". $row["min"] ." - ". $row["max"] ." </p>";
    echo    "</div>";
    echo    "<div class='unquinto w3-orange'>";
    echo        "<p> ". $row["doveLettera"] ." </p>";
    echo    "</div>";
    echo    "<div class='unquinto w3-green'>";
    echo        "<p>Ticket: ". $row["ticket"] ." </p>";
    echo    "</div>";
    echo    "<div class='unquinto w3-purple'>";
    echo        "<p>Durata: ". $row["durata"] ." </p>";
    echo    "</div>";
    echo    "<div class='unquinto w3-cyan'>";
    echo        "<p>" . $row["tipologia"] ." </p>";
    echo    "</div>";

    
    echo "</div>";
        
    
    
    
    
    
    
    
    
    $conn->close();
    ?>
</body>

</html>