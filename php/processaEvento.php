



<html>

<head>
    <meta name="viewport" content="initial-scale=1.0">
    <!--<meta charset="utf-8">-->
    
    <title>tabella evento</title>
    
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/stile.css">
    <script src="../js/jquery.js"></script>
</head>

<body style="max-width:1200px; margin:0 auto;" class="w3-border w3-border-red">    
    
    <div class="w3-row">
        <a href="../amministrazione.html"><div class="w3-half w3-center w3-jumbo w3-hover-cyan"> Home ADMIN</div></a>
        <div class="w3-half w3-center w3-xxlarge w3-red"> Stai modificando gli EVENTI</div>
    </div>  
    
    <div id="addBox">
        <div class="w3-yellow w3-row">
            <h3>Aggiungi evento</h3>
            <form id="addForm">
                <div class="w3-half">
                    <div class="w3-half">
                        <label>Nome</label>
                        <input type="text" name="nome" value="" class="w3-input w3-border">
                    </div>
                    <div class="w3-half">
                        <div class="w3-third">
                            <label>Durata</label>
                            <input type="number" name="durata" value="" class="w3-input w3-border">
                        </div>
                        <div class="w3-twothird">
                            <label>Tipo</label>
                            <!--<input type="text" name="tipologia" value="" class="w3-input w3-border uppato">-->
                            <select id="addTipo" name="selectTipo" class="w3-select">
                                <option value='0'> - </option>
                            <?php 
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

                            $sql = "SELECT id, nome FROM tipologiaEvento WHERE 1";
                            $result = $conn->query($sql);   

                            $i=1;
                            while($row = $result->fetch_assoc()){
                                echo "<option value=".$row[id]." class='uppato'>" . $row['nome'] . "</option>";
                                $i++;
                            }
                            
                            $conn->close();
                            ?>
                            </select>
                            
                            <!-- WRAP AUTOMATICO SELECT -->
                        </div>
                    </div>
                </div>
                <div class="w3-half">
                    <div class="w3-half">
                        <div class="w3-half">
                            <label>Eta' MIN</label>
                            <input type="number" name="eta_min" value="0" style="width: 5em;" class="w3-input w3-border">
                        </div>
                        <div class="w3-half">
                            <label>Eta' MAX</label>
                            <input type="number" name="eta_max" value="0" style="width: 5em;" class="w3-input w3-border">
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
            <h3>Modifica evento</h3>
            <form id="updateForm">
                <div class="w3-half">
                    <div class="w3-col s2">
                        <label>Id</label>
                        <input type="number" name="daAggiornare" id="idEdit" readonly="true" class="w3-input w3-border">
                    </div>
                    <div class="w3-col m10">
                        <div class="w3-threequarter">
                            <label>Nome</label>
                            <input type="text" name="nome" id="nomeEdit" class="w3-input w3-border">
                        </div>
                        <div class="w3-quarter">
                            <label>Durata</label>
                            <input type="number" name="durata" id="durataEdit" class="w3-input w3-border">
                        </div>
                    </div>
                </div>
                <div class="w3-half">
                    <div class="w3-half">
                        <div class="w3-half">
                            <label>Tipo</label>
                            <select id="tipoEdit" name="selectTipo" class="w3-select">
                                <option value='0'> - </option>
                                
                            <?php 
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

                            $sql = "SELECT id, nome FROM tipologiaEvento WHERE 1";
                            $result = $conn->query($sql);   

                            $i=1;
                            while($row = $result->fetch_assoc()){
                            echo "<option value='".$row["id"]."' class='uppato'>" . $row['nome'] . "</option>";
                            }
                            
                            $conn->close();
                            ?>
                            </select>
                            
                            
                        </div>
                        <div class="w3-half">
                            <div class="w3-half">
                                <label>Eta' MIN</label>
                                <input type="number" name="eta_min" id="minEdit" class="w3-input w3-border">
                            </div>
                            <div class="w3-half">
                            <label>Eta' MAX</label>
                            <input type="number" name="eta_max" id="maxEdit" class="w3-input w3-border">
                            </div>
                        </div>
                    </div>
                    <div class="w3-quarter">
                        <div class="w3-half">
                            <label>Ticket</label>
                            <input type="number" min="0" max="1" name="ticket" id="ticketEdit" class="w3-input w3-border">
                        </div>
                        <div class="w3-half">
                            <label>Sp_ragazzi</label>
                            <input type="number" min="0" max="1" name="speciale_ragazzi" id="stEdit" class="w3-input w3-border">
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
    
    include 'stampaEventiLuoghi.php';

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

    
    <script src="../js/eliminaAjax.js"></script>
    <script src="../js/updateAjax.js"></script>
    <script src="../js/addAjax.js"></script>
    <script src="../js/formReset.js"></script>


    
</body>

</html>