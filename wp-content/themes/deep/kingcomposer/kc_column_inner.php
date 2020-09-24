<?php

$output = $width = $col_in_class = $col_in_class_container = $css = $col_id = '';
$attributes = array();

extract( $atts );
extract(shortcode_atts(array(
	//Scroll
	'inner_scroll'			=> '',
	'scroll_height_desktop'	=> '',
	'scroll_height_tablet'	=> '',
	'scroll_height_mobile'	=> '',
	//toggle
	'toggle'				=> '',
	'toggle_height_open'	=> '',
	'toggle_width_open'		=> '',
	'toggle_height_close'	=> '',
	'toggle_width_close'	=> '',
	// Gradient
	'column_grad_color_1'	=> '',
	'column_grad_color_2'	=> '',
	'column_grad_color_3'	=> '',
	'column_grad_color_4'	=> '',
	'column_grad_direction'	=> '',
), $atts));
$uniqid = uniqid();
$classes = apply_filters( 'kc-el-class', $atts );
$classes[] = 'kc_column_inner';
$classes[] = 'wn-column-' . $uniqid ;
$classes[] = @kc_column_width_class( $width );
$toggle_class = $toggle_icon = $live_page_builders_css = $scroll_class = '';


if ( $inner_scroll == 'yes' ) {
	wp_enqueue_script( 'deep-nicescroll-script', DEEP_ASSETS_URL . 'js/libraries/jquery.nicescroll.js', array( 'jquery' ), null, true );
	$height_desktop_style = $scroll_height_desktop ? ' height: '.$scroll_height_desktop.' !important; ' : '' ;
	deep_save_dyn_styles ( '.wn-inner-scroll-column { overflow-y: scroll; ' . $height_desktop_style .' } ' );
	$live_page_builders_css .= '.wn-inner-scroll-column { overflow-y: scroll; ' . $height_desktop_style .' }';
	if ( $scroll_height_tablet ) {
		deep_save_dyn_styles ( '	
			@media only screen and (max-width : 960px) {
				.wn-inner-scroll-column { height: ' . $scroll_height_tablet .' }
			}	
		' );
		$live_page_builders_css .= '@media only screen and (max-width : 960px) { .wn-inner-scroll-column { height: ' . $scroll_height_tablet .' } }';
	}
	if ( $scroll_height_mobile ) {
		deep_save_dyn_styles ( '	
			@media only screen and (max-width : 480px) {
				.wn-inner-scroll-column { height: ' . $scroll_height_mobile .' }
			}	
		' );
		$live_page_builders_css .= '@media only screen and (max-width : 480px) { .wn-inner-scroll-column { height: ' . $scroll_height_mobile .' } }';
	}
	$scroll_class = ' wn-inner-scroll-column';
}

// Gradient
$grad_html = '';
if ( ! empty( $column_grad_color_1 ) || ! empty( $column_grad_color_2 ) || ! empty( $column_grad_color_3 ) || ! empty( $column_grad_color_4 ) ) {
	$grad_html = '<div class="wn-grad-column" ></div>';
	$column_grad_direction = $column_grad_direction ? $column_grad_direction : '';
	$column_gradient = deep_gradient( $column_grad_color_1, $column_grad_color_2, $column_grad_color_3, $column_grad_color_4, $column_grad_direction );
	deep_save_dyn_styles('
		.wn-column-' . $uniqid . ' {
			position: relative;
		}
		.wn-column-' . $uniqid . ' .wn-grad-column {
			' . $column_gradient . '
			position: absolute;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
		}
	');
	$live_page_builders_css .= '.wn-column-' . $uniqid . ' { position: relative; } .wn-column-' . $uniqid . ' .wn-grad-column { ' . $column_gradient . ' position: absolute; top: 0; right: 0; bottom: 0; left: 0; }';

}


if ( $toggle == 'yes') {
	$toggle_class = 'wn-toggle-column';
	$toggle_height_open_out		= $toggle_height_open 	? 'data-toggle_height_open		= "' . $toggle_height_open	 . '"'	: '';
	$toggle_width_open_out 		= $toggle_width_open  	? 'data-toggle_width_open		= "' . $toggle_width_open	 . '"' 	: '';
	$toggle_height_close_out	= $toggle_height_close	? 'data-toggle_height_close		= "' . $toggle_height_close	 . '"'	: '';
	$toggle_width_close_out		= $toggle_width_close 	? 'data-toggle_width_close		= "' . $toggle_width_close	 . '"'	: '';
	$toggle_icon = '<span class="wn-toggle-column-icon" ' . $toggle_height_open_out . $toggle_width_open_out . $toggle_height_close_out . $toggle_width_close_out  . '><i class="icon-arrows-left-double-32"></i></span>';
	deep_save_dyn_styles ( '
		@media only screen and (min-width : 961px) {	
			.wn-toggle-column { height: ' . $toggle_height_open .' ; width: ' . $toggle_width_open . ' ; margin-bottom : -1px; }
		}
		@media only screen and (max-width : 960px) {	
			.wn-toggle-column-icon { display: none; }
		}
	' );
	$live_page_builders_css .= '@media only screen and (min-width : 961px) { .wn-toggle-column { height: ' . $toggle_height_open .' ; width: ' . $toggle_width_open . ' ; margin-bottom : -1px; } } @media only screen and (max-width : 960px) { .wn-toggle-column-icon { display: none; } }';
}


if( !empty( $col_in_class ) )
	$classes[] = $col_in_class;

if( !empty( $css ) )
	$classes[] = $css;

$col_in_class_container = !empty($col_in_class_container)?$col_in_class_container.' kc_wrapper kc-col-inner-container':'kc_wrapper kc-col-inner-container';


if( !empty( $col_id ) )
	$attributes[] = 'id="'. $col_id .'"';

$attributes[] = 'class="' . esc_attr( trim( implode(' ', $classes) ) ) . '"';

$output .= '<div ' . implode( ' ', $attributes ) . '>'
		. '<div class="vc_column-inner '.trim( esc_attr( $col_in_class_container ) ) . $scroll_class . '">'
		. $grad_html
		. do_shortcode( str_replace('kc_column_inner#', 'kc_column_inner', $content ) )
		. '</div>'
		. '</div>';


// live editor
if ( ! in_array( 'admin-bar', get_body_class() ) ) {

	if ( ! empty( $live_page_builders_css ) ) {

		$output .= '<style>';
			$output .= $live_page_builders_css;
		$output .= '</style>';

	}

}

echo $output;
