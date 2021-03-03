<?php
/**
 * Template Name: Delegaciones
 * The main template file for display delegaciones page.
 *
 * @package WordPress
*/

/**
*	Get current page id
**/
get_header(); 

list($httpCode, $response) = getDataApi(URL_API . 'maestro-delegacion', '{"order":["nombre asc"]}');
if ($httpCode != 200) {
	return 'ha petado';
}
?>

<div id="page_content_wrapper" class="<?php if(!empty($pp_page_bg)) { ?>hasbg<?php } ?> <?php if(!empty($pp_page_bg) && !empty($grandcarrental_topbar)) { ?>withtopbar<?php } ?>">
    <div class="inner">
    	<!-- Begin main content -->
    	<div class="inner_wrapper">
    		<div class="sidebar_content full_width">
    		<?php 
    			foreach($response->data as $key => $value)	
                {
                    echo do_shortcode('[tg_accordion title="'.esc_attr($value->nombre).'" icon="" close="1"]'.esc_attr($value->descripcion).'[/tg_accordion]');
                }
			?>
            </div>
			<div class="fullwidth_comment_wrapper">
				<?php comments_template( '', true ); ?>
			</div>
    	</div>
    	<!-- End main content -->
    </div> 
</div>
<br class="clear"/>
<?php get_footer(); ?>