<?php

function deep_slideup( $attributes, $content = null ) {
	
	extract(shortcode_atts(array(
	
		'title'=>'',
		'slideup_content'=>'',
		'title_color'=>'#f67c7d',
	
	), $attributes));
	
	ob_start();
	
	$content	= str_replace(array('<p>','</p>'),'',$content);
	static $uniqid = 0;
	$uniqid++;
	$style		= '<div></div>.slideup-note-' . $uniqid . ' h4 { background-color:' . $title_color . '  }';

	echo '
		<article class="slideup-note slideup-note-' . $uniqid . '">
			<h4>'.$title.'</h4>
			<p>'.$slideup_content.'</p>
		</article>';
	
	$out = ob_get_contents();
	ob_end_clean();
	deep_save_dyn_styles( $style );
	// live editor
	if ( ! in_array( 'admin-bar', get_body_class() ) ) {

		if ( ! empty( $style ) ) {

			$out .= '<style>';
				$out .= $style;
			$out .= '</style>';

		}

	}
	return $out;
}

add_shortcode('slideup', 'deep_slideup');