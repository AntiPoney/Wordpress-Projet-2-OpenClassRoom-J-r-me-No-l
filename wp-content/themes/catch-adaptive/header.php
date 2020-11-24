<?php
/**
 * The default template for displaying header
 *
 * @package Catch Themes
 * @subpackage Catch Adaptive
 * @since Catch Adaptive 0.1
 */

	/** 
	 * catchadaptive_doctype hook
	 *
	 * @hooked catchadaptive_doctype -  10
	 *
	 */
	do_action( 'catchadaptive_doctype' );?>

<head>
<?php	
	/** 
	 * catchadaptive_before_wp_head hook
	 *
	 * @hooked catchadaptive_head -  10
	 * 
	 */
	do_action( 'catchadaptive_before_wp_head' );

	wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' );  ?>

<?php 
	/** 
     * catchadaptive_before_header hook
     *
     */
    do_action( 'catchadaptive_before' );
	
	/** 
	 * catchadaptive_site_branding hook
	 *
	 * @hooked catchadaptive_page_start -  10
	 * @hooked catchadaptive_fixed_header_start - 20 
   	 * @hooked catchadaptive_primary_menu - 30 
	 * @hooked catchadaptive_fixed_header_end - 50
	 * @hooked catchadaptive_header_start - 60
     * @hooked catchadaptive_site_branding - 70 
	 * @hooked catchadaptive_header_sidebar - 80
	 * @hooked catchadaptive_header_end - 90
	 */
	do_action( 'catchadaptive_header' );

	/** 
     * catchadaptive_after_header hook
     * 
     * @hooked catchadaptive_add_breadcrumb - 30
     */
	do_action( 'catchadaptive_after_header' ); 

	/** 
	 * catchadaptive_before_content hook
	 *
	 * @hooked catchadaptive_slider - 10
	 * @hooked catchadaptive_featured_overall_image (after secondary menu) - 30
	 * @hooked catchadaptive_add_breadcrumb - 40
	 * @hooked catchadaptive_promotion_headline - 50
	 */
	do_action( 'catchadaptive_before_content' );
	
	/** 
     * catchadaptive_main hook
     *
     *  @hooked catchadaptive_content_start - 10
     *
     */
	do_action( 'catchadaptive_content' );	