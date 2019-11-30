<form ACTION="" METHOD="POST">
	<p>
		Fecha 1: <input TYPE="text" name="fecha_1">
	</p>
	<p>
		Fecha 2: <input TYPE="text" name="fecha_2">
	</p>
	<p>
		<?php
if (isset($errores)) {
    foreach ($errores as $error) {
        echo "<br>Error: " . $error . "<br>";
    }
}
?>
		</p>
	<input TYPE="submit" name="Clear" VALUE="Limpiar">
	<input TYPE="submit" name="Send" VALUE="Enviar">
</form>