<?php 
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package WordPress
 * @subpackage Lexco_Digital
 */

?>

<div id="footer" role="contentinfo">
    <?php
    $footer_layout = cs_get_option( 'footer_layout' );
    
    if ( $footer_layout['footer'] == 'simple' ) {
        get_template_part( 'template-parts/footer/simple-footer' );
    } else {
        get_template_part( 'template-parts/footer/footer-widgets' );  
    }

    get_template_part( 'template-parts/footer/copyright' ); 
    ?>
</div><!-- #footer -->

</div><!-- .sitewrapper -->
</body>
</html>

<?php wp_footer();