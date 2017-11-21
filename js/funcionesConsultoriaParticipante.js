$(document).ready(function () {

    $('input[name="beneficiarioC"]:radio').click(function (e) {
        ;
        if ($('input:radio[name=beneficiarioC]:checked').val() === "PARTICIPANTE") {

            $("#datosBeneficiarioC").hide();
        } else if ($('input:radio[name=beneficiarioC]:checked').val() === "FAMILIAR") {

            $("#datosBeneficiarioC").show();
        }
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

        if ($('#tipoRegistroConsultoria').val() == 0 || $('#fechaIngresoC').val() === "" || $('#consecutivoC').val() === "" || $('#idFichaC').val() === ""
                || (!document.getElementById('beneficiarioC-0').checked && !document.getElementById('beneficiarioC-1').checked)) {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe diligenciar todos los campos requeridos del paso 1 y luego dar clic en continuar para poder acceder al siguiente paso.</div>");
            $('#exampleconfirmacion').modal('show');
        } else {

            if ($('input:radio[name=beneficiarioC]:checked').val() === "PARTICIPANTE") {
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
            } else if ($('input:radio[name=beneficiarioC]:checked').val() === "FAMILIAR") {

                if ($('#tipoDocumentoBeneficiarioC').val() == 0 || $('#documentoBeneficiarioC').val() === "" || $('#nombresBeneficiarioC').val() === "" || $('#apellidosBeneficiarioC').val() === ""
                        || $('#parentezcoBeneficiarioC').val() === "" || $('#ocupacionBeneficiarioC').val() === "" || $('#fechaNacimientoBeneficiarioC').val() === "" || $('#edadBeneficiarioC').val() === ""
                        || $('#direccionBeneficiarioC').val() === "" || $('#barrioBeneficiarioC').val() === "" || $('#telefonoBeneficiarioC').val() === "" || $('#tipoSeguridadBeneficiarioC').val() == 0
                        || $('#entidadBeneficiarioC').val() === "") {
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
            }
        }
        e.preventDefault();
    });

    $("#p3C").click(function (e) {
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
        e.preventDefault();
    });

    $("#p4C").click(function (e) {

        if (!document.getElementById('estadoProcesoC-0').checked && !document.getElementById('estadoProcesoC-1').checked) {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe diligenciar todos los campos requeridos del paso 3 y luego dar clic en continuar para poder acceder al siguiente paso.</div>");
            $('#exampleconfirmacion').modal('show');
        } else if ($('#idConsultoria').val() === "") {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe dar clic en registrar consultoría y podra acceder al siguiente paso.</div>");
            $('#exampleconfirmacion').modal('show');
        } else {

            //línea de código que me permite obtener la fecha del sistema en el formato de HTML5
            var hoy = new Date().toJSON().slice(0, 10);

            $('#fechaConsultoria').val(hoy);

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

        if ($('#idConsultoria').val() === "") {
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

    $('#buscarHistoriaC').click(function () {

        $("#LoadingImage").show();

        $.ajax({
            type: "POST",
            url: "../Controller/ctrlHistoriaClinica.php?opcion=1",
            data: {tipoRegistro: $('#tipoRegistroConsultoria').val(), consecutivo: $('#consecutivoC').val()},
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

                    $("#consecutivoC").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

                } else if (data.res === 'new') {

                    $("#frmConsultoriaParticipante").each(function () {
                        this.reset();
                    });
                    
                    $("#motivoRemisioneC").attr('disabled', 'disabled');

                    //línea de código que me permite obtener la fecha del sistema en el formato de HTML5
                    var hoy = new Date().toJSON().slice(0, 10);

                    //código que me permite obtener la fecha del sistema y manipulas día, mes y año por separado; organizandolo en el formato que la persona requiera
//                    var hoy = new Date();
//                    var dd = hoy.getDate();
//                    var mm = hoy.getMonth() + 1; //hoy es 0!
//                    var yyyy = hoy.getFullYear();
//
//                    if (dd < 10) {
//                        dd = '0' + dd;
//                    }
//                    if (mm < 10) {
//                        mm = '0' + mm;
//                    }

                    $("#consecutivoC").css({"border": "", "box-shadow": ""});

                    $("#nombreTipo").html("<h3>Nuevo Registro de Consultoría</h3>");

                    $("#consecutivoC").val(data.row.Consecutivo);
                    $("#fechaIngresoC").val(hoy);
                    $("#idFichaC").val(data.row.IdFicha);
                    $("#documentoC").val(data.row.Documento);
                    $("#nombreC").val(data.row.Nombres);
                    $("#apellidoC").val(data.row.Apellidos);

                    if (data.row.Sexo === "MASCULINO") {
                        $("#sexoC-0").prop('checked', 'checked');
                    } else if (data.row.Sexo === "FEMENINO") {
                        $("#sexoC-1").prop('checked', 'checked');
                    }

                    $("#edadC").val(data.row.Edad);
                    $("#semilleroC").val(data.row.Semillero);

                    $("#institucionC").val(data.row.Institucion);
                    $("#municipioNacimientoC").val(data.row.MunicipioNacimiento);
                    $("#direccionC").val(data.row.Direccion);
                    $("#telefonoC").val(data.row.Telefono);
                    $("#fechaNacimientoC").val(data.row.FechaNacimiento);
                    $("#barrioC").val(data.row.Barrio);

                    if (data.row.TipoDeSeguridad === "CONTRIBUTIVO (EPS)") {
                        $("#seguridadC-0").prop('checked', 'checked');
                    } else if (data.row.TipoDeSeguridad === "SUBSIDIADO (SISBEN)") {
                        $("#seguridadC-1").prop('checked', 'checked');
                    }

                    $("#saveConsultoria").show();
                    $("#updateConsultoria").hide();

                    $("#divLimpiarConsultoria").show();

                } else if (data.res === 'exis') {

                    $("#frmConsultoriaParticipante").each(function () {
                        this.reset();
                    });

                    $("#consecutivoC").css({"border": "", "box-shadow": ""});

                    $("#nombreTipo").html("<h3>Registro de la Consultoría</h3>");

                    $("#idConsultoria").val(data.row.IdHistoria);
                    $("#tipoRegistroConsultoria").val(data.row.TipoRegistro);
                    $("#fechaIngresoC").val(data.row.FechaIngreso);
                    $("#consecutivoC").val(data.row.Consecutivo);
                    $("#idFichaC").val(data.row.IdFicha);
                    $("#nombreC").val(data.row.Nombres);
                    $("#apellidoC").val(data.row.Apellidos);

                    if (data.row.Sexo === "MASCULINO") {
                        $("#sexoC-0").prop('checked', 'checked');
                    } else if (data.row.Sexo === "FEMENINO") {
                        $("#sexoC-1").prop('checked', 'checked');
                    }

                    $("#municipioNacimientoC").val(data.row.Municipio);
                    $("#fechaNacimientoC").val(data.row.FechaNacimiento);
                    $("#edadC").val(data.row.Edad);
                    $("#documentoC").val(data.row.Documento);

                    if (data.row.TipoDeSeguridad === "CONTRIBUTIVO (EPS)") {
                        $("#seguridadC-0").prop('checked', 'checked');
                    } else if (data.row.TipoDeSeguridad === "SUBSIDIADO (SISBEN)") {
                        $("#seguridadC-1").prop('checked', 'checked');
                    }

                    $("#telefonoC").val(data.row.Telefono);
                    $("#direccionC").val(data.row.Direccion);
                    $("#barrioC").val(data.row.Barrio_vereda);
                    $("#institucionC").val(data.row.Institucion);
                    $("#semilleroC").val(data.row.NombreSemillero);
                    $("#telefono2C").val(data.row.Telefono2);

                    if (data.row.Beneficiario === "PARTICIPANTE") {
                        $("#beneficiarioC-0").prop('checked', 'checked');
                        $("#datosBeneficiarioC").hide();
                    } else if (data.row.Beneficiario === "FAMILIAR") {
                        $("#beneficiarioC-1").prop('checked', 'checked');
                        $("#datosBeneficiarioC").show();
                    }

                    $("#tipoDocumentoBeneficiarioC").val(data.row.TipoDocumentoBeneficiario);
                    $("#documentoBeneficiarioC").val(data.row.DocumentoBeneficiario);
                    $("#nombresBeneficiarioC").val(data.row.NombresBeneficiario);
                    $("#apellidosBeneficiarioC").val(data.row.ApellidosBeneficiario);
                    $("#parentezcoBeneficiarioC").val(data.row.ParentezcoBeneficiario);
                    $("#ocupacionBeneficiarioC").val(data.row.OcupacionBeneficiario);
                    $("#fechaNacimientoBeneficiarioC").val(data.row.FechaNacimientoBeneficiario);
                    $("#edadBeneficiarioC").val(data.row.EdadBeneficiario);
                    $("#direccionBeneficiarioC").val(data.row.DireccionBeneficiario);
                    $("#barrioBeneficiarioC").val(data.row.BarrioBeneficiario);
                    $("#telefonoBeneficiarioC").val(data.row.TelefonoBeneficiario);
                    $("#telefono2BeneficiarioC").val(data.row.Telefono2Beneficiario);
                    $("#tipoSeguridadBeneficiarioC").val(data.row.TipoDeSeguridadBeneficiario);
                    $("#entidadBeneficiarioC").val(data.row.EpsBeneficiario);
                    $("#motivoC").val(data.row.MotivoConsulta);
                    $("#antecedentesC").val(data.row.AntecedentesFamiliares);
                    $("#familiaresC").val(data.row.ConformacionFamiliar);

                    var remision = data.row.Remisiones;
                    var VectorRemision = remision.split(";");
                    for (var i = 0; i < VectorRemision.length; i++) {

                        var PD = $("input:checkbox[name='remisionC[]'][value='" + VectorRemision[i] + "']");
                        $(PD).prop("checked", "checked");
                    }

                    if ($("#remisionC-5").is(':checked')) {
                        $("#motivoRemisioneC").removeAttr("disabled");
                    } else {
                        $("#motivoRemisioneC").attr('disabled', 'disabled');
                    }

                    $("#motivoRemisioneC").val(data.row.MotivoRemisiones);

                    var finalizo = data.row.Finalizacion;
                    var VectorFinalizo = finalizo.split(";");
                    for (var i = 0; i < VectorRemision.length; i++) {

                        var PD = $("input:checkbox[name='finalizoC[]'][value='" + VectorFinalizo[i] + "']");
                        $(PD).prop("checked", "checked");
                    }

                    if (data.row.EstadoProceso === "Activo") {
                        $("#estadoProcesoC-0").prop('checked', 'checked');
                    } else if (data.row.EstadoProceso === "Cerrado") {
                        $("#estadoProcesoC-1").prop('checked', 'checked');
                    }

                    $("#saveConsultoria").hide();
                    $("#updateConsultoria").show();
                    $("#divLimpiarConsultoria").show();

                    var oTable = $('#tblRolSeguimientoC').dataTable();
                    oTable.fnDestroy();

                    tablaSeguimientosConsultoria(data.row.IdHistoria);

                    var oTable = $('#tblRolArchivosConsultoria').dataTable();
                    oTable.fnDestroy();

                    tablaArchivosConsultoria(data.row.IdHistoria);
                }
            }
        });
    });

    $('#continue1C').click(function () {

        validarDatosPaso1Consultoria();

        if (datosPaso1Consultoria == false) {
            $("#LoadingImage").hide();
        } else {

            $("#tipoRegistroConsultoria").css({"border": "", "box-shadow": ""});
            $("#fechaIngresoC").css({"border": "", "box-shadow": ""});
            $("#consecutivoC").css({"border": "", "box-shadow": ""});
            $("#idFichaC").css({"border": "", "box-shadow": ""});
            $("#documentoC").css({"border": "", "box-shadow": ""});
            $("#beneficiariosC-0").css({"border": "", "box-shadow": ""});
            $("#beneficiariosC-1").css({"border": "", "box-shadow": ""});

            if ($('input:radio[name=beneficiarioC]:checked').val() === "PARTICIPANTE") {

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
            } else if ($('input:radio[name=beneficiarioC]:checked').val() === "FAMILIAR") {

                validarDatosBeneficiarioConsultoria();

                if (datosBeneficiarioConsultoria == false) {
                    $("#LoadingImage").hide();
                } else {

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
            }
        }
    });

    $('#continue2C').click(function () {

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
    });

    $('#remisionC-5').change(function () {
        if ($(this).is(':checked')) {
            $("#motivoRemisioneC").removeAttr("disabled");
        } else {
            $("#motivoRemisioneC").attr('disabled', 'disabled');
        }
    });

    $('#saveConsultoria').click(function () {

        validarDatosPaso3Consultoria();

        if (datosPaso3Consultoria == false) {
            $("#LoadingImage").hide();
        } else {

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlHistoriaClinica.php?opcion=3",
                data: $("#frmConsultoriaParticipante").serialize(),
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

                        $("#idConsultoria").val(data.row.IdHistoria);

                        $("#LoadingImage").hide();
                        var modal = $('#exampleconfirmacion');
                        modal.find('.modal-title').text("Registro exitoso.");
                        modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + " </div>");
                        $('#exampleconfirmacion').modal('show');

                        //línea de código que me permite obtener la fecha del sistema en el formato de HTML5
                        var hoy = new Date().toJSON().slice(0, 10);

                        $('#fechaConsultoria').val(hoy);

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

                        var oTable = $('#tblRolSeguimientoC').dataTable();
                        oTable.fnDestroy();

                        tablaSeguimientosConsultoria(data.row.IdHistoria);

                        var oTable = $('#tblRolArchivosConsultoria').dataTable();
                        oTable.fnDestroy();

                        tablaArchivosConsultoria(data.row.IdHistoria);

                        $("#saveConsultoria").hide();
                        $("#updateConsultoria").show();
                        $("#divLimpiarConsultoria").show();
                    }
                }
            });
        }
    });

    $('#updateConsultoria').click(function () {

        validarDatosPaso3Consultoria();

        if (datosPaso3Consultoria == false) {
            $("#LoadingImage").hide();
        } else {

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlHistoriaClinica.php?opcion=5",
                data: $("#frmConsultoriaParticipante").serialize(),
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

                        $('#fechaConsultoria').val(hoy);

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

    $('#saveSeguimientoC').click(function () {

        if ($('#fechaConsultoria').val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la fecha en la que se le realiza el seguimiento. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#fechaConsultoria").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#observacionConsultoria').val() === "") {

            $("#fechaConsultoria").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la observación del seguimiento. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#observacionConsultoria").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else {

            $("#fechaConsultoria").css({"border": "", "box-shadow": ""});
            $("#observacionConsultoria").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlSeguimientoSesion.php?opcion=4",
                data: $("#frmConsultoriaParticipante").serialize(),
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

                        $('#observacionConsultoria').val("");

                        var oTable = $('#tblRolSeguimientoC').dataTable();
                        oTable.fnDestroy();

                        tablaSeguimientosConsultoria($('#idConsultoria').val());
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
            url: "../Controller/ctrlSeguimientoSesion.php?opcion=2",
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

                    $("#idSeguimientoC").val(data.row.IdSeguimiento);
                    $("#fechaConsultoria").val(data.row.FechaSeguimientoSesion);
                    $("#observacionConsultoria").val(data.row.Observaciones);

                    $("#saveSeguimientoC").hide();
                    $("#updateSeguimientoC").show();
                }
            }
        });
    });

    $('#clearCampoC').click(function () {

        $("#fechaConsultoria").css({"border": "", "box-shadow": ""});
        $("#observacionConsultoria").css({"border": "", "box-shadow": ""});

        //línea de código que me permite obtener la fecha del sistema en el formato de HTML5
        var hoy = new Date().toJSON().slice(0, 10);

        $('#fechaConsultoria').val(hoy);

        $('#observacionConsultoria').val("");

        $("#saveSeguimientoC").show();
        $("#updateSeguimientoC").hide();
    });

    $('#updateSeguimientoC').click(function () {

        if ($('#fechaConsultoria').val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la fecha en la que se le realiza el seguimiento. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#fechaConsultoria").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#observacionConsultoria').val() === "") {

            $("#fechaConsultoria").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la observación del seguimiento. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#observacionConsultoria").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else {

            $("#fechaConsultoria").css({"border": "", "box-shadow": ""});
            $("#observacionConsultoria").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlSeguimientoSesion.php?opcion=5",
                data: $("#frmConsultoriaParticipante").serialize(),
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

                        $('#observacionConsultoria').val("");

                        var oTable = $('#tblRolSeguimientoC').dataTable();
                        oTable.fnDestroy();

                        tablaSeguimientosConsultoria($('#idConsultoria').val());
                    }
                }
            });
        }
    });

    $("#enviarArchivoConsultoria").click(function (e) {

        var file_data = $("#frmArchivosConsultoria").find('[name="archivoConsultoria"]').prop('files')[0];

        var hoy = new Date().toJSON().slice(0, 10);

        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('lider', $("#idConsultoria").val());
        form_data.append('fecha', hoy);
        form_data.append('descripcion', $("#descripcionConsultoria").val());
        form_data.append('folder', "Remisiones");

        if (typeof file_data === "undefined" || $("#descripcionConsultoria").val() === "") {

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
                    url: '../Controller/ctrlArchivosHistoria.php?opcion=1', // point to server-side PHP script 
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

                            $("#frmArchivosConsultoria").each(function () {
                                this.reset();
                            });

                            var oTable = $('#tblRolArchivosConsultoria').dataTable();
                            oTable.fnReloadAjax();
                            tablaArchivosConsultoria($('#idConsultoria').val());
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
            url: "../Controller/ctrlArchivosHistoria.php?opcion=2",
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
                    tablaArchivosConsultoria($('#idConsultoria').val());
                }
            }
        });
    });

    $('#clearConsultoria').click(function () {

        $("#frmConsultoriaParticipante").each(function () {
            this.reset();
        });

        $("#datosBeneficiario").hide();

        $("#frmHistoriaMedica").each(function () {
            this.reset();
        });

        $("#nombreTipo").html("<h3>Asesorías y Consultorías</h3>");

        $("#historialParticipante").hide();
        $("#consultoriaParticipante").hide();
        $("#divLimpiarAsesoria").hide();
        $("#listadoHistorias").show();
    });
});

function validarDatosPaso1Consultoria() {

    if ($('#tipoRegistroConsultoria').val() == 0) {

        $("#fechaIngresoC").css({"border": "", "box-shadow": ""});
        $("#consecutivoC").css({"border": "", "box-shadow": ""});
        $("#idFichaC").css({"border": "", "box-shadow": ""});
        $("#documentoC").css({"border": "", "box-shadow": ""});
        $("#beneficiariosC-0").css({"border": "", "box-shadow": ""});
        $("#beneficiariosC-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el tipo de registro a realizar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#tipoRegistroConsultoria").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Consultoria = false;
    } else if ($('#fechaIngresoC').val() === "") {

        $("#fechaIngresoC").css({"border": "", "box-shadow": ""});
        $("#consecutivoC").css({"border": "", "box-shadow": ""});
        $("#idFichaC").css({"border": "", "box-shadow": ""});
        $("#documentoC").css({"border": "", "box-shadow": ""});
        $("#beneficiariosC-0").css({"border": "", "box-shadow": ""});
        $("#beneficiariosC-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la fecha que se realiza la atención u seguimiento psocológico. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#fechaIngresoC").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Consultoria = false;
    } else if ($('#consecutivoC').val() === "") {

        $("#tipoRegistroConsultoria").css({"border": "", "box-shadow": ""});
        $("#fechaIngresoC").css({"border": "", "box-shadow": ""});
        $("#idFichaC").css({"border": "", "box-shadow": ""});
        $("#documentoC").css({"border": "", "box-shadow": ""});
        $("#beneficiariosC-0").css({"border": "", "box-shadow": ""});
        $("#beneficiariosC-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el consecutivoC de la asesoria. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#consecutivoC").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Consultoria = false;
    } else if ($('#idFichaC').val() === "") {

        $("#fechaIngresoC").css({"border": "", "box-shadow": ""});
        $("#consecutivoC").css({"border": "", "box-shadow": ""});
        $("#beneficiariosC-0").css({"border": "", "box-shadow": ""});
        $("#beneficiariosC-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el documento en el consecutivo y de clic en el boton buscar ficha socio familiar para buscar la información del participante. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#consecutivoC").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Consultoria = false;
    } else if (!document.getElementById('beneficiarioC-0').checked && !document.getElementById('beneficiarioC-1').checked) {

        $("#fechaIngresoC").css({"border": "", "box-shadow": ""});
        $("#consecutivoC").css({"border": "", "box-shadow": ""});
        $("#idFichaC").css({"border": "", "box-shadow": ""});
        $("#documentoC").css({"border": "", "box-shadow": ""});
        $("#beneficiariosC-0").css({"border": "", "box-shadow": ""});
        $("#beneficiariosC-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el beneficiaro de la asesoria psicológico. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#beneficiariosC-0").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        $("#beneficiariosC-1").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Consultoria = false;
    } else {

        $("#tipoRegistroConsultoria").css({"border": "", "box-shadow": ""});
        $("#fechaIngresoC").css({"border": "", "box-shadow": ""});
        $("#consecutivoC").css({"border": "", "box-shadow": ""});
        $("#idFichaC").css({"border": "", "box-shadow": ""});
        $("#documentoC").css({"border": "", "box-shadow": ""});
        $("#beneficiariosC-0").css({"border": "", "box-shadow": ""});
        $("#beneficiariosC-1").css({"border": "", "box-shadow": ""});

        datosPaso1Consultoria = true;
    }
}

function validarDatosBeneficiarioConsultoria() {

    if ($('#tipoDocumentoBeneficiarioC').val() == 0) {

        $("#documentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiarioC").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el tipo de documento del beneficiario. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#tipoDocumentoBeneficiarioC").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiarioConsultoria = false;
    } else if ($('#documentoBeneficiarioC').val() === "") {

        $("#tipoDocumentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiarioC").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el numero de documento del beneficiario. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#documentoBeneficiarioC").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiarioConsultoria = false;
    } else if ($('#nombresBeneficiarioC').val() === "") {

        $("#tipoDocumentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#documentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiarioC").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el nombre del beneficiario. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#nombresBeneficiarioC").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiarioConsultoria = false;
    } else if ($('#apellidosBeneficiarioC').val() === "") {

        $("#tipoDocumentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#documentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiarioC").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese los apellidos del beneficiario. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#apellidosBeneficiarioC").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiarioConsultoria = false;
    } else if ($('#parentezcoBeneficiarioC').val() === "") {

        $("#tipoDocumentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#documentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiarioC").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el parentezco del beneficiario con el participante. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#parentezcoBeneficiarioC").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiarioConsultoria = false;
    } else if ($('#ocupacionBeneficiarioC').val() === "") {

        $("#tipoDocumentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#documentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiarioC").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la ocupación del beneficiario. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#ocupacionBeneficiarioC").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiarioConsultoria = false;
    } else if ($('#fechaNacimientoBeneficiarioC').val() === "") {

        $("#tipoDocumentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#documentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiarioC").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la fecha de nacimiento del beneficiario. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#fechaNacimientoBeneficiarioC").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiarioConsultoria = false;
    } else if ($('#edadBeneficiarioC').val() === "") {

        $("#tipoDocumentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#documentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiarioC").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la edad del beneficiario. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#edadBeneficiarioC").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiarioConsultoria = false;
    } else if ($('#direccionBeneficiarioC').val() === "") {

        $("#tipoDocumentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#documentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiarioC").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la dirección del beneficiario. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#direccionBeneficiarioC").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiarioConsultoria = false;
    } else if ($('#barrioBeneficiarioC').val() === "") {

        $("#tipoDocumentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#documentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiarioC").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el barrio de residencia del beneficiario. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#barrioBeneficiarioC").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiarioConsultoria = false;
    } else if ($('#telefonoBeneficiarioC').val() === "") {

        $("#tipoDocumentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#documentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiarioC").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el teléfono del beneficiario. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#telefonoBeneficiarioC").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiarioConsultoria = false;
    } else if ($('#tipoSeguridadBeneficiarioC').val() == 0) {

        $("#tipoDocumentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#documentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiarioC").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el tipo de seguridad del beneficiario. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#tipoSeguridadBeneficiarioC").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiarioConsultoria = false;
    } else if ($('#entidadBeneficiarioC').val() === "") {

        $("#tipoDocumentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#documentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiarioC").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la entidad prestadora de servicio del beneficiario. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#entidadBeneficiarioC").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiarioConsultoria = false;
    } else {

        $("#tipoDocumentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#documentoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiarioC").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiarioC").css({"border": "", "box-shadow": ""});

        datosBeneficiarioConsultoria = true;
    }
}

function validarDatosPaso3Consultoria() {

    if (!document.getElementById('estadoProcesoC-0').checked && !document.getElementById('estadoProcesoC-1').checked) {

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el estado en el que se encuentra el proceso. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#estadoProcesoC-0").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        $("#estadoProcesoC-1").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso3Consultoria = false;
    } else {

        $("#estadoProcesoC-0").css({"border": "", "box-shadow": ""});
        $("#estadoProcesoC-1").css({"border": "", "box-shadow": ""});

        datosPaso3Consultoria = true;
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
        "sAjaxSource": "HistoriaClinica/consultarDatosTablaSeguimiento.php?consecutivo=" + encodeURIComponent(consecutivo),
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
        "sAjaxSource": "HistoriaClinica/consultarDatosTablaArchivos.php?consecutivo=" + encodeURIComponent(consecutivo),
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