$(document).ready(function () {

    tablaHistorialTalleres();

    //mantiene los paneles de los pasos 2,3,4 y 5 ocultos
    $("#paso2T").hide();

    //evento que captura el clic al darle en paso 1 mostrado el formulario del paso 1
    $("#p1T").click(function (e) {
        $(this).addClass('btn-success');
        $("#p2T").removeClass('btn-success');
        $("#paso1T").show();
        $("#paso2T").hide();
        e.preventDefault();
    });

    //evento que captura el clic al darle en paso 1 mostrado el formulario del paso 2
    $("#p2T").click(function (e) {

        if ($("#semilleroTaller").val() == 0 || $("#tipoTaller").val() == 0 || $("#nombreTaller").val() === "" || $("#fechaTaller").val() === ""
                || $("#idHabilidad").val() == 0 || $("#valorTaller").val() == 0 || $("#tecnicaTaller").val() == 0 || $("#tiempoTaller").val() === ""
                || $("#estadoTaller").val() == 0 || $("#actividadInicial").val() === "" || $("#actividadCentral").val() === "" || $("#actividadFinal").val() === "") {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe diligencias la información básica del taller para diligenciar la planeación.</div>");
            $('#exampleconfirmacion').modal('show');
        } else {
            $(this).addClass('btn-success');
            $("#p1T").removeClass('btn-success');
            $("#paso1T").hide();
            $("#paso2T").show();
        }
        e.preventDefault();

    });

    $('#tblRolHistorialTalleres').on('click', 'a.consult', function () {

        var id = $(this).prop('title');
        $("#LoadingImage").show();
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlHistorialTalleres.php?opcion=2",
            data: {idTaller: id},
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

                    $("#p1T").addClass('btn-success');
                    $("#p2T").removeClass('btn-success');
                    $("#paso1T").show();
                    $("#paso2T").hide();

                    $("#semilleroTaller").attr('disabled', 'disabled');
                    $("#tipoTaller").attr('disabled', 'disabled');
                    $("#nombreTaller").attr('disabled', 'disabled');
                    $("#fechaTaller").attr('disabled', 'disabled');
                    $("#idHabilidad").attr('disabled', 'disabled');
                    $("#valorTaller").attr('disabled', 'disabled');
                    $("#actividadInicial").attr('disabled', 'disabled');
                    $("#actividadCentral").attr('disabled', 'disabled');
                    $("#actividadFinal").attr('disabled', 'disabled');
                    $("#tecnicaTaller").attr('disabled', 'disabled');
                    $("#tiempoTaller").attr('disabled', 'disabled');
                    $("#estadoTaller").attr('disabled', 'disabled');
                    $("#observacionCancelacion").attr('disabled', 'disabled');
                    $("#objetivoTaller").attr('disabled', 'disabled');
                    $("#descripcionTaller").attr('disabled', 'disabled');
                    $("#logrosTaller").attr('disabled', 'disabled');
                    $("#dificultadesTaller").attr('disabled', 'disabled');
                    $("#recomendacionesTaller").attr('disabled', 'disabled');

                    $("#semilleroTaller").val(data.row.IdSemillero);
                    $("#idTaller").val(data.row.IdTaller);
                    $("#tipoTaller").val(data.row.TipoTaller);
                    $("#nombreTaller").val(data.row.NombreTaller);
                    $("#fechaTaller").val(data.row.FechaTaller);
                    $("#idHabilidad").val(data.row.IdHabilidad);
                    $("#valorTaller").val(data.row.ValorNuclear);
                    $("#actividadInicial").val(data.row.ActividadInicial);
                    $("#actividadCentral").val(data.row.ActividadCentral);
                    $("#actividadFinal").val(data.row.Actividadfinal);
                    $("#tecnicaTaller").val(data.row.IdTecnica);
                    $("#tiempoTaller").val(data.row.Tiempo);
                    $("#estadoTaller").val(data.row.EstadoTaller);
                    $("#observacionCancelacion").val(data.row.Observacion);
                    $("#objetivoTaller").val(data.row.Objetivo);
                    $("#descripcionTaller").val(data.row.DescripcionDeActividades);
                    $("#logrosTaller").val(data.row.Logros);
                    $("#dificultadesTaller").val(data.row.Dificultades);
                    $("#recomendacionesTaller").val(data.row.Recomendaciones);
                    $("#habilitarFechaLimiteTaller").val(data.row.FechaLimite);

                    $("#divFrmHistorial").show();
                    $("#divTablaHistorial").hide();

                }
            }
        });
    });

    $('#returnTabla').click(function () {

        $("#divFrmHistorial").hide();
        $("#divTablaHistorial").show();

        $("#frmHistorialTaller").each(function () {
            this.reset();
        });

    });

    $('#tblRolHistorialTalleres').on('click', 'a.assistance', function () {

        $("#LoadingImage").show();
        var id = $(this).prop('title');
        var link = "visualizarHistorialAsistencia.php?taller=" + id;
        var left = (screen.width / 2) - (1024 / 2);
        var top = (screen.height / 2) - (800 / 2);
        $("#LoadingImage").hide();
        var ventana = window.open(link, 'mywindow', 'toolbar=0,titlebar=0,menubar=0,location=0,resizable=0,width=1024,height=800');
        ventana.focus();
        ventana.moveTo(left, top);
    });
});

function tablaHistorialTalleres() {

    $('#tblRolHistorialTalleres').dataTable({
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
        "sAjaxSource": "HistorialTalleres/consultarDatosTablaHistorialTalleres.php",
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

function tomaHistorialAsistencia(taller) {

    $.ajax({
        type: "POST",
        url: "../Controller/ctrlHistorialTalleres.php?opcion=3",
        data: {taller: taller},
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


                if (data.row.Asistieron === "") {

                    $("#tablaAsisitencias").append(data.row.Tabla);
                    $("#semillero").html(data.row.Semillero);
                    $("#tamano").val(data.row.Tamano);
                    $("#idTallerA").val(data.row.IdTabla);
                    $("#nombreTaller").html(data.row.Taller);
                } else {

                    $("#tablaAsisitencias").append(data.row.Tabla);
                    $("#semillero").html(data.row.Semillero);
                    $("#tamano").val(data.row.Tamano);
                    $("#idTallerA").val(data.row.IdTabla);
                    $("#nombreTaller").html("Taller " + data.row.Taller);

                    var asistencia = data.row.Asistieron;
                    var VectorAsistencia = asistencia.split(";");
                    for (var i = 0; i < VectorAsistencia.length; i++) {

                        if (VectorAsistencia[i] === "1") {
                            $("#asistencia-" + i).prop('checked', 'checked');
                        } else if (VectorAsistencia[i] === "0") {
                            $("#asistencia2-" + i).prop('checked', 'checked');
                        }

                        $("#asistencia-" + i).attr('disabled', 'disabled');
                        $("#asistencia2-" + i).attr('disabled', 'disabled');

                    }

                }
            }
        }
    });
}