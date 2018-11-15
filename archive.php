<?php
/**
 * The template for displaying archive pages
 *
 * @package WordPress
 * @subpackage Lexco_Digital
 */

get_header(); ?>

<div>

	<?php 
    if ( have_posts() ) :
        do_action( 'lexco_before_simple_header' );
        the_archive_title( '<h1>', '</h1>' );
        do_action( 'lexco_after_simple_header' );
    endif; 
    ?>

	<div class="uk-section uk-container">
		<div class="uk-child-width-expand@s uk-grid-medium" uk-grid>

		<?php if ( have_posts() ) : ?>
            <div class="uk-width-2-3@s uk-margin-auto">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
                ?>
                <div class="uk-card uk-card-default uk-margin-auto uk-margin-bottom uk-padding">
                    <div>
                        <a href="<?php the_permalink(); ?>">
                            <h3 style="margin-top: 0; margin-bottom: 5px;"> 
                                <?php __( the_title(),  'lexco-digital' ); ?> 
                            </h3>
                        </a>

                        <?php if ( cs_get_option( 'enable_blog_author' ) ) { ?>
                            <p class="uk-text-meta">
                                <?php _e( 'By',  'lexco-digital' ); ?>
                                <?php __( the_author(),  'lexco-digital' ); ?>
                                <?php _e( ' On',  'lexco-digital' ); ?> 
                                <?php __( the_date(),  'lexco-digital' ); ?> 
                            </p>
                        <?php } ?>
                    </div>

                    <p class="blog-date" style="margin-bottom: 5px;"> 

                    </p>

                    <p><?php echo get_the_excerpt(); ?></p>
                    <a uk-icon="chevron-right" class="uk-margin-small-top uk-button uk-button-default" href="<?php esc_url ( the_permalink() ); ?>">
                        <?php _e( 'Read More',  'lexco-digital' ); ?>
                    </a>
                </div>
                
                <?php endwhile; ?>
            
            </div>

            <?php do_action( 'lexco_get_sidebar' ); ?>
            
        </div><!-- #main -->
        
			<?php
	
            the_posts_pagination( 
                array(
                    'format'            => '?paged=%#%',
                    'type'              => 'list',
                    'prev_text'         => __( '<li><a href="#"><span uk-pagination-previous></span> Previous</a></li>', 'lexco-digital' ),
                    'next_text'         => __( '<li><a href="#">Next <span uk-pagination-next></span></a></li>', 'lexco-digital' ),
                )
            );
            
            else :

			get_template_part( 'template-parts/post/content', 'none' );

		endif;
		?>
        
	</div><!-- #primary -->
    
</div><!-- .wrap -->

<?php
get_footer();