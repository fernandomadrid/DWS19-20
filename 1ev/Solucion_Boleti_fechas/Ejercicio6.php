<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Ejercicio 5</title>
</head>
<body>
<?php
$fecha = "1-10-2017";
echo imagen($fecha);

function imagen($fecha)
{
    $fechaArray = preg_split("/[-\/]/", $fecha);
    if (count($fechaArray) !== 3) {

        $error = "Fecha Incorrecta";
        return $error;
    } else {

        $dia = $fechaArray[0];
        $mes = $fechaArray[1];
        $anio = $fechaArray[2];

        if (checkdate($mes, $dia, $anio) == 'true') {
            switch ($mes) {
                case 1:
                case 2:
                case 12:
                    $invierno = "invierno.jpg";
                    return $invierno;
                    break;
                case 3:
                case 4:
                case 5:
                    $primavera = "primavera.jpg";
                    return $primavera;
                    break;
                case 6:
                case 7:
                case 8:
                    $verano = "verano.jpg' width='600' height='400'>";
                    return $verano;
                    break;
                case 9:
                case 10:
                case 11:
                    $otonio = "otonio.jpg";
                    return $otonio;
                    break;
            }
        
    } else {
        $error = "Fecha Incorrecta";
        return $error;
    }
}}
?>
</body>
</html>