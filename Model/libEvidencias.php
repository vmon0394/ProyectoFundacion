<?php

class libEvidencias {

    private $id_evidencia;
    private $idTaller;
    private $anoRegistro;
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

        $this->id_evidencia = "";
        $this->idTaller = "";
        $this->anoRegistro = "";

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

    function getId_evidencia() {
        return $this->id_evidencia;
    }

    function getIdTaller() {
        return $this->idTaller;
    }

    function getAnoRegistro() {
        return $this->anoRegistro;
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

    function setId_evidencia($id_evidencia) {
        $this->id_evidencia = $id_evidencia;
    }

    function setIdTaller($idTaller) {
        $this->idTaller = $idTaller;
    }

    function setAnoRegistro($anoRegistro) {
        $this->anoRegistro = $anoRegistro;
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

    //Esta función permite la carga las evidencias del semillero registrado, esta almacena el archivo en una 
    //carpeta física y en la base de datos almacena una información básica ingresada por el usuario y la url en donde quedo guardado el 
    //archivo físicamente.
    function cargarEvidencia() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            //Tamaño del archivo que se desea guardar.
            ini_set('memory_limit', '96M');
            ini_set('post_max_size', '20M');
            ini_set('upload_max_filesize', '20M');

            $maxUpload = 4100000;
            $num = count($this->extension) - 1;
            $url = "";

            $output_dir = "../Archivos/$this->carpeta/$this->fileName";
            $url = "Archivos/$this->carpeta/$this->fileName";

            //Formatos permitidos para la inserción del archivo a guardar.
            if ($this->tamano <= $maxUpload && (($this->extension[$num] == 'pdf') || ($this->extension[$num] == 'PDF')) || (($this->extension[$num] == 'jpg') || ($this->extension[$num] == 'JPG')) || (($this->extension[$num] == 'png') || ($this->extension[$num] == 'PNG'))) {

                if (!file_exists($output_dir)) {

                    if (!is_array($_FILES["file"]["name"])) {

                        if (copy($_FILES["file"]["tmp_name"], $output_dir)) {

                            $sql2 = "SELECT idSemillero, fechaTaller, nombreTaller FROM `tbl_talleres` WHERE idTaller = '$this->idTaller' ";
                            $rs2 = $conexion->query($sql2);

                            $aRow = $rs2->fetch_array();
                            $idSemillero = $aRow['idSemillero'];
                            $fechaTaller = $aRow['fechaTaller'];
                            $nombreTaller = $aRow['nombreTaller'];

                            //move_uploaded_file($_FILES["file"]["tmp_name"], $output_dir_copy . "Copia - " . $fileName);

                            $sql = "INSERT INTO `tbl_evidencias_semilleros`(`idTaller`, `fechaTaller`, `nombreTaller`, `idSemillero`, `nombreEvidencia`, `url_evidencia`, `anoEvidencia`) "
                                    . "VALUES ('$this->idTaller', '$fechaTaller', '$nombreTaller', '$idSemillero', '$this->fileName', '$url', '$this->anoRegistro')";
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
                $ret = "fail";
                $mensaje = "";
                $this->respuesta = "fail";
                $this->mensaje = "Error al subir archivo $this->fileName,su tamaño es mayor a 2MB o la extensión no corresponde. Recuerde que solo se permiten estas extensiones pdf, jpg, y png.";
                $resp = FALSE;
            }
        }
    }

    //Esta función permite eliminar la evidencia que se encuentran guardada, esta eliminación es de forma física, por lo tanto primero 
    //se consulta la url de la evidencia, luego se eliminar el archivo físico y por último se elimina de la base de datos el registro de 
    //dicho archivo.
    function eliminarEvidencia() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $ruta = "";

            $sql1 = "SELECT url_evidencia FROM `tbl_evidencias_semilleros` WHERE id_evidencia = '$this->id_evidencia'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $aRow = $rs1->fetch_array();
                $ruta = "../" . $aRow['url_evidencia'];

                if (file_exists($ruta)) {
                    unlink($ruta);
                }

                $sql = "DELETE FROM `tbl_evidencias_semilleros` WHERE id_evidencia = '$this->id_evidencia'";
                $rs = $conexion->query($sql);

                if ($rs > 0) {
                    $this->respuesta = "all";
                    $this->mensaje = "La evidencia fue eliminado con éxito.";
                    $resp = TRUE;
                } else {
                    $this->respuesta = "fail";
                    $this->mensaje = "La evidencia no se pudo eliminar por una falla en la solicitud.";
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
