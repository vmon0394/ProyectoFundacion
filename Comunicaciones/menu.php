<?php
if (!isset($_SESSION["usuario"]) || $_SESSION["perfil"] != "Comunicaciones") {
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-th-list icon-white"></i> Tablas Maestras<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu"> 
                            <li><a href="semilleros.php"><i class="icon-folder-open icon-white"></i> Semilleros</a></li>
                            <li><a href="tecnicas.php"><i class="icon-folder-open icon-white"></i> Técnicas</a></li>
                            <li><a href="padrinos.php"><i class="icon-folder-open icon-white"></i> Padrinos</a></li>
                            <li><a href="asignacionPadrinos.php"><i class="icon-folder-open icon-white"></i> Asignación Padrinos</a></li>
                            <li class="divider"></li>
                            <li><a href="salidas.php"><i class="icon-folder-open icon-white"></i> Salidas Comunitarias</a></li>  
                            <li><a href="fichaSocioFamiliar.php"><i class="icon-folder-open icon-white"></i> Ficha Semilleros</a></li>
                            <li><a href="formatos.php"><i class="icon-folder-open icon-white"></i> Formatos Fundación</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="adminEducame.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-th-list icon-white"></i> Consultas<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu"> 
                            <li><a href="fichasParticipantes.php"><i class="icon-list-alt icon-white"></i> Fichas Participantes</a></li>
                            <li><a href="reporteGeneralSemilleros.php"><i class="icon-list-alt icon-white"></i> Reportes Semilleros</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="adminEducame.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-th-list icon-white"></i> Estadísticas<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu"> 
                            <?php
                            include_once '../Model/libCombos.php';
                            $combo = new libCombos();
                            $combo->comboEstadisticasMenuGeneral();
                            echo $combo->getResult();
                            ?>
                            <li class="divider"></li>
                        </ul>
                    </li>
                    <li><a href="organizaciones.php">Organizaciones</a></li>
                </ul>
                <ul class="nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-user icon-white"></i> <?php echo $_SESSION['nombres']; ?><span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="modiUsuario.php"><i class="icon-user icon-white"></i> Modificar Usuario</a></li>
                            <li><a href="../Model/logout.php"><i class="icon-off icon-white"></i> Salir</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
