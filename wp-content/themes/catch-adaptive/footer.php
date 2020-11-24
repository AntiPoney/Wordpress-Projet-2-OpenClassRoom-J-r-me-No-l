<?php
/**
 * The template for displaying the footer
 *
 * @package Catch Themes
 * @subpackage Catch Adaptive
 * @since Catch Adaptive 0.1
 */
?>

<?php 
    /** 
     * catchadaptive_after_content hook
     *
     * @hooked catchadaptive_content_end - 30
     * @hooked catchadaptive_featured_content_display (move featured content below homepage posts) - 40 
     *
     */
    do_action( 'catchadaptive_after_content' ); 
?>
            
<?php                
    /** 
     * catchadaptive_footer hook
     *
     * @hooked catchadaptive_footer_content_start - 30
     * @hooked catchadaptive_footer_sidebar - 40
     * @hooked catchadaptive_get_footer_content - 100
     * @hooked catchadaptive_footer_content_end - 110
     * @hooked catchadaptive_page_end - 200
     *
     */
    do_action( 'catchadaptive_footer' );
?>

<?php               
/** 
 * catchadaptive_after hook
 *
 * @hooked catchadaptive_scrollup - 10
 * @hooked catchadaptive_mobile_menus- 20
 *
 */
do_action( 'catchadaptive_after' );?>

<?php wp_footer(); ?>

</body>
</html>