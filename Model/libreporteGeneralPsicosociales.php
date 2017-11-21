<?php
	include_once '../Model/db.conn.php';
	

class psicosocialcontar{

    function personaspart(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(*) AS participantes FROM tbl_ficha_sociofamiliar WHERE isdel = 1";
        $query=$conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

	function totaltalleres(){
		$conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS totalgeneral FROM tbl_talleres WHERE fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
       	$query=$conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
	}

	function talleresformativos(){
		$conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS tformativos FROM tbl_talleres WHERE tipoTaller='Talleres Formativos' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
	}

	function tallerpsicosocial(){
		$conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS tpsicosocial FROM tbl_talleres WHERE tipoTaller='Taller Psicosocial' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
	}

    function salidaspedagogicastotal(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS salidaspe FROM tbl_talleres WHERE tipoTaller='Salidas Pedagógicas' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function vacacionesrecreativasto(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS vacaciones FROM tbl_talleres WHERE tipoTaller='Vacaciones recreativas' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function encuentropadrestot(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS padres FROM tbl_talleres WHERE tipoTaller='Encuentro de Padres' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function Campamentotal(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(*) AS Campamento FROM tbl_salidas WHERE isdelSalida = 1 AND fechaSalida BETWEEN '2017-01-01' AND '2017-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function Muestratotal(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS Muestra FROM tbl_talleres WHERE tipoTaller='Muestra' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function Cierretotal(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS Cierre FROM tbl_talleres WHERE tipoTaller='Cierre' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function Actividades_es(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS actiespe FROM tbl_talleres WHERE isdelTaller = 1 AND tipoTaller='Actividades Especiales' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function Comunitarias(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(*) AS comunitarias FROM tbl_comunitarias WHERE isdelActividad = 1";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

	function atencionespsico(){
		$conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT COUNT(*) AS idseguimiento FROM tbl_historia_clinica WHERE fechaIngreso BETWEEN '2017-01-01' AND '2017-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
	}

	function seguimientoexterno(){
		$conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT COUNT(idSeguimientoExterno) AS idseguimientoex FROM tbl_seguimiento_sesion_externos WHERE fechaSeguimientoSesion BETWEEN '2017-01-01' AND '2017-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
	}

	function personasatendidas(){
		$conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT COUNT(DISTINCT idHistoria) AS idpersonatendi FROM tbl_seguimiento_sesion WHERE fechaSeguimientoSesion BETWEEN '2017-01-01' AND '2017-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
	}

    function proyectos(){
		$conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT COUNT(*) AS contarproyecto FROM tbl_intervenciones WHERE isdelIntervencion = 1 AND fechaIntervencion BETWEEN '2017-01-01' AND '2017-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function totalsumado(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT ( (SELECT count(tipoTaller) AS tformativos FROM tbl_talleres WHERE tipoTaller='Talleres Formativos' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31') + (SELECT count(tipoTaller) AS tpsicosocial FROM tbl_talleres WHERE tipoTaller='Taller Psicosocial' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31') + (SELECT count(tipoTaller) AS salidaspe FROM tbl_talleres WHERE tipoTaller='Salidas Pedagógicas' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31') + (SELECT count(tipoTaller) AS vacaciones FROM tbl_talleres WHERE tipoTaller='Vacaciones recreativas' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31') + (SELECT count(tipoTaller) AS padres FROM tbl_talleres WHERE tipoTaller='Encuentro de Padres' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31') + (SELECT count(*) AS Campamento FROM tbl_salidas WHERE isdelSalida = 1 AND fechaSalida BETWEEN '2017-01-01' AND '2017-12-31') + (SELECT count(tipoTaller) AS Muestra FROM tbl_talleres WHERE tipoTaller='Muestra' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31') + (SELECT count(tipoTaller) AS Cierre FROM tbl_talleres WHERE tipoTaller='Cierre' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31') + (SELECT count(tipoTaller) AS actiespe FROM tbl_talleres WHERE  tipoTaller='Actividades Especiales' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31') + (SELECT COUNT(idSeguimiento) AS idseguimiento FROM tbl_seguimiento_sesion WHERE fechaSeguimientoSesion BETWEEN '2017-01-01' AND '2017-12-31') + (SELECT COUNT(idSeguimientoExterno) AS idseguimientoex FROM tbl_seguimiento_sesion_externos WHERE fechaSeguimientoSesion BETWEEN '2017-01-01' AND '2017-12-31') + (SELECT COUNT(DISTINCT idHistoria) AS idpersonatendi FROM tbl_seguimiento_sesion WHERE fechaSeguimientoSesion BETWEEN '2017-01-01' AND '2017-12-31') + (SELECT COUNT(*) AS contarproyecto FROM tbl_intervenciones WHERE isdelIntervencion = 1 AND fechaIntervencion BETWEEN '2017-01-01' AND '2017-12-31') ) AS totalgene";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function talleresformativossemi($idSemillero){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS tformativos FROM tbl_talleres WHERE idSemillero=? AND tipoTaller='Talleres Formativos' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute(array($idSemillero));
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function tallerpsicosocialsemi($idSemillero){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS tpsicosocial FROM tbl_talleres WHERE idSemillero=? AND tipoTaller='Taller Psicosocial' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute(array($idSemillero));
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function salidaspedagogicassemi($idSemillero){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS salidaspe FROM tbl_talleres WHERE idSemillero=? AND tipoTaller='Salidas Pedagógicas' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute(array($idSemillero));
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function vacacionesrecreativas($idSemillero){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS vacaciones FROM tbl_talleres WHERE idSemillero=? AND tipoTaller='Vacaciones recreativas' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute(array($idSemillero));
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function encuentropadres($idSemillero){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS padres FROM tbl_talleres WHERE idSemillero=? AND tipoTaller='Encuentro de Padres' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute(array($idSemillero));
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function Campamento($idSemillero){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS Campamento FROM tbl_talleres WHERE idSemillero=? AND tipoTaller='Campamento' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute(array($idSemillero));
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function Muestra($idSemillero){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS Muestra FROM tbl_talleres WHERE idSemillero=? AND tipoTaller='Muestra' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute(array($idSemillero));
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function Cierre($idSemillero){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS Cierre FROM tbl_talleres WHERE idSemillero=? AND tipoTaller='Cierre' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute(array($idSemillero));
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function Actividades_espe($idSemillero){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS actiespe FROM tbl_talleres WHERE idSemillero=? AND tipoTaller='Actividades Especiales' AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute(array($idSemillero));
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function totaltallersemi($idSemillero){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT COUNT(*) AS totaltalleresse FROM tbl_talleres WHERE idSemillero=? AND fechaTaller BETWEEN '2017-01-01' AND '2017-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute(array($idSemillero));
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }


    //-------------------------------------------------------datos 2016-----------------------------------//


    function totaltalleres2016(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS totalgeneral FROM tbl_talleres WHERE fechaTaller BETWEEN '2016-01-01' AND '2016-12-31'";
        $query=$conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function talleresformativos2016(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS tformativos FROM tbl_talleres WHERE tipoTaller='Talleres Formativos' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function tallerpsicosocial2016(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS tpsicosocial FROM tbl_talleres WHERE tipoTaller='Taller Psicosocial' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function salidaspedagogicastotal2016(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS salidaspe FROM tbl_talleres WHERE tipoTaller='Salidas Pedagógicas' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function vacacionesrecreativasto2016(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS vacaciones FROM tbl_talleres WHERE tipoTaller='Vacaciones recreativas' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function encuentropadrestot2016(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS padres FROM tbl_talleres WHERE tipoTaller='Encuentro de Padres' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function Campamentotal2016(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS Campamento FROM tbl_talleres WHERE tipoTaller='Campamento' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function Muestratotal2016(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS Muestra FROM tbl_talleres WHERE tipoTaller='Muestra' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function Cierretotal2016(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS Cierre FROM tbl_talleres WHERE tipoTaller='Cierre' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function Actividades_es2016(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS actiespe FROM tbl_talleres WHERE  tipoTaller='Actividades Especiales' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function atencionespsico2016(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT COUNT(idSeguimiento) AS idseguimiento FROM tbl_seguimiento_sesion WHERE fechaSeguimientoSesion BETWEEN '2016-01-01' AND '2016-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function seguimientoexterno2016(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT COUNT(idSeguimientoExterno) AS idseguimientoex FROM tbl_seguimiento_sesion_externos WHERE fechaSeguimientoSesion BETWEEN '2016-01-01' AND '2016-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function personasatendidas2016(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT COUNT(DISTINCT idHistoria) AS idpersonatendi FROM tbl_seguimiento_sesion WHERE fechaSeguimientoSesion BETWEEN '2016-01-01' AND '2016-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function salidasrecreativas2016(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT COUNT(*) AS salidasrecre FROM tbl_salidas WHERE fechaSalida BETWEEN '2016-01-01' AND '2016-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function proyectos2016(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT COUNT(*) AS contarproyecto FROM tbl_intervenciones WHERE fechaIntervencion BETWEEN '2016-01-01' AND '2016-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function totalsumado2016(){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT ( (SELECT count(tipoTaller) AS tformativos FROM tbl_talleres WHERE tipoTaller='Talleres Formativos' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31') + (SELECT count(tipoTaller) AS tpsicosocial FROM tbl_talleres WHERE tipoTaller='Taller Psicosocial' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31') + (SELECT count(tipoTaller) AS salidaspe FROM tbl_talleres WHERE tipoTaller='Salidas Pedagógicas' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31') + (SELECT count(tipoTaller) AS vacaciones FROM tbl_talleres WHERE tipoTaller='Vacaciones recreativas' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31') + (SELECT count(tipoTaller) AS padres FROM tbl_talleres WHERE tipoTaller='Encuentro de Padres' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31') + (SELECT count(tipoTaller) AS Campamento FROM tbl_talleres WHERE tipoTaller='Campamento' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31') + (SELECT count(tipoTaller) AS Muestra FROM tbl_talleres WHERE tipoTaller='Muestra' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31') + (SELECT count(tipoTaller) AS Cierre FROM tbl_talleres WHERE tipoTaller='Cierre' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31') + (SELECT count(tipoTaller) AS actiespe FROM tbl_talleres WHERE  tipoTaller='Actividades Especiales' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31') + (SELECT COUNT(idSeguimiento) AS idseguimiento FROM tbl_seguimiento_sesion WHERE fechaSeguimientoSesion BETWEEN '2016-01-01' AND '2016-12-31') + (SELECT COUNT(idSeguimientoExterno) AS idseguimientoex FROM tbl_seguimiento_sesion_externos WHERE fechaSeguimientoSesion BETWEEN '2016-01-01' AND '2016-12-31') + (SELECT COUNT(DISTINCT idHistoria) AS idpersonatendi FROM tbl_seguimiento_sesion WHERE fechaSeguimientoSesion BETWEEN '2016-01-01' AND '2016-12-31') + (SELECT COUNT(*) AS salidasrecre FROM tbl_salidas WHERE fechaSalida BETWEEN '2016-01-01' AND '2016-12-31') + (SELECT COUNT(*) AS contarproyecto FROM tbl_intervenciones WHERE fechaIntervencion BETWEEN '2016-01-01' AND '2016-12-31') ) AS totalgene";
        $query = $conexion->prepare($consulta);
        $query->execute();
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function talleresformativossemi2016($idSemillero){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS tformativos FROM tbl_talleres WHERE idSemillero=? AND tipoTaller='Talleres Formativos' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute(array($idSemillero));
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function tallerpsicosocialsemi2016($idSemillero){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS tpsicosocial FROM tbl_talleres WHERE idSemillero=? AND tipoTaller='Taller Psicosocial' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute(array($idSemillero));
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function salidaspedagogicassemi2016($idSemillero){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS salidaspe FROM tbl_talleres WHERE idSemillero=? AND tipoTaller='Salidas Pedagógicas' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute(array($idSemillero));
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function vacacionesrecreativas2016($idSemillero){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS vacaciones FROM tbl_talleres WHERE idSemillero=? AND tipoTaller='Vacaciones recreativas' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute(array($idSemillero));
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function encuentropadres2016($idSemillero){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS padres FROM tbl_talleres WHERE idSemillero=? AND tipoTaller='Encuentro de Padres' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute(array($idSemillero));
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function Campamento2016($idSemillero){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS Campamento FROM tbl_talleres WHERE idSemillero=? AND tipoTaller='Campamento' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute(array($idSemillero));
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function Muestra2016($idSemillero){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS Muestra FROM tbl_talleres WHERE idSemillero=? AND tipoTaller='Muestra' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute(array($idSemillero));
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function Cierre2016($idSemillero){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS Cierre FROM tbl_talleres WHERE idSemillero=? AND tipoTaller='Cierre' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute(array($idSemillero));
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function Actividades_espe2016($idSemillero){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT count(tipoTaller) AS actiespe FROM tbl_talleres WHERE idSemillero=? AND tipoTaller='Actividades Especiales' AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute(array($idSemillero));
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

    function totaltallersemi2016($idSemillero){
        $conexion=fundacionconconcreto::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT COUNT(*) AS totaltalleresse FROM tbl_talleres WHERE idSemillero=? AND fechaTaller BETWEEN '2016-01-01' AND '2016-12-31'";
        $query = $conexion->prepare($consulta);
        $query->execute(array($idSemillero));
        $results = $query->fetchALL(PDO::FETCH_BOTH);
        fundacionconconcreto::Disconnect();
        return $results;
    }

}

?>