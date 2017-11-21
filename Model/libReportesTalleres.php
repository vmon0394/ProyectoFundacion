<?php

class libReportesTalleres {

    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getRespuesta() {
        return $this->respuesta;
    }

    function getMensaje() {
        return $this->mensaje;
    }

    function getResult() {
        return $this->result;
    }

    function getLink() {
        return $this->link;
    }

    function setRespuesta($respuesta) {
        $this->respuesta = $respuesta;
    }

    function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
    }

    function setResult($result) {
        $this->result = $result;
    }

    function setLink($link) {
        $this->link = $link;
    }

     function sumarsemilleros(){

         $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT count(*) AS contarsemi FROM tbl_semilleros WHERE isdelSemillero = '1' AND idCategoria < '20' ORDER BY nombreSemillero";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Numero de Semilleros: ".$numero['contarsemi']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }

    function reporteTalleresSemillero() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $tabla = "";
            $sql = "SELECT * FROM `tbl_semilleros` WHERE isdelSemillero = 1 AND idCategoria < '20' ORDER BY nombreSemillero";

            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $idSemillero = "";
                $nombreSemillero = "";
                $numTalleres = 0;
                $nummayor = 0;
                $contador=0;

                while ($aRow = $rs->fetch_assoc()) {

                    $idSemillero = $aRow['idSemillero'];
                    $nombreSemillero = $aRow['nombreSemillero'];
                    $contador++;

                    $sqlT = "SELECT * FROM `tbl_talleres` WHERE idSemillero = '$idSemillero'AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31' ";
                    $rsT = $conexion->query($sqlT);
                    $numTalleres = $rsT->num_rows;

                    $sqlj = "SELECT * FROM tbl_talleres WHERE idSemillero = '$idSemillero' IN (SELECT MAX('$idSemillero'))  AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31' ";
                    $rsj = $conexion->query($sqlj);
                    $nummayor = $rsj->num_rows;

                    $sql1 = "SELECT DISTINCT fechaTaller from `tbl_talleres` WHERE fechaTaller = (SELECT MIN(fechaTaller) FROM `tbl_talleres` WHERE idSemillero = $idSemillero AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31')";
                    $rs1 = $conexion->query($sql1);
                    $bRow = $rs1->fetch_assoc();
                    $fecha = $bRow['fechaTaller'];

                    $alto = max(array($numTalleres));
                    $porcentaje = ($alto*27/100);
                    //$total = ($nummayor*27/100);
                 
                    if( $nummayor < $numTalleres){
                            $tabla .= "<tr>"
                                    . "<td>$contador</td>"
                                    . "<td>$nombreSemillero</td>"
                                    . "<td>$fecha</td>"
                                    . "<td>$numTalleres</td>"
                                    . "<td> <progress id='html5' max='10' value='$porcentaje'></progress>%$porcentaje</td>" 
                                    . "</tr>";
                    }else{
                            $tabla .= "<tr>"
                            . "<td>$contador</td>"
                            . "<td><font color='red'>$nombreSemillero</font></td>"
                            . "<td>$fecha</td>"
                            . "<td><font color='red'>".$numTalleres."</font></td>"
                            . "<td> <progress id='html5' max='10' value='$porcentaje'></progress><font color='red'> %$porcentaje</font></td>"   
                            . "</tr>";

                    }
                }
                         /*$tabla .= "<tr>"
                                . "<td>$contador</td>"
                                . "<td><font color='red'>$nombreSemillero</font></td>"
                                . "<td><font color='red'>".$numTalleres."</font></td>"
                                . "<td><font color='red'>$porcentaje</td></font></td>" 
                                . "<td>$nummayor</td>"  
                                . "</tr>";

                    }else{

                        $tabla .= "<tr>"
                                . "<td>$contador</td>"
                                . "<td>$nombreSemillero</td>"
                                . "<td>$numTalleres</td>"
                                . "<td>$porcentaje</td>" 
                                . "<td>$nummayor</td>"
                                . "</tr>";

                    }*/

                $this->result = $tabla;
                $this->respuesta = "all";
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La consulta no se pudo realizar.";
            }
            $this->link->desconectar();
        }
    }

    function reporteTallere2016() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $tabla = "";
            $sql = "SELECT * FROM `tbl_semilleros` WHERE idCategoria < '20' ORDER BY nombreSemillero";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $idSemillero = "";
                $nombreSemillero = "";
                $numTalleres = 0;
                $nummayor = 0;
                $contador=0;

                while ($aRow = $rs->fetch_assoc()) {

                    $idSemillero = $aRow['idSemillero'];
                    $nombreSemillero = $aRow['nombreSemillero'];
                    $contador++;

                    $sqlT = "SELECT * FROM `tbl_talleres` WHERE idSemillero = '$idSemillero'AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31'";
                    $rsT = $conexion->query($sqlT);
                    $numTalleres = $rsT->num_rows;

                    $sqlj = "SELECT * FROM tbl_talleres WHERE idSemillero = '$idSemillero' IN (SELECT MAX('$idSemillero')) AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31'";
                    $rsj = $conexion->query($sqlj);
                    $nummayor = $rsj->num_rows;

                    $alto = max(array($numTalleres));
                    $porcentaje = ($alto*27/100);
                    //$total = ($nummayor*27/100);
                 
                    if( $nummayor < $numTalleres){
                            $tabla .= "<tr>"
                                    . "<td>$contador</td>"
                                    . "<td>$nombreSemillero</td>"
                                    . "<td>$numTalleres</td>"
                                    . "<td> <progress id='html5' max='10' value='$porcentaje'></progress>%$porcentaje</td>" 
                                    . "</tr>";
                    }else{
                            $tabla .= "<tr>"
                            . "<td>$contador</td>"
                            . "<td><font color='red'>$nombreSemillero</font></td>"
                            . "<td><font color='red'>".$numTalleres."</font></td>"
                            . "<td> <progress id='html5' max='10' value='$porcentaje'></progress><font color='red'> %$porcentaje</font></td>"   
                            . "</tr>";

                    }
                }
                         /*$tabla .= "<tr>"
                                . "<td>$contador</td>"
                                . "<td><font color='red'>$nombreSemillero</font></td>"
                                . "<td><font color='red'>".$numTalleres."</font></td>"
                                . "<td><font color='red'>$porcentaje</td></font></td>" 
                                . "<td>$nummayor</td>"  
                                . "</tr>";

                    }else{

                        $tabla .= "<tr>"
                                . "<td>$contador</td>"
                                . "<td>$nombreSemillero</td>"
                                . "<td>$numTalleres</td>"
                                . "<td>$porcentaje</td>" 
                                . "<td>$nummayor</td>"
                                . "</tr>";

                    }*/

                $this->result = $tabla;
                $this->respuesta = "all";
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La consulta no se pudo realizar.";
            }
            $this->link->desconectar();
        }
    }

     function contartalleres() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT count(*) AS contartaller FROM `tbl_talleres` AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31'";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Total Talleres: ".$numero['contartaller']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }

    function reportenumerodetalleres() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $tabla = "";
            $sql = "SELECT * FROM `tbl_semilleros` WHERE isdelSemillero = 1 AND idCategoria < '20' ORDER BY nombreSemillero ";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $idSemillero = "";
                $nombreSemillero = "";
                $fechaTaller = "";
                $numTalleres = 0;
                $nummayor = 0;
                $contador=0;

                while ($aRow = $rs->fetch_assoc()) {

                    $idSemillero = $aRow['idSemillero'];
                    $nombreSemillero = $aRow['nombreSemillero'];
                    $contador++;

                    $sqlT = "SELECT * FROM `tbl_talleres` WHERE idSemillero = '$idSemillero'AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
                    $rsT = $conexion->query($sqlT);
                    $numTalleres = $rsT->num_rows;

                    $sqlj = "SELECT * FROM tbl_talleres WHERE idSemillero = '$idSemillero' IN (SELECT MAX('$idSemillero')) AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
                    $rsj = $conexion->query($sqlj);
                    $nummayor = $rsj->num_rows;

                    $sql1 = "SELECT DISTINCT fechaTaller from `tbl_talleres` WHERE fechaTaller = (SELECT MIN(fechaTaller) FROM `tbl_talleres` WHERE idSemillero = $idSemillero AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31')";
                    $rs1 = $conexion->query($sql1);
                    $bRow = $rs1->fetch_assoc();
                    $fechaTaller = $bRow['fechaTaller'];

                    $alto = max(array($numTalleres));
                    $porcentaje = ($alto*27/100);
                    //$total = ($nummayor*27/100);
                  
                    $tabla .= "<tr>"
                            . "<td>$contador</td>"
                            . "<td><a href='infosemilleroadmi.php?ui=".base64_encode($idSemillero)."'>$nombreSemillero</a></td>"
                            . "<td>$fechaTaller</td>"
                            . "<td>$numTalleres</td>"
                            . "<td> <progress id='html5' max='10' value='$porcentaje'></progress>%$porcentaje</td>" 
                            . "</tr>";
                    
                }

                $this->result = $tabla;
                $this->respuesta = "all";
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La consulta no se pudo realizar.";
            }
            $this->link->desconectar();
        }
    }

    function todoslosemilleros() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $tabla = "";
            $sql = "SELECT * FROM tbl_semilleros WHERE isdelSemillero = 1 ORDER BY nombreSemillero";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {
                $idSemillero = "";
                $nombreSemillero = "";              
                $contador=0;

                while ($aRow = $rs->fetch_assoc()) {
                    $idSemillero = $aRow['idSemillero'];
                    $nombreSemillero = $aRow['nombreSemillero'];
                    $contador++;
                  
                    $tabla .= "<tr>"
                            . "<td>$contador</td>"
                            . "<td><a href='agregartalleradmi.php?ui=".base64_encode($idSemillero)."'>$nombreSemillero</a></td>"
                            . "</tr>";
                    
                }

                $this->result = $tabla;
                $this->respuesta = "all";
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La consulta no se pudo realizar.";
            }
            $this->link->desconectar();
        }
    }

    function listasemillerospdf() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $tabla = "";
            $sql = "SELECT * FROM tbl_semilleros WHERE isdelSemillero = 1";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {
                $idSemillero = "";
                $nombreSemillero = "";              
                $contador=0;

                while ($aRow = $rs->fetch_assoc()) {
                    $idSemillero = $aRow['idSemillero'];
                    $nombreSemillero = $aRow['nombreSemillero'];
                    $contador++;
                  
                    $tabla .= "<tr>"
                            . "<td>$contador</td>"
                            . "<td><a href='Tablatalleres.php?ui=".base64_encode($idSemillero)."' target='_blank'>$nombreSemillero</a></td>"
                            . "</tr>";
                    
                }

                $this->result = $tabla;
                $this->respuesta = "all";
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La consulta no se pudo realizar.";
            }
            $this->link->desconectar();
        }
    }

    function listasemilleros() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $tabla = "";
            $sql = "SELECT * FROM tbl_semilleros WHERE isdelSemillero = 1 ";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {
                $idSemillero = "";
                $nombreSemillero = "";              
                $contador=0;

                while ($aRow = $rs->fetch_assoc()) {
                    $idSemillero = $aRow['idSemillero'];
                    $nombreSemillero = $aRow['nombreSemillero'];
                    $contador++;
                    $tabla .= "<tr>"
                            . "<td>$contador</td>"
                            . "<td><a href='Fichasocio.php?ui=".base64_encode($idSemillero)."' target='_blank'>$nombreSemillero</a></td>"
                            . "</tr>";
            
                }

                $this->result = $tabla;
                $this->respuesta = "all";
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La consulta no se pudo realizar.";
            }
            $this->link->desconectar();
        }
    }

    function fichasociofamiliares() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $tabla = "";
            $sql = "SELECT * FROM tbl_semilleros WHERE isdelSemillero = 1 ORDER BY nombreSemillero";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {
                $idSemillero = "";
                $nombreSemillero = "";              
                $contador=0;

                while ($aRow = $rs->fetch_assoc()) {
                    $idSemillero = $aRow['idSemillero'];
                    $nombreSemillero = $aRow['nombreSemillero'];
                    $contador++;
                  
                    $tabla .= "<tr>"
                            . "<td>$contador</td>"
                            . "<td><a href='Fichasociofaci.php?ui=".base64_encode($idSemillero)."'>$nombreSemillero</a></td>"
                            . "</tr>";
                
                }

                $this->result = $tabla;
                $this->respuesta = "all";
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La consulta no se pudo realizar.";
            }
            $this->link->desconectar();
        }
    }

    function listaactespeciales() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $tabla = "";
            $sql = "SELECT * FROM tbl_talleres WHERE tipoTaller = 'Actividades Especiales' ";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {
                $idTaller = "";
                $nombreTaller = ""; 
                $fechaTaller = "";
                $objetivo = "";  
                $asistenciaTaller = "";           
                $contador=0;

                while ($aRow = $rs->fetch_assoc()) {
                    $idTaller = $aRow['idTaller'];
                    $nombreTaller = $aRow['nombreTaller'];
                    $objetivo = $aRow['objetivo'];
                    $fechaTaller = $aRow['fechaTaller'];
                    $asistenciaTaller = $aRow['asistenciaTaller'];
                    $contador++;
                    $tabla .= "<tr>"
                            . "<td>$contador</td>"
                            . "<td>$nombreTaller</td>"
                            . "<td>$objetivo</td>"
                            . "<td>$fechaTaller</td>"
                            . "<td>$asistenciaTaller</td>"
                            . "</tr>";
            
                }

                $this->result = $tabla;
                $this->respuesta = "all";
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La consulta no se pudo realizar.";
            }
            $this->link->desconectar();
        }
    }

    function listasalidasped() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $tabla = "";
            $sql = "SELECT * FROM tbl_talleres WHERE tipoTaller = 'Salidas Pedagogicas' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31' ";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {
                $idTaller = "";
                $nombreTaller = ""; 
                $fechaTaller = "";
                $objetivo = ""; 
                $asistencia = "";            
                $contador=0;

                while ($aRow = $rs->fetch_assoc()) {
                    $idTaller = $aRow['idTaller'];
                    $nombreTaller = $aRow['nombreTaller'];
                    $objetivo = $aRow['objetivo'];
                    $fechaTaller = $aRow['fechaTaller'];
                    $asistencia = $aRow['asistenciaTaller'];
                    $contador++;
                    $tabla .= "<tr>"
                            . "<td>$contador</td>"
                            . "<td>$nombreTaller</td>"
                            . "<td>$objetivo</td>"
                            . "<td>$fechaTaller</td>"
                            . "<td>$asistencia</td>"
                            . "<td></td>"
                            . "</tr>";
            
                }

                $this->result = $tabla;
                $this->respuesta = "all";
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La consulta no se pudo realizar.";
            }
            $this->link->desconectar();
        }
    }
    function listaencuentro() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $tabla = "";
            $sql = "SELECT * FROM tbl_talleres WHERE tipoTaller = 'Encuentro de Padres' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31' ";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {
                $idTaller = "";
                $nombreTaller = ""; 
                $fechaTaller = "";
                $asisteciaTaller = "";
                $objetivo = "";             
                $contador=0;

                while ($aRow = $rs->fetch_assoc()) {
                    $idTaller = $aRow['idTaller'];
                    $nombreTaller = $aRow['nombreTaller'];
                    $objetivo = $aRow['objetivo'];
                    $fechaTaller = $aRow['fechaTaller'];
                    $asisteciaTaller = $aRow['asistenciaTaller'];

                    $contador++;
                    $tabla .= "<tr>"
                            . "<td>$contador</td>"
                            . "<td>$nombreTaller</td>"
                            . "<td>$objetivo</td>"
                            . "<td>$fechaTaller</td>"
                            . "<td>$asistenciaTaller</td>"
                            . "<td></td>"
                            . "</tr>";
            
                }

                $this->result = $tabla;
                $this->respuesta = "all";
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La consulta no se pudo realizar.";
            }
            $this->link->desconectar();
        }
    }

}

//$x = new libSemilleros();
//$x->reporteTalleresSemillero();
//echo $x->getResult();
