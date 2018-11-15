<?php 
// Add core style based on the 'Theme Options' panel in the admin dashboard
function lexco_add_options_styles() {
    
    include get_template_directory() . '/inc/theme-options-variables.php';
    
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
            background: <?php echo cs_get_customize_option( 'primary_color' ); ?>;
        }
        .uk-background-secondary {
            background: <?php echo $primary_dark; ?>;
        }
        
        /* UK Kit text colors */
        .uk-text-primary,
        a.uk-nav-link,
        #sidebar li a,
        .uk-link {
            color: <?php echo cs_get_customize_option( 'primary_color' ); ?> !important;
        }
        
        /* UK Kit button colors */
        .uk-button-primary,
        .uk-button-primary:hover {
            background: <?php echo cs_get_customize_option( 'primary_color' ); ?> !important;
        }
        .uk-button-default {
            border: 1px solid <?php echo cs_get_customize_option( 'primary_color' ); ?>;
            color: <?php echo cs_get_customize_option( 'primary_color' ); ?>;
        }
        
    </style>
     
    <?php
}
add_action( 'wp_head', 'lexco_add_options_styles', 20 );