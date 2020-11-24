<?php
/**
 * The template for adding Customizer Custom Controls
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
	//Custom control for dropdown category multiple select
	class Catchadaptive_Customize_Dropdown_Categories_Control extends WP_Customize_Control {
		public $type = 'dropdown-categories';

		public $name;

		public function render_content() {
			$dropdown = wp_dropdown_categories(
				array(
					'name'             => $this->name,
					'echo'             => 0,
					'hide_empty'       => false,
					'show_option_none' => false,
					'hide_if_empty'    => false,
					'show_option_all'  => __( 'All Categories', 'catch-adaptive' )
				)
			);

			$dropdown = str_replace('<select', '<select multiple = "multiple" style = "height:95px;" ' . $this->get_link(), $dropdown );

			printf( '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',esc_html( $this->label ), $dropdown ); // WPCS: XSS OK.
			echo '<p class="description">'. __( 'Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.', 'catch-adaptive' ) . '</p>';
		}
	}


	//Custom control for any note, use label as output description
	class Catchadaptive_Note_Control extends WP_Customize_Control {
		public $type = 'description';

		public function render_content() {
			echo '<h2 class="description">' . $this->label . '</h2>'; // WPCS: XSS OK.
		}
	}

	//Custom control for dropdown category multiple select
	class Catchadaptive_Important_Links extends WP_Customize_Control {
        public $type = 'important-links';

        public function render_content() {
        	//Add Theme instruction, Support Forum, Changelog, Donate link, Review, Facebook, Twitter, Google+, Pinterest links
            $important_links = array(
							'theme_instructions' => array(
								'link'	=> esc_url( 'https://catchthemes.comtheme-instructions/catchadaptive/' ),
								'text' 	=> __( 'Theme Instructions', 'catch-adaptive' ),
								),
							'support' => array(
								'link'	=> esc_url( 'https://catchthemes.comsupport/' ),
								'text' 	=> __( 'Support', 'catch-adaptive' ),
								),
							'changelog' => array(
								'link'	=> esc_url( 'https://catchthemes.comchangelogs/catchadaptive-theme/' ),
								'text' 	=> __( 'Changelog', 'catch-adaptive' ),
								),
							'donate' => array(
								'link'	=> esc_url( 'https://catchthemes.comdonate/' ),
								'text' 	=> __( 'Donate Now', 'catch-adaptive' ),
								),
							'review' => array(
								'link'	=> esc_url( 'https://wordpress.org/support/view/theme-reviews/catchadaptive' ),
								'text' 	=> __( 'Review', 'catch-adaptive' ),
								),
							);
			foreach ( $important_links as $important_link) {
				echo '<p><a target="_blank" href="' . esc_url( $important_link['link'] ) .'" >' . esc_attr( $important_link['text'] ) .' </a></p>';
			}
        }
    }
