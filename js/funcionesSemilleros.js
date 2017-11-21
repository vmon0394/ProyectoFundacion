$(document).ready(function () {

    //llamado del las funciones para llenar las tablas
    tabla();
    tabla2();

    //evento del boton guardar
    $('#save').click(function () {

        validarDatosSemillero();

        if (datosSemillero == false) {
            $("#LoadingImage").hide();
        } else {

            $("#LoadingImage").show();

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlSemilleros.php?opcion=1",
                data: $("#frmSemilleros").serialize(),
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

                        $("#frmSemilleros").each(function () {
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

    //evento del boton consultar de la tabla zona existentes
    $('#tblRol').on('click', 'a.consult', function () {

        $("#LoadingImage").show();

        $("#proyecto").css({"border": "", "box-shadow": ""});
        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#zona").css({"border": "", "box-shadow": ""});
        $("#categoria").css({"border": "", "box-shadow": ""});
        $("#facilitador").css({"border": "", "box-shadow": ""});
        $("#psicologo").css({"border": "", "box-shadow": ""});
        $("#barrio").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#emailContacto").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#habilidad").css({"border": "", "box-shadow": ""});
        $("#aliado1").css({"border": "", "box-shadow": ""});
        $("#aliado2").css({"border": "", "box-shadow": ""});
        $("#aliado3").css({"border": "", "box-shadow": ""});

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlSemilleros.php?opcion=2",
            data: {idSemillero: id},
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

                    $("#semillero").attr('disabled', 'disabled');
                    $("#zona").attr('disabled', 'disabled');
                    $("#categoria").attr('disabled', 'disabled');
                    $("#facilitador").attr('disabled', 'disabled');
                    $("#psicologo").attr('disabled', 'disabled');
                    $("#proyecto").attr('disabled', 'disabled');
                    $("#comuna").attr('disabled', 'disabled');
                    $("#barrio").attr('disabled', 'disabled');
                    $("#direccion").attr('disabled', 'disabled');
                    $("#organizacion").attr('disabled', 'disabled');
                    $("#contacto").attr('disabled', 'disabled');
                    $("#emailContacto").attr('disabled', 'disabled');
                    $("#telefono").attr('disabled', 'disabled');
                    $("#habilidad").attr('disabled', 'disabled');
                    $("#aliado1").attr('disabled', 'disabled');
                    $("#aliado2").attr('disabled', 'disabled');
                    $("#aliado3").attr('disabled', 'disabled');

                    $("#idSemillero").val(data.row.IdSemillero);
                    $("#semillero").val(data.row.NombreSemillero);
                    $("#facilitador").val(data.row.IdProfesor);
                    $("#psicologo").val(data.row.IdPsicologo);
                    $("#categoria").val(data.row.IdCategoria);
                    $("#zona").val(data.row.IdZona);
                    $("#proyecto").val(data.row.IdProyecto);
                    $("#comuna").val(data.row.Comuna);
                    $("#barrio").val(data.row.Barrio);
                    $("#direccion").val(data.row.Direccion);
                    $("#organizacion").val(data.row.Organizacion);
                    $("#contacto").val(data.row.Contacto);
                    $("#emailContacto").val(data.row.EmailContacto);
                    $("#telefono").val(data.row.Telefono);
                    $("#habilidad").val(data.row.IdHabilidad);
                    $("#aliado1").val(data.row.Aliado1);

                    Carga2('../Controller/ctrlCombos.php?opcion=8&idAliado=' + data.row.Aliado1, 'aliado2', data);

                    Carga2('../Controller/ctrlCombos.php?opcion=9&idAliado=' + data.row.Aliado1 + '&idAliado2=' + data.row.Aliado2, 'aliado3', data);

                    $("#modi").show();
                    $("#save").hide();
                    $("#update").hide();

                }
            }
        });
    });

    //evento del boton modificar para habilitar los campos de texto del formulario
    $('#modi').click(function () {

        $("#semillero").removeAttr("disabled");
        $("#zona").removeAttr("disabled");
        $("#categoria").removeAttr("disabled");
        $("#facilitador").removeAttr("disabled");
        $("#psicologo").removeAttr("disabled");
        $("#proyecto").removeAttr("disabled");
        $("#comuna").removeAttr("disabled");
        $("#barrio").removeAttr("disabled");
        $("#direccion").removeAttr("disabled");
        $("#organizacion").removeAttr("disabled");
        $("#contacto").removeAttr("disabled");
        $("#emailContacto").removeAttr("disabled");
        $("#telefono").removeAttr("disabled");
        $("#habilidad").removeAttr("disabled");
        $("#aliado1").removeAttr("disabled");
        $("#aliado2").removeAttr("disabled");
        $("#aliado3").removeAttr("disabled");

        $("#update").show();
        $("#modi").hide();
        $("#restore").hide();
    });

    //evento del boton volver cuando no desea hacer ninguna de las otras funciones y quiere volver al panel pricipal
    $('#return').click(function () {

        $("#semillero").removeAttr("disabled");
        $("#zona").removeAttr("disabled");
        $("#categoria").removeAttr("disabled");
        $("#facilitador").removeAttr("disabled");
        $("#psicologo").removeAttr("disabled");
        $("#proyecto").removeAttr("disabled");
        $("#comuna").removeAttr("disabled");
        $("#barrio").removeAttr("disabled");
        $("#direccion").removeAttr("disabled");
        $("#organizacion").removeAttr("disabled");
        $("#contacto").removeAttr("disabled");
        $("#emailContacto").removeAttr("disabled");
        $("#telefono").removeAttr("disabled");
        $("#habilidad").removeAttr("disabled");
        $("#aliado1").removeAttr("disabled");
        $("#aliado2").removeAttr("disabled");
        $("#aliado3").removeAttr("disabled");

        $("#proyecto").css({"border": "", "box-shadow": ""});
        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#zona").css({"border": "", "box-shadow": ""});
        $("#categoria").css({"border": "", "box-shadow": ""});
        $("#facilitador").css({"border": "", "box-shadow": ""});
        $("#psicologo").css({"border": "", "box-shadow": ""});
        $("#barrio").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#emailContacto").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#habilidad").css({"border": "", "box-shadow": ""});
        $("#aliado1").css({"border": "", "box-shadow": ""});
        $("#aliado2").css({"border": "", "box-shadow": ""});
        $("#aliado3").css({"border": "", "box-shadow": ""});

        $("#frmSemilleros").each(function () {
            this.reset();
        });

        $("#save").show();
        $("#update").hide();
        $("#modi").hide();
    });

    //evento del boton antualizar cuando a modificar los datos del registro consultado
    $('#update').click(function () {

        validarDatosSemillero();

        if (datosSemillero == false) {
            $("#LoadingImage").hide();
        } else {

            $("#LoadingImage").show();

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlSemilleros.php?opcion=3",
                data: $("#frmSemilleros").serialize(),
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

                        $("#frmSemilleros").each(function () {
                            this.reset();
                        });

                        $("#save").show();
                        $("#modi").hide();
                        $("#update").hide();

                        var oTable = $('#tblRol').dataTable();
                        oTable.fnDestroy();
                        tabla();
                    }
                }
            });
        }
    });

    //evento del boton eliminar de la tabla zonas existentes cuando se desea eliminar un registro
    $('#tblRol').on('click', 'a.delete', function () {

        $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRol tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlSemilleros.php?opcion=4",
            data: {idSemillero: id},
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
                    modal.find('.modal-title').text(td[1].innerText);
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

    //evento del boton consultar de la tabla zona eliminadas
    $('#tblRol2').on('click', 'a.consult', function () {

        $("#LoadingImage").show();

        $("#proyecto").css({"border": "", "box-shadow": ""});
        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#zona").css({"border": "", "box-shadow": ""});
        $("#categoria").css({"border": "", "box-shadow": ""});
        $("#facilitador").css({"border": "", "box-shadow": ""});
        $("#psicologo").css({"border": "", "box-shadow": ""});
        $("#barrio").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#emailContacto").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#habilidad").css({"border": "", "box-shadow": ""});
        $("#aliado1").css({"border": "", "box-shadow": ""});
        $("#aliado2").css({"border": "", "box-shadow": ""});
        $("#aliado3").css({"border": "", "box-shadow": ""});

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlSemilleros.php?opcion=2",
            data: {idSemillero: id},
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

                    $("#semillero").attr('disabled', 'disabled');
                    $("#zona").attr('disabled', 'disabled');
                    $("#categoria").attr('disabled', 'disabled');
                    $("#facilitador").attr('disabled', 'disabled');
                    $("#psicologo").attr('disabled', 'disabled');
                    $("#proyecto").attr('disabled', 'disabled');
                    $("#comuna").attr('disabled', 'disabled');
                    $("#barrio").attr('disabled', 'disabled');
                    $("#direccion").attr('disabled', 'disabled');
                    $("#organizacion").attr('disabled', 'disabled');
                    $("#contacto").attr('disabled', 'disabled');
                    $("#emailContacto").attr('disabled', 'disabled');
                    $("#telefono").attr('disabled', 'disabled');
                    $("#habilidad").attr('disabled', 'disabled');
                    $("#aliado1").attr('disabled', 'disabled');
                    $("#aliado2").attr('disabled', 'disabled');
                    $("#aliado3").attr('disabled', 'disabled');

                    $("#idSemillero").val(data.row.IdSemillero);
                    $("#semillero").val(data.row.NombreSemillero);
                    $("#facilitador").val(data.row.IdProfesor);
                    $("#psicologo").val(data.row.IdPsicologo);
                    $("#categoria").val(data.row.IdCategoria);
                    $("#zona").val(data.row.IdZona);
                    $("#proyecto").val(data.row.IdProyecto);
                    $("#comuna").val(data.row.Comuna);
                    $("#barrio").val(data.row.Barrio);
                    $("#direccion").val(data.row.Direccion);
                    $("#organizacion").val(data.row.Organizacion);
                    $("#contacto").val(data.row.Contacto);
                    $("#emailContacto").val(data.row.EmailContacto);
                    $("#telefono").val(data.row.Telefono);
                    $("#habilidad").val(data.row.IdHabilidad);
                    $("#aliado1").val(data.row.Aliado1);
                    $("#aliado2").val(data.row.Aliado2);
                    $("#aliado3").val(data.row.Aliado3);

                    $("#modi").show();
                    $("#save").hide();
                    $("#update").hide();

                }
            }
        });
    });

    //evento del boton habilitar de la tabla zonas eliminados cuando se desea volver habilitar un registro eliminado
    $('#tblRol2').on('click', 'a.enable', function () {

        $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRol2 tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlSemilleros.php?opcion=5",
            data: {idSemillero: id},
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
                    modal.find('.modal-title').text(td[1].innerText);
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

    //evento del boton historia facilitadores la cual despliega la tabla con todos lo facilitadores que han pasado por el semillero
    $('#tblRol').on('click', 'a.historyTeacher', function () {

        $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRol tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        var id = $(this).prop('title');

        var modal = $('#modalTablaHistorialFacilitador');
        modal.find('.modal-title').text("Facilitadres de " + td[1].innerText);
        $('#modalTablaHistorialFacilitador').modal('show');

        var oTable = $('#tblRolHistorialFacilitador').dataTable();
        oTable.fnDestroy();

        $("#LoadingImage").hide();
        tablaHistorialFacilitador(id);
    });

    //evento del boton historia psicologos la cual despliega la tabla con todos lo psicologos que han pasado por el semillero
    $('#tblRol').on('click', 'a.historyPsycho', function () {

        $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRol tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        var id = $(this).prop('title');

        var modal = $('#modalTablaHistorialFacilitador');
        modal.find('.modal-title').text("Facilitadres de " + td[1].innerText);
        $('#modalTablaHistorialFacilitador').modal('show');

        var oTable = $('#tblRolHistorialFacilitador').dataTable();
        oTable.fnDestroy();

        $("#LoadingImage").hide();
        tablaHistorialPsicologo(id);
    });

    //evento del boton historia facilitadoress la cual despliega la tabla con todas las habilidades que ha trabajado el semillero
    $('#tblRol').on('click', 'a.historyAbilities', function () {

        $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRol tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        var id = $(this).prop('title');

        var modal = $('#modalTablaHistorialHabilidad');
        modal.find('.modal-title').text("Habilidades de " + td[1].innerText);
        $('#modalTablaHistorialHabilidad').modal('show');

        var oTable = $('#tblRolHistorialHabilidad').dataTable();
        oTable.fnDestroy();

        $("#LoadingImage").hide();
        tablaHistorialHabilidad(id);
    });

    //evento del boton historia facilitadoress la cual despliega la tabla con todos lo facilitadores que han pasado por el semillero
    $('#tblRol2').on('click', 'a.historyTeacher', function () {

        $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRol2 tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        var id = $(this).prop('title');

        var modal = $('#modalTablaHistorialFacilitador');
        modal.find('.modal-title').text("Facilitadres de " + td[1].innerText);
        $('#modalTablaHistorialFacilitador').modal('show');

        var oTable = $('#tblRolHistorialFacilitador').dataTable();
        oTable.fnDestroy();

        $("#LoadingImage").hide();
        tablaHistorialFacilitador(id);
    });

    //evento del boton historia psicologos la cual despliega la tabla con todos lo psicologos que han pasado por el semillero
    $('#tblRol2').on('click', 'a.historyPsycho', function () {

        $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRol tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        var id = $(this).prop('title');

        var modal = $('#modalTablaHistorialFacilitador');
        modal.find('.modal-title').text("Facilitadres de " + td[1].innerText);
        $('#modalTablaHistorialFacilitador').modal('show');

        var oTable = $('#tblRolHistorialFacilitador').dataTable();
        oTable.fnDestroy();

        $("#LoadingImage").hide();
        tablaHistorialPsicologo(id);
    });

    //evento del boton historia facilitadoress la cual despliega la tabla con todas las habilidades que ha trabajado el semillero
    $('#tblRol2').on('click', 'a.historyAbilities', function () {

        $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRol2 tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        var id = $(this).prop('title');

        var modal = $('#modalTablaHistorialHabilidad');
        modal.find('.modal-title').text("Habilidades de " + td[1].innerText);
        $('#modalTablaHistorialHabilidad').modal('show');

        var oTable = $('#tblRolHistorialHabilidad').dataTable();
        oTable.fnDestroy();

        $("#LoadingImage").hide();
        tablaHistorialHabilidad(id);
    });
});

//consulta para llenar la tabla de los semilleros existentes
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
        "sAjaxSource": "SemillerosAdmin/consultarDatosTablaSemilleros.php",
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

//consulta para llenar la tabla de los semilleros eliminados
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
        "sAjaxSource": "SemillerosAdmin/consultarDatosTablaSemillerosEliminados.php",
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

//consulta para llenar la tabla de historial facilitadores
function tablaHistorialFacilitador(semillero) {

    $('#tblRolHistorialFacilitador').dataTable({
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
        "sAjaxSource": "SemillerosAdmin/consultarDatosTablaHistorialFacilitador.php?semillero=" + semillero,
        "order": [[3, "desc"]],
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

//consulta para llenar la tabla de historial facilitadores
function tablaHistorialPsicologo(semillero) {

    $('#tblRolHistorialFacilitador').dataTable({
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
        "sAjaxSource": "SemillerosAdmin/consultarDatosTablaHistorialPsicologo.php?semillero=" + semillero,
        "order": [[3, "desc"]],
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

//consulta para llenar la tabla de historial habilidades
function tablaHistorialHabilidad(semillero) {

    $('#tblRolHistorialHabilidad').dataTable({
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
        "sAjaxSource": "SemillerosAdmin/consultarDatosTablaHistorialHabilidad.php?semillero=" + semillero,
        "order": [[3, "desc"]],
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
function validarDatosSemillero() {

    if ($('#proyecto').val() == 0) {

        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#zona").css({"border": "", "box-shadow": ""});
        $("#categoria").css({"border": "", "box-shadow": ""});
        $("#facilitador").css({"border": "", "box-shadow": ""});
        $("#psicologo").css({"border": "", "box-shadow": ""});
        $("#barrio").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#habilidad").css({"border": "", "box-shadow": ""});
        $("#aliado1").css({"border": "", "box-shadow": ""});
        $("#aliado2").css({"border": "", "box-shadow": ""});
        $("#aliado3").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione un proyecto del semillero a registrar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#proyecto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosSemillero = false;
    } else if ($('#semillero').val() === "") {

        $("#proyecto").css({"border": "", "box-shadow": ""});
        $("#zona").css({"border": "", "box-shadow": ""});
        $("#categoria").css({"border": "", "box-shadow": ""});
        $("#facilitador").css({"border": "", "box-shadow": ""});
        $("#psicologo").css({"border": "", "box-shadow": ""});
        $("#barrio").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#habilidad").css({"border": "", "box-shadow": ""});
        $("#aliado1").css({"border": "", "box-shadow": ""});
        $("#aliado2").css({"border": "", "box-shadow": ""});
        $("#aliado3").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese el nombre del semillero a registrar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#semillero").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosSemillero = false;
    } else if ($('#zona').val() == 0) {

        $("#proyecto").css({"border": "", "box-shadow": ""});
        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#categoria").css({"border": "", "box-shadow": ""});
        $("#facilitador").css({"border": "", "box-shadow": ""});
        $("#psicologo").css({"border": "", "box-shadow": ""});
        $("#barrio").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#habilidad").css({"border": "", "box-shadow": ""});
        $("#aliado1").css({"border": "", "box-shadow": ""});
        $("#aliado2").css({"border": "", "box-shadow": ""});
        $("#aliado3").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione una zona del semillero a registrar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#zona").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosSemillero = false;
    } else if ($('#categoria').val() == 0) {

        $("#proyecto").css({"border": "", "box-shadow": ""});
        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#zona").css({"border": "", "box-shadow": ""});
        $("#facilitador").css({"border": "", "box-shadow": ""});
        $("#psicologo").css({"border": "", "box-shadow": ""});
        $("#barrio").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#habilidad").css({"border": "", "box-shadow": ""});
        $("#aliado1").css({"border": "", "box-shadow": ""});
        $("#aliado2").css({"border": "", "box-shadow": ""});
        $("#aliado3").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione una categoría del semillero a registrar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#categoria").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosSemillero = false;
    } else if ($('#facilitador').val() == 0) {

        $("#proyecto").css({"border": "", "box-shadow": ""});
        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#zona").css({"border": "", "box-shadow": ""});
        $("#categoria").css({"border": "", "box-shadow": ""});
        $("#psicologo").css({"border": "", "box-shadow": ""});
        $("#barrio").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#habilidad").css({"border": "", "box-shadow": ""});
        $("#aliado1").css({"border": "", "box-shadow": ""});
        $("#aliado2").css({"border": "", "box-shadow": ""});
        $("#aliado3").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el facilitador del semillero a registrar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#facilitador").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosSemillero = false;
    } else if ($('#psicologo').val() == 0) {

        $("#proyecto").css({"border": "", "box-shadow": ""});
        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#zona").css({"border": "", "box-shadow": ""});
        $("#categoria").css({"border": "", "box-shadow": ""});
        $("#facilitador").css({"border": "", "box-shadow": ""});
        $("#barrio").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#habilidad").css({"border": "", "box-shadow": ""});
        $("#aliado1").css({"border": "", "box-shadow": ""});
        $("#aliado2").css({"border": "", "box-shadow": ""});
        $("#aliado3").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el psicólogo del semillero a registrar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#psicologo").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosSemillero = false;
    } else if ($('#contacto').val() === "") {

        $("#proyecto").css({"border": "", "box-shadow": ""});
        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#zona").css({"border": "", "box-shadow": ""});
        $("#categoria").css({"border": "", "box-shadow": ""});
        $("#facilitador").css({"border": "", "box-shadow": ""});
        $("#psicologo").css({"border": "", "box-shadow": ""});
        $("#barrio").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#habilidad").css({"border": "", "box-shadow": ""});
        $("#aliado1").css({"border": "", "box-shadow": ""});
        $("#aliado2").css({"border": "", "box-shadow": ""});
        $("#aliado3").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese el nombre de contacto del semillero a registrar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#contacto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosSemillero = false;
    } else if ($('#telefono').val() === "") {

        $("#proyecto").css({"border": "", "box-shadow": ""});
        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#zona").css({"border": "", "box-shadow": ""});
        $("#categoria").css({"border": "", "box-shadow": ""});
        $("#facilitador").css({"border": "", "box-shadow": ""});
        $("#psicologo").css({"border": "", "box-shadow": ""});
        $("#barrio").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#habilidad").css({"border": "", "box-shadow": ""});
        $("#aliado1").css({"border": "", "box-shadow": ""});
        $("#aliado2").css({"border": "", "box-shadow": ""});
        $("#aliado3").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese el teléfono de contacto del semillero a registrar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#telefono").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosSemillero = false;
    } else if ($('#habilidad').val() == 0) {

        $("#proyecto").css({"border": "", "box-shadow": ""});
        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#zona").css({"border": "", "box-shadow": ""});
        $("#categoria").css({"border": "", "box-shadow": ""});
        $("#facilitador").css({"border": "", "box-shadow": ""});
        $("#psicologo").css({"border": "", "box-shadow": ""});
        $("#barrio").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#aliado1").css({"border": "", "box-shadow": ""});
        $("#aliado2").css({"border": "", "box-shadow": ""});
        $("#aliado3").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione la habilidad del semillero a registrar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#habilidad").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosSemillero = false;
    } else {

        $("#proyecto").css({"border": "", "box-shadow": ""});
        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#zona").css({"border": "", "box-shadow": ""});
        $("#categoria").css({"border": "", "box-shadow": ""});
        $("#facilitador").css({"border": "", "box-shadow": ""});
        $("#psicologo").css({"border": "", "box-shadow": ""});
        $("#barrio").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#contacto").css({"border": "", "box-shadow": ""});
        $("#emailContacto").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#habilidad").css({"border": "", "box-shadow": ""});
        $("#aliado1").css({"border": "", "box-shadow": ""});
        $("#aliado2").css({"border": "", "box-shadow": ""});
        $("#aliado3").css({"border": "", "box-shadow": ""});

        datosSemillero = true;
    }
}