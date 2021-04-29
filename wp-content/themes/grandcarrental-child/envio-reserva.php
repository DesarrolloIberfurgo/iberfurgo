<?php
/**
 * Template Name: Envio Reserva
 * The main template file for display oficina page.
 *
 * @package WordPress
*/

    get_header(); 

    $data = $_POST;


    $dataApi = [
    "nombre"=> $data['nombre_res'],
    "apellidos"=>"Sin Apellido",
    "dni"=>$data['dni_res'],
    "direccion"=>$data['direccion_res'],
    "telefono"=>$data['telefono_res'],
    "email"=>$data['email_res'],
    "formaPago"=>$data['forma_pago_res'],
    "observaciones"=>$data['comentarios_res'],
    "delegacion"=>$data['delegacion_nombre_res'],
    "delegacion_id_res"=>$data['delegacion_id_res'],
    "fecha_reco"=>$data['fecha_inicio_res'],
    "fecha_dev"=>$data['fecha_fin_res'],
    "hora_reco"=>$data['hora_inicio_res'],
    "hora_dev"=>$data['hora_fin_res'],
    "dias_contra"=>$data['dias_res'],
    "precio_vehi"=>$data['precio_res'],
    "extras_name"=>$data['texto_extras_res'],
    "precio_extra"=>$data['precio_extra_res'],
    "fecha_reserva"=>date('Y-m-d'),
    "comunicaciones_comerciales"=>$data['comunicaciones_comerciales'] ?? 0,
    "politica_privacidad"=>$data['condiciones_generales'] ?? 0,
    "condiciones_generales"=>$data['condiciones_generales'] ?? 0,
    "tipo_id"=>$data['tipo_id_res'],
    ];

    
    list($httpCode, $response) = postDataApi(URL_API . 'reservas-web', json_encode($dataApi));

    if ($httpCode != 200) {
        return 'ha petado';
    }

    $dataApiDelegacion['delegacion_id'] = $data['delegacion_id_res'];
    list($httpCode, $response_oficina) = getDataApi(URL_API . 'maestro-delegacion-datos-web', json_encode($dataApiDelegacion));
    //response_delegacion[0]->
    if ($httpCode != 200) {
	    return 'ha petado';
    }

    list($httpCode, $response_tipo) = getApi(URL_API . 'flota-tipo/' . $data['tipo_id_res']);
    if ($httpCode != 200) {
	    return 'ha petado';
    }
    

    ob_start();
    include('email-cliente.php');
    $email_cliente_content = ob_get_contents();
    ob_end_clean();
    $headers = array('Content-Type: text/html; charset=UTF-8');  
    wp_mail($data['email_res'], "Reserva::Iberfurgo", $email_cliente_content, $headers);

    ob_start();
    include('email-oficina.php');
    $email_oficina_content = ob_get_contents();
    ob_end_clean();
    $headersOficina = array('Content-Type: text/html; charset=UTF-8');
    $headersOficina[] .= 'From: Iberfurgo::Reservas <reservas@iberfurgo.com>';
    $headersOficina[] .= 'Bcc: sergio.abril@iberfurgo.com';
    // $headersOficina[] .= 'Bcc: csanchez@iberfurgo.com'; 
    // wp_mail($response_oficina->data[0]->email, "Reserva::Iberfurgo", $email_oficina_content, $headersOficina);
    wp_mail("sabrilgarcia@gmail.com", "Reserva::Iberfurgo", $email_oficina_content, $headersOficina);

?>

<div class="inner">
	<div class="inner_wrapper nopadding">
        <div id="page_main_content" class="sidebar_content fixed_column">
            <div class="standard_wrapper ibf_pt_50">
                <div class="one_half " >
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/imagenes_iberfurgo/flota/<?php echo $data['tipo_id_res']; ?>/34.jpg" alt="Iberfurgo - <?php echo $response_tipo->nombre ?>" height="262" title="Iberfurgo - <?php echo $response_tipo->nombre; ?>" />
                    </div>
                <div class="one_half last " style="">
                    <h3 class="ibf_color_orange">Tu solicitud de reserva se ha confirmado</h3>
                    <p>Muchas gracias por confiar en Iberfurgo.</p>
                    <p>Estamos tramitando tu solicitud</p>
                    <p>En breve uno de nuestros agentes se pondrá en contacto contigo para confirmarte el vehículo que has solicitado.</p>
                </div>
                <p><br class="clear"><br>
                <br class="clear"></p>
            </div>
        </div>
    </div>
</div>

<?php
    get_footer();