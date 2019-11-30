<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-type">
    <title>Ejercicio Fechas</title>
    <style>
    img{with:1000px; height:800px;}
    
    </style>
</head>

<body>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="date" name="date">
		<input type="submit" name="bSubmit" value="ver estación">
		
	</form>
	
	
    <?php
        $stringFecha=$_POST['date'];
        $fecha=explode("-", $stringFecha);
        //print_r($fecha);
        
        switch ($fecha[1]){
            case 1:
            case 2:             
            case 3: echo '<img src="https://www.gratistodo.com/wp-content/uploads/2016/08/fotos-oto%C3%B1o-walpapers-hd.jpg" alt="autumn">';
            case 4: echo '<img src="https://www.gratistodo.com/wp-content/uploads/2016/08/fotos-oto%C3%B1o-walpapers-hd.jpg" alt="autumn">';
            case 5: echo '<img src="https://www.gratistodo.com/wp-content/uploads/2016/08/fotos-oto%C3%B1o-walpapers-hd.jpg" alt="autumn">';
            case 6: echo '<img src="https://a-static.besthdwallpaper.com/playa-y-verano-papel-pintado-3554x1999-21459_53.jpg" alt="summer">';
            case 7: echo '<img src="https://a-static.besthdwallpaper.com/playa-y-verano-papel-pintado-3554x1999-21459_53.jpg" alt="summer">';
            case 8: echo '<img src="https://a-static.besthdwallpaper.com/playa-y-verano-papel-pintado-3554x1999-21459_53.jpg" alt="summer">';
            case 9:
            case 10:
            case 11:
            case 12:
            default: echo 'Fecha no váida';
        }
        
        
        
       
        
   
    ?>
    
</body>

</html>

