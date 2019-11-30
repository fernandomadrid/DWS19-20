<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>

<body>
    <?php
    include 'evaluable1.php';
    $ruta = 'usuarios.txt';
    if (isset($_GET['mostrarusuarios'])) {
        mostrarUsuarios($ruta);
    }
    if (isset($_GET['verfotos'])) {
        mostrarFotos($destino, $nombre_foto);
    }
    //funcion para leer el archivo de usuarios.txt
    function mostrarUsuarios($ruta)
    {
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
    }
    //funcion para mostrar fotos
    function mostrarFotos($destino, $nombre_foto)
    {
        $directorio = $destino;
        $archivos = scandir($directorio, 0); // 0 ordena ascendente, 1 descendente, 2 no ordena
        foreach ($archivos as $valor) {
            echo "<img src='$valor' width='100px' alt='$valor'/><br>";
        }
    }
    ?>



    <a href="menufinal.php?mostrarusuarios=true">Mostrar usuarios</a>
    <br>
    <a href="menufinal.php?verfotos=true">Mostrar Fotos.</a>



</body>

</html>