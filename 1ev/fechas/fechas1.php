<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-type">
    <title>Ejercicio Fechas</title>
</head>

<body>

    <?php
    echo "Realiza una función que acepte una fecha como cadena con el formato dd-mm-aaaa compruebe si la fecha es correcta y nos devuelva la fecha en formato UNIX.<br>";
    $fecha = date('d-m-y', time());
    compruebaFecha($fecha);

    function compruebaFecha($fecha)
    {
        $arrayfecha = explode("-", $fecha);
        print_r($arrayfecha);
        if (checkdate($arrayfecha[1], $arrayfecha[0], $arrayfecha[2])) {
            echo "<h1>Fecha actual en formato UNIX: " . time() . "</h1>";
        } else {
            echo "fecha no correcta";
        }
    }

    ?>
</body>

</html>