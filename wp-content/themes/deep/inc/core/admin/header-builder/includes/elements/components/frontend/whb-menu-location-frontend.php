<?php
function whb_location( $atts, $uniqid ) {
	extract(
		WHB_Helper::component_atts(
			array(
				'location_name' => '',
			),
			$atts
		)
	);

	// render	
	
	if ( ! function_exists( 'menu_location' ) ) {
		function menu_location() {
			register_nav_menus(
				array(
					'menu-header' => __( 'Test Menu' ),			
				)
			);
		}
		add_action( 'init', 'menu_location' );
	}

}

WHB_Helper::add_element( 'menu-location', 'whb_location' );
