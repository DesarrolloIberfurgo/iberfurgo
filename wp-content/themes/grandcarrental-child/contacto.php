<?php 
    /**
     * Template Name: contacto
     * The main template file for display oficina page.
     *
     * @package WordPress
    */

    get_header(); 
?>

<div class="inner">
	<div class="inner_wrapper nopadding">
        <div class="standard_wrapper"></div>
        <br class="clear"/>
        <div id="page_main_content" class="sidebar_content fixed_column">
            <div class="standard_wrapper">   
                <h1 class="ibf_color_orange ibf_mb_20 ibf_text_center ibf_mt_20">Contacta con tu oficina Iberfurgo más cercana  </h1> 
                <p class="ibf_font_18 ibf_mb_20">Puedes contactar con tu oficina más cercana en los datos de contacto que te mostrará el mapa cuando hagas click 
                    sobre el icono de la oficina, o también puedes utilizar nuestro formulario de contacto para realizar consultas y reservas. 
                    Nos pondremos en contacto contigo lo antes posible.</p>

                <?php if(isset($_GET['errormsg'])): ?>
                    <div>
                        <p><?php echo $_GET['errormsg']; ?></p>
                    </div>
                <?php endif; ?>

                <?php if(isset($_GET['exito'])): ?>
                    <div>
                        <p>Gracias por contactar con nosotros, en breve nos pondremos en contacto con usted.</p>
                    </div>
                <?php endif; ?>

                <div class="one_half">
                    <h3 class="ibf_mb_30">Formulario de contacto</h3>
                    <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="POST">

                        <input class="one" type="text" id="txtnombre" name="txtnombre" placeholder="Nombre*" required>
                        <input class="one ibf_mt_15" type="email" id="txtemail" name="txtemail" placeholder="Email*" required>
                        <input class="one ibf_mt_15" type="tel" id="txttelefono" name="txttelefono" placeholder="Teléfono*" required>

                        <?php 
                            list($httpCode, $response) = getApi(URL_API . 'maestro-delegacion');
                            if ($httpCode != 200) {
                                return 'ha petado';
                            }

                            echo '<select class="one ibf_mt_15" id="brand" name="delegacion_id" class="ibf_field_form">
                                <option value="">'.esc_html__('Selecciona oficina', 'grandcarrental-custom-post' ).'</option>';
        
                            foreach($response->data as $delegacion)	
                            {
                                
                                echo '<option value="'.esc_attr($delegacion->delegacion_datos_web->email).'">'.esc_attr($delegacion->nombre).'</option>';
                            }
                                $horas = get_times();
                            
                            echo '</select>';
                        ?>
                        <br class="clear"/>
                        <input class="one ibf_mt_15" type="text" id="txtasunto" name="txtasunto" placeholder="Asunto">
                        <br class="clear"/>
                        <textarea class="one ibf_mt_15" name="txtcomentarios" id="txtcomentarios" cols="15" rows="5" placeholder="Comentarios"></textarea>
                        <br class="clear"/>
                        <input class="one ibf_mt_15 ibf_button_flota ibf_ml_0 ibf_mb_30" type="submit" value="Enviar">
                        <input type="hidden" name="action" value="contactform">
                    </form>
                </div>

                <div class="one">
                    <div id="map" style="height: 800px; width: 100%; overflow:visible!important;"></div>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAXeTN1JkXF2fv4_ZN1TZhBCI3CL6O32w&callback=initMap&libraries=&v=weekly"
      async
    ></script>
                </div>
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
        const uluru = { lat: 40.463667, lng: 1.74922 };
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
            styles: [{"stylers": [{"saturation": -100}]}],
        });
        }
</script>
     

<?php get_footer(); ?>