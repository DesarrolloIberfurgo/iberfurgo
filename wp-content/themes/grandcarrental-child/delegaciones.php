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
            <!-- <div style="margin:auto;width:100%"> -->
            <div id="portfolio_filter_wrapper" class="gallery classic three_cols portfolio-content section content clearfix" data-columns="3">
    		<?php 
    			foreach($response->data as $key => $value)	
                {
                    $last = '';
                    if (($key+1)%3 == 1) {
                        $last = ' last';
                    }
                    ?>
                    <!-- <div class="one_third<?php echo esc_attr($last); ?>">  -->
                    <div class="element grid classic3_cols animated<?php echo esc_attr($key+1); ?>">
                        <div class="one_third gallery3 classic static filterable portfolio_type themeborder" data-id="post-<?php echo esc_attr($key+1); ?>">
                        <?php echo do_shortcode('[tg_accordion title="'.esc_attr($value->nombre).'" icon="" close="1"]'.esc_attr($value->descripcion).'[/tg_accordion]'); ?>
                        </div>
                    </div>
                    <?php
                }
			?>
             <?php echo do_shortcode('[tg_button href="http://localhost/iberfurgo-wp/delegaciones/delegacion-sevilla" color="" bg_color="" text_color=""][/tg_button]');?>
            <!-- </div> -->
            </div>
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