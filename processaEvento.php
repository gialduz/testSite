



<html>

<head>
    <meta name="viewport" content="initial-scale=1.0">
    <!--<meta charset="utf-8">-->
    
    <title>tabella evento</title>
    
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/stile.css">
    <script src="js/jquery.js"></script>
</head>

<body style="max-width:1200px; margin:0 auto;" class="w3-border w3-border-red">    
    
    <div id="r" class="w3-row"></div>
    
    <div class="w3-row">
        <div class="w3-half w3-yellow">
            aggiungiRecord()
            <form action="addRecord.php" method="post">

                Nome: <input type="text" name="nome" value="EventoTest"><br>
                Durata: <input type="number" name="durata" value="1"><br>
                Tipo: <input type="number" name="tipologia" value="1"><br>
                Età minima: <input type="number" name="eta_min" value="-1"><br>
                Età massima: <input type="number" name="eta_max" value="-1"><br>
                ticket: <input type="number" value="0" min="0" max="1" name="ticket"><br>
                speciale_ragazzi: <input type="number" value="0" min="0" max="1" name="speciale_ragazzi"><br>
                <!--descrizioneIta: <input type="text" name="descrizione_ita"><br>
                descrizioneEng: <input type="text" name="descrizione_eng"><br>-->

            <input type="submit">
            </form>
        </div>
        

        <div id='updateBox' class="w3-half w3-cyan">
            UPDATERecord()
            <form id="updateForm" action="updateRecord.php" method="post">
                id: <input type="number" name="daAggiornare" id="idEdit"><br>
                Nome: <input type="text" name="nome" value="EventoTestUPD" id="nomeEdit"><br>
                Durata: <input type="number" name="durata" value="22" id="durataEdit"><br>
                Tipo(NON va): <input type="number" name="tipologia" value="4" id="tipoEdit"><br>
                Età minima: <input type="number" name="eta_min" value="46" id="minEdit"><br>
                Età massima: <input type="number" name="eta_max" value="46" id="maxEdit"><br>
                ticket: <input type="number" value="0" min="0" max="1" name="ticket" id="ticketEdit"><br>
                speciale_ragazzi: <input type="number" value="0" min="0" max="1" name="speciale_ragazzi" id="stEdit"><br>
                <!--descrizioneIta: <input type="text" name="descrizione_ita"><br>
                descrizioneEng: <input type="text" name="descrizione_eng"><br>-->

            <input id="editSubmit" type="submit">
            </form>
        </div>
    </div>
    
    <!-- FINE HTML, inizio PHP -->
    <!-- FINE HTML, inizio PHP -->
    <!-- FINE HTML, inizio PHP -->
    
    <?php
    
    include 'stampaEventi.php';

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
    
    echo stampaEventiAmministratore($conn);
    $conn->close();
    ?>
    
    
    <script src="js/eliminaAjax.js"></script>
    <script src="js/updateAjax.js"></script>
    
</body>

</html>