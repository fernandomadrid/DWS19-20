<?php
if (! empty($errores)) {
  foreach ($errores as $error) {
    echo "$error";
    echo "<br>";
  }
}

?>
<form method="POST" action="<?php $_SERVER ['PHP_SELF']?>" enctype="multipart/form-data">
  DATOS DEL ALUMNO:<br>
  Introduzca su nombre <input type="text" name="nombre" size="20"><br>
  Introduzca su teléfono <input type="text" name="telefono" size="10"><br>
  Matriculado <input type="checkbox" name="matriculado" checked><br>
  Enseñanza:<br>
  <input type="radio" value="Secundaria" name="enseñanza" >Secundaria
  <input type="radio" value="Bachillerato" name="enseñanza">Bachillerato
  <input type="radio" value="Ciclo medio" name="enseñanza">Ciclo medio
  <input type="radio" value="Ciclo superior" checked name="enseñanza">Ciclo superior<br>
  <br>
  Mostrar datos:
  <select size="1" name="mostrar">
    <option selected value="pantalla">Por Pantalla</option>
    <option value="archivo">En Archivo datos.txt</option>
  </select><br>
  <input type="submit" value="Enviar datos" name="enviar">
</form>
