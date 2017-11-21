<?php

class libPresupuestos {

    private $id_presupuesto;
    private $nombre_presupuesto;
    private $isdel_presupuesto;
    private $fileName;
    private $tamano;
    private $tipo;
    private $extension;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->id_presupuesto = "";
        $this->nombre_presupuesto = "";
        $this->isdel_presupuesto = 1;

        $this->fileName = "";
        $this->tamano = "";
        $this->tipo = "";
        $this->extension = "";

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getId_presupuesto() {
        return $this->id_presupuesto;
    }

    function getNombre_presupuesto() {
        return $this->nombre_presupuesto;
    }

    function getIsdel_presupuesto() {
        return $this->isdel_presupuesto;
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

    function setId_presupuesto($id_presupuesto) {
        $this->id_presupuesto = $id_presupuesto;
    }

    function setNombre_presupuesto($nombre_presupuesto) {
        $this->nombre_presupuesto = $nombre_presupuesto;
    }

    function setIsdel_presupuesto($isdel_presupuesto) {
        $this->isdel_presupuesto = $isdel_presupuesto;
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

    //Esta función recibe el archivo y toda su información del controlador ejecutando la sentencia 
    //para almacenar la información y la ubicación de los archivos en la base de datos, mientras 
    //que el archivo es almacenado físicamente en la carpeta indicada en la variable url.
    function cargarPresupuesto() {

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

            $output_dir = "../Archivos/$this->fileName";
            $url = "Archivos/$this->fileName";

            if ($this->tamano <= $maxUpload && (($this->extension[$num] == 'pdf') || ($this->extension[$num] == 'PDF'))) {

                if (!file_exists($output_dir)) {

                    if (!is_array($_FILES["file"]["name"])) {

                        if (copy($_FILES["file"]["tmp_name"], $output_dir)) {

                            $sql = "INSERT INTO `tbl_presupuestos`(`nombre_presupuesto`, `url_presupuesto`, `isdel_presupuesto`)"
                                    . " VALUES ('$this->nombre_presupuesto', '$url', '$this->isdel_presupuesto')";
                            $rs = $conexion->query($sql);

                            if ($rs > 0) {
                                $this->respuesta = "all";
                                $this->mensaje = "El archivo fue cargado exitosamente.";
                                $resp = TRUE;
                            } else {
                                $this->respuesta = "fail";
                                $this->mensaje = "No se pudo registrar el archivo, favor intente de nuevo. Si el error continua favor ponerse en contacto con el área de soporte.";
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
                $this->mensaje = "Error al subir archivo $this->fileName,su tamaño es mayor a 2MB o la extensión no corresponde. Recuerde que solo se permiten la extension pdf.";
                $resp = FALSE;
            }
        }
    }
    //La función consultar recibe el parámetro enviado desde el controlador ejecutado así la sentencia, esta permite traer toda 
    //la información requerida desde la base de datos y retornarla al controlador en un vector.
    function consultarPresupuesto() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT * FROM `tbl_presupuestos` WHERE `id_presupuesto` = '$this->id_presupuesto'";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "Id_presupuesto" => $aRow['id_presupuesto'],
                    "Nombre_presupuesto" => $aRow['nombre_presupuesto']
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

    //La función modificar, recibe toda la información envida desde el controlador y se ejecuta la sentencia la cual permite 
    //modificar el registro de la base de datos, antes de actualizar se trae la url del archivo para eliminar el archivo físico 
    //y luego lo reemplaza pro el nuevo que se ha subido y a la vez modificando el registro en la base de datos.
    function modificarPresupuesto() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $ruta = "";

            $sql1 = "SELECT * FROM `tbl_presupuestos` WHERE id_presupuesto = '$this->id_presupuesto'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $aRow = $rs1->fetch_array();
                $ruta = "../" . $aRow['url_presupuesto'];

                if (file_exists($ruta)) {
                    unlink($ruta);
                }

                ini_set('memory_limit', '96M');
                ini_set('post_max_size', '20M');
                ini_set('upload_max_filesize', '20M');

                $maxUpload = 4100000;
                $num = count($this->extension) - 1;
                $url = "";

                $output_dir = "../Archivos/$this->fileName";
                $url = "Archivos/$this->fileName";

                if ($this->tamano <= $maxUpload && (($this->extension[$num] == 'pdf') || ($this->extension[$num] == 'PDF'))) {

                    if (!file_exists($output_dir)) {

                        if (!is_array($_FILES["file"]["name"])) {

                            if (copy($_FILES["file"]["tmp_name"], $output_dir)) {

                                //Esta linea permite crear una copia al archivo.
                                //move_uploaded_file($_FILES["file"]["tmp_name"], $output_dir_copy . "Copia - " . $fileName);

                                $sql = "UPDATE `tbl_presupuestos` SET `nombre_presupuesto` = '$this->nombre_presupuesto', `url_presupuesto` = '$url' WHERE `id_presupuesto`='$this->id_presupuesto'";
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
                    $this->mensaje = "Error al subir archivo $this->fileName,su tamaño es mayor a 2MB o la extensión no corresponde. Recuerde que solo se permiten la extension pdf.";
                    $resp = FALSE;
                }
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "La consulta no se pudo realizar.";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

    //Esta función recibe como parámetro el id del registro que es enviado desde el controlador, 
    //con este se hace una consulta para traer la ubicación del archivo a eliminar, luego se 
    //ejecutas las sentencias para eliminar el archivo físico y el registro de la base de datos.
    function eliminarPresupuesto() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $ruta = "";

            $sql1 = "SELECT * FROM `tbl_presupuestos` WHERE id_presupuesto = '$this->id_presupuesto'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $aRow = $rs1->fetch_array();
                $ruta = "../" . $aRow['url_presupuesto'];

                if (file_exists($ruta)) {
                    unlink($ruta);
                }

                $sql = "DELETE FROM `tbl_presupuestos` WHERE id_presupuesto = '$this->id_presupuesto'";
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

}
