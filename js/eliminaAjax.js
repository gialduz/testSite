$('.delBtn').click(function() {
        var daEliminare=$(this).closest("tr").find("td:nth-child(1)").text()
        
        var popupVerifica = confirm("Vuoi davvero cancellare l'evento: " + $(this).closest("tr").find("td:nth-child(4)").text() + "?");
        if (popupVerifica == true) {
            $.ajax({
                type: "POST",
                url: "../php/deleteRecord.php",
                data: { daCancellare: daEliminare }
            }).done(function() {
                 //ricarica AJAX
                location.reload();
            });    
        } else {
            //ricarica AJAX
                location.reload();
        }

    });