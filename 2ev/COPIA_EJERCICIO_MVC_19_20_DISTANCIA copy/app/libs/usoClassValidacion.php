<?php

/*
 * Añadimos aqui la función recoge pero debería ir en un fichero aparte
 *
 */
function sinEspacios($frase)
{
    $texto = trim(preg_replace('/ +/', ' ', $frase));
    return $texto;
}

function recoge($var)
{
    if (isset($_REQUEST[$var]))
        $tmp = strip_tags(sinEspacios($_REQUEST[$var]));
    else
        $tmp = "";

    return $tmp;
}

/*include_once 'classValidacion.php';
$datos['nombre'] = "";
$datos['energia'] = "";
$datos['proteina'] = "";
$datos['hc'] = "";
$datos['fibra'] = "";
$datos['grasa'] = "";
$validacion = false;
if (!isset($_REQUEST['bInsertar'])) {

    include 'classValidacion.php';
} // En esta parte comprobamos los datos recibidos
else {

    // recogemos los datos de forma segura
    $datos['nombre'] = recoge("nombre");
    $datos['energia'] = recoge('energia');
    $datos['proteina'] = recoge('proteina');
    $datos['hc'] = recoge("hc");
    $datos['fibra'] = recoge("fibra");
    $datos['grasa'] = recoge("grasa");

    // validamos
    // el uso de la clase es muy sencillo os dejo las pruebas que realice a la clase
    try {
        $validacion = new Validacion();
        $regla = array(
            array(
                'name' => 'nombre',
                'regla' => 'no-empty,letras'
            ),
            array(
                'name' => 'energia',
                'regla' => 'no-empty,numeric'
            ),
            array(
                'name' => 'proteina',
                'regla' => 'no-empty,numeric'
            ),
            array(
                'name' => 'hc',
                'regla' => 'no-empty,numeric'
            ),
            array(
                'name' => 'fibra',
                'regla' => 'no-empty,numeric'
            ),
            array(
                'name' => 'grasa',
                'regla' => 'no-empty,numeric'
            )/*,
            array(
                'name' => 'mail',
                'regla' => 'email'
            )*/
       /* );

        $validaciones = $validacion->rules($regla, $datos);
        // La clase nos devolverá true si no ha habido errores y un objeto con que incluye los errores en un array
        // Ahora nos sirve para ver lo que devuelve la clase
        echo "<pre>";
        print_r($validaciones);
        echo "</pre><br>";
    } catch (Exception $e) {
        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
        header('Location: error.php');
    } catch (Error $e) {
        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
        header('Location: error.php');
    }

    if ($validaciones === true) {
        echo "Todo correcto";
    } else
        include 'classValidacion.php';
}*/
