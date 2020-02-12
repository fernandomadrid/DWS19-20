<!-- Aqui podemos mostrar los errores en el caso de que los haya -->
<?php
if (is_object($validacion)) {
    foreach ($validacion->mensaje as $errores) {
        foreach ($errores as $error)
            echo $error . '<br>';
    }
}
?>
<form ACTION="" METHOD='post'>

    Nombre: <input TYPE="text" NAME="nombre" VALUE="<?php echo $datos['nombre']; ?>">
    <br>
    Edad: <input TYPE="text" NAME="edad" VALUE="<?php echo $datos['edad'] ?>">
    <br>
    Nombre: <input TYPE="mail" NAME="mail" VALUE="<?php echo $datos['mail']; ?>">
    <br>
    <input TYPE="submit" name="bAceptar" VALUE="aceptar">