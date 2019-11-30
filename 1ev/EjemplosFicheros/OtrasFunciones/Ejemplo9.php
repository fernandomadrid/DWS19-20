<?php
/*
 * Ejemplo en el que leemos con file. Devuelve cada línea del fichero
 * en una posición del array.
 * Cada elemento del array se corresponde con una línea del fichero
 */
$mensaje = "";
// Devuelve el contenido de un archivo

$rutaCompleta = 'ficheros/prueba.txt';
$mensaje = "";
// Comprobamos si el fichero existe
if (is_file ( $rutaCompleta )) {
$array = file("prueba.txt");
print_r ($array);
echo "<br>";
echo $array[2];
}else
	echo "El fichero no existe";

?>
</body>
</html>
