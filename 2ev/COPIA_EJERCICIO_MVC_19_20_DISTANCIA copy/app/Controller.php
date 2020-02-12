<?php
include_once('libs/usoClassValidacion.php');
include('libs/sessionClass.php');
include('libs/enviaMail.php');
include('libs/classValidacion.php');



class Controller
{


    public function login()
    {
        $params['mensaje'] = "";
        $params['user'] = recoge("user");
        $params['password'] = recoge('password');
        try {
            $validacion = new Validacion();
            $regla = array(
                array(
                    'name' => 'user',
                    'regla' => 'no-empty,letras'
                ),
                array(
                    'name' => 'password',
                    'regla' => 'no-empty'
                )

            );

            $validaciones = $validacion->rules($regla, $params);
            // La clase nos devolverá true si no ha habido errores y un objeto con que incluye los errores en un array


            // Si no ha habido problema creo modelo y hago inserción
            if ($validaciones === true) {

                $m = new Model();
                $sesion = new Session; //creo sesion


                if (isset($_POST['bLogin'])) { // si se pulsa login

                    if ($registro = $m->SelectUser($params)) {

                        $sesion->cerrarSesion(); //cierra sesion de invitado
                        $sesion->init(); //inicia sesion de usuario registrado

                        include('libs/clima.php'); //archivo con la funcion API del tiempo
                        $temperatura = weather($registro['ciudad']); //llamada a la función que retorna la temperatura de la ciudad
                        $sesion->setSession($params['user'], $registro['nivel'], $registro['ciudad'], $temperatura); //establece el user, el nivel a la sesion, la ciudad y la temperatura
                        header('location: index.php?ctl=inicio');
                    } else {

                        $params['mensaje'] = 'Usuario o contraseña incorrectos.';
                    }
                }
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }






        require __DIR__ . '/templates/login.php';
    }







    function register()
    {
        $params['mensaje'] = "";

        $params['user'] = recoge("user");
        $params['password'] = recoge('password');
        $params['email'] = recoge("email");
        $params['ciudad'] = recoge('ciudad');

        try {
            $validacion = new Validacion();
            $regla = array(
                array(
                    'name' => 'user',
                    'regla' => 'no-empty,letras'
                ),
                array(
                    'name' => 'password',
                    'regla' => 'no-empty'
                ),
                array(
                    'name' => 'email',
                    'regla' => 'no-empty,email'
                ),
                array(
                    'name' => 'ciudad',
                    'regla' => 'no-empty,letras'
                )

            );

            $validaciones = $validacion->rules($regla, $params);
            // La clase nos devolverá true si no ha habido errores y un objeto con que incluye los errores en un array

        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        // Si no ha habido problema creo modelo y hago inserción
        if ($validaciones === true) {

            $m = new Model();
            if ($m->InsertUser($params)) {
                header('location: index.php?ctl=login');
            } else {

                header('Location: index.php?ctl=error');

                $_SESSION['message'] = 'No se ha podido insertar el alimento. Revisa el formulario';
            }
        } else {

            // Ahora nos sirve para ver lo que devuelve la clase
            echo "<pre>";
            print_r($validaciones);
            echo "</pre><br>";
        }



        require __DIR__ . '/templates/register.php';
    }



    public function inicio()
    {
        $params = array(
            'mensaje' => 'Bienvenido al repositorio de alimentos',
            'fecha' => date('d-m-yy')
        );
        require __DIR__ . '/templates/inicio.php';
    }

    public function error()
    {

        require 'templates/error.php';
    }
    public function errorDeRuta()
    {
        require __DIR__ . '/templates/errorderuta.php';
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
        //include_once 'classValidacion.php';
        $params['nombre'] = "";
        $params['energia'] = "";
        $params['proteina'] = "";
        $params['hc'] = "";
        $params['fibra'] = "";
        $params['grasa'] = "";
        $validacion = false;


        if (isset($_REQUEST['bInsertar'])) {

            // recogemos los datos de forma segura
            $params['nombre'] = recoge("nombre");
            $params['energia'] = recoge('energia');
            $params['proteina'] = recoge('proteina');
            $params['hc'] = recoge("hc");
            $params['fibra'] = recoge("fibra");
            $params['grasa'] = recoge("grasa");

            // validamos
            // el uso de la clase es muy sencillo os dejo las pruebas que realice a la clase
            try {
                $validacion = new Validacion();
                $regla = array(
                    array(
                        'name' => 'nombre',
                        'regla' => 'no-empty,letras'
                    ),
                    array(
                        'name' => 'energia',
                        'regla' => 'no-empty,numeric'
                    ),
                    array(
                        'name' => 'proteina',
                        'regla' => 'no-empty,numeric'
                    ),
                    array(
                        'name' => 'hc',
                        'regla' => 'no-empty,numeric'
                    ),
                    array(
                        'name' => 'fibra',
                        'regla' => 'no-empty,numeric'
                    ),
                    array(
                        'name' => 'grasa',
                        'regla' => 'no-empty,numeric'
                    )

                );

                $validaciones = $validacion->rules($regla, $params);
                // La clase nos devolverá true si no ha habido errores y un objeto con que incluye los errores en un array
                // Ahora nos sirve para ver lo que devuelve la clase
                echo "<pre>";
                print_r($validaciones);
                echo "</pre><br>";
            } catch (Exception $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
                header('Location: index.php?ctl=error');
            } catch (Error $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
                header('Location: index.php?ctl=error');
            }

            // Si no ha habido problema creo modelo y hago inserción
            if ($validaciones === true) {

                $m = new Model();
                if ($m->insertarAlimento($params)) {
                    header('location: index.php?ctl=listar');
                } else {

                    header('Location: index.php?ctl=error');

                    $_SESSION['message'] = 'No se ha podido insertar el alimento. Revisa el formulario';
                }
            } else {
                include 'templates/formInsertar.php';
            }
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


    public function buscarAlimentosPorEnergia()
    {
        try {
            $params = array(
                'energia' => '',
                'resultado' => array()
            );
            $m = new Model();
            if (isset($_POST['buscar'])) {
                $energia = recoge("energia");
                $params['energia'] = $energia;
                $params['resultado'] = $m->buscarAlimentosPorEnergia($energia);
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . '/templates/buscarPorEnergia.php';
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



    public function salir()
    {
        session_destroy();
        header('Location: index.php?ctl=login');
    }


    public function email($email)
    {

        $para = $email; //aquí mail del registrado
        $asunto = "Alta repositorio de alimentos";
        $mensaje = "<hr>";
        $mensaje .= "<h2>Bienvenido al repositorio de alimentos </h2><br>";
        $mensaje .= "<hr>";

        // Para enviar correo HTML, la cabecera Content-type debe definirse
        $cabeceras  = "MIME-Version: 1.0\n";
        $cabeceras .= "Content-type: text/html; charset=UTF-8\n";

        // Cabeceras adicionales
        $cabeceras .= "From: Tony <mail@yahoo.es>\n";
        $cabeceras .= "To: Tony <tony3fk@gmail.com>\n";
        $cabeceras .= "Reply-To: mail@gmail.com\n";
        $cabeceras .= "X-Mailer: PHP/" . phpversion();

        // Enviarlo
        if (mail($para, $asunto, $mensaje, $cabeceras)) {
            return true;
        }
    }
}
