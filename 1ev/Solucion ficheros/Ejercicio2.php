<!DOCTYPE html>
		<html lang="es">
			<head>
				<title>
					Ejercicio 2		
				</title>
				<meta charset="utf-8"/>
			</head>
		<body>

<?php
function obtenerSuma ($ruta) 
	{
		$suma=0;
		if (is_file ($ruta)){
			if ($archivo=fopen ($ruta, "r"))
			{
				While (!feof($archivo))
				{
				    //Con trim quitamos los saltos de línea
					$numero=fgets ($archivo);
					$suma+=intval($numero);
				}
				return $suma;
				fclose ($archivo);
			}
			else 
			    return false;	
		}
		else
		    return false;	
	}

	
	//Llamamos a la función
	$rutaCompleta="ficheros/numeros.txt";
	echo ($suma=obtenerSuma($rutaCompleta))?$suma:"Ha habido un error";
?>

</body>
</html>