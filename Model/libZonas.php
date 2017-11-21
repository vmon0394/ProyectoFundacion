<?php

class libZonas {

    private $idZona;
    private $nombreZona;
    private $idMunicipio;
    private $isdelZona;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->idZona = "";
        $this->nombreZona = "";
        $this->idMunicipio = "";
        $this->isdelZona = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdZona() {
        return $this->idZona;
    }

    function getNombreZona() {
        return $this->nombreZona;
    }

    function getIdMunicipio() {
        return $this->idMunicipio;
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

    function setIdMunicipio($idMunicipio) {
        $this->idMunicipio = $idMunicipio;
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

    //Esta función permite el registrar las zonas, esta función recibe todos los datos enviados desde el controlador,
    //inicialmente hace una validación con el nombre de la zona verificando que no haya un registro existente con este nombre, 
    //si la zona no esta registrada procede ha ejecutar el procedimiento almacenado para el registro.
    function registrarZona() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql1 = "SELECT * FROM `tbl_zonas` WHERE nombreZona = '$this->nombreZona' AND idMunicipio = '$this->idMunicipio'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $this->respuesta = "fail";
                $this->mensaje = "La Zona que intenta registrar ya existe.";
                $resp = FALSE;
            } else {

                $sql = "CALL SP_REGISTRAR_ZONA('$this->nombreZona', '$this->idMunicipio', '$this->isdelZona');";
                $rs = $conexion->query($sql);

                if ($rs > 0) {
                    $this->respuesta = "all";
                    $this->mensaje = "El registro se realizó con éxito.";
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

    //La función consultar recibe el parámetro enviado desde el controlador ejecutado así la sentencia, esta permite traer toda 
    //la información requerida desde la base de datos y retornarla al controlador en un vector.
    function consultarZona() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_CONSULTAR_ZONA('$this->idZona');";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "IdZona" => $aRow['idZona'],
                    "NombreZona" => $aRow['nombreZona'],
                    "IdDepartamento" => $aRow['idDepartamento'],
                    "IdMunicipio" => $aRow['idMunicipio']
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

    //Esta función permite el actualizar el regisstro de la zona, esta función recibe todos los datos enviados desde el controlador,
    //ejecutando la sentencia y actualizando la base de datos con las modificaciones realizadas al registro.
    function actualizarZona() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_MODIFICAR_ZONA('$this->idZona', '$this->nombreZona', '$this->idMunicipio');";
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

    //La función deshabilitar zona recibe desde el controlador el id del registro que se desea deshabilitar, este ejecuta 
    //la sentencia con el procedimiento almacenado modificando el estado de la zona de 1 a 0.
    function deshabilitarZona() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_DESHABILITAR_ZONA('$this->idZona');";
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

    //La función habilitar zona recibe desde el controlador el id del registro que se desea habilitar, este ejecuta 
    //la sentencia con el procedimiento almacenado modificando el estado de la zona de 0 a 1.
    function habilitarZona() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_HABILITAR_ZONA('$this->idZona');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro de la Zona fue habilitado con éxito.";
                $resp = TRUE;
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La Zona no se pudo habilitar por una falla en la solicitud.";
                $resp = TRUE;
            }
            $this->link->desconectar();
        }
    }

}
