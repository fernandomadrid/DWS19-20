
<?php
/*
 * En este ejemplo leemos un fichero con readfile. Esta función lee y escribe el contenido
 * del fichero
 */
include ('bGeneral.php');
cabecera ( $_SERVER ['PHP_SELF'] );
/*
 * Utilizo $mensaje para almacenar los mensajes de información al usuario
 * Comprobar que vamos concatenando los diferentes mensajes en la variable
 * con el operador .
 */
$mensaje = "";
// Devuelve el contenido de un archivo

$rutaCompleta = 'ficheros/prueba.txt';
$mensaje = "";
// Comprobamos si el fichero existe
if (is_file ( $rutaCompleta )) {
	readfile ( $rutaCompleta );
	// La variable $tamano guarda el tamaño en bytesy la función readfile, directamente 
	//lee y muestra el contenido del fichero
	$tamano = readfile ( $rutaCompleta );
	echo $tamano;
} else
	echo "El fichero no existe";

?> 
