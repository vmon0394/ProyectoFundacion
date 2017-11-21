<?php

class libPrestamoDevolucion {

    private $idPrestamo;
    private $documento;
    private $codigo;
    private $fechaPrestamo;
    private $fechaDevolucion;
    private $fechaEntrega;
    private $estado;
    private $observacion;
    private $isdelPrestamo;
    
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->idPrestamo = "";
        $this->documento = "";
        $this->codigo = "";
        $this->fechaPrestamo = "";
        $this->fechaDevolucion = "";
        $this->fechaEntrega = "";
        $this->estado = "";
        $this->observacion = "";
        $this->isdelPrestamo = 1;
        

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdPrestamo() {
        return $this->idPrestamo;
    }

    function getDocumento() {
        return $this->documento;
    }
    
    function getCodigo() {
        return $this->codigo;
    }

    function getFechaPrestamo() {
        return $this->fechaPrestamo;
    }

    function getFechaDevolucion() {
        return $this->fechaDevolucion;
    }
    
    function getFechaEntrega() {
        return $this->fechaEntrega;
    }
    function getEstado() {
        return $this->estado;
    }
    function getObservacion() {
        return $this->observacion;
    }
    
    function getIsdelPrestamo() {
        return $this->isdelPrestamo;
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

    function setIdPrestamo($idPrestamo) {
        $this->idPrestamo = $idPrestamo;
    }

    function setDocumento($documento) {
        $this->documento = $documento;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setFechaPrestamo($fechaPrestamo) {
        $this->fechaPrestamo = $fechaPrestamo;
    }

    function setFechaDevolucion($fechaDevolucion) {
        $this->fechaDevolucion = $fechaDevolucion;
    }
    
    function setFechaEntrega($fechaEntrega) {
        $this->fechaEntrega = $fechaEntrega;
    }
    
    function setEstado($estado) {
        $this->estado = $estado;
    }
    
    function setObservacion($observacion) {
        $this->observacion = $observacion;
    }
    
    function setIsdelPrestamo($isdelPrestamo) {
        $this->isdelPrestamo = $isdelPrestamo;
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

    //Esta función permite el registro de las fichas socio familiares de los niños, antes del registrar se valida con el documento 
    //que el niños ya no este registrado, si no está registrado del niño, se realiza el registro con éxito. 
    function registrarPrestamoDevolucion() {

        $resp;
        $conexion = $this->link->conectar();
        $fechaCompletaSistema = date("Y-m-d");

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
                
        }else{
            
            $sql1 = "SELECT * FROM `tbl_usuario_laboratorio` WHERE documento = '$this->documento'";
            $rs1 = $conexion->query($sql1); 
            
            if($rs1 ->num_rows < 1) {
                
                $this->respuesta = "fail";
                $this->mensaje = "El Usuario no se encuentra registrado, por favor registrelo y vuelva a intentar.";
                $resp = FALSE;
                    
                }else{
                
                    if  ($fechaCompletaSistema > $this->fechaDevolucion){
                    
                    $this->respuesta = "fail";
                    $this->mensaje = "la fecha debe ser mayor o igual al dia actual.";
                    $resp = FALSE;
                    
                    }else{ 
                    
                        $sql3 = "SELECT * FROM `tbl_inventario` WHERE codigo = '$this->codigo'";
                        $rs3 = $conexion->query($sql3);
                     
                        if($rs3->num_rows < 1){
                         
                        $this->respuesta = "fail";
                        $this->mensaje = "El articulo no existe, por favor revise el codigo del material que intenta prestar y vuelva a intentar.";
                        $resp = FALSE;
            
                        }  else {

                            $sql2 = "SELECT * FROM `tbl_prestamo_devolucion` WHERE codigo = '$this->codigo' AND isdelPrestamo = '1'";
                            $rs2 = $conexion->query($sql2);

                            if ($rs2->num_rows > 0) {

                            $this->respuesta = "fail";
                            $this->mensaje = "El articulo que intenta prestar no se encuentra disponible, por favor revice el codigo de dicho articulo e intentelo nuevamente.";
                            $resp = FALSE;

                            } else {

                                $sql = "CALL SP_REGISTRAR_PRESTAMO_DEVOLUCION('$this->documento', '$this->codigo', '$this->fechaPrestamo', '$this->fechaDevolucion', '$this->fechaEntrega' );";
                                $rs = $conexion->query($sql);

                                if ($rs > 0) {

                                $this->respuesta = "all";    
                                $this->mensaje = "Articulo Prestado con éxito";
                                $resp = TRUE;

                                } else {

                                $this->respuesta = "fail";
                                $this->mensaje = "El registro no se pudo realizar por una falla en la sentencia.";
                                $resp = FALSE;
                            }
                            $this->link->desconectar();
                        }
                    }
                }
            }
        }
    } 
    
    function entregarMaterial() {

            $resp;
            $conexion = $this->link->conectar();

            if (!$conexion) {
                $this->respuesta = "fail";
                $this->mensaje = $this->link->getError();
                $resp = FALSE;

            } else {
                
                // propiedad para optener el codigo del material
                $sql3 = "SELECT * FROM tbl_prestamo_devolucion WHERE idPrestamo = '$this->idPrestamo'";
                $rs = $conexion->query($sql3);
                
                $aRow = $rs->fetch_array();
                $codigo = $aRow['codigo'];
                
                // propiedad para optener el id del material 
                $sql1 = "SELECT * FROM tbl_inventario WHERE codigo = '$codigo'";
                $rs1 = $conexion->query($sql1);
                
                $result = $rs1->fetch_array();
                $idMaterial = $result['idMaterial'];
                
                // propiedad para modificar el material 
                $sql4 = "UPDATE tbl_inventario SET estado='$this->estado' WHERE idMaterial='$idMaterial'";
                
                // propiedad que modifica el estado del material segun el prestamo
                $sql2 = "CALL SP_ESTADO_DEVOLUCION('$this->idPrestamo', '$this->estado', '$this->observacion' );";
                
                $sql = "CALL SP_ENTREGAR_MATERIAL('$this->idPrestamo', '$this->fechaEntrega');";
                $rs = $conexion->query($sql);

                if ($rs > 0) {

                    $this->respuesta = "all";
                    $this->mensaje = "El articulo fue devuelto exitosamente.";
                    $resp = FALSE;

                } else {
                    $this->respuesta = "fail";
                    $this->mensaje = "El Articulo no se pudo entregar por una falla en la sentencia.";
                    $resp = FALSE;
                }
            $this->link->desconectar();
        }
    }
    
    function consultarEstadoActualMaterial(){
        $resp;
        $conexion = $this->link->conectar();

            if (!$conexion) {
                $this->respuesta = "fail";
                $this->mensaje = $this->link->getError();
                $resp = FALSE;
                
            }  else {
                $sql = "SELECT * FROM tbl_prestamo_devolucion WHERE idPrestamo = '$this->idPrestamo'";
                $rs = $conexion->query($sql);
                
                $aRow = $rs->fetch_array();
                
                $codigo = $aRow['codigo'];
                $idPrestamo2 = $this->idPrestamo;
                
                $sql1 = "SELECT * FROM tbl_inventario WHERE codigo = '$codigo'";
                $rs1 = $conexion->query($sql1);
                
                if($rs1->num_rows > 0){
                    
                    $aRow2 = $rs1->fetch_array();
                    
                    $row = array(
                        "IdPrestamo2" => $idPrestamo2,
                        "idMateria" => $aRow2['idMaterial'],
                        "Nombre" => $aRow2['nombreMaterial'],
                        "EstadoActual" => $aRow2['estado'],                      
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


    function contarPrestamo() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT count(*) AS contarprestamo FROM `tbl_prestamo_devolucion` WHERE isdelPrestamo = 1";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Prestamos Existentes: ".$numero['contarprestamo']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }
}    
  