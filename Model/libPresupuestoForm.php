<?php 

class libPresupuestoForm {

	private $idPresupuestoF;
    private $Id;
	private $Rubro;
	private $Descripcion;
	private $Tiempo;
    private $result;
	
	function __construct()
	{
		$this->idPresupuestoF = "";
        $this->id = "";
		$this->rubro = "";
		$this->descripcion = "";
		$this->tiempo = "";
        $this->result = "";


		include_once 'conexion.php';
		$this->link = new Conexion();

	}

    function getIdPresupuestoF()
    {
        return $this->idPresupuestoF;
    }

	function getId() {
		return $this->Id;
	}

	function getRubro() {
		return $this->Rubro;
	}

	function getDescripcion() {
		return $this->Descripcion;
	}

	function getTiempo() {
		return $this->Tiempo;
	}

    function getResult() {
        return $this->result;
    }

    function setIdPresupuestoF($idPresupuestoF) {
        $this->idPresupuestoF = $idPresupuestoF;
    }

	function setId($Id) {
		$this->id = $Id;
	}

	function setRubro($Rubro) {
		$this->rubro = $Rubro;
	}

	function setDescripcion($Descripcion) {
		$this->descripcion = $Descripcion;
	}

	function setTiempo($Tiempo) {
		$this->tiempo = $Tiempo;
	}

    function setResult($result) {
        $this->result = $result;
    }


	function registrarPresupuesto() {

		$resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
            } else {

                $idPresupuestoF = "";

                $sql = "INSERT INTO `tbl_presupuestoForm`(`id`,`rubro`,`descripcion`,`tiempo`)"."VALUES('$this->id','$this->rubro','$this->descripcion','$this->tiempo');";
                $rs = $conexion->query($sql);

                if ($rs > 0) {

                    $this->respuesta = "all";
                    $this->mensaje = "El registro se realizó con éxito.";
                    $resp = TRUE;

                    $this->respuesta = "fail";
                } else {
                    $this->mensaje = "El registro no se pudo realizar por una falla en la solicitud.";
                    $resp = TRUE;
                }
                $this->link->desconectar();
            }
        }

        function consultarPresupuesto() {

            $conexion = $this->link->conectar();

            $sql = mysqli_query($conexion ,"SELECT * FROM `tbl_presupuestoForm`");

            if(mysqli_num_rows($sql)>0) {

                while ($resultado = mysqli_fetch_array($sql)) {
                    echo '<tr>
                    <td>'.$resultado['idPresupuestoF'].'</td>
                    <td>'.$resultado['id'].'</td>
                    <td>'.$resultado['rubro'].'</td>
                    <td>'.$resultado['descripcion'].'</td>
                    <td>'.$resultado['tiempo'].'</td>';

                    }
                }else{
                    echo '<tr><td colspan="5"><center>No se encontraron registros</center></td></tr>';
        }
    }
}
?>