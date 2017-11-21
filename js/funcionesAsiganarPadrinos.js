$(document).ready(function () {

    //llamado del las funciones para llenar las tablas.
    tabla();

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
                url: "../Controller/ctrlMovPadrinosFichas.php?opcion=1",
                data: $("#frmAsignarPadrino").serialize(),
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

                        $("#frmAsignarPadrino").each(function () {
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

        $("#compania").css({"border": "", "box-shadow": ""});
        $("#padrinos").css({"border": "", "box-shadow": ""});
        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#participante").css({"border": "", "box-shadow": ""});

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlMovPadrinosFichas.php?opcion=2",
            data: {idMovPadrinoFicha: id},
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
                    $("#compania").attr('disabled', 'disabled');
                    $("#padrinos").attr('disabled', 'disabled');
                    $("#semillero").attr('disabled', 'disabled');
                    $("#participante").attr('disabled', 'disabled');

                    //Por medio del vector recibido del controlador se recibe todos los datos y se les asignar a sus respectivos campos
                    $("#idMovPadrinoFicha").val(data.row.Id_mov_padrino_ficha);
                    $("#compania").val(data.row.IdCompania);
                    Carga2('../Controller/ctrlCombos.php?opcion=6&idCompania=' + data.row.IdCompania, 'padrinos', data);                    
                    
                    $("#semillero").val(data.row.IdSemillero);
                    Carga2('../Controller/ctrlCombos.php?opcion=7&idSemillero=' + data.row.IdSemillero, 'participante', data);   
                    
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

        $("#compania").removeAttr("disabled");
        $("#padrinos").removeAttr("disabled");
        $("#semillero").removeAttr("disabled");
        $("#participante").removeAttr("disabled");

        $("#update").show();
        $("#modi").hide();
        $("#restore").hide();
    });

    //evento del boton nuevo el cual permite limpiar todo el formulario y restablecer las funciones.
    $('#return').click(function () {

        $("#compania").removeAttr("disabled");
        $("#padrinos").removeAttr("disabled");
        $("#semillero").removeAttr("disabled");
        $("#participante").removeAttr("disabled");

        $("#compania").css({"border": "", "box-shadow": ""});
        $("#padrinos").css({"border": "", "box-shadow": ""});
        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#participante").css({"border": "", "box-shadow": ""});

        $("#frmAsignarPadrino").each(function () {
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
                url: "../Controller/ctrlMovPadrinosFichas.php?opcion=3",
                data: $("#frmAsignarPadrino").serialize(),
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

                        $("#frmAsignarPadrino").each(function () {
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
        "sAjaxSource": "Padrinos/consultarDatosTablaMovPadrinoFicha.php",
        "order": [[3, "asc"]],
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

    if ($('#compania').val() == 0) {

        $("#padrinos").css({"border": "", "box-shadow": ""});
        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#participante").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione la compañia de los padrino. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#compania").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosRegistro = false;
    } else if ($('#padrinos').val() == 0) {

        $("#compania").css({"border": "", "box-shadow": ""});
        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#participante").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el padrino que desea asignar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#padrinos").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosRegistro = false;
    } else if ($('#semillero').val() == 0) {

        $("#compania").css({"border": "", "box-shadow": ""});
        $("#padrinos").css({"border": "", "box-shadow": ""});
        $("#participante").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el semillero de los participantes. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#semillero").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosRegistro = false;
    } else if ($('#participante').val() == 0) {

        $("#compania").css({"border": "", "box-shadow": ""});
        $("#padrinos").css({"border": "", "box-shadow": ""});
        $("#semillero").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el participante al que se la va asignar el padrino. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#participante").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosRegistro = false;
    } else {

        $("#compania").css({"border": "", "box-shadow": ""});
        $("#padrinos").css({"border": "", "box-shadow": ""});
        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#participante").css({"border": "", "box-shadow": ""});

        datosRegistro = true;
    }
}