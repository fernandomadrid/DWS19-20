<?php

function cabecera($titulo = "Ejemplo") // el archivo actual

{
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>
				<?php
    echo $titulo;
    ?>
			
			</title>
<meta charset="utf-8" />
</head>
<body>
<?php
}

function pie()
{
    echo "</body>
	</html>";
}

function sinTildes($frase)
{
    $no_permitidas = array(
        "á",
        "é",
        "í",
        "ó",
        "ú",
        "Á",
        "É",
        "Í",
        "Ó",
        "Ú",
        "à",
        "è",
        "ì",
        "ò",
        "ù",
        "À",
        "È",
        "Ì",
        "Ò",
        "Ù"
    );
    $permitidas = array(
        "a",
        "e",
        "i",
        "o",
        "u",
        "A",
        "E",
        "I",
        "O",
        "U",
        "a",
        "e",
        "i",
        "o",
        "u",
        "A",
        "E",
        "I",
        "O",
        "U"
    );
    $texto = str_replace($no_permitidas, $permitidas, $frase);
    return $texto;
}

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

function cTexto($text, &$errores, $max = 200, $min = 1)
{
    $valido = true;
    if ((mb_strlen($text) > $max) || (mb_strlen($text) < $min)) {
        $errores["name_1"] = "El nombre debe tener entre $min y $max letras";
        $valido = false;
    }
    if (! preg_match("/^[A-Za-zÑñ]+$/", sinTildes($text))) {
        $errores["name_2"] = "El nombre sólo debe tener letras";
        $valido = false;
    }

    return $valido;
}

/*
 * function cTexto($text, &$errores, $max = 30, $min = 1)
 * {
 * if (! (preg_match("/^[A-Za-zÑñ]{" . $min, $max . "}$/", sinTildes($text)))) {
 * $errores["name"] = "Error en el nombre";
 * return false;
 * } else {
 * return true;
 * }
 * }
 */
function cNum($num, &$errores, $tam = PHP_INT_MAX)
{
    $valido = true;
    if ($num > $tam) {
        $valido = false;
        $errores["edad_1"] = "El número es demasiado grande";
    }
    if (! preg_match("/^[0-9]+$/", $num)) {
        $valido = false;
        $errores["edad_2"] = "La edad sólo puede contener números";
    }
    return $valido;
}

// Le pasamos nombre del campo, ruta definitiva, extensiones válidas y array errores
// Array de tipo MIME de extensiones
function cFile($nombre, $ruta, $extensionesValidas, &$errores)
{
    if ($_FILES[$nombre]['error'] != 0) {
        switch ($_FILES[$nombre]['error']) {
            case 1:
                $errores[] = "UPLOAD_ERR_INI_SIZE";
                $errores[] = "Fichero demasiado grande";
                break;
            case 2:
                $errores[] = "UPLOAD_ERR_FORM_SIZE";
                $errores[] = 'El fichero es demasiado grande';
                break;
            case 3:
                $errores[] = "UPLOAD_ERR_PARTIAL";
                $errores[] = 'El fichero no se ha podido subir entero';
                break;
            case 4:
                $errores[] = "UPLOAD_ERR_NO_FILE";
                $errores[] = 'No se ha podido subir el fichero';
                break;
            case 6:
                $errores[] = "UPLOAD_ERR_NO_TMP_DIR";
                $errores[] = "Falta carpeta temporal";
                break;
            case 7:
                $errores[] = "UPLOAD_ERR_CANT_WRITE";
                $errores[] = "No se ha podido escribir en el disco";
                break;

            default:
                $errores[] = 'Error indeterminado.';
        }
        return false;
    } else {
        // Guardamos el nombre original del fichero
        $nombreArchivo = $_FILES[$nombre]['name'];
        // Guardamos nombre del fichero en el servidor
        $directorioTemp = $_FILES[$nombre]['tmp_name'];
        $extension = $_FILES['imagen']['type'];
        // Comprobamos la extensión del archivo dentro de la lista que hemos definido al principio
        if (! in_array($extension, $extensionesValidas)) {
            $errores[] = "La extensión del archivo no es válida o no se ha subido ningún archivo";
            return false;
        }

        // Almacenamos el archivo en ubicación definitiva
        // Añadimo time() al nombre del fichero, así lo haremos único y si tuviera doble extensión

        if (is_file($ruta . $nombreArchivo)) {

            // Podemos utilizar microtime() para páginas con mucho tráfico
            $nombreArchivo = time() . $nombreArchivo;
        }
        // Movemos el fichero a la ubicación definitiva
        if (move_uploaded_file($directorioTemp, $ruta . $nombreArchivo)) {
            // En este caso devolvemos sólo el nombre del fichero sin la ruta
            return $nombreArchivo;
        } else {
            $errores[] = "Error: No se puede mover el fichero a su destino";
            // return false;
        }
    }
}


function ValidaFechaamd($fecha,&$errores)
{
    $fechaArray = explode("-", $fecha);
    if ((count($fechaArray) == 3)&& (checkdate($fechaArray[1], $fechaArray[2], $fechaArray[0]))){
       
        
        return mktime($fechaArray[1], $fechaArray[2], $fechaArray[0]);
    } else {
        $errores["fecha"]="La fecha no es válida";
        return false;
    }
}



function validaFechadma($fecha,&$errores)
{
    $fechaArray = explode("-", $fecha);
    if ((count($fechaArray) == 3)&& (checkdate($fechaArray[1], $fechaArray[0], $fechaArray[2]))){
        
        
        return mktime(0,0,0,$fechaArray[1], $fechaArray[0], $fechaArray[2]);
    } else {
        $errores["fecha"]="La fecha no es válida";
        return false;
    }
}


// El primer parámetro debe ser menor que el egundo si queremos que el resultado sea positivo
//Hay que pasarle las fechas en formato UNIX
function difFecha($cad_1, $cad_2)
{
    if ((is_int($cad_1) && is_int($cad_2))) {
        $dias = ($cad_2 - $cad_1) / (60 * 60 * 24);
        return round($dias);
    } else {
        return false;
    }
}
?>