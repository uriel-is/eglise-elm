<?php
if ( ! is_plugin_active( 'wp-hotel-booking/wp-hotel-booking.php' ) ) {
	return;
}
function deep_hotel_booking_form($atts, $content = null) {
	extract(shortcode_atts(array(
		'type'	=> 'vertical',
	), $atts));

	$type	= $type == 'vertical' ? 'vertical' : 'horizontal';
	$out	= '';
	$out .= '<div class="htc-booking ' . $type . '">';
	$out .= do_shortcode('[hotel_booking]');
	$out .= '</div>';

	return $out;
}
add_shortcode('hotel_booking_form','deep_hotel_booking_form');