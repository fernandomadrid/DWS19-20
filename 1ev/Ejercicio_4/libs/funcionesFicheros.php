<?php

function mostrarFichero($ruta)
{
    
    if (is_file($ruta)) {

        // Abro el fichero en modo lectura
        if ($archivo = fopen($ruta, "r")) {

            while (! feof($archivo)) {
                $lineas[] = nl2br(fgets($archivo));
            }
            // Si lo he abierto, lo cierro
            fclose($archivo);
            return $lineas;
        } else
            return false;
    } else {
        return false;
    }
}

function insertarArchivoFinal($ruta, $msg)
{
    if ($archivo = fopen($ruta, "a+")) {
        fwrite($archivo, $msg . PHP_EOL);
        fclose($archivo);
        return "true";
    } else
        return "false";
}

?>
