$(document).ready(function () {

    //mantiene los paneles de los pasos 2,3,4 y 5 ocultos
    $("#VEpaso2").hide();
    $("#VEpaso3").hide();
    $("#VEpaso4").hide();

    //evento que captura el clic al darle en paso 1 mostrado el formulario del paso 1
    $("#VEp1").click(function (e) {
        $(this).addClass('btn-success');
        $("#VEp2").removeClass('btn-success');
        $("#VEp3").removeClass('btn-success');
        $("#VEp4").removeClass('btn-success');
        $("#VEpaso1").show();
        $("#VEpaso2").hide();
        $("#VEpaso3").hide();
        $("#VEpaso4").hide();
        e.preventDefault();
    });

    //evento que captura el clic al darle en paso 1 mostrado el formulario del paso 2
    $("#VEp2").click(function (e) {

        if ($('#semilleroVolunEgres').val() == 0 || $('#tipoDocumentoVolunEgres').val() == 0 || $('#documentoVolunEgres').val() === "" || $('#nombresVolunEgres').val() === ""
                || $('#apellidosVolunEgres').val() === "" || (!document.getElementById('sexoVolunEgres-1').checked && !document.getElementById('sexoVolunEgres-2').checked)
                || $('#departamentoNacimientoVolunEgres').val() == 0 || $('#ciudadNacimientoVolunEgres').val() == 0 || $('#fechaNacimientoVolunEgres').val() === ""
                || $('#edadVolunEgres').val() === "" || $('#anoIngresoVolunEgres').val() === "" || $('#anoPermanenciaVolunEgres').val() === "") {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe diligenciar todos los campos requeridos del paso 1 y luego dar clic en continuar para poder acceder al siguiente paso.</div>");
            $('#exampleconfirmacion').modal('show');
        } else {
            $(this).addClass('btn-success');
            $("#VEp1").removeClass('btn-success');
            $("#VEp3").removeClass('btn-success');
            $("#VEp4").removeClass('btn-success');
            $("#VEpaso1").hide();
            $("#VEpaso2").show();
            $("#VEpaso3").hide();
            $("#VEpaso4").hide();
        }
        e.preventDefault();
    });

    //evento que captura el clic al darle en paso 1 mostrado el formulario del paso 3
    $("#VEp3").click(function (e) {

        if ($('#departamentoResidenciaVolunEgres').val() == 0 || $('#ciudadResidenciaVolunEgres').val() == 0) {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe diligenciar todos los campos requeridos del paso 2 y luego dar clic en continuar para poder acceder al siguiente paso.</div>");
            $('#exampleconfirmacion').modal('show');
        } else if ($('#idFichaVolunEgres').val() === "") {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe dar clic en guardar para registrar el participante y podra acceder al siguiente paso.</div>");
            $('#exampleconfirmacion').modal('show');
        } else {
            $(this).addClass('btn-success');
            $("#VEp1").removeClass('btn-success');
            $("#VEp2").removeClass('btn-success');
            $("#VEp4").removeClass('btn-success');
            $("#VEpaso1").hide();
            $("#VEpaso2").hide();
            $("#VEpaso3").show();
            $("#VEpaso4").hide();
        }
        e.preventDefault();
    });

    //evento que captura el clic al darle en paso 1 mostrado el formulario del paso 4
    $("#VEp4").click(function (e) {

        if ($('#idFichaVolunEgres').val() === "") {
            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Debe dar clic en guardar para registrar el participante y podra acceder al paso 4.</div>");
            $('#exampleconfirmacion').modal('show');
        } else {

            //línea de código que me permite obtener la fecha del sistema en el formato de HTML5
            var hoy = new Date().toJSON().slice(0, 10);

            $('#fechaObservacionVolunEgres').val(hoy);

            $(this).addClass('btn-success');
            $("#VEp1").removeClass('btn-success');
            $("#VEp2").removeClass('btn-success');
            $("#VEp3").removeClass('btn-success');
            $("#VEpaso1").hide();
            $("#VEpaso2").hide();
            $("#VEpaso3").hide();
            $("#VEpaso4").show();
        }
        e.preventDefault();
    });

    //Se utiliza la funcion change() nativa de JavaScript para capturar el evento del clic
    $("#trabajaActualmenteVolunEgres").change(function (e) {

        if ($("#trabajaActualmenteVolunEgres").val() === "SI") {

            $("#tipoTrabajoVolunEgres").removeAttr("disabled");
            $("#nombreEmpresaVolunEgres").removeAttr("disabled");
            $("#tipoContratoVolunEgres").removeAttr("disabled");
        } else if ($("#trabajaActualmenteVolunEgres").val() === "NO") {

            $("#tipoTrabajoVolunEgres").attr('disabled', 'disabled');
            $("#nombreEmpresaVolunEgres").attr('disabled', 'disabled');
            $("#tipoContratoVolunEgres").attr('disabled', 'disabled');
        }
        e.preventDefault();
    });

    //evento que captura el valor de la fecha de nacimiento y calcula la edad de la persona
    $("#fechaNacimientoVolunEgres").focusout(function (e) {

        $.ajax({
            type: "POST",
            url: "../Controller/ctrlFichaSocioFamiliar.php?opcion=10",
            data: {fechaNacimiento: $('#fechaNacimientoVolunEgres').val()},
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus + "\n" + errorThrown);
            },
            success: function (result) {
                var data = eval('(' + result + ')');

                $("#edadVolunEgres").removeAttr("disabled");

                $("#edadVolunEgres").val(data.result);
            }
        });
        e.preventDefault();
    });

    //evento que calcula el año de ingreso al semillero y calcula el tiempo en años que lleva en el semillero
    $("#anoIngresoVolunEgres").focusout(function (e) {

        if ($("#anoIngresoVolunEgres").val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text('Alerta');
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la fecha que ingreso al semillero. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#anoIngresoVolunEgres").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
            $("#anoPermanenciaVolunEgres").val("");
            $("#anoPermanenciaVolunEgres").attr('disabled', 'disabled');
        } else {

            $("#anoIngresoVolunEgres").css({"border": "", "box-shadow": ""});

            var hoy = $('#anoIngresoVolunEgres').val()
            var VectorFecha = hoy.split("-");
            var yyyy = VectorFecha[0];

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlFichaSocioFamiliar.php?opcion=11",
                data: {anoIngreso: yyyy, idFicha: $("#idFichaVolunEgres").val()},
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus + "\n" + errorThrown);
                },
                success: function (result) {
                    var data = eval('(' + result + ')');

                    $("#anoPermanenciaVolunEgres").removeAttr("disabled");

                    $("#anoPermanenciaVolunEgres").val(data.result);
                }
            });
        }
        e.preventDefault();
    });

    //evento que captura el clic de boton continuar y valida que los campos obligatorios del paso 1 se halla diligenciado
    $('#continue1VolunEgres').click(function () {

        validarDatosPaso1VoluntarioEgresado();

        if (datosPaso1VolunEgres == false) {
            $("#LoadingImage").hide();
        } else {
            $("#VEp2").addClass('btn-success');
            $("#VEp1").removeClass('btn-success');
            $("#VEp3").removeClass('btn-success');
            $("#VEp4").removeClass('btn-success');
            $("#VEpaso1").hide();
            $("#VEpaso2").show();
            $("#VEpaso3").hide();
            $("#VEpaso4").hide();
        }
    });

    //evento que captura el clic de boton guardar y valida que los campos obligatorios del paso 2 se halla diligenciado y se crea el registro
    $('#saveVolunEgres').click(function () {

        $("#LoadingImage").show();
        validarDatosPaso2VoluntarioEgresado();

        if (datosPaso2VolunEgres == false) {
            $("#LoadingImage").hide();
        } else {

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlFichaSocioFamiliar.php?opcion=15",
                data: $("#frmFichaVoluntariosEgresados").serialize(),
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

                        $("#idFichaVolunEgres").val(data.row.IdFicha);

                        //idFicha del formulario observaciones
                        $("#idFichaObservaVolunEgres").val(data.row.IdFicha);

                        $("#VEp3").addClass('btn-success');
                        $("#VEp1").removeClass('btn-success');
                        $("#VEp2").removeClass('btn-success');
                        $("#VEp4").removeClass('btn-success');
                        $("#VEpaso1").hide();
                        $("#VEpaso2").hide();
                        $("#VEpaso3").show();
                        $("#VEpaso4").hide();

                        $("#saveVolunEgres").hide();
                        $("#updateVolunEgres").show();

                        $("#divLimpiarVolunEgres").show();

                        tablaDocumentos(data.row.IdFicha);
                    }
                }
            });
        }
    });

    //evento que captura el clic de boton actualizar y valida que los campos obligatorios del paso 2 se halla diligenciado y se modifica el registro
    $('#updateVolunEgres').click(function () {

        validarDatosPaso2VoluntarioEgresado();

        if (datosPaso2VolunEgres == false) {
            $("#LoadingImage").hide();
        } else {

            $.ajax({
                type: "POST",
                url: "../Controller/ctrlFichaSocioFamiliar.php?opcion=16",
                data: $("#frmFichaVoluntariosEgresados").serialize(),
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
        }
    });

    //evento que captura el clic de boton cargar documentos y hace la carga y registro del mismo
    $("#enviarDocumentoVolunEgres").click(function (e) {

        var file_data = $("#formUploadDocumentoVolunEgress").find('[name="archivoDocumentoVolunEgres"]').prop('files')[0];

        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('lider', $("#idFichaVolunEgres").val());
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

                            var oTable = $('#tblRolArchivosVolunEgres').dataTable();
                            oTable.fnReloadAjax();
                            tablaAdultos($("#idFichaVolunEgres").val());
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
    $("#enviarFotoVolunEgres").click(function (e) {

        var file_data = $("#formUploadFotoVolunEgress").find('[name="archivoFotoVolunEgres"]').prop('files')[0];

        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('lider', $("#idFichaVolunEgres").val());
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

                            var oTable = $('#tblRolArchivosVolunEgres').dataTable();
                            oTable.fnReloadAjax();
                            tablaAdultos($("#idFichaVolunEgres").val());
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
    $("#enviarVoluntadVolunEgres").click(function (e) {

        var file_data = $("#formUploadVoluntadVolunEgress").find('[name="archivoVoluntadVolunEgres"]').prop('files')[0];

        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('lider', $("#idFichaVolunEgres").val());
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

                            var oTable = $('#tblRolArchivosVolunEgres').dataTable();
                            oTable.fnReloadAjax();
                            tablaAdultos($("#idFichaVolunEgres").val());
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

    //evento que captura el clic de boton eliminar archivo y hace eliminando el archivo y su respectivo registro
    $('#tblRolArchivosVolunEgres').on('click', 'a.delete', function () {

        $("#LoadingImage").show();

        var $tr = $(this).closest('tr');
        var rowIndex = $tr.index();
        selectedRow = $('#tblRolArchivosVolunEgres tbody tr:eq(' + rowIndex + ')');
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

                    var oTable = $('#tblRolArchivosVolunEgres').dataTable();
                    oTable.fnDestroy();
                    tablaDocumentos($("#idFichaVolunEgres").val());
                }
            }
        });
    });

    //evento que captura el clic de boton guardar y se crea el registro de la observación
    $("#saveObservacionVolunEgres").click(function () {

        if ($('#fechaObservacionVolunEgres').val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la fecha en la que se le realiza la observación. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#fechaObservacionVolunEgres").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#observacionVolunEgres').val() === "") {

            $("#fechaObservacionVolunEgres").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la observación. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#observacionVolunEgres").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else {

            $("#fechaObservacionVolunEgres").css({"border": "", "box-shadow": ""});
            $("#observacionVolunEgres").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlObservaciones.php?opcion=6",
                data: $("#frmObservacionVolunEgres").serialize(),
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

                        $('#observacionVolunEgres').val("");

                        var oTable = $('#tblRolObservacionVolunEgres').dataTable();
                        oTable.fnDestroy();

                        tablaObservacionesVolunEgre($('#idFichaVolunEgres').val());
                    }
                }
            });
        }
    });

    //evento que captura el clic de boton consultar observación y trae los datos de vuelta a sus campos
    $('#tblRolObservacionVolunEgres').on('click', 'a.consult', function () {

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

                    $("#idObservaionVolunEgres").val(data.row.IdObservaion);
                    $("#fechaObservacionVolunEgres").val(data.row.FechaObservacion);
                    $("#observacionVolunEgres").val(data.row.Observacion);

                    $("#saveObservacionVolunEgres").hide();
                    $("#updateObservacionVolunEgres").show();
                }
            }
        });
    });

    //evento que captura el clic de boton actualizar y se modifica el registro de la observación
    $("#updateObservacionVolunEgres").click(function () {

        if ($('#fechaObservacionVolunEgres').val() === "") {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la fecha en la que se le realiza la observación. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#fechaObservacionVolunEgres").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else if ($('#observacionVolunEgres').val() === "") {

            $("#fechaObservacionVolunEgres").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Ingrese la observación. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#observacionVolunEgres").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        } else {

            $("#fechaObservacionVolunEgres").css({"border": "", "box-shadow": ""});
            $("#observacionVolunEgres").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();
            $.ajax({
                type: "POST",
                url: "../Controller/ctrlObservaciones.php?opcion=7",
                data: $("#frmObservacionVolunEgres").serialize(),
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

                        $('#observacionVolunEgres').val("");

                        $("#saveObservacionVolunEgres").show();
                        $("#updateObservacionVolunEgres").hide();

                        var oTable = $('#tblRolObservacionVolunEgres').dataTable();
                        oTable.fnDestroy();

                        tablaObservacionesVolunEgre($('#idFichaVolunEgres').val());
                    }
                }
            });
        }
    });

    //evento que captura el clic de boton nuevo y limpiar el campo de observación
    $("#returnObservacionVolunEgres").click(function () {

        //línea de código que me permite obtener la fecha del sistema en el formato de HTML5
        var hoy = new Date().toJSON().slice(0, 10);

        $('#fechaObservacionVolunEgres').val(hoy);
        $('#observacionVolunEgres').val("");

        $("#saveObservacionVolunEgres").show();
        $("#updateObservacionVolunEgres").hide();
    });

    //evento que captura el clic de boton limpiar para restablecer el formulario
    $('#clearVolunEgres').click(function () {

        $("#VEp1").addClass('btn-success');
        $("#VEp2").removeClass('btn-success');
        $("#VEp3").removeClass('btn-success');
        $("#VEp4").removeClass('btn-success');
        $("#VEpaso1").show();
        $("#VEpaso2").hide();
        $("#VEpaso3").hide();
        $("#VEpaso4").hide();

        $("#frmFichaVoluntariosEgresados").each(function () {
            this.reset();
        });

        var oTable = $('#tblRolArchivosVolunEgres').dataTable();
        oTable.fnDestroy();

        var oTable = $('#tblRolObservacionVolunEgres').dataTable();
        oTable.fnDestroy();

//        $("#divLimpiarVolunEgres").hide();

    });
});

//validación de los campos del paso 1 del formulario
function validarDatosPaso1VoluntarioEgresado() {

    if ($('#semilleroVolunEgres').val() == 0) {

        $("#tipoDocumentoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#documentoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#nombresVolunEgres").css({"border": "", "box-shadow": ""});
        $("#apellidosVolunEgres").css({"border": "", "box-shadow": ""});
        $("#sexoVolunEgres-1").css({"border": "", "box-shadow": ""});
        $("#sexoVolunEgres-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#edadVolunEgres").css({"border": "", "box-shadow": ""});
        $("#anoIngresoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#anoPermanenciaVolunEgres").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el semillero al que se va a registrar el participante. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#semilleroVolunEgres").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1VolunEgres = false;
    } else if ($('#tipoDocumentoVolunEgres').val() == 0) {

        $("#semilleroVolunEgres").css({"border": "", "box-shadow": ""});
        $("#documentoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#nombresVolunEgres").css({"border": "", "box-shadow": ""});
        $("#apellidosVolunEgres").css({"border": "", "box-shadow": ""});
        $("#sexoVolunEgres-1").css({"border": "", "box-shadow": ""});
        $("#sexoVolunEgres-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#edadVolunEgres").css({"border": "", "box-shadow": ""});
        $("#anoIngresoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#anoPermanenciaVolunEgres").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el tipo de documento del participante. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#tipoDocumentoVolunEgres").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1VolunEgres = false;
    } else if ($('#documentoVolunEgres').val() === "") {

        $("#semilleroVolunEgres").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#nombresVolunEgres").css({"border": "", "box-shadow": ""});
        $("#apellidosVolunEgres").css({"border": "", "box-shadow": ""});
        $("#sexoVolunEgres-1").css({"border": "", "box-shadow": ""});
        $("#sexoVolunEgres-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#edadVolunEgres").css({"border": "", "box-shadow": ""});
        $("#anoIngresoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#anoPermanenciaVolunEgres").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el documento del participante. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#documentoVolunEgres").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1VolunEgres = false;
    } else if ($('#nombresVolunEgres').val() === "") {

        $("#semilleroVolunEgres").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#documentoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#apellidosVolunEgres").css({"border": "", "box-shadow": ""});
        $("#sexoVolunEgres-1").css({"border": "", "box-shadow": ""});
        $("#sexoVolunEgres-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#edadVolunEgres").css({"border": "", "box-shadow": ""});
        $("#anoIngresoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#anoPermanenciaVolunEgres").css({"border": "", "box-shadow": ""});
        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese el nombre del participante. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#nombresVolunEgres").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1VolunEgres = false;
    } else if ($('#apellidosVolunEgres').val() === "") {

        $("#semilleroVolunEgres").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#documentoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#nombresVolunEgres").css({"border": "", "box-shadow": ""});
        $("#sexoVolunEgres-1").css({"border": "", "box-shadow": ""});
        $("#sexoVolunEgres-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#edadVolunEgres").css({"border": "", "box-shadow": ""});
        $("#anoIngresoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#anoPermanenciaVolunEgres").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese los apellidos del participante. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#apellidosVolunEgres").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1VolunEgres = false;
    } else if (!document.getElementById('sexoVolunEgres-1').checked && !document.getElementById('sexoVolunEgres-2').checked) {

        $("#semilleroVolunEgres").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#documentoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#nombresVolunEgres").css({"border": "", "box-shadow": ""});
        $("#apellidosVolunEgres").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#edadVolunEgres").css({"border": "", "box-shadow": ""});
        $("#anoIngresoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#anoPermanenciaVolunEgres").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el sexo del participante. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#sexoVolunEgres-1").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        $("#sexoVolunEgres-2").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1VolunEgres = false;
    } else if ($('#departamentoNacimientoVolunEgres').val() == 0) {

        $("#semilleroVolunEgres").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#documentoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#nombresVolunEgres").css({"border": "", "box-shadow": ""});
        $("#apellidosVolunEgres").css({"border": "", "box-shadow": ""});
        $("#sexoVolunEgres-1").css({"border": "", "box-shadow": ""});
        $("#sexoVolunEgres-2").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#edadVolunEgres").css({"border": "", "box-shadow": ""});
        $("#anoIngresoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#anoPermanenciaVolunEgres").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el Departamento de nacimiento del participante. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#departamentoNacimientoVolunEgres").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1VolunEgres = false;
    } else if ($('#ciudadNacimientoVolunEgres').val() == 0) {

        $("#semilleroVolunEgres").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#documentoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#nombresVolunEgres").css({"border": "", "box-shadow": ""});
        $("#apellidosVolunEgres").css({"border": "", "box-shadow": ""});
        $("#sexoVolunEgres-1").css({"border": "", "box-shadow": ""});
        $("#sexoVolunEgres-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#edadVolunEgres").css({"border": "", "box-shadow": ""});
        $("#anoIngresoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#anoPermanenciaVolunEgres").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione la Ciudad de nacimiento del participante. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#ciudadNacimientoVolunEgres").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1VolunEgres = false;
    } else if ($('#fechaNacimientoVolunEgres').val() === "") {

        $("#semilleroVolunEgres").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#documentoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#nombresVolunEgres").css({"border": "", "box-shadow": ""});
        $("#apellidosVolunEgres").css({"border": "", "box-shadow": ""});
        $("#sexoVolunEgres-1").css({"border": "", "box-shadow": ""});
        $("#sexoVolunEgres-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#edadVolunEgres").css({"border": "", "box-shadow": ""});
        $("#anoIngresoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#anoPermanenciaVolunEgres").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la fecha de nacimiento del participante. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#fechaNacimientoVolunEgres").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1VolunEgres = false;
    } else if ($('#edadVolunEgres').val() === "") {

        $("#semilleroVolunEgres").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#documentoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#nombresVolunEgres").css({"border": "", "box-shadow": ""});
        $("#apellidosVolunEgres").css({"border": "", "box-shadow": ""});
        $("#sexoVolunEgres-1").css({"border": "", "box-shadow": ""});
        $("#sexoVolunEgres-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#anoIngresoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#anoPermanenciaVolunEgres").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la edad del participante. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#edadVolunEgres").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1VolunEgres = false;
    } else if ($('#anoIngresoVolunEgres').val() === "") {

        $("#semilleroVolunEgres").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#documentoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#nombresVolunEgres").css({"border": "", "box-shadow": ""});
        $("#apellidosVolunEgres").css({"border": "", "box-shadow": ""});
        $("#sexoVolunEgres-1").css({"border": "", "box-shadow": ""});
        $("#sexoVolunEgres-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#edadVolunEgres").css({"border": "", "box-shadow": ""});
        $("#anoPermanenciaVolunEgres").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese la fecha de infreso al grupo. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#anoIngresoVolunEgres").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1VolunEgres = false;
    } else if ($('#anoPermanenciaVolunEgres').val() === "") {

        $("#semilleroVolunEgres").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#documentoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#nombresVolunEgres").css({"border": "", "box-shadow": ""});
        $("#apellidosVolunEgres").css({"border": "", "box-shadow": ""});
        $("#sexoVolunEgres-1").css({"border": "", "box-shadow": ""});
        $("#sexoVolunEgres-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#anoIngresoVolunEgres").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Ingrese los años de permanencia del participante en el grupo. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#anoPermanenciaVolunEgres").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso1VolunEgres = false;
    } else {

        $("#semilleroVolunEgres").css({"border": "", "box-shadow": ""});
        $("#tipoDocumentoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#documentoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#nombresVolunEgres").css({"border": "", "box-shadow": ""});
        $("#apellidosVolunEgres").css({"border": "", "box-shadow": ""});
        $("#sexoVolunEgres-1").css({"border": "", "box-shadow": ""});
        $("#sexoVolunEgres-2").css({"border": "", "box-shadow": ""});
        $("#departamentoNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#ciudadNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#fechaNacimientoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#edadVolunEgres").css({"border": "", "box-shadow": ""});
        $("#anoIngresoVolunEgres").css({"border": "", "box-shadow": ""});
        $("#anoPermanenciaVolunEgres").css({"border": "", "box-shadow": ""});

        datosPaso1VolunEgres = true;
    }
}

//validación de los campos del paso 2 del formulario
function validarDatosPaso2VoluntarioEgresado() {

    var celular = /^[0-9]{10}$/;

    if ($('#departamentoResidenciaVolunEgres').val() == 0) {

        $("#ciudadResidenciaVolunEgres").css({"border": "", "box-shadow": ""});
        $("#celularVolunEgres").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione el Departamento de residencia del participante. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#departamentoResidenciaVolunEgres").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso2VolunEgres = false;
    } else if ($('#ciudadResidenciaVolunEgres').val() == 0) {

        $("#departamentoResidenciaVolunEgres").css({"border": "", "box-shadow": ""});
        $("#celularVolunEgres").css({"border": "", "box-shadow": ""});

        var modal = $('#exampleconfirmacion');
        modal.find('.modal-title').text("Faltan Datos");
        modal.find('#modal-message').html(" <div style='color: red'> Seleccione la Ciudad de residencia del participante. </div>");
        $('#exampleconfirmacion').modal('show');

        $("#ciudadResidenciaVolunEgres").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

        datosPaso2VolunEgres = false;
    } else if ($('#celularVolunEgres').val() !== "") {

        if (!celular.test($("#celularVolunEgres").val().trim())) {

            $("#departamentoResidenciaVolunEgres").css({"border": "", "box-shadow": ""});
            $("#ciudadResidenciaVolunEgres").css({"border": "", "box-shadow": ""});

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Formato del celular es incorrecto. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#celularVolunEgres").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});

            datosPaso2VolunEgres = false;
        } else {
            $("#celularVolunEgres").css({"border": "", "box-shadow": ""});
            datosPaso2VolunEgres = true;
        }
    } else {

        $("#departamentoResidenciaVolunEgres").css({"border": "", "box-shadow": ""});
        $("#ciudadResidenciaVolunEgres").css({"border": "", "box-shadow": ""});
        $("#celularVolunEgres").css({"border": "", "box-shadow": ""});

        datosPaso2VolunEgres = true;
    }
}

//consulta de la tabla documentos
function tablaDocumentos(ficha) {

    $('#tblRolArchivosVolunEgres').dataTable({
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
function tablaObservacionesVolunEgre(ficha) {

    $('#tblRolObservacionVolunEgres').dataTable({
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