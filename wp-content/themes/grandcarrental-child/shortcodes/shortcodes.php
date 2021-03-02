<?php

function shortcode_provincias() 
{
    list($httpCode, $response) = getDataApi(URL_API . 'maestro-provincia', '{"valuePluck":"nombre"}');
    $html = '<select name="car-select" class="xs--select car-select">';
    foreach ($response->data as $key => $value) {
        $html .= '<option value=' . $key.'>' . $value.'</option>';
    }
    $html .= '</select>';

    return $html;
}

add_shortcode('provincias', 'shortcode_provincias');

function shortcode_flota_tipo()
{
    list($httpCode, $response) = getDataApi(URL_API . 'flota-tipo', '{"valuePluck":"nombre", "keyPluck":"tipoId"}');
    // list($httpCode, $response) = getApi(URL_API . 'flota-tipo');
    $html = '<select name="car-select" class="xs--select car-select">';
    foreach ($response->data as $key => $value) {
        $html .= '<option value=' . $key.'>' . $value.'</option>';
    }
    $html .= '</select>';

    return $html;
}

add_shortcode('flota_tipo', 'shortcode_flota_tipo');

function shortcode_tipo_vehiculo()
{
    list($httpCode, $response) = getApi(URL_API . 'get-tipos-vehiculo');
 
    $html = '<select name="tipo_vehiculo" class="xs--select car-select">';
    foreach ($response as $key => $value) {
        $html .= '<option value=' . $key.'>' . $value.'</option>';
    }
    $html .= '</select>';

    return $html;
}

add_shortcode('tipo_vehiculo', 'shortcode_tipo_vehiculo');

//echo do_shortcode('[provincias]');