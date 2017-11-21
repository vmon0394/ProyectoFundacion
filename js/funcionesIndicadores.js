$(document).ready(function () {

    //llamado del las funciones para llenar las tablas
    tabla();
    tabla2();

    //evento del boton guardar
    $('#save').click(function () {

        if ($('#habilidad').val() == 0) {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Seleccione la habilidad del indicador. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#habilidad").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#codigoIndicador').val() === "") {

            $("#habilidad").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese el código del indicador a registrar. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#codigoIndicador").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#indicador').val() === "") {

            $("#habilidad").css({"border": "", "box-shadow": ""});
            $("#codigoIndicador").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html(" <div style='color: red'> Ingrese el nombre del indicador a registrar. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#indicador").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else {

            $("#habilidad").css({"border": "", "box-shadow": ""});
            $("#codigoIndicador").css({"border": "", "box-shadow": ""});
            $("#indicador").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlIndicadores.php?opcion=1",
                data: $("#frmIndicadores").serialize(),
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
                        
                        $("#frmIndicadores").each(function () {
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

    //evento del boton consultar de la tabla eps existentes
    $('#tblRol').on('click', 'a.consult', function () {

        $("#habilidad").css({"border": "", "box-shadow": ""});
        $("#codigoIndicador").css({"border": "", "box-shadow": ""});
        $("#indicador").css({"border": "", "box-shadow": ""});

        $("#LoadingImage").show();
        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlIndicadores.php?opcion=2",
            data: {idIndicador: id},
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

                    $("#habilidad").attr('disabled', 'disabled');
                    $("#codigoIndicador").attr('disabled', 'disabled');
                    $("#indicador").attr('disabled', 'disabled');

                    $("#idIndicador").val(data.row.IdIndicador);
                    $("#habilidad").val(data.row.IdHabilidad);
                    $("#codigoIndicador").val(data.row.CodigoIndicadores);
                    $("#indicador").val(data.row.NombreIndicadores);

                    $("#modi").show();
                    $("#return").show();
                    $("#save").hide();
                }
            }
        });
    });

    //evento del boton modificar para habilitar los campos de texto del formulario
    $('#modi').click(function () {

        $("#habilidad").removeAttr("disabled");
        $("#codigoIndicador").removeAttr("disabled");
        $("#indicador").removeAttr("disabled");

        $("#update").show();
        $("#modi").hide();
        $("#restore").hide();
    });

    //evento del boton volver cuando no desea hacer ninguna de las otras funciones y quiere volver al panel pricipal
    $('#return').click(function () {

        $("#habilidad").removeAttr("disabled");
        $("#codigoIndicador").removeAttr("disabled");
        $("#indicador").removeAttr("disabled");

        $("#habilidad").css({"border": "", "box-shadow": ""});
        $("#codigoIndicador").css({"border": "", "box-shadow": ""});
        $("#indicador").css({"border": "", "box-shadow": ""});

        $("#frmIndicadores").each(function () {
            this.reset();
        });

        $("#save").show();
        $("#update").hide();
        $("#modi").hide();
    });

    //evento del boton antualizar cuando a modificar los datos del registro consultado
    $('#update').click(function () {

        if ($('#habilidad').val() == 0) {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Seleccione la habilidad del indicador. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#habilidad").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#codigoIndicador').val() === "") {

            $("#habilidad").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese el código del indicador a registrar. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#codigoIndicador").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#indicador').val() === "") {

            $("#habilidad").css({"border": "", "box-shadow": ""});
            $("#codigoIndicador").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html(" <div style='color: red'> Ingrese el nombre del indicador a registrar. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#indicador").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else {

            $("#habilidad").css({"border": "", "box-shadow": ""});
            $("#codigoIndicador").css({"border": "", "box-shadow": ""});
            $("#indicador").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlIndicadores.php?opcion=3",
                data: $("#frmIndicadores").serialize(),
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

                        $("#frmIndicadores").each(function () {
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

    //evento del boton eliminar de la tabla eps existentes cuando se desea eliminar un registro
    $('#tblRol').on('click', 'a.delete', function () {

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRol tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        $("#LoadingImage").show();
        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlIndicadores.php?opcion=4",
            data: {idIndicador: id},
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

    //evento del boton habilitar de la tabla eps eliminados cuando se desea volver habilitar un registro eliminado
    $('#tblRol2').on('click', 'a.enable', function () {

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRol2 tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        $("#LoadingImage").show();
        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlIndicadores.php?opcion=5",
            data: {idIndicador: id},
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

//consulta para llenar la tabla de eps existentes
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
        "sAjaxSource": "Indicadores/consultarDatosTablaIndicadores.php",
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

//consulta para llenar la tabla de eps eliminados
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
        "sAjaxSource": "Indicadores/consultarDatosTablaIndicadoresEliminadas.php",
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