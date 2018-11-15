<?php
/**
 * The template for displaying the alternate footer for this theme
 *
 * This is the template that displays the widgets in the footer area.
 *
 * @package WordPress
 * @subpackage Lexco_Digital
 */
?>

<div class="uk-container uk-section uk-section-xsmall">
    <div> 
        
        <?php
        
        // Check if social accounts are enabled && if either one of the social icons has an active link
        if ( cs_get_option( 'enable_social_accounts' ) && (cs_get_option( 'facebook_account' ) || cs_get_option( 'instagram_account' ) || cs_get_option( 'youtube_account' ) || cs_get_option( 'twitter_account' ) ) ) { ?>
            <div class="uk-flex uk-flex-center uk-margin-bottom"> 
                <?php 
                get_template_part( 'template-parts/footer/alternate-social-footer' ); 
                ?>
            </div>
        <?php } ?>
        
        
        <div class="uk-flex uk-flex-center">
            <?php 
            wp_nav_menu( array(
                'theme_location'    => 'simple-footer',
                'menu_class'        => 'uk-subnav uk-subnav-divider uk-margin-remove-bottom',
                'items_wrap'        => '<ul id="%1$s" class="%2$s" uk-margin>%3$s</ul>'
            ));
            ?>
        </div>
    </div>
</div><!-- .simple-footer -->