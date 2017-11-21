$(document).ready(function () {

    //llamado del las funciones para llenar las tablas
    tabla();
    tabla2();

    //evento del boton guardar
    $('#save').click(function () {

        validarDatosAliados();

        if (datosAliados == false) {
            $("#LoadingImage").hide();
        } else {

            $("#LoadingImage").show();

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlAliados.php?opcion=1",
                data: $("#frmAliados").serialize(),
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

                        $("#frmAliados").each(function () {
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

    //evento del boton consultar de la tabla aliados existentes
    $('#tblRol').on('click', 'a.consult', function () {

        $("#LoadingImage").show();

        $("#proyecto").css({"border": "", "box-shadow": ""});
        $("#nit").css({"border": "", "box-shadow": ""});
        $("#aliado").css({"border": "", "box-shadow": ""});
        $("#departamento").css({"border": "", "box-shadow": ""});
        $("#municipio").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlAliados.php?opcion=2",
            data: {idAliado: id},
            error: function (jqXHR, textStatus, errorThrown) {
                //*Ocurrió un eror en la petición ajax
                $("#LoadingImage").hide();
                console.log(textStatus + "\n" + errorThrown);
            },
            success: function (result) {
                $("#LoadingImage").hide();
                var data = eval('(' + result + ')');

                if (data.res === 'fail') {

                    $("#LoadingImage").hide();
                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text("Confirmación");
                    modal.find('#modal-message').html(data.msg);
                    $('#exampleconfirmacion').modal('show');

                } else if (data.res === 'all') {

                    $("#proyecto").attr('disabled', 'disabled');
                    $("#nit").attr('disabled', 'disabled');
                    $("#aliado").attr('disabled', 'disabled');
                    $("#departamento").attr('disabled', 'disabled');
                    $("#municipio").attr('disabled', 'disabled');
                    $("#direccion").attr('disabled', 'disabled');
                    $("#contacto").attr('disabled', 'disabled');
                    $("#telefono").attr('disabled', 'disabled');
                    $("#celular").attr('disabled', 'disabled');
                    $("#email").attr('disabled', 'disabled');

                    $("#idAliado").val(data.row.IdAliado);
                    $("#proyecto").val(data.row.IdProyecto);
                    $("#nit").val(data.row.Nit);
                    $("#aliado").val(data.row.NombreAliados);
                    $("#departamento").val(data.row.IdDepartamento);
                    Carga2('../Controller/ctrlCombos.php?opcion=1&depar=' + data.row.IdDepartamento, 'municipio', data);

                    $("#direccion").val(data.row.DireccionAliados);
                    $("#contacto").val(data.row.Contacto);
                    $("#telefono").val(data.row.TelefonoAliados);
                    $("#celular").val(data.row.CelularAliados);
                    $("#email").val(data.row.CorreoAliados);

                    $("#modi").show();
                    $("#save").hide();

                }
            }
        });
    });
    
    //evento del boton consultar de la tabla aliados existentes
    $('#tblRol2').on('click', 'a.consult', function () {

        $("#LoadingImage").show();

        $("#proyecto").css({"border": "", "box-shadow": ""});
        $("#nit").css({"border": "", "box-shadow": ""});
        $("#aliado").css({"border": "", "box-shadow": ""});
        $("#departamento").css({"border": "", "box-shadow": ""});
        $("#municipio").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlAliados.php?opcion=2",
            data: {idAliado: id},
            error: function (jqXHR, textStatus, errorThrown) {
                //*Ocurrió un eror en la petición ajax
                $("#LoadingImage").hide();
                console.log(textStatus + "\n" + errorThrown);
            },
            success: function (result) {
                $("#LoadingImage").hide();
                var data = eval('(' + result + ')');

                if (data.res === 'fail') {

                    $("#LoadingImage").hide();
                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text("Confirmación");
                    modal.find('#modal-message').html(data.msg);
                    $('#exampleconfirmacion').modal('show');

                } else if (data.res === 'all') {

                    $("#proyecto").attr('disabled', 'disabled');
                    $("#nit").attr('disabled', 'disabled');
                    $("#aliado").attr('disabled', 'disabled');
                    $("#departamento").attr('disabled', 'disabled');
                    $("#municipio").attr('disabled', 'disabled');
                    $("#direccion").attr('disabled', 'disabled');
                    $("#contacto").attr('disabled', 'disabled');
                    $("#telefono").attr('disabled', 'disabled');
                    $("#celular").attr('disabled', 'disabled');
                    $("#email").attr('disabled', 'disabled');

                    $("#idAliado").val(data.row.IdAliado);
                    $("#proyecto").val(data.row.IdProyecto);
                    $("#nit").val(data.row.Nit);
                    $("#aliado").val(data.row.NombreAliados);
                    $("#departamento").val(data.row.IdDepartamento);
                    Carga2('../Controller/ctrlCombos.php?opcion=1&depar=' + data.row.IdDepartamento, 'municipio', data);

                    $("#direccion").val(data.row.DireccionAliados);
                    $("#contacto").val(data.row.Contacto);
                    $("#telefono").val(data.row.TelefonoAliados);
                    $("#celular").val(data.row.CelularAliados);
                    $("#email").val(data.row.CorreoAliados);

                    $("#modi").show();
                    $("#save").hide();

                }
            }
        });
    });

    //evento del boton modificar para habilitar los campos de texto del formulario
    $('#modi').click(function () {

        $("#proyecto").removeAttr("disabled");
        $("#nit").removeAttr("disabled");
        $("#aliado").removeAttr("disabled");
        $("#departamento").removeAttr("disabled");
        $("#municipio").removeAttr("disabled");
        $("#direccion").removeAttr("disabled");
        $("#contacto").removeAttr("disabled");
        $("#telefono").removeAttr("disabled");
        $("#celular").removeAttr("disabled");
        $("#email").removeAttr("disabled");

        $("#update").show();
        $("#modi").hide();
        $("#restore").hide();
    });

    //evento del boton volver cuando no desea hacer ninguna de las otras funciones y quiere volver al panel pricipal
    $('#return').click(function () {

        $("#proyecto").removeAttr("disabled");
        $("#nit").removeAttr("disabled");
        $("#aliado").removeAttr("disabled");
        $("#departamento").removeAttr("disabled");
        $("#municipio").removeAttr("disabled");
        $("#direccion").removeAttr("disabled");
        $("#contacto").removeAttr("disabled");
        $("#telefono").removeAttr("disabled");
        $("#celular").removeAttr("disabled");
        $("#email").removeAttr("disabled");

        $("#frmAliados").each(function () {
            this.reset();
        });

        $("#save").show();
        $("#update").hide();
        $("#modi").hide();
    });

    //evento del boton antualizar cuando a modificar los datos del registro consultado
    $('#update').click(function () {

        validarDatosAliados();

        if (datosAliados == false) {
            $("#LoadingImage").hide();
        } else {

            $("#LoadingImage").show();

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlAliados.php?opcion=3",
                data: $("#frmAliados").serialize(),
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
                        modal.find('.modal-title').text("Modificación exitosa.");
                        modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + " </div>");
                        $('#exampleconfirmacion').modal('show');

                        $("#frmAliados").each(function () {
                            this.reset();
                        });

                        var oTable = $('#tblRol').dataTable();
                        oTable.fnDestroy();
                        tabla();

                        $("#save").show();
                        $("#update").hide();
                        $("#modi").hide();
                    }
                }
            });
        }
    });

    //evento del boton eliminar de la tabla aliados existentes cuando se desea eliminar un registro
    $('#tblRol').on('click', 'a.delete', function () {

        $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRol tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlAliados.php?opcion=4",
            data: {idAliado: id},
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
                    modal.find('#modal-message').html(data.msg);
                    $('#exampleconfirmacion').modal('show');

                } else if (data.res === 'all') {

                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text(td[2].innerText);
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

    //evento del boton habilitar de la tabla aliados eliminados cuando se desea volver habilitar un registro eliminado
    $('#tblRol2').on('click', 'a.enable', function () {

        $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRol2 tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlAliados.php?opcion=5",
            data: {idAliado: id},
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
                    modal.find('#modal-message').html(data.msg);
                    $('#exampleconfirmacion').modal('show');

                } else if (data.res === 'all') {

                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text(td[2].innerText);
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

//consulta para llenar la tabla de los aliados existentes
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
        "sAjaxSource": "Aliados/consultarDatosTablaAliados.php",
        "order": [[1, "asc"]],
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

//consulta para llenar la tabla de los aliados eliminados
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
        "iDisplayLength": 5,
        "sAjaxSource": "Aliados/consultarDatosTablaAliadosEliminados.php",
        "order": [[1, "asc"]],
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

//función para validar todos los campos del formulario
function validarDatosAliados() {

    var celular = /^[0-9]{10}$/;

    if ($('#proyecto').val() == 0) {

        $("#nit").css({"border": "", "box-shadow": ""});
        $("#aliado").css({"border": "", "box-shadow": ""});
        $("#departamento").css({"border": "", "box-shadow": ""});
        $("#municipio").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione un proyecto del aliado a registrar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#proyecto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosAliados = false;
    } else if ($('#nit').val() === "") {

        $("#proyecto").css({"border": "", "box-shadow": ""});
        $("#aliado").css({"border": "", "box-shadow": ""});
        $("#departamento").css({"border": "", "box-shadow": ""});
        $("#municipio").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese el NIT del aliado a registrar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#nit").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosAliados = false;
    } else if ($('#aliado').val() === "") {

        $("#proyecto").css({"border": "", "box-shadow": ""});
        $("#nit").css({"border": "", "box-shadow": ""});
        $("#departamento").css({"border": "", "box-shadow": ""});
        $("#municipio").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese el nombre del aliado a registrar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#aliado").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosAliados = false;
    } else if ($('#departamento').val() == 0) {

        $("#proyecto").css({"border": "", "box-shadow": ""});
        $("#nit").css({"border": "", "box-shadow": ""});
        $("#aliado").css({"border": "", "box-shadow": ""});
        $("#municipio").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el Departamento del aliado a registrar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#departamento").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosAliados = false;
    } else if ($('#municipio').val() == 0) {

        $("#proyecto").css({"border": "", "box-shadow": ""});
        $("#nit").css({"border": "", "box-shadow": ""});
        $("#aliado").css({"border": "", "box-shadow": ""});
        $("#departamento").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el Municipio del aliado a registrar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#municipio").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosAliados = false;
    } else if ($('#direccion').val() === "") {

        $("#proyecto").css({"border": "", "box-shadow": ""});
        $("#nit").css({"border": "", "box-shadow": ""});
        $("#aliado").css({"border": "", "box-shadow": ""});
        $("#departamento").css({"border": "", "box-shadow": ""});
        $("#municipio").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese la dirección del aliado a registrar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#direccion").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosAliados = false;
    } else if ($('#contacto').val() === "") {

        $("#proyecto").css({"border": "", "box-shadow": ""});
        $("#nit").css({"border": "", "box-shadow": ""});
        $("#aliado").css({"border": "", "box-shadow": ""});
        $("#departamento").css({"border": "", "box-shadow": ""});
        $("#municipio").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese el nombre del contacto del aliado a registrar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#contacto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosAliados = false;
    } else if ($('#telefono').val() === "") {

        $("#proyecto").css({"border": "", "box-shadow": ""});
        $("#nit").css({"border": "", "box-shadow": ""});
        $("#aliado").css({"border": "", "box-shadow": ""});
        $("#departamento").css({"border": "", "box-shadow": ""});
        $("#municipio").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese el teléfono del contacto del aliado a registrar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#telefono").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosAliados = false;
    } else if ($('#email').val() === "") {

        $("#proyecto").css({"border": "", "box-shadow": ""});
        $("#nit").css({"border": "", "box-shadow": ""});
        $("#aliado").css({"border": "", "box-shadow": ""});
        $("#departamento").css({"border": "", "box-shadow": ""});
        $("#municipio").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese el e-mail del contacto del aliado a registrar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#email").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosAliados = false;
    } else if ($('#celular').val() !== "") {

        if (!celular.test($("#celular").val().trim())) {

            $("#proyecto").css({"border": "", "box-shadow": ""});
            $("#nit").css({"border": "", "box-shadow": ""});
            $("#aliado").css({"border": "", "box-shadow": ""});
            $("#departamento").css({"border": "", "box-shadow": ""});
            $("#municipio").css({"border": "", "box-shadow": ""});
            $("#direccion").css({"border": "", "box-shadow": ""});
            $("#contacto").css({"border": "", "box-shadow": ""});
            $("#telefono").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Formato del celular es incorrecto. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#celular").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

            datosAliados = false;
        } else {
            $("#celular").css({"border": "", "box-shadow": ""});
            datosAliados = true;
        }
    } else {

        $("#proyecto").css({"border": "", "box-shadow": ""});
        $("#nit").css({"border": "", "box-shadow": ""});
        $("#aliado").css({"border": "", "box-shadow": ""});
        $("#departamento").css({"border": "", "box-shadow": ""});
        $("#municipio").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});

        datosAliados = true;
    }
}