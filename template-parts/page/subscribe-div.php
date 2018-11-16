<?php
/**
 * The subscribe template for our theme
 *
 * This template is used to display the form used to subrcibe to your blog. 
 * The template relies on the plugin 'Contact Form 7'. Be sure to install the
 * plugin and create a form named 'Subscribe From' to have the form displayed. 
 *
 * @package WordPress
 * @subpackage Lexco_Digital
 */

$subscribe_div = cs_get_option( 'subscribe_tab' );
?>

<?php do_action( 'lexco_before_call_to_action' ); ?>

    <h1 class="text-center big-text"> 
        <?php 
        _e( stripslashes( cs_get_customize_option( 'subscribe_box_title' ) ), 'lexco-digital'); 
        ?> 
    </h1>

    <div class="social-form">
        <p class="text-center"> 
            <?php 
            _e( stripslashes( cs_get_customize_option( 'subscribe_box_description' ) ), 'lexco-digital');
            ?> 
        </p>

        <?php echo do_shortcode( stripslashes( cs_get_customize_option( 'subscribe_box_form' ) ) ); ?>
    </div><!-- .social-form -->

<?php do_action( 'lexco_after_call_to_action' ); ?>