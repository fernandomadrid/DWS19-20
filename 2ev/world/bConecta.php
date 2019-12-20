<?php
//Sacamos los datos de configuración a la BD a un fichero de configuración config.php

include_once ("config.php");


 

    
    /*1.2 --> Establecer objeto de conexi�n*/
try{
    
	$pdo = new PDO('mysql:host=' . $db_hostname . ';dbname=' . $db_nombre . '', $db_usuario, $db_clave, $opciones);
    //echo "Conexión establecida<br>";
    
}catch(PDOException $error){
	echo "Fallo en la conexion prim..." . $error->getMessage()."<br>";
}


       


function InsertUser($user, $password, $pdo){
    
    /*Creamos un variable que llama al m�todo prepare() del objeto de conexi�n (PDO)*/
    $insert = $pdo->prepare('INSERT INTO usuarios VALUES (:user, :pass)');

    /*Usando la variable que llama al m�todo prepare (en este caso $insert) le decimos a que variables pertenecen los parametos pasados en VALUES */
    $insert->bindParam(':user', $user);
    $insert->bindParam(':pass', $password);
    

    /*Ejecutamos el insert a la base de datos con el método execute()*/
    if(!$insert->execute()){
        return 0;
    }else{
        return 1;
        
    }
}

function SelectUser($user, $password, $pdo){

    $select = $pdo->prepare('SELECT * FROM usuarios WHERE usuario=:user');
    $select->bindParam(':user', $user);
    $select->execute();
    $registro = $select->fetch();
    return $registro;
}

function SelectCountry($pdo){
    

    $select = $pdo->prepare('SELECT * FROM country');
    
    $select->execute();
    $registro = $select->fetch();
    return $registro;

}
            
        
    


?>