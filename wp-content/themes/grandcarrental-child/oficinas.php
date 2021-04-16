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

<div id="page_caption" class="hasbg  withtopbar ibf_slider ibf_head_oficinas" ></div>

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
            <!-- <div class="ibf_head_oficinas"></div> -->
            
            <div class="standard_wrapper ibf_font_16"> 
                <h1 class="ibf_color_orange">Oficinas Iberfurgo en España</h1>  
            
                <p>
                    Iberfurgo es una empresa especializada en el alquiler de furgonetas, camiones y turismos enfocados tanto a la carga de mercancía 
                    como a la movilidad de los pasajeros. Contamos con años de profesionalidad y experiencia en el sector. 
                    A nuestro lado puedes disfrutar de la tranquilidad y seguridad de un trabajo bien hecho, pues contamos con los últimos modelos 
                    del mercado automovilístico al mejor precio. Además, en caso de avería dispondrá en el vehículo de alquiler de un número de asistencia 
                    en carretera que estará disponible 24 horas los 365 días del año.
                </p>

                <p>
                    En Iberfurgo, como empresa, autónomo o particular podrás elegir entre una amplia flota de vehículos comerciales adaptados a tus necesidades: 
                    para personas con movilidad reducida, alquiler de furgonetas isotermo con equipo de frío para el traslado de productos perecederos e, 
                    incluso,furgonetas mixtas que sean capaz de alternar el transporte de carga con el de pasajeros. 
                </p>

                <p>
                    Todas ellas pueden manejarse con el carnet de conducir estándar, es decir, categoría B, por lo que no tendrás problema a la hora de alquilar 
                    la furgoneta que mejor se amolde a tus necesidades. La flota en stock de Iberfurgo engloba todo tipo de vehículos, entre ellos:
                </p>

                <ul class="single_car_departure_wrapper  ibf_li themeborder">
                    <li>
                        <div class="one">
                            <span class="ti-check ibf_color_orange"></span>Alquiler de Furgonetas de Carga
                        </div>
                    </li>
                    <li>
                        <div class="one">
                            <span class="ti-check ibf_color_orange"></span>Alquiler de Furgonetas para Pasajeros
                        </div>
                    </li>
                    <li>
                        <div class="one">
                            <span class="ti-check ibf_color_orange"></span>Alquiler de Camiones Con/Sin Plataforma Elevadora
                        </div>
                    </li>
                    <li>
                        <div class="one">
                            <span class="ti-check ibf_color_orange"></span>Alquiler de Turismos
                        </div>
                    </li>
                </ul>
                <p>
                    Para el alquiler de furgonetas o cualquier otro tipo de vehículo anteriormente mencionado, 
                    Iberfurgo te ofrece distintas opciones de contratación, siempre en función del tiempo y kilometraje que necesites:
                </p>

                <ul class="single_car_departure_wrapper  ibf_li themeborder">
                    <li>
                        <div class="one">
                            <span class="ti-check ibf_color_orange"></span>Tarifa de Alquiler de furgonetas por días
                        </div>
                    </li>
                    <li>
                        <div class="one">
                            <span class="ti-check ibf_color_orange"></span>Tarifa de Alquiler de furgonetas por meses
                        </div>
                    </li>
                </ul>  

            <p> 
                ¿Tiene Iberfurgo un alquiler de furgonetas baratas? ¡Claro que sí! En nuestra web podrás conocer todas nuestras tarifas por horas, días o meses. 
                Si lo prefieres, puedes recibir un trato más personal, llamando a nuestro número de teléfono: 91 626 39 29. En él, nuestros especialistas te atenderán 
                y resolverán todas tus dudas para conseguir el alquiler de furgonetas que más se amolde a tus necesidades.  
            </p>

            <p>
                Además, en Iberfurgo podrás ser atendido en cualquiera de nuestras oficinas, ubicadas a lo largo y ancho de la geografía española. Aunque actualmente no es 
                posible la entrega y devolución de la furgoneta o vehí­culo fuera de la provincia donde el usuario realizó la contratación del servicio de alquiler, 
                en Iberfurgo no descartamos esta opción y queremos seguir escuchando a nuestros clientes para conocer sus necesidades. 
            </p>

            <p>Estos son algunos de los grupos de vehículos que podrás encontrar en Iberfurgo: </p>
            <ul class="single_car_departure_wrapper  ibf_li themeborder">
                <li>
                    <div class="one">
                        <span class="ti-check ibf_color_orange"></span><strong>Grupo A: </strong> Furgón Derivado de Turismo/Combi 3-4m<sup>3</sup>
                    </div>
                </li>
                <li>
                    <div class="one">
                        <span class="ti-check ibf_color_orange"></span><strong>Grupo B: </strong>  Furgón 6-7m<sup>3</sup>Transit/ Mercedes Vito
                    </div>
                </li>
                <li>
                    <div class="one">
                        <span class="ti-check ibf_color_orange"></span><strong>Grupo C: </strong>  Furgón 8-10m<sup>3</sup> Mercedes Sprinter
                    </div>
                </li>
                <li>
                    <div class="one">
                        <span class="ti-check ibf_color_orange"></span><strong>Grupo D: </strong>  Furgón 10-12m<sup>3</sup> VW Crafter Sobre Elevada
                    </div>
                </li>
                <li>
                    <div class="one">
                        <span class="ti-check ibf_color_orange"></span><strong>Grupo E: </strong>  Furgón 12-15m<sup>3</sup> Fiat Ducato
                    </div>
                </li>
                <li>
                    <div class="one">
                        <span class="ti-check ibf_color_orange"></span><strong>Grupo F: </strong>  Furgón CARROZADO 20m<sup>3</sup> SIN PLATAFORMA Nissan NT400
                    </div>
                </li>
                <li>
                    <div class="one">
                        <span class="ti-check ibf_color_orange"></span><strong>Grupo G: </strong>  Furgón CARROZADO 20m<sup>3</sup> CON PLATAFORMA Nissan NT400
                    </div>
                </li>
                <li>
                    <div class="one">
                        <span class="ti-check ibf_color_orange"></span><strong>Grupo H: </strong> 6 Plazas Citroen Jumpy 6 plazas
                    </div>
                </li>
                <li>
                    <div class="one">
                        <span class="ti-check ibf_color_orange"></span><strong>Grupo I: </strong>  9 Plazas Citroen Jumpy 9 plazas
                    </div>
                </li>
                <li>
                    <div class="one">
                        <span class="ti-check ibf_color_orange"></span><strong>Grupo J: </strong>  9 Plazas VIP Toyota Shuttle
                    </div>
                </li>
                <li>
                    <div class="one">
                        <span class="ti-check ibf_color_orange"></span><strong>Grupo K: </strong>  Turismo Pequeño Micra
                    </div>
                </li>
                <li>
                    <div class="one">
                        <span class="ti-check ibf_color_orange"></span><strong>Grupo L: </strong>  Turismo Mediano/SUV Juke
                    </div>
                </li>
                <li>
                    <div class="one">
                        <span class="ti-check ibf_color_orange"></span><strong>Grupo M: </strong>  Turismo Grande/SUV Grande Qashqai
                    </div>
                </li>
            </ul>
            
            <p>
                Los servicios de alquiler de furgonetas de Iberfurgo están disponibles en las ubicaciones que encontrarás en la parte inferior. 
                Para conocer los datos de contacto de cada una de ellas, pincha en la oficina que más te interese: 
            </p>


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
                        mapa_oficina="'.esc_attr($value->delegacion_datos_web->mapa_oficina).'"
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