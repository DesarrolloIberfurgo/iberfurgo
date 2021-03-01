<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
//die('cpt found');
/**
 * hooks for wp blog part
 */

// if there is no excerpt, sets a defult placeholder
// ----------------------------------------------------------------------------------------

if ( class_exists( 'CarRentalCustomPost\CarRental_CustomPost' ) ) {
    //project
   $project = new CarRentalCustomPost\CarRental_CustomPost( 'carrental' );

	$project->xs_init( 'xs-cars', 'Cars', 'Cars', array( 'menu_icon' => 'dashicons-grid-view',
		'supports'	 => array( 'title' ),
		'rewrite'	 => array( 'slug' => 'xs-cars' ),
		'exclude_from_search' => true,

	));

	$project_tax = new  CarRentalCustomPost\CarRental_Taxonomies('carrental');
   	$project_tax->xs_init('xs-cars-category', 'Cars Category', 'Cars Categories', 'xs-cars');
}

if (class_exists('ElementsKit')) {
	add_action('elementskit/template/before_header', function(){
		echo '<div class="xs_page_wrapper">';
	});

	add_action('elementskit/template/after_footer', function(){
		echo '</div>';
	});
}