<?php

use PHPMailer\PHPMailer\PHPMailer;


function get_contact_form_values()
{
    
    $phpmailer = new PHPMailer();
    // Verificamos que los 2 campos tengan valores
	if( empty( $_POST['txtnombre'] ) || empty( $_POST['txtcomentarios'] ) ):

		// Enviamos al usuario a la misma página con una variable GET de error.
		wp_redirect( add_query_arg( array( 'errormsg' => "Campos incompletos" ), get_home_url() . '/contacto') );
		exit;

	endif;


	// SIEMPRE SE DEBEN SANITIZAR LOS VALORES
	$nombre     = sanitize_text_field( $_POST['txtnombre'] );
	$mensaje    = sanitize_text_field( $_POST['txtcomentarios'] );


	/*
	Una vez que tenemos los datos del formulario podemos
	hacer con ellos lo que nuestro proyecto web necesite, ej:
	a)  Enviar un email con esta información
	b)  Guardar los valores en base de datos
	c)  Hacer una nueva llamada POST a otro servicio que necesita
		esta información.

	En nuestro caso vamos a mandar un email con el nombre y el mensaje del usuario.
	*/
	// Define que estamos enviando por SMTP
    $phpmailer->isSMTP();
 
    // La dirección del HOST del servidor de correo SMTP p.e. smtp.midominio.com
    $phpmailer->Host = "smtp.iberfurgo.com";
 
    // Uso autenticación por SMTP (true|false)
    $phpmailer->SMTPAuth = true;
 
    // Puerto SMTP - Suele ser el 25, 465 o 587
    $phpmailer->Port = "587";
 
    // Usuario de la cuenta de correo
    $phpmailer->Username = "reservas@iberfurgo.com";
 
    // Contraseña para la autenticación SMTP
    $phpmailer->Password = "R3s3rv1s#4rd9@";
 
    // El tipo de encriptación que usamos al conectar - ssl (deprecated) o tls
    $phpmailer->SMTPSecure = "tls";
 
    
    $phpmailer->setFrom('reservas@iberfurgo.com', 'Iberfurgo::Reservas');
    
    $phpmailer->addAddress('sabrilgarcia@gmail.com', 'Joe User');   

    //Content
    $phpmailer->isHTML(true);                                  //Set email format to HTML
    $phpmailer->Subject = 'Here is the subject';
    $phpmailer->Body    = 'This is the HTML message body <b>in bold!</b>';
    $phpmailer->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $phpmailer->send();
	/* Una vez que hayamos trabajado con los datos debemos
	redireccionar al usuario a la misma u a otra nueva página.
	En nuestro ejemplo, vamos a redirigirlo a la misma página
	de contacto con una variable de éxito.*/
	wp_redirect( add_query_arg( array( 'exito' => "1" ), get_home_url() . '/contacto') ); exit;
}

 add_action('admin_post_nopriv_contactform', 'get_contact_form_values');
 add_action('admin_post_contactform' , 'get_contact_form_values');



