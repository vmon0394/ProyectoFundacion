$(document).ready(function () {

    //llamado del las funciones para llenar las tablas.
    tabla();
    tabla2();

    //evento del boton guardar, Este evento captura toda la información del formulario padrinos pasando por la función validarDatosRegistro, 
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
                url: "../Controller/ctrlPadrinos.php?opcion=1",
                data: $("#frmPadrinos").serialize(),
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus + "\n" + errorThrown);
                },
                success: function (result) {
                    var data = eval('(' + result + ')');

                    if (data.res === 'fail') {

                        $("#LoadingImage").hide();
                        var modal = $('#exampleconfirmacion');
                        modal.find('.modal-title').text("Confirmación");
                        modal.find('#modal-message').html("<div style='color: red'>" + data.msg + " </div>");
                        $('#exampleconfirmacion').modal('show');

                    } else if (data.res === 'all') {

                        $("#LoadingImage").hide();
                        var modal = $('#exampleconfirmacion');
                        modal.find('.modal-title').text("Registro exitoso.");
                        modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + " </div>");
                        $('#exampleconfirmacion').modal('show');

                        $("#documento").css({"border": "", "box-shadow": ""});
                        $("#nombre").css({"border": "", "box-shadow": ""});
                        $("#apellido").css({"border": "", "box-shadow": ""});
                        $("#compania").css({"border": "", "box-shadow": ""});
                        $("#departamentoCompania").css({"border": "", "box-shadow": ""});
                        $("#ciudadCompania").css({"border": "", "box-shadow": ""});

                        $("#frmPadrinos").each(function () {
                            this.reset();
                        });

                        var oTable = $('#tblRol').dataTable();
                        oTable.fnDestroy();
                        tabla();
                    }
                }
            });
        }
    });

    //evento del boton consultar de la tabla padrinos existentes, Este evento captura el id de la fila en la que se encuentra el registro 
    //que se ha seleccionado, luego por Ajax en mandado este dato al controlador con el numero del caso a ejecutar para traer toda la 
    //información del registro seleccionado.
    $('#tblRol').on('click', 'a.consult', function () {

        $("#LoadingImage").show();

        $("#documento").css({"border": "", "box-shadow": ""});
        $("#nombre").css({"border": "", "box-shadow": ""});
        $("#apellido").css({"border": "", "box-shadow": ""});
        $("#compania").css({"border": "", "box-shadow": ""});
        $("#departamentoCompania").css({"border": "", "box-shadow": ""});
        $("#ciudadCompania").css({"border": "", "box-shadow": ""});
        $("#fechaAutorizacion").css({"border": "", "box-shadow": ""});

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlPadrinos.php?opcion=2",
            data: {idPadrino: id},
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
                    modal.find('#modal-message').html("<div style='color: red'>" + data.msg + " </div>");
                    $('#exampleconfirmacion').modal('show');

                } else if (data.res === 'all') {

                    $("#LoadingImage").hide();
                    //Todos los campos son deshabilitados en el momentos de la consulta
                    $("#documento").attr('disabled', 'disabled');
                    $("#nombre").attr('disabled', 'disabled');
                    $("#apellido").attr('disabled', 'disabled');
                    $("#telefono").attr('disabled', 'disabled');
                    $("#celular").attr('disabled', 'disabled');
                    $("#email").attr('disabled', 'disabled');
                    $("#compania").attr('disabled', 'disabled');
                    $("#sede").attr('disabled', 'disabled');
                    $("#departamentoCompania").attr('disabled', 'disabled');
                    $("#ciudadCompania").attr('disabled', 'disabled');
                    $("#aporte").attr('disabled', 'disabled');
                    $("#fechaAutorizacion").attr('disabled', 'disabled');

                    //Por medio del vector recibido del controlador se recibe todos los datos y se les asignar a sus respectivos campos
                    $("#idPadrino").val(data.row.Id_Padrino);
                    $("#documento").val(data.row.Documento_padrino);
                    $("#nombre").val(data.row.Nombres_padrino);
                    $("#apellido").val(data.row.Apellidos_padrino);
                    $("#telefono").val(data.row.Telefono_padrino);
                    $("#celular").val(data.row.Celular_padrino);
                    $("#email").val(data.row.Email_padrino);
                    $("#compania").val(data.row.IdCompania);
                    $("#sede").val(data.row.Sede);
                    $("#departamentoCompania").val(data.row.IdDepartamento);
                    Carga2('../Controller/ctrlCombos.php?opcion=1&depar=' + data.row.IdDepartamento, 'ciudadCompania', data);

                    $("#aporte").val(data.row.Aporte_quincenal);
                    $("#fechaAutorizacion").val(data.row.Fecha_autorizacion);

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
        $("#compania").removeAttr("disabled");
        $("#sede").removeAttr("disabled");
        $("#departamentoCompania").removeAttr("disabled");
        $("#ciudadCompania").removeAttr("disabled");
        $("#aporte").removeAttr("disabled");
        $("#fechaAutorizacion").removeAttr("disabled");

        $("#update").show();
        $("#modi").hide();
        $("#restore").hide();
    });

    //evento del boton nuevo el cual permite limpiar todo el formulario y restablecer las funciones.
    $('#return').click(function () {

        $("#documento").removeAttr("disabled");
        $("#nombre").removeAttr("disabled");
        $("#apellido").removeAttr("disabled");
        $("#telefono").removeAttr("disabled");
        $("#celular").removeAttr("disabled");
        $("#email").removeAttr("disabled");
        $("#compania").removeAttr("disabled");
        $("#sede").removeAttr("disabled");
        $("#departamentoCompania").removeAttr("disabled");
        $("#ciudadCompania").removeAttr("disabled");
        $("#aporte").removeAttr("disabled");
        $("#fechaAutorizacion").removeAttr("disabled");

        $("#documento").css({"border": "", "box-shadow": ""});
        $("#nombre").css({"border": "", "box-shadow": ""});
        $("#apellido").css({"border": "", "box-shadow": ""});
        $("#compania").css({"border": "", "box-shadow": ""});
        $("#departamentoCompania").css({"border": "", "box-shadow": ""});
        $("#ciudadCompania").css({"border": "", "box-shadow": ""});
        $("#fechaAutorizacion").css({"border": "", "box-shadow": ""});

        $("#frmPadrinos").each(function () {
            this.reset();
        });

        $("#save").show();
        $("#update").hide();
        $("#modi").hide();
        $("#restore").hide();
    });

    //evento del boton antualizar, Este evento captura toda la información del formulario padrinos pasando por la función validarDatosRegistro, 
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
                url: "../Controller/ctrlPadrinos.php?opcion=3",
                data: $("#frmPadrinos").serialize(),
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus + "\n" + errorThrown);
                },
                success: function (result) {
                    var data = eval('(' + result + ')');

                    if (data.res === 'fail') {

                        $("#LoadingImage").hide();
                        var modal = $('#exampleconfirmacion');
                        modal.find('.modal-title').text("Confirmación");
                        modal.find('#modal-message').html("<div style='color: red'>" + data.msg + " </div>");
                        $('#exampleconfirmacion').modal('show');

                    } else if (data.res === 'all') {

                        $("#LoadingImage").hide();
                        var modal = $('#exampleconfirmacion');
                        modal.find('.modal-title').text("Modificación exitosa.");
                        modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + " </div>");
                        $('#exampleconfirmacion').modal('show');

                        $("#documento").css({"border": "", "box-shadow": ""});
                        $("#nombre").css({"border": "", "box-shadow": ""});
                        $("#apellido").css({"border": "", "box-shadow": ""});
                        $("#compania").css({"border": "", "box-shadow": ""});
                        $("#departamentoCompania").css({"border": "", "box-shadow": ""});
                        $("#ciudadCompania").css({"border": "", "box-shadow": ""});

                        $("#frmPadrinos").each(function () {
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

    //evento del boton eliminar de la tabla padrinos existentes cuando se desea eliminar un registro, este captura el id enviándola al 
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
            url: "../Controller/ctrlPadrinos.php?opcion=4",
            data: {idPadrino: id},
            error: function (jqXHR, textStatus, errorThrown) {
                //*Ocurrió un eror en la petición ajax
                $("#LoadingImage").hide();
                console.log(textStatus + "\n" + errorThrown);
            },
            success: function (result) {
                $("#LoadingImage").hide();
                var data = eval('(' + result + ')')

                if (data.res === 'fail') {

                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text("Confirmación");
                    modal.find('#modal-message').html("<div style='color: red'>" + data.msg + " </div>");
                    $('#exampleconfirmacion').modal('show');

                } else if (data.res === 'all') {

                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text(td[2].innerText + " " + td[3].innerText);
                    modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + "</div>");
                    $('#exampleconfirmacion').modal('show');

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

    //evento del boton consultar de la tabla padrinos eliminados, Este evento captura el id de la fila en la que se encuentra el registro 
    //que se ha seleccionado, luego por Ajax en mandado este dato al controlador con el numero del caso a ejecutar para traer toda la 
    //información del registro seleccionado.
    $('#tblRol2').on('click', 'a.consult', function () {

        $("#LoadingImage").show();

        $("#documento").css({"border": "", "box-shadow": ""});
        $("#nombre").css({"border": "", "box-shadow": ""});
        $("#apellido").css({"border": "", "box-shadow": ""});
        $("#compania").css({"border": "", "box-shadow": ""});
        $("#departamentoCompania").css({"border": "", "box-shadow": ""});
        $("#ciudadCompania").css({"border": "", "box-shadow": ""});
        $("#fechaAutorizacion").css({"border": "", "box-shadow": ""});

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlPadrinos.php?opcion=2",
            data: {idPadrino: id},
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
                    modal.find('#modal-message').html("<div style='color: red'>" + data.msg + " </div>");
                    $('#exampleconfirmacion').modal('show');

                } else if (data.res === 'all') {

                    $("#LoadingImage").hide();
                    //Todos los campos son deshabilitados en el momentos de la consulta
                    $("#documento").attr('disabled', 'disabled');
                    $("#nombre").attr('disabled', 'disabled');
                    $("#apellido").attr('disabled', 'disabled');
                    $("#email").attr('disabled', 'disabled');
                    $("#pais").attr('disabled', 'disabled');
                    $("#compania").attr('disabled', 'disabled');
                    $("#departamentoCompania").attr('disabled', 'disabled');
                    $("#ciudadCompania").attr('disabled', 'disabled');
                    $("#fechaAutorizacion").attr('disabled', 'disabled');
                    $("#monto").attr('disabled', 'disabled');

                    //Por medio del vector recibido del controlador se recibe todos los datos y se les asignar a sus respectivos campos
                    $("#idPadrino").val(data.row.Id_Padrino);
                    $("#documento").val(data.row.Documento_padrino);
                    $("#nombre").val(data.row.Nombres_padrino);
                    $("#apellido").val(data.row.Apellidos_padrino);
                    $("#email").val(data.row.Email_padrino);
                    $("#pais").val(data.row.Pais);
                    $("#compania").val(data.row.IdCompania);
                    $("#departamentoCompania").val(data.row.IdDepartamento);
                    Carga2('../Controller/ctrlCombos.php?opcion=1&depar=' + data.row.IdDepartamento, 'ciudadCompania', data);

                    $("#fechaAutorizacion").val(data.row.Fecha_autorizacion);
                    $("#monto").val(data.row.Monto);

                    $("#modi").show();
                    $("#restore").show();
                    $("#save").hide();
                }
            }
        });
    });

    //evento del boton habilitar de la tabla padrinos eliminados cuando se desea volver habilitar un registro eliminado, este captura 
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
            url: "../Controller/ctrlPadrinos.php?opcion=5",
            data: {idPadrino: id},
            error: function (jqXHR, textStatus, errorThrown) {
                //*Ocurrió un eror en la petición ajax
                $("#LoadingImage").hide();
                console.log(textStatus + "\n" + errorThrown);
            },
            success: function (result) {
                $("#LoadingImage").hide();
                var data = eval('(' + result + ')')

                if (data.res === 'fail') {

                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text("Confirmación");
                    modal.find('#modal-message').html("<div style='color: red'>" + data.msg + " </div>");
                    $('#exampleconfirmacion').modal('show');

                } else if (data.res === 'all') {

                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text(td[2].innerText + " " + td[3].innerText);
                    modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + "</div>");
                    $('#exampleconfirmacion').modal('show');

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

//consulta para llenar la tabla de padrinos existentes.
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
        "sAjaxSource": "Padrinos/consultarDatosTablaPadrinos.php",
        "order": [[2, "asc"]],
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

//consulta para llenar la tabla de padrinos eliminados.
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
        "sAjaxSource": "Padrinos/consultarDatosTablaPadrinosEliminados.php",
        "order": [[2, "asc"]],
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

    if ($('#documento').val() === "") {

        $("#nombre").css({"border": "", "box-shadow": ""});
        $("#apellido").css({"border": "", "box-shadow": ""});
        $("#compania").css({"border": "", "box-shadow": ""});
        $("#departamentoCompania").css({"border": "", "box-shadow": ""});
        $("#ciudadCompania").css({"border": "", "box-shadow": ""});
        $("#fechaAutorizacion").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese el documento del padrino a registrar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#documento").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosRegistro = false;
    } else if ($('#nombre').val() === "") {

        $("#documento").css({"border": "", "box-shadow": ""});
        $("#apellido").css({"border": "", "box-shadow": ""});
        $("#compania").css({"border": "", "box-shadow": ""});
        $("#departamentoCompania").css({"border": "", "box-shadow": ""});
        $("#ciudadCompania").css({"border": "", "box-shadow": ""});
        $("#fechaAutorizacion").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el nombre del padrino a registrar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#nombre").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosRegistro = false;
    } else if ($('#apellido').val() === "") {

        $("#documento").css({"border": "", "box-shadow": ""});
        $("#nombre").css({"border": "", "box-shadow": ""});
        $("#compania").css({"border": "", "box-shadow": ""});
        $("#fechaAutorizacion").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese los apellidos del padrino a registrar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#apellido").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosRegistro = false;
    } else if ($('#compania').val() == 0) {

        $("#documento").css({"border": "", "box-shadow": ""});
        $("#nombre").css({"border": "", "box-shadow": ""});
        $("#apellido").css({"border": "", "box-shadow": ""});
        $("#departamentoCompania").css({"border": "", "box-shadow": ""});
        $("#ciudadCompania").css({"border": "", "box-shadow": ""});
        $("#fechaAutorizacion").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione la compañia del padrino a registrar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#compania").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosRegistro = false;
    } else if ($('#departamentoCompania').val() == 0) {

        $("#documento").css({"border": "", "box-shadow": ""});
        $("#nombre").css({"border": "", "box-shadow": ""});
        $("#apellido").css({"border": "", "box-shadow": ""});
        $("#ciudadCompania").css({"border": "", "box-shadow": ""});
        $("#fechaAutorizacion").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el departamento de la compañia, en caso de no tener seleccion no aplica. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#departamentoCompania").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosRegistro = false;
    } else if ($('#ciudadCompania').val() == 0) {

        $("#documento").css({"border": "", "box-shadow": ""});
        $("#nombre").css({"border": "", "box-shadow": ""});
        $("#apellido").css({"border": "", "box-shadow": ""});
        $("#fechaAutorizacion").css({"border": "", "box-shadow": ""});
        $("#departamentoCompania").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el municipio de la compañia, en caso de no tener seleccion no aplica. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#ciudadCompania").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosRegistro = false;
    } else if ($('#email').val() !== "") {

        if (!email.test($("#email").val().trim())) {

            $("#documento").css({"border": "", "box-shadow": ""});
            $("#nombre").css({"border": "", "box-shadow": ""});
            $("#apellido").css({"border": "", "box-shadow": ""});
            $("#compania").css({"border": "", "box-shadow": ""});
            $("#departamentoCompania").css({"border": "", "box-shadow": ""});
            $("#ciudadCompania").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Formato del e-mail es incorrecto. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#email").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

            datosRegistro = false;
        } else {
            $("#email").css({"border": "", "box-shadow": ""});
            datosRegistro = true;
        }
    } else {

        $("#documento").css({"border": "", "box-shadow": ""});
        $("#nombre").css({"border": "", "box-shadow": ""});
        $("#apellido").css({"border": "", "box-shadow": ""});
        $("#compania").css({"border": "", "box-shadow": ""});
        $("#departamentoCompania").css({"border": "", "box-shadow": ""});
        $("#ciudadCompania").css({"border": "", "box-shadow": ""});
        $("#fechaAutorizacion").css({"border": "", "box-shadow": ""});

        datosRegistro = true;
    }
}