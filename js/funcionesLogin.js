$(document).ready(function () {

    //Este evento reconoce el código ascii de la tecla enter, esta permite al usuario que al dale enter al teclado ejecute la misma 
    //función del botón ingresar y proceda a ejecutar el logueo del usuario si se cumple con la validación del formulario.
    $(document).keypress(function (e) {
        
        if (e.which == 13) {
            validarDatosLogin();

            $("#LoadingImage").show();

            if (datosLogin == false) {
                $("#LoadingImage").hide();
            } else {

                $("#LoadingImage").show();

                $.ajax({
                    url: "Controller/ctrlLogin.php?opcion=1",
                    type: "POST",
                    data: $("#frmIngreso").serialize(),
                    success: function (result) {
                        var data = eval('(' + result + ')');

                        if (data.res === 'fail') {

                            $("#user").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
                            $("#password").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

                            $("#LoadingImage").hide();
                            var modal = $('#exampleconfirmacion');
                            modal.find('.modal-title').text("Alerta Error");
                            modal.find('#modal-message').html("<div style='color: red'>" + data.msg + "</div>");
                            $('#exampleconfirmacion').modal('show');

                            $("#frmLogin").each(function () {
                                this.reset();
                            });

                        } else if (data.res === 'all') {

                            $("#user").css({"border": "", "box-shadow": ""});
                            $("#password").css({"border": "", "box-shadow": ""});

                            location.href = data.exito;
                        }
                    }
                });
            }
        }
    });

    //Evento del botón ingresar el cual permite la ejecución del logueo al usuario, este pasa por la función validar para verificar que 
    //los campos usuario y contraseña si se hayan ingresado.
    $("#ingresar").click(function () {

        validarDatosLogin();

        $("#LoadingImage").show();

        if (datosLogin == false) {
            $("#LoadingImage").hide();
        } else {

            $("#LoadingImage").show();

            $.ajax({
                url: "Controller/ctrlLogin.php?opcion=1",
                type: "POST",
                data: $("#frmIngreso").serialize(),
                success: function (result) {
                    var data = eval('(' + result + ')');

                    if (data.res === 'fail') {

                        $("#user").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
                        $("#password").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

                        $("#LoadingImage").hide();
                        var modal = $('#exampleconfirmacion');
                        modal.find('.modal-title').text("Error");
                        modal.find('#modal-message').text(data.msg);
                        $('#exampleconfirmacion').modal('show');

                        $("#frmLogin").each(function () {
                            this.reset();
                        });

                    } else if (data.res === 'all') {

                        $("#user").css({"border": "", "box-shadow": ""});
                        $("#password").css({"border": "", "box-shadow": ""});

                        location.href = data.exito;
                    }
                }
            });
        }
    });
});

//Esta función valida que el formulario requerido para el logueo se haya diligencia en su totalidad y correctamente.
function validarDatosLogin() {


    if ($('#user').val() === "") {

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese el usuario. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#user").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosLogin = false;
    } else if ($('#password').val() === "") {

        $("#user").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la contraseña. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#password").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosLogin = false;
    } else {

        $("#user").css({"border": "", "box-shadow": ""});
        $("#password").css({"border": "", "box-shadow": ""});

        datosLogin = true;
    }
}