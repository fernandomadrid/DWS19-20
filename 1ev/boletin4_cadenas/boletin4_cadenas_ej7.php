<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Ejercicio 7</title>
</head>
<body>
<?php
$frase="ApRendEr proGraMaciÓn";
/*transformar la cadena a minúsculas y rellenarla a 
 * derecha e izquierda con una longitud de asteriscos igual a la mitad de su 
 * longitud si es par ó igual a la mitad de (su longitud más 1) si es impar.
 */ 
$frase = trim(preg_replace('/ +/', ' ', $frase));
$longCd=mb_strlen($frase);
//SI ES IMPAR LE SUMO 1
if ($longCd%2!=0)
    $longCd+1;
    
$cad=mb_strtolower($frase);
for ($i = 0; $i < $longCd/2; $i++) {
        $cad="*".$cad."*";
}
echo $cad;
?>
</body>
</html>