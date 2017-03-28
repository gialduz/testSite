$("#updateBox").hide();

$('td').click(function(){
    var colIndex = $(this).parent().children().index($(this));
    var rowIndex = $(this).parent().parent().children().index($(this).parent());
    //alert('Row: ' + rowIndex + ', Column: ' + colIndex);
});



$('.editBtn').click(function () {
    
    //id = $(this).closest("tr").find("td:nth-child(1)").text(); //prende riga di click, colonna 1
    //$('#idEdit').attr('value', daAggiornare);
    var row = $(this).closest('tr').index();
    
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

    arrayTabella= getTableData($("#tabellaEventi"));
    
    $('#idEdit').attr('value', arrayTabella[row][0]);
    $('#nomeEdit').attr('value', arrayTabella[row][1]);
    $('#durataEdit').attr('value', parseInt(arrayTabella[row][2]));
    
    
    //$('#tipoEdit').attr('value', parseInt(arrayTabella[id][3]));// NON VA PERCHE RICEVE STRINGA E NON NUMERO
    if(arrayTabella[row][3]="spettacolo") {$('#tipoEdit').attr('value', 1);}
    if(arrayTabella[row][3]="film") {$('#tipoEdit').attr('value', 4);}

        
    
    $('#minEdit').attr('value', parseInt(arrayTabella[row][4]));
    $('#maxEdit').attr('value', parseInt(arrayTabella[row][5]));
    $('#ticketEdit').attr('value', parseInt(arrayTabella[row][6]));
    $('#stEdit').attr('value', parseInt(arrayTabella[row][7]));

    
    
    $("#updateBox").show();
});


$('#editSubmit').click(function () {
    var popupVerifica = confirm("Vuoi davvero MODIFICARE l'evento: " + $(this).closest("tr").find("td:nth-child(2)").text() + "?");
    
    
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


