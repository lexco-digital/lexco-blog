<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package WordPress
 * @subpackage Lexco_Digital
 */

get_header(); ?>

<?php 
if ( have_posts() ) :
    get_template_part( 'template-parts/page-header' );

    while ( have_posts() ) : the_post(); ?>

        <div class="flex-contain content">
            <?php the_content(); ?>
        </div><!-- .content -->

    <?php 
    endwhile; 

endif; 
?>
		
<?php get_footer(); ?>