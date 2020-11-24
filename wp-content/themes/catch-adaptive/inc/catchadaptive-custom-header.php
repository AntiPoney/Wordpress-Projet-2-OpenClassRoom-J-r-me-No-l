<?php
/**
 * Implement Custom Header functionality
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


if ( ! function_exists( 'catchadaptive_custom_header' ) ) :
/**
 * Implementation of the Custom Header feature
 * Setup the WordPress core custom header feature and default custom headers packaged with the theme.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
	function catchadaptive_custom_header() {
		/**
		 * Get Theme Options Values
		 */
		$options 	= catchadaptive_get_theme_options();

		if ( $options['color_scheme'] != 'light' ) {
			$default_color = 'bebebe';
		}
		else {
			$default_color = 'dddddd';
		}

		$args = array(
		// Text color and image (empty to use none).
		'default-text-color'     => $default_color,

		// Header image default
		'default-image'			=> trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/headers/image-header-1680x720.jpg',

		// Set height and width, with a maximum value for the width.
		'height'                 => 720,
		'width'                  => 1680,

		// Support flexible height and width.
		'flex-height'            => true,
		'flex-width'             => true,

		// Random image rotation off by default.
		'random-default'         => false,

		// Add Css to wp-head
		'wp-head-callback'       => 'catchadaptive_header_style',
	);

	$args = apply_filters( 'custom-header', $args );

	// Add support for custom header
	add_theme_support( 'custom-header', $args );

	}
endif; // catchadaptive_custom_header
add_action( 'after_setup_theme', 'catchadaptive_custom_header' );

if ( ! function_exists( 'catchadaptive_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see catchadaptive_custom_header_setup().
 */
function catchadaptive_header_style() {
	$header_image  = catchadaptive_featured_overall_image();

	// Has a Custom Header been added?
	if ( ! empty( $header_image ) ) :
		echo '<!-- Header Image CSS -->' . "\n";
		echo '<style>
		#masthead {
			background: url(' . $header_image . ') no-repeat 50% 50%;
			-webkit-background-size: cover;
			-moz-background-size:    cover;
			-o-background-size:      cover;
			background-size:         cover;
		}
		</style>';
	endif;
}
endif; // catchadaptive_header_style


if ( ! function_exists( 'catchadaptive_site_branding' ) ) :
	/**
	 * Get the logo and display
	 *
	 * @uses get_transient, catchadaptive_get_theme_options, get_header_textcolor, get_bloginfo, set_transient, display_header_text
	 * @get logo from options
	 *
	 * @display logo
	 *
	 * @action
	 *
	 * @since Catch Adaptive 0.1
	 */
	function catchadaptive_site_branding() {
		$options 			= catchadaptive_get_theme_options();

		$logo_alt = ( '' != $options['logo_alt_text'] ) ? $options['logo_alt_text'] : get_bloginfo( 'name', 'display' );

		$catchadaptive_site_logo = '';
		//Checking Logo
		if ( function_exists( 'has_custom_logo' ) ) {
			if ( has_custom_logo() ) {
				$catchadaptive_site_logo = '
				<div id="site-logo">'. get_custom_logo() . '</div><!-- #site-logo -->';
			}
		}
		elseif ( '' != $options['logo'] && !$options['logo_disable'] ) {
			//@remove Remove this elseif block when WordPress 4.8 is released
			$catchadaptive_site_logo = '
			<div id="site-logo">
				<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">
					<img src="' . esc_url( $options['logo'] ) . '" alt="' . esc_attr(  $logo_alt ). '">
				</a>
			</div><!-- #site-logo -->';
		}

		if ( display_header_text() ){
			// Show header text if display_header_text is checked
			$catchadaptive_header_text = '<div id="site-header">';
			if ( is_front_page() && is_home() ) :
				$catchadaptive_header_text .= '<h1 class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo( 'name' ) . '</a></h1>';
			else :
				$catchadaptive_header_text .= '<p class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo( 'name' ) . '</a></p>';
			endif;
				$catchadaptive_header_text .= '<p class="site-description">' . get_bloginfo( 'description' ) . '</p>
			</div><!-- #site-header -->';
		}
		else {
			$catchadaptive_header_text = '';
		}

		$catchadaptive_site_branding	= '<div id="site-branding">';
		$catchadaptive_site_branding	.= $catchadaptive_header_text;

		if ( function_exists( 'has_custom_logo' ) ) {
			if ( has_custom_logo() ) {
				if ( ! $options['move_title_tagline'] ) {
					$catchadaptive_site_branding  = '<div id="site-branding" class="logo-left">';
					$catchadaptive_site_branding .= $catchadaptive_site_logo;
					$catchadaptive_site_branding .= $catchadaptive_header_text;
				}
				else {
					$catchadaptive_site_branding  = '<div id="site-branding" class="logo-right">';
					$catchadaptive_site_branding .= $catchadaptive_header_text;
					$catchadaptive_site_branding .= $catchadaptive_site_logo;
				}
			}
		}
		elseif ( '' != $options['logo'] && !$options['logo_disable'] ) {
			if ( ! $options['move_title_tagline'] ) {
				$catchadaptive_site_branding  = '<div id="site-branding">';
				$catchadaptive_site_branding .= $catchadaptive_site_logo;
				$catchadaptive_site_branding .= $catchadaptive_header_text;
			}
			else {
				$catchadaptive_site_branding  = '<div id="site-branding">';
				$catchadaptive_site_branding .= $catchadaptive_header_text;
				$catchadaptive_site_branding .= $catchadaptive_site_logo;
			}
		}

		$catchadaptive_site_branding 	.= '</div><!-- #site-branding-->';

		echo $catchadaptive_site_branding ;
	}
endif; // catchadaptive_site_branding
add_action( 'catchadaptive_header', 'catchadaptive_site_branding', 70 );


if ( ! function_exists( 'catchadaptive_featured_page_post_image' ) ) :
	/**
	 * Template for Featured Header Image from Post and Page
	 *
	 * To override this in a child theme
	 * simply create your own catchadaptive_featured_imaage_pagepost(), and that function will be used instead.
	 *
	 * @since Catch Adaptive 0.1
	 */
	function catchadaptive_featured_page_post_image() {
		global $post, $wp_query;

		// Get Page ID outside Loop
		$page_id = $wp_query->get_queried_object_id();
		$page_for_posts = get_option('page_for_posts');

		if ( is_home() && $page_for_posts == $page_id ) {
			$header_page_id = $page_id;
		}
		else {
			$header_page_id = $post->ID;
		}

		if ( has_post_thumbnail( $header_page_id ) ) {
		   	$options					= catchadaptive_get_theme_options();
			$featured_image_size	= $options['featured_image_size'];

			if ( 'slider' ==  $featured_image_size ) {
				$feat_image = wp_get_attachment_image_src( get_post_thumbnail_id( $header_page_id ), 'catchadaptive-slider' );
			}
			elseif ( 'full' ==  $featured_image_size ) {
				$feat_image = wp_get_attachment_image_src( get_post_thumbnail_id( $header_page_id ), 'full' );
			}
			else {
				$feat_image = wp_get_attachment_image_src( get_post_thumbnail_id( $header_page_id ), 'catchadaptive-large' );
			}

			$catchadaptive_featured_page_post_image =  esc_url( $feat_image[0] );

		}
		else {
			$header_image 			= get_header_image();
			$catchadaptive_featured_page_post_image = esc_url( $header_image );
		}

		return $catchadaptive_featured_page_post_image;

	} // catchadaptive_featured_page_post_image
endif;


if ( ! function_exists( 'catchadaptive_featured_overall_image' ) ) :
	/**
	 * Template for Featured Header Image from theme options
	 *
	 * To override this in a child theme
	 * simply create your own catchadaptive_featured_overall_image(), and that function will be used instead.
	 *
	 * @since Catch Adaptive 0.1
	 */
	function catchadaptive_featured_overall_image() {
		global $post, $wp_query;
		$options				= catchadaptive_get_theme_options();
		$defaults 				= catchadaptive_get_default_theme_options();
		$enableheaderimage 		= $options['enable_featured_header_image'];
		$header_image 			= get_header_image();
		$singlularimage			= catchadaptive_featured_page_post_image();

		// Get Page ID outside Loop
		$page_id = $wp_query->get_queried_object_id();

		$page_for_posts = get_option('page_for_posts');

		// Check Enable/Disable header image in Page/Post Meta box
		if ( is_page() || is_single() ) {
			//Individual Page/Post Image Setting
			$individual_featured_image = get_post_meta( $post->ID, 'catchadaptive-header-image', true );

			if ( 'disable' == $individual_featured_image || ( 'default' == $individual_featured_image && 'disable' == $enableheaderimage ) ) {
				echo '<!-- Page/Post Disable Header Image -->';
				return;
			}
			elseif ( 'enable' == $individual_featured_image && 'disabled' == $enableheaderimage ) {
				$catchadaptive_featured_overall_image = catchadaptive_featured_page_post_image();
			}
		}

		// Check Homepage
		if ( 'homepage' == $enableheaderimage ) {
			if ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) {
				$catchadaptive_featured_overall_image = esc_url( $header_image );
			}
		}
		// Check Excluding Homepage
		if ( 'exclude-home' == $enableheaderimage ) {
			if ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) {
				return false;
			}
			else {
				$catchadaptive_featured_overall_image = esc_url( $header_image );
			}
		}
		elseif ( 'exclude-home-page-post' == $enableheaderimage ) {
			if ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) {
				return false;
			}
			elseif ( is_page() || is_single() ) {
				$catchadaptive_featured_overall_image = catchadaptive_featured_page_post_image();
			}
			else {
				$catchadaptive_featured_overall_image = esc_url( $header_image );
			}
		}
		// Check Entire Site
		elseif ( 'entire-site' == $enableheaderimage ) {
			$catchadaptive_featured_overall_image = esc_url( $header_image );
		}
		// Check Entire Site (Post/Page)
		elseif ( 'entire-site-page-post' == $enableheaderimage ) {
			if ( is_page() || is_single() ) {
				$catchadaptive_featured_overall_image = catchadaptive_featured_page_post_image();
			}
			else {
				$catchadaptive_featured_overall_image = esc_url( $header_image );
			}
		}
		// Check Page/Post
		elseif ( 'pages-posts' == $enableheaderimage ) {
			if ( is_page() || is_single() ) {
				$catchadaptive_featured_overall_image = catchadaptive_featured_page_post_image();
			} else {
				return false;
			}
		}
		else {
			return false;
		}

		return $catchadaptive_featured_overall_image;
	} // catchadaptive_featured_overall_image
endif;
