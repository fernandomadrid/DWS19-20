<?php


class Session
{




    public function init()
    {
        session_start();
    }

    public function setSession($user, $nivel, $ciudad, $temperatura)
    {

        $_SESSION['user'] = $user;
        $_SESSION['nivel'] = $nivel;
        $_SESSION['time'] = time();
        $_SESSION['ciudad'] = $ciudad;
        $_SESSION['temp'] = $temperatura;
    }

    public function get($key)
    {
        return !empty($_SESSION[$key]) ? $_SESSION[$key] : null;
    }


    public function getAll()
    {
        return $_SESSION;
    }

    public function remove($key)
    {
        if (!empty($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }



    public function cerrarSesion()
    {
        session_unset();
        session_destroy();
    }
    public function getStatus()
    {
        return session_status();
    }
}
