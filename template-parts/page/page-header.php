<?php
/**
 * The template for displaying the header section for all pages
 *
 * This is the template that displays the header section for all pages by default.
 * Feel free to use a different header section template to display page 
 * title/descriptions. Page headers are located in the 'template-parts' directory
 * of this theme.
 *
 * @package WordPress
 * @subpackage Lexco_Digital
 */

?>

<?php
$header_color = cs_get_option( 'header_color' );
$header_background_array = $header_color['header_background'];
$meta_data = get_post_meta( get_the_ID(), '_custom_page_options', true );
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
?>
    
<?php

// If there is a feature image, we display it with the normal header, else we display the simple header
if ($thumb) {
    do_action( 'lexco_before_header' );
} else {
    do_action( 'lexco_before_simple_header' );
}
?>
    <h1 class="big-text"> <?php _e( esc_html( get_the_title() ), 'lexco-digital'); ?> </h1>
    <?php if ( !empty( $meta_data['page_description']) ) { ?>
         <p> <?php _e( $meta_data['page_description'], 'lexco-digital'); ?> </p>
    <?php } 

// If there is a feature image, we close the normal header, else we close the simple header
if ($thumb) {
    do_action( 'lexco_after_header' );
} else {
    do_action( 'lexco_after_simple_header' );
}