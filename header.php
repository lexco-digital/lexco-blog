<?php
/**
 * The header for our theme
 *
 * @package WordPress
 * @subpackage Lexco_Digital
 */

?><!DOCTYPE html>

<html <?php language_attributes(''); ?>>   
<head>
    <?php wp_head(); ?>
</head>   
<body <?php body_class( 'uk-offcanvas-content' ); ?> >
    
    <?php get_template_part( 'template-parts/header/long-nav-menu' ); ?>
    
    <div class="sitewrapper">
        
        <a href="#" class="back-to-top uk-totop uk-icon-button uk-box-shadow-medium" style="z-index: 1000;" uk-icon="chevron-up" uk-scroll></a>
