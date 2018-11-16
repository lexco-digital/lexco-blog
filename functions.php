<?php
/***
 * Lexco Digital functions and definitions
 *
 * @package WordPress
 * @subpackage Lexco_Digital
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

/**
 *
 * Codestar Framework
 * A Lightweight and easy-to-use WordPress Options Framework
 * We use this framework as the backbone for our 'Theme Options' panel. 
 *
 */
require_once get_template_directory() .'/cs-framework/cs-framework.php';

/**
 *
 * This function is used to load custom fonts from Google and other fonts provider
 * and makes them available for use throughout the theme
 *
 */

/**
 *
 * Include the CSS options file
 *
 */
include_once get_template_directory() .'/inc/css-options.php';


// Add Custom Fonts
add_action( 'wp_head', 'lexco_add_custom_fonts' );
function lexco_add_custom_fonts() {
    $font = get_stylesheet_directory_uri().'/assets/fonts/Bebas/d6e08ef3-40db-4ac3-82df-f062f55a72f5.ttf';
?>
<link href="https://fonts.googleapis.com/css?family=Abhaya+Libre" rel="stylesheet">
<style>
    @font-face {
        font-family: Bebas;  
        src: url(<?php echo $font; ?>);
    }
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .uk-navbar-nav>li>a,
    .uk-logo {
        font-family: Bebas, sans-serif !important;
    }
    * {
        font-family: Abhaya Libre, serif;
    }
</style>

<?php
}


// Mobile Menu Options
add_action( 'mobile_menu_option', 'mobile_menu_option' );
function mobile_menu_option() {
    switch ( cs_get_option( 'mobile_navitation_style' ) ) {
    case "slide_in":
        echo 'uk-offcanvas="mode: ; overlay: true"';
        break;
    case "reveal":
        echo 'uk-offcanvas="mode: reveal; overlay: true"';
        break;
    case "push_in":
        echo 'uk-offcanvas="mode: push; overlay: true"';
        break;
    default:
        echo 'uk-offcanvas="mode: ; overlay: true"';
    }
}


function lexco_nav_menu_position() {
    if ( cs_get_option( 'navigation_style' ) == 'fixed' ) {
        echo 'uk-sticky="top: 150; animation: uk-animation-slide-top"';
    }
}

function lexco_navigation_theme() {
    if ( cs_get_option( 'navigation_color' )['navigation_theme'] == 'light' ) {
        echo 'uk-background-muted';
    } else if ( cs_get_option( 'navigation_color' )['navigation_theme'] == 'dark' ) { 
        echo 'uk-light uk-background-secondary';
    } else if ( cs_get_option( 'navigation_color' )['navigation_theme'] == 'transparent' ) { 
        echo 'uk-background-transparent';
    }
}

function lexco_header_height() {
    if ( cs_get_option( 'header_layout' )['header_height'] == 'expanded' ) {
        echo 'uk-section-large';
    }
}

function lexco_header_align() {
    if ( cs_get_option( 'header_layout' )['header_text_align'] == 'center' ) {
        echo 'uk-margin-auto uk-text-center';
    }
}

function lexco_add_light_text() {
    echo "uk-light";
}

function lexco_header_text_color() {
    if ( cs_get_option( 'header_color' )['header_text_color'] == 'light' ) {
        echo 'uk-light ';
    }
}

function lexco_call_to_action_text() {
    if ( cs_get_option( 'cta_color' )['cta_div_text_color'] == 'light' ) {
        echo 'uk-light';
    }
}

function lexco_body_layout() {
    if ( cs_get_option( 'body_layout' )['page_layout'] == 'fullwidth' ) {
        echo 'uk-margin-auto';
    }
}


// Setup Lexco Digital Theme
add_action('after_setup_theme', 'lexco_digital_setup');
function lexco_digital_setup() {
    
    if ( ! isset( $content_width ) ) {
	   $content_width = 600;
    }
    
    /**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
    add_theme_support( 'custom-logo' );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'custom-header' );
    add_theme_support( 'custom-background' );
    
    /*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support(
        'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		)
	);
    
    /*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
    
    
    // Add class to wp_nav_menu_link
    add_filter('wp_nav_menu','add_menuclass');
    function add_menuclass($ulclass) {
        return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
    }

    
    // Add class to wp_nav_menu_link
    add_filter('wp_nav_menu','add_menu_class');
    function add_menu_class($menu) {
        return preg_replace('/ class="sub-menu"/','/ class="uk-nav uk-navbar-dropdown-nav" /',$menu);  
    }
    

    //Adding active class and bootstrap class to navbar (wordpress) menu
    add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
    function special_nav_class ($classes, $item) {
        $classes[] = 'nav-item';
        if (in_array('current-menu-item', $classes) ){
            $classes[] = 'uk-active';
        }
        return $classes;
    } 
    
    //Load Theme Text Domain
    load_theme_textdomain( 'lexco-digital', get_template_directory() . '/languages' );
    
}


// Wrap .sub-menu-item inside a div
class submenu_wrap extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 1, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='uk-navbar-dropdown' uk-dropdown='animation: uk-animation-slide-bottom-small; duration: 250; offset: 0'><ul class='uk-nav uk-dropdown-nav'>\n";
    }
    function end_lvl( &$output, $depth = 1, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
}



// Setup the lexco head section
add_action('wp_head', 'lexco_head_section');
function lexco_head_section() { ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    
    <?php $id = cs_get_customize_option( 'google_analytics' );
    
    if ( !empty( cs_get_customize_option( 'google_analytics' ) ) ) { ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $id ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag( 'config', '<?php echo $id ?>' );
        </script>
    <?php }
                               
}


// Add adsense to blog
add_action( 'lexco_adsense_code', 'lexco_add_adsense_code' );
function lexco_add_adsense_code() { ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    
    <?php $adsense_id = cs_get_option( 'google_adsense' );
    
    if ( cs_get_option ( 'enable_google_adsense' ) ) { 
?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- In-Article Ad -->
        <ins class="adsbygoogle uk-card uk-card-default uk-margin-large uk-width-1-1"
             style="display:inline-block;height:250px"
             data-ad-client="ca-<?php echo $adsense_id; ?>"
             data-ad-slot="5535649248"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    <?php }
                                                      
}


// Enqueue Google Fonts and Font variants
if ( ! function_exists( 'cs_wp_enqueue_scripts' ) ) {
  function cs_wp_enqueue_scripts() {

    $enqueue_fonts  = array();
    $google_fonts   = array();
    $google_fonts[] = cs_get_option( 'header_font' );
    $google_fonts[] = cs_get_option( 'body_font' );
    $google_fonts[] = cs_get_option( 'big_font' );

    if ( ! empty( $google_fonts ) ) {
      foreach ( $google_fonts as $font ) {
        if( isset( $font['font'] ) && $font['font'] == 'google' ) {
          $variant = ( isset( $font['variant'] ) && $font['variant'] !== 'regular' ) ? ':'. $font['variant'] : '';
          $enqueue_fonts[] = $font['family'] . $variant;
        }
      }
    }

    if ( ! empty( $enqueue_fonts ) ) {
      wp_enqueue_style( 'cs-google-fonts', esc_url( add_query_arg( 'family', urlencode( implode( '|', $enqueue_fonts ) ) , '//fonts.googleapis.com/css' ) ), array(), null );
    }

  }
  add_action( 'wp_enqueue_scripts', 'cs_wp_enqueue_scripts' );
}

// Queue the styles for our theme. First, the parent theme, then the child theme.
function lexco_enqueue_styles() {
    $navigation_layout = cs_get_option( 'navigation_layout' );
    
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'lexco-ui', get_template_directory_uri() . '/assets/css/lexco-ui.css' );
    wp_enqueue_style( 'uikit', get_template_directory_uri() . '/assets/css/uikit.min.css' );
    
    
    if ( $navigation_layout['navigation'] == 'stacked' ) {
        wp_enqueue_style( 'stacked-menu', get_template_directory_uri() . '/assets/css/stacked-nav-menu.css' );
    }
    
    if ( is_page( 'stripe-account' ) ) {
        wp_enqueue_style( 'lexco-dashboard', get_template_directory_uri() . '/assets/css/dashboard.css' );
    }
    
}
add_action( 'wp_enqueue_scripts', 'lexco_enqueue_styles', PHP_INT_MAX);


// Queue the Scripts For our theme
add_action( 'wp_enqueue_scripts', 'lexco_enqueue_scripts' ); 
function lexco_enqueue_scripts() {
    wp_enqueue_script('lexco-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', '', true);
    wp_enqueue_script('lexco-core', get_template_directory_uri() . '/assets/js/core.js', '', true);
    wp_enqueue_script('uikit', get_template_directory_uri() . '/assets/js/uikit.min.js', '', true);
    wp_enqueue_script('uikit-icon', get_template_directory_uri() . '/assets/js/uikit-icons.min.js', '', true);
    wp_enqueue_script('handlebars', 'https://cdn.jsdelivr.net/npm/handlebars@4.0.12/lib/index.min.js', '', true);
    
    if ( is_singular() ) wp_enqueue_script( "comment-reply" );  
} 


//WOO COMMERCE FUNCTIONS
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);


add_action( 'woocommerce_before_main_content', 'lexco_digital_wrapper_start', 10);
add_action( 'woocommerce_after_main_content', 'lexco_digital_wrapper_end', 10);


function lexco_digital_wrapper_start() {
    echo '<div class="body-background-overlay">
            <section class="uk-section uk-section-small uk-container">';
}

function lexco_digital_wrapper_end() {
    echo '</section>
        </div>';
}

add_action( 'lexco_before_simple_header', 'lexco_simple_header_start', 10);
add_action( 'lexco_after_simple_header', 'lexco_simple_header_end', 10);
function lexco_simple_header_start() {
?>
    <div style="border-bottom: 1px solid #eee;">
        <div class="uk-container uk-section uk-section-xsmall uk-flex uk-flex-center uk-flex-middle" >
            <?php
}

function lexco_simple_header_end() {
    ?>
        </div>
    </div>
<?php   
}
        
/**
 *
 * This hooked is used to set up the header for all pages of you the website. 
 * It helps set the look of the header, the alignment for the text, the background
 * for the header and the color of the texts. You can change all of these options 
 * In the 'Theme Options' Panel. 
 *
 */
add_action( 'lexco_before_header', 'lexco_header_start', 10);
add_action( 'lexco_after_header', 'lexco_header_end', 10);
function lexco_header_start() {
    
    $header_color = cs_get_option( 'header_color' );
    $header_background_array = $header_color['header_background'];
    $meta_data = get_post_meta( get_the_ID(), '_custom_page_options', true );
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
?>

<div>
    <div class="uk-section uk-section-large uk-background-cover uk-text-center uk-position-relative" style="border-bottom: 1px solid #eee; padding-bottom: 200px; margin-bottom: -150px;" data-src="<?php echo cs_get_customize_option( 'homepage_background_image' ); ?>" uk-parallax="bgy: -200;" uk-img>
        <div class="uk-position-cover" style="background: <?php echo cs_get_customize_option( 'homepage_background' ); ?>"></div>
        <div class="z-index-10 uk-margin-auto uk-width-2-3@s <?php 
                if ( cs_get_customize_option('homepage_text_color') == 'light' ) {
                    lexco_add_light_text();
                } 
                ?>">
            
            <?php

}


function lexco_header_end() {
    
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
            ?>
            
            </div><!-- .flex-col-6 -->
        </div><!-- .flex-row -->
    <?php if ( cs_get_option( 'header_color' ) ) { ?>
    <div class="uk-height-medium uk-container uk-width-2-3@s uk-padding-remove-top uk-padding-remove-bottom uk-section">
        <div uk-parallax="y: -100;" class="uk-height-medium uk-background-cover uk-box-shadow-medium  uk-overflow-hidden" style="background-image: url('<?php echo $thumb['0'];?>');" uk-img>
        </div>
    </div>
    
</div><!-- .flex-contain -->
<?php 
        
    }
}

// Lexco Call To Action
function lexco_call_to_action_start() { 
?>
    <div class="uk-section uk-container">
        <div class="uk-position-relative uk-flex uk-background-cover uk-overflow-hidden uk-width-2-3@s uk-margin-auto uk-box-shadow-medium">
            <div class="uk-overlay uk-position-cover" style="background-color: <?php echo cs_get_customize_option( 'homepage_background' ); ?>"></div>
                <div class="uk-padding uk-width-1-1">
                    <div style="z-index: 2;" class="z-index-10 <?php 
                                if ( cs_get_customize_option('homepage_text_color') == 'light' ) {
                                    lexco_add_light_text();
                                } 
                                ?>">
                                <?php
                    }

                    function lexco_call_to_action_end() {
                                ?>
                </div>
            </div><!-- .uk-grid -->
        </div><!-- .uk-section -->
    </div><!-- .uk-section -->
<?php
}
add_action( 'lexco_before_call_to_action', 'lexco_call_to_action_start', 10);
add_action( 'lexco_after_call_to_action', 'lexco_call_to_action_end', 10);



// Add side bar to post or pages
function lexco_get_sidebar() {
    if ( cs_get_customize_option( 'home_page_layout') == 'two_column' ) { ?>
        <div class="uk-width-1-3@s">
            <div class="uk-card uk-card-default uk-card-body uk-width-auto@s">
                <?php get_sidebar(); ?>
            </div>
        </div>
    <?php }
}
add_action( 'lexco_get_sidebar', 'lexco_get_sidebar', 10);


//Adding post-thumbnails support to theme
remove_filter('the_content', 'wpautop');


//Changing custom excerpt length
function wpdocs_custom_excerpt_length( $length ) {
    return 25;
}
add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


//Remove Query Strings From static resources
function _remove_script_version( $src ){
    $parts = explode( '?ver', $src );
    return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lexco_widgets_init() {
    // First footer widget area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'First Footer Widget Area', 'lexco-digital' ),
        'id' => 'first-footer-widget-area',
        'description' => __( 'The first footer widget area', 'lexco-digital' ),
        'before_widget' => '<div id="%1$s" class="uk-width-1-4@m uk-overflow-auto uk-width-1-2@s %2$s"><div>',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
 
    // Second Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Second Footer Widget Area', 'lexco-digital' ),
        'id' => 'second-footer-widget-area',
        'description' => __( 'The second footer widget area', 'lexco-digital' ),
        'before_widget' => '<div id="%1$s" class="uk-width-1-4@m uk-overflow-auto uk-width-1-2@s %2$s"><div>',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
 
    // Third Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Third Footer Widget Area', 'lexco-digital' ),
        'id' => 'third-footer-widget-area',
        'description' => __( 'The third footer widget area', 'lexco-digital' ),
        'before_widget' => '<div id="%1$s" class="uk-width-1-4@m uk-overflow-auto uk-width-1-2@s %2$s"><div>',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
 
    // Fourth Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Fourth Footer Widget Area', 'lexco-digital' ),
        'id' => 'fourth-footer-widget-area',
        'description' => __( 'The fourth footer widget area', 'lexco-digital' ),
        'before_widget' => '<div id="%1$s" class="uk-width-1-4@m uk-overflow-auto uk-width-1-2@s %2$s"><div>',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    
    // Secondary Sidebar
    register_sidebar( array(
        'name' => __( 'Secondary Sidebar', 'lexco-digital' ),
        'id' => 'secondary-sidebar',
        'description' => __( 'This is the secondary sidebar for your theme.', 'lexco-digital' ),
        'before_widget' => '<div id="%1$s" class="widget-container widget-area %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
         
}
// Register sidebars by running lexco_widgets_init() on the widgets_init hook.
add_action( 'widgets_init', 'lexco_widgets_init' );

// Register and load the widget
function lexco_social_load_widget() {
    register_widget( 'lexco_social_widget' );
}
add_action( 'widgets_init', 'lexco_social_load_widget' );

// Add menu location
function lexco_register_menus() {
  register_nav_menus(
    array(
        'header-center-left'    => __( 'Header Center Left' ),
        'header-center-right'   => __( 'Header Center Right' ),
        'header-below-logo'     => __( 'Header Below Logo' ),
        'main-header-left'      => __( 'Main Header Left' ),
        'simple-footer'         => __( 'Simple Footer' ),
     )
   );
 }
 add_action( 'init', 'lexco_register_menus' );

// Creating the widget 
class lexco_social_widget extends WP_Widget {
 
    public function __construct() {
        
        $widget_options = array( 
            'classname' => 'lexco_social_widget',
            'description' => 'Widget For Social Sharing',
        );
        
        parent::__construct( 'lexco_social_widget', 'Lexco Social Widget', $widget_options );
  
    }
    
    public function widget( $args, $instance ) {
  
        $title = apply_filters( 'widget_title', $instance[ 'title' ] );
        $blog_title = get_bloginfo( 'name' );
        $tagline = get_bloginfo( 'description' );

        echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; ?>

        <div class="social-widget">
            
            <a href="<?php echo $instance[ 'facebook' ] ?>" target='_blank' class="socialicon"><i class="fab fa-facebook-f fa-lg"></i></a>
            <a href="<?php echo $instance[ 'instagram' ] ?>" target='_blank' class="socialicon"><i class="fab fa-instagram fa-lg"></i></a>
            <a href="<?php echo $instance[ 'linkedin' ] ?>" target='_blank' class="socialicon"><i class="fab fa-linkedin-in fa-lg"></i></a>
            
        </div>

        <?php echo $args['after_widget'];

    }
         
    public function form( $instance ) {
  
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'Get Social', 'lexco-digital' );
        }

        if ( isset( $instance[ 'facebook' ] ) ) {
            $facebook = $instance[ 'facebook' ];
        }
        else {
            $facebook = __( 'Facebook URL', 'lexco-digital' );
        }
        
        if ( isset( $instance[ 'instagram' ] ) ) {
            $instagram = $instance[ 'instagram' ];
        }
        else {
            $instagram = __( 'Instagram URL', 'lexco-digital' );
        }
        
        if ( isset( $instance[ 'linkedin' ] ) ) {
            $linkedin = $instance[ 'linkedin' ];
        }
        else {
            $linkedin = __( 'Linkedin URL', 'lexco-digital' );
        }

        ?>
  
        <p>
    
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:',  'lexco-digital' ); ?></label>
            <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
  
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook (URL):' , 'lexco-digital' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
        
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'Instagram (URL):' , 'lexco-digital' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" type="text" value="<?php echo esc_attr( $instagram ); ?>" />
        
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'Linkedin (URL):' , 'lexco-digital' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" type="text" value="<?php echo esc_attr( $linkedin ); ?>" />
        
        </p><?php 
    
    }  
     
    public function update( $new_instance, $old_instance ) {
        
        $instance = $old_instance;
        $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
        $instance[ 'facebook' ] = strip_tags( $new_instance[ 'facebook' ] );
        $instance[ 'instagram' ] = strip_tags( $new_instance[ 'instagram' ] );
        $instance[ 'linkedin' ] = strip_tags( $new_instance[ 'linkedin' ] );
        return $instance;

    }

} // Class lexco_social_widget ends here