<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Document</title>
</head>
<?php

function counter()
{
    if ($contenido = file_get_contents("ficheros/counter.txt")) {
        if (file_put_contents("counter.txt", intval($contenido) + 1)) {
            return $contenido;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
echo counter();
?>
<body>

</body>
</html>