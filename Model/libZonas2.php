<?php

class libZonas2 {

    private $idZona;
    private $nombreZona;
    private $alias;
    private $isdelZona;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->idZona = "";
        $this->nombreZona = "";
        $this->alias = "";
        $this->isdelZona = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdZona() {
        return $this->idZona;
    }

    function getNombreZona() {
        return $this->nombreZona;
    }
    
    function getAlias() {
        return $this->alias;
    }

    function getIsdelZona() {
        return $this->isdelZona;
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

    function setIdZona($idZona) {
        $this->idZona = $idZona;
    }

    function setNombreZona($nombreZona) {
        $this->nombreZona = $nombreZona;
    }
    
    function setAlias($alias) {
        $this->alias = $alias;
    }

    function setIsdelZona($isdelZona) {
        $this->isdelZona = $isdelZona;
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

    //Esta función permite el registro de los servicios, esta se valida que no haya un valor con el mismo nombre, 
    //si no existe un servicio similar se registra la valor con éxito.
    function registrarZona() { 
        $resp;
        $conexion = $this->link->conectar();
        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
            
        } else {

            $sql1 = "SELECT * FROM `tbl_zonas2` WHERE nombreZona LIKE '%$this->nombreZona%' OR alias = '$this->alias' ";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $this->respuesta = "fail";
                $this->mensaje = "el nombre o el alias de la zona ya existe.";
                $resp = FALSE;    
            } else {
                $sql = "CALL SP_REGISTRAR_ZONA2('$this->nombreZona', '$this->alias', '$this->isdelZona');";
                $rs = $conexion->query($sql);

                if ($rs > 0) {
                    $this->respuesta = "all";
                    $this->mensaje = "Zona Registrada Con Éxito";
                    $resp = TRUE;
                } else { 
                    $this->respuesta = "fail";
                    $this->mensaje = "El registro no se pudo realizar por una falla en la solicitud.";
                    $resp = TRUE;  
                } 
                $this->link->desconectar();
            }  
        }
    }

    //Esta función permite traer todos los datos del servicio seleccionada, estos datos se retornan en un vector.
    function consultarZona() {

        $resp;
        $conexion = $this->link->conectar();
        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {
            $sql = "CALL SP_CONSULTAR_ZONA2('$this->idZona');";
            $rs = $conexion->query($sql);
            if ($rs->num_rows > 0) {
                $aRow = $rs->fetch_array();
                $row = array(
                    "IdZona" => $aRow['idZona'],
                    "NombreZona" => $aRow['nombreZona'],
                    "Alias" => $aRow['alias']    
                );
                $this->link->desconectar();
                $this->result = $row;
                $this->respuesta = "all";
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La consulta no se pudo realizar.";
                $this->link->desconectar();
            }
        }
    }

    //Esta función permite la modificación del nombre del Servicio consultada.
    function actualizarZona() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_MODIFICAR_ZONA2('$this->idZona', '$this->nombreZona','$this->alias');";
            $rs = $conexion->query($sql);
            
            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "Zona Actualizada Con éxito";
                $resp = TRUE;
            
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "El registro no se pudo actualizar por una falla en la sentencia.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite deshabilitar el Servicio, esta se hace modificando el estado de 1 a 0.
    function deshabilitarZona() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_DESHABILITAR_ZONA2('$this->idZona');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro de la Zona fue eliminado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La Zona no se pudo eliminar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función permite habilitar el servicio, esta se hace modificando el estado de 0 a 1.
    function habilitarZona() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_HABILITAR_ZONA2('$this->idZona');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "La Zona fue habilitada con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La Salida no se pudo habilitar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

     function contarZonas2() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT count(*) AS contarzonas2 FROM `tbl_zonas2` WHERE isdelZona = 1";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Zonas Existentes: ".$numero['contarzonas2']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }

     function contarZonas2Eliminadas() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT count(*) AS contarzonas2 FROM `tbl_zonas2` WHERE isdelZona = 0";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Zonas Eliminadas: ".$numero['contarzonas2']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }

}
