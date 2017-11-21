$(document).ready(function () {

    //Se utiliza la funcion change() nativa de JavaScript para capturar el evento del clic del combo cargo
    $("#cargo").change(function (e) {

        if ($("#cargo").val() === "Psicólogo") {

            $("#tarjeta").removeAttr("disabled");
        } else {

            $("#tarjeta").attr('disabled', 'disabled');
        }
        e.preventDefault();
    });

    //llamado del las funciones para llenar las tablas.
    tabla();
    tabla2();

    //evento del boton guardar, Este evento captura toda la información del formulario usuarios pasando por la función validarDatosRegistro, 
    //la cual valida que los campo que son obligatorios su hayan sido diligenciados, al cumplir con los campos requeridos por medio de un 
    //Ajax es mandada esta información al controlador y el caso del controlador.
    $('#save').click(function () {

        //Función para validad los campos obligatorios del formulario
        validarDatosRegistro();

        $("#LoadingImage").show();

        if (datosRegistro == false) {
            $("#LoadingImage").hide();
        } else {

            $("#LoadingImage").show();

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlUsuarios.php?opcion=1",
                data: $("#frmUsuarios").serialize(),
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus + "\n" + errorThrown);
                },
                success: function (result) {
                    var data = eval('(' + result + ')');

                    alertify.confirm("<div style='font-family: Arial; font-size: 13pt;'>Guardar</div>","<div style='font-family: Arial; font-size: 11pt;'>Esta seguro que desea guardar</div>", function(){

                    if (data.res === 'fail') {

                        $("#LoadingImage").hide();

                        alertify.alert("<div style='font-family: Arial; font-size: 13pt;'>Confirmacion</div>","<div style='font-size: 12pt;'>" + data.msg + " </div>");
                        /*
                        var modal = $('#exampleconfirmacion');
                        modal.find('.modal-title').text("Confirmación");
                        modal.find('#modal-message').html(data.msg);
                        $('#exampleconfirmacion').modal('show');
                        */

                    } else if (data.res === 'all') {

                        $("#LoadingImage").hide();

                        alertify.alert("<div style='font-family: Arial; font-size: 13pt;'>Registro exitoso.</div>","<div style='color: #009d48; font-size: 12pt;'>" + data.msg + " </div>");
                        /*
                        var modal = $('#exampleconfirmacion');
                        modal.find('.modal-title').text("Registro exitoso.");
                        modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + " </div>");
                        $('#exampleconfirmacion').modal('show');
                        */

                        $("#frmUsuarios").each(function () {
                            this.reset();
                        });

                        var oTable = $('#tblRol').dataTable();
                        oTable.fnDestroy();
                        tabla();
                        }
                    }, function(){
                        alertify.error('Cancelado');
                        location.reload();
                    });
                }
            });
        }
    });

    //evento del boton consultar de la tabla usuarios existentes, Este evento captura el id de la fila en la que se encuentra el registro 
    //que se ha seleccionado, luego por Ajax en mandado este dato al controlador con el numero del caso a ejecutar para traer toda la 
    //información del registro seleccionado.
    $('#tblRol').on('click', 'a.consult', function () {

        $("#LoadingImage").show();

        /*
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#nombre").css({"border": "", "box-shadow": ""});
        $("#apellido").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#cargo").css({"border": "", "box-shadow": ""});
        $("#fecha").css({"border": "", "box-shadow": ""});
        */

        $('#documento, #nombre, #apellido, #telefono, #celular, #email, #direccion, #cargo, #fecha').css({"border": "", "box-shadow": ""});

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlUsuarios.php?opcion=2",
            data: {idUsuario: id},
            error: function (jqXHR, textStatus, errorThrown) {
                //*Ocurrió un eror en la petición ajax
                $("#LoadingImage").hide();
                console.log(textStatus + "\n" + errorThrown);
            },
            success: function (result) {
                var data = eval('(' + result + ')');

                if (data.res === 'fail') {

                    $("#LoadingImage").hide();

                    alertify.alert("<div style='font-family: Arial; font-size: 13pt;'>Confirmación</div>",data.msg);
                    /*
                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text("Confirmación");
                    modal.find('#modal-message').html(data.msg);
                    $('#exampleconfirmacion').modal('show');
                    */

                } else if (data.res === 'all') {

                    $("#LoadingImage").hide();
                    //Todos los campos son deshabilitados en el momentos de la consulta
                    $("#documento").attr('disabled', 'disabled');
                    $("#nombre").attr('disabled', 'disabled');
                    $("#apellido").attr('disabled', 'disabled');
                    $("#tarjeta").attr('disabled', 'disabled');
                    $("#telefono").attr('disabled', 'disabled');
                    $("#celular").attr('disabled', 'disabled');
                    $("#email").attr('disabled', 'disabled');
                    $("#direccion").attr('disabled', 'disabled');
                    $("#cargo").attr('disabled', 'disabled');

                    //Por medio del vector recibido del controlador se recibe todos los datos y se les asignar a sus respectivos campos
                    $("#idUsuario").val(data.row.IdEmpleado);
                    $("#documento").val(data.row.Documento);
                    $("#nombre").val(data.row.Nombres);
                    $("#apellido").val(data.row.Apellidos);
                    $("#telefono").val(data.row.TelefonoEmpleado);
                    $("#celular").val(data.row.CelularEmpleado);
                    $("#email").val(data.row.CorreoEmpleado);
                    $("#direccion").val(data.row.DireccionEmpleado);
                    $("#cargo").val(data.row.Cargo);
                    $("#tarjeta").val(data.row.TarjetaProfecional);

                    $("#modi").show();
                    $("#restore").show();
                    $("#save").hide();
                    $("#update").hide();
                }
            }
        });
    });

    //evento del boton modificar para habilitar los campos de texto del formulario, en caso que se requiera modificar la información.
    $('#modi').click(function () {

        $("#documento").removeAttr("disabled");
        $("#nombre").removeAttr("disabled");
        $("#apellido").removeAttr("disabled");
        $("#telefono").removeAttr("disabled");
        $("#celular").removeAttr("disabled");
        $("#email").removeAttr("disabled");
        $("#departamento").removeAttr("disabled");
        $("#municipio").removeAttr("disabled");
        $("#direccion").removeAttr("disabled");
        $("#cargo").removeAttr("disabled");
        $("#tarjeta").removeAttr("disabled");

        if ($("#cargo").val() === "Psicólogo") {

            $("#tarjeta").removeAttr("disabled");
        } else {

            $("#tarjeta").attr('disabled', 'disabled');
        }

        $("#update").show();
        $("#modi").hide();
        $("#restore").hide();
    });

    //evento del boton restablecer para confirmar si desea restablecer la cuenta de usuario del registro consultado.
    $('#restore').click(function () {
        
        var usuario = "";
        var email = $("#email").val();
        email = email.split("@");
        usuario = email[0];

        var modal = $('#confirmacionRestablecer');
        modal.find('.modal-title').text("Retablecer Cuenta");
        modal.find('#modal-message').html($("#nombre").val() + " " + $("#apellido").val() + "<br><br><strong>Usuario: </strong>" + usuario + "<br><strong>Contraseña: </strong>fundacion" + $("#documento").val());
        $('#confirmacionRestablecer').modal('show');

    });

    //evento del boton si en el modal de confirmar si se desea restablecer la cuenta de usuario, Este captura la información del 
    //formulario y por medio del Ajax la envía al controlador con su respectivos caso a ejecutar.
    $('#yes').click(function () {

        $("#LoadingImage").show();
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlUsuarios.php?opcion=6",
            data: $("#frmUsuarios").serialize(),
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus + "\n" + errorThrown);
            },
            success: function (result) {
                var data = eval('(' + result + ')');

                if (data.res === 'fail') {

                    $('#exampleconfirmacion').modal('hide');

                    $("#LoadingImage").hide();
                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text("Confirmación");
                    modal.find('#modal-message').html(data.msg);
                    $('#exampleconfirmacion').modal('show');

                } else if (data.res === 'all') {

                    $('#exampleconfirmacion').modal('hide');

                    $("#LoadingImage").hide();
                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text("Restablecida con éxito.");
                    modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + " </div>");
                    $('#exampleconfirmacion').modal('show');
                }
            }
        });
    });

    //evento del boton nuevo el cual permite limpiar todo el formulario y restablecer las funciones.
    $('#return').click(function () {

        $("#documento").removeAttr("disabled");
        $("#nombre").removeAttr("disabled");
        $("#apellido").removeAttr("disabled");
        $("#telefono").removeAttr("disabled");
        $("#celular").removeAttr("disabled");
        $("#email").removeAttr("disabled");
        $("#departamento").removeAttr("disabled");
        $("#municipio").removeAttr("disabled");
        $("#direccion").removeAttr("disabled");
        $("#cargo").removeAttr("disabled");
        $("#tarjeta").attr('disabled', 'disabled');

        $("#documento").css({"border": "", "box-shadow": ""});
        $("#nombre").css({"border": "", "box-shadow": ""});
        $("#apellido").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#departamento").css({"border": "", "box-shadow": ""});
        $("#municipio").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#cargo").css({"border": "", "box-shadow": ""});

        $("#frmUsuarios").each(function () {
            this.reset();
        });

        $("#save").show();
        $("#update").hide();
        $("#modi").hide();
        $("#restore").hide();
    });

    //evento del boton antualizar, Este evento captura toda la información del formulario usuarios pasando por la función validarDatosRegistro, 
    //la cual valida que los campo que son obligatorios su hayan sido diligenciados, al cumplir con los campos requeridos por medio de un 
    //Ajax es mandada esta información al controlador y el caso del controlador para realizar la actualización de la información.
    $('#update').click(function () {

        validarDatosRegistro();

        $("#LoadingImage").show();

        if (datosRegistro == false) {
            $("#LoadingImage").hide();
        } else {

            $("#LoadingImage").show();

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlUsuarios.php?opcion=3",
                data: $("#frmUsuarios").serialize(),
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus + "\n" + errorThrown);
                },
                success: function (result) {
                    var data = eval('(' + result + ')');

                    if (data.res === 'fail') {

                        $("#LoadingImage").hide();

                        alertify.alert("<div style='font-family: Arial; font-size: 13pt;'>Confirmación</div>","<div style='font-size: 12pt;'>" + data.msg + " </div>");
                        /*
                        var modal = $('#exampleconfirmacion');
                        modal.find('.modal-title').text("Confirmación");
                        modal.find('#modal-message').html(data.msg);
                        $('#exampleconfirmacion').modal('show');
                        */

                    } else if (data.res === 'all') {

                        $("#LoadingImage").hide();

                        alertify.alert("<div style='font-family: Arial; font-size: 13pt;'>Modificación exitosa.</div>","<div style='color: #009d48; font-size: 12pt;'>" + data.msg + " </div>");
                        /*
                        var modal = $('#exampleconfirmacion');
                        modal.find('.modal-title').text("Modificación exitosa.");
                        modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + " </div>");
                        $('#exampleconfirmacion').modal('show');
                        */

                        $("#frmUsuarios").each(function () {
                            this.reset();
                        });

                        $("#save").show();
                        $("#modi").hide();
                        $("#update").hide();
                        $("#restore").hide();

                        var oTable = $('#tblRol').dataTable();
                        oTable.fnDestroy();
                        tabla();
                    }
                }
            });
        }
    });

    //evento del boton eliminar de la tabla usuarios existentes cuando se desea eliminar un registro, este captura el id enviándola al 
    //controlador con su respectivo caso a ejecutar.
    $('#tblRol').on('click', 'a.delete', function () {

        $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRol tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlUsuarios.php?opcion=4",
            data: {idUsuario: id},
            error: function (jqXHR, textStatus, errorThrown) {
                //*Ocurrió un eror en la petición ajax
                $("#LoadingImage").hide();
                console.log(textStatus + "\n" + errorThrown);
            },
            success: function (result) {
                $("#LoadingImage").hide();
                var data = eval('(' + result + ')')

                if (data.res === 'fail') {

                    alertify.alert("<div style='font-family: Arial; font-size: 13pt;'>Confirmación</div>","<div style='color: #009d48; font-size: 12pt;'>" + data.msg + "</div>");
                    /*
                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text("Confirmación");
                    modal.find('#modal-message').html(data.msg);
                    $('#exampleconfirmacion').modal('show');
                    */

                } else if (data.res === 'all') {

                    alertify.alert(td[2].innerText + " " + td[3].innerText,"<div style='color: #009d48; font-size: 12pt;'>" + data.msg + "</div>");
                    /*
                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text(td[2].innerText + " " + td[3].innerText);
                    modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + "</div>");
                    $('#exampleconfirmacion').modal('show');
                    */

                    var oTable = $('#tblRol').dataTable();
                    oTable.fnDestroy();
                    tabla();

                    var oTable2 = $('#tblRol2').dataTable();
                    oTable2.fnDestroy();
                    tabla2();
                }
            }
        });
    });

    //evento del boton consultar de la tabla usuarios eliminados, Este evento captura el id de la fila en la que se encuentra el registro 
    //que se ha seleccionado, luego por Ajax en mandado este dato al controlador con el numero del caso a ejecutar para traer toda la 
    //información del registro seleccionado.
    $('#tblRol2').on('click', 'a.consult', function () {

        $("#LoadingImage").show();

        $("#documento").css({"border": "", "box-shadow": ""});
        $("#nombre").css({"border": "", "box-shadow": ""});
        $("#apellido").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#cargo").css({"border": "", "box-shadow": ""});
        $("#fecha").css({"border": "", "box-shadow": ""});

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlUsuarios.php?opcion=2",
            data: {idUsuario: id},
            error: function (jqXHR, textStatus, errorThrown) {
                //*Ocurrió un eror en la petición ajax
                $("#LoadingImage").hide();
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
                    //Todos los campos son deshabilitados en el momentos de la consulta
                    $("#documento").attr('disabled', 'disabled');
                    $("#nombre").attr('disabled', 'disabled');
                    $("#apellido").attr('disabled', 'disabled');
                    $("#tarjeta").attr('disabled', 'disabled');
                    $("#telefono").attr('disabled', 'disabled');
                    $("#celular").attr('disabled', 'disabled');
                    $("#email").attr('disabled', 'disabled');
                    $("#direccion").attr('disabled', 'disabled');
                    $("#cargo").attr('disabled', 'disabled');

                    //Por medio del vector recibido del controlador se recibe todos los datos y se les asignar a sus respectivos campos
                    $("#idUsuario").val(data.row.IdEmpleado);
                    $("#documento").val(data.row.Documento);
                    $("#nombre").val(data.row.Nombres);
                    $("#apellido").val(data.row.Apellidos);
                    $("#telefono").val(data.row.TelefonoEmpleado);
                    $("#celular").val(data.row.CelularEmpleado);
                    $("#email").val(data.row.CorreoEmpleado);
                    $("#direccion").val(data.row.DireccionEmpleado);
                    $("#cargo").val(data.row.Cargo);
                    $("#tarjeta").val(data.row.TarjetaProfecional);

                    $("#modi").show();
                    $("#restore").show();
                    $("#save").hide();
                }
            }
        });
    });

    //evento del boton habilitar de la tabla usuarios eliminados cuando se desea volver habilitar un registro eliminado, este captura 
    //el id enviándola al controlador con su respectivo caso a ejecutar.
    $('#tblRol2').on('click', 'a.enable', function () {

        $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRol2 tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlUsuarios.php?opcion=5",
            data: {idUsuario: id},
            error: function (jqXHR, textStatus, errorThrown) {
                //*Ocurrió un eror en la petición ajax
                $("#LoadingImage").hide();
                console.log(textStatus + "\n" + errorThrown);
            },
            success: function (result) {
                $("#LoadingImage").hide();
                var data = eval('(' + result + ')')

                if (data.res === 'fail') {

                    alertify.alert("<div style='font-family: Arial; font-size: 13pt;'>Confirmación</div>","<div style='color: #009d48; font-size: 12pt;'>" + data.msg + "</div>");
                    /*
                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text("Confirmación");
                    modal.find('#modal-message').html(data.msg);
                    $('#exampleconfirmacion').modal('show');
                    */

                } else if (data.res === 'all') {

                    alertify.alert(td[2].innerText + " " + td[3].innerText,"<div style='color: #009d48; font-size: 13pt;'>" + data.msg + "</div>");
                    /*
                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text(td[2].innerText + " " + td[3].innerText);
                    modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + "</div>");
                    $('#exampleconfirmacion').modal('show');
                    */

                    var oTable2 = $('#tblRol2').dataTable();
                    oTable2.fnDestroy();
                    tabla2();

                    var oTable = $('#tblRol').dataTable();
                    oTable.fnDestroy();
                    tabla();
                }
            }
        });
    });
});

//consulta para llenar la tabla de usuarios existentes.
function tabla() {

    $('#tblRol').dataTable({
        "bProcessing": true,
        "sServerMethod": 'GET',
        "bServerSide": true,
        "bRetrieve": true,
        "info": false,
        "bFilter": true,
        "ordering": true,
        "bAutoWidth": false,
        "bLengthChange": false,
        "bPaginate": true,
        "iDisplayLength": 10,
        "sAjaxSource": "Usuarios/consultarDatosTablaUsuarios.php",
        "order": [[4, "asc"]],
        "aoColumnDefs": [{
                "aTargets": [2],
                "sType": "html"
                , "mRender": function (date, type, full) {
                    return ("" + full[2].toString());
                }
            }],
        "oLanguage": {
            "oPaginate": {
                "sFirst": "Primera",
                "sPrevious": "Anterior",
                "sNext": "Siguiente",
                "sLast": "&Uacute;ltima"
            },
            "sZeroRecords": "No se encontraron registros",
            "sEmptyTable": "No hay registros",
            "sSearch": "B&uacute;squeda R&aacute;pida"
        }
    }).fnSetFilteringDelay(250);
}

//consulta para llenar la tabla de usuarios eliminados.
function tabla2() {

    $('#tblRol2').dataTable({
        "bProcessing": true,
        "sServerMethod": 'GET',
        "bServerSide": true,
        "bRetrieve": true,
        "info": false,
        "bFilter": true,
        "ordering": true,
        "bAutoWidth": false,
        "bLengthChange": false,
        "bPaginate": true,
        "iDisplayLength": 10,
        "sAjaxSource": "Usuarios/consultarDatosTablaUsuariosEliminados.php",
        "order": [[4, "asc"]],
        "aoColumnDefs": [{
                "aTargets": [2],
                "sType": "html"
                , "mRender": function (date, type, full) {
                    return ("" + full[2].toString());
                }
            }],
        "oLanguage": {
            "oPaginate": {
                "sFirst": "Primera",
                "sPrevious": "Anterior",
                "sNext": "Siguiente",
                "sLast": "&Uacute;ltima"
            },
            "sZeroRecords": "No se encontraron registros",
            "sEmptyTable": "No hay registros",
            "sSearch": "B&uacute;squeda R&aacute;pida"
        }
    }).fnSetFilteringDelay(250);
}

//función para validar todos los campos del formulario.
function validarDatosRegistro() {

    var email = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    var celular = /^[0-9]{10}$/;

    if ($('#documento').val() === "") {

        /*
        $("#nombre").css({"border": "", "box-shadow": ""});
        $("#apellido").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#cargo").css({"border": "", "box-shadow": ""});
        $("#fecha").css({"border": "", "box-shadow": ""});
        */

        $('#nombre, #apellido, #celular, #email, #cargo, #fecha').css({"border": "", "box-shadow": ""});

        alertify.alert("<div style='font-family: Arial; font-size: 13pt;'>Faltan Datos</div>","<div style='color: red; font-size: 10pt'>Ingrese el documento del usuario a registrar. </div>");
        /*
        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese el documento del usuario a registrar. </div>");
        $('#exampleconfirmacion').modal('show');
        */

        $("#documento").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        datosRegistro = false;

    } else if ($('#nombre').val() === "") {

        /*
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#apellido").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#cargo").css({"border": "", "box-shadow": ""});
        $("#fecha").css({"border": "", "box-shadow": ""});
        */

        $('#documento, #apellido, #celular, #email, #cargo, #fecha').css({"border": "", "box-shadow": ""});


        alertify.alert("<div style='font-family: Arial; font-size: 13pt;'>Faltan Datos</div>","<div style='color: red; font-size: 10pt'>Ingrese el nombre del usuario a registrar. </div>");
        /*
        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el nombre del usuario a registrar. </div>");
        $('#exampleconfirmacion').modal('show');
        */

        $("#nombre").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        datosRegistro = false;

    } else if ($('#apellido').val() === "") {

        /*
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#nombre").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#cargo").css({"border": "", "box-shadow": ""});
        $("#fecha").css({"border": "", "box-shadow": ""});
        */

        $('#documento, #nombre, #celular, #email, #cargo, #fecha').css({"border": "", "box-shadow": ""});

        alertify.alert("<div style='font-family: Arial; font-size: 13pt;'>Faltan Datos</div>","<div style='color: red; font-size: 10pt'>Ingrese los apellidos del usuario a registrar. </div>");
        /*
        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese los apellidos del usuario a registrar. </div>");
        $('#exampleconfirmacion').modal('show');
        */

        $("#apellido").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        datosRegistro = false;

    } else if ($('#celular').val() === "") {

        /*
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#nombre").css({"border": "", "box-shadow": ""});
        $("#apellido").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#cargo").css({"border": "", "box-shadow": ""});
        $("#fecha").css({"border": "", "box-shadow": ""});
        */

        $('#documento, #nombre, #apellido, #email, #cargo, #fecha').css({"border": "", "box-shadow": ""});

        alertify.alert("<div style='font-family: Arial; font-size: 13pt;'>Faltan Datos</div>","<div style='color: red; font-size: 10pt'>Ingrese el celular del usuario a registrar. </div>");
        /*
        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese el celular del usuario a registrar. </div>");
        $('#exampleconfirmacion').modal('show');
        */

        $("#celular").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        datosRegistro = false;

    } else if (!celular.test($("#celular").val().trim())) {

        /*
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#nombre").css({"border": "", "box-shadow": ""});
        $("#apellido").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#cargo").css({"border": "", "box-shadow": ""});
        */

        $('#documento, #nombre, #apellido, #telefono, #email, #cargo').css({"border": "", "box-shadow": ""});

        alertify.alert("<div style='font-family: Arial; font-size: 13pt;'>Faltan Datos</div>","<div style='color: red; font-size: 10pt'>Formato del celular es incorrecto.  </div>");
        /*
        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text('Alerta');
        modal.find('#modal-message').html("<div style='color: red'> Formato del celular es incorrecto. </div>");
        $('#exampleconfirmacion').modal('show');
        */

        $("#celular").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        datosRegistro = false;

    } else if ($('#email').val() === "") {

        /*
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#nombre").css({"border": "", "box-shadow": ""});
        $("#apellido").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#cargo").css({"border": "", "box-shadow": ""});
        $("#fecha").css({"border": "", "box-shadow": ""});
        */

        $('#documento, #nombre, #apellido, #celular, #cargo, #fecha').css({"border": "", "box-shadow": ""});

        alertify.alert("<div style='font-family: Arial; font-size: 13pt;'>Faltan Datos</div>","<div style='color: red; font-size: 10pt'>Ingrese el e-mail del usuario a registrar. </div>");
        /*
        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese el e-mail del usuario a registrar. </div>");
        $('#exampleconfirmacion').modal('show');
        */

        $("#email").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        datosRegistro = false;

    } else if (!email.test($("#email").val().trim())) {

        /*
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#nombre").css({"border": "", "box-shadow": ""});
        $("#apellido").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#cargo").css({"border": "", "box-shadow": ""});
        */

        $('#documento, #nombre, #apellido, #celular, #cargo').css({"border": "", "box-shadow": ""});

        alertify.alert("<div style='font-family: Arial; font-size: 13pt;'>Faltan Datos</div>","<div style='color: red; font-size: 10pt'>Formato del e-mail es incorrecto. </div>");
        /*
        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text('Alerta');
        modal.find('#modal-message').html("<div style='color: red'> Formato del e-mail es incorrecto. </div>");
        $('#exampleconfirmacion').modal('show');
        */

        $("#email").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        datosRegistro = false;

    } else if ($('#cargo').val() == 0) {

        /*
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#nombre").css({"border": "", "box-shadow": ""});
        $("#apellido").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        */

        $('#documento, #nombre, #apellido, #celular, #email').css({"border": "", "box-shadow": ""});

        alertify.alert("<div style='font-family: Arial; font-size: 13pt;'>Faltan Datos</div>","<div style='color: red; font-size: 10pt'>Seleccione el cargo del usuario a registrar. </div>");
        /*
        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el cargo del usuario a registrar. </div>");
        $('#exampleconfirmacion').modal('show');
        */

        $("#cargo").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        datosRegistro = false;

    } else {

        /*
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#nombre").css({"border": "", "box-shadow": ""});
        $("#apellido").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#cargo").css({"border": "", "box-shadow": ""});
        */

        $('#documento, #nombre, #apellido, #celular, #email, #cargo').css({"border": "", "box-shadow": ""});

        datosRegistro = true;
    }
}