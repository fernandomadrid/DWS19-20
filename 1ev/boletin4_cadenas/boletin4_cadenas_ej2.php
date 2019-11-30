
<?php

$frase="Esta es una frase de ejemplo";

$frase = trim($frase);// Quitamos los posibles espacios anteriores y posteriores

$palabras=explode(" ", $frase);

echo "La primera palabra es <b>$palabras[0]</b><br>";
echo "La segunda palabra es <b>$palabras[1]</b><br>";

    
    
?>