<?php
if (!isset($_SESSION["usuario"]) || $_SESSION["perfil"] != "Administrador") {
    echo '<meta http-equiv="refresh" content="0;url=index.php" />';
}
?>
<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>

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

                            <li><a href="usuarios.php"><i class="icon-folder-open icon-white"></i> Administradores</a></li>
                            <li><a href="aliados.php"><i class="icon-folder-open icon-white"></i> Aliados</a></li>
                            <li><a href="tecnicas.php"><i class="icon-folder-open icon-white"></i> Técnicas</a></li>
                            <li><a href="zonas.php"><i class="icon-folder-open icon-white"></i> Zonas</a></li>
                            <li><a href="semillerosAdmin.php"><i class="icon-folder-open icon-white"></i> Semilleros</a></li>
                            <li class="dropdown-submenu">
                                <a class="test" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-th-list icon-white"></i>Proyectos <span class="caret"></span></a>
                                <ul class="dropdown-submenu " role="menu" style="Display:none;">
                                    <li style="list-style:none;"><a href="proyectos.php"><i class="icon-folder-open icon-white"></i>Agregar Proyecto</a></li>
                                    <li style="list-style:none;"><a href="semillerosAdmin.php"><i class="icon-folder-open icon-white"></i> DEHUSO</a></li>
                                    <li style="list-style:none;"><a href=""><i class="icon-folder-open icon-white" ></i> AMIGOS METRO</a></li>
                                </ul>
                            </li>

                              <?php if ($_SESSION['usuario'] == "jramirez" || $_SESSION['usuario'] == "mbaron" || $_SESSION['usuario'] == "carango" || $_SESSION['usuario'] == "chernandezh" || $_SESSION['usuario'] == "vmontoya123456") { ?>
                            <li><a href="usuariosLaboratorio.php"><i class="icon-folder-open icon-white"></i> Laboratorio Ludico</a></li>
                            <?php } ?>
                            <li class="divider"></li>
                            <li><a href="formatos.php"><i class="icon-folder-open icon-white"></i> Formatos Fundación</a></li>
                            <li><a href="fichaSocioFamiliar.php"><i class="icon-folder-open icon-white"></i> Ficha Sociofamiliar</a></li>
                            <li><a href="documentos.php"><i class="icon-folder-open icon-white"></i> Documentos Teóricos</a></li>
                            <li><a href="importarFichas.php"><i class="icon-folder-open icon-white"></i> Importar Fichas</a></li>
                            <li class="divider"></li>
                            <li><a href="proyectosCC.php"><i class="icon-folder-open icon-white"></i> Proyectos C.C. </a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-th-list icon-white"></i> Formacion Semilleros<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu"> 
                            <li><a href="semilleros.php"><i class="icon-folder-open icon-white"></i> Planeacion</a></li>
                            <li><a href="tecnicas.php"><i class="icon-folder-open icon-white"></i> Técnicas</a></li>
                            <li><a href="comunitarias.php"><i class="icon-folder-open icon-white"></i> Actividades Comunitarias</a></li> 
                            <li><a href="habilidometro.php"><i class="icon-folder-open icon-white"></i> Habilidómetro</a></li>
                            <li><a href="salidas.php"><i class="icon-folder-open icon-white"></i>Campamentos</a></li>                 
                            <li class="divider"></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-th-list icon-white"></i> Comunicaciones<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu"> 
                            <li><a href="padrinos.php"><i class="icon-folder-open icon-white"></i> Padrinos</a></li>
                            <li><a href="asignacionPadrinos.php"><i class="icon-folder-open icon-white"></i> Asignación Padrinos</a></li>
                            <li class="divider"></li>
                            <li><a href="organizaciones.php"><i class="icon-folder-open icon-white"></i>Organizaciones</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-th-list icon-white"></i> Consultas<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="estadisticasgeneraladmin.php"><i class="icon-list-alt icon-white"></i> Estadisticas General</a></li>
                            <li><a href="reporteTalleres.php"><i class="icon-folder-open icon-white"></i> Estadistica de Talleres</a></li> 
                            <li><a href="reporteGeneralSemilleros.php"><i class="icon-list-alt icon-white"></i> Reportes Semilleros</a></li>
                            <li><a href="historialTalleres.php"><i class="icon-list-alt icon-white"></i> Historial Talleres</a></li>
                            <li><a href="presupuestos.php"><i class="icon-list-alt icon-white"></i>Presupuesto</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
<!--                    <li class="dropdown">
                        <a href="adminEducame.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-th-list icon-white"></i> Control Asistencias<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu"> 
                            <?php
//                            include_once '../Model/libCombos.php';
//                            $combo = new libCombos();
//                            $combo->comboSemillerosMenuGeneral();
//                            echo $combo->getResult();
                            ?>
                            <li class="divider"></li>
                        </ul>
                    </li>-->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-th-list icon-white"></i> Estadísticas<span class="caret"></span></a>
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
