<!DOCTYPE html>
<html lang="es">
<head>
<title></title>
<meta charset="utf-8" />
</head>
<body>
<?PHP
// Ejemplo sencillo en el que vemos como llegan los datos al servidor

// Mostramos el contenido de $_REQUEST
echo "Contenido de REQUEST <br>";
echo "<pre>";
print_r($_REQUEST);
echo "</pre>";
// Mostramos el contenido de $_POST
echo "<br> Contenido de POST ";
echo "<pre>";
print_r($_POST);
echo "</pre>";
// Mostramos los contenidos de las variables
print("</br>La edad es: $_REQUEST[edad] <br>");
print("</br>La edad es: $_POST[edad] <br>");
print("</br>El nombre es:" . $_REQUEST['nombre'] . " <br>");
print("</br>El nombre es: $_POST[nombre] <br>");

?>
</body>
</html>