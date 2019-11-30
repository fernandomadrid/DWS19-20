<?php
include ('libs/funcionesFicheros.php');
include ("libs/bGeneral.php");
cabecera("Mostrar usuarios del fichero");
$ruta = "ficheros/datos.txt";
if ($frases = mostrarFichero($ruta)) {
    foreach ($frases as $frase) {
        echo $frase . "<br>";
    }
    
} else
    echo "Ha habido un error";
    echo "<br>";
    echo "<a href=Ejercicio4.php>Volver al formulario inicial</a>";