$(document).ready(function () {

    //llamado del las funciones para llenar las tablas
    tabla();
//    tabla2();

    //evento del boton guardar
    $('#save').click(function () {

        if ($('#departamento').val() == 0) {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Seleccione el Departamento del Municipio a registrar. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#departamento").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#municipio').val() === "") {

            $("#departamento").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese el nombre del Municipio a Registrar. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#municipio").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else {

            $("#departamento").css({"border": "", "box-shadow": ""});
            $("#municipio").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlMunicipios.php?opcion=1",
                data: $("#frmMunicipios").serialize(),
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

                        $("#frmMunicipios").each(function () {
                            this.reset();
                        });

                        var oTable = $('#tblRol').dataTable();
                        oTable.fnDestroy();
                        tabla();
                    }
                }
            });
        }
    });

    //evento del boton consultar de la tabla zona existentes
    $('#tblRol').on('click', 'a.consult', function () {

        $("#LoadingImage").show();

        $("#departamento").css({"border": "", "box-shadow": ""});

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlMunicipios.php?opcion=2",
            data: {idMunicipio: id},
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

                    $("#departamento").attr('disabled', 'disabled');
                    $("#municipio").attr('disabled', 'disabled');

                    $("#idMunicipio").val(data.row.IdMunicipio);
                    $("#departamento").val(data.row.IdDepartamento);
                    $("#municipio").val(data.row.Municipio);

                    $("#modi").show();
                    $("#save").hide();

                }
            }
        });
    });

    //evento del boton modificar para habilitar los campos de texto del formulario
    $('#modi').click(function () {

        $("#departamento").removeAttr("disabled");
        $("#municipio").removeAttr("disabled");

        $("#update").show();
        $("#modi").hide();
        $("#restore").hide();
    });

    //evento del boton volver cuando no desea hacer ninguna de las otras funciones y quiere volver al panel pricipal
    $('#return').click(function () {

        $("#departamento").removeAttr("disabled");
        $("#municipio").removeAttr("disabled");

        $("#departamento").css({"border": "", "box-shadow": ""});
        $("#municipio").css({"border": "", "box-shadow": ""});

        $("#frmMunicipios").each(function () {
            this.reset();
        });

        $("#save").show();
        $("#update").hide();
        $("#modi").hide();
    });

    //evento del boton antualizar cuando a modificar los datos del registro consultado
    $('#update').click(function () {

        if ($('#departamento').val() == 0) {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Seleccione el Departamento del Municipio a registrar. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#departamento").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#municipio').val() === "") {

            $("#departamento").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese el nombre del Municipio a Registrar. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#municipio").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else {

            $("#departamento").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlMunicipios.php?opcion=3",
                data: $("#frmMunicipios").serialize(),
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

                        $("#frmMunicipios").each(function () {
                            this.reset();
                        });

                        $("#save").show();
                        $("#modi").hide();
                        $("#update").hide();

                        var oTable = $('#tblRol').dataTable();
                        oTable.fnDestroy();
                        tabla();
                    }
                }
            });
        }
    });
});

//consulta para llenar la tabla de los proyectos existentes
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
        "sAjaxSource": "Municipios/consultarDatosTablaMunicipios.php",
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