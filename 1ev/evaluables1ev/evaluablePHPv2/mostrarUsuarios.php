<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilos.css">
    <title>Mostra Usuarios</title>
</head>

<body>
    <?php

    require_once 'validar.php';

    $ruta = 'usuarios.txt';


    if (!$archivo = fopen($ruta, "r")) { //abrimos archivo y hacemos comprobación de apertura.
        echo "No se ha podido abrir el archivo $ruta";
    } else {
        echo "El archivo $ruta se ha abierto para lectura<br><br>";

        //lectura con fgets() para leer línea a línea.
        while (!feof($archivo)) { //mientras no fin de fichero
            $linea = fgets($archivo); //leer linea
            echo $linea . "<br>"; //mostrar linea
        }
    }
    fclose($archivo); //cerramos archivo
    echo '<input type="button" value="Volver" onclick=location.href="index.html">';
    echo '<input type="button" value="Listar usuarios" onclick=location.href="mostrarUsuarios.php">';
    echo '<input type="button" value="Ver imágenes" onclick=location.href="mostrarImagenes.php">';


    ?>
</body>

</html>