<?php

$ruta = "../EjemploDirectorios/fotos/";
$arrayDirectorios = [];
$array = devuelveDir($ruta, $arrayDirectorios);

foreach ($array as $value)
    echo '<img src="' . $ruta . $value . '" width=300px>';


function devuelveDir($ruta, $arrayDirectorios)
{
    if (!$directorio = opendir($ruta)) {
        echo "no se ha podido abrir la ubicación";
    } else {
        $i = 0;
        while ($archivo = readdir($directorio)) {
            if ($archivo != "." && $archivo != "..") {
                $arrayDirectorios[$i] = $archivo;
                $i++;
            }
        }
        closedir($directorio);
        return $arrayDirectorios;
    }
}
/*

$ruta = "C:\\";
dirToArray($ruta);


function dirToArray($ruta)
{
    $aArchivos = opendir($ruta);
    $arrayList = array();

    while (($archivo = readdir($aArchivos)) !== false) {
        if ($archivo != "." && $archivo != "..") {
            $arrayList[] = $archivo;
        }
    }

    //mostrar el contenido del array
    for ($i = 0; $i < count($arrayList); $i++) {
        echo $arrayList[$i] . "<br>";
    }

    echo "<p>-------------------------</p>";
    echo "<p>Finalizado</p>";
    closedir($aArchivos);
}*/
