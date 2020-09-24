<?php
if ( ! defined( 'WNPW_DIR' ) ) {
	return;
}
vc_map( array(
		'name'			=> 'Review items',
		'base'			=> 'review-items',
		"icon"			=> "webnus-review-items",
		"description"	=> "Show review items",
		'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
		'params'		=> array(
			array(
				"type" 			=> "",
				"heading" 		=> esc_html__( "Review items", 'deep' ),
				"param_name" 	=> "review-items",				
				"description" => esc_html__( "Show Review items", 'deep')
			),							
		),
) );
?>
