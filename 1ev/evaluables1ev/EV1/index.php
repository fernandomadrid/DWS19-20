<?php
include('bGeneral.php');
cabecera($_SERVER['PHP_SELF']);


$error = false;
$errores[] = array();
if (!isset($_REQUEST['bAceptar'])) {
    ?>


    <form ACTION="<?php $_SERVER['PHP_SELF'] ?>" METHOD="post" enctype="multipart/form-data">
        Nombre: <input type="text" name="nombre"><br><br>
        Usuario: <input type="text" name="user"><br><br>
        Contraseña (min 8 chars): <input type="password" name="password"><br><br>
        eMail: <input type="text" name="email"><br><br>
        F. Nacimiento: <input type="date" name="fnac"><br><br>

        Foto: <input type="file" name="foto"><br><br><br>

        <input TYPE="submit" name="bAceptar" VALUE="aceptar"><br><br>




    </form>
    <input type="button" value="Listar usuarios" onclick=location.href="mostrarUsuarios.php">
    <input type="button" value="Ver imágenes" onclick=location.href="mostrarImagenes.php">



    </body>

    </html>


    <?php
    }  // En esta parte comprobamos los datos recibidos
    else {
        $nombre = recoge('nombre');
        $user = recoge('user');
        $password = recoge('password');
        $email = recoge('email');
        $fnac = recoge('fnac');


        if (cNombre($nombre) == 0) {
            $errores['nombre'] = 'El nombre no es correcto';
            $error = true;
        }
        if (cUsuario($user) == 0) {
            $errores['usuario'] = 'El usuario no es correcto';
            $error = true;
        }
        if (cPassword($password) == 0) {
            $errores['password'] = 'El password no es correcto o tiene menos de 8 caracteres';
            $error = true;
        }
        if (cEmail($email) == 0) {
            $errores['email'] = 'El email no es correcto';
            $error = true;
        }

        if (cEdad($fnac) == 0) {
            $errores['fnac'] = 'Es menor de edad';
            $error = true;
        }



        //si no hay errores
        if (!$error) {

            //recojo foto 
            $nombre_foto = $user . "_" . time() . $_FILES['foto']['name']; //agregada la hora tipo unix para convertir en nombre de la imagen en único y el usuario para utilizar después al mostrar las imagenes
            $tipo_foto = $_FILES['foto']['type'];
            $tamano_foto = $_FILES['foto']['size'];
            $fechaActual = date("d/m/Y -- H:i:s", time());


            //compruebo foto
            if (validaFoto($tipo_foto, $tamano_foto)) {

                //ruta de destino en el servidor
                $destino = "C:/wamp64/www/DWS/EV1/imagenes/";
                //muevo la imagen del directorio temporal al directorio escogido
                move_uploaded_file($_FILES['foto']['tmp_name'], $destino . $nombre_foto);


                //y también escribo en el fichero

                $ruta = "C:/wamp64/www/DWS/EV1/usuarios.txt";

                if (!$archivo = fopen($ruta, "a+")) {  //abrimos archivo para escritura y lectura "a+" y hacemos comprobación de apertura.
                    $errores['fichero'] = "no se ha podido abrir el archivo";
                } else {
                    //escribirá en la posición donde esté apuntado el puntero, por lo general, si abrimos en "a", apuntará al final.
                    fwrite($archivo, "$fechaActual ; $nombre ; $user ; $password ; $email ; $fnac ; $destino.$nombre_foto \r\n");
                    echo "Usuario añadido correctamente<br>";
                    fclose($archivo);
                    //--------------------------------
                    echo '<input type="button" value="Volver" onclick=location.href="index.php"><br>';
                    echo '<input type="button" value="Listar usuarios" onclick=location.href="mostrarUsuarios.php">';
                    echo '<input type="button" value="Ver imágenes" onclick=location.href="mostrarImagenes.php">';
                }
            } else {
                $errores['imagen'] = "No se ha podido subir la imagen";
            }
        } else { //si hay errores vuelvo a sacar el formulario

            ?>


        <form ACTION="<?php $_SERVER['PHP_SELF'] ?>" METHOD='post'>
            Nombre: <input TYPE="text" NAME="nombre" VALUE="<?php echo $nombre; ?>">
            <br>
            <?php

                    echo '<br>';
                    if (isset($errores['nombre']))
                        echo "$errores[nombre] <br>";
                    ?>

            Usuario: <input type="text" name="user" value="<?php echo $user ?>">
            <br>
            <?php
                    echo '<br>';
                    if (isset($errores['usuario']))
                        echo $errores['usuario'];

                    ?>

            Password (min 8 chars): <input type="password" name="password">
            <br>
            <?php
                    echo '<br>';
                    if (isset($errores['password']))
                        echo $errores['password'];

                    ?>

            email: <input type="text" name="email" value="<?php echo $email ?>">
            <br>
            <?php
                    echo '<br>';
                    if (isset($errores['email']))
                        echo $errores['email'];

                    ?>

            Fecha de Nacimiento: <input type="date" name="fnac" value="<?php $fnac ?>">
            <br>
            <?php
                    echo '<br>';
                    if (isset($errores['fnac']))
                        echo $errores['fnac'];

                    ?>


    <?php
            echo '<br>';
            echo '<input TYPE="submit" name="bAceptar" VALUE="aceptar">';
        }
    }

    ?>

        </form>
        <?php
        pie();
        ?>