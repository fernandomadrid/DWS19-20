<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Pruebas</title>
</head>
<body>

<?php

/*******EJEMPLO B�SICO*******/


/*1.1 --> Creamos el array de opciones */
$opciones = array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_PERSISTENT => true );
/*1.2 --> Establecer objeto de conexi�n*/
try{
	$pdo = new PDO("mysql:host=localhost;dbname=tienda","tienda", "tienda", $opciones);
	echo "Conexión establecida<br>";
}catch(PDOException $error){
	echo "Fallo en la conexion prim..." . $error->getMessage()."<br>";
}


/***EJEMPLO DE INSERT***/
/*2.1 --> Debemos tener los datos almacenados en variables para pasarlos por parámetro*/
$nif = '77777777G';
$nombre = 'Geralt de Rivia';
$direccion = 'Kaer Morhen, s/n';
$email = 'elwitcher@gmail.com';
$telefono = '614783502';

/*2.2 --> Creamos un variable que llama al m�todo prepare() del objeto de conexi�n (PDO)*/
$insert = $pdo->prepare('INSERT INTO clientes (nif, nombre, direccion, email, telefono) VALUES (:nif, :nombre, :direccion, :email, :telefono)');

/*2.3 --> Usando la variable que llama al m�todo prepare (en este caso $insert) le decimos a que variables pertenecen los parametos pasados en VALUES */
$insert->bindParam(':nif', $nif);
$insert->bindParam(':nombre', $nombre);
$insert->bindParam(':direccion', $direccion);
$insert->bindParam(':email', $email);
$insert->bindParam('telefono', $telefono);

/*2.3 --> Ejecutamos el insert a la base de datos con el método execute()*/
if($insert->execute()){
	echo "Éxito al insertar<br>";
}else{
	echo "No se ha podido insertar";
}

/***EJEMPLO DE SELECT***/
/*3.1 --> Al igual que con el insert creamos un variable en la que almacenamos la función prepare() del PDO solo que en esta ocasión ejecutaremos una select */
$select = $pdo->prepare('SELECT nombre, email FROM clientes');

/*3.2 --> Ejecutamos la consulta con execute()*/
$select->execute();

/*3.3 --> Como el resultado es un array y queremos mostrar los resultados lo recorremos con un while. La función fetch devolverá false cuando no queden más
 * registros y el bucle se detendrá */
while($registro = $select->fetch()){
	echo "Nombre: " . $registro['nombre'] . "<br>";
	echo "Email: " . $registro['email'] . "<br>";
}


?>


</body>
</html>