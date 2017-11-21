$(document).ready(function(){
    
    $("#saveImagenes").click(function(){
            $("#LoadingImage").show();
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlPruebaImagen.php?opcion=1",
            data: $("#frmCargarFotoPerfil").serialize(),
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus + "\n" + errorThrown);
            },
            success: function (result) {
                var data = eval('(' + result + ')');

                if (data.res === 'fail') {

                    $("#LoadingImage").hide();
                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text("Confirmación");
                    modal.find('#modal-message').html(data.msg);
                    $('#exampleconfirmacion').modal('show');

                } else if (data.res === 'all') {

                    $("#LoadingImage").hide();
                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text("Registro exitoso.");
                    modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + " </div>");
                    $('#exampleconfirmacion').modal('show');

                    $("#frmCargaFotoPerfil").each(function () {
                        this.reset();
                    });
                }
            }
        });
    });
    
});


