$(document).ready(function () {

    $('input[name="beneficiarios"]:radio').click(function (e) {

        if ($('input:radio[name=beneficiarios]:checked').val() === "PARTICIPANTE") {

            $("#datosBeneficiario").hide();
        } else if ($('input:radio[name=beneficiarios]:checked').val() === "FAMILIAR") {

            $("#datosBeneficiario").show();
        }
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

        if ($('#tipoRegistro').val() == 0 || $('#fechaIngreso').val() === "" || $('#consecutivo').val() === "" || $('#idFicha').val() === ""
                || (!document.getElementById('beneficiarios-0').checked && !document.getElementById('beneficiarios-1').checked)) {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe diligenciar todos los campos requeridos del paso 1 y luego dar clic en continuar para poder acceder al siguiente paso.</div>");
            $('#exampleconfirmacion').modal('show');
        } else {

            if ($('input:radio[name=beneficiarios]:checked').val() === "PARTICIPANTE") {

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
            } else if ($('input:radio[name=beneficiarios]:checked').val() === "FAMILIAR") {

                if ($('#tipoDocumentoBeneficiario').val() == 0 || $('#documentoBeneficiario').val() === "" || $('#nombresBeneficiario').val() === "" || $('#apellidosBeneficiario').val() === ""
                        || $('#parentezcoBeneficiario').val() === "" || $('#ocupacionBeneficiario').val() === "" || $('#fechaNacimientoBeneficiario').val() === "" || $('#edadBeneficiario').val() === ""
                        || $('#direccionBeneficiario').val() === "" || $('#barrioBeneficiario').val() === "" || $('#telefonoBeneficiario').val() === "" || $('#tipoSeguridadBeneficiario').val() == 0
                        || $('#entidadBeneficiario').val() === "") {
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
            }
        }
        e.preventDefault();
    });

    $("#p3").click(function (e) {

        if ($('#motivo').val() === "" || $('#familiares').val() === "") {
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

        if (!document.getElementById('estadoProceso-0').checked && !document.getElementById('estadoProceso-1').checked) {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe diligenciar todos los campos requeridos del paso 4 y luego dar clic en continuar para poder acceder al siguiente paso.</div>");
            $('#exampleconfirmacion').modal('show');
        } else if ($('#idAsesoria').val() === "") {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe dar clic en registrar asesoría y podra acceder al siguiente paso.</div>");
            $('#exampleconfirmacion').modal('show');
        } else {

            //línea de código que me permite obtener la fecha del sistema en el formato de HTML5
            var hoy = new Date().toJSON().slice(0, 10);

            $('#fechaSeguimiento').val(hoy);

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

        if ($('#idAsesoria').val() === "") {
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

        $.ajax({
            type: "POST",
            url: "../Controller/ctrlHistoriaClinica.php?opcion=1",
            data: {tipoRegistro: $('#tipoRegistroAsesoria').val(), consecutivo: $('#consecutivo').val()},
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

                    $("#consecutivo").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

                } else if (data.res === 'new') {

                    $("#frmAsesoriaParticipante").each(function () {
                        this.reset();
                    });
                    
                    $("#motivoRemisione").attr('disabled', 'disabled');

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

                    $("#consecutivo").css({"border": "", "box-shadow": ""});

                    $("#nombreTipo").html("<h3>Nuevo Registro de Asesoría</h3>");

                    $("#consecutivo").val(data.row.Consecutivo);
                    $("#fechaIngreso").val(hoy);
                    $("#idFicha").val(data.row.IdFicha);
                    $("#documento").val(data.row.Documento);
                    $("#nombre").val(data.row.Nombres);
                    $("#apellido").val(data.row.Apellidos);

                    if (data.row.Sexo === "MASCULINO") {
                        $("#sexo-0").prop('checked', 'checked');
                    } else if (data.row.Sexo === "FEMENINO") {
                        $("#sexo-1").prop('checked', 'checked');
                    }

                    $("#edad").val(data.row.Edad);
                    $("#semillero").val(data.row.Semillero);

                    $("#institucion").val(data.row.Institucion);
                    $("#municipioNacimiento").val(data.row.MunicipioNacimiento);
                    $("#direccion").val(data.row.Direccion);
                    $("#telefono").val(data.row.Telefono);
                    $("#fechaNacimiento").val(data.row.FechaNacimiento);
                    $("#barrio").val(data.row.Barrio);

                    if (data.row.TipoDeSeguridad === "CONTRIBUTIVO (EPS)") {
                        $("#seguridad-0").prop('checked', 'checked');
                    } else if (data.row.TipoDeSeguridad === "SUBSIDIADO (SISBEN)") {
                        $("#seguridad-1").prop('checked', 'checked');
                    }

                    $("#saveAsesoria").show();
                    $("#updateAsesoria").hide();
                    $("#datosBeneficiario").hide();

                    $("#divLimpiarAsesoria").show();

                } else if (data.res === 'exis') {

                    $("#frmAsesoriaParticipante").each(function () {
                        this.reset();
                    });

                    $("#consecutivo").css({"border": "", "box-shadow": ""});

                    $("#nombreTipo").html("<h3>Registro de la Asesoría</h3>");

                    $("#idAsesoria").val(data.row.IdHistoria);
                    $("#tipoRegistroAsesoria").val(data.row.TipoRegistro);
                    $("#fechaIngreso").val(data.row.FechaIngreso);
                    $("#consecutivo").val(data.row.Consecutivo);
                    $("#idFicha").val(data.row.IdFicha);
                    $("#nombre").val(data.row.Nombres);
                    $("#apellido").val(data.row.Apellidos);

                    if (data.row.Sexo === "MASCULINO") {
                        $("#sexo-0").prop('checked', 'checked');
                    } else if (data.row.Sexo === "FEMENINO") {
                        $("#sexo-1").prop('checked', 'checked');
                    }

                    $("#municipioNacimiento").val(data.row.Municipio);
                    $("#fechaNacimiento").val(data.row.FechaNacimiento);
                    $("#edad").val(data.row.Edad);
                    $("#documento").val(data.row.Documento);

                    if (data.row.TipoDeSeguridad === "CONTRIBUTIVO (EPS)") {
                        $("#seguridad-0").prop('checked', 'checked');
                    } else if (data.row.TipoDeSeguridad === "SUBSIDIADO (SISBEN)") {
                        $("#seguridad-1").prop('checked', 'checked');
                    }

                    $("#telefono").val(data.row.Telefono);
                    $("#direccion").val(data.row.Direccion);
                    $("#barrio").val(data.row.Barrio_vereda);
                    $("#institucion").val(data.row.Institucion);
                    $("#semillero").val(data.row.NombreSemillero);
                    $("#telefono2").val(data.row.Telefono2);

                    if (data.row.Beneficiario === "PARTICIPANTE") {
                        $("#beneficiarios-0").prop('checked', 'checked');
                        $("#datosBeneficiario").hide();
                    } else if (data.row.Beneficiario === "FAMILIAR") {
                        $("#beneficiarios-1").prop('checked', 'checked');
                        $("#datosBeneficiario").show();
                    }

                    $("#tipoDocumentoBeneficiario").val(data.row.TipoDocumentoBeneficiario);
                    $("#documentoBeneficiario").val(data.row.DocumentoBeneficiario);
                    $("#nombresBeneficiario").val(data.row.NombresBeneficiario);
                    $("#apellidosBeneficiario").val(data.row.ApellidosBeneficiario);
                    $("#parentezcoBeneficiario").val(data.row.ParentezcoBeneficiario);
                    $("#ocupacionBeneficiario").val(data.row.OcupacionBeneficiario);
                    $("#fechaNacimientoBeneficiario").val(data.row.FechaNacimientoBeneficiario);
                    $("#edadBeneficiario").val(data.row.EdadBeneficiario);
                    $("#direccionBeneficiario").val(data.row.DireccionBeneficiario);
                    $("#barrioBeneficiario").val(data.row.BarrioBeneficiario);
                    $("#telefonoBeneficiario").val(data.row.TelefonoBeneficiario);
                    $("#telefono2Beneficiario").val(data.row.Telefono2Beneficiario);
                    $("#tipoSeguridadBeneficiario").val(data.row.TipoDeSeguridadBeneficiario);
                    $("#entidadBeneficiario").val(data.row.EpsBeneficiario);
                    $("#motivo").val(data.row.MotivoConsulta);
                    $("#antecedentes").val(data.row.AntecedentesFamiliares);
                    $("#familiares").val(data.row.ConformacionFamiliar);
                    $("#conflictos").val(data.row.Conflictos);
                    $("#metas").val(data.row.MetasTerapeuticas);
                    $("#logros").val(data.row.Logros);
                    $("#pruebas").val(data.row.PruebasAplicadas);

                    var remision = data.row.Remisiones;
                    var VectorRemision = remision.split(";");
                    for (var i = 0; i < VectorRemision.length; i++) {

                        var PD = $("input:checkbox[name='remision[]'][value='" + VectorRemision[i] + "']");
                        $(PD).prop("checked", "checked");
                    }

                    if ($("#remision-5").is(':checked')) {
                        $("#motivoRemisione").removeAttr("disabled");
                    } else {
                        $("#motivoRemisione").attr('disabled', 'disabled');
                    }

                    $("#motivoRemisione").val(data.row.MotivoRemisiones);

                    var finalizo = data.row.Finalizacion;
                    var VectorFinalizo = finalizo.split(";");
                    for (var i = 0; i < VectorRemision.length; i++) {

                        var PD = $("input:checkbox[name='finalizo[]'][value='" + VectorFinalizo[i] + "']");
                        $(PD).prop("checked", "checked");
                    }

                    if (data.row.EstadoProceso === "Activo") {
                        $("#estadoProceso-0").prop('checked', 'checked');
                    } else if (data.row.EstadoProceso === "Cerrado") {
                        $("#estadoProceso-1").prop('checked', 'checked');
                    }

                    $("#saveAsesoria").hide();
                    $("#updateAsesoria").show();
                    $("#divLimpiarAsesoria").show();

                    var oTable = $('#tblRolSeguimiento').dataTable();
                    oTable.fnDestroy();

                    tablaSeguimientosAsesorias(data.row.IdHistoria);

                    var oTable = $('#tblRolArchivosAsesorias').dataTable();
                    oTable.fnDestroy();

                    tablaArchivosAsesorias(data.row.IdHistoria);
                }
            }
        });
    });

    $('#continue1').click(function () {

        validarDatosPaso1Asesorias();

        if (datosPaso1Asesorias == false) {
            $("#LoadingImage").hide();
        } else {

            $("#tipoRegistro").css({"border": "", "box-shadow": ""});
            $("#fechaIngreso").css({"border": "", "box-shadow": ""});
            $("#consecutivo").css({"border": "", "box-shadow": ""});
            $("#idFicha").css({"border": "", "box-shadow": ""});
            $("#documento").css({"border": "", "box-shadow": ""});
            $("#beneficiarios-0").css({"border": "", "box-shadow": ""});
            $("#beneficiarios-1").css({"border": "", "box-shadow": ""});

            if ($('input:radio[name=beneficiarios]:checked').val() === "PARTICIPANTE") {

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
            } else if ($('input:radio[name=beneficiarios]:checked').val() === "FAMILIAR") {

                validarDatosBeneficiario();

                if (datosBeneficiario == false) {
                    $("#LoadingImage").hide();
                } else {

                    $("#p2").addClass('btn-success');
                    $("#p1").removeClass('btn-success');
                    $("#p3").removeClass('btn-success');
                    $("#p4").removeClass('btn-success');
                    $("#p5").removeClass('btn-success');
                    $("#paso1").hide();
                    $("#paso2").show();
                    $("#paso3").hide();
                    $("#paso4").hide();
                    $("#paso5").hide();
                }
            }
        }
    });

    $('#continue2').click(function () {

        validarDatosPaso2Asesorias();

        if (datosPaso2Asesorias == false) {
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

    $('#remision-5').change(function () {
        if ($(this).is(':checked')) {
            $("#motivoRemisione").removeAttr("disabled");
        } else {
            $("#motivoRemisione").attr('disabled', 'disabled');
        }
    });

    $('#saveAsesoria').click(function () {

        validarDatosPaso4Asesorias();

        if (datosPaso4Asesorias == false) {
            $("#LoadingImage").hide();
        } else {

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlHistoriaClinica.php?opcion=2",
                data: $("#frmAsesoriaParticipante").serialize(),
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

                        $("#idAsesoria").val(data.row.IdHistoria);

                        $("#LoadingImage").hide();
                        var modal = $('#exampleconfirmacion');
                        modal.find('.modal-title').text("Registro exitoso.");
                        modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + " </div>");
                        $('#exampleconfirmacion').modal('show');

                        //línea de código que me permite obtener la fecha del sistema en el formato de HTML5
                        var hoy = new Date().toJSON().slice(0, 10);

                        $('#fechaSeguimiento').val(hoy);

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

                        var oTable = $('#tblRolSeguimiento').dataTable();
                        oTable.fnDestroy();

                        tablaSeguimientosAsesorias(data.row.IdHistoria);

                        var oTable = $('#tblRolArchivosAsesorias').dataTable();
                        oTable.fnDestroy();

                        tablaArchivosAsesorias(data.row.IdHistoria);

                        $("#saveAsesoria").hide();
                        $("#updateAsesoria").show();
                        $("#divLimpiarAsesoria").show();
                    }
                }
            });
        }
    });

    $('#updateAsesoria').click(function () {

        validarDatosPaso4Asesorias();

        if (datosPaso4Asesorias == false) {
            $("#LoadingImage").hide();
        } else {

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlHistoriaClinica.php?opcion=4",
                data: $("#frmAsesoriaParticipante").serialize(),
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

                        $('#fechaSeguimiento').val(hoy);

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

        if ($('#fechaSeguimiento').val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la fecha en la que se le realiza el seguimiento. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#fechaSeguimiento").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#observacionSeguimiento').val() === "") {

            $("#fechaSeguimiento").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la observación del seguimiento. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#observacionSeguimiento").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else {

            $("#fechaSeguimiento").css({"border": "", "box-shadow": ""});
            $("#observacionSeguimiento").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlSeguimientoSesion.php?opcion=1",
                data: $("#frmAsesoriaParticipante").serialize(),
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

                        $('#observacionSeguimiento').val("");

                        var oTable = $('#tblRolSeguimiento').dataTable();
                        oTable.fnDestroy();

                        tablaSeguimientosAsesorias($('#idAsesoria').val());
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

                    $("#idSeguimiento").val(data.row.IdSeguimiento);
                    $("#fechaSeguimiento").val(data.row.FechaSeguimientoSesion);
                    $("#observacionSeguimiento").val(data.row.Observaciones);

                    $("#saveSeguimiento").hide();
                    $("#updateSeguimiento").show();
                }
            }
        });
    });

    $('#clearCampo').click(function () {

        $("#fechaSeguimiento").css({"border": "", "box-shadow": ""});
        $("#observacionSeguimiento").css({"border": "", "box-shadow": ""});

        //línea de código que me permite obtener la fecha del sistema en el formato de HTML5
        var hoy = new Date().toJSON().slice(0, 10);

        $('#fechaSeguimiento').val(hoy);

        $('#observacionSeguimiento').val("");

        $("#saveSeguimiento").show();
        $("#updateSeguimiento").hide();
    });

    $('#updateSeguimiento').click(function () {

        if ($('#fechaSeguimiento').val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la fecha en la que se le realiza el seguimiento. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#fechaSeguimiento").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#observacionSeguimiento').val() === "") {

            $("#fechaSeguimiento").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la observación del seguimiento. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#observacionSeguimiento").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else {

            $("#fechaSeguimiento").css({"border": "", "box-shadow": ""});
            $("#observacionSeguimiento").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlSeguimientoSesion.php?opcion=3",
                data: $("#frmAsesoriaParticipante").serialize(),
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

                        $('#observacionSeguimiento').val("");

                        var oTable = $('#tblRolSeguimiento').dataTable();
                        oTable.fnDestroy();

                        tablaSeguimientosAsesorias($('#idAsesoria').val());

                        $("#saveSeguimiento").show();
                        $("#updateSeguimiento").hide();
                    }
                }
            });
        }
    });

    $("#enviarArchivoAsesoria").click(function (e) {

        var file_data = $("#frmArchivosAsesoria").find('[name="archivoAsesoria"]').prop('files')[0];

        var hoy = new Date().toJSON().slice(0, 10);

        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('lider', $("#idAsesoria").val());
        form_data.append('fecha', hoy);
        form_data.append('descripcion', $("#descripcion").val());
        form_data.append('folder', "Remisiones");

        if (typeof file_data === "undefined" || $("#descripcion").val() === "") {

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

                            $("#frmArchivosAsesoria").each(function () {
                                this.reset();
                            });

                            var oTable = $('#tblRolArchivosAsesorias').dataTable();
                            oTable.fnReloadAjax();
                            tablaArchivosAsesorias($('#idAsesoria').val());
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

                    var oTable = $('#tblRolArchivosAsesorias').dataTable();
                    oTable.fnDestroy();
                    tablaArchivosAsesorias($('#idAsesoria').val());
                }
            }
        });
    });

    $('#clearAsesoria').click(function () {

        $("#frmAsesoriaParticipante").each(function () {
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

function validarDatosPaso1Asesorias() {

    if ($('#tipoRegistro').val() == 0) {

        $("#fechaIngreso").css({"border": "", "box-shadow": ""});
        $("#consecutivo").css({"border": "", "box-shadow": ""});
        $("#idFicha").css({"border": "", "box-shadow": ""});
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#beneficiarios-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarios-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el tipo de registro a realizar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#tipoRegistro").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Asesorias = false;
    } else if ($('#fechaIngreso').val() === "") {

        $("#fechaIngreso").css({"border": "", "box-shadow": ""});
        $("#consecutivo").css({"border": "", "box-shadow": ""});
        $("#idFicha").css({"border": "", "box-shadow": ""});
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#beneficiarios-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarios-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la fecha que se realiza la atención y seguimiento psocológico. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#fechaIngreso").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Asesorias = false;
    } else if ($('#consecutivo').val() === "") {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#fechaIngreso").css({"border": "", "box-shadow": ""});
        $("#idFicha").css({"border": "", "box-shadow": ""});
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#beneficiarios-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarios-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el consecutivo de la asesoria y de clic en el boton buscar ficha socio familiar para buscar asesoría. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#consecutivo").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Asesorias = false;
    } else if ($('#idFicha').val() === "") {

        $("#fechaIngreso").css({"border": "", "box-shadow": ""});
        $("#beneficiarios-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarios-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el documento en el consecutivo y de clic en el boton buscar ficha socio familiar para buscar asesoría. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#consecutivo").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Asesorias = false;
    } else if (!document.getElementById('beneficiarios-0').checked && !document.getElementById('beneficiarios-1').checked) {

        $("#fechaIngreso").css({"border": "", "box-shadow": ""});
        $("#consecutivo").css({"border": "", "box-shadow": ""});
        $("#idFicha").css({"border": "", "box-shadow": ""});
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#beneficiarios-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarios-1").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el beneficiaro de la asesoria psicológico. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#beneficiarios-0").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        $("#beneficiarios-1").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Asesorias = false;
    } else {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#fechaIngreso").css({"border": "", "box-shadow": ""});
        $("#consecutivo").css({"border": "", "box-shadow": ""});
        $("#idFicha").css({"border": "", "box-shadow": ""});
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#beneficiarios-0").css({"border": "", "box-shadow": ""});
        $("#beneficiarios-1").css({"border": "", "box-shadow": ""});

        datosPaso1Asesorias = true;
    }
}

function validarDatosBeneficiario() {

    if ($('#tipoDocumentoBeneficiario').val() == 0) {

        $("#documentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiario").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiario").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiario").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiario").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiario").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiario").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el tipo de documento del beneficiario. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#tipoDocumentoBeneficiario").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiario = false;
    } else if ($('#documentoBeneficiario').val() === "") {

        $("#tipoDocumentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiario").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiario").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiario").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiario").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiario").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiario").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el numero de documento del beneficiario. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#documentoBeneficiario").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiario = false;
    } else if ($('#nombresBeneficiario').val() === "") {

        $("#tipoDocumentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#documentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiario").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiario").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiario").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiario").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiario").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el nombre del beneficiario. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#nombresBeneficiario").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiario = false;
    } else if ($('#apellidosBeneficiario').val() === "") {

        $("#tipoDocumentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#documentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiario").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiario").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiario").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiario").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiario").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese los apellidos del beneficiario. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#apellidosBeneficiario").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiario = false;
    } else if ($('#parentezcoBeneficiario').val() === "") {

        $("#tipoDocumentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#documentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiario").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiario").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiario").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiario").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiario").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiario").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el parentesco del beneficiario con el participante. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#parentezcoBeneficiario").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiario = false;
    } else if ($('#ocupacionBeneficiario').val() === "") {

        $("#tipoDocumentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#documentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiario").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiario").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiario").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiario").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiario").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiario").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la ocupación del beneficiario. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#ocupacionBeneficiario").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiario = false;
    } else if ($('#fechaNacimientoBeneficiario').val() === "") {

        $("#tipoDocumentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#documentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiario").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiario").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiario").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiario").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiario").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiario").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la fecha de nacimiento del beneficiario. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#fechaNacimientoBeneficiario").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiario = false;
    } else if ($('#edadBeneficiario').val() === "") {

        $("#tipoDocumentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#documentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiario").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiario").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiario").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiario").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiario").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la edad del beneficiario. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#edadBeneficiario").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiario = false;
    } else if ($('#direccionBeneficiario').val() === "") {

        $("#tipoDocumentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#documentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiario").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiario").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiario").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiario").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiario").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiario").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la dirección del beneficiario. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#direccionBeneficiario").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiario = false;
    } else if ($('#barrioBeneficiario').val() === "") {

        $("#tipoDocumentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#documentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiario").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiario").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiario").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiario").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiario").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el barrio de residencia del beneficiario. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#barrioBeneficiario").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiario = false;
    } else if ($('#telefonoBeneficiario').val() === "") {

        $("#tipoDocumentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#documentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiario").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiario").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiario").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiario").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiario").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiario").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el teléfono del beneficiario. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#telefonoBeneficiario").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiario = false;
    } else if ($('#tipoSeguridadBeneficiario').val() == 0) {

        $("#tipoDocumentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#documentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiario").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiario").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiario").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiario").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiario").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el tipo de seguridad del beneficiario. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#tipoSeguridadBeneficiario").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiario = false;
    } else if ($('#entidadBeneficiario').val() === "") {

        $("#tipoDocumentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#documentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiario").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiario").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiario").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiario").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiario").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la entidad prestadora de servicio del beneficiario. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#entidadBeneficiario").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosBeneficiario = false;
    } else {

        $("#tipoDocumentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#documentoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#nombresBeneficiario").css({"border": "", "box-shadow": ""});
        $("#apellidosBeneficiario").css({"border": "", "box-shadow": ""});
        $("#parentezcoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#ocupacionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#edadBeneficiario").css({"border": "", "box-shadow": ""});
        $("#direccionBeneficiario").css({"border": "", "box-shadow": ""});
        $("#barrioBeneficiario").css({"border": "", "box-shadow": ""});
        $("#telefonoBeneficiario").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadBeneficiario").css({"border": "", "box-shadow": ""});
        $("#entidadBeneficiario").css({"border": "", "box-shadow": ""});

        datosBeneficiario = true;
    }
}

function validarDatosPaso2Asesorias() {

    if ($('#motivo').val() === "") {

        $("#familiares").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese el motivo de la asesoria. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#motivo").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso2Asesorias = false;
    } else if ($('#familiares').val() === "") {

        $("#motivo").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese la conformación familiar de la persona. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#familiares").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso2Asesorias = false;
    } else {

        $("#motivo").css({"border": "", "box-shadow": ""});
        $("#familiares").css({"border": "", "box-shadow": ""});

        datosPaso2Asesorias = true;
    }
}

function validarDatosPaso4Asesorias() {

    if (!document.getElementById('estadoProceso-0').checked && !document.getElementById('estadoProceso-1').checked) {

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el estado en el que se encuentra el proceso. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#estadoProceso-0").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        $("#estadoProceso-1").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso4Asesorias = false;
    } else {

        $("#estadoProceso-0").css({"border": "", "box-shadow": ""});
        $("#estadoProceso-1").css({"border": "", "box-shadow": ""});

        datosPaso4Asesorias = true;
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