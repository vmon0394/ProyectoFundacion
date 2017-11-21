$(document).ready(function () {

    tabla();

    $('#enviarArchivo').click(function () {

        validarDatosHabilidometro();

        if (datosHabilidometro == false) {
            $("#LoadingImage").hide();
        } else {

            var file_data = $("#frmUploadHabilidometro").find('[name="archivoHabilidometro"]').prop('files')[0];

            var form_data = new FormData();
            form_data.append('file', file_data);
            form_data.append('semillero', $("#idSemillero").val());
            form_data.append('fecha', $("#fecha").val());

            if (typeof file_data === "undefined") {

                $("#LoadingImage").hide();
                var modal = $('#exampleconfirmacion');
                modal.find('.modal-title').text('Error en la carga');
                modal.find('#modal-message').html("<div style='color: red'> Verifique que haya seleccionado un archivo. Favor ver las especificaciones sugeridas al principio de esta página\nGracias. </div>");
                $('#exampleconfirmacion').modal('show');
            } else {

                var fileNameArchivo = file_data.name;
                var extH = fileNameArchivo.substring(fileNameArchivo.lastIndexOf('.') + 1);

                if (file_data.size > 2000000 || (extH !== "xls" && extH !== "XLS" && extH !== "xlsx" && extH !== "XLSX")) {
                    $("#LoadingImage").hide();
                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text('Formato no valido');
                    modal.find('#modal-message').html("<div style='color: red'> Verifique que el archivo seleccionado cumpla con el formato indicado ( xls o xlsx ) y/o el tamaño máximo. Favor ver las especificaciones sugeridas al principio de esta página\nGracias.</div>");
                    $('#exampleconfirmacion').modal('show');
                } else {

                    $("#LoadingImage").show();
                    $.ajax({
                        url: '../Controller/ctrlHabilidometro.php?opcion=1', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script, if anything
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (result) {
                            var data = eval('(' + result + ')');

                            if (data.res === 'fail') {
                                $("#LoadingImage").hide();
                                var modal = $('#exampleconfirmacion');
                                modal.find('.modal-title').text('Error en la carga');
                                modal.find('#modal-message').html("<div style='color: red'>" + data.msg + "\nGracias. </div>");
                                $('#exampleconfirmacion').modal('show');
                            } else if (data.res === 'all') {
                                $("#LoadingImage").hide();
                                var modal = $('#exampleconfirmacion');
                                modal.find('.modal-title').text('Carga Exitosa');
                                modal.find('#modal-message').html("<div style='color: #009d48'> La Inserción fue exitosa y " + data.msg + ". \nGracias </div>");
                                $('#exampleconfirmacion').modal('show');

                                $("#frmUploadHabilidometro").each(function () {
                                    this.reset();
                                });

                                var oTable = $('#tblRol').dataTable();
                                oTable.fnReloadAjax();
                                tabla();
                            }
                        }, error: function (xhr, ajaxOptions, thrownError) {
                            $("#LoadingImage").hide();
                            var modal = $('#exampleconfirmacion');
                            modal.find('.modal-title').text('Error en la carga');
                            modal.find('#modal-message').html("<div style='color: red'> Error de sistema, intente de nuevo. </div>");
                            $('#exampleconfirmacion').modal('show');
                        }
                    });
                }
            }
        }
    });

    $('#tblRol').on('click', 'a.consult', function () {

        $("#LoadingImage").show();

        $("#habilidometro").css({"border": "", "box-shadow": ""});

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlHabilidometro.php?opcion=2",
            data: {idHabilidometro: id},
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

                    $("#idSemillero").attr('disabled', 'disabled');
                    $("#fecha").attr('disabled', 'disabled');
                    $("#archivoHabilidometro").attr('disabled', 'disabled');

                    //Por medio del vector recibido del controlador se recibe todos los datos y se les asignar a sus respectivos campos
                    $("#idHabilidometro").val(data.row.IdHabilidometro);
                    $("#idSemillero").val(data.row.IdSemillero);
                    $("#fecha").val(data.row.Fecha_habilidometro);

                    $("#modiArchivo").show();
                    $("#updateArchivo").hide();
                    $("#enviarArchivo").hide();
                }
            }
        });
    });

    //evento del boton modificar para habilitar los campos de texto del formulario
    $('#modiArchivo').click(function () {

        $("#idSemillero").removeAttr("disabled");
        $("#fecha").removeAttr("disabled");
        $("#archivoHabilidometro").removeAttr("disabled");

        $("#updateArchivo").show();
        $("#modiArchivo").hide();
    });

    $('#return').click(function () {

        $("#idSemillero").css({"border": "", "box-shadow": ""});
        $("#fecha").css({"border": "", "box-shadow": ""});

        $("#frmUploadHabilidometro").each(function () {
            this.reset();
        });

        $("#enviarArchivo").show();
        $("#updateArchivo").hide();
    });

    $('#updateArchivo').click(function () {

        validarDatosHabilidometro();

        if (datosHabilidometro == false) {
            $("#LoadingImage").hide();
        } else {

            var file_data = $("#frmUploadHabilidometro").find('[name="archivoHabilidometro"]').prop('files')[0];

            var form_data = new FormData();
            form_data.append('file', file_data);
            form_data.append('idHabilidometro', $("#idHabilidometro").val());
            form_data.append('semillero', $("#idSemillero").val());
            form_data.append('fecha', $("#fecha").val());

            if (typeof file_data === "undefined") {

                $("#LoadingImage").hide();
                var modal = $('#exampleconfirmacion');
                modal.find('.modal-title').text('Error en la carga');
                modal.find('#modal-message').html("<div style='color: red'> Verifique que haya seleccionado un archivo. Favor ver las especificaciones sugeridas al principio de esta página\nGracias. </div>");
                $('#exampleconfirmacion').modal('show');
            } else {

                var fileNameArchivo = file_data.name;
                var extH = fileNameArchivo.substring(fileNameArchivo.lastIndexOf('.') + 1);

                if (file_data.size > 2000000 || (extH !== "xls" && extH !== "XLS" && extH !== "xlsx" && extH !== "XLSX")) {
                    $("#LoadingImage").hide();
                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text('Formato no valido');
                    modal.find('#modal-message').html("<div style='color: red'> Verifique que el archivo seleccionado cumpla con el formato indicado ( xls o xlsx ) y/o el tamaño máximo. Favor ver las especificaciones sugeridas al principio de esta página\nGracias.</div>");
                    $('#exampleconfirmacion').modal('show');
                } else {

                    $("#LoadingImage").show();
                    $.ajax({
                        url: '../Controller/ctrlHabilidometro.php?opcion=3', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script, if anything
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (result) {
                            var data = eval('(' + result + ')');

                            if (data.res === 'fail') {
                                $("#LoadingImage").hide();
                                var modal = $('#exampleconfirmacion');
                                modal.find('.modal-title').text('Error en la carga');
                                modal.find('#modal-message').html("<div style='color: red'>" + data.msg + " \nGracias </div>");
                                $('#exampleconfirmacion').modal('show');
                            } else if (data.res === 'all') {
                                $("#LoadingImage").hide();
                                var modal = $('#exampleconfirmacion');
                                modal.find('.modal-title').text('Carga Exitosa');
                                modal.find('#modal-message').html("<div style='color: #009d48'> La Inserción fue exitosa y " + data.msg + ". \nGracias </div>");
                                $('#exampleconfirmacion').modal('show');

                                $("#frmUploadHabilidometro").each(function () {
                                    this.reset();
                                });

                                var oTable = $('#tblRol').dataTable();
                                oTable.fnReloadAjax();
                                tabla();

                                $("#enviarArchivo").show();
                                $("#updateArchivo").hide();
                            }
                        }, error: function (xhr, ajaxOptions, thrownError) {
                            $("#LoadingImage").hide();
                            var modal = $('#exampleconfirmacion');
                            modal.find('.modal-title').text('Error en la carga');
                            modal.find('#modal-message').html("<div style='color: red'> Error de sistema, intente de nuevo. </div>");
                            $('#exampleconfirmacion').modal('show');
                        }
                    });
                }
            }
        }
    });

    $('#tblRol').on('click', 'a.delete', function () {

        $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRol tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlHabilidometro.php?opcion=4",
            data: {idHabilidometro: id},
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
                    modal.find('.modal-title').text("El archvio " + td[1].innerText);
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

function validarDatosHabilidometro() {

    if ($('#idSemillero').val() == 0) {

        $("#fecha").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el semillero al que se le realizo el habilidómetro. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#idSemillero").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosHabilidometro = false;
    } else if ($('#fecha').val() === "") {

        $("#idSemillero").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese la fecha en la que realizo el habilidómetro. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#fecha").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosHabilidometro = false;
    } else {

        $("#idSemillero").css({"border": "", "box-shadow": ""});
        $("#fecha").css({"border": "", "box-shadow": ""});

        datosHabilidometro = true;
    }
}

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
        "sAjaxSource": "Habilidometro/consultarDatosTablaHabilidometro.php",
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