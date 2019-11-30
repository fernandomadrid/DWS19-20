 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
     <link rel="stylesheet" href="estilos.css">
 </head>

 <body>
     <?php

        require_once 'validar.php';

        $nombre = $_POST["nombre"];
        $user = $_POST["user"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $fnac = $_POST["fnac"];
        $nombre_foto = time() . $_FILES["foto"]["name"]; //agregada la hora tipo unix para convertir en nombre de la imagen en único
        $tipo_foto = $_FILES["foto"]["type"];
        $tamano_foto = $_FILES["foto"]["size"];
        $destino = $_SERVER['DOCUMENT_ROOT'] . '/imagenes/'; //destino de las imagenes
        $fechaActual = date("d/m/Y -- H:i:s", time());



        if (validaFoto($nombre, $user, $password, $email, $fnac, $nombre_foto, $tipo_foto, $tamano_foto) {

            //Si todas las comprobaciones son correctas, escritura en el fichero usuarios.txt
            $ruta = "usuarios.txt";

            if ($archivo = fopen($ruta, "a+")) { //abrimos archivo para escritura y lectura "a+" y hacemos comprobación de apertura.

                //escribirá en la posición donde esté apuntado el puntero, por lo general, si abrimos en "a", apuntará al final.
                fwrite($archivo, "$fechaActual ; $nombre ; $user ; $password ; $email ; $fnac ; $destino$nombre_foto \r\n");
                echo "Usuario añadido correctamente";
                fclose($archivo);


                //<input type="button" value="Ver imágenes" onclick="mostrarImagenes.php">
                echo '<input type="button" value="Volver" onclick=location.href="index.html">';
                echo '<input type="button" value="Listar usuarios" onclick=location.href="mostrarUsuarios.php">';
                echo '<input type="button" value="Ver imágenes" onclick=location.href="mostrarImagenes.php">';
            } else {
                echo "No se ha podido abrir el archivo $ruta";
            }
        }



        ?>
 </body>

 </html>