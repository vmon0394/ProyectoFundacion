<?php

$semillero = isset($_GET['semillero']) ? $_GET['semillero'] : '0';

$nombre = "";
$estado = "";
$validarTipo = "";


include_once '../Model/conexionConsultas.php';

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
 * no need to edit below this line
 */

/*
 * Local functions
 */

function fatal_error($sErrorMessage = '') {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    die($sErrorMessage);
}

/*
 * MySQL connection
 */
if (!$gaSql['link'] = mysqli_connect($gaSql['server'], $gaSql['user'], $gaSql['password'])) {
    fatal_error('Could not open connection to server');
}

if (!mysqli_select_db($gaSql['link'], $gaSql['db'])) {
    fatal_error('Could not select database ');
}


//Query de la tabla semilleros para traer el nombre del semillero al que se le va realizar el reporte
$sql = "SELECT * FROM `tbl_semilleros` WHERE idSemillero = '$semillero'";
$rs = mysqli_query($gaSql['link'], $sql);
$datos = mysqli_fetch_array($rs);

$tituloReporte = strtoupper($datos['nombreSemillero']);
$nombre = "FICHAS SOCIO FAMILIARES " . strtoupper($datos['nombreSemillero']) . ".xls";
//$nombreIndex = strtoupper($datos['nombreSemillero']);
$nombreIndex = "FICHAS SEMILLERO";

//Query de la tabla ficha socio familiares para traer los participantes del semilleros
$query = "SELECT f.idFicha, f.nombres, f.apellidos, f.sexo, dn.departamento AS departamentoNacimiento, mn.municipio AS lugarNacimiento, f.fechaNacimiento, f.edad, f.estado_civil, f.numero_hijos, f.promocion_egresado, f.tipoDocumento, f.documento, f.RH, f.tipoDeSeguridad, f.eps_sisben, 
    f.telefono, f.celular, f.direccion, f.barrioOvereda, f.barrio_vereda, f.email, f.ocupacion, f.nombreNino, f.parentezcoNino, f.programa, dr.departamento, mr.municipio, f.institucion, f.nivelEscolaridad, 
    f.estadoEscolarizacion, f.semestre_escolaridad, f.areaEspecializacion, f.lugar_formacion, f.grado, f.repitencia, f.cuantos, f.cuales, f.anoDeIngreso, f.anosDePermanencia, f.isdel, f.nombreMadre_Padre, f.telefonoMadre_Padre, f.celularMadre_padre, f.nombreCuidador, f.parentezcoCuidador, 
    f.telefonoCuidador, f.celularCuidador, f.tipologiaFamiliar, f.miembrosFamilia, f.personasEmpleoFormal, f.personasEmpleoInformal, f.desplazado, f.registro, f.victima, f.registro_victima, f.etnia, 
    f.discapacidad, f.observacionDiscapacidad, f.trabaja_actualmente, f.tipo_trabajo, f.nombre_empresa, f.tipo_contrato, f.familiaresEmpresa, f.compania, f.tipoVinculacion, f.nombreParentezco, s.nombreSemillero, f.anoRegistro, 
    f.participa_otro_semillero, f.otros_semilleros, f.participa_servicios, f.que_servicios, s.idCategoria FROM tbl_ficha_sociofamiliar f 
    INNER JOIN tbl_municipios mn ON mn.idMunicipio = f.idCiudadNacimiento INNER JOIN tbl_municipios mr ON mr.idMunicipio = f.idCiudadResidencia
    INNER JOIN tbl_departamentos dn ON dn.idDepartamento = mn.idDepartamento 
    INNER JOIN tbl_departamentos dr ON dr.idDepartamento = mr.idDepartamento
    INNER JOIN tbl_semilleros s ON s.idSemillero = f.idSemillero
    WHERE f.idSemillero = '$semillero'";

mysqli_query($gaSql['link'], "SET NAMES utf8");
$rResult = mysqli_query($gaSql['link'], $query) or fatal_error('MySQL Error: ' . mysqli_error($gaSql['link']));

$aRow = mysqli_num_rows($rResult);

include_once'../Model/PHPExcel.php';

if ($aRow > 0) {
    $objPHPExcel = new PHPExcel();

    $objPHPExcel->getProperties()
            ->setCreator("ingenieroweb.com.co")
            ->setLastModifiedBy("ingenieroweb.com.co")
            ->setTitle("Exportar excel desde mysql")
            ->setSubject("Aprendices")
            ->setDescription("Documento generado con PHPExcel")
            ->setKeywords("ingenieroweb.com.co  con  phpexcel")
            ->setCategory($nombreIndex);

    $i = 3;
    $j = 1;

    //Contadores de estado
    $contActivo = 0;
    $contInactivo = 0;

    //Contadores de genero
    $contMasculino = 0;
    $contFemenino = 0;

    $tipoStilo = "";

    while ($registro = mysqli_fetch_object($rResult)) {

        if ($registro->idCategoria < 10) {

            $tipoStilo = $registro->idCategoria;

            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValueA('A' . 1, 'ITEM')
                    ->setCellValueB('B' . 1, 'NOMBRES')
                    ->setCellValueC('C' . 1, 'APELLIDOS')
                    ->setCellValueD('D' . 1, 'GENERO')
                    ->setCellValueE('E' . 1, 'DEP. DE NACIMIENTO')
                    ->setCellValueG('F' . 1, 'LUGAR DE NACIMIENTO')
                    ->setCellValueH('G' . 1, 'FECHA NACIMIENTO')
                    ->setCellValueI('H' . 1, 'EDAD')
                    ->setCellValueJ('I' . 1, 'TIPO DOCUMENTO')
                    ->setCellValueK('J' . 1, 'Nº DOCUMENTO')
                    ->setCellValueL('K' . 1, 'RH')
                    ->setCellValueM('L' . 1, 'SEGURIDAD SOCIAL')
                    ->setCellValueN('M' . 1, 'ENTIDAD PRESTADORA')
                    ->setCellValueN('N' . 1, 'TELÉFONO FIJO')
                    ->setCellValueO('O' . 1, 'NÚMERO CELULAR')
                    ->setCellValueP('P' . 1, 'OCUPACIÓN')
                    ->setCellValueQ('Q' . 1, 'DIRECCIÓN')
                    ->setCellValueR('R' . 1, 'BARRIO O VEREDA')
                    ->setCellValueR('S' . 1, 'NOMBRE BARRIO/VEREDA')
                    ->setCellValueS('T' . 1, 'E-MAIL')
                    ->setCellValueT('U' . 1, 'DEP. DE RESIDENCIA')
                    ->setCellValueU('V' . 1, 'MUNICIPIO RESIDENCIA')
                    ->setCellValueV('W' . 1, 'INSTITUCIÓN EDUCATIVA')
                    ->setCellValueV('X' . 1, 'GRADO ESCOLAR')
                    ->setCellValueW('Y' . 1, 'REPITENCIA')
                    ->setCellValueX('Z' . 1, 'CUANTOS')
                    ->setCellValueY('AA' . 1, 'CUALES')
                    ->setCellValueZ('AB' . 1, 'FECHA DE INGRESO')
                    ->setCellValueA('AC' . 1, 'Nº DE AÑOS EN EL SEMILLERO')
                    ->setCellValueA('AD' . 1, 'ESTADO')
                    ->setCellValueB('AE' . 1, 'NOMBRE DE LOS PADRES')
                    ->setCellValueB('AF' . 1, 'TELÉFONO')
                    ->setCellValueC('AG' . 1, 'CELULAR')
                    ->setCellValueC('AH' . 1, 'CUIDADOR')
                    ->setCellValueD('AI' . 1, 'PARENTESCO')
                    ->setCellValueE('AJ' . 1, 'TELÉFONO')
                    ->setCellValueF('AK' . 1, 'CALULAR')
                    ->setCellValueG('AL' . 1, 'TIPOLOGÍA FAMILIAR')
                    ->setCellValueG('AM' . 1, 'N° DE MIEMBROS DE LA FAMILIA')
                    ->setCellValueI('AN' . 1, 'Nº PERSONAS EMPLEO FORMAL')
                    ->setCellValueJ('AO' . 1, 'Nº PERSONAS EMPLEO INFORMAL')
                    ->setCellValueK('AP' . 1, 'SITUACIÓN DE DESPLAZAMIENTO')
                    ->setCellValueL('AQ' . 1, 'REGISTRO DE DESPLAZAMIENTO')
                    ->setCellValueK('AR' . 1, 'VÍCTIMA')
                    ->setCellValueL('AS' . 1, 'REGISTRO VÍCTIMA')
                    ->setCellValueM('AT' . 1, 'PERTENENCIA ETNICA')
                    ->setCellValueN('AU' . 1, 'DISCAPACIDAD PARTICIPANTE')
                    ->setCellValueO('AV' . 1, 'TIPO DISCAPACIDAD')
                    ->setCellValueL('AW' . 1, 'FAMILIARES EN LA EMPRESA')
                    ->setCellValueM('AX' . 1, 'COMPAÑÍA')
                    ->setCellValueM('AY' . 1, 'TIPO VINCULACIÓN')
                    ->setCellValueN('AZ' . 1, 'NOMBRE Y PARENTESCO')
                    ->setCellValueC('BA' . 1, 'PARTICIPA EN OTRO SEMILLERO')
                    ->setCellValueD('BB' . 1, 'CUAL SEMILLERO')
                    ->setCellValueE('BC' . 1, 'PARTICIPA EN ALGÚN SERVICIO')
                    ->setCellValueF('BD' . 1, 'QUE SERVICIOS');


            if ($registro->isdel == "1") {
                $estado = "ACTIVO";
                $contActivo++;
            } else if ($registro->isdel == "0") {
                $estado = "INACTIVO";
                $contInactivo++;
            }

            if ($registro->sexo == "MASCULINO") {
                $contMasculino++;
            } else if ($registro->sexo == "FEMENINO") {
                $contFemenino++;
            }

            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValueA('A' . $i, $j++)
                    ->setCellValueB('B' . $i, $registro->nombres)
                    ->setCellValueC('C' . $i, $registro->apellidos)
                    ->setCellValueD('D' . $i, strtoupper($registro->sexo))
                    ->setCellValueE('E' . $i, $registro->departamentoNacimiento)
                    ->setCellValueF('F' . $i, $registro->lugarNacimiento)
                    ->setCellValueG('G' . $i, str_replace("-", "/", date("d-m-Y", strtotime($registro->fechaNacimiento))))
                    ->setCellValueH('H' . $i, $registro->edad)
                    ->setCellValueH('I' . $i, $registro->tipoDocumento)
                    ->setCellValueI('J' . $i, $registro->documento)
                    ->setCellValueJ('K' . $i, $registro->RH)
                    ->setCellValueK('L' . $i, strtoupper($registro->tipoDeSeguridad))
                    ->setCellValueL('M' . $i, $registro->eps_sisben)
                    ->setCellValueM('N' . $i, $registro->telefono)
                    ->setCellValueN('O' . $i, $registro->celular)
                    ->setCellValueN('P' . $i, $registro->ocupacion)
                    ->setCellValueO('Q' . $i, $registro->direccion)
                    ->setCellValueP('R' . $i, $registro->barrioOvereda)
                    ->setCellValueP('S' . $i, $registro->barrio_vereda)
                    ->setCellValueQ('T' . $i, $registro->email)
                    ->setCellValueR('U' . $i, $registro->departamento)
                    ->setCellValueR('V' . $i, $registro->municipio)
                    ->setCellValueS('W' . $i, $registro->institucion)
                    ->setCellValueT('X' . $i, $registro->grado)
                    ->setCellValueU('Y' . $i, $registro->repitencia)
                    ->setCellValueV('Z' . $i, $registro->cuantos)
                    ->setCellValueV('AA' . $i, $registro->cuales)
                    ->setCellValueW('AB' . $i, str_replace("-", "/", date("d-m-Y", strtotime($registro->anoDeIngreso))))
                    ->setCellValueX('AC' . $i, $registro->anosDePermanencia)
                    ->setCellValueY('AD' . $i, $registro->isdel)
                    ->setCellValueZ('AE' . $i, $registro->nombreMadre_Padre)
                    ->setCellValueA('AF' . $i, $registro->telefonoMadre_Padre)
                    ->setCellValueA('AG' . $i, $registro->celularMadre_padre)
                    ->setCellValueB('AH' . $i, $registro->nombreCuidador)
                    ->setCellValueB('AI' . $i, $registro->parentezcoCuidador)
                    ->setCellValueC('AJ' . $i, $registro->telefonoCuidador)
                    ->setCellValueC('AK' . $i, $registro->celularCuidador)
                    ->setCellValueD('AL' . $i, strtoupper($registro->tipologiaFamiliar))
                    ->setCellValueE('AM' . $i, $registro->miembrosFamilia)
                    ->setCellValueG('AN' . $i, $registro->personasEmpleoFormal)
                    ->setCellValueG('AO' . $i, $registro->personasEmpleoInformal)
                    ->setCellValueH('AP' . $i, $registro->desplazado)
                    ->setCellValueI('AQ' . $i, $registro->registro)
                    ->setCellValueH('AR' . $i, $registro->victima)
                    ->setCellValueI('AS' . $i, $registro->registro_victima)
                    ->setCellValueJ('AT' . $i, $registro->etnia)
                    ->setCellValueK('AU' . $i, $registro->discapacidad)
                    ->setCellValueL('AV' . $i, $registro->observacionDiscapacidad)
                    ->setCellValueM('AW' . $i, $registro->familiaresEmpresa)
                    ->setCellValueN('AX' . $i, $registro->compania)
                    ->setCellValueF('AY' . $i, $registro->tipoVinculacion)
                    ->setCellValueO('AZ' . $i, $registro->nombreParentezco)
                    ->setCellValueB('BA' . $i, $registro->participa_otro_semillero)
                    ->setCellValueB('BB' . $i, $registro->otros_semilleros)
                    ->setCellValueC('BC' . $i, $registro->participa_servicios)
                    ->setCellValueC('BD' . $i, $registro->que_servicios);
        } else if ($registro->idCategoria >= 10 && $registro->idCategoria < 20) {

            $tipoStilo = $registro->idCategoria;

            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValueA('A' . 1, 'ITEM')
                    ->setCellValueB('B' . 1, 'NOMBRES')
                    ->setCellValueC('C' . 1, 'APELLIDOS')
                    ->setCellValueD('D' . 1, 'GENERO')
                    ->setCellValueE('E' . 1, 'DEP. DE NACIMIENTO')
                    ->setCellValueE('F' . 1, 'LUGAR DE NACIMIENTO')
                    ->setCellValueF('G' . 1, 'FECHA NACIMIENTO')
                    ->setCellValueG('H' . 1, 'EDAD')
                    ->setCellValueH('I' . 1, 'TIPO DOCUMENTO')
                    ->setCellValueI('J' . 1, 'Nº DOCUMENTO')
                    ->setCellValueJ('K' . 1, 'RH')
                    ->setCellValueK('L' . 1, 'SEGURIDAD SOCIAL')
                    ->setCellValueL('M' . 1, 'ENTIDAD PRESTADORA')
                    ->setCellValueM('N' . 1, 'TELÉFONO FIJO')
                    ->setCellValueN('O' . 1, 'NÚMERO CELULAR')
                    ->setCellValueN('P' . 1, 'OCUPACIÓN')
                    ->setCellValueO('Q' . 1, 'DIRECCIÓN')
                    ->setCellValueP('R' . 1, 'BARRIO O VEREDA')
                    ->setCellValueP('S' . 1, 'NOMBRE BARRIO/VEREDA')
                    ->setCellValueQ('T' . 1, 'E-MAIL')
                    ->setCellValueR('U' . 1, 'DEP. DE RESIDENCIA')
                    ->setCellValueR('V' . 1, 'MUNICIPIO RESIDENCIA')
                    ->setCellValueT('W' . 1, 'NIVEL ESCOLARIDAD')
                    ->setCellValueT('X' . 1, 'ESTADO ESCOLARIDAD')
                    ->setCellValueT('Y' . 1, 'AREA PROFESIONALIZACIÓN')
                    ->setCellValueW('Z' . 1, 'FECHA DE INGRESO')
                    ->setCellValueX('AA' . 1, 'Nº DE AÑOS EN EL SEMILLERO')
                    ->setCellValueY('AB' . 1, 'ESTADO')
                    ->setCellValueZ('AC' . 1, 'NIÑO EN SEMILLERO')
                    ->setCellValueA('AD' . 1, 'PARENTESCO')
                    ->setCellValueB('AE' . 1, 'PROGRAMA')
                    ->setCellValueD('AF' . 1, 'TIPOLOGÍA FAMILIAR')
                    ->setCellValueE('AG' . 1, 'N° DE MIEMBROS DE LA FAMILIA')
                    ->setCellValueF('AH' . 1, 'Nº PERSONAS EMPLEO FORMAL')
                    ->setCellValueG('AI' . 1, 'Nº PERSONAS EMPLEO INFORMAL')
                    ->setCellValueH('AJ' . 1, 'SITUACIÓN DE DESPLAZAMIENTO')
                    ->setCellValueI('AK' . 1, 'REGISTRO DE DESPLAZAMIENTO')
                    ->setCellValueH('AL' . 1, 'VÍCTIMA')
                    ->setCellValueI('AM' . 1, 'REGISTRO VÍCTIMA')
                    ->setCellValueJ('AN' . 1, 'PERTENENCIA ETNICA')
                    ->setCellValueK('AP' . 1, 'DISCAPACIDAD')
                    ->setCellValueL('AP' . 1, 'OBSERVACIONES')
                    ->setCellValueM('AQ' . 1, 'FAMILIARES EN LA EMPRESA')
                    ->setCellValueN('AR' . 1, 'COMPAÑIA')
                    ->setCellValueN('AS' . 1, 'TIPO VINCULACIÓN')
                    ->setCellValueO('AT' . 1, 'NOMBRE Y PARENTESCO');


            if ($registro->isdel == "1") {
                $estado = "ACTIVO";
                $contActivo++;
            } else if ($registro->isdel == "0") {
                $estado = "INACTIVO";
                $contInactivo++;
            }

            if ($registro->sexo == "MASCULINO") {
                $contMasculino++;
            } else if ($registro->sexo == "FEMENINO") {
                $contFemenino++;
            }

            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValueA('A' . $i, $j++)
                    ->setCellValueB('B' . $i, $registro->nombres)
                    ->setCellValueC('C' . $i, $registro->apellidos)
                    ->setCellValueD('D' . $i, strtoupper($registro->sexo))
                    ->setCellValueE('E' . $i, $registro->departamentoNacimiento)
                    ->setCellValueE('F' . $i, $registro->lugarNacimiento)
                    ->setCellValueF('G' . $i, str_replace("-", "/", date("d-m-Y", strtotime($registro->fechaNacimiento))))
                    ->setCellValueG('H' . $i, $registro->edad)
                    ->setCellValueH('I' . $i, $registro->tipoDocumento)
                    ->setCellValueI('J' . $i, $registro->documento)
                    ->setCellValueJ('K' . $i, $registro->RH)
                    ->setCellValueK('L' . $i, strtoupper($registro->tipoDeSeguridad))
                    ->setCellValueL('M' . $i, $registro->eps_sisben)
                    ->setCellValueM('N' . $i, $registro->telefono)
                    ->setCellValueN('O' . $i, $registro->celular)
                    ->setCellValueN('P' . $i, $registro->ocupacion)
                    ->setCellValueO('Q' . $i, $registro->direccion)
                    ->setCellValueP('R' . $i, $registro->barrioOvereda)
                    ->setCellValueP('S' . $i, $registro->barrio_vereda)
                    ->setCellValueQ('T' . $i, $registro->email)
                    ->setCellValueR('U' . $i, $registro->departamento)
                    ->setCellValueR('V' . $i, $registro->municipio)
                    ->setCellValueS('W' . $i, $registro->nivelEscolaridad)
                    ->setCellValueS('X' . $i, $registro->estadoEscolarizacion)
                    ->setCellValueS('Y' . $i, $registro->areaEspecializacion)
                    ->setCellValueT('Z' . $i, str_replace("-", "/", date("d-m-Y", strtotime($registro->anoDeIngreso))))
                    ->setCellValueU('AA' . $i, $registro->anosDePermanencia)
                    ->setCellValueV('AB' . $i, $registro->isdel)
                    ->setCellValueW('AC' . $i, $registro->nombreNino)
                    ->setCellValueX('AD' . $i, $registro->parentezcoNino)
                    ->setCellValueY('AE' . $i, $registro->programa)
                    ->setCellValueZ('AF' . $i, strtoupper($registro->tipologiaFamiliar))
                    ->setCellValueA('AG' . $i, $registro->miembrosFamilia)
                    ->setCellValueB('AH' . $i, $registro->personasEmpleoFormal)
                    ->setCellValueC('AI' . $i, $registro->personasEmpleoInformal)
                    ->setCellValueD('AJ' . $i, $registro->desplazado)
                    ->setCellValueE('AK' . $i, $registro->registro)
                    ->setCellValueD('AL' . $i, $registro->victima)
                    ->setCellValueE('AM' . $i, $registro->registro_victima)
                    ->setCellValueF('AN' . $i, $registro->etnia)
                    ->setCellValueG('AO' . $i, $registro->discapacidad)
                    ->setCellValueH('AP' . $i, $registro->observacionDiscapacidad)
                    ->setCellValueI('AQ' . $i, $registro->familiaresEmpresa)
                    ->setCellValueJ('AR' . $i, $registro->compania)
                    ->setCellValueJ('AS' . $i, $registro->tipoVinculacion)
                    ->setCellValueK('AT' . $i, $registro->nombreParentezco);
        } else if ($registro->idCategoria >= 20 && $registro->idCategoria < 30) {

            $tipoStilo = $registro->idCategoria;

            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValueA('A' . 1, 'ITEM')
                    ->setCellValueH('B' . 1, 'TIPO DOCUMENTO')
                    ->setCellValueI('C' . 1, 'Nº DOCUMENTO')
                    ->setCellValueB('D' . 1, 'NOMBRES')
                    ->setCellValueC('E' . 1, 'APELLIDOS')
                    ->setCellValueD('F' . 1, 'GENERO')
                    ->setCellValueE('G' . 1, 'DEP. DE NACIMIENTO')
                    ->setCellValueE('H' . 1, 'LUGAR DE NACIMIENTO')
                    ->setCellValueF('I' . 1, 'FECHA NACIMIENTO')
                    ->setCellValueG('J' . 1, 'EDAD')
                    ->setCellValueJ('K' . 1, 'PROMOCIÓN DE MULTIPLICADORES')
                    ->setCellValueW('L' . 1, 'FECHA DE INGRESO')
                    ->setCellValueX('M' . 1, 'Nº DE AÑOS EN EL GRUPO')
                    ->setCellValueY('N' . 1, 'ESTADO')
                    ->setCellValueK('O' . 1, 'ESTADO CIVIL')
                    ->setCellValueL('P' . 1, 'NÚMERO DE HIJOS')
                    ->setCellValueR('Q' . 1, 'DEP. DE RESIDENCIA')
                    ->setCellValueR('R' . 1, 'MUNICIPIO RESIDENCIA')
                    ->setCellValueP('S' . 1, 'BARRIO O VEREDA')
                    ->setCellValueP('T' . 1, 'NOMBRE BARRIO/VEREDA')
                    ->setCellValueO('U' . 1, 'DIRECCIÓN')
                    ->setCellValueM('V' . 1, 'TELÉFONO FIJO')
                    ->setCellValueN('W' . 1, 'NÚMERO CELULAR')
                    ->setCellValueQ('X' . 1, 'E-MAIL')
                    ->setCellValueT('Y' . 1, 'NIVEL ESCOLARIDAD')
                    ->setCellValueT('Z' . 1, 'ESTADO ESCOLARIDAD')
                    ->setCellValueN('AA' . 1, 'SEMESTRE')
                    ->setCellValueT('AB' . 1, 'AREA DE FORMACIÓN')
                    ->setCellValueZ('AC' . 1, 'LUGAR DE FORMACIÓN')
                    ->setCellValueA('AD' . 1, 'TRABAJA ACTUALEMENTE ')
                    ->setCellValueB('AE' . 1, 'TIPO DE TRABAJO ')
                    ->setCellValueD('AF' . 1, 'NOMBRE DE LA EMPRESA')
                    ->setCellValueE('AG' . 1, 'TIPO DE CONTRATO');

            if ($registro->isdel == "1") {
                $estado = "ACTIVO";
                $contActivo++;
            } else if ($registro->isdel == "0") {
                $estado = "INACTIVO";
                $contInactivo++;
            }

            if ($registro->sexo == "MASCULINO") {
                $contMasculino++;
            } else if ($registro->sexo == "FEMENINO") {
                $contFemenino++;
            }

            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValueA('A' . $i, $j++)
                    ->setCellValueH('B' . $i, $registro->tipoDocumento)
                    ->setCellValueI('C' . $i, $registro->documento)
                    ->setCellValueB('D' . $i, $registro->nombres)
                    ->setCellValueC('E' . $i, $registro->apellidos)
                    ->setCellValueD('F' . $i, strtoupper($registro->sexo))
                    ->setCellValueE('G' . $i, $registro->departamentoNacimiento)
                    ->setCellValueE('H' . $i, $registro->lugarNacimiento)
                    ->setCellValueF('I' . $i, str_replace("-", "/", date("d-m-Y", strtotime($registro->fechaNacimiento))))
                    ->setCellValueG('J' . $i, $registro->edad)
                    ->setCellValueL('K' . $i, $registro->promocion_egresado)
                    ->setCellValueT('L' . $i, str_replace("-", "/", date("d-m-Y", strtotime($registro->anoDeIngreso))))
                    ->setCellValueU('M' . $i, $registro->anosDePermanencia)
                    ->setCellValueV('N' . $i, $registro->isdel)
                    ->setCellValueJ('O' . $i, $registro->estado_civil)
                    ->setCellValueK('P' . $i, $registro->numero_hijos)
                    ->setCellValueR('Q' . $i, $registro->departamento)
                    ->setCellValueR('R' . $i, $registro->municipio)
                    ->setCellValueP('S' . $i, $registro->barrioOvereda)
                    ->setCellValueP('T' . $i, $registro->barrio_vereda)
                    ->setCellValueO('U' . $i, $registro->direccion)
                    ->setCellValueM('V' . $i, $registro->telefono)
                    ->setCellValueN('W' . $i, $registro->celular)
                    ->setCellValueQ('X' . $i, $registro->email)
                    ->setCellValueS('Y' . $i, $registro->nivelEscolaridad)
                    ->setCellValueS('Z' . $i, $registro->estadoEscolarizacion)
                    ->setCellValueN('AA' . $i, $registro->semestre_escolaridad)
                    ->setCellValueS('AB' . $i, $registro->areaEspecializacion)
                    ->setCellValueX('AC' . $i, $registro->lugar_formacion)
                    ->setCellValueY('AD' . $i, $registro->trabaja_actualmente)
                    ->setCellValueZ('AE' . $i, $registro->tipo_trabajo)
                    ->setCellValueA('AF' . $i, $registro->nombre_empresa)
                    ->setCellValueB('AG' . $i, $registro->tipo_contrato);
        }
        $i++;
    }

    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValueA('A' . ($i + 1), 'PARTICIPANTES ACTIVOS')
            ->setCellValueB('A' . ($i + 2), 'PARTICIPANTES INACTIVOS')
            ->setCellValueB('A' . ($i + 3), 'GENERO MASCULINO')
            ->setCellValueB('A' . ($i + 4), 'GENERO FEMENINO');

    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . ($i + 1) . ':B' . ($i + 1));
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . ($i + 2) . ':B' . ($i + 2));
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . ($i + 3) . ':B' . ($i + 3));
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . ($i + 4) . ':B' . ($i + 4));

    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValueA('C' . ($i + 1), $contActivo)
            ->setCellValueB('C' . ($i + 2), $contInactivo)
            ->setCellValueB('C' . ($i + 3), $contMasculino)
            ->setCellValueB('C' . ($i + 4), $contFemenino);
} else {
    $objPHPExcel = new PHPExcel();

    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A2:H2');
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A3:H3');

    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValueA('A' . 2, $nombreIndex)
            ->setCellValueA('A' . 3, 'No hay Participantes.');
}

$estiloTituloReporte = array(
    'font' => array(
        'name' => 'Verdana',
        'bold' => true,
        'italic' => false,
        'strike' => false,
        'size' => 16,
        'color' => array(
            'rgb' => '000000'
        )
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('argb' => '6fb22e')
    ),
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM
        )
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'rotation' => 0,
        'wrap' => TRUE
    )
);

$estiloTituloColumnas = array(
    'font' => array(
        'name' => 'Arial',
        'bold' => true,
        'size' => 12,
        'color' => array(
            'rgb' => '000000'
        )
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('argb' => '12ad54')
    ),
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM
        ),
        'bottom' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
            'color' => array(
                'rgb' => '3a2a47'
            )
        ),
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'rotation' => 0,
        'wrap' => FALSE
    )
);

$estiloInformacionStyle1 = new PHPExcel_Style();
$estiloInformacionStyle1->applyFromArray(
        array(
            'font' => array(
                'name' => 'Arial',
                'bold' => false,
                'size' => 11,
                'color' => array(
                    'rgb' => '000000'
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('argb' => '8dc449')
            ),
            'borders' => array(
                'left' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ),
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ),
                'right' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                )
            )
));

$estiloInformacionStyle2 = new PHPExcel_Style();
$estiloInformacionStyle2->applyFromArray(
        array(
            'font' => array(
                'name' => 'Arial',
                'bold' => false,
                'size' => 11,
                'color' => array(
                    'rgb' => '000000'
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('argb' => 'ffffff')
            ),
            'borders' => array(
                'left' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ),
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ),
                'right' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                )
            )
));

$estiloInformacion2 = new PHPExcel_Style();
$estiloInformacion2->applyFromArray(
        array(
            'font' => array(
                'name' => 'Arial',
                'bold' => true,
                'size' => 11,
                'color' => array(
                    'rgb' => '000000'
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('argb' => 'FFFFFFFF')
            ),
            'borders' => array(
                'left' => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ),
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ),
                'right' => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ),
                'top' => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ),
                'inside' => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                    'color' => array(
                        'rgb' => '000000'
                    )
                )
            )
));

$estiloInformacion3 = new PHPExcel_Style();
$estiloInformacion3->applyFromArray(
        array(
            'font' => array(
                'name' => 'Arial',
                'bold' => false,
                'size' => 11,
                'color' => array(
                    'rgb' => '000000'
                )
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('argb' => 'FFFFFFFF')
            ),
            'borders' => array(
                'left' => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ),
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ),
                'right' => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ),
                'top' => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                )
            )
));

if ($aRow > 0) {

    if ($tipoStilo < 10) {

        $objPHPExcel->getActiveSheet()->getStyle('A1:BD2')->applyFromArray($estiloTituloColumnas);

        $x = 3;
        while ($x <= ($i - 1)) {
            if ($x % 2 == 0) {
                $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacionStyle1, "A" . $x . ":BD" . $x);
            } else {
                $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacionStyle2, "A" . $x . ":BD" . $x);
            }
            $x++;
        }

        // Inmovilizar paneles 
        $objPHPExcel->getActiveSheet(0)->freezePane('A3');
        $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0, 3);

        //Definir ancho de las columnas
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(6);
        $h = 'B';
        $j = 1;
        while ($j <= 55) {

            $objPHPExcel->getActiveSheet()->getColumnDimension($h)->setWidth(30);
//            $objPHPExcel->getActiveSheet()->getColumnDimension($h)->setAutoSize(TRUE);
            $h++;
            $j++;
        }
        $objPHPExcel->getActiveSheet()->calculateColumnWidths();

        //Unir filas
        $h = 'A';
        $j = 1;
        while ($j <= 56) {
            $objPHPExcel->setActiveSheetIndex(0)->mergeCells($h . '1:' . $h . '2');
            $h++;
            $j++;
        }
    } else if ($tipoStilo >= 10 && $tipoStilo < 20) {

        $objPHPExcel->getActiveSheet()->getStyle('A1:AT2')->applyFromArray($estiloTituloColumnas);

        $x = 3;
        while ($x <= ($i - 1)) {
            if ($x % 2 == 0) {
                $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacionStyle1, "A" . $x . ":AT" . $x);
            } else {
                $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacionStyle2, "A" . $x . ":AT" . $x);
            }
            $x++;
        }

        // Inmovilizar paneles 
        $objPHPExcel->getActiveSheet(0)->freezePane('A3');
        $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0, 3);

        //Definir ancho de las columnas
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(6);
        $h = 'B';
        $j = 1;
        while ($j <= 45) {

            $objPHPExcel->getActiveSheet()->getColumnDimension($h)->setWidth(30);
//            $objPHPExcel->getActiveSheet()->getColumnDimension($h)->setAutoSize(TRUE);
            $h++;
            $j++;
        }
        $objPHPExcel->getActiveSheet()->calculateColumnWidths();

        //Unir filas
        $h = 'A';
        $j = 1;
        while ($j <= 46) {
            $objPHPExcel->setActiveSheetIndex(0)->mergeCells($h . '1:' . $h . '2');
            $h++;
            $j++;
        }
    } else if ($tipoStilo >= 20 && $tipoStilo < 30) {

        $objPHPExcel->getActiveSheet()->getStyle('A1:AG2')->applyFromArray($estiloTituloColumnas);

        $x = 3;
        while ($x <= ($i - 1)) {
            if ($x % 2 == 0) {
                $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacionStyle1, "A" . $x . ":AG" . $x);
            } else {
                $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacionStyle2, "A" . $x . ":AG" . $x);
            }
            $x++;
        }

        // Inmovilizar paneles 
        $objPHPExcel->getActiveSheet(0)->freezePane('A3');
        $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0, 3);

        //Definir ancho de las columnas
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(6);
        $h = 'B';
        $j = 1;
        while ($j <= 32) {

            $objPHPExcel->getActiveSheet()->getColumnDimension($h)->setWidth(30);
//            $objPHPExcel->getActiveSheet()->getColumnDimension($h)->setAutoSize(TRUE);
            $h++;
            $j++;
        }
        $objPHPExcel->getActiveSheet()->calculateColumnWidths();

        //Unir filas
        $h = 'A';
        $j = 1;
        while ($j <= 33) {
            $objPHPExcel->setActiveSheetIndex(0)->mergeCells($h . '1:' . $h . '2');
            $h++;
            $j++;
        }
    }

    $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion2, "A" . ($i + 1) . ":B" . ($i + 1));
    $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion2, "A" . ($i + 2) . ":B" . ($i + 2));
    $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion2, "A" . ($i + 3) . ":B" . ($i + 3));
    $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion2, "A" . ($i + 4) . ":B" . ($i + 4));

    $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion3, "C" . ($i + 1));
    $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion3, "C" . ($i + 2));
    $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion3, "C" . ($i + 3));
    $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion3, "C" . ($i + 4));
} else {
    $objPHPExcel->getActiveSheet()->getStyle('A2:H2')->applyFromArray($estiloTituloReporte);
}

// Se asigna el nombre a la hoja
$objPHPExcel->getActiveSheet()->setTitle($nombreIndex);

// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
$objPHPExcel->setActiveSheetIndex(0);

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename=' . $nombre);
header('Cache-Control: max-age=0');

$data = "Excel2007";

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $data);
$objWriter->save('php://output');
exit;

mysqli_close($gaSql['link']);
echo json_encode($aRow);
