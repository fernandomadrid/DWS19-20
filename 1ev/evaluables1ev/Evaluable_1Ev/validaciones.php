<?php
function validar($nombre, $user, $password, $email, $nombre_foto, $tipo_foto, $tamano_foto)
{
    $error = false;
    //comprobaciones para el nombre
    if (strlen($nombre) <= 40) {
        if (!preg_match("|^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$|", $nombre)) {
            echo "Sólo se admiten letras en el nombre.<br>";
            $error = true;
        } /*else {
            echo "Nombre añadido.<br>";
        }*/
    } else {
        echo "Nombre demasiado largo.<br>";
        $error = true;
    }

    //comprobaciones para el nombre de usuario
    if (!preg_match("/[\w*$]/", $user)) {                               //esto está mal
        echo "Nombre de usuario incorrecto (alfanumérico, *, _, $)<br>";
        $error = true;
    } /*else {
        echo "Nombre de Usuario añadido.<br>";
    }*/
    //comprobaciones contraseña
    if (!(strlen($password) >= 8 && preg_match("/[\w*]/", $password))) {
        echo "Contraseña no válida. <br>";
        $error = true;
    } /*else {
        echo "Contraseña añadida <br>";
    }*/
    //comprobaciones para el email
    if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
        echo "Email incorrecto.<br>";
        $error = true;
    } /*else {
        echo "Email añadido. <br>";
    }*/
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
    return $error;
}
