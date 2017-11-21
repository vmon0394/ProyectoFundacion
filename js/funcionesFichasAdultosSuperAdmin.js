$(document).ready(function () {

    //Se utiliza la funcion change() nativa de JavaScript para capturar el evento del clic
    $("#desplazadoAdulto").change(function (e) {

        if ($("#desplazadoAdulto").val() === "SI") {

            $("#victimaAdulto").removeAttr("disabled");
            $("#registroAdulto").removeAttr("disabled");
        } else if ($("#desplazadoAdulto").val() === "NO") {

            $("#victimaAdulto").attr('disabled', 'disabled');
            $("#registroAdulto").attr('disabled', 'disabled');
        }
        e.preventDefault();
    });

    //Se utiliza la funcion change() nativa de JavaScript para capturar el evento del clic
    $("#victimaAdulto").change(function (e) {

        if ($("#victimaAdulto").val() === "SI") {

            $("#registroVictimaAdulto").removeAttr("disabled");
        } else if ($("#victimaAdulto").val() === "NO") {

            $("#registroVictimaAdulto").attr('disabled', 'disabled');
        }
        e.preventDefault();
    });

    //Se utiliza la funcion change() nativa de JavaScript para capturar el evento del clic
    $("#discapacidadAdulto").change(function (e) {

        if ($("#discapacidadAdulto").val() === "SI") {

            $("#observacionDiscapaAdulto").removeAttr("disabled");
        } else if ($("#discapacidadAdulto").val() === "NO") {

            $("#observacionDiscapaAdulto").attr('disabled', 'disabled');
        }
        e.preventDefault();
    });

    //Se utiliza la funcion change() nativa de JavaScript para capturar el evento del clic
    $("#familiarEmpresaAdulto").change(function (e) {

        if ($("#familiarEmpresaAdulto").val() === "SI") {

            $("#companiaAdulto").removeAttr("disabled");
            $("#tipoVinculacionAdulto").removeAttr("disabled");
            $("#nombresFamiliarEmpresaAdulto").removeAttr("disabled");
        } else if ($("#familiarEmpresaAdulto").val() === "NO") {

            $("#companiaAdulto").attr('disabled', 'disabled');
            $("#tipoVinculacionAdulto").attr('disabled', 'disabled');
            $("#nombresFamiliarEmpresaAdulto").attr('disabled', 'disabled');
        }
        e.preventDefault();
    });

    //Se utiliza la funcion change() nativa de JavaScript para capturar el evento del clic
    $("#nivelEscolaridad").change(function (e) {

        if ($("#nivelEscolaridad").val() === "PROFESIONAL") {

            $("#areaProfesionalizacion").removeAttr("disabled");
        } else {

            $("#areaProfesionalizacion").attr('disabled', 'disabled');
        }
        e.preventDefault();
    });

    //mantiene los paneles de los pasos 2,3,4 y 5 ocultos
    $("#Apaso2").hide();
    $("#Apaso3").hide();
    $("#Apaso4").hide();
    $("#Apaso5").hide();

    //evento que captura el clic al darle en paso 1 mostrado el formulario del paso 1
    $("#Ap1").click(function (e) {
        $(this).addClass('btn-success');
        $("#Ap2").removeClass('btn-success');
        $("#Ap3").removeClass('btn-success');
        $("#Ap4").removeClass('btn-success');
        $("#Ap5").removeClass('btn-success');
        $("#Apaso1").show();
        $("#Apaso2").hide();
        $("#Apaso3").hide();
        $("#Apaso4").hide();
        $("#Apaso5").hide();
        e.preventDefault();
    });

    //evento que captura el clic al darle en paso 1 mostrado el formulario del paso 2
    $("#Ap2").click(function (e) {

        if ($('#semilleroAdulto').val() == 0 || $('#nombresAdulto').val() === "" || $('#apellidosAdulto').val() === "" || (!document.getElementById('sexoAdulto-1').checked && !document.getElementById('sexoAdulto-2').checked)
                || $('#departamentoNacimientoAdulto').val() == 0 || $('#ciudadNacimientoAdulto').val() == 0 || $('#fechaNacimientoAdulto').val() === ""
                || $('#edadAdulto').val() === "" || $('#tipoDocumentoAdulto').val() == 0 || $('#documentoAdulto').val() === "" || $('#rhAdulto').val() == 0
                || $('#tipoSeguridadAdulto').val() == 0 || ($('#telefonoAdulto').val() === "" && $('#celularAdulto').val() === "")) {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe diligenciar todos los campos requeridos del paso 1 y luego dar clic en continuar para poder acceder al siguiente paso.</div>");
            $('#exampleconfirmacion').modal('show');
        } else {
            $(this).addClass('btn-success');
            $("#Ap1").removeClass('btn-success');
            $("#Ap3").removeClass('btn-success');
            $("#Ap4").removeClass('btn-success');
            $("#Ap5").removeClass('btn-success');
            $("#Apaso1").hide();
            $("#Apaso2").show();
            $("#Apaso3").hide();
            $("#Apaso4").hide();
            $("#Apaso5").hide();
        }
        e.preventDefault();
    });

    //evento que captura el clic al darle en paso 3 mostrado el formulario del paso 3
    $("#Ap3").click(function (e) {

//        if ($('#barrioOveredaAdulto').val() == 0 || $('#departamentoResidenciaAdulto').val() == 0 || $('#ciudadResidenciaAdulto').val() == 0 || $('#nivelEscolaridad').val() == 0
//                || $('#estadoEscolaridad').val() == 0 || $('#anoIngresoAdulto').val() === "" || $('#anoPermanenciaAdulto').val() === "" || $('#tipologiaAdulto').val() == 0) {
//            var modal = $('#exampleconfirmacion');
//            modal.find('.modal-title').text("Faltan Datos");
//            modal.find('#modal-message').html("<div style='color: red'> Debe diligenciar todos los campos requeridos del paso 2 y luego dar clic en continuar para poder acceder al siguiente paso.</div>");
//            $('#exampleconfirmacion').modal('show');
//        } else {
        $(this).addClass('btn-success');
        $("#Ap1").removeClass('btn-success');
        $("#Ap2").removeClass('btn-success');
        $("#Ap4").removeClass('btn-success');
        $("#Ap5").removeClass('btn-success');
        $("#Apaso1").hide();
        $("#Apaso2").hide();
        $("#Apaso3").show();
        $("#Apaso4").hide();
        $("#Apaso5").hide();
//        }
        e.preventDefault();
    });

    //evento que captura el clic al darle en paso 4 mostrado el formulario del paso 4
    $("#Ap4").click(function (e) {

//        if ($('#discapacidadAdulto').val() == 0 || $('#desplazadoAdulto').val() == 0 || $('#etniaAdulto').val() === "" || $('#numeroMiembrosAdulto').val() === ""
//                || $('#familiarEmpresaAdulto').val() == 0) {
//            var modal = $('#exampleconfirmacion');
//            modal.find('.modal-title').text("Faltan Datos");
//            modal.find('#modal-message').html("<div style='color: red'> Debe diligenciar todos los campos requeridos del paso 3 y luego dar clic en continuar para poder acceder al siguiente paso.</div>");
//            $('#exampleconfirmacion').modal('show');
//        } else 
        if ($('#idFichaAdultos').val() === "") {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe dar clic en guardar para registrar la ficha socio familiar y podra acceder al siguiente paso.</div>");
            $('#exampleconfirmacion').modal('show');
        } else {
            $(this).addClass('btn-success');
            $("#Ap1").removeClass('btn-success');
            $("#Ap2").removeClass('btn-success');
            $("#Ap3").removeClass('btn-success');
            $("#Ap5").removeClass('btn-success');
            $("#Apaso1").hide();
            $("#Apaso2").hide();
            $("#Apaso3").hide();
            $("#Apaso4").show();
            $("#Apaso5").hide();
        }
        e.preventDefault();
    });

    //evento que captura el clic al darle en paso 5 mostrado el formulario del paso 5
    $("#Ap5").click(function (e) {

        if ($('#idFichaAdultos').val() === "") {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe dar clic en guardar para registrar la ficha socio familiar y podra acceder al siguiente paso.</div>");
            $('#exampleconfirmacion').modal('show');
        } else {

            //línea de código que me permite obtener la fecha del sistema en el formato de HTML5
            var hoy = new Date().toJSON().slice(0, 10);

            $('#fechaObservacionAdulto').val(hoy);

            $(this).addClass('btn-success');
            $("#Ap1").removeClass('btn-success');
            $("#Ap2").removeClass('btn-success');
            $("#Ap3").removeClass('btn-success');
            $("#Ap4").removeClass('btn-success');
            $("#Apaso1").hide();
            $("#Apaso2").hide();
            $("#Apaso3").hide();
            $("#Apaso4").hide();
            $("#Apaso5").show();
        }
        e.preventDefault();
    });

    //evento que captura el valor de la fecha de nacimiento y calcula la edad de la persona
    $("#fechaNacimientoAdulto").focusout(function (e) {

        $.ajax({
            type: "POST",
            url: "../Controller/ctrlFichaSocioFamiliar.php?opcion=10",
            data: {fechaNacimiento: $('#fechaNacimientoAdulto').val()},
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus + "\n" + errorThrown);
            },
            success: function (result) {
                var data = eval('(' + result + ')');

                $("#edadAdulto").removeAttr("disabled");

                $("#edadAdulto").val(data.result);
            }
        });
        e.preventDefault();
    });

    //evento que calcula el año de ingreso al semillero y calcula el tiempo en años que lleva en el semillero
    $("#anoIngresoAdulto").focusout(function (e) {

        if ($("#anoIngresoAdulto").val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text('Alerta');
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la fecha que ingreso al semillero. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#anoIngresoAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
            $("#anoPermanenciaAdulto").val("");
            $("#anoPermanenciaAdulto").attr('disabled', 'disabled');
        } else {

            $("#anoIngresoAdulto").css({"border": "", "box-shadow": ""});

            var hoy = $('#anoIngresoAdulto').val()
            var VectorFecha = hoy.split("-");
            var yyyy = VectorFecha[0];

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlFichaSocioFamiliar.php?opcion=11",
                data: {anoIngreso: yyyy, idFicha: $("#idFichaAdultos").val()},
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus + "\n" + errorThrown);
                },
                success: function (result) {
                    var data = eval('(' + result + ')');

                    $("#anoPermanenciaAdulto").removeAttr("disabled");

                    $("#anoPermanenciaAdulto").val(data.result);
                }
            });
        }
        e.preventDefault();
    });

    //evento que captura el clic de boton continuar y valida que los campos obligatorios del paso 1 se halla diligenciado
    $('#continue1Adulto').click(function () {

        validarDatosPaso1Adultos();

        if (datosPaso1Adulto == false) {
            $("#LoadingImage").hide();
        } else {
            $("#Ap2").addClass('btn-success');
            $("#Ap1").removeClass('btn-success');
            $("#Ap3").removeClass('btn-success');
            $("#Ap4").removeClass('btn-success');
            $("#Ap5").removeClass('btn-success');
            $("#Apaso1").hide();
            $("#Apaso2").show();
            $("#Apaso3").hide();
            $("#Apaso4").hide();
            $("#Apaso5").hide();
        }
    });

    //evento que captura el clic de boton continuar y valida que los campos obligatorios del paso 2 se halla diligenciado
    $('#continue2Adulto').click(function () {

//        validarDatosPaso2Adultos();
//
//        if (datosPaso2Adultos == false) {
//            $("#LoadingImage").hide();
//        } else {
        $("#Ap3").addClass('btn-success');
        $("#Ap1").removeClass('btn-success');
        $("#Ap2").removeClass('btn-success');
        $("#Ap4").removeClass('btn-success');
        $("#Ap5").removeClass('btn-success');
        $("#Apaso1").hide();
        $("#Apaso2").hide();
        $("#Apaso3").show();
        $("#Apaso4").hide();
        $("#Apaso5").hide();
//        }
    });

    //evento que captura el clic de boton guardar y valida que los campos obligatorios del paso 4 se halla diligenciado y se crea el registro
    $('#saveAdulto').click(function () {

//        validarDatosPaso3Adultos();
//
//        if (datosPaso3Adultos == false) {
//            $("#LoadingImage").hide();
//        } else {

        $("#LoadingImage").show();

        $.ajax({
            type: "POST",
            url: "../Controller/ctrlFichaSocioFamiliar.php?opcion=2",
            data: $("#frmFichaSocioFamiliarAdultos").serialize(),
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

                    $("#idFichaAdultos").val(data.row.IdFicha);

                    //idFicha del formulario observaciones
                    $("#idFichaObservaAdulto").val(data.row.IdFicha);

                    $("#Ap4").addClass('btn-success');
                    $("#Ap1").removeClass('btn-success');
                    $("#Ap2").removeClass('btn-success');
                    $("#Ap3").removeClass('btn-success');
                    $("#Ap5").removeClass('btn-success');
                    $("#Apaso1").hide();
                    $("#Apaso2").hide();
                    $("#Apaso3").hide();
                    $("#Apaso4").show();
                    $("#Apaso5").hide();

                    $("#divLimpiarAdulto").show();

                    tablaAdultos(data.row.IdFicha);
                }
            }
        });
//        }
    });

    //evento que captura el clic de boton actualizar y valida que los campos obligatorios del paso 4 se halla diligenciado y se modifica el registro
    $('#updateAdulto').click(function () {

//        validarDatosPaso3Adultos();
//
//        if (datosPaso3Adultos == false) {
//            $("#LoadingImage").hide();
//        } else {

        $("#LoadingImage").show();

        $.ajax({
            type: "POST",
            url: "../Controller/ctrlFichaSocioFamiliar.php?opcion=5",
            data: $("#frmFichaSocioFamiliarAdultos").serialize(),
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

                    var oTable = $('#tblRol2').dataTable();
                    oTable.fnDestroy();
                    tabla2(idGlobalSemillero);
                }
            }
        });
//        }
    });

    //evento que captura el clic de boton cargar documentos y hace la carga y registro del mismo
    $("#enviarDocumentoAdultos").click(function (e) {

        var file_data = $("#formUploadDocumentoAdultos").find('[name="archivoDocumentoAdultos"]').prop('files')[0];

        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('lider', $("#idFichaAdultos").val());
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

                            $("#formUploadDocumentoAdultos").each(function () {
                                this.reset();
                            });

                            var oTable = $('#tblRolArchivosAdultos').dataTable();
                            oTable.fnReloadAjax();
                            tablaAdultos($("#idFichaAdultos").val());
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
    $("#enviarFotoAdultos").click(function (e) {

        var file_data = $("#formUploadFotoAdultos").find('[name="archivoFotoAdultos"]').prop('files')[0];

        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('lider', $("#idFichaAdultos").val());
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

                            $("#formUploadFotoAdultos").each(function () {
                                this.reset();
                            });

                            var oTable = $('#tblRolArchivosAdultos').dataTable();
                            oTable.fnReloadAjax();
                            tablaAdultos($("#idFichaAdultos").val());
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
    $("#enviarVoluntadAdultos").click(function (e) {

        var file_data = $("#formUploadVoluntadAdultos").find('[name="archivoVoluntadAdultos"]').prop('files')[0];

        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('lider', $("#idFichaAdultos").val());
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

                            $("#formUploadVoluntadAdultos").each(function () {
                                this.reset();
                            });

                            var oTable = $('#tblRolArchivosAdultos').dataTable();
                            oTable.fnReloadAjax();
                            tablaAdultos($("#idFichaAdultos").val());
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
    $('#tblRolArchivosAdultos').on('click', 'a.see', function () {
        var url = $(this).prop('href');
        var win = window.open(url, '_blank');
        win.focus();
    });

    //evento que captura el clic de boton eliminar archivo y hace eliminando el archivo y su respectivo registro
    $('#tblRolArchivosAdultos').on('click', 'a.delete', function () {

        $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRolArchivosAdultos tbody tr:eq(' + rowIndex + ')');
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

                    var oTable = $('#tblRolArchivosAdultos').dataTable();
                    oTable.fnDestroy();
                    tablaAdultos($("#idFichaAdultos").val());
                }
            }
        });
    });

    //evento que captura el clic de boton guardar y se crea el registro de la observación
    $("#saveObservacionAdulto").click(function () {

        if ($('#fechaObservacionAdulto').val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la fecha en la que se le realiza la observación. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#fechaObservacionAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#observacionAdulto').val() === "") {

            $("#fechaObservacionAdulto").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la observación. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#observacionAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else {

            $("#fechaObservacionAdulto").css({"border": "", "box-shadow": ""});
            $("#observacionAdulto").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlObservaciones.php?opcion=4",
                data: $("#frmObservacionAdulto").serialize(),
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

                        $('#observacionAdulto').val("");

                        var oTable = $('#tblRolObservacionAdulto').dataTable();
                        oTable.fnDestroy();

                        tablaObservacionesAdultos($('#idFichaAdultos').val());
                    }
                }
            });
        }
    });

    //evento que captura el clic de boton consultar observación y trae los datos de vuelta a sus campos
    $('#tblRolObservacionAdulto').on('click', 'a.consult', function () {

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

                    $("#idObservaionAdulto").val(data.row.IdObservaion);
                    $("#fechaObservacionAdulto").val(data.row.FechaObservacion);
                    $("#observacionAdulto").val(data.row.Observacion);

                    $("#saveObservacionAdulto").hide();
                    $("#updateObservacionAdulto").show();
                }
            }
        });
    });

    //evento que captura el clic de boton actualizar y se modifica el registro de la observación
    $("#updateObservacionAdulto").click(function () {

        if ($('#fechaObservacionAdulto').val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la fecha en la que se le realiza la observación. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#fechaObservacionAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#observacionAdulto').val() === "") {

            $("#fechaObservacionAdulto").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la observación. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#observacionAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else {

            $("#fechaObservacionAdulto").css({"border": "", "box-shadow": ""});
            $("#observacionAdulto").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlObservaciones.php?opcion=5",
                data: $("#frmObservacionAdulto").serialize(),
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

                        $('#observacionAdulto').val("");

                        $("#saveObservacionAdulto").show();
                        $("#updateObservacionAdulto").hide();

                        var oTable = $('#tblRolObservacionAdulto').dataTable();
                        oTable.fnDestroy();

                        tablaObservacionesAdultos($('#idFichaAdultos').val());
                    }
                }
            });
        }
    });

    //evento que captura el clic de boton nuevo y limpiar el campo de observación
    $("#returnObservacionAdulto").click(function () {

        //línea de código que me permite obtener la fecha del sistema en el formato de HTML5
        var hoy = new Date().toJSON().slice(0, 10);

        $('#fechaObservacionAdulto').val(hoy);
        $('#observacionAdulto').val("");

        $("#saveObservacionAdulto").show();
        $("#updateObservacionAdulto").hide();
    });

    //evento que captura el clic de boton limpiar para restablecer el formulario
    $('#clearAdulto').click(function () {

        $("·Ap1").addClass('btn-success');
        $("#Ap2").removeClass('btn-success');
        $("#Ap3").removeClass('btn-success');
        $("#Ap4").removeClass('btn-success');
        $("#Ap5").removeClass('btn-success');
        $("#Apaso1").show();
        $("#Apaso2").hide();
        $("#Apaso3").hide();
        $("#Apaso4").hide();
        $("#Apaso5").hide();

        $("#frmFichaSocioFamiliarAdultos").each(function () {
            this.reset();
        });

        var oTable = $('#tblRolArchivosAdultos').dataTable();
        oTable.fnDestroy();

        var oTable = $('#tblRolObservacionAdulto').dataTable();
        oTable.fnDestroy();

//        $("#divLimpiarAdulto").hide();

    });
});

function validarDatosPaso1Adultos() {

    if ($('#tipoRegistro').val() == 0) {

        $("#semilleroAdultoAdulto").css({"border": "", "box-shadow": ""});
        $("#apellidosAdulto").css({"border": "", "box-shadow": ""});
        $("#apellidos").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-1").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#edadAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoAdulto").css({"border": "", "box-shadow": ""});
        $("#documentoAdulto").css({"border": "", "box-shadow": ""});
        $("#rhAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadAdulto").css({"border": "", "box-shadow": ""});
        $("#telefonoAdulto").css({"border": "", "box-shadow": ""});
        $("#celularAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el tipo de registro a realizar. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#tipoRegistro").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Adulto = false;
    } else if ($('#semilleroAdulto').val() == 0) {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#apellidosAdulto").css({"border": "", "box-shadow": ""});
        $("#apellidos").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-1").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#edadAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoAdulto").css({"border": "", "box-shadow": ""});
        $("#documentoAdulto").css({"border": "", "box-shadow": ""});
        $("#rhAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadAdulto").css({"border": "", "box-shadow": ""});
        $("#telefonoAdulto").css({"border": "", "box-shadow": ""});
        $("#celularAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el semillero al que se va a registrar el adulto. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#semilleroAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Adulto = false;
    } else if ($('#nombresAdulto').val() === "") {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semilleroAdulto").css({"border": "", "box-shadow": ""});
        $("#apellidosAdulto").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-1").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#edadAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoAdulto").css({"border": "", "box-shadow": ""});
        $("#documentoAdulto").css({"border": "", "box-shadow": ""});
        $("#rhAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadAdulto").css({"border": "", "box-shadow": ""});
        $("#telefonoAdulto").css({"border": "", "box-shadow": ""});
        $("#celularAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el nombre del adulto. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#nombresAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Adulto = false;
    } else if ($('#apellidosAdulto').val() === "") {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semilleroAdulto").css({"border": "", "box-shadow": ""});
        $("#nombresAdulto").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-1").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#edadAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoAdulto").css({"border": "", "box-shadow": ""});
        $("#documentoAdulto").css({"border": "", "box-shadow": ""});
        $("#rhAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadAdulto").css({"border": "", "box-shadow": ""});
        $("#telefonoAdulto").css({"border": "", "box-shadow": ""});
        $("#celularAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese los apellidos del adulto. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#apellidosAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Adulto = false;
    } else if (!document.getElementById('sexoAdulto-1').checked && !document.getElementById('sexoAdulto-2').checked) {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semilleroAdulto").css({"border": "", "box-shadow": ""});
        $("#nombresAdulto").css({"border": "", "box-shadow": ""});
        $("#apellidosAdulto").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#edadAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoAdulto").css({"border": "", "box-shadow": ""});
        $("#documentoAdulto").css({"border": "", "box-shadow": ""});
        $("#rhAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadAdulto").css({"border": "", "box-shadow": ""});
        $("#telefonoAdulto").css({"border": "", "box-shadow": ""});
        $("#celularAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el sexo del adulto. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#sexoAdulto-1").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        $("#sexoAdulto-2").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Adulto = false;
    } else if ($('#departamentoNacimientoAdulto').val() == 0) {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semilleroAdulto").css({"border": "", "box-shadow": ""});
        $("#nombresAdulto").css({"border": "", "box-shadow": ""});
        $("#apellidosAdulto").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-1").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-2").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#edadAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoAdulto").css({"border": "", "box-shadow": ""});
        $("#documentoAdulto").css({"border": "", "box-shadow": ""});
        $("#rhAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadAdulto").css({"border": "", "box-shadow": ""});
        $("#telefonoAdulto").css({"border": "", "box-shadow": ""});
        $("#celularAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el Departamento de nacimiento del adulto. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#departamentoNacimientoAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Adulto = false;
    } else if ($('#ciudadNacimientoAdulto').val() == 0) {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semilleroAdulto").css({"border": "", "box-shadow": ""});
        $("#nombresAdulto").css({"border": "", "box-shadow": ""});
        $("#apellidosAdulto").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-1").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#edadAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoAdulto").css({"border": "", "box-shadow": ""});
        $("#documentoAdulto").css({"border": "", "box-shadow": ""});
        $("#rhAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadAdulto").css({"border": "", "box-shadow": ""});
        $("#telefonoAdulto").css({"border": "", "box-shadow": ""});
        $("#celularAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione la Ciudad de nacimiento del adulto. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#ciudadNacimientoAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Adulto = false;
    } else if ($('#fechaNacimientoAdulto').val() === "") {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semilleroAdulto").css({"border": "", "box-shadow": ""});
        $("#nombresAdulto").css({"border": "", "box-shadow": ""});
        $("#apellidosAdulto").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-1").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#edadAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoAdulto").css({"border": "", "box-shadow": ""});
        $("#documentoAdulto").css({"border": "", "box-shadow": ""});
        $("#rhAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadAdulto").css({"border": "", "box-shadow": ""});
        $("#telefonoAdulto").css({"border": "", "box-shadow": ""});
        $("#celularAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la fecha de nacimiento del adulto. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#fechaNacimientoAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Adulto = false;
    } else if ($('#edadAdulto').val() === "") {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semilleroAdulto").css({"border": "", "box-shadow": ""});
        $("#nombresAdulto").css({"border": "", "box-shadow": ""});
        $("#apellidosAdulto").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-1").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoAdulto").css({"border": "", "box-shadow": ""});
        $("#documentoAdulto").css({"border": "", "box-shadow": ""});
        $("#rhAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadAdulto").css({"border": "", "box-shadow": ""});
        $("#telefonoAdulto").css({"border": "", "box-shadow": ""});
        $("#celularAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la edad del adulto. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#edadAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Adulto = false;
    } else if ($('#tipoDocumentoAdulto').val() == 0) {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semilleroAdulto").css({"border": "", "box-shadow": ""});
        $("#nombresAdulto").css({"border": "", "box-shadow": ""});
        $("#apellidosAdulto").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-1").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#edadAdulto").css({"border": "", "box-shadow": ""});
        $("#documentoAdulto").css({"border": "", "box-shadow": ""});
        $("#rhAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadAdulto").css({"border": "", "box-shadow": ""});
        $("#telefonoAdulto").css({"border": "", "box-shadow": ""});
        $("#celularAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el tipo de documento del adulto. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#tipoDocumentoAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Adulto = false;
    } else if ($('#documentoAdulto').val() === "") {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semilleroAdulto").css({"border": "", "box-shadow": ""});
        $("#nombresAdulto").css({"border": "", "box-shadow": ""});
        $("#apellidosAdulto").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-1").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#edadAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoAdulto").css({"border": "", "box-shadow": ""});
        $("#rhAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadAdulto").css({"border": "", "box-shadow": ""});
        $("#telefonoAdulto").css({"border": "", "box-shadow": ""});
        $("#celularAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el documento del adulto. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#documentoAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Adulto = false;
    } else if ($('#rhAdulto').val() == 0) {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semilleroAdulto").css({"border": "", "box-shadow": ""});
        $("#nombresAdulto").css({"border": "", "box-shadow": ""});
        $("#apellidosAdulto").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-1").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#edadAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoAdulto").css({"border": "", "box-shadow": ""});
        $("#documentoAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadAdulto").css({"border": "", "box-shadow": ""});
        $("#telefonoAdulto").css({"border": "", "box-shadow": ""});
        $("#celularAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el RH del adulto. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#rhAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Adulto = false;
    } else if ($('#tipoSeguridadAdulto').val() == 0) {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semilleroAdulto").css({"border": "", "box-shadow": ""});
        $("#nombresAdulto").css({"border": "", "box-shadow": ""});
        $("#apellidosAdulto").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-1").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#edadAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoAdulto").css({"border": "", "box-shadow": ""});
        $("#documentoAdulto").css({"border": "", "box-shadow": ""});
        $("#rhAdulto").css({"border": "", "box-shadow": ""});
        $("#telefonoAdulto").css({"border": "", "box-shadow": ""});
        $("#celularAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el tipo de seguridad del adulto. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#tipoSeguridadAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Adulto = false;
    } else if ($('#telefonoAdulto').val() === "" && $('#celularAdulto').val() === "") {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semilleroAdulto").css({"border": "", "box-shadow": ""});
        $("#nombresAdulto").css({"border": "", "box-shadow": ""});
        $("#apellidosAdulto").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-1").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#edadAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoAdulto").css({"border": "", "box-shadow": ""});
        $("#documentoAdulto").css({"border": "", "box-shadow": ""});
        $("#rhAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadAdulto").css({"border": "", "box-shadow": ""});
        $("#ocupacionAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el teléfono del adulto. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#telefonoAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        $("#celularAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1Adulto = false;
    } else {

        $("#tipoRegistro").css({"border": "", "box-shadow": ""});
        $("#semilleroAdulto").css({"border": "", "box-shadow": ""});
        $("#nombresAdulto").css({"border": "", "box-shadow": ""});
        $("#apellidosAdulto").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-1").css({"border": "", "box-shadow": ""});
        $("#sexoAdulto-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoAdulto").css({"border": "", "box-shadow": ""});
        $("#edadAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoAdulto").css({"border": "", "box-shadow": ""});
        $("#documentoAdulto").css({"border": "", "box-shadow": ""});
        $("#rhAdulto").css({"border": "", "box-shadow": ""});
        $("#tipoSeguridadAdulto").css({"border": "", "box-shadow": ""});
        $("#telefonoAdulto").css({"border": "", "box-shadow": ""});
        $("#celularAdulto").css({"border": "", "box-shadow": ""});

        datosPaso1Adulto = true;
    }
}

function validarDatosPaso2Adultos() {

    var email = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

    if ($('#barrioOveredaAdulto').val() == 0) {

        $("#celularAdulto").css({"border": "", "box-shadow": ""});
        $("#emailAdulto").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaAdulto").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaAdulto").css({"border": "", "box-shadow": ""});
        $("#nivelEscolaridad").css({"border": "", "box-shadow": ""});
        $("#estadoEscolaridad").css({"border": "", "box-shadow": ""});
        $("#anoIngresoAdulto").css({"border": "", "box-shadow": ""});
        $("#anoPermanenciaAdulto").css({"border": "", "box-shadow": ""});
        $("#tipologiaAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccion si la residencia es en un barrio o una vereda. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#barrioOveredaAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso2Adultos = false;
    } else if ($('#departamentoResidenciaAdulto').val() == 0) {

        $("#barrioOveredaAdulto").css({"border": "", "box-shadow": ""});
        $("#celularAdulto").css({"border": "", "box-shadow": ""});
        $("#emailAdulto").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaAdulto").css({"border": "", "box-shadow": ""});
        $("#nivelEscolaridad").css({"border": "", "box-shadow": ""});
        $("#estadoEscolaridad").css({"border": "", "box-shadow": ""});
        $("#anoIngresoAdulto").css({"border": "", "box-shadow": ""});
        $("#anoPermanenciaAdulto").css({"border": "", "box-shadow": ""});
        $("#tipologiaAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el Departamento de residencia del adulto. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#departamentoResidenciaAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso2Adultos = false;
    } else if ($('#ciudadResidenciaAdulto').val() == 0) {

        $("#barrioOveredaAdulto").css({"border": "", "box-shadow": ""});
        $("#celularAdulto").css({"border": "", "box-shadow": ""});
        $("#emailAdulto").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaAdulto").css({"border": "", "box-shadow": ""});
        $("#nivelEscolaridad").css({"border": "", "box-shadow": ""});
        $("#estadoEscolaridad").css({"border": "", "box-shadow": ""});
        $("#anoIngresoAdulto").css({"border": "", "box-shadow": ""});
        $("#anoPermanenciaAdulto").css({"border": "", "box-shadow": ""});
        $("#tipologiaAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione la Ciudad de residencia del adulto. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#ciudadResidenciaAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso2Adultos = false;
    } else if ($('#nivelEscolaridad').val() == 0) {

        $("#barrioOveredaAdulto").css({"border": "", "box-shadow": ""});
        $("#celularAdulto").css({"border": "", "box-shadow": ""});
        $("#emailAdulto").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaAdulto").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaAdulto").css({"border": "", "box-shadow": ""});
        $("#estadoEscolaridad").css({"border": "", "box-shadow": ""});
        $("#anoIngresoAdulto").css({"border": "", "box-shadow": ""});
        $("#anoPermanenciaAdulto").css({"border": "", "box-shadow": ""});
        $("#tipologiaAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el nivel de escolaridad del adulto. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#nivelEscolaridad").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso2Adultos = false;
    } else if ($('#estadoEscolaridad').val() == 0) {

        $("#barrioOveredaAdulto").css({"border": "", "box-shadow": ""});
        $("#celularAdulto").css({"border": "", "box-shadow": ""});
        $("#emailAdulto").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaAdulto").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaAdulto").css({"border": "", "box-shadow": ""});
        $("#nivelEscolaridad").css({"border": "", "box-shadow": ""});
        $("#anoIngresoAdulto").css({"border": "", "box-shadow": ""});
        $("#anoPermanenciaAdulto").css({"border": "", "box-shadow": ""});
        $("#tipologiaAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione el estado del nivel de escolaridad. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#estadoEscolaridad").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso2Adultos = false;
    } else if ($('#anoIngresoAdulto').val() === "") {

        $("#barrioOveredaAdulto").css({"border": "", "box-shadow": ""});
        $("#celularAdulto").css({"border": "", "box-shadow": ""});
        $("#emailAdulto").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaAdulto").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaAdulto").css({"border": "", "box-shadow": ""});
        $("#nivelEscolaridad").css({"border": "", "box-shadow": ""});
        $("#estadoEscolaridad").css({"border": "", "box-shadow": ""});
        $("#anoPermanenciaAdulto").css({"border": "", "box-shadow": ""});
        $("#tipologiaAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese el año que ingreso al semillero del adulto. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#anoIngresoAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso2Adultos = false;
    } else if ($('#anoPermanenciaAdulto').val() === "") {

        $("#barrioOveredaAdulto").css({"border": "", "box-shadow": ""});
        $("#celularAdulto").css({"border": "", "box-shadow": ""});
        $("#emailAdulto").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaAdulto").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaAdulto").css({"border": "", "box-shadow": ""});
        $("#nivelEscolaridad").css({"border": "", "box-shadow": ""});
        $("#estadoEscolaridad").css({"border": "", "box-shadow": ""});
        $("#anoIngresoAdulto").css({"border": "", "box-shadow": ""});
        $("#tipologiaAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese los años de permanencia del adulto en el semillero. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#anoPermanenciaAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso2Adultos = false;
    } else if ($('#tipologiaAdulto').val() == 0) {

        $("#barrioOveredaAdulto").css({"border": "", "box-shadow": ""});
        $("#celularAdulto").css({"border": "", "box-shadow": ""});
        $("#emailAdulto").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaAdulto").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaAdulto").css({"border": "", "box-shadow": ""});
        $("#nivelEscolaridad").css({"border": "", "box-shadow": ""});
        $("#estadoEscolaridad").css({"border": "", "box-shadow": ""});
        $("#anoIngresoAdulto").css({"border": "", "box-shadow": ""});
        $("#anoPermanenciaAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione la tipología familiar del adulto. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#tipologiaAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso2Adultos = false;
    } else if ($('#emailAdulto').val() !== "") {

        if (!email.test($("#emailAdulto").val().trim())) {

            $("#barrioOveredaAdulto").css({"border": "", "box-shadow": ""});
            $("#ocupacionAdulto").css({"border": "", "box-shadow": ""});
            $("#celularAdulto").css({"border": "", "box-shadow": ""});
            $("#departamentoResidenciaAdulto").css({"border": "", "box-shadow": ""});
            $("#ciudadResidenciaAdulto").css({"border": "", "box-shadow": ""});
            $("#nivelEscolaridad").css({"border": "", "box-shadow": ""});
            $("#estadoEscolaridad").css({"border": "", "box-shadow": ""});
            $("#anoIngresoAdulto").css({"border": "", "box-shadow": ""});
            $("#anoPermanenciaAdulto").css({"border": "", "box-shadow": ""});
            $("#tipologiaAdulto").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Formato del e-mail es incorrecto. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#emailAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

            datosPaso2Adultos = false;
        } else {
            $("#emailAdulto").css({"border": "", "box-shadow": ""});
            datosPaso2Adultos = true;
        }
    } else {

        $("#barrioOveredaAdulto").css({"border": "", "box-shadow": ""});
        $("#celularAdulto").css({"border": "", "box-shadow": ""});
        $("#emailAdulto").css({"border": "", "box-shadow": ""});
        $("#departamentoResidenciaAdulto").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaAdulto").css({"border": "", "box-shadow": ""});
        $("#nivelEscolaridad").css({"border": "", "box-shadow": ""});
        $("#estadoEscolaridad").css({"border": "", "box-shadow": ""});
        $("#anoIngresoAdulto").css({"border": "", "box-shadow": ""});
        $("#anoPermanenciaAdulto").css({"border": "", "box-shadow": ""});
        $("#tipologiaAdulto").css({"border": "", "box-shadow": ""});

        datosPaso2Adultos = true;
    }
}

function validarDatosPaso3Adultos() {

    if ($('#desplazadoAdulto').val() == 0) {

        $("#discapacidadAdulto").css({"border": "", "box-shadow": ""});
        $("#etniaAdulto").css({"border": "", "box-shadow": ""});
        $("#numeroMiembrosAdulto").css({"border": "", "box-shadow": ""});
        $("#familiarEmpresaAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione si el adulto es o no desplazado. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#desplazadoAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso3Adultos = false;
    } else if ($('#discapacidadAdulto').val() == 0) {

        $("#desplazadoAdulto").css({"border": "", "box-shadow": ""});
        $("#etniaAdulto").css({"border": "", "box-shadow": ""});
        $("#numeroMiembrosAdulto").css({"border": "", "box-shadow": ""});
        $("#familiarEmpresaAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione si el adulto es o no discapacitado. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#discapacidadAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso3Adultos = false;
    } else if ($('#etniaAdulto').val() == 0) {

        $("#desplazadoAdulto").css({"border": "", "box-shadow": ""});
        $("#discapacidadAdulto").css({"border": "", "box-shadow": ""});
        $("#numeroMiembrosAdulto").css({"border": "", "box-shadow": ""});
        $("#familiarEmpresaAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese la etnia del adulto. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#etniaAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso3Adultos = false;
    } else if ($('#numeroMiembrosAdulto').val() === "") {

        $("#desplazadoAdulto").css({"border": "", "box-shadow": ""});
        $("#discapacidadAdulto").css({"border": "", "box-shadow": ""});
        $("#etniaAdulto").css({"border": "", "box-shadow": ""});
        $("#familiarEmpresaAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Ingrese el numero de miembros de la familia del adulto. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#numeroMiembrosAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso4Adultos = false;
    } else if ($('#familiarEmpresaAdulto').val() == 0) {

        $("#desplazadoAdulto").css({"border": "", "box-shadow": ""});
        $("#discapacidadAdulto").css({"border": "", "box-shadow": ""});
        $("#etniaAdulto").css({"border": "", "box-shadow": ""});
        $("#numeroMiembrosAdulto").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html("<div style='color: red'> Seleccione si el adulto tiene o no familiares en la empresa. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#familiarEmpresaAdulto").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso4Adultos = false;
    } else {

        $("#desplazadoAdulto").css({"border": "", "box-shadow": ""});
        $("#discapacidadAdulto").css({"border": "", "box-shadow": ""});
        $("#etniaAdulto").css({"border": "", "box-shadow": ""});
        $("#numeroMiembrosAdulto").css({"border": "", "box-shadow": ""});
        $("#familiarEmpresaAdulto").css({"border": "", "box-shadow": ""});

        datosPaso3Adultos = true;
    }
}

//consulta de la tabla documentos
function tablaAdultos(ficha) {

    $('#tblRolArchivosAdultos').dataTable({
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
function tablaObservacionesAdultos(ficha) {

    $('#tblRolObservacionAdulto').dataTable({
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