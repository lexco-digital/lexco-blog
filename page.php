<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package WordPress
 * @subpackage Lexco_Digital
 */

get_header(); ?>

<?php 
if ( have_posts() ) :
    get_template_part( 'template-parts/page/page-header' );

    while ( have_posts() ) : the_post(); ?>

    <div class="uk-section uk-container">
        
        <div class="uk-child-width-expand@s uk-grid" uk-grid>
            <div>
                <div>
                    <?php the_content(); ?>
                </div>
            </div>
            
            <?php do_action( 'lexco_get_sidebar' ); ?>
        </div><!-- .content -->
        
    </div>
        

    <?php 
    endwhile; 

endif;
?>
		
<?php get_footer();