<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["perfil"] != "Administrador") {
echo '<meta http-equiv="refresh" content="0;url=index.php" />';
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="shorcut icon type=" href="../favicon.png"/>
		<title>Fundación | Administrador</title>
		<!-- Referencias js,css -->
		<?php include_once '../includes/head.php'; ?>
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
	</head>
	<body>
		<div class="container-fluid content-wrapper">
			<br>
			<br>
			<!--.Logo Bar & Login-->
			<div class="row-fluid">
				<div class="logobar">
					<div class="logo pull-left">
						<a href="#" title="Sistema de Gestión | Fundación Conconcreto"><img src="../img/fundacion_logo.png" style="width: 290px;"></a>
					</div>
					<br>
					<h1 align="center">Presupuesto</h1>
				</div>
			</div>
			<br>
			<br>
			<!--.Navigation Bar -->
			<?php include_once 'menu.php'; ?>
			<!--/.Navigation Bar-->
			<!-- CONTENIDO PRINCIPAL -->
			<div class="row-fluid">
				<div class="breadcrumb">
					<div class="tab-content">
						<div id="listadoPresupuesto">
							<br>
							<div class="control-group">
								<div id="demo" class="collapse in" style="border: solid 1px; font: normal 12px 'Arial','Verdana', 'serif', 'sans-serif', 'monospace' !important;">
									<div class="tabable tabs-left">
										<div class="tab-content">
											<div class="table-responsive">
												<table class="table table-striped table-hover table-bordered table-condensed" id="tblRol">
													<thead>
														<tr>
															<th class="text-center" style="padding-right: 10px; color: #000; width:20px">Id</th>
															<th class="text-center" style="padding-right: 10px; color: #000; width:20px">Numero</th>
															<th class="text-center" style="padding-right: 10px; color: #000; width:20px">Rubro</th>
															<th class="text-center" style="padding-right: 10px; color: #000; width:250px">Descripcion</th>
															<th class="text-center" style="padding-right: 10px; color: #000; width:100px">Tiempo de Proyecto</th>
														</tr>
														</thead>
													<tbody id="index_ajax">
													 <?php
													 include '../Model/libPresupuestoForm.php';
													 $presupuesto = new libPresupuestoForm();
													 $presupuesto->consultarPresupuesto();
													 ?>
													</tbody>
												</table>
												<th><img src="../img/agregar.png" id="imgModal" data-toggle="modal" data-target="#myModal"></th>
												<a href="presupuestopdf.php"><button type="button" class="btn btn-primary">Exportar a PDF</button></a>
											</div>
										</div>
									</div>
								</div>
		<!-- Referencias js -->
		<?php include_once '../includes/endBody.php'; ?>
		<!-- Control de recargas de las tablas, siempre debe ir de ultima en las referencias js -->
		<script src="../js/fnSetFilteringDelay.js" type="text/javascript"></script>
		<script src="../js/presupuesto.js" type="text/javascript"></script>
		<input id="PUBLIC_PATH" name="PUBLIC_PATH" type="hidden" value="/">
	</body>
</html>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Formulario de Presupuesto</h4>
        </div>
        <div class="modal-body">
          <?php include_once '../Formularios/frmPresupuesto.php'; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
        </div>
      </div>
      
    </div>
  </div>
</div>