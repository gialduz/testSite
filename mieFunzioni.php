<?php
    
    function stampaEventoTest($numeroEvento, $conn) {
        stampaTitoloTest($numeroEvento, $conn);
        stampaPersonaTest($numeroEvento, $conn);
        stampaTestoTest($numeroEvento, $conn);
        stampaDoveTest($numeroEvento, $conn);
        stampaQuandoTest($numeroEvento, $conn);
        stampaBadgeTest($numeroEvento, $conn);
    }
        
    


    function stampaTitoloTest($numeroEvento, $conn) { // stampa "speciale ragazzi" in rosso sotto al titolo
        
        $sql = "SELECT E.nome FROM Evento AS E WHERE E.id = " . $numeroEvento;
        
        $result = $conn->query($sql);        
        $row = $result->fetch_assoc();
        
        echo        "<h1 class='w3-center w3-blue'>" . $row["nome"] . "</h1>";
        verificaSpecialeRagazziTest($numeroEvento, $conn);

    }

    function verificaSpecialeRagazziTest($numeroEvento, $conn) { // stampa "speciale ragazzi" in rosso [RICHIAMATO IN stampaTitolo]
        
        $sql = "SELECT E.speciale_ragazzi FROM Evento AS E WHERE E.id = " . $numeroEvento;
        
        $result = $conn->query($sql);        
        $row = $result->fetch_assoc();
        if ($row["speciale_ragazzi"]){echo "<h3 style='color:red;'> SPECIALE RAGAZZI </h3>";}
    }

    function stampaPersonaTest($numeroEvento, $conn) { // COLLABORA, REGIA, MUSICA, PRODOTTO DA, etc
        
       $sql = "SELECT ep.tipologia, P.alt_name AS nick, P.nome, P.cognome FROM ((eventoPersona AS ep INNER JOIN Evento AS E ON E.id = ep.id_evento) INNER JOIN Persona AS P ON P.id = ep.id_persona) WHERE E.id = " . $numeroEvento ." ORDER BY ep.tipologia";
        
        $result = $conn->query($sql);        
        //////// RELAZIONE EVENTO-PERSONA
        
        $ultimaTipologia = "babbi l'orsetto";
        while($row = $result->fetch_assoc()) {
            
            
            if( $row["tipologia"] == $ultimaTipologia ){
                echo ", ". $row["nome"] . " " . $row["cognome"] . " /// " . $row["nick"]. "";
            }else{
                if($ultimaTipologia != "babbi l'orsetto"){echo "<br>";}
                echo "<b class='cappato'>" . $row["tipologia"] . ":</b> ". $row["nome"] . " " . $row["cognome"] . " /// " . $row["nick"]. "";
            }
            
            $ultimaTipologia = $row["tipologia"];
            
        }
        
    }

  /*  function stampaNomeTest($id_persona, $conn) { // COLLABORA, REGIA, MUSICA, PRODOTTO DA, etc
        
       $sql = "SELECT P.nome, P.cognome, P.alt_name AS nick FROM Persona AS P WHERE P.id = " . $id_persona ." ORDER BY ep.tipologia";
        
        $result = $conn->query($sql);        
        //////// RELAZIONE EVENTO-PERSONA
        
        if($row["nick"] != "NULL"){
            echo $row["nick"];
        }else{
            echo $row["nome"] . $row["cognome"];
        }
            
        
        
    }  */
    
    function stampaTestoTest($numeroEvento, $conn) { // TESTI ITA-ENG
        $sql = "SELECT E.desc_ita AS itaTxt, E.desc_eng AS engTxt FROM Evento AS E WHERE E.id = " . $numeroEvento;
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        
        echo    "<div class='l12 w3-justify'>";
        echo        "<p>" . $row["itaTxt"] . "</p>";
        echo    "</div>";
        echo    "<div class='l12 w3-justify w3-yellow w3-padding-small'>";
        echo        "<p>" . $row["engTxt"] . "</p>";
        echo    "</div>";
        
    }
    
    function stampaDoveTest($numeroEvento, $conn) { // LUOGO E DATE EVENTO(i)
        $sql = "SELECT L.nome AS dove FROM ((Evento AS E INNER JOIN eventoLuogoData AS eld ON E.id = eld.id_evento) INNER JOIN Luogo AS L ON L.id = eld.id_luogo) WHERE E.id = " . $numeroEvento;
        
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        
        echo    "<div class='l12'>";
        echo        "<h2> DOVE: " . $row["dove"] . "<h2>";
        echo    "</div>";
        echo    "<hr>";
        
    }

    function stampaQuandoTest($numeroEvento, $conn) { // COLLABORA, REGIA, MUSICA, PRODOTTO DA, etc
        
       $sql = "SELECT eld.data, eld.orario FROM eventoLuogoData AS eld WHERE eld.id_evento = " . $numeroEvento;
        
        $result = $conn->query($sql);
        
        echo    "<div class='l12 w3-teal'>";
        echo        "<p> CALENDARIO - lista istanze eld </p>";
        while($row = $result->fetch_assoc()) {
            echo "<div class='w3-center' style='margin-bottom:-40px'><b>" . $row["data"] . " --- " . $row["orario"] . "</b></div> <br><br>";
        }
        
        echo    "</div>";
    }
    
    function stampaBadgeTest($numeroEvento, $conn) { // BADGES
        
        $sql = "SELECT E.eta_min AS min, E.eta_max AS max, E.ticket, E.durata, E.tipologia, L.id_lettera AS doveLettera FROM ((Evento AS E INNER JOIN eventoLuogoData AS eld ON E.id = eld.id_evento) INNER JOIN Luogo AS L ON L.id = eld.id_luogo) WHERE E.id = " . $numeroEvento;
        
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        
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
?>