<?php 

    include ("biblioteca.php");
    session_start();
    cabecera("Comprobar");


    if (isset($_POST['bSubmit'])){
        if (!strcmp(recoge("user"),"root") && !strcmp(recoge("password", "super"))){
            $_SESSION['acceso']=1;
            $_SESSION['user']='root';
            header('location:privada.php');
        }else{
            echo "Acceso Denegado";
        }
    }
    include("index.html");
    
?>