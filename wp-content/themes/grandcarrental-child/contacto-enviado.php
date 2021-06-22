<?php
/**
 * Template Name: Contacto Enviado
 * The main template file for display oficina page.
 *
 * @package WordPress
*/

    get_header(); 

    $data = $_POST;

    $dataApi = [
    "nombre" => $data['txtnombre'],
    "telefono" => $data['txttelefono'],
    "email" => $data['txtemail'],
    "delegacion" => $data['delegacion_id'],
    "asunto" => $data['txtasunto'],
    "comentario" => $data['txtcomentarios'],
    "politica_privacidad" => $data['politica_privacidad']  ?? 0,
    "comunicaciones_comerciales" => $data['comunicaciones_comerciales'] ?? 0
    ];

    list($httpCode, $response) = postDataApi(URL_API . 'contacto-web', json_encode($dataApi));

    if ($httpCode != 200) {
        return 'ha petado';
    }
    
    $dataApi['delegacion_id'] = $data['delegacion_id'];
    list($httpCode, $response_delegacion) = getDataApi(URL_API . 'maestro-delegacion-datos-web', json_encode($dataApi['delegacion_id']));

    list($httpCode, $response_nombre_delegacion) = getDataApi(URL_API . 'maestro-delegacion', '{"order":["nombre asc"], "id":"'.$dataApi['delegacion_id'].'"}');

    if ($httpCode != 200) {
	    return 'ha petado';
    }

    ob_start();
    include('email-contacto.php');
    $email_cliente_content = ob_get_contents();
    ob_end_clean();
    $correo_oficina = $response_delegacion->data[0];
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $headers[] .= 'From: Iberfurgo::Reservas <info@iberfurgo.com>';
    $headers[] .= 'Bcc: sergio.abril@iberfurgo.com';
    $headers[] .= "Bcc: $correo_oficina->email";
    

    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify'; 
    $recaptcha_secret = '6LeojdQaAAAAADmLouJ4wZEOB5XiZWio_y9ouxY0'; 
    $recaptcha_response = $_POST['recaptcha_response']; 
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response); 
    $recaptcha = json_decode($recaptcha); 

    if($recaptcha->score >= 0.7){
        // OK. ERES HUMANO, EJECUTA ESTE CÓDIGO
        wp_mail($data['txtemail'], "Contacto::Iberfurgo", $email_cliente_content, $headers);
    } 



?>
<div class="inner">
	<div class="inner_wrapper nopadding">
        <div id="page_main_content" class="sidebar_content fixed_column">
            <div class="standard_wrapper">
                
                <div class="one ibf_text_center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/imagenes_iberfurgo/contacto/envio-contacto-300.png" alt="Iberfurgo - contacto" title="Iberfurgo - contacto" />
                    <h3 class="ibf_color_orange">Consulta enviada con exito</h3>
                    <p>Muchas gracias por confiar en Iberfurgo.</p>
                    <p>En breve uno de nuestros agentes se pondrá en contacto contigo <br>para aclararte todas tus dudas.</p>
                </div>
                <p>
                    <br class="clear"><br>
                    <br class="clear">
                </p>
            </div>
        </div>
    </div>
</div>


<?php
    get_footer();