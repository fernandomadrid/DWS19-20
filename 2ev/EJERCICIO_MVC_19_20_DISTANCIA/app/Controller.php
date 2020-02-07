<?php
include('libs/utils.php');
include('libs/sessionClass.php');

class Controller
{
    public function login()
    {
        $params['mensaje'] = "";
        $m = new Model;



        //Recojo y valido datos del formulario
        $user = recoge('user');
        $password = recoge('password')/*crypt_blowfish(recoge('password'))*/;


        if (isset($user) && isset($password)) { //compruebo si tengo datos 

            if (isset($_POST['bLogin'])) { // si se pulsa login

                if ($m->SelectUser($user, $password)) {

                    $user = $m->registro['user'];
                    $nivel = $m->registro['nivel'];
                    session_destroy();
                    $sesion = new Session($user, $nivel);

                    header('location: index.php?ctl=inicio');
                } else {

                    $params['mensaje'] = 'El usuario no está registrado';
                }
            }
        }

        /*
			si user está y pas correcto
			inicio $_SESSION, nivel, usuario, y nombre
			header a index ctl inicio*/


        //sino 
        //escribo mensaje en params

        require __DIR__ . '/templates/login.php';
    }
    function register()
    {
        $params['mensaje'] = "";
        $m = new Model;
        //Recojo y valido datos del formulario
        $user = recoge('user');
        $password = recoge('password') /*crypt_blowfish(recoge('password'))*/;
        $nivel = 1;
        $email = recoge('email');
        $ciudad = recoge('ciudad');
        if (isset($user) && isset($password) && _email($email) && isset($ciudad)) { //compruebo si tengo datos y si el email es correcto

            if (isset($_POST['bRegister'])) { //si se pulsa registrar

                //si correcto{
                //llamar modelo
                if ($m->InsertUser($user, $password, $email, $ciudad)) {
                    $params['mensaje'] = 'Registrado con éxito.';
                    header('Location: index.php?ctl=login');
                } else {

                    $params['mensaje'] = 'No se ha podido registrar el usuario o ya existe.';
                }
            }
        }
        require __DIR__ . '/templates/register.php';
    }

    public function inicio()
    {
        $params = array(
            'mensaje' => 'Bienvenido al repositorio de alimentos',
            'fecha' => date('d-m-yyy')
        );
        require __DIR__ . '/templates/inicio.php';
    }

    public function error()
    {
        require __DIR__ . '/templates/error.php';
    }

    public function listar()
    {
        try {
            $m = new Model();
            $params = array(
                'alimentos' => $m->dameAlimentos()
            );

            // Recogemos los dos tipos de excepciones que se pueden producir
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . '/templates/mostrarAlimentos.php';
    }

    public function insertar()
    {
        try {
            $params = array(
                'nombre' => '',
                'energia' => '',
                'proteina' => '',
                'hc' => '',
                'fibra' => '',
                'grasa' => ''
            );

            if (isset($_POST['insertar'])) {
                $nombre = recoge('nombre');
                $energia = recoge('energia');
                $proteina = recoge('proteina');
                $hc = recoge('hc');
                $fibra = recoge('fibra');
                $grasa = recoge('grasa');
                // comprobar campos formulario
                if (validarDatos($nombre, $energia, $proteina, $hc, $fibra, $grasa)) {

                    // Si no ha habido problema creo modelo y hago inserción
                    $m = new Model();
                    if ($m->insertarAlimento($nombre, $energia, $proteina, $hc, $fibra, $grasa)) {
                        header('Location: index.php?ctl=listar');
                    } else {
                        $params = array(
                            'nombre' => $nombre,
                            'energia' => $energia,
                            'proteina' => $proteina,
                            'hc' => $hc,
                            'fibra' => $fibra,
                            'grasa' => $grasa
                        );
                        $params['mensaje'] = 'No se ha podido insertar el alimento. Revisa el formulario';
                    }
                } else {
                    $params = array(
                        'nombre' => $nombre,
                        'energia' => $energia,
                        'proteina' => $proteina,
                        'hc' => $hc,
                        'fibra' => $fibra,
                        'grasa' => $grasa
                    );
                    $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario';
                }
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }

        require __DIR__ . '/templates/formInsertar.php';
    }

    public function buscarPorNombre()
    {
        try {
            $params = array(
                'nombre' => '',
                'resultado' => array()
            );
            $m = new Model();
            if (isset($_POST['buscar'])) {
                $nombre = recoge("nombre");
                $params['nombre'] = $nombre;
                $params['resultado'] = $m->buscarAlimentosPorNombre($nombre);
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . '/templates/buscarPorNombre.php';
    }



    public function ver()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception('Página no encontrada');
            }
            $id = recoge('id');
            $m = new Model();
            $alimento = $m->dameAlimento($id);
            $params = $alimento;
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }



        require __DIR__ . '/templates/verAlimento.php';
    }
}
