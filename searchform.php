<?php
/**
 * Template for displaying search forms
 *
 * @package WordPress
 * @subpackage Lexco_Digital
 */

?>

<form action="<?php echo home_url( '/' ); ?>" method="GET">
    <div class="uk-inline">
        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: search"></span>
        <input type="search" name="s" id="search" class="uk-input" placeholder="Search" value="<?php the_search_query(); ?>">
    </div>
</form>