<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * hooks for wp blog part
 */

// if there is no excerpt, sets a defult placeholder
// ----------------------------------------------------------------------------------------
function carrental_excerpt( $words = 20 ) {
	$excerpt		 = get_the_excerpt();
	$trimmed_content = wp_trim_words( $excerpt, $words );
	echo wp_kses_post( $trimmed_content );
}


// change textarea position in comment form
// ----------------------------------------------------------------------------------------
function carrental_move_comment_textarea_to_bottom( $fields ) {
	$comment_field		 = $fields[ 'comment' ];
	unset( $fields[ 'comment' ] );
	$fields[ 'comment' ] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'carrental_move_comment_textarea_to_bottom' );


// change textarea position in comment form
// ----------------------------------------------------------------------------------------
function carrental_search_form( $form ) {
    $form = '
        <form  method="get" action="' . esc_url( home_url( '/' ) ) . '" class="carrental-serach xs-search-group">
            <div class="input-group">
                <input type="search" class="form-control" name="s" placeholder="' .esc_attr__( 'Search', 'carrental' ) . '" value="' . get_search_query() . '">
                <div class="input-group-append">
                    <button class="input-group-text search-button"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>';
	return $form;
}
add_filter( 'get_search_form', 'carrental_search_form' );

function carrental_body_classes( $classes ) {

    if ( is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'sidebar-active';
    }else{
        $classes[] = 'sidebar-inactive';
    }
    $box_class =  carrental_option('general_body_box_layout');
    if(isset($box_class['style'])){
        if($box_class['style']=='yes'){
         $classes[] = 'body-box-layout';
        }
    }

    return $classes;
 }

 add_filter( 'body_class','carrental_body_classes' );