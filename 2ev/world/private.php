<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
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

            <li class="nav-item">
                <a class="nav-link" href="salir.php">Logout</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="#"><?php echo $_SESSION['user']; ?></a>
            </li>
        </ul>
    </nav>
    <h1>Países del Mundo</h1>

    <?php
  include('config.php');
  $link = new PDO('mysql:host=' . $db_hostname . ';dbname=' . $db_nombre,  $db_usuario, $db_clave, $opciones);

  ?>

    <table class="table table-striped">

        <thead>
            <tr>
                <th>NOMBRE</th>
                <th>CONTINENTE</th>
                <th>REGION</th>
                <th>SUPERFICIE</th>
                <th>POBLACION</th>
                <th>ESPERANZA_DE_VIDA</th>
                <th>TIPO_DE_GOBIERNO</th>

            </tr>
        </thead>
        <?php
    foreach ($link->query('SELECT * from country ORDER BY name') as $row) { // aca puedes hacer la consulta e iterarla con each. 
    ?>
        <tr>
            <td><a href="paises.php/?valor=<?php echo $row['Code'] ?>"><?php echo $row['Name'] // aca te faltaba poner los echo para que se muestre el valor de la variable.  
                                                                    ?></a>
            </td>
            <td><?php echo $row['Continent'] ?></td>
            <td><?php echo $row['Region'] ?></td>
            <td><?php echo $row['SurfaceArea'] ?></td>
            <td><?php echo $row['Population'] ?></td>
            <td><?php echo $row['LifeExpectancy'] ?></td>
            <td><?php echo $row['GovernmentForm'] ?></td>
        </tr>
        <?php
    }
    ?>
    </table>

</body>

</html>
