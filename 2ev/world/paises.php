<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ciudades</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <?php
    session_start();


    ?>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-end">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#"><?php echo "Hola " . $_SESSION['user']; ?></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-warning" href="../private.php">Volver</a>
            </li>


            <li class="nav-item active">
                <a class="nav-link text-danger" href="../salir.php">Salir</a>
            </li>


        </ul>
    </nav>

    <?php
    include('config.php');
    $link = new PDO('mysql:host=' . $db_hostname . ';dbname=' . $db_nombre,  $db_usuario, $db_clave, $opciones);
    $code = $_GET['valor']; //tomo el código del país del que quiero consultar datos por GET
    ?>

    <h1>Ciudades e Idiomas hablados en <?php echo $code; ?>
    </h1>

    <div class="jumbotron row">
        <div class="col-6">
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>POBLACION</th>


                    </tr>
                </thead>
                <?php
                foreach ($link->query("SELECT * FROM city WHERE CountryCode='" . $code . "'") as $row) { //consulta de las ciudades de un país dado en el code
                ?>
                <tr>

                    <td><?php echo $row['Name'] ?></td>
                    <td><?php echo $row['Population'] ?></td>

                </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <div class="col-6">
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>IDIOMA</th>
                        <th>PORCENTAJE HABLADO</th>


                    </tr>
                </thead>
                <?php
                foreach ($link->query("SELECT * FROM countrylanguage WHERE CountryCode='" . $code . "'") as $row) { //consulta de idioma en otra tabla
                ?>
                <tr>

                    <td><?php echo $row['Language'] ?></td>
                    <td><?php echo $row['Percentage'] . " %" ?></td>

                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>
