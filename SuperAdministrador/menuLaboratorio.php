<?php
if (!isset($_SESSION["usuario"]) || $_SESSION["perfil"] != "Administrador") {
    echo '<meta http-equiv="refresh" content="0;url=index.php" />';
}
?>
<div class="navbar" id="access">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="menu nav-collapse">
                <ul class="nav">
                    <li class="dropdown">
                        <a href="adminEducame.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-th-list icon-white"></i> Tablas Maestras<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu"> 
                            <li><a href="../Administrador/usuariosLaboratorio.php"><i class="icon-folder-open icon-white"></i> Participantes</a></li>
                            <li><a href="../Administrador/servicios.php"><i class="icon-folder-open icon-white"></i> Servicios</a></li>
                            <li><a href="../Administrador/consultaUsuariosServicios.php"><i class="icon-folder-open icon-white"></i>Participantes por Servicio</a></li>
                            <li class="divider"></li>
                            <li><a href="../Administrador/valoresLaboratorio.php"><i class="icon-folder-open icon-white"></i> Valores</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="adminEducame.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-th-list icon-white"></i> Inventario<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu"> 
                            <li><a href="../Administrador/inventario.php"><i class="icon-folder-open icon-white"></i> Inventario</a></li>
                            <li><a href="../Administrador/zonas2.php"><i class="icon-folder-open icon-white"></i> Zonas</a></li>
                            <li><a href="../Administrador/consultaMaterialZona.php"><i class="icon-folder-open icon-white"></i>Materiales Zona</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="adminEducame.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-th-list icon-white"></i> Préstamos<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu"> 
                            <li><a href="../Administrador/prestamoDevolucion.php"><i class="icon-folder-open icon-white"></i> Préstamos </a></li>
                            <li><a href="historialPrestamo.php"><i class="icon-folder-open icon-white"></i> Historial </a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="adminEducame.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-th-list icon-white"></i> Actividades<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu"> 
                            <li><a href="actividadesLaboratorio.php"><i class="icon-folder-open icon-white"></i> Actividades laboratorio</a></li>
                            <li><a href="evidenciasActividades.php"><i class="icon-folder-open icon-white"></i> Evidencia actividades</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="adminEducame.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-th-list icon-white"></i> Consultas<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu"> 
                            <li><a href="reportePrestamos.php"><i class="icon-folder-open icon-white"></i> Reporte general</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav pull-right">
                    <a href="usuarios.php" class="btn btn-small" role="button" aria-expanded="false"><i class="icon-arrow-left icon-black"></i> Perfil principal</a> 
                </ul>
                
            </div>
        </div>
    </div>
</div>
