<?php
/**
 * The template for adding additional theme options in Customizer
 *
 * @package Catch Themes
 * @subpackage Catch Adaptive
 * @since Catch Adaptive 0.1
 */

// Additional Color Scheme (added to Color Scheme section in Theme Customizer)
if ( ! defined( 'CATCHADAPTIVE_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

//Theme Options
	$wp_customize->add_panel( 'catchadaptive_theme_options', array(
	    'description'    => __( 'Basic theme Options', 'catch-adaptive' ),
	    'capability'     => 'edit_theme_options',
	    'priority'       => 200,
	    'title'    		 => __( 'Theme Options', 'catch-adaptive' ),
	) );

	// Breadcrumb Option
	$wp_customize->add_section( 'catchadaptive_breadcumb_options', array(
		'description'	=> __( 'Breadcrumbs are a great way of letting your visitors find out where they are on your site with just a glance. You can enable/disable them on homepage and entire site.', 'catch-adaptive' ),
		'panel'			=> 'catchadaptive_theme_options',
		'title'    		=> __( 'Breadcrumb Options', 'catch-adaptive' ),
		'priority' 		=> 201,
	) );

	$wp_customize->add_setting( 'catchadaptive_theme_options[breadcumb_option]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['breadcumb_option'],
		'sanitize_callback' => 'catchadaptive_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[breadcumb_option]', array(
		'label'    => __( 'Check to enable Breadcrumb', 'catch-adaptive' ),
		'section'  => 'catchadaptive_breadcumb_options',
		'settings' => 'catchadaptive_theme_options[breadcumb_option]',
		'type'     => 'checkbox',
	) );

	$wp_customize->add_setting( 'catchadaptive_theme_options[breadcumb_onhomepage]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['breadcumb_onhomepage'],
		'sanitize_callback' => 'catchadaptive_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[breadcumb_onhomepage]', array(
		'label'    => __( 'Check to enable Breadcrumb on Homepage', 'catch-adaptive' ),
		'section'  => 'catchadaptive_breadcumb_options',
		'settings' => 'catchadaptive_theme_options[breadcumb_onhomepage]',
		'type'     => 'checkbox',
	) );

	$wp_customize->add_setting( 'catchadaptive_theme_options[breadcumb_seperator]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['breadcumb_seperator'],
		'sanitize_callback'	=> 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[breadcumb_seperator]', array(
		'input_attrs' => array(
        		'style' => 'width: 40px;'
    		),
    	'label'    	=> __( 'Separator between Breadcrumbs', 'catch-adaptive' ),
		'section' 	=> 'catchadaptive_breadcumb_options',
		'settings' 	=> 'catchadaptive_theme_options[breadcumb_seperator]',
		'type'     	=> 'text'
		)
	);
   	// Breadcrumb Option End

	/**
	 * Do not show Custom CSS option from WordPress 4.7 onwards
	 * @remove if block when WP 5.0 is released
	 */
	if ( !function_exists( 'wp_update_custom_css_post' ) ) {
	   	// Custom CSS Option
		$wp_customize->add_section( 'catchadaptive_custom_css', array(
			'description'	=> __( 'Custom/Inline CSS', 'catch-adaptive'),
			'panel'  		=> 'catchadaptive_theme_options',
			'priority' 		=> 203,
			'title'    		=> __( 'Custom CSS Options', 'catch-adaptive' ),
		) );

		$wp_customize->add_setting( 'catchadaptive_theme_options[custom_css]', array(
			'capability'		=> 'edit_theme_options',
			'default'			=> $defaults['custom_css'],
			'sanitize_callback' => 'catchadaptive_sanitize_custom_css',
		) );

		$wp_customize->add_control( 'catchadaptive_theme_options[custom_css]', array(
			'label'		=> __( 'Enter Custom CSS', 'catch-adaptive' ),
	        'priority'	=> 1,
			'section'   => 'catchadaptive_custom_css',
	        'settings'  => 'catchadaptive_theme_options[custom_css]',
			'type'		=> 'textarea',
		) );
	   	// Custom CSS End
	}

   	// Excerpt Options
	$wp_customize->add_section( 'catchadaptive_excerpt_options', array(
		'panel'  	=> 'catchadaptive_theme_options',
		'priority' 	=> 204,
		'title'    	=> __( 'Excerpt Options', 'catch-adaptive' ),
	) );

	$wp_customize->add_setting( 'catchadaptive_theme_options[excerpt_length]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['excerpt_length'],
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[excerpt_length]', array(
		'description' => __('Excerpt length. Default is 40 words', 'catch-adaptive'),
		'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5,
            'style' => 'width: 60px;'
            ),
        'label'    => __( 'Excerpt Length (words)', 'catch-adaptive' ),
		'section'  => 'catchadaptive_excerpt_options',
		'settings' => 'catchadaptive_theme_options[excerpt_length]',
		'type'	   => 'number',
		)
	);

	$wp_customize->add_setting( 'catchadaptive_theme_options[excerpt_more_text]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['excerpt_more_text'],
		'sanitize_callback'	=> 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[excerpt_more_text]', array(
		'label'    => __( 'Read More Text', 'catch-adaptive' ),
		'section'  => 'catchadaptive_excerpt_options',
		'settings' => 'catchadaptive_theme_options[excerpt_more_text]',
		'type'	   => 'text',
	) );
	// Excerpt Options End

	//Homepage / Frontpage Options
	$wp_customize->add_section( 'catchadaptive_homepage_options', array(
		'description'	=> __( 'Only posts that belong to the categories selected here will be displayed on the front page', 'catch-adaptive' ),
		'panel'			=> 'catchadaptive_theme_options',
		'priority' 		=> 209,
		'title'   	 	=> __( 'Homepage / Frontpage Options', 'catch-adaptive' ),
	) );

	$wp_customize->add_setting( 'catchadaptive_theme_options[front_page_category]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['front_page_category'],
		'sanitize_callback'	=> 'catchadaptive_sanitize_category_list',
	) );

	$wp_customize->add_control( new Catchadaptive_Customize_Dropdown_Categories_Control( $wp_customize, 'catchadaptive_theme_options[front_page_category]', array(
        'label'   	=> __( 'Select Categories', 'catch-adaptive' ),
        'name'	 	=> 'catchadaptive_theme_options[front_page_category]',
		'priority'	=> '6',
        'section'  	=> 'catchadaptive_homepage_options',
        'settings' 	=> 'catchadaptive_theme_options[front_page_category]',
        'type'     	=> 'dropdown-categories',
    ) ) );
	//Homepage / Frontpage Settings End

	// Layout Options
	$wp_customize->add_section( 'catchadaptive_layout', array(
		'capability'=> 'edit_theme_options',
		'panel'		=> 'catchadaptive_theme_options',
		'priority'	=> 211,
		'title'		=> __( 'Layout Options', 'catch-adaptive' ),
	) );

	$wp_customize->add_setting( 'catchadaptive_theme_options[theme_layout]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['theme_layout'],
		'sanitize_callback' => 'catchadaptive_sanitize_select',
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[theme_layout]', array(
		'choices'	=> catchadaptive_layouts(),
		'label'		=> __( 'Default Layout', 'catch-adaptive' ),
		'section'	=> 'catchadaptive_layout',
		'settings'   => 'catchadaptive_theme_options[theme_layout]',
		'type'		=> 'select',
	) );

	$wp_customize->add_setting( 'catchadaptive_theme_options[content_layout]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['content_layout'],
		'sanitize_callback' => 'catchadaptive_sanitize_select',
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[content_layout]', array(
		'choices'   => catchadaptive_get_archive_content_layout(),
		'label'		=> __( 'Archive Content Layout', 'catch-adaptive' ),
		'section'   => 'catchadaptive_layout',
		'settings'  => 'catchadaptive_theme_options[content_layout]',
		'type'      => 'select',
	) );

	$wp_customize->add_setting( 'catchadaptive_theme_options[single_post_image_layout]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['single_post_image_layout'],
		'sanitize_callback' => 'catchadaptive_sanitize_select',
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[single_post_image_layout]', array(
			'label'		=> __( 'Single Page/Post Image Layout ', 'catch-adaptive' ),
			'section'   => 'catchadaptive_layout',
	        'settings'  => 'catchadaptive_theme_options[single_post_image_layout]',
	        'type'	  	=> 'select',
			'choices'  	=> catchadaptive_single_post_image_layout_options(),
	) );
   	// Layout Options End

	// Pagination Options
	$pagination_type	= $options['pagination_type'];

	$catchadaptive_navigation_description = sprintf( __( 'Numeric Option requires <a target="_blank" href="%1$s">WP-PageNavi Plugin</a>.<br/>Infinite Scroll Options requires <a target="_blank" href="%2$s">JetPack Plugin</a> with Infinite Scroll module Enabled.', 'catch-adaptive' ), esc_url( 'https://wordpress.org/plugins/wp-pagenavi' ), esc_url( 'https://wordpress.org/plugins/jetpack/' ) );

	/**
	 * Check if navigation type is Jetpack Infinite Scroll and if it is enabled
	 */
	if ( ( 'infinite-scroll-click' == $pagination_type || 'infinite-scroll-scroll' == $pagination_type ) ) {
		if ( ! (class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) ) {
			$catchadaptive_navigation_description = sprintf( __( 'Infinite Scroll Options requires <a target="_blank" href="%s">JetPack Plugin</a> with Infinite Scroll module Enabled.', 'catch-adaptive' ), esc_url( 'https://wordpress.org/plugins/jetpack/' ) );
		}
		else {
			$catchadaptive_navigation_description = '';
		}
	}
	/**
	* Check if navigation type is numeric and if Wp-PageNavi Plugin is enabled
	*/
	elseif ( 'numeric' == $pagination_type ) {
		if ( !function_exists( 'wp_pagenavi' ) ) {
			$catchadaptive_navigation_description = sprintf( __( 'Numeric Option requires <a target="_blank" href="%s">WP-PageNavi Plugin</a>.', 'catch-adaptive' ), esc_url( 'https://wordpress.org/plugins/wp-pagenavi' ) );
		}
		else {
			$catchadaptive_navigation_description = '';
		}
    }

	$wp_customize->add_section( 'catchadaptive_pagination_options', array(
		'description'	=> $catchadaptive_navigation_description,
		'panel'  		=> 'catchadaptive_theme_options',
		'priority'		=> 212,
		'title'    		=> __( 'Pagination Options', 'catch-adaptive' ),
	) );

	$wp_customize->add_setting( 'catchadaptive_theme_options[pagination_type]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['pagination_type'],
		'sanitize_callback' => 'catchadaptive_sanitize_select',
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[pagination_type]', array(
		'choices'  => catchadaptive_get_pagination_types(),
		'label'    => __( 'Pagination type', 'catch-adaptive' ),
		'section'  => 'catchadaptive_pagination_options',
		'settings' => 'catchadaptive_theme_options[pagination_type]',
		'type'	   => 'select',
	) );
	// Pagination Options End

	//Promotion Headline Options
    $wp_customize->add_section( 'catchadaptive_promotion_headline_options', array(
		'description'	=> __( 'To disable the fields, simply leave them empty.', 'catch-adaptive' ),
		'panel'			=> 'catchadaptive_theme_options',
		'priority' 		=> 213,
		'title'   	 	=> __( 'Promotion Headline Options', 'catch-adaptive' ),
	) );

	$wp_customize->add_setting( 'catchadaptive_theme_options[promotion_headline_option]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['promotion_headline_option'],
		'sanitize_callback' => 'catchadaptive_sanitize_select',
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[promotion_headline_option]', array(
		'choices'  	=> catchadaptive_featured_slider_content_options(),
		'label'    	=> __( 'Enable Promotion Headline on', 'catch-adaptive' ),
		'priority'	=> '0.5',
		'section'  	=> 'catchadaptive_promotion_headline_options',
		'settings' 	=> 'catchadaptive_theme_options[promotion_headline_option]',
		'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'catchadaptive_theme_options[promotion_headline]', array(
		'capability'		=> 'edit_theme_options',
		'default' 			=> $defaults['promotion_headline'],
		'sanitize_callback'	=> 'wp_kses_post'
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[promotion_headline]', array(
		'description'	=> __( 'Appropriate Words: 10', 'catch-adaptive' ),
		'label'    	=> __( 'Promotion Headline Text', 'catch-adaptive' ),
		'priority'	=> '1',
		'section' 	=> 'catchadaptive_promotion_headline_options',
		'settings'	=> 'catchadaptive_theme_options[promotion_headline]',
		'type'		=> 'textarea',
	) );

	$wp_customize->add_setting( 'catchadaptive_theme_options[promotion_subheadline]', array(
		'capability'		=> 'edit_theme_options',
		'default' 			=> $defaults['promotion_subheadline'],
		'sanitize_callback'	=> 'wp_kses_post'
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[promotion_subheadline]', array(
		'description'	=> __( 'Appropriate Words: 15', 'catch-adaptive' ),
		'label'    		=> __( 'Promotion Subheadline Text', 'catch-adaptive' ),
		'priority'		=> '2',
		'section' 		=> 'catchadaptive_promotion_headline_options',
		'settings'		=> 'catchadaptive_theme_options[promotion_subheadline]',
		'type'			=> 'textarea',
	) );

	$wp_customize->add_setting( 'catchadaptive_theme_options[promotion_headline_button]', array(
		'capability'		=> 'edit_theme_options',
		'default' 			=> $defaults['promotion_headline_button'],
		'sanitize_callback'	=> 'sanitize_text_field'
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[promotion_headline_button]', array(
		'description'	=> __( 'Appropriate Words: 3', 'catch-adaptive' ),
		'label'    	=> __( 'Promotion Headline Button Text ', 'catch-adaptive' ),
		'priority'	=> '3',
		'section' 	=> 'catchadaptive_promotion_headline_options',
		'settings'	=> 'catchadaptive_theme_options[promotion_headline_button]',
		'type'		=> 'text',
	) );

	$wp_customize->add_setting( 'catchadaptive_theme_options[promotion_headline_url]', array(
		'capability'		=> 'edit_theme_options',
		'default' 			=> $defaults['promotion_headline_url'],
		'sanitize_callback'	=> 'esc_url_raw'
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[promotion_headline_url]', array(
		'label'    	=> __( 'Promotion Headline Link', 'catch-adaptive' ),
		'priority'	=> '4',
		'section' 	=> 'catchadaptive_promotion_headline_options',
		'settings'	=> 'catchadaptive_theme_options[promotion_headline_url]',
		'type'		=> 'text',
	) );

	$wp_customize->add_setting( 'catchadaptive_theme_options[promotion_headline_target]', array(
		'capability'		=> 'edit_theme_options',
		'default' 			=> $defaults['promotion_headline_target'],
		'sanitize_callback' => 'catchadaptive_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[promotion_headline_target]', array(
		'label'    	=> __( 'Check to Open Link in New Window/Tab', 'catch-adaptive' ),
		'priority'	=> '5',
		'section'  	=> 'catchadaptive_promotion_headline_options',
		'settings' 	=> 'catchadaptive_theme_options[promotion_headline_target]',
		'type'     	=> 'checkbox',
	) );
	// Promotion Headline Options End

	// Scrollup
	$wp_customize->add_section( 'catchadaptive_scrollup', array(
		'panel'    => 'catchadaptive_theme_options',
		'priority' => 215,
		'title'    => __( 'Scrollup Options', 'catch-adaptive' ),
	) );

	$wp_customize->add_setting( 'catchadaptive_theme_options[disable_scrollup]', array(
		'capability'		=> 'edit_theme_options',
        'default'			=> $defaults['disable_scrollup'],
		'sanitize_callback' => 'catchadaptive_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[disable_scrollup]', array(
		'label'		=> __( 'Check to disable Scroll Up', 'catch-adaptive' ),
		'section'   => 'catchadaptive_scrollup',
        'settings'  => 'catchadaptive_theme_options[disable_scrollup]',
		'type'		=> 'checkbox',
	) );
	// Scrollup End

	// Search Options
	$wp_customize->add_section( 'catchadaptive_search_options', array(
		'description'=> __( 'Change default placeholder text in Search.', 'catch-adaptive'),
		'panel'  => 'catchadaptive_theme_options',
		'priority' => 216,
		'title'    => __( 'Search Options', 'catch-adaptive' ),
	) );

	$wp_customize->add_setting( 'catchadaptive_theme_options[search_text]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['search_text'],
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'catchadaptive_theme_options[search_text]', array(
		'label'		=> __( 'Default Display Text in Search', 'catch-adaptive' ),
		'section'   => 'catchadaptive_search_options',
        'settings'  => 'catchadaptive_theme_options[search_text]',
		'type'		=> 'text',
	) );
	// Search Options End
//Theme Option End