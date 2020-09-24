<?php

$class = $css = '';
extract( shortcode_atts( array(
	// Animation Pro
	'enable_animation_pro'	=> '',
	'trigger_hook'			=> '0.4',
	'duration'				=> '100%',
	'vertical_movement'		=> '',
	'horizontal_movement'	=> '',
	'rotation'				=> '',
	'opacity'				=> '',
), $atts ) );
extract( $atts );

$output = '';
$el_class = apply_filters( 'kc-el-class', $atts );
$el_class[] = 'kc_text_block wn-kc-elm';

if( $class != '' )$el_class[] = $class;
if( $css != '' )$el_class[] = $css;

// Animation pro
$uniqid	= uniqid();

$horizontal_movement	= $horizontal_movement ? 'x: "' . $horizontal_movement . '",' : '';
$vertical_movement		= $vertical_movement ? 'y: "' . $vertical_movement . '",' : '';
$opacity				= is_numeric( $opacity ) ? 'opacity: "' . $opacity . '",' : '';
$rotation				= $rotation ? 'rotation: "' . $rotation . '",' : '';
$content = apply_filters('kc_column_text', $content );

echo '<div class="'.esc_attr( implode(' ', $el_class) ).'" id="wpb_text_column' . $uniqid . '">';
	echo '<div class="wpb_wrapper">';
		echo wpautop( do_shortcode( $content ) );
	echo '</div>';
echo '</div>';
// if ( $enable_animation_pro ) :
// 	echo '
// 		<script>
// 			( function( $ ) {
// 				$( document ).ready( function() {
// 					var controller = new ScrollMagic.Controller();
// 					new ScrollMagic.Scene({
// 							triggerElement: "#wpb_text_column' . $uniqid . '",
// 							duration: "' . $duration . '",
// 							triggerHook: "' . $trigger_hook . '"
// 						})
// 						.setTween( "#wpb_text_column' . $uniqid . ' .wpb_wrapper", { ' . $opacity . $rotation . $horizontal_movement . $vertical_movement . ' } )
// 						.addTo( controller );
// 				}); // end document ready
// 			})( jQuery );
// 		</script>';
// endif;