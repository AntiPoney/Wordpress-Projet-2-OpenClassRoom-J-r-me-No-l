<?php
/**
 * The template for Managing Theme Structure
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


if ( ! function_exists( 'catchadaptive_doctype' ) ) :
	/**
	 * Doctype Declaration
	 *
	 * @since Catch Adaptive 0.1
	 *
	 */
	function catchadaptive_doctype() {
		?>
		<!DOCTYPE html>
		<html <?php language_attributes(); ?>>
		<?php
	}
endif;
add_action( 'catchadaptive_doctype', 'catchadaptive_doctype', 10 );


if ( ! function_exists( 'catchadaptive_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Catch Adaptive 0.1
	 *
	 */
	function catchadaptive_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		}
	}
endif;
add_action( 'catchadaptive_before_wp_head', 'catchadaptive_head', 10 );


if ( ! function_exists( 'catchadaptive_doctype_start' ) ) :
	/**
	 * Start div id #page
	 *
	 * @since Catch Adaptive 0.1
	 *
	 */
	function catchadaptive_page_start() {
		?>
		<div id="page" class="hfeed site">
		<?php
	}
endif;
add_action( 'catchadaptive_header', 'catchadaptive_page_start', 10 );


if ( ! function_exists( 'catchadaptive_page_end' ) ) :
	/**
	 * End div id #page
	 *
	 * @since Catch Adaptive 0.1
	 *
	 */
	function catchadaptive_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'catchadaptive_footer', 'catchadaptive_page_end', 200 );


if ( ! function_exists( 'catchadaptive_fixed_header_start' ) ) :
	/**
	 * Start div id #fixed-header
	 *
	 * @since Catch Adaptive 0.1
	 *
	 */
	function catchadaptive_fixed_header_start() {
		?>
		<div id="fixed-header">
		<?php
	}
endif;
add_action( 'catchadaptive_header', 'catchadaptive_fixed_header_start', 20 );



if ( ! function_exists( 'catchadaptive_header_toggle_sidebar' ) ) :
	/**
	 * Shows Header Toggle Sidebar
	 *
	 * @since Catch Adaptive 0.1
	 *
	 */
	function catchadaptive_header_toggle_sidebar() {

		//Header Toggle Sidebar
		get_sidebar( 'header-toggle' );

	}
endif;
add_action( 'catchadaptive_header', 'catchadaptive_header_toggle_sidebar', 40 );


if ( ! function_exists( 'catchadaptive_fixed_header_end' ) ) :
	/**
	 * End div id #fixed-header
	 *
	 * @since Catch Adaptive 0.1
	 *
	 */
	function catchadaptive_fixed_header_end() {
		?>
		</div><!-- #fixed-header -->
		<?php
	}
endif;
add_action( 'catchadaptive_header', 'catchadaptive_fixed_header_end', 50 );


if ( ! function_exists( 'catchadaptive_header_start' ) ) :
	/**
	 * Start Header id #masthead and class .wrapper
	 *
	 * @since Catch Adaptive 0.1
	 *
	 */
	function catchadaptive_header_start() {
		$header_image  = catchadaptive_featured_overall_image();
		?>
		<header id="masthead" <?php echo ( '' != $header_image ) ? 'class="with-background"':'';
		 ?> role="banner">
    		<div class="wrapper">
		<?php
	}
endif;
add_action( 'catchadaptive_header', 'catchadaptive_header_start', 60 );


if ( ! function_exists( 'catchadaptive_header_sidebar' ) ) :
	/**
	 * Header Sidebar
	 *
	 * @since Adaptive Pro 1.0
	 */
	function catchadaptive_header_sidebar() {

		//Header Sidebar
		get_sidebar( 'header' );

	}
endif;
add_action( 'catchadaptive_header', 'catchadaptive_header_sidebar', 80 );


if ( ! function_exists( 'catchadaptive_header_end' ) ) :
	/**
	 * End Header id #masthead and class .wrapper
	 *
	 * @since Catch Adaptive 0.1
	 *
	 */
	function catchadaptive_header_end() {
		?>
			</div><!-- .wrapper -->
		</header><!-- #masthead -->
		<?php
	}
endif;
add_action( 'catchadaptive_header', 'catchadaptive_header_end', 90 );


if ( ! function_exists( 'catchadaptive_content_start' ) ) :
	/**
	 * Start div id #content and class .wrapper
	 *
	 * @since Catch Adaptive 0.1
	 *
	 */
	function catchadaptive_content_start() {
		?>
		<div id="content" class="site-content">
			<div class="wrapper">
	<?php
	}
endif;
add_action('catchadaptive_content', 'catchadaptive_content_start', 10 );

if ( ! function_exists( 'catchadaptive_content_end' ) ) :
	/**
	 * End div id #content and class .wrapper
	 *
	 * @since Catch Adaptive 0.1
	 */
	function catchadaptive_content_end() {
		?>
			</div><!-- .wrapper -->
	    </div><!-- #content -->
		<?php
	}

endif;
add_action( 'catchadaptive_after_content', 'catchadaptive_content_end', 30 );


if ( ! function_exists( 'catchadaptive_footer_content_start' ) ) :
/**
 * Start footer id #colophon
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_footer_content_start() {
	?>
	<footer id="colophon" class="site-footer" role="contentinfo">
    <?php
}
endif;
add_action('catchadaptive_footer', 'catchadaptive_footer_content_start', 30 );


if ( ! function_exists( 'catchadaptive_footer_sidebar' ) ) :
/**
 * Footer Sidebar
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_footer_sidebar() {
	get_sidebar( 'footer' );
}
endif;
add_action( 'catchadaptive_footer', 'catchadaptive_footer_sidebar', 40 );


if ( ! function_exists( 'catchadaptive_footer_content_end' ) ) :
/**
 * End footer id #colophon
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_footer_content_end() {
	?>
	</footer><!-- #colophon -->
	<?php
}
endif;
add_action( 'catchadaptive_footer', 'catchadaptive_footer_content_end', 110 );
