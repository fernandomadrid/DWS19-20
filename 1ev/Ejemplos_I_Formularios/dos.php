<!DOCTYPE html>
<html lang="es">
<head>
<title></title>
<meta charset="utf-8" />
</head>
<body>
<?php

/*En este ejemplo vemos el tratamiento de los datos que vienen
de controles radio y checkbox
*/
print_r($_REQUEST);
echo "<br>";
echo "Comprueba si tus datos son correctos.<br>";
echo "<br>";
echo "{$_REQUEST["nombre"]}.<br>";
echo "Nivel de internet: {$_REQUEST["nivel"]}.<br>";

if (isset($_REQUEST["basic"]) == "on") {
    echo "<br>";
    echo "Experiencia en Visual Basic";
} else {
    echo "<br> Sin experiencia previa en Visual Basic.";
}
if (isset($_REQUEST["c_cplus"]) == "on") {
    echo "<br>";
    echo "Experiencia en C/C++";
} else {
    echo "<br> Sin experiencia previa en C/C++.";
}
if (isset($_REQUEST["java"]) == "on") {
    echo "<br>";
    echo " Experiencia en Java";
} else {
    echo "<br> Sin experiencia previa en Java.<br>";
}

echo "<br>";
echo "OPINIÓN SOBRE EL CURSO:<br>";
// nl2br convierte saltos de línea en <br>
echo nl2br($_REQUEST["opinion"]); 
?>
</body>
</html>