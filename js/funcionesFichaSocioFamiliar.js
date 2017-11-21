$(document).ready(function () {

    //Se utiliza la funcion change() nativa de JavaScript para capturar el evento del clic
    $("#tipoRegistro").change(function () {

        if ($("#tipoRegistro").val() === "Niño") {

            $("#fichaSocioFamiliarNinos").show();
            $("#fichaSocioFamiliarAdultos").hide();
            $("#fichaVoluntariosEgresados").hide();
            $("#nombreTipo").html("<h3>Registro Ficha Niños</h3>");

            $("#p1").addClass('btn-success');
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

            $("#frmFichaSocioFamiliarNinos").each(function () {
                this.reset();
            });

            $("#edad").attr('disabled', 'disabled');

        } else if ($("#tipoRegistro").val() === "Adulto") {

            $("#fichaSocioFamiliarNinos").hide();
            $("#fichaSocioFamiliarAdultos").show();
            $("#fichaVoluntariosEgresados").hide();
            $("#nombreTipo").html("<h3>Registro Ficha Adultos</h3>");

            $("#Ap1").addClass('btn-success');
            $("#Ap2").removeClass('btn-success');
            $("#Ap3").removeClass('btn-success');
            $("#Ap4").removeClass('btn-success');
            $("#Ap5").removeClass('btn-success');
            $("#Ap6").removeClass('btn-success');
            $("#Apaso1").show();
            $("#Apaso2").hide();
            $("#Apaso3").hide();
            $("#Apaso4").hide();
            $("#Apaso5").hide();
            $("#Apaso6").hide();

            $("#frmFichaSocioFamiliarAdultos").each(function () {
                this.reset();
            });

            $("#edadAdulto").attr('disabled', 'disabled');

        } else if ($("#tipoRegistro").val() === "Egresados") {

            $("#fichaSocioFamiliarNinos").hide();
            $("#fichaSocioFamiliarAdultos").hide();
            $("#fichaVoluntariosEgresados").show();
            $("#nombreTipo").html("<h3>Registro Egresados</h3>");

            $("#VEp1").addClass('btn-success');
            $("#VEp2").removeClass('btn-success');
            $("#VEp3").removeClass('btn-success');
            $("#VEp4").removeClass('btn-success');
            $("#VEp5").removeClass('btn-success');
            $("#VEp6").removeClass('btn-success');
            $("#VEpaso1").show();
            $("#VEpaso2").hide();
            $("#VEpaso3").hide();
            $("#VEpaso4").hide();
            $("#VEpaso5").hide();
            $("#VEpaso6").hide();

            $("#frmFichaVoluntariosEgresados").each(function () {
                this.reset();
            });

            $("#edadVolunEgres").attr('disabled', 'disabled');

        } else if ($("#tipoRegistro").val() === "VoluntariosEx") {

            $("#fichaSocioFamiliarNinos").hide();
            $("#fichaSocioFamiliarAdultos").hide();
            $("#fichaVoluntariosEgresados").show();
            $("#nombreTipo").html("<h3>Registro Voluntarios Externos</h3>");

            $("#VEp1").addClass('btn-success');
            $("#VEp2").removeClass('btn-success');
            $("#VEp3").removeClass('btn-success');
            $("#VEp4").removeClass('btn-success');
            $("#VEp5").removeClass('btn-success');
            $("#VEp6").removeClass('btn-success');
            $("#VEpaso1").show();
            $("#VEpaso2").hide();
            $("#VEpaso3").hide();
            $("#VEpaso4").hide();
            $("#VEpaso5").hide();
            $("#VEpaso6").hide();

            $("#frmFichaVoluntariosEgresados").each(function () {
                this.reset();
            });

            $("#edadVolunEgres").attr('disabled', 'disabled');

        }
    });
});