$(document).ready(function () {
    
    //evento del boton guardar, Este evento captura toda la información del formulario usuarios pasando por la función validarDatosRegistro, 
    //la cual valida que los campo que son obligatorios su hayan sido diligenciados, al cumplir con los campos requeridos por medio de un 
    //Ajax es mandada esta información al controlador y el caso del controlador.
    $('#guardar').click(function () {


        if ($("#institucion").val() === "") {
            
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Por Favor llenar este campo. </div>");
            $('#exampleconfirmacion').modal('show');

          
        
        }else if ($("#telefono").val()=== ""){
            
          
            $("#nombre").css({"border":" ", "box-shadow": " "});
        
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> ingrese el telefono a registrar. </div>");
            $('#exampleconfirmacion').modal('show');
             
             $("#telefono").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});  
             
        }else if ($("#celular").val()=== ""){
            
            $("#institucion").css({"border":" ", "box-shadow": " "});
            $("#telefono").css({"border":" ", "box-shadow": " "});
            
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> ingrese el apellido del usuario a registrar. </div>");
            $('#exampleconfirmacion').modal('show');
             
             $("#celular").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
            
        }else if ($("#correo").val()=== ""){
            
            $("#institucion").css({"border":" ", "box-shadow": " "});
            $("#telefono").css({"border":" ", "box-shadow": " "});
            $("#celular").css({"border":" ", "box-shadow": " "});
            
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> ingrese el apellido del usuario a registrar. </div>");
            $('#exampleconfirmacion').modal('show');
             
             $("#correo").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
            
        }else if ($("#direccion").val()=== ""){
            
            $("#institucion").css({"border":" ", "box-shadow": " "});
            $("#telefono").css({"border":" ", "box-shadow": " "});
            $("#celular").css({"border":" ", "box-shadow": " "});
            $("#correo").css({"border":" ", "box-shadow": " "});
            
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> ingrese el apellido del usuario a registrar. </div>");
            $('#exampleconfirmacion').modal('show');
             
             $("#direccion").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
            
        }
        else {
            
            $("#institucion").css({"border":" ", "box-shadow": " "});
            $("#telefono").css({"border":" ", "box-shadow": " "});
            $("#celular").css({"border":" ", "box-shadow": " "});
            $("#correo").css({"border":" ", "box-shadow": " "});
            $("#direccion").css({"border":" ", "box-shadow": " "});

            $("#LoadingImage").show();

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlInstitusemillero.php?opcion=institusemillero",
                data: $("#frmInstitucionlaboratorio").serialize(),
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

                        $("#frmInstitucionlaboratorio").each(function () {
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
        
        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#nombre").css({"border": "", "box-shadow": ""});
        $("#apellido").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#acudiente").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#institucion").css({"border": "", "box-shadow": ""});
        $("#semillero").css({"border": "", "box-shadow": ""});

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlUsuariosLaboratorio.php?opcion=2",
            data: {idUsuario: id},
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

                    $("#LoadingImage").hide();
                    //Todos los campos son deshabilitados en el momentos de la consulta
                    $("#a").show();
                    $("#b").show();
                    $("#c").show();
                    $("#d").show();
                    $("#e").show();
                    $("#f").show();
                    $("#g").show();
                    $("#h").show();
                    $("#i").show();
                    $("#j").show(); 
                    $("#k").show();
                    
                    $("#tipoRegistro").attr('disabled', 'disabled');
                    $("#documento").attr('disabled', 'disabled');
                    $("#nombre").attr('disabled', 'disabled');
                    $("#apellido").attr('disabled', 'disabled');
                    $("#telefono").attr('disabled', 'disabled');
                    $("#celular").attr('disabled', 'disabled');
                    $("#email").attr('disabled', 'disabled');
                    $("#acudiente").attr('disabled', 'disabled');
                    $("#direccion").attr('disabled', 'disabled');
                    $("#institucion").attr('disabled', 'disabled');
                    $("#semillero").attr('disabled', 'disabled');
                    $("#servicios").attr('disabled', 'disabled');


                    //Por medio del vector recibido del controlador se recibe todos los datos y se les asignar a sus respectivos campos
                    $("#idUsuario").val(data.row.IdUsuario);
                    $("#tipoRegistro").val(data.row.TipoRegistro);
                    $("#documento").val(data.row.Documento);
                    $("#nombre").val(data.row.Nombre);
                    $("#apellido").val(data.row.Apellido);
                    $("#telefono").val(data.row.Telefono);
                    $("#celular").val(data.row.Celular);
                    $("#email").val(data.row.Email);
                    $("#acudiente").val(data.row.Acudiente);
                    $("#direccion").val(data.row.Direccion);
                    $("#institucion").val(data.row.Institucion);
                    $("#semillero").val(data.row.IdSemillero);

                    $("#modi").show();
                    $("#save").hide();
                    $("#update").hide();
                }
            }
        });
    });

    //evento del boton modificar para habilitar los campos de texto del formulario, en caso que se requiera modificar la información.
    $('#modi').click(function () {

        $("#tipoRegistro").removeAttr("disabled");
        $("#documento").removeAttr("disabled");
        $("#nombre").removeAttr("disabled");
        $("#apellido").removeAttr("disabled");
        $("#telefono").removeAttr("disabled");
        $("#celular").removeAttr("disabled");
        $("#email").removeAttr("disabled");
        $("#acudiente").removeAttr("disabled");
        $("#direccion").removeAttr("disabled");
        $("#institucion").removeAttr("disabled");
        $("#semillero").removeAttr("disabled");
        $("#servicios").removeAttr("disabled");

        $("#update").show();
        $("#modi").hide();
        $("#restore").hide();
    });

    //evento del boton nuevo el cual permite limpiar todo el formulario y restablecer las funciones.
    $('#return').click(function () {
        
        $("#tipoRegistro").removeAttr("disabled");
        $("#documento").removeAttr("disabled");
        $("#nombre").removeAttr("disabled");
        $("#apellido").removeAttr("disabled");
        $("#telefono").removeAttr("disabled");
        $("#celular").removeAttr("disabled");
        $("#email").removeAttr("disabled");
        $("#acudiente").removeAttr("disabled");
        $("#direccion").removeAttr("disabled");
        $("#institucion").removeAttr("disabled");
        $("#semillero").removeAttr("disabled");
        
        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#nombre").css({"border": "", "box-shadow": ""});
        $("#apellido").css({"border": "", "box-shadow": ""});
        $("#telefono").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#acudiente").css({"border": "", "box-shadow": ""});
        $("#direccion").css({"border": "", "box-shadow": ""});
        $("#institucion").css({"border": "", "box-shadow": ""});
        $("#semillero").css({"border": "", "box-shadow": ""});

        $("#frmUsuariosLaboratorio").each(function () {
            this.reset();
        });

        $("#save").show();
        $("#update").hide();
        $("#modi").hide();
    });

  $('#update').click(function () {

        

       if ($("#tipoRegistro").val() === "0") {
            
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> seleccione un tipo de registro. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#tipoRegistro").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        
        }else if ($("#documento").val()=== ""){
            
            $("#tipoRegistro").css({"border":" ", "box-shadow": " "});
        
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> ingrese el documento a registrar. </div>");
            $('#exampleconfirmacion').modal('show');
             
             $("#documento").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
             
        }else if ($("#nombre").val()=== ""){
            
            $("#tipoRegistro").css({"border":" ", "box-shadow": " "});
            $("#documento").css({"border":" ", "box-shadow": " "});
        
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> ingrese el nombre del usuario a registrar. </div>");
            $('#exampleconfirmacion').modal('show');
             
             $("#nombre").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});  
             
        }else if ($("#apellido").val()=== ""){
            
            $("#tipoRegistro").css({"border":" ", "box-shadow": " "});
            $("#documento").css({"border":" ", "box-shadow": " "});
            $("#nombre").css({"border":" ", "box-shadow": " "});
        
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> ingrese el apellido del usuario a registrar. </div>");
            $('#exampleconfirmacion').modal('show');
             
             $("#apellido").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
             
        } else {
            
            $("#apellido").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlUsuariosLaboratorio.php?opcion=3",
                data: $("#frmUsuariosLaboratorio").serialize(),
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

                        $("#frmUsuariosLaboratorio").each(function () {
                            this.reset();
                        });

                        $("#save").show();
                        $("#modi").hide();
                        $("#update").hide();

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
            url: "../Controller/ctrlUsuariosLaboratorio.php?opcion=4",
            data: {idUsuario: id},
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

                    var oTable2 = $('#tblRol2').dataTable();
                    oTable2.fnDestroy();
                    tabla2();
                }
            }
        });
    });
    
    $('#tblRol2').on('click', 'a.enable', function () {

        $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRol2 tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlUsuariosLaboratorio.php?opcion=5",
            data: {idUsuario: id},
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

                    var oTable2 = $('#tblRol2').dataTable();
                    oTable2.fnDestroy();
                    tabla2();

                    var oTable = $('#tblRol').dataTable();
                    oTable.fnDestroy();
                    tabla();
                }
            }
        });
    });
});

//consulta para llenar la tabla de usuarios existentes.
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
        "sAjaxSource": "Laboratorio/consultarDatosTablaUsuariosLaboratorio.php",
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

//consulta para llenar la tabla de usuarios eliminados.
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
        "sAjaxSource": "Laboratorio/consultarDatosTablaUsuariosLaboratorioEliminado.php",
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

function tabla3() {

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
        "sAjaxSource": "Laboratorio/consultarDatosTablaUsuariosLaboratoriolistado.php",
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

//función para validar todos los campos del formulario.


