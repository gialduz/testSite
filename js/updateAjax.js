$("#updateBox").hide();
arrayTabella= getTableData($("#tabellaEventi")); // matrice tabella


var row = 0;

$('.editBtn').click(function () {
    
    row = $(this).closest('tr').index();
    
    $("#idEdit").val(parseInt(arrayTabella[row][0]));
    $("#nomeEdit").val(arrayTabella[row][1]);
    $("#durataEdit").val(parseInt(arrayTabella[row][2]));
    $("#tipoEdit").val(arrayTabella[row][3]);
    $("#minEdit").val(parseInt(arrayTabella[row][4]));
    $('#maxEdit').val(parseInt(arrayTabella[row][5]));
    $('#ticketEdit').val(parseInt(arrayTabella[row][6]));
    $('#stEdit').val(parseInt(arrayTabella[row][7]));

    
    
    $("#updateBox").show();
});


$('#editSubmit').click(function () {
   /*var popupVerifica = confirm("Vuoi davvero MODIFICARE l'evento: " + $(this).closest("tr").find("td:nth-child(2)").text() + "?");
    
    
    var valoriArray= $('#updateForm').serializeArray();
    var arrayName=[];
    var arrayValue=[];

    
    $.each(valoriArray, function(i, formField){
        $("#results").append(formField.name + ":" + formField.value + " ");
        arrayName[i]=formField.name;
        arrayValue[i]=formField.value;
    });
    
    
    /*if (popupVerifica == true) {
        alert(daAggiornare);
        $.ajax({
            type: "POST",
            url: "updateRecord.php",
            data: { arrayValue: arrayValue }
        }).done(function() {
             //ricarica AJAX
            location.reload();
        });    
    } else {
        //ricarica AJAX
            location.reload();
    }*/
});

function getTableData(table) {
    var data = [];
    table.find('tr').each(function (rowIndex, r) {
        var cols = [];
        $(this).find('th,td').each(function (colIndex, c) {
            cols.push(c.textContent);
        });
        data.push(cols);
    });
    return data;
}

