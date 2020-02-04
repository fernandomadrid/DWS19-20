<?php

//con la clase PHPMailer:

require_once('../class.phpmailer.php');

//instancio un objeto de la clase PHPMailer
$mail = new PHPMailer(); // defaults to using php "mail()"

//defino el cuerpo del mensaje en una variable $body
//se trae el contenido de un archivo de texto
//también podríamos hacer $body="contenido...";
$body = /*file_get_contents('contenido.html')*/"Contenido del mensaje";
//Esta línea la he tenido que comentar
//porque si la pongo me deja el $body vacío
// $body = preg_replace('/[]/i','',$body);

//defino el email y nombre del remitente del mensaje
$mail­>SetFrom('tuiterotroll@gmail.com', 'Tuitero Troll');

//defino la dirección de email de "reply", a la que responder los mensajes
//Obs: es bueno dejar la misma dirección que el From, para no caer en spam
$mail­>AddReplyTo("tuiterotroll@gmail.com","uitero Troll");
//Defino la dirección de correo a la que se envía el mensaje
$address = "tony3fk@gmail.com";
//la añado a la clase, indicando el nombre de la persona destinatario
$mail­>AddAddress($address, "Tony Rodz");

//Añado un asunto al mensaje
$mail­>Subject = "Envío de email con PHPMailer en PHP";

//Puedo definir un cuerpo alternativo del mensaje, que contenga solo texto
$mail­>AltBody = "Cuerpo alternativo del mensaje";

//inserto el texto del mensaje en formato HTML
$mail­>MsgHTML($body);

//asigno un archivo adjunto al mensaje
$mail­>AddAttachment("ruta/archivo_adjunto.gif");

//envío el mensaje, comprobando si se envió correctamente
if(!$mail­>Send()) {
echo "Error al enviar el mensaje: " . $mail­>ErrorInfo;
} else {
echo "Mensaje enviado!!";
} 

/*
$cuerpo = "Este es el primer email de prueba";
$from = "tuiterotroll@gmail.com";
$to = "tony3fk@gmail.com";
$subject = "Email de prueba";
$message = "Lo que sea";
$headers = "From:" . $from;
echo mail($to, $subject, $message, $headers) ? "El mail ha sido enviado con exito." : "No se ha enviado";*/




/*$from_name = "Nombre";
$from_email = "tuiterotroll@gmail.com";
$header = "From: $from_name <$from_email>";
$body = "Hola, \nEsto es una prueba de correo de $from_name <$from_email>.";
$subject = "Prueba de correo Sendmail";
$to = "tony3fk@gmail.com";
if (mail($to, $subject, $body, $header)) {
    echo "Bien!";
} else {
    echo "Mal! Vuelve a comenzar .";
}*/

/*ini_set("SMTP","ssl://smtp.gmail.com");
ini_set("smtp_port",587);
ini_set("sendmail_from","tuiterotroll@gmail.com");
$correo = "tony3fk@gmail.com";
$correo2 = "tuiterotroll@gmail.com";
$asunto = "Envio e-mails";
$cuerpo = "Por fin FUNCIONO!!!!";
mail($correo,$asunto,$cuerpo,"FROM: $correo2");
*/
