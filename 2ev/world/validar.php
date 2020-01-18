<?php

include("bGeneral.php");
include('bConecta.php');
session_start();
cabecera("Validar");


$user = recoge("user"); //recogida de datos segura
$password = crypt_blowfish(recoge("password")); //se recoge password encriptado 


if (isset($_POST['bLogin'])) { //si pulsa Inciar sesión entra a la la zona privada, si es 'admin' o 'root' entra en la zona de administración de usuarios.

    $registro = SelectUser($user, $password, $pdo);

    if (!strcmp($user, $registro['usuario']) && !strcmp($password, $registro['clave'])) {
        $_SESSION['acceso'] = 1;
        $_SESSION['user'] = $registro['usuario'];

        setcookie($_SESSION['user'], date("d-m-Y H:i:s", time()), time() + 365 * 24 * 60 * 60); //Se crea cookie con la fecha del último acceso que se mostrará en la página

        if ($registro['usuario'] == "root" || $registro['usuario'] == "admin") { //si el usuario es admin o root entra a una página privada con opciones especiales
            header('location:admin.php');
        } else { //si no es admin o root entra a la parte privada normal
            header('location:private.php');
        }
    } else { //si no existe el usuario se devuelve fallo que se tomará por GET
        header('location: index.php?fallo=true');
    }
} else { //sino, se registra. Insert del usuario.

    if ($user != "" && $password != "") {

        try {
            if (insertUser($user, $password, $pdo)) {
                echo  '<script language="javascript">alert("Usuario registrado! Inicia Sesión");</script>'; //salta un alert al insertarse correctamente
                include "index.php";
            }
        } catch (Exception $e) {
            if ($e->getCode() == 23000)
                header('location: index.php?fallo=reg');
            else
                echo "<br>" . $e->getMessage() . "<br><br>";
            echo "<a href=index.php>Volver al inicio</a>";
        }
    }
}





//funcion para encriptar contraseña
function crypt_blowfish($password)
{

    $salt = '$2a$07$usesomesillystringforsalt$';
    $pass = crypt($password, $salt);


    return $pass;
}
