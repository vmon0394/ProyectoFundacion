<?php

session_start();

if (isset($_FILES["file"]))
{
    $file = $_FILES["file"];
    $nombre = $file["name"];
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    $size = $file["size"];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../Controller/imagenes/";
    
    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
        echo "<font color='red'>error, el archivo no es una imagen</font>";
    }
    else if ($size > 1424 * 1424)
    {
        echo "<font color='red'>error, el tamaño maximo debe ser 1,24MB</font>";
    }
    else if($width > 500 && $width < 60 && $height > 500 && $height < 60 )
    {
        echo "<font color='red'>error, el ancho y alto de la imagen debe ser inferior a 500px y mayor a 60px</font>";
    }
    else {
        $src = $carpeta.$nombre;
        move_uploaded_file($ruta_provisional, $src);
        echo "<img width='100' height='100' src='$src'/>";
    }
}



