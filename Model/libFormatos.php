<?php

class libFormatos {

    private $id_formato;
    private $nombre_formato;
    private $isdel_formato;
    private $fileName;
    private $tamano;
    private $tipo;
    private $extension;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->id_formato = "";
        $this->nombre_formato = "";
        $this->isdel_formato = 1;

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

    function getId_formato() {
        return $this->id_formato;
    }

    function getNombre_formato() {
        return $this->nombre_formato;
    }

    function getIsdel_formato() {
        return $this->isdel_formato;
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

    function setId_formato($id_formato) {
        $this->id_formato = $id_formato;
    }

    function setNombre_formato($nombre_formato) {
        $this->nombre_formato = $nombre_formato;
    }

    function setIsdel_formato($isdel_formato) {
        $this->isdel_formato = $isdel_formato;
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
    function cargarFormato() {

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

            if ($this->tamano <= $maxUpload && (($this->extension[$num] == 'pdf') || ($this->extension[$num] == 'PDF')) 
                    || (($this->extension[$num] == 'xls') || ($this->extension[$num] == 'XLS')) || (($this->extension[$num] == 'xlsx') 
                    || ($this->extension[$num] == 'XLSX'))  || (($this->extension[$num] == 'docx') || ($this->extension[$num] == 'DOCX')) 
                    || (($this->extension[$num] == 'doc') || ($this->extension[$num] == 'DOC'))) {

                if (!file_exists($output_dir)) {

                    if (!is_array($_FILES["file"]["name"])) {

                        if (copy($_FILES["file"]["tmp_name"], $output_dir)) {

                            $sql = "INSERT INTO `tbl_formatos_fundacion`(`nombre_formato`, `url_formato`, `isdel_formato`)"
                                    . " VALUES ('$this->nombre_formato', '$url', '$this->isdel_formato')";
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
                $this->mensaje = "Error al subir archivo $this->fileName,su tamaño es mayor a 2MB o la extensión no corresponde. Recuerde que solo se permiten estas extensiones pdf, xls, xlsx, doc y docx.";
                $resp = FALSE;
            }
        }
    }

    //La función consultar recibe el parámetro enviado desde el controlador ejecutado así la sentencia, esta permite traer toda 
    //la información requerida desde la base de datos y retornarla al controlador en un vector.
    function consultarFormato() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT * FROM `tbl_formatos_fundacion` WHERE `id_formato` = '$this->id_formato'";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "Id_formato" => $aRow['id_formato'],
                    "Nombre_formato" => $aRow['nombre_formato']
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
    function modificarFormato() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $ruta = "";

            $sql1 = "SELECT url_formato FROM `tbl_formatos_fundacion` WHERE id_formato = '$this->id_formato'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $aRow = $rs1->fetch_array();
                $ruta = "../" . $aRow['url_formato'];

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

                if ($this->tamano <= $maxUpload && (($this->extension[$num] == 'pdf') || ($this->extension[$num] == 'PDF')) 
                    || (($this->extension[$num] == 'xls') || ($this->extension[$num] == 'XLS')) || (($this->extension[$num] == 'xlsx') 
                    || ($this->extension[$num] == 'XLSX'))  || (($this->extension[$num] == 'docx') || ($this->extension[$num] == 'DOCX')) 
                    || (($this->extension[$num] == 'doc') || ($this->extension[$num] == 'DOC'))) {

                    if (!file_exists($output_dir)) {

                        if (!is_array($_FILES["file"]["name"])) {

                            if (copy($_FILES["file"]["tmp_name"], $output_dir)) {

                                //Esta linea permite crear una copia al archivo.
                                //move_uploaded_file($_FILES["file"]["tmp_name"], $output_dir_copy . "Copia - " . $fileName);

                                $sql = "UPDATE `tbl_formatos_fundacion` SET `nombre_formato` = '$this->nombre_formato', `url_formato` = '$url' WHERE `id_formato`='$this->id_formato'";
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
                    $this->mensaje = "Error al subir archivo $this->fileName,su tamaño es mayor a 2MB o la extensión no corresponde. Recuerde que solo se permiten estas extensiones pdf, xls, xlsx, doc y docx.";
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
    function eliminarFormato() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $ruta = "";

            $sql1 = "SELECT url_formato FROM `tbl_formatos_fundacion` WHERE id_formato = '$this->id_formato'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $aRow = $rs1->fetch_array();
                $ruta = "../" . $aRow['url_formato'];

                if (file_exists($ruta)) {
                    unlink($ruta);
                }

                $sql = "DELETE FROM `tbl_formatos_fundacion` WHERE id_formato = '$this->id_formato'";
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


       function contarFormatos() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT count(*) AS contarformatos FROM `tbl_formatos_fundacion` WHERE isdel_formato = 1";
            $rs = $conexion->query($sql);
            if ($numero = $rs->fetch_assoc()){
                    $this->result = "<h4>Total Formatos: ".$numero['contarformatos']."</h4>";
                
            }else{
                $this->result="Se Presento un Error";
            }

            $this->link->desconectar();
        }
    }

}
