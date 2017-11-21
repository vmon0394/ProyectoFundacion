$(document).ready(function(){
    $("#tipo").select2();
    $("#ocul").hide();
    
//   $('#consultar').click(function () {
//       
//        
//        var modal = $('#confirmacionRestablecer');
//        modal.find('.modal-title').text("Retablecer Cuenta");
//        modal.find('#modal-message').html("hola");
//        $('#confirmacionRestablecer').modal('show');
//
//   });
    
        if ($('#tipo').val() == 0) {

            $("#semillero").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlReportePrestamos.php?opcion=1",
                data: $("#frmReportePrestamos").serialize(),
                error: function (jqXHR, textStatus, errorThrown) {
                    //*OcurriÃ³ un eror en la peticiÃ³n ajax
                    $("#LoadingImage").hide();
                    console.log(textStatus + "\n" + errorThrown);
                },
                success: function (result) {
                    var data = eval('(' + result + ')');

                    if (data.res === 'fail') {

                        $("#LoadingImage").hide();
                        var modal = $('#exampleconfirmacion');
                        modal.find('.modal-title').text("ConfirmaciÃ³n");
                        modal.find('#modal-message').html("<div style='color: red'>" + data.msg + " </div>");
                        $('#exampleconfirmacion').modal('show');

                    } else if (data.res === 'all') {

                        $("#LoadingImage").hide();
                        
                        $("#totalParticipantes").attr('disabled', 'disabled');
                        $("#participantesActivos").attr('disabled', 'disabled');
                        $("#participantesInactivos").attr('disabled', 'disabled');
                        $("#otrosSemilleros").attr('disabled', 'disabled');
                        $("#menores").attr('disabled', 'disabled');
                        $("#mayores").attr('disabled', 'disabled');
                        $("#instituciones").attr('disabled', 'disabled');
                        $("#semilleros").attr('disabled', 'disabled');
                        $("#totalServicios").attr('disabled', 'disabled');
                        $("#activosServicios").attr('disabled', 'disabled');
                        $("#inactivosServicios").attr('disabled', 'disabled');
                        $("#total").attr('disabled', 'disabled');
                        $("#a").attr('disabled', 'disabled');
                        $("#b").attr('disabled', 'disabled');
                        $("#c").attr('disabled', 'disabled');
                        $("#d").attr('disabled', 'disabled');
                        $("#e").attr('disabled', 'disabled');
                        $("#f").attr('disabled', 'disabled');
                        $("#g").attr('disabled', 'disabled');
                        $("#h").attr('disabled', 'disabled');
                        $("#i").attr('disabled', 'disabled');
                        $("#j").attr('disabled', 'disabled');
                        $("#k").attr('disabled', 'disabled');
                        
                        
                        //Datos de los participantes
                        $("#totalParticipantes").val(data.row.TotalParticipantes);
                        $("#participantesActivos").val(data.row.ParticipantesActivos);
                        $("#participantesInactivos").val(data.row.ParticipantesInactivos);
                        $("#otrosSemilleros").val(data.row.OtrosSemilleros);
                        $("#menores").val(data.row.Menores);
                        $("#mayores").val(data.row.Mayores);
                        $("#instituciones").val(data.row.Instituciones);
                        $("#semilleros").val(data.row.Semilleros);
                        
                        // Datos de los servicios
                        $("#totalServicios").val(data.row.TotalServicios);
                        $("#activosServicios").val(data.row.ActivosServicios);
                        $("#inactivosServicios").val(data.row.InactivosServicios);
                        $("#servics").val(data.row.ServisiosAsis);
                        
                        // Datos del inventario 
                        $("#total").val(data.row.Total);
                        $("#a").val(data.row.Activos);
                        $("#b").val(data.row.Inactivos);
                        $("#c").val(data.row.Buenos);
                        $("#d").val(data.row.Incompletos);
                        $("#e").val(data.row.Regulares);
                        $("#f").val(data.row.Obsoletos);
                        
                        // Datos prestamos
                        $("#g").val(data.row.Prestamos);
                        $("#h").val(data.row.Pactivos);
                        $("#i").val(data.row.Pinactivos);
                        $("#j").val(data.row.MaxP);
                        $("#k").val(data.row.MinP);
                    }
                }
            });
        } else {
            $("#total").attr('disabled', 'disabled');
            $("#a").attr('disabled', 'disabled');
            $("#b").attr('disabled', 'disabled');
            $("#c").attr('disabled', 'disabled');
            $("#d").attr('disabled', 'disabled');
            $("#e").attr('disabled', 'disabled');
            $("#f").attr('disabled', 'disabled'); 
        }
    $('#tipo').change(function (e){ 
        if($("#tipo").val==0){
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlReportePrestamos.php?opcion=1",
                data: $("#frmReportePrestamos").serialize(),
                error: function (jqXHR, textStatus, errorThrown) {
                    //*OcurriÃ³ un eror en la peticiÃ³n ajax
                    $("#LoadingImage").hide();
                    console.log(textStatus + "\n" + errorThrown);
                },
                success: function (result) {
                    var data = eval('(' + result + ')');

                    if (data.res === 'fail') {

                        $("#LoadingImage").hide();
                        var modal = $('#exampleconfirmacion');
                        modal.find('.modal-title').text("ConfirmaciÃ³n");
                        modal.find('#modal-message').html("<div style='color: red'>" + data.msg + " </div>");
                        $('#exampleconfirmacion').modal('show');

                    } else if (data.res === 'all') {

                        $("#LoadingImage").hide();
                        
                        $("#totalParticipantes").attr('disabled', 'disabled');
                        $("#participantesActivos").attr('disabled', 'disabled');
                        $("#participantesInactivos").attr('disabled', 'disabled');
                        $("#otrosSemilleros").attr('disabled', 'disabled');
                        $("#menores").attr('disabled', 'disabled');
                        $("#mayores").attr('disabled', 'disabled');
                        $("#instituciones").attr('disabled', 'disabled');
                        $("#semilleros").attr('disabled', 'disabled');
                        $("#totalServicios").attr('disabled', 'disabled');
                        $("#activosServicios").attr('disabled', 'disabled');
                        $("#inactivosServicios").attr('disabled', 'disabled');
                        $("#total").attr('disabled', 'disabled');
                        $("#a").attr('disabled', 'disabled');
                        $("#b").attr('disabled', 'disabled');
                        $("#c").attr('disabled', 'disabled');
                        $("#d").attr('disabled', 'disabled');
                        $("#e").attr('disabled', 'disabled');
                        $("#f").attr('disabled', 'disabled');
                        $("#g").attr('disabled', 'disabled');
                        $("#h").attr('disabled', 'disabled');
                        $("#i").attr('disabled', 'disabled');
                        $("#j").attr('disabled', 'disabled');
                        $("#k").attr('disabled', 'disabled');
                        
                        
                        //Datos de los participantes
                        $("#totalParticipantes").val(data.row.TotalParticipantes);
                        $("#participantesActivos").val(data.row.ParticipantesActivos);
                        $("#participantesInactivos").val(data.row.ParticipantesInactivos);
                        $("#otrosSemilleros").val(data.row.OtrosSemilleros);
                        $("#menores").val(data.row.Menores);
                        $("#mayores").val(data.row.Mayores);
                        $("#instituciones").val(data.row.Instituciones);
                        $("#semilleros").val(data.row.Semilleros);
                        
                        // Datos de los servicios
                        $("#totalServicios").val(data.row.TotalServicios);
                        $("#activosServicios").val(data.row.ActivosServicios);
                        $("#inactivosServicios").val(data.row.InactivosServicios);
                        
                        // Datos del inventario 
                        $("#total").val(data.row.Total);
                        $("#a").val(data.row.Activos);
                        $("#b").val(data.row.Inactivos);
                        $("#c").val(data.row.Buenos);
                        $("#d").val(data.row.Incompletos);
                        $("#e").val(data.row.Regulares);
                        $("#f").val(data.row.Obsoletos);
                        
                        // Datos prestamos
                        $("#g").val(data.row.Prestamos);
                        $("#h").val(data.row.Pactivos);
                        $("#i").val(data.row.Pinactivos);
                        $("#j").val(data.row.MaxP);
                        $("#k").val(data.row.MinP);
                    }
                }
            });
        }else if($("#tipo").val==1){
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlReportePrestamos.php?opcion=1",
                data: $("#frmReportePrestamos").serialize(),
                error: function (jqXHR, textStatus, errorThrown) {
                    //*OcurriÃ³ un eror en la peticiÃ³n ajax
                    $("#LoadingImage").hide();
                    console.log(textStatus + "\n" + errorThrown);
                },
                success: function (result) {
                    var data = eval('(' + result + ')');

                    if (data.res === 'fail') {

                        $("#LoadingImage").hide();
                        var modal = $('#exampleconfirmacion');
                        modal.find('.modal-title').text("ConfirmaciÃ³n");
                        modal.find('#modal-message').html("<div style='color: red'>" + data.msg + " </div>");
                        $('#exampleconfirmacion').modal('show');

                    } else if (data.res === 'all') {

                        $("#LoadingImage").hide();
                        
                        $("#totalParticipantes").attr('disabled', 'disabled');
                        $("#participantesActivos").attr('disabled', 'disabled');
                        $("#participantesInactivos").attr('disabled', 'disabled');
                        $("#otrosSemilleros").attr('disabled', 'disabled');
                        $("#menores").attr('disabled', 'disabled');
                        $("#mayores").attr('disabled', 'disabled');
                        $("#instituciones").attr('disabled', 'disabled');
                        $("#semilleros").attr('disabled', 'disabled');
                        $("#totalServicios").attr('disabled', 'disabled');
                        $("#activosServicios").attr('disabled', 'disabled');
                        $("#inactivosServicios").attr('disabled', 'disabled');
                        $("#total").attr('disabled', 'disabled');
                        $("#a").attr('disabled', 'disabled');
                        $("#b").attr('disabled', 'disabled');
                        $("#c").attr('disabled', 'disabled');
                        $("#d").attr('disabled', 'disabled');
                        $("#e").attr('disabled', 'disabled');
                        $("#f").attr('disabled', 'disabled');
                        $("#g").attr('disabled', 'disabled');
                        $("#h").attr('disabled', 'disabled');
                        $("#i").attr('disabled', 'disabled');
                        $("#j").attr('disabled', 'disabled');
                        $("#k").attr('disabled', 'disabled');
                        
                        
                        //Datos de los participantes
//                        $("#totalParticipantes").val(data.row.TotalParticipantes);
//                        $("#participantesActivos").val(data.row.ParticipantesActivos);
                        $("#participantesInactivos").val(data.row.ParticipantesInactivos);
                        $("#otrosSemilleros").val(data.row.OtrosSemilleros);
                        $("#menores").val(data.row.Menores);
                        $("#mayores").val(data.row.Mayores);
                        $("#instituciones").val(data.row.Instituciones);
                        $("#semilleros").val(data.row.Semilleros);
                        
                        // Datos de los servicios
                        $("#totalServicios").val(data.row.TotalServicios);
                        $("#activosServicios").val(data.row.ActivosServicios);
                        $("#inactivosServicios").val(data.row.InactivosServicios);
                        
                        // Datos del inventario 
                        $("#total").val(data.row.Total);
                        $("#a").val(data.row.Activos);
                        $("#b").val(data.row.Inactivos);
                        $("#c").val(data.row.Buenos);
                        $("#d").val(data.row.Incompletos);
                        $("#e").val(data.row.Regulares);
                        $("#f").val(data.row.Obsoletos);
                        
                        // Datos prestamos
                        $("#g").val(data.row.Prestamos);
                        $("#h").val(data.row.Pactivos);
                        $("#i").val(data.row.Pinactivos);
                        $("#j").val(data.row.MaxP);
                        $("#k").val(data.row.MinP);
                    }
                }
            });
        }
    });



});