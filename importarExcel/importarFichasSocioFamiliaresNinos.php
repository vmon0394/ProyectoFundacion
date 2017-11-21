<?php

ini_set('memory_limit', '256M');
ini_set('max_execution_time', -1);

//Propiedad que se utiiliza para capturar el tiempo del sistema.
date_default_timezone_set('America/Bogota');
$fechaSistema = date("Y-m-d");
$anoSistema = date("Y");
$time = date("H:i");

include_once ("../Model/conexion.php");
$objCon = new Conexion();
$conexion = $objCon->conectar();
$_DATOS_EXCEL = array();

if (isset($_FILES["file"])) {

    $fileName = $_FILES["file"]["name"];
    $tamano = intval($_FILES["file"]['size']);
    $tipo = $_FILES["file"]['type'];
    $extension = explode('.', $_FILES['file']['name']);
    $num = count($extension) - 1;

    $idSemillero = isset($_POST['semillero']) ? $_POST['semillero'] : "";

    $repuesta = "";
    $mensaje = "Se cargaron 0 registros con éxito.";
    $mensaje2 = "0 registro ya existente.";
    $mensajeCuerpo = "";

    $error = $_FILES["file"]["error"];
    $output_dir = "Archivos/$fileName";

    if (copy($_FILES["file"]["tmp_name"], $output_dir)) {
        $mensaje = "Se cargo el archivo. <br>";
    } else {
        $mensaje = "No se pudo copiar el archivo, favor intente de nuevo. Si el error continua favor ponerse en contacto con el área de soporte .<br>";
    }

    if (file_exists($output_dir)) {

        require_once '../Model/PHPExcel.php';
        require_once '../Model/PHPExcel/Reader/Excel2007.php';

        try {
            $inputFileType = PHPExcel_IOFactory::identify($output_dir);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($output_dir);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                    . '": ' . $e->getMessage());
        }

        $objFecha = new PHPExcel_Shared_Date();

        $objPHPExcel->setActiveSheetIndex(0);
        $i = 3;

        if ($objPHPExcel->getActiveSheet()->getCell('A' . 1)->getValue() == "ITEM" 
                && $objPHPExcel->getActiveSheet()->getCell('B' . 1)->getValue() == "NOMBRES" 
                && $objPHPExcel->getActiveSheet()->getCell('C' . 1)->getValue() == "APELLIDOS" 
                && $objPHPExcel->getActiveSheet()->getCell('D' . 1)->getValue() == "GENERO" 
                && $objPHPExcel->getActiveSheet()->getCell('E' . 1)->getValue() == "DEP. DE NACIMIENTO" 
                && $objPHPExcel->getActiveSheet()->getCell('F' . 1)->getValue() == "LUGAR DE NACIMIENTO" 
                && $objPHPExcel->getActiveSheet()->getCell('G' . 1)->getValue() == "FECHA NACIMIENTO" 
                && $objPHPExcel->getActiveSheet()->getCell('H' . 1)->getValue() == "EDAD" 
                && $objPHPExcel->getActiveSheet()->getCell('I' . 1)->getValue() == "TIPO DOCUMENTO" 
                && $objPHPExcel->getActiveSheet()->getCell('J' . 1)->getValue() == "Nº DOCUMENTO" 
                && $objPHPExcel->getActiveSheet()->getCell('K' . 1)->getValue() == "RH" 
                && $objPHPExcel->getActiveSheet()->getCell('L' . 1)->getValue() == "SEGURIDAD SOCIAL" 
                && $objPHPExcel->getActiveSheet()->getCell('M' . 1)->getValue() == "ENTIDAD PRESTADORA" 
                && $objPHPExcel->getActiveSheet()->getCell('N' . 1)->getValue() == "TELÉFONO FIJO" 
                && $objPHPExcel->getActiveSheet()->getCell('O' . 1)->getValue() == "NÚMERO CELULAR" 
                && $objPHPExcel->getActiveSheet()->getCell('P' . 1)->getValue() == "OCUPACIÓN" 
                && $objPHPExcel->getActiveSheet()->getCell('Q' . 1)->getValue() == "DIRECCIÓN" 
                && $objPHPExcel->getActiveSheet()->getCell('R' . 1)->getValue() == "BARRIO O VEREDA" 
                && $objPHPExcel->getActiveSheet()->getCell('S' . 1)->getValue() == "NOMBRE BARRIO/VEREDA" 
                && $objPHPExcel->getActiveSheet()->getCell('T' . 1)->getValue() == "E-MAIL" 
                && $objPHPExcel->getActiveSheet()->getCell('U' . 1)->getValue() == "DEP. DE RESIDENCIA" 
                && $objPHPExcel->getActiveSheet()->getCell('V' . 1)->getValue() == "MUNICIPIO RESIDENCIA" 
                && $objPHPExcel->getActiveSheet()->getCell('W' . 1)->getValue() == "INSTITUCIÓN EDUCATIVA" 
                && $objPHPExcel->getActiveSheet()->getCell('X' . 1)->getValue() == "GRADO ESCOLAR" 
                && $objPHPExcel->getActiveSheet()->getCell('Y' . 1)->getValue() == "REPITENCIA" 
                && $objPHPExcel->getActiveSheet()->getCell('Z' . 1)->getValue() == "CUANTOS" 
                && $objPHPExcel->getActiveSheet()->getCell('AA' . 1)->getValue() == "CUALES" 
                && $objPHPExcel->getActiveSheet()->getCell('AB' . 1)->getValue() == "FECHA DE INGRESO" 
                && $objPHPExcel->getActiveSheet()->getCell('AC' . 1)->getValue() == "Nº DE AÑOS EN EL SEMILLERO" 
                && $objPHPExcel->getActiveSheet()->getCell('AD' . 1)->getValue() == "ESTADO" 
                && $objPHPExcel->getActiveSheet()->getCell('AE' . 1)->getValue() == "NOMBRE DE LOS PADRES" 
                && $objPHPExcel->getActiveSheet()->getCell('AF' . 1)->getValue() == "TELÉFONO" 
                && $objPHPExcel->getActiveSheet()->getCell('AG' . 1)->getValue() == "CELULAR" 
                && $objPHPExcel->getActiveSheet()->getCell('AH' . 1)->getValue() == "CUIDADOR" 
                && $objPHPExcel->getActiveSheet()->getCell('AI' . 1)->getValue() == "PARENTESCO" 
                && $objPHPExcel->getActiveSheet()->getCell('AJ' . 1)->getValue() == "TELÉFONO" 
                && $objPHPExcel->getActiveSheet()->getCell('AK' . 1)->getValue() == "CELULAR" 
                && $objPHPExcel->getActiveSheet()->getCell('AL' . 1)->getValue() == "TIPOLOGÍA FAMILIAR" 
                && $objPHPExcel->getActiveSheet()->getCell('AM' . 1)->getValue() == "N° DE MIEMBROS DE LA FAMILIA" 
                && $objPHPExcel->getActiveSheet()->getCell('AN' . 1)->getValue() == "Nº PERSONAS EMPLEO FORMAL" 
                && $objPHPExcel->getActiveSheet()->getCell('AO' . 1)->getValue() == "Nº PERSONAS EMPLEO INFORMAL" 
                && $objPHPExcel->getActiveSheet()->getCell('AP' . 1)->getValue() == "SITUACIÓN DE DESPLAZAMIENTO" 
                && $objPHPExcel->getActiveSheet()->getCell('AQ' . 1)->getValue() == "REGISTRO DE DESPLAZAMIENTO" 
                && $objPHPExcel->getActiveSheet()->getCell('AR' . 1)->getValue() == "VÍCTIMA" 
                && $objPHPExcel->getActiveSheet()->getCell('AS' . 1)->getValue() == "REGISTRO VÍCTIMA" 
                && $objPHPExcel->getActiveSheet()->getCell('AT' . 1)->getValue() == "PERTENENCIA ETNICA" 
                && $objPHPExcel->getActiveSheet()->getCell('AU' . 1)->getValue() == "DISCAPACIDAD PARTICIPANTE" 
                && $objPHPExcel->getActiveSheet()->getCell('AV' . 1)->getValue() == "TIPO DISCAPACIDAD" 
                && $objPHPExcel->getActiveSheet()->getCell('AW' . 1)->getValue() == "FAMILIARES EN LA EMPRESA" 
                && $objPHPExcel->getActiveSheet()->getCell('AX' . 1)->getValue() == "COMPAÑIA" 
                && $objPHPExcel->getActiveSheet()->getCell('AY' . 1)->getValue() == "TIPO VINCULACIÓN" 
                && $objPHPExcel->getActiveSheet()->getCell('AZ' . 1)->getValue() == "NOMBRE Y PARENTESCO" 
                && $objPHPExcel->getActiveSheet()->getCell('BA' . 1)->getValue() == "PARTICIPA EN OTRO SEMILLERO"
                && $objPHPExcel->getActiveSheet()->getCell('BB' . 1)->getValue() == "CUAL SEMILLERO"
                && $objPHPExcel->getActiveSheet()->getCell('BC' . 1)->getValue() == "PARTICIPA EN ALGÚN SERVICIO"
                && $objPHPExcel->getActiveSheet()->getCell('BD' . 1)->getValue() == "QUE SERVICIOS") {

            while ($objPHPExcel->getActiveSheet()->getCell("J" . $i)->getValue() != '') {

                $_DATOS_EXCEL[$i - 3]['NOMBRES'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('B' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['APELLIDOS'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('C' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['GENERO'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('D' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['DEP. DE NACIMIENTO'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('E' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['LUGAR DE NACIMIENTO'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('F' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['FECHA NACIMIENTO'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('G' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['EDAD'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('H' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['TIPO DOCUMENTO'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('I' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['Nº DOCUMENTO'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('J' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['RH'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('K' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['SEGURIDAD SOCIAL'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('L' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['ENTIDAD PRESTADORA'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('M' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['TELÉFONO FIJO'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('N' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['NÚMERO CELULAR'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('O' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['OCUPACIÓN'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('P' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['DIRECCIÓN'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('Q' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['BARRIO O VEREDA'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('R' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['NOMBRE BARRIO/VEREDA'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('S' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['E-MAIL'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('T' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['DEP. DE RESIDENCIA'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('U' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['MUNICIPIO RESIDENCIA'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('V' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['INSTITUCIÓN EDUCATIVA'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('W' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['GRADO ESCOLAR'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('X' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['REPITENCIA'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('Y' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['CUANTOS'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('Z' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['CUALES'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AA' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['FECHA DE INGRESO'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AB' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['Nº DE AÑOS EN EL SEMILLERO'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AC' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['ESTADO'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AD' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['NOMBRE DE LOS PADRES'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AE' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['TELÉFONO PADRES'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AF' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['CELULAR PADRES'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AG' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['CUIDADOR'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AH' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['PARENTESCO CUIDADOR'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AI' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['TELÉFONO CUIDADOR'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AJ' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['CELULAR CUIDADOR'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AK' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['TIPOLOGÍA FAMILIAR'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AL' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['N° DE MIEMBROS DE LA FAMILIA'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AM' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['Nº PERSONAS EMPLEO FORMAL'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AN' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['Nº PERSONAS EMPLEO INFORMAL'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AO' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['SITUACIÓN DE DESPLAZAMIENTO'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AP' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['REGISTRO DE DESPLAZAMIENTO'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AQ' . $i)->getValue()));  
                $_DATOS_EXCEL[$i - 3]['VÍCTIMA'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AR' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['REGISTRO VÍCTIMA'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AS' . $i)->getValue()));                
                $_DATOS_EXCEL[$i - 3]['PERTENENCIA ETNICA'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AT' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['DISCAPACIDAD PARTICIPANTE'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AU' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['TIPO DISCAPACIDAD'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AV' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['FAMILIARES EN LA EMPRESA'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AW' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['COMPAÑÍA'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AX' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['TIPO VINCULACIÓN'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AY' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['NOMBRE Y PARENTESCO'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('AZ' . $i)->getValue()));                
                $_DATOS_EXCEL[$i - 3]['PARTICIPA EN OTRO SEMILLERO'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('BA' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['CUAL SEMILLERO'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('BB' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['PARTICIPA EN ALGÚN SERVICIO'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('BC' . $i)->getValue()));
                $_DATOS_EXCEL[$i - 3]['QUE SERVICIOS'] = trim(strtoupper($objPHPExcel->getActiveSheet()->getCell('BD' . $i)->getValue()));

                $i++;
            }
        } else {
            $repuesta = "fail";
            $mensaje .= "El formato de excel no coincide, por favor verifique que el formato sea el requerido.";
        }
    }

    $cRs = "";
    $cRs1 = "";

    $x = 0;
    //Contador de insertados
    $cI = 0;
    //Contador de fallas
    $cF = 0;
    $datosFallidos = "";
    //Contador de registros repetidos
    $cR = "";

    $longitud = sizeof($_DATOS_EXCEL);
    $repuesta = "fail";

    while ($x < $longitud) {

        $sql1 = "SELECT * FROM `tbl_ficha_sociofamiliar` WHERE `documento` = '" . $_DATOS_EXCEL[$x]['Nº DOCUMENTO'] . "'";
        $rs1 = $conexion->query($sql1);

        if ($rs1->num_rows > 0) {
            $cRs1 = $rs1->num_rows;
            $mensaje2 = "$cR registros ya existente.";
            $cR++;
//            $repuesta = "all";
            $mensajeCuerpo .= "- " . $_DATOS_EXCEL[$x]['Nº DOCUMENTO'] . " " . $_DATOS_EXCEL[$x]['NOMBRES'] . " " . $_DATOS_EXCEL[$x]['APELLIDOS'] . "<br>";
        } else {

            $fechaN = PHPExcel_Shared_Date::ExcelToPHP($_DATOS_EXCEL[$x]['FECHA NACIMIENTO']);
            $fechaN = strtotime("+1 day", $fechaN);
            $fechaNacimiento = date("Y-m-d", $fechaN);

            $fechaI = PHPExcel_Shared_Date::ExcelToPHP($_DATOS_EXCEL[$x]['FECHA DE INGRESO']);
            $fechaI = strtotime("+1 day", $fechaI);
            $fechaIngreso = date("Y-m-d", $fechaI);

            $fechaDeshabilitado = NULL;
            if ($_DATOS_EXCEL[$x]['ESTADO'] == "0") {
                $fechaDeshabilitado = $fechaSistema . ";";
            }

            $sql = "INSERT INTO `tbl_ficha_sociofamiliar`(`nombres`, `apellidos`, `sexo`, `idCiudadNacimiento`, `fechaNacimiento`, `edad`, "
                    . "`tipoDocumento`, `documento`, `RH`, `tipoDeSeguridad`, `eps_sisben`, `telefono`, `celular`, `ocupacion`, `direccion`, `barrioOvereda`, `barrio_vereda`, "
                    . "`email`, `idCiudadResidencia`, `institucion`, `grado`, `repitencia`, `cuantos`, `cuales`, `anoDeIngreso`, `anosDePermanencia`, `isdel`, "
                    . "`nombreMadre_Padre`, `telefonoMadre_Padre`, `celularMadre_padre`, `nombreCuidador`, `parentezcoCuidador`, `telefonoCuidador`, "
                    . "`celularCuidador`, `tipologiaFamiliar`, `miembrosFamilia`, `personasEmpleoFormal`, `personasEmpleoInformal`, "
                    . "`desplazado`, `registro`, `victima`, `registro_victima`, `etnia`, `discapacidad`, `observacionDiscapacidad`, `familiaresEmpresa`, `compania`, `tipoVinculacion`, `nombreParentezco`, "
                    . "`idSemillero`, `participa_otro_semillero`, `otros_semilleros`, `participa_servicios`, `que_servicios`, `fechaDeshabilitado`, `anoRegistro`)"
                    . " VALUES ('" . $_DATOS_EXCEL[$x]['NOMBRES'] . "','" . $_DATOS_EXCEL[$x]['APELLIDOS'] . "','" . $_DATOS_EXCEL[$x]['GENERO'] . "',"
                    . "(SELECT m.idMunicipio FROM tbl_municipios m INNER JOIN tbl_departamentos d ON d.idDepartamento = m.idDepartamento "
                    . "WHERE d.departamento LIKE '%" . $_DATOS_EXCEL[$x]['DEP. DE NACIMIENTO'] . "%' AND m.municipio LIKE '%" . $_DATOS_EXCEL[$x]['LUGAR DE NACIMIENTO'] . "%'),"
                    . "'" . $fechaNacimiento . "','" . $_DATOS_EXCEL[$x]['EDAD'] . "','" . $_DATOS_EXCEL[$x]['TIPO DOCUMENTO'] . "',"
                    . "'" . $_DATOS_EXCEL[$x]['Nº DOCUMENTO'] . "','" . $_DATOS_EXCEL[$x]['RH'] . "','" . $_DATOS_EXCEL[$x]['SEGURIDAD SOCIAL'] . "',"
                    . "'" . $_DATOS_EXCEL[$x]['ENTIDAD PRESTADORA'] . "','" . $_DATOS_EXCEL[$x]['TELÉFONO FIJO'] . "','" . $_DATOS_EXCEL[$x]['NÚMERO CELULAR'] . "',"
                    . "'" . $_DATOS_EXCEL[$x]['OCUPACIÓN'] . "','" . $_DATOS_EXCEL[$x]['DIRECCIÓN'] . "','" . $_DATOS_EXCEL[$x]['BARRIO O VEREDA'] . "',"
                    . "'" . $_DATOS_EXCEL[$x]['NOMBRE BARRIO/VEREDA'] . "','" . $_DATOS_EXCEL[$x]['E-MAIL'] . "',"
                    . "(SELECT m.idMunicipio FROM tbl_municipios m INNER JOIN tbl_departamentos d ON d.idDepartamento = m.idDepartamento "
                    . "WHERE d.departamento LIKE '%" . $_DATOS_EXCEL[$x]['DEP. DE RESIDENCIA'] . "%' AND m.municipio LIKE '%" . $_DATOS_EXCEL[$x]['MUNICIPIO RESIDENCIA'] . "%'),"
                    . "'" . $_DATOS_EXCEL[$x]['INSTITUCIÓN EDUCATIVA'] . "','" . $_DATOS_EXCEL[$x]['GRADO ESCOLAR'] . "','" . $_DATOS_EXCEL[$x]['REPITENCIA'] . "',"
                    . "'" . $_DATOS_EXCEL[$x]['CUANTOS'] . "','" . $_DATOS_EXCEL[$x]['CUALES'] . "','" . $fechaIngreso . "',"
                    . "'" . $_DATOS_EXCEL[$x]['Nº DE AÑOS EN EL SEMILLERO'] . "','" . $_DATOS_EXCEL[$x]['ESTADO'] . "','" . $_DATOS_EXCEL[$x]['NOMBRE DE LOS PADRES'] . "',"
                    . "'" . $_DATOS_EXCEL[$x]['TELÉFONO PADRES'] . "','" . $_DATOS_EXCEL[$x]['CELULAR PADRES'] . "','" . $_DATOS_EXCEL[$x]['CUIDADOR'] . "','" . $_DATOS_EXCEL[$x]['PARENTESCO CUIDADOR'] . "',"
                    . "'" . $_DATOS_EXCEL[$x]['TELÉFONO CUIDADOR'] . "','" . $_DATOS_EXCEL[$x]['CELULAR CUIDADOR'] . "','" . $_DATOS_EXCEL[$x]['TIPOLOGÍA FAMILIAR'] . "',"
                    . "'" . $_DATOS_EXCEL[$x]['N° DE MIEMBROS DE LA FAMILIA'] . "','" . $_DATOS_EXCEL[$x]['Nº PERSONAS EMPLEO FORMAL'] . "','" . $_DATOS_EXCEL[$x]['Nº PERSONAS EMPLEO INFORMAL'] . "',"
                    . "'" . $_DATOS_EXCEL[$x]['SITUACIÓN DE DESPLAZAMIENTO'] . "','" . $_DATOS_EXCEL[$x]['REGISTRO DE DESPLAZAMIENTO'] . "','" . $_DATOS_EXCEL[$x]['VÍCTIMA'] . "','" . $_DATOS_EXCEL[$x]['REGISTRO VÍCTIMA'] . "',"
                    . "'" . $_DATOS_EXCEL[$x]['PERTENENCIA ETNICA'] . "','" . $_DATOS_EXCEL[$x]['DISCAPACIDAD PARTICIPANTE'] . "','" . $_DATOS_EXCEL[$x]['TIPO DISCAPACIDAD'] . "',"
                    . "'" . $_DATOS_EXCEL[$x]['FAMILIARES EN LA EMPRESA'] . "','" . $_DATOS_EXCEL[$x]['COMPAÑÍA'] . "','" . $_DATOS_EXCEL[$x]['TIPO VINCULACIÓN'] . "',"
                    . "'" . $_DATOS_EXCEL[$x]['NOMBRE Y PARENTESCO'] . "','" . $idSemillero . "','" . $_DATOS_EXCEL[$x]['PARTICIPA EN OTRO SEMILLERO'] . "',"
                    . "'" . $_DATOS_EXCEL[$x]['CUAL SEMILLERO'] . "','" . $_DATOS_EXCEL[$x]['PARTICIPA EN ALGÚN SERVICIO'] . "','" . $_DATOS_EXCEL[$x]['QUE SERVICIOS'] . "',"
                    . "'" . $fechaDeshabilitado . "','" . $anoSistema . "')";
            $rs = $conexion->query($sql);

            if ($rs > 0) {
                $cRs = $rs;
                $cI++;
//                $repuesta = "all";
//                $mensaje = "Se cargaron $cI registros con éxito.";
            } else {
                $cF++;
                $datosFallidos .= "<br> - " . $_DATOS_EXCEL[$x]['Nº DOCUMENTO'] . " " . $_DATOS_EXCEL[$x]['NOMBRES'] . " " . $_DATOS_EXCEL[$x]['APELLIDOS'];
//                $repuesta = "fail";
//                $mensaje = "Error al insertar $cF registro.\n";
            }
        }
        $x++;
    }

    $mensaje .= "<br> Se cargaron $cI registros con éxito. <br>";
    $mensaje .= "<br> $cF registros con error al insertar. <br> $datosFallidos";

    if ($cRs1 > 0 && $cRs > 0) {
        $repuesta = "all";
    } else if ($cRs1 == 0 && $cRs > 0) {
        $repuesta = "all";
    } else if ($cRs1 > 0 && $cRs == 0) {
        $repuesta = "fail";
    }

    unlink($output_dir);

    echo json_encode(array('res' => $repuesta, 'msg' => $mensaje, 'msg2' => $mensaje2, 'msgC' => $mensajeCuerpo));
}
?>