$(document).ready(function () {
   
    //llamado del las funciones para llenar las tablas.
    tabla();
    
    $("#fechaEntre").hide();
    $("#fechaPres").hide();


    //evento del boton guardar, Este evento captura toda la información del formulario usuarios pasando por la función validarDatosRegistro, 
    //la cual valida que los campo que son obligatorios su hayan sido diligenciados, al cumplir con los campos requeridos por medio de un 
    //Ajax es mandada esta información al controlador y el caso del controlador.
    $('#save').click(function () {


        if ($("#documento").val() === "") {
            
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'>Por favor ingrese el documento de quien se le realizara el prestamo. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#documento").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        
        }else if ($("#fechaDevolucion").val()=== ""){
            
            $("#documento").css({"border":"", "box-shadow": ""});
        
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Por favor seleccione la fecha de devolucion del articulo. </div>");
            $('#exampleconfirmacion').modal('show');
             
             $("#fechaDevolucion").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
             
        }else if ($("#codigo").val()=== ""){
            
            $("#fechaDevolucion").css({"border": "", "box-shadow": ""});
            $("#documento").css({"border": "", "box-shadow": ""});
        
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> ingrese la el codigo del articulo a prestar. </div>");
            $('#exampleconfirmacion').modal('show');
             
             $("#codigo").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});  
             
        
        } else {
            $("#codigo").css({"border": "", "box-shadow": ""});
            $("#fechaDevolucion").css({"border": "", "box-shadow": ""});
            $("#documento").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlPrestamoDevolucion.php?opcion=1",
                data: $("#frmPrestamoDevolucion").serialize(),
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

                        $("#frmPrestamoDevolucion").each(function () {
                            this.reset();
                        });

                        var oTable = $('#tblRol').dataTable();
                        oTable.fnDestroy();
                        tabla();
                    }
                }
            });
        }
    });

    //evento del boton nuevo el cual permite limpiar todo el formulario y restablecer las funciones.
    $('#return').click(function () {
        
        $("#documento").removeAttr("disabled");
        $("#codigo").removeAttr("disabled");
        $("#fechaDevolucion").removeAttr("disabled");    
       
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#codigo").css({"border": "", "box-shadow": ""});
        $("#fechaDevolucion").css({"border": "", "box-shadow": ""});
        
       

        $("#frmPrestamoDevolucion").each(function () {
            this.reset();
        });

        $("#save").show();
       
        
        
    });

    //evento del boton antualizar, Este evento captura toda la información del formulario usuarios pasando por la función validarDatosRegistro, 
    //la cual valida que los campo que son obligatorios su hayan sido diligenciados, al cumplir con los campos requeridos por medio de un 
    //Ajax es mandada esta información al controlador y el caso del controlador para realizar la actualización de la información.
    $('#update').click(function () {


        $("#LoadingImage").show();

        if ($("#idServicio").val() === "0") {
            
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Seleccione un Servicio. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#idServicio").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        
        }else if ($("#nombreActividad").val()=== ""){
            
            $("#idServicio").css({"border":"", "box-shadow": ""});
        
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> ingrese el Nombre de la actividad. </div>");
            $('#exampleconfirmacion').modal('show');
             
             $("#nombreActividad").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
             
        }else if ($("#fecha").val()=== ""){
            
            $("#idServicio").css({"border": "", "box-shadow": ""});
            $("#nombreActividad").css({"border": "", "box-shadow": ""});
        
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> ingrese la fecha en la que fue o sera realizada la Actividad. </div>");
            $('#exampleconfirmacion').modal('show');
             
             $("#fecha").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});  
             
        }else if ($("#hora").val()=== ""){
            
            $("#idServicio").css({"border": "", "box-shadow": ""});
            $("#nombreActividad").css({"border": "", "box-shadow": ""});
            $("#fecha").css({"border":" ", "box-shadow": " "});
        
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Seleccione la etapa del día en el que fue o será realizada la Actividad. </div>");
            $('#exampleconfirmacion').modal('show');
             
             $("#hora").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
             
        }else if ($("#estado").val()=== ""){
            
            $("#idServicio").css({"border": "", "box-shadow": ""});
            $("#nombreActividad").css({"border": "", "box-shadow": ""});
            $("#fecha").css({"border": "", "box-shadow": ""});
            $("#hora").css({"border": "", "box-shadow": ""});
            
        
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Seleccione un  estado para la actividad. </div>");
            $('#exampleconfirmacion').modal('show');
             
            $("#estado").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
            
        }else if ($("#descripcion").val()=== ""){
            
            $("#idServicio").css({"border": "", "box-shadow": ""});
            $("#nombreActividad").css({"border": "", "box-shadow": ""});
            $("#fecha").css({"border": "", "box-shadow": ""});
            $("#hora").css({"border": "", "box-shadow": ""});
            $("#estado").css({"border": "", "box-shadow": ""});
            
        
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> describa la actividad. </div>");
            $('#exampleconfirmacion').modal('show');
             
            $("#descripcion").css({"border": "2px solid red", "box-shadow": "0 0 3px red"}); 
        
        }else if ($("#objetivo").val()=== ""){
            
            $("#idServicio").css({"border": "", "box-shadow": ""});
            $("#nombreActividad").css({"border": "", "box-shadow": ""});
            $("#fecha").css({"border": "", "box-shadow": ""});
            $("#hora").css({"border": "", "box-shadow": ""});
            $("#estado").css({"border": "", "box-shadow": ""});
            $("#descripcion").css({"border": "", "box-shadow": ""});
            
        
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> describa el objetivo de la actividad. </div>");
            $('#exampleconfirmacion').modal('show');
             
            $("#objetivo").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
            
        } else {

            $("#LoadingImage").show();

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlActividadesLaboratorio.php?opcion=4",
                data: $("#frmActividades").serialize(),
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

                        $("#frmActividades").each(function () {
                            this.reset();
                        });

                        $("#save").show();
                        $("#modi").hide();
                        $("#update").hide();
                        $("#restore").hide();

                        var oTable = $('#tblRol').dataTable();
                        oTable.fnDestroy();
                        tabla();
                    }
                }
            });
        }
    });
    
    
    $('#tblRol').on('click', 'a.enable', function () {

        $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRol tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlPrestamoDevolucion.php?opcion=3",
            data: {idPrestamo: id},
            error: function (jqXHR, textStatus, errorThrown) {
                //*Ocurrió un eror en la petición ajax
                $("#LoadingImage").hide();
                console.log(textStatus + "\n" + errorThrown);
            },
            success: function (result) {
                $("#LoadingImage").hide();
                var data = eval('(' + result + ')');

                if (data.res === 'fail') {

                    var modal = $('#confirmacionRestablecer');
                    modal.find('.modal-title').text("Estado de devolución");
                    modal.find('#modal-message').html("<label >hubo un error");
                    $('#confirmacionRestablecer').modal('show');

                } else if (data.res === 'all') {
                    
                    var modal = $('#confirmacionRestablecer');
                    modal.find('.modal-title').text("Estado de devolución");
                    modal.find('#modal-message').html("<label > Si el estado del material cambio durante el prestamo; seleccione el estado en que fue devuelto.");
                    $('#confirmacionRestablecer').modal('show');

                    
                    $("#estadoActual").attr('disabled', 'disabled');
                    $("#nombre").attr('disabled', 'disabled');
                    
                    $("#idPrestamo2").val(data.row.IdPrestamo2);
                    $("#estadoActual").val(data.row.EstadoActual);
                    $("#estado").val(data.row.EstadoActual);
                    $("#nombre").val(data.row.Nombre);
                }
            }
        });
    });


$('#tblRol').on('click', 'a.enabl', function () {
    
    $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRol tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlPrestamoDevolucion.php?opcion=2",
            data: {idPrestamo: id},
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
                    modal.find('.modal-title').text(td[2].innerText + " " + td[1].innerText);
                    modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + "</div>");
                    $('#exampleconfirmacion').modal('show');

                    var oTable = $('#tblRol').dataTable();
                    oTable.fnDestroy();
                    tabla();
                }
            }
        });
    });
   $('#entregaMaterial').click(function(){     

        $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRol tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlPrestamoDevolucion.php?opcion=2",
            data: $("#frmEntrega").serialize(),
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
                    modal.find('.modal-title').text(td[2].innerText + " " + td[1].innerText);
                    modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + "</div>");
                    $('#exampleconfirmacion').modal('show');

                    var oTable = $('#tblRol').dataTable();
                    oTable.fnDestroy();
                    tabla();
                }
            }
        });
     });
});

function tabla() {

    $('#tblRol').dataTable({
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
        "sAjaxSource": "Laboratorio/consultarDatosTablaMaterialPrestado.php",
        "order": [[2, "asc"]],
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
            "sZeroRecords": "No hay articulos sin devolver",
            "sEmptyTable": "No hay registros",
            "sSearch": "B&uacute;squeda R&aacute;pida"
        }
    }).fnSetFilteringDelay(250);
}
function tomaAsistencia(actividad) {

    $.ajax({
        type: "POST",
        url: "../Controller/ctrlActividadesLaboratorio.php?opcion=6",
        data: {actividad: actividad},
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