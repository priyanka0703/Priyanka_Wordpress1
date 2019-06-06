<?php


// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION


//BEGIN ADD Jquery AND JqueryUI FILES
function register()
{
// wp_deregister_script('jquery');
wp_register_script('myjquery', ('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'), false, '3.2.1');
wp_enqueue_script('myjquery');
wp_deregister_script('jquery-ui');
wp_register_script('myjquery-ui', ('http://ajax.aspnetcdn.com/ajax/jquery.ui/1.11.4/jquery-ui.js'), false, '1.11.4');
wp_enqueue_script('myjquery-ui');

}
add_action( 'wp_enqueue_scripts', 'register' );

//END ACTION

//BEGIN ADD Enquire.js FILE
function add_enquire(){
	wp_register_script('enquire', ('https://raw.githubusercontent.com/WickyNilliams/enquire.js/master/dist/enquire.min.js'), false, '3.2.1');
    wp_enqueue_script('enquire');
}
add_action('wp_enqueue_scripts', 'add_enquire');

//END ACTION

//BEGIN ADD GOOGLE FONTS CSS
function rella_add_google_fonts() {
	 
	wp_enqueue_style( 'rella-google-fonts', 'https://fonts.googleapis.com/css?family=Lato|Open+Sans', array(), null );
	
}
add_action( 'wp_enqueue_scripts', 'rella_add_google_fonts' );
//END ACTION



// BEGIN ADD CONTROL IN SITE EDENTITY
add_action('customize_register', 'theme_new_customizer_settings');

function theme_new_customizer_settings($wp_customize) {

	$transport = ( $wp_customize->selective_refresh ? 'postMessage' : 'refresh' );
	// add a setting for the site logo
	$wp_customize->add_setting('site_logomark',

	array(
            'default'    => '', //Default setting/value to save
            'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'transport'   => $transport
         ) 
	);

	// Add a control to upload the logo
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_logomark',
	array(
	'label' => 'Logomark',
	'section' => 'title_tagline',
	'settings' => 'site_logomark',
	'description' => esc_html__( 'Accepted formats: png, jpg, svg' ),
	'type' => 'url'

	) ) );
	
}	
// END CUSTOMIZER SITE IDENTITY




// BEGIN ADD SECTION IN CUSTOMIZE

add_action( 'customize_register', 'mytheme_customize_register' );

function mytheme_customize_register( $wp_customize ) {
    
    $transport = ( $wp_customize->selective_refresh ? 'postMessage' : 'refresh' );
	//adding section Action block
	$wp_customize->add_section('action_block_settings_section', array(
	  'title'          => 'Action Blocks'
	));

	//adding setting and control for Title of Action Block
	$wp_customize->add_setting('ab_title_[#]', array(
	 'default'        => '',
	  'type'       => 'theme_mod', //option
	  'transport'   => 'refresh'
	));
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize, 'ab_title_[#]',
	array(
	 'label'   => 'Title of Action Block',
	 'section' => 'action_block_settings_section',
	 'setting' => 'ab_title_[#]',
	 'type'    => 'text'
	)));

    //adding setting and control for Primary Title 
    $wp_customize->add_setting('ab_title_primary', array(
	 'default'        => '',
	  'type'       => 'theme_mod', //option
	  'transport'   => 'refresh'
	));
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize, 'ab_title_primary',
	array(
	 'label'   => 'Primary Title',
	 'section' => 'action_block_settings_section',
	 'setting' => 'ab_title_primary',
	 'type'    => 'text'
	)));

	//adding setting and control for Secondary Title 
    $wp_customize->add_setting('ab_title_secondary', array(
	 'default'        => '',
	  'type'       => 'theme_mod', //option
	  'transport'   => 'refresh'
	));
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize, 'ab_title_secondary',
	array(
	 'label'   => 'Secondary Title',
	 'section' => 'action_block_settings_section',
	 'setting' => 'ab_title_secondary',
	 'type'    => 'text'
	)));

	//adding setting and control for Body 
    $wp_customize->add_setting('ab_body', array(
	 'default'        => '',
	  'type'       => 'theme_mod', //option
	  'transport'   => 'refresh'
	));
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize, 'ab_body',
	array(
	 'label'   => 'Body',
	 'section' => 'action_block_settings_section',
	 'setting' => 'ab_body',
	 'type'    => 'textarea'
	)));


	//adding setting and control for Link Type
    $wp_customize->add_setting('ab_link_type', array(
	 'default'     => 'Button',
	  'type'       => 'theme_mod', //option
	  'transport'  => 'refresh'
	));
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize, 'ab_link_type',
	array(
	 'label'   => 'Link Type',
	 'section' => 'action_block_settings_section',
	 'setting' => 'ab_link_type',
	 'type'    => 'select',
	 'choices'    => array(
            'text'       => __('Text'),
            'button'     => __('Button'),
        )
	)));

	//adding setting and control for Link Title
    $wp_customize->add_setting('ab_link_title', array(
	  'type'       => 'theme_mod', //option
	  'transport'  => 'refresh'
	));
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize, 'ab_link_title',
	array(
	 'label'   => 'Link Title',
	 'section' => 'action_block_settings_section',
	 'setting' => 'ab_link_title',
	 'type'    => 'text'
	 
	)));

	//adding setting and control for Link To
    $wp_customize->add_setting('ab_link_url', array(
	  'type'       => 'theme_mod', //option
	  'transport'  => 'refresh'
	));
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize, 'ab_link_url',
	array(
	 'label'   => 'Link To',
	 'section' => 'action_block_settings_section',
	 'setting' => 'ab_link_url',
	 'type'    => 'dropdown-pages',

	)));


	//adding setting and control for Custom Url
    $wp_customize->add_setting('ab_link_url_custom', array(
	  'type'       => 'theme_mod', //option
	  'transport'  => 'refresh'
	));
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize, 'ab_link_url_custom',
	array(
	 'label'   => 'Custom Url',
	 'section' => 'action_block_settings_section',
	 'setting' => 'ab_link_url_custom',
	 'type'    => 'text',

	)));

    
    //adding setting and control for Link Color
    $wp_customize->add_setting('ab_link_color', array(
      'default'    => '#DE1763',
      'type'       => 'theme_mod', //option
	  'transport'  => 'refresh'
	));
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'ab_link_color',
	array(
	 'label'   => 'Link Color',
	 'section' => 'action_block_settings_section',
	 'setting' => 'ab_link_color',
	 'type'    => 'color',
	 
	)));

    //adding setting and control for Background Type
    $wp_customize->add_setting('ab_bg_type', array(
      'default'    => 'Color',
      'type'       => 'theme_mod', //option
	  'transport'  => 'refresh'
	));
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize, 'ab_bg_type',
	array(
	 'label'   => 'Background Type',
	 'section' => 'action_block_settings_section',
	 'setting' => 'ab_bg_type',
	 'type'    => 'select',
	 'choices'    => array(
            'color'       => __('Color'),
            'image'     => __('Image'),
        )
	 
	)));


    //adding setting and control for Background Color
    $wp_customize->add_setting('ab_bg_color', array(
      'default'    => '#71C9DA',
      'type'       => 'theme_mod', //option
	  'transport'  => 'refresh'
	));
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'ab_bg_color',
	array(
	 'label'   => 'Background Color',
	 'section' => 'action_block_settings_section',
	 'setting' => 'ab_bg_color',
	 'type'    => 'color',
	 
	)));


	//adding setting and control for Background Image
    $wp_customize->add_setting('ab_bg_image', array(
      'type'       => 'theme_mod', //option
	  'transport'  => 'refresh'
	));
	$wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'ab_bg_image',
	array(
	 'label'   => 'Background Image',
	 'section' => 'action_block_settings_section',
	 'setting' => 'ab_bg_image',
	 'description' => esc_html__( 'Add Url' ),
	 'type'    => 'url',
	 
	)));


    //adding setting and control for Show Patterns
    $wp_customize->add_setting('ab_patterns', array(
      'default'    => 'true',
	  'type'       => 'theme_mod', //option
	  'transport'  => 'refresh'
	));
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize, 'ab_patterns',
	array(
	 'label'   => 'Show Patterns',
	 'section' => 'action_block_settings_section',
	 'setting' => 'ab_patterns',
	 'type'    => 'checkbox',
	 
	)));


    //adding setting and control for Show Logomark
    $wp_customize->add_setting('ab_logomark', array(
      'default'    => '',
	  'type'       => 'theme_mod', //option
	  'transport'  => 'refresh'
	));
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize, 'ab_logomark',
	array(
	 'label'   => 'Show Logomark',
	 'section' => 'action_block_settings_section',
	 'setting' => 'ab_logomark',
	 'type'    => 'checkbox',
	 
	)));


    //adding setting and control for Content align
    $wp_customize->add_setting('ab_align', array(
	  'default'    => 'Center',
	  'type'       => 'theme_mod', //option
	  'transport'  => 'refresh'
	));
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize, 'ab_align',
	array(
	 'label'   => 'Content Align',
	 'section' => 'action_block_settings_section',
	 'setting' => 'ab_align',
	 'type'    => 'select',
	 'choices'    => array(
            'right'       => __('Right'),
            'center'     => __('Center'),
        )
	 	 	 
	)));



    //adding setting and control for Set Date
    $wp_customize->add_setting('ab_date', array(
	  
	  'type'       => 'theme_mod', //option
	  'transport'  => 'refresh'
	));
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize, 'ab_date',
	array(
	 'label'   => 'Set Date',
	 'section' => 'action_block_settings_section',
	 'setting' => 'ab_date',
	 'type'    => 'checkbox',
	 	 	 
	)));


    //adding setting and control for Start Date
    $wp_customize->add_setting('ab_date_start', array(
	  
	  'type'       => 'theme_mod', //option
	  'transport'  => 'refresh'
	));
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize, 'ab_date_start',
	array(
	 'label'   => 'Start Date',
	 'section' => 'action_block_settings_section',
	 'setting' => 'ab_date_start',
	 'type'    => 'date',
	 	 	 
	)));


    //adding setting and control for End Date
    $wp_customize->add_setting('ab_date_end', array(
	  
	  'type'       => 'theme_mod', //option
	  'transport'  => 'refresh'
	));
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize, 'ab_date_end',
	array(
	 'label'   => 'End Date',
	 'section' => 'action_block_settings_section',
	 'setting' => 'ab_date_end',
	 'type'    => 'date',
	 	 	 
	)));


    //adding setting and control for Order
    $wp_customize->add_setting('ab_order', array(
	  
	  'type'       => 'theme_mod', //option
	  'transport'  => 'refresh'
	));
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize, 'ab_order',
	array(
	 'label'   => 'Order',
	 'section' => 'action_block_settings_section',
	 'setting' => 'ab_order',
	 'type'    => 'number',
	 'input_attrs' => array(
	    'min' => 0,
	    'max' => 10
	  ),
	 	 
	)));


	//adding setting and control for Default Block
    $wp_customize->add_setting('ab_default', array(
	  'default'    => 0,
	  'type'       => 'theme_mod', //option
	  'transport'  => 'refresh'
	));
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize, 'ab_default',
	array(
	 'label'   => 'Default Block',
	 'section' => 'action_block_settings_section',
	 'setting' => 'ab_default',
	 'type'    => 'checkbox',
	 	 
	)));

}
