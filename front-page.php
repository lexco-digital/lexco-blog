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
        <?php if ( cs_get_customize_option( 'enable_call_to_action_button' ) ) { ?>
            <a href='<?php echo cs_get_customize_option( 'homepage_cta_link' ); ?>' class="uk-button-large uk-button uk-button-primary uk-preserve-color"><?php echo cs_get_customize_option( 'homepage_cta_text' ); ?></a>
        <?php } ?>
    </div>

</div>


<div class="uk-section uk-container uk-padding-remove-bottom">
    <div class="uk-child-width-expand@s uk-grid-medium uk-text-center" uk-grid>
        <div>
            <div class="uk-margin-auto uk-card uk-card-default uk-width-2-3@s uk-card-body ">
                <h1 class="big-text"><?php echo cs_get_customize_option( 'about_title' ); ?></h1>
                <p><?php echo cs_get_customize_option( 'about_description' ); ?></p>
                <a href="#" class="uk-button uk-button-primary">Learn More</a>
            </div>
        </div>
    </div>
</div>


<div class="uk-section uk-container">
    <div class="uk-child-width-expand@s uk-grid-medium" uk-grid>

        <div>
            <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-3@s uk-margin" uk-grid>
                <div class="uk-card-media-left uk-cover-container uk-overflow-hidden">
                    <img src="http://lexco.wpengine.com/wp-content/uploads/2018/10/Lexco-Theme-Screenshot.jpg" alt="" uk-cover>
                    <canvas width="600" height="400"></canvas>
                </div>
                <div class="uk-width-2-3@s">
                    <div class="uk-card-body">
                        <h3 class="uk-card-title">Media Left</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                    </div>
                </div>
            </div>
        </div>


        <? 
        if ( cs_get_customize_option( 'home_page_layout') == 'two_column' ) {
            ?>
            <div class="uk-width-1-3@s">
                <div class="uk-card uk-card-default uk-card-body">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        <?php 
        }
        ?>
        

    </div>
</div>


<?php 

get_template_part( '/template-parts/page/call-to-action' ); 
get_footer(); 