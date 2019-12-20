<?php

//Aqui incluimos los  datos de conexión a la BD

    $db_hostname = "localhost";
    $db_nombre = "world";
  //El usuario root núnca se puede usar, siempre cambiar por otro usuario
  //Nosotros lo usaremos para que nos funcionen a todos los ejemplos y los ejercicios
    $db_usuario = "root";
    $db_clave = "";

    $opciones = array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_PERSISTENT => true );
 