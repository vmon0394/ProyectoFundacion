$(document).ready(function () {
    
    $("#fecha").hide();

    //llamado del las funciones para llenar las tablas
    tabla();
   

    //evento del boton guardar
    $('#save').click(function () {

        if ($('#nombreMaterial').val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese el nombre del material a Registrar. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#nombreMaterial").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
            
        } else if ($('#codigo').val() === "") {

            $("#nombreMaterial").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html(" <div style='color: red'> Ingrese el codigo del material. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#codigo").css({"border": "2px solid red", "box-shadow": "0 0 3px green"});    
         
        } else if ($('#estado').val() === "0") {

            $("#nombreMaterial").css({"border": "", "box-shadow": ""});
            $("#codigo").css({"border": "", "box-shadow": ""});
            $("#fechaRegistro").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Seleccione el estado del material. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#estado").css({"border": "2px solid red", "box-shadow": "0 0 3px green"});
            
        } else if ($('#idZona').val() === "0") {

            $("#nombreMaterial").css({"border": "", "box-shadow": ""});
            $("#codigo").css({"border": "", "box-shadow": ""});
            $("#fechaRegistro").css({"border": "", "box-shadow": ""});
            $("#estado").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html(" <div style='color: red'> Ingrese la zona delmaterial. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#idZona").css({"border": "2px solid red", "box-shadow": "0 0 3px green"});    

        }  else {

            $("#nombreMaterial").css({"border": "", "box-shadow": ""});
            $("#codigo").css({"border": "", "box-shadow": ""});
            $("#fechaRegistro").css({"border": "", "box-shadow": ""});
            $("#estado").css({"border": "", "box-shadow": ""});
            $("#idZona").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlInventario.php?opcion=1",
                data: $("#frmInventario").serialize(),
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

                        $("#frmInventario").each(function () {
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

    //evento del boton consultar de la tabla servicios existentes
    $('#tblRol').on('click', 'a.consult', function () {

        $("#LoadingImage").show();
        $("#fecha").show();

        
        $("#nombreMaterial").css({"border": "", "box-shadow": ""});
        $("#codigo").css({"border": "", "box-shadow": ""});
        $("#descripcion").css({"border": "", "box-shadow": ""});
        $("#autor").css({"border": "", "box-shadow": ""});
        $("#fechaRegistro").css({"border": "", "box-shadow": ""});
        $("#estado").css({"border": "", "box-shadow": ""});
        $("#idZona").css({"border": "", "box-shadow": ""});

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlInventario.php?opcion=2",
            data: {idMaterial: id},
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

                    $("#nombreMaterial").attr('disabled', 'disabled');
                    $("#codigo").attr('disabled', 'disabled');
                    $("#descripcion").attr('disabled', 'disabled');
                    $("#autor").attr('disabled', 'disabled');
                    $("#fechaRegistro").attr('disabled', 'disabled');
                    $("#estado").attr('disabled', 'disabled');
                    $("#idZona").attr('disabled', 'disabled');

                    $("#idMaterial").val(data.row.IdMaterial);
                    $("#nombreMaterial").val(data.row.NombreMaterial);
                    $("#codigo").val(data.row.Codigo);
                    $("#descripcion").val(data.row.Descripcion);
                    $("#autor").val(data.row.Autor);
                    $("#fechaRegistro").val(data.row.FechaRegistro);
                    $("#estado").val(data.row.Estado);
                    $("#idZona").val(data.row.IdZona);

                    $("#modi").show();
                    $("#save").hide();
                    $("#update").hide();

                }
            }
        });
    });

    //evento del boton modificar para habilitar los campos de texto del formulario
    $('#modi').click(function () {

        $("#nombreMaterial").removeAttr("disabled");
        $("#codigo").removeAttr("disabled");
        $("#descripcion").removeAttr("disabled");
        $("#autor").removeAttr("disabled");
        $("#fechaRegistro").removeAttr("disabled");
        $("#estado").removeAttr("disabled");
        $("#idZona").removeAttr("disabled");
        
        $("#fecha").hide();
        $("#update").show();
        $("#modi").hide();
        $("#restore").hide();
    });

    //evento del boton volver cuando no desea hacer ninguna de las otras funciones y quiere volver al panel pricipal
    $('#return').click(function () {
        
        

        $("#nombreMaterial").removeAttr("disabled");
        $("#codigo").removeAttr("disabled");
        $("#descripcion").removeAttr("disabled");
        $("#autor").removeAttr("disabled");
        $("#fechaRegistro").removeAttr("disabled");
        $("#estado").removeAttr("disabled");
        $("#idZona").removeAttr("disabled");
        
        $("#nombreMaterial").css({"border": "", "box-shadow": ""});
        $("#codigo").css({"border": "", "box-shadow": ""});
        $("#descripcion").css({"border": "", "box-shadow": ""});
        $("#autor").css({"border": "", "box-shadow": ""});
        $("#fechaRegistro").css({"border": "", "box-shadow": ""});
        $("#estado").css({"border": "", "box-shadow": ""});
        $("#idZona").css({"border": "", "box-shadow": ""});

        $("#frmInventario").each(function () {
            this.reset();
        });
        
        $("#fecha").hide();
        $("#save").show();
        $("#update").hide();
        $("#modi").hide();
    });

    //evento del boton antualizar cuando a modificar los datos del registro consultado
    $('#update').click(function () {

         if ($('#nombreMaterial').val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese el nombre del material a Registrar. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#nombreMaterial").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
            
        } else if ($('#codigo').val() === "") {

            $("#nombreMaterial").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html(" <div style='color: red'> Ingrese el codigo del material. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#codigo").css({"border": "2px solid red", "box-shadow": "0 0 3px green"});
            
        } else if ($('#estado').val() === 0) {

            $("#nombreMaterial").css({"border": "", "box-shadow": ""});
            $("#codigo").css({"border": "", "box-shadow": ""});
            $("#fechaRegistro").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Seleccione el estado del material. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#estado").css({"border": "2px solid red", "box-shadow": "0 0 3px green"});
            
        } else if ($('#idZona').val() === "") {

            $("#nombreMaterial").css({"border": "", "box-shadow": ""});
            $("#codigo").css({"border": "", "box-shadow": ""});
            $("#fechaRegistro").css({"border": "", "box-shadow": ""});
            $("#estado").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html(" <div style='color: red'> Ingrese la zona delmaterial. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#idZona").css({"border": "2px solid red", "box-shadow": "0 0 3px green"});  

        }  else {

            
            $("#nombreMaterial").css({"border": "", "box-shadow": ""});
            $("#codigo").css({"border": "", "box-shadow": ""});
            $("#descripcion").css({"border": "", "box-shadow": ""});
            $("#autor").css({"border": "", "box-shadow": ""});
            $("#fechaRegistro").css({"border": "", "box-shadow": ""});
            $("#estado").css({"border": "", "box-shadow": ""});
            $("#idZona").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlInventario.php?opcion=3",
                data: $("#frmInventario").serialize(),
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

                        $("#frmInventario").each(function () {
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


    //evento del boton eliminar de la tabla servicios existentes cuando se desea eliminar un registro
    $('#tblRol').on('click', 'a.delete', function () {

        $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRol tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlInventario.php?opcion=4",
            data: {idMaterial: id},
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
                }
            }
        });
    });
    //evento del boton habilitar de la tabla valores eliminados cuando se desea volver habilitar un registro eliminado
    $('#tblRol2').on('click', 'a.enable', function () {

        $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRol2 tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlInventario.php?opcion=5",
            data: {idMaterial: id},
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
                }
            }
        });
    });
});

//consulta para llenar la tabla de valores existentes
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
        "sAjaxSource": "Laboratorio/consultarDatosTablaInventario.php",
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

//consulta para llenar la tabla de valores eliminados
//function tabla2() {
//
//    $('#tblRol2').dataTable({
//        "bProcessing": true,
//        "sServerMethod": 'GET',
//        "bServerSide": true,
//        "bRetrieve": true,
//        "info": false,
//        "bFilter": true,
//        "ordering": true,
//        "bAutoWidth": false,
//        "bLengthChange": false,
//        "bPaginate": true,
//        "iDisplayLength": 10,
//        "sAjaxSource": "Laboratorio/consultarDatosTablaInventarioEliminados.php",
//        "order": [[1, "asc"]],
//        "aoColumnDefs": [{
//                "aTargets": [2],
//                "sType": "html"
//                , "mRender": function (date, type, full) {
//                    return ("" + full[2].toString());
//                }
//            }],
//        "oLanguage": {
//            "oPaginate": {
//                "sFirst": "Primera",
//                "sPrevious": "Anterior",
//                "sNext": "Siguiente",
//                "sLast": "&Uacute;ltima"
//            },
//            "sZeroRecords": "No se encontraron registros",
//            "sEmptyTable": "No hay registros",
//            "sSearch": "B&uacute;squeda R&aacute;pida"
//        }
//    }).fnSetFilteringDelay(250);
//}