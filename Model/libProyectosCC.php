<?php

class libProyectosCC {

    private $idIntervecion;
    private $nombre;
    private $fechaIntervecion;
    private $numParticipantes;
    private $descripcion;
    private $isdelIntervecion;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this-> idIntervecion =  "";
        $this-> nombre = "";
        $this-> fechaIntervecion = "";
        $this-> numParticipantes = "";
        $this-> descripcion = "";
        $this-> isdelIntervecion = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdIntervecion() {
        return $this->idIntervecion;
    }

    function getNombre() {
        return $this->nombre;
    }
    
    function getFechaIntervecion() {
        return $this->fechaIntervecion;
    }
    
    function getNumParticipantes() {
        return $this->numParticipantes;
    }
    
    function getDescripcion() {
        return $this->descripcion;
    }

    function getIsdelIntervecion() {
        return $this->isdelIntervecion;
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

    function setIdIntervecion($idIntervecion) {
        $this->idIntervecion = $idIntervecion;
    }
    
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    function setFechaIntervecion($fechaIntervecion) {
        $this->fechaIntervecion = $fechaIntervecion;
    }
    
    function setNumParticipantes($numParticipantes) {
        $this->numParticipantes = $numParticipantes;
    }
    
    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setIsdelIntervecion($isdelIntervecion) {
        $this->isdelIntervecion = $isdelIntervecion;
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

    //Esta función permite el registro de nuevas habilidades al sistema, antes de este registro se valida que no haya una habilidad igual, 
    //si no existe se realiza el registro con éxito.
    function registrarIntervencion() { 
        $resp;
        $conexion = $this->link->conectar();
        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {
            $sql = "CALL SP_REGISTRAR_INTERVENCION('$this->nombre', '$this->fechaIntervecion', '$this->numParticipantes', '$this->descripcion');";
            $rs = $conexion->query($sql);
            
            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "Intervencion Registrada Con Éxito";
                $resp = TRUE;
            } else { 
                $this->respuesta = "fail";
                $this->mensaje = "El registro no se pudo realizar por una falla en la solicitud.";
                $resp = TRUE;  
            } 
            $this->link->desconectar();
        }  
    }
    
   
    //Esta función permite la consulta de todos los datos de una habilidad en específico retornando estos datos en un vector.
    function consultarIntervencion() {
        $resp;
        $conexion = $this->link->conectar();
        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {
            $sql = "CALL SP_CONSULTAR_INTERVENCION('$this->idIntervecion');";
            $rs = $conexion->query($sql);
            if ($rs->num_rows > 0) {
                $aRow = $rs->fetch_array();
                $row = array(
                    "IdIntervecion" => $aRow['idIntervencion'],
                    "Nombre" => $aRow['nombre'],
                    "FechaIntervecion" => $aRow['fechaIntervencion'],
                    "NumParticipantes" => $aRow['numParticipantes'],
                    "Descripcion" => $aRow['descripcion']
                );
                $this->link->desconectar();
                $this->result = $row;
                $this->respuesta = "all";
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La consulta no se pudo realizar.";
                $this->link->desconectar();
            }}}
    
    //Esta función permite la modificación de los datos de una habilidad consultado.
    function actualizarIntervencion() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_MODIFICAR_INTERVENCION('$this->idIntervecion', '$this->nombre', '$this->fechaIntervecion', '$this->numParticipantes', '$this->descripcion');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro se actualizo con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "El registro no se pudo actualizar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }
    
    //Esta función permite deshabilitar las habilidades, esto se hace modificando el estado de la habilidad de 1 a 0.
    function deshabilitarIntervencion() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_DESHABILITAR_INTERVENCION('$this->idIntervecion');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro de la Intervecion fue eliminado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La Intervecion no se pudo eliminar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite deshabilitar las salidas, esto se hace modificando el estado de la habilidad de 0 a 1.
    function habilitarIntervecion() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_HABILITAR_INTERVENCION('$this->idIntervecion');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro de la Intervecion fue habilitado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La Intervecion no se pudo habilitar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

    function contarproyectos(){

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT count(*) AS contarproyec FROM `tbl_intervenciones` WHERE isdelIntervencion = 1 AND fechaIntervencion BETWEEN '2017-01-01' AND '2017-12-31'";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Intervenciones Existentes: ".$numero['contarproyec']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }

       function contarproyectoseli(){

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT count(*) AS contarproyec FROM `tbl_intervenciones` WHERE isdelIntervencion = 0 AND fechaIntervencion BETWEEN '2017-01-01' AND '2017-12-31'";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Intervenciones Eliminadas: ".$numero['contarproyec']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }

    function contarparticipantes(){

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT SUM(numParticipantes) AS contarpartici FROM `tbl_intervenciones` WHERE isdelIntervencion = 1 AND fechaIntervencion BETWEEN '2017-01-01' AND '2017-12-31'";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Total de Participantes: ".$numero['contarpartici']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }

    function contarparticipanteseli(){

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT SUM(numParticipantes) AS contarpartici FROM `tbl_intervenciones` WHERE isdelIntervencion = 0 AND fechaIntervencion BETWEEN '2017-01-01' AND '2017-12-31'";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Total de Participantes: ".$numero['contarpartici']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }
}

