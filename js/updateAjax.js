
arrayTabella= getTableData($("#tabellaEventi")); // matrice tabella


var row = 0;
var primaEsec = 0;
var vecchiaRigaHtml ="";
var vecchiaRigaObj ="";


$('.editBtn').click(function () {
    
    $('html, body').animate({
        scrollTop: $(this).closest('tr').offset().top
    }, 500);
    
    if(primaEsec!=0){
        vecchiaRigaObj.css("background-color", "white");
    }
    vecchiaRigaObj=$(this).closest('tr');
    
    $(this).closest('tr').css("background-color", "yellow");
    
    row = $(this).closest('tr').index();
    $("#idEdit").val(parseInt(arrayTabella[row][0]));
    $("#nomeEdit").val(arrayTabella[row][1]);
    $("#durataEdit").val(parseInt(arrayTabella[row][2]));
    
    //$("#tipoEdit").val(arrayTabella[row][3]);
    $('#tipoEdit').val("2").change();
    
    $("#minEdit").val(parseInt(arrayTabella[row][4]));
    $('#maxEdit').val(parseInt(arrayTabella[row][5]));
    $('#ticketEdit').val(parseInt(arrayTabella[row][6]));
    $('#stEdit').val(parseInt(arrayTabella[row][7]));    
    
    $("#updateBox").show();
    primaEsec++;
});


$('#editSubmit').click(function () {
    var popupVerifica = confirm("Vuoi davvero MODIFICARE l'evento: " + arrayTabella[row][1] + "?");
    
    
    var valoriArray= $('#updateForm').serializeArray();
    var arrayName=[];
    var arrayValue=[];

    
    $.each(valoriArray, function(i, formField){
        $("#results").append(formField.name + ":" + formField.value + " ");
        arrayName[i]=formField.name;
        arrayValue[i]=formField.value;
    });
    
    
    if (popupVerifica == true) {
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
    }
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

