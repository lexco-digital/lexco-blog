<?php
/**
 * The template for displaying all blog posts
 *
 * @package WordPress
 * @subpackage Lexco_Digital
 */

get_header(); ?>

<?php
$header_color = cs_get_option( 'header_color' );
$header_background_array = $header_color['header_background'];
$main_background_array = cs_get_option( 'main_page_background' );
$meta_data = get_post_meta( get_option('page_for_posts'), '_custom_page_options', true );
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_option('page_for_posts') ), 'full' );
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

<?php 

do_action( 'lexco_before_header' ); ?>

<h1 class="big-text">
    <?php 
    if ( cs_get_option( 'blog_page_title' ) ) { 
        _e( stripslashes( cs_get_option( 'blog_page_title' ) ), 'lexco-digital' ); 
    } else { 
        _e( get_bloginfo( 'title' ), 'lexco-digital');
    }
    ?>
</h1>

<p>
    <?php
    if ( cs_get_option( 'blog_page_description' ) ) {
        _e( stripslashes( cs_get_option( 'blog_page_description' ) ), 'lexco-digital' ); 
    } else {
        _e( get_bloginfo( 'description' ), 'lexco-digital' );
    }
    ?>
</p>

<?php 
do_action( 'lexco_after_header' ); 
?>
  
<div class="body-background-overlay blog-page">
    <div class="uk-section uk-container">
        <div class="uk-child-width-expand@s uk-grid-medium" uk-grid>
            <?php 
            $i = 0; 
            if (have_posts()) : 
            ?>

            <div class="uk-width-expand@s">
                <div class="uk-child-width-expand@s uk-grid-medium" uk-grid>

                    <?php 
                    while ( have_posts()) : the_post(); 
                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); 

                    if ( cs_get_customize_option( 'home_page_layout') == 'two_column' ) { ?>
                    
                    <div class="uk-width-1-1@s" tabindex="0">
                        <div class="uk-card uk-card-default uk-grid-collapse uk-border-rounded uk-child-width-1-3@s uk-margin" uk-grid>
                            <div class="uk-card-media-left uk-cover-container uk-overflow-hidden">
                                <img src="<?php echo $thumb['0']; ?>" alt="" uk-cover>
                                <canvas width="600" height="400"></canvas>
                            </div>
                            <div class="uk-width-2-3@s">
                                <div class="uk-card-body">
                                    <h3><?php __( the_title(),  'lexco-digital' ); ?></h3>
                                    <div class='uk-flex uk-flex-between'>
                                        <p class="author-text uk-margin-remove">
                                            <?php _e( 'By: ',  'lexco-digital' ); ?>
                                            <a class="uk-text-primary"><?php __( the_author(),  'lexco-digital' ); ?></a>
                                        </p>
                                        <p class="blog-date uk-margin-remove"> 
                                            <?php __( the_date(),  'lexco-digital' ); ?> 
                                        </p>
                                    </div><!-- .flex -->
                                    <p class="card-text"><?php echo get_the_excerpt(); ?></p>
                                    <div class="uk-text-right">
                                        <a href="<?php esc_url ( the_permalink() ); ?>" class="uk-margin-small-top uk-button uk-button-default" uk-icon="chevron-right">
                                            <?php _e( 'Read More',  'lexco-digital' ); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php } else { ?>
                    
                    <div class="uk-width-1-2@s" tabindex="0">
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-media-top uk-background-cover uk-height-small" style="background-image: url('<?php echo $thumb['0']; ?>');">
                            </div>
                            <div class="uk-card-body">
                                <h3><?php __( the_title(),  'lexco-digital' ); ?></h3>
                                <div class='uk-flex uk-flex-between'>
                                    <p class="author-text uk-margin-remove">
                                        <?php _e( 'By: ',  'lexco-digital' ); ?>
                                        <a class="uk-text-primary"><?php __( the_author(),  'lexco-digital' ); ?></a>
                                    </p>
                                    <p class="blog-date uk-margin-remove"> 
                                        <?php __( the_date(),  'lexco-digital' ); ?> 
                                    </p>
                                </div><!-- .flex -->
                                <p class="card-text"><?php echo get_the_excerpt(); ?></p>
                                <div class="uk-text-right">
                                    <a href="<?php esc_url ( the_permalink() ); ?>" class="uk-margin-small-top uk-button uk-button-default" uk-icon="chevron-right">
                                        <?php _e( 'Read More',  'lexco-digital' ); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                                 }
                    endwhile; 
                    ?>
                </div>
            </div>

            <?php endif; ?>

            <?php do_action( 'lexco_get_sidebar' ); ?>

        </div><!-- #about -->
    </div><!-- .uk-section -->
</div><!-- .topcontent -->

<?php

if ( cs_get_option( 'enable_subscribe_div' ) && cs_get_option( 'subcribe_div_shortcode' ) ) {
    get_template_part( 'template-parts/page/subscribe-div' );
}

get_footer();