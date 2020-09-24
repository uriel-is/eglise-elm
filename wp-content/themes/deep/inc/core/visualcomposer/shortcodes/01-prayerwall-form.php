<?php
if ( ! defined( 'WNPW_DIR' ) ) {
	return;
}
vc_map( array(
		'name'			=> 'Prayer wall form',
		'base'			=> 'prayerwall-form',
		"icon"			=> "webnus-prayerwall-form",
		"description"	=> "Show Prayer Wall Form",
		'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
		'params'		=> array(
			array(
				"type" 			=> "",
				"heading" 		=> esc_html__( "Prayer Wall Form", 'deep' ),
				"param_name" 	=> "prayerwall",				
				"description" => esc_html__( "Show Prayer Wall Form", 'deep')
			),							
		),
) );
?>
