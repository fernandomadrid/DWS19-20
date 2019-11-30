
<?php
/*
 * En este ejemplo probamos a eliminar un fichero con unlink
*/
include ('bGeneral.php');
$mensaje="";
cabecera($_SERVER['PHP_SELF']);
$fichero="ficheros/refranes.txt";
//Borro el archivo que he creado en el ejemplo anterior
//Comprueba que el fichero que voy a borrar existe sino existe 
if (is_file($fichero))
	//Borro el fichero
	if (!unlink($fichero)) {
	$mensaje.= "No se ha podido borrar el archivo.";
}
else {
	$mensaje.= "Archivo borrado";
}else
	$mensaje.= "No existe el fichero";
echo $mensaje;
pie();
?>

