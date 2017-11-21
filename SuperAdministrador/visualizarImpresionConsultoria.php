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
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <h2><center>Consultoría</center></h2>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="250" align='right'>
                                            <label>Fecha de Ingreso: </label>
                                        </td>
                                        <td width="300">
                                            <input id="fechaIngreso"  name="fechaIngreso" type="date" disabled="true" class="input-xlarge">
                                        </td>
                                        <td width="200" align='right'>
                                            <label>No. Consecutivo: </label>    
                                        </td>
                                        <td width="300">
                                            <input id="consecutivo"  name="consecutivo" type="text" disabled="true" class="input-large">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <br><h3><center>I. INFORMACIÓN GENERAL</center></h3><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='right'>
                                            <label>2.Documento: </label>
                                        </td>
                                        <td colspan="3">
                                            <input id="documento"  name="documento" type="text" disabled="true" class="input-xlarge">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='right'>
                                            <br>
                                            <label>3.Nombres:</label>   
                                        </td>
                                        <td>
                                            <input id="nombre"  name="nombre" type="text" disabled="true" class="input-xlarge">
                                        </td>
                                        <td align='right'>
                                            <label>4.Sexo:</label> 
                                        </td>
                                        <td>
                                            <input type="radio" disabled="true" name="sexo" id="sexo-0" value="Masculino">
                                            Masculino
                                            <input type="radio" disabled="true" name="sexo" id="sexo-1" value="Femenino">
                                            Femenino
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>                                        
                                        <td align='right'>
                                            <label>Apellidos:</label>       
                                        </td>
                                        <td>
                                            <input id="apellido"  name="apellido" type="text" disabled="true" class="input-xlarge">
                                        </td>
                                        <td align='right'>
                                            <label>5.Edad:</label>   
                                        </td>
                                        <td>
                                            <input id="edad"  name="edad" type="text" disabled="true" class="input-mini">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='right'>
                                            <br>
                                            <label>6.Semillero:</label>
                                        </td>
                                        <td colspan="3">
                                            <input id="semillero"  name="semillero" type="text" disabled="true" class="input-xxlarge">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='right'>
                                            <label>7.Institución:</label>
                                        </td>
                                        <td colspan="3">
                                            <input id="institucion"  name="institucion" type="text" disabled="true" class="input-xxlarge">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='right'>
                                            <br>
                                            <label>8.Lugar de Nacimiento:</label>
                                        </td>
                                        <td>
                                            <input id="municipioNacimiento"  name="municipioNacimiento" type="text" disabled="true" class="input-xlarge">
                                        </td>
                                        <td align='right'>
                                            <label>9.Fecha Nacimiento:</label>
                                        </td>
                                        <td>
                                            <input id="fechaNacimiento"  name="fechaNacimiento" type="date" disabled="true" class="input-xlarge">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='right'>
                                            <label>10.Dirección:</label>
                                        </td>
                                        <td>
                                            <input id="direccion"  name="direccion" type="text" disabled="true" class="input-xlarge">
                                        </td>
                                        <td align='right'>
                                            <label>11.Barrio:</label>
                                        </td>
                                        <td>
                                            <input id="barrio"  name="barrio" type="text" disabled="true" class="input-xlarge">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='right'>
                                            <br>
                                            <label>12.Teléfono:</label>
                                        </td>
                                        <td>
                                            <input id="telefono"  name="telefono" type="text" disabled="true" class="input-xlarge">
                                        </td>
                                        <td align='right'>
                                            <label>13.Teléfono 2:</label>
                                        </td>
                                        <td>
                                            <input id="telefono2"  name="telefono2" type="text" disabled="true" class="input-xlarge">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='right'>
                                            <br>
                                            <label>14.Afiliación al SGSS:</label>
                                        </td>
                                        <td colspan="3">
                                            <input type="checkbox" disabled="true" name="seguridad" id="seguridad-0" value="EPS">
                                            Contributivo (EPS)
                                            <input type="checkbox" disabled="true" name="seguridad" id="seguridad-1" value="Sisben">
                                            Subsidiado (ARS o EPSS)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='right'>
                                            <br>
                                            <label>Beneficiario:</label>
                                        </td>
                                        <td colspan="3">
                                            <input type="radio" disabled="true" name="beneficiarios" id="beneficiarios-0" value="Participante">
                                            Participante
                                            <input type="radio" disabled="true" name="beneficiarios" id="beneficiarios-1" value="Familiar">
                                            Familiar
                                        </td>
                                    </tr>
                                </table>

                                <div id="datosBeneficiario" style="display: none;">

                                    <table>
                                        <tr>
                                            <td align='right'>
                                                <br>
                                                <label>Tipo Documento:</label>
                                            </td>
                                            <td>
                                                <select id="tipoDocumentoBeneficiario" name="tipoDocumentoBeneficiario" disabled="true" class="input-large">
                                                    <option value="0">SELECCIONE UN TIPO</option>
                                                    <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
                                                    <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                                                    <option value="Registro civil">Registro civil</option>
                                                </select>
                                            </td>
                                            <td align='right'>
                                                <label>Edad:</label>
                                            </td>
                                            <td>
                                                <input id="edadBeneficiario"  name="edadBeneficiario" type="text" disabled="true" class="input-large">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align='right'>
                                                <br>
                                                <label>Documento:</label>
                                            </td>
                                            <td>
                                                <input id="documentoBeneficiario"  name="documentoBeneficiario" type="text" disabled="true" class="input-xlarge">
                                            </td>
                                            <td align='right'>
                                                <label>Dirección:</label>
                                            </td>
                                            <td>
                                                <input id="direccionBeneficiario"  name="direccionBeneficiario" type="text" disabled="true" class="input-xlarge">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align='right'>
                                                <br>
                                                <label>Nombres:</label>
                                            </td>
                                            <td>
                                                <input id="nombresBeneficiario"  name="nombresBeneficiario" type="text" disabled="true" class="input-xlarge">
                                            </td>
                                            <td align='right'>
                                                <label>Barrio:</label>
                                            </td>
                                            <td>
                                                <input id="barrioBeneficiario"  name="barrioBeneficiario" type="text" disabled="true" class="input-xlarge">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align='right'>
                                                <br>
                                                <label>Apellidos:</label>
                                            </td>
                                            <td>
                                                <input id="apellidosBeneficiario"  name="apellidosBeneficiario" type="text" disabled="true" class="input-xlarge">
                                            </td>
                                            <td align='right'>
                                                <label>Teléfono:</label>
                                            </td>
                                            <td>
                                                <input id="telefonoBeneficiario"  name="telefonoBeneficiario" type="text" disabled="true" class="input-xlarge">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align='right'>
                                                <br>
                                                <label>Parentesco:</label>
                                            </td>
                                            <td>
                                                <input id="parentezcoBeneficiario"  name="parentezcoBeneficiario" type="text" disabled="true" class="input-xlarge">
                                            </td>
                                            <td align='right'>
                                                <label>Teléfono 2:</label>
                                            </td>
                                            <td>
                                                <input id="telefono2Beneficiario"  name="telefono2Beneficiario" type="text" disabled="true" class="input-xlarge">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align='right'>
                                                <br>
                                                <label>Ocupación:</label>
                                            </td>
                                            <td>
                                                <input id="ocupacionBeneficiario"  name="ocupacionBeneficiario" type="text" disabled="true" class="input-xlarge">
                                            </td>
                                            <td align='right'>
                                                <label>Tipo Seguridad:</label>
                                            </td>
                                            <td>
                                                <select id="tipoSeguridadBeneficiario"  name="tipoSeguridadBeneficiario" disabled="true" class="input-large">
                                                    <option value="0">SELECCIONE TIPO</option>
                                                    <option value="EPS">EPS</option>
                                                    <option value="Sisben">Sisben</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align='right'>
                                                <br>
                                                <label>Fecha Nacimiento:</label>
                                            </td>
                                            <td>
                                                <input id="fechaNacimientoBeneficiario"  name="fechaNacimientoBeneficiario" type="date" disabled="true" class="input-xlarge">
                                            </td>
                                            <td align='right'>
                                                <label>Entidad:</label>
                                            </td>
                                            <td>
                                                <input id="entidadBeneficiario"  name="entidadBeneficiario" type="text" disabled="true" class="input-xlarge">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><br></td>
                                        </tr>
                                        <tr>
                                            <td><br></td>
                                        </tr>
                                        <tr>
                                            <td><br></td>
                                        </tr>
                                    </table>

                                </div>

                                <table
                                    <tr>
                                        <td colspan="4">
                                            <br><h3><center>II. MOTIVO DE CONSULTA</center></h3><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">

                                            <div id="demo" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">
                                                <div id="motivo"></div>
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
                                                <div id="antecedentes"></div>
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
                                            <div id="familiares"></div>
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
                                            <input type="checkbox" name="remision[]" id="remision-0" disabled="true" value="Abuso sexual">
                                            Abuso sexual.
                                            <input type="checkbox" name="remision[]" id="remision-1" disabled="true" value="Depresión incluyendo ideación e intento suicida ">
                                            Depresión incluyendo ideación e intento suicida. 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="3">
                                            <input type="checkbox" name="remision[]" id="remision-2" disabled="true" value="Dif. Aprendizaje">
                                            Dif. Aprendizaje.
                                            <input type="checkbox" name="remision[]" id="remision-3" disabled="true" value="Farmacodependencia">
                                            Farmacodependencia.
                                            <input type="checkbox" name="remision[]" id="remision-4" disabled="true" value="Violencia intrafamiliar">
                                            Violencia intrafamiliar. 
                                            <input type="checkbox" name="remision[]" id="remision-5" disabled="true" value="Otros Cuál?">
                                            Otros Cuál?
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="3">
                                            <div id="demo" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">
                                                <div id="motivoRemisione"></div>
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
                                            <input type="checkbox" name="finalizo[]" id="finalizo-0" disabled="true" value="Culminación de la atención requerida">
                                            Culminación de la atención requerida.
                                            <input type="checkbox" name="finalizo[]" id="finalizo-1" disabled="true" value="Desersión">
                                            Desersión. 
                                            <input type="checkbox" name="finalizo[]" id="finalizo-2" disabled="true" value="Remisión otro programa">
                                            Remisión otro programa.
                                            <input type="checkbox" name="finalizo[]" id="finalizo-3" disabled="true" value="Cierre transitorio">
                                            Cierre transitorio.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='right'>
                                            <label>20. Estado del Proceso:</label>
                                        </td>
                                        <td colspan="3">
                                            <input type="radio" name="estadoProceso" id="estadoProceso-0" disabled="true" value="Activo">
                                            Activo
                                            <input type="radio" name="estadoProceso" id="estadoProceso-1" disabled="true" value="Cerrado">
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
                                        <button type="button" class="btn btn-primary" id="imprimirAsesoria">Imprimir</button>
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
        <script src="../js/funcionesHistorialMedico.js" type="text/javascript"></script>

        <script src="../js/fnSetFilteringDelay.js" type="text/javascript"></script>

        <script>
            imprimirConsultoria(<?php echo "'$idConsultoria'" ?>);
        </script>

        <input id="PUBLIC_PATH" name="PUBLIC_PATH" type="hidden" value="/">
        <div id="LoadingImage" class="ajax-loader" style="display:none;"></div>

    </body>
</html>