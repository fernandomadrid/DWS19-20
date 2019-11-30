<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-type">
    <title>Ejercicio 1 Unidad 2</title>
</head>

<body>
    <?php
    $correo = "luisobz44@gmail.com";
    if (mb_strpos($correo, "@") !== false) {
        $trozosArroba = explode("@", $correo);
        if (mb_strpos($trozosArroba[1], ".") !== false) {
            $trozosPunto = explode(".", $trozosArroba[1]);
            echo "Nombre de Email es <b>$trozosArroba[0]</b><br>";
            echo "Dominio es <b>$trozosPunto[0]</b>";
        } else {
            echo "No incluye el caracter '.' despues de la arroba";
        }
    } else {
        echo "No incluye el caracter '@'";
    }

    ?>
</body>

</html>