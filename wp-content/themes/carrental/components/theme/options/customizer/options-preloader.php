<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: general
 */
$options =[
    'preloader_settings' => [
            'title'		 => esc_html__( 'Preloader settings', 'carrental' ),
            'options'	 => [
                'show_preloader' => array(
                    'type'         => 'multi-picker',
                    'label'        => false,
                    'desc'         => false,
                    'picker'       => array(
                        'show_preloader' => array(
                            'type'			 => 'switch',
                            'label'		 => esc_html__( 'Show Preloader', 'carrental' ),
                            'value'       => 'yes',
                            'left-choice'	 => [
                                'value'   	     => 'yes',
                                'label'	        => esc_html__( 'Yes', 'carrental' ),
                            ],
                            'right-choice'	 => [
                                'value'	 => 'no',
                                'label'	 => esc_html__( 'no', 'carrental' ),
                            ],

                        )
                    ),
                    'choices'      => array(
                        'yes' => array(
                            'preloader_style' => array(
                                'type'         => 'multi-picker',
                                'label'        => false,
                                'desc'         => false,
                                'picker'       => array(
                                    'svg_style' => array(
                                        'type'			 => 'switch',
                                        'label'		 => esc_html__( 'Custom svg', 'carrental' ),
                                        'value'       => 'custom',
                                        'left-choice'	 => [
                                            'value'   	     => 'custom',
                                            'label'	        => esc_html__( 'Custom', 'carrental' ),
                                        ],
                                        'right-choice'	 => [
                                            'value'	 => 'simple',
                                            'label'	 => esc_html__( 'Simple', 'carrental' ),
                                        ],

                                    )
                                ),
                                'choices'      => array(
                                    'custom' => array(
                                        'custom_svg'=> array(
                                            'type'  => 'textarea',
                                            'value' => '<div class="preloder-logo">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="201.134" height="43.7" viewBox="0 0 201.134 43.7" style="">
                                            <g id="carrental" transform="translate(0.034)">
                                              <g id="Group_1" data-name="Group 1">
                                                <path id="Path_1" data-name="Path 1" d="M131.7,6.8V.5h-7v11Z" fill="rgba(226,33,33,0)" stroke="#042ff8" stroke-miterlimit="10" stroke-width="1" class="OOYvpmzV_0"></path>
                                                <path id="Path_2" data-name="Path 2" d="M124.7,22.5V42.4h7V17.8Z" fill="rgba(226,33,33,0)" stroke="#042ff8" stroke-miterlimit="10" stroke-width="1" class="OOYvpmzV_1"></path>
                                              </g>
                                              <path id="Path_3" data-name="Path 3" d="M13.4,43.1c-4.2,0-7.3-1-9.4-2.9A11.048,11.048,0,0,1,.5,32.7H7.2A4.364,4.364,0,0,0,9.1,36a7.3,7.3,0,0,0,4.7,1.3,8.191,8.191,0,0,0,4.2-.9,2.86,2.86,0,0,0,1.5-2.5,2.755,2.755,0,0,0-1.8-2.6,19.733,19.733,0,0,0-4.3-1.4c-1.7-.4-3.4-.7-5.2-1.1a8.485,8.485,0,0,1-4.4-2.5A8.1,8.1,0,0,1,2,20.8,8.611,8.611,0,0,1,5.3,14c2.2-1.9,5.1-2.8,8.8-2.8a13.5,13.5,0,0,1,5.5,1,9.293,9.293,0,0,1,3.7,2.5,14.033,14.033,0,0,1,2,3.2,9.955,9.955,0,0,1,.8,3.3H19.4a4.5,4.5,0,0,0-1.6-3.1,5.262,5.262,0,0,0-3.9-1.3,7.03,7.03,0,0,0-3.9.9,2.931,2.931,0,0,0-1.3,2.6,2.489,2.489,0,0,0,1.8,2.3A28.68,28.68,0,0,0,14.9,24c1.7.4,3.4.8,5.2,1.1a8.183,8.183,0,0,1,4.4,2.7,8.371,8.371,0,0,1,1.8,5.6A8.471,8.471,0,0,1,23,40.2C20.6,42.2,17.5,43.1,13.4,43.1Z" fill="rgba(226,33,33,0)" stroke="#042ff8" stroke-miterlimit="10" stroke-width="1" class="OOYvpmzV_2"></path>
                                              <path id="Path_4" data-name="Path 4" d="M40.2,43.1c-3.6,0-6.3-.8-8-2.5a8.671,8.671,0,0,1-2.6-6.7q0-7.95,11.7-9.6L50,23v-.5c0-3.7-2.2-5.6-6.5-5.6-3.8,0-5.9,1.5-6.4,4.5H30.3A11.476,11.476,0,0,1,34,14c2.2-1.9,5.4-2.9,9.7-2.9s7.6,1,9.8,3,3.3,4.8,3.3,8.4v14a14.1,14.1,0,0,0,.9,5.7H51a.584.584,0,0,1-.1-.4,11.475,11.475,0,0,0-.2-1.4,14.769,14.769,0,0,1-.1-2.1C48.6,41.5,45.1,43.1,40.2,43.1Zm9.8-15-8.1,1.2c-3.8.6-5.7,2-5.7,4.3,0,2.6,1.8,4,5.4,4,2.7,0,4.8-.7,6.2-2.2A7.385,7.385,0,0,0,50,30V28.1Z" fill="rgba(226,33,33,0)" stroke="#042ff8" stroke-miterlimit="10" stroke-width="1" class="OOYvpmzV_3"></path>
                                              <path id="Path_5" data-name="Path 5" d="M72.8,43.1c-3.6,0-6.3-.8-8-2.5a8.671,8.671,0,0,1-2.6-6.7q0-7.95,11.7-9.6L82.7,23v-.5c0-3.7-2.2-5.6-6.5-5.6-3.8,0-5.9,1.5-6.4,4.5H63A11.476,11.476,0,0,1,66.7,14c2.2-1.9,5.4-2.9,9.7-2.9s7.6,1,9.8,3,3.3,4.8,3.3,8.4v14a14.1,14.1,0,0,0,.9,5.7H83.8a.584.584,0,0,1-.1-.4,11.476,11.476,0,0,0-.2-1.4,14.083,14.083,0,0,1-.1-2.1C81.2,41.5,77.7,43.1,72.8,43.1Zm9.8-15-8.1,1.2c-3.8.6-5.7,2-5.7,4.3,0,2.6,1.8,4,5.4,4,2.7,0,4.8-.7,6.2-2.2A7.385,7.385,0,0,0,82.6,30Z" fill="rgba(226,33,33,0)" stroke="#042ff8" stroke-miterlimit="10" stroke-width="1" class="OOYvpmzV_4"></path>
                                              <path id="Path_6" data-name="Path 6" d="M106.9,43.1c-4.2,0-7.3-1-9.4-2.9A11.048,11.048,0,0,1,94,32.7h6.7a4.623,4.623,0,0,0,1.8,3.4,7.3,7.3,0,0,0,4.7,1.3,8.191,8.191,0,0,0,4.2-.9,2.86,2.86,0,0,0,1.5-2.5,2.755,2.755,0,0,0-1.8-2.6,19.733,19.733,0,0,0-4.3-1.4c-1.7-.4-3.4-.7-5.2-1.1a8.485,8.485,0,0,1-4.4-2.5A7.658,7.658,0,0,1,95.4,21a8.611,8.611,0,0,1,3.3-6.8c2.2-1.9,5.1-2.8,8.8-2.8a13.5,13.5,0,0,1,5.5,1,9.293,9.293,0,0,1,3.7,2.5,14.033,14.033,0,0,1,2,3.2,13.234,13.234,0,0,1,.8,3.3h-6.7a4.5,4.5,0,0,0-1.6-3.1,5.262,5.262,0,0,0-3.9-1.3,7.03,7.03,0,0,0-3.9.9,2.931,2.931,0,0,0-1.3,2.6,2.489,2.489,0,0,0,1.8,2.3,28.68,28.68,0,0,0,4.4,1.4c1.7.4,3.4.8,5.2,1.1a8.183,8.183,0,0,1,4.4,2.7,8.371,8.371,0,0,1,1.8,5.6,8.471,8.471,0,0,1-3.3,6.8C114.1,42.2,111,43.1,106.9,43.1Z" fill="rgba(226,33,33,0)" stroke="#042ff8" stroke-miterlimit="10" stroke-width="1" class="OOYvpmzV_5"></path>
                                              <path id="Path_7" data-name="Path 7" d="M137,27.2a15.622,15.622,0,0,1,4.3-11.3,15.587,15.587,0,0,1,20.9-1.1,13.631,13.631,0,0,1,4.4,8.2h-7.1a6.889,6.889,0,0,0-2.6-4,7.547,7.547,0,0,0-4.7-1.5,7.219,7.219,0,0,0-5.9,2.7,10.767,10.767,0,0,0-2.2,7.1,10.487,10.487,0,0,0,2.2,7,7.354,7.354,0,0,0,5.9,2.7,7.547,7.547,0,0,0,4.7-1.5,7.217,7.217,0,0,0,2.6-4h7.1a14.173,14.173,0,0,1-4.4,8.2c-2.5,2.4-5.8,3.5-10,3.5a14.209,14.209,0,0,1-10.9-4.6A16.192,16.192,0,0,1,137,27.2Z" fill="rgba(226,33,33,0)" stroke="#042ff8" stroke-miterlimit="10" stroke-width="1" class="OOYvpmzV_6"></path>
                                              <path id="Path_8" data-name="Path 8" d="M184.7,43.1a14.849,14.849,0,0,1-11.4-4.6,15.8,15.8,0,0,1-4.4-11.2A16.037,16.037,0,0,1,173.3,16a14.923,14.923,0,0,1,11.4-4.7A15.3,15.3,0,0,1,196.2,16a16.037,16.037,0,0,1,4.4,11.3,15.63,15.63,0,0,1-4.4,11.2A15.438,15.438,0,0,1,184.7,43.1Zm-8.8-15.9a9.7,9.7,0,0,0,2.5,7,8.817,8.817,0,0,0,12.7,0,9.7,9.7,0,0,0,2.5-7,9.942,9.942,0,0,0-2.5-7.1,8.817,8.817,0,0,0-12.7,0A10.4,10.4,0,0,0,175.9,27.2Z" fill="rgba(226,33,33,0)" stroke="#042ff8" stroke-miterlimit="10" stroke-width="1" class="OOYvpmzV_7"></path>
                                            </g>
                                          <style data-made-with="vivus-instant">.OOYvpmzV_0{stroke-dasharray:33 35;stroke-dashoffset:34;animation:OOYvpmzV_draw_0 4600ms linear 0ms infinite,OOYvpmzV_fade 4600ms linear 0ms infinite;}.OOYvpmzV_1{stroke-dasharray:60 62;stroke-dashoffset:61;animation:OOYvpmzV_draw_1 4600ms linear 0ms infinite,OOYvpmzV_fade 4600ms linear 0ms infinite;}.OOYvpmzV_2{stroke-dasharray:165 167;stroke-dashoffset:166;animation:OOYvpmzV_draw_2 4600ms linear 0ms infinite,OOYvpmzV_fade 4600ms linear 0ms infinite;}.OOYvpmzV_3{stroke-dasharray:187 189;stroke-dashoffset:188;animation:OOYvpmzV_draw_3 4600ms linear 0ms infinite,OOYvpmzV_fade 4600ms linear 0ms infinite;}.OOYvpmzV_4{stroke-dasharray:187 189;stroke-dashoffset:188;animation:OOYvpmzV_draw_4 4600ms linear 0ms infinite,OOYvpmzV_fade 4600ms linear 0ms infinite;}.OOYvpmzV_5{stroke-dasharray:165 167;stroke-dashoffset:166;animation:OOYvpmzV_draw_5 4600ms linear 0ms infinite,OOYvpmzV_fade 4600ms linear 0ms infinite;}.OOYvpmzV_6{stroke-dasharray:153 155;stroke-dashoffset:154;animation:OOYvpmzV_draw_6 4600ms linear 0ms infinite,OOYvpmzV_fade 4600ms linear 0ms infinite;}.OOYvpmzV_7{stroke-dasharray:160 162;stroke-dashoffset:161;animation:OOYvpmzV_draw_7 4600ms linear 0ms infinite,OOYvpmzV_fade 4600ms linear 0ms infinite;}@keyframes OOYvpmzV_draw{100%{stroke-dashoffset:0;}}@keyframes OOYvpmzV_fade{0%{stroke-opacity:1;}91.30434782608695%{stroke-opacity:1;}100%{stroke-opacity:0;}}@keyframes OOYvpmzV_draw_0{4.3478260869565215%{stroke-dashoffset: 34}47.82608695652174%{ stroke-dashoffset: 0;}100%{ stroke-dashoffset: 0;}}@keyframes OOYvpmzV_draw_1{7.453416149068323%{stroke-dashoffset: 61}50.93167701863355%{ stroke-dashoffset: 0;}100%{ stroke-dashoffset: 0;}}@keyframes OOYvpmzV_draw_2{10.559006211180124%{stroke-dashoffset: 166}54.037267080745345%{ stroke-dashoffset: 0;}100%{ stroke-dashoffset: 0;}}@keyframes OOYvpmzV_draw_3{13.664596273291925%{stroke-dashoffset: 188}57.14285714285714%{ stroke-dashoffset: 0;}100%{ stroke-dashoffset: 0;}}@keyframes OOYvpmzV_draw_4{16.77018633540373%{stroke-dashoffset: 188}60.24844720496895%{ stroke-dashoffset: 0;}100%{ stroke-dashoffset: 0;}}@keyframes OOYvpmzV_draw_5{19.87577639751553%{stroke-dashoffset: 166}63.35403726708074%{ stroke-dashoffset: 0;}100%{ stroke-dashoffset: 0;}}@keyframes OOYvpmzV_draw_6{22.981366459627328%{stroke-dashoffset: 154}66.45962732919254%{ stroke-dashoffset: 0;}100%{ stroke-dashoffset: 0;}}@keyframes OOYvpmzV_draw_7{26.08695652173913%{stroke-dashoffset: 161}69.56521739130434%{ stroke-dashoffset: 0;}100%{ stroke-dashoffset: 0;}}</style></svg></div>',
                                            'label' => __('Custom svg code', 'carrental'),
                                            'desc'  => '<a href="https://support.xpeedstudio.com/knowledgebase/how-to-create-your-own-svg-preloader-with-animation-for-blo-theme/" target="_blank">'.__('Please check how to create your own svg preloader with animation', 'carrental').'</a>',

                                        )
                                    ),
                                    'simple' => array(
                                        'preloader'=> array(
                                            'type'  => 'image-picker',
                                            'value' => 'oval',
                                            'label' => false,
                                            'choices' => array(
                                                'oval' => array(
                                                    // (required) url for thumbnail
                                                    'small' => array(
                                                        'src' => CARRENTAL_IMG.'/preloader/oval.svg',
                                                        'height' => 45,
                                                        'width' => 45,
                                                    ),
                                                ),
                                                'audio' => array(
                                                    // (required) url for thumbnail
                                                    'small' => array(
                                                        'src' => CARRENTAL_IMG.'/preloader/audio.svg',
                                                        'height' => 45,
                                                        'width' => 45,
                                                    ),
                                                ),
                                                'ball-triangle' => array(
                                                    // (required) url for thumbnail
                                                    'small' => array(
                                                        'src' => CARRENTAL_IMG.'/preloader/ball-triangle.svg',
                                                        'height' => 45,
                                                        'width' => 45,
                                                    ),
                                                ),
                                                'bars' => array(
                                                    // (required) url for thumbnail
                                                    'small' => array(
                                                        'src' => CARRENTAL_IMG.'/preloader/bars.svg',
                                                        'height' => 45,
                                                        'width' => 45,
                                                    ),
                                                ),
                                                'circles' => array(
                                                    // (required) url for thumbnail
                                                    'small' => array(
                                                        'src' => CARRENTAL_IMG.'/preloader/circles.svg',
                                                        'height' => 45,
                                                        'width' => 45,
                                                    ),
                                                ),
                                                'grid' => array(
                                                    // (required) url for thumbnail
                                                    'small' => array(
                                                        'src' => CARRENTAL_IMG.'/preloader/grid.svg',
                                                        'height' => 45,
                                                        'width' => 45,
                                                    ),
                                                ),
                                                'hearts' => array(
                                                    // (required) url for thumbnail
                                                    'small' => array(
                                                        'src' => CARRENTAL_IMG.'/preloader/hearts.svg',
                                                        'height' => 45,
                                                        'width' => 45,
                                                    ),
                                                ),
                                                'puff' => array(
                                                    // (required) url for thumbnail
                                                    'small' => array(
                                                        'src' => CARRENTAL_IMG.'/preloader/puff.svg',
                                                        'height' => 45,
                                                        'width' => 45,
                                                    ),
                                                ),
                                                'rings' => array(
                                                    // (required) url for thumbnail
                                                    'small' => array(
                                                        'src' => CARRENTAL_IMG.'/preloader/rings.svg',
                                                        'height' => 45,
                                                        'width' => 45,
                                                    ),
                                                ),'spinning-circles' => array(
                                                    // (required) url for thumbnail
                                                    'small' => array(
                                                        'src' => CARRENTAL_IMG.'/preloader/spinning-circles.svg',
                                                        'height' => 45,
                                                        'width' => 45,
                                                    ),
                                                ),
                                                'three-dots' => array(
                                                    // (required) url for thumbnail
                                                    'small' => array(
                                                        'src' => CARRENTAL_IMG.'/preloader/three-dots.svg',
                                                        'height' => 45,
                                                        'width' => 45,

                                                    ),
                                                ),
                                                'tail-spin' => array(
                                                    // (required) url for thumbnail
                                                    'small' => array(
                                                        'src' => CARRENTAL_IMG.'/preloader/tail-spin.svg',
                                                        'height' => 45,
                                                        'width' => 45,
                                                    ),
                                                ),
                                            ),
                                            /**
                                             * Allow save not existing choices
                                             * Useful when you use the select to populate it dynamically from js
                                             */
                                            'no-validate' => false,
                                        )
                                    ),



                                ),
                                'show_borders' => false,
                            ),
                        ),



                    ),
                    'show_borders' => false,
                ),



            ],
        ],
    ];