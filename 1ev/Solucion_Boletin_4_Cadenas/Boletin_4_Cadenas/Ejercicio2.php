<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-type" >
<title>Ejercicio 2 Unidad 2</title>
</head>
<body>

	<?php
$cadena = "        fgfgf    fgfgfgf";
// Quitamos los posibles espacios anteriores y posteriores
$cadena = trim($cadena);
//Quitamos espacios entre palabras
$cadena = trim(preg_replace('/ +/', ' ', $cadena));
if ($cadena != "") { // Comprobamos si la cadena esta vacia
    $array = explode(" ", $cadena);

if (count($array) >= 2) { // Comprobamos que al menos hay dos palabras
    echo "Frase correcta<br>";
    echo "\"$array[0]\"<br>";
    echo "\"$array[1]\"<br><br>";
} else {
    echo "Frase demasiado corta: \"$cadena\"<br><br>";
}}
else {
        echo "Frase en blanco: \"$cadena\"<br><br>";
    }

?>

</body>
</html>
