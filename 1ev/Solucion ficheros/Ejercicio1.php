<html>

<head>
    <title>Error</title>
    <meta charset="utf-8" />
</head>

<body>
    <?php

    // Función que acepta 3 parámetros numéricos de entrada y los almacena en un fichero de texto
    // Muestra el resultado por pantalla
    function escribirTresNumeros($num1, $num2, $num3)
    {
        $ruta = "ficheros";
        $fichero = "/numeros.txt";
        $rutaCompleta = $ruta . $fichero;
        // Comprobamos si la ruta es válida
        if (file_exists($ruta)) {
            if ($archivo = fopen($rutaCompleta, "w"))
            // Comprobamos si tenemos abierto el fichero
            {
                // Comprobamos si la escritura se realiza con éxito
                if (fwrite($archivo, $num1 . PHP_EOL . $num2 . PHP_EOL . $num3 . PHP_EOL))
                    return true;
                else
                    return false; // Cerramos el fichero sólo si lo hemos abierto
            } else
                return false;
        } else
            return false;
    }

    // Lamada a la función
    escribirTresNumeros(5, 5, 300);

    ?>
</body>

</html>