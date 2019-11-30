<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Ejercicio</title>
</head>

<body>
<?php

/*
 * Realiza una función que acepte una fecha como cadena con el
 * formato aaaa-mm-dd compruebe si la fecha es correcta y nos devuelva
 * la fecha en formato UNIX.
 */
function ValidaFechaamd($fecha,&$errores)
{
    $fechaArray = explode("-", $fecha);
    if ((count($fechaArray) == 3)&& (checkdate($fechaArray[1], $fechaArray[2], $fechaArray[0]))){
        $dia = $fechaArray[0];
        $mes = $fechaArray[1];
        $anio = $fechaArray[2];
       
            return mktime($fechaArray[1], $fechaArray[2], $fechaArray[0]);
        } else {
            $errores["fecha"]="La fecha no es válida";
            return false;
        }
}

/*function ValidaFechaamd($fecha)
{
    $fechaArray = explode("-", $fecha);
    if (count($fechaArray) == 3) {
        $dia = $fechaArray[2];
        $mes = $fechaArray[1];
        $anio = $fechaArray[0];

        if (checkdate($mes, $dia, $anio) == 'true') {
            return mktime($mes, $dia, $anio);
        } else {
            return false;
        }
    } else
        return false;
}*/



$str = "2019-2-13";
$errores=[];
if ($fechaUnix=validaFechaamd($str,$errores)) {
    echo "La fecha es correcta <br>";
    echo $fechaUnix;
    echo date ("<p>Y-m-d",$fechaUnix);
} else {
    echo $errores["fecha"];
    
}

?>
</body>

</html>