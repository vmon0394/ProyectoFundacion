
$(document).ready(function () {

    $('#consult').click(function () {

        validarDatos();

        if (datosZona == false) {
            $("#LoadingImage").hide();
        } else {

            $("#LoadingImage").show();

            var oTable = $('#tblRol').dataTable();
            oTable.fnDestroy();

            tablaZonas($("#frmZonas").serialize());

            $("#LoadingImage").hide();
            $('#consultaZona').show();
        }
    });

    $('#clear').click(function () {

        var oTable = $('#tblRol').dataTable();
        oTable.fnDestroy();

        $("#zona").css({"border": "", "box-shadow": ""});
 
        $("#frmZonas").each(function () {
            this.reset();
        });

        $('#consultaZona').hide();
    });

});

function tablaZonas(zona){

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
        "sAjaxSource":"Talleres/consultarDetallesZonas.php?" + zona,
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

    if ($('#zona').val() == 0) {
        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione la Zona a consultar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#zona").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosZona = false;
    }else {

        $("#zona").css({"border": "", "box-shadow": ""});
        datosZona = true;
    }
}