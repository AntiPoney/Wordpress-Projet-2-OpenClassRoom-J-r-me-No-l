<?php
/**
 * Functions and definitions
 *
 * Sets up the theme using core catchadaptive-core and provides some helper functions using catchadaptive-custon-functions.
 * Others are attached to action and
 * filter hooks in WordPress to change core functionality
 *
 * @package Catch Themes
 * @subpackage Catch Adaptive
 * @since Catch Adaptive 0.1
 */

//define theme version
if ( !defined( 'CATCHADAPTIVE_THEME_VERSION' ) )
	define ( 'CATCHADAPTIVE_THEME_VERSION', '1.4.1' );

/**
 * Implement the core functions
 */
require trailingslashit( get_template_directory() ) . 'inc/catchadaptive-core.php';