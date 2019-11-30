 <?php

    include('bGeneral.php');
    cabecera($_SERVER['PHP_SELF']);


    $rutaImagenes = "./imagenes/"; //la ruta donde guarda las imágenes 



    $archivos = scandir($rutaImagenes, 2);
    echo "<br>";
    foreach ($archivos as $valor) {
        if ($valor != "." && $valor != "..") {

            $usuarioFoto = mb_substr($valor, 0, mb_stripos($valor, "_")); //saco los primeros caracteres antes de "_" para sacar el usuario

            echo "<table>
                <tr>
                    <td>$usuarioFoto</td>
                    <td><a href='$rutaImagenes$valor'><img src='$rutaImagenes$valor' width='100px' alt='$valor'/></a></td>
                </tr>
            </table>";
        }
    }

    echo '<input type="button" value="Volver" onclick=location.href="index.php">';
    echo '<input type="button" value="Listar usuarios" onclick=location.href="mostrarUsuarios.php">';
    echo '<input type="button" value="Ver imágenes" onclick=location.href="mostrarImagenes.php">';

    pie();
    ?>