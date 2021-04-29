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
    ];

    list($httpCode, $response) = postDataApi(URL_API . 'contacto-web', json_encode($dataApi));

    if ($httpCode != 200) {
        return 'ha petado';
    }
    
    $dataApi['delegacion_id'] = $data['delegacion_id'];
    list($httpCode, $response_delegacion) = getDataApi(URL_API . 'maestro-delegacion-datos-web', json_encode($dataApi));
    //response_delegacion[0]->
    if ($httpCode != 200) {
	    return 'ha petado';
    }

//     ob_start();
//     include('email-cliente.php');
//     $email_cliente_content = ob_get_contents();
//     ob_end_clean();
//     $headers = array('Content-Type: text/html; charset=UTF-8');
//     var_dump($email_cliente_content);
//     wp_mail($data['email_res'], "Booking details", $email_cliente_content, $headers);

?>
<div class="inner">
	<div class="inner_wrapper nopadding">
        <div id="page_main_content" class="sidebar_content fixed_column">
            <div class="standard_wrapper">
                <div class="one">página éxito formulario enviado</div>
            </div>
        </div>
    </div>
</div>
    <?php

    get_footer();