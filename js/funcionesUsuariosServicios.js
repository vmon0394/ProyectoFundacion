
$(document).ready(function () {

    $('#consult').click(function () {

        validarDatos();

        if (datosServicio == false) {
            $("#LoadingImage").hide();
        } else {

            $("#LoadingImage").show();

            var oTable = $('#tblRol').dataTable();
            oTable.fnDestroy();

            tablaServicios($("#frmServicios").serialize());

            $("#LoadingImage").hide();
            $('#consultaServicio').show();
        }
    });

    $('#clear').click(function () {

        var oTable = $('#tblRol').dataTable();
        oTable.fnDestroy();

        $("#servicio").css({"border": "", "box-shadow": ""});
 
        $("#frmServicios").each(function () {
            this.reset();
        });

        $('#consultaServicio').hide();
    });

});

function tablaServicios(servicio){

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
        "sAjaxSource":"Usuarios/consultaDetalleServicios.php?" + servicio,
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

    if ($('#servicio').val() == 0) {
        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el Servicio a consultar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#servicio").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosServicio = false;
    }else {

        $("#servicio").css({"border": "", "box-shadow": ""});
        datosServicio = true;
    }
}