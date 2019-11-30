<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Ejercicio 4</title>
</head>

<body>
<?php
$frase = "El abecedario completo es algo largo y detallarlo exhaustivamente es costoso";

$cadena=mb_strtolower($frase);

$cadena=str_replace('a', '*', $cadena);
echo $cadena;

?>
</body>

</html>