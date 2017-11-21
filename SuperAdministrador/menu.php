<?php
if (!isset($_SESSION["usuario"]) || $_SESSION["perfil"] != "SuperAdministrador") {
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
                            <li><a href="proyectos.php"><i class="icon-folder-open icon-white"></i> Proyectos</a></li>
                            <li><a href="aliados.php"><i class="icon-folder-open icon-white"></i> Aliados</a></li>
                            <li><a href="zonas.php"><i class="icon-folder-open icon-white"></i> Zonas</a></li>
                            <li><a href="usuarios.php"><i class="icon-folder-open icon-white"></i> Usuarios</a></li>
                            <!--<li><a href="categorias.php"><i class="icon-folder-open icon-white"></i> Categorías</a></li>-->
                            <li><a href="semillerosAdmin.php"><i class="icon-folder-open icon-white"></i> Semilleros</a></li>
                            <li><a href="tecnicas.php"><i class="icon-folder-open icon-white"></i> Técnicas</a></li>
                            <li><a href="importarFichas.php"><i class="icon-folder-open icon-white"></i> Importar Fichas</a></li>
                            <li class="divider"></li>
                            <li><a href="formatos.php"><i class="icon-folder-open icon-white"></i> Formatos Fundación</a></li>
                            <li><a href="documentos.php"><i class="icon-folder-open icon-white"></i> Documentos Fundación</a></li>
                            <li><a href="presupuestos.php"><i class="icon-folder-open icon-white"></i> Presupuesto</a></li>
                            <li><a href="companias.php"><i class="icon-folder-open icon-white"></i> Compañias</a></li>
                            <li><a href="departamentos.php"><i class="icon-folder-open icon-white"></i> Departamentos</a></li>
                            <li><a href="municipios.php"><i class="icon-folder-open icon-white"></i> Municipios</a></li>
                            <li><a href="valores.php"><i class="icon-folder-open icon-white"></i> Valores</a></li>
                            <li class="divider"></li>
                            <li><a href="salidas.php"><i class="icon-folder-open icon-white"></i> Salidas No Registradas</a></li>
                            <li><a href="proyectosCC.php"><i class="icon-folder-open icon-white"></i> ProyectosCC</a></li>
                            <li><a href="comunitarias.php"><i class="icon-folder-open icon-white"></i>Actividades Comunitarias</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="adminEducame.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-th-list icon-white"></i> Comunicaciones<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu"> 
                            <li><a href="padrinos.php"><i class="icon-folder-open icon-white"></i> Padrinos</a></li>
                            <li><a href="asignacionPadrinos.php"><i class="icon-folder-open icon-white"></i> Asignación Padrinos</a></li>
                            <li><a href="organizaciones.php"><i class="icon-folder-open icon-white"></i> Organizaciones</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="adminEducame.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-th-list icon-white"></i> Facilitadores<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu"> 
                            <li><a href="semilleros.php"><i class="icon-folder-open icon-white"></i> Semilleros Asignados</a></li>
                            <li><a href="demostracion.php"><i class="icon-folder-open icon-white"></i> prueba</a></li>
                            <li class="divider"></li>
                            <li><a href="fichaSocioFamiliar.php"><i class="icon-folder-open icon-white"></i> Ficha Socio Familiar</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="adminEducame.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-th-list icon-white"></i> Psicólogos<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu"> 
                            <li><a href="historialMedico.php"><i class="icon-folder-open icon-white"></i> Atenciones Participantes</a></li>
                            <li><a href="historialMedicoInternos.php"><i class="icon-folder-open icon-white"></i> Atenciones Personal Interno</a></li>
                            <li><a href="habilidometro.php"><i class="icon-folder-open icon-white"></i> Habilidómetro</a></li>
                            <li class="divider"></li>
                            <li><a href="habilidades.php"><i class="icon-folder-open icon-white"></i> Habilidades</a></li>
                            <li><a href="indicadores.php"><i class="icon-folder-open icon-white"></i> Indicadores</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li> 
                    <li class="dropdown">
                        <a href="adminEducame.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-th-list icon-white"></i> Consultas<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu"> 
                            <li><a href="fichasParticipantes.php"><i class="icon-list-alt icon-white"></i> Fichas Participantes</a></li>
                            <li><a href="reporteGeneralSemilleros.php"><i class="icon-list-alt icon-white"></i> Reportes Semilleros</a></li>
                            <li><a href="reporteTalleres.php"><i class="icon-list-alt icon-white"></i> Reportes Talleres</a></li>
                            <li><a href="ConsultaDetallesTalleres.php"><i class="icon-list-alt icon-white"></i> Detalles Talleres</a></li>
                            <li><a href="historialTalleres.php"><i class="icon-list-alt icon-white"></i> Historial Talleres</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="adminEducame.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-th-list icon-white"></i> Estadísticas<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu"> 
                            <?php
                            include_once '../Model/libCombos.php';
                            $combo = new libCombos();
                            $combo->comboEstadisticasMenuSuperAdmin();
                            echo $combo->getResult();
                            ?>
                            <li class="divider"></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-user icon-white"></i> <?php echo $_SESSION['nombres']; ?><span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="usuariosLaboratorio.php"><i class="icon-share-alt icon-white"></i> Ir a Laboratorio Ludico</a></li>
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
