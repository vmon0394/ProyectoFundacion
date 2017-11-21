<?php

//for ($i=69;$i<=90;$i++) {
//  echo chr($i);                 
//}

$Cantidad_de_columnas_a_crear=34; 
$Contador=0; 
$Letra='E'; 
while($Contador<$Cantidad_de_columnas_a_crear) 
{ 
    echo    $Letra. "  "; 
    $Contador++; 
    $Letra++; 
} 