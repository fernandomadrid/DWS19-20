
<?php
/*
 * En este ejemplo hacemos uso de la función fread, lectura sencilla.
* Probamos tambien el uso de nl2br
*/
include ('bGeneral.php');
cabecera($_SERVER['PHP_SELF']);
/*
 * Utilizo $mensaje para almacenar los mensajes de información al usuario
 * Comprobar que vamos concatenando los diferentes mensajes en la variable
 * con el operador .
 * */
$mensaje="";
// Ruta completa en la que sencuentra el fichero que vamos a leer
$rutaCompleta = "ficheros/prueba.txt";
//Comprobamos si el fichero existe
if (is_file($rutaCompleta)){
	// Abrimos el fichero en modo lectura comprobando si hay errores
	if ($archivo = fopen($rutaCompleta, "r")) {
		// extraemos tamaño del ficher completo para posteriormente leerlo
		$tamano = filesize($rutaCompleta);
		// Lectura del archivo completo
		if ($texto = fread($archivo, $tamano)) {
			// Mostramos el contenido del fichero
			$mensaje.= "Este es el contenido del fichero <br> $texto";
				
			$mensaje.= "<br> Vamos a probar con la función nl2br<br>";
			$mensaje.= "<br> Esta función convierte los saltos de línea en " . htmlentities("<br>") . "<br>";
			/* La funció nl2br convierte los saltos de línea válidos para ficheros en saltos de línea <br>
			 * interpretables en html que es lo que genera finalmente el servidor
			*/
			$mensaje.= nl2br($texto) . "<br>";
		} else{
			$mensaje.= "No se ha podido leer el fichero";
		}
		//Intentamos escribir en el fichero
		if (fwrite($archivo, "Si las barbas de tu vecino ves cortar ..."))
			$mensaje.= "Hemos escrito";
		else
			$mensaje.="<br>No hemos podido escribir";
		//Una vez terminado cerramos el fichero
		fclose($archivo);
	}else
	$mensaje.= "No se ha podido abrir el fichero";
	//Intentamos escribir en el fichero pero como lo hemos abierto en modo "r", no podremos

}else
	$mensaje.="El fichero no existe o no es un fichero";
// Podemos probar que ocurre si cambiamos el modo a r+
// Escribiríamos al final del archivo
echo $mensaje;
pie();
?>

