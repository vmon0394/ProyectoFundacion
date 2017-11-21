
$(document).ready(function () {

    tabla();

    $('#enviarPresupuesto').click(function () {

        if ($('#presupuesto').val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese el nombre del presupuesto. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#presupuesto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        } else {

            $("#presupuesto").css({"border": "", "box-shadow": ""});

            var file_data = $("#frmUploadPresupuesto").find('[name="archivoPresupuesto"]').prop('files')[0];

            var form_data = new FormData();
            form_data.append('file', file_data);
            form_data.append('presupuesto', $("#presupuesto").val());

            if (typeof file_data === "undefined") {

                $("#LoadingImage").hide();
                var modal = $('#exampleconfirmacion');
                modal.find('.modal-title').text('Error en la carga');
                modal.find('#modal-message').html("<div style='color: red'> Verifique que haya seleccionado un archivo. </div>");
                $('#exampleconfirmacion').modal('show');
                
                $("#archivoPresupuesto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
            } else {
                
                $("#archivoPresupuesto").css({"border": "", "box-shadow": ""});

                var fileNameArchivo = file_data.name;
                var extD = fileNameArchivo.substring(fileNameArchivo.lastIndexOf('.') + 1);

                //&& extD !== "png" && extD !== "PNG" && extD !== "jpg" && extD !== "JPG" && extD !== "jpeg" && extD !== "JPEG"
                if (file_data.size > 2000000 || (extD !== "pdf" && extD !== "PDF")) {
                    $("#LoadingImage").hide();
                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text('Documento no valido');
                    modal.find('#modal-message').html("<div style='color: red'> Verifique que el archivo seleccionado cumpla con el formato indicado pdf y/o el tamaño máximo.. </div>");
                    $('#exampleconfirmacion').modal('show');
                } else {

                    $("#LoadingImage").show();
                    $.ajax({
                        url: '../Controller/ctrlPresupuestos.php?opcion=1', // point to server-side PHP script 
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

                                $("#frmUploadPresupuesto").each(function () {
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

        $("#presupuesto").css({"border": "", "box-shadow": ""});

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlPresupuestos.php?opcion=2",
            data: {idPresupuesto: id},
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
                    $("#idPresupuesto").val(data.row.Id_presupuesto);
                    $("#presupuesto").val(data.row.Nombre_presupuesto);

                    $("#updatePresupuesto").show();
                    $("#enviarPresupuesto").hide();
                }
            }
        });
    });

    $('#return').click(function () {

        $("#presupuesto").css({"border": "", "box-shadow": ""});
        $("#archivoPresupuesto").css({"border": "", "box-shadow": ""});

        $("#frmUploadPresupuesto").each(function () {
            this.reset();
        });

        $("#enviarPresupuesto").show();
        $("#updatePresupuesto").hide();
    });

    $('#updatePresupuesto').click(function () {

        var file_data = $("#frmUploadPresupuesto").find('[name="archivoPresupuesto"]').prop('files')[0];

        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('idPresupuesto', $("#idPresupuesto").val());
        form_data.append('presupuesto', $("#presupuesto").val());

        if (typeof file_data === "undefined") {

            $("#LoadingImage").hide();
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text('Error en la carga');
            modal.find('#modal-message').html("<div style='color: red'> Verifique que haya seleccionado un archivo. </div>");
            $('#exampleconfirmacion').modal('show');
        } else {

            var fileNameArchivo = file_data.name;
            var extD = fileNameArchivo.substring(fileNameArchivo.lastIndexOf('.') + 1);

            if (file_data.size > 2000000 || (extD !== "pdf" && extD !== "PDF" )) {
                $("#LoadingImage").hide();
                var modal = $('#exampleconfirmacion');
                modal.find('.modal-title').text('Formato no valido');
                modal.find('#modal-message').html("<div style='color: red'> Verifique que el archivo seleccionado cumpla con el formato indicado pdf y/o el tamaño máximo.. </div>");
                $('#exampleconfirmacion').modal('show');
            } else {

                if ($('#presupuesto').val() === "") {

                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text("Faltan Datos");
                    modal.find('#modal-message').html("<div style='color: red'> Ingrese el nombre del presupuesto. </div>");
                    $('#exampleconfirmacion').modal('show');

                    $("#presupuesto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
                } else {

                    $("#LoadingImage").show();
                    $.ajax({
                        url: '../Controller/ctrlPresupuestos.php?opcion=3', // point to server-side PHP script 
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

                                $("#frmUploadPresupuesto").each(function () {
                                    this.reset();
                                });

                                var oTable = $('#tblRol').dataTable();
                                oTable.fnReloadAjax();
                                tabla();

                                $("#enviarPresupuesto").show();
                                $("#updatePresupuesto").hide();
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
            url: "../Controller/ctrlPresupuestos.php?opcion=4",
            data: {idPresupuesto: id},
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
        "sAjaxSource": "Documentos/consultarDatosTablaPresupuestos.php",
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