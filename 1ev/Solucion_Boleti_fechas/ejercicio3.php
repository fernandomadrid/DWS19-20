<!-- 3.	Realiza una función que reciba la fecha en formato UNIX y devuelva la fecha
 en formato dd-mm-aaaa y aaaa-mm-dd según un segundo argumento que le pasemos a la función.-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>ejercicio3</title>


</head>

<body>

    <?php

    /*
 * SEGUNDO PARÁMETRO:
 * 1 -> FORMATO dd/mm/aaaa
 * 2 -> FORMATO aaaa/mm/dd
 */


    $errores = [];
    if (($fecha = conversion_unix_fecha(time(), $errores))) {
        echo "La fecha en UNIX " . time() . " es : $fecha";
    } else
        echo $errores = ["fecha"];



    function conversion_unix_fecha($fechaUnix, &$errores, $formato = 1)
    {
        if (ctype_digit($fechaUnix)) {

            switch ($formato) {
                case 1:
                    return $fecha_formato = date("H:i:s - d/m/Y", $fechaUnix);
                    break;

                case 2:
                    return $fecha_formato = date("Y/m/d", $fechaUnix);
                    break;

                default:

                    return 0;
            }
        } else
            $errores['fecha'] = "Debes introducir un entero";
        return 0;
    }



    ?>

</body>

</html>