
<?php 

    include ("bGeneral.php");
    include('bConecta.php');
    session_start();
    cabecera("Validar");

    $user=recoge("user");
    $password=recoge("password");


    if (isset($_POST['bLogin'])){ //si pulsa login


        

        if (!strcmp($user,"root") && !strcmp($password, "super")){
            $_SESSION['acceso']=1;
            $_SESSION['user']='root';
            header('location:privada.php');
        }else{
            echo "Acceso Denegado";
        }
    }else{ //sino se registra



    }
    include("index.html");
    
?>