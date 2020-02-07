<?php


class Session
{
    public $user;
    public $nivel;


    public function __construct($user, $nivel)
    {
        $this->user = $user;
        $this->nivel = $nivel;
        $this->time = time();
        session_start();
        $this->setSession();
    }

    public function setSession()
    {

        $_SESSION['user'] = $this->user;
        $_SESSION['nivel'] = $this->nivel;
        $_SESSION['time'] = $this->time;
    }

    public function getTime()
    {
        return $_SESSION['time'];
    }
    public static function getUser()
    {
        return $_SESSION['user'];
    }
    public function getNivel()
    {
        return $_SESSION['nivel'];
    }



    public function cerrarSesion()
    {
        session_destroy();
        return true;
    }
}
