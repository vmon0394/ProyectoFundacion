$(document).ready(function () {

    tabla();
    tabla2();

    $("#tipoRegistro").change(function (e) {

        if ($("#tipoRegistro").val() == 0) {

            $("#nombreTipo").html("<h3>Asesorías y Consultorías</h3>");

            $("#historialExterno").hide();
            $("#consultoriaExterno").hide();
            $("#listadoHistoriasExterno").show();

        } else if ($("#tipoRegistro").val() === "Asesoria") {

            $("#tipoRegistro").css({"border": "", "box-shadow": ""});

            $("#p1").addClass('btn-success');
            $("#p2").removeClass('btn-success');
            $("#p3").removeClass('btn-success');
            $("#p4").removeClass('btn-success');
            $("#p5").removeClass('btn-success');
            $("#paso1").show();
            $("#paso2").hide();
            $("#paso3").hide();
            $("#paso4").hide();
            $("#paso5").hide();

            $("#historialExterno").show();
            $("#consultoriaExterno").hide();
            $("#listadoHistoriasExterno").hide();
            $("#nombreTipo").html("<h3>Atención y Seguimiento - Personal Externo</h3>");

            $("#frmAsesoriaExterno").each(function () {
                this.reset();
            });

            $("#divLimpiarAsesoria").hide();
        } else if ($("#tipoRegistro").val() === "Consultoria") {

            $("#tipoRegistro").css({"border": "", "box-shadow": ""});

            $("#p1C").addClass('btn-success');
            $("#p2C").removeClass('btn-success');
            $("#p3C").removeClass('btn-success');
            $("#p4C").removeClass('btn-success');
            $("#paso1C").show();
            $("#paso2C").hide();
            $("#paso3C").hide();
            $("#paso4C").hide();

            $("#historialExterno").hide();
            $("#consultoriaExterno").show();
            $("#listadoHistoriasExterno").hide();

            $("#nombreTipo").html("<h3>Consultoría - Personal Externo</h3>");

            $("#frmConsultoriaExterno").each(function () {
                this.reset();
            });

            $("#divLimpiarConsultoria").hide();
        }
        e.preventDefault();
    });

    //Imprimir Asesoría
    $('#verImprimirAsesoriaExterno').click(function () {

        if ($("#idAsesoriaExterno").val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe registrar la asesoría.</div>");
            $('#exampleconfirmacion').modal('show');
        } else {

            $("#LoadingImage").show();
            var link = "visualizarImpresionAsesoriaExternos.php?asesoria=" + $("#idAsesoriaExterno").val();
            var left = (screen.width / 2) - (1024 / 2);
            var top = (screen.height / 2) - (800 / 2);
            $("#LoadingImage").hide();
            var ventana = window.open(link, 'mywindow', 'toolbar=0,titlebar=0,menubar=0,location=0,resizable=0,width=1024,height=800');
            ventana.focus();
            ventana.moveTo(left, top);
        }
    });

    //Imprimir Consultoria
    $('#verImprimirConsultoriaExterno').click(function () {

        if ($("#idConsultoriaExterno").val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe registrar la consultoría.</div>");
            $('#exampleconfirmacion').modal('show');
        } else {

            $("#LoadingImage").show();
            var link = "visualizarImpresionConsultoriaExternos.php?consultoria=" + $("#idConsultoriaExterno").val();
            var left = (screen.width / 2) - (1024 / 2);
            var top = (screen.height / 2) - (800 / 2);
            $("#LoadingImage").hide();
            var ventana = window.open(link, 'mywindow', 'toolbar=0,titlebar=0,menubar=0,location=0,resizable=0,width=1024,height=800');
            ventana.focus();
            ventana.moveTo(left, top);
        }
    });

    $('#imprimirAsesoriaExt').click(function () {

        $("#imprimirAsesoriaExt").hide();
        window.print();
        $("#imprimirAsesoriaExt").show();
    });
});

function tabla() {

    $('#tblRol1').dataTable({
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
        "sAjaxSource": "HistoriaClinicaInternos/consultarDatosTablaHistoriaClinicaAsesoria.php",
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

function tabla2() {

    $('#tblRol2').dataTable({
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
        "sAjaxSource": "HistoriaClinicaInternos/consultarDatosTablaHistoriaClinicaConsultoria.php",
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

function imprimirAsesoriaExternos(asesoria) {

    $.ajax({
        type: "POST",
        url: "../Controller/ctrlHistoriaClinicaExternos.php?opcion=7",
        data: {idHistoria: asesoria},
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

            } else if (data.res === 'exis') {

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
                $("#motivoEx").html(data.row.MotivoConsulta);
                $("#antecedentesEx").html(data.row.AntecedentesFamiliares);
                $("#familiaresEx").html(data.row.ConformacionFamiliar);

                $("#conflictosEx").html(data.row.Conflictos);
                $("#metasEx").html(data.row.MetasTerapeuticas);
                $("#logrosEx").html(data.row.Logros);
                $("#pruebasEx").html(data.row.PruebasAplicadas);

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

                $("#motivoRemisioneEx").html(data.row.MotivoRemisiones);

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

                $("#tblSeguimientos").append(data.row.TblSeguimientos);
                $("#nombrePsicologo").html(data.row.Psicologa);
                $("#targetaProfe").html(data.row.TarjetaProfecional);

            }
        }
    });
}

function imprimirConsultoriaExternos(consultoria) {

    $.ajax({
        type: "POST",
        url: "../Controller/ctrlHistoriaClinicaExternos.php?opcion=7",
        data: {idHistoria: consultoria},
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

            } else if (data.res === 'exis') {

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
                $("#motivoEx").html(data.row.MotivoConsulta);
                $("#antecedentesEx").html(data.row.AntecedentesFamiliares);
                $("#familiaresEx").html(data.row.ConformacionFamiliar);

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

                $("#motivoRemisioneEx").html(data.row.MotivoRemisiones);

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

                $("#tblSeguimientos").append(data.row.TblSeguimientos);
                $("#nombrePsicologo").html(data.row.Psicologa);
                $("#targetaProfe").html(data.row.TarjetaProfecional);

            }
        }
    });
}