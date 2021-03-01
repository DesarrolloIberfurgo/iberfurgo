<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * helper functions
 */

// simply echo the variable
// ----------------------------------------------------------------------------------------
function carrental_return( $s ) {

	return wp_kses_post($s);
}

//css unit check
function carrental_style_unit( $data ) {
   $css_units = ["px","mm","in","pt","pc","em","vw","%","cm"];
   $footer_padding_top_unit = substr($data, -2);
   $footer_padding_top_unit_percent = substr($data, -1);
   if(in_array($footer_padding_top_unit,$css_units) || in_array($footer_padding_top_unit_percent,$css_units)){
    return $data;
   }else{
     return (int)$data."px";
   }

   return $data;
}

// return the specific value from theme options/ customizer/ etc
// ----------------------------------------------------------------------------------------
function carrental_option( $key, $default_value = '', $method = 'customizer' ) {
	if ( defined( 'DEVM' ) ) {
		switch ( $method ) {
			case 'customizer':
				$value = devm_theme_option( $key );
				break;
			default:
				$value = '';
				break;
		}
		return (!isset($value) || $value == '') ? $default_value :  $value;
	}
	return $default_value;
}


// return the specific value from metabox
// ----------------------------------------------------------------------------------------
function carrental_meta_option( $postid, $key, $default_value = '' ) {
	if ( defined( 'DEVM' ) ) {
		$value = devm_meta_option($postid, $key, $default_value);
	}
	return (!isset($value) || $value == '') ? $default_value :  $value;
}




// unyson based image resizer
// ----------------------------------------------------------------------------------------
function carrental_resize( $url, $width = false, $height = false, $crop = false ) {
	if ( function_exists( 'fw_resize' ) ) {
		$fw_resize	 = FW_Resize::getInstance();
		$response	 = $fw_resize->process( $url, $width, $height, $crop );
		return (!is_wp_error( $response ) && !empty( $response[ 'src' ] ) ) ? $response[ 'src' ] : $url;
	} else {
		$response = wp_get_attachment_image_src( $url, array( $width, $height ) );
		if ( !empty( $response ) ) {
			return $response[ 0 ];
		}
	}
}


// extract unyson image data from option value in a much simple way
// ----------------------------------------------------------------------------------------
function carrental_src( $key, $default_value = '', $input_as_attachment = false ) { // for src
	if ( $input_as_attachment == true ) {
		$attachment = $key;
	} else {
		$attachment = carrental_option( $key );
	}

	if ( isset( $attachment[ 'url' ] ) && !empty( $attachment ) ) {
		return $attachment[ 'url' ];
	}

	return $default_value;
}


// return attachment alt in safe mode
// ----------------------------------------------------------------------------------------
function carrental_alt( $id ) {
	if ( !empty( $id ) ) {
		$alt = get_post_meta( $id, '_wp_attachment_image_alt', true );
		if ( !empty( $alt ) ) {
			$alt = $alt;
		} else {
			$alt = get_the_title( $id );
		}
		return $alt;
	}
}


// get original id in WPML enabled WP
// ----------------------------------------------------------------------------------------
function carrental_org_id( $id, $name = true ) {
	if ( function_exists( 'icl_object_id' ) ) {
		$id = icl_object_id( $id, 'page', true, 'en' );
	}

	if ( $name === true ) {
		$post = get_post( $id );
		return $post->post_name;
	} else {
		return $id;
	}
}


// converts rgb color code to hex format
// ----------------------------------------------------------------------------------------
function carrental_rgb2hex( $hex ) {
	$hex		 = preg_replace( "/^#(.*)$/", "$1", $hex );
	$rgb		 = array();
	$rgb[ 'r' ]	 = hexdec( substr( $hex, 0, 2 ) );
	$rgb[ 'g' ]	 = hexdec( substr( $hex, 2, 2 ) );
	$rgb[ 'b' ]	 = hexdec( substr( $hex, 4, 2 ) );

	$color_hex = $rgb[ "r" ] . ", " . $rgb[ "g" ] . ", " . $rgb[ "b" ];
	return $color_hex;
}


// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function carrental_kses( $raw ) {

	$allowed_tags = array(
		'a'								 => array(
			'class'	 => array(),
			'href'	 => array(),
			'rel'	 => array(),
			'title'	 => array(),
		),
		'abbr'							 => array(
			'title' => array(),
		),
		'b'								 => array(),
		'blockquote'					 => array(
			'cite' => array(),
		),
		'cite'							 => array(
			'title' => array(),
		),
		'code'							 => array(),
		'del'							 => array(
			'datetime'	 => array(),
			'title'		 => array(),
		),
		'dd'							 => array(),
		'div'							 => array(
			'class'	 => array(),
			'title'	 => array(),
			'style'	 => array(),
		),
		'dl'							 => array(),
		'dt'							 => array(),
		'em'							 => array(),
		'h1'							 => array(),
		'h2'							 => array(),
		'h3'							 => array(),
		'h4'							 => array(),
		'h5'							 => array(),
		'h6'							 => array(),
		'i'								 => array(
			'class' => array(),
		),
		'img'							 => array(
			'alt'	 => array(),
			'class'	 => array(),
			'height' => array(),
			'src'	 => array(),
			'width'	 => array(),
		),
		'li'							 => array(
			'class' => array(),
		),
		'ol'							 => array(
			'class' => array(),
		),
		'p'								 => array(
			'class' => array(),
		),
		'q'								 => array(
			'cite'	 => array(),
			'title'	 => array(),
		),
		'span'							 => array(
			'class'	 => array(),
			'title'	 => array(),
			'style'	 => array(),
		),
		'iframe'						 => array(
			'width'			 => array(),
			'height'		 => array(),
			'scrolling'		 => array(),
			'frameborder'	 => array(),
			'allow'			 => array(),
			'src'			 => array(),
		),
		'strike'						 => array(),
		'br'							 => array(),
		'strong'						 => array(),
		'data-wow-duration'				 => array(),
		'data-wow-delay'				 => array(),
		'data-wallpaper-options'		 => array(),
		'data-stellar-background-ratio'	 => array(),
		'ul'							 => array(
			'class' => array(),
		),
	);

	if ( function_exists( 'wp_kses' ) ) { // WP is here
		$allowed = wp_kses( $raw, $allowed_tags );
	} else {
		$allowed = $raw;
	}


	return $allowed;
}


// build google font url
// ----------------------------------------------------------------------------------------
function carrental_google_fonts_url($font_families	 = []) {
	$fonts_url		 = '';
	/*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
    */
	if ( $font_families && 'off' !== _x( 'on', 'Google font: on or off', 'carrental' ) ) {
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) )
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}


// return megamenu child item's slug
// ----------------------------------------------------------------------------------------
function carrental_get_mega_item_child_slug( $location, $option_id ) {
	$mega_item	 = '';
	$locations	 = get_nav_menu_locations();
	$menu		 = wp_get_nav_menu_object( $locations[ $location ] );
	$menuitems	 = wp_get_nav_menu_items( $menu->term_id );

	foreach ( $menuitems as $menuitem ) {

		$id			 = $menuitem->ID;
		$mega_item	 = fw_ext_mega_menu_get_db_item_option( $id, $option_id );
	}
	return $mega_item;
}


// return cover image from an youtube video url
// ----------------------------------------------------------------------------------------
function carrental_youtube_cover( $e ) {
	$src = null;
	//get the url
	if ( $e != '' ){
		$url = $e;
		$queryString = parse_url( $url, PHP_URL_QUERY );
		parse_str( $queryString, $params );
		$v = $params[ 'v' ];
		//generate the src
		if ( strlen( $v ) > 0 ) {
			$src = "http://i3.ytimg.com/vi/$v/default.jpg";
		}
	}

	return $src;
}


// return embed code for sound cloud
// ----------------------------------------------------------------------------------------
function carrental_soundcloud_embed( $url ) {
	return 'https://w.soundcloud.com/player/?url=' . urlencode($url) . '&auto_play=false&color=915f33&theme_color=00FF00';
}


// return embed code video url
// ----------------------------------------------------------------------------------------
function carrental_video_embed($url){
    //This is a general function for generating an embed link of an FB/Vimeo/Youtube Video.
	$embed_url = '';
    if(strpos($url, 'facebook.com/') !== false) {
        //it is FB video
        $embed_url ='https://www.facebook.com/plugins/video.php?href='.rawurlencode($url).'&show_text=1&width=200';
    }else if(strpos($url, 'vimeo.com/') !== false) {
        //it is Vimeo video
        $video_id = explode("vimeo.com/",$url)[1];
        if(strpos($video_id, '&') !== false){
            $video_id = explode("&",$video_id)[0];
        }
        $embed_url ='https://player.vimeo.com/video/'.$video_id;
    }else if(strpos($url, 'youtube.com/') !== false) {
        //it is Youtube video
        $video_id = explode("v=",$url)[1];
        if(strpos($video_id, '&') !== false){
            $video_id = explode("&",$video_id)[0];
        }
		$embed_url ='https://www.youtube.com/embed/'.$video_id;
    }else if(strpos($url, 'youtu.be/') !== false){
        //it is Youtube video
        $video_id = explode("youtu.be/",$url)[1];
        if(strpos($video_id, '&') !== false){
            $video_id = explode("&",$video_id)[0];
        }
        $embed_url ='https://www.youtube.com/embed/'.$video_id;
    }else{
        //for new valid video URL
    }
    return $embed_url;
}

if ( !function_exists( 'carrental_advanced_font_styles' ) ) :

	/**
	 * Get shortcode advanced Font styles
	 *
	 */
	function carrental_advanced_font_styles( $data ) {

		$style = [];

		if (is_string($data)) {
			$style = json_decode($data, true);
		} else {
			$style = $data;
		}

		$font_styles = $font_weight = '';

		$font_weight = (isset( $style[ 'weight' ] ) && $style[ 'weight' ]) ? 'font-weight:' . esc_attr( $style[ 'weight' ] ) . ';' : '';

		$font_styles .= isset( $style[ 'family' ] ) ? 'font-family:"' . $style[ 'family' ] . '";' : '';
		$font_styles .= isset($style[ 'style' ] ) && $style[ 'style' ] ? 'font-style:' . esc_attr( $style[ 'style' ] ) . ';' : '';

		$font_styles .= isset( $style[ 'color' ] ) && !empty( $style[ 'color' ] ) ? 'color:' . esc_attr( $style[ 'color' ] ) . ';' : '';
		$font_styles .= isset( $style[ 'line_height' ] ) && !empty( $style[ 'line_height' ] ) ? 'line-height:' . esc_attr( $style[ 'line_height' ] / $style[ 'size' ]) . ';' : '';
		$font_styles .= isset( $style[ 'letter_spacing' ] ) && !empty( $style[ 'letter_spacing' ] ) ? 'letter-spacing:' . esc_attr( $style[ 'letter_spacing' ] / 1000 * 1 ) . 'rem;' : '';
		$font_styles .= isset( $style[ 'size' ] ) && !empty( $style[ 'size' ] ) ? 'font-size:' . esc_attr( $style[ 'size' ] ) . 'px;' : '';

		$font_styles .= !empty( $font_weight ) ? $font_weight : '';

		return !empty( $font_styles ) ? $font_styles : '';
	}

endif;

//  WPML CUSTOM Swicther

//WPML CUSTOM Swicther
if ( !function_exists( 'carrental_languages_list_popup' ) ) :

	function carrental_languages_list_popup() {
		$languages = icl_get_languages( 'skip_missing=0&orderby=code' );
		if ( !empty( $languages ) ) {
			echo '<div class="language-content"><ul class="flag-lists">';
			foreach ( $languages as $l ) {
				echo '<li>';
				if ( $l[ 'country_flag_url' ] ) {
					if ( !$l[ 'active' ] )
						echo '<a href="' . $l[ 'url' ] . '">';
					echo '<img src="' . $l[ 'country_flag_url' ] . '" height="12" alt="' . $l[ 'language_code' ] . '" width="18" />';
					if ( !$l[ 'active' ] )
						echo '</a>';
				}
				if ( !$l[ 'active' ] )
					echo '<a href="' . $l[ 'url' ] . '">';
				echo icl_disp_language( $l[ 'native_name' ], $l[ 'translated_name' ] );
				if ( !$l[ 'active' ] )
					echo '</a>';
				echo '</li>';
			}
			echo '</ul></div>';
		}
	}


endif;

// language list

if ( !function_exists( 'carrental_languages_list_wpml' ) ) :

	function carrental_languages_list_wpml() {
		$languages = icl_get_languages( 'skip_missing=0&orderby=code' );
		if ( !empty( $languages ) ) {
			echo '<ul class="language_switch_two">';
			foreach ( $languages as $l ) {
				echo '<li>';
				if ( !$l[ 'active' ] )
					echo '<a href="' . $l[ 'url' ] . '">';
				echo icl_disp_language( $l[ 'native_name' ], $l[ 'translated_name' ] );
				if ( !$l[ 'active' ] )
					echo '</a>';
				echo '</li>';
			}
			echo '</ul>';
		}
	}


endif;

function carrental_ekit_headers($format='html'){

    if(in_array('elementskit-lite/elementskit-lite.php', apply_filters('active_plugins', get_option('active_plugins'))) || in_array('elementskit/elementskit.php', apply_filters('active_plugins', get_option('active_plugins')))){
        $select = [];
        $args = array(
            'posts_per_page'   => -1,
            'post_type' => 'elementskit_template',
            'meta_key' => 'elementskit_template_type',
            'meta_value' => 'header'
        );
		$headers = get_posts($args);
		$select[] = esc_html__( "Please select header", "carrental" );
        foreach($headers as $header) {
            $select[$header->ID ] = $header->post_title;
        }
        return $select;

    }
    return [];
}

function carrental_ekit_footers($format='html'){

    if(in_array('elementskit-lite/elementskit-lite.php', apply_filters('active_plugins', get_option('active_plugins'))) || in_array('elementskit/elementskit.php', apply_filters('active_plugins', get_option('active_plugins')))){
        $select = [];
        $args = array(
            'posts_per_page'   => -1,
            'post_type' => 'elementskit_template',
            'meta_key' => 'elementskit_template_type',
            'meta_value' => 'footer'
        );
		$footers = get_posts($args);
		$select[] = esc_html__( "Please select footer", "carrental" );
        foreach($footers as $footer) {
            $select[$footer->ID ] = $footer->post_title;
        }
        return $select;

    }
    return [];
}