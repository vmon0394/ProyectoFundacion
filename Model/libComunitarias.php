<?php

class libComunitarias {

    private $idComunitaria;
    private $nombre;
    private $fechaActividad;
    private $descripcion;
    private $numParticipantes;
    private $isdelActividad;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this-> idComunitaria =  "";
        $this-> nombre = "";
        $this-> fechaActividad = "";
        $this-> descripcion = "";
        $this-> numParticipantes = "";
        $this-> isdelActividad = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdComunitaria() {
        return $this->idComunitaria;
    }

    function getNombre() {
        return $this->nombre;
    }
    
    function getFechaActividad() {
        return $this->fechaActividad;
    }
    
    function getDescripcion() {
        return $this->descripcion;
    }

     function getNumParticipantes() {
        return $this->numParticipantes;
    }

    function getIsdelActividad() {
        return $this->isdelActividad;
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

    function setIdComunitaria($idComunitaria) {
        $this->idComunitaria = $idComunitaria;
    }
    
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    function setFechaActividad($fechaActividad) {
        $this->fechaActividad = $fechaActividad;
    }
    
    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setNumParticipantes($numParticipantes) {
        $this->numParticipantes = $numParticipantes;
    }
    
    function setIsdelActividad($isdelActividad) {
        $this->isdelActividad = $isdelActividad;
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
    function registrarComunitaria() { 
        $resp;
        $conexion = $this->link->conectar();
        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {
            $sql = "CALL SP_REGISTRAR_COMUNITARIA('$this->nombre', '$this->fechaActividad', '$this->descripcion', '$this->numParticipantes');";
            $rs = $conexion->query($sql);
            
            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "Actividad Registrada Con Éxito";
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
    function consultarComunitaria() {
        $resp;
        $conexion = $this->link->conectar();
        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {
            $sql = "CALL SP_CONSULTAR_COMUNITARIA('$this->idComunitaria');";
            $rs = $conexion->query($sql);
            if ($rs->num_rows > 0) {
                $aRow = $rs->fetch_array();
                $row = array(
                    "IdComunitaria" => $aRow['idComunitaria'],
                    "Nombre" => $aRow['nombre'],
                    "FechaActividad" => $aRow['fechaActividad'],
                    "Descripcion" => $aRow['descripcion'],
                    "NumParticipantes" => $aRow['numParticipantes']
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
    function actualizarComunitaria() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_MODIFICAR_COMUNITARIA('$this->idComunitaria', '$this->nombre', '$this->fechaActividad', '$this->descripcion', '$this->numParticipantes');";
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
    function deshabilitarComunitaria() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_DESHABILITAR_COMUNITARIA('$this->idComunitaria');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro de la Actividad fue eliminado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La Actividad no se pudo eliminar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite habilitar las salidas, esto se hace modificando el estado de la habilidad de 0 a 1.
    function habilitarComunitaria() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_HABILITAR_COMUNITARIA('$this->idComunitaria');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro de la Actividad fue habilitado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La Actividad no se pudo habilitar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }
    
    function contarComunitarias() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT count(*) AS contarcomunitarias FROM `tbl_comunitarias` WHERE isdelActividad = 1";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Actividades Existentes: ".$numero['contarcomunitarias']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }

    function contarComunitariasEliminadas() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT count(*) AS contarcomunitarias FROM `tbl_comunitarias` WHERE isdelActividad = 0";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Actividades Eliminadas: ".$numero['contarcomunitarias']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }
}
