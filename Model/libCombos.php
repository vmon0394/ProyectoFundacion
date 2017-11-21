<?php

class libCombos {

    private $foreign;
    private $ano;
    private $mensaje;
    private $result;
    private $link;

    function __construct() {

        $this->foreign = "";
        $this->ano = "";
        $this->mensaje = "";
        $this->result = "";

        include_once 'conexion.php';
        $this->link = new Conexion();
    }

    function getForeign() {
        return $this->foreign;
    }

    function getAno() {
        return $this->ano;
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

    function setForeign($foreign) {
        $this->foreign = $foreign;
    }

    function setAno($ano) {
        $this->ano = $ano;
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

    //Combo que lista todas las comunas registrados.
    function comboComunas() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_COMUNAS();";
            $rs = $conexion->query($sql);

            $this->result = "<option value='0'>SELECCIONE UNA COMUNA</option>";
            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['id_comuna'] . "'>" . $datos['comuna'] . "</option>";
                }
            } else {
                $this->result .= "<option value='0'>NO HAY COMUNAS</option>";
            }
            $this->link->desconectar();
        }
    }
    
    function comboActividades() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_ACTIVIDADES();";
            $rs = $conexion->query($sql);

            $this->result = "<option value='0'>SELECCIONE UNA ACTIVIDAD</option>";
            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['idActividad'] . "'>" . $datos['nombreActividad'] . "</option>";
                }
            } else {
                $this->result .= "<option value='0'>NO HAY ACTIVIDADES</option>";
            }
            $this->link->desconectar();
        }
    }
    
    function comboServicios() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_SERVICIOS();";
            $rs = $conexion->query($sql);

            $this->result = "<option value='0'>SELECCIONE UN SERVICIO</option>";
            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['idServicio'] . "'>" . $datos['nombreServicio'] . "</option>";
                }
            } else {
                $this->result .= "<option value='0'>NO HAY SERVICIOS</option>";
            }
            $this->link->desconectar();
        }
    }
    function comboZonas2() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_ZONA2();";
            $rs = $conexion->query($sql);

            $this->result = "<option value='0'>SELECCIONE UNA ZONA</option>";
            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['idZona'] . "'>" . $datos['nombreZona'] . "</option>";
                }
            } else {
                $this->result .= "<option value='0'>NO HAY ZONAS</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista todos los departamentos registrados.
    function comboDepartamentos() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_DEPARTAMENTOS();";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['idDepartamento'] . "'>" . $datos['departamento'] . "</option>";
                }
            } else {
                $this->result = "<option value='0'>NO HAY DEPARTAMENTOS</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo dependiente que lista los municipios del departamento seleccionado.
    function comboMunicipios($idDepartamento) {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
        } else {

            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_MUNICIPIOS($idDepartamento);";
            $rs = $conexion->query($sql);

            $this->result = "<option value='0'>SELECCIONE UN MUNICIPIO</option>";
            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result .= "<option value='" . $datos['idMunicipio'] . "'>" . $datos['municipio'] . "</option>";
                }
                $resp = TRUE;
            } else {
                $this->result .= "<option value='0'>NO HAY MUNICIPIOS</option>";
                $resp = FALSE;
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista todas las zonas registradas y que no han sido eliminadas.
    function comboZonas() {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_ZONAS();";
            $rs = $conexion->query($sql);

            $this->result = "<option value='0'>SELECCIONE UNA ZONA</option>";
            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['idZona'] . "'>" . $datos['nombreZona'] . "</option>";
                }
            } else {
                $this->result .= "<option value='0'>NO HAY ZONAS</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista todas las categorias registradas y no han sido eliminadas.
    function comboCategorias() {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_CATEGORIAS();";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['idCategoria'] . "'>" . $datos['nombreCategoria'] . "</option>";
                }
            } else {
                $this->result = "<option value='0'>NO HAY CATEGORÍAS</option>";
            }
            $this->link->desconectar();
        }
    }
    
    //Combo que lista todas los valores registradas y no han sido eliminadas.
    function comboValores() {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_VALORES();";
            $rs = $conexion->query($sql);

            $this->result = "<option value='0'>SELECCIONE UN VALOR</option>";
            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['nombre_valor'] . "'>" . $datos['nombre_valor'] . "</option>";
                }
            } else {
                $this->result .= "<option value='0'>NO HAY VALORES</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista todos los facilitadores y psicologos registrados y que no han sido eliminados.
    function comboFacilitadores() {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_FACILITADORES();";
            $rs = $conexion->query($sql);

            $this->result = "<option value='0'>SELECCIONE UN FACILITADOR</option>";
            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['idEmpleado'] . "'>" . $datos['nombres'] . "</option>";
                }
            } else {
                $this->result .= "<option value='0'>NO HAY FACILITADORES</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista todos los psicologos registrados y que no han sido eliminados.
    function comboPsicologos() {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_PSICOLOGOS();";
            $rs = $conexion->query($sql);

            $this->result = "<option value='0'>SELECCIONE UN PSICÓLOGO</option>";
            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['idEmpleado'] . "'>" . $datos['nombres'] . "</option>";
                }
            } else {
                $this->result .= "<option value='0'>NO HAY PSICÓLOGOS</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista todos los proyectos registrados y que no han sido eliminados.
    function comboProyectos() {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_PROYECTOS();";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['idProyecto'] . "'>" . $datos['nombreProyecto'] . "</option>";
                }
            } else {
                $this->result = "<option value='0'>NO HAY PROYECTOS</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista todos las habilidades registrados y que no han sido eliminados.
    function comboHabilidades() {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_HABILIDADES();";
            $rs = $conexion->query($sql);

            $this->result = "<option value='100'>SELECCIONE UNA HABILIDAD</option>";
            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['idHabilidades'] . "'>" . $datos['nombreHabilidad'] . "</option>";
                }
            } else {
                $this->result .= "<option value='0'>NO HAY HABILIDADES</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista todos los aliados registrados y que no han sido eliminados.
    function comboAliados() {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_ALIADOS();";
            $rs = $conexion->query($sql);

            $this->result = "<option value='0'>SELECCIONE UN ALIADO</option>";
            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['idAliado'] . "'>" . $datos['nombreAliados'] . "</option>";
                }
            } else {
                $this->result .= "<option value='0'>NO HAY ALIADOS</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista todos los aliados que no se le han asignado al semillero.
    function comboAliados2() {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $idAliadosNoDisponibles = array();
            array_push($idAliadosNoDisponibles, $this->foreign);

            //Consulta de todos los aliados.
            $sql = "CALL SP_COMBO_ALIADOS2();";
            $rs = $conexion->query($sql);

            $listado = array();
            if ($rs->num_rows > 0) {

                while ($datos = $rs->fetch_assoc()) {
                    $listado[$datos['idAliado']] = $datos['nombreAliados'];
                }
            } else {
                $listado["0"] = "NO HAY ALIADOS";
            }

            //Ciclo en donde se comparan los datos de las dos consultas, y se descriminan los que ya han sido asignados y solo se lista los asigbados.
            foreach ($idAliadosNoDisponibles as $id) {
                unset($listado[$id]);
            }

            $this->result = "<option value=''>SELECCIONE UN ALIADO</option>";
            foreach ($listado as $posicion => $DatosAliados) {
                $this->result.= "<option value='$posicion'>$DatosAliados</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista todos los aliados que no se le han asignado al semillero.
    function comboAliados3($idAliando2) {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $idAliadosNoDisponibles = array();
            array_push($idAliadosNoDisponibles, $idAliando2);
            array_push($idAliadosNoDisponibles, $this->foreign);

            //Consulta de todos los aliados.
            $sql = "CALL SP_COMBO_ALIADOS2();";
            $rs = $conexion->query($sql);

            $listado = array();
            if ($rs->num_rows > 0) {

                while ($datos = $rs->fetch_assoc()) {
                    $listado[$datos['idAliado']] = $datos['nombreAliados'];
                }
            } else {
                $listado["0"] = "NO HAY ALIADOS";
            }

            //Ciclo en donde se comparan los datos de las dos consultas, y se descriminan los que ya han sido asignados y solo se lista los asigbados.
            foreach ($idAliadosNoDisponibles as $id) {
                unset($listado[$id]);
            }

            $this->result = "<option value=''>SELECCIONE UN ALIADO</option>";
            foreach ($listado as $posicion => $DatosAliados) {
                $this->result.= "<option value='$posicion'>$DatosAliados</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista todos los semilleros asignados a un facilitador en especifico.
    function comboSemilleros($idProfesor) {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_SEMILLEROS('$idProfesor');";
            $rs = $conexion->query($sql);

            $this->result = "<option value='0'>SELECCIONE UN SEMILLERO</option>";
            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['idSemillero'] . "'>" . $datos['nombreSemillero'] . "</option>";
                }
            } else {
                $this->result .= "<option value='0'>NO HAY SEMILLEROS</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista todos los semilleros de niños asignados a un facilitador en especifico.
    function comboSemillerosNinos($idProfesor) {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_SEMILLEROS_NINOS('$idProfesor');";
            $rs = $conexion->query($sql);

            $this->result = "<option value='0'>SELECCIONE UN SEMILLERO</option>";
            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['idSemillero'] . "'>" . $datos['nombreSemillero'] . "</option>";
                }
            } else {
                $this->result .= "<option value='0'>NO HAY SEMILLEROS</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista todos los semilleros de adultos asignados a un facilitador en especifico.
    function comboSemillerosAdultos($idProfesor) {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_SEMILLEROS_ADULTOS('$idProfesor');";
            $rs = $conexion->query($sql);

            $this->result = "<option value='0'>SELECCIONE UN SEMILLERO</option>";
            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['idSemillero'] . "'>" . $datos['nombreSemillero'] . "</option>";
                }
            } else {
                $this->result .= "<option value='0'>NO HAY SEMILLEROS</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista todos los semilleros de niños asignados a un facilitador en especifico.
    function comboSemillerosNinos2() {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_SEMILLEROS_NINOS2();";
            $rs = $conexion->query($sql);

            $this->result = "<option value='0'>SELECCIONE UN SEMILLERO</option>";
            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['idSemillero'] . "'>" . $datos['nombreSemillero'] . "</option>";
                }
            } else {
                $this->result .= "<option value='0'>NO HAY SEMILLEROS</option>";
            }
            $this->link->desconectar();
        }
    }
    function comboSemillerosNinos3() {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_SEMILLEROS_NINOS3();";
            $rs = $conexion->query($sql);

            $this->result = "<option value='0'>SELECCIONE UN SEMILLERO</option>";
            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['idSemillero'] . "'>" . $datos['nombreSemillero'] . "</option>";
                }
            } else {
                $this->result .= "<option value='0'>NO HAY SEMILLEROS</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista todos los semilleros de adultos asignados a un facilitador en especifico.
    function comboSemillerosAdultos2() {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_SEMILLEROS_ADULTOS2();";
            $rs = $conexion->query($sql);

            $this->result = "<option value='0'>SELECCIONE UN SEMILLERO</option>";
            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['idSemillero'] . "'>" . $datos['nombreSemillero'] . "</option>";
                }
            } else {
                $this->result .= "<option value='0'>NO HAY SEMILLEROS</option>";
            }
            $this->link->desconectar();
        }
    }
    
    //Combo que lista todos los semilleros de adultos asignados a un facilitador en especifico.
    function comboSemillerosImportarAdultos() {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_SEMILLEROS_IMPORTAR_ADULTOS();";
            $rs = $conexion->query($sql);

            $this->result = "<option value='0'>SELECCIONE UN SEMILLERO</option>";
            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['idSemillero'] . "'>" . $datos['nombreSemillero'] . "</option>";
                }
            } else {
                $this->result .= "<option value='0'>NO HAY SEMILLEROS</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista todas las técnicas registradas.
    function comboTecnicas($idHabilidad) {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_TECNICAS('$idHabilidad');";
            $rs = $conexion->query($sql);

            $this->result = "<option value='0'>SELECCIONE UNA TÉCNICA</option>";
            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['idTecnica'] . "'>" . $datos['nombreTecnica'] . "</option>";
                }
            } else {
                $this->result .= "<option value='0'>NO HAY TÉCNICAS</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista todos los semilleros registrados y que no han sido eliminados.
    function comboSemilleros2() {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_SEMILLEROS2;";
            $rs = $conexion->query($sql);

            $this->result = "<option value='0'>SELECCIONE UN SEMILLERO</option>";
            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['idSemillero'] . "'>" . $datos['nombreSemillero'] . "</option>";
                }
            } else {
                $this->result .= "<option value='0'>NO HAY SEMILLEROS</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista en el menu todos los semilleros asignados a un facilitador en especifico.
    function comboSemillerosMenu($idProfesor) {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_SEMILLEROS_MENU('$idProfesor');";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<li><a href='../ExportarReportes/exportarExcelEstadisticasSemillero.php?semillero=" . $datos['idSemillero'] . "'><i class='icon-download icon-white'></i> " . $datos['nombreSemillero'] . "</a></li>";
                }
            } else {
                $this->result = "<option value='0'>NO TIENE SEMILLEROS</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista en el menu todos los semilleros habilitados.
    function comboSemillerosMenuGeneral() {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_SEMILLEROS_MENU_GENERAL();";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<li><a href='../ExportarReportes/exportarExcelReporteTalleres.php?semillero=" . $datos['idSemillero'] . "'><i class='icon-download icon-white'></i> " . $datos['nombreSemillero'] . "</a></li>";
                }
            } else {
                $this->result = "<option value='0'>NO TIENE SEMILLEROS</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista en el menu todos los semilleros. Habilitados y deshabilitados.
    function comboSemillerosMenuSuperAdmin() {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_SEMILLEROS_MENU_SADMIN();";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<li><a href='../ExportarReportes/exportarExcelReporteTalleres.php?semillero=" . $datos['idSemillero'] . "'><i class='icon-download icon-white'></i> " . $datos['nombreSemillero'] . "</a></li>";
                }
            } else {
                $this->result = "<option value='0'>NO TIENE SEMILLEROS</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista en el menu todos los semilleros habilitados.
    function comboEstadisticasMenuGeneral() {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_SEMILLEROS_MENU_GENERAL();";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<li><a href='../ExportarReportes/exportarExcelEstadisticasSemillero.php?semillero=" . $datos['idSemillero'] . "'><i class='icon-download icon-white'></i> " . $datos['nombreSemillero'] . "</a></li>";
                }
            } else {
                $this->result = "<option value='0'>NO TIENE SEMILLEROS</option>";
            }
            $this->link->desconectar();
        }
    }

    function comboEstadisticasMenuSuperAdmin() {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_SEMILLEROS_MENU_SADMIN();";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<li><a href='../ExportarReportes/exportarExcelEstadisticasSemillero.php?semillero=" . $datos['idSemillero'] . "'><i class='icon-download icon-white'></i> " . $datos['nombreSemillero'] . "</a></li>";
                }
            } else {
                $this->result = "<option value='0'>NO TIENE SEMILLEROS</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista todas las compañias registradas y que no han sido eliminadas.
    function comboCompanias() {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_COMPANIAS();";
            $rs = $conexion->query($sql);

            $this->result = "<option value='0'>SELECCIONE UNA COMPAÑIA</option>";
            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['id_compania'] . "'>" . $datos['nombre_compania'] . "</option>";
                }
            } else {
                $this->result .= "<option value='0'>NO HAY COMPAÑIAS</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista todas las compañias registradas y que no han sido eliminadas.
    function comboCompaniasNombres() {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_COMPANIAS_NOMBRES();";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['nombre_compania'] . "'>" . $datos['nombre_compania'] . "</option>";
                }
            } else {
                $this->result = "<option value='0'>NO HAY COMPAÑIAS</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista todos los semilleros asignados a un facilitador en especifico.
    function comboTaller($idSemillero) {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_TALLER('$idSemillero');";
            $rs = $conexion->query($sql);

            $this->result = "<option value='0'>SELECCIONE UN TALLER</option>";
            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['idTaller'] . "'>" . $datos['nombreTaller'] . "</option>";
                }
            } else {
                $this->result .= "<option value='0'>NO HAY TALLER</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combi que lista todos los padrinos disponibles
    function comboPadrinosDisponibles() {

        $resp;
        $this->link = new Conexion();
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $idPadrinosNoDisponibles = array();
            $conexion->query("SET NAMES 'UTF8';");

            /* CONSULTA TABLA TBL_MOV_PADRINO_FICHA */
            $sql2 = "SELECT * FROM `tbl_mov_padrino_ficha` WHERE isdel_mov_padrino_ficha = '1' ";
            $rs2 = $conexion->query($sql2);

            if ($rs2->num_rows > 0) {
                while ($datos = $rs2->fetch_assoc()) {
                    array_push($idPadrinosNoDisponibles, $datos['idPadrino']);
                }
            } else {
                $listado["0"] = "NO HAY PADRINOS";
            }

            $sql = "CALL SP_COMBO_PADRINOS('$this->foreign'); ";
            $rs = $conexion->query($sql);

            $listado = array();
            if ($rs->num_rows > 0) {

                while ($datos = $rs->fetch_assoc()) {
                    $listado[$datos['id_Padrino']] = $datos['nombres'];
                }
            } else {
                $listado["0"] = "ERROR SENTENCIA";
            }

            foreach ($idPadrinosNoDisponibles as $id) {
                unset($listado[$id]);
            }

            $this->result = "<option value='0'>SELECCIONE UN PADRINO</option>";
            foreach ($listado as $posicion => $DatosPadrino) {
                $this->result .="<option value='$posicion'>$DatosPadrino</option>";
            }

            $this->link->desconectar();
        }
    }

    //Combo que lista todos los participantes que no tienen padrino
    function comboParticipanteDisponiblesPorPadrino() {

        $resp;
        $this->link = new Conexion();
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $idParticipanteNoDisponibles = array();
            $conexion->query("SET NAMES 'UTF8';");

            /* CONSULTA TABLA TBL_MOV_PADRINO_FICHA */
            $sql2 = "SELECT * FROM `tbl_mov_padrino_ficha` WHERE isdel_mov_padrino_ficha = '1' ";
            $rs2 = $conexion->query($sql2);

            if ($rs2->num_rows > 0) {
                while ($datos = $rs2->fetch_assoc()) {
                    array_push($idParticipanteNoDisponibles, $datos['idFicha']);
                }
            } else {
                $listado["0"] = "NO HAY PARTICIPANTES";
            }

            $sql = "CALL SP_COMBO_PARTICIPANTES_POR_PADRINOS('$this->foreign');";
            $rs = $conexion->query($sql);

            $listado = array();
            if ($rs->num_rows > 0) {

                while ($datos = $rs->fetch_assoc()) {
                    $listado[$datos['idFicha']] = $datos['nombres'];
                }
            } else {
                $listado["0"] = "ERROR SENTENCIA";
            }

            foreach ($idParticipanteNoDisponibles as $id) {
                unset($listado[$id]);
            }

            $this->result = "<option value='0'>SELECCIONE UN PARTICIPANTE</option>";
            foreach ($listado as $posicion => $DatosParticipante) {
                $this->result .="<option value='$posicion'>$DatosParticipante</option>";
            }

            $this->link->desconectar();
        }
    }

    //Combo que lista los padrinos asignados
    function comboPadrinosAsignados() {

        $resp;
        $this->link = new Conexion();
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_PADRINOS('$this->foreign'); ";
            $rs = $conexion->query($sql);

            $this->result = "<option value='0'>SELECCIONE UN PADRINO</option>";
            if ($rs->num_rows > 0) {

                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['id_Padrino'] . "'>" . $datos['nombres'] . "</option>";
                }
            } else {
                $this->result .= "<option value='0'>ERROR SSENTENCIA</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista los participantes que tiene padrinos
    function comboParticipanteConPadrino() {

        $resp;
        $this->link = new Conexion();
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_PARTICIPANTES_POR_PADRINOS('$this->foreign'); ";
            $rs = $conexion->query($sql);

            $this->result = "<option value='0'>SELECCIONE UN PARTICIPANTE</option>";
            if ($rs->num_rows > 0) {

                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<option value='" . $datos['idFicha'] . "'>" . $datos['nombres'] . "</option>";
                }
            } else {
                $this->result .= "<option value='0'>ERROR SSENTENCIA</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista los habilidometros de los semilleros por facilitador
    function comboHabilidometrosFacilitadores() {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_HABILIDOMETRO_POR_FACILITADOR('$this->foreign', '$this->ano');";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<li><a href='../" . $datos['url_habilidometro'] . "'><i class='icon-download icon-white'></i> " . $datos['nombreSemillero'] . "</a></li>";
                }
            } else {
                $this->result = "<option value='0'>NO TIENE HABILIDÓMETROS</option>";
            }
            $this->link->desconectar();
        }
    }

    //Combo que lista todos los formatos de la fundación
    function comboFormatos() {

        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->mensaje = $this->link->getError();
            $resp = false;
        } else {

            $res = "";
            $conexion->query("SET NAMES 'UTF8';");

            $sql = "CALL SP_COMBO_FORMATOS();";
            $rs = $conexion->query($sql);

            if ($rs->num_rows > 0) {
                while ($datos = $rs->fetch_assoc()) {
                    $this->result.= "<li><a href='../" . $datos['url_formato'] . "'><i class='icon-download icon-white'></i> " . $datos['nombre_formato'] . "</a></li>";
                }
            } else {
                $this->result = "<option value='0'>NO HAY FORMATOS</option>";
            }
            $this->link->desconectar();
        }
    }
}

//$x = new libCombos;
//$x->comboAliadosCon();
//echo $x->getResult();