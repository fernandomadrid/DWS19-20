<?php
//Sacamos los datos de configuración a la BD a un fichero de configuración config.php

include_once ("config.php");


/*1.1 --> Creamos el array de opciones */
$opciones = array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_PERSISTENT => true );

    
    /*1.2 --> Establecer objeto de conexi�n*/
try{
	$pdo = new PDO('mysql:host=' . $db_hostname . ';dbname=' . $db_nombre . '', $db_usuario, $db_clave);
    //echo "Conexión establecida<br>";
    
}catch(PDOException $error){
	echo "Fallo en la conexion prim..." . $error->getMessage()."<br>";
}
            
            
        
    


?>