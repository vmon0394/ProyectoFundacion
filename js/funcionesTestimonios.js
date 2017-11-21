$(document).ready(function () {

    //evento que captura el clic de boton guardar y se crea el registro del testimonio
    $("#saveTestimonio").click(function () {

        if ($('#tallerTestimonio').val() == 0) {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Seleccione el taller al que se le realizo el testimonio. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#tallerTestimonio").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#Testimonio').val() === "") {

            $("#tallerTestimonio").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese el testimonio del taller. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#Testimonio").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else {

            $("#tallerTestimonio").css({"border": "", "box-shadow": ""});
            $("#Testimonio").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlTestimonios.php?opcion=1",
                data: $("#frmTestimonioSemillero").serialize(),
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

                        $("#frmTestimonioSemillero").each(function () {
                            this.reset();
                        });

                        var oTable = $('#tblRolTestimonios').dataTable();
                        oTable.fnDestroy();

                        tablaTestimonios($('#idSemillero').val());
                    }
                }
            });
        }
    });

    //evento que captura el clic de boton consultar testimonio y trae los datos de vuelta a sus campos
    $('#tblRolTestimonios').on('click', 'a.consult', function () {

        $("#LoadingImage").show();

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlTestimonios.php?opcion=2",
            data: {idTestimonio: id},
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

                    $("#idTestimonio").val(data.row.Id_testimonio);
                    $("#tallerTestimonio").val(data.row.IdTaller);
                    $("#Testimonio").val(data.row.Testimonio);

                    $("#saveTestimonio").hide();
                    $("#updateTestimonio").show();
                }
            }
        });
    });

    //evento que captura el clic de boton actualizar y se modifica el registro del testimonio
    $("#updateTestimonio").click(function () {

        if ($('#tallerTestimonio').val() == 0) {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Seleccione el taller al que se le realizo el testimonio. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#tallerTestimonio").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#Testimonio').val() === "") {

            $("#tallerTestimonio").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese el testimonio del taller. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#Testimonio").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else {

            $("#tallerTestimonio").css({"border": "", "box-shadow": ""});
            $("#Testimonio").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlTestimonios.php?opcion=3",
                data: $("#frmTestimonioSemillero").serialize(),
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

                        $("#frmTestimonioSemillero").each(function () {
                            this.reset();
                        });

                        var oTable = $('#tblRolTestimonios').dataTable();
                        oTable.fnDestroy();

                        tablaTestimonios($('#idSemillero').val());

                        $("#saveTestimonio").show();
                        $("#updateTestimonio").hide();
                    }
                }
            });
        }
    });

    //evento que captura el clic de boton nuevo y limpiar el campo de testimonio
    $("#returnTestimonio").click(function () {

        $("#frmTestimonioSemillero").each(function () {
            this.reset();
        });

        $("#saveTestimonio").show();
        $("#updateTestimonio").hide();
    });
});

function tablaTestimonios(idSemillero) {

    $('#tblRolTestimonios').dataTable({
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
        "sAjaxSource": "Semilleros/consultarDatosTablaTestimonios.php?semillero=" + encodeURIComponent(idSemillero),
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