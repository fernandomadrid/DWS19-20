<?php
/*
 * Ejercicio 4.- Datos Alumnos
 */
include ('libs/bGeneral.php');

include ('libs/funcionesFicheros.php');
cabecera($_SERVER['PHP_SELF']);
$error = false;
$matricula = "";
$errores;
$ruta = "ficheros/datos.txt";

if (! isset($_REQUEST['enviar'])) {
    include ('formularios/fEjercicio4.php');
} else {
//REcogemos de forma segura
$nombre = recoge('nombre');
$telefono = recoge('telefono');
$ensenanza = recoge("enseñanza");
$mostrar = recoge('mostrar');

//Validamos y recogemos errores en array $errores
cTexto($nombre,$errores);
cNum($telefono,$errores);
cEnsenanza($ensenanza,$errores);
cMostrar($mostrar,$errores);

//Si no hay errores continuamos
if (empty($errores)) {
    //CArgo valor de check matriculado
    if (! isset($_POST["matriculado"])) {
        $matricula = 'no';
    }
    
    //Monto la frase a guardar o mostrar
    $frase = 'El alumno ' . $nombre . ', con teléfono ' . $telefono . ', ' . $matricula . ' está matriculado en ' . $ensenanza;

    //Compruebo valor del select mostrar
    if ($mostrar == 'pantalla') {
        echo $frase;
        echo "<br>";
        echo "<a href=Ejercicio4.php>Volver al formulario inicial</a>";
        
    } else if ($mostrar == 'archivo') {
        // Escribimos al final del fichero y mostramos
        insertarArchivoFinal($ruta, $frase);
        echo "<a href=mostrar.php>Enlace para mostrar el contenido del fichero</a>";
    }
}else{
    include ('formularios/fEjercicio4.php');
}
}
pie();
?>
