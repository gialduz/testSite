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
        
       $sql = "SELECT ep.tipologia, P.alt_name AS nick, P.nome, P.cognome, P.id FROM ((eventoPersona AS ep INNER JOIN Evento AS E ON E.id = ep.id_evento) INNER JOIN Persona AS P ON P.id = ep.id_persona) WHERE E.id = " . $numeroEvento ." ORDER BY ep.tipologia";
        
        $result = $conn->query($sql);        
        //////// RELAZIONE EVENTO-PERSONA
        
        $ultimaTipologia = "babbi l'orsetto";
        while($row = $result->fetch_assoc()) {
            
            
            if( $row["tipologia"] == $ultimaTipologia ){
                //echo ", ". $row["nome"] . " " . $row["cognome"] . " /// " . $row["nick"]. "";
                echo ", ";
                stampaNomeTest($row["id"], $conn);
            }else{
                if($ultimaTipologia != "babbi l'orsetto"){echo "<br>";}
                echo "<b class='cappato'>" . $row["tipologia"] . ":</b> ";
                //$row["nome"] . " " . $row["cognome"] . " /// " . $row["nick"]. "";
                stampaNomeTest($row["id"], $conn);
            }
            
            $ultimaTipologia = $row["tipologia"];
            
        }
        
    }

    function stampaNomeTest($id_persona, $conn) { // COLLABORA, REGIA, MUSICA, PRODOTTO DA, etc
        
        $sql = "SELECT P.nome, P.cognome, P.alt_name AS nick, P.tipologia FROM Persona AS P WHERE P.id = " . $id_persona;
        
        $result = $conn->query($sql);        
        $row = $result->fetch_assoc();
        
        if($row["nick"] != "" && $row["tipologia"] != "persona"){
            echo $row["nick"];
        }else{
            echo $row["nome"] . " " . $row["cognome"];
        }
            
        
        
    }  
    
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
    
    function fasciaEta($numeroEvento, $conn) {
        $sql = "SELECT E.eta_min AS min, E.eta_max AS max FROM Evento AS E WHERE E.id = " . $numeroEvento;
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row["min"] ."-". $row["max"];
    }


    


// STAMPA LISTA EVENTI
//stampa completa
    function stampaListaIstanzeEventoTest($conn) {
        //stampaIstanzaEventoTest("qui ci va ciclo id_istanze da 1 a n", $conn);
        //TABELLA istanzeEvento
        

        $sqlTabellaIstanzeEventi=   "SELECT E.id, E.nome AS evento, eld.data AS data, eld.orario AS orario, L.nome AS dove, eld.speciale AS speciale FROM ((Evento AS E INNER JOIN eventoLuogoData AS eld ON E.id = eld.id_evento) INNER JOIN Luogo AS L ON L.id = eld.id_luogo)  ORDER BY data, orario, Evento;";

        $result = $conn->query($sqlTabellaIstanzeEventi);

        if ($result->num_rows > 0) {
            // output data of each row
            
            $cacca=0;
            $ultimaData="pagliaccio baraldi";
            while($row = $result->fetch_assoc()) {
                
                
                
                if($cacca%1==0) {
                    echo "<br><br><br>". "<h2 class='w3-orange w3-center cappato'>" . dataIta($row["data"]) . "</h2>" ;
                }
                
                
                
                
                $stringaDaStampare = ""
                    ."<div class='w3-row'>" 
                    
                        ."<div class='itemFasciaEta w3-center w3-blue'>"
                            .fasciaEta($row["id"], $conn)
                        ."</div>"
                    
                        ."<div class='itemNomeEvento w3-half'>"
                            . " " .substr( $row["orario"], 0, 5 )
                            ." <b>" . $row["evento"] . "</b>"
                            ." - " . $row["dove"]
                        ."</div>"
                    
                        ."<div class='itemBadge w3-quarter w3-center'>"
                            .stampaItemBadgeTest($row["id"], $conn)
                        ."</div>"

                    ."</div>";
                    
                    //if ($row["speciale"]) {echo "<b class='w3-purple'> S_TEEN</b>";}

                    echo "<br>";
                
                echo $stringaDaStampare;
                
                
                $cacca++;
                
            }
        } else {
            echo "0 results";
        }
    }






//stampa singolo componente di un ITEM
    function specialeRagazziItemBadgeTest($numeroEvento, $conn) {
        $sql = "SELECT E.speciale_ragazzi AS spec FROM Evento AS E WHERE E.id = " . $numeroEvento;
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if($row["spec"]){return "<div class='unQuarto'>"
                                    ."<div class='w3-purple inclinata' style='width:80%;'> <b>T</b> </div> "
                                ."</div>";}
        return "";
    }

    function stampaItemBadgeTest($numeroEvento, $conn) {
        $sql = "SELECT E.tipologia, E.durata, E.ticket FROM Evento AS E WHERE E.id = " . $numeroEvento;
        
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        
        $str =  "<div class='unQuarto w3-blue'>"
                    .$row["ticket"]
                ."</div>"
                ."<div class='unQuarto w3-green'>"
                    .$row["durata"]
                ."</div>"
                ."<div class='unQuarto w3-orange'>"
                    .substr( $row["tipologia"], 0, 3 )
                ."</div>";
        $str .= specialeRagazziItemBadgeTest($numeroEvento, $conn);        
        return $str;
        
        // IMPORTANTE ! nel PDF c'è riferimento a pagina -> badge collegamento o clic su istanza o niente? (clic per dettaglio evento)
        
    }

    function giornoIta($giornoEng) {

        switch ($giornoEng) {
        case "Monday":
            return "Luned&igrave;";
            break;
        case "Tuesday":
            return "Marted&igrave;";
            break;
        case "Wednesday":
            return "Mercoled&igrave;";
            break;
        case "Thursday":
            return "Gioved&igrave;";
            break;
        case "Friday":
            return "Venerd&igrave;";
            break;
        case "Saturday":
            return "Sabato";
            break;
        case "Sunday":
            return "Domenica";
            break;
                
        default:
            return $giornoEng;
            break;
        }
        
    }

    function meseIta($numeroMese) {

        switch ($numeroMese) {
        case 1:
            return "Gennaio";
            break;
        case 2:
            return "Febbraio";
            break;
        case 3:
            return "Marzo";
            break;
        case 4:
            return "Aprile";
            break;
        case 5:
            return "Maggio";
            break;
        case 6:
            return "Giugno";
            break;
        case 7:
            return "Luglio";
            break;
        case 8:
            return "Agosto";
            break;
        case 9:
            return "Settembre";
            break;
        case 10:
            return "Ottobre";
            break;
        case 11:
            return "Novembre";
            break;
        case 12:
            return "Dicembre";
            break;
        
                
        default:
            return $numeroMese;
            break;
        }
        
    }

    function dataIta($dataBrutta){
        
        return giornoIta(date('l', strtotime($dataBrutta))) ." " . date('j', strtotime($dataBrutta)) . " ". meseIta(date('n', strtotime($dataBrutta)));;
        
    }

?>