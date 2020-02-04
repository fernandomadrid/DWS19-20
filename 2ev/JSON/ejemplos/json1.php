<?php

//Partimos de una estructura array o a objeto y con la función json_encode obtenemos una estructura json



class Usuario {
    public $nombre = "";
    public $apellido = "";
    public $fechaNacimiento = "";
}


$usuario = new Usuario;

$usuario->nombre = "Angelina";
$usuario->apellido = "Jolie";

//Así se muestra con la conversión a partir de un objeto
$json=json_encode($usuario);

echo ("Así se muestra con la conversión desde un objeto </br>");
print_r($json);
echo ("</br>");

// Devuelve: {"nombre": "Angelina", "apellido": "Jolie"}

$usuario->fechaNacimiento = new DateTime();
$json=json_encode($usuario);


echo ("</br>");

echo ("Así se muestra con la conversión desde un objeto </br>");
print_r($json);

echo ("</br>");


//Así se muestra con la conversión a partir de un array

echo ("</br>Así se muestra con la conversión desde un array </br>");

$json=json_encode(array("Oso"=> array("tipo"=>"polar"), "Gato"=>null));
print_r($json);




?>