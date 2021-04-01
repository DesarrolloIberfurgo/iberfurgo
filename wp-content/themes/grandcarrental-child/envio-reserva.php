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
    "hora_reco"=>"10:00",
    "hora_dev"=>"11:00",
    "groupo_vehi"=>"grupo vehiculo",
    "des_vehi"=>"descripcion",
    "dias_contra"=>"25",
    "precio_vehi"=>"300.50",
    "extras_name"=>"100km extra",
    "precio_extra"=>"10",
    "fecha_reserva"=>"2020/12/11",
    "comunicaciones_comerciales"=>1,
    "politica_privacidad"=>1,
    "condiciones_generales"=>1,
    ];

    list($httpCode, $response) = postDataApi(URL_API . 'reservas-web', json_encode($dataApi));
    if ($httpCode != 200) {
        return 'ha petado';
    }