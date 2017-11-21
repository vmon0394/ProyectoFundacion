<?php
function consultarPresupuesto() {

        $resp;
        $conexion = $this->link->conectar();

        if (!$conexion) {
            $this->respuesta = "fail";
            $this->mensaje = $this->link->getError();
            $resp = FALSE;
        } else {

            $sql = mysql_query("SELECT * FROM `tbl_presupuestoform`", $conexion);

            while($row = mysql_fetch_array($sql)){
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['rubro']."</td>";
            echo "<td>".$row['descripcion']."</td>";
            echo "<td>".$row['tiempo']."</td>";
            echo "</tr>";
        }

        var_dump($sql);
        exit();
    }
}

?>
