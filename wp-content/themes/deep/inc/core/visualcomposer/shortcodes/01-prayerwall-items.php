<?php
if ( ! defined( 'WNPW_DIR' ) ) {
	return;
}
vc_map( array(
		'name'			=> 'Prayer wall items',
		'base'			=> 'prayerwall-items',
		"icon"			=> "webnus-prayerwall-items",
		"description"	=> "Show Prayer Wall items",
		'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
		'params'		=> array(
			array(
				"type" 			=> "",
				"heading" 		=> esc_html__( "Prayer Wall items", 'deep' ),
				"param_name" 	=> "prayerwall-items",				
				"description" => esc_html__( "Show Prayer Wall items", 'deep')
			),							
		),
) );
?>
