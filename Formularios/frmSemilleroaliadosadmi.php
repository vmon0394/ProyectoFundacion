<div class="twoColumns">
	<div class="control-group">
		<div class="controls">
			 <?php
                include_once '../Model/libSemilleros.php';
                $semilleros = new libSemilleros();
                $semilleros->aliadossemillerosadmi();
                echo  $semilleros->getResult();
			?>
		</div>
	</div>
</div>