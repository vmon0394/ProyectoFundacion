$(document).ready(function () {

    $("#tipoFichas").change(function () {

        if ($("#tipoFichas").val() == 0) {

            $("#divFrmImportarFichasA").hide();
            $("#divFrmImportarFichasN").hide();

        } else if ($("#tipoFichas").val() === "Adultos") {

            $("#divFrmImportarFichasA").show();
            $("#divFrmImportarFichasN").hide();

            $("#frmImportarFichasN").each(function () {
                this.reset();
            });

        } else if ($("#tipoFichas").val() === "Niños") {

            $("#divFrmImportarFichasA").hide();
            $("#divFrmImportarFichasN").show();

            $("#frmImportarFichasA").each(function () {
                this.reset();
            });

        }
    });

    $('#importAdultos').click(function () {

        if ($('#idSemilleroA').val() != 0) {

            $("#idSemilleroA").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();
            var file_data = $("#frmImportarFichasA").find('[name="importarFichaA"]').prop('files')[0];

            var form_data = new FormData();
            form_data.append('file', file_data);
            form_data.append('semillero', $("#idSemilleroA").val());

            if ((typeof file_data === "undefined")) {
                $("#LoadingImage").hide();
                var modal = $('#exampleconfirmacion');
                modal.find('.modal-title').text('Error en la carga');
                modal.find('#modal-message').text('Verifique que haya seleccionado un archivo.');
                $('#exampleconfirmacion').modal('show');
            } else {

                var fileNameEx = file_data.name;
                var extEx = fileNameEx.substring(fileNameEx.lastIndexOf('.') + 1);

                if (extEx !== "xlsx" && extEx !== "xls") {

                    $("#LoadingImage").hide();
                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text('Error en la carga');
                    modal.find('#modal-message').text('Verifique que la extención del archivo sea xlsx o xls.');
                    $('#exampleconfirmacion').modal('show');
                } else {

                    $.ajax({
                        url: '../importarExcel/importarFichasSocioFamiliaresAdultos.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script, if anything
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'POST',
                        success: function (result) {
                            var data = eval('(' + result + ')');

                            if (data.res === 'fail') {

                                $('#exampleconfirmacion').modal({
                                    backdrop: 'static',
                                    keyboard: true
                                });

                                $("#LoadingImage").hide();
                                var modal = $('#exampleconfirmacion');
                                modal.find('.modal-title').text('Error en la carga');
                                modal.find('#modal-message').html("<div style='color: red'>" + data.msg + "<br>" + data.msg2 + "<br><br>" + data.msgC + "<br> Favor ver las especificaciones sugeridas al principio de esta página\nGracias </div>");
                                $('#exampleconfirmacion').modal('show');
                            } else if (data.res === 'all') {

                                $('#exampleconfirmacion').modal({
                                    backdrop: 'static',
                                    keyboard: true
                                });

                                $("#LoadingImage").hide();
                                var modal = $('#exampleconfirmacion');
                                modal.find('.modal-title').text('Carga Exitosa');
                                modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + "<br>" + data.msg2 + "<br><br>" + data.msgC + "</div>");
                                $('#exampleconfirmacion').modal('show');

                                $("#frmImportarFichasA").each(function () {
                                    this.reset();
                                });
                            }

                        }, error: function (xhr, ajaxOptions, thrownError) {
                            $("#LoadingImage").hide();
                            var modal = $('#exampleconfirmacion');
                            modal.find('.modal-title').text('Error al insertar');
                            modal.find('#modal-message').text('Error de sistema, intente de nuevo.');
                            $('#exampleconfirmacion').modal('show');
                        }
                    });

                }
            }
        } else {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Seleccione el semillero al que se va subir las fichas socio familiares. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#idSemilleroA").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        }
    });

    $('#importNinos').click(function () {

        if ($('#idSemilleroN').val() != 0) {

            $("#idSemilleroN").css({"border": "", "box-shadow": ""});

            $("#LoadingImage").show();
            var file_data = $("#frmImportarFichasN").find('[name="importarFichaN"]').prop('files')[0];

            var form_data = new FormData();
            form_data.append('file', file_data);
            form_data.append('semillero', $("#idSemilleroN").val());

            if ((typeof file_data === "undefined")) {
                $("#LoadingImage").hide();
                var modal = $('#exampleconfirmacion');
                modal.find('.modal-title').text('Error en la carga');
                modal.find('#modal-message').text('Verifique que haya seleccionado un archivo.');
                $('#exampleconfirmacion').modal('show');
            } else {

                var fileNameEx = file_data.name;
                var extEx = fileNameEx.substring(fileNameEx.lastIndexOf('.') + 1);

                if (extEx !== "xlsx" && extEx !== "xls") {

                    $("#LoadingImage").hide();
                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text('Error en la carga');
                    modal.find('#modal-message').text('Verifique que la extención del archivo sea xlsx o xls.');
                    $('#exampleconfirmacion').modal('show');
                } else {

                    $.ajax({
                        url: '../importarExcel/importarFichasSocioFamiliaresNinos.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script, if anything
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'POST',
                        success: function (result) {
                            var data = eval('(' + result + ')');

                            if (data.res === 'fail') {

                                $('#exampleconfirmacion').modal({
                                    backdrop: 'static',
                                    keyboard: true
                                });

                                $("#LoadingImage").hide();
                                var modal = $('#exampleconfirmacion');
                                modal.find('.modal-title').text('Error en la carga');
                                modal.find('#modal-message').html("<div style='color: red'>" + data.msg + "<br><br>" + data.msg2 + "<br><br>" + data.msgC + "<br> Favor ver las especificaciones sugeridas al principio de esta página\nGracias </div>");
                                $('#exampleconfirmacion').modal('show');
                            } else if (data.res === 'all') {

                                $('#exampleconfirmacion').modal({
                                    backdrop: 'static',
                                    keyboard: true
                                });

                                $("#LoadingImage").hide();
                                var modal = $('#exampleconfirmacion');
                                modal.find('.modal-title').text('Carga Exitosa');
                                modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + "<br><br>" + data.msg2 + "<br><br>" + data.msgC + "</div>");
                                $('#exampleconfirmacion').modal('show');

                                $("#frmImportarFichasN").each(function () {
                                    this.reset();
                                });
                            }

                        }, error: function (xhr, ajaxOptions, thrownError) {
                            $("#LoadingImage").hide();
                            var modal = $('#exampleconfirmacion');
                            modal.find('.modal-title').text('Error al insertar');
                            modal.find('#modal-message').text('Error de sistema, intente de nuevo.');
                            $('#exampleconfirmacion').modal('show');
                        }
                    });

                }
            }
        } else {

            var modal = $('#exampleconfirmacion');
            modal.find('.modal-title').text("Faltan Datos");
            modal.find('#modal-message').html("<div style='color: red'> Seleccione el semillero al que se va subir las fichas socio familiares. </div>");
            $('#exampleconfirmacion').modal('show');

            $("#idSemilleroN").css({"border": "2px solid red", "box-shadow": "0 0 3px red"});
        }
    });
});