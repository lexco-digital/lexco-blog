<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// CUSTOMIZE SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options              = array();

// -----------------------------------------
// Customize Panel Options Fields          -
// -----------------------------------------
$options[]            = array(
  'name'              => 'frontpage_set_up',
  'title'             => 'Frontpage Set-up',
  'description'       => 'Set up the front-page of your site',
  'sections'          => array(

    // begin: section
    array(
      'name'          => 'frontpage_header',
      'title'         => __( 'Header', 'lexco-digital'),
      'settings'      => array(

        // begin: a field
        array(
            'name'        => 'homepage_title',
            'default'     => get_bloginfo( 'title' ),
            'control'   => array(
                'label'     => __( 'Homepage Title', 'lexco-digital'),
                'type'      => 'text',
            ),
        ),

        array(
            'name'        => 'homepage_description',
            'default'     => get_bloginfo( 'description' ),
            'control'   => array(
                'label'     => __( 'Homepage Description', 'lexco-digital'),
                'type'      => 'textarea',
            ),
        ),
          
        array(
            'name'      => 'home_page_layout',
            'default'   => 'two_column',
            'control'   => array(
                'label'     => __( 'Home Page Layout', 'lexco-digital'),
                'type'      => 'radio',
                'choices'   => array(
                    'full_width'    => __( 'Full Width', 'lexco-digital'),
                    'two_column'    => __( 'Two Column', 'lexco-digital'),
                ),
            ),
        ),

        array(
            'name'      => 'homepage_background',
            'default'   => 'rgba(0,0,0,.5)',
            'control'   => array(
                'type'    => 'cs_field',
                'options' => array(
                    'type'  => 'color_picker',
                    'title' => 'Homepage Background',
                ),
            ),
        ),
          
        array(
            'name'      => 'homepage_background_image',
            'default'   => '',
            'control'   => array(
                'type'      => 'image',
                'title'     => 'Homeheader Background Image',
            ),
        ),
          
        array(
            'name'          => 'enable_homepage_background_gradient',
            'control'       => array(
                'type'        => 'cs_field',
                'options'     => array(
                    'type'      => 'switcher',
                    'title'     => 'Enable Background Radient',
                    'label'     => 'Enable this to see a gradient',
                    'help'      => 'Lorem Ipsum Dollar',
                ),
            ),
        ),
          
        array(
            'name'      => 'homepage_background_gradient',
            'default'   => '#555555',
                'control'   => array(
                'type'    => 'cs_field',
                'options' => array(
                    'type'       => 'color_picker',
                    'title'      => 'Homepage Background Gradient',
                    'dependency' => array( 'enable_homepage_background_gradient', '==', 'true' ),
                ),
            ),
        ),

        array(
            'name'      => 'homepage_text_color',
            'default'   => '#555555',
            'control'   => array(
                'type'      => 'radio',
                'choices'   => array(
                    'light'    => __( 'light', 'lexco-digital'),
                    'dark'    => __( 'dark', 'lexco-digital'),
                ),
            ),
        ),
          
        array(
            'name'          => 'enable_call_to_action_button',
            'control'       => array(
                'type'        => 'cs_field',
                'options'     => array(
                    'type'      => 'switcher',
                    'title'     => 'Enable Call To Action Button',
                    'label'     => 'Enable this to add a call to action button in the homepage header',
                    'help'      => 'Lorem Ipsum Dollar',
                ),
            ),
        ),
          
        array(
            'name'      => 'homepage_cta_text',
            'default'   => 'Learn More',
                'control'   => array(
                'type'    => 'cs_field',
                'options' => array(
                    'type'       => 'Text',
                    'title'      => 'Call To Action Button Text',
                    'label'      => 'The text for the call to action button',
                    'dependency' => array( 'enable_call_to_action_button', '==', 'true' ),
                    'help'       => 'Enter the link for the page you would like to send your customer when they click on the button.',
                ),
            ),
        ),
          
        array(
            'name'      => 'homepage_cta_link',
            'default'   => '/love-page',
                'control'   => array(
                'type'    => 'cs_field',
                'options' => array(
                    'type'       => 'Text',
                    'title'      => 'Call To Action Button Link',
                    'label'      => 'The link for your call to action',
                    'dependency' => array( 'enable_call_to_action_button', '==', 'true' ),
                ),
            ),
        ),

    ),
),
    // end: section

      
    // begin: section
    array(
      'name'          => 'about',
      'title'         => 'About',
      'settings'      => array(

          array(
			'name'    => 'about_title',
            'default' => __( 'About', 'lexco-digital'),
            'control'   => array(
                'type'    => 'text',
                'label'   => __( 'About Title', 'lexco-digital'),
                'title'    => __( 'About Title', 'lexco-digital' ),
                'desc'     => __( 'Set Title for the about section', 'lexco-digital' ),
            ),
		),
          
        array(
			'name'    => 'about_description',
            'default' => __( "Our business is to help you grow. Let's work together.", 'lexco-digital'),
            'control'   => array(
                'type'     => 'textarea',
                'label'   => __( 'About Description', 'lexco-digital'),
                'title'    => __( 'About Description', 'lexco-digital' ),
                'desc'     => __( 'Set description for the about section', 'lexco-digital' ),
            ),
		),
          
      ),
    ),
    // end: section

  ),
  // end: sections

);

CSFramework_Customize::instance( $options );
