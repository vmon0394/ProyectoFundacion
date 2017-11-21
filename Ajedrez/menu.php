<?php if (!isset($_SESSION["usuario"]) || ($_SESSION["perfil"] != "Ajedrez")) {
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
                            <li><a href="actividadesLaboratorio.php"><i class="icon-folder-open icon-white"></i> Actividades</a></li>
                            <li><a href="usuariosLaboratorio.php"><i class="icon-folder-open icon-white"></i> participantes</a></li>
                            <li class="divider"></li> 
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-th-list icon-white"></i> Consultas<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu"> 
                            <li><a href="evidenciasActividades.php"><i class="icon-list-alt icon-white"></i> Evidecia actividades </a></li>
                            <li><a href="servicios.php"><i class="icon-list-alt icon-white"></i> Servicios</a></li>
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
