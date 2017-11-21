$(document).ready(function () {

    //llamado del las funciones para llenar las tablas
    tabla();
    tabla2();

    //evento del boton guardar
    $('#save').click(function () {

        validarDatosOrganizaciones();

        if (datosOrganizaciones == false) {
            $("#LoadingImage").hide();
        } else {

            $("#LoadingImage").show();

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlOrganizaciones.php?opcion=1",
                data: $("#frmOrganizaciones").serialize(),
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus + "\n" + errorThrown);
                },
                success: function (result) {
                    var data = eval('(' + result + ')')

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

                        $("#frmOrganizaciones").each(function () {
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

        $("#organizacion").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#cargo").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#contacto2").css({"border": "", "box-shadow": ""});
        $("#cargo2").css({"border": "", "box-shadow": ""});
        $("#telefono2").css({"border": "", "box-shadow": ""});
        $("#celular2").css({"border": "", "box-shadow": ""});
        $("#email2").css({"border": "", "box-shadow": ""});


        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlOrganizaciones.php?opcion=2",
            data: {idOrganizacion: id},
            error: function (jqXHR, textStatus, errorThrown) {
                //*Ocurrió un eror en la petición ajax
                $("#LoadingImage").hide();
                console.log(textStatus + "\n" + errorThrown);
            },
            success: function (result) {
                $("#LoadingImage").hide();
                var data = eval('(' + result + ')')

                if (data.res === 'fail') {

                    $("#LoadingImage").hide();
                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text("Confirmación");
                    modal.find('#modal-message').html(data.msg);
                    $('#exampleconfirmacion').modal('show');

                } else if (data.res === 'all') {

                    $("#organizacion").attr('disabled', 'disabled');
                    $("#direccion").attr('disabled', 'disabled');
                    $("#contacto").attr('disabled', 'disabled');
                    $("#cargo").attr('disabled', 'disabled');
                    $("#telefono").attr('disabled', 'disabled');
                    $("#celular").attr('disabled', 'disabled');
                    $("#email").attr('disabled', 'disabled');
                    $("#contacto2").attr('disabled', 'disabled');
                    $("#cargo2").attr('disabled', 'disabled');
                    $("#telefono2").attr('disabled', 'disabled');
                    $("#celular2").attr('disabled', 'disabled');
                    $("#email2").attr('disabled', 'disabled');

                    $("#idOrganizacion").val(data.row.IdOrganizacion);
                    $("#organizacion").val(data.row.NombreOrganizacion);
                    $("#direccion").val(data.row.Direccion);
                    $("#contacto").val(data.row.Contacto);
                    $("#cargo").val(data.row.Cargo);
                    $("#telefono").val(data.row.Telefono);
                    $("#celular").val(data.row.Celular);
                    $("#email").val(data.row.Email);
                    $("#contacto2").val(data.row.Contacto2);
                    $("#cargo2").val(data.row.Cargo2);
                    $("#telefono2").val(data.row.Telefono2);
                    $("#celular2").val(data.row.Celular2);
                    $("#email2").val(data.row.Email2);


                    $("#modi").show();
                    $("#save").hide();

                }
            }
        });
    });
    
    //evento del boton consultar de la tabla aliados existentes
    $('#tblRol2').on('click', 'a.consult', function () {

        $("#LoadingImage").show();

        $("#organizacion").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#cargo").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#contacto2").css({"border": "", "box-shadow": ""});
        $("#cargo2").css({"border": "", "box-shadow": ""});
        $("#telefono2").css({"border": "", "box-shadow": ""});
        $("#celular2").css({"border": "", "box-shadow": ""});
        $("#email2").css({"border": "", "box-shadow": ""});

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlOrganizaciones.php?opcion=2",
            data: {idOrganizacion: id},
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

                   $("#organizacion").attr('disabled', 'disabled');
                    $("#direccion").attr('disabled', 'disabled');
                    $("#contacto").attr('disabled', 'disabled');
                    $("#cargo").attr('disabled','disabled');
                    $("#telefono").attr('disabled', 'disabled');
                    $("#celular").attr('disabled', 'disabled');
                    $("#email").attr('disabled', 'disabled');
                    $("#contacto2").attr('disabled', 'disabled');
                    $("#cargo2").attr('disabled', 'disabled');
                    $("#telefono2").attr('disabled', 'disabled');
                    $("#celular2").attr('disabled', 'disabled');
                    $("#email2").attr('disabled', 'disabled');

                    $("#idOrganizacion").val(data.row.IdOrganizacion);
                    $("#organizacion").val(data.row.NombreOrganizacion);
                    $("#direccion").val(data.row.Direccion);
                    $("#contacto").val(data.row.Contacto);
                    $("#cargo").val(data.row.Cargo);
                    $("#telefono").val(data.row.Telefono);
                    $("#celular").val(data.row.Celular);
                    $("#email").val(data.row.Email);
                    $("#contacto2").val(data.row.Contacto2);
                    $("#cargo2").val(data.row.Cargo2);
                    $("#telefono2").val(data.row.Telefono2);
                    $("#celular2").val(data.row.Celular2);
                    $("#email2").val(data.row.Email2);

                    $("#modi").show();
                    $("#save").hide();

                }
            }
        });
    });

    //evento del boton modificar para habilitar los campos de texto del formulario
    $('#modi').click(function () {

        $("#organizacion").removeAttr("disabled");
        $("#direccion").removeAttr("disabled");
        $("#contacto").removeAttr("disabled");
        $("#cargo").removeAttr("disabled");
        $("#telefono").removeAttr("disabled");
        $("#celular").removeAttr("disabled");
        $("#email").removeAttr("disabled");
        $("#contacto2").removeAttr("disabled");
        $("#cargo2").removeAttr("disabled");
        $("#telefono2").removeAttr("disabled");
        $("#celular2").removeAttr("disabled");
        $("#email2").removeAttr("disabled");

        $("#update").show();
        $("#modi").hide();
        $("#restore").hide();
    });

    //evento del boton volver cuando no desea hacer ninguna de las otras funciones y quiere volver al panel pricipal
    $('#return').click(function () {

        $("#organizacion").removeAttr("disabled");
        $("#direccion").removeAttr("disabled");
        $("#contacto").removeAttr("disabled");
        $("#cargo").removeAttr("disabled");
        $("#telefono").removeAttr("disabled");
        $("#celular").removeAttr("disabled");
        $("#email").removeAttr("disabled");
        $("#contacto2").removeAttr("disabled");
        $("#cargo2").removeAttr("disabled");
        $("#telefono2").removeAttr("disabled");
        $("#celular2").removeAttr("disabled");
        $("#email2").removeAttr("disabled");

        $("#frmOrganizaciones").each(function () {
            this.reset();
        });

        $("#save").show();
        $("#update").hide();
        $("#modi").hide();
    });

    //evento del boton antualizar cuando a modificar los datos del registro consultado
    $('#update').click(function () {

        validarDatosOrganizaciones();

        if (datosOrganizaciones == false) {
            $("#LoadingImage").hide();
        } else {

            $("#LoadingImage").show();

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlOrganizaciones.php?opcion=3",
                data: $("#frmOrganizaciones").serialize(),
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

                        $("#frmOrganizaciones").each(function () {
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
            url: "../Controller/ctrlOrganizaciones.php?opcion=4",
            data: {idOrganizacion: id},
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
            url: "../Controller/ctrlOrganizaciones.php?opcion=5",
            data: {idOrganizacion: id},
            error: function (jqXHR, textStatus, errorThrown) {
                //*Ocurrió un eror en la petición ajax
                $("#LoadingImage").hide();
                console.log(textStatus + "\n" + errorThrown);
            },
            success: function (result) {
                $("#LoadingImage").hide();
                var data = eval('(' + result + ')');

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
        "sAjaxSource": "Organizaciones/consultarDatosTablaOrganizaciones.php",
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
        "sAjaxSource": "Organizaciones/consultarDatosTablaOrganizacionesEliminadas.php",
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
function validarDatosOrganizaciones() {

    if ($('#organizacion').val() === "") {

        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#cargo").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#contacto2").css({"border": "", "box-shadow": ""});
        $("#cargo2").css({"border": "", "box-shadow": ""});
        $("#telefono2").css({"border": "", "box-shadow": ""});
        $("#celular2").css({"border": "", "box-shadow": ""});
        $("#email2").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese Nombre de la organizacion. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#organizacion").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosOrganizaciones = false;
    } else if ($('#direccion').val() === "") {

        $("#organizacion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#cargo").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#contacto2").css({"border": "", "box-shadow": ""});
        $("#cargo2").css({"border": "", "box-shadow": ""});
        $("#telefono2").css({"border": "", "box-shadow": ""});
        $("#celular2").css({"border": "", "box-shadow": ""});
        $("#email2").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese direccion de la Organización. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#direccion").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosOrganizaciones = false;
    } else if ($('#contacto').val() === "") {

        $("#organizacion").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#cargo").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#contacto2").css({"border": "", "box-shadow": ""});
        $("#cargo2").css({"border": "", "box-shadow": ""});
        $("#telefono2").css({"border": "", "box-shadow": ""});
        $("#celular2").css({"border": "", "box-shadow": ""});
        $("#email2").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese el nombre del contacto a registrar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#contacto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosOrganizaciones = false;
    } else if ($('#telefono').val() === "") {

        $("#organizacion").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#cargo").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#contacto2").css({"border": "", "box-shadow": ""});
        $("#cargo2").css({"border": "", "box-shadow": ""});
        $("#telefono2").css({"border": "", "box-shadow": ""});
        $("#celular2").css({"border": "", "box-shadow": ""});
        $("#email2").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese el teléfono del contacto a registrar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#telefono").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosOrganizaciones = false;
    } else if ($('#email').val() === "") {

        $("#organizacion").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#cargo").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#contacto2").css({"border": "", "box-shadow": ""});
        $("#cargo2").css({"border": "", "box-shadow": ""});
        $("#telefono2").css({"border": "", "box-shadow": ""});
        $("#celular2").css({"border": "", "box-shadow": ""});
        $("#email2").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese el e-mail del contacto a registrar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#email").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosOrganizaciones = false;
    } else {

        $("#organizacion").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#cargo").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#contacto2").css({"border": "", "box-shadow": ""});
        $("#cargo2").css({"border": "", "box-shadow": ""});
        $("#telefono2").css({"border": "", "box-shadow": ""});
        $("#celular2").css({"border": "", "box-shadow": ""});
        $("#email2").css({"border": "", "box-shadow": ""});
        
        datosOrganizaciones = true;
    }
}
