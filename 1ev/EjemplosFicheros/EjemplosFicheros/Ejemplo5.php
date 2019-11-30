
<?php
/*
 * En este ejemplo hacemos uso de la función file_get_contents,.
* Probamos tambien el uso de nl2br
*/
include ('bGeneral.php');
cabecera($_SERVER['PHP_SELF']);
/*
 * Utilizo $mensaje para almacenar los mensajes de información al usuario
* Comprobar que vamos concatenando los diferentes mensajes en la variable
* con el operador .
* */
$rutaCompleta='ficheros/prueba.txt';
$mensaje="";
//Comprobamos si el fichero existe
if(is_file($rutaCompleta)){
	//Vemos como funciona file_gets_contents. Realizamos una lectura completa del fichero
	$pagina_inicio=file_get_contents($rutaCompleta);
	$mensaje= nl2br($pagina_inicio);
}else
	$mensaje="El fichero no existe";
echo $mensaje;
pie();
?>

