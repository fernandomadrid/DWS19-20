<?php
// web/index.php
// carga del modelo y los controladores
require_once __DIR__ . '/../app/Config.php';
require_once __DIR__ . '/../app/Model.php';
require_once __DIR__ . '/../app/Controller.php';
require_once __DIR__ . '../../app/libs/sessionClass.php';




/*
Si tenemos que usar sesiones podemos poner aqui el inicio de sesión, de manera que si el usuario todavia no está logueado
lo identificamos como visitante, por ejemplo de la siguiente manera: $_SESSION['nivel_usuario']=0
*/

if (!isset($_SESSION)) {
    session_start();
    /*$_SESSION['user'] = "Invitado";
    $_SESSION['nivel'] = 0;*/
}



// enrutamiento
$map = array(
    /*
    En cada elemento podemos añadir una posición mas que se encargará de otorgar el nivel mínimo para ejecutar la acción
    Puede quedar de la siguiente manera
    'inicio' => array('controller' =>'Controller', 'action' =>'inicio', 'nivel_usuario'=>0)
    */
    'login' => array('controller' => 'Controller', 'action' => 'login', 'nivel' => 0),
    'register' => array('controller' => 'Controller', 'action' => 'register', 'nivel' => 0),
    'inicio' => array('controller' => 'Controller', 'action' => 'inicio', 'nivel' => 0),
    'listar' => array('controller' => 'Controller', 'action' => 'listar', 'nivel' => 0),
    'insertar' => array('controller' => 'Controller', 'action' => 'insertar', 'nivel' => 0),
    'buscar' => array('controller' => 'Controller', 'action' => 'buscarPorNombre', 'nivel' => 0),
    'ver' => array('controller' => 'Controller', 'action' => 'ver', 'nivel' => 0),
    'salir' => array('controller' => 'Controller', 'action' => 'salir', 'nivel' => 0),
    'error' => array('controller' => 'Controller', 'action' => 'error', 'nivel' => 0)
);


// Parseo de la ruta
if (isset($_GET['ctl'])) {
    if (isset($map[$_GET['ctl']])) {
        $ruta = $_GET['ctl'];
    } else {

        if ($_SESSION['nivel'] == 0) { //si no está logueado mostrará el mensaje sólamente
            //Si el valor puesto en ctl en la URL no existe en el array de mapeo escribe en el fichero logError.txt y envía una cabecera de error
            $errorMensaje = "Error 404: No existe la ruta " . $_GET['ctl'];
            errorsLog($errorMensaje);
            //header('../../app/libs/error.php');
            echo '<html><body><h1>Error 404: No existe la ruta <i>' . $_GET['ctl'] . '</p></body></html>';
            exit;
        } else { //si está logueado mostrará el mensaje con el menú
            //Si el valor puesto en ctl en la URL no existe en el array de mapeo escribe en el fichero logError.txt y envía una cabecera de error
            $errorMensaje = "Error 404: No existe la ruta " . $_GET['ctl'];
            errorsLog($errorMensaje);
            //header('../../app/libs/error.php');
            $contenido = '<html><body><h1>Error 404: No existe la ruta <i>' . $_GET['ctl'] . '</p></body></html>';
            exit;
        }
    }
} else {
    $ruta = 'login';
}
$controlador = $map[$ruta];
/* 
Comprobamos si el metodo correspondiente a la acción relacionada con el valor de ctl existe, si es así ejecutamos el método correspondiente.
En aso de no existir cabecera de error.
En caso de estar utilizando sesiones y permisos en las diferentes acciones comprobariaos tambien si el usuario tiene permiso suficiente para ejecutar esa acción
*/

if (method_exists($controlador['controller'], $controlador['action'])) { //comprobar aqui si el usuario tiene el nivel suficiente para ejecutar la accion
    //--------------control de nivel//

    /* if ($map[$ruta]['nivel'] == $_SESSION['nivel']) {*/
    call_user_func(array(new $controlador['controller'], $controlador['action']));
    /*} else {
        header('Status: 404 Not Found');
        echo '<html><body><h1>Error: No tiene privilegios para realizar esta acción.</h1></body></html>';
    }*/



    //--------------//
} else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: El controlador <i>' .
        $controlador['controller'] .
        '->' .
        $controlador['action'] .
        '</i> no existe</h1></body></html>';
}
