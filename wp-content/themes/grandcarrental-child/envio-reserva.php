<?php
/**
 * Template Name: Envio Reserva
 * The main template file for display oficina page.
 *
 * @package WordPress
*/

    // get_header(); 
    
    // get_footer(); 
    print_r($_POST);

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
    "comunicaciones_comerciales"=>1,
    "politica_privacidad"=>1,
    "condiciones_generales"=>1,
    "tipo_id"=>$data['tipo_id_res'],
    ];
    

    list($httpCode, $response) = postDataApi(URL_API . 'reservas-web', json_encode($dataApi));
    var_dump($httpCode);
    if ($httpCode != 200) {
        return 'ha petado';
    }

