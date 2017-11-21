<?php

class libSalidas {

    private $idSalida;
    private $salida;
    private $fechaSalida;
    private $numParticipantes;
    private $descripcion;
    private $isdelSalida;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this-> idSalida =  "";
        $this-> salida = "";
        $this-> fechaSalida = "";
        $this-> numParticipantes = "";
        $this-> descripcion = "";
        $this-> isdelSalida = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdSalida() {
        return $this->idSalida;
    }

    function getSalida() {
        return $this->salida;
    }
    
    function getFechaSalida() {
        return $this->fechaSalida;
    }
    
    function getNumParticipantes() {
        return $this->numParticipantes;
    }
    
    function getDescripcion() {
        return $this->descripcion;
    }

    function getIsdelSalida() {
        return $this->isdelSalida;
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

    function setIdSalida($idSalida) {
        $this->idSalida = $idSalida;
    }
    
    function setSalida($salida) {
        $this->salida = $salida;
    }
    
    function setFechaSalida($fechaSalida) {
        $this->fechaSalida = $fechaSalida;
    }
    
    function setNumParticipantes($numParticipantes) {
        $this->numParticipantes = $numParticipantes;
    }
    
    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setIsdelSalida($isdelSalida) {
        $this->isdelSalida = $isdelSalida;
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


    function registrarSalida() { 
        
        $resp;
        $conexion = $this->link->conectar();
        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {
            $sql = "CALL SP_REGISTRAR_SALIDA('$this->salida', '$this->fechaSalida', '$this->numParticipantes', '$this->descripcion','$this->isdelSalida' );";
            $rs = $conexion->query($sql);
            
            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "Salida Registrada Con Éxito";
                $resp = TRUE;
            } else { 
                $this->respuesta = "fail";
                $this->mensaje = "El registro no se pudo realizar por una falla en la solicitud.";
                $resp = TRUE;  
            } 
            $this->link->desconectar();
        }  
    }
    
   
    //Esta función permite la consulta de todos los datos de una salida en específico retornando estos datos en un vector.
    function consultarSalida() {
        $resp;
        $conexion = $this->link->conectar();
        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {
            $sql = "CALL SP_CONSULTAR_SALIDA('$this->idSalida');";
            $rs = $conexion->query($sql);
            if ($rs->num_rows > 0) {
                $aRow = $rs->fetch_array();
                $row = array(
                    "IdSalida" => $aRow['idSalida'],
                    "Salida" => $aRow['salida'],
                    "FechaSalida" => $aRow['fechaSalida'],
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
    function actualizarSalida() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_MODIFICAR_SALIDA('$this->idSalida', '$this->salida', '$this->fechaSalida', '$this->numParticipantes', '$this->descripcion');";
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
    function deshabilitarSalida() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_DESHABILITAR_SALIDA('$this->idSalida');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro de la salida fue eliminado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La salida no se pudo eliminar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite deshabilitar las salidas, esto se hace modificando el estado de la habilidad de 0 a 1.
    function habilitarSalida() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_HABILITAR_SALIDA('$this->idSalida');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro de la Salida fue habilitado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La Salida no se pudo habilitar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }
}
