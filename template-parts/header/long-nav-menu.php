 <?php
/**
 *  The template for displaying a long navigation menu
 *
 * @package WordPress
 * @subpackage Lexco_Digital
 */
?>

<div class="long-nav" <?php lexco_nav_menu_position(); ?> style="z-index: 1000; background: white !important; border-bottom: 1px solid #eee;">
    <div class="uk-section" style="padding-top: 0; padding-bottom: 0;">
        <nav class="uk-container" uk-navbar>
            <div class="uk-navbar-left">
                <a class="uk-navbar-item uk-logo" href="/">
                    <?php get_template_part( '/template-parts/header/site-branding' ); ?>
                </a>
            </div>

            <div class="uk-navbar-right uk-hidden@m">
                <a class="uk-navbar-toggle" uk-navbar-toggle-icon href="" uk-toggle="target: #mobile-menu"></a>
            </div>

            <?php 
            wp_nav_menu( array(
                'theme_location'    => 'main-header-left',
                'menu_id'           => 'navbarNav',
                'menu_class'        => 'uk-navbar-nav uk-iconnav',
                'container_class'   => 'uk-navbar-right uk-visible@m',
                'container_id'      => 'navbarNav',
                'walker'            => new submenu_wrap(),
            )); 
            ?>

            <div id="mobile-menu" <?php do_action( 'mobile_menu_option' ); ?>>
                <div class="uk-offcanvas-bar">
                    <button class="uk-offcanvas-close" type="button" uk-close></button>
                    <?php 
                    wp_nav_menu( array(
                        'theme_location'    => 'main-header-left',
                        'menu_class'        => 'uk-nav',
                    )); 
                    ?>
                </div>
            </div>
        </nav>
    </div>
</div>