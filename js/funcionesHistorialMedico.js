$(document).ready(function () {

    tabla();
    tabla2();

    $("#tipoRegistro").change(function (e) {

        if ($("#tipoRegistro").val() == 0) {

            $("#nombreTipo").html("<h3>Asesorías y Consultorías</h3>");

            $("#historialParticipante").hide();
            $("#consultoriaParticipante").hide();
            $("#listadoHistorias").show();

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

            $("#historialParticipante").show();
            $("#consultoriaParticipante").hide();
            $("#listadoHistorias").hide();
            $("#nombreTipo").html("<h3>Atención y Seguimiento Participante</h3>");

            $("#frmAsesoriaParticipante").each(function () {
                this.reset();
            });

//            $("input:radio[name=beneficiarios]:checked").prop("checked", false);
            $("#datosBeneficiario").hide();
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

            $("#historialParticipante").hide();
            $("#consultoriaParticipante").show();
            $("#listadoHistorias").hide();

            $("#nombreTipo").html("<h3>Consultoría Participante</h3>");

            $("#frmConsultoriaParticipante").each(function () {
                this.reset();
            });

//            $("input:radio[name=beneficiarioC]:checked").prop("checked", false);
            $("#datosBeneficiarioC").hide();
            $("#divLimpiarConsultoria").hide();
        }
        e.preventDefault();
    });

    //Imprimir Asesoría
    $('#verImprimirAsesoria').click(function () {

        if ($("#idAsesoria").val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe registrar la asesoría.</div>");
            $('#exampleconfirmacion').modal('show');
        } else {

            $("#LoadingImage").show();
            var link = "visualizarImpresionAsesoria.php?asesoria=" + $("#idAsesoria").val();
            var left = (screen.width / 2) - (1024 / 2);
            var top = (screen.height / 2) - (800 / 2);
            $("#LoadingImage").hide();
            var ventana = window.open(link, 'mywindow', 'toolbar=0,titlebar=0,menubar=0,location=0,resizable=0,width=1024,height=800');
            ventana.focus();
            ventana.moveTo(left, top);
        }
    });
    
    //Imprimir Consultoria
    $('#verImprimirConsultoria').click(function () {

        if ($("#idConsultoria").val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe registrar la consultoría.</div>");
            $('#exampleconfirmacion').modal('show');
        } else {

            $("#LoadingImage").show();
            var link = "visualizarImpresionConsultoria.php?consultoria=" + $("#idConsultoria").val();
            var left = (screen.width / 2) - (1024 / 2);
            var top = (screen.height / 2) - (800 / 2);
            $("#LoadingImage").hide();
            var ventana = window.open(link, 'mywindow', 'toolbar=0,titlebar=0,menubar=0,location=0,resizable=0,width=1024,height=800');
            ventana.focus();
            ventana.moveTo(left, top);
        }
    });

    $('#imprimirAsesoria').click(function () {

        $("#imprimirAsesoria").hide();
        window.print();
        $("#imprimirAsesoria").show();
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
        "sAjaxSource": "HistoriaClinica/consultarDatosTablaHistoriaClinicaAsesoria.php",
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
        "sAjaxSource": "HistoriaClinica/consultarDatosTablaHistoriaClinicaConsultoria.php",
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

function imprimirAsesoria(asesoria) {

    $.ajax({
        type: "POST",
        url: "../Controller/ctrlHistoriaClinica.php?opcion=6",
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
                $("#motivo").html(data.row.MotivoConsulta);
                $("#antecedentes").html(data.row.AntecedentesFamiliares);
                $("#familiares").html(data.row.ConformacionFamiliar);
                $("#conflictos").html(data.row.Conflictos);
                $("#metas").html(data.row.MetasTerapeuticas);
                $("#logros").html(data.row.Logros);
                $("#pruebas").html(data.row.PruebasAplicadas);

                var remision = data.row.Remisiones;
                var VectorRemision = remision.split(";");
                for (var i = 0; i < VectorRemision.length; i++) {

                    var PD = $("input:checkbox[name='remision[]'][value='" + VectorRemision[i] + "']");
                    $(PD).prop("checked", "checked");
                }

                $("#motivoRemisione").html(data.row.MotivoRemisiones);

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

                $("#tblSeguimientos").append(data.row.TblSeguimientos);
                $("#nombrePsicologo").html(data.row.Psicologa);
                $("#targetaProfe").html(data.row.TarjetaProfecional);

            }
        }
    });
}

function imprimirConsultoria(consultoria) {

    $.ajax({
        type: "POST",
        url: "../Controller/ctrlHistoriaClinica.php?opcion=6",
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
                $("#motivo").html(data.row.MotivoConsulta);
                $("#antecedentes").html(data.row.AntecedentesFamiliares);
                $("#familiares").html(data.row.ConformacionFamiliar);

                var remision = data.row.Remisiones;
                var VectorRemision = remision.split(";");
                for (var i = 0; i < VectorRemision.length; i++) {

                    var PD = $("input:checkbox[name='remision[]'][value='" + VectorRemision[i] + "']");
                    $(PD).prop("checked", "checked");
                }

                $("#motivoRemisione").html(data.row.MotivoRemisiones);

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

                $("#tblSeguimientos").append(data.row.TblSeguimientos);
                $("#nombrePsicologo").html(data.row.Psicologa);
                $("#targetaProfe").html(data.row.TarjetaProfecional);

            }
        }
    });
}