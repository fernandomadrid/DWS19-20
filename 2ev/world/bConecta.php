<?php
//Datos de configuración a la BD en el fichero de configuración config.php

include_once("config.php");


try {

    $pdo = new PDO('mysql:host=' . $db_hostname . ';dbname=' . $db_nombre . '', $db_usuario, $db_clave, $opciones);
    //echo "Conexión establecida<br>";

} catch (PDOException $error) {
    echo "Fallo en la conexion prim..." . $error->getMessage() . "<br>";
}

//funcion para insertar nuevos usuarios
function InsertUser($user, $password, $pdo)
{
    $fecha = date("d-m-Y H:i:s", time());

    $insert = $pdo->prepare('INSERT INTO usuarios VALUES (:user, :pass, :fecha)');


    $insert->bindParam(':user', $user);
    $insert->bindParam(':pass', $password);
    $insert->bindParam(':fecha', $fecha); //se añade la fecha actual de creación del usuario



    if (!$insert->execute()) {
        return 0;
    } else {
        return 1;
    }
}


//función que devuelve un registro de la tabla usuarios
function SelectUser($user, $password, $pdo)
{

    $select = $pdo->prepare('SELECT * FROM usuarios WHERE usuario=:user');
    $select->bindParam(':user', $user);
    $select->execute();
    $registro = $select->fetch();
    return $registro;
}


//función que devuelve los datos del país elegido
function SelectCountry($pdo)
{

    $select = $pdo->prepare('SELECT * FROM country');
    $select->execute();
    $registro = $select->fetch();
    return $registro;
}

//función que elimina un registro de la tabla de usuarios
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
