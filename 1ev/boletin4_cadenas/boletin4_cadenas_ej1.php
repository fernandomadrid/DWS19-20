<?php
$correo = "tony3fk@gmail.com";

if (mb_strpos($correo, "@") !== false) { // lee la posicion de @ siempre que exista.

    $trozosArroba = explode("@", $correo);//crea un array [0]lo que hay antes de la arroba y [1] lo que hay después.

    if (mb_strpos($trozosArroba[1], ".") !== false) {//desde el array[1] lee la posicion del "."

        $trozosPunto = explode(".", $trozosArroba[1]);//crea otro array con la lo que hay antes del "." y lo que hay después.

        echo "Nombre de Email es <b>$trozosArroba[0]</b><br>";
        
        echo "Dominio es <b>$trozosPunto[0]</b>";
        
    } else {
        
        echo "No incluye el caracter '.' despues de la arroba";
    }
    
} else {
    
    echo "No incluye el caracter '@'";
}

?>