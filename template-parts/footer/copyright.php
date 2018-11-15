<?php
/**
 * The template for displaying the copyright section of the footer
 *
 * This is the template that displays the widgets in the footer area.
 *
 * @package WordPress
 * @subpackage Lexco_Digital
 */
?>

<div class="uk-container uk-section uk-section-xsmall" style="border-top: 1px solid #eee">
    <p class="uk-text-muted uk-text-meta uk-margin-remove uk-text-small"> 
        &copy; <?php echo date('Y'); ?> | <?php _e( bloginfo('name'), 'lexco-digital'); ?> 
    </p>
    <p class="uk-text-muted uk-text-meta uk-margin-remove uk-text-small"> 
        Theme beautifully designed by <a class="uk-link" href="https://lexcodigital.com">lexco</a>.
    </p>
</div><!-- .copyright -->