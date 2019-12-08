<?php
function cabecera($titulo) 
{?>
<!DOCTYPE html>
		<html lang="es">
			<head>
				<title>
				<?php
				echo $titulo;
				?>
			
			</title>
				<meta charset="utf-8"/>
				
			</head>
		<body>
<?php		
}

function pie(){
	echo "</body>
	</html>";
}

function recoge($var)
{
    if (isset($_REQUEST[$var]))
        $tmp=strip_tags(sinEspacios($_REQUEST[$var]));
    else
        $tmp= "";

    return $tmp;
}

function sinEspacios($frase) {
    $texto = trim(preg_replace('/ +/', ' ', $frase));
    return $texto;
}


?>