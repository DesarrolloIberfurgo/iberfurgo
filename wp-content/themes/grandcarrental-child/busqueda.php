<?php
/**
 * Template Name: Busqueda
 * The main template file for display busqueda page.
 *
 * @package WordPress
*/

get_header(); 

// global $wp_query;
$delegacionId = $_GET['delegacion_id'];
$fechaInicio = $_GET['fecha_inicio'];
$fechaFin = $_GET['fecha_fin'];
$horaInicio = $_GET['hora_inicio'];
$horaFin = $_GET['hora_fin'];


$dataApi['tipo_tarifa'] = "DAY";
$dataApi['delegacion_id'] = $delegacionId;
$dataApi['fecha_inicio'] = $fechaInicio.' '.$horaInicio;
$dataApi['fecha_fin'] = $fechaFin.' '.$horaFin;

list($httpCode, $response) = getDataApi(URL_API . 'get-tarifa', json_encode($dataApi));
if ($httpCode != 200) {
	return 'ha petado';
}
?>
<div class="inner">
    <div class="inner_wrapper nopadding">
        <?php
            if(!empty($response->data))
            {
        ?>
                <div class="standard_wrapper"></div><br class="clear"/><br/>
        <?php
            }
        ?>
                <div id="page_main_content" class="sidebar_content full_width fixed_column">

                    <div class="standard_wrapper">
                    <?php 
                        foreach ($response->data as $value) {
                            echo $value->eur_dia."<br>";
                        }
                    ?>
                    </div> <!-- standard_wrapper -->
                </div>
    </div> <!-- inner_wrapper -->
</div> <!-- inner -->
<?php get_footer(); ?>