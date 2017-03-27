<?php

//DETTAGLIO SINGOLO EVENTO
    function stampaEvento($numeroEvento, $conn) {
        return   stampaTitolo($numeroEvento, $conn)
                .stampaPersona($numeroEvento, $conn)
                .stampaTesto($numeroEvento, $conn)
                .stampaDove($numeroEvento, $conn)
                .stampaQuando($numeroEvento, $conn)
                .stampaBadge($numeroEvento, $conn);
    }

    function stampaEventoFoto($numeroEvento, $conn) {
        return "<div class='w3-row'>"

            . "<div class='w3-threequarter'>"
                .stampaEventoTest($numeroEvento, $conn)
            . "</div>"
            . "<div class='w3-quarter w3-black'>"
                    ."F<br>O<br>T<br>A<br>Z<br>Z<br>A<br><br>M<br>O<br>L<br>T<br>O<br><br>S<br>T<br>R<br>E<br>T<br>T<br>A"
            . "</div>"
        . "</div>";
    }
        
    

// componenti dettaglio evento
    function stampaTitolo($numeroEvento, $conn) { // stampa "speciale ragazzi" in rosso sotto al titolo
        
        $sql = "SELECT E.nome FROM Evento AS E WHERE E.id = " . $numeroEvento;
        
        $result = $conn->query($sql);        
        $row = $result->fetch_assoc();
        
        return "<div class='w3-center w3-blue'><h1 class='noPad'>" . $row["nome"] . "</h1></div>" . verificaSpecialeRagazzi($numeroEvento, $conn);

    }

    function verificaSpecialeRagazzi($numeroEvento, $conn) { // stampa "speciale ragazzi" in rosso [RICHIAMATO IN stampaTitolo]
        
        $sql = "SELECT E.speciale_ragazzi FROM Evento AS E WHERE E.id = " . $numeroEvento;
        
        $result = $conn->query($sql);        
        $row = $result->fetch_assoc();
        if ($row["speciale_ragazzi"]){return "<h3 style='color:red;'> SPECIALE RAGAZZI </h3>";}
    }

    function stampaPersona($numeroEvento, $conn) { // COLLABORA, REGIA, MUSICA, PRODOTTO DA, etc
        
       $sql = "SELECT ep.tipologia, P.alt_name AS nick, P.nome, P.cognome, P.id FROM ((eventoPersona AS ep INNER JOIN Evento AS E ON E.id = ep.id_evento) INNER JOIN Persona AS P ON P.id = ep.id_persona) WHERE E.id = " . $numeroEvento ." ORDER BY ep.tipologia";
        
        $result = $conn->query($sql);        
        //////// RELAZIONE EVENTO-PERSONA
        
        $daRitornare="";
        
        $ultimaTipologia = "babbi l'orsetto";
        while($row = $result->fetch_assoc()) {
            
            
            if( $row["tipologia"] == $ultimaTipologia ){
                //echo ", ". $row["nome"] . " " . $row["cognome"] . " /// " . $row["nick"]. "";
                $daRitornare.= ", ". stampaNome($row["id"], $conn);
            }else{
                if($ultimaTipologia != "babbi l'orsetto"){$daRitornare.= "<br>";}
                $daRitornare.= "<b class='cappato'>" . $row["tipologia"] . ":</b> ";
                //$row["nome"] . " " . $row["cognome"] . " /// " . $row["nick"]. "";
                $daRitornare.= stampaNome($row["id"], $conn);
            }
            
            $ultimaTipologia = $row["tipologia"];
            
        }
        return $daRitornare;
    }

    function stampaNome($id_persona, $conn) { // COLLABORA, REGIA, MUSICA, PRODOTTO DA, etc
        
        $sql = "SELECT P.nome, P.cognome, P.alt_name AS nick, P.tipologia FROM Persona AS P WHERE P.id = " . $id_persona;
        
        $result = $conn->query($sql);        
        $row = $result->fetch_assoc();
        
        if($row["nick"] != "" && $row["tipologia"] != 1){
            return $row["nick"];
        }else{
            if($row["nick"] != ""){return $row["nome"] . " " . $row["cognome"]. " (".$row["nick"].")";}
            return $row["nome"] . " " . $row["cognome"];
        }
            
        
        
    }  
    
    function stampaTesto($numeroEvento, $conn) { // TESTI ITA-ENG
        $sql = "SELECT E.descrizione_ita AS itaTxt, E.descrizione_eng AS engTxt FROM Evento AS E WHERE E.id = " . $numeroEvento;
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        
        return  "<div class='l12 w3-justify'>"
                    ."<p>" . $row["itaTxt"] . "</p>"
                ."</div>"
                ."<div class='l12 w3-justify w3-yellow w3-padding-small'>"
                    ."<p>" . $row["engTxt"] . "</p>"
                ."</div>";
        
    }
    
    function stampaDove($numeroEvento, $conn) { // LUOGO E DATE EVENTO(i)
        $sql = "SELECT L.nome AS dove FROM ((Evento AS E INNER JOIN eventoLuogoData AS eld ON E.id = eld.id_evento) INNER JOIN Luogo AS L ON L.id = eld.id_luogo) WHERE E.id = " . $numeroEvento;
        
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        
        return  "<div class='l12'>"
                    ."<h2> Luogo: " . $row["dove"] . "<h2>"
                ."</div>";
        
    }

    function stampaQuando($numeroEvento, $conn) { // COLLABORA, REGIA, MUSICA, PRODOTTO DA, etc
        
       $sql = "SELECT eld.data, eld.orario FROM eventoLuogoData AS eld WHERE eld.id_evento = " . $numeroEvento;
        
        $result = $conn->query($sql);
        
        $daRitornare="";
        $daRitornare.=   "<div class='l12 w3-teal'>";
        $daRitornare.=       "<p> CALENDARIO - lista istanze eld </p>";
        while($row = $result->fetch_assoc()) {
            $daRitornare.= "<div class='w3-center' style='margin-bottom:-40px'><b>" . dataIta($row["data"]) . " - " . tagliaSec($row["orario"]) . "</b></div> <br><br>";
        }
        
        $daRitornare.= "</div>";
        return $daRitornare;
    }
    
    function stampaBadge($numeroEvento, $conn) { // BADGES
        
        $sql = "SELECT E.eta_min AS min, E.eta_max AS max, E.ticket, E.durata, te.nome AS tipo, L.lettera AS doveLettera FROM (((Evento AS E INNER JOIN eventoLuogoData AS eld ON E.id = eld.id_evento) INNER JOIN Luogo AS L ON L.id = eld.id_luogo) INNER JOIN tipologiaEvento AS te ON E.tipologia = te.id) WHERE E.id = " . $numeroEvento;
        
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        
        return  "<div class='w3-center'>"
                    ."<div class='unquinto w3-blue'>"
                        ."<p>". $row["min"] ." - ". $row["max"] ." </p>"
                    ."</div>"
                    ."<div class='unquinto w3-orange'>"
                        ."<p> ". $row["doveLettera"] ." </p>"
                    ."</div>"
                    ."<div class='unquinto w3-green'>"
                        ."<p>Ticket: ". $row["ticket"] ." </p>"
                    ."</div>"
                    ."<div class='unquinto w3-purple'>"
                        ."<p>Durata: ". $row["durata"] ." </p>"
                    ."</div>"
                    ."<div class='unquinto w3-cyan'>"
                        ."<p class='uppato'>" . $row["tipo"] ." </p>"
                    ."</div>"
                 ."</div>";

    }
    
    function fasciaEta($numeroEvento, $conn) {
        $sql = "SELECT E.eta_min AS min, E.eta_max AS max FROM Evento AS E WHERE E.id = " . $numeroEvento;
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row["min"] ."-". $row["max"];
    }


    


// STAMPA LISTA EVENTI
//stampa completa
    function stampaListaIstanzeEvento($conn) {
        
        $sqlTabellaIstanzeEventi = "SELECT E.id, eld.data AS data, eld.orario AS orario FROM Evento AS E INNER JOIN eventoLuogoData AS eld ON E.id = eld.id_evento ORDER BY data, orario, id;";

        $result = $conn->query($sqlTabellaIstanzeEventi);

        if ($result->num_rows > 0) {
            // output data of each row
            
            $daRitornare="";
            $ultimaData = "pagliaccio baraldi";
            while($row = $result->fetch_assoc()) {               
                if($ultimaData != $row["data"]) {
                    $daRitornare.= "". "<h2 class='w3-orange w3-center cappato'>" . dataIta($row["data"]) . "</h2>" ;
                }
                    
                $daRitornare.= stampaIstanzaEvento($row["id"], $conn) . "<br>";
                $ultimaData = $row["data"];
            }
        } else {
            echo "0 results";
        }
        
        return $daRitornare;
    }

    // ITEM (ISTANZA)
    function stampaIstanzaEvento($idEvento, $conn) {
        

        $sql=   "SELECT E.id, E.nome AS evento, eld.data AS data, eld.orario AS orario, L.nome AS dove, eld.speciale AS speciale FROM ((Evento AS E INNER JOIN eventoLuogoData AS eld ON E.id = eld.id_evento) INNER JOIN Luogo AS L ON L.id = eld.id_luogo)  WHERE E.id = " . $idEvento;

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            
            $row = $result->fetch_assoc();
                
                return "<div class='w3-row'>" 
                    
                        ."<div class='itemFasciaEta w3-center w3-blue'>"
                            .fasciaEta($row["id"], $conn)
                        ."</div>"
                    
                        ."<div class='itemNomeEvento w3-half'>"
                            . "&nbsp;" .tagliaSec($row["orario"])
                            ." <b>" . $row["evento"] . "</b>"
                            ." - " . $row["dove"]
                        ."</div>"
                    
                        ."<div class='itemBadge w3-quarter w3-center'>"
                            .stampaItemBadge($row["id"], $conn)
                        ."</div>"

                    ."</div>";
            
            } else {
                echo "0 results";
            }
        
    }

//stampa singolo componente di un ITEM
    function specialeRagazziItemBadge($numeroEvento, $conn) {
        $sql = "SELECT E.speciale_ragazzi AS spec FROM Evento AS E WHERE E.id = " . $numeroEvento;
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if($row["spec"]){return "<div class='unQuarto'>"
                                    ."<div class='w3-purple inclinata' style='width:80%;'> <b>T</b> </div> "
                                ."</div>";}
        return "";
    }
    
    function specialeItemBadge($numeroEvento, $conn) {
        $sql=   "SELECT eld.speciale AS speciale FROM eventoLuogoData AS eld WHERE eld.id_evento = " . $numeroEvento;
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if($row["speciale"]){return "<div class='unQuarto'>"
                                    ."<div class='w3-red inclinata' style='width:80%;'> <b>S</b> </div> "
                                ."</div>";}
        return "";
    }


    function stampaItemBadge($numeroEvento, $conn) {
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
        $str .= specialeRagazziItemBadge($numeroEvento, $conn);
        $str .= specialeItemBadge($numeroEvento, $conn);
        
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

    function tagliaSec($ora){ return substr( $ora, 0, 5 );}


// LUOGHI E MAPPE
    function stampaElencoLuoghi($conn) {
        $sql = "SELECT L.lettera, L.colore, L.nome, L.tipo_via, L.via, L.numero_civico FROM Luogo AS L WHERE 1";
        $result = $conn->query($sql);
        
 
        $daRitornare="";
        while($row = $result->fetch_assoc()) {
            $daRitornare.=  "<div class='w3-row w3-border'>"
                                ."<div class='w3-col w3-". $row["colore"] ." w3-center' style='width:50px'> <h4>" .$row["lettera"] . "</h4></div>"
                                ."<div class='w3-rest w3-container'>"."<h4>" . $row["nome"] . "<small>, " . $row["tipo_via"]." " . $row["via"] . " ";
                
            if($row["numero_civico"]!=0) {$daRitornare.= $row["numero_civico"];}             
            $daRitornare.=        "</small> </h4></div>"
                            ."</div>" . "";
        }
        
        return $daRitornare;
    }

    function stampaMappaLuoghi($conn) {
        $sql = "SELECT L.lettera, L.colore, L.nome, L.latitudine AS lat, L.longitudine AS lng FROM Luogo AS L WHERE 1";
        $result = $conn->query($sql);
        
 
        $daRitornare="";
        
        $daRitornare.= '<div id="map" style="height:650px;"></div>
    
                        <script>
                        var map;
                        function initMap() {
                            var pos={lat: 45.158428, lng: 10.794230}
                            map = new google.maps.Map(document.getElementById("map"), {
                                center: pos,
                                zoom: 14
                            });';
        
        
        while($row = $result->fetch_assoc()) {
           
            $daRitornare .= 'pos={lat: '.$row["lat"] .', lng: '.$row["lng"].'};'
                            .'var marker = new google.maps.Marker({
                                position: pos,
                                map: map,
                                title: "'.$row["nome"].'",
                                label: "'. $row["lettera"] .'",
                                icon: "img/label/'.$row["colore"].'.jpg"
                            });';
        }
        
        
        
        $daRitornare.= '}</script>' . '<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBn8vMQeMyI3ORo43l8YIRPO2uBYk5kdJc&callback=initMap"> </script>';
        
        return $daRitornare;
    }

?>