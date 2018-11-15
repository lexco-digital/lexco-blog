<?php
/**
 * The template for displaying the social sharing bar on the post page
 *
 * @package WordPress
 * @subpackage Lexco_Digital
 */

$lexco_facebook_URL = urlencode(get_permalink());
?>

<div class="uk-width-2-3@s uk-margin-auto uk-section uk-padding-remove-bottom uk-padding-remove-top uk-text-center">
    <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo urlencode(get_permalink()); ?>" class="uk-icon-button" uk-icon="facebook" style="background: #3a4d9e; color: white;">
    </a>
    <a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>+<?php echo get_permalink(); ?>" class="uk-icon-button" uk-icon="twitter" style="background: #00a8f7; color: white;"></a>
    <a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo $url; ?>&amp;media=<?php echo $media;   ?>&amp;description=<?php echo $title; ?>" class="uk-icon-button" uk-icon="pinterest" style="background: #f80000; color: white;"></a>
</div><!-- .two-third-div -->