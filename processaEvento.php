



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
    
    <div id="addBox">
        <div class="w3-yellow w3-row">
            aggiungiRecord()
            <form id="addForm">
                <div class="w3-half">
                    <div class="w3-half">
                        <label>Nome</label>
                        <input type="text" name="nome" value="EventoTest" class="w3-input w3-border">
                    </div>
                    <div class="w3-half">
                        <div class="w3-third">
                            <label>Durata</label>
                            <input type="number" name="durata" value="1" class="w3-input w3-border">
                        </div>
                        <div class="w3-twothird">
                            <label>Tipo(Non Va)</label>
                            <input type="number" name="tipologia" value="1" class="w3-input w3-border">
                        </div>
                    </div>
                </div>
                <div class="w3-half">
                    <div class="w3-half">
                        <div class="w3-half">
                            <label>Eta' MIN</label>
                            <input type="number" name="eta_min" value="-1" style="width: 5em;" class="w3-input w3-border">
                        </div>
                        <div class="w3-half">
                            <label>Eta' MAX</label>
                            <input type="number" name="eta_max" value="-100" style="width: 5em;" class="w3-input w3-border">
                        </div>
                    </div>
                    <div class="w3-half">
                        <div class="w3-half">
                            <label>Ticket</label>
                            <input type="number" value="0" min="0" max="1" name="ticket" style="width: 3em;" class="w3-input w3-border">
                        </div>
                        <div class="w3-half">
                            <label>Spec_ragazzi</label>
                            <input type="number" value="0" min="0" max="1" name="speciale_ragazzi" style="width: 3em;" class="w3-input w3-border">
                        </div>
                    </div>
                    <!--descrizioneIta: <input type="text" name="descrizione_ita"><br>
                    descrizioneEng: <input type="text" name="descrizione_eng"><br>-->
                </div>
            <input id="addSubmit" type="button" value="Submit">
            </form>
        </div>
    </div>

    <div id='updateBox'>
        <div class="w3-row w3-cyan w3-padding-16">
            UPDATERecord()
            <form id="updateForm">
                <div class="w3-half">
                    <div class="w3-quarter">
                        <label>Id</label>
                        <input type="number" name="daAggiornare" id="idEdit" readonly="true" class="w3-input w3-border">
                    </div>
                    <div class="w3-half">
                        <label>Nome</label>
                        <input type="text" name="nome" value="EventoTestUPD" id="nomeEdit" class="w3-input w3-border">
                    </div>
                    <div class="w3-quarter">
                        <label>Durata</label>
                        <input type="number" name="durata" value="22" id="durataEdit" class="w3-input w3-border">
                    </div>
                </div>
                <div class="w3-half">
                    <div class="w3-half">
                        <div class="w3-half">
                            <label>Tipo</label>
                            <input type="text" name="tipologia" value="Non impostato" id="tipoEdit" class="uppato w3-input w3-border">
                        </div>
                        <div class="w3-half">
                            <div class="w3-half">
                                <label>Eta' MIN</label>
                                <input type="number" name="eta_min" value="46" id="minEdit" class="w3-input w3-border">
                            </div>
                            <div class="w3-half">
                            <label>Eta' MAX</label>
                            <input type="number" name="eta_max" value="46" id="maxEdit" class="w3-input w3-border">
                            </div>
                        </div>
                    </div>
                    <div class="w3-quarter">
                        <div class="w3-half">
                            <label>Ticket</label>
                            <input type="number" value="0" min="0" max="1" name="ticket" id="ticketEdit" class="w3-input w3-border">
                        </div>
                        <div class="w3-half">
                            <label>Sp_ragazzi</label>
                            <input type="number" value="0" min="0" max="1" name="speciale_ragazzi" id="stEdit" class="w3-input w3-border">
                        </div>
                    <!--descrizioneIta: <input type="text" name="descrizione_ita"><br>
                    descrizioneEng: <input type="text" name="descrizione_eng"><br>-->
                    </div>
                    <div class="w3-quarter w3-center">
                        <label></label> <br>
                        <input id="editSubmit" type="button" value="Conferma">
                    </div>
                </div>

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
    
    <div id="spazioPerFixedUPD" class="w3-center" style="height:250px">Fine</div>

    
    <script src="js/eliminaAjax.js"></script>
    <script src="js/updateAjax.js"></script>
    <script src="js/addAjax.js"></script>

    
</body>

</html>