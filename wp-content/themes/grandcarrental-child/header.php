<?php
/**
 * The Header for the template.
 *
 * @package WordPress
 */
 
if (!isset( $content_width ) ) $content_width = 1170;

if(session_id() == '') {
	session_start();
}
 
$grandcarrental_homepage_style = grandcarrental_get_homepage_style();

$tg_menu_layout = grandcarrental_menu_layout();

?><!DOCTYPE html>
<html <?php language_attributes(); ?> <?php if(isset($grandcarrental_homepage_style) && !empty($grandcarrental_homepage_style)) { echo 'data-style="'.esc_attr($grandcarrental_homepage_style).'"'; } ?> data-menu="<?php echo esc_attr($tg_menu_layout); ?>">
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TRSXVXV');</script>
<!-- End Google Tag Manager -->


<!-- Quantcast Choice. Consent Manager Tag v2.0 (for TCF 2.0) -->
<script type="text/javascript" async=true>
(function() {
  var host = window.location.hostname;
  var element = document.createElement('script');
  var firstScript = document.getElementsByTagName('script')[0];
  var url = 'https://quantcast.mgr.consensu.org'
    .concat('/choice/', 'FL2mc7FQjNwR9', '/', host, '/choice.js')
  var uspTries = 0;
  var uspTriesLimit = 3;
  element.async = true;
  element.type = 'text/javascript';
  element.src = url;

  firstScript.parentNode.insertBefore(element, firstScript);

  function makeStub() {
    var TCF_LOCATOR_NAME = '__tcfapiLocator';
    var queue = [];
    var win = window;
    var cmpFrame;

    function addFrame() {
      var doc = win.document;
      var otherCMP = !!(win.frames[TCF_LOCATOR_NAME]);

      if (!otherCMP) {
        if (doc.body) {
          var iframe = doc.createElement('iframe');

          iframe.style.cssText = 'display:none';
          iframe.name = TCF_LOCATOR_NAME;
          doc.body.appendChild(iframe);
        } else {
          setTimeout(addFrame, 5);
        }
      }
      return !otherCMP;
    }

    function tcfAPIHandler() {
      var gdprApplies;
      var args = arguments;

      if (!args.length) {
        return queue;
      } else if (args[0] === 'setGdprApplies') {
        if (
          args.length > 3 &&
          args[2] === 2 &&
          typeof args[3] === 'boolean'
        ) {
          gdprApplies = args[3];
          if (typeof args[2] === 'function') {
            args[2]('set', true);
          }
        }
      } else if (args[0] === 'ping') {
        var retr = {
          gdprApplies: gdprApplies,
          cmpLoaded: false,
          cmpStatus: 'stub'
        };

        if (typeof args[2] === 'function') {
          args[2](retr);
        }
      } else {
        queue.push(args);
      }
    }

    function postMessageEventHandler(event) {
      var msgIsString = typeof event.data === 'string';
      var json = {};

      try {
        if (msgIsString) {
          json = JSON.parse(event.data);
        } else {
          json = event.data;
        }
      } catch (ignore) {}

      var payload = json.__tcfapiCall;

      if (payload) {
        window.__tcfapi(
          payload.command,
          payload.version,
          function(retValue, success) {
            var returnMsg = {
              __tcfapiReturn: {
                returnValue: retValue,
                success: success,
                callId: payload.callId
              }
            };
            if (msgIsString) {
              returnMsg = JSON.stringify(returnMsg);
            }
            if (event && event.source && event.source.postMessage) {
              event.source.postMessage(returnMsg, '*');
            }
          },
          payload.parameter
        );
      }
    }

    while (win) {
      try {
        if (win.frames[TCF_LOCATOR_NAME]) {
          cmpFrame = win;
          break;
        }
      } catch (ignore) {}

      if (win === window.top) {
        break;
      }
      win = win.parent;
    }
    if (!cmpFrame) {
      addFrame();
      win.__tcfapi = tcfAPIHandler;
      win.addEventListener('message', postMessageEventHandler, false);
    }
  };

  makeStub();

  var uspStubFunction = function() {
    var arg = arguments;
    if (typeof window.__uspapi !== uspStubFunction) {
      setTimeout(function() {
        if (typeof window.__uspapi !== 'undefined') {
          window.__uspapi.apply(window.__uspapi, arg);
        }
      }, 500);
    }
  };

  var checkIfUspIsReady = function() {
    uspTries++;
    if (window.__uspapi === uspStubFunction && uspTries < uspTriesLimit) {
      console.warn('USP is not accessible');
    } else {
      clearInterval(uspInterval);
    }
  };

  if (typeof window.__uspapi === 'undefined') {
    window.__uspapi = uspStubFunction;
    var uspInterval = setInterval(checkIfUspIsReady, 6000);
  }
})();
</script>
<!-- End Quantcast Choice. Consent Manager Tag v2.0 (for TCF 2.0) -->


<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php
	//Fallback compatibility for favicon
	if(!function_exists( 'has_site_icon' ) || ! has_site_icon() ) 
	{
		/**
		*	Get favicon URL
		**/
		$tg_favicon = kirki_get_option('tg_favicon');
		
		if(!empty($tg_favicon))
		{
?>
			<link rel="shortcut icon" href="<?php echo esc_url($tg_favicon); ?>" />
<?php
		}
	}
?> 

<?php
	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TRSXVXV"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<?php
		//Check if disable right click
		$tg_enable_right_click = kirki_get_option('tg_enable_right_click');
		
		//Check if disable image dragging
		$tg_enable_dragging = kirki_get_option('tg_enable_dragging');
		
		//Check if sticky menu
		$tg_fixed_menu = kirki_get_option('tg_fixed_menu');
		
		//Check if smart sticky menu
		$tg_smart_fixed_menu = kirki_get_option('tg_smart_fixed_menu');
		
		//Check if sticky sidebar
		$tg_sidebar_sticky = kirki_get_option('tg_sidebar_sticky');
		
		//Check if display top bar
		$tg_topbar = kirki_get_option('tg_topbar');
		if(GRANDCARRENTAL_THEMEDEMO && isset($_GET['topbar']) && !empty($_GET['topbar']))
		{
			$tg_topbar = true;
		}
		
		//Check if add blur effect
		$tg_page_title_img_blur = kirki_get_option('tg_page_title_img_blur');

		//Check menu layout
		$tg_menu_layout = grandcarrental_menu_layout();
		
		//Check filterable link option
		$tg_portfolio_filterable_link = kirki_get_option('tg_portfolio_filterable_link');
		
		//Check image flow reflection option
		$tg_flow_enable_reflection = kirki_get_option('tg_flow_enable_reflection');
		
		//Get lightbox skin color
		$tg_lightbox_skin = kirki_get_option('tg_lightbox_skin');
		
		//Get lightbox thumbnails alignment
		$tg_lightbox_thumbnails = kirki_get_option('tg_lightbox_thumbnails');
		$tg_lightbox_thumbnails_display = true;
		if(empty($tg_lightbox_thumbnails))
		{
			$tg_lightbox_thumbnails_display = false;
		}
		
		//Get lightbox overlay opacity
		$tg_lightbox_opacity = kirki_get_option('tg_lightbox_opacity');
		$tg_lightbox_opacity = $tg_lightbox_opacity/100;
	?>
	<input type="hidden" id="pp_menu_layout" name="pp_menu_layout" value="<?php echo esc_attr($tg_menu_layout); ?>"/>
	<input type="hidden" id="pp_enable_right_click" name="pp_enable_right_click" value="<?php echo esc_attr($tg_enable_right_click); ?>"/>
	<input type="hidden" id="pp_enable_dragging" name="pp_enable_dragging" value="<?php echo esc_attr($tg_enable_dragging); ?>"/>
	<input type="hidden" id="pp_image_path" name="pp_image_path" value="<?php echo get_template_directory_uri(); ?>/images/"/>
	<input type="hidden" id="pp_homepage_url" name="pp_homepage_url" value="<?php echo esc_url(home_url('/')); ?>"/>
	<input type="hidden" id="pp_fixed_menu" name="pp_fixed_menu" value="<?php echo esc_attr($tg_fixed_menu); ?>"/>
	<input type="hidden" id="tg_smart_fixed_menu" name="tg_smart_fixed_menu" value="<?php echo esc_attr($tg_smart_fixed_menu); ?>"/>
	<input type="hidden" id="tg_sidebar_sticky" name="tg_sidebar_sticky" value="<?php echo esc_attr($tg_sidebar_sticky); ?>"/>
	<input type="hidden" id="pp_topbar" name="pp_topbar" value="<?php echo esc_attr($tg_topbar); ?>"/>
	<input type="hidden" id="post_client_column" name="post_client_column" value="4"/>
	<input type="hidden" id="pp_back" name="pp_back" value="<?php esc_html_e('Back', 'grandcarrental' ); ?>"/>
	<input type="hidden" id="pp_page_title_img_blur" name="pp_page_title_img_blur" value="<?php echo esc_attr($tg_page_title_img_blur); ?>"/>
	<input type="hidden" id="tg_portfolio_filterable_link" name="tg_portfolio_filterable_link" value="<?php echo esc_attr($tg_portfolio_filterable_link); ?>"/>
	<input type="hidden" id="tg_flow_enable_reflection" name="tg_flow_enable_reflection" value="<?php echo esc_attr($tg_flow_enable_reflection); ?>"/>
	<input type="hidden" id="tg_lightbox_skin" name="tg_lightbox_skin" value="<?php echo esc_attr($tg_lightbox_skin); ?>"/>
	<input type="hidden" id="tg_lightbox_thumbnails" name="tg_lightbox_thumbnails" value="<?php echo esc_attr($tg_lightbox_thumbnails); ?>"/>
	<input type="hidden" id="tg_lightbox_thumbnails_display" name="tg_lightbox_thumbnails_display" value="<?php echo esc_attr($tg_lightbox_thumbnails_display); ?>"/>
	<input type="hidden" id="tg_lightbox_opacity" name="tg_lightbox_opacity" value="<?php echo esc_attr($tg_lightbox_opacity); ?>"/>
	
	<?php
		if(class_exists('Woocommerce'))
		{
			$woocommerce = grandcarrental_get_woocommerce();
			$cart_url = wc_get_cart_url();
	?>
	<input type="hidden" id="tg_cart_url" name="tg_cart_url" value="<?php echo esc_url($cart_url); ?>"/>
	<?php
		}
	?>
	
	<?php
		$tg_live_builder = 0;
		if(isset($_GET['ppb_live']))
		{
			$tg_live_builder = 1;
		}
	?>
	<input type="hidden" id="tg_live_builder" name="tg_live_builder" value="<?php echo esc_attr($tg_live_builder); ?>"/>
	
	<?php
		//Check footer sidebar columns
		$tg_footer_sidebar = kirki_get_option('tg_footer_sidebar');
	?>
	<input type="hidden" id="pp_footer_style" name="pp_footer_style" value="<?php echo esc_attr($tg_footer_sidebar); ?>"/>
	
	<?php
		//Get main menu layout
		$tg_menu_layout = grandcarrental_menu_layout();
		
		switch($tg_menu_layout)
		{
			case 'centeralign':
			case 'hammenuside':
			case 'leftalign':
			default:
				get_template_part("/templates/template-sidemenu");
			break;
			
			case 'hammenufull':
				get_template_part("/templates/template-fullmenu");
			break;
		}
	?>

	<!-- Begin template wrapper -->
	<?php
		$grandcarrental_page_menu_transparent = grandcarrental_get_page_menu_transparent();

		if(isset($post->ID))
		{
			$current_page_id = $post->ID;
		}
		else
		{
			$current_page_id = '';
		}
		
		//Get Page Menu Transparent Option
		$page_menu_transparent = get_post_meta($current_page_id, 'page_menu_transparent', true);
	
	    $pp_page_bg = '';
	    //Get page featured image
	    if(has_post_thumbnail($current_page_id, 'full'))
	    {
	        $image_id = get_post_thumbnail_id($current_page_id); 
	        $image_thumb = wp_get_attachment_image_src($image_id, 'full', true);
	        $pp_page_bg = $image_thumb[0];
	    }
	    
	   if(!empty($pp_page_bg) && basename($pp_page_bg)=='default.png')
	    {
	    	$pp_page_bg = '';
	    }
		
		//Check if Woocommerce is installed	
		if(class_exists('Woocommerce') && grandcarrental_is_woocommerce_page())
		{
			$shop_page_id = get_option('woocommerce_shop_page_id');
			$page_menu_transparent = get_post_meta($shop_page_id, 'page_menu_transparent', true);
		}
		
		if(is_single() && !empty($pp_page_bg) && !grandcarrental_is_woocommerce_page())
		{
		    $post_type = get_post_type();
		    
		    switch($post_type)
		    {
		    	case 'tour':
			    	$tg_tour_single_header = kirki_get_option('tg_tour_single_header');
			    	
		    		if(has_post_thumbnail($current_page_id, 'original') && !empty($tg_tour_single_header))
					{
		    			$page_menu_transparent = 1;
		    		}
		    	break;
		    	
		    	case 'post':
		    	case 'car':
		    		$post_menu_transparent = get_post_meta($current_page_id, 'post_menu_transparent', true);
		    	
					if(has_post_thumbnail($current_page_id, 'original') && !empty($post_menu_transparent))
					{
			    		$page_menu_transparent = 1;
			    		$grandcarrental_page_menu_transparent = 1;
			    	}
			    break;
	
				default:
		    		$page_menu_transparent = 0;	
		    	break;
		    }
		}
		else if(is_single() && empty($pp_page_bg) && !grandcarrental_is_woocommerce_page())
		{
			$page_menu_transparent = 0;	
		}
		
		if(is_search())
		{
		    $page_menu_transparent = 0;
		}
		
		if(is_404())
		{
		    $page_menu_transparent = 0;
		}
		
		if(!empty($term) && function_exists('z_taxonomy_image_url'))
	    {
		    $pp_page_bg = z_taxonomy_image_url();
			
			if(!empty($pp_page_bg))
			{
				$page_menu_transparent = 1;
				$grandcarrental_page_menu_transparent = 1;
			}
	    }
	?>
	<div id="wrapper" class="<?php if(!empty($grandcarrental_page_menu_transparent)) { ?>hasbg<?php } ?> <?php if(!empty($page_menu_transparent)) { ?>transparent<?php } ?>">
	
	<?php
		//Get current page template
		$tg_current_page_template = basename(get_page_template(),'.php');
	
		if($tg_current_page_template != 'maintenance')
		{
			//Get main menu layout
			$tg_menu_layout = grandcarrental_menu_layout();
			
			switch($tg_menu_layout)
			{
				case 'centeralign':
				case 'hammenuside':
				case 'hammenufull':
				default:
					get_template_part("/templates/template-topmenu");
				break;
				
				case 'leftalign':
					get_template_part("/templates/template-topmenu-left");
				break;
				
				case 'centeralogo':
					get_template_part("/templates/template-topmenu-center-menus");
				break;
			}
		}
	?>