<?php
include 'index.php';

$tiempo = $_POST['tiempo'];

if (isset($_REQUEST['crear'])) {
    setcookie("cookieTiempo", "La cookie existe. ", time() + $tiempo, "/");
    if (preg_match("/^[0-9]+$/", $tiempo) && ($tiempo >= 1) && ($tiempo <= 60)) {
        echo "Se ha creado una cookie que expirará en " . $tiempo . " segundos.";
    } else {
        echo "Debe ingresar un número de 1 a 60.";
    }
}

if (isset($_REQUEST['comprobar'])) {
    if (isset($_COOKIE['cookieTiempo'])) {
        echo strip_tags($_COOKIE['cookieTiempo']);
    } else {
        echo "No existe información sobre la cookie.";
    }
}

if (isset($_REQUEST['eliminar'])) {
    if (isset($_COOKIE['cookieTiempo'])) {
        setcookie("cookieTiempo", "Destruida!", time() - 60);
        echo "Cookie destruida.<br>";
    } else
        echo "No había cookie que destruir";
}
