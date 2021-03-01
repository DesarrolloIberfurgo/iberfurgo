   <?php
      $back_to_top = carrental_option('back_to_top');


   ?>

   <?php if(defined( 'DEVM' )): ?>

      <?php if( is_active_sidebar('footer-left') || is_active_sidebar('footer-center') || is_active_sidebar('footer-right') ): ?>
         <footer class="xs-footer solid-bg-two xs-footer-classic" >
            <div class="container">
               <div class="row">
                  <div class="col-lg-4 col-md-12 footer-widget">
                     <?php  dynamic_sidebar( 'footer-left' ); ?>

                  </div>
                  <div class="col-lg-5 col-md-6 footer-widget">
                     <?php  dynamic_sidebar( 'footer-center' ); ?>
                  </div>
                  <div class="col-lg-3 col-md-6 footer-widget">
                     <?php  dynamic_sidebar( 'footer-right' ); ?>
                  </div>
                  <!-- end col -->
               </div>
           </div>

         </footer>
      <?php endif; ?>
   <?php endif; ?>
   <div class="copy-right">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="300ms">

                     <div class="copyright-text">
                     <?php
                           $copyright_text = carrental_option('footer_copyright', 'Copyright &copy; '.date('Y').' CarRental. All Right Reserved.');
                        echo carrental_kses($copyright_text);
                     ?>
                     </div>
               </div>
               <div class="col-lg-6 col-md-5">
               <?php if ( defined( 'DEVM' ) ) : ?>
                     <div class="footer-social">
                        <ul class="default-footer-social-media-link">
                        <?php
                           $social_links = carrental_option('footer_social_links',[]);
                           foreach($social_links as $sl):
                              $class = 'ts-' . str_replace('fa fa-', '', $sl['icon_class']);
                              ?>
                              <li class="<?php echo esc_attr($class); ?>">
                                    <a href="<?php echo esc_url($sl['url']); ?>">
                                    <i class="<?php echo esc_attr($sl['icon_class']); ?>"></i>
                                    </a>
                              </li>
                           <?php endforeach; ?>
                        </ul>
                  <?php endif; ?>
                     </div>
                     <!--Footer Social End-->
               </div>
            </div>
            <!-- end row -->
         </div>
   </div>
        <!-- end footer -->
   <?php if($back_to_top=="yes"): ?>
      <div class="back_to_top">
         <a href="#" class="fa fa-angle-up" aria-hidden="true"></a>
      </div>
   <?php endif; ?>