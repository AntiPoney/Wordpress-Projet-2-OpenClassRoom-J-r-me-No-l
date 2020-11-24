<?php
/**
 * The template for adding Featured Content Settings in Customizer
 *
 * @package Catch Themes
 * @subpackage Catch Adaptive
 * @since Catch Adaptive 0.1
 */

if ( ! defined( 'CATCHADAPTIVE_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}
	// Featured Content Options
	$wp_customize->add_panel( 'catchadaptive_featured_content_options', array(
	    'capability'     => 'edit_theme_options',
		'description'    => __( 'Options for Featured Content', 'catch-adaptive' ),
	    'priority'       => 400,
	    'title'    		 => __( 'Featured Content', 'catch-adaptive' ),
	) );


	$wp_customize->add_section( 'catchadaptive_featured_content', array(
		'panel'			=> 'catchadaptive_featured_content_options',
		'priority'		=> 1,
		'title'			=> __( 'Featured Content Options', 'catch-adaptive' ),
	) );

	$wp_customize->add_setting( 'catchadaptive_theme_options[featured_content_option]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_option'],
		'sanitize_callback' => 'catchadaptive_sanitize_select',
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[featured_content_option]', array(
		'choices'  	=> catchadaptive_featured_slider_content_options(),
		'label'    	=> __( 'Enable Featured Content on', 'catch-adaptive' ),
		'priority'	=> '1',
		'section'  	=> 'catchadaptive_featured_content',
		'settings' 	=> 'catchadaptive_theme_options[featured_content_option]',
		'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'catchadaptive_theme_options[featured_content_layout]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_layout'],
		'sanitize_callback' => 'catchadaptive_sanitize_select',
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[featured_content_layout]', array(
		'active_callback'	=> 'catchadaptive_is_featured_content_active',
		'choices'  	=> catchadaptive_featured_content_layout_options(),
		'label'    	=> __( 'Select Featured Content Layout', 'catch-adaptive' ),
		'priority'	=> '2',
		'section'  	=> 'catchadaptive_featured_content',
		'settings' 	=> 'catchadaptive_theme_options[featured_content_layout]',
		'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'catchadaptive_theme_options[featured_content_position]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_position'],
		'sanitize_callback' => 'catchadaptive_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[featured_content_position]', array(
		'active_callback'	=> 'catchadaptive_is_featured_content_active',
		'label'		=> __( 'Check to Move above Footer', 'catch-adaptive' ),
		'priority'	=> '3',
		'section'  	=> 'catchadaptive_featured_content',
		'settings'	=> 'catchadaptive_theme_options[featured_content_position]',
		'type'		=> 'checkbox',
	) );

	$wp_customize->add_setting( 'catchadaptive_theme_options[featured_content_slider]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_slider'],
		'sanitize_callback' => 'catchadaptive_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[featured_content_slider]', array(
		'active_callback'	=> 'catchadaptive_is_featured_content_active',
		'label'		=> __( 'Check to Enable Slider', 'catch-adaptive' ),
		'priority'	=> '4',
		'section'  	=> 'catchadaptive_featured_content',
		'settings'	=> 'catchadaptive_theme_options[featured_content_slider]',
		'type'		=> 'checkbox',
	) );

	$wp_customize->add_setting( 'catchadaptive_theme_options[featured_content_type]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_type'],
		'sanitize_callback'	=> 'catchadaptive_sanitize_select',
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[featured_content_type]', array(
		'active_callback'	=> 'catchadaptive_is_featured_content_active',
		'choices'  	=> catchadaptive_featured_content_types(),
		'label'    	=> __( 'Select Content Type', 'catch-adaptive' ),
		'priority'	=> '5',
		'section'  	=> 'catchadaptive_featured_content',
		'settings' 	=> 'catchadaptive_theme_options[featured_content_type]',
		'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'catchadaptive_theme_options[featured_content_headline]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_headline'],
		'sanitize_callback'	=> 'wp_kses_post',
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[featured_content_headline]' , array(
		'active_callback'	=> 'catchadaptive_is_featured_content_active',
		'description'	=> __( 'Leave field empty if you want to remove Headline', 'catch-adaptive' ),
		'label'    		=> __( 'Headline for Featured Content', 'catch-adaptive' ),
		'priority'		=> '6',
		'section'  		=> 'catchadaptive_featured_content',
		'settings' 		=> 'catchadaptive_theme_options[featured_content_headline]',
		'type'	   		=> 'text',
		)
	);

	$wp_customize->add_setting( 'catchadaptive_theme_options[featured_content_subheadline]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_subheadline'],
		'sanitize_callback'	=> 'wp_kses_post',
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[featured_content_subheadline]' , array(
		'active_callback'	=> 'catchadaptive_is_featured_content_active',
		'description'	=> __( 'Leave field empty if you want to remove Sub-headline', 'catch-adaptive' ),
		'label'    		=> __( 'Sub-headline for Featured Content', 'catch-adaptive' ),
		'priority'		=> '7',
		'section'  		=> 'catchadaptive_featured_content',
		'settings' 		=> 'catchadaptive_theme_options[featured_content_subheadline]',
		'type'	   		=> 'text',
		)
	);

	$wp_customize->add_setting( 'catchadaptive_theme_options[featured_content_number]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_number'],
		'sanitize_callback'	=> 'catchadaptive_sanitize_number_range',
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[featured_content_number]' , array(
		'active_callback'	=> 'catchadaptive_is_demo_featured_content_inactive',
		'description'	=> __( 'Save and refresh the page if No. of Featured Content is changed (Max no of Featured Content is 20)', 'catch-adaptive' ),
		'input_attrs' 	=> array(
            'style' => 'width: 45px;',
            'min'   => 0,
            'max'   => 20,
            'step'  => 1,
        	),
		'label'    		=> __( 'No of Featured Content', 'catch-adaptive' ),
		'priority'		=> '8',
		'section'  		=> 'catchadaptive_featured_content',
		'settings' 		=> 'catchadaptive_theme_options[featured_content_number]',
		'type'	   		=> 'number',
		)
	);

	$wp_customize->add_setting( 'catchadaptive_theme_options[featured_content_enable_title]', array(
	        'default'			=> $defaults['featured_content_enable_title'],
			'sanitize_callback'	=> 'catchadaptive_sanitize_checkbox',
		) );

	$wp_customize->add_control(  'catchadaptive_theme_options[featured_content_enable_title]', array(
		'active_callback'	=> 'catchadaptive_is_demo_featured_content_inactive',
		'label'		=> __( 'Check to Enable Title', 'catch-adaptive' ),
        'priority'	=> '9',
		'section'   => 'catchadaptive_featured_content',
        'settings'  => 'catchadaptive_theme_options[featured_content_enable_title]',
		'type'		=> 'checkbox',
    ) );

    $wp_customize->add_setting( 'catchadaptive_theme_options[featured_content_show]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_show'],
		'sanitize_callback'	=> 'catchadaptive_sanitize_select',
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[featured_content_show]', array(
		'active_callback'	=> 'catchadaptive_is_demo_featured_content_inactive',
		'choices'  	=> catchadaptive_featured_content_show(),
		'label'    	=> __( 'Display Content', 'catch-adaptive' ),
		'priority'	=> '9.1',
		'section'  	=> 'catchadaptive_featured_content',
		'settings' 	=> 'catchadaptive_theme_options[featured_content_show]',
		'type'	  	=> 'select',
	) );


	//loop for featured page sliders
	for ( $i=1; $i <= $options['featured_content_number'] ; $i++ ) {
		$wp_customize->add_setting( 'catchadaptive_theme_options[featured_content_page_'. $i .']', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'catchadaptive_sanitize_page',
		) );

		$wp_customize->add_control( 'catchadaptive_theme_options[featured_content_page_'. $i .']', array(
			'active_callback'	=> 'catchadaptive_is_demo_featured_content_inactive',
			'label'    	=> __( 'Featured Page', 'catch-adaptive' ) . ' ' . $i ,
			'priority'	=> '12' . $i,
			'section'  	=> 'catchadaptive_featured_content',
			'settings' 	=> 'catchadaptive_theme_options[featured_content_page_'. $i .']',
			'type'	   	=> 'dropdown-pages',
		) );
	}

	$wp_customize->add_section( 'catchadaptive_featured_content_background_settings', array(
		'active_callback'	=> 'catchadaptive_is_featured_content_active',
		'panel'			=> 'catchadaptive_featured_content_options',
		'priority'		=> 3,
		'title'			=> __( 'Featured Content Background Settings', 'catch-adaptive' ),
	) );

	$wp_customize->add_setting( 'catchadaptive_theme_options[featured_content_background_image]', array(
			'capability'		=> 'edit_theme_options',
			'default'			=> $defaults['featured_content_background_image'],
			'sanitize_callback'	=> 'catchadaptive_sanitize_image',
		) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'catchadaptive_theme_options[featured_content_background_image]', array(
		'label'		=> __( 'Select/Add Background Image', 'catch-adaptive' ),
		'priority'	=> '1',
		'section'   => 'catchadaptive_featured_content_background_settings',
        'settings'  => 'catchadaptive_theme_options[featured_content_background_image]',
	) ) );
// Featured Content Setting End