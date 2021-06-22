<?php

/**
 * Template Name: contacto
 * The main template file for display oficina page.
 *
 * @package WordPress
 */

/* Describe what the code snippet does so you can remember later on */
add_action('wp_head', 'add_content_header');
function add_content_header(){
?>
    <script src='https://www.google.com/recaptcha/api.js?render=6LeojdQaAAAAAKvQ0danpjlvcANnUg-STMfprg_3'> 
    </script>
    <script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6LeojdQaAAAAAKvQ0danpjlvcANnUg-STMfprg_3', {action: 'formulario'})
        .then(function(token) {
            var recaptchaResponse = document.getElementById('recaptchaResponse');
            recaptchaResponse.value = token;
        });
    });
    </script>
<?php
};

get_header();

?>

<div class="inner">
    <div class="inner_wrapper nopadding">
        <div class="standard_wrapper"></div>
        <br class="clear" />
        <div id="page_main_content" class="sidebar_content fixed_column">
            <div class="standard_wrapper">
                <h1 class="ibf_color_orange ibf_mb_20 ibf_text_center ibf_mt_20">Contacta con tu oficina Iberfurgo más cercana </h1>
                <!-- <p class="ibf_font_18 ibf_mb_20">Puedes contactar con tu oficina más cercana en los datos de contacto que te mostrará el mapa cuando hagas click 
                    sobre el icono de la oficina, o también puedes utilizar nuestro formulario de contacto para realizar consultas y reservas. 
                    Nos pondremos en contacto contigo lo antes posible.</p> -->

                <?php if (isset($_GET['errormsg'])) : ?>
                    <div>
                        <p><?php echo $_GET['errormsg']; ?></p>
                    </div>
                <?php endif; ?>

                <?php if (isset($_GET['exito'])) : ?>
                    <div>
                        <p>Gracias por contactar con nosotros, en breve nos pondremos en contacto con usted.</p>
                    </div>
                <?php endif; ?>

                <div class="one_half_bg">
                    <h3 class="ibf_mb_30">Formulario de contacto</h3>
                    <form method="post" action="../contacto-enviado">

                        <input class="one ibf_mv_mb_15" type="text" id="txtnombre" name="txtnombre" placeholder="Nombre*" required>
                        <input class="one ibf_mt_15 ibf_mv_mb_15" type="email" id="txtemail" name="txtemail" placeholder="Email*" required>
                        <input class="one ibf_mt_15 ibf_mv_mb_15" type="tel" id="txttelefono" name="txttelefono" placeholder="Teléfono*" required>

                        <?php
                        list($httpCode, $response) = getDataApi(URL_API . 'maestro-delegacion', '{"order":["nombre asc"], "id":"!3,16,21"}');
                        if ($httpCode != 200) {
                            return 'ha petado';
                        }

                        echo '<select class="one ibf_mt_15 ibf_mv_mb_15" id="brand" name="delegacion_id" class="ibf_field_form" required>
                                <option value="">' . esc_html__('Selecciona oficina*', 'grandcarrental-custom-post') . '</option>';
                                
                                $arr_delegaciones=null;
                                $array_correccion_titulo=array('Sevilla','Olías del Rey');
                                foreach($response->data as $key => $value){
                                    $clave=$value->provincia." - ".$value->nombre;
                                    if(in_array($value->nombre,$array_correccion_titulo)){
                                        $clave=$value->provincia;
                                    }
                                                
                                    $arr_delegaciones[$clave]['key']=$key;
                                    $arr_delegaciones[$clave]['delegacion']=$value;
                                }						
                                ksort($arr_delegaciones);
                                foreach($arr_delegaciones as $titulo=> $value){
                                    $delegacion=$value['delegacion'];
                                    $indice=$value['key'];
                                    if (isset($atts['delegacionid']) && $atts['delegacionid'] == $delegacion->id) {
                                        $selected='selected';
                                    }
                                    else {
                                        $selected='';
                                    }
                                    
                                    //$return_html .= '<option value="'.esc_attr($delegacion->id).'" '.$selected.'>'.esc_attr($titulo).'</option>';
                                    echo '<option value="' . esc_attr($delegacion->id) . '">' . esc_attr($titulo) . '</option>';
                                }
                        /*            
                        foreach ($response->data as $delegacion) {

                            echo '<option value="' . esc_attr($delegacion->id) . '">' . esc_attr($delegacion->nombre) . '</option>';
                        }
                        */

                        echo '</select>';
                        ?>
                        <br class="clear" />
                        <input class="one ibf_mt_15 ibf_mv_mb_15" type="text" id="txtasunto" name="txtasunto" placeholder="Asunto*" required>
                        <br class="clear" />
                        <textarea class="one ibf_mt_15 ibf_mv_mb_15" name="txtcomentarios" id="txtcomentarios" cols="15" rows="5" placeholder="Comentarios*" required></textarea>
                        <br class="clear" />
                        <input class="ibf_mr_10 ibf_font_16" id="politica_privacidad" name="politica_privacidad" type="checkbox" value="1" required> 
                            He leído y acepto la <a href="<?php echo site_url(); ?>/politica-de-privacidad" target="_blank">política de privacidad</a> de mis datos y <a href="<?php echo site_url(); ?>/aviso-legal" target="_blank">política legal</a>.
                        <br>
                        <input class="ibf_mr_10 ibf_font_16" id="comunicaciones_comerciales" name="comunicaciones_comerciales" type="checkbox" value="1"> 
                        <span>Autorizo la cesión de mis datos para comunicaciones comerciales, promociones especiales y cupones descuento.</span>
                        <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                        <input class="one ibf_mt_15 ibf_button_flota ibf_ml_0 ibf_mb_30 ibf_mv_mb_15" type="submit" value="Enviar">
                        <br class="clear" />
                        <input type="hidden" name="action" value="contactform">
                    </form>
                </div>

                <div class="one_half_bg last withsmallpadding ppb_text_image withbg parallax ibf_img_contact">
                    <div class="overlay_background"></div>
                    <div class="page_content_wrapper">
                        <div class="inner">
                            <div style="margin:auto;width:100%">
                                </p>
                                <h2 style="color: #fff;">Oficinas Centrales</h2>
                                <p>C/ Gobelas, 13<br />
                                    28023 - Madrid<br />
                                    <i class="fas fa-phone-alt ibf_pr_10"></i><a class="ibf_font_bold ibf_color_white" href="tel:0034900533657">900 533 657</a><br />
                                    <i class="fas fa-at ibf_pr_10"></i><a class=" ibf_color_white" href="mailto:info@iberfurgo.com">info@iberfurgo.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                
                

                <!-- <div class="one">
                    <div id="map" style="height: 800px; width: 100%; overflow:visible!important;"></div>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAXeTN1JkXF2fv4_ZN1TZhBCI3CL6O32w&callback=initMap&libraries=&v=weekly" async></script>
                </div> -->
            </div>
        </div>
    </div>
</div>


<script>
    var map,
        desktopScreen = Modernizr.mq("only screen and (min-width:1024px)"),
        scrollable = draggable = !Modernizr.hiddenscroll || desktopScreen,
        isIE11 = !!(navigator.userAgent.match(/Trident/) && navigator.userAgent.match(/rv[ :]11/));

    // Initialize and add the map
    function initMap() {
        // The location of Uluru
        const uluru = {
            lat: 40.463667,
            lng: 1.74922
        };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 6.1,
            center: uluru,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
            center: uluru,
            position: uluru,
            scrollwheel: scrollable,
            draggable: draggable,
            map: map,
            styles: [{
                "stylers": [{
                    "saturation": -100
                }]
            }],
        });
    }
</script>


<?php get_footer(); ?>