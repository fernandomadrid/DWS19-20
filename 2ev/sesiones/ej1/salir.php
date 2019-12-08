<?php

include ("biblioteca.php");
session_start();
session_destroy();
unset($_SESSION);
cabecera("Comprobar");
echo "Ha salido del sistema<br>";
echo "<a href=index.html>Volver al inicio</a>";