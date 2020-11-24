<?php
/**
 * The Header Right Sidebar containing the header right widget area
 *
 * @package Catch Themes
 * @subpackage Catch Adaptive
 * @since Catch Adaptive 0.1
 */
?>

<?php 
/** 
 * catchadaptive_before_header_sidebar hook
 */
do_action( 'catchadaptive_before_header_sidebar' );

	if ( '' != ( $catchadaptive_social_icons = catchadaptive_get_social_icons() ) ) { ?> 
		<aside class="sidebar sidebar-header widget-area">
			<section class="widget widget_catchadaptive_social_icons" id="header-toggle-social-icons">
				<div class="widget-wrap">
					<?php echo catchadaptive_get_social_icons(); ?>
				</div>
			</section>
		</aside><!-- .sidebar .header-sidebar .widget-area -->
	<?php 
	}

/** 
 * catchadaptive_after_header_sidebar hook
 */
do_action( 'catchadaptive_after_header_sidebar' );