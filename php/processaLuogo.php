<html>

<head>
    <meta name="viewport" content="initial-scale=1.0">
    <!--<meta charset="utf-8">-->
    
    <title>tabella Luogo</title>
    
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/stile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js/jquery.js"></script>
</head>

<body style="max-width:1200px; margin:0 auto;" class="w3-border w3-border-red">   
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
    ?>
    
    
    <div class="w3-row">
        <a href="../amministrazione.html"><div class="w3-half w3-center w3-jumbo w3-hover-cyan"> Home ADMIN</div></a>
        <div class="w3-half w3-center w3-xxlarge w3-red"> Stai modificando i LUOGHI</div>
    </div>
    
    
    <div id="addBox">
        <div class="w3-yellow w3-row">
            <h3>Aggiungi Luogo<small> lettera e' UNICA, select con SELECT DISTINCT</small></h3>
            <form id="addForm">
                <div class="w3-half">
                    <div class="w3-third">
                        <div class="w3-half">
                            <label>Lettera</label>
                            <input type="text" name="lettera" value="" class="w3-input w3-border">
                        </div>
                        <div class="w3-half">
                            <label>Colore</label>
                            <select id="addColore" name="selectColore" class="w3-select">
                                <option value='0'> - </option>
                                <?php 
                                $sql = "SELECT DISTINCT colore FROM luogo WHERE 1";
                                $result = $conn->query($sql);   

                                $i=1;
                                while($row = $result->fetch_assoc()){
                                    echo "<option value=".$i." class='uppato'>" . $row['colore'] . "</option>";
                                    $i++;
                                }

                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="w3-twothird">
                        
                        <label>Nome</label>
                        <input type="text" name="nome" value="" class="w3-input w3-border">
                            
                    </div>
                </div>
                <div class="w3-half">
                    <div class="w3-half">
                        <div class="w3-half">
                            <label>Latitudine</label>
                            <input type="number" name="latitudine" value="0" step="0.0001" class="w3-input w3-border">
                        </div>
                        <div class="w3-half">
                            <label>Longitudine</label>
                            <input type="number" name="longitudine" value="0" step="0.0001" class="w3-input w3-border">
                        </div>
                        
                    </div>
                    <div class="w3-half">
                        <div class="w3-col">
                            <label>Citta??</label>
                            <input type="text" name="citta" value="" class="w3-input w3-border">
                        </div>
                        <div class="w3-quarter">
                            <label>Tipo Via</label>
                            <select id="addTipo" name="selectTipo" class="w3-select">
                                <option value='0'> - </option>
                                <?php 
                                $sql = "SELECT DISTINCT tipo_via FROM luogo WHERE 1";
                                $result = $conn->query($sql);   

                                $i=1;
                                while($row = $result->fetch_assoc()){
                                    echo "<option value=".$i." class='uppato'>" . $row['tipo_via'] . "</option>";
                                    $i++;
                                }

                                ?>
                            </select>                        
                        </div>
                        <div class="w3-half">
                            <label>Via</label>
                            <input type="text" name="via" class="w3-input w3-border">
                        </div>
                        <div class='w3-quarter'>
                            <label>N. Civico</label>
                            <input type="number" value="0" min="0" name="numero_civico" class="w3-input w3-border">
                        </div>
                    </div>
                    <!--descrizioneIta: <input type="text" name="descrizione_ita"><br>
                    descrizioneEng: <input type="text" name="descrizione_eng"><br>-->
                </div>
            <input id="addSubmit" type="button" value="Submit">
            </form>
        </div>
    </div>
    
    
    
    
    
    
    
    
    <div id="editBox">
        <div class="w3-cyan w3-row">
            <h3>Modifica Luogo</h3>
            <form id="editForm">
                <div class="w3-half">
                    <div class="w3-half">
                        <div class="w3-third">
                            <label>Id</label>
                            <input id="editId" type="number" name="id" value="" readonly="true" class="w3-input w3-border">
                        </div>
                        <div class="w3-third">
                            <label>Lettera</label>
                            <input id="editLettera" type="text" name="lettera" value="" class="w3-input w3-border">
                        </div>
                        <div class="w3-third">
                            <label>colore</label>
                            <select id="editColore" name="selectColore" class="w3-select">
                                <option value='0'> - </option>
                                <?php 
                                $sql = "SELECT DISTINCT colore FROM luogo WHERE 1";
                                $result = $conn->query($sql);   

                                $i=1;
                                while($row = $result->fetch_assoc()){
                                    echo "<option value=".$row['colore']." class='uppato'>" . $row['colore'] . "</option>";
                                    $i++;
                                }

                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="w3-half">
                        
                        <label>Nome</label>
                        <input id="editNome" type="text" name="nome" value="" class="w3-input w3-border">
                            
                    </div>
                </div>
                <div class="w3-half">
                    <div class="w3-half">
                        <div class="w3-half">
                            <label>Latitudine</label>
                            <input id="editLatitudine" type="number" name="latitudine" value="0" step="0.0001" class="w3-input w3-border">
                        </div>
                        <div class="w3-half">
                            <label>Longitudine</label>
                            <input id="editLongitudine" type="number" name="longitudine" value="0" step="0.0001" class="w3-input w3-border">
                        </div>
                        
                    </div>
                    <div class="w3-half">
                        <div class="w3-col">
                            <label>Citta??</label>
                            <input id="editCitta" type="text" name="citta" value="" class="w3-input w3-border">
                        </div>
                        <div class="w3-quarter">
                            <label>Tipo Via</label>
                            <select id="editTipoVia" name="selectTipo" class="w3-select">
                                <option value='0'> - </option>
                                <?php 
                                $sql = "SELECT DISTINCT tipo_via FROM luogo WHERE 1";
                                $result = $conn->query($sql);   

                                $i=1;
                                while($row = $result->fetch_assoc()){
                                    echo "<option value=".$row['tipo_via']." class='uppato'>" . $row['tipo_via'] . "</option>";
                                    $i++;
                                }

                                ?>
                            </select>                        
                        </div>
                        <div class="w3-half">
                            <label>Via</label>
                            <input id="editVia" type="text" name="via" class="w3-input w3-border">
                        </div>
                        <div class="w3-quarter">
                            <label>N. Civico</label>
                            <input id="editNumeroCivico" type="number" value="0" min="0" name="numero_civico" class="w3-input w3-border">
                        </div>
                    </div>
                    <!--descrizioneIta: <input type="text" name="descrizione_ita"><br>
                    descrizioneEng: <input type="text" name="descrizione_eng"><br>-->
                </div>
            <input id="editSubmit" type="button" value="Submit">
            </form>
            
             <i id="closeUpd" class="fa fa-close w3-xxlarge" style="float:right"></i>
        </div>
    </div>
    
    
    


    
    <?php
    
    include 'stampaEventiLuoghi.php';
    echo stampaLuoghiAmministratore($conn);
    ?>
    
    <div id="spazioPerFixedUPD" class="w3-center" style="height:200px">Fine</div>

    <script src="../js/luoghiAdd.js"></script>
    <script src="../js/luoghiDelete.js"></script>
    <script src="../js/luoghiUpdate.js"></script>

    <!--
    <script src="../js/addAjax.js"></script>
    <script src="../js/formReset.js"></script>-->

    <?php
    $conn->close();
    ?>
    
</body>

</html>