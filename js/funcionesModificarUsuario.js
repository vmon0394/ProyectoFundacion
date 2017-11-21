$(document).ready(function () {

//Esta evento se deshabilita ya que no se permitira midificar el nombre de usuario al personal
//    $('#modiUsuario').click(function () {
//
//        if ($('#usuario').val() === "") {
//
//            var modal = $('#exampleconfirmacion');
//            modal.find('.modal-title').text("Faltan Datos");
//            modal.find('#modal-message').html("<div style='color: red'> Ingrese el nuevo nombre de usuario. </div>");
//            $('#exampleconfirmacion').modal('show');
//
//            $("#usuario").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
//
//        } else if ($('#contrasena').val() === "") {
//
//            $("#usuario").css({"border": "", "box-shadow": ""});
//
//            var modal = $('#exampleconfirmacion');
//            modal.find('.modal-title').text("Faltan Datos");
//            modal.find('#modal-message').html(" <div style='color: red'> Ingrese la contraseña actual. </div>");
//            $('#exampleconfirmacion').modal('show');
//
//            $("#contrasena").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
//
//        } else {
//
//            $("#usuario").css({"border": "", "box-shadow": ""});
//            $("#contrasena").css({"border": "", "box-shadow": ""});
//
//            $("#LoadingImage").show();
//
//            $.ajax({
//                type: "POST",
//                url: "../Controller/ctrlModificarUsuario.php?opcion=1",
//                data: $("#frmCambiarUsuario").serialize(),
//                error: function (jqXHR, textStatus, errorThrown) {
//                    console.log(textStatus + "\n" + errorThrown);
//                },
//                success: function (result) {
//                    var data = eval('(' + result + ')');
//
//                    if (data.res === 'fail') {
//
//                        $("#LoadingImage").hide();
//                        var modal = $('#exampleconfirmacion');
//                        modal.find('.modal-title').text("Alerta");
//                        modal.find('#modal-message').html("<div style='color: red'>" + data.msg + " </div>");
//                        $('#exampleconfirmacion').modal('show');
//
//                    } else if (data.res === 'all') {
//
//                        $("#LoadingImage").hide();
//                        var modal = $('#exampleconfirmacion');
//                        modal.find('.modal-title').text("Modificación exitosa.");
//                        modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + " </div>");
//                        $('#exampleconfirmacion').modal('show');
//
//                        $("#nameUser").html("Modificar Usuario | " + $("#usuario").val());
//
//                        $("#frmCambiarUsuario").each(function () {
//                            this.reset();
//                        });
//                    }
//                }
//            });
//        }
//    });

    $('#modiContrasena').click(function () {

        if ($('#contrasena2').val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese su contraseña actual. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#contrasena2").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#nuevaContrasena').val() === "") {

            $("#contrasena2").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html(" <div style='color: red'> Ingrese la nueva contraseña. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#nuevaContrasena").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#repitaContrasena').val() === "") {

            $("#contrasena2").css({"border": "", "box-shadow": ""});
            $("#nuevaContrasena").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html(" <div style='color: red'> Repita la nueva contraseña. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#repitaContrasena").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#repitaContrasena').val() !== $('#nuevaContrasena').val()) {

            $("#contrasena2").css({"border": "", "box-shadow": ""});
            $("#nuevaContrasena").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Alerta");
            modal.find('#modal-message').html(" <div style='color: red'> El campo nueva contraseña y repita la contraseña no coinciden, por favor verifique los campos. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#nuevaContrasena").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
            $("#repitaContrasena").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
            $('#nuevaContrasena').val("");
            $('#repitaContrasena').val("");

        } else {

            $("#contrasena2").css({"border": "", "box-shadow": ""});
            $("#nuevaContrasena").css({"border": "", "box-shadow": ""});
            $("#repitaContrasena").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlModificarUsuario.php?opcion=2",
                data: $("#frmCambiarContrasena").serialize(),
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus + "\n" + errorThrown);
                },
                success: function (result) {
                    var data = eval('(' + result + ')');

                    if (data.res === 'fail') {

                        $("#LoadingImage").hide();
                        var modal = $('#exampleconfirmacion');
                        modal.find('.modal-title').text("Alerta");
                        modal.find('#modal-message').html("<div style='color: red'>" + data.msg + " </div>");
                        $('#exampleconfirmacion').modal('show');

                    } else if (data.res === 'all') {

                        $("#LoadingImage").hide();
                        var modal = $('#exampleconfirmacion');
                        modal.find('.modal-title').text("Modificación exitosa.");
                        modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + " </div>");
                        $('#exampleconfirmacion').modal('show');

                        $("#frmCambiarContrasena").each(function () {
                            this.reset();
                        });
                    }
                }
            });
        }
    });
});