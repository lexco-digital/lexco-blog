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

<style type="text/css">
    div.lexco-head-container {
        background: linear-gradient(
            <?php echo $header_background_array["color"]; ?>, 
            <?php 
            if ( $header_color['enable_color_gradient'] ) {
                echo $header_color['gradient_color'];
            } else {
                echo $header_background_array["color"];
            }
            ?>
        ),
        url('<?php echo $thumb['0'];?>');
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
        width: 100%;
    }
</style>

    
<?php do_action( 'lexco_before_header' ); ?>
    <h1 class="big-text"> <?php _e( esc_html( get_the_title() ), 'lexco-digital'); ?> </h1>
    <?php if ( !empty( $meta_data['page_description']) ) { ?>
         <p> <?php _e( $meta_data['page_description'], 'lexco-digital'); ?> </p>
    <?php } ?>
<?php do_action( 'lexco_after_header' ); ?>