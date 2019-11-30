<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-type" >
<title>Ejercicio 3 Unidad 2</title>
</head>
<body>
<?php
/*
3.- Realizar una página PHP en la que introduzca una frase en una variable y a continuación muestre 
el número de letras ‘a’ en esa cadena de la siguiente forma:
‘La bala mata la vaca’ 	→    muestra: 8
‘El oso osó asir a la osa’	→    muestra: 4
 */

?>

<?php

$frase = "La bala mata la vaca";


$contador=mb_substr_count($frase, "a");

echo $frase." -> muestra: ".$contador;


?>