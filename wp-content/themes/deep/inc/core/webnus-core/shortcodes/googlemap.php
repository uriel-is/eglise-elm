<?php
function deep_gmap ($atts, $content = null) {
	extract( shortcode_atts( array(
		'map_type_display'			=> 'true',
		'map_type'					=> 'roadmap',
		'draggable'					=> 'true',
		'animation'					=> 'true',
		'marker_animation'			=> 'none',
		'zoom_control_display'		=> 'true',
		'scrollwheel'				=> 'true',
		'street_view'				=> 'true',
		'scale_control'				=> 'true',
		'bg_color'					=> '',
		'hue'						=> '',
		'zoom_map'					=> '9',
		'zoom_click'				=> '',
		'width'						=> '0',
		'height'					=> '400',
		'lat_center'				=> '39.596165',
		'lon_center'				=> '-102.810059',
		'custom_marker'				=> '',
		'map_points'				=> '',
		'latitude'					=> '',
		'longitude'					=> '',
		'address'					=> '',
		'location_title'			=> '',
		'location_website'			=> '',
		'marker_type'				=> '',
		'marker_color'				=> '',
		'custom_marker_s'			=> '',
		'map_style'					=> '',
		'shortcodeclass' 			=> '',
		'shortcodeid' 	 			=> '',
	), $atts));

	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	wp_enqueue_script( 'deep-googlemap-api' );
	wp_enqueue_script( 'deep-googlemap' );

	$shortcodeclass 			= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid				= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

	$width						= ($width && is_numeric($width))? 'width:'.$width.'px;' : '';
	$height						= ($height && is_numeric($height))? 'height:'.$height.'px;' : '';
	$zoom_click 				= ($zoom_click) ? $zoom_click : $zoom_map;
	$map_style					= $map_style ? $map_style : 'simple';

	$draggable					= $draggable ? 'true' : 'false';
	$animation					= $animation ? 'true' : 'false';
	$map_type_display 			= $map_type_display ? 'true' : 'false';
	$zoom_control_display		= $zoom_control_display ? 'true' : 'false';
	$scrollwheel				= $scrollwheel ? 'true' : 'false';
	$street_view				= $street_view ? 'true' : 'false';
	$scale_control				= $scale_control ? 'true' : 'false';
	$marker_type				= $marker_type ? 'radar' : 'img';

	$map_item_data	= array();
	// Fetch Carousle Item Loop Variables
	if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
		$map_item		= (array) vc_param_group_parse_atts( $map_points );
		foreach ( $map_item as $data ) {
			$new_line 						= $data;
			$new_line['latitude'] 			= isset( $new_line['latitude'] )? $new_line['latitude']: '';
			$new_line['longitude'] 			= isset( $new_line['longitude'] ) ? $new_line['longitude']: '';
			$new_line['address'] 			= isset( $new_line['address'] )? $new_line['address']: '';
			$new_line['location_title'] 	= isset( $new_line['location_title'] )? $new_line['location_title']: '';
			$new_line['location_website'] 	= isset( $new_line['location_website'] )? $new_line['location_website']: '';
			$new_line['custom_marker_s']	= isset( $new_line['custom_marker_s'] )? $new_line['custom_marker_s']: '';
			$map_item_data[]				= $new_line;
		}
	} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) && (is_array($map_points) || is_object($map_points)) ) {
		foreach( $atts['map_points'] as $key => $data ){
			$new_line 						= $data;
			$new_line->latitude 			= isset( $new_line->latitude )? $new_line->latitude: '';
			$new_line->longitude 			= isset( $new_line->longitude ) ? $new_line->longitude: '';
			$new_line->address 				= isset( $new_line->address )? $new_line->address: '';
			$new_line->location_title 		= isset( $new_line->location_title )? $new_line->location_title: '';
			$new_line->location_website 	= isset( $new_line->location_website )? $new_line->location_website: '';
			$new_line->custom_marker_s		= isset( $new_line->custom_marker_s )? $new_line->custom_marker_s: '';
			$map_item_data[]				= $new_line;
		}
	}


	$map_addresses 	= array();
	$marker_icon	= '';
	if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
		foreach( $map_item_data as $map_single_item ) :
			if ( $map_single_item['location_title'] || $map_single_item['latitude'] || $map_single_item['longitude'] || $map_single_item['custom_marker_s'] || $map_single_item['address'] ) {
				if ( $map_single_item['custom_marker_s'] ) {
					$marker_icon = wp_get_attachment_url( $map_single_item['custom_marker_s'] );
				}elseif ( $marker_type == 'radar' ) {
					$marker_icon = 'radar';
				}else{
					$marker_icon = wp_get_attachment_url( $custom_marker );
				}
				$map_addresses[] = '[\'' . $map_single_item['location_title'] . '\',' . $map_single_item['latitude'] . ',' . $map_single_item['longitude'] . ',' . $marker_icon . ',\'' . $map_single_item['address'] . '\']|';
			};
		endforeach;
	} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
		foreach( $map_item_data as $map_single_item ) :
			if ( $map_single_item->location_title || $map_single_item->latitude || $map_single_item->longitude || $map_single_item->custom_marker_s || $map_single_item->address ) {
				if ( $map_single_item->custom_marker_s ) {
					$marker_icon = wp_get_attachment_url( $map_single_item->custom_marker_s );
				}elseif ( $marker_type == 'radar' ) {
					$marker_icon = 'radar';
				}else{
					$marker_icon = wp_get_attachment_url( $custom_marker );
				}
				$map_addresses[] = '[\'' . $map_single_item->location_title . '\',' . $map_single_item->latitude . ',' . $map_single_item->longitude . ',' . $marker_icon . ',\'' . $map_single_item->address . '\']|';
			};
		endforeach;
	}
	

	ob_start();

	static $uniqid = 0;
	$uniqid++; ?>

	<div class="w-map <?php echo '' . $shortcodeclass; ?>" <?php echo $shortcodeid; ?> >
		<div 
		data-map-draggable			= "<?php echo '' . $draggable; ?>"
		data-map-type-display		= "<?php echo '' . $map_type_display; ?>"
		data-map-zoom-control 		= "<?php echo '' . $zoom_control_display; ?>"
		data-map-scroll-wheel 		= "<?php echo '' . $scrollwheel; ?>"
		data-map-street-view 		= "<?php echo '' . $street_view; ?>"
		data-map-scale-control 		= "<?php echo '' . $scale_control; ?>"
		data-map-zoom 				= "<?php echo '' . $zoom_map; ?>"
		data-map-zoom-click 		= "<?php echo '' . $zoom_click; ?>"
		data-map-types 				= "<?php echo '' . $map_type; ?>"
		data-map-latitude-center 	= "<?php echo '' . $lat_center; ?>"
		data-map-longitude-center 	= "<?php echo '' . $lon_center; ?>"
		data-map-background-color 	= "<?php echo '' . $bg_color; ?>"
		data-map-hue-color 			= "<?php echo '' . $hue; ?>"
		data-map-animation 			= "<?php echo '' . $animation; ?>"
		data-map-addresses 			= "<?php echo implode("", $map_addresses); ?>"
		data-map-animation-value	= "<?php echo '' . $marker_animation; ?>"
		data-map-marker-type		= "<?php echo '' . $marker_type; ?>"
		data-map-marker-color		= "<?php echo '' . $marker_color; ?>"
		data-map-style				= "<?php echo '' . $map_style; ?>"
		id							= "map_<?php echo '' . $uniqid; ?>"
		style 						= "<?php echo esc_attr( $width ) ?><?php echo esc_attr( $height ) ?>"
		class 						= "webnus-google-map"
		>
		</div>
	</div>

	<?php
	$out = ob_get_contents();
	ob_end_clean();
	$out = str_replace('<p></p>','',$out);
	return $out;
}

add_shortcode('gmap','deep_gmap');