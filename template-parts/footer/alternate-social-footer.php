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

<?php if ( cs_get_option( 'facebook_account' ) ) { ?>
    <a href="<?php echo cs_get_option( 'facebook_account' ) ?>" target='_blank' class="uk-icon-button" uk-icon="facebook">
    </a>
<?php } ?>

<?php if ( cs_get_option( 'instagram_account' ) ) { ?>
    <a href="<?php echo cs_get_option( 'instagram_account' ) ?>" target='_blank' class="uk-icon-button" uk-icon="instagram">
    </a>
<?php } ?>

<?php if ( cs_get_option( 'youtube_account' ) ) { ?>
    <a href="<?php echo cs_get_option( 'youtube_account' ) ?>" target='_blank' class="uk-icon-button" uk-icon="youtube">
    </a>
<?php } ?>

<?php if ( cs_get_option( 'twitter_account' ) ) { ?>
    <a href="<?php echo cs_get_option( 'twitter_account' ) ?>" target='_blank' class="uk-icon-button" uk-icon="twitter">
    </a>
<?php } ?>

<?php if ( cs_get_option( 'yelp' ) ) { ?>
    <a href="<?php echo cs_get_option( 'yelp' ) ?>" target='_blank' class="uk-icon-button" uk-icon="yelp">
    </a>
<?php } ?>