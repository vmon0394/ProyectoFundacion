$(document).ready(function () {

    tabla();

    $('#enviarFormato').click(function () {

        if ($('#formato').val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese el nombre del formato. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#formato").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        } else {

            $("#formato").css({"border": "", "box-shadow": ""});

            var file_data = $("#frmUploadFormato").find('[name="archivoFormato"]').prop('files')[0];

            var form_data = new FormData();
            form_data.append('file', file_data);
            form_data.append('formato', $("#formato").val());

            if (typeof file_data === "undefined") {

                $("#LoadingImage").hide();
                var modal = $('#exampleconfirmacion');
                modal.find('.modal-title').text('Error en la carga');
                modal.find('#modal-message').html("<div style='color: red'> Verifique que haya seleccionado un archivo. </div>");
                $('#exampleconfirmacion').modal('show');
                
                $("#archivoFormato").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
            } else {
                
                $("#archivoFormato").css({"border": "", "box-shadow": ""});

                var fileNameArchivo = file_data.name;
                var extD = fileNameArchivo.substring(fileNameArchivo.lastIndexOf('.') + 1);

                //&& extD !== "png" && extD !== "PNG" && extD !== "jpg" && extD !== "JPG" && extD !== "jpeg" && extD !== "JPEG"
                if (file_data.size > 2000000 || (extD !== "pdf" && extD !== "PDF" && extD !== "xls" && extD !== "XLS" && extD !== "xlsx" && extD !== "XLSX"
                        && extD !== "doc" && extD !== "DOC" && extD !== "docx" && extD !== "DOCX")) {
                    $("#LoadingImage").hide();
                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text('Formato no valido');
                    modal.find('#modal-message').html("<div style='color: red'> Verifique que el archivo seleccionado cumpla con el formato indicado pdf, xls, xlsx, doc, docx y/o el tamaño máximo.. </div>");
                    $('#exampleconfirmacion').modal('show');
                } else {

                    $("#LoadingImage").show();
                    $.ajax({
                        url: '../Controller/ctrlFormatos.php?opcion=1', // point to server-side PHP script 
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
                                modal.find('#modal-message').html("<div style='color: red'>" + data.msg + " Favor ver las especificaciones sugeridas al principio de esta página\nGracias. </div>");
                                $('#exampleconfirmacion').modal('show');
                            } else if (data.res === 'all') {
                                $("#LoadingImage").hide();
                                var modal = $('#exampleconfirmacion');
                                modal.find('.modal-title').text('Carga Exitosa');
                                modal.find('#modal-message').html("<div style='color: #009d48'> La Inserción fue exitosa y " + data.msg + " \nGracias. </div>");
                                $('#exampleconfirmacion').modal('show');

                                $("#frmUploadFormato").each(function () {
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

        $("#formato").css({"border": "", "box-shadow": ""});

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlFormatos.php?opcion=2",
            data: {idFormato: id},
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
                    $("#idFormato").val(data.row.Id_formato);
                    $("#formato").val(data.row.Nombre_formato);

                    $("#updateFormato").show();
                    $("#enviarFormato").hide();
                }
            }
        });
    });

    $('#return').click(function () {

        $("#formato").css({"border": "", "box-shadow": ""});
        $("#archivoFormato").css({"border": "", "box-shadow": ""});

        $("#frmUploadFormato").each(function () {
            this.reset();
        });

        $("#enviarFormato").show();
        $("#updateFormato").hide();
    });

    $('#updateFormato').click(function () {

        var file_data = $("#frmUploadFormato").find('[name="archivoFormato"]').prop('files')[0];

        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('idFormato', $("#idFormato").val());
        form_data.append('formato', $("#formato").val());

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
            if (file_data.size > 2000000 || (extD !== "pdf" && extD !== "PDF" && extD !== "xls" && extD !== "XLS" && extD !== "xlsx" && extD !== "XLSX"
                    && extD !== "doc" && extD !== "DOC" && extD !== "docx" && extD !== "DOCX")) {
                $("#LoadingImage").hide();
                var modal = $('#exampleconfirmacion');
                modal.find('.modal-title').text('Formato no valido');
                modal.find('#modal-message').html("<div style='color: red'> Verifique que el archivo seleccionado cumpla con el formato indicado pdf, xls, xlsx, doc, docx y/o el tamaño máximo.. </div>");
                $('#exampleconfirmacion').modal('show');
            } else {

                if ($('#formato').val() === "") {

                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text("Faltan Datos");
                    modal.find('#modal-message').html("<div style='color: red'> Ingrese el nombre del formato. </div>");
                    $('#exampleconfirmacion').modal('show');

                    $("#formato").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
                } else {

                    $("#LoadingImage").show();
                    $.ajax({
                        url: '../Controller/ctrlFormatos.php?opcion=3', // point to server-side PHP script 
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
                                modal.find('#modal-message').html("<div style='color: red'>" + data.msg + " Favor ver las especificaciones sugeridas al principio de esta página\nGracias. </div>");
                                $('#exampleconfirmacion').modal('show');
                            } else if (data.res === 'all') {
                                $("#LoadingImage").hide();
                                var modal = $('#exampleconfirmacion');
                                modal.find('.modal-title').text('Carga Exitosa');
                                modal.find('#modal-message').html("<div style='color: #009d48'> La Inserción fue exitosa y " + data.msg + " \nGracias. </div>");
                                $('#exampleconfirmacion').modal('show');

                                $("#frmUploadFormato").each(function () {
                                    this.reset();
                                });

                                var oTable = $('#tblRol').dataTable();
                                oTable.fnReloadAjax();
                                tabla();

                                $("#enviarFormato").show();
                                $("#updateFormato").hide();
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
            url: "../Controller/ctrlFormatos.php?opcion=4",
            data: {idFormato: id},
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
        "sAjaxSource": "Formatos/consultarDatosTablaFormatos.php",
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
                "sNext": "Siguiente", "sLast": "&Uacute;ltima"
            },
            "sZeroRecords": "No se encontraron registros",
            "sEmptyTable": "No hay registros",
            "sSearch": "B&uacute;squeda R&aacute;pida"
        }
    }).fnSetFilteringDelay(250);
}