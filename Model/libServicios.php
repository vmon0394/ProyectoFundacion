<?php

class libServicios {
    
    private $fileName;
    private $tamano;
    private $tipo;
    private $extension;
    private $idServicio;
    private $nombreServicio;
    private $isdelServicio;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {
        
        $this->fileName = "";
        $this->tamano = "";
        $this->tipo = "";
        $this->extension = "";

        $this->idServicio = "";
        $this->nombreServicio = "";
        $this->isdelServio = 1;

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }
    
    function getFileName() {
        return $this->fileName;
    }

    function getTamano() {
        return $this->tamano;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getExtension() {
        return $this->extension;
    }

    function getIdServicio() {
        return $this->idServicio;
    }

    function getNombreServicio() {
        return $this->nombreServicio;
    }

    function getIsdelServicio() {
        return $this->isdelServicio;
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
    
    function setFileName($fileName) {
        $this->fileName = $fileName;
    }

    function setTamano($tamano) {
        $this->tamano = $tamano;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setExtension($extension) {
        $this->extension = $extension;
    }

    function setIdServicio($idServicio) {
        $this->idServicio = $idServicio;
    }

    function setNombreServicio($nombreServicio) {
        $this->nombreServicio = $nombreServicio;
    }

    function setIsdelServicio($isdelServicio) {
        $this->isdelServicio = $isdelServicio;
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
    
    function cargarServicio() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            ini_set('memory_limit', '96M');
            ini_set('post_max_size', '20M');
            ini_set('upload_max_filesize', '20M');

            $maxUpload = 4100000;
            $num = count($this->extension) - 1;
            $url = "";

            $output_dir = "../var/www/html/Archivos/Servicios/$this->fileName";
            $url = "var/www/html/Archivos/Servicios/$this->fileName";

            if ($this->tamano <= $maxUpload && (($this->extension[$num] == 'pdf') || ($this->extension[$num] == 'PDF')) || (($this->extension[$num] == 'jpg') || ($this->extension[$num] == 'JPG')) || (($this->extension[$num] == 'png') || ($this->extension[$num] == 'PNG'))) {

                if (!file_exists($output_dir)) {

                    if (!is_array($_FILES["file"]["name"])) {

                        if (copy($_FILES["file"]["tmp_name"], $output_dir)) {

                            $sql = "INSERT INTO `tbl_Servicios`(`nombreServicio`, `url`, `isdelServicio`) VALUES "
                                    . "('$this->nombreServicio', '$url', '1')";
                            $rs = $conexion->query($sql);

                            if ($rs > 0) {
                                $this->respuesta = "all";
                                $this->mensaje = "El archivo fue cargado exitosamente.";
                                $resp = TRUE;
                            } else {
                                $this->respuesta = "fail";
                                $this->mensaje = "No se pudo copiar el archivo, favor intente de nuevo. Si el error continua favor ponerse en contacto con el área de soporte.";
                                $resp = FALSE;
                            }
                            $this->link->desconectar();
                        } else {
                            $this->respuesta = "fail";
                            $this->mensaje = "No se pudo copiar el archivo, favor intente de nuevo. Si el error continua favor ponerse en contacto con el área de soporte.";
                            $resp = FALSE;
                        }
                    }
                } else {

                    $this->respuesta = "fail";
                    $this->mensaje = "El archivo $this->fileName que intenta subir ya existe por favor renombre el archivo o modifique el existente.";
                    $resp = FALSE;
                }
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "Error al subir archivo $this->fileName,su tamaño es mayor a 2MB o la extensión no corresponde. Recuerde que solo se permiten estas extensiones pdf.";
                $resp = FALSE;
            }
        }
    }

    //Esta función permite traer todos los datos del servicio seleccionada, estos datos se retornan en un vector.
    function consultarServicio() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_CONSULTAR_SERVICIO('$this->idServicio');";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "IdServicio" => $aRow['idServicio'],
                    "NombreServicio" => $aRow['nombreServicio']
                );
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
    function actualizarServicio() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql1 = "SELECT url FROM `tbl_servicios` WHERE idServicio = '$this->idServicio'";
            $rs1 = $conexion->query($sql);
            
            if ($rs1->num_rows > 0) {
                $aRow = $rs1->fetch_array();
                $ruta = "../" . $aRow['url'];
                
                if (file_exists($ruta)) {
                    unlink($ruta);
                }
                
                    ini_set('memory_limit', '96M');
                    ini_set('post_max_size', '20M');
                    ini_set('upload_max_filesize', '20M');

                    $maxUpload = 4100000;
                    $num = count($this->extension) - 1;
                    $url = "";

                    $output_dir = "../Archivos/Servicios/$this->fileName";
                    $url = "Archivos/Servicios/$this->fileName";
                
                        if ($this->tamano <= $maxUpload && (($this->extension[$num] == 'pdf') || ($this->extension[$num] == 'PDF')) || (($this->extension[$num] == 'jpg') || ($this->extension[$num] == 'JPG')) || (($this->extension[$num] == 'png') || ($this->extension[$num] == 'PNG'))) {

                            if (!file_exists($output_dir)) {

                                if (!is_array($_FILES["file"]["name"])) {

                                    if (copy($_FILES["file"]["tmp_name"], $output_dir)) {

                                        $sql = "UPDATE `tbl_Servicios` SET `nombreServicio`='$this->nombreServicio', `url`='$url', `isdelServicio`='$this->isdelServicio' WHERE `idServicio`='$this->idServicio'";
                                        $rs = $conexion->query($sql);
                                        
                                        if ($rs > 0) {
                                            
                                            $this->respuesta = "all";
                                            $this->mensaje = "El archivo fue modificado exitosamente.";
                                            $resp = TRUE;
                                        
                                        } else {
                                            $this->respuesta = "fail";
                                            $this->mensaje = "No se pudo copiar el archivo, favor intente de nuevo. Si el error continua favor ponerse en contacto con el área de soporte.";
                                            $resp = FALSE;
                                        }
                                        
                                    } else {
                                        $this->respuesta = "fail";
                                        $this->mensaje = "No se pudo copiar el archivo, favor intente de nuevo. Si el error continua favor ponerse en contacto con el área de soporte.";
                                        $resp = FALSE;
                                    }
                                }
                            } else {

                                $this->respuesta = "fail";
                                $this->mensaje = "El archivo $this->fileName que intenta subir ya existe por favor renombre el archivo o modifique el existente.";
                                $resp = FALSE;
                            }
                        } else {
                            $this->respuesta = "fail";
                            $this->mensaje = "Error al subir archivo $this->fileName, su tamaño es mayor a 2MB o la extensión no corresponde. Recuerde que solo se permiten estas extensiones pdf.";
                            $resp = FALSE;
                        }
                    } else {
                    $this->respuesta = "fail";
                    $this->mensaje = "La consulta no se pudo realizar.";
                    $resp = FALSE;
                }
            }
        }    
           
    //Esta función permite deshabilitar el Servicio, esta se hace modificando el estado de 1 a 0.
    function eliminarServicio() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $ruta = "";

            $sql1 = "SELECT url FROM `tbl_servicios` WHERE idServicio = '$this->idServicio'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $aRow = $rs1->fetch_array();
                $ruta = "../" . $aRow['url'];

                if (file_exists($ruta)) {
                    unlink($ruta);
                }

                $sql = "DELETE FROM `tbl_servicios` WHERE idServicio = '$this->idServicio'";
                $rs = $conexion->query($sql);

                if ($rs > 0) {
                    $this->respuesta = "all";
                    $this->mensaje = "El archivo fue eliminado con éxito.";
                    $resp = TRUE;
                } else {
                    $this->respuesta = "fail";
                    $this->mensaje = "El archivo no se pudo eliminar por una falla en la solicitud.";
                    $resp = TRUE;
                }
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La consulta no se pudo realizar.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }



    //Esta función permite habilitar el servicio, esta se hace modificando el estado de 0 a 1.
    function habilitarServicio() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "CALL SP_HABILITAR_SERVICIO('$this->idServicio');";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $this->respuesta = "all";
                $this->mensaje = "El Servicio fue habilitado con éxito.";
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
