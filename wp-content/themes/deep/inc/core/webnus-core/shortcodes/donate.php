<?php
function deep_donate_buttons( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'donate_content'	=> '',
		'id'				=> '',
		'color'				=> 'default',
		'size'				=> 'small',
		'border'			=> 'false',
		'icon'				=> 'theme-skin',
		'shortcodeclass' 	=> '',
		'shortcodeid' 	 	=> '',
	), $atts));

		// Class & ID 
		$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

		$border 	= ( 'true' == $border ) ? 'bordered-bot' : '';
		$icon_str 	= $icon ? '<i class=" ' . $icon . ' "></i>' : '';
		$theme_skin	= ( $color == 'default' ) ? 'theme-skin' : '' ;
		$out = '
			<a class="donate-button square button '.$theme_skin.' '.$color.' '.$size.' '.$border.' ' . $shortcodeclass . '"  ' . $shortcodeid . '  href="#w-donate-'.get_the_ID().'" data-effect="mfp-zoom-in">
				<span class="media_label">'. $icon_str . $donate_content . '</span>
			</a>
			<div id="w-donate-'.get_the_ID().'" class="white-popup mfp-with-anim mfp-hide">
				<div id="donate-contact-modal-'.get_the_ID().'">
					<div class="w-modal modal-donate wn-donate-contact-modal" id="w-donate-'.get_the_ID().'">
						<h3 class="modal-title">'. $donate_content .'</h3>
						'.do_shortcode('[contact-form-7 id="'.$id.'" title="' . $donate_content . '"]').'
					</div>
				</div>
			</div>';

		return $out;
}
add_shortcode( 'donate','deep_donate_buttons' );