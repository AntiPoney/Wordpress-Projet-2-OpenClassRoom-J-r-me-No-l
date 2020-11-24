<?php
/**
 * The template for displaying custom menus
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


if ( ! function_exists( 'catchadaptive_primary_menu' ) ) :
/**
 * Shows the Primary Menu
 *
 * default load in sidebar-header.php
 */
function catchadaptive_primary_menu() {
    $options  = catchadaptive_get_theme_options();
    ?>
	<nav class="site-navigation nav-primary" role="navigation">
        <div class="wrapper">
            <div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'catch-adaptive' ); ?>"><?php _e( 'Skip to content', 'catch-adaptive' ); ?></a></div>
            <?php
                if ( has_nav_menu( 'primary' ) ) {
                    $classes = "mobile-menu-anchor primary-menu";
                }
                else {
                    $classes = "mobile-menu-anchor page-menu";
                }

               ?>
                <div id="mobile-header-left-menu" class="<?php echo $classes; ?>">
                    <a href="#mobile-header-left-nav" id="header-left-menu" class="genericon genericon-menu">
                        <span class="mobile-menu-text"><?php _e( 'Menu', 'catch-adaptive' );?></span>
                    </a>
                </div><!-- #mobile-header-menu -->

                <?php


                $logo_alt = ( '' != $options['logo_alt_text'] ) ? $options['logo_alt_text'] : get_bloginfo( 'name', 'display' );

                if ( isset( $options['logo_icon'] ) &&  $options['logo_icon'] != '' &&  !empty( $options['logo_icon'] ) ){
                     echo '<div id="logo-icon"><a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">
                        <img src="' . esc_url( $options['logo_icon'] ) . '" alt="' . esc_attr( $logo_alt ). '">
                    </a></div>';
                }

                echo '<h3 class="assistive-text">' . __( 'Primary Menu', 'catch-adaptive' ) . '</h3>';

                if ( has_nav_menu( 'primary' ) ) {
                    $catchadaptive_primary_menu_args = array(
                        'theme_location'    => 'primary',
                        'menu_class'        => 'menu catchadaptive-nav-menu',
                        'container'         => false
                    );
                    wp_nav_menu( $catchadaptive_primary_menu_args );
                }
                else {
                    wp_page_menu( array( 'menu_class'  => 'menu catchadaptive-nav-menu' ) );
                }
            ?>
            <div id="header-toggle" class="genericon genericon-search">
                <a class="screen-reader-text" href="#header-toggle-sidebar"><?php esc_html_e( 'Search', 'catch-adaptive' ); ?></a>
            </div>
        </div><!-- .wrapper -->
    </nav><!-- .nav-primary -->
    <?php
}
endif; //catchadaptive_primary_menu
add_action( 'catchadaptive_header', 'catchadaptive_primary_menu', 30 );


if ( ! function_exists( 'catchadaptive_mobile_menus' ) ) :
/**
 * This function loads Mobile Menus
 *
 * @get the data value from theme options
 * @uses catchadaptive_after action to add the code in the footer
 */
function catchadaptive_mobile_menus() {
    echo '<nav id="mobile-header-left-nav" class="mobile-menu" role="navigation">';

   $args = array(
        'theme_location'    => 'primary',
        'container'         => false,
        'items_wrap'        => '<ul id="header-left-nav" class="menu primary">%3$s</ul>'
    );
    wp_nav_menu( $args );

    echo '</nav><!-- #mobile-header-left-nav -->';
}
endif; //catchadaptive_mobile_menus

add_action( 'catchadaptive_after', 'catchadaptive_mobile_menus', 20 );
