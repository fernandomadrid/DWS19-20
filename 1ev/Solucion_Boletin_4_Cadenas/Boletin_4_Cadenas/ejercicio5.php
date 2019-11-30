<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-type">
<title>Ejercicio 5 Unidad 2</title>
</head>
<body>
		<?php
$cadena = "<b>EÑl abecedañrio completo es algo largo y detallarlo exhaustivamente es costoso.</b>";
$cadena1 = mb_strtolower($cadena);

$cadena2 = str_replace("ñ", "*", $cadena1);

echo $cadena2;
?>
	</body>
</html>