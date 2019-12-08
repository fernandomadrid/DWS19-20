
<?php
include ("biblioteca.php");
session_start();

if ($_SESSION['acceso'] != 1){
    header('location:index.html');

}

cabecera("Comprobar");
echo "Bienvenido a la página privada ".$_SESSION['user'];

echo "<br><a href=salir.php>Salir del sistema</a>";
