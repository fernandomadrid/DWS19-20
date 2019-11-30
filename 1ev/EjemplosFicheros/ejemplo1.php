<?php
/*
 * Ejemplo en el que abrimos un fichero para lectura
*/
include ('bGeneral.php');
//La función cabecera es una función propia que introduce la cabecera html
cabecera($_SERVER['PHP_SELF']);
/*Aqui guardo los mensajes para escribirlos al final.
 * Utilizo una variable en lugar de array de errores
* porque en este ejemplo sólo puedo almacenar un error
*/
$mensaje="";
$ruta = "ficheros/prueba.txt";
//Antes de abrir el fichero, compruebo si existe
if (is_file($ruta)){
	//Abro el fichero en modo lectura
	if($archivo=fopen($ruta, "r")){
		$mensaje= "Archivo \"$ruta\" abierto para lectura.";
		//Si lo he abierto, lo cierro
		fclose($archivo);
	} else {
		$mensaje= "No se pudo abrir el archivo: $ruta.";
	}

}else $mensaje="El fichero no existe";
echo $mensaje;

?>
