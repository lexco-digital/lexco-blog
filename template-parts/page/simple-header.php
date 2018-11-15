<?php
/**
 *  The template for displaying the header for woocommerce pages
 *
 * @package WordPress
 * @subpackage Lexco_Digital
 */

get_header(); ?>

<?php do_action( 'lexco_before_simple_header' ); ?>

    <h1 class="header-title big-text uk-margin-remove"> <?php _e( get_the_title(''), 'lexco-digital' ); ?> </h1>

    <?php if ( is_page( 'my-account' ) ) { ?>
        <span class="uk-hidden@m uk-icon-button" uk-icon="icon: plus;" uk-toggle="target: #lexco-woo-navitation; mode: click"></span>
    <?php } ?>

<?php do_action( 'lexco_after_simple_header' ); ?>