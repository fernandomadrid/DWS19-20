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
            header('location: index.php?fallo=true');
            
        }
    
    
    
    }else{ //se registra, insert del usuario

        if($user!="" && $password!=""){

            try{
                if(insertUser($user, $password, $pdo)){
                   
                
                    echo "Usuario registrado!";
                }
            }catch (Exception $e) {
                if ($e->getCode() == 23000) 
                    header('location: index.php?fallo=reg');
                else
                    echo "<br>".$e->getMessage()."<br><br>";  
                echo "<a href=index.php>Volver al inicio</a>";
             }
        }



    }
    //include("index.html");


    function crypt_blowfish($password) {

        $salt = '$2a$07$usesomesillystringforsalt$';
        $pass= crypt($password, $salt);

        //echo "<br> SALT $salt <br>" ;
        return $pass;
    }
