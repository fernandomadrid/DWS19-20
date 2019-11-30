<?php
error_reporting(0);

//$ruta="ficheros";
$fichero = "numeros.txt";
//$rutaCompleta=$ruta.$fichero;
$n1 = 1;
$n2 = 2;
$arraySuma[] = array();
$arraySuma[] = sumar($fichero);
echo "<br> la suma antes de añadir numeros es: " . $arraySuma['suma'] . " y hay " . $arraySuma['cantidad'] . " elementos<br>";


if (escribir($fichero, $n1, $n2)) {
    $arraySuma = sumar($fichero);
    echo "<br> la suma después de añadir numeros es: " . $arraySuma['suma'] . " y hay " . $arraySuma['cantidad'] . " elementos<br>";
}



function cuantosNumerosHay($fichero)
{
    if ($archivo = fopen($fichero, "r")) {
        $c = 0;
        while (!feof($archivo)) {
            $c++;
        }
        return c;
    } else
        return false;
}
function sumar($fichero)
{
    if ($archivo = fopen($fichero, "r")) {
        $suma[] = array();
        $suma['cantidad'] = 0;

        while (!feof($archivo)) {
            $numero = fgets($archivo);
            $suma['suma'] += intval($numero);
            $suma['cantidad']++;
        }
    }
    return $suma;
}

function escribir($fichero, $n1, $n2)
{
    if (file_exists($fichero)) {
        if ($archivo = fopen($fichero, "a")) {
            if (fwrite($archivo, $n1 . PHP_EOL . $n2 . PHP_EOL))
                return true;
        } else
            return false;
    } else
        return false;
}
