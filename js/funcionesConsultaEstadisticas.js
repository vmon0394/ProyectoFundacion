$(document).ready(function () {

    $('#consult').click(function () {

        validarDatos();

        if (datosSemillero == false) {
            $("#LoadingImage").hide();
        } else {

            $("#LoadingImage").show();

            var oTable = $('#tblRol').dataTable();
            oTable.fnDestroy();
            
            tablaEstadisticasSemillero($("#frmDetallesTalleres").serialize());

            $("#LoadingImage").hide();
            $('#tituloReporte').html("Semillero");
            $('#consultaEstadistica').show();
            $('#download').show();
        }
    });

    $('#clear').click(function () {

        var oTable = $('#tblRol').dataTable();
        oTable.fnDestroy();

        $("#semillero").css({"border": "", "box-shadow": ""});
        
        $("#frmEstadisticas").each(function () {
            this.reset();
        });

        $('#consultaEstadistica').hide();
        $('#download').hide();
    });

    $('#download').click(function () {

        validarDatos();

        if (datosSemillero == false) {
            $("#LoadingImage").hide();
        } else {
            location.href = "../ExportarReportes/exportarExcelEstadisticasSemillero.php?".serialize();
        }
    });
});

function tablaEstadisticasSemillero(semillero) {

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
        "sAjaxSource": "Estadisticas/consultarEstadisticas.php?" + semillero,
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
/*
 * funcion para advertirle al usuario que debe selecionar un semillero.
 */
function validarDatos() {

    if ($('#semillero').val() == 0) {

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el semillero a consultar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#semillero").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosSemillero = false;

    } else {

        $("#semillero").css({"border": "", "box-shadow": ""});
        
        datosSemillero = true;
    }
}