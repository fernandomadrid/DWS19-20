<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-type">
    <title>Ejercicio Fechas</title>
</head>

<body>

    <?php
    echo "Realiza una función que nos devuelva el nº de días que han pasado entre dos fechas. Hay que tener en cuenta que tendremos que validar las fechas antes o durante la función.<br>";

    $fecha1 = explode('-', '08-02-1980');
    $fecha2 = explode('-', '28-05-1986');

    if (checkdate($fecha1[1], $fecha1[0], $fecha1[2]) && checkdate($fecha2[1], $fecha2[0], $fecha2[2])) {

        diferenciaDeDias($fecha1, $fecha2);
    } else {
        echo 'Error en las fechas';
    }


    function diferenciaDeDias($f1, $f2)
    {

        $fecha1 = implode('-', $f1);
        //$fecha2=implode('-', $f2);



        $date1 = new DateTime($fecha1);

        $date2 = new DateTime(date('d-m-Y', time()));


        $diff = $date1->diff($date2);

        // will output 2 days
        echo 'Hay ' . $diff->days . ' días de diferencia entre el día ' . $fecha1 . ' y el día de hoy ' . date('d-m-Y', time());
    }

    ?>
</body>

</html>