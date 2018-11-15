<?php 
// Add core style based on the 'Theme Options' panel in the admin dashboard
function lexco_add_options_styles() {
    
    //include get_template_directory() . '/inc/theme-options-variables.php';
    
    /****************************************
    styling
    ****************************************/
    ?>

    <style>
        
        /* UK Kit Background colors */
        .uk-background-muted {
            background: <?php echo $primary_light; ?>;
        }
        .uk-background-default {
            background: <?php echo $secondary_light; ?>;
        }
        .uk-background-primary {
            background: <?php echo $primary_theme_color; ?>;
        }
        .uk-background-secondary {
            background: <?php echo $primary_dark; ?>;
        }
        
        /* UK Kit text colors */
        .uk-text-primary {
            color: <?php echo $primary_theme_color; ?> !important;
        }
        
        /* UK Kit button colors */
        .uk-button-primary:hover {
            background: <?php echo $secondary_theme_color; ?> !important;
        }
        .uk-button-default {
            border: 1px solid <?php echo $primary_theme_color; ?>;
            color: <?php echo $primary_theme_color; ?>;
        }
        
        /**
         * 
         * NAVITATION STYLES AND OPTIONS
         *
         */
        
        .nav-container .current-menu-ancestor > a,
        .nav-container #longmenu li.active a,
        .nav-container #longmenu li.current-menu-ancestor > a,
        .nav-container #longmenu li.active i,
        .nav-container #longmenu li.current-menu-ancestor i {
            color: <?php echo $primary_theme_color; ?>;
        }
        
        .nav-container #longmenu > li.active,
        .nav-container #longmenu > li.current-menu-ancestor {
            border-bottom: 2px solid <?php echo $primary_theme_color; ?>;
        }
        
        .nav-container li.current-menu-ancestor .sub-menu li.active a,
        .nav-container #longmenu li .sub-menu li.active a {
            color: white;
        }
        
        @media only screen and (max-width: 768px) {
            .nav-container li.current-menu-ancestor .sub-menu li.active a,
            .nav-container #longmenu li .sub-menu li.active a {
                color: <?php echo $primary_text_color; ?>;
            }
        }
        
        .nav-container.fixed,
        .nav-container.alternate #longmenu.fixed {
            border-bottom: none;
        }
        
        .nav-container.fixed .sub-menu.open,
        .nav-container.long-nav.fixed #longmenu.open,
        .nav-container.alternate #longmenu.fixed .sub-menu.open {
            opacity: 1;
        }
        
        /**
        *
        * Determines width of content. It is controlled by the class '.flex-contain'
        *
        */
        .flex-contain,
        #main,
        .uk-container {
            max-width: <?php echo $body_width; ?>;
        }
        
        @media only screen and (min-width: 1000px) {
            .flex-contain,
            #main,
            .uk-container {
                margin: auto;
            }
        }
        
        <?php if ( $header_layout['header_height'] == 'normal' ) { ?>
        .lexco-head .flex-contain {
            border-bottom: 1px solid #eee;
            padding: 1rem;
        }
        <?php } else if ( $header_layout['header_height'] == 'expanded' ) { ?>
        .lexco-head .flex-contain {
            border-bottom: 1px solid #eee;
            padding: 4rem 10%;
        }
        <?php } ?>
        
        
        
        <?php if ( $navigation_layout['navigation'] == 'regular' ) { ?>
        
        
        <?php } else if ( $navigation_layout['navigation'] == 'stacked' ) { ?>
        
        
        <?php } else if ( $navigation_layout['navigation'] == 'centered_logo' ) { ?>
            
        
        <?php } ?>
        
        
        <?php if ( cs_get_option( 'navigation_style' ) == 'fixed' ) { ?>
        /* Long Header Laptop Fixed */
        .nav-container.long-nav.fixed {
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 100;
        }
        /* Stacked Header Laptop Fixed */
        .nav-container.alternate #longmenu.fixed {
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 100;
        }
        /* Stacked Header Laptop Fixed (When Menu opens) */
        .nav-container.alternate #longmenu.fixed.open {
            left: 0;
            width: auto;
            z-index: 150;
            right: 60px;
        }
        /* Stacked Header Mobile Fixed */
        .alternate-menubtn.fixed {
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 100;
            box-shadow: <?php echo $box_shadow_light; ?>;
        }
        <?php } ?>
        
        
        /* For Testing purposes Remove Before Releasing */
        html {
            margin-top: 0 !important;
        }
        
        /**
         * FOOTER STYLES AND OPTIONS
         *
         */

        #footer #longmenu li.active a,
        #footer .current-menu-ancestor > a,
        #longmenu li.current-menu-ancestor .sub-menu li.active a {
            border-bottom: none;
        }
        
        <?php if ( $footer_color['footer'] == 'light' ) { ?>
        #footer {
            background: <?php echo $primary_light; ?>;
            border-top: 1px solid #eee;
        }
        #footer .flex-contain.copyright {
            border-top: 1px solid #eee;
        }
        #footer .copyright p,
        .tags a {
            color: <?php echo $small_text_color; ?>;
        }
        <?php } else if ( $footer_color['footer'] == 'dark' ) { ?>
        #footer {
            background: <?php echo $primary_dark; ?>;
            border-top: 1px solid <?php echo $dark_small_text; ?>;
        }
        #footer .flex-contain.copyright {
            border-top: 1px solid <?php echo $dark_small_text; ?>;
        }
        
        #footer .widget-title {
            color: <?php echo $primary_light; ?>;
        }
        #footer .flex-contain.copyright p {
            color: <?php echo $dark_small_text; ?>;
        }
        
        <?php } ?>
        
        .main-gradient {
            background: linear-gradient(45deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -webkit-linear-gradient(45deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -moz-linear-gradient(45deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -ms-linear-gradient(45deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -o-linear-gradient(45deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
        }
        .main-gradient-2 {
            background: linear-gradient(-45deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -webkit-linear-gradient(-45deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -moz-linear-gradient(-45deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -ms-linear-gradient(-45deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -o-linear-gradient(-45deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
        }

        .main-gradient-3 {
            background: linear-gradient(90deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -webkit-linear-gradient(90deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -moz-linear-gradient(90deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -ms-linear-gradient(90deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -o-linear-gradient(90deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
        }

        .main-gradient-4 {
            background: linear-gradient(-90deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -webkit-linear-gradient(-90deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -moz-linear-gradient(-90deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -ms-linear-gradient(-90deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -o-linear-gradient(-90deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
        }
        
        .main-gradient-5 {
            background: linear-gradient(135deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -webkit-linear-gradient(135deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -moz-linear-gradient(135deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -ms-linear-gradient(135deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -o-linear-gradient(135deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
        }
        
        .main-gradient-6 {
            background: linear-gradient(-135deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -webkit-linear-gradient(-135deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -moz-linear-gradient(-135deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -ms-linear-gradient(-135deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -o-linear-gradient(-135deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
        }
        
        .main-gradient-7 {
            background: linear-gradient(180deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -webkit-linear-gradient(180deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -moz-linear-gradient(180deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -ms-linear-gradient(180deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -o-linear-gradient(180deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
        }
        
        .main-gradient-8 {
            background: linear-gradient(-180deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -webkit-linear-gradient(-180deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -moz-linear-gradient(-180deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -ms-linear-gradient(-180deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
            background: -o-linear-gradient(-180deg, <?php echo $primary_theme_color; ?>,  <?php echo  $secondary_theme_color; ?>);
        }
        
        .main-gradient-9 {
            background: linear-gradient(#E9F2F8,  #91C2DC);
            background: -webkit-linear-gradient(#E9F2F8,  #91C2DC);
            background: -moz-linear-gradient(#E9F2F8,  #91C2DC);
            background: -ms-linear-gradient(#E9F2F8,  #91C2DC);
            background: -o-linear-gradient(#E9F2F8,  #91C2DC);
        }

        button,
        a.button,
        a.button.add_to_cart_button,
        hr,
        .call-to-action,
        .nav-container .sub-menu > li.active,

        /* Woo Commerce Buttons */
        button.single_add_to_cart_button.button.alt,
        a.checkout-button.button.alt.wc-forward,
        button#place_order.button.alt,
        .dot.active,
        .uk-button-primary {
            background: <?php echo $primary_theme_color; ?>;
        }
        
        a.button.add_to_cart_button,
        a.button,
        a.button.add_to_cart_button,
        a.button:hover,
        a.button.add_to_cart_button:hover {
            color: white;
        }

        a,
        i,
        .slider-icon,
        #footer .copyright a,
        i.circle-icon {
            color: <?php echo $primary_theme_color; ?>;
        }
        
        /**
         *
         * Typography
         *
         */
        
        #longmenu > li > a,
        p,
        ul,
        ol,
        blockquote,
        input,
        textarea,
        th,
        td,
        div.wpcf7-response-output,
        html,
        .grey-text,
        span.price,
        select,
        .by-author,
        #footer .copyright p,
        .blog-date,
        form > div.flex.justify-center > div:nth-child(1) > span.mc4wp-checkbox.mc4wp-checkbox-contact-form-7 > label > span,
        form > div:nth-child(2) > div > div:nth-child(1) > span.mc4wp-checkbox.mc4wp-checkbox-contact-form-7 > label > span,
        form > div.flex.justify-center > div:nth-child(1) > span.mc4wp-checkbox.mc4wp-checkbox-contact-form-7 > label > span,
        span.price,
        a {
            font-family: <?php echo $body_font_array['family']; ?>;
        }
        
        h1.big-text,
        .lexco-head h1,
        .homeheader h1 {
            font-family: <?php echo $big_font_array['family']; ?>;
        }


        /*--------------------------------------------------------------
        Mobile Styles
        --------------------------------------------------------------*/
        @media only screen and (max-width: 768px) {

            .nav-container.alternate #longmenu.fixed {
                opacity: 1;
            }
            
            .nav-container .current-menu-ancestor > a,
            .nav-container #longmenu li.active a,
            .nav-container #longmenu li.current-menu-ancestor > a,
            .nav-container li.current-menu-ancestor i {
                color: <?php echo $primary_theme_color; ?>;
            }
            
            #longmenu {
                background: white;
                padding: 0 10%;
                position: fixed;
                z-index: 200;
                left: 0;
            }
            #longmenu > li {
                border-bottom: 1px solid #eee;
            }
            .nav-container #longmenu > li.active,
            .nav-container #longmenu > li.current-menu-ancestor {
                border-bottom: 1px solid <?php echo $primary_theme_color; ?>;
            }
            
            <?php if ( cs_get_option( 'mobile_menu_theme' ) == 'light' ) { ?>
            #longmenu > li {
                border-bottom: 1px solid <?php echo $primary_dark; ?>;
            }
            <?php } else if ( cs_get_option( 'mobile_menu_theme' ) == 'dark' ) { ?>
            #longmenu > li {
                border-bottom: 1px solid <?php echo $primary_dark; ?>;
            }
            <?php } ?>
            
            #longmenu li .sub-menu li.active a {
                color: <?php echo $primary_theme_color; ?>;
            }

            #footer li.active a,
            #footer li.current-menu-ancestor > a,
            #footer li.current-menu-ancestor > a .sub-menu li.active a,
            li#tab-title-reviews a,
			.nav-container.woo-nav-container #longmenu li .sub-menu li.active {
                background-color: transparent;
            }

            .nav-container.woo-nav-container #longmenu li .sub-menu li a,
            .nav-container.woo-nav-container #longmenu > li > a {
                color: <?php echo $header_text_color; ?>;
            }
            
            <?php if ( cs_get_option( 'mobile_navitation_style' ) == 'slide_in' ) { ?>
            #longmenu {
                right: 60px;
                top: 0;
                margin: 0;
                min-height: 100vh;
                float: left;
                -moz-transform: translateX(-100%);
                -webkit-transform: translateX(-100%);
                -o-transform: translateX(-100%);
                -ms-transform: translateX(-100%);
                transform: translateX(-100%);
            }

            #longmenu.open {
                -moz-transform: translateX(0);
                -webkit-transform: translateX(0);
                -o-transform: translateX(0);
                -ms-transform: translateX(0);
                transform: translateX(0);
                box-shadow: 2px 0 2px rgba(0, 0, 0, .1);
            }
            <?php } else { ?>
            
            #longmenu,
            .nav-container.alternate #longmenu.fixed {
                min-height: 100vh;
                position: absolute;
                visibility: hidden;
                border-bottom: none;
                background-color: white;
                overflow: hidden;
                z-index: 999;
                opacity: 0;
                left: 0;
                top: 0;
                right: 60px;
                -moz-transform: translateY(25px);
                -webkit-transform: translateY(25px);
                -o-transform: translateY(25px);
                transform: translateY(25px);
                -ms-transform: translateY(25px);
            }
            #longmenu.open,
            .nav-container.alternate #longmenu.fixed.open {
                -moz-transform: translateY(0);
                -webkit-transform: translateY(0);
                -o-transform: translateY(0);
                transform: translateY(0);
                -ms-transform: translateY(0);
                visibility: visible;
                z-index: 999;
                opacity: 1;
                box-shadow: 2px 0 2px rgba(0, 0, 0, .1);
            }
            <?php } ?>
            
        }
        
        <?php if ( cs_get_option( 'enable_alternate_header' ) ) { ?>
            section#main {
                margin-top: 0;
            }

            .woo-header div.flex-contain {
                padding-top: .75em;
            } 
        
        <?php } ?>

        /* Text Colors */

        /* Header Text Colors */
        h1,
        h2,
        h3,
        h4, 
        h5, 
        h6 {
            color: <?php echo $header_text_color; ?>;
        }
        
        h1,
        h2,
        h3,
        h4, 
        h5,
        h6,
        strong,
        label {
            font-family: <?php echo $header_font_array['family']; ?>;
            font-weight: <?php echo $big_font_array['variant']; ?>;
        }
        
        .faq > div > div:nth-child(1).open {
            border-bottom: 1px solid <?php echo $primary_theme_color; ?>;
            color: white;
        }
        
        .by-author,
        .author-text,
        #footer .copyright p,
        .blog-date,
        form > div.flex.justify-center > div:nth-child(1) > span.mc4wp-checkbox.mc4wp-checkbox-contact-form-7 > label > span,
        form > div:nth-child(2) > div > div:nth-child(1) > span.mc4wp-checkbox.mc4wp-checkbox-contact-form-7 > label > span,
        form > div.flex.justify-center > div:nth-child(1) > span.mc4wp-checkbox.mc4wp-checkbox-contact-form-7 > label > span,
        span.price,
        .comment-intro-2 p a,
        .comment-intro-2 a.comment-permalink {
            font-size: 12px;
            color: <?php echo $small_text_color; ?>;
        }
        
        .author-text,
        #footer li a {
            color: <?php echo $small_text_color; ?>;
        }
        
        .copyright a {
            opacity: .8;
        }
        
        .body-background {
            z-index: -2;
            top: 0;
            left: 0;
            height: 100vh;
            width: auto;
            transform: translateZ(-10px) scale(5);
            object-fit: cover;
        }
        .body-background-overlay {
            background: linear-gradient(
                <?php echo $body_background; ?>, 
                <?php echo $body_background_overlay; ?>
            )
        }
        body h1,
        body h2,
        body h3 {
            color: <?php echo $body_header_text; ?>;
        }

        .homeheader {
            background: linear-gradient(
                <?php echo cs_get_customize_option( 'homepage_background' ); ?>,
                <?php 
                if ( cs_get_customize_option( 'enable_homepage_background_gradient' ) ) { 
                    echo cs_get_customize_option( 'homepage_background_gradient' );
                } else {
                    echo cs_get_customize_option( 'homepage_background' );
                }
                ?>
            ),
            url( '<?php echo cs_get_customize_option( 'homepage_background_image') ;?>' );
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            background-size: cover;
        }
        
        .lexco-head h1,
        .lexco-head p {
            color: <?php echo $lexco_header_text; ?>;
        }
        .homeheader h1,
        .homeheader p {
            color: <?php echo cs_get_customize_option( 'homepage_text_color' ); ?>;
        }
        
        .call_to_action_background {
            background: linear-gradient(
                <?php echo $cta_background_color; ?>, 
                <?php echo $cta_color_gradient_color; ?>
            ),
            url('<?php echo $cta_background_array["image"];?>');
            background-repeat: <?php echo $cta_background_array["repeat"];?>;
            background-position: <?php echo $cta_background_array["position"];?>;
            background-attachment: <?php echo $cta_background_array["attachment"];?>;
            background-size: <?php echo $cta_background_array["size"];?>;
        }
        .call_to_action_background h1 {
            color: <?php echo $cta_text_color; ?>;
        }
        
        .home-background {
            background: <?php echo cs_get_customize_option( 'homepage_background' ); ?>;
        }
        
    </style>
     
    <?php
}
add_action( 'wp_head', 'lexco_add_options_styles', 20 );