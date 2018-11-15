<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Lexco_Digital
 */

get_header(); ?>

<?php 
    $main_background_array = cs_get_option( 'front_page_background' );
?>


<div class="uk-container uk-section uk-section-xlarge">
    <div class="uk-card uk-padding uk-card-default uk-width-2-3@s uk-margin-auto">
        <h1 class="big-text text-center" style="margin-bottom: 2rem;"><u> 
            <?php _e( 'OOPS...', 'lexco-digital'); ?> 
        </u></h1>
        <p>
            <?php _e( 'Sorry, the page you requested does not exist. The link was either removed or you accidentally typed in the wrong link! Try re-typing the link or visit our', 'lexco-digital'); ?>
            <a href="/"> <?php _e( 'home', 'lexco-digital'); ?></a> 
            <?php _e( 'page!', 'lexco-digital'); ?>
        </p>
    </div>
</div>

<?php get_footer();