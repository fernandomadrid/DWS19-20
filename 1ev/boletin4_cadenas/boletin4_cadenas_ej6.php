<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Ejercicio 4</title>
</head>

<body>
<?php
$frase = "El abecedario  completo es algo largo y detallarlo exhaustivamente es costoso";
echo $frase."<br><br>";
//Quitamos espacios entre palabras
$frase = trim(preg_replace('/ +/', ' ', $frase));
$palabras=explode(' ', $frase);

foreach ($palabras as $value){
    echo $value."<br>";
}


?>
</body>

</html>
