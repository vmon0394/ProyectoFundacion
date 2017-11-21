$(document).ready(function () {

    $("#fechaNacimientoEx").focusout(function (e) {

        $.ajax({
            type: "POST",
            url: "../Controller/ctrlHistoriaClinicaExternos.php?opcion=6",
            data: {fechaNacimiento: $('#fechaNacimientoEx').val()},
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus + "\n" + errorThrown);
            },
            success: function (result) {
                var data = eval('(' + result + ')');

                $("#edadEx").removeAttr("disabled");

                $("#edadEx").val(data.result);
            }
        });
        e.preventDefault();
    });

    $("#paso2").hide();
    $("#paso3").hide();
    $("#paso4").hide();
    $("#paso5").hide();

    $("#p1").click(function (e) {
        $(this).addClass('btn-success');
        $("#p2").removeClass('btn-success');
        $("#p3").removeClass('btn-success');
        $("#p4").removeClass('btn-success');
        $("#p5").removeClass('btn-success');
        $("#p6").removeClass('btn-success');
        $("#paso1").show();
        $("#paso2").hide();
        $("#paso3").hide();
        $("#paso4").hide();
        $("#paso5").hide();
        $("#paso6").hide();
        e.preventDefault();
    });

    $("#p2").click(function (e) {

        if ($('#fechaIngresoEx').val() === "" || $('#consecutivoEx').val() === "" || $('#tipoDocumentoEx').val() == 0 || $('#documentoEx').val() === ""
                || $('#nombreEx').val() === "" || $('#apellidoEx').val() === "" || $('#ciudadNacimiento').val() == 0 || $('#fechaNacimientoEx').val() === ""
                || $('#edadEx').val() === "" || (!document.getElementById('sexoEx-0').checked && !document.getElementById('sexoEx-1').checked)
                || $('#relacionFundacion').val() === "" || $('#ocupacioInstitucion').val() === "" || $('#gradoEx').val() === "" || $('#ciudadResidencia').val() == 0
                || $('#direccionEx').val() === "" || $('#barrioEx').val() === "" || $('#telefonoEx').val() === ""
                || (!document.getElementById('seguridadEx-0').checked && !document.getElementById('seguridadEx-1').checked) 
                || (!document.getElementById('beneficiarioEx-0').checked && !document.getElementById('beneficiarioEx-1').checked)) {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe diligenciar todos los campos requeridos del paso 1 y luego dar clic en continuar para poder acceder al siguiente paso.</div>");
            $('#exampleconfirmacion').modal('show');
        } else {

            $(this).addClass('btn-success');
            $("#p1").removeClass('btn-success');
            $("#p3").removeClass('btn-success');
            $("#p4").removeClass('btn-success');
            $("#p5").removeClass('btn-success');
            $("#p6").removeClass('btn-success');
            $("#paso1").hide();
            $("#paso2").show();
            $("#paso3").hide();
            $("#paso4").hide();
            $("#paso5").hide();
            $("#paso6").hide();
        }
        e.preventDefault();
    });

    $("#p3").click(function (e) {

        if ($('#motivoEx').val() === "" || $('#familiaresEx').val() === "") {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe diligenciar todos los campos requeridos del paso 2 y luego dar clic en continuar para poder acceder al siguiente paso.</div>");
            $('#exampleconfirmacion').modal('show');
        } else {
            $(this).addClass('btn-success');
            $("#p1").removeClass('btn-success');
            $("#p2").removeClass('btn-success');
            $("#p4").removeClass('btn-success');
            $("#p5").removeClass('btn-success');
            $("#p6").removeClass('btn-success');
            $("#paso1").hide();
            $("#paso2").hide();
            $("#paso3").show();
            $("#paso4").hide();
            $("#paso5").hide();
            $("#paso6").hide();
        }
        e.preventDefault();
    });

    $("#p4").click(function (e) {
        $(this).addClass('btn-success');
        $("#p1").removeClass('btn-success');
        $("#p2").removeClass('btn-success');
        $("#p3").removeClass('btn-success');
        $("#p5").removeClass('btn-success');
        $("#p6").removeClass('btn-success');
        $("#paso1").hide();
        $("#paso2").hide();
        $("#paso3").hide();
        $("#paso4").show();
        $("#paso5").hide();
        $("#paso6").hide();
        e.preventDefault();
    });

    $("#p5").click(function (e) {

        if (!document.getElementById('estadoProcesoEx-0').checked && !document.getElementById('estadoProcesoEx-1').checked) {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe diligenciar todos los campos requeridos del paso 4 y luego dar clic en continuar para poder acceder al siguiente paso.</div>");
            $('#exampleconfirmacion').modal('show');
        } else if ($('#idAsesoriaExterno').val() === "") {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe dar clic en registrar asesoría y podra acceder al siguiente paso.</div>");
            $('#exampleconfirmacion').modal('show');
        } else {

            //línea de código que me permite obtener la fecha del sistema en el formato de HTML5
            var hoy = new Date().toJSON().slice(0, 10);

            $('#fechaSeguimientoEx').val(hoy);

            $(this).addClass('btn-success');
            $("#p1").removeClass('btn-success');
            $("#p2").removeClass('btn-success');
            $("#p3").removeClass('btn-success');
            $("#p4").removeClass('btn-success');
            $("#p6").removeClass('btn-success');
            $("#paso1").hide();
            $("#paso2").hide();
            $("#paso3").hide();
            $("#paso4").hide();
            $("#paso5").show();
            $("#paso6").hide();
        }
        e.preventDefault();
    });

    $("#p6").click(function (e) {

        if ($('#idAsesoriaExterno').val() === "") {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe registrar la asesoría y podra acceder a la carga de archivos.</div>");
            $('#exampleconfirmacion').modal('show');
        } else {
            $(this).addClass('btn-success');
            $("#p1").removeClass('btn-success');
            $("#p2").removeClass('btn-success');
            $("#p3").removeClass('btn-success');
            $("#p4").removeClass('btn-success');
            $("#p5").removeClass('btn-success');
            $("#paso1").hide();
            $("#paso2").hide();
            $("#paso3").hide();
            $("#paso4").hide();
            $("#paso5").hide();
            $("#paso6").show();
        }
        e.preventDefault();
    });

    $('#buscarHistoria').click(function () {

        $("#LoadingImage").show();

        var consecutivo = $('#consecutivoEx').val();

        $.ajax({
            type: "POST",
            url: "../Controller/ctrlHistoriaClinicaExternos.php?opcion=1",
            data: {tipoRegistro: $('#tipoRegistroAsesoriaEx').val(), consecutivo: $('#consecutivoEx').val()},
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

                    $("#consecutivoEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

                } else if (data.res === 'new') {

                    $("#LoadingImage").hide();
                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text("Nueva Asesoría");
                    modal.find('#modal-message').html(data.msg);
                    $('#exampleconfirmacion').modal('show');

                    $("#frmAsesoriaExterno").each(function () {
                        this.reset();
                    });

                    $("#edadEx").attr('disabled', 'disabled');
                    $("#motivoRemisioneEx").attr('disabled', 'disabled');

                    //línea de código que me permite obtener la fecha del sistema en el formato de HTML5
                    var hoy = new Date().toJSON().slice(0, 10);

                    $("#consecutivoEx").css({"border": "", "box-shadow": ""});

                    $("#nombreTipo").html("<h3>Nuevo Registro de Asesoría</h3>");

                    $("#fechaIngresoEx").val(hoy);
                    $('#consecutivoEx').val(consecutivo);
                    $('#documentoEx').val(consecutivo);

                    $("#saveAsesoria").show();
                    $("#updateAsesoria").hide();                    

                } else if (data.res === 'exis') {

                    $("#frmAsesoriaExterno").each(function () {
                        this.reset();
                    });

                    $("#consecutivoEx").css({"border": "", "box-shadow": ""});

                    $("#nombreTipo").html("<h3>Registro de la Asesoría</h3>");

                    $("#idAsesoriaExterno").val(data.row.IdHistoriaExterno);
                    $("#tipoRegistroAsesoriaEx").val(data.row.TipoRegistro);
                    $("#fechaIngresoEx").val(data.row.FechaIngreso);
                    $("#consecutivoEx").val(data.row.Consecutivo);

                    if (data.row.Beneficiario === "ADULTO") {
                        $("#beneficiarioEx-0").prop('checked', 'checked');
                    } else if (data.row.Beneficiario === "NIÑO") {
                        $("#beneficiarioEx-1").prop('checked', 'checked');
                    }

                    $("#tipoDocumentoEx").val(data.row.TipoDocumento);
                    $("#documentoEx").val(data.row.Documento);
                    $("#nombreEx").val(data.row.Nombres);
                    $("#apellidoEx").val(data.row.Apellidos);
                    $("#departamentoNacimiento").val(data.row.IdDepartamentoNacimiento);
                    Carga2('../Controller/ctrlCombos.php?opcion=1&depar=' + data.row.IdDepartamentoNacimiento, 'ciudadNacimiento', data);

                    $("#fechaNacimientoEx").val(data.row.FechaNacimiento);

                    $("#edadEx").removeAttr("disabled");
                    $("#edadEx").val(data.row.Edad);

                    if (data.row.Sexo === "MASCULINO") {
                        $("#sexoEx-0").prop('checked', 'checked');
                    } else if (data.row.Sexo === "FEMENINO") {
                        $("#sexoEx-1").prop('checked', 'checked');
                    }

                    $("#relacionFundacion").val(data.row.RelacionFundacion);
                    $("#ocupacioInstitucion").val(data.row.Ocupacio_Institucion);
                    $("#gradoEx").val(data.row.GradoEscolar);
                    $("#departamentoResidencia").val(data.row.IdDepartamentoResidencia);
                    Carga2('../Controller/ctrlCombos.php?opcion=1&depar=' + data.row.IdDepartamentoResidencia, 'ciudadResidencia', data);

                    $("#direccionEx").val(data.row.IdMunicipioResidencia);
                    $("#barrioEx").val(data.row.Barrio);
                    $("#telefonoEx").val(data.row.Telefono);
                    $("#telefono2Ex").val(data.row.Telefono2);

                    if (data.row.TipoDeSeguridad === "CONTRIBUTIVO (EPS)") {
                        $("#seguridadEx-0").prop('checked', 'checked');
                    } else if (data.row.TipoDeSeguridad === "SUBSIDIADO (SISBEN)") {
                        $("#seguridadEx-1").prop('checked', 'checked');
                    }

                    $("#entidadEx").val(data.row.Eps);
                    $("#motivoEx").val(data.row.MotivoConsulta);
                    $("#antecedentesEx").val(data.row.AntecedentesFamiliares);
                    $("#familiaresEx").val(data.row.ConformacionFamiliar);

                    $("#conflictosEx").val(data.row.Conflictos);
                    $("#metasEx").val(data.row.MetasTerapeuticas);
                    $("#logrosEx").val(data.row.Logros);
                    $("#pruebasEx").val(data.row.PruebasAplicadas);

                    var remision = data.row.Remisiones;
                    var VectorRemision = remision.split(";");
                    for (var i = 0; i < VectorRemision.length; i++) {

                        var PD = $("input:checkbox[name='remisionEx[]'][value='" + VectorRemision[i] + "']");
                        $(PD).prop("checked", "checked");
                    }

                    if ($("#remisionEx-5").is(':checked')) {
                        $("#motivoRemisioneEx").removeAttr("disabled");
                    } else {
                        $("#motivoRemisioneEx").attr('disabled', 'disabled');
                    }

                    $("#motivoRemisioneEx").val(data.row.MotivoRemisiones);

                    var finalizo = data.row.Finalizacion;
                    var VectorFinalizo = finalizo.split(";");
                    for (var i = 0; i < VectorRemision.length; i++) {

                        var PD = $("input:checkbox[name='finalizoEx[]'][value='" + VectorFinalizo[i] + "']");
                        $(PD).prop("checked", "checked");
                    }

                    if (data.row.EstadoProceso === "Activo") {
                        $("#estadoProcesoEx-0").prop('checked', 'checked');
                    } else if (data.row.EstadoProceso === "Cerrado") {
                        $("#estadoProcesoEx-1").prop('checked', 'checked');
                    }

                    $("#saveAsesoria").hide();
                    $("#updateAsesoria").show();
                    $("#divLimpiarAsesoria").show();

                    var oTable = $('#tblRolSeguimiento').dataTable();
                    oTable.fnDestroy();

                    tablaSeguimientosAsesorias(data.row.IdHistoriaExterno);

                    var oTable = $('#tblRolArchivosAsesorias').dataTable();
                    oTable.fnDestroy();

                    tablaArchivosAsesorias(data.row.IdHistoriaExterno);
                }
            }
        });
    });

    $('#continue1').click(function () {

        validarDatosPaso1AsesoriasExterno();

        if (datosPaso1AsesoriasExterno == false) {
            $("#LoadingImage").hide();
        } else {

            $("#fechaIngresoEx").css({"border": "", "box-shadow": ""});
            $("#consecutivoEx").css({"border": "", "box-shadow": ""});
            $("#tipoDocumentoEx").css({"border": "", "box-shadow": ""});
            $("#documentoEx").css({"border": "", "box-shadow": ""});
            $("#nombreEx").css({"border": "", "box-shadow": ""});
            $("#apellidoEx").css({"border": "", "box-shadow": ""});
            $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
            $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
            $("#fechaNacimientoEx").css({"border": "", "box-shadow": ""});
            $("#edadEx").css({"border": "", "box-shadow": ""});
            $("#sexoEx-0").css({"border": "", "box-shadow": ""});
            $("#sexoEx-1").css({"border": "", "box-shadow": ""});
            $("#relacionFundacion").css({"border": "", "box-shadow": ""});
            $("#ocupacioInstitucion").css({"border": "", "box-shadow": ""});
            $("#gradoEx").css({"border": "", "box-shadow": ""});
            $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
            $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
            $("#direccionEx").css({"border": "", "box-shadow": ""});
            $("#barrioEx").css({"border": "", "box-shadow": ""});
            $("#telefonoEx").css({"border": "", "box-shadow": ""});
            $("#seguridadEx-0").css({"border": "", "box-shadow": ""});
            $("#seguridadEx-1").css({"border": "", "box-shadow": ""});
            $("#entidadEx").css({"border": "", "box-shadow": ""});
            $("#beneficiarioEx-0").css({"border": "", "box-shadow": ""});
            $("#beneficiarioEx-1").css({"border": "", "box-shadow": ""});

            $("#p2").addClass('btn-success');
            $("#p1").removeClass('btn-success');
            $("#p3").removeClass('btn-success');
            $("#p4").removeClass('btn-success');
            $("#p5").removeClass('btn-success');
            $("#p5").removeClass('btn-success');
            $("#paso1").hide();
            $("#paso2").show();
            $("#paso3").hide();
            $("#paso4").hide();
            $("#paso5").hide();
            $("#paso6").hide();
        }
    });

    $('#continue2').click(function () {

        validarDatosPaso2AsesoriasExterno();

        if (datosPaso2AsesoriasExterno == false) {
            $("#LoadingImage").hide();
        } else {

            $("#p3").addClass('btn-success');
            $("#p1").removeClass('btn-success');
            $("#p2").removeClass('btn-success');
            $("#p4").removeClass('btn-success');
            $("#p5").removeClass('btn-success');
            $("#p6").removeClass('btn-success');
            $("#paso1").hide();
            $("#paso2").hide();
            $("#paso3").show();
            $("#paso4").hide();
            $("#paso5").hide();
            $("#paso5").hide();
        }
    });

    $('#continue3').click(function () {
        $('#p4').addClass('btn-success');
        $("#p1").removeClass('btn-success');
        $("#p2").removeClass('btn-success');
        $("#p3").removeClass('btn-success');
        $("#p5").removeClass('btn-success');
        $("#p6").removeClass('btn-success');
        $("#paso1").hide();
        $("#paso2").hide();
        $("#paso3").hide();
        $("#paso4").show();
        $("#paso5").hide();
        $("#paso6").hide();
    });

    $('#remisionEx-5').change(function () {
        if ($(this).is(':checked')) {
            $("#motivoRemisioneEx").removeAttr("disabled");
        } else {
            $("#motivoRemisioneEx").attr('disabled', 'disabled');
        }
    });

    $('#saveAsesoria').click(function () {

        validarDatosPaso4AsesoriasExterno();

        if (datosPaso4AsesoriasExterno == false) {
            $("#LoadingImage").hide();
        } else {

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlHistoriaClinicaExternos.php?opcion=2",
                data: $("#frmAsesoriaExterno").serialize(),
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

                        $("#idAsesoriaExterno").val(data.row.IdHistoriaExterno);

                        $("#LoadingImage").hide();
                        var modal = $('#exampleconfirmacion');
                        modal.find('.modal-title').text("Registro exitoso.");
                        modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + " </div>");
                        $('#exampleconfirmacion').modal('show');

                        //línea de código que me permite obtener la fecha del sistema en el formato de HTML5
                        var hoy = new Date().toJSON().slice(0, 10);

                        $('#fechaSeguimientoEx').val(hoy);

                        $("#p5").addClass('btn-success');
                        $("#p1").removeClass('btn-success');
                        $("#p2").removeClass('btn-success');
                        $("#p3").removeClass('btn-success');
                        $("#p4").removeClass('btn-success');
                        $("#p6").removeClass('btn-success');
                        $("#paso1").hide();
                        $("#paso2").hide();
                        $("#paso3").hide();
                        $("#paso4").hide();
                        $("#paso5").show();
                        $("#paso6").hide();

                        var oTable = $('#tblRol1').dataTable();
                        oTable.fnDestroy();

                        tabla();

                        var oTable = $('#tblRol2').dataTable();
                        oTable.fnDestroy();

                        tabla2();

                        $("#saveAsesoria").hide();
                        $("#updateAsesoria").show();
                        $("#divLimpiarAsesoria").show();

                        var oTable = $('#tblRolSeguimiento').dataTable();
                        oTable.fnDestroy();

                        tablaSeguimientosAsesorias(data.row.IdHistoriaExterno);

                        var oTable = $('#tblRolArchivosAsesorias').dataTable();
                        oTable.fnDestroy();

                        tablaArchivosAsesorias(data.row.IdHistoriaExterno);
                    }
                }
            });
        }
    });

    $('#updateAsesoria').click(function () {

        validarDatosPaso4AsesoriasExterno();

        if (datosPaso4AsesoriasExterno == false) {
            $("#LoadingImage").hide();
        } else {

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlHistoriaClinicaExternos.php?opcion=4",
                data: $("#frmAsesoriaExterno").serialize(),
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

                        //línea de código que me permite obtener la fecha del sistema en el formato de HTML5
                        var hoy = new Date().toJSON().slice(0, 10);

                        $('#fechaSeguimientoEx').val(hoy);

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

    $('#saveSeguimiento').click(function () {

        if ($('#fechaSeguimientoEx').val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la fecha en la que se le realiza el seguimiento. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#fechaSeguimientoEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#observacionSeguimientoEx').val() === "") {

            $("#fechaSeguimientoEx").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la observación del seguimiento. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#observacionSeguimientoEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else {

            $("#fechaSeguimientoEx").css({"border": "", "box-shadow": ""});
            $("#observacionSeguimientoEx").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlSeguimientoSesionExterno.php?opcion=1",
                data: $("#frmAsesoriaExterno").serialize(),
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

                        $('#observacionSeguimientoEx').val("");

                        var oTable = $('#tblRolSeguimiento').dataTable();
                        oTable.fnDestroy();

                        tablaSeguimientosAsesorias($('#idAsesoriaExterno').val());
                    }
                }
            });
        }
    });

    $('#tblRolSeguimiento').on('click', 'a.consult', function () {

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

                    $("#fechaSeguimientoEx").css({"border": "", "box-shadow": ""});
                    $("#observacionSeguimientoEx").css({"border": "", "box-shadow": ""});

                    $("#idSeguimientoEx").val(data.row.IdSeguimientoExterno);
                    $("#fechaSeguimientoEx").val(data.row.FechaSeguimientoSesion);
                    $("#observacionSeguimientoEx").val(data.row.Observaciones);

                    $("#saveSeguimiento").hide();
                    $("#updateSeguimiento").show();
                }
            }
        });
    });

    $('#clearCampo').click(function () {

        $("#fechaSeguimientoEx").css({"border": "", "box-shadow": ""});
        $("#observacionSeguimientoEx").css({"border": "", "box-shadow": ""});

        //línea de código que me permite obtener la fecha del sistema en el formato de HTML5
        var hoy = new Date().toJSON().slice(0, 10);

        $('#fechaSeguimientoEx').val(hoy);

        $('#observacionSeguimientoEx').val("");

        $("#saveSeguimiento").show();
        $("#updateSeguimiento").hide();
    });

    $('#updateSeguimiento').click(function () {

        if ($('#fechaSeguimientoEx').val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la fecha en la que se le realiza el seguimiento. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#fechaSeguimientoEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#observacionSeguimientoEx').val() === "") {

            $("#fechaSeguimiento").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la observación del seguimiento. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#observacionSeguimientoEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else {

            $("#fechaSeguimientoEx").css({"border": "", "box-shadow": ""});
            $("#observacionSeguimientoEx").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlSeguimientoSesionExterno.php?opcion=3",
                data: $("#frmAsesoriaExterno").serialize(),
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

                        $('#observacionSeguimientoEx').val("");

                        var oTable = $('#tblRolSeguimiento').dataTable();
                        oTable.fnDestroy();

                        tablaSeguimientosAsesorias($('#idAsesoriaExterno').val());

                        $("#saveSeguimiento").show();
                        $("#updateSeguimiento").hide();
                    }
                }
            });
        }
    });

    $("#enviarArchivoAsesoriaEx").click(function (e) {

        var file_data = $("#frmArchivosAsesoriaEx").find('[name="archivoAsesoriaEx"]').prop('files')[0];

        var hoy = new Date().toJSON().slice(0, 10);

        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('lider', $("#idAsesoriaExterno").val());
        form_data.append('fecha', hoy);
        form_data.append('descripcion', $("#descripcionEx").val());
        form_data.append('folder', "RemisionesExterno");

        if (typeof file_data === "undefined" || $("#descripcionEx").val() === "") {

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

                            $("#frmArchivosAsesoriaEx").each(function () {
                                this.reset();
                            });

                            var oTable = $('#tblRolArchivosAsesorias').dataTable();
                            oTable.fnReloadAjax();
                            tablaArchivosAsesorias($('#idAsesoriaExterno').val());
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

    $('#tblRolArchivosAsesorias').on('click', 'a.delete', function () {

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

                    var oTable = $('#tblRolArchivosAsesorias').dataTable();
                    oTable.fnDestroy();
                    tablaArchivosAsesorias($('#idAsesoriaExterno').val());
                }
            }
        });
    });

    $('#clearAsesoria').click(function () {

        $("#frmHistoriaMedica").each(function () {
            this.reset();
        });

        $("#frmAsesoriaExterno").each(function () {
            this.reset();
        });

        $("#nombreTipo").html("<h3>Asesorías y Consultorías</h3>");

        $("#historialExterno").hide();
        $("#consultoriaExterno").hide();
        $("#divLimpiarAsesoria").hide();
        $("#listadoHistoriasExterno").show();
    });
});

function validarDatosPaso1AsesoriasExterno() {

    if ($('#fechaIngresoEx').val() === "") {

        $("#consecutivoEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoEx").css({"border": "", "box-shadow": ""});
        $("#documentoEx").css({"border": "", "box-shadow": ""});
        $("#nombreEx").css({"border": "", "box-shadow": ""});
        $("#apellidoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoEx").css({"border": "", "box-shadow": ""});
        $("#edadEx").css({"border": "", "box-shadow": ""});
        $("#sexoEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacion").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucion").css({"border": "", "box-shadow": ""});
        $("#gradoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#direccionEx").css({"border": "", "box-shadow": ""});
        $("#barrioEx").css({"border": "", "box-shadow": ""});
        $("#telefonoEx").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la fecha que se realiza la atención y seguimiento psocológico. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#fechaIngresoEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1AsesoriasExterno = false;
    } else if ($('#consecutivoEx').val() === "") {

        $("#fechaIngresoEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoEx").css({"border": "", "box-shadow": ""});
        $("#documentoEx").css({"border": "", "box-shadow": ""});
        $("#nombreEx").css({"border": "", "box-shadow": ""});
        $("#apellidoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoEx").css({"border": "", "box-shadow": ""});
        $("#edadEx").css({"border": "", "box-shadow": ""});
        $("#sexoEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacion").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucion").css({"border": "", "box-shadow": ""});
        $("#gradoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#direccionEx").css({"border": "", "box-shadow": ""});
        $("#barrioEx").css({"border": "", "box-shadow": ""});
        $("#telefonoEx").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el consecutivo de la asesoría y de clic en el boton buscar ficha socio familiar para buscar asesoría. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#consecutivoEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1AsesoriasExterno = false;
    } else if ($('#tipoDocumentoEx').val() == 0) {

        $("#fechaIngresoEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoEx").css({"border": "", "box-shadow": ""});
        $("#documentoEx").css({"border": "", "box-shadow": ""});
        $("#nombreEx").css({"border": "", "box-shadow": ""});
        $("#apellidoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoEx").css({"border": "", "box-shadow": ""});
        $("#edadEx").css({"border": "", "box-shadow": ""});
        $("#sexoEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacion").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucion").css({"border": "", "box-shadow": ""});
        $("#gradoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#direccionEx").css({"border": "", "box-shadow": ""});
        $("#barrioEx").css({"border": "", "box-shadow": ""});
        $("#telefonoEx").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el tipo de documento de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#tipoDocumentoEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1AsesoriasExterno = false;
    } else if ($('#documentoEx').val() === "") {

        $("#fechaIngresoEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoEx").css({"border": "", "box-shadow": ""});
        $("#nombreEx").css({"border": "", "box-shadow": ""});
        $("#apellidoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoEx").css({"border": "", "box-shadow": ""});
        $("#edadEx").css({"border": "", "box-shadow": ""});
        $("#sexoEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacion").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucion").css({"border": "", "box-shadow": ""});
        $("#gradoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#direccionEx").css({"border": "", "box-shadow": ""});
        $("#barrioEx").css({"border": "", "box-shadow": ""});
        $("#telefonoEx").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el numero de documento de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#documentoEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1AsesoriasExterno = false;
    } else if ($('#nombreEx').val() === "") {

        $("#fechaIngresoEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoEx").css({"border": "", "box-shadow": ""});
        $("#documentoEx").css({"border": "", "box-shadow": ""});
        $("#apellidoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoEx").css({"border": "", "box-shadow": ""});
        $("#edadEx").css({"border": "", "box-shadow": ""});
        $("#sexoEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacion").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucion").css({"border": "", "box-shadow": ""});
        $("#gradoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#direccionEx").css({"border": "", "box-shadow": ""});
        $("#barrioEx").css({"border": "", "box-shadow": ""});
        $("#telefonoEx").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el nombre de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#nombreEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1AsesoriasExterno = false;
    } else if ($('#apellidoEx').val() === "") {

        $("#fechaIngresoEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoEx").css({"border": "", "box-shadow": ""});
        $("#documentoEx").css({"border": "", "box-shadow": ""});
        $("#nombreEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoEx").css({"border": "", "box-shadow": ""});
        $("#edadEx").css({"border": "", "box-shadow": ""});
        $("#sexoEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacion").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucion").css({"border": "", "box-shadow": ""});
        $("#gradoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#direccionEx").css({"border": "", "box-shadow": ""});
        $("#barrioEx").css({"border": "", "box-shadow": ""});
        $("#telefonoEx").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese los apellidos de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#apellidoEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1AsesoriasExterno = false;
    } else if ($('#departamentoNacimiento').val() == 0) {

        $("#fechaIngresoEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoEx").css({"border": "", "box-shadow": ""});
        $("#documentoEx").css({"border": "", "box-shadow": ""});
        $("#nombreEx").css({"border": "", "box-shadow": ""});
        $("#apellidoEx").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoEx").css({"border": "", "box-shadow": ""});
        $("#edadEx").css({"border": "", "box-shadow": ""});
        $("#sexoEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacion").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucion").css({"border": "", "box-shadow": ""});
        $("#gradoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#direccionEx").css({"border": "", "box-shadow": ""});
        $("#barrioEx").css({"border": "", "box-shadow": ""});
        $("#telefonoEx").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el Departamento de nacimiento de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#departamentoNacimiento").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1AsesoriasExterno = false;
    } else if ($('#ciudadNacimiento').val() == 0) {

        $("#fechaIngresoEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoEx").css({"border": "", "box-shadow": ""});
        $("#documentoEx").css({"border": "", "box-shadow": ""});
        $("#nombreEx").css({"border": "", "box-shadow": ""});
        $("#apellidoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoEx").css({"border": "", "box-shadow": ""});
        $("#edadEx").css({"border": "", "box-shadow": ""});
        $("#sexoEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacion").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucion").css({"border": "", "box-shadow": ""});
        $("#gradoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#direccionEx").css({"border": "", "box-shadow": ""});
        $("#barrioEx").css({"border": "", "box-shadow": ""});
        $("#telefonoEx").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el Municipio de nacimiento de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#ciudadNacimiento").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1AsesoriasExterno = false;
    } else if ($('#fechaNacimientoEx').val() === "") {

        $("#fechaIngresoEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoEx").css({"border": "", "box-shadow": ""});
        $("#documentoEx").css({"border": "", "box-shadow": ""});
        $("#nombreEx").css({"border": "", "box-shadow": ""});
        $("#apellidoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#edadEx").css({"border": "", "box-shadow": ""});
        $("#sexoEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacion").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucion").css({"border": "", "box-shadow": ""});
        $("#gradoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#direccionEx").css({"border": "", "box-shadow": ""});
        $("#barrioEx").css({"border": "", "box-shadow": ""});
        $("#telefonoEx").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la fecha de nacimiento de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#fechaNacimientoEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1AsesoriasExterno = false;
    } else if ($('#edadEx').val() === "") {

        $("#fechaIngresoEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoEx").css({"border": "", "box-shadow": ""});
        $("#documentoEx").css({"border": "", "box-shadow": ""});
        $("#nombreEx").css({"border": "", "box-shadow": ""});
        $("#apellidoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoEx").css({"border": "", "box-shadow": ""});
        $("#sexoEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacion").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucion").css({"border": "", "box-shadow": ""});
        $("#gradoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#direccionEx").css({"border": "", "box-shadow": ""});
        $("#barrioEx").css({"border": "", "box-shadow": ""});
        $("#telefonoEx").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la edad de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#edadEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1AsesoriasExterno = false;
    } else if (!document.getElementById('sexoEx-0').checked && !document.getElementById('sexoEx-1').checked) {

        $("#fechaIngresoEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoEx").css({"border": "", "box-shadow": ""});
        $("#documentoEx").css({"border": "", "box-shadow": ""});
        $("#nombreEx").css({"border": "", "box-shadow": ""});
        $("#apellidoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoEx").css({"border": "", "box-shadow": ""});
        $("#edadEx").css({"border": "", "box-shadow": ""});
        $("#relacionFundacion").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucion").css({"border": "", "box-shadow": ""});
        $("#gradoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#direccionEx").css({"border": "", "box-shadow": ""});
        $("#barrioEx").css({"border": "", "box-shadow": ""});
        $("#telefonoEx").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el sexo de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#sexoEx-0").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        $("#sexoEx-1").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1AsesoriasExterno = false;
    } else if ($('#relacionFundacion').val() === "") {

        $("#fechaIngresoEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoEx").css({"border": "", "box-shadow": ""});
        $("#documentoEx").css({"border": "", "box-shadow": ""});
        $("#nombreEx").css({"border": "", "box-shadow": ""});
        $("#apellidoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoEx").css({"border": "", "box-shadow": ""});
        $("#edadEx").css({"border": "", "box-shadow": ""});
        $("#sexoEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoEx-1").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucion").css({"border": "", "box-shadow": ""});
        $("#gradoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#direccionEx").css({"border": "", "box-shadow": ""});
        $("#barrioEx").css({"border": "", "box-shadow": ""});
        $("#telefonoEx").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese que relación que tiene con la fundación. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#relacionFundacion").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1AsesoriasExterno = false;
    } else if ($('#ocupacioInstitucion').val() === "") {

        $("#fechaIngresoEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoEx").css({"border": "", "box-shadow": ""});
        $("#documentoEx").css({"border": "", "box-shadow": ""});
        $("#nombreEx").css({"border": "", "box-shadow": ""});
        $("#apellidoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoEx").css({"border": "", "box-shadow": ""});
        $("#edadEx").css({"border": "", "box-shadow": ""});
        $("#sexoEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacion").css({"border": "", "box-shadow": ""});
        $("#gradoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#direccionEx").css({"border": "", "box-shadow": ""});
        $("#barrioEx").css({"border": "", "box-shadow": ""});
        $("#telefonoEx").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la ocupación o Institución con la que tiene relación. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#ocupacioInstitucion").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1AsesoriasExterno = false;
    } else if ($('#gradoEx').val() === "") {

        $("#fechaIngresoEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoEx").css({"border": "", "box-shadow": ""});
        $("#documentoEx").css({"border": "", "box-shadow": ""});
        $("#nombreEx").css({"border": "", "box-shadow": ""});
        $("#apellidoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoEx").css({"border": "", "box-shadow": ""});
        $("#edadEx").css({"border": "", "box-shadow": ""});
        $("#sexoEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacion").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucion").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#direccionEx").css({"border": "", "box-shadow": ""});
        $("#barrioEx").css({"border": "", "box-shadow": ""});
        $("#telefonoEx").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el grado de escolaridad de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#gradoEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1AsesoriasExterno = false;
    } else if ($('#departamentoResidencia').val() == 0) {

        $("#fechaIngresoEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoEx").css({"border": "", "box-shadow": ""});
        $("#documentoEx").css({"border": "", "box-shadow": ""});
        $("#nombreEx").css({"border": "", "box-shadow": ""});
        $("#apellidoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoEx").css({"border": "", "box-shadow": ""});
        $("#edadEx").css({"border": "", "box-shadow": ""});
        $("#sexoEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacion").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucion").css({"border": "", "box-shadow": ""});
        $("#gradoEx").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#direccionEx").css({"border": "", "box-shadow": ""});
        $("#barrioEx").css({"border": "", "box-shadow": ""});
        $("#telefonoEx").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el Departamento de residencia de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#departamentoResidencia").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1AsesoriasExterno = false;
    } else if ($('#ciudadResidencia').val() == 0) {

        $("#fechaIngresoEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoEx").css({"border": "", "box-shadow": ""});
        $("#documentoEx").css({"border": "", "box-shadow": ""});
        $("#nombreEx").css({"border": "", "box-shadow": ""});
        $("#apellidoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoEx").css({"border": "", "box-shadow": ""});
        $("#edadEx").css({"border": "", "box-shadow": ""});
        $("#sexoEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacion").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucion").css({"border": "", "box-shadow": ""});
        $("#gradoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#direccionEx").css({"border": "", "box-shadow": ""});
        $("#barrioEx").css({"border": "", "box-shadow": ""});
        $("#telefonoEx").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el Municipio de residencia. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#ciudadResidencia").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1AsesoriasExterno = false;
    } else if ($('#direccionEx').val() === "") {

        $("#fechaIngresoEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoEx").css({"border": "", "box-shadow": ""});
        $("#documentoEx").css({"border": "", "box-shadow": ""});
        $("#nombreEx").css({"border": "", "box-shadow": ""});
        $("#apellidoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoEx").css({"border": "", "box-shadow": ""});
        $("#edadEx").css({"border": "", "box-shadow": ""});
        $("#sexoEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacion").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucion").css({"border": "", "box-shadow": ""});
        $("#gradoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""})
        $("#barrioEx").css({"border": "", "box-shadow": ""});
        $("#telefonoEx").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la dirección de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#direccionEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1AsesoriasExterno = false;
    } else if ($('#barrioEx').val() === "") {

        $("#fechaIngresoEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoEx").css({"border": "", "box-shadow": ""});
        $("#documentoEx").css({"border": "", "box-shadow": ""});
        $("#nombreEx").css({"border": "", "box-shadow": ""});
        $("#apellidoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoEx").css({"border": "", "box-shadow": ""});
        $("#edadEx").css({"border": "", "box-shadow": ""});
        $("#sexoEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacion").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucion").css({"border": "", "box-shadow": ""});
        $("#gradoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#direccionEx").css({"border": "", "box-shadow": ""});
        $("#telefonoEx").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el barrio de residencia de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#barrioEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1AsesoriasExterno = false;
    } else if ($('#telefonoEx').val() === "") {

        $("#fechaIngresoEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoEx").css({"border": "", "box-shadow": ""});
        $("#documentoEx").css({"border": "", "box-shadow": ""});
        $("#nombreEx").css({"border": "", "box-shadow": ""});
        $("#apellidoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoEx").css({"border": "", "box-shadow": ""});
        $("#edadEx").css({"border": "", "box-shadow": ""});
        $("#sexoEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacion").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucion").css({"border": "", "box-shadow": ""});
        $("#gradoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#direccionEx").css({"border": "", "box-shadow": ""});
        $("#barrioEx").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el teléfono de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#telefonoEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1AsesoriasExterno = false;
    } else if (!document.getElementById('seguridadEx-0').checked && !document.getElementById('seguridadEx-1').checked) {

        $("#fechaIngresoEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoEx").css({"border": "", "box-shadow": ""});
        $("#documentoEx").css({"border": "", "box-shadow": ""});
        $("#nombreEx").css({"border": "", "box-shadow": ""});
        $("#apellidoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoEx").css({"border": "", "box-shadow": ""});
        $("#edadEx").css({"border": "", "box-shadow": ""});
        $("#sexoEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacion").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucion").css({"border": "", "box-shadow": ""});
        $("#gradoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#direccionEx").css({"border": "", "box-shadow": ""});
        $("#barrioEx").css({"border": "", "box-shadow": ""});
        $("#telefonoEx").css({"border": "", "box-shadow": ""});
        $("#entidadEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el tipo de seguridad social de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#seguridadEx-0").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        $("#seguridadEx-1").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1AsesoriasExterno = false;
    } else if (!document.getElementById('beneficiarioEx-0').checked && !document.getElementById('beneficiarioEx-1').checked) {

        $("#fechaIngresoEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoEx").css({"border": "", "box-shadow": ""});
        $("#documentoEx").css({"border": "", "box-shadow": ""});
        $("#nombreEx").css({"border": "", "box-shadow": ""});
        $("#apellidoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoEx").css({"border": "", "box-shadow": ""});
        $("#edadEx").css({"border": "", "box-shadow": ""});
        $("#sexoEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacion").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucion").css({"border": "", "box-shadow": ""});
        $("#gradoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#direccionEx").css({"border": "", "box-shadow": ""});
        $("#barrioEx").css({"border": "", "box-shadow": ""});
        $("#telefonoEx").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadEx").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el beneficiaro de la asesoria psicológico. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#beneficiarioEx-0").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        $("#beneficiarioEx-1").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1AsesoriasExterno = false;
    } else {

        $("#fechaIngresoEx").css({"border": "", "box-shadow": ""});
        $("#consecutivoEx").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoEx").css({"border": "", "box-shadow": ""});
        $("#documentoEx").css({"border": "", "box-shadow": ""});
        $("#nombreEx").css({"border": "", "box-shadow": ""});
        $("#apellidoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoEx").css({"border": "", "box-shadow": ""});
        $("#edadEx").css({"border": "", "box-shadow": ""});
        $("#sexoEx-0").css({"border": "", "box-shadow": ""});
        $("#sexoEx-1").css({"border": "", "box-shadow": ""});
        $("#relacionFundacion").css({"border": "", "box-shadow": ""});
        $("#ocupacioInstitucion").css({"border": "", "box-shadow": ""});
        $("#gradoEx").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#direccionEx").css({"border": "", "box-shadow": ""});
        $("#barrioEx").css({"border": "", "box-shadow": ""});
        $("#telefonoEx").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-0").css({"border": "", "box-shadow": ""});
        $("#seguridadEx-1").css({"border": "", "box-shadow": ""});
        $("#entidadEx").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarioEx-1").css({"border": "", "box-shadow": ""});

        datosPaso1AsesoriasExterno = true;
    }
}

function validarDatosPaso2AsesoriasExterno() {

    if ($('#motivoEx').val() === "") {

        $("#familiaresEx").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese el motivo de la asesoría. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#motivoEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso2AsesoriasExterno = false;
    } else if ($('#familiaresEx').val() === "") {

        $("#motivoEx").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese la conformación familiar de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#familiaresEx").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso2AsesoriasExterno = false;
    } else {

        $("#motivoEx").css({"border": "", "box-shadow": ""});
        $("#familiaresEx").css({"border": "", "box-shadow": ""});

        datosPaso2AsesoriasExterno = true;
    }
}

function validarDatosPaso4AsesoriasExterno() {

    if (!document.getElementById('estadoProcesoEx-0').checked && !document.getElementById('estadoProcesoEx-1').checked) {

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el estado en el que se encuentra el proceso. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#estadoProcesoEx-0").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        $("#estadoProcesoEx-1").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso4AsesoriasExterno = false;
    } else {

        $("#estadoProcesoEx-0").css({"border": "", "box-shadow": ""});
        $("#estadoProcesoEx-1").css({"border": "", "box-shadow": ""});

        datosPaso4AsesoriasExterno = true;
    }
}

//consulta de la tabla seguimientos
function tablaSeguimientosAsesorias(consecutivo) {

    $('#tblRolSeguimiento').dataTable({
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

function tablaArchivosAsesorias(consecutivo) {

    $('#tblRolArchivosAsesorias').dataTable({
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