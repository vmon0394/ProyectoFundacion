<?php
	$total = count($_FILES['Imagen_Upload']['name']);

	$directorio = "../Archivos/Servicio_Documentos/".$nombre_documento."/";

	if (!file_exists($directorio)){
 		echo "El archivo no existe";
  		mkdir($directorio, 0777, true);
	}

	for($i=0; $i<$total; $i++){
		$archivo     = $directorio.basename(str_replace(" ", "",$_FILES["Imagen_Upload"]["name"][$i]));
  		$uploadOk    = 0;
  		$extension_archivo = pathinfo($archivo,PATHINFO_EXTENSION);

  		$check = getimagesize($_FILES["Imagen_Upload"]["tmp_name"][$i]);
      if($check !== false) {
          echo "El archivo si es un Documento<br>";
          $uploadOk = 1;
      }else{
          echo "El archivo no es un Documento<br>";
          $uploadOk = 0;
      }


  	if($_FILES["Imagen_Upload"]["size"][$i] > 4100000){
    echo "Ooops! tu Documento no puede superar mas de 400Kb  <br>";
    $uploadOk = 0;
  		}

  	if($extension_archivo != "jpg" && $extension_archivo != "png" && $extension_archivo != "jpeg" && $extension_archivo != "gif") {
      echo "El archivo no tiene un formato valido de Documento  <br>";
      $uploadOk = 0;
  		}

  	if(file_exists($archivo)){
    echo "Lo siento, el archivo ya existe en nuestra aplicación!  <br>";
    $uploadOk = 0;
  		}
 
  	if($uploadOk == 1){
      if (move_uploaded_file($_FILES["Imagen_Upload"]["tmp_name"][$i], $archivo)) {
          echo "El archivo ". basename( $_FILES["Imagen_Upload"]["name"][$i]). " Se subio correctamente.  <br>";
      } else {
          echo "Oops! ha ocurrido un error.  <br>";
      }
  	} else {
    	echo "Lo sentimos su archivo no se puede subir.  <br>";
  		}
	}
?>