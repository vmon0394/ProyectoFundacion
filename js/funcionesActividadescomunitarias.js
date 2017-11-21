$(document).ready(function () {

		$('#save1').click(function () {

        $("#LoadingImage").show();

        if (datosRegistro == false) {
            $("#LoadingImage").hide();
        } else {

            $("#LoadingImage").show();

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlActividadcomunidad.php?opcion=1",
                data: $("#frmActividadcomu").serialize(),
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

                        $("#frmActividadcomu").each(function () {
                            this.reset();
                        });
                    }
                }
            });
        }
    });



}