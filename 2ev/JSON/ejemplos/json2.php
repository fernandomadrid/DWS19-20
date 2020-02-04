<?php

//Partimos de una estructura json cargada en una variable string y con la función json_decode podemos 
//convertirlo a array o a objeto

$json = '[{"id_fruta":"1","nombre_fruta":"Manzana","cantidad":"100"},{"id_fruta":"2","nombre_fruta":"Platano","cantidad":"167"},{"id_fruta":"3","nombre_fruta":"Pera","cantidad":"820"}]';

//Lo convertimos a objeto
$objeto = json_decode($json);
echo ("<pre>");

print_r($objeto);
echo ("</pre>");

echo $objeto[0]->nombre_fruta;
foreach($objeto as $obj){
        $id_fruta = $obj->id_fruta;
        $nombre_fruta = $obj->nombre_fruta;
        $cantidad = $obj->cantidad;
        echo $id_fruta." ".$nombre_fruta." ".$cantidad;
        echo "";
}
echo '<br>';

//Lo convertimos en array
$array = json_decode($json,true);
echo ("<pre>");

var_dump($array);

echo ("</pre>");

for($i=0;$i<count($array);$i++){ 
    $id_fruta=$array[$i]['id_fruta'];
    $nombre_fruta = $array[$i]['nombre_fruta'];
    $cantidad = $array[$i]['cantidad'];
    echo $id_fruta." ".$nombre_fruta." ".$cantidad;
    echo "";
}
?>