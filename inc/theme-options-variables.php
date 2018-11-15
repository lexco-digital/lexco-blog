<?php

$navigation_layout = cs_get_option( 'navigation_layout' );
$header_layout = cs_get_option( 'header_layout' );
$body_layout = cs_get_option( 'body_layout' );
$footer_layout = cs_get_option( 'footer_layout' );


$navigation_color = cs_get_option( 'navigation_color' );
$header_color = cs_get_option( 'header_color' );
$body_color = cs_get_option( 'body_color' );
$footer_color = cs_get_option( 'footer_color' );
$cta_color = cs_get_option( 'cta_color' );
$front_page_background = cs_get_option( 'front_page_header_background' );


/**
 *
 * Theme Colors
 *
 */
$color_palette = cs_get_option( 'color_palette' );

switch ($color_palette) {
    case "custom":
        $primary_theme_color = cs_get_option( 'primary_theme_color' );
        $secondary_theme_color = cs_get_option( 'secondary_theme_color' );
        $primary_light = cs_get_option( 'primary_light' );
        $secondary_light = cs_get_option( 'secondary_light' );
        $primary_dark = cs_get_option( 'primary_dark' );
        $secondary_dark = cs_get_option( 'secondary_dark' );
        break;
    case "cool_browns":
        $primary_theme_color = '#FE654F';
        $secondary_theme_color = '#D6EFFF';
        $primary_light = '#FEFEFF';
        $secondary_light = '#FED18C';
        $primary_dark = '#011627';
        $secondary_dark = '#383D3B';
        break;
    case "purple_beauty":
        $primary_theme_color = '#654597';
        $secondary_theme_color = '#574AE2';
        $primary_light = '#FFFFF2';
        $secondary_light = '#AB81CD';
        $primary_dark = '#0D1B2A';
        $secondary_dark = '#242038';
        break;
    case "blue_magic":
        $primary_theme_color = '#173753';
        $secondary_theme_color = '#4B8F8C';
        $primary_light = '#F4F7F5';
        $secondary_light = '#6DAEDB';
        $primary_dark = '#08090A';
        $secondary_dark = '#181F1C';
        break;
    case "red_paradise":
        $primary_theme_color = '#EB0D77';
        $secondary_theme_color = '#542344';
        $primary_light = '#F9EFF4';
        $secondary_light = '#F9BDD9';
        $primary_dark = '#131515';
        $secondary_dark = '#272D2D';
        break;
    case "green_feel":
        $primary_theme_color = '#73AB84';
        $secondary_theme_color = '#79C7C5';
        $primary_light = '#F6F8FF';
        $secondary_light = '#99D19C';
        $primary_dark = '#000501';
        $secondary_dark = '#04395E';
        break;
    default:
        $primary_theme_color = cs_get_option( 'primary_theme_color' );
        $secondary_theme_color = cs_get_option( 'secondary_theme_color' );
        $primary_light = cs_get_option( 'primary_light' );
        $secondary_light = cs_get_option( 'secondary_light' );
        $primary_dark = cs_get_option( 'primary_dark' );
        $secondary_dark = cs_get_option( 'secondary_dark' );
}

// Primary Text Color
$primary_text_color = cs_get_option( 'primary_text_color' );
$header_text_color = $secondary_dark; // == secondary_dark
$light_header_text = $secondary_light; // == secondary_light
$small_text_color = $secondary_light; // == secondary_light
$dark_small_text = $secondary_dark; // == secondary_dark

// home page title
$home_page_title = cs_get_option( 'home_page_title' );

// header font
$header_font_array = cs_get_option( 'header_font' );

// body font
$body_font_array = cs_get_option( 'body_font' );

// big font
$big_font_array = cs_get_option( 'big_font' );

// home page background
$header_background_array = $header_color['header_background'];


// SET CALL TO ACTION TEXT COLOR
if ( $cta_color['cta_div_text_color'] == 'light' ) {
    $cta_text_color = $primary_light;
} else if ( $cta_color['cta_div_text_color'] == 'dark' ) {
    $cta_text_color = $primary_dark;
} else {
    $cta_text_color = $cta_color['cta_div_custom_color'];
} 

// SET CALL TO ACTION GRADIENT
if ( $cta_color['enable_cta_color_gradient'] == true ) {
    $cta_color_gradient_color = $cta_color['cta_gradient_color'];
} else {
    $cta_color_gradient_color = $cta_background_color;
}


// SET BODY WITH FOR THE THEME
if ( $body_layout['body_width'] == 'fullwidth' ) { 
    $body_width = '100%';
} else {
    $body_width = $body_layout['custom_body_width'] . 'px';
}

// SET BODY COLORS FOR YOUR THEME
$body_color_array = $body_color['body_background'];
if ( $body_color['body_background_color'] == 'light' ) { 
    $body_background = 'transparent';
} else if ( $body_color['body_background_color'] == 'dark' ) {
    $body_background = $primary_dark ;
} else {
    $body_background = $body_color_array['color'];
}

// SET BODY BACKGROUND OVERLAY FOR YOUR THEME
if ( $body_color['enable_body_background_gradient'] == true ) { 
    $body_background_overlay = $body_color['body_gradient_color'];
} else {
    $body_background_overlay = $body_color_array['color'];
}

// SET BODY HEADER TEXT COLOR FOR YOUR THEME
if ( $body_color['body_header_text_color'] == 'light' ) { 
    $body_header_text = $primary_light;
} else if ( $body_color['body_background_color'] == 'dark' ) {
    $body_header_text = $primary_dark;
}

// SET THE FRONT PAGE HEADER GRADIENT
if ( cs_get_option( 'enable_front_page_gradient' ) == true ) {
    $front_page_gradient = cs_get_option( 'front_page_gradient' );
} else {
    $front_page_gradient = $front_page_background["color"];
}

// SET HEADER GRADIENT COLOR
if ( $header_color['enable_color_gradient'] == true ) {
    $header_gradient_color = $header_color['gradient_color'];
} else {
    $header_gradient_color = $header_background_array["color"];
}

// SET HEADER TEXT COLOR FOR THE THEME
if ( $header_color['header_text-color'] == 'light' ) { 
    $lexco_header_text = $primary_light;
} else {
    $lexco_header_text = $secondary_dark;
}

// SET HOME HEADER TEXT COLOR FOR THE THEME
if ( cs_get_option( 'home_page_text_color' ) == 'light' ) { 
    $lexco_home_header_text = $primary_light;
} else {
    $lexco_home_header_text = $secondary_dark;
}

// SET CALL TO ACTION GRADIENT COLOR
if ( cs_get_option( 'enable_color_gradient' ) ) {
    $color_gradient_color = cs_get_option( 'cta_gradient_color' );
} else {
    $color_gradient_color = $cta_background_array["color"];
}


/**
 *
 * Theme Structure/Layout
 *
 */

// border-radius
$border_radius = '3px';

// box-shadow
$box_shadow = '0 10px 50px rgba(0,0,0,.2);';

// box-shadow-dark
$box_shadow_light = '0 10px 50px rgba(0, 0, 0, .1)';



// WooCommerce Variables
$woocommerce = '#a46497';
$green = '#7fb60e';
$red = '#CA0000';
$orange = '#F3B61F';
$blue = '#2176FF';