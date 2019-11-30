<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1</title>
</head>

<body>
    <?php

    /*

 *
 * Realiza una función que acepte una fecha como cadena con el
 * formato dd-mm-aaaa compruebe si la fecha es correcta y nos
 * devuelva la fecha en formato UNIX.
 */

    //Incluimos también el array de errores
    $str = "1-2-2019";
    $errores = [];
    if ($fechaUnix = validaFechadma($str, $errores)) {
        echo "La fecha es correcta <br>";
        echo $fechaUnix;
        echo date("<p>d-m-Y", $fechaUnix);
    } else {
        echo $errores["fecha"];
    }




    function ValidaFechadma($fecha, &$errores)
    {
        $fechaArray = explode("-", $fecha);
        if ((count($fechaArray) == 3) && (checkdate($fechaArray[1], $fechaArray[0], $fechaArray[2]))) {
            $dia = $fechaArray[0];
            $mes = $fechaArray[1];
            $anio = $fechaArray[2];

            return mktime(0, 0, 0, $fechaArray[1], $fechaArray[0], $fechaArray[2]);
        } else {
            $errores["fecha"] = "La fecha no es válida";
            return false;
        }
    }

    /*function ValidaFechadma($fecha)
{
    $fechaArray = explode("-", $fecha);
    if (count($fechaArray) == 3) {
        $dia = $fechaArray[0];
        $mes = $fechaArray[1];
        $anio = $fechaArray[2];

        if (checkdate($mes, $dia, $anio) == 'true') {
            return mktime($mes, $dia, $anio);
        } else {
            return false;
        }
    } else
        return false;
}*/



    ?>
</body>

</html>