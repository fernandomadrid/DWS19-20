<?php

function cabecera($titulo) // el archivo actual
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

function recogeArray($var)
{
    if (! empty($_REQUEST[$var])) {
        $tmp = $_REQUEST[$var];
        foreach ($tmp as $key => $value) {
            $tmp[$key] = strip_tags(sinEspacios($value));
        }
    } else
        $tmp = "";

    return $tmp;
}

function cTexto($text, &$errores, $max = 20, $min = 1)
{
    $valido = true;
    if ((mb_strlen($text) > $max) || (mb_strlen($text) < $min)) {
        $errores["name_1"] = "El nombre debe tener entre $min y $max letras";
        $valido = false;
    }
    if (! preg_match("/^[A-Za-zÑñ ]+$/", sinTildes($text))) {
        $errores["name_2"] = "El nombre sólo debe tener letras";
        $valido = false;
    }

    return $valido;
}


function cUser($user, &$errores)
{
    if (!preg_match("/^[A-Za-zÑñ0-9]+$/", sinTildes($user))) {
        $errores[] = "El campo usuario tiene caracteres no válidos";
        return 1;
    } else
        return 0;
}

function cEnsenanza($ensenanza, &$errores)
{
    if (!preg_match("/^(Secundaria|Bachillerato|Ciclo medio|Ciclo superior)$/i", sinTildes($ensenanza))) {
        $errores[] = "El campo enseñanza tiene valores no válidos";
        return 1;
    } else
        return 0;
}

function cMostrar($mostrar, &$errores)
{
    if (!preg_match("/^(pantalla|archivo)$/i", sinTildes($mostrar))) {
        $errores[] = "El campo mostrar tiene valores no válidos";
        return 1;
    } else
        return 0;
}

function cNum($num, &$errores)
{
    if (!preg_match("/^[0-9]+$/", $num)) {
        $errores[] = "El campo solo puede contener números";
        return 1;
    } else
        return 0;
}

?>
