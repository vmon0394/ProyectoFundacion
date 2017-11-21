<?php
if (!isset($_SESSION["usuario"]) || ($_SESSION["perfil"] != "Facilitador" && $_SESSION["perfil"] != "Psicólogo")) {
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
                            <li class="divider"></li> 
                            <li><a href="fichaSocioFamiliar.php"><i class="icon-folder-open icon-white"></i> Ficha Socio Familiar</a></li>
                            <li class="divider"></li> 
                            <li><a href="documentos.php"><i class="icon-folder-open icon-white"></i> Documentos Teóricos</a></li>
                            <li class="divider"></li>
                            <li><a href="comunitarias.php"><i class="icon-folder-open icon-white"></i>Actividades Comunitarias </a></li>
                            <li><a href="proyectosCC.php"><i class="icon-folder-open icon-white"></i> Proyectos C.C. </a></li>
                            <li class="divider"></li>
                            <li><a href="salidas.php"><i class="icon-folder-open icon-white"></i>Campamentos</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-th-list icon-white"></i> Consultas<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu"> 
                            <li><a href="estadisticasgeneralfaci.php"><i class="icon-list-alt icon-white"></i> Estadisticas General</a></li>
                            <li><a href="reporteTalleresfacilitador.php"><i class="icon-list-alt icon-white"></i> Estadisticas de Taller</a></li>
                            <li><a href="ConsultaDetallesTalleres.php"><i class="icon-list-alt icon-white"></i> Detalles Talleres</a></li>
                            <li><a href="reporteGeneralPorSemillero.php"><i class="icon-list-alt icon-white"></i> Reportes Semilleros</a></li>
                            <li><a href="presupuestos.php"><i class="icon-list-alt icon-white"></i>Presupuesto</a></li>
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
                    <li class="dropdown">
                        <a href="adminEducame.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-th-list icon-white"></i> Estadísticas<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu"> 
                            <?php
                            include_once '../Model/libCombos.php';
                            $combo = new libCombos();
                            $combo->comboSemillerosMenu($_SESSION["idEmpleado"]);
                            echo $combo->getResult();
                            ?>
                            <li class="divider"></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="adminEducame.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-th-list icon-white"></i> Habilidómetros<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu"> 
                            <?php
                            //Propiedad que se utiiliza para capturar el tiempo del sistema.
                            date_default_timezone_set('America/Bogota');
                            $fechaSistema = date("Y");

                            include_once '../Model/libCombos.php';
                            $combo = new libCombos();
                            $combo->setForeign($_SESSION["idEmpleado"]);
                            $combo->setAno($fechaSistema);
                            $combo->comboHabilidometrosFacilitadores();
                            echo $combo->getResult();
                            ?>
                            <li class="divider"></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav pull-right">

                    <?php if ($_SESSION["perfil"] == "Psicólogo") { ?>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-retweet icon-white"></i> Perfil Facilitador<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu"> 
                                <li><a href="../Psicologo/semillerosPsico.php"><i class="icon-arrow-up icon-white"></i> Psicólogo</a></li>
                                <li class="divider"></li>
                            </ul>
                        </li>

                    <?php } ?>

                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-user icon-white"></i> <?php echo $_SESSION['nombres']; ?><span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <?php if ($_SESSION['nombres'] == "Astrid Eliana Londoño Londoño") { ?>
                            <li><a href="usuariosLaboratorio.php"><i class="icon-share-alt icon-white"></i> Ir a Laboratorio Ludico</a></li>
                            <?php } ?>
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
