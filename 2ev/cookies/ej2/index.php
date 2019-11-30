<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1 style="text-align:center">CREACIÓN Y DESTRUCCIÓN DE COOKIES</h1>
    <form action="cookies2.php" method="POST">
        Crear una cookies con una duración de <input type="text" name="tiempo" max="60" min="1"> segundos (entre 1 y 60)
        <input type="submit" name="crear" value="crear"><br><br>
        Comprobar la cookie <input type="submit" value="comprobar" name="comprobar">
        <br><br>
        Destruir la cookie <input type="submit" value="destruir" name="eliminar">
        <br><br>

    </form>
</body>

</html>