<?php

class libArchivosHistoriaExternos {

    private $idArchivoExterno;
    private $fechaExterno;
    private $observacionExterno;
    private $idHistoriaExterno;
    private $fileName;
    private $tamano;
    private $tipo;
    private $extension;
    private $carpeta;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->idArchivoExterno = "";
        $this->fechaExterno = "";
        $this->observacionExterno = "";
        $this->idHistoriaExterno = "";

        $this->fileName = "";
        $this->tamano = "";
        $this->tipo = "";
        $this->extension = "";
        $this->carpeta = "";

        $this->respuesta = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getIdArchivoExterno() {
        return $this->idArchivoExterno;
    }

    function getFechaExterno() {
        return $this->fechaExterno;
    }

    function getObservacionExterno() {
        return $this->observacionExterno;
    }

    function getIdHistoriaExterno() {
        return $this->idHistoriaExterno;
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

    function getCarpeta() {
        return $this->carpeta;
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

    function setIdArchivoExterno($idArchivoExterno) {
        $this->idArchivoExterno = $idArchivoExterno;
    }

    function setFechaExterno($fechaExterno) {
        $this->fechaExterno = $fechaExterno;
    }

    function setObservacionExterno($observacionExterno) {
        $this->observacionExterno = $observacionExterno;
    }

    function setIdHistoriaExterno($idHistoriaExterno) {
        $this->idHistoriaExterno = $idHistoriaExterno;
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

    function setCarpeta($carpeta) {
        $this->carpeta = $carpeta;
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

    //Esta función permite la carga de archivos de las personas que tienen procesos registrados, esta almacena el archivo en una 
    //carpeta física y en la base de datos almacena una información básica ingresada por el usuario y la url en donde quedo guardado el 
    //archivo físicamente.
    function cargarArchivosExterno() {

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

            $output_dir = "../Archivos/$this->carpeta/$this->fileName";
            $url = "Archivos/$this->carpeta/$this->fileName";

            if ($this->tamano <= $maxUpload && (($this->extension[$num] == 'pdf') || ($this->extension[$num] == 'PDF')) || (($this->extension[$num] == 'jpg') || ($this->extension[$num] == 'JPG')) || (($this->extension[$num] == 'png') || ($this->extension[$num] == 'PNG'))) {

                if (!file_exists($output_dir)) {

                    if (!is_array($_FILES["file"]["name"])) {

                        if (copy($_FILES["file"]["tmp_name"], $output_dir)) {

                            //move_uploaded_file($_FILES["file"]["tmp_name"], $output_dir_copy . "Copia - " . $fileName);

                            $sql = "INSERT INTO `tbl_archivos_historia_externo`(`urlExterno`, `fechaExterno`, `observacionExterno`, `idHistoriaExterno`) "
                                    . "VALUES ('$url', '$this->fechaExterno', '$this->observacionExterno', '$this->idHistoriaExterno')";
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
                $this->mensaje = "Error al subir archivo $this->fileName,su tamaño es mayor a 2MB o la extensión no corresponde. Recuerde que solo se permiten estas extensiones pdf, jpg, y png.";
                $resp = FALSE;
            }
        }
    }

    //Esta función permite eliminar los archivos que se encuentran guardados, esta eliminación es de forma física, por lo tanto primero 
    //se consulta la url del archivo, luego se eliminar el archivo físico y por último se elimina de la base de datos el registro de 
    //dicho archivo.
    function eliminarArchivoExterno() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $ruta = "";

            $sql1 = "SELECT urlExterno FROM `tbl_archivos_historia_externo` WHERE idArchivoExterno = '$this->idArchivoExterno'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $aRow = $rs1->fetch_array();
                $ruta = "../" . $aRow['urlExterno'];

                if (file_exists($ruta)) {
                    unlink($ruta);
                }

                $sql = "DELETE FROM `tbl_archivos_historia_externo` WHERE idArchivoExterno = '$this->idArchivoExterno'";
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
