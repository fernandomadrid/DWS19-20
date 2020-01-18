<?php
//Datos de configuración a la BD en el fichero de configuración config.php

include_once("config.php");

try {

    $pdo = new PDO('mysql:host=' . $db_hostname . ';dbname=' . $db_nombre . '', $db_usuario, $db_clave, $opciones);
    //echo "Conexión establecida<br>";

} catch (PDOException $error) {
    echo "Fallo en la conexion prim..." . $error->getMessage() . "<br>";
}


function InsertUser($user, $password, $pdo)
{
    $fecha = date("d-m-Y H:i:s", time());
    /*Creamos un variable que llama al método prepare() del objeto de conexión (PDO)*/
    $insert = $pdo->prepare('INSERT INTO usuarios VALUES (:user, :pass, :fecha)');

    /*Usando la variable que llama al método prepare (en este caso $insert) le decimos a que variables pertenecen los parametos pasados en VALUES */
    $insert->bindParam(':user', $user);
    $insert->bindParam(':pass', $password);
    $insert->bindParam(':fecha', $fecha);


    /*Ejecutamos el insert a la base de datos con el método execute()*/
    if (!$insert->execute()) {
        return 0;
    } else {
        return 1;
    }
}

function SelectUser($user, $password, $pdo)
{ //función que devuelve un registro de la tabla usuarios

    $select = $pdo->prepare('SELECT * FROM usuarios WHERE usuario=:user');
    $select->bindParam(':user', $user);
    $select->execute();
    $registro = $select->fetch();
    return $registro;
}

function SelectCountry($pdo)
{ //función que devuelve los datos del país elegido

    $select = $pdo->prepare('SELECT * FROM country');
    $select->execute();
    $registro = $select->fetch();
    return $registro;
}
function DeleteUser($user, $pdo)
{
    $delete = $pdo->prepare('DELETE FROM usuarios WHERE usuario=:user');
    $delete->bindParam(':user', $user);
    if (!$delete->execute()) {
        return 0;
    } else {
        return 1;
    }
}
