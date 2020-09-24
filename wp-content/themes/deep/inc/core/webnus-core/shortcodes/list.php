<?php
function deep_list( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'type'				=> 'plus',
		'icon_color'		=> '',
		'list_content' 		=> '',
		'shortcodeclass' 	=> '',
		'shortcodeid' 	 	=> '',
	), $atts));
	static $uniqid = 0;
	$uniqid++;
	if ( $icon_color ) {
		deep_save_dyn_styles('
			.' . $type . '[data-id="' . $uniqid . '"] li.' . $type . ':before' . ' {
				color: ' . $icon_color . ';
			}
		');

		// live editor
		$live_page_builders_css = '#wrap .' . $type . '[data-id="' . $uniqid . '"] li:before' . ' { color: ' . $icon_color . '; }';
		if ( ! in_array( 'admin-bar', get_body_class() ) ) {
			if ( ! empty( $live_page_builders_css ) ) {

				echo '<style>';
					echo $live_page_builders_css;
				echo '</style>';

			}
		}
	}
	
	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';
	$item_content       = '';
	$list_content       = ( array )vc_param_group_parse_atts( $list_content );
	$list_content_item 	= count($list_content);
	$count = 1;

	$out= '';
	$out .= '<ul class="'. $type . ' ' . $shortcodeclass . '"  ' . $shortcodeid . '  data-id="' . $uniqid . '">';	
	foreach ($list_content as $key ) {
		if ( $type == 'number' ) {
			$out .= '<li class="'. $type .'"> <span class="num colorb">' . $count . '</span>' . $key['text'] . '</li>';
			$count ++;
		} else {			
			$out .= '<li class="'. $type .'">' . $key['text'] . '</li>';
		}	
	}

	$out .= '</ul>';
	return $out;

}
add_shortcode('ul', 'deep_list');