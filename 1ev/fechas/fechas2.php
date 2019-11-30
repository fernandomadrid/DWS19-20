<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-type">
    <title>Ejercicio Fechas</title>
</head>

<body>

    <?php
    echo "Realiza una función que acepte una fecha como cadena con el formato aaaa-mm-dd compruebe si la fecha es correcta y nos devuelva la fecha en formato UNIX.<br>";
    $fecha = "2005-05-12";
    compruebaFecha($fecha);

    function compruebaFecha($fecha)
    {
        $arrayfecha = explode("-", $fecha);
        print_r($arrayfecha);
        if (checkdate($arrayfecha[1], $arrayfecha[2], $arrayfecha[0])) {
            echo "<h1>Fecha actual en formato UNIX: " . time() . "</h1>";
        } else {
            echo "fecha no correcta";
        }
    }

    ?>
</body>

</html>