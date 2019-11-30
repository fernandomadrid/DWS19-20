
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
// Uso junto con file_get_contents
$archivo = "prueba.txt";
//Leemos el contenido del fichero
$actual = file_get_contents($archivo);
/*
 * Añadimos al fichero porque primero leemos, concatenamos a lo que hemos leido
 * lo que queremos escribir y despues escribimos
 */
$actual .= "Esto añade más texto al archivo\n";
file_put_contents($archivo, $actual);
$actual = file_get_contents($archivo);
echo nl2br($actual);

/* 
 * Podemos utilizar también la bandera FILE_APPEND para añadir al final sin eliminar:
 * Conseguimos lo mismo que en la primera parte del ejemplo pero de forma más cómoda
 */
echo "Probamos la función pero añadiendo contenido al fichero <ber>";
$archivo = "prueba.txt";
$mascontenido = "¡Todavía más contenido!\n";
// También vamos a emplear la bandera LOCK_EX para evitar cualquier modificación mientras:
file_put_contents($archivo, $mascontenido, FILE_APPEND);
$actual = file_get_contents($archivo);
echo nl2br($actual);

?> 
