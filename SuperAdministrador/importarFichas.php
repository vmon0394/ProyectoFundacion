<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["perfil"] != "SuperAdministrador") {
    echo '<meta http-equiv="refresh" content="0;url=index.php" />';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shorcut icon type=" href="../favicon.png"/>
        <title>Fundación | Super Admin</title>

        <!-- Referencias js,css -->
        <?php include_once '../includes/head.php'; ?>
    </head>
    <body>

        <div class="container-fluid content-wrapper">
            <br>
            <br>
            <!--.Logo Bar & Login-->
            <div class="row-fluid">
                <div class="logobar">
                    <div class="logo pull-left">
                        <a href="#" title="Sistema de Gestión | Fundación Conconcreto"><img src="../img/fundacion_logo.png" style="width: 290px;"></a>          
                    </div>
                    <br>
                    <h1 align="center">Importar Ficha Socio Familiar</h1>
                </div>
            </div>
            <br>
            <br>
            <!--.Navigation Bar -->
            <?php include_once 'menu.php'; ?>
            <!--/.Navigation Bar-->  

            <!-- CONTENIDO PRINCIPAL -->
            <div class="row-fluid">                
                <div class="breadcrumb">
                    <div class="tab-content"> 
                        <label class="alert alert-info">Los campos marcados con * son obligatorios </label>

                        <div class="control-group">   

                            <div id="demoN" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">

                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Leer Antes de Importar</h3>
                                    </div>
                                    <div class="panel-body">
                                        <p style="text-align: justify;">                          
                                            1.	Recuerde que el archivo de Excel debe cumplir con los formatos indicados <a href="../importarExcel/FormatosFichas/FORMATO FICHA SOCIO FAMILIAR NIÑOS.xlsx" class="info_fichas">FICHAS SOCIO FAMILAR NIÑOS.xlsx</a> / <a href="../importarExcel/FormatosFichas/FORMATO FICHA SOCIO FAMILIAR ADULTOS.xlsx" class="info_fichas">FICHAS SOCIO FAMILAR ADULTOS.xlsx</a> según el tipo de ficha socio familiar, en caso de no cumplir con este formato el archivo no se podrá importar.
                                            <br><br>
                                            2.	Antes de importar realice los siguientes pasos para eliminar las formular que contenga este archivo y cerciorarse que la información se importe correctamente.
                                            <br><br>
                                            -   Verifique que el archivo de Excel solo tenga una única hoja con la información que desea importar.
                                            <br>
                                            -	Seleccione toda la información de las fichas desde la columna B1 hasta la última columna y la última fila, esto también se puede realizar dando clic en B1 y luego presionando a la vez control + shift y  dejando estas dos teclas presionadas le da clic a la tecla izquierda y luego abajo dos beses.
                                            <br>
                                            -	Dentro la selección de clic derecho, copiar o ctrl + C.
                                            <br>
                                            -	Luego de clic derecho nuevamente dentro de la selección y elija la opción dos de pegado.
                                            <br>
                                            -   Nuevamente de clic derecho dentro de la selección y de clic en eliminar comentarios.
                                            <br>
                                            -   Por último elija la opción datos de la barra de tareas de la parte superior, luego validación de datos, una vez de clic en validación de datos saldrá un alerta preguntando si desea eliminar la configuración  actual, presione aceptar y nuevamente aceptar en la ventana de validación de datos.
                                            <br><br>
                                            3.	Una vez realizados estos pasos, guarde los cambios y proceda a importar el archivo de Excel.
                                    </div>
                                    <form  method="POST" class="form-horizontal" id="">     
                                        <div class="tab-pane">
                                            <div class="control-group">
                                                <div class="controls">
                                                    <div class="control-group">
                                                        <label class="control-label" for="textinput">Tipo *</label>
                                                        <div class="controls input-group">
                                                            <select id="tipoFichas"  name="tipoFichas" class="input-xlarge">
                                                                <option value="0">SELECCIONE TIPO DE FICHA</option>
                                                                <option value="Niños">FICHAS NIÑOS</option>
                                                                <option value="Adultos">FICHAS ADULTOS</option>
                                                            </select>
                                                        </div>
                                                    </div>      
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div> 

                                <div id="divFrmImportarFichasA" style="display: none;">
                                    <form  method="POST" class="form-horizontal" id="frmImportarFichasA">
                                        <div class="tab-pane">
                                            <div class="control-group">
                                                <div class="controls">
                                                    <div class="control-group">
                                                        <label class="control-label" for="textinput">Semillero *</label>
                                                        <div class="controls input-group">
                                                            <select id="idSemilleroA"  name="idSemilleroA" class="input-xlarge">
                                                                <?php
                                                                include_once '../Model/libCombos.php';
                                                                $combo = new libCombos();
                                                                $combo->comboSemillerosImportarAdultos();
                                                                echo $combo->getResult();
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="controls">
                                                        <input name="importarFichaA" id="importarFichaA" type="file" size="35" />
                                                    </div>      
                                                </div>
                                            </div>

                                            <center>
                                                <div class="controls-group">
                                                    <button id="importAdultos" name="importAdultos" type="button" class="btn btn-primary" data-dismiss="modal">Cargar Archivo</button> 
                                                </div>
                                            </center>  
                                        </div>
                                    </form>
                                </div>

                                <div id="divFrmImportarFichasN" style="display: none;">
                                    <form  method="POST" class="form-horizontal" id="frmImportarFichasN">     
                                        <div class="tab-pane">
                                            <div class="control-group">
                                                <div class="controls">
                                                    <div class="control-group">
                                                        <label class="control-label" for="textinput">Semillero *</label>
                                                        <div class="controls input-group">
                                                            <select id="idSemilleroN"  name="idSemilleroN" class="input-xlarge">
                                                                <?php
                                                                include_once '../Model/libCombos.php';
                                                                $combo = new libCombos();
                                                                $combo->comboSemillerosNinos2();
                                                                echo $combo->getResult();
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="controls">
                                                        <input name="importarFichaN" id="importarFichaN" type="file" size="35" />
                                                    </div>      
                                                </div>
                                            </div>

                                            <center>
                                                <div class="controls-group">
                                                    <button id="importNinos" name="importNinos" type="button" class="btn btn-primary" data-dismiss="modal">Cargar Archivo</button> 
                                                </div>
                                            </center>  
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <!--.Footer-->                
                <?php //include_once '../includes/footer.php'; ?>

            </div>       
        </div>

        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>
        <script src="../js/funcionesImportarFichas.js" type="text/javascript"></script>

        <!-- Control de recargas de las tablas, siempre debe ir de ultima en las referencias js -->
        <script src="../js/fnSetFilteringDelay.js" type="text/javascript"></script>

        <input id="PUBLIC_PATH" name="PUBLIC_PATH" type="hidden" value="/">
        <div id="LoadingImage" class="ajax-loader" style="display:none;"></div>

    </body>
</html>

<div class="modal fade" id="exampleconfirmacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 8000;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">New message</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p id="modal-message">New message</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>