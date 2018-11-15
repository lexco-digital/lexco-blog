<?php
/**
 * The template for displaying the branding on our site (Logo, Site title ect.)
 *
 * @package WordPress
 * @subpackage Lexco_Digital
 */

?>

<?php 
if ( has_custom_logo() ) {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    echo '<img uk-img class="main-logo" data-src="'. esc_url( $logo[0] ) .'"/>';
    echo '<img uk-img class="main-logo uk-logo-inverse" data-src="'. esc_url( cs_get_option('navigation_color')['white_logo'] ) .'"/>';

} else { ?>
    <?php _e( get_bloginfo( 'name' ), 'lexco-digital'); ?>
<?php } ?>