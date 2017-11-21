$(document).ready(function () {

    //Se utiliza la funcion change() nativa de JavaScript para capturar el evento del clic
    $("#repitencia").change(function (e) {

        if ($("#repitencia").val() === "SI") {

            $("#cuantos").removeAttr("disabled");
            $("#cualesRepite").removeAttr("disabled");
        } else if ($("#repitencia").val() === "NO") {

            $("#cuantos").attr('disabled', 'disabled');
            $("#cualesRepite").attr('disabled', 'disabled');
        }
        e.preventDefault();
    });

    //Se utiliza la funcion change() nativa de JavaScript para capturar el evento del clic
    $("#desplazado").change(function (e) {

        if ($("#desplazado").val() === "SI") {

            $("#victima").removeAttr("disabled");
            $("#registro").removeAttr("disabled");
        } else if ($("#desplazado").val() === "NO") {

            $("#victima").attr('disabled', 'disabled');
            $("#registro").attr('disabled', 'disabled');
        }
        e.preventDefault();
    });

    //Se utiliza la funcion change() nativa de JavaScript para capturar el evento del clic
    $("#victima").change(function (e) {

        if ($("#victima").val() === "SI") {

            $("#registroVictima").removeAttr("disabled");
        } else if ($("#victima").val() === "NO") {

            $("#registroVictima").attr('disabled', 'disabled');
        }
        e.preventDefault();
    });

    //Se utiliza la funcion change() nativa de JavaScript para capturar el evento del clic
    $("#discapacidad").change(function (e) {

        if ($("#discapacidad").val() === "SI") {

            $("#observacionDiscapa").removeAttr("disabled");
        } else if ($("#discapacidad").val() === "NO") {

            $("#observacionDiscapa").attr('disabled', 'disabled');
        }
        e.preventDefault();
    });

    //Se utiliza la funcion change() nativa de JavaScript para capturar el evento del clic
    $("#familiarEmpresa").change(function (e) {

        if ($("#familiarEmpresa").val() === "SI") {

            $("#compania").removeAttr("disabled");
            $("#tipoVinculacion").removeAttr("disabled");
            $("#nombresFamiliarEmpresa").removeAttr("disabled");
        } else if ($("#familiarEmpresa").val() === "NI") {

            $("#compania").attr('disabled', 'disabled');
            $("#tipoVinculacion").attr('disabled', 'disabled');
            $("#nombresFamiliarEmpresa").attr('disabled', 'disabled');
        }
        e.preventDefault();
    });

    //Se utiliza la funcion change() nativa de JavaScript para capturar el evento del clic
    $("#participaOtroSemillero").change(function (e) {

        if ($("#participaOtroSemillero").val() === "SI") {

            $("#otroSemilleros").removeAttr("disabled");
        } else if ($("#participaOtroSemillero").val() === "NO") {

            $("#otroSemilleros").attr('disabled', 'disabled');
        }
        e.preventDefault();
    });

    //Se utiliza la funcion change() nativa de JavaScript para capturar el evento del clic
    $("#participaServicios").change(function (e) {

        if ($("#participaServicios").val() === "SI") {

            $("#queSemilleros").removeAttr("disabled");
        } else if ($("#participaServicios").val() === "NO") {

            $("#queSemilleros").attr('disabled', 'disabled');
        }
        e.preventDefault();
    });

    //mantiene los paneles de los pasos 2,3,4 y 5 ocultos
    $("#paso2").hide();
    $("#paso3").hide();
    $("#paso4").hide();
    $("#paso5").hide();
    $("#paso6").hide();

    //evento que captura el clic al darle en paso 1 mostrado el formulario del paso 1
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

    //evento que captura el clic al darle en paso 1 mostrado el formulario del paso 2
    $("#p2").click(function (e) {

        if ($('#semilleroN').val() == 0 || $('#nombres').val() === "" || $('#apellidos').val() === "" || (!document.getElementById('sexo-1').checked && !document.getElementById('sexo-2').checked)
                || $('#departamentoNacimiento').val() == 0 || $('#ciudadNacimiento').val() == 0 || $('#fechaNacimiento').val() === "" || $('#edad').val() === "" || $('#tipoDocumento').val() == 0
                || $('#documento').val() === "" || $('#rh').val() == 0 || $('#tipoSeguridad').val() == 0 || ($('#telefonoN').val() === "" && $('#celular').val() === "")) {
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
        e.preventDefault();

    });

    //evento que captura el clic al darle en paso 3 mostrado el formulario del paso 3
    $("#p3").click(function (e) {

//        if ($('#barrioOvereda').val() === "" || $('#departamentoResidencia').val() == 0 || $('#ciudadResidencia').val() == 0
//                || $('#institucion').val() === "" || $('#grado').val() == 0 || $('#repitencia').val() == 0 || $('#anoIngreso').val() === "") {
//            var modal = $('#exampleconfirmacion');
//            modal.find('.modal-title').text("Faltan Datos");
//            modal.find('#modal-message').html("<div style='color: red'> Debe diligenciar todos los campos requeridos del paso 2 y luego dar clic en continuar para poder acceder al siguiente paso.</div>");
//            $('#exampleconfirmacion').modal('show');
//        } else {
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
//        }
        e.preventDefault();
    });

    //evento que captura el clic al darle en paso 4 mostrado el formulario del paso 4
    $("#p4").click(function (e) {

//        if ($('#nombresPadre').val() === "" || $('#telefonoPadre').val() === "" || $('#tipologia').val() == 0 || $('#numeroMiembros').val() === ""
//                || $('#etnia').val() == 0) {
//            var modal = $('#exampleconfirmacion');
//            modal.find('.modal-title').text("Faltan Datos");
//            modal.find('#modal-message').html("<div style='color: red'> Debe diligenciar todos los campos requeridos del paso 3 y luego dar clic en continuar para poder acceder al siguiente paso.</div>");
//            $('#exampleconfirmacion').modal('show');
//        } else {
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
//        }
        e.preventDefault();
    });

    //evento que captura el clic al darle en paso 5 mostrado el formulario del paso 5
    $("#p5").click(function (e) {

        if ($('#desplazado').val() == 0 || $('#discapacidad').val() == 0 || $('#familiarEmpresa').val() == 0) {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe diligenciar todos los campos requeridos del paso 4 y luego dar clic en guardar para registrar la ficha socio familiar y acceder al siguiente paso.</div>");
            $('#exampleconfirmacion').modal('show');
        } else if ($('#idFichaNinos').val() === "") {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe dar clic en guardar para registrar la ficha socio familiar y podra acceder al siguiente paso.</div>");
            $('#exampleconfirmacion').modal('show');
        } else {
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

    //evento que captura el clic al darle en paso 6 mostrado el formulario del paso 1
    $("#p6").click(function (e) {

        if ($('#idFichaNinos').val() === "") {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe diligenciar los pasos del 1 al 4 y registrar la ficha socio familiar para poder acceder al paso 6.</div>");
            $('#exampleconfirmacion').modal('show');
        } else {

            //línea de código que me permite obtener la fecha del sistema en el formato de HTML5
            var hoy = new Date().toJSON().slice(0, 10);

            $('#fechaObservacion').val(hoy);

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

    //evento que captura el valor de la fecha de nacimiento y calcula la edad de la persona
    $("#fechaNacimiento").focusout(function (e) {

        $.ajax({
            type: "POST",
            url: "../Controller/ctrlFichaSocioFamiliar.php?opcion=10",
            data: {fechaNacimiento: $('#fechaNacimiento').val()},
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus + "\n" + errorThrown);
            },
            success: function (result) {
                var data = eval('(' + result + ')');

                $("#edad").removeAttr("disabled");

                $("#edad").val(data.result);
            }
        });
        e.preventDefault();
    });

    //evento que calcula el año de ingreso al semillero y calcula el tiempo en años que lleva en el semillero
    $("#anoIngreso").focusout(function (e) {

        if ($("#anoIngreso").val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text('Alerta');
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la fecha que ingreso al semillero. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#anoIngreso").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
            $("#anoPermanencia").val("");
            $("#anoPermanencia").attr('disabled', 'disabled');
        } else {

            $("#anoIngreso").css({"border": "", "box-shadow": ""});

            var hoy = $('#anoIngreso').val()
            var VectorFecha = hoy.split("-");
            var yyyy = VectorFecha[0];

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlFichaSocioFamiliar.php?opcion=11",
                data: {anoIngreso: yyyy, idFicha: $("#idFichaNinos").val()},
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus + "\n" + errorThrown);
                },
                success: function (result) {
                    var data = eval('(' + result + ')');

                    $("#anoPermanencia").removeAttr("disabled");

                    $("#anoPermanencia").val(data.result);
                }
            });
        }
        e.preventDefault();
    });

    //evento que captura el clic de boton continuar y valida que los campos obligatorios del paso 1 se halla diligenciado
    $('#continue1').click(function () {

        validarDatosPaso1Ninos();

        if (datosPaso1Ninos == false) {
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
    });

    //evento que captura el clic de boton continuar y valida que los campos obligatorios del paso 2 se halla diligenciado
    $('#continue2').click(function () {

//        validarDatosPaso2Ninos();
//
//        if (datosPaso2Ninos == false) {
//            $("#LoadingImage").hide();
//        } else {
        $("#p3").addClass('btn-success');
        $("#p1").removeClass('btn-success');
        $("#p2").removeClass('btn-success');
        $("#p4").removeClass('btn-success');
        $("#p5").removeClass('btn-success');
        $("#paso1").hide();
        $("#paso2").hide();
        $("#paso3").show();
        $("#paso4").hide();
        $("#paso5").hide();
//        }
    });

    //evento que captura el clic de boton continuar y valida que los campos obligatorios del paso 3 se halla diligenciado
    $('#continue3').click(function () {

//        validarDatosPaso3Ninos();
//
//        if (datosPaso3Ninos == false) {
//            $("#LoadingImage").hide();
//        } else {
        $("#p4").addClass('btn-success');
        $("#p1").removeClass('btn-success');
        $("#p2").removeClass('btn-success');
        $("#p3").removeClass('btn-success');
        $("#p5").removeClass('btn-success');
        $("#paso1").hide();
        $("#paso2").hide();
        $("#paso3").hide();
        $("#paso4").show();
        $("#paso5").hide();
//        }
    });

    //evento que captura el clic de boton guardar y valida que los campos obligatorios del paso 4 se halla diligenciado y se crea el registro
    $('#save').click(function () {

//        validarDatosPaso4Ninos();
//
//        $("#LoadingImage").show();
//
//        if (datosPaso4Ninos == false) {
//            $("#LoadingImage").hide();
//        } else {

        $("#LoadingImage").show();

        $.ajax({
            type: "POST",
            url: "../Controller/ctrlFichaSocioFamiliar.php?opcion=1",
            data: $("#frmFichaSocioFamiliarNinos").serialize(),
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

                    $("#idFichaNinos").val(data.row.IdFicha);

                    //idFicha del formulario observaciones
                    $("#idFichaObserva").val(data.row.IdFicha);

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

                    $("#divLimpiar").show();

                    tablaNinos(data.row.IdFicha);
                }
            }
        });
//        }
    });

    //evento que captura el clic de boton actualizar y valida que los campos obligatorios del paso 4 se halla diligenciado y se modifica el registro
    $('#updateNino').click(function () {

//        validarDatosPaso4Ninos();
//
//        $("#LoadingImage").show();
//
//        if (datosPaso4Ninos == false) {
//            $("#LoadingImage").hide();
//        } else {

        $("#LoadingImage").show();

        $.ajax({
            type: "POST",
            url: "../Controller/ctrlFichaSocioFamiliar.php?opcion=4",
            data: $("#frmFichaSocioFamiliarNinos").serialize(),
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

                    var oTable2 = $('#tblRol').dataTable();
                    oTable2.fnDestroy();
                    tabla();

                    var oTable3 = $('#tblRol2').dataTable();
                    oTable3.fnDestroy();
                    tabla2();
                }
            }
        });
//        }
    });

    //evento que captura el clic de boton cargar documentos y hace la carga y registro del mismo
    $("#enviarDocumento").click(function (e) {

        var file_data = $("#formUploadDocumento").find('[name="archivoDocumento"]').prop('files')[0];

        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('lider', $("#idFichaNinos").val());
        form_data.append('tipoArchivo', "Documento");
        form_data.append('folder', "Documentos");

        if (typeof file_data === "undefined") {

            $("#LoadingImage").hide();
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text('Error en la carga');
            modal.find('#modal-message').html("<div style='color: red'> Verifique que haya seleccionado un archivo. </div>");
            $('#exampleconfirmacion').modal('show');
        } else {

            var fileNameArchivo = file_data.name;
            var extD = fileNameArchivo.substring(fileNameArchivo.lastIndexOf('.') + 1);

            if (file_data.size > 2000000 || (extD !== "pdf" && extD !== "PDF" && extD !== "png" && extD !== "PNG" && extD !== "jpg" && extD !== "JPG" && extD !== "jpeg" && extD !== "JPEG")) {
                $("#LoadingImage").hide();
                var modal = $('#exampleconfirmacion');
                modal.find('.modal-title').text('Formato no valido');
                modal.find('#modal-message').html("<div style='color: red'> Verifique que el archivo seleccionado cumpla con el formato indicado y el tamaño máximo especificado. Favor ver las especificaciones sugeridas al principio de esta página\nGracias. </div>");
                $('#exampleconfirmacion').modal('show');
            } else {

                $("#LoadingImage").show();
                $.ajax({
                    url: '../Controller/ctrlDocumentos.php?opcion=1', // point to server-side PHP script 
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

                            $("#formUploadDocumento").each(function () {
                                this.reset();
                            });

                            var oTable = $('#tblRolArchivosNinos').dataTable();
                            oTable.fnReloadAjax();
                            tablaNinos($("#idFichaNinos").val());
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

    //evento que captura el clic de boton cargar fotos y hace la carga y registro del mismo
    $("#enviarFotoN").click(function (e) {

        var file_data = $("#formUploadFoto").find('[name="archivoFoto"]').prop('files')[0];

        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('lider', $("#idFichaNinos").val());
        form_data.append('tipoArchivo', "Foto");
        form_data.append('folder', "Fotos");

        if (typeof file_data === "undefined") {

            $("#LoadingImage").hide();
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text('Error en la carga');
            modal.find('#modal-message').html("<div style='color: red'> Verifique que haya seleccionado un archivo. </div>");
            $('#exampleconfirmacion').modal('show');
        } else {

            var fileNameArchivo = file_data.name;
            var extD = fileNameArchivo.substring(fileNameArchivo.lastIndexOf('.') + 1);

            if (file_data.size > 2000000 || (extD !== "pdf" && extD !== "PDF" && extD !== "png" && extD !== "PNG" && extD !== "jpg" && extD !== "JPG" && extD !== "jpeg" && extD !== "JPEG") || extD.size > 1000000) {
                $("#LoadingImage").hide();
                var modal = $('#exampleconfirmacion');
                modal.find('.modal-title').text('Formato no valido');
                modal.find('#modal-message').html("<div style='color: red'> Verifique que el archivo seleccionado cumpla con el formato indicado y el tamaño máximo especificado. Favor ver las especificaciones sugeridas al principio de esta página\nGracias. </div>");
                $('#exampleconfirmacion').modal('show');
            } else {

                $("#LoadingImage").show();
                $.ajax({
                    url: '../Controller/ctrlDocumentos.php?opcion=1', // point to server-side PHP script 
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

                            $("#formUploadFoto").each(function () {
                                this.reset();
                            });

                            var oTable = $('#tblRolArchivosNinos').dataTable();
                            oTable.fnReloadAjax();
                            tablaNinos($("#idFichaNinos").val());
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

    //evento que captura el clic de boton cargar declaración de voluntad y hace la carga y registro del mismo
    $("#enviarVoluntad").click(function (e) {

        var file_data = $("#formUploadVoluntad").find('[name="archivoVoluntad"]').prop('files')[0];

        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('lider', $("#idFichaNinos").val());
        form_data.append('tipoArchivo', "Declaración");
        form_data.append('folder', "Declaracion");

        if (typeof file_data === "undefined") {

            $("#LoadingImage").hide();
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text('Error en la carga');
            modal.find('#modal-message').html("<div style='color: red'> Verifique que haya seleccionado un archivo. </div>");
            $('#exampleconfirmacion').modal('show');
        } else {

            var fileNameArchivo = file_data.name;
            var extD = fileNameArchivo.substring(fileNameArchivo.lastIndexOf('.') + 1);

            if (file_data.size > 2000000 || (extD !== "pdf" && extD !== "PDF" && extD !== "png" && extD !== "PNG" && extD !== "jpg" && extD !== "JPG" && extD !== "jpeg" && extD !== "JPEG")) {
                $("#LoadingImage").hide();
                var modal = $('#exampleconfirmacion');
                modal.find('.modal-title').text('Formato no valido');
                modal.find('#modal-message').html("<div style='color: red'> Verifique que el archivo seleccionado cumpla con el formato indicado y el tamaño máximo especificado. Favor ver las especificaciones sugeridas al principio de esta página\nGracias. </div>");
                $('#exampleconfirmacion').modal('show');
            } else {

                $("#LoadingImage").show();
                $.ajax({
                    url: '../Controller/ctrlDocumentos.php?opcion=1', // point to server-side PHP script 
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

                            $("#formUploadVoluntad").each(function () {
                                this.reset();
                            });

                            var oTable = $('#tblRolArchivosNinos').dataTable();
                            oTable.fnReloadAjax();
                            tablaNinos($("#idFichaNinos").val());
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

    //evento que captura el clic de boton ver archivo abriendo una nueva pestaña mostrando el archivo
    $('#tblRolArchivosNinos').on('click', 'a.see', function () {
        var url = $(this).prop('href');
        var win = window.open(url, '_blank');
        win.focus();
    });

    //evento que captura el clic de boton eliminar archivo y hace eliminando el archivo y su respectivo registro
    $('#tblRolArchivosNinos').on('click', 'a.delete', function () {

        $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRolArchivosNinos tbody tr:eq(' + rowIndex + ')');
        var td = $(selectedRow).children('td');

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlDocumentos.php?opcion=2",
            data: {idFicha: id},
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
                    modal.find('.modal-title').text("El archvio " + td[2].innerText);
                    modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + "</div>");
                    $('#exampleconfirmacion').modal('show');

                    var oTable = $('#tblRolArchivosNinos').dataTable();
                    oTable.fnDestroy();
                    tablaNinos($("#idFichaNinos").val());
                }
            }
        });
    });

    //evento que captura el clic de boton guardar y se crea el registro de la observación
    $("#saveObservacion").click(function () {

        if ($('#fechaObservacion').val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la fecha en la que se le realizá la observación. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#fechaObservacion").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#observacion').val() === "") {

            $("#fechaObservacion").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la observación. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#observacion").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else {

            $("#fechaObservacion").css({"border": "", "box-shadow": ""});
            $("#observacion").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlObservaciones.php?opcion=1",
                data: $("#frmObservacionNino").serialize(),
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

                        $('#observacion').val("");

                        var oTable = $('#tblRolObservacion').dataTable();
                        oTable.fnDestroy();

                        tablaObservacionesNinos($('#idFichaNinos').val());
                    }
                }
            });
        }
    });

    //evento que captura el clic de boton consultar observación y trae los datos de vuelta a sus campos
    $('#tblRolObservacion').on('click', 'a.consult', function () {

        $("#LoadingImage").show();

        var id = $(this).prop('title');
        $.ajax({
            type: "POST",
            url: "../Controller/ctrlObservaciones.php?opcion=2",
            data: {idObservaion: id},
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

                    $("#idObservaion").val(data.row.IdObservaion);
                    $("#fechaObservacion").val(data.row.FechaObservacion);
                    $("#observacion").val(data.row.Observacion);

                    $("#saveObservacion").hide();
                    $("#updateObservacion").show();
                }
            }
        });
    });

    //evento que captura el clic de boton actualizar y se modifica el registro de la observación
    $("#updateObservacion").click(function () {

        if ($('#fechaObservacion').val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la fecha en la que se le realizá la observación. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#fechaObservacion").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#observacion').val() === "") {

            $("#fechaObservacion").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la observación. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#observacion").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else {

            $("#fechaObservacion").css({"border": "", "box-shadow": ""});
            $("#observacion").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlObservaciones.php?opcion=3",
                data: $("#frmObservacionNino").serialize(),
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

                        $('#observacion').val("");

                        $("#saveObservacion").show();
                        $("#updateObservacion").hide();

                        var oTable = $('#tblRolObservacion').dataTable();
                        oTable.fnDestroy();

                        tablaObservacionesNinos($('#idFichaNinos').val());
                    }
                }
            });
        }
    });

    //evento que captura el clic de boton nuevo y limpiar el campo de observación
    $("#returnObservacionNinos").click(function () {

        //línea de código que me permite obtener la fecha del sistema en el formato de HTML5
        var hoy = new Date().toJSON().slice(0, 10);

        $('#fechaObservacion').val(hoy);
        $('#observacion').val("");

        $("#saveObservacion").show();
        $("#updateObservacion").hide();
    });

    //evento que captura el clic de boton limpiar para restablecer el formulario
    $('#clearNino').click(function () {

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

        var oTable = $('#tblRolArchivosNinos').dataTable();
        oTable.fnDestroy();

        var oTable = $('#tblRolObservacion').dataTable();
        oTable.fnDestroy();

        $("#divLimpiar").hide();

    });
});

function validarDatosPaso1Ninos() {

    var celular = /^[0-9]{10}$/;

    if ($('#tipoRegistro').val() == 0) {

        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#nombres").css({"border": "", "box-shadow": ""});
        $("#apellidos").css({"border": "", "box-shadow": ""});
        $("#sexo-1").css({"border": "", "box-shadow": ""});
        $("#sexo-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimiento").css({"border": "", "box-shadow": ""});
        $("#edad").css({"border": "", "box-shadow": ""});
        $("#tipoDocumento").css({"border": "", "box-shadow": ""});
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#rh").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridad").css({"border": "", "box-shadow": ""});
        $("#telefonoN").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el tipo de registro a realizar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#tipoRegistro").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Ninos = false;
    } else if ($('#semilleroN').val() == 0) {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#nombres").css({"border": "", "box-shadow": ""});
        $("#apellidos").css({"border": "", "box-shadow": ""});
        $("#sexo-1").css({"border": "", "box-shadow": ""});
        $("#sexo-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimiento").css({"border": "", "box-shadow": ""});
        $("#edad").css({"border": "", "box-shadow": ""});
        $("#tipoDocumento").css({"border": "", "box-shadow": ""});
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#rh").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridad").css({"border": "", "box-shadow": ""});
        $("#telefonoN").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el semillero al que se va a registrar la ficha del niño. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#semillero").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Ninos = false;
    } else if ($('#nombres').val() === "") {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semilleroN").css({"border": "", "box-shadow": ""});
        $("#apellidos").css({"border": "", "box-shadow": ""});
        $("#sexo-1").css({"border": "", "box-shadow": ""});
        $("#sexo-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimiento").css({"border": "", "box-shadow": ""});
        $("#edad").css({"border": "", "box-shadow": ""});
        $("#tipoDocumento").css({"border": "", "box-shadow": ""});
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#rh").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridad").css({"border": "", "box-shadow": ""});
        $("#telefonoN").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el nombre del niño. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#nombres").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Ninos = false;
    } else if ($('#apellidos').val() === "") {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semilleroN").css({"border": "", "box-shadow": ""});
        $("#nombres").css({"border": "", "box-shadow": ""});
        $("#sexo-1").css({"border": "", "box-shadow": ""});
        $("#sexo-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimiento").css({"border": "", "box-shadow": ""});
        $("#edad").css({"border": "", "box-shadow": ""});
        $("#tipoDocumento").css({"border": "", "box-shadow": ""});
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#rh").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridad").css({"border": "", "box-shadow": ""});
        $("#telefonoN").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese los apellidos del niño. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#apellidos").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Ninos = false;
    } else if (!document.getElementById('sexo-1').checked && !document.getElementById('sexo-2').checked) {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semilleroN").css({"border": "", "box-shadow": ""});
        $("#nombres").css({"border": "", "box-shadow": ""});
        $("#apellidos").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimiento").css({"border": "", "box-shadow": ""});
        $("#edad").css({"border": "", "box-shadow": ""});
        $("#tipoDocumento").css({"border": "", "box-shadow": ""});
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#rh").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridad").css({"border": "", "box-shadow": ""});
        $("#telefonoN").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el sexo del niño. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#sexo-1").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        $("#sexo-2").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Ninos = false;
    } else if ($('#departamentoNacimiento').val() == 0) {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semilleroN").css({"border": "", "box-shadow": ""});
        $("#nombres").css({"border": "", "box-shadow": ""});
        $("#apellidos").css({"border": "", "box-shadow": ""});
        $("#sexo-1").css({"border": "", "box-shadow": ""});
        $("#sexo-2").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimiento").css({"border": "", "box-shadow": ""});
        $("#edad").css({"border": "", "box-shadow": ""});
        $("#tipoDocumento").css({"border": "", "box-shadow": ""});
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#rh").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridad").css({"border": "", "box-shadow": ""});
        $("#telefonoN").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el Departamento de nacimiento del niño. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#departamentoNacimiento").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Ninos = false;
    } else if ($('#ciudadNacimiento').val() == 0) {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semilleroN").css({"border": "", "box-shadow": ""});
        $("#nombres").css({"border": "", "box-shadow": ""});
        $("#apellidos").css({"border": "", "box-shadow": ""});
        $("#sexo-1").css({"border": "", "box-shadow": ""});
        $("#sexo-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimiento").css({"border": "", "box-shadow": ""});
        $("#edad").css({"border": "", "box-shadow": ""});
        $("#tipoDocumento").css({"border": "", "box-shadow": ""});
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#rh").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridad").css({"border": "", "box-shadow": ""});
        $("#telefonoN").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione la Ciudad de nacimiento del niño. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#ciudadNacimiento").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Ninos = false;
    } else if ($('#fechaNacimiento').val() === "") {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semilleroN").css({"border": "", "box-shadow": ""});
        $("#nombres").css({"border": "", "box-shadow": ""});
        $("#apellidos").css({"border": "", "box-shadow": ""});
        $("#sexo-1").css({"border": "", "box-shadow": ""});
        $("#sexo-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#edad").css({"border": "", "box-shadow": ""});
        $("#tipoDocumento").css({"border": "", "box-shadow": ""});
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#rh").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridad").css({"border": "", "box-shadow": ""});
        $("#telefonoN").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la fecha de nacimiento del niño. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#fechaNacimiento").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Ninos = false;
    } else if ($('#edad').val() === "") {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semilleroN").css({"border": "", "box-shadow": ""});
        $("#nombres").css({"border": "", "box-shadow": ""});
        $("#apellidos").css({"border": "", "box-shadow": ""});
        $("#sexo-1").css({"border": "", "box-shadow": ""});
        $("#sexo-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimiento").css({"border": "", "box-shadow": ""});
        $("#tipoDocumento").css({"border": "", "box-shadow": ""});
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#rh").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridad").css({"border": "", "box-shadow": ""});
        $("#telefonoN").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la edad del niño. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#edad").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Ninos = false;
    } else if ($('#tipoDocumento').val() == 0) {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semilleroN").css({"border": "", "box-shadow": ""});
        $("#nombres").css({"border": "", "box-shadow": ""});
        $("#apellidos").css({"border": "", "box-shadow": ""});
        $("#sexo-1").css({"border": "", "box-shadow": ""});
        $("#sexo-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimiento").css({"border": "", "box-shadow": ""});
        $("#edad").css({"border": "", "box-shadow": ""});
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#rh").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridad").css({"border": "", "box-shadow": ""});
        $("#telefonoN").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el Tipo de Documento del niño. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#tipoDocumento").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Ninos = false;
    } else if ($('#documento').val() === "") {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#nombres").css({"border": "", "box-shadow": ""});
        $("#apellidos").css({"border": "", "box-shadow": ""});
        $("#sexo-1").css({"border": "", "box-shadow": ""});
        $("#sexo-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimiento").css({"border": "", "box-shadow": ""});
        $("#edad").css({"border": "", "box-shadow": ""});
        $("#tipoDocumento").css({"border": "", "box-shadow": ""});
        $("#rh").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridad").css({"border": "", "box-shadow": ""});
        $("#telefonoN").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el documento del niño. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#documento").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Ninos = false;
    } else if ($('#rh').val() == 0) {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#nombres").css({"border": "", "box-shadow": ""});
        $("#apellidos").css({"border": "", "box-shadow": ""});
        $("#sexo-1").css({"border": "", "box-shadow": ""});
        $("#sexo-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimiento").css({"border": "", "box-shadow": ""});
        $("#edad").css({"border": "", "box-shadow": ""});
        $("#tipoDocumento").css({"border": "", "box-shadow": ""});
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridad").css({"border": "", "box-shadow": ""});
        $("#telefonoN").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el RH del niño. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#rh").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Ninos = false;
    } else if ($('#tipoSeguridad').val() == 0) {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#nombres").css({"border": "", "box-shadow": ""});
        $("#apellidos").css({"border": "", "box-shadow": ""});
        $("#sexo-1").css({"border": "", "box-shadow": ""});
        $("#sexo-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimiento").css({"border": "", "box-shadow": ""});
        $("#edad").css({"border": "", "box-shadow": ""});
        $("#tipoDocumento").css({"border": "", "box-shadow": ""});
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#rh").css({"border": "", "box-shadow": ""});
        $("#telefonoN").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el tipo de seguridad del niño. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#tipoSeguridad").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Ninos = false;
    } else if ($('#telefonoN').val() === "" && $('#celular').val() === "") {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#nombres").css({"border": "", "box-shadow": ""});
        $("#apellidos").css({"border": "", "box-shadow": ""});
        $("#sexo-1").css({"border": "", "box-shadow": ""});
        $("#sexo-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimiento").css({"border": "", "box-shadow": ""});
        $("#edad").css({"border": "", "box-shadow": ""});
        $("#tipoDocumento").css({"border": "", "box-shadow": ""});
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#rh").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridad").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el teléfono fijo del participante y/o un teléfono celular. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#telefonoN").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        $("#celular").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Ninos = false;
    } else if ($('#celular').val() !== "") {

        if (!celular.test($("#celular").val().trim())) {

            $("#tipoRegistro").css({"border": "", "box-shadow": ""});
            $("#semillero").css({"border": "", "box-shadow": ""});
            $("#nombres").css({"border": "", "box-shadow": ""});
            $("#apellidos").css({"border": "", "box-shadow": ""});
            $("#sexo-1").css({"border": "", "box-shadow": ""});
            $("#sexo-2").css({"border": "", "box-shadow": ""});
            $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
            $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
            $("#fechaNacimiento").css({"border": "", "box-shadow": ""});
            $("#edad").css({"border": "", "box-shadow": ""});
            $("#tipoDocumento").css({"border": "", "box-shadow": ""});
            $("#documento").css({"border": "", "box-shadow": ""});
            $("#rh").css({"border": "", "box-shadow": ""});
            $("#tipoSeguridad").css({"border": "", "box-shadow": ""});
            $("#telefonoN").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Formato del celular es incorrecto. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#celular").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

            datosPaso1Ninos = false;
        } else {
            $("#celular").css({"border": "", "box-shadow": ""});
            datosPaso1Ninos = true;
        }
    } else {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semillero").css({"border": "", "box-shadow": ""});
        $("#nombres").css({"border": "", "box-shadow": ""});
        $("#apellidos").css({"border": "", "box-shadow": ""});
        $("#sexo-1").css({"border": "", "box-shadow": ""});
        $("#sexo-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimiento").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimiento").css({"border": "", "box-shadow": ""});
        $("#fechaNacimiento").css({"border": "", "box-shadow": ""});
        $("#edad").css({"border": "", "box-shadow": ""});
        $("#tipoDocumento").css({"border": "", "box-shadow": ""});
        $("#documento").css({"border": "", "box-shadow": ""});
        $("#rh").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridad").css({"border": "", "box-shadow": ""});
        $("#telefonoN").css({"border": "", "box-shadow": ""});
        $("#celular").css({"border": "", "box-shadow": ""});

        datosPaso1Ninos = true;
    }
}

function validarDatosPaso2Ninos() {

    var email = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

    if ($('#barrioOvereda').val() == 0) {

        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#institucion").css({"border": "", "box-shadow": ""});
        $("#grado").css({"border": "", "box-shadow": ""});
        $("#repitencia").css({"border": "", "box-shadow": ""});
        $("#anoIngreso").css({"border": "", "box-shadow": ""});
        $("#anoPermanencia").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccion si la residencia es en un barrio o una vereda. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#barrioOvereda").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso2Ninos = false;
    } else if ($('#departamentoResidencia').val() == 0) {

        $("#barrioOvereda").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#institucion").css({"border": "", "box-shadow": ""});
        $("#grado").css({"border": "", "box-shadow": ""});
        $("#repitencia").css({"border": "", "box-shadow": ""});
        $("#anoIngreso").css({"border": "", "box-shadow": ""});
        $("#anoPermanencia").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el Departamento de residencia del niño. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#departamentoResidencia").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso2Ninos = false;
    } else if ($('#ciudadResidencia').val() == 0) {

        $("#barrioOvereda").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#institucion").css({"border": "", "box-shadow": ""});
        $("#grado").css({"border": "", "box-shadow": ""});
        $("#repitencia").css({"border": "", "box-shadow": ""});
        $("#anoIngreso").css({"border": "", "box-shadow": ""});
        $("#anoPermanencia").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione la Ciudad de residencia del niño. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#ciudadResidencia").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso2Ninos = false;
    } else if ($('#institucion').val() === "") {

        $("#barrioOvereda").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#grado").css({"border": "", "box-shadow": ""});
        $("#repitencia").css({"border": "", "box-shadow": ""});
        $("#anoIngreso").css({"border": "", "box-shadow": ""});
        $("#anoPermanencia").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la Institución en la que estudia del niño. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#institucion").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso2Ninos = false;
    } else if ($('#grado').val() == 0) {

        $("#barrioOvereda").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#institucion").css({"border": "", "box-shadow": ""});
        $("#repitencia").css({"border": "", "box-shadow": ""});
        $("#anoIngreso").css({"border": "", "box-shadow": ""});
        $("#anoPermanencia").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el grado que cursa el niño. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#grado").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso2Ninos = false;
    } else if ($('#repitencia').val() == 0) {

        $("#barrioOvereda").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#institucion").css({"border": "", "box-shadow": ""});
        $("#grado").css({"border": "", "box-shadow": ""});
        $("#anoIngreso").css({"border": "", "box-shadow": ""});
        $("#anoPermanencia").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione si el niño a repetido años. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#repitencia").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso2Ninos = false;
    } else if ($('#anoIngreso').val() === "") {

        $("#barrioOvereda").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#institucion").css({"border": "", "box-shadow": ""});
        $("#grado").css({"border": "", "box-shadow": ""});
        $("#repitencia").css({"border": "", "box-shadow": ""});
        $("#anoPermanencia").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el año que ingreso el niño al semillero. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#anoIngreso").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso2Ninos = false;
    } else if ($('#anoPermanencia').val() === "") {

        $("#barrioOvereda").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#institucion").css({"border": "", "box-shadow": ""});
        $("#grado").css({"border": "", "box-shadow": ""});
        $("#repitencia").css({"border": "", "box-shadow": ""});
        $("#anoIngreso").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese los años de permanencia del niño en el semillero. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#anoPermanencia").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso2Ninos = false;
    } else if ($('#email').val() !== "") {

        if (!email.test($("#email").val().trim())) {

            $("#barrioOvereda").css({"border": "", "box-shadow": ""});
            $("#email").css({"border": "", "box-shadow": ""});
            $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
            $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
            $("#institucion").css({"border": "", "box-shadow": ""});
            $("#grado").css({"border": "", "box-shadow": ""});
            $("#repitencia").css({"border": "", "box-shadow": ""});
            $("#anoIngreso").css({"border": "", "box-shadow": ""});
            $("#anoPermanencia").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Formato del e-mail es incorrecto. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#email").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

            datosPaso2Ninos = false;
        } else {
            $("#email").css({"border": "", "box-shadow": ""});
            datosPaso2Ninos = true;
        }
    } else {

        $("#barrioOvereda").css({"border": "", "box-shadow": ""});
        $("#email").css({"border": "", "box-shadow": ""});
        $("#departamentoResidencia").css({"border": "", "box-shadow": ""});
        $("#ciudadResidencia").css({"border": "", "box-shadow": ""});
        $("#institucion").css({"border": "", "box-shadow": ""});
        $("#grado").css({"border": "", "box-shadow": ""});
        $("#repitencia").css({"border": "", "box-shadow": ""});
        $("#anoIngreso").css({"border": "", "box-shadow": ""});
        $("#anoPermanencia").css({"border": "", "box-shadow": ""});

        datosPaso2Ninos = true;
    }
}

function validarDatosPaso3Ninos() {

    var celular = /^[0-9]{10}$/;

    if ($('#nombresPadre').val() === "") {

        $("#nombresPadre").css({"border": "", "box-shadow": ""});
        $("#telefonoPadre").css({"border": "", "box-shadow": ""});
        $("#celularPadre").css({"border": "", "box-shadow": ""});
        $("#celularCuidador").css({"border": "", "box-shadow": ""});
        $("#tipologia").css({"border": "", "box-shadow": ""});
        $("#numeroMiembros").css({"border": "", "box-shadow": ""});
        $("#etnia").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese el nombre complero de la Mamá o Papá del niño. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#nombresPadre").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso3Ninos = false;
    } else if ($('#telefonoPadre').val() === "") {

        $("#nombresPadre").css({"border": "", "box-shadow": ""});
        $("#telefonoPadre").css({"border": "", "box-shadow": ""});
        $("#celularPadre").css({"border": "", "box-shadow": ""});
        $("#celularCuidador").css({"border": "", "box-shadow": ""});
        $("#tipologia").css({"border": "", "box-shadow": ""});
        $("#numeroMiembros").css({"border": "", "box-shadow": ""});
        $("#etnia").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese el teléfono de la Mamá o Papá del niño. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#telefonoPadre").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso3Ninos = false;
    } else if ($('#tipologia').val() == 0) {

        $("#nombresPadre").css({"border": "", "box-shadow": ""});
        $("#telefonoPadre").css({"border": "", "box-shadow": ""});
        $("#celularPadre").css({"border": "", "box-shadow": ""});
        $("#celularCuidador").css({"border": "", "box-shadow": ""});
        $("#tipologia").css({"border": "", "box-shadow": ""});
        $("#numeroMiembros").css({"border": "", "box-shadow": ""});
        $("#etnia").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione la tipología familiar del niño. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#tipologia").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso3Ninos = false;
    } else if ($('#numeroMiembros').val() === "") {

        $("#nombresPadre").css({"border": "", "box-shadow": ""});
        $("#telefonoPadre").css({"border": "", "box-shadow": ""});
        $("#celularPadre").css({"border": "", "box-shadow": ""});
        $("#celularCuidador").css({"border": "", "box-shadow": ""});
        $("#tipologia").css({"border": "", "box-shadow": ""});
        $("#numeroMiembros").css({"border": "", "box-shadow": ""});
        $("#etnia").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese los miembros de la familia del niño. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#numeroMiembros").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso3Ninos = false;
    } else if ($('#etnia').val() == 0) {

        $("#nombresPadre").css({"border": "", "box-shadow": ""});
        $("#telefonoPadre").css({"border": "", "box-shadow": ""});
        $("#celularPadre").css({"border": "", "box-shadow": ""});
        $("#telefonoCuidador").css({"border": "", "box-shadow": ""});
        $("#celularCuidador").css({"border": "", "box-shadow": ""});
        $("#tipologia").css({"border": "", "box-shadow": ""});
        $("#numeroMiembros").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione la etnia del participante. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#etnia").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso3Ninos = false;
    } else if ($('#celularPadre').val() !== "") {

        if (!celular.test($("#celularPadre").val().trim())) {

            $("#nombresPadre").css({"border": "", "box-shadow": ""});
            $("#telefonoPadre").css({"border": "", "box-shadow": ""});
            $("#celularCuidador").css({"border": "", "box-shadow": ""});
            $("#tipologia").css({"border": "", "box-shadow": ""});
            $("#numeroMiembros").css({"border": "", "box-shadow": ""});
            $("#etnia").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Formato del celular es incorrecto. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#celularPadre").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

            datosPaso3Ninos = false;
        } else if ($('#celularCuidador').val() !== "") {

            if (!celular.test($("#celularCuidador").val().trim())) {

                $("#nombresPadre").css({"border": "", "box-shadow": ""});
                $("#telefonoPadre").css({"border": "", "box-shadow": ""});
                $("#celularPadre").css({"border": "", "box-shadow": ""});
                $("#tipologia").css({"border": "", "box-shadow": ""});
                $("#numeroMiembros").css({"border": "", "box-shadow": ""});
                $("#etnia").css({"border": "", "box-shadow": ""});

                var modal = $('#exampleconfirmacion');
                modal.find('.modal-title').text("Faltan Datos");
                modal.find('#modal-message').html("<div style='color: red'> Formato del celular es incorrecto. </div>");
                $('#exampleconfirmacion').modal('show');

                $("#celularCuidador").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

                datosPaso3Ninos = false;
            } else {
                $("#celularPadre").css({"border": "", "box-shadow": ""});
                $("#celularCuidador").css({"border": "", "box-shadow": ""});
                datosPaso3Ninos = true;
            }
        } else {
            $("#celularPadre").css({"border": "", "box-shadow": ""});
            $("#celularCuidador").css({"border": "", "box-shadow": ""});
            datosPaso3Ninos = true;
        }
    } else if ($('#celularCuidador').val() !== "") {

        if (!celular.test($("#celularCuidador").val().trim())) {

            $("#nombresPadre").css({"border": "", "box-shadow": ""});
            $("#telefonoPadre").css({"border": "", "box-shadow": ""});
            $("#celularPadre").css({"border": "", "box-shadow": ""});
            $("#tipologia").css({"border": "", "box-shadow": ""});
            $("#numeroMiembros").css({"border": "", "box-shadow": ""});
            $("#etnia").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Formato del celular es incorrecto. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#celularCuidador").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

            datosPaso3Ninos = false;
        } else {
            $("#celularCuidador").css({"border": "", "box-shadow": ""});
            datosPaso3Ninos = true;
        }
    } else {

        $("#nombresPadre").css({"border": "", "box-shadow": ""});
        $("#telefonoPadre").css({"border": "", "box-shadow": ""});
        $("#celularPadre").css({"border": "", "box-shadow": ""});
        $("#celularCuidador").css({"border": "", "box-shadow": ""});
        $("#tipologia").css({"border": "", "box-shadow": ""});
        $("#numeroMiembros").css({"border": "", "box-shadow": ""});
        $("#etnia").css({"border": "", "box-shadow": ""});

        datosPaso3Ninos = true;
    }
}

function validarDatosPaso4Ninos() {

    if ($('#desplazado').val() == 0) {

        $("#discapacidad").css({"border": "", "box-shadow": ""});
        $("#familiarEmpresa").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione si el niño es o no desplazado. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#desplazado").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso4Ninos = false;
    } else if ($('#discapacidad').val() == 0) {

        $("#desplazado").css({"border": "", "box-shadow": ""});
        $("#familiarEmpresa").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione si el niño es o no discapacitado. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#discapacidad").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso4Ninos = false;
    } else if ($('#familiarEmpresa').val() == 0) {

        $("#desplazado").css({"border": "", "box-shadow": ""});
        $("#discapacidad").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione si el niño tiene o no familiares en la empresa. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#familiarEmpresa").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso4Ninos = false;
    } else {

        $("#desplazado").css({"border": "", "box-shadow": ""});
        $("#discapacidad").css({"border": "", "box-shadow": ""});
        $("#familiarEmpresa").css({"border": "", "box-shadow": ""});

        datosPaso4Ninos = true;
    }
}

//consulta de la tabla documentos
function tablaNinos(ficha) {

    $('#tblRolArchivosNinos').dataTable({
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
        "sAjaxSource": "Fichas/consultarDatosTablaDocumentos.php?idFicha=" + encodeURIComponent(ficha),
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

//consulta de la tabla observaciones
function tablaObservacionesNinos(ficha) {

    $('#tblRolObservacion').dataTable({
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
        "sAjaxSource": "Fichas/consultarDatosTablaObservaciones.php?idFicha=" + encodeURIComponent(ficha),
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