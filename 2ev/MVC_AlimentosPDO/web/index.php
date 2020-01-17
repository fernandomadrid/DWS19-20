<?php
// web/index.php

// carga del modelo y los controladores

require_once __DIR__ . '/../app/Config.php';
require_once __DIR__ . '/../app/Model.php';
require_once __DIR__ . '/../app/Controller.php';

session_start();
//inicializamos nivel 0 para usuarios no logueados
if (!isset($_SESSION['acceso'])) {
	$_SESSION['acceso'] = 0;
}

// enrutamiento
//añadimos el elemento acceso para controlar el nivel de usuario que tiene que tener para acceder
//nivel 0 para acceso a todos los usuarios incluso no logueados
$map = array(
	'inicio' => array('controller' => 'Controller', 'action' => 'login' /*<---Aquí ponía inicio*/, 'acceso' => 0),

	'listar' => array('controller' => 'Controller', 'action' => 'listar', 'acceso' => 0),
	'insertar' => array('controller' => 'Controller', 'action' => 'insertar', 'acceso' => 0),
	'buscar' => array('controller' => 'Controller', 'action' => 'buscarPorNombre', 'acceso' => 0),
	'buscarPorEnergia' => array('controller' => 'Controller', 'action' => 'buscarPorEnergia', 'acceso' => 0),
	'ver' => array('controller' => 'Controller', 'action' => 'ver', 'acceso' => 0)
);

// Parseo de la ruta
if (isset($_GET['ctl'])) {
	if (isset($map[$_GET['ctl']])) {
		$ruta = $_GET['ctl'];
	} else {
		//Si la opción seleccionada no existe en el array de mapeo, mostramos pantalla de error
		header('Status: 404 Not Found');
		echo '<html><body><h1>Error 404: No existe la ruta <i>' .
			$_GET['ctl'] . '</p></body></html>';
		exit;
	}
} else {
	//Si no se ha seleccionado nada mostraremos pantalla de inicio
	$ruta = 'inicio'; /*<---Aquí ponía login*/
}

$controlador = $map[$ruta];
//Cargamos el asociado a la acción seleccionada por el usuario 

// Ejecución del controlador asociado a la ruta
if (method_exists($controlador['controller'], $controlador['action'])) {
	call_user_func(array(new $controlador['controller'], $controlador['action']));
} else {
	//Si no existe controlador asociado a la acción, mostramos pantalla de error
	header('Status: 404 Not Found');
	echo '<html><body><h1>Error 404: El controlador <i>' .
		$controlador['controller'] . '->' .	$controlador['action'] . '</i> no existe</h1></body></html>';
}
