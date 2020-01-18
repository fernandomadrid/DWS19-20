<!DOCTYPE html>
<html lang="en">


<head>
    <title>Root Page</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php session_start(); ?>
    <nav class="navbar  navbar-expand-sm bg-dark navbar-dark justify-content-end ">

        <ul class="navbar-nav">
            <li>
                <p class="text-muted">Última visita el
                    <?php echo $_COOKIE[$_SESSION['user']]; ?>
                </p>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="#"><?php echo "Hola " .  $_SESSION['user']; ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-danger" href="salir.php">Salir</a>
            </li>
        </ul>
    </nav>
    <h1>Administración de usuarios</h1>

    <?php
    include('config.php');
    $link = new PDO('mysql:host=' . $db_hostname . ';dbname=' . $db_nombre,  $db_usuario, $db_clave, $opciones);

    ?>

    <table class="table table-striped">

        <thead>
            <tr>
                <th>USUARIO</th>
                <th>FECHA DE ALTA</th>
                <th>ACCIONES</th>

            </tr>
        </thead>
        <?php
        foreach ($link->query('SELECT * from usuarios ORDER BY usuario') as $row) {
        ?>
        <tr>

            <td><?php echo $row['usuario'];
                    $user = $row['usuario']; ?></td>
            <td><?php echo $row['fecha'] ?></td>
            <td>

                <form action="borrarUsuario.php?user=<?php echo $user; ?>" method="POST">
                    <input type="submit" class="btn btn-danger" value="Eliminar" name="bDelete">

                    </input>
                </form>

            </td>

        </tr>
        <?php
        }
        ?>
    </table>

</body>

</html>
