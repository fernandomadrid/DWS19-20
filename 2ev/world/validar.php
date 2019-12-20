
<?php 

    include ("bGeneral.php");
    include('bConecta.php');
    session_start();
    cabecera("Validar");

    $user=recoge("user");
    $password=crypt_blowfish(recoge("password"));


    if (isset($_POST['bLogin'])){ //si pulsa login

        $registro=SelectUser($user, $password, $pdo);
        
        if (!strcmp($user, $registro['usuario']) && !strcmp($password, $registro['clave'])){
            $_SESSION['acceso']=1;
            $_SESSION['user']=$registro['usuario'];
            header('location:private.php');
        }else{
            echo "Acceso Denegado";
        }
    
    
    
    }else{ //se registra, insert del usuario

        if(!insertUser($user, $password, $pdo)){
            echo "error al insertar, ya existe el registro";
        }else{
            echo "usuario registrado!";
        }



    }
    //include("index.html");


    function crypt_blowfish($password) {

        $salt = '$2a$07$usesomesillystringforsalt$';
        $pass= crypt($password, $salt);

        //echo "<br> SALT $salt <br>" ;
        return $pass;
    }
    
?>