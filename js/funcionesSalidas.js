$(document).ready(function () {

    //llamado del las funciones para llenar las tablas
    tabla();
    tabla2();
    
    //funcion para el boton guardar 
        $('#save').click(function () {

        if ($('#salida').val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese el nombre de la salida a registrar. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#salida").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#fechaSalida').val() === "") {

            $("#salida").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html(" <div style='color: red'> Ingrese la fecha de la salida. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#fechaSalida").css({"border": "2px solid red", "box-shadow": "0 0 3px green"});
            
        } else if ($('#numParticipantes').val() === "") {

            $("#salida").css({"border": "", "box-shadow": ""});
            $("#fechaSalida").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html(" <div style='color: red'> Ingrese numero de participantes. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#numParticipantes").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});    
            
        } else {

            $("#salida").css({"border": "", "box-shadow": ""});
            $("#fechaSalida").css({"border": "", "box-shadow": ""});
            $("#numParticipantes").css({"border": "", "box-shadow": ""});
            $("#descripcion").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlSalida.php?opcion=1",
                data: $("#frmSalidas").serialize(),
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
                        
                        $("#salida").css({"border": "", "box-shadow": ""});
                        $("#fechaSalida").css({"border": "", "box-shadow": ""});
                        $("#numParticipantes").css({"border": "", "box-shadow": ""});
                        $("#descripcion").css({"border": "", "box-shadow": ""});

                        $("#frmSalidas").each(function () {
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
       
   
    //evento del boton consultar de la tabla salidas existentes
    $('#tblRol').on('click', 'a.consult', function () {

        $("#LoadingImage").show();

        $("#salida").css({"border": "", "box-shadow": ""});
        $("#fechaSalida").css({"border": "", "box-shadow": ""});
        $("#numParticipantes").css({"border": "", "box-shadow": ""});
        $("#descripcion").css({"border": "", "box-shadow": ""});

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlSalida.php?opcion=2",
            data: {idSalida: id},
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

                    $("#salida").attr('disabled', 'disabled');
                    $("#fechaSalida").attr('disabled', 'disabled');
                    $("#numParticipantes").attr('disabled', 'disabled');
                    $("#descripcion").attr('disabled', 'disabled');
            

                    $("#idSalida").val(data.row.IdSalida);
                    $("#salida").val(data.row.Salida);
                    $("#fechaSalida").val(data.row.FechaSalida);
                    $("#numParticipantes").val(data.row.NumParticipantes);
                    $("#descripcion").val(data.row.Descripcion);
                    

                    $("#modi").show();
                    $("#save").hide();

                }
            }
        });
    });

    //evento del boton modificar para habilitar los campos de texto del formulario
    $('#modi').click(function () {

        $("#salida").removeAttr("disabled");
        $("#fechaSalida").removeAttr("disabled");
        $("#numParticipantes").removeAttr("disabled");
        $("#descripcion").removeAttr("disabled");

        $("#update").show();
        $("#modi").hide();
        $("#restore").hide();
    });

    //evento del boton volver cuando no desea hacer ninguna de las otras funciones y quiere volver al panel pricipal
    $('#return').click(function () {

        $("#salida").removeAttr("disabled");
        $("#fechaSalida").removeAttr("disabled");
        $("#numParticipantes").removeAttr("disabled");
        $("#descripcion").removeAttr("disabled");

        $("#salida").css({"border": "", "box-shadow": ""});
        $("#fechaSalida").css({"border": "", "box-shadow": ""});
        $("#numParticipantes").css({"border": "", "box-shadow": ""});
        $("#descripcion").css({"border": "", "box-shadow": ""});

        $("#frmSalidas").each(function () {
            this.reset();
        });

        $("#save").show();
        $("#update").hide();
        $("#modi").hide();
    });

    //evento del boton antualizar cuando va modificar los datos del registro consultado
    $('#update').click(function () {
        
        if ($('#salida').val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese el nombre de la salida a registrar. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#salida").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#fechaSalida').val() === "") {

            $("#salida").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html(" <div style='color: red'> Ingrese la fecha de la salida. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#fechaSalida").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
            
        } else if ($('#numParticipantes').val() === "") {

            $("#salida").css({"border": "", "box-shadow": ""});
            $("#fechaSalida").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html(" <div style='color: red'> Ingrese numero de participantes. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#numParticipantes").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});    
            
        } else {

            $("#salida").css({"border": "", "box-shadow": ""});
            $("#fechaSalida").css({"border": "", "box-shadow": ""});
            $("#numParticipantes").css({"border": "", "box-shadow": ""});
            $("#descripcion").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlSalida.php?opcion=3",
                data: $("#frmSalidas").serialize(),
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
                        modal.find('.modal-title').text("Modificación realizada con éxito.");
                        modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + " </div>");
                        $('#exampleconfirmacion').modal('show');

                        $("#frmSalidas").each(function () {
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

    //evento del boton eliminar de la tabla salidas existentes cuando se desea eliminar un registro
    $('#tblRol').on('click', 'a.delete', function () {

        $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRol tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlSalida.php?opcion=4",
            data: {idSalida: id},
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
                    modal.find('.modal-title').text(td[2].innerText + " " + td[1].innerText);
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

    //evento del boton habilitar de la tabla salidas eliminados cuando se desea volver habilitar un registro eliminado
    $('#tblRol2').on('click', 'a.enable', function () {

        $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRol2 tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlSalida.php?opcion=5",
            data: {idSalida: id},
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
                    modal.find('.modal-title').text(td[2].innerText + " " + td[1].innerText);
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

//consulta para llenar la tabla de las salidas existentes
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
        "sAjaxSource": "Salidas/consultarDatosTablaSalidas.php",
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

//consulta para llenar la tabla de las salidas eliminados
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
        "sAjaxSource": "Salidas/consultarDatosTablaSalidasEliminadas.php",
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