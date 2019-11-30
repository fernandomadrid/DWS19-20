 <?php
	include 'validaciones.php';

	if (isset($_POST['boton'])) {
		$nombre = $_POST['nombre'];
		$user = $_POST['user'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$fnac = $_POST['fnac'];
		$nombre_foto = time() . $_FILES['foto']['name']; //agregada la hora tipo unix para convertir en nombre de la imagen en único
		$tipo_foto = $_FILES['foto']['type'];
		$tamano_foto = $_FILES['foto']['size'];
		$destino = $_SERVER['DOCUMENT_ROOT'] . '/imagenes/'; //destino de las imagenes
	}
	if (validar($nombre, $user, $password, $email, $fnac, $nombre_foto, $tipo_foto, $tamano_foto)) {
		//Si todas las comprobaciones son correctas, escritura en el fichero usuarios.txt
		$ruta = "usuarios.txt";
		if ($archivo = fopen($ruta, "a+")) { //abrimos archivo para escritura y lectura "a+" y hacemos comprobación de apertura.

			//escribirá en la posición donde esté apuntado el puntero, por lo general, si abrimos en "a", apuntará al final.
			fwrite($archivo, "$nombre;$user;$password;$email;$fnac;$destino $nombre_foto \r\n");
			echo "Usuario añadido correctamente";
			fclose($archivo);
			header("Location: menufinal.php"); //abre un nuevo htmlpara mostrar el menú
		} else {
			echo "No se ha podido abrir el archivo $ruta";
		}
	}

	?>


