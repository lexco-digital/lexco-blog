<?php
/**
 * The template for displaying tags on your Wordpress website
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
    <h1 class="big-text">Tag: <?php single_tag_title(); ?></h1>
<?php do_action( 'lexco_after_header' ); ?>

<?php
$query = new WP_Query( array(
    'no_found_rows'  => true,
) );

if ( $query->have_posts() ) : ?>

<div class="uk-section uk-container">
    <div class="uk-child-width-expand@s uk-grid-medium" uk-grid>

        <div class="uk-width-2-3@s uk-margin-auto">

            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

            <div class="uk-card uk-card-default uk-margin-bottom uk-padding">
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

            <?php endwhile; wp_reset_postdata(); ?>

        </div>

        <?php do_action( 'lexco_get_sidebar' ); ?>

    </div><!-- .content -->
</div>
    
<?php endif; ?>

<?php get_footer();