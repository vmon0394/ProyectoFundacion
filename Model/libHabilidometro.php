<?php

class libHabilidometro {

    private $fileName;
    private $tamano;
    private $tipo;
    private $extension;
    private $idHabilidometro;
    private $idSemillero;
    private $fecha_habilidometro;
    private $ano_habilidometro;
    private $respuesta;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->fileName = "";
        $this->tamano = "";
        $this->tipo = "";
        $this->extension = "";
        $this->idHabilidometro = "";
        $this->idSemillero = "";
        $this->fecha_habilidometro = "";
        $this->ano_habilidometro = "";

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

    function getIdHabilidometro() {
        return $this->idHabilidometro;
    }

    function getIdSemillero() {
        return $this->idSemillero;
    }

    function getFecha_habilidometro() {
        return $this->fecha_habilidometro;
    }

    function getAno_habilidometro() {
        return $this->ano_habilidometro;
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

    function setIdHabilidometro($idHabilidometro) {
        $this->idHabilidometro = $idHabilidometro;
    }

    function setIdSemillero($idSemillero) {
        $this->idSemillero = $idSemillero;
    }

    function setFecha_habilidometro($fecha_habilidometro) {
        $this->fecha_habilidometro = $fecha_habilidometro;
    }

    function setAno_habilidometro($ano_habilidometro) {
        $this->ano_habilidometro = $ano_habilidometro;
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

    function cargarHabilidometro() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            ini_set('memory_limit', '256M');
            ini_set('max_execution_time', -1);

            $maxUpload = 41000000;
            $prefijo = substr(md5(uniqid(rand())), 0, 6);
            $num = count($this->extension) - 1;
            $output_dir = "";
            $url = "";

            $output_dir = "../Archivos/Habilidometro/$this->fileName";
            $url = "Archivos/Habilidometro/$this->fileName";

            if ($this->tamano <= $maxUpload && (($this->extension[$num] == 'xls') || ($this->extension[$num] == 'xlsx'))) {

                $sql1 = "SELECT * FROM `tbl_habilidometro` WHERE idSemillero = '$this->idSemillero' AND ano_habilidometro = '$this->ano_habilidometro' ";
                $rs1 = $conexion->query($sql1);

                if ($rs1->num_rows > 0) {

                    $this->respuesta = "fail";
                    $this->mensaje = "<div style='color: red'>El semillero ya presenta un habilidómetro registrado en el $this->ano_habilidometro.</div>";
                    $resp = FALSE;
                } else {

                    if (!file_exists($output_dir)) {

                        if (!is_array($_FILES["file"]["name"])) {

                            if (copy($_FILES["file"]["tmp_name"], $output_dir) == TRUE) {

                                $sql = "INSERT INTO `tbl_habilidometro`(`idSemillero`, `fecha_habilidometro`, `url_habilidometro`, `ano_habilidometro`)"
                                        . " VALUES ('$this->idSemillero', '$this->fecha_habilidometro', '$url', '$this->ano_habilidometro')";
                                $rs = $conexion->query($sql);

                                if ($rs > 0) {
                                    $this->respuesta = "all";
                                    $this->mensaje = "El archivo fue cargado exitosamente.";
                                    $resp = TRUE;
                                } else {

                                    if (file_exists($output_dir)) {
                                        unlink($output_dir);
                                    }

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
                }//aca llega
            } else {
                $this->respuesta = "fail";
                $this->mensaje = "Error al subir archivo $this->fileName,su tamaño es mayor a 2MB o la extensión no corresponde. Recuerde que solo se permiten estas extensiones xls y xlsx.";
                $resp = FALSE;
            }
        }
    }

    function consultarHabilidometro() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = "SELECT * FROM `tbl_habilidometro` WHERE `id_habilidometro` = '$this->idHabilidometro'";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {

                $aRow = $rs->fetch_array();

                $row = array(
                    "IdHabilidometro" => $aRow['id_habilidometro'],
                    "IdSemillero" => $aRow['idSemillero'],
                    "Fecha_habilidometro" => $aRow['fecha_habilidometro']
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

    function modificarHabilidometro() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {
            
            $sql2 = "SELECT * FROM `tbl_habilidometro` WHERE idSemillero = '$this->idSemillero' AND id_habilidometro <> '$this->idHabilidometro' AND ano_habilidometro = '$this->ano_habilidometro' ";
            $rs2 = $conexion->query($sql2);

            if ($rs2->num_rows > 0) {

                $this->respuesta = "fail";
                $this->mensaje = "<div style='color: red'>El semillero ya presenta un habilidómetro registrado en el $this->ano_habilidometro.</div>";
                $resp = FALSE;
            } else {

                $ruta = "";

                $sql1 = "SELECT url_habilidometro FROM `tbl_habilidometro` WHERE id_habilidometro = '$this->idHabilidometro'";
                $rs1 = $conexion->query($sql1);

                if ($rs1->num_rows > 0) {

                    $aRow = $rs1->fetch_array();
                    $ruta = "../" . $aRow['url_habilidometro'];

                    if (file_exists($ruta)) {
                        unlink($ruta);
                    }

                    ini_set('memory_limit', '96M');
                    ini_set('post_max_size', '20M');
                    ini_set('upload_max_filesize', '20M');

                    $maxUpload = 4100000;
                    $num = count($this->extension) - 1;
                    $url = "";

                    $output_dir = "../Archivos/Habilidometro/$this->fileName";
                    $url = "Archivos/Habilidometro/$this->fileName";

                    if ($this->tamano <= $maxUpload && (($this->extension[$num] == 'xls') || ($this->extension[$num] == 'xlsx'))) {

                        if (!file_exists($output_dir)) {

                            if (!is_array($_FILES["file"]["name"])) {

                                if (copy($_FILES["file"]["tmp_name"], $output_dir) == TRUE) {

                                    $sql = "UPDATE `tbl_habilidometro` SET `idSemillero` = '$this->idSemillero', `fecha_habilidometro` = '$this->fecha_habilidometro', "
                                            . "`url_habilidometro` = '$url' WHERE `id_habilidometro` = '$this->idHabilidometro' ";
                                    $rs = $conexion->query($sql);

                                    if ($rs > 0) {
                                        $this->respuesta = "all";
                                        $this->mensaje = "El archivo fue cargado y modificado exitosamente.";
                                        $resp = TRUE;
                                    } else {
                                        $this->respuesta = "fail";
                                        $this->mensaje = "No se pudo registrar el archivo, favor intente de nuevo. Si el error continua favor ponerse en contacto con el área de soporte.";
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
                        $this->mensaje = "Error al subir archivo $this->fileName,su tamaño es mayor a 2MB o la extensión no corresponde. Recuerde que solo se permiten estas extensiones xls y xlsx.";
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
    }

    function eliminarHabilidometro() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $ruta = "";

            $sql1 = "SELECT url_habilidometro FROM `tbl_habilidometro` WHERE id_habilidometro = '$this->idHabilidometro'";
            $rs1 = $conexion->query($sql1);

            if ($rs1->num_rows > 0) {

                $aRow = $rs1->fetch_array();
                $ruta = "../" . $aRow['url_habilidometro'];

                if (file_exists($ruta)) {
                    unlink($ruta);
                }

                $sql = "DELETE FROM `tbl_habilidometro` WHERE id_habilidometro = '$this->idHabilidometro'";
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
