<?php
/**
 * The template for displaying the footer widgets
 *
 * This is the template that displays the widgets in the footer area.
 *
 * @package WordPress
 * @subpackage Lexco_Digital
 */
?>
    
<div id="footer-sidebar" class="secondary uk-container uk-section uk-section-small">
    <div class="uk-grid uk-grid-medium" uk-grid>
        <?php
        if ( is_active_sidebar('first-footer-widget-area') ) {
            dynamic_sidebar('first-footer-widget-area');
        }

        if ( is_active_sidebar('second-footer-widget-area') ){
            dynamic_sidebar('second-footer-widget-area');
        }

        if ( is_active_sidebar('third-footer-widget-area') ){
            dynamic_sidebar('third-footer-widget-area');
        }

        if ( is_active_sidebar('fourth-footer-widget-area') ){
            dynamic_sidebar('fourth-footer-widget-area');
        }
        ?>
    </div>
</div><!-- #footer-sidebar -->