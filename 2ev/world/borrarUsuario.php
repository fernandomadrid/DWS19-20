<?php
include("bGeneral.php");
include('bConecta.php');
session_start();
//página que gestiona el borrado de usuarios desde el menú de administrador, llama a la funcion deleteUser en bConecta.php
if (isset($_POST['bDelete'])) {
    $user = $_GET['user'];
    if ($user != $_SESSION['user']) { //sólo deja que sea eliminado un usuario si no es el mismo usuario conectado
        DeleteUser($user, $pdo);
        header("Location: admin.php");
    } else {

        echo "<script>
                alert('No puedes eliminarte a ti mismo!!');
                window.location= 'admin.php'
            </script>";
    }
}
