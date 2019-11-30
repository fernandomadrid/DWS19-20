<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
    include 'bGeneral.php';
    $nombre = recoge('nombre');
    if (cTexto($nombre)) {
        $usuario = recoge('usuario');
        if (cTextNum($usuario)) {

            if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {

                if($_FILES['imagen']['type']=='image/gif' || $_FILES['imagen']['type'] == 'image/jpg'){
                    
                    
                    if($_FILES['imagen']['size']<=200000){

                        $nombreDirectorio = "imagenes/";
                        $nombreFichero = $_FILES['imagen']['name'];
                        $nombreCompleto = $nombreDirectorio . $nombreFichero;

                        
                        if (is_dir($nombreDirectorio)) {
                            // es un directorio existente
                            $idUnico = time();
                            $nombreFichero = $idUnico . "-" . $nombreFichero;
                            $nombreCompleto = $nombreDirectorio . $nombreFichero;
                            move_uploaded_file($_FILES['imagen']['tmp_name'], $nombreCompleto);
                            echo "Fichero subido con el nombre: $nombreFichero<br>";
                        } else {

                            echo "Directorio definitivo inválido";
                        }


                    }else{
                        echo 'se excede el tamaño de la imagen (200KB)';
                    }



                }else{
                    echo 'Imagen en formato no admitido';

                }
                
            } else {


                print("No se ha podido subir el fichero\n");
            }
        } else {
            echo 'El usuario sólo debe contener letras y números.';
        }
     else {
    echo 'Nombre incorrecto';
     }








    /* echo "name:" . $_FILES['imagen']['name'] . "\n";
    echo "tmp_name:" . $_FILES['imagen']['tmp_name'] . "\n";
    echo "size:" . $_FILES['imagen']['size'] . "\n";
    echo "type:" . $_FILES['imagen']['type'] . "\n";*/


    ?>

</body>

</html>