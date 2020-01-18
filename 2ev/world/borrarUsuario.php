<?php
include("bGeneral.php");
include('bConecta.php');
session_start();

if (isset($_POST['bDelete'])) {
    $user = $_GET['user'];
    if ($user != $_SESSION['user']) {
        DeleteUser($user, $pdo);
        header("Location: admin.php");
    } else {

        echo "<script>
                alert('No puedes eliminarte a ti mismo!!');
                window.location= 'admin.php'
            </script>";
    }
}
