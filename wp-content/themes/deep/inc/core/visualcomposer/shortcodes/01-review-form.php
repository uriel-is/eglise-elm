<?php
if ( ! defined( 'WNPW_DIR' ) ) {
	return;
}
vc_map( array(
		'name'			=> 'Review form',
		'base'			=> 'wn-review-form',
		"icon"			=> "webnus-review-form",
		"description"	=> "Show Review Form",
		'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
		'params'		=> array(
			array(
				"type" 			=> "",
				"heading" 		=> esc_html__( "Review Form", 'deep' ),
				"param_name" 	=> "review",				
				"description" => esc_html__( "Show Review Form", 'deep')
			),							
		),
) );
?>
