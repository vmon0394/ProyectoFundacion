<?php
if (!isset($_SESSION["usuario"]) || $_SESSION["perfil"] != "Psicólogo") {
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
                            <li><a href="semillerosPsico.php"><i class="icon-folder-open icon-white"></i> Semilleros</a></li>
                            <li><a href="historialMedico.php"><i class="icon-folder-open icon-white"></i> Atenciones Participantes</a></li>
                            <li><a href="historialMedicoInternos.php"><i class="icon-folder-open icon-white"></i> Atenciones Personal Interno</a></li>
                            <li><a href="tecnicas.php"><i class="icon-folder-open icon-white"></i> Técnicas</a></li>
                            <li class="divider"></li>
                            <li><a href="documentos.php"><i class="icon-folder-open icon-white"></i> Documentos Teóricos</a></li>
                            <li class="divider"></li>
                            <li><a href="comunitarias.php"><i class="icon-folder-open icon-white"></i>Actividades Comunitarias</a></li>
                            <li><a href="proyectosCC.php"><i class="icon-folder-open icon-white"></i>Proyectos CC</a></li>
                            <li class="divider"></li>
                            <li><a href="habilidometro.php"><i class="icon-folder-open icon-white"></i> Habilidómetro</a></li>
                            <li><a href="habilidades.php"><i class="icon-folder-open icon-white"></i> Habilidades</a></li>
                            <li><a href="indicadores.php"><i class="icon-folder-open icon-white"></i> Indicadores</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="adminEducame.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-th-list icon-white"></i> Consultas<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu"> 
                            <li><a href="reporteGeneralSemilleros.php"><i class="icon-list-alt icon-white"></i> Reportes Semilleros</a></li>
                            <li><a href="estadisticasgeneralpsico.php"><i class="icon-list-alt icon-white"></i> Estadisticas General</a></li>
                            <li><a href="reporteTallerespsico.php"><i class="icon-list-alt icon-white"></i> Estadisticas de Taller</a></li>
                            <li><a href="presupuestos.php"><i class="icon-list-alt icon-white"></i>Presupuesto</a></li>
                            <li class="divider"></li>

                            <li><a href="ConsultaDetallesTalleres.php"><i class="icon-list-alt icon-white"></i>Detalles Talleres</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-th-list icon-white"></i> Formatos<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu"> 
                            <?php
                            include_once '../Model/libCombos.php';
                            $combo = new libCombos();
                            $combo->comboFormatos();
                            echo $combo->getResult();
                            ?>
                            <li class="divider"></li>
                        </ul>
                    </li>
<!--                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Consultas<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu"> 
                            <li><a href="#">Fichas Sociofamiliares</a></li>
                            <li><a href="#">Tecnicas</a></li>
                            <li><a href="#">Talleres</a></li>
                        </ul>
                    </li>-->
                </ul>
                <ul class="nav pull-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-retweet icon-white"></i> Perfil Psicólogo<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu"> 
                            <li><a href="../Facilitador/semilleros.php"><i class="icon-arrow-up icon-white"></i> Facilitador</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-user icon-white"></i> <?php echo $_SESSION['nombres']; ?><span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="modiUsuarioPsico.php"><i class="icon-user icon-white"></i> Modificar Usuario</a></li>
                            <li><a href="../Model/logout.php"><i class="icon-off icon-white"></i> Salir</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
