$(document).ready(function () {

    tabla();

    $('#enviarTecnica').click(function () {

        var file_data = $("#frmUploadTecnicas").find('[name="archivoTecnica"]').prop('files')[0];

        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('tecnica', $("#tecnica").val());
        form_data.append('valor', $("#valor").val());
        form_data.append('habilidad', $("#habilidad").val());

        if (typeof file_data === "undefined") {

            $("#LoadingImage").hide();
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text('Error en la carga');
            modal.find('#modal-message').html("<div style='color: red'> Verifique que haya seleccionado un archivo. </div>");
            $('#exampleconfirmacion').modal('show');
        } else {

            var fileNameArchivo = file_data.name;
            var extD = fileNameArchivo.substring(fileNameArchivo.lastIndexOf('.') + 1);

            //&& extD !== "png" && extD !== "PNG" && extD !== "jpg" && extD !== "JPG" && extD !== "jpeg" && extD !== "JPEG"
            if (file_data.size > 2000000 || (extD !== "pdf" && extD !== "PDF")) {
                $("#LoadingImage").hide();
                var modal = $('#exampleconfirmacion');
                modal.find('.modal-title').text('Formato no valido');
                modal.find('#modal-message').html("<div style='color: red'> Verifique que el archivo seleccionado cumpla con el formato indicado pdf y/o el tamaño máximo.. </div>");
                $('#exampleconfirmacion').modal('show');
            } else {

                validarDatosTecnicas();

                if (datosTecnicas == false) {
                    $("#LoadingImage").hide();
                } else {

                    $("#LoadingImage").show();
                    $.ajax({
                        url: '../Controller/ctrlTecnicas.php?opcion=1', // point to server-side PHP script 
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
                                modal.find('#modal-message').html("<div style='color: red'>" + data.msg + " Favor ver las especificaciones sugeridas al principio de esta página\nGracias </div>");
                                $('#exampleconfirmacion').modal('show');
                            } else if (data.res === 'all') {
                                $("#LoadingImage").hide();
                                var modal = $('#exampleconfirmacion');
                                modal.find('.modal-title').text('Carga Exitosa');
                                modal.find('#modal-message').html("<div style='color: #009d48'> La Inserción fue exitosa y " + data.msg + ". \nGracias </div>");
                                $('#exampleconfirmacion').modal('show');

                                $("#frmUploadTecnicas").each(function () {
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

        $("#tecnica").css({"border": "", "box-shadow": ""});
        $("#habilidad").css({"border": "", "box-shadow": ""});
        $("#valor").css({"border": "", "box-shadow": ""});

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlTecnicas.php?opcion=2",
            data: {idTecnica: id},
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

                    //Por medio del vector recibido del controlador se recibe todos los datos y se les asignar a sus respectivos campos
                    $("#idTecnica").val(data.row.IdTecnica);
                    $("#tecnica").val(data.row.NombreTecnica);
                    $("#habilidad").val(data.row.IdHabilidad);
                    $("#valor").val(data.row.Valor);

                    $("#updateTecnica").show();
                    $("#enviarTecnica").hide();
                }
            }
        });
    });

    $('#return').click(function () {

        $("#tecnica").css({"border": "", "box-shadow": ""});
        $("#habilidad").css({"border": "", "box-shadow": ""});
        $("#valor").css({"border": "", "box-shadow": ""});

        $("#frmUploadTecnicas").each(function () {
            this.reset();
        });

        $("#enviarTecnica").show();
        $("#updateTecnica").hide();
    });

    $('#updateTecnica').click(function () {

        var file_data = $("#frmUploadTecnicas").find('[name="archivoTecnica"]').prop('files')[0];

        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('idTecnica', $("#idTecnica").val());
        form_data.append('tecnica', $("#tecnica").val());
        form_data.append('valor', $("#valor").val());
        form_data.append('habilidad', $("#habilidad").val());

        if (typeof file_data === "undefined") {

            $("#LoadingImage").hide();
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text('Error en la carga');
            modal.find('#modal-message').html("<div style='color: red'> Verifique que haya seleccionado un archivo. </div>");
            $('#exampleconfirmacion').modal('show');
        } else {

            var fileNameArchivo = file_data.name;
            var extD = fileNameArchivo.substring(fileNameArchivo.lastIndexOf('.') + 1);

            //&& extD !== "png" && extD !== "PNG" && extD !== "jpg" && extD !== "JPG" && extD !== "jpeg" && extD !== "JPEG"
            if (extD !== "pdf" && extD !== "PDF") {
                $("#LoadingImage").hide();
                var modal = $('#exampleconfirmacion');
                modal.find('.modal-title').text('Formato no valido');
                modal.find('#modal-message').html("<div style='color: red'> Verifique que el archivo seleccionado cumpla con el formato indicado ( pdf ). </div>");
                $('#exampleconfirmacion').modal('show');
            } else {

                validarDatosTecnicas();

                if (datosTecnicas == false) {
                    $("#LoadingImage").hide();
                } else {

                    $("#LoadingImage").show();
                    $.ajax({
                        url: '../Controller/ctrlTecnicas.php?opcion=3', // point to server-side PHP script 
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
                                modal.find('#modal-message').html("<div style='color: red'>" + data.msg + " Favor ver las especificaciones sugeridas al principio de esta página\nGracias </div>");
                                $('#exampleconfirmacion').modal('show');
                            } else if (data.res === 'all') {
                                $("#LoadingImage").hide();
                                var modal = $('#exampleconfirmacion');
                                modal.find('.modal-title').text('Carga Exitosa');
                                modal.find('#modal-message').html("<div style='color: #009d48'> La Inserción fue exitosa y " + data.msg + ". \nGracias </div>");
                                $('#exampleconfirmacion').modal('show');

                                $("#frmUploadTecnicas").each(function () {
                                    this.reset();
                                });

                                var oTable = $('#tblRol').dataTable();
                                oTable.fnReloadAjax();
                                tabla();

                                $("#enviarTecnica").show();
                                $("#updateTecnica").hide();
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
            url: "../Controller/ctrlTecnicas.php?opcion=4",
            data: {idTecnica: id},
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

function validarDatosTecnicas() {

    if ($('#tecnica').val() === "") {

        $("#habilidad").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese el nombre de la técnica. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#tecnica").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosTecnicas = false;
    } else if ($('#habilidad').val() == 0) {

        $("#tecnica").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Selecciona la habilidad de la técnica. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#habilidad").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosTecnicas = false;
    } else if ($('#valor').val() == 0) {

        $("#habilidad").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Selecciona el valor de la técnica. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#valor").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosTecnicas = false;
    } else {

        $("#tecnica").css({"border": "", "box-shadow": ""});
        $("#habilidad").css({"border": "", "box-shadow": ""});
        $("#valor").css({"border": "", "box-shadow": ""});

        datosTecnicas = true;
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
        "sAjaxSource": "Tecnicas/consultarDatosTablaTecnicas.php",
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