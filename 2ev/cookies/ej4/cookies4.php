<?php/*

if (empty($_COOKIE["fecha"])) {
    echo "Actualiza para crear la cookie";
    setcookie("nombre", "Tony Rodz", time() + 60);
    setcookie("fecha", date("H:i:s -- d/m/Y", time()), time() + 60);
}
echo "la fecha de creación de esta cookie fue el " . $_COOKIE["fecha"] . " por " . $_COOKIE['nombre'];*/
    $fecha = getdate(time());
    $dia = $fecha["mday"] . "/" . $fecha["mon"] . "/" . $fecha["year"];
    $hora = $fecha["hours"] . ":" . $fecha["minutes"] . ":" . $fecha["seconds"];
    setcookie("Momento[Fecha]", $dia, time() + (3600 * 24 * 7));
    setcookie("Momento[Hora]", $hora, time() + (3600 * 24 * 7));



if (empty($_COOKIE["Veces"])) {
    setcookie("Veces", 1, time() + (3600 * 24 * 7));
}else {
    setcookie("Veces", $_COOKIE["Veces"] + 1, time() + (3600 * 24 * 7));
    $Fecha_anterior = $_COOKIE["Momento"]["Fecha"];
    $Hora_anterior = $_COOKIE["Momento"]["Hora"];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
    if (isset($Fecha_anterior)) { 
        echo "Usted visitó esta página por última vez el<B>$Fecha_anterior</B> a las <B>$Hora_anterior</B>"; 
        echo "<BR>Ha visitado esta página un total de: <B>" .$_COOKIE["Veces"] . "</B> veces.";
     } else { 
         echo "Bienvenido a nuestra página web.";
     }
     ?>
</body>
</html>