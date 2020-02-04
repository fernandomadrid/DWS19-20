<meta charset="UTF-8">


<?php 
//ejemplo de uso de API de openweathermap

//Necesitamos un identificador de API

//http://home.openweathermap.org/

//Mostraremos la información de Londres
$html = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=London,uk&appid=96edde9f7c64ae00b99322b16b678542");
echo '<pre>';
print_r ($html);
echo '</pre>';
$json = json_decode($html);
echo '<pre>';
print_r ($json);
echo '</pre>';
$ciudad = $json->name;
$lat = $json->coord->lat;
$lon = $json->coord->lon;
$temp = $json->main->temp;
$tempmax = $json->main->temp_max;
$tempmin = $json->main->temp_min;
$presion = $json->main->pressure;
$humedad = $json->main->humidity;
$vel_viento = $json->main->temp;
$estado_cielo = $json->weather[0]->main;
$descripcion = $json->weather[0]->description;
echo "<h3>Ciudad: ".$ciudad." [lat = ".$lat. ", lon = ".$lon. " ]</h3>";
echo "<b>Estado del cielo: </b>".$estado_cielo."<br>";
echo "<b>Descripción: </b>".$descripcion."<br>";
echo "<br>";
echo "<b>Temperatura: </b>".$temp." K [Máx: ".$tempmax."K, Mín: ".$tempmin."K]<br>";
echo "<b>Presión: </b>".$presion."<br>";
echo "<b>Humedad: </b>".$humedad."<br>";
echo "<br>";
?>