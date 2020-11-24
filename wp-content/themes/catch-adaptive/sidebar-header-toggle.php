<?php
/**
 * The Header Toggle Sidebar containing the header toggle widget area
 *
 * @package Catch Themes
 * @subpackage Catch Adaptive
 * @since Catch Adaptive 0.1
 */
?>

<?php 
/** 
 * catchadaptive_before_header_toggle_sidebar hook
 */
do_action( 'catchadaptive_before_header_toggle_sidebar' ); ?>

<aside id="header-toggle-sidebar" class="displaynone sidebar sidebar-header-toggle widget-area">
	<div class="wrapper">
		<section class="widget widget_search" id="header-toggle-search">
			<div class="widget-wrap">
				<?php echo get_search_form(); ?>
			</div>
		</section>
	</div><!-- .wrapper -->
</aside><!-- .sidebar .header-sidebar .widget-area -->

<?php 
/** 
 * catchadaptive_after_header_toggle_sidebar hook
 */
do_action( 'catchadaptive_after_header_toggle_sidebar' );