



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
    
    <div class="w3-row">
        <div class="w3-third w3-yellow">
            aggiungiRecord()
            <form action="addRecord.php" method="post">

                Nome: <input type="text" name="nome"><br>
                Durata: <input type="number" name="durata"><br>
                Tipo: <input type="number" name="tipologia"><br>
                Età minima: <input type="number" name="eta_min"><br>
                Età massima: <input type="number" name="eta_max"><br>
                ticket: <input type="number" value="0" min="0" max="1" name="ticket"><br>
                speciale_ragazzi: <input type="number" value="0" min="0" max="1" name="speciale_ragazzi"><br>
                <!--descrizioneIta: <input type="text" name="descrizione_ita"><br>
                descrizioneEng: <input type="text" name="descrizione_eng"><br>-->

            <input type="submit">
            </form>
        </div>
        
        <div class="w3-third w3-red">
            rimuoviRecord()
            <form action="deleteRecord.php" method="post">
                id: <input type="number" name="daCancellare"><br>
            <input type="submit">
            </form>
        </div>

        <div class="w3-third w3-cyan">
            UPDATERecord()
            <form action="updateRecord.php" method="post">
                id: <input type="number" name="daAggiornare"><br>
                Nome: <input type="text" name="nome"><br>
                Durata: <input type="number" name="durata"><br>
                Tipo: <input type="number" name="tipologia"><br>
                Età minima: <input type="number" name="eta_min"><br>
                Età massima: <input type="number" name="eta_max"><br>
                ticket: <input type="number" value="0" min="0" max="1" name="ticket"><br>
                speciale_ragazzi: <input type="number" value="0" min="0" max="1" name="speciale_ragazzi"><br>
                <!--descrizioneIta: <input type="text" name="descrizione_ita"><br>
                descrizioneEng: <input type="text" name="descrizione_eng"><br>-->

            <input type="submit">
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
    
    
    <script>
        
    $('.prova').click(function() {
        
        
        var myTableArray = [];

        $("table#tabellaEventi tr").each(function() {
            var arrayOfThisRow = [];
            var tableData = $(this).find('td');
            if (tableData.length > 0) {
                tableData.each(function() { arrayOfThisRow.push($(this).text()); });
                myTableArray.push(arrayOfThisRow);
            }
        });

        alert($(this).closest("tr").find("td:nth-child(1)").text());
        
        
        
        
        
         $.ajax({
          type: "POST",
          url: "deleteRecord.php",
          data: { daCancellare: 45 }
        }).done(function() {
             //alert("$texto");
          location.reload();
        });    

    });
    </script>
    
    
</body>

</html>