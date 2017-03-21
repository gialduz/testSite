<!DOCTYPE html>
<html>

<body>
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
    
    
    
    
    
    
    
    
    
    
    $conn->close();
    ?>
</body>

</html>