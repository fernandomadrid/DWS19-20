
<?php
/* Realiza una página que tenga dos cajas de texto para introducir dos fechas.
 * Debemos mostrar la diferencia entre las dos fechas en días totales.
 */
require ("bGeneral.php");
$tittle = "Ej5";
cabecera($tittle);

if (! isset($_REQUEST['Send'])) {
    // Incluimos formulario vacio
    require ("formEjercicio_5.php");
} else {
    $fecha_1 = recoge("fecha_1");
    $fecha_2 = recoge("fecha_2");
    $errores = [];
    $error = false;
    
    if (! $fUnix_1=validaFechadma($fecha_1, $errores)) {
        $error = true;
    }
    if (! $fUnix_2=validaFechadma($fecha_2, $errores)) {
        $error = true;
    }
    
    if (!$error) {
        echo "Han pasado ".difFecha($fUnix_1, $fUnix_2)." dias";
    } else {
        require ("formEjercicio_5.php");
    }
}
pie();
?>