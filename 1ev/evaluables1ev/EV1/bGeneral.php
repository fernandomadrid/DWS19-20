<?php

define('PATRON_NOMBRE', "/^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/");
define('PATRON_USUARIO', "/^[a-zA-Z0-9_$*\s]+$/");
define('PATRON_PASSWORD', "/^[a-zA-Z_$\s0-9]+$/");
define('PATRON_EMAIL', "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/");





function cabecera($titulo) //el archivo actual
{
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>
            <?php
                echo $titulo;
                ?>

        </title>
        <meta charset="utf-8" />

    </head>

    <body>

    <?php
    }

    function pie()
    {
        echo "
        <h3>Antonio Rodríguez Jiménez</h3>
        </body>
	</html>";
    }





    function recoge($var)
    {
        if (isset($_REQUEST[$var]))
            $tmp = strip_tags(sinEspacios($_REQUEST[$var]));
        else
            $tmp = "";

        return $tmp;
    }
    function sinEspacios($text)
    {
        $texto = trim(preg_replace('/ +/', ' ', $text));
        return $texto;
    }


    function cNombre($text)
    {
        if (preg_match(PATRON_NOMBRE, $text) && mb_strlen($text) <= 40)
            return 1;
        else
            return 0;
    }


    function cUsuario($text)
    {
        if (preg_match(PATRON_USUARIO, $text))
            return 1;
        else
            return 0;
    }
    function cPassword($text)
    {
        if (preg_match(PATRON_PASSWORD, $text) && mb_strlen($text) >= 8)
            return 1;
        else
            return 0;
    }
    function cEmail($text)
    {
        if (preg_match(PATRON_EMAIL, $text))
            return 1;
        else
            return 0;
    }

    function cEdad($text)
    {

        $actual = date("Y-m-d", time());


        $datetime1 = new DateTime($text);
        $datetime2 = new DateTime($actual);
        $interval = $datetime1->diff($datetime2);
        $dias = $interval->format('%R%a');
        $diasmayoriadeedad = 6570;
        if ($dias > $diasmayoriadeedad)
            return 1;
        else
            return 0;
    }

    function validaFoto($tipo_foto, $tamano_foto)
    {

        //comprobaciones para la foto:
        if ($tamano_foto <= 200000 && ($tipo_foto == 'image/jpg' || $tipo_foto == 'image/jpeg' || $tipo_foto == 'image/gif')) {

            return true;
        } else {
            return false;
        }
    }

    function listarUsuarios($ruta)
    {

        if (!$archivo = fopen($ruta, "r")) { //abrimos archivo y hacemos comprobación de apertura.
            echo "No se ha podido abrir el archivo $ruta";
        } else {
            echo "El archivo $ruta se ha abierto para lectura<br><br>";

            //lectura con fgets() para leer línea a línea.
            while (!feof($archivo)) { //mientras no fin de fichero
                $linea = fgets($archivo); //leer linea
                echo $linea . "<br>"; //mostrar linea
            }
        }
    }


    ?>