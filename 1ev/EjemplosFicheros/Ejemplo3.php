
<?php
/*
 * En este ejemplo escribimos y leemos de un fichero, para ello abriremos en modo +a
* La lectura la haremos con fread y también probaremos fgets que lee por líneas
*/
include ('bGeneral.php');
$mensaje="";
cabecera($_SERVER['PHP_SELF']);
//ruta del fichero a leer
$rutaCompleta="ficheros/refranes.txt";
/*
 * Abro en modo a+ para escritura y lectura con puntero al final.
 * El modo a+ intenta crear el fichero sino existe
*/
if($archivo = fopen($rutaCompleta, "a+")){
	/*Escribimos
	 * Introducimos cada línea con su salto, lo podemos hacer con la
	*constante PHP_EOL o con \r\n para Windows*/
	fwrite($archivo, "Si las barbas de tu vecino ves cortar .".PHP_EOL);
	fwrite($archivo, "...pon las tuyas a remojar ".PHP_EOL);
	//Si no rebobino no puedo leer porque tengo el puntero al final
	rewind ($archivo);
	//Guardo tamaño completo para lectura con fread
	$tamano = filesize($rutaCompleta);
	$texto = fread($archivo, $tamano);
	$mensaje.= nl2br($texto);
	//Vuelvo a posicionarme al principio del fichero
	rewind ($archivo);
	/* Con gets puedo o no utilizaar nl2br porque lee una línea en cada llamada y 
	 * puedo añadir <br> al final de cada linea
	 * Para leer todo el fichero tengo q utilizar un bucle con feof (fin de fichero) como 
	 * condición de fin de lectura
	 */
	$mensaje.= "<br> Pruebo con fgets <br>";
	while(!feof($archivo)) {
		$linea = fgets($archivo);
		$mensaje.= nl2br($linea);
	}
	fclose($archivo);
}
    echo ($mensaje);
	pie();
	?>
