
<?php
/*
 * En este ejemplo hacemos uso de la función fgetc, lectura caracter a caracter
 * Tener cuidado con tildes y ñ ya que la función no reconoce utf-8
 */
include ('bGeneral.php');
cabecera ( $_SERVER ['PHP_SELF'] );
/*
 * Utilizo $mensaje para almacenar los mensajes de información al usuario
 * Comprobar que vamos concatenando los diferentes mensajes en la variable
 * con el operador .
 */
$mensaje = "";
$rutaCompleta = "ficheros/refranes.txt";
// Comprobamos si el fichero existe
if (is_file ( $rutaCompleta )) {
	// Lectura caracter a caracter
	if ($fp = fopen ( 'prueba.txt', 'r' )) {
		while ( false !== ($caracter = fgetc ( $fp )) ) {
			$mensaje .= "$caracter\n";
		}
	} else
		$mensaje .= "No se ha podido abrir";
} else
	$mensaje .= "No existe el fichero o no es fichero";
	
echo $mensaje;

?> 
