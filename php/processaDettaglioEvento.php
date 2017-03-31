


<html>

<head>
    <meta name="viewport" content="initial-scale=1.0">
    <!--<meta charset="utf-8">-->
    
    <title>tabella luogo</title>
    
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/stile.css">
    <script src="../js/jquery.js"></script>
</head>

<body style="max-width:1200px; margin:0 auto;" class="w3-border w3-border-red">    
    
    <a href="../amministrazione.html"><div class="w3-row w3-center w3-jumbo w3-hover-cyan"> Home Amministrazione</div></a>
    
    <form id="sceltaEvento">  
        <label>Nome Luogo</label>
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

        $sql = "SELECT id, nome FROM Luogo WHERE 1";
        $result = $conn->query($sql);   

        while($row = $result->fetch_assoc()){
            echo "<option value=".$row[id]." class='uppato'>" . $row['nome'] . "</option>";
        }

        $conn->close();
        ?>
        </select>
    </form>
    
    <div id="wrapEvento"></div>
    
    <script>
        $( "#sceltaEvento" ).change(function() {
            alert( "Handler for .change() called." );
            $("#wrapEvento").load("../test.php");
        });</script>
    
    

    
    
    

    
    <script src="../js/eliminaAjax.js"></script>
    <script src="../js/updateAjax.js"></script>
    <script src="../js/addAjax.js"></script>
    <script src="../js/formReset.js"></script>


    
</body>

</html>