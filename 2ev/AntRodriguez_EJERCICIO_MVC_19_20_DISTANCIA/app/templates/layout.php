<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>

    <title>Información Alimentos</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="<?php echo 'css/' . Config::$mvc_vis_css ?>" />

</head>

<body>
    <div id="cabecera">


        <h2 style="text-align: right"><?php echo $_SESSION['ciudad'] . ", " . $_SESSION['temp'] . "ºC"; ?> </h2>
        <h2><?php echo "Hola " . $_SESSION['user']; ?></h2>
        <h1>Información de alimentos</h1>
    </div>

    <div id="menu">
        <hr />
        <a href="index.php?ctl=inicio">inicio</a> |
        <a href="index.php?ctl=listar">ver alimentos</a> |
        <a href="index.php?ctl=insertar">insertar alimento</a> |
        <a href="index.php?ctl=buscar">buscar por nombre</a> |
        <a href="index.php?ctl=buscarAlimentosPorEnergia">buscar por energia</a> |
        <a href="index.php?ctl=salir">Salir</a>
        <hr />
    </div>

    <div id="contenido">
        <?php echo $contenido ?>
    </div>

    <div id="pie">
        <hr />
        <div align="center">- pie de página -</div>
    </div>
</body>

</html>