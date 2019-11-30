<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Validar Formulario</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php

    function validar($nombre, $user, $password, $email, $fnac, $nombre_foto, $tipo_foto, $tamano_foto)
    {
    // Arrays para guardar mensajes y errores:
        $aErrores = array();
        $aMensajes = array();
        $error = false;//utilizo la variable error para evitar que guarde imagen si hay errores

    // Patrón para usar en expresiones regulares 
        $patron_nombre = "/^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/";
        $patron_usuario = "/^[a-zA-Z0-9_$*\s]+$/";
        $patron_password = "/^[a-zA-Z_$\s0-9]+$/";
        $patron_email = "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/";

	// Comprobar si se ha enviado el formulario:
        if (!empty($_POST)) {

            echo "FORMULARIO RECIBIDO:<br/>";
            echo "====================<p/>";

		// Mostrar la información recibida del formulario:
        //print_r($_POST);
            echo "<hr/>";

		// Comprobar si llegaron los campos requeridos:
            if (isset($nombre) && isset($user) && isset($password) && isset($email)) {
			
			// Nombre:
                if (empty($nombre))
                    $aErrores[] = "Debe especificar el nombre";
                else {
				// Comprobar mediante una expresión regular, que sólo contiene letras y espacios:
                    if (preg_match($patron_nombre, $nombre))
                        $aMensajes[] = "Nombre: [" . $nombre . "]";
                    else {
                        $aErrores[] = "El nombre sólo puede contener letras y espacios";
                        $error = true;
                    }
                }

			// usuario:
                if (empty($user))
                    $aErrores[] = "Debe especificar el usuario";
                else {
				// Comprobar mediante una expresión regular, que sólo contienen letras y espacios:
                    if (preg_match($patron_usuario, $user))
                        $aMensajes[] = "User: [" . $user . "]";
                    else {
                        $aErrores[] = "El usuario sólo puede contener Letras, números, *, _ y $.";
                        $error = true;
                    }
                }

            //password
                if (empty($password))
                    $aErrores[] = "Debe especificar una contraseña";
                else {
				// Comprobar mediante una expresión regular, que sólo contienen letras y espacios:
                    if (preg_match($patron_password, $password))
                        $aMensajes[] = "Password: [" . $password . "]";
                    else {
                        $aErrores[] = "Las contraseñas sólo Letras, números, * y _";
                        $error = true;
                    }
                }

            //email
                if (empty($email))
                    $aErrores[] = "Debe especificar un mail";
                else {
				// Comprobar mediante una expresión regular, que sólo contienen letras y espacios:
                    if (preg_match($patron_email, $email))
                        $aMensajes[] = "eMail: [" . $email . "]";
                    else {
                        $aErrores[] = "Formato email incorrecto";
                        $error = true;
                    }
                }


            } else {
                echo " <p> No se han especificado todos los datos requeridos . </p> ";
            }


		// Si han habido errores se muestran, sino se mostrán los mensajes
            if (count($aErrores) > 0) {
                echo " <p> ERRORES  ENCONTRADOS :</p> ";

			// Mostrar los errores:
                for ($contador = 0; $contador < count($aErrores); $contador++)
                    echo $aErrores[$contador] . " <br> ";
            } else {
			// Mostrar los mensajes:
                for ($contador = 0; $contador < count($aMensajes); $contador++)
                    echo $aMensajes[$contador] . " <br> ";
            }

        } else {

            $error = true;
        }

   // si hay errores en las comprobaciones de nombre, mail, contraseña, etc no sube la foto al servidor
        if (!$error) {
    //comprobaciones para la foto:
            if ($tamano_foto <= 200000) {

                if ($tipo_foto == "image/jpg" || $tipo_foto == "image/jpeg" || $tipo_foto == "image/gif") {
                
                //ruta de destino en el servidor
                    $destino = $_SERVER['DOCUMENT_ROOT'] . '/imagenes/';
                //movemos la imagen del directorio temporal al directorio escogido
                    move_uploaded_file($_FILES['foto']['tmp_name'], $destino . $nombre_foto);
                    echo "Imagen subida.<br>";
                    return true;


                } else {

                    echo "Formato de imagen no admitido (sólo JPG, JPEG o GIF).<br>";
                }

            } else {
                echo "La imagen excede los 200 KB.<br>";
            }
        }

        echo '<input type="button" value="Volver" onclick=location.href="index.html">';
        echo '<input type="button" value="Listar usuarios" onclick=location.href="mostrarUsuarios.php">';
        echo '<input type="button" value="Ver imágenes" onclick=location.href="mostrarImagenes.php">';
    }
    ?>



</body>
</html>