<?php
//Realiza una función que nos devuelva el nº de días que han pasado entre dos fechas. 
//Hay que tener en cuenta que tendremos que validar las fechas antes o durante la función.
$cadena = "08-02-1980";
$cadena2 = date("d-m-Y", time());
echo fecha($cadena, $cadena2) . " días han pasado";


function fecha($cad, $cad2)
{
    $aux = explode("-", $cad);
    $dia = $aux[0];
    $mes = $aux[1];
    $año = $aux[2];

    $aux2 = explode("-", $cad2);
    $dia2 = $aux2[0];
    $mes2 = $aux2[1];
    $año2 = $aux2[2];


    if (checkdate($mes, $dia, $año)) {
        if (checkdate($mes2, $dia2, $año2)) {
            $var1 = mktime(0, 0, 0, $mes, $dia, $año);
            $var2 = mktime(0, 0, 0, $mes2, $dia2, $año2);
            echo "$var2 - $var1 / 60*60*24<br>";
            $dias = ($var2 - $var1) / (60 * 60 * 24);
            return round($dias);
        } else {
            return false;
        }
    } else {
        return false;
    }
}
