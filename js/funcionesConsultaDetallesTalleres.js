$(document).ready(function () {

    $('#consult').click(function () {

        validarDatos();

        if (datosTaller == false) {
            $("#LoadingImage").hide();
        } else {

            $("#LoadingImage").show();

            var oTable = $('#tblRol').dataTable();
            oTable.fnDestroy();

            var tipo = $("#tipoBusqeda").val();
            var mensaje = "";

            if (tipo === "1") {
                mensaje = "Dificultades";
            } else if (tipo === "2") {
                mensaje = "Experiencias Significativas";
            } else if (tipo === "3") {
                mensaje = "Recomendaciones";
            }else if (tipo === "4") {
                mensaje = "Testimonios";
            }else if (tipo === "5") {
                mensaje = "Alertas";
            }

            tablaDetallesTalleres($("#frmDetallesTalleres").serialize());

            $("#LoadingImage").hide();
            $('#tituloDetalle').html(mensaje + " del Semillero");
            $('#consultaDetallers').show();
            $('#download').show();
        }
    });

    $('#clear').click(function () {

        var oTable = $('#tblRol').dataTable();
        oTable.fnDestroy();

        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#tipoBusqeda").css({"border": "", "box-shadow": ""});
        $("#fechaDesde").css({"border": "", "box-shadow": ""});
        $("#fechaHasta").css({"border": "", "box-shadow": ""});

        $("#frmDetallesTalleres").each(function () {
            this.reset();
        });

        $('#consultaDetallers').hide();
        $('#download').hide();
    });

    $('#download').click(function () {

        validarDatos();

        if (datosTaller == false) {
            $("#LoadingImage").hide();
        } else {
            location.href = "../ExportarReportes/exportarWordDetallesTalleres.php?" + $("#frmDetallesTalleres").serialize();
        }
    });
});

function tablaDetallesTalleres(semillero) {

    $('#tblRol').dataTable({
        "bProcessing": true,
        "sServerMethod": 'GET',
        "bServerSide": true,
        "bRetrieve": true,
        "info": false,
        "bFilter": false,
        "ordering": true,
        "bAutoWidth": false,
        "bLengthChange": false,
        "bPaginate": true,
        "iDisplayLength": 50,
        "sAjaxSource": "Talleres/consultarDetallesTalleres.php?" + semillero,
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

function validarDatos() {

    if ($('#semillero').val() == 0) {

        $("#tipoBusqeda").css({"border": "", "box-shadow": ""});
        $("#fechaDesde").css({"border": "", "box-shadow": ""});
        $("#fechaHasta").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el semillero a consultar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#semillero").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosTaller = false;
    } else if ($('#tipoBusqeda').val() == 0) {

        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#fechaDesde").css({"border": "", "box-shadow": ""});
        $("#fechaHasta").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el tipo de busqueda. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#tipoBusqeda").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosTaller = false;
    } else if ($('#fechaDesde').val() === "") {

        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#tipoBusqeda").css({"border": "", "box-shadow": ""});
        $("#fechaHasta").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese la fecha inicial a consultar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#fechaDesde").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosTaller = false;
    } else if ($('#fechaHasta').val() === "") {

        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#tipoBusqeda").css({"border": "", "box-shadow": ""});
        $("#fechaDesde").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese la fecha final a consultar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#fechaHasta").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosTaller = false;
    } else {

        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#tipoBusqeda").css({"border": "", "box-shadow": ""});
        $("#fechaDesde").css({"border": "", "box-shadow": ""});
        $("#fechaHasta").css({"border": "", "box-shadow": ""});

        datosTaller = true;
    }
}