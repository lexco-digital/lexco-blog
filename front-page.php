<?php

/**
 * Template for displaying the front-page of the website.
 *
 * @package WordPress
 * @subpackage Lexco_Digital
 */

get_header(); 
?>

<div class="uk-section uk-section-large uk-background-cover uk-text-center uk-position-relative" style="border-bottom: 1px solid #eee; padding-bottom: 200px; margin-bottom: -150px;" data-src="<?php echo cs_get_customize_option( 'homepage_background_image' ); ?>" uk-parallax="bgy: -200;" uk-img>
    <div class="uk-position-cover" style="background: <?php echo cs_get_customize_option( 'homepage_background' ); ?>"></div>
    <div class="z-index-10 uk-container
                <?php 
                if ( cs_get_customize_option('homepage_text_color') == 'light' ) {
                    lexco_add_light_text();
                } 
                ?>">
        <h1 class="uk-heading-primary">
            <?php
               _e( stripslashes( cs_get_customize_option( 'homepage_title' ) ), 'lexco-digital');
            ?>
        </h1>
        <p>
            <?php
               _e( stripslashes( cs_get_customize_option( 'homepage_description' ) ), 'lexco-digital');
            ?>
        </p>
    </div>

</div>


<div class="uk-section uk-container uk-padding-remove-bottom">
    <div class="uk-child-width-expand@s uk-grid-medium uk-text-center" uk-grid>
        <div>
            <div class="uk-margin-auto uk-card uk-card-default uk-width-2-3@s uk-card-body ">
                <h1 class="big-text"><?php echo cs_get_customize_option( 'about_title' ); ?></h1>
                <p><?php echo cs_get_customize_option( 'about_description' ); ?></p>
                <?php if ( cs_get_customize_option( 'enable_call_to_action_button' ) ) { ?>
                    <a href='<?php echo cs_get_customize_option( 'homepage_cta_link' ); ?>' class="uk-button uk-button-primary"><?php echo cs_get_customize_option( 'homepage_cta_text' ); ?></a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


<div class="uk-section uk-container">
    <div class="uk-child-width-expand@s uk-grid-medium" uk-grid>

        <?php 
        $args = array(
            'posts_per_page'    => 4,
            'post_type'     => 'post',  //choose post type here
            'order' => 'DESC',
        );
        // query
        $the_query = new WP_Query( $args );

        if( $the_query->have_posts() ):
        ?>
        
            <div class="uk-width-expand@s">
                <div class="uk-child-width-expand@s uk-grid-medium" uk-grid>
                    
                    <?php 
                    while( $the_query->have_posts() ) : $the_query->the_post();
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
        
        <?php
        else :

        endif;
        
        if ( cs_get_customize_option( 'home_page_layout') == 'two_column' ) {
            ?>
            <div class="uk-width-1-3@s">
                <div class="uk-card uk-card-default uk-card-body">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        <?php } ?> 
    </div>
</div>


<?php 

get_template_part( '/template-parts/page/call-to-action' ); 
get_footer(); 