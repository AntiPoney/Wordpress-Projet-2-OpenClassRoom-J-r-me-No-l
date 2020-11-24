<?php
/**
 * The template for Social Links in Customizer
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

	// Social Icons
	$wp_customize->add_panel( 'catchadaptive_social_links', array(
	    'capability'     => 'edit_theme_options',
	    'description'	=> __( 'Note: Enter the url for correponding social networking website', 'catch-adaptive' ),
	    'priority'       => 600,
		'title'    		 => __( 'Social Links', 'catch-adaptive' ),
	) );

	$wp_customize->add_section( 'catchadaptive_social_links', array(
		'panel'			=> 'catchadaptive_social_links',
		'priority' 		=> 1,
		'title'   	 	=> __( 'Social Links', 'catch-adaptive' ),
	) );

	$catchadaptive_social_icons 	=	catchadaptive_get_social_icons_list();

	foreach ( $catchadaptive_social_icons as $key => $value ){
		if ( 'skype_link' == $key ){
			$wp_customize->add_setting( 'catchadaptive_theme_options['. $key .']', array(
					'capability'		=> 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',
				) );

			$wp_customize->add_control( 'catchadaptive_theme_options['. $key .']', array(
				'description'	=> __( 'Skype link can be of formats:<br>callto://+{number}<br> skype:{username}?{action}. More Information in readme file', 'catch-adaptive' ),
				'label'    		=> $value['label'],
				'section'  		=> 'catchadaptive_social_links',
				'settings' 		=> 'catchadaptive_theme_options['. $key .']',
				'type'	   		=> 'url',
			) );
		}
		else {
			if ( 'email_link' == $key ){
				$wp_customize->add_setting( 'catchadaptive_theme_options['. $key .']', array(
						'capability'		=> 'edit_theme_options',
						'sanitize_callback' => 'sanitize_email',
					) );
			}
			elseif ( 'handset_link' == $key || 'phone_link' == $key ){
				$wp_customize->add_setting( 'catchadaptive_theme_options['. $key .']', array(
						'capability'		=> 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field',
					) );
			}
			else {
				$wp_customize->add_setting( 'catchadaptive_theme_options['. $key .']', array(
						'capability'		=> 'edit_theme_options',
						'sanitize_callback' => 'esc_url_raw',
					) );
			}

			$wp_customize->add_control( 'catchadaptive_theme_options['. $key .']', array(
				'label'    => $value['label'],
				'section'  => 'catchadaptive_social_links',
				'settings' => 'catchadaptive_theme_options['. $key .']',
				'type'	   => 'url',
			) );
		}
	}
	// Social Icons End