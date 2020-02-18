<?php


function sinEspacios($frase)
{
    $texto = trim(preg_replace('/ +/', ' ', $frase));
    return $texto;
}

function recoge($var)
{
    if (isset($_REQUEST[$var]))
        $tmp = strip_tags(sinEspacios($_REQUEST[$var]));
    else
        $tmp = "";

    return $tmp;
}

//funcion para encriptar contraseña
/*function crypt_blowfish($password)
{

    $salt = '$2a$07$usesomesillystringforsalt$';
    $pass = crypt($password, $salt);


    return $pass;
}*/
