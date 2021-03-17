<?php
/**
 * Template Name: Oficinas
 * The main template file for display oficinas page.
 *
 * @package WordPress
*/

/**
*	Get current page id
**/
get_header(); 

global $wp_query;

list($httpCode, $response) = getDataApi(URL_API . 'maestro-delegacion', '{"order":["nombre asc"]}');
if ($httpCode != 200) {
	return 'ha petado';
}
?>

<div id="page_caption" class="hasbg  withtopbar ibf_head_oficinas" ></div>

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
            <div class="ibf_head_oficinas"></div>
            
            <div class="standard_wrapper"> 
                <h1 class="ibf_color_orange">Oficinas Iberfurgo en España</h1>  
            
                <p class="ibf_font_16">Iberfurgo es una empresa de alquiler de furgonetas de reciente creación, pero en pleno estado de expansión. 
                    Contamos con años de profesionalidad y experiencia en el sector. A nuestro lado puedes disfrutar de la tranquilidad y seguridad 
                    de un trabajo bien hecho. </p>
                <p class="ibf_font_16">En Iberfurgo dispondrás de una amplia flota de vehículos comerciales. 
                    Todos ellos pueden manejarse con el carnet de conducir estándar, es decir, categoría B, por lo que no tendrás problema 
                    a la hora de alquilar la furgoneta que mejor se amolde a tus necesidades. Además, podrás ser atendido en cualquiera 
                    de nuestras oficinas, ubicadas a lo largo y ancho de la geografía española. </p>
                <p class="ibf_font_16">Aunque actualmente no es posible la entrega y devolución de la furgoneta o vehí­culo fuera de la 
                    provincia donde el usuario realizó la contratación del servicio de alquiler, en Iberfurgo no descartamos esta opción y 
                    queremos seguir escuchando a nuestros clientes para conocer sus necesidades. </p>
                <p class="ibf_font_16">Los servicios de alquiler de furgonetas de Iberfurgo están disponibles en las ubicaciones que 
                    encontrarás en la parte inferior. Para conocer los datos de contacto de cada una de ellas, pincha en la oficina que más 
                    te interese: </p>

                <div id="portfolio_filter_wrapper" class="gallery classic three_cols portfolio-content section content clearfix" data-columns="3">
                <?php foreach($response->data as $key => $value)	
                {
                    ?>
                    <div class="element grid classic3_cols animated<?php echo esc_attr($key+1); ?>">
                        <?php echo do_shortcode('[tg_accordion_oficinas 
                        direccion="'.esc_attr($value->delegacion_datos_web->direccion).'" 
                        whatsapp="'.esc_attr($value->delegacion_datos_web->whatsapp).'" 
                        telefono="'.esc_attr($value->delegacion_datos_web->telefono).'" 
                        email="'.esc_attr($value->delegacion_datos_web->email).'"
                        hlvm="'.esc_attr($value->delegacion_datos_web->horarios_lunes_viernes_manana).'"
                        hlvt="'.esc_attr($value->delegacion_datos_web->horarios_lunes_viernes_tarde).'"
                        hs="'.esc_attr($value->delegacion_datos_web->horarios_sabado).'"
                        url="'.esc_attr($value->delegacion_datos_web->url_oficina).'"   
                        title="'.esc_attr($value->nombre).'" 
                        mapa_oficina="'.esc_attr($value->mapa_oficina).'"
                        icon="" close="1"][/tg_accordion_oficinas]'); ?>
                    </div>
                    <?php
                }
                ?>
                </div>
            
            </div> <!-- standard_wrapper -->
        
        </div> <!-- page_main_content -->
    </div>
</div> <!-- inner -->
<br class="clear"/>
<?php get_footer(); ?>