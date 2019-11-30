<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Ejercicio 4</title>
</head>

<body>
<?php
$frase = "El abecedario completo es algo largo y detallarlo exhaustivamente es costoso";
$letras = array(
    "a" => mb_substr_count($frase, "a"),
    "e" => mb_substr_count($frase, "e"),
    "i" => mb_substr_count($frase, "i"),
    "o" => mb_substr_count($frase, "o"),
    "u" => mb_substr_count($frase, "u")
);

echo "$frase</br>";
foreach ($letras as $letra => $valor) {
    echo "La letra $letra esta $valor veces</br>";
}

?>
</body>

</html>