<?php

function cabecera($titulo = "Título") //el archivo actual
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

	$no_permitidas = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "à", "è", "ì", "ò", "ù", "À", "È", "Ì", "Ò", "Ù");
	$permitidas = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
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
	//else 
	//$tmp= "";


	return $tmp;
}


function cNombre($text)
{
	if (preg_match("/^[A-Za-zÑñ ]{1,15}+$/", sinTildes($text)))
		return 1;
	else
		return 0;
}
function cApellidos($text)
{
	if (preg_match("/^[A-Za-zÑñ ]{1,25}+$/", sinTildes($text)))
		return 1;
	else
		return 0;
}

function cClave($text)
{
	if (preg_match("/^[A-Za-z0-9 ]{1,15}+$/", $text))
		return 1;
	else
		return 0;
}

function cUsuario($text)
{
	if (preg_match("/^[A-Za-z0-9 ]{2,8}+$/", $text))
		return 1;
	else
		return 0;
}

function cMail($correo)
{
	return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $correo);
}
function cNum($num)
{
	if (preg_match("/^[0-9]+$/", $num))
		return 1;
	else
		return 0;
}




	?>
