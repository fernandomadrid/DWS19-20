<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Ciudades</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    
    
    <?php
  
      include('config.php');
      $link = new PDO('mysql:host='.$db_hostname.';dbname='.$db_nombre,  $db_usuario, $db_clave);
      
      $code=$_GET['valor'];
      

    ?>
    <h1>Ciudades e Idiomas hablados en <?php echo $code; ?> </h1>
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
     foreach ( $link->query("SELECT * FROM city WHERE CountryCode='".$code."'") as $row){ // aca puedes hacer la consulta e iterarla con each. ?> 
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
     foreach ( $link->query("SELECT * FROM countrylanguage WHERE CountryCode='".$code."'") as $row){ // aca puedes hacer la consulta e iterarla con each. ?> 
    <tr>
        
        <td><?php echo $row['Language'] ?></td>
        <td><?php echo $row['Percentage']. " %" ?></td>
        
    </tr>
    <?php
      }
    ?>
    </table>
    </div>
    </div>
  </body>
</html>









