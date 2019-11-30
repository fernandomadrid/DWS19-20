<!--  Funciones de manejo de directorios-->
<?php
//definimos el path de acceso
$path = "fotos";
//abrimos el directorio
$dir = opendir($path);
//Mostramos las informaciones
while ($elemento = readdir($dir))
{
	echo $elemento;
	echo"<br>";
}
//No leerá nada porque con el bucle hemos llegado al final
$elemento = readdir($dir);
echo $elemento;
//Rebobinamos el puntero al principio
rewinddir ($dir);
//Comprobamos que volvemos a leer desde el principio
while ($elemento = readdir($dir))
{
	echo $elemento;
	echo"<br>";
}
$elemento = readdir($dir);
echo $elemento;
//Cerramos el directorio para liberar memoria
closedir($dir);
?>
