$(document).ready(function () {
   
    //llamado del las funciones para llenar las tablas.
    tabla();


    //evento del boton guardar, Este evento captura toda la información del formulario usuarios pasando por la función validarDatosRegistro, 
    //la cual valida que los campo que son obligatorios su hayan sido diligenciados, al cumplir con los campos requeridos por medio de un 
    //Ajax es mandada esta información al controlador y el caso del controlador.
    $('#save').click(function () {


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
            $("#idServicio").css({"border": "", "box-shadow": ""});
            $("#nombreActividad").css({"border": "", "box-shadow": ""});
            $("#fecha").css({"border": "", "box-shadow": ""});
            $("#hora").css({"border": "", "box-shadow": ""});
            $("#estado").css({"border": "", "box-shadow": ""});
            $("#descripcion").css({"border": "", "box-shadow": ""});
            $("#objetivo").css({"border":" ", "box-shadow": " "});

            $("#LoadingImage").show();

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlActividadesLaboratorio.php?opcion=1",
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
                        modal.find('.modal-title').text("Registro exitoso.");
                        modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + " </div>");
                        $('#exampleconfirmacion').modal('show');

                        $("#frmActividades").each(function () {
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

    //evento del boton consultar de la tabla usuarios existentes, Este evento captura el id de la fila en la que se encuentra el registro 
    //que se ha seleccionado, luego por Ajax en mandado este dato al controlador con el numero del caso a ejecutar para traer toda la 
    //información del registro seleccionado.
    
    $('#tblRol').on('click', 'a.consult', function () {

        $("#LoadingImage").show();

        $("#idServicio").css({"border": "", "box-shadow": ""});
        $("#nombreActividad").css({"border": "", "box-shadow": ""});
        $("#fecha").css({"border": "", "box-shadow": ""});
        $("#idValor").css({"border": "", "box-shadow": ""});
        $("#hora").css({"border": "", "box-shadow": ""});
        $("#estado").css({"border": "", "box-shadow": ""});
        $("#descripcion").css({"border": "", "box-shadow": ""});
        $("#objetivo").css({"border":" ", "box-shadow": " "});
        $("#logros").css({"border": "", "box-shadow": ""});
        $("#dificultades").css({"border": "", "box-shadow": ""});
        $("#recomendaciones").css({"border": "", "box-shadow": ""});
        $("#testimonios").css({"border": "", "box-shadow": ""});
        $("#alertas").css({"border": "", "box-shadow": ""});
        $("#asistencia").css({"border": "", "box-shadow": ""});

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlActividadesLaboratorio.php?opcion=2",
            data: {idActividad: id},
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

                    //Todos los campos son deshabilitados en el momentos de la consulta
                    $("#idServicio").attr('disabled', 'disabled');
                    $("#nombreActividad").attr('disabled', 'disabled');
                    $("#fecha").attr('disabled', 'disabled');
                    $("#idValor").attr('disabled', 'disabled');
                    $("#hora").attr('disabled', 'disabled');
                    $("#estado").attr('disabled', 'disabled');
                    $("#descripcion").attr('disabled', 'disabled');
                    $("#objetivo").attr('disabled', 'disabled');
                    $("#logros").attr('disabled', 'disabled');
                    $("#dificultades").attr('disabled', 'disabled');
                    $("#recomendaciones").attr('disabled', 'disabled');
                    $("#testimonios").attr('disabled', 'disabled');
                    $("#alertas").attr('disabled', 'disabled');
                    $("#asistencia").attr('disabled', 'disabled');


                    //Por medio del vector recibido del controlador se recibe todos los datos y se les asignar a sus respectivos campos
                    $("#idActividad").val(data.row.IdActividad);
                    $("#idServicio").val(data.row.IdServicio);
                    $("#nombreActividad").val(data.row.NombreActividad);
                    $("#fecha").val(data.row.Fecha);
                    $("#idValor").val(data.row.IdValor);
                    $("#hora").val(data.row.Hora);
                    $("#estado").val(data.row.Estado);
                    $("#descripcion").val(data.row.Descripcion);
                    $("#objetivo").val(data.row.Objetivo);
                    $("#logros").val(data.row.Logros);
                    $("#dificultades").val(data.row.Dificultades);
                    $("#recomendaciones").val(data.row.Recomendaciones);
                    $("#testimonios").val(data.row.Testimonios);
                    $("#alertas").val(data.row.Alertas);
                    $("#asistencia").val(data.row.Asistencia);

                    $("#modi").show();
                    $("#restore").hide();
                    $("#save").hide();
                    $("#update").hide();

                }
            }
        });
    });


    //evento del boton modificar para habilitar los campos de texto del formulario, en caso que se requiera modificar la información.
    $('#modi').click(function () {

        $("#idServicio").removeAttr("disabled");
        $("#nombreActividad").removeAttr("disabled");
        $("#fecha").removeAttr("disabled");
        $("#idValor").removeAttr("disabled");
        $("#hora").removeAttr("disabled");
        $("#estado").removeAttr("disabled");
        $("#descripcion").removeAttr("disabled");
        $("#objetivo").removeAttr("disabled");
        $("#logros").removeAttr("disabled");
        $("#dificultades").removeAttr("disabled");
        $("#recomendaciones").removeAttr("disabled");
        $("#testimonios").removeAttr("disabled");
        $("#alertas").removeAttr("disabled");
        $("#asistencia").removeAttr("disabled");


        $("#update").show();
        $("#modi").hide();
        $("#restore").hide();
    });

  

    //evento del boton nuevo el cual permite limpiar todo el formulario y restablecer las funciones.
    $('#return').click(function () {

        $("#idServicio").removeAttr("disabled");
        $("#nombreActividad").removeAttr("disabled");
        $("#fecha").removeAttr("disabled");
        $("#idValor").removeAttr("disabled");
        $("#hora").removeAttr("disabled");
        $("#estado").removeAttr("disabled");
        $("#descripcion").removeAttr("disabled");
        $("#objetivo").removeAttr("disabled");
        $("#logros").removeAttr("disabled");
        $("#dificultades").removeAttr("disabled");
        $("#recomendaciones").removeAttr("disabled");
        $("#testimonios").removeAttr("disabled");
        $("#alertas").removeAttr("disabled");
        $("#asistencia").removeAttr("disabled");

        $("#idServicio").css({"border": "", "box-shadow": ""});
        $("#nombreActividad").css({"border": "", "box-shadow": ""});
        $("#fecha").css({"border": "", "box-shadow": ""});
        $("#idValor").css({"border": "", "box-shadow": ""});
        $("#hora").css({"border": "", "box-shadow": ""});
        $("#estado").css({"border": "", "box-shadow": ""});
        $("#descripcion").css({"border": "", "box-shadow": ""});
        $("#objetivo").css({"border":" ", "box-shadow": " "});
        $("#logros").css({"border": "", "box-shadow": ""});
        $("#dificultades").css({"border": "", "box-shadow": ""});
        $("#recomendaciones").css({"border": "", "box-shadow": ""});
        $("#testimonios").css({"border": "", "box-shadow": ""});
        $("#alertas").css({"border": "", "box-shadow": ""});
        $("#asistencia").css({"border": "", "box-shadow": ""});

        $("#frmActividades").each(function () {
            this.reset();
        });

        $("#save").show();
        $("#update").hide();
        $("#modi").hide();
        $("#restore").hide();
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
    
    $('#tblRol').on('click', 'a.delete', function () {

        $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRol tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlActividadesLaboratorio.php?opcion=3",
            data: {idActividad: id},
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
                    modal.find('.modal-title').text(td[2].innerText + " " + td[3].innerText);
                    modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + "</div>");
                    $('#exampleconfirmacion').modal('show');

                    var oTable = $('#tblRol').dataTable();
                    oTable.fnDestroy();
                    tabla();
                }
            }
        });
    });
    
    $('#tblRol').on('click', 'a.assistance', function () {

        $("#LoadingImage").show();
        var id = $(this).prop('title');
//        var link = "visualizarAsistencia.php?idInstructor=" + id + "&trimestre=" + tri;
        var link = "visualizarAsistenciaActividad.php?actividad=" + id;
        var left = (screen.width / 2) - (1024 / 2);
        var top = (screen.height / 2) - (800 / 2);
        $("#LoadingImage").hide();
        var ventana = window.open(link, 'mywindow', 'toolbar=0,titlebar=0,menubar=0,location=0,resizable=0,width=1024,height=800');
        ventana.focus();
        ventana.moveTo(left, top);
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
        "sAjaxSource": "Actividades/consultarDatosTablaActividades.php",
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
            "sZeroRecords": "No se encontraron registros",
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

                    $("#tablaAsisitenciaActividades").append(data.row.Tabla);
                    $("#servicio").html(data.row.Servicio);
                    $("#tamano").val(data.row.Tamano);
                    $("#idActividadA").val(data.row.IdTabla);
                    $("#nombreActividad").html(data.row.Actividad);
                } else {

                    $("#tablaAsisitenciaActividades").append(data.row.Tabla);
                    $("#servicio").html(data.row.Servicio);
                    $("#tamano").val(data.row.Tamano);
                    $("#idActividadA").val(data.row.IdTabla);
                    $("#nombreActividad").html(data.row.Actividad);

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
                        $("#saveAsistenciaActividad").show();
                    } else {
                        $("#saveAsistenciaActividad").hide();

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
