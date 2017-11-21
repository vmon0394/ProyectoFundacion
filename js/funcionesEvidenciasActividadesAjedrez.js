$(document).ready(function () {
    
    tabla();

    //evento que captura el clic de boton cargar evidencia y hace la carga y registro del mismo
    $("#enviarFoto").click(function () {

        if ($('#actividadEvidencia').val() === 0) {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Seleccione la actividad a la que se le realizo el testimonio. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#actividadEvidencia").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else {
            
            $("#actividadEvidencia").css({"border": "", "box-shadow": ""});

            var file_data = $("#formUploadEvidencia").find('[name="archivoEvidencia"]').prop('files')[0];

            var form_data = new FormData();
            form_data.append('file', file_data);
            form_data.append('idActividad', $("#actividadEvidencia").val());
            form_data.append('folder', "Evidencias");

            if (typeof file_data === "undefined") {

                $("#LoadingImage").hide();
                var modal = $('#exampleconfirmacion');
                modal.find('.modal-title').text('Error en la carga');
                modal.find('#modal-message').html("<div style='color: red'> Verifique que haya seleccionado un archivo. </div>");
                $('#exampleconfirmacion').modal('show');
            } else {

                var fileNameArchivo = file_data.name;
                var extE = fileNameArchivo.substring(fileNameArchivo.lastIndexOf('.') + 1);

                if (extE.size > 1000000 || (extE !== "png" && extE !== "PNG" && extE !== "jpg" && extE !== "JPG" && extE !== "jpeg" && extE !== "JPEG")) {
                    $("#LoadingImage").hide();
                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text('Formato no valido');
                    modal.find('#modal-message').html("<div style='color: red'> Verifique que el archivo seleccionado cumpla con el formato indicado y el tamaño máximo especificado. Favor ver las especificaciones sugeridas al principio de esta página\nGracias. </div>");
                    $('#exampleconfirmacion').modal('show');
                } else {

                    $.ajax({
                        url: '../Controller/ctrlEvidenciasActividades.php?opcion=1', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script, if anything
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'POST',
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

                                $("#formUploadEvidencia").each(function () {
                                    this.reset();
                                });

                                var oTable = $('#tblRolEvidencias').dataTable();
                                oTable.fnDestroy();
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

    //evento que captura el clic de boton eliminar archivo y hace eliminando el archivo y su respectivo registro
    $('#tblRolEvidencias').on('click', 'a.delete', function () {

        $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRolEvidencias tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlEvidenciasActividades.php?opcion=2",
            data: {idEvidencia: id},
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
                    modal.find('.modal-title').text("El archvio " + td[2].innerText);
                    modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + "</div>");
                    $('#exampleconfirmacion').modal('show');

                    var oTable = $('#tblRolEvidencias').dataTable();
                    oTable.fnDestroy();
                    tabla();
                }
            }
        });
    });
});

function tabla() {

    $('#tblRolEvidencias').dataTable({
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
        "sAjaxSource": "Actividades/consultarDatosTablaEvidenciasActividades.php?" ,
        "order": [[1, "desc"]],
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