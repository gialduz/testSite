    <?php   
    
    function stampaEventiAmministratore($conn) {
        // QUERY SELECT TABELLA EVENTO
    
    $sql = "SELECT E.id, E.nome AS evento, E.durata, E.eta_min, E.eta_max, E.ticket, E.speciale_ragazzi, E.descrizione_eng AS descr, tE.id AS tipoNum, tE.nome AS tipo FROM Evento AS E INNER JOIN tipologiaEvento AS tE ON e.tipologia=tE.id ORDER BY E.id";
    $result = $conn->query($sql);   
    
    $daRitornare="<table id='tabellaEventi' style='width:100%'>
                    <th>id</th>
                    <th>nome</th>
                    <th>durata</th>
                    <th>tipologia</th>
                    <th>eta_min</th>
                    <th>eta_max</th>
                    <th>ticket</th>
                    <th>speciale_ragazzi</th>
                    <th>descrizioni?</th>
                    <th>UPADTE</th>
                    <th>DELETE</th>";
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $daRitornare.= "<tr class='nr'>"
                ."<td>" . $row["id"]."</td><td>" . $row["evento"]. "</td><td> " 
                . $row["durata"]. "</td><td class='uppato'> " 
                . $row["tipo"].  "<p hidden class='idTipo'>#".$row[tipoNum]."</p>" ."</td><td> " 
                . $row["eta_min"]."</td><td> " 
                . $row["eta_max"]. "</td><td> " 
                . $row["ticket"]. "</td><td> " 
                . $row["speciale_ragazzi"]. "</td><td> " 
                . $row["descr"]. "</td>"."<td><a href='#'><img src='../img/edit_icon.png' style='max-width:25px' class='resp editBtn'></a></td>" 
                ."<td><a href='#'><img src='../img/cancel_icon.png' style='max-width:25px' class='resp delBtn'></a></td>" 
                ."</tr>";
        }
    } else {
        echo "0 results";
    }
    
    $daRitornare.= "</table>";    
    
    return $daRitornare."<p class='w3-text-white'>Posso dirti di esser calmo anche se non lo sono</p> ";
    }
    
    
    ?>