<?php

class libMunicipios {

    private $idMunicipio;
    private $municipio;
    private $idDepartamento;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->idMunicipio = "";
        $this->municipio = "";
        $this->idDepartamento = "";

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdMunicipio() {
        return $this->idMunicipio;
    }

    function getMunicipio() {
        return $this->municipio;
    }

    function getIdDepartamento() {
        return $this->idDepartamento;
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

    function setIdMunicipio($idMunicipio) {
        $this->idMunicipio = $idMunicipio;
    }

    function setMunicipio($municipio) {
        $this->municipio = $municipio;
    }

    function setIdDepartamento($idDepartamento) {
        $this->idDepartamento = $idDepartamento;
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

    //Esta función permite el registro de nuevos municipios, antes del registro se valida que el municipio que intenta 
    //registrar no exista, si no existe el municipio es registrado con éxito.
    function registrarMunicipio() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql1 = "SELECT * FROM `tbl_municipios` WHERE municipio LIKE '%$this->municipio%' AND idDepartamento = '$this->idDepartamento' ";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $this->respuesta = "fail";
                $this->mensaje = "El Municipio que intenta registrar ya existe.";
                $resp = FALSE;
            } else {

                $sql = "CALL SP_REGISTRAR_MUNICIPIO('$this->municipio', '$this->idDepartamento');";
                $rs = $conexion->query($sql);

                if ($rs > 0) {
                    $this->respuesta = "all";
                    $this->mensaje = "El registro se realizó con éxito.";
                    $resp = TRUE;
                } else {

                    $this->respuesta = "fail";
                    $this->mensaje = "El registro no se pudo realizar por una falla en la solicitud.";
                    $resp = FALSE;
                }
                $this->link->desconectar();
            }
        }
    }

    //Eta función permite la consulta especifica de un municipio seleccionado, se ejecuta la sentencia y los datos del 
    //registro se almacenan en un vector y se retornan.
    function consultarMunicipio() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_CONSULTAR_MUNICIPIO('$this->idMunicipio');";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "IdMunicipio" => $aRow['idMunicipio'],
                    "Municipio" => $aRow['municipio'],
                    "IdDepartamento" => $aRow['idDepartamento']
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

    //Esta función permite la modificación del municipio seleccionado, generalmente solo se modificaría el nombre del municipio.
    function actualizarMunicipio() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_MODIFICAR_MUNICIPIO('$this->idMunicipio', '$this->municipio', '$this->idDepartamento');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El registro se actualizo con éxito.";
                $resp = TRUE;
            } else {

                $this->respuesta = "fail";
                $this->mensaje = "El registro no se pudo actualizar por una falla en la solicitud.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

    function contarMunicipios() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT count(*) AS contarmunicipio FROM `tbl_municipios`";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Municipios Registrados: ".$numero['contarmunicipio']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }

}
