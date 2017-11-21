$(document).ready(function () {

    $("#fechaNacimientoCEx").focusout(function (e) {

        $.ajax({
            type: "POST",
            url: "../Controller/ctrlHistoriaClinicaExternos.php?opcion=6",
            data: {fechaNacimiento: $('#fechaNacimientoCEx').val()},
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus + "\n" + errorThrown);
            },
            success: function (result) {
                var data = eval('(' + result + ')');

                $("#edadCEx").removeAttr("disabled");

                $("#edadCEx").val(data.result);
            }
        });
        e.preventDefault();
    });

    $("#paso2C").hide();
    $("#paso3C").hide();
    $("#paso4C").hide();

    $("#p1C").click(function (e) {
        $(this).addClass('btn-success');
        $("#p2C").removeClass('btn-success');
        $("#p3C").removeClass('btn-success');
        $("#p4C").removeClass('btn-success');
        $("#p5C").removeClass('btn-success');
        $("#paso1C").show();
        $("#paso2C").hide();
        $("#paso3C").hide();
        $("#paso4C").hide();
        $("#paso5C").hide();
        e.preventDefault();
    });

    $("#p2C").click(function (e) {

        if ($('#fechaIngresoCEx').val() === "" || $('#consecutivoCEx').val() === "" || $('#tipoDocumentoCEx').val() == 0 || $('#documentoCEx').val() === ""
                || $('#nombreCEx').val() === "" || $('#apellidoCEx').val() === "" || $('#ciudadNacimientoCEx').val() == 0 || $('#fechaNacimientoCEx').val() === ""
                || $('#edadCEx').val() === "" || (!document.getElementById('sexoCEx-0').checked && !document.getElementById('sexoCEx-1').checked)
                || $('#relacionFundacionCEx').val() === "" || $('#ocupacioInstitucionCEx').val() === "" || $('#gradoCEx').val() === "" || $('#ciudadResidenciaCEx').val() == 0
                || $('#direccionCEx').val() === "" || $('#barrioCEx').val() === "" || $('#telefonoCEx').val() === ""
                || (!document.getElementById('seguridadCEx-0').checked && !document.getElementById('seguridadCEx-1').checked)
                || (!document.getElementById('beneficiarioCEx-0').checked && !document.getElementById('beneficiarioCEx-1').checked)) {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe diligenciar todos los campos requeridos del paso 1 y luego dar clic en continuar para poder acceder al siguiente paso.</div>");
            $('#exampleconfirmacion').modal('show');
        } else {

            $(this).addClass('btn-success');
            $("#p1C").removeClass('btn-success');
            $("#p3C").removeClass('btn-success');
            $("#p4C").removeClass('btn-success');
            $("#p5C").removeClass('btn-success');
            $("#paso1C").hide();
            $("#paso2C").show();
            $("#paso3C").hide();
            $("#paso4C").hide();
            $("#paso5C").hide();
        }
        e.preventDefault();
    });

    $("#p3C").click(function (e) {

        if ($('#motivoCEx').val() === "" || $('#familiaresCEx').val() === "") {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe diligenciar todos los campos requeridos del paso 2 y luego dar clic en continuar para poder acceder al siguiente paso.</div>");
            $('#exampleconfirmacion').modal('show');
        } else {
            $(this).addClass('btn-success');
            $("#p1C").removeClass('btn-success');
            $("#p2C").removeClass('btn-success');
            $("#p4C").removeClass('btn-success');
            $("#p5C").removeClass('btn-success');
            $("#paso1C").hide();
            $("#paso2C").hide();
            $("#paso3C").show();
            $("#paso4C").hide();
            $("#paso5C").hide();
        }
        e.preventDefault();
    });

    $("#p4C").click(function (e) {

        if (!document.getElementById('estadoProcesoCEx-0').checked && !document.getElementById('estadoProcesoCEx-1').checked) {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe diligenciar todos los campos requeridos del paso 3 y luego dar clic en continuar para poder acceder al siguiente paso.</div>");
            $('#exampleconfirmacion').modal('show');
        } else if ($('#idConsultoriaExterno').val() === "") {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe dar clic en registrar consultoría y podra acceder al siguiente paso.</div>");
            $('#exampleconfirmacion').modal('show');
        } else {

            //línea de código que me permite obtener la fecha del sistema en el formato de HTML5
            var hoy = new Date().toJSON().slice(0, 10);

            $('#fechaConsultoriaEx').val(hoy);

            $(this).addClass('btn-success');
            $("#p1C").removeClass('btn-success');
            $("#p2C").removeClass('btn-success');
            $("#p3C").removeClass('btn-success');
            $("#p5C").removeClass('btn-success');
            $("#paso1C").hide();
            $("#paso2C").hide();
            $("#paso3C").hide();
            $("#paso4C").show();
            $("#paso5C").hide();
        }
        e.preventDefault();
    });

    $("#p5C").click(function (e) {

        if ($('#idConsultoriaExterno').val() === "") {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe registrar la consultoría y podra acceder a la carga de archivos.</div>");
            $('#exampleconfirmacion').modal('show');
        } else {

            $(this).addClass('btn-success');
            $("#p1C").removeClass('btn-success');
            $("#p2C").removeClass('btn-success');
            $("#p3C").removeClass('btn-success');
            $("#p4C").removeClass('btn-success');
            $("#paso1C").hide();
            $("#paso2C").hide();
            $("#paso3C").hide();
            $("#paso4C").hide();
            $("#paso5C").show();
        }
        e.preventDefault();
    });

    $('#buscarHistoriaCEx').click(function () {

        $("#LoadingImage").show();

        var consecutivo = $('#consecutivoCEx').val();

        $.ajax({
            type: "POST",
            url: "../Controller/ctrlHistoriaClinicaExternos.php?opcion=1",
            data: {tipoRegistro: $('#tipoRegistroConsultoriaEx').val(), consecutivo: $('#consecutivoCEx').val()},
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

                    $("#consecutivoCEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

                } else if (data.res === 'new') {

                    $("#LoadingImage").hide();
                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text("Nueva Asesoría");
                    modal.find('#modal-message').html(data.msg);
                    $('#exampleconfirmacion').modal('show');

                    $("#frmConsultoriaExterno").each(function () {
                        this.reset();
                    });

                    $("#edadCEx").attr('disabled', 'disabled');
                    $("#motivoRemisioneCEx").attr('disabled', 'disabled');

                    //línea de código que me permite obtener la fecha del sistema en el formato de HTML5
                    var hoy = new Date().toJSON().slice(0, 10);

                    $("#consecutivoCEx").css({"border": "", "box-shadow": ""});

                    $("#nombreTipo").html("<h3>Nuevo Registro de Consultoría</h3>");

                    $("#fechaIngresoCEx").val(hoy);
                    $('#consecutivoCEx').val(consecutivo);
                    $('#documentoCEx').val(consecutivo);

                    $("#saveConsultoria").show();
                    $("#updateConsultoria").hide();

                } else if (data.res === 'exis') {

                    $("#frmConsultoriaExterno").each(function () {
                        this.reset();
                    });

                    $("#consecutivoCEx").css({"border": "", "box-shadow": ""});

                    $("#nombreTipo").html("<h3>Registro de la Consultoría</h3>");

                    $("#idConsultoriaExterno").val(data.row.IdHistoriaExterno);
                    $("#tipoRegistroAsesoriaCEx").val(data.row.TipoRegistro);
                    $("#fechaIngresoCEx").val(data.row.FechaIngreso);
                    $("#consecutivoCEx").val(data.row.Consecutivo);

                    if (data.row.Beneficiario === "ADULTO") {
                        $("#beneficiarioCEx-0").prop('checked', 'checked');
                    } else if (data.row.Beneficiario === "NIÑO") {
                        $("#beneficiarioCEx-1").prop('checked', 'checked');
                    }

                    $("#tipoDocumentoCEx").val(data.row.TipoDocumento);
                    $("#documentoCEx").val(data.row.Documento);
                    $("#nombreCEx").val(data.row.Nombres);
                    $("#apellidoCEx").val(data.row.Apellidos);
                    $("#departamentoNacimientoCEx").val(data.row.IdDepartamentoNacimiento);
                    Carga2('../Controller/ctrlCombos.php?opcion=1&depar=' + data.row.IdDepartamentoNacimiento, 'ciudadNacimientoCEx', data);

                    $("#fechaNacimientoCEx").val(data.row.FechaNacimiento);

                    $("#edadCEx").removeAttr("disabled");
                    $("#edadCEx").val(data.row.Edad);

                    if (data.row.Sexo === "MASCULINO") {
                        $("#sexoCEx-0").prop('checked', 'checked');
                    } else if (data.row.Sexo === "FEMENINO") {
                        $("#sexoCEx-1").prop('checked', 'checked');
                    }

                    $("#relacionFundacionCEx").val(data.row.RelacionFundacion);
                    $("#ocupacioInstitucionCEx").val(data.row.Ocupacio_Institucion);
                    $("#gradoCEx").val(data.row.GradoEscolar);
                    $("#departamentoResidenciaCEx").val(data.row.IdDepartamentoResidencia);
                    Carga2('../Controller/ctrlCombos.php?opcion=1&depar=' + data.row.IdDepartamentoResidencia, 'ciudadResidenciaCEx', data);

                    $("#direccionCEx").val(data.row.IdMunicipioResidencia);
                    $("#barrioCEx").val(data.row.Barrio);
                    $("#telefonoCEx").val(data.row.Telefono);
                    $("#telefono2CEx").val(data.row.Telefono2);

                    if (data.row.TipoDeSeguridad === "CONTRIBUTIVO (EPS)") {
                        $("#seguridadCEx-0").prop('checked', 'checked');
                    } else if (data.row.TipoDeSeguridad === "SUBSIDIADO (SISBEN)") {
                        $("#seguridadCEx-1").prop('checked', 'checked');
                    }

                    $("#entidadCEx").val(data.row.Eps);
                    $("#motivoCEx").val(data.row.MotivoConsulta);
                    $("#antecedentesCEx").val(data.row.AntecedentesFamiliares);
                    $("#familiaresCEx").val(data.row.ConformacionFamiliar);

                    $("#conflictosCEx").val(data.row.Conflictos);
                    $("#metasCEx").val(data.row.MetasTerapeuticas);
                    $("#logrosCEx").val(data.row.Logros);
                    $("#pruebasCEx").val(data.row.PruebasAplicadas);

                    var remision = data.row.Remisiones;
                    var VectorRemision = remision.split(";");
                    for (var i = 0; i < VectorRemision.length; i++) {

                        var PD = $("input:checkbox[name='remisionCEx[]'][value='" + VectorRemision[i] + "']");
                        $(PD).prop("checked", "checked");
                    }

                    if ($("#remisionCEx-5").is(':checked')) {
                        $("#motivoRemisioneCEx").removeAttr("disabled");
                    } else {
                        $("#motivoRemisioneCEx").attr('disabled', 'disabled');
                    }

                    $("#motivoRemisioneCEx").val(data.row.MotivoRemisiones);

                    var finalizo = data.row.Finalizacion;
                    var VectorFinalizo = finalizo.split(";");
                    for (var i = 0; i < VectorRemision.length; i++) {

                        var PD = $("input:checkbox[name='finalizoCEx[]'][value='" + VectorFinalizo[i] + "']");
                        $(PD).prop("checked", "checked");
                    }

                    if (data.row.EstadoProceso === "Activo") {
                        $("#estadoProcesoCEx-0").prop('checked', 'checked');
                    } else if (data.row.EstadoProceso === "Cerrado") {
                        $("#estadoProcesoCEx-1").prop('checked', 'checked');
                    }

                    $("#saveConsultoria").hide();
                    $("#updateConsultoria").show();
                    $("#divLimpiarConsultoria").show();

                    var oTable = $('#tblRolSeguimientoC').dataTable();
                    oTable.fnDestroy();

                    tablaSeguimientosConsultoria(data.row.IdHistoriaExterno);

                    var oTable = $('#tblRolArchivosConsultoria').dataTable();
                    oTable.fnDestroy();

                    tablaArchivosConsultoria(data.row.IdHistoriaExterno);
                }
            }
        });
    });

    $('#continue1CEx').click(function () {

        validarDatosPaso1ConsultoriaExterno();

        if (datosPaso1ConsultoriaExterno == false) {
            $("#LoadingImage").hide();
        } else {

            $("#fechaIngresoCEx").css({"border": "", "box-shadow": ""});
            $("#consecutivoCEx").css({"border": "", "box-shadow": ""});
            $("#tipoDocumentoCEx").css({"border": "", "box-shadow": ""});
            $("#documentoCEx").css({"border": "", "box-shadow": ""});
            $("#nombreCEx").css({"border": "", "box-shadow": ""});
            $("#apellidoCEx").css({"border": "", "box-shadow": ""});
            $("#departamentoNacimientoCEx").css({"border": "", "box-shadow": ""});
            $("#ciudadNacimientoCEx").css({"border": "", "box-shadow": ""});
            $("#fechaNacimientoCEx").css({"border": "", "box-shadow": ""});
            $("#edadCEx").css({"border": "", "box-shadow": ""});
            $("#sexoCEx-0").css({"border": "", "box-shadow": ""});
            $("#sexoCEx-1").css({"border": "", "box-shadow": ""});
            $("#relacionFundacionCEx").css({"border": "", "box-shadow": ""});
            $("#ocupacioInstitucionCEx").css({"border": "", "box-shadow": ""});
            $("#gradoCEx").css({"border": "", "box-shadow": ""});
            $("#departamentoResidenciaCEx").css({"border": "", "box-shadow": ""});
            $("#ciudadResidenciaCEx").css({"border": "", "box-shadow": ""});
            $("#direccionCEx").css({"border": "", "box-shadow": ""});
            $("#barrioCEx").css({"border": "", "box-shadow": ""});
            $("#telefonoCEx").css({"border": "", "box-shadow": ""});
            $("#seguridadCEx-0").css({"border": "", "box-shadow": ""});
            $("#seguridadCEx-1").css({"border": "", "box-shadow": ""});
            $("#entidadCEx").css({"border": "", "box-shadow": ""});
            $("#beneficiarioCEx-0").css({"border": "", "box-shadow": ""});
            $("#beneficiarioCEx-1").css({"border": "", "box-shadow": ""});

            $("#p2C").addClass('btn-success');
            $("#p1C").removeClass('btn-success');
            $("#p3C").removeClass('btn-success');
            $("#p4C").removeClass('btn-success');
            $("#p5C").removeClass('btn-success');
            $("#paso1C").hide();
            $("#paso2C").show();
            $("#paso3C").hide();
            $("#paso4C").hide();
            $("#paso5C").hide();
        }
    });

    $('#continue2CEx').click(function () {

        validarDatosPaso2ConsultoriaExterno()

        if (datosPaso2ConsultoriaExterno == false) {
            $("#LoadingImage").hide();
        } else {

            $("#p3C").addClass('btn-success');
            $("#p1C").removeClass('btn-success');
            $("#p2C").removeClass('btn-success');
            $("#p4C").removeClass('btn-success');
            $("#p5C").removeClass('btn-success');
            $("#paso1C").hide();
            $("#paso2C").hide();
            $("#paso3C").show();
            $("#paso4C").hide();
            $("#paso5C").hide();
        }
    });

    $('#remisionCEx-5').change(function () {
        if ($(this).is(':checked')) {
            $("#motivoRemisioneCEx").removeAttr("disabled");
        } else {
            $("#motivoRemisioneCEx").attr('disabled', 'disabled');
        }
    });

    $('#saveConsultoria').click(function () {

        validarDatosPaso3ConsultoriaExterno();

        if (datosPaso3ConsultoriaExterno == false) {
            $("#LoadingImage").hide();
        } else {

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlHistoriaClinicaExternos.php?opcion=3",
                data: $("#frmConsultoriaExterno").serialize(),
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

                        $("#idConsultoriaExterno").val(data.row.IdHistoriaExterno);

                        $("#LoadingImage").hide();
                        var modal = $('#exampleconfirmacion');
                        modal.find('.modal-title').text("Registro exitoso.");
                        modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + " </div>");
                        $('#exampleconfirmacion').modal('show');

                        //línea de código que me permite obtener la fecha del sistema en el formato de HTML5
                        var hoy = new Date().toJSON().slice(0, 10);

                        $('#fechaConsultoriaEx').val(hoy);

                        $("#p4C").addClass('btn-success');
                        $("#p1C").removeClass('btn-success');
                        $("#p2C").removeClass('btn-success');
                        $("#p3C").removeClass('btn-success');
                        $("#p5C").removeClass('btn-success');
                        $("#paso1C").hide();
                        $("#paso2C").hide();
                        $("#paso3C").hide();
                        $("#paso4C").show();
                        $("#paso5C").hide();

                        var oTable = $('#tblRol1').dataTable();
                        oTable.fnDestroy();

                        tabla();

                        var oTable = $('#tblRol2').dataTable();
                        oTable.fnDestroy();

                        tabla2();

                        $("#saveConsultoria").hide();
                        $("#updateConsultoria").show();
                        $("#divLimpiarConsultoria").show();

                        var oTable = $('#tblRolSeguimientoC').dataTable();
                        oTable.fnDestroy();

                        tablaSeguimientosConsultoria(data.row.IdHistoriaExterno);

                        var oTable = $('#tblRolArchivosConsultoria').dataTable();
                        oTable.fnDestroy();

                        tablaArchivosConsultoria(data.row.IdHistoriaExterno);
                    }
                }
            });
        }
    });

    $('#updateConsultoria').click(function () {

        validarDatosPaso3ConsultoriaExterno();

        if (datosPaso3ConsultoriaExterno == false) {
            $("#LoadingImage").hide();
        } else {

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlHistoriaClinicaExternos.php?opcion=5",
                data: $("#frmConsultoriaExterno").serialize(),
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

                        //línea de código que me permite obtener la fecha del sistema en el formato de HTML5
                        var hoy = new Date().toJSON().slice(0, 10);

                        $('#fechaConsultoriaEx').val(hoy);

                        var oTable = $('#tblRol1').dataTable();
                        oTable.fnDestroy();

                        tabla();

                        var oTable = $('#tblRol2').dataTable();
                        oTable.fnDestroy();

                        tabla2();
                    }
                }
            });
        }
    });

    $('#saveSeguimientoCEx').click(function () {

        if ($('#fechaConsultoriaEx').val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la fecha en la que se le realiza el seguimiento. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#fechaConsultoriaEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#observacionConsultoriaEx').val() === "") {

            $("#fechaConsultoriaEx").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la observación del seguimiento. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#observacionConsultoriaEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else {

            $("#fechaConsultoriaEx").css({"border": "", "box-shadow": ""});
            $("#observacionConsultoriaEx").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlSeguimientoSesionExterno.php?opcion=4",
                data: $("#frmConsultoriaExterno").serialize(),
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

                        $('#observacionConsultoriaEx').val("");

                        var oTable = $('#tblRolSeguimientoC').dataTable();
                        oTable.fnDestroy();

                        tablaSeguimientosConsultoria($('#idConsultoriaExterno').val());
                    }
                }
            });
        }
    });

    $('#tblRolSeguimientoC').on('click', 'a.consult', function () {

        $("#LoadingImage").show();

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlSeguimientoSesionExterno.php?opcion=2",
            data: {idSeguimiento: id},
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

                    $("#idSeguimientoCEx").val(data.row.IdSeguimientoExterno);
                    $("#fechaConsultoriaEx").val(data.row.FechaSeguimientoSesion);
                    $("#observacionConsultoriaEx").val(data.row.Observaciones);

                    $("#saveSeguimientoCEx").hide();
                    $("#updateSeguimientoCEx").show();
                }
            }
        });
    });

    $('#clearCampoCEx').click(function () {

        $("#fechaConsultoriaEx").css({"border": "", "box-shadow": ""});
        $("#observacionConsultoriaEx").css({"border": "", "box-shadow": ""});

        //línea de código que me permite obtener la fecha del sistema en el formato de HTML5
        var hoy = new Date().toJSON().slice(0, 10);

        $('#fechaConsultoriaEx').val(hoy);

        $('#observacionConsultoriaEx').val("");

        $("#saveSeguimientoCEx").show();
        $("#updateSeguimientoCEx").hide();
    });

    $('#updateSeguimientoCEx').click(function () {

        if ($('#fechaConsultoriaEx').val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la fecha en la que se le realiza el seguimiento. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#fechaConsultoriaEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#observacionConsultoriaEx').val() === "") {

            $("#fechaConsultoriaEx").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la observación del seguimiento. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#observacionConsultoriaEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else {

            $("#fechaConsultoriaEx").css({"border": "", "box-shadow": ""});
            $("#observacionConsultoriaEx").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlSeguimientoSesionExterno.php?opcion=5",
                data: $("#frmConsultoriaExterno").serialize(),
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

                        $('#observacionConsultoriaEx').val("");

                        var oTable = $('#tblRolSeguimientoC').dataTable();
                        oTable.fnDestroy();

                        tablaSeguimientosConsultoria($('#idConsultoriaExterno').val());
                    }
                }
            });
        }
    });

    $("#enviarArchivoConsultoriaEx").click(function (e) {

        var file_data = $("#frmArchivosConsultoriaEx").find('[name="archivoConsultoriaEx"]').prop('files')[0];

        var hoy = new Date().toJSON().slice(0, 10);

        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('lider', $("#idConsultoriaExterno").val());
        form_data.append('fecha', hoy);
        form_data.append('descripcion', $("#descripcionConsultoriaEx").val());
        form_data.append('folder', "RemisionesExterno");

        if (typeof file_data === "undefined" || $("#descripcionConsultoriaEx").val() === "") {

            $("#LoadingImage").hide();
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text('Error en la carga');
            modal.find('#modal-message').html("<div style='color: red'> Verifique que haya seleccionado un archivo y/o ingrese la descripción. </div>");
            $('#exampleconfirmacion').modal('show');
        } else {

            var fileNameArchivo = file_data.name;
            var extD = fileNameArchivo.substring(fileNameArchivo.lastIndexOf('.') + 1);

            if (file_data.size > 2000000 || (extD !== "pdf" && extD !== "PDF" && extD !== "png" && extD !== "PNG" && extD !== "jpg" && extD !== "JPG" && extD !== "jpeg" && extD !== "JPEG")) {
                $("#LoadingImage").hide();
                var modal = $('#exampleconfirmacion');
                modal.find('.modal-title').text('Error en la carga');
                modal.find('#modal-message').html("<div style='color: red'> Verifique que el archivo seleccionado cumpla con el formato indicado y el tamaño máximo especificado. Favor ver las especificaciones sugeridas al principio de esta página\nGracias. </div>");
                $('#exampleconfirmacion').modal('show');
            } else {

                $.ajax({
                    url: '../Controller/ctrlArchivosHistoriaExternos.php?opcion=1', // point to server-side PHP script 
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
                            modal.find('#modal-message').html("<div style='color: red'>" + data.msg + " Favor ver las especificaciones sugeridas al principio de esta página\nGracias </div>");
                            $('#exampleconfirmacion').modal('show');
                        } else if (data.res === 'all') {
                            $("#LoadingImage").hide();
                            var modal = $('#exampleconfirmacion');
                            modal.find('.modal-title').text('Carga Exitosa');
                            modal.find('#modal-message').html("<div style='color: #009d48'> La Inserción fue exitosa y " + data.msg + ". \nGracias </div>");
                            $('#exampleconfirmacion').modal('show');

                            $("#frmArchivosConsultoriaEx").each(function () {
                                this.reset();
                            });

                            var oTable = $('#tblRolArchivosConsultoria').dataTable();
                            oTable.fnReloadAjax();
                            tablaArchivosConsultoria($('#idConsultoriaExterno').val());
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
    });

    $('#tblRolArchivosConsultoria').on('click', 'a.delete', function () {

        $("#LoadingImage").show();

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlArchivosHistoriaExternos.php?opcion=2",
            data: {idArchivo: id},
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
                    modal.find('.modal-title').text("El archvio fue eliminado");
                    modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + "</div>");
                    $('#exampleconfirmacion').modal('show');

                    var oTable = $('#tblRolArchivosConsultoria').dataTable();
                    oTable.fnReloadAjax();
                    tablaArchivosConsultoria($('#idConsultoriaExterno').val());
                }
            }
        });
    });

    $('#clearConsultoria').click(function () {

        $("#frmHistoriaMedica").each(function () {
            this.reset();
        });

        $("#frmConsultoriaExterno").each(function () {
            this.reset();
        });

        $("#nombreTipo").html("<h3>Asesorías y Consultorías</h3>");

        $("#historialExterno").hide();
        $("#consultoriaExterno").hide();
        $("#divLimpiarAsesoria").hide();
        $("#listadoHistoriasExterno").show();
    });
});

function validarDatosPaso1ConsultoriaExterno() {

    if ($('#fechaIngresoCEx').val() === "") {

        $("#consecutivoCEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoCEx").css({"border": "", "box-shadow": ""});
        $("#documentoCEx").css({"border": "", "box-shadow": ""});
        $("#nombreCEx").css({"border": "", "box-shadow": ""});
        $("#apellidoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#edadCEx").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacionCEx").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucionCEx").css({"border": "", "box-shadow": ""});
        $("#gradoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#direccionCEx").css({"border": "", "box-shadow": ""});
        $("#barrioCEx").css({"border": "", "box-shadow": ""});
        $("#telefonoCEx").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadCEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la fecha que se realiza la atención y seguimiento psocológico. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#fechaIngresoCEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1ConsultoriaExterno = false;
    } else if ($('#consecutivoCEx').val() === "") {

        $("#fechaIngresoCEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoCEx").css({"border": "", "box-shadow": ""});
        $("#documentoCEx").css({"border": "", "box-shadow": ""});
        $("#nombreCEx").css({"border": "", "box-shadow": ""});
        $("#apellidoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#edadCEx").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacionCEx").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucionCEx").css({"border": "", "box-shadow": ""});
        $("#gradoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#direccionCEx").css({"border": "", "box-shadow": ""});
        $("#barrioCEx").css({"border": "", "box-shadow": ""});
        $("#telefonoCEx").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadCEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el consecutivo de la consultoría y de clic en el boton buscar ficha socio familiar para buscar consultoría. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#consecutivoCEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1ConsultoriaExterno = false;
    } else if ($('#tipoDocumentoCEx').val() == 0) {

        $("#fechaIngresoCEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoCEx").css({"border": "", "box-shadow": ""});
        $("#documentoCEx").css({"border": "", "box-shadow": ""});
        $("#nombreCEx").css({"border": "", "box-shadow": ""});
        $("#apellidoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#edadCEx").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacionCEx").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucionCEx").css({"border": "", "box-shadow": ""});
        $("#gradoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#direccionCEx").css({"border": "", "box-shadow": ""});
        $("#barrioCEx").css({"border": "", "box-shadow": ""});
        $("#telefonoCEx").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadCEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el tipo de documento de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#tipoDocumentoCEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1ConsultoriaExterno = false;
    } else if ($('#documentoCEx').val() === "") {

        $("#fechaIngresoCEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoCEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoCEx").css({"border": "", "box-shadow": ""});
        $("#nombreCEx").css({"border": "", "box-shadow": ""});
        $("#apellidoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#edadCEx").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacionCEx").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucionCEx").css({"border": "", "box-shadow": ""});
        $("#gradoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#direccionCEx").css({"border": "", "box-shadow": ""});
        $("#barrioCEx").css({"border": "", "box-shadow": ""});
        $("#telefonoCEx").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadCEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el numero de documento de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#documentoCEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1ConsultoriaExterno = false;
    } else if ($('#nombreCEx').val() === "") {

        $("#fechaIngresoCEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoCEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoCEx").css({"border": "", "box-shadow": ""});
        $("#documentoCEx").css({"border": "", "box-shadow": ""});
        $("#apellidoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#edadCEx").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacionCEx").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucionCEx").css({"border": "", "box-shadow": ""});
        $("#gradoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#direccionCEx").css({"border": "", "box-shadow": ""});
        $("#barrioCEx").css({"border": "", "box-shadow": ""});
        $("#telefonoCEx").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadCEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el nombre de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#nombreCEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1ConsultoriaExterno = false;
    } else if ($('#apellidoCEx').val() === "") {

        $("#fechaIngresoCEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoCEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoCEx").css({"border": "", "box-shadow": ""});
        $("#documentoCEx").css({"border": "", "box-shadow": ""});
        $("#nombreCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#edadCEx").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacionCEx").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucionCEx").css({"border": "", "box-shadow": ""});
        $("#gradoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#direccionCEx").css({"border": "", "box-shadow": ""});
        $("#barrioCEx").css({"border": "", "box-shadow": ""});
        $("#telefonoCEx").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadCEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese los apellidos de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#apellidoCEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1ConsultoriaExterno = false;
    } else if ($('#departamentoNacimientoCEx').val() == 0) {

        $("#fechaIngresoCEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoCEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoCEx").css({"border": "", "box-shadow": ""});
        $("#documentoCEx").css({"border": "", "box-shadow": ""});
        $("#nombreCEx").css({"border": "", "box-shadow": ""});
        $("#apellidoCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#edadCEx").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacionCEx").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucionCEx").css({"border": "", "box-shadow": ""});
        $("#gradoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#direccionCEx").css({"border": "", "box-shadow": ""});
        $("#barrioCEx").css({"border": "", "box-shadow": ""});
        $("#telefonoCEx").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadCEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el Departamento de nacimiento de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#departamentoNacimientoCEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1ConsultoriaExterno = false;
    } else if ($('#ciudadNacimientoCEx').val() == 0) {

        $("#fechaIngresoCEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoCEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoCEx").css({"border": "", "box-shadow": ""});
        $("#documentoCEx").css({"border": "", "box-shadow": ""});
        $("#nombreCEx").css({"border": "", "box-shadow": ""});
        $("#apellidoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#edadCEx").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacionCEx").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucionCEx").css({"border": "", "box-shadow": ""});
        $("#gradoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#direccionCEx").css({"border": "", "box-shadow": ""});
        $("#barrioCEx").css({"border": "", "box-shadow": ""});
        $("#telefonoCEx").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadCEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el Municipio de nacimiento de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#ciudadNacimientoCEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1ConsultoriaExterno = false;
    } else if ($('#fechaNacimientoCEx').val() === "") {

        $("#fechaIngresoCEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoCEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoCEx").css({"border": "", "box-shadow": ""});
        $("#documentoCEx").css({"border": "", "box-shadow": ""});
        $("#nombreCEx").css({"border": "", "box-shadow": ""});
        $("#apellidoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#edadCEx").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacionCEx").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucionCEx").css({"border": "", "box-shadow": ""});
        $("#gradoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#direccionCEx").css({"border": "", "box-shadow": ""});
        $("#barrioCEx").css({"border": "", "box-shadow": ""});
        $("#telefonoCEx").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadCEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la fecha de nacimiento de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#fechaNacimientoCEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1ConsultoriaExterno = false;
    } else if ($('#edadCEx').val() === "") {

        $("#fechaIngresoCEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoCEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoCEx").css({"border": "", "box-shadow": ""});
        $("#documentoCEx").css({"border": "", "box-shadow": ""});
        $("#nombreCEx").css({"border": "", "box-shadow": ""});
        $("#apellidoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacionCEx").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucionCEx").css({"border": "", "box-shadow": ""});
        $("#gradoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#direccionCEx").css({"border": "", "box-shadow": ""});
        $("#barrioCEx").css({"border": "", "box-shadow": ""});
        $("#telefonoCEx").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadCEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la edad de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#edadCEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1ConsultoriaExterno = false;
    } else if (!document.getElementById('sexoCEx-0').checked && !document.getElementById('sexoCEx-1').checked) {

        $("#fechaIngresoCEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoCEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoCEx").css({"border": "", "box-shadow": ""});
        $("#documentoCEx").css({"border": "", "box-shadow": ""});
        $("#nombreCEx").css({"border": "", "box-shadow": ""});
        $("#apellidoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#edadCEx").css({"border": "", "box-shadow": ""});
        $("#relacionFundacionCEx").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucionCEx").css({"border": "", "box-shadow": ""});
        $("#gradoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#direccionCEx").css({"border": "", "box-shadow": ""});
        $("#barrioCEx").css({"border": "", "box-shadow": ""});
        $("#telefonoCEx").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadCEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el sexo de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#sexoCEx-0").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        $("#sexoCEx-1").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1ConsultoriaExterno = false;
    } else if ($('#relacionFundacionCEx').val() === "") {

        $("#fechaIngresoCEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoCEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoCEx").css({"border": "", "box-shadow": ""});
        $("#documentoCEx").css({"border": "", "box-shadow": ""});
        $("#nombreCEx").css({"border": "", "box-shadow": ""});
        $("#apellidoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#edadCEx").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-1").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucionCEx").css({"border": "", "box-shadow": ""});
        $("#gradoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#direccionCEx").css({"border": "", "box-shadow": ""});
        $("#barrioCEx").css({"border": "", "box-shadow": ""});
        $("#telefonoCEx").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadCEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese que relación tiene con la fundación. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#relacionFundacionCEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1ConsultoriaExterno = false;
    } else if ($('#ocupacioInstitucionCEx').val() === "") {

        $("#fechaIngresoCEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoCEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoCEx").css({"border": "", "box-shadow": ""});
        $("#documentoCEx").css({"border": "", "box-shadow": ""});
        $("#nombreCEx").css({"border": "", "box-shadow": ""});
        $("#apellidoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#edadCEx").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacionCEx").css({"border": "", "box-shadow": ""});
        $("#gradoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#direccionCEx").css({"border": "", "box-shadow": ""});
        $("#barrioCEx").css({"border": "", "box-shadow": ""});
        $("#telefonoCEx").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadCEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la ocupación o Institución con la que tiene relación. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#ocupacioInstitucionCEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1ConsultoriaExterno = false;
    } else if ($('#gradoCEx').val() === "") {

        $("#fechaIngresoCEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoCEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoCEx").css({"border": "", "box-shadow": ""});
        $("#documentoCEx").css({"border": "", "box-shadow": ""});
        $("#nombreCEx").css({"border": "", "box-shadow": ""});
        $("#apellidoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#edadCEx").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacionCEx").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucionCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#direccionCEx").css({"border": "", "box-shadow": ""});
        $("#barrioCEx").css({"border": "", "box-shadow": ""});
        $("#telefonoCEx").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadCEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el grado de escolaridad de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#gradoCEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1ConsultoriaExterno = false;
    } else if ($('#departamentoResidenciaCEx').val() == 0) {

        $("#fechaIngresoCEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoCEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoCEx").css({"border": "", "box-shadow": ""});
        $("#documentoCEx").css({"border": "", "box-shadow": ""});
        $("#nombreCEx").css({"border": "", "box-shadow": ""});
        $("#apellidoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#edadCEx").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacionCEx").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucionCEx").css({"border": "", "box-shadow": ""});
        $("#gradoCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#direccionCEx").css({"border": "", "box-shadow": ""});
        $("#barrioCEx").css({"border": "", "box-shadow": ""});
        $("#telefonoCEx").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadCEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el Departamento de residencia de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#departamentoResidenciaCEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1ConsultoriaExterno = false;
    } else if ($('#ciudadResidenciaCEx').val() == 0) {

        $("#fechaIngresoCEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoCEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoCEx").css({"border": "", "box-shadow": ""});
        $("#documentoCEx").css({"border": "", "box-shadow": ""});
        $("#nombreCEx").css({"border": "", "box-shadow": ""});
        $("#apellidoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#edadCEx").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacionCEx").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucionCEx").css({"border": "", "box-shadow": ""});
        $("#gradoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#direccionCEx").css({"border": "", "box-shadow": ""});
        $("#barrioCEx").css({"border": "", "box-shadow": ""});
        $("#telefonoCEx").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadCEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el Municipio de residencia. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#ciudadResidenciaCEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1ConsultoriaExterno = false;
    } else if ($('#direccionCEx').val() === "") {

        $("#fechaIngresoCEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoCEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoCEx").css({"border": "", "box-shadow": ""});
        $("#documentoCEx").css({"border": "", "box-shadow": ""});
        $("#nombreCEx").css({"border": "", "box-shadow": ""});
        $("#apellidoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#edadCEx").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacionCEx").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucionCEx").css({"border": "", "box-shadow": ""});
        $("#gradoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaCEx").css({"border": "", "box-shadow": ""})
        $("#barrioCEx").css({"border": "", "box-shadow": ""});
        $("#telefonoCEx").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadCEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la dirección de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#direccionCEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1ConsultoriaExterno = false;
    } else if ($('#barrioCEx').val() === "") {

        $("#fechaIngresoCEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoCEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoCEx").css({"border": "", "box-shadow": ""});
        $("#documentoCEx").css({"border": "", "box-shadow": ""});
        $("#nombreCEx").css({"border": "", "box-shadow": ""});
        $("#apellidoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#edadCEx").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacionCEx").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucionCEx").css({"border": "", "box-shadow": ""});
        $("#gradoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#direccionCEx").css({"border": "", "box-shadow": ""});
        $("#telefonoCEx").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadCEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el barrio de residencia de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#barrioCEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1ConsultoriaExterno = false;
    } else if ($('#telefonoCEx').val() === "") {

        $("#fechaIngresoCEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoCEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoCEx").css({"border": "", "box-shadow": ""});
        $("#documentoCEx").css({"border": "", "box-shadow": ""});
        $("#nombreCEx").css({"border": "", "box-shadow": ""});
        $("#apellidoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#edadCEx").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacionCEx").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucionCEx").css({"border": "", "box-shadow": ""});
        $("#gradoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#direccionCEx").css({"border": "", "box-shadow": ""});
        $("#barrioCEx").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadCEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el teléfono de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#telefonoCEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1ConsultoriaExterno = false;
    } else if (!document.getElementById('seguridadCEx-0').checked && !document.getElementById('seguridadCEx-1').checked) {

        $("#fechaIngresoCEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoCEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoCEx").css({"border": "", "box-shadow": ""});
        $("#documentoCEx").css({"border": "", "box-shadow": ""});
        $("#nombreCEx").css({"border": "", "box-shadow": ""});
        $("#apellidoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#edadCEx").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacionCEx").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucionCEx").css({"border": "", "box-shadow": ""});
        $("#gradoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#direccionCEx").css({"border": "", "box-shadow": ""});
        $("#barrioCEx").css({"border": "", "box-shadow": ""});
        $("#telefonoCEx").css({"border": "", "box-shadow": ""});
        $("#entidadCEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el tipo de seguridad social de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#seguridadCEx-0").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        $("#seguridadCEx-1").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1ConsultoriaExterno = false;
    } else if (!document.getElementById('beneficiarioCEx-0').checked && !document.getElementById('beneficiarioCEx-1').checked) {

        $("#fechaIngresoCEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoCEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoCEx").css({"border": "", "box-shadow": ""});
        $("#documentoCEx").css({"border": "", "box-shadow": ""});
        $("#nombreCEx").css({"border": "", "box-shadow": ""});
        $("#apellidoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#edadCEx").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacionCEx").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucionCEx").css({"border": "", "box-shadow": ""});
        $("#gradoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#direccionCEx").css({"border": "", "box-shadow": ""});
        $("#barrioCEx").css({"border": "", "box-shadow": ""});
        $("#telefonoCEx").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadCEx").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el beneficiaro de la asesoria psicológico. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#beneficiarioCEx-0").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        $("#beneficiarioCEx-1").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1ConsultoriaExterno = false;
    } else {

        $("#fechaIngresoCEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoCEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoCEx").css({"border": "", "box-shadow": ""});
        $("#documentoCEx").css({"border": "", "box-shadow": ""});
        $("#nombreCEx").css({"border": "", "box-shadow": ""});
        $("#apellidoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoCEx").css({"border": "", "box-shadow": ""});
        $("#edadCEx").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoCEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacionCEx").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucionCEx").css({"border": "", "box-shadow": ""});
        $("#gradoCEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaCEx").css({"border": "", "box-shadow": ""});
        $("#direccionCEx").css({"border": "", "box-shadow": ""});
        $("#barrioCEx").css({"border": "", "box-shadow": ""});
        $("#telefonoCEx").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadCEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadCEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioCEx-1").css({"border": "", "box-shadow": ""});

        datosPaso1ConsultoriaExterno = true;
    }
}

function validarDatosPaso2ConsultoriaExterno() {

    if ($('#motivoCEx').val() === "") {

        $("#familiaresCEx").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese el motivo de la consultoría. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#motivoCEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso2ConsultoriaExterno = false;
    } else if ($('#familiaresCEx').val() === "") {

        $("#motivoCEx").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese la conformación familiar de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#familiaresCEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso2ConsultoriaExterno = false;
    } else {

        $("#motivoCEx").css({"border": "", "box-shadow": ""});
        $("#familiaresCEx").css({"border": "", "box-shadow": ""});

        datosPaso2ConsultoriaExterno = true;
    }
}

function validarDatosPaso3ConsultoriaExterno() {

    if (!document.getElementById('estadoProcesoCEx-0').checked && !document.getElementById('estadoProcesoCEx-1').checked) {

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el estado en el que se encuentra el proceso. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#estadoProcesoCEx-0").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        $("#estadoProcesoCEx-1").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso3ConsultoriaExterno = false;
    } else {

        $("#estadoProcesoCEx-0").css({"border": "", "box-shadow": ""});
        $("#estadoProcesoCEx-1").css({"border": "", "box-shadow": ""});

        datosPaso3ConsultoriaExterno = true;
    }
}

function tablaSeguimientosConsultoria(consecutivo) {

    $('#tblRolSeguimientoC').dataTable({
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
        "sAjaxSource": "HistoriaClinicaInternos/consultarDatosTablaSeguimiento.php?consecutivo=" + encodeURIComponent(consecutivo),
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

function tablaArchivosConsultoria(consecutivo) {

    $('#tblRolArchivosConsultoria').dataTable({
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
        "sAjaxSource": "HistoriaClinicaInternos/consultarDatosTablaArchivos.php?consecutivo=" + encodeURIComponent(consecutivo),
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