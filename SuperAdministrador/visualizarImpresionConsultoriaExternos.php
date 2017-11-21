<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["perfil"] != "SuperAdministrador") {
    echo '<meta http-equiv="refresh" content="0;url=index.php" />';
}

$idConsultoria = 0;
if (isset($_GET['consultoria'])) {
    $idConsultoria = $_GET['consultoria'] != 0 ? $_GET['consultoria'] : 0;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shorcut icon type=" href="../favicon.png"/>
        <title>www.fundacionconconcreto.org</title>

        <!-- Referencias js,css -->
        <?php include_once '../includes/head.php'; ?>
        <style>
            .pagina2{
                page-break-before:always;
            }
        </style>
    </head>
    <body>

        <div class="container-fluid content-wrapper">
            <br>
            <!--.Navigation Bar -->
            <?php //include_once 'menu.php';  ?>
            <!--/.Navigation Bar-->  

            <!-- CONTENIDO PRINCIPAL -->
            <div class="row-fluid">                
                <div class="breadcrumb">
                    <div class="tab-content"> 

                        <form  method="POST" id="frmAsesoriaParticipante">     

                            <div class="tab-pane">

                                <table>
                                    <tr>
                                        <td colspan="3">                                            
                                        </td>
                                        <td>
                                            <img src="../img/fundacion_logo.png">
                                            <br>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <h2><center>Atención y Seguimiento Psicológico</center></h2>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="250" align='right'>
                                            <label>Fecha de Ingreso: </label>
                                        </td>
                                        <td width="300">
                                            <input id="fechaIngresoEx"  name="fechaIngresoEx" type="date" disabled="true" class="input-xlarge">
                                        </td>
                                        <td width="200" align='right'>
                                            <label>No. Consecutivo: </label>    
                                        </td>
                                        <td width="300">
                                            <input id="consecutivoEx"  name="consecutivoEx" type="text" disabled="true" class="input-large">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <br><h3><center>I. INFORMACIÓN GENERAL</center></h3><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='right'>
                                            <label>1.Tipo Documento:</label>
                                        </td>
                                        <td>
                                            <select id="tipoDocumentoEx" disabled="true" name="tipoDocumentoEx" class="input-large">
                                                <option value="0">SELECCIONE UN TIPO</option>
                                                <option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
                                                <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                                                <option value="Registro Civil">Registro Civil</option>
                                            </select>
                                        </td>
                                        <td align='right'>
                                            <label>11.Ocupación o Inst.:</label>
                                        </td>
                                        <td>
                                            <input id="ocupacioInstitucion"  name="ocupacioInstitucion" type="text" disabled="true" class="input-xlarge">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='right'>
                                            <label>2.Documento: </label>
                                        </td>
                                        <td>
                                            <input id="documentoEx"  name="documentoEx" type="text" disabled="true" class="input-xlarge">
                                        </td>
                                        <td align='right'>
                                            <label>12.Grado Escolar:</label>
                                        </td>
                                        <td>
                                            <input id="gradoEx"  name="gradoEx" type="text" disabled="true" class="input-xlarge">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='right'>
                                            <label>3.Nombres:</label>
                                        </td>
                                        <td>
                                            <input id="nombreEx"  name="nombreEx" type="text" disabled="true" class="input-xlarge">
                                        </td>
                                        <td align='right'>
                                            <label>13.Depar. Residencia:</label>
                                        </td>
                                        <td>
                                            <select id="departamentoResidencia" name="departamentoResidencia" disabled="true" class="input-xlarge" onchange="Carga('../Controller/ctrlCombos.php?opcion=1&depar=' + document.getElementById('departamentoResidencia').value, 'ciudadResidencia');">
                                                <?php
                                                include_once '../Model/libCombos.php';
                                                $combo = new libCombos();
                                                $combo->comboDepartamentos();
                                                echo $combo->getResult();
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='right'>
                                            <label>4.Apellidos:</label>
                                        </td>
                                        <td>
                                            <input id="apellidoEx"  name="apellidoEx" type="text" disabled="true" class="input-xlarge">
                                        </td>
                                        <td align='right'>
                                            <label>14.Ciudad Residencia:</label>
                                        </td>
                                        <td>
                                            <select id="ciudadResidencia" name="ciudadResidencia" disabled="true" class="input-xlarge">
                                                <option value="0">SELECCIONE UN MUNICIPIO O CIUDAD</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">
                                            <label>5.Depar. Nacimiento:</label>
                                        </td>                                        
                                        <td>
                                            <select id="departamentoNacimiento" name="departamentoNacimiento" disabled="true" class="input-xlarge" onchange="Carga('../Controller/ctrlCombos.php?opcion=1&depar=' + document.getElementById('departamentoNacimiento').value, 'ciudadNacimiento');">
                                                <?php
                                                include_once '../Model/libCombos.php';
                                                $combo = new libCombos();
                                                $combo->comboDepartamentos();
                                                echo $combo->getResult();
                                                ?>
                                            </select>
                                        </td>
                                        <td align="right">
                                            <label>15.Dirección:</label>
                                        </td>                                        
                                        <td>
                                            <input id="direccionEx"  name="direccionEx" type="text" disabled="true" class="input-xlarge">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">
                                            <label>6.Ciudad Nacimiento:</label>
                                        </td>                                        
                                        <td>
                                            <select id="ciudadNacimiento" name="ciudadNacimiento" disabled="true" class="input-xlarge">
                                                <option value="0">SELECCIONE UN MUNICIPIO O CIUDAD</option>
                                            </select>
                                        </td>
                                        <td align="right">
                                            <label>16.Barrio:</label>
                                        </td>                                        
                                        <td>
                                            <input id="barrioEx"  name="barrioEx" type="text" disabled="true" class="input-xlarge">
                                        </td>
                                    </tr>                                    
                                    <tr>
                                        <td align="right">
                                            <label>7.Fecha Nacimiento:</label>
                                        </td>                                        
                                        <td>
                                            <input id="fechaNacimientoEx"  name="fechaNacimientoEx" type="date" disabled="true" class="input-xlarge">
                                        </td>
                                        <td align="right">
                                            <label>17.Teléfono:</label>
                                        </td>                                        
                                        <td>
                                            <input id="telefonoEx"  name="telefonoEx" type="text" disabled="true" class="input-xlarge">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">
                                            <label>8.Edad:</label>
                                        </td>                                        
                                        <td>
                                            <input id="edadEx" name="edadEx" type="text" disabled="true" class="input-mini">
                                        </td>
                                        <td align="right">
                                            <label>18.Teléfono 2:</label>
                                        </td>                                        
                                        <td>
                                            <input id="telefono2Ex"  name="telefono2Ex" type="text" disabled="true" class="input-xlarge">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">
                                            <label>9.Sexo:</label>
                                        </td>                                        
                                        <td>
                                            <input type="radio" name="sexoEx" id="sexoEx-0" value="Masculino">
                                            Masculino
                                            <input type="radio" name="sexoEx" id="sexoEx-1" value="Femenino">
                                            Femenino
                                        </td>
                                        <td align="right">
                                            <label>19.Afiliación al SGSS:</label>
                                        </td>                                        
                                        <td>
                                            <input type="radio" name="seguridadEx" id="seguridadEx-0" value="EPS">
                                            Contributivo (EPS)
                                            <input type="radio" name="seguridadEx" id="seguridadEx-1" value="Sisben">
                                            Subsidiado (ARS o EPSS)
                                        </td>
                                    </tr>

                                    <tr>
                                        <td align="right">
                                            <label>10.Relación Fundación:</label>
                                        </td>                                        
                                        <td>
                                            <input id="relacionFundacion"  name="relacionFundacion" type="text" disabled="true" class="input-xlarge">
                                        </td>
                                        <td align="right">
                                            <label>20.Entidad:</label>
                                        </td>                                        
                                        <td>
                                            <input id="entidadEx"  name="entidadEx" type="text"  disabled="true" class="input-xlarge">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='right'>
                                            <br>
                                            <label>Beneficiario:</label>
                                        </td>
                                        <td colspan="3">
                                            <input type="radio" name="beneficiarioEx" id="beneficiarioEx-0" value="Adulto">
                                            Adulto
                                            <input type="radio" name="beneficiarioEx" id="beneficiarioEx-1" value="Niño">
                                            Niño
                                        </td>
                                    </tr>
                                </table>

                                <table
                                    <tr>
                                        <td colspan="4">
                                            <br><h3><center>II. MOTIVO DE CONSULTA</center></h3><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">

                                            <div id="demo" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">
                                                <div id="motivoEx"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <br><h3><center>III. ANTECEDENTES FAMILIARES</center></h3><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <div id="demo" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">
                                                <div id="antecedentesEx"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                    <br><center><p>CONFORMACIÓN FAMILIAR</p></center>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                    <center>
                                        <p>NOMBRE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            EDAD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            PARENTESCO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            OCUPACIÓN</p>
                                        <div id="demo" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">
                                            <div id="familiaresEx"></div>
                                        </div> 
                                    </center>
                                    </td>
                                    </tr>                                    
                                    <tr>
                                        <td colspan="4">
                                            <br><h3><center>VIII. REMISIONES A OTRAS INSTITUCIONES</center></h3><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='right'>
                                            <label>18. Remitido Por:</label>
                                        </td>
                                        <td colspan="3">
                                            <input type="checkbox" name="remisionEx[]" id="remisionEx-0" disabled="true" value="Abuso sexual">
                                            Abuso sexual.
                                            <input type="checkbox" name="remisionEx[]" id="remisionEx-1" disabled="true" value="Depresión incluyendo ideación e intento suicida ">
                                            Depresión incluyendo ideación e intento suicida. 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="3">
                                            <input type="checkbox" name="remisionEx[]" id="remisionEx-2" disabled="true" value="Dif. Aprendizaje">
                                            Dif. Aprendizaje.
                                            <input type="checkbox" name="remisionEx[]" id="remisionEx-3" disabled="true" value="Farmacodependencia">
                                            Farmacodependencia.
                                            <input type="checkbox" name="remisionEx[]" id="remisionEx-4" disabled="true" value="Violencia intrafamiliar">
                                            Violencia intrafamiliar. 
                                            <input type="checkbox" name="remisionEx[]" id="remisionEx-5" disabled="true" value="Otros Cuál?">
                                            Otros Cuál?
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="3">
                                            <div id="demo" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">
                                                <div id="motivoRemisioneEx"></div>
                                            </div>      
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <br><h3><center>IX. FINALIZACIÓN DEL PROCESO</center></h3><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='right'>
                                            <label>19. El proceso finalizó:</label>
                                        </td>
                                        <td colspan="3">
                                            <input type="checkbox" name="finalizoEx[]" id="finalizoEx-0" disabled="true" value="Culminación de la atención requerida">
                                            Culminación de la atención requerida.
                                            <input type="checkbox" name="finalizoEx[]" id="finalizoEx-1" disabled="true" value="Desersión">
                                            Desersión. 
                                            <input type="checkbox" name="finalizoEx[]" id="finalizoEx-2" disabled="true" value="Remisión otro programa">
                                            Remisión otro programa.
                                            <input type="checkbox" name="finalizoEx[]" id="finalizoEx-3" disabled="true" value="Cierre transitorio">
                                            Cierre transitorio.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='right'>
                                            <label>20. Estado del Proceso:</label>
                                        </td>
                                        <td colspan="3">
                                            <input type="radio" name="estadoProcesoEx" id="estadoProcesoEx-0" disabled="true" value="Activo">
                                            Activo
                                            <input type="radio" name="estadoProcesoEx" id="estadoProcesoEx-1" disabled="true" value="Cerrado">
                                            Cerrado
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <br><h3><center>DETALLE DE LA INTERVENCIONES REALIZADAS</center></h3><br>
                                        </td>
                                    </tr>

                                </table>

                                <div class="table-responsive">                            
                                    <table class="table table-striped table-hover table-bordered table-condensed" border="1" id="tblSeguimientos">

                                    </table>
                                </div>

                                <br><br><br><br><br><br>

                                <table>
                                    <tr>
                                        <td width="320">
                                            Nombre Psicólogo: <div id="nombrePsicologo"></div>
                                        </td>
                                        <td width="320">
                                            Firma:
                                            <br>
                                            __________________________________
                                        </td>
                                        <td width="320">
                                            Registro: <div id="targetaProfe"></div>
                                        </td>
                                    </tr>
                                </table>

                                <br>
                                <div>
                                    <center>
                                        <button type="button" class="btn btn-primary" id="imprimirAsesoriaExt">Imprimir</button>
                                    </center>
                                </div>

                            </div>
                        </form>                        

                    </div>
                </div>

            </div>       
        </div>

        <!-- Referencias js -->
        <?php include_once '../includes/endBody.php'; ?>
        <script src="../js/funcionesHistorialMedicoExterno.js" type="text/javascript"></script>

        <script src="../js/fnSetFilteringDelay.js" type="text/javascript"></script>

        <script>
            imprimirConsultoriaExternos(<?php echo "'$idConsultoria'" ?>);
        </script>

        <input id="PUBLIC_PATH" name="PUBLIC_PATH" type="hidden" value="/">
        <div id="LoadingImage" class="ajax-loader" style="display:none;"></div>

    </body>
</html>