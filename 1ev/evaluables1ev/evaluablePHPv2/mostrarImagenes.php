<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mostrar Imágenes</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>



    <?php

    require_once 'evaluable.php';

    $rutaImagenes = "/imagenes/"; //la ruta donde guarda las imágenes en mi caso es "C:\xampp\htdocs\imagenes"

    $archivos = scandir($destino, 2); // 0 ordena ascendente, 1 descendente, 2 no ordena
    echo "<br>";
    foreach ($archivos as $valor) {
        if ($valor != "." && $valor != "..") {
            echo "<a href='$rutaImagenes$valor'><img src='$rutaImagenes$valor' width='100px' alt='$valor'/></a>";
        }
    }


    ?>
</body>

</html>