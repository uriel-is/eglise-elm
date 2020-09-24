<?php
 function deep_buttons( $atts, $content = null ) {
 	extract(shortcode_atts(array(
	'btn_content'				=> '',
	'shape'						=> '',
 	'url'						=> '#',
 	'target'					=> '_self',
 	'color'						=> 'theme-skin',
 	'size'						=> 'small',
	'border'					=> 'false',
	'icon'						=> '',
	'btn_fontweight'			=> '',
	'button_arrow'				=> '',
	'subtitle_theme_fonts'		=> '',
	'btn_text_font'				=> '',
	'shadow_left'				=> '',
	'shadow_top'				=> '',
	'shadow_blur'				=> '',
	'shadow_spread'				=> '',
	'shadow_color'				=> '',
	'shadow_status'				=> '',
	'btn_font_size'				=> '',
	'btn_pad_top'				=> '',
	'btn_pad_right'				=> '',
	'btn_pad_bottom'			=> '',
	'btn_pad_left'				=> '',
	'btn_marg_top'				=> '',
	'btn_marg_right'			=> '',
	'btn_marg_bottom'			=> '',
	'btn_marg_left'				=> '',
	'btn_letterspacing'			=> '',
	'botton_skin'				=> 'predefined',
	'btn_color'					=> '',
	'btn_color_hover'			=> '',
	'btn_border_color'			=> '',
	'btn_border_color_hover'	=> '',
	'btn_border_radius_left'	=> '',
	'btn_border_radius_bottom'	=> '',
	'btn_border_radius_right'	=> '',
	'btn_border_radius_top'		=> '',
	'btn_border_width_left'		=> '',
	'btn_border_width_bottom'	=> '',
	'btn_border_width_right'	=> '',
	'btn_border_width_top'		=> '',
	'btn_icon_color'			=> '',
	'btn_icon_color_hover'		=> '',
	'btn_background'			=> '',
	'btn_background_1'			=> '',
	'btn_background_2'			=> '',
	'btn_background_hover'		=> '',
	'btn_background_hover_1'	=> '',
	'btn_background_hover_2'	=> '',
	'bg_grad_direction'			=> '',
	'bg_hover_grad_direction'	=> '',
	'shortcodeclass' 			=> '',
	'shortcodeid' 	 			=> '',

 	), $atts));
	$shortcodeclass 		= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid			= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';
	 include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	 if ( empty($color) ) $color = 'theme-skin';
	 if (empty($botton_skin)) $botton_skin = 'predefined';
 	$set_arrow = '';
	if( $button_arrow == "enable" ) {
		$set_arrow = 'arrow';
	}
	$btn_bg = $btn_bg_hover = '';
   	// btn google fonts
	$uniqid 					= uniqid();
	$style 						= '';
	$btn_color 					= $btn_color ? 'color: ' . $btn_color . ' !important;' : '';
	$btn_color_hover 			= $btn_color_hover ? 'color: ' . $btn_color_hover . ' !important;' : '';
	$btn_border_color 			= $btn_border_color ? 'border-color:' . $btn_border_color . ' !important;' : '';
	$btn_border_color_hover 	= $btn_border_color_hover ? 'border-color:' . $btn_border_color_hover . ' !important;' : '';
	$btn_border_radius_left 	= $btn_border_radius_left ? 'border-top-left-radius:' . $btn_border_radius_left . ' !important;' : '';
	$btn_border_radius_bottom 	= $btn_border_radius_bottom ? 'border-bottom-right-radius:' . $btn_border_radius_bottom . ' !important;' : '';
	$btn_border_radius_right 	= $btn_border_radius_right ? 'border-top-right-radius:' . $btn_border_radius_right . ' !important;' : '';
	$btn_border_radius_top 		= $btn_border_radius_top ? 'border-bottom-left-radius:' . $btn_border_radius_top . ' !important;' : '';
	$btn_border_width_left 		= $btn_border_width_left ? 'border-style: solid; border-left-width:' . $btn_border_width_left . ' !important;' : '';
	$btn_border_width_bottom 	= $btn_border_width_bottom ? 'border-style: solid; border-bottom-width:' . $btn_border_width_bottom . ' !important;' : '';
	$btn_border_width_right 	= $btn_border_width_right ? 'border-style: solid; border-right-width:' . $btn_border_width_right . ' !important;' : '';
	$btn_border_width_top 		= $btn_border_width_top ? 'border-style: solid; border-top-width:' . $btn_border_width_top . ' !important;' : '';
	$btn_icon_color 			= $btn_icon_color ? 'color:' . $btn_icon_color . ' !important;' : '';
	$btn_icon_color_hover 		= $btn_icon_color_hover ? 'color:' . $btn_icon_color_hover . ' !important;' : '';
	$btn_background 			= $btn_background ?    $btn_background : '';
	$btn_background_1 			= $btn_background_1 ?  $btn_background_1 : '';
	$btn_background_2 			= $btn_background_2 ?  $btn_background_2 : '';
	$bg_grad_direction 			= $bg_grad_direction ?  $bg_grad_direction : '90deg';

	if ( !empty( $btn_background ) &&  !empty( $btn_background_1 ) && !empty($btn_background_2) ) {
		$btn_bg = '	background: ' . $btn_background . ' !important;
    				background: linear-gradient( ' . $bg_grad_direction . ', ' . $btn_background . ' 0%, ' . $btn_background_1 . ' 50%, ' . $btn_background_2 . ' 100% ) !important;
    				background: -moz-linear-gradient( ' . $bg_grad_direction . ', ' . $btn_background . ' 0%, ' . $btn_background_1 . ' 50%, ' . $btn_background_2 . ' 100% ) !important;
    				background: -webkit-linear-gradient( ' . $bg_grad_direction . ', ' . $btn_background . ' 0%, ' . $btn_background_1 . ' 50%, ' . $btn_background_2 . ' 100% ) !important;';
	} elseif ( !empty( $btn_background ) && !empty($btn_background_1) && empty($btn_background_2) ) {
		$btn_bg = '	background: ' . $btn_background . ' !important;
    				background: linear-gradient( ' . $bg_grad_direction . ', ' . $btn_background . ' 0%, ' . $btn_background_1 . ' 100% ) !important;
    				background: -moz-linear-gradient( ' . $bg_grad_direction . ', ' . $btn_background . ' 0%, ' . $btn_background_1 . ' 100% ) !important;
    				background: -webkit-linear-gradient( ' . $bg_grad_direction . ', ' . $btn_background . ' 0%, ' . $btn_background_1 . ' 100% ) !important;';
	}  elseif ( !empty( $btn_background ) && !empty($btn_background_2) && empty($btn_background_1) ) {
		$btn_bg = '	background: ' . $btn_background . ' !important;
    				background: linear-gradient( ' . $bg_grad_direction . ', ' . $btn_background . ' 0%, ' . $btn_background_2 . ' 100% ) !important;
    				background: -moz-linear-gradient( ' . $bg_grad_direction . ', ' . $btn_background . ' 0%, ' . $btn_background_2 . ' 100% ) !important;
    				background: -webkit-linear-gradient( ' . $bg_grad_direction . ', ' . $btn_background . ' 0%, ' . $btn_background_2 . ' 100% ) !important;';
	} elseif ( !empty( $btn_background ) && empty($btn_background_2) && empty($btn_background_1) ) {
		$btn_bg = '	background: ' . $btn_background . ' !important;';
	}

	$btn_background_hover 		= $btn_background_hover ? $btn_background_hover : '';
	$btn_background_hover_1 	= $btn_background_hover_1 ?  $btn_background_hover_1 : '';
	$btn_background_hover_2 	= $btn_background_hover_2 ?  $btn_background_hover_2 : '';
	$bg_hover_grad_direction 	= $bg_hover_grad_direction ?  $bg_hover_grad_direction : '90deg';

	if ( !empty( $btn_background_hover ) &&  !empty( $btn_background_hover_1 ) && !empty($btn_background_hover_2) ) {
		$btn_bg_hover = '	background: ' . $btn_background_hover . ' !important;
		background: linear-gradient( ' . $bg_hover_grad_direction . ', ' . $btn_background_hover . ' 0%, ' . $btn_background_hover_1 . ' 50%, ' . $btn_background_hover_2 . ' 100% ) !important;
		background: -moz-linear-gradient( ' . $bg_hover_grad_direction . ', ' . $btn_background_hover . ' 0%, ' . $btn_background_hover_1 . ' 50%, ' . $btn_background_hover_2 . ' 100% ) !important;
		background: -webkit-linear-gradient( ' . $bg_hover_grad_direction . ', ' . $btn_background_hover . ' 0%, ' . $btn_background_hover_1 . ' 50%, ' . $btn_background_hover_2 . ' 100% ) !important;';
	} elseif ( !empty( $btn_background_hover ) && !empty($btn_background_hover_1) && empty($btn_background_hover_2) ) {
		$btn_bg_hover = '	background: ' . $btn_background_hover . ' !important;
		background: linear-gradient( ' . $bg_hover_grad_direction . ', ' . $btn_background_hover . ' 0%, ' . $btn_background_hover_1 . ' 100% ) !important;
		background: -moz-linear-gradient( ' . $bg_hover_grad_direction . ', ' . $btn_background_hover . ' 0%, ' . $btn_background_hover_1 . ' 100% ) !important;
		background: -webkit-linear-gradient( ' . $bg_hover_grad_direction . ', ' . $btn_background_hover . ' 0%, ' . $btn_background_hover_1 . ' 100% ) !important;';
	}  elseif ( !empty( $btn_background_hover ) && !empty($btn_background_hover_2) && empty($btn_background_hover_1) ) {
		$btn_bg_hover = '	background: ' . $btn_background_hover . ' !important;
		background: linear-gradient( ' . $bg_hover_grad_direction . ', ' . $btn_background_hover . ' 0%, ' . $btn_background_hover_2 . ' 100% ) !important;
		background: -moz-linear-gradient( ' . $bg_hover_grad_direction . ', ' . $btn_background_hover . ' 0%, ' . $btn_background_hover_2 . ' 100% ) !important;
		background: -webkit-linear-gradient( ' . $bg_hover_grad_direction . ', ' . $btn_background_hover . ' 0%, ' . $btn_background_hover_2 . ' 100% ) !important;';
	} elseif ( !empty( $btn_background_hover ) && empty($btn_background_hover_2) && empty($btn_background_hover_1) ) {
		$btn_bg_hover = '	background: ' . $btn_background_hover . ' !important;';
	}
	
	$predefined 			= $botton_skin == 'predefined' ? $color : '';
	$custom					= $botton_skin == 'custom' ? $btn_color . $btn_border_color . $btn_bg . $btn_border_radius_left . $btn_border_radius_bottom . $btn_border_radius_right . $btn_border_radius_top . $btn_border_width_left . $btn_border_width_bottom . $btn_border_width_right . $btn_border_width_top : '';
	$custom_hover			= $botton_skin == 'custom' ? $btn_border_color_hover . $btn_bg_hover : '';

	if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
		$btn_text_font			= isset( $btn_text_font ) ? $btn_text_font : '';
		$btn_font_data			= getFontsData( $btn_text_font );
		$btn_font_inline_style	= googleFontsStyles( $btn_font_data );
		$btn_font_inline_style2	= googleFontsStyles( $btn_font_data );
		$btn_style				= $btn_text_font ? $btn_font_inline_style : '' ;
		$border_style			= $btn_text_font ? $btn_font_inline_style2 : '' ;
		enqueueGoogleFonts( $btn_font_data );
	}
	$btn_font_size			= $btn_font_size ?' font-size: ' . $btn_font_size . ' !important;' : '';
	$btn_fontweight			= $btn_fontweight ?' font-weight: ' . $btn_fontweight . ' !important;' : '';
	$btn_letterspacing		= $btn_letterspacing ? 'letter-spacing: ' . $btn_letterspacing . ' !important;' : '';
	$btn_pad_top			= $btn_pad_top ? ' padding-top: ' . $btn_pad_top . ';' : '';
	$btn_pad_right			= $btn_pad_right ? ' padding-right: ' . $btn_pad_right . ';' : '';
	$btn_pad_bottom			= $btn_pad_bottom ? ' padding-bottom: ' . $btn_pad_bottom . ';' : '';
	$btn_pad_left			= $btn_pad_left ? ' padding-left: ' . $btn_pad_left . ';' : '';
	$padding				= $btn_pad_top . $btn_pad_right . $btn_pad_bottom . $btn_pad_left;
	$btn_marg_top			= $btn_marg_top ? ' margin-top: ' . $btn_marg_top . ';' : '';
	$btn_marg_right			= $btn_marg_right ? ' margin-right: ' . $btn_marg_right . ';' : '';
	$btn_marg_bottom		= $btn_marg_bottom ? ' margin-bottom: ' . $btn_marg_bottom . ';' : '';
	$btn_marg_left			= $btn_marg_left ? ' margin-left: ' . $btn_marg_left . ';' : '';
	$margin					= $btn_marg_top . $btn_marg_right . $btn_marg_bottom . $btn_marg_left;

	$url = $url ? $url : '';
	$master_class= '';
	if ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
		$master_class = implode(' ', apply_filters( 'kc-el-class', $atts ));
		$master_class .= ' wn-kc-elm';
	}
	$shadow_left	= ! empty( $shadow_left ) && isset( $shadow_left ) ? deep_pixel_separate( $shadow_left ) : '0';
	$shadow_top		= ! empty( $shadow_top ) && isset( $shadow_top ) ? deep_pixel_separate( $shadow_top ) : '0';
	$shadow_blur	= ! empty( $shadow_blur ) && isset( $shadow_blur ) ? deep_pixel_separate( $shadow_blur ) : '0';
	$shadow_spread	= ! empty( $shadow_spread ) && isset( $shadow_spread ) ? deep_pixel_separate( $shadow_spread ) : '0';
	$shadow_color	= ! empty( $shadow_color ) && isset( $shadow_color ) ? $shadow_color : '';
	$box_shadow = ( isset( $shadow_left ) && isset( $shadow_top ) && isset( $shadow_blur ) && isset( $shadow_spread ) && isset( $shadow_color ) ) ? '#wrap a.button[data-btnid="' . $uniqid . '"] { box-shadow:' . $shadow_left . ' ' . $shadow_top . ' ' . $shadow_blur . ' ' . $shadow_spread . ' ' . $shadow_color . ' ' . $shadow_status . '; }' : '' ;
	$border = ( 'true' == $border ) ? 'bordered-bot' : '';
	$icon_str = !empty($icon)? '<i class="'.$icon.'"></i>' : '';
 	$out = '<a href="'. $url . '" data-btnid="' . $uniqid . '" class="button ' .$master_class . ' ' .$predefined.' '.$shape.' '.$size.' '.$border.' '.$set_arrow.' ' . $shortcodeclass . '" ' . $shortcodeid . ' target="'.$target.'"><span>'. $icon_str . $btn_content . '</span></a>';
		 
	$style .= $btn_style || $border_style ? 'a.button[data-btnid="' . $uniqid . '"] { ' . $btn_style . $border_style . ' }' : '';
	$style .= $btn_icon_color ? 'a.button[data-btnid="' . $uniqid . '"] i { ' . $btn_icon_color . ' }' : '';
	$style .= $btn_icon_color_hover ? 'a.button[data-btnid="' . $uniqid . '"]:hover i { ' . $btn_icon_color_hover . ' }' : '';
	$style .= $btn_font_size || $btn_fontweight || $btn_letterspacing || $padding || $margin || $custom ? 'a.button[data-btnid="' . $uniqid . '"] { ' . $btn_font_size . $btn_fontweight . $btn_letterspacing . $padding . $margin . $custom . ' }' : '';
	$style .= $btn_color_hover ? 'a.button[data-btnid="' . $uniqid . '"]:hover span { ' . $btn_color_hover . ' }' : '';
	$style .= $custom_hover ? 'a.button[data-btnid="' . $uniqid . '"]:hover { ' . $custom_hover . ' }' : '';
	if ( !empty( $btn_background_hover ) || !empty( $btn_background_hover_1 ) || !empty( $btn_background_hover_2 ) ) {
		$style .= 'a.button[data-btnid="' . $uniqid . '"]:hover:after { display: none; }';
	}
	if ( !empty ( $box_shadow ) ) {
		$style .= $box_shadow;
	}
	deep_save_dyn_styles( $style );
 	return $out;
 }
 add_shortcode('button', 'deep_buttons');
