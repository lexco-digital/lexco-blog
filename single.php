<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Lexco_Digital
 */

get_header(); ?>

<div class="body-background-overlay">

    <?php
    /* Start the Loop */
    while ( have_posts() ) : the_post(); 

    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
    $header_color = cs_get_option( 'header_color' );
    $header_background_array = $header_color['header_background'];

    ?>

    <article class="uk-article">
        
        <?php do_action( 'lexco_before_header' ); ?>
        <h1 class="uk-article-title"> <?php _e( esc_html( get_the_title() ), 'lexco-digital'); ?> </h1>
        <p class="uk-article-meta">
            <?php _e( 'Written by: ',  'lexco-digital' ); ?>
            <?php __( the_author() . ' On ',  'lexco-digital' ); ?> 
            <?php __( the_date(),  'lexco-digital' ); ?>
        </p>
        <?php do_action( 'lexco_after_header' ); ?>
        
        <?php do_action( 'lexco_adsense_code' ); ?>
        
        <div class="uk-section-small">
            <?php get_template_part( 'template-parts/page/social-share' ); ?>
        </div>
        
        <div class="uk-container uk-section">
            <div class="uk-child-width-expand@s uk-grid-medium" uk-grid>
                <div class="uk-width-2-3@s <?php lexco_body_layout() ?>">
                    <div class="uk-card uk-card-default uk-padding">
                        <?php the_content(); ?>
                    </div>
                </div>

                <?php do_action( 'lexco_get_sidebar' ); ?>

            </div><!-- .uk-grid -->
        </div>
        
        <div class="uk-section uk-section-small uk-text-center uk-padding-remove-top">
            
            <?php 
                /* If the social sharing tab is actibe, display it */
                if ( cs_get_option( 'enable_social_bar' ) == true ) {
                    ?>
                    <h3>Share</h3>
                    <?php 
                    get_template_part( 'template-parts/page/social-share' );
                }

            /* If tags exist, we display the tags */
            if ( get_the_tags() ) { 
            ?>
            <div class="uk-width-2-3@s uk-margin-auto uk-padding" style="padding-left: 0; padding-right: 0;">
                <?php 
                the_tags( '<h3>' . __( "Tagged with:", "lexco-digital" ) . '</h3>'); 
                ?>
            </div><!-- .two-third-div -->
            <?php } ?>


            <?php
            $tags = wp_get_post_tags($post->ID);
            if ($tags) { 

            $first_tag = $tags[0]->term_id;
            $args=array(
                'tag__in'           => array($first_tag),
                'post__not_in'      => array($post->ID),
                'posts_per_page'    =>3,
                'caller_get_posts'  =>1
            );
            ?>
        </div><!-- .uk-section -->
        
    </article><!-- .uk-section -->

    <?php
            
    $my_query = new WP_Query($args);
                
    if( $my_query->have_posts() ) {
    ?>

    <div class="uk-section uk-container uk-padding-remove-top">
        <h2 class="uk-heading-line uk-text-center">
            <span><?php _e( 'Related Articles',  'lexco-digital' ); ?></span>
        </h2>
        
        <div class="uk-child-width-expand@s uk-grid-medium uk-grid" uk-grid uk-margin>
            
            <?php

            while (	$my_query->have_posts()) : $my_query->the_post();

                if ( has_post_thumbnail() ) {
                ?>
            
            <div class="uk-width-1-3@s">
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top uk-height-medium uk-background-cover uk-overflow-hidden" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>');">
                    </div>
                    <div class="card-body uk-padding">
                        <p class="card-text">
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </p>
                        <a href="<?php esc_url ( the_permalink() ); ?>" class="uk-button uk-button-link uk-icon-link" uk-icon="chevron-right">
                            <?php _e( 'Read More',  'lexco-digital' ); ?>
                        </a>
                    </div>
                </div>
            </div>

                <?php } else { ?>

            <div class="uk-width-1-3@s">
                <div class="uk-card uk-card-default">
                    <div class="card-body uk-padding">
                        <p class="card-text">
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </p>
                        <a href="<?php esc_url ( the_permalink() ); ?>" class="uk-button uk-button-link uk-icon-link" uk-icon="chevron-right">
                            <?php _e( 'Read More',  'lexco-digital' ); ?>
                        </a>
                    </div>
                </div>
            </div>

            <?php }

            endwhile;
            }
            wp_reset_query();
            }
            ?>
            
        </div>
    </div>

    <?php 
    if ( cs_get_option( 'enable_subscribe_div' ) ) {
        get_template_part( 'template-parts/page/subscribe-div' );
    }

        endwhile; // end of the loop. 
        ?>

    <div class="blog-comments comment-list uk-container uk-section">
        <?php
        if ( comments_open() || get_comments_number() ) :
            comments_template( '', true );
        endif;
        ?>
    </div><!-- .comment-list -->
</div>

<?php get_footer();