<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
    <title>Información Alimentos</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="<?php echo 'css/' . Config::$mvc_vis_css ?>" />

</head>

<body>
    <div id="cabecera">
        <h1>LOGIN</h1>

    </div>
    <div id="login">
        <form action="index.php?ctl=login" method="POST">
            <input type="text" placeholder="Username" name="user" required />
            <br><br>
            <input type="password" placeholder="Password" name="password" required />
            <br><br>
            <input class="bg-success" type="submit" value="Iniciar sesión" name="bLogin" />
            <hr>
            <h5 class="text-light">No tienes cuenta?</h5>
            <input type="submit" value="Regístrate" name="bRegister" />
        </form>

    </div>

    <div>
        <?php echo $params['mensaje'];
        ?>
    </div>



    <div id="pie">
        <hr />
        <div align="center">- pie de página -</div>
    </div>
</body>

</html>
