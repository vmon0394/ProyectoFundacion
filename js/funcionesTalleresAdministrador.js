$(document).ready(function () {

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
                || $("#idHabilidad").val() == 0 || $("#valorTaller").val() == 0 || $("#tecnicaTaller").val() == 0 || $("#tipoActividad").val() == 0
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

    $('#saveTalleres').click(function () {

        validarPaso1Taller();

        if (Paso1Taller == false) {
            $("#LoadingImage").hide();
        } else {

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlTalleres.php?opcion=1",
                data: $("#frmTaller").serialize(),
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

                        $("#p1T").addClass('btn-success');
                        $("#p2T").removeClass('btn-success');
                        $("#paso1T").show();
                        $("#paso2T").hide();

                        $("#frmTaller").each(function () {
                            this.reset();
                        });

                        var oTable = $('#tblRolTalleres').dataTable();
                        oTable.fnDestroy();
                        tablaTaller(idGlobalSemilleroTalleres);

                        $("#semilleroTallerD").val(idGlobalSemilleroTalleres);
                        $("#semilleroTaller").val(idGlobalSemilleroTalleres);
                    }
                }
            });
        }
    });

    $('#tblRolTalleres').on('click', 'a.consult', function () {

        $("#semilleroTaller").css({"border": "", "box-shadow": ""});
        $("#tipoTaller").css({"border": "", "box-shadow": ""});
        $("#nombreTaller").css({"border": "", "box-shadow": ""});
        $("#fechaTaller").css({"border": "", "box-shadow": ""});
        $("#idHabilidad").css({"border": "", "box-shadow": ""});
        $("#valorTaller").css({"border": "", "box-shadow": ""});
        $("#actividadInicial").css({"border": "", "box-shadow": ""});
        $("#actividadCentral").css({"border": "", "box-shadow": ""});
        $("#actividadFinal").css({"border": "", "box-shadow": ""});
        $("#tecnicaTaller").css({"border": "", "box-shadow": ""});
        $("#tipoActividad").css({"border": "", "box-shadow": ""});
        $("#estadoTaller").css({"border": "", "box-shadow": ""});

        var id = $(this).prop('title');
        $("#LoadingImage").show();
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlTalleres.php?opcion=2",
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
                    $("#tipoActividad").attr('disabled', 'disabled');
                    $("#estadoTaller").attr('disabled', 'disabled');
                    $("#observacionCancelacion").attr('disabled', 'disabled');
                    $("#objetivoTaller").attr('disabled', 'disabled');
                    $("#descripcionTaller").attr('disabled', 'disabled');
                    $("#logrosTaller").attr('disabled', 'disabled');
                    $("#dificultadesTaller").attr('disabled', 'disabled');
                    $("#recomendacionesTaller").attr('disabled', 'disabled');

                    $("#idTaller").val(data.row.IdTaller);
                    $("#tipoTaller").val(data.row.TipoTaller);
                    $("#nombreTaller").val(data.row.NombreTaller);
                    $("#fechaTaller").val(data.row.FechaTaller);

                    $("#idHabilidad").val(data.row.IdHabilidad);
                    Carga2('../Controller/ctrlCombos.php?opcion=2&habili=' + data.row.IdHabilidad, 'tecnicaTaller', data);

//                    $("#semilleroTaller").val(data.row.IdSemillero);
                    $("#valorTaller").val(data.row.ValorNuclear);
                    $("#actividadInicial").val(data.row.ActividadInicial);
                    $("#actividadCentral").val(data.row.ActividadCentral);
                    $("#actividadFinal").val(data.row.Actividadfinal);
                    $("#tecnicaTaller").val(data.row.IdTecnica);
                    $("#tipoActividad").val(data.row.TipoActividad);
                    $("#estadoTaller").val(data.row.EstadoTaller);
                    $("#observacionCancelacion").val(data.row.Observacion);
                    $("#objetivoTaller").val(data.row.Objetivo);
                    $("#descripcionTaller").val(data.row.DescripcionDeActividades);
                    $("#logrosTaller").val(data.row.Logros);
                    $("#dificultadesTaller").val(data.row.Dificultades);
                    $("#recomendacionesTaller").val(data.row.Recomendaciones);
                    $("#habilitarFechaLimiteTaller").val(data.row.FechaLimite);

                    var hoy = new Date().toJSON().slice(0, 10);

                    if (Date.parse(hoy) <= Date.parse(data.row.FechaLimite)) {
                        $("#modiTalleres").show();
                        $("#divFechaLimite").hide();
                    } else {

                        $("#habilitarFechaLimiteTaller").val(data.row.FechaLimite);
                        $("#modiTalleres").hide();
                        $("#divFechaLimite").show();
                    }
                    $("#saveTalleres").hide();
                    $("#updateTalleres").hide();

                }
            }
        });
    });

    $('#modiTalleres').click(function () {

        $("#semilleroTaller").removeAttr("disabled");
        $("#tipoTaller").removeAttr("disabled");
        $("#nombreTaller").removeAttr("disabled");
        $("#fechaTaller").removeAttr("disabled");
        $("#idHabilidad").removeAttr("disabled");
        $("#valorTaller").removeAttr("disabled");
        $("#actividadInicial").removeAttr("disabled");
        $("#actividadCentral").removeAttr("disabled");
        $("#actividadFinal").removeAttr("disabled");
        $("#tecnicaTaller").removeAttr("disabled");
        $("#tipoActividad").removeAttr("disabled");
        $("#estadoTaller").removeAttr("disabled");
        $("#observacionCancelacion").removeAttr("disabled");
        $("#objetivoTaller").removeAttr("disabled");
        $("#descripcionTaller").removeAttr("disabled");
        $("#logrosTaller").removeAttr("disabled");
        $("#dificultadesTaller").removeAttr("disabled");
        $("#recomendacionesTaller").removeAttr("disabled");

        $("#updateTalleres").show();
        $("#modiTalleres").hide();
    });

    $('#returnTalleres').click(function () {

        $("#semilleroTaller").removeAttr("disabled");
        $("#tipoTaller").removeAttr("disabled");
        $("#nombreTaller").removeAttr("disabled");
        $("#fechaTaller").removeAttr("disabled");
        $("#idHabilidad").removeAttr("disabled");
        $("#valorTaller").removeAttr("disabled");
        $("#actividadInicial").removeAttr("disabled");
        $("#actividadCentral").removeAttr("disabled");
        $("#actividadFinal").removeAttr("disabled");
        $("#tecnicaTaller").removeAttr("disabled");
        $("#tipoActividad").removeAttr("disabled");
        $("#estadoTaller").removeAttr("disabled");
        $("#observacionCancelacion").removeAttr("disabled");
        $("#objetivoTaller").removeAttr("disabled");
        $("#descripcionTaller").removeAttr("disabled");
        $("#logrosTaller").removeAttr("disabled");
        $("#dificultadesTaller").removeAttr("disabled");
        $("#recomendacionesTaller").removeAttr("disabled");

        $("#semilleroTaller").css({"border": "", "box-shadow": ""});
        $("#tipoTaller").css({"border": "", "box-shadow": ""});
        $("#nombreTaller").css({"border": "", "box-shadow": ""});
        $("#fechaTaller").css({"border": "", "box-shadow": ""});
        $("#idHabilidad").css({"border": "", "box-shadow": ""});
        $("#valorTaller").css({"border": "", "box-shadow": ""});
        $("#actividadInicial").css({"border": "", "box-shadow": ""});
        $("#actividadCentral").css({"border": "", "box-shadow": ""});
        $("#actividadFinal").css({"border": "", "box-shadow": ""});
        $("#tecnicaTaller").css({"border": "", "box-shadow": ""});
        $("#tipoActividad").css({"border": "", "box-shadow": ""});
        $("#estadoTaller").css({"border": "", "box-shadow": ""});

        $("#p1T").addClass('btn-success');
        $("#p2T").removeClass('btn-success');
        $("#paso1T").show();
        $("#paso2T").hide();

        $("#frmTaller").each(function () {
            this.reset();
        });

        $("#saveTalleres").show();
        $("#updateTalleres").hide();
        $("#modiTalleres").hide();
        $("#divFechaLimite").hide();
    });

    $('#updateTalleres').click(function () {

        validarPaso1Taller();

        if (Paso1Taller == false) {
            $("#LoadingImage").hide();
        } else {

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlTalleres.php?opcion=3",
                data: $("#frmTaller").serialize(),
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

                        $("#p1T").addClass('btn-success');
                        $("#p2T").removeClass('btn-success');
                        $("#paso1T").show();
                        $("#paso2T").hide();

                        $("#frmTaller").each(function () {
                            this.reset();
                        });

                        $("#saveTalleres").show();
                        $("#modiTalleres").hide();
                        $("#updateTalleres").hide();

                        var oTable = $('#tblRolTalleres').dataTable();
                        oTable.fnDestroy();
                        tablaTaller(idGlobalSemilleroTalleres);

                        $("#semilleroTallerD").val(idGlobalSemilleroTalleres);
                        $("#semilleroTaller").val(idGlobalSemilleroTalleres);
                    }
                }
            });
        }
    });

    $('#tblRolTalleres').on('click', 'a.assistance', function () {

        $("#LoadingImage").show();
        var id = $(this).prop('title');
//        var link = "visualizarAsistencia.php?idInstructor=" + id + "&trimestre=" + tri;
        var link = "visualizarAsistencia.php?taller=" + id;
        var left = (screen.width / 2) - (1024 / 2);
        var top = (screen.height / 2) - (800 / 2);
        $("#LoadingImage").hide();
        var ventana = window.open(link, 'mywindow', 'toolbar=0,titlebar=0,menubar=0,location=0,resizable=0,width=1024,height=800');
        ventana.focus();
        ventana.moveTo(left, top);
    });

    $('#saveAsistencia').click(function () {

        var cadena = "";
        var limite = $("#tamano").val();
        var bool = true;

        for (var i = 0; i < limite; i++) {

            if (document.getElementById('asistencia-' + i).checked || document.getElementById('asistencia2-' + i).checked 
                    || document.getElementById('asistencia3-' + i).checked || document.getElementById('asistencia4-' + i).checked) {

                cadena += $('input:radio[name=asistencia' + i + ']:checked').val() + ";";
                bool = true;
            } else {
                $("#LoadingImage").hide();
                var modal = $('#exampleconfirmacion');
                modal.find('.modal-title').text("Faltan Datos");
                modal.find('#modal-message').html("<div style='color: red'> No ha finalizado con la toma de asistencia de todos los participantes.</div>");
                $('#exampleconfirmacion').modal('show');

                i = 200;
                bool = false;
            }
        }

        if (bool == true) {

            $('#cadenaDeAsistencia').val(cadena);

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlTalleres.php?opcion=7",
                data: $("#frmAsistencia").serialize(),
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
                    }
                }
            });
        }
    });

    $('#modiDateTalleres').click(function () {

        $("#LoadingImage").show();
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlTalleres.php?opcion=8",
            data: $("#frmTaller").serialize(),
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

                    $("#modiTalleres").show();
                    $("#divFechaLimite").hide();
                }
            }
        });
    });

    $('#vaciarTalleres').click(function () {

        var hoy = new Date();
        var yyyy = hoy.getFullYear();

        var modal = $('#exampleLimpiarTalleres');
        modal.find('.modal-title').text("Eliminar Talleres del año " + (yyyy - 1));
        $('#exampleLimpiarTalleres').modal('show');
    });

    $('#deleteTalleresYear').click(function () {

        if ($('#contrasena').val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la contraseña de usuario Administrador. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#contrasena").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else {

            $("#contrasena").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlHistorialTalleres.php?opcion=1",
                data: $("#frmContrasenaEliminarTalleres").serialize(),
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

                        $("#frmContrasenaEliminarTalleres").each(function () {
                            this.reset();
                        });

                    }
                }
            });
        }
    });
});

function tablaTaller(semillero) {

    $('#tblRolTalleres').dataTable({
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
        "sAjaxSource": "Talleres/consultarDatosTablaTalleres.php?semillero=" + semillero,
        "order": [[3, "asc"]],
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

function tomaAsistencia(taller) {

    $.ajax({
        type: "POST",
        url: "../Controller/ctrlTalleres.php?opcion=6",
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
                    $("#nombreTaller").html(data.row.Taller);

                    var asistencia = data.row.Asistieron;
                    var VectorAsistencia = asistencia.split(";");
                    for (var i = 0; i < VectorAsistencia.length; i++) {

                        if (VectorAsistencia[i] === "1") {
                            $("#asistencia-" + i).prop('checked', 'checked');
                        } else if (VectorAsistencia[i] === "0") {
                            $("#asistencia2-" + i).prop('checked', 'checked');
                        } else if (VectorAsistencia[i] === "N.I") {
                            $("#asistencia3-" + i).prop('checked', 'checked');
                        } else if (VectorAsistencia[i] === "Ex") {
                            $("#asistencia4-" + i).prop('checked', 'checked');
                        }

                    }

                    var hoy = new Date().toJSON().slice(0, 10);

                    if (Date.parse(hoy) <= Date.parse(data.row.FechaLimite)) {
                        $("#saveAsistencia").show();
                    } else {
                        $("#saveAsistencia").hide();

                        for (var j = 0; j < VectorAsistencia.length; j++) {

                            $("#asistencia-" + j).attr('disabled', 'disabled');
                            $("#asistencia2-" + j).attr('disabled', 'disabled');
                            $("#asistencia3-" + j).attr('disabled', 'disabled');
                            $("#asistencia4-" + j).attr('disabled', 'disabled');

                        }
                    }

                }
            }
        }
    });
}

function validarPaso1Taller() {

    if ($('#semilleroTaller').val() == 0) {

        $("#tipoTaller").css({"border": "", "box-shadow": ""});
        $("#nombreTaller").css({"border": "", "box-shadow": ""});
        $("#fechaTaller").css({"border": "", "box-shadow": ""});
        $("#idHabilidad").css({"border": "", "box-shadow": ""});
        $("#valorTaller").css({"border": "", "box-shadow": ""});
        $("#actividadInicial").css({"border": "", "box-shadow": ""});
        $("#actividadCentral").css({"border": "", "box-shadow": ""});
        $("#actividadFinal").css({"border": "", "box-shadow": ""});
        $("#tecnicaTaller").css({"border": "", "box-shadow": ""});
        $("#tipoActividad").css({"border": "", "box-shadow": ""});
        $("#estadoTaller").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el semillero a que se le va realizar el taller. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#semilleroTaller").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        Paso1Taller = false;
    } else if ($('#tipoTaller').val() == 0) {

        $("#semilleroTaller").css({"border": "", "box-shadow": ""});
        $("#nombreTaller").css({"border": "", "box-shadow": ""});
        $("#fechaTaller").css({"border": "", "box-shadow": ""});
        $("#idHabilidad").css({"border": "", "box-shadow": ""});
        $("#valorTaller").css({"border": "", "box-shadow": ""});
        $("#actividadInicial").css({"border": "", "box-shadow": ""});
        $("#actividadCentral").css({"border": "", "box-shadow": ""});
        $("#actividadFinal").css({"border": "", "box-shadow": ""});
        $("#tecnicaTaller").css({"border": "", "box-shadow": ""});
        $("#tipoActividad").css({"border": "", "box-shadow": ""});
        $("#estadoTaller").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el tipo de taller. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#tipoTaller").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        Paso1Taller = false;
    } else if ($('#nombreTaller').val() === "") {

        $("#semilleroTaller").css({"border": "", "box-shadow": ""});
        $("#tipoTaller").css({"border": "", "box-shadow": ""});
        $("#nombreTaller").css({"border": "", "box-shadow": ""});
        $("#fechaTaller").css({"border": "", "box-shadow": ""});
        $("#idHabilidad").css({"border": "", "box-shadow": ""});
        $("#valorTaller").css({"border": "", "box-shadow": ""});
        $("#actividadInicial").css({"border": "", "box-shadow": ""});
        $("#actividadCentral").css({"border": "", "box-shadow": ""});
        $("#actividadFinal").css({"border": "", "box-shadow": ""});
        $("#tecnicaTaller").css({"border": "", "box-shadow": ""});
        $("#tipoActividad").css({"border": "", "box-shadow": ""});
        $("#estadoTaller").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese el nombre del taller a realizar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#nombreTaller").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        Paso1Taller = false;
    } else if ($('#fechaTaller').val() === "") {

        $("#semilleroTaller").css({"border": "", "box-shadow": ""});
        $("#tipoTaller").css({"border": "", "box-shadow": ""});
        $("#nombreTaller").css({"border": "", "box-shadow": ""});
        $("#fechaTaller").css({"border": "", "box-shadow": ""});
        $("#idHabilidad").css({"border": "", "box-shadow": ""});
        $("#valorTaller").css({"border": "", "box-shadow": ""});
        $("#actividadInicial").css({"border": "", "box-shadow": ""});
        $("#actividadCentral").css({"border": "", "box-shadow": ""});
        $("#actividadFinal").css({"border": "", "box-shadow": ""});
        $("#tecnicaTaller").css({"border": "", "box-shadow": ""});
        $("#tipoActividad").css({"border": "", "box-shadow": ""});
        $("#estadoTaller").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese la fecha en la que se realiza el taller. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#fechaTaller").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        Paso1Taller = false;
    } else if ($('#idHabilidad').val() == 0) {

        $("#semilleroTaller").css({"border": "", "box-shadow": ""});
        $("#tipoTaller").css({"border": "", "box-shadow": ""});
        $("#nombreTaller").css({"border": "", "box-shadow": ""});
        $("#fechaTaller").css({"border": "", "box-shadow": ""});
        $("#valorTaller").css({"border": "", "box-shadow": ""});
        $("#actividadInicial").css({"border": "", "box-shadow": ""});
        $("#actividadCentral").css({"border": "", "box-shadow": ""});
        $("#actividadFinal").css({"border": "", "box-shadow": ""});
        $("#tecnicaTaller").css({"border": "", "box-shadow": ""});
        $("#tipoActividad").css({"border": "", "box-shadow": ""});
        $("#estadoTaller").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione la habilidad a trabajar en el taller. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#idHabilidad").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        Paso1Taller = false;
    } else if ($('#valorTaller').val() == 0) {

        $("#semilleroTaller").css({"border": "", "box-shadow": ""});
        $("#tipoTaller").css({"border": "", "box-shadow": ""});
        $("#nombreTaller").css({"border": "", "box-shadow": ""});
        $("#fechaTaller").css({"border": "", "box-shadow": ""});
        $("#idHabilidad").css({"border": "", "box-shadow": ""});
        $("#actividadInicial").css({"border": "", "box-shadow": ""});
        $("#actividadCentral").css({"border": "", "box-shadow": ""});
        $("#actividadFinal").css({"border": "", "box-shadow": ""});
        $("#tecnicaTaller").css({"border": "", "box-shadow": ""});
        $("#tipoActividad").css({"border": "", "box-shadow": ""});
        $("#estadoTaller").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el valor que se va a trabajar en el taller. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#valorTaller").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        Paso1Taller = false;
    } else if ($('#actividadInicial').val() === "") {

        $("#semilleroTaller").css({"border": "", "box-shadow": ""});
        $("#tipoTaller").css({"border": "", "box-shadow": ""});
        $("#nombreTaller").css({"border": "", "box-shadow": ""});
        $("#fechaTaller").css({"border": "", "box-shadow": ""});
        $("#idHabilidad").css({"border": "", "box-shadow": ""});
        $("#valorTaller").css({"border": "", "box-shadow": ""});
        $("#actividadCentral").css({"border": "", "box-shadow": ""});
        $("#actividadFinal").css({"border": "", "box-shadow": ""});
        $("#tecnicaTaller").css({"border": "", "box-shadow": ""});
        $("#tipoActividad").css({"border": "", "box-shadow": ""});
        $("#estadoTaller").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese la descripción de la actividad inicial. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#actividadInicial").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        Paso1Taller = false;
    } else if ($('#actividadCentral').val() === "") {

        $("#semilleroTaller").css({"border": "", "box-shadow": ""});
        $("#tipoTaller").css({"border": "", "box-shadow": ""});
        $("#nombreTaller").css({"border": "", "box-shadow": ""});
        $("#fechaTaller").css({"border": "", "box-shadow": ""});
        $("#idHabilidad").css({"border": "", "box-shadow": ""});
        $("#valorTaller").css({"border": "", "box-shadow": ""});
        $("#actividadInicial").css({"border": "", "box-shadow": ""});
        $("#actividadFinal").css({"border": "", "box-shadow": ""});
        $("#tecnicaTaller").css({"border": "", "box-shadow": ""});
        $("#tipoActividad").css({"border": "", "box-shadow": ""});
        $("#estadoTaller").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese la descripción de la actividad central. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#actividadCentral").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        Paso1Taller = false;
    } else if ($('#actividadFinal').val() === "") {

        $("#semilleroTaller").css({"border": "", "box-shadow": ""});
        $("#tipoTaller").css({"border": "", "box-shadow": ""});
        $("#nombreTaller").css({"border": "", "box-shadow": ""});
        $("#fechaTaller").css({"border": "", "box-shadow": ""});
        $("#idHabilidad").css({"border": "", "box-shadow": ""});
        $("#valorTaller").css({"border": "", "box-shadow": ""});
        $("#actividadInicial").css({"border": "", "box-shadow": ""});
        $("#actividadCentral").css({"border": "", "box-shadow": ""});
        $("#tecnicaTaller").css({"border": "", "box-shadow": ""});
        $("#tipoActividad").css({"border": "", "box-shadow": ""});
        $("#estadoTaller").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese la descripción de la actividad final. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#actividadFinal").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        Paso1Taller = false;
    } else if ($('#tecnicaTaller').val() == 0) {

        $("#semilleroTaller").css({"border": "", "box-shadow": ""});
        $("#tipoTaller").css({"border": "", "box-shadow": ""});
        $("#nombreTaller").css({"border": "", "box-shadow": ""});
        $("#fechaTaller").css({"border": "", "box-shadow": ""});
        $("#idHabilidad").css({"border": "", "box-shadow": ""});
        $("#valorTaller").css({"border": "", "box-shadow": ""});
        $("#actividadInicial").css({"border": "", "box-shadow": ""});
        $("#actividadCentral").css({"border": "", "box-shadow": ""});
        $("#actividadFinal").css({"border": "", "box-shadow": ""});
        $("#tipoActividad").css({"border": "", "box-shadow": ""});
        $("#estadoTaller").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione la técnica con la que se va a trabajar en el taller. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#tecnicaTaller").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        Paso1Taller = false;
    } else if ($('#tipoActividad').val() === 0) {

        $("#semilleroTaller").css({"border": "", "box-shadow": ""});
        $("#tipoTaller").css({"border": "", "box-shadow": ""});
        $("#nombreTaller").css({"border": "", "box-shadow": ""});
        $("#fechaTaller").css({"border": "", "box-shadow": ""});
        $("#idHabilidad").css({"border": "", "box-shadow": ""});
        $("#valorTaller").css({"border": "", "box-shadow": ""});
        $("#actividadInicial").css({"border": "", "box-shadow": ""});
        $("#actividadCentral").css({"border": "", "box-shadow": ""});
        $("#actividadFinal").css({"border": "", "box-shadow": ""});
        $("#tecnicaTaller").css({"border": "", "box-shadow": ""});
        $("#estadoTaller").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione un tipo de actividad. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#tipoActividad").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        Paso1Taller = false;
    } else if ($('#estadoTaller').val() == 0) {

        $("#semilleroTaller").css({"border": "", "box-shadow": ""});
        $("#tipoTaller").css({"border": "", "box-shadow": ""});
        $("#nombreTaller").css({"border": "", "box-shadow": ""});
        $("#fechaTaller").css({"border": "", "box-shadow": ""});
        $("#idHabilidad").css({"border": "", "box-shadow": ""});
        $("#valorTaller").css({"border": "", "box-shadow": ""});
        $("#actividadInicial").css({"border": "", "box-shadow": ""});
        $("#actividadCentral").css({"border": "", "box-shadow": ""});
        $("#actividadFinal").css({"border": "", "box-shadow": ""});
        $("#tecnicaTaller").css({"border": "", "box-shadow": ""});
        $("#tipoActividad").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el estado del taller. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#estadoTaller").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        Paso1Taller = false;
    } else {

        $("#semilleroTaller").css({"border": "", "box-shadow": ""});
        $("#tipoTaller").css({"border": "", "box-shadow": ""});
        $("#nombreTaller").css({"border": "", "box-shadow": ""});
        $("#fechaTaller").css({"border": "", "box-shadow": ""});
        $("#idHabilidad").css({"border": "", "box-shadow": ""});
        $("#valorTaller").css({"border": "", "box-shadow": ""});
        $("#actividadInicial").css({"border": "", "box-shadow": ""});
        $("#actividadCentral").css({"border": "", "box-shadow": ""});
        $("#actividadFinal").css({"border": "", "box-shadow": ""});
        $("#tecnicaTaller").css({"border": "", "box-shadow": ""});
        $("#tipoActividad").css({"border": "", "box-shadow": ""});
        $("#estadoTaller").css({"border": "", "box-shadow": ""});

        Paso1Taller = true;
    }
}