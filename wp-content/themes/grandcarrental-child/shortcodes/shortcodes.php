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

function shortcode_familias_vehiculos()
{
    list($httpCode, $response) = getApi(URL_API. 'get-familias-vehiculo');
    $data = $response->data;
    $html = '<div class="one">';
    $html .= '<div class="container-fluid">
                <h1 class="text-center ibf_mb_15">Descubre toda nuestra flota</h1>
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner row w-100 mx-auto">';
    foreach ($data as $key => $value){
        $active = '';
        if($key == 0) { $active = 'active'; }
        $html .= '
            <div class="carousel-item col-md-4 ' .$active.'">
              <div class="card">
                <img class="card-img-top img-fluid" src="'.get_stylesheet_directory_uri().'/imagenes_iberfurgo/flota/'.$value->tipoId.'/34.jpg" alt="Card image cap">
                <div class="card-body">
                  <h4 class="card-title ibf_text_center">'.$value->tipo_vehiculo.'</h4>
                  <p class="card-text ibf_text_center">Desde <span class="ibf_color_orange ibf_font_40 ibf_font_bold ">'.$value->precioDesde .'</span>€/día.</p>
                  <a class="button left small ibf_button_book ibf_font_16" href="'.site_url().'/flota">Ver vehículos <i class="fas fa-angle-right"></i></a>
                </div>
              </div>
            </div>
          ';
    }
    $html .= '</div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>';

    $html .= '</div>';
    return $html;
}

add_shortcode('familias_vehiculos', 'shortcode_familias_vehiculos');

//echo do_shortcode('[provincias]');