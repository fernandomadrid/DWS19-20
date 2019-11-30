<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-type">
    <title>Ejercicio Fechas</title>
</head>

<body>

    <?php
    echo "Realiza una función que reciba la fecha en formato UNIX y devuelva la fecha en formato dd-mm-aaaa y aaaa-mm-dd según un segundo argumento que le pasemos a la función.<br>";
    $fecha = time();
    $opcion = 0;
    compruebaFecha($fecha, $opcion);

    function compruebaFecha($fecha, $opcion)
    {

        if ($opcion) {

            echo date('Y-m-d', $fecha);
        } else {
            echo date('d-m-Y', $fecha);
        }
    }

    ?>
</body>

</html>S