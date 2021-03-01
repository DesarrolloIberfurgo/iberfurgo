<?php
   $default_class = '';
   if ( defined( 'DEVM' ) ) {
      $header_nav_search_section    = carrental_option('header_nav_search_section');
      $header_quota_button          = carrental_option('header_quota_button');
      if($header_quota_button == 'yes'){
         $header_quota_text            =  carrental_option('header_quota_text');
         $header_quota_url             =  carrental_option('header_quota_url');
      }
      //Page settings
      $header_nav_sticky         = carrental_option('header_nav_sticky');
      $header_transparent_enable = carrental_option('header_transparent_enable');
      $default_class .="";
      $general_main_logo = carrental_option('general_main_logo');
   }else{
      $header_quota_button          = 'yes';
      $header_transparent_enable    = 'yes';
      $header_nav_search_section    = 'yes';
      $header_quota_url             = "#";
      $header_quota_text            = esc_html__('Get a quote','carrental');
      $header_nav_sticky            = 'no';
      $default_class .= 'header_default';
   }

?>

<header id="header" class="header header-standard <?php echo esc_attr( $default_class); ?> <?php echo esc_attr($header_nav_sticky=='yes'?'navbar-sticky':''); ?> <?php echo esc_attr($header_transparent_enable=='yes'?'navbar-transparent':''); ?>">
   <div class="header-wrapper">
      <div class="container">
         <nav class="navbar navbar-expand-lg">
            <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
               <img  class="img-fluid" src="<?php
                  echo esc_url(
                     $general_main_logo === "" ? carrental_src(
                        'general_main_logo',
                        CARRENTAL_IMG . '/logo/logo-common.png'
                     ) : wp_get_attachment_image_url($general_main_logo, "full")
                  );
               ?>" alt="<?php bloginfo('name'); ?>">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                  data-target="#primary-nav" aria-controls="primary-nav" aria-expanded="false"
                  aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
            </button>
            <?php get_template_part( 'template-parts/navigations/nav', 'primary' ); ?>
            <?php if(defined( 'DEVM' )): ?>
               <?php if($header_nav_search_section == 'yes'): ?>
               <div class="nav-search-area">
                  <div class="nav-search">
                     <span id="search">
                     <i class="fa fa-search" aria-hidden="true"></i>
                     </span>
                  </div>
                  <div class="search-block">
                     <?php get_search_form(); ?>
                  </div>
                  <!--Search End-->
               </div>
               <?php endif; ?>
            <?php endif; ?>
            <!-- Site search end-->
            <?php if(defined( 'DEVM' )): ?>
               <?php if($header_quota_button =='yes' && $header_quota_text != ''): ?>
                  <div class="header-quote <?php if(!is_user_logged_in()){echo esc_attr("ml-auto");}?>">
                     <a href="<?php echo esc_url($header_quota_url); ?>" class="quote-btn btn">  <?php echo esc_html($header_quota_text); ?>
                     </a>
                  </div>
               <?php endif; ?>
            <?php endif; ?>
         </nav>
      </div><!-- container end-->
   </div><!-- header wrapper end-->
</header>
