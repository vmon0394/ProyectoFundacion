<?php
	include_once '../Model/db.conn.php';

	class semillerosgeneral{

		function totalsemi(){
		$conexion = fundacionconconcreto::Connect();
        	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        	$sql = "SELECT tbl_semilleros.idSemillero,tbl_semilleros.nombreSemillero,tbl_categorias.nombreCategoria,tbl_zonas.nombreZona FROM tbl_semilleros INNER JOIN tbl_categorias ON
                (tbl_semilleros.idCategoria = tbl_categorias.idCategoria) INNER JOIN tbl_zonas ON(tbl_semilleros.idZona = tbl_zonas.idZona) 
                WHERE isdelSemillero = 1
        	ORDER BY nombreSemillero";
        	$query = $conexion->prepare($sql);
        	$query->execute();
        
        	$results = $query->fetchALL(PDO::FETCH_BOTH);
        	fundacionconconcreto::Disconnect();
        	return $results;
		}

                function totalsemieli(){
                $conexion = fundacionconconcreto::Connect();
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT tbl_semilleros.idSemillero,tbl_semilleros.nombreSemillero,tbl_categorias.nombreCategoria,tbl_zonas.nombreZona FROM tbl_semilleros INNER JOIN tbl_categorias ON
                (tbl_semilleros.idCategoria = tbl_categorias.idCategoria) INNER JOIN tbl_zonas ON(tbl_semilleros.idZona = tbl_zonas.idZona) 
                WHERE isdelSemillero = 0
                ORDER BY nombreSemillero";
                $query = $conexion->prepare($sql);
                $query->execute();
        
                $results = $query->fetchALL(PDO::FETCH_BOTH);
                fundacionconconcreto::Disconnect();
                return $results;
                }

                function semillerosto($idsemillero){
                $conexion = fundacionconconcreto::Connect();
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM tbl_semilleros WHERE idSemillero = ?";
                $query = $conexion->prepare($sql);
                $query->execute(array($idsemillero));
        
                $results = $query->fetch(PDO::FETCH_BOTH);
                fundacionconconcreto::Disconnect();
                return $results;
                }

                function idprofesores($idSemillero){
                $conexion = fundacionconconcreto::Connect();
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT DISTINCT tbl_personal_empleados.nombresEmp ,tbl_personal_empleados.apellidosEmp FROM tbl_personal_empleados INNER JOIN tbl_historial_facilitador ON (tbl_personal_empleados.idEmpleado = tbl_historial_facilitador.idProfesor) INNER JOIN tbl_semilleros ON 
                (tbl_semilleros.idProfesor = tbl_historial_facilitador.idProfesor) WHERE tbl_semilleros.idSemillero = ?
                ORDER BY nombresEmp";
                $query = $conexion->prepare($sql);
                $query->execute(array($idSemillero));
        
                $results = $query->fetchALL(PDO::FETCH_BOTH);
                fundacionconconcreto::Disconnect();
                return $results;
                }

                function idpsicologos($idSemillero){
                $conexion = fundacionconconcreto::Connect();
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT DISTINCT tbl_personal_empleados.nombresEmp ,tbl_personal_empleados.apellidosEmp FROM tbl_personal_empleados INNER JOIN tbl_historial_psicologo ON (tbl_personal_empleados.idEmpleado = tbl_historial_psicologo.idPsicologo) INNER JOIN tbl_semilleros ON 
                (tbl_semilleros.idPsicologo = tbl_historial_psicologo.idPsicologo) WHERE tbl_semilleros.idSemillero = ?
                ORDER BY nombresEmp";
                $query = $conexion->prepare($sql);
                $query->execute(array($idSemillero));
        
                $results = $query->fetchALL(PDO::FETCH_BOTH);
                fundacionconconcreto::Disconnect();
                return $results;
                }

                function contarninosnuevos(){
                $conexion = fundacionconconcreto::Connect();
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT COUNT(*) AS totalninos FROM tbl_ficha_sociofamiliar INNER JOIN tbl_semilleros ON (tbl_semilleros.idSemillero = tbl_ficha_sociofamiliar.idSemillero) WHERE tbl_semilleros.idCategoria < '10' AND edad < 18 AND anoDeIngreso BETWEEN '2017-01-01' AND '2017-12-31'";
                $query = $conexion->prepare($sql);
                $query->execute();
        
                $results = $query->fetchALL(PDO::FETCH_BOTH);
                fundacionconconcreto::Disconnect();
                return $results;
                }

                function contaradultosnuevos(){
                $conexion = fundacionconconcreto::Connect();
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT COUNT(*) AS totaladultos FROM tbl_ficha_sociofamiliar INNER JOIN tbl_semilleros ON (tbl_semilleros.idSemillero = tbl_ficha_sociofamiliar.idSemillero) WHERE tbl_semilleros.idCategoria < '10' AND edad > 18 AND anoDeIngreso BETWEEN '2017-01-01' AND '2017-12-31'";
                $query = $conexion->prepare($sql);
                $query->execute();
        
                $results = $query->fetchALL(PDO::FETCH_BOTH);
                fundacionconconcreto::Disconnect();
                return $results;
                }
                //Lleva los registros por año
                function contarpersonasporano(){
                $conexion = fundacionconconcreto::Connect();
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT COUNT(*) AS cuentaper FROM tbl_ficha_sociofamiliar
                        INNER JOIN tbl_semilleros ON (tbl_semilleros.idSemillero = tbl_ficha_sociofamiliar.idSemillero) 
                        WHERE tbl_semilleros.idCategoria < '10' AND anoDeIngreso LIKE'2008%' UNION 
                        SELECT COUNT(*) AS cuentapers FROM tbl_ficha_sociofamiliar 
                        INNER JOIN tbl_semilleros ON (tbl_semilleros.idSemillero = tbl_ficha_sociofamiliar.idSemillero) 
                        WHERE tbl_semilleros.idCategoria < '10' AND anoDeIngreso LIKE '2009%'UNION 
                        SELECT COUNT(*) AS cuentaperso FROM tbl_ficha_sociofamiliar 
                        INNER JOIN tbl_semilleros ON (tbl_semilleros.idSemillero = tbl_ficha_sociofamiliar.idSemillero) 
                        WHERE tbl_semilleros.idCategoria < '10' AND anoDeIngreso LIKE '2010%' UNION 
                        SELECT COUNT(*) AS cuentaper FROM tbl_ficha_sociofamiliar 
                        INNER JOIN tbl_semilleros ON (tbl_semilleros.idSemillero = tbl_ficha_sociofamiliar.idSemillero) 
                        WHERE tbl_semilleros.idCategoria < '10' AND anoDeIngreso LIKE '2011%' UNION 
                        SELECT COUNT(*) AS cuentaper FROM tbl_ficha_sociofamiliar 
                        INNER JOIN tbl_semilleros ON (tbl_semilleros.idSemillero = tbl_ficha_sociofamiliar.idSemillero) 
                        WHERE tbl_semilleros.idCategoria < '10' AND anoDeIngreso LIKE '2012%' UNION 
                        SELECT COUNT(*) AS cuentaper FROM tbl_ficha_sociofamiliar 
                        INNER JOIN tbl_semilleros ON (tbl_semilleros.idSemillero = tbl_ficha_sociofamiliar.idSemillero) 
                        WHERE tbl_semilleros.idCategoria < '10' AND anoDeIngreso LIKE '2013%' UNION 
                        SELECT COUNT(*) AS cuentaper FROM tbl_ficha_sociofamiliar 
                        INNER JOIN tbl_semilleros ON (tbl_semilleros.idSemillero = tbl_ficha_sociofamiliar.idSemillero) 
                        WHERE tbl_semilleros.idCategoria < '10' AND anoDeIngreso LIKE '2014%' UNION 
                        SELECT COUNT(*) AS cuentaper FROM tbl_ficha_sociofamiliar 
                        INNER JOIN tbl_semilleros ON (tbl_semilleros.idSemillero = tbl_ficha_sociofamiliar.idSemillero) 
                        WHERE tbl_semilleros.idCategoria < '10' AND anoDeIngreso LIKE '2015%' UNION
                        SELECT COUNT(*) AS cuentaper FROM tbl_ficha_sociofamiliar 
                        INNER JOIN tbl_semilleros ON (tbl_semilleros.idSemillero = tbl_ficha_sociofamiliar.idSemillero) 
                        WHERE tbl_semilleros.idCategoria < '10' AND anoDeIngreso LIKE'2016%' UNION 
                        SELECT COUNT(*) AS cuentapers FROM tbl_ficha_sociofamiliar 
                        INNER JOIN tbl_semilleros ON (tbl_semilleros.idSemillero = tbl_ficha_sociofamiliar.idSemillero) 
                        WHERE tbl_semilleros.idCategoria < '10' AND anoDeIngreso LIKE '2017%' ";
                $query = $conexion->prepare($sql);
                $query->execute();
        
                $results = $query->fetchALL(PDO::FETCH_BOTH);
                fundacionconconcreto::Disconnect();
                return $results;
                }
                
                
	}

?>
