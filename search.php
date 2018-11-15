<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Lexco_Digital
 */

get_header(); ?>

<?php
$header_color = cs_get_option( 'header_color' );
$header_background_array = $header_color['header_background'];
$meta_data = get_post_meta( get_the_ID(), '_custom_page_options', true );
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
?>

<?php do_action( 'lexco_before_header' ); ?>
    <h1 class="big-text">
        <?php 
            printf( __( 'Search Results for: %s', 'lexco-digital' ), get_search_query() ); 
        ?>
    </h1>
<?php do_action( 'lexco_after_header' ); ?>

<?php 
if ( have_posts() ) : ?>
<div class="uk-section uk-container">
    
    <div class="uk-child-width-expand@s uk-grid-medium" uk-grid>
        
        <div class="uk-width-2-3@s uk-margin-auto">
            <?php while ( have_posts() ) : the_post(); ?>
            
            <div class="uk-card uk-card-default uk-margin-bottom uk-padding">
                <div>
                    <a href="<?php the_permalink(); ?>">
                        <h2> <?php the_title(); ?> </h2>
                    </a>
                    <p> <?php the_excerpt(); ?></p>
                </div><!-- .flex-col-4 -->
            </div>
            
            <?php
            // End the loop.
            endwhile; ?>
            
        </div>
        
        <?php do_action( 'lexco_get_sidebar' ); ?>

    </div><!-- .flex-contain -->


    <div>
        <?php 
        the_posts_pagination( 
            array(
                'format'            => '?paged=%#%',
                'type'              => 'list',
                'prev_text'         => __( '<li><a href="#"><span uk-pagination-previous></span> Previous</a></li>', 'lexco-digital' ),
                'next_text'         => __( '<li><a href="#">Next <span uk-pagination-next></span></a></li>', 'lexco-digital' ),
            )
        );
        ?>
    </div>

        <?php // If no content, include the "No posts found" template.
        else :
        ?>

    <div class="uk-padding uk-container">
        <h1>No search results found!</h1>
    </div><!-- .flex-contain -->

<?php
endif;
?>
    
</div>

<?php get_footer();