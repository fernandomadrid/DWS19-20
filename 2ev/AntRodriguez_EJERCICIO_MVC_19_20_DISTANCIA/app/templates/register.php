<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
    <title>Información Alimentos</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="<?php echo 'css/' . Config::$mvc_vis_css ?>" />

</head>

<body>
    <div id="cabecera">
        <h1>REGISTRO</h1>

    </div>
    <div id="register">
        <form action="index.php?ctl=register" method="POST">
            <input type="text" placeholder="Username" name="user" required />
            <br><br>
            <input type="password" placeholder="Password" name="password" required />
            <br><br>
            <input type="email" placeholder="Email" name="email" required />
            <br><br>
            <input type="text" placeholder="Ciudad" name="ciudad" required />
            <br><br>
            <input class="bg-success" type="submit" value="Registrarse" name="bRegister" />
            <hr>

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