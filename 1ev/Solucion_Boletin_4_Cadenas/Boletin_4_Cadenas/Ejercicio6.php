<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-type" >
<title>Ejercicio 6 Unidad 2</title>
</head>
<body>
<?php 
$cadena = "El abecedario completo es algo largo y detallarlo exhaustivamente es costoso";
echo $cadena;
//Quitamos espacios entre palabras
$cadena = trim(preg_replace('/ +/', ' ', $cadena));
$array = explode(" ", $cadena);
foreach ($array as $value) {
    echo $value."<br>";
}
?>
</body>
</html>