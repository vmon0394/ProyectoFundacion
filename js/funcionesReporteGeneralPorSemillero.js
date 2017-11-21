$(document).ready(function () {

    //mantiene los paneles de los pasos 2,3,4 y 5 ocultos
    $("#paso2").hide();
    $("#titulo_adultos").hide();

    //evento que captura el clic al darle en paso 1 mostrado el formulario del paso 1
    $("#p1").click(function (e) {
        $(this).addClass('btn-success');
        $("#p2").removeClass('btn-success');
        $("#paso1").show();
        $("#paso2").hide();
        $("#titulo_ninos").show();
        $("#titulo_adultos").hide();
        e.preventDefault();
    });

    //evento que captura el clic al darle en paso 1 mostrado el formulario del paso 2
    $("#p2").click(function (e) {
        $(this).addClass('btn-success');
        $("#p1").removeClass('btn-success');
        $("#paso1").hide();
        $("#paso2").show();
        $("#titulo_ninos").hide();
        $("#titulo_adultos").show();
        e.preventDefault();
    });

    //código que me permite obtener la fecha del sistema y manipulas día, mes y año por separado; organizandolo en el formato que la persona requiera
    var hoy = new Date();
    var dd = hoy.getDate();
    var mm = hoy.getMonth() + 1; //hoy es 0!
    var yyyy = hoy.getFullYear();

    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }

    $("#ano").html(yyyy);
    $("#anoA").html(yyyy);

    $('#consult').click(function () {

        if ($('#semillero').val() != 0) {

            $("#semillero").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlReportesGeneralesFichas.php?opcion=2",
                data: $("#frmReporteGeneralSemillerosN").serialize(),
                error: function (jqXHR, textStatus, errorThrown) {
                    //*Ocurrió un eror en la petición ajax
                    $("#LoadingImage").hide();
                    console.log(textStatus + "\n" + errorThrown);
                },
                success: function (result) {
                    var data = eval('(' + result + ')');

                    if (data.res === 'fail') {

                        $("#LoadingImage").hide();
                        var modal = $('#exampleconfirmacion');
                        modal.find('.modal-title').text("Confirmación");
                        modal.find('#modal-message').html("<div style='color: red'>" + data.msg + " </div>");
                        $('#exampleconfirmacion').modal('show');

                    } else if (data.res === 'all') {

                        $("#LoadingImage").hide();

                        $("#totalParticipantes").val(data.row.Participantes);
                        $("#activos").val(data.row.NinosActivos);
                        $("#inactivos").val(data.row.NinosInactivos);
                        $("#hombres").val(data.row.NinosHombres);
                        $("#mujeres").val(data.row.NinosMujeres);
                        $("#total").val(data.row.NinosRegistrosDelAno);

                        //Div
                        $("#rangoEdades").html(data.row.RangoEdades);
                        $("#rangoGrados").html(data.row.RangoGrados);
                        $("#aceleracion").val(data.row.GradoAceleracion);
                        $("#noEstudia").val(data.row.NoEstudia);
                        $("#rangoAnosPermanencia").html(data.row.RangoAnosPermanencia);

                        $("#ampliada").val(data.row.Ampliada);
                        $("#extensa").val(data.row.Extensa);
                        $("#extensaSinPadre").val(data.row.ExtensaAusenciaPadre);
                        $("#extensaSinMadre").val(data.row.ExtensaAusenciaMadre);
                        $("#extensaSinPadres").val(data.row.ExtensaSinPadres);
                        $("#monoparentalMadre").val(data.row.MonoparentalMadre);
                        $("#monoparentalPadre").val(data.row.MonoparentalPadre);
                        $("#nuclear").val(data.row.Nuclear);
                        $("#nuclearMadrastra").val(data.row.NuclearMadrastra);
                        $("#nuclearPadrastro").val(data.row.NuclearPadrastro);
                        $("#simultanea").val(data.row.Simultanea);
                        $("#desplazados").val(data.row.Desplazados);
                        $("#conRegistro").val(data.row.DesplazadosConRegistro);
                        $("#sinRegistro").val(data.row.DesplazadosSinRegistro);
                        $("#victimas").val(data.row.Victimas);
                        $("#victimasConRegistro").val(data.row.VictimasConRegistro);
                        $("#victimasSinRegistro").val(data.row.VictimasSinRegistro);
                        $("#afrodescendiente").val(data.row.Afrodescendiente);
                        $("#mestizos").val(data.row.Mestizo);
                        $("#indigena").val(data.row.Indigena);
                        $("#discapacitados").val(data.row.NumeroConDiscapacidad);
                        $("#cognitiva").val(data.row.Cognitiva);
                        $("#fisica").val(data.row.Fisica);
                        $("#sensorial").val(data.row.Sensorial);
                        $("#psiquica").val(data.row.Psiquica);
                        $("#familiaresEmpresa").val(data.row.FamiliaresEmpresa);
                        $("#contratista").val(data.row.Contratista);
                        $("#directa").val(data.row.Directa);
                        $("#icc").val(data.row.IndustrialCC);
                        $("#cc").val(data.row.ConstructoraCC);
                        $("#otrosSemilleros").val(data.row.OtrosSemilleros);
                        $("#otrosServicios").val(data.row.OtrosServicios);
                    }
                }
            });
        } else {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html(" <div style='color: red'> Seleccione el semillero al que se va a registrar la ficha del niño. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#semillero").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

            reporteFichasNinos(yyyy);
            reporteFichasAdultos(yyyy);
        }
    });

    $('#consultA').click(function () {

        if ($('#semilleroA').val() != 0) {

            $("#semilleroA").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlReportesGeneralesFichas.php?opcion=4",
                data: $("#frmReporteGeneralSemillerosA").serialize(),
                error: function (jqXHR, textStatus, errorThrown) {
                    //*Ocurrió un eror en la petición ajax
                    $("#LoadingImage").hide();
                    console.log(textStatus + "\n" + errorThrown);
                },
                success: function (result) {
                    var data = eval('(' + result + ')');

                    if (data.res === 'fail') {

                        $("#LoadingImage").hide();
                        var modal = $('#exampleconfirmacion');
                        modal.find('.modal-title').text("Confirmación");
                        modal.find('#modal-message').html("<div style='color: red'>" + data.msg + " </div>");
                        $('#exampleconfirmacion').modal('show');

                    } else if (data.res === 'all') {

                        $("#LoadingImage").hide();

                        $("#totalParticipantesA").val(data.row.Participantes);
                        $("#activosA").val(data.row.NinosActivos);
                        $("#inactivosA").val(data.row.NinosInactivos);
                        $("#hombresA").val(data.row.NinosHombres);
                        $("#mujeresA").val(data.row.NinosMujeres);
                        $("#totalA").val(data.row.NinosRegistrosDelAno);

                        //Div
                        $("#rangoEdadesA").html(data.row.RangoEdades);
                        $("#rangoAnosPermanenciaA").html(data.row.RangoAnosPermanencia);

                        $("#ampliadaA").val(data.row.Ampliada);
                        $("#extensaA").val(data.row.Extensa);
                        $("#extensaSinPadreA").val(data.row.ExtensaAusenciaPadre);
                        $("#extensaSinMadreA").val(data.row.ExtensaAusenciaMadre);
                        $("#extensaSinPadresA").val(data.row.ExtensaSinPadres);
                        $("#monoparentalMadreA").val(data.row.MonoparentalMadre);
                        $("#monoparentalPadreA").val(data.row.MonoparentalPadre);
                        $("#nuclearA").val(data.row.Nuclear);
                        $("#nuclearMadrastraA").val(data.row.NuclearMadrastra);
                        $("#nuclearPadrastroA").val(data.row.NuclearPadrastro);
                        $("#simultaneaA").val(data.row.Simultanea);
                        $("#desplazadosA").val(data.row.Desplazados);
                        $("#conRegistroA").val(data.row.DesplazadosConRegistro);
                        $("#sinRegistroA").val(data.row.DesplazadosSinRegistro);
                        $("#victimasA").val(data.row.Victimas);
                        $("#victimasConRegistroA").val(data.row.VictimasConRegistro);
                        $("#victimasSinRegistroA").val(data.row.VictimasSinRegistro);
                        $("#afrodescendienteA").val(data.row.Afrodescendiente);
                        $("#mestizosA").val(data.row.Mestizo);
                        $("#indigenaA").val(data.row.Indigena);
                        $("#discapacitadosA").val(data.row.NumeroConDiscapacidad);
                        $("#cognitivaA").val(data.row.Cognitiva);
                        $("#fisicaA").val(data.row.Fisica);
                        $("#sensorialA").val(data.row.Sensorial);
                        $("#psiquicaA").val(data.row.Psiquica);
                        $("#familiaresEmpresaA").val(data.row.FamiliaresEmpresa);
                        $("#contratistaA").val(data.row.Contratista);
                        $("#directaA").val(data.row.Directa);
                        $("#iccA").val(data.row.IndustrialCC);
                        $("#ccA").val(data.row.ConstructoraCC);
                    }
                }
            });
        } else {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html(" <div style='color: red'> Seleccione el semillero al que se va a registrar la ficha del niño. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#semillero").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        }
    });
});