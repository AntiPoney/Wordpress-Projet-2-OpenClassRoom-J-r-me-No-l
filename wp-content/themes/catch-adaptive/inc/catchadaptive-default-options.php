<?php
/**
 * Implement Default Theme/Customizer Options
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


/**
 * Returns the default options for catchadaptive.
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_get_default_theme_options() {

	$theme_data = wp_get_theme();

	$default_theme_options = array(
		//Site Title an Tagline
		'logo'												=> trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/headers/logo.png',
		'logo_alt_text' 									=> '',
		'logo_disable'										=> 1,
		'move_title_tagline'								=> 0,

		//Layout
		'theme_layout' 										=> 'right-sidebar',
		'content_layout'									=> 'columns-layout',
		'single_post_image_layout'							=> 'disabled',

		//Header Image
		'enable_featured_header_image'						=> 'entire-site-page-post',
		'featured_image_size'								=> 'slider',

		//Breadcrumb Options
		'breadcumb_option'									=> 0,
		'breadcumb_onhomepage'								=> 0,
		'breadcumb_seperator'								=> '&raquo;',

		//Custom CSS
		'custom_css'										=> '',

		//Scrollup Options
		'disable_scrollup'									=> 0,

		//Header Right Sidebar Options
		'disable_header_sidebar'							=> 0,

		//Excerpt Options
		'excerpt_length'									=> '40',
		'excerpt_more_text'									=> __( 'Read More ...', 'catch-adaptive' ),

		//Homepage / Frontpage Settings
		'front_page_category'								=> '0',

		//Pagination Options
		'pagination_type'									=> 'default',

		//Promotion Headline Options
		'promotion_headline_option'							=> 'disabled',
		'promotion_headline'								=> __( 'Catch Adaptive is a Premium Responsive WordPress Theme', 'catch-adaptive' ),
		'promotion_subheadline'								=> '',
		'promotion_headline_button'							=> __( 'Buy Now', 'catch-adaptive' ),
		'promotion_headline_url'							=> esc_url( 'https://catchthemes.com' ),
		'promotion_headline_target'							=> 1,

		//Search Options
		'search_text'										=> __( 'Search...', 'catch-adaptive' ),

		//Basic Color
		'color_scheme'										=> 'light',
		//Featured Content Options
		'featured_content_option'							=> 'homepage',
		'featured_content_layout'							=> 'layout-three',
		'featured_content_position'							=> 1,
		'featured_content_slider'							=> 1,
		'featured_content_headline'							=> '',
		'featured_content_subheadline'						=> '',
		'featured_content_type'								=> 'demo-featured-content',
		'featured_content_number'							=> '4',
		'featured_content_enable_title'						=> 1,
		'featured_content_show'								=> 'hide-content',

		//Featured Slider Options
		'featured_slider_option'							=> 'disabled',
		'featured_slider_image_loader'						=> 'true',
		'featured_slide_transition_delay'					=> '4',
		'featured_slide_transition_length'					=> '1',
		'featured_slider_type'								=> 'demo-featured-slider',
		'featured_slide_number'								=> '4',

		'featured_content_background_image'					=> '',

		//Social Links
		'custom_social_icons'								=> '1',

		//Reset all settings
		'reset_all_settings'								=> 0,
	);

	return apply_filters( 'catchadaptive_default_theme_options', $default_theme_options );
}


/**
 * Returns an array of featured slider image loader options
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_featured_slider_image_loader() {
	$color_scheme_options = array(
		'true'  => __( 'True', 'catch-adaptive' ),
		'wait'  => __( 'Wait', 'catch-adaptive' ),
		'false' => __( 'False', 'catch-adaptive' ),
	);

	return apply_filters( 'catchadaptive_color_schemes', $color_scheme_options );
}


/**
 * Returns an array of color schemes registered for catchadaptive.
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_color_schemes() {
	$color_scheme_options = array(
		'light' => __( 'Light', 'catch-adaptive' ),
		'dark'  => __( 'Dark', 'catch-adaptive' ),
	);

	return apply_filters( 'catchadaptive_color_schemes', $color_scheme_options );
}


/**
 * Returns an array of layout options registered for catchadaptive.
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_layouts() {
	$layout_options = array(
		'left-sidebar' 	=> __( 'Primary Sidebar, Content', 'catch-adaptive' ),
		'right-sidebar' => __( 'Content, Primary Sidebar', 'catch-adaptive' ),
		'no-sidebar'	=> __( 'No Sidebar ( Content Width )', 'catch-adaptive' ),
	);
	return apply_filters( 'catchadaptive_layouts', $layout_options );
}


/**
 * Returns an array of content layout options registered for catchadaptive.
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_get_archive_content_layout() {
	$layout_options = array(
		'columns-layout'     => __( 'Columns Layout (Image Top)', 'catch-adaptive' ),
		'excerpt-image-left' => __( 'Show Excerpt (Image Left)', 'catch-adaptive' ),
		'full-content'       => __( 'Show Full Content (No Featured Image)', 'catch-adaptive' ),
	);
	return apply_filters( 'catchadaptive_get_archive_content_layout', $layout_options );
}


/**
 * Returns an array of feature header enable options
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_enable_featured_header_image_options() {
	$enable_featured_header_image_options = array(
		'homepage'               => __( 'Homepage / Frontpage', 'catch-adaptive' ),
		'exclude-home'           => __( 'Excluding Homepage', 'catch-adaptive' ),
		'exclude-home-page-post' => __( 'Excluding Homepage, Page/Post Featured Image', 'catch-adaptive' ),
		'entire-site'            => __( 'Entire Site', 'catch-adaptive' ),
		'entire-site-page-post'  => __( 'Entire Site, Page/Post Featured Image', 'catch-adaptive' ),
		'pages-posts'            => __( 'Pages and Posts', 'catch-adaptive' ),
		'disabled'               => __( 'Disabled', 'catch-adaptive' ),
	);

	return apply_filters( 'catchadaptive_enable_featured_header_image_options', $enable_featured_header_image_options );
}


/**
 * Returns an array of feature image size
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_featured_image_size_options() {
	$featured_image_size_options = array(
		'full'   => __( 'Full Image', 'catch-adaptive' ),
		'large'  => __( 'Large Image', 'catch-adaptive' ),
		'slider' => __( 'Slider Image', 'catch-adaptive' ),
	);

	return apply_filters( 'catchadaptive_featured_image_size_options', $featured_image_size_options );
}


/**
 * Returns an array of content and slider layout options registered for catchadaptive.
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_featured_slider_content_options() {
	$featured_slider_content_options = array(
		'homepage' 		=> __( 'Homepage / Frontpage', 'catch-adaptive' ),
		'entire-site' 	=> __( 'Entire Site', 'catch-adaptive' ),
		'disabled'		=> __( 'Disabled', 'catch-adaptive' ),
	);

	return apply_filters( 'catchadaptive_featured_slider_content_options', $featured_slider_content_options );
}


/**
 * Returns an array of feature content types registered for catchadaptive.
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_featured_content_types() {
	$featured_content_types = array(
		'demo-featured-content' => __( 'Demo', 'catch-adaptive' ),
		'featured-page-content' => __( 'Page', 'catch-adaptive' ),
	);

	return apply_filters( 'catchadaptive_featured_content_types', $featured_content_types );
}


/**
 * Returns an array of featured content options registered for catchadaptive.
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_featured_content_layout_options() {
	$featured_content_layout_option = array(
		'layout-three' => __( '3 columns', 'catch-adaptive' ),
		'layout-four'  => __( '4 columns', 'catch-adaptive' ),
	);

	return apply_filters( 'catchadaptive_featured_content_layout_options', $featured_content_layout_option );
}


/**
 * Returns an array of featured content show registered for catchadaptive.
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_featured_content_show() {
	$featured_content_show_option = array(
		'excerpt' 		=> __( 'Show Excerpt', 'catch-adaptive' ),
		'full-content' 	=> __( 'Show Full Content', 'catch-adaptive' ),
		'hide-content' 	=> __( 'Hide Content', 'catch-adaptive' ),
	);

	return apply_filters( 'catchadaptive_featured_content_show', $featured_content_show_option );
}


/**
 * Returns an array of feature slider types registered for catchadaptive.
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_featured_slider_types() {
	$featured_slider_types = array(
		'demo-featured-slider' => __( 'Demo', 'catch-adaptive' ),
		'featured-page-slider' => __( 'Page', 'catch-adaptive' ),
	);

	return apply_filters( 'catchadaptive_featured_slider_types', $featured_slider_types );
}

/**
 * Returns an array of color schemes registered for catchadaptive.
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_get_pagination_types() {
	$pagination_types = array(
		'default'                => __( 'Default(Older Posts/Newer Posts)', 'catch-adaptive' ),
		'numeric'                => __( 'Numeric', 'catch-adaptive' ),
		'infinite-scroll-click'  => __( 'Infinite Scroll (Click)', 'catch-adaptive' ),
		'infinite-scroll-scroll' => __( 'Infinite Scroll (Scroll)', 'catch-adaptive' ),
	);

	return apply_filters( 'catchadaptive_get_pagination_types', $pagination_types );
}


/**
 * Returns an array of content featured image size.
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_single_post_image_layout_options() {
	$single_post_image_layout_options = array(
		'featured'  => __( 'Featured', 'catch-adaptive' ),
		'full-size' => __( 'Full Size', 'catch-adaptive' ),
		'disabled'  => __( 'Disabled', 'catch-adaptive' ),
	);
	return apply_filters( 'catchadaptive_single_post_image_layout_options', $single_post_image_layout_options );
}


/**
 * Returns an array of avaliable fonts registered for catchadaptive.
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_avaliable_fonts() {
	$avaliable_fonts = array(
		'arial-black' => array(
			'value' => 'arial-black',
			'label' => '"Arial Black", Gadget, sans-serif',
		),
		'allan' => array(
			'value' => 'allan',
			'label' => '"Allan", sans-serif',
		),
		'allerta' => array(
			'value' => 'allerta',
			'label' => '"Allerta", sans-serif',
		),
		'amaranth' => array(
			'value' => 'amaranth',
			'label' => '"Amaranth", sans-serif',
		),
		'arial' => array(
			'value' => 'arial',
			'label' => 'Arial, Helvetica, sans-serif',
		),
		'bitter' => array(
			'value' => 'bitter',
			'label' => '"Bitter", sans-serif',
		),
		'cabin' => array(
			'value' => 'cabin',
			'label' => '"Cabin", sans-serif',
		),
		'cantarell' => array(
			'value' => 'cantarell',
			'label' => '"Cantarell", sans-serif',
		),
		'century-gothic' => array(
			'value' => 'century-gothic',
			'label' => '"Century Gothic", sans-serif',
		),
		'courier-new' => array(
			'value' => 'courier-new',
			'label' => '"Courier New", Courier, monospace',
		),
		'crimson-text' => array(
			'value' => 'crimson-text',
			'label' => '"Crimson Text", sans-serif',
		),
		'cuprum' => array(
			'value' => 'cuprum',
			'label' => '"Cuprum", sans-serif',
		),
		'dancing-script' => array(
			'value' => 'dancing-script',
			'label' => '"Dancing Script", sans-serif',
		),
		'droid-sans' => array(
			'value' => 'droid-sans',
			'label' => '"Droid Sans", sans-serif',
		),
		'droid-serif' => array(
			'value' => 'droid-serif',
			'label' => '"Droid Serif", sans-serif',
		),
		'exo' => array(
			'value' => 'exo',
			'label' => '"Exo", sans-serif',
		),
		'exo-2' => array(
			'value' => 'exo-2',
			'label' => '"Exo 2", sans-serif',
		),
		'georgia' => array(
			'value' => 'georgia',
			'label' => 'Georgia, "Times New Roman", Times, serif',
		),
		'helvetica' => array(
			'value' => 'helvetica',
			'label' => 'Helvetica, "Helvetica Neue", Arial, sans-serif',
		),
		'helvetica-neue' => array(
			'value' => 'helvetica-neue',
			'label' => '"Helvetica Neue",Helvetica,Arial,sans-serif',
		),
		'istok-web' => array(
			'value' => 'istok-web',
			'label' => '"Istok Web", sans-serif',
		),
		'impact' => array(
			'value' => 'impact',
			'label' => 'Impact, Charcoal, sans-serif',
		),
		'lato' => array(
			'value' => 'lato',
			'label' => '"Lato", sans-serif',
		),
		'lucida-sans-unicode' => array(
			'value' => 'lucida-sans-unicode',
			'label' => '"Lucida Sans Unicode", "Lucida Grande", sans-serif',
		),
		'lucida-grande' => array(
			'value' => 'lucida-grande',
			'label' => '"Lucida Grande", "Lucida Sans Unicode", sans-serif',
		),
		'lobster' => array(
			'value' => 'lobster',
			'label' => '"Lobster", sans-serif',
		),
		'lora' => array(
			'value' => 'lora',
			'label' => '"Lora", serif',
		),
		'monaco' => array(
			'value' => 'monaco',
			'label' => 'Monaco, Consolas, "Lucida Console", monospace, sans-serif',
		),
		'montserrat' => array(
			'value' => 'montserrat',
			'label' => '"Montserrat", sans-serif',
		),
		'nobile' => array(
			'value' => 'nobile',
			'label' => '"Nobile", sans-serif',
		),
		'noto-serif' => array(
			'value' => 'noto-serif',
			'label' => '"Noto Serif", serif',
		),
		'neuton' => array(
			'value' => 'neuton',
			'label' => '"Neuton", serif',
		),
		'open-sans' => array(
			'value' => 'open-sans',
			'label' => '"Open Sans", sans-serif',
		),
		'oswald' => array(
			'value' => 'oswald',
			'label' => '"Oswald", sans-serif',
		),
		'palatino' => array(
			'value' => 'palatino',
			'label' => 'Palatino, "Palatino Linotype", "Book Antiqua", serif',
		),
		'patua-one' => array(
			'value' => 'patua-one',
			'label' => '"Patua One", sans-serif',
		),
		'playfair-display' => array(
			'value' => 'playfair-display',
			'label' => '"Playfair Display", sans-serif',
		),
		'pt-sans' => array(
			'value' => 'pt-sans',
			'label' => '"PT Sans", sans-serif',
		),
		'pt-serif' => array(
			'value' => 'pt-serif',
			'label' => '"PT Serif", serif',
		),
		'quattrocento-sans' => array(
			'value' => 'quattrocento-sans',
			'label' => '"Quattrocento Sans", sans-serif',
		),
		'roboto' => array(
			'value' => 'roboto',
			'label' => '"Roboto", sans-serif',
		),
		'roboto-slab' => array(
			'value' => 'roboto-slab',
			'label' => '"Roboto Slab", serif',
		),
		'sans-serif' => array(
			'value' => 'sans-serif',
			'label' => 'Sans Serif, Arial',
		),
		'source-sans-pro' => array(
			'value' => 'source-sans-pro',
			'label' => '"Source Sans Pro", sans-serif',
		),
		'tahoma' => array(
			'value' => 'tahoma',
			'label' => 'Tahoma, Geneva, sans-serif',
		),
		'trebuchet-ms' => array(
			'value' => 'trebuchet-ms',
			'label' => '"Trebuchet MS", "Helvetica", sans-serif',
		),
		'times-new-roman' => array(
			'value' => 'times-new-roman',
			'label' => '"Times New Roman", Times, serif',
		),
		'ubuntu' => array(
			'value' => 'ubuntu',
			'label' => '"Ubuntu", sans-serif',
		),
		'verdana' => array(
			'value' => 'verdana',
			'label' => 'Verdana, Geneva, sans-serif',
		),
		'yanone-kaffeesatz' => array(
			'value' => 'yanone-kaffeesatz',
			'label' => '"Yanone Kaffeesatz", sans-serif',
		),
	);

	return apply_filters( 'catchadaptive_avaliable_fonts', $avaliable_fonts );
}


/**
 * Returns list of social icons currently supported
 *
 * @since Catch Adaptive 0.1
*/
function catchadaptive_get_social_icons_list() {
	$catchadaptive_social_icons_list = array(
		'facebook_link'		=> array(
			'genericon_class' 	=> 'facebook-alt',
			'label' 			=> esc_html__( 'Facebook', 'catch-adaptive' )
			),
		'twitter_link'		=> array(
			'genericon_class' 	=> 'twitter',
			'label' 			=> esc_html__( 'Twitter', 'catch-adaptive' )
			),
		'googleplus_link'	=> array(
			'genericon_class' 	=> 'googleplus-alt',
			'label' 			=> esc_html__( 'Googleplus', 'catch-adaptive' )
			),
		'email_link'		=> array(
			'genericon_class' 	=> 'mail',
			'label' 			=> esc_html__( 'Email', 'catch-adaptive' )
			),
		'feed_link'			=> array(
			'genericon_class' 	=> 'feed',
			'label' 			=> esc_html__( 'Feed', 'catch-adaptive' )
			),
		'wordpress_link'	=> array(
			'genericon_class' 	=> 'wordpress',
			'label' 			=> esc_html__( 'WordPress', 'catch-adaptive' )
			),
		'github_link'		=> array(
			'genericon_class' 	=> 'github',
			'label' 			=> esc_html__( 'GitHub', 'catch-adaptive' )
			),
		'linkedin_link'		=> array(
			'genericon_class' 	=> 'linkedin',
			'label' 			=> esc_html__( 'LinkedIn', 'catch-adaptive' )
			),
		'pinterest_link'	=> array(
			'genericon_class' 	=> 'pinterest',
			'label' 			=> esc_html__( 'Pinterest', 'catch-adaptive' )
			),
		'flickr_link'		=> array(
			'genericon_class' 	=> 'flickr',
			'label' 			=> esc_html__( 'Flickr', 'catch-adaptive' )
			),
		'vimeo_link'		=> array(
			'genericon_class' 	=> 'vimeo',
			'label' 			=> esc_html__( 'Vimeo', 'catch-adaptive' )
			),
		'youtube_link'		=> array(
			'genericon_class' 	=> 'youtube',
			'label' 			=> esc_html__( 'YouTube', 'catch-adaptive' )
			),
		'tumblr_link'		=> array(
			'genericon_class' 	=> 'tumblr',
			'label' 			=> esc_html__( 'Tumblr', 'catch-adaptive' )
			),
		'instagram_link'	=> array(
			'genericon_class' 	=> 'instagram',
			'label' 			=> esc_html__( 'Instagram', 'catch-adaptive' )
			),
		'polldaddy_link'	=> array(
			'genericon_class' 	=> 'polldaddy',
			'label' 			=> esc_html__( 'PollDaddy', 'catch-adaptive' )
			),
		'codepen_link'		=> array(
			'genericon_class' 	=> 'codepen',
			'label' 			=> esc_html__( 'CodePen', 'catch-adaptive' )
			),
		'path_link'			=> array(
			'genericon_class' 	=> 'path',
			'label' 			=> esc_html__( 'Path', 'catch-adaptive' )
			),
		'dribbble_link'		=> array(
			'genericon_class' 	=> 'dribbble',
			'label' 			=> esc_html__( 'Dribbble', 'catch-adaptive' )
			),
		'skype_link'		=> array(
			'genericon_class' 	=> 'skype',
			'label' 			=> esc_html__( 'Skype', 'catch-adaptive' )
			),
		'digg_link'			=> array(
			'genericon_class' 	=> 'digg',
			'label' 			=> esc_html__( 'Digg', 'catch-adaptive' )
			),
		'reddit_link'		=> array(
			'genericon_class' 	=> 'reddit',
			'label' 			=> esc_html__( 'Reddit', 'catch-adaptive' )
			),
		'stumbleupon_link'	=> array(
			'genericon_class' 	=> 'stumbleupon',
			'label' 			=> esc_html__( 'Stumbleupon', 'catch-adaptive' )
			),
		'pocket_link'		=> array(
			'genericon_class' 	=> 'pocket',
			'label' 			=> esc_html__( 'Pocket', 'catch-adaptive' ),
			),
		'dropbox_link'		=> array(
			'genericon_class' 	=> 'dropbox',
			'label' 			=> esc_html__( 'DropBox', 'catch-adaptive' ),
			),
		'spotify_link'		=> array(
			'genericon_class' 	=> 'spotify',
			'label' 			=> esc_html__( 'Spotify', 'catch-adaptive' ),
			),
		'foursquare_link'	=> array(
			'genericon_class' 	=> 'foursquare',
			'label' 			=> esc_html__( 'Foursquare', 'catch-adaptive' ),
			),
		'twitch_link'		=> array(
			'genericon_class' 	=> 'twitch',
			'label' 			=> esc_html__( 'Twitch', 'catch-adaptive' ),
			),
		'website_link'		=> array(
			'genericon_class' 	=> 'website',
			'label' 			=> esc_html__( 'Website', 'catch-adaptive' ),
			),
		'phone_link'		=> array(
			'genericon_class' 	=> 'phone',
			'label' 			=> esc_html__( 'Phone', 'catch-adaptive' ),
			),
		'handset_link'		=> array(
			'genericon_class' 	=> 'handset',
			'label' 			=> esc_html__( 'Handset', 'catch-adaptive' ),
			),
		'cart_link'			=> array(
			'genericon_class' 	=> 'cart',
			'label' 			=> esc_html__( 'Cart', 'catch-adaptive' ),
			),
		'cloud_link'		=> array(
			'genericon_class' 	=> 'cloud',
			'label' 			=> esc_html__( 'Cloud', 'catch-adaptive' ),
			),
		'link_link'		=> array(
			'genericon_class' 	=> 'link',
			'label' 			=> esc_html__( 'Link', 'catch-adaptive' ),
			),
	);

	return apply_filters( 'catchadaptive_social_icons_list', $catchadaptive_social_icons_list );
}


/**
 * Returns an array of metabox layout options registered for catchadaptive.
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_metabox_layouts() {
	$layout_options = array(
		'default' 	=> array(
			'id' 	=> 'catchadaptive-layout-option',
			'value' => 'default',
			'label' => __( 'Default', 'catch-adaptive' ),
		),
		'left-sidebar' 	=> array(
			'id' 	=> 'catchadaptive-layout-option',
			'value' => 'left-sidebar',
			'label' => __( 'Primary Sidebar, Content', 'catch-adaptive' ),
		),
		'right-sidebar' => array(
			'id' 	=> 'catchadaptive-layout-option',
			'value' => 'right-sidebar',
			'label' => __( 'Content, Primary Sidebar', 'catch-adaptive' ),
		),
		'no-sidebar'	=> array(
			'id' 	=> 'catchadaptive-layout-option',
			'value' => 'no-sidebar',
			'label' => __( 'No Sidebar ( Content Width )', 'catch-adaptive' ),
		),
	);
	return apply_filters( 'catchadaptive_layouts', $layout_options );
}

/**
 * Returns an array of metabox header featured image options registered for catchadaptive.
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_metabox_header_featured_image_options() {
	$header_featured_image_options = array(
		'default' => array(
			'id'		=> 'catchadaptive-header-image',
			'value' 	=> 'default',
			'label' 	=> __( 'Default', 'catch-adaptive' ),
		),
		'enable' => array(
			'id'		=> 'catchadaptive-header-image',
			'value' 	=> 'enable',
			'label' 	=> __( 'Enable', 'catch-adaptive' ),
		),
		'disable' => array(
			'id'		=> 'catchadaptive-header-image',
			'value' 	=> 'disable',
			'label' 	=> __( 'Disable', 'catch-adaptive' )
		)
	);
	return apply_filters( 'header_featured_image_options', $header_featured_image_options );
}


/**
 * Returns an array of metabox sidebar options registered for catchadaptive.
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_metabox_sidebar_options() {
	$sidebar_options = array(
		'main-sidebar' => array(
			'id'		=> 'catchadaptive-sidebar-options',
			'value' 	=> 'default-sidebar',
			'label' 	=> __( 'Default Sidebar', 'catch-adaptive' )
		),
		'optional-sidebar-one' => array(
			'id' 	=> 'catchadaptive-sidebar-options',
			'value' => 'optional-sidebar-one',
			'label' => __( 'Optional Sidebar One', 'catch-adaptive' )
		),
		'optional-sidebar-two' => array(
			'id' 	=> 'catchadaptive-sidebar-options',
			'value' => 'optional-sidebar-two',
			'label' => __( 'Optional Sidebar Two', 'catch-adaptive' )
		),
		'optional-sidebar-three' => array(
			'id' 	=> 'catchadaptive-sidebar-options',
			'value' => 'optional-sidebar-three',
			'label' => __( 'Optional Sidebar three', 'catch-adaptive' )
		)
	);
	return apply_filters( 'sidebar_options', $sidebar_options );
}


/**
 * Returns an array of metabox featured image options registered for catchadaptive.
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_metabox_featured_image_options() {
	$featured_image_options = array(
		'default' => array(
			'id'		=> 'catchadaptive-featured-image',
			'value' 	=> 'default',
			'label' 	=> __( 'Default', 'catch-adaptive' ),
		),
		'featured' => array(
			'id'		=> 'catchadaptive-featured-image',
			'value' 	=> 'featured',
			'label' 	=> __( 'Featured Image', 'catch-adaptive' )
		),
		'full' => array(
			'id' => 'catchadaptive-featured-image',
			'value' => 'full',
			'label' => __( 'Full Size', 'catch-adaptive' )
		),
		'disable' => array(
			'id' => 'catchadaptive-featured-image',
			'value' => 'disable',
			'label' => __( 'Disable Image', 'catch-adaptive' )
		)
	);
	return apply_filters( 'featured_image_options', $featured_image_options );
}

/**
 * Returns catchadaptive_contents registered for catchadaptive.
 *
 * @since Catch Adaptive 0.1
 */
function catchadaptive_get_content() {
	$theme_data = wp_get_theme();

	$catchadaptive_content['left'] 	= sprintf( _x( 'Copyright &copy; %1$s %2$s All Rights Reserved. %3$s', '1: Year, 2: Site Title with home URL 3: Privacy Policy Link', 'catch-adaptive' ), date_i18n( __( 'Y', 'catch-adaptive' ) ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>', function_exists( 'get_the_privacy_policy_link' ) ? get_the_privacy_policy_link() : '' );

	$catchadaptive_content['right']	= esc_attr( $theme_data->get( 'Name') ) . '&nbsp;' . __( 'by', 'catch-adaptive' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_attr( $theme_data->get( 'Author' ) ) .'</a>';

	return apply_filters( 'catchadaptive_get_content', $catchadaptive_content );
}
