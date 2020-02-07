<?php


class Session
{
    private $user;
    private $nivel;
    private $time;

    function __construct($user, $nivel)
    {
        $this->user = $user;
        $this->nivel = $nivel;
        $this->time = time();
        session_start();


        return $this->setSession();
    }

    function setSession()
    {

        $_SESSION['nombre'] = $this->user;
        $_SESSION['nivel'] = $this->nivel;
        $_SESSION['time'] = time();
    }

    function getSession()
    {
        return $_SESSION;
    }



    function time()

    {
        return time();
    }


    function cerrarSesion()
    {
        session_destroy();
        return true;
    }
}
