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
    "apellidos"=>"Baldayo",
    "dni"=>$data['dni_res'],
    "direccion"=>$data['direccion_res'],
    "telefono"=>$data['telefono_res'],
    "email"=>$data['email_res'],
    "formaPago"=>$data['forma_pago_res'],
    "observaciones"=>$data['comentarios_res'],
    "delegacion"=>$data['delegacion_id_res'],
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
?>
<div class="inner">
	<div class="inner_wrapper nopadding">
        <div id="page_main_content" class="sidebar_content fixed_column">
            <div class="standard_wrapper">
                <div class="one">página éxito reserva</div>
            </div>
        </div>
    </div>
</div>
    <?php

    get_footer();