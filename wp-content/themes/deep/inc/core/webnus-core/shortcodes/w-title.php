<?php
function deep_title($atts, $content = null) {
	extract(shortcode_atts(array(
		// general
		'title_text_font'		=> '',
		'subtitle_text_font'	=> '',
		'title'					=> '',
		'subtitle'				=> '',
		'text_align'			=> '',
		'rotate'				=> '',
		'custom_rotate'			=> '',
		'shape_custom_rotate'	=> '',
		'display'				=> '',
		'full_with'				=> '',
		'layer_animation'		=> '',

		// Title
		'title_color_type'		=> 'title-solid-color',
		'title_grad_color_1'	=> '',
		'title_grad_color_2'	=> '',
		'title_grad_color_3'	=> '',
		'title_grad_color_4'	=> '',
		'title_grad_direction'	=> '',
		'title_custom_class'	=> '',
		'title_heading'			=> '',
		'title_theme_fonts'		=> '',
		'title_text_font'		=> '',
		'title_color'			=> '',
		'title_font_size'		=> '',
		'title_line_height'		=> '',
		'title_letter_spacing'	=> '',
		'title_padding_top'		=> '',
		'title_padding_right'	=> '',
		'title_padding_bottom'	=> '',
		'title_padding_left'	=> '',
		'title_margin_top'		=> '',
		'title_margin_right'	=> '',
		'title_margin_bottom'	=> '',
		'title_margin_left'		=> '',
		'title_font_weight'		=> '',
		'title_font_size_tablet'=> '',
		'title_font_size_mob768'=> '',
		'title_font_size_mob480'=> '',
		'display_title' 		=> '',

		// Subtitle
		'sub_title_color_type'		=> 'subtitle-solid-color',
		'sub_title_grad_color_1'	=> '',
		'sub_title_grad_color_2'	=> '',
		'sub_title_grad_color_3'	=> '',
		'sub_title_grad_color_4'	=> '',
		'sub_title_grad_direction'	=> '',
		'subtitle_custom_class'		=> '',
		'subtitle_heading'			=> '',
		'subtitle_theme_fonts'		=> '',
		'subtitle_text_font'		=> '',
		'subtitle_color'			=> '',
		'subtitle_font_size'		=> '',
		'subtitle_line_height'		=> '',
		'subtitle_letter_spacing'	=> '',
		'subtitle_padding_top'		=> '',
		'subtitle_padding_right'	=> '',
		'subtitle_padding_bottom'	=> '',
		'subtitle_padding_left'		=> '',
		'subtitle_margin_top'		=> '',
		'subtitle_margin_right'		=> '',
		'subtitle_margin_bottom'	=> '',
		'subtitle_margin_left'		=> '',
		'subtitle_font_weight'		=> '',
		'subtitle_font_size_tablet' => '',
		'subtitle_font_size_mob768' => '',
		'subtitle_font_size_mob480' => '',
		'display_sub_title'			=> '',

		//shape
		'shape'						=> '',

		// Class & ID 
		'shortcodeclass' 			=> '',
		'shortcodeid' 	 			=> '',

	), $atts));
	
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

	if ( empty ( $title_color_type ) ) $title_color_type = 'title-solid-color';
	if ( empty ( $sub_title_color_type ) ) $sub_title_color_type = 'subtitle-solid-color';
	// General Variables
	static $uniqid = 0;
	$uniqid++;
	$main_title_style 	= $live_page_builders_css = $main_subtitle_style = $master_class = $shape_style = $style = '';
	$title_heading		= isset( $title_heading ) ? $title_heading : 'h1' ;
	$subtitle_heading	= isset( $subtitle_heading ) ? $subtitle_heading : 'h1' ;
	$text_align			= $text_align ? 'text-align: ' . $text_align . ';' : 'text-align: left;' ;
	$display			= $display ? '.wn-deep-title-wrap[data-id="' . $uniqid . '"] { display: ' . $display . ' ; }' : '';
	$style 				.= $full_with == 'yes' ? '.wn-deep-title-wrap[data-id="' . $uniqid . '"] .wn-deep-title {display: block; }' : '' ;

	// Class & ID 
	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

	// Title Color
	if ( $title_color_type == 'title-solid-color' ) {

		$title_color = $title_color ? 'color: ' . $title_color . ';' : '' ;
			
		// live editor
		$live_page_builders_css .= '.wn-deep-title-wrap[data-id="' . $uniqid . '"] .wn-deep-innertitle { '. $title_color .' }';

	} else {
		
		$title_grad_direction = $title_grad_direction ? $title_grad_direction : '';
		$title_gradient = deep_gradient( $title_grad_color_1, $title_grad_color_2, $title_grad_color_3, $title_grad_color_4, $title_grad_direction );
		
		if ( ! empty( $title_gradient ) ) {

			deep_save_dyn_styles('
				.wn-deep-title-wrap[data-id="' . $uniqid . '"] .wn-deep-innertitle {
					' . $title_gradient . '
					-webkit-background-clip: text !important;
					-webkit-text-fill-color: transparent;
				}
			');
			// live editor
			$live_page_builders_css .= '.wn-deep-title-wrap[data-id="' . $uniqid . '"] .wn-deep-innertitle { ' . $title_gradient . ' -webkit-background-clip: text !important; -webkit-text-fill-color: transparent; }';

		} 
	}
	
	// Subtitle Color
	if ( $sub_title_color_type == 'subtitle-solid-color' ) {

		$subtitle_color = $subtitle_color ? 'color: ' . $subtitle_color . ';' : '' ;
		if ( !empty ( $subtitle_color) ) {
			deep_save_dyn_styles('
				.wn-deep-title-wrap[data-id="' . $uniqid . '"] .wn-deep-subtitle { 
					'. $subtitle_color .'
				}
			');
			// live editor
			$live_page_builders_css .= '.wn-deep-title-wrap[data-id="' . $uniqid . '"] .wn-deep-subtitle { '. $subtitle_color .' }';
		}

	} else {

		$sub_title_grad_direction = $sub_title_grad_direction ? $sub_title_grad_direction : '';
		$sub_title_gradient = deep_gradient( $sub_title_grad_color_1, $sub_title_grad_color_2, $sub_title_grad_color_3, $sub_title_grad_color_4, $sub_title_grad_direction );

		if ( ! empty( $sub_title_gradient ) ) {

			deep_save_dyn_styles('
				.wn-deep-title-wrap[data-id="' . $uniqid . '"] .wn-deep-subtitle {
					' . $sub_title_gradient . '
					-webkit-background-clip: text !important;
					-webkit-text-fill-color: transparent;
				}
			');
			// live editor
			$live_page_builders_css .= '.wn-deep-title-wrap[data-id="' . $uniqid . '"] .wn-deep-subtitle { ' . $sub_title_gradient . ' -webkit-background-clip: text !important; -webkit-text-fill-color: transparent; }';

		} 
	}

		// Titles Variables
		$title_font_size			= $title_font_size ? 'font-size: ' . deep_pixel_separate( $title_font_size ) . ';' : '' ;
		$title_line_height			= $title_line_height ? 'line-height: ' . $title_line_height . ';' : '' ;
		$title_letter_spacing		= $title_letter_spacing ? 'letter-spacing: ' . deep_pixel_separate( $title_letter_spacing ) . ';' : '' ;
		$title_padding_top			= $title_padding_top ? deep_pixel_separate( $title_padding_top ) : '0' ;
		$title_padding_right		= $title_padding_right ? deep_pixel_separate( $title_padding_right ) : '0' ;
		$title_padding_bottom		= $title_padding_bottom ? deep_pixel_separate( $title_padding_bottom ) : '0' ;
		$title_padding_left			= $title_padding_left ? deep_pixel_separate( $title_padding_left ) : '0' ;
		$title_margin_top			= $title_margin_top ? deep_pixel_separate( $title_margin_top ) : '0' ;
		$title_margin_right			= $title_margin_right ? deep_pixel_separate( $title_margin_right ) : '0' ;
		$title_margin_bottom		= $title_margin_bottom ? deep_pixel_separate( $title_margin_bottom ) : '0' ;
		$title_margin_left			= $title_margin_left ? deep_pixel_separate( $title_margin_left ) : '0' ;
		$title_font_weight			= $title_font_weight ? 'font-weight: ' . $title_font_weight . ' !important;' : '' ;

		// Subtitles Variables
		$subtitle_font_size			= $subtitle_font_size ? 'font-size: ' . deep_pixel_separate( $subtitle_font_size ) . ';' : '' ;
		$subtitle_line_height		= $subtitle_line_height ? 'line-height: ' . $subtitle_line_height . ';' : '' ;
		$subtitle_letter_spacing	= $subtitle_letter_spacing ? 'letter-spacing: ' . deep_pixel_separate( $subtitle_letter_spacing ) . ';' : '' ;
		$subtitle_padding_top		= $subtitle_padding_top ? deep_pixel_separate( $subtitle_padding_top ) : '0' ;
		$subtitle_padding_right		= $subtitle_padding_right ? deep_pixel_separate( $subtitle_padding_right ) : '0' ;
		$subtitle_padding_bottom	= $subtitle_padding_bottom ? deep_pixel_separate( $subtitle_padding_bottom ) : '0' ;
		$subtitle_padding_left		= $subtitle_padding_left ? deep_pixel_separate( $subtitle_padding_left ) : '0' ;
		$subtitle_margin_top		= $subtitle_margin_top ? deep_pixel_separate( $subtitle_margin_top ) : '0' ;
		$subtitle_margin_right		= $subtitle_margin_right ? deep_pixel_separate( $subtitle_margin_right ) : '0' ;
		$subtitle_margin_bottom		= $subtitle_margin_bottom ? deep_pixel_separate( $subtitle_margin_bottom ) : '0' ;
		$subtitle_margin_left		= $subtitle_margin_left ? deep_pixel_separate( $subtitle_margin_left ) : '0' ;
		$subtitle_font_weight		= $subtitle_font_weight ? 'font-weight: ' . $subtitle_font_weight . ' !important;' : '' ;

		// Padding
		$title_padding = 'padding: ' . $title_padding_top . ' ' . $title_padding_right . ' ' . $title_padding_bottom . ' ' . $title_padding_left . ';';
		$subtitle_padding = 'padding: ' . $subtitle_padding_top . ' ' . $subtitle_padding_right . ' ' . $subtitle_padding_bottom . ' ' . $subtitle_padding_left . ';';

		// Margin
		$title_margin = 'margin: ' . $title_margin_top . ' ' . $title_margin_right . ' ' . $title_margin_bottom . ' ' . $title_margin_left . ';';
		$subtitle_margin = 'margin: ' . $subtitle_margin_top . ' ' . $subtitle_margin_right . ' ' . $subtitle_margin_bottom . ' ' . $subtitle_margin_left . ';';

		$main_title_style .= $title_color . $title_font_weight . $title_padding . $title_margin . $title_font_size . $title_line_height . $title_letter_spacing . $text_align ;
		$main_subtitle_style .= $subtitle_font_weight . $subtitle_padding . $subtitle_margin . $subtitle_font_size . $subtitle_line_height . $subtitle_letter_spacing . $text_align ;

		// check for plugin using plugin name
	if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
		
		// Title google fonts
		$title_text_font			= isset( $title_text_font ) ? $title_text_font : '';
		$title_font_data			= getFontsData( $title_text_font );
		$title_font_inline_style	= googleFontsStyles( $title_font_data );   
		$title_style				= $title_text_font ? $title_font_inline_style : '' ;
		enqueueGoogleFonts( $title_font_data );
		$main_title_style .= $title_style;

		// Subtitle google fonts
		$subtitle_text_font			= isset( $subtitle_text_font ) ? $subtitle_text_font : '';
		$subtitle_font_data			= getFontsData( $subtitle_text_font );
		$subtitle_font_inline_style	= googleFontsStyles( $subtitle_font_data );   
		$subtitle_style				= $subtitle_text_font ? $subtitle_font_inline_style : '' ;
		enqueueGoogleFonts( $subtitle_font_data );
		$main_subtitle_style .= $subtitle_style;

		// Get Shape
		$shape_data	= array();
		$shape			= (array) vc_param_group_parse_atts( $shape );
		foreach ( $shape as $data ) :
			$new_line 								= $data;
			$new_line['shape_width']				= ! empty( $data['shape_width'] ) ? 'width: ' . deep_pixel_separate( $data['shape_width'] ) . ';' : '';
			$new_line['shape_height']				= ! empty( $data['shape_height'] ) ? 'height: ' . deep_pixel_separate( $data['shape_height'] ) . ';' : '';
			$new_line['shape_radius']				= ! empty( $data['shape_radius'] ) ? 'border-radius: ' . deep_pixel_separate( $data['shape_radius'] ) . ';'  : '';
			$new_line['shape_background_color']		= ! empty( $data['shape_background_color'] ) ? $data['shape_background_color'] : '';
			$new_line['shape_background_color_2']	= ! empty( $data['shape_background_color_2'] ) ? $data['shape_background_color_2'] : '';
			$new_line['shape_background_color_3']	= ! empty( $data['shape_background_color_3'] ) ? $data['shape_background_color_3'] : '';
			$new_line['shape_background_color_4']	= ! empty( $data['shape_background_color_4'] ) ? $data['shape_background_color_4'] : '';			
			$new_line['shape_gradient_direction']	= ! empty( $data['shape_gradient_direction'] ) ? $data['shape_gradient_direction'] : '';			
			$new_line['shape_background_image'] 	= ( ! empty( $data['shape_background_image'] ) && is_numeric( $data['shape_background_image'] ) ) ? wp_get_attachment_url( $data['shape_background_image'] ) : '' ;
			$new_line['shape_top_position']			= isset( $data['shape_top_position'] ) ? 'top: ' . $data['shape_top_position'] . ';' : '';
			$new_line['shape_right_position']		= isset( $data['shape_right_position'] ) ? 'right: ' . $data['shape_right_position'] . ';' : '';
			$new_line['shape_bottom_position']		= isset( $data['shape_bottom_position'] ) ? 'bottom: ' . $data['shape_bottom_position'] . ';' : '';
			$new_line['shape_left_position']		= isset( $data['shape_left_position'] ) ? 'left: ' . $data['shape_left_position'] . ';' : '';
			$new_line['shape_rotate']				= isset( $data['shape_rotate'] ) ?  $data['shape_rotate'] : 'none';
			$new_line['shape_custom_rotate']		= isset( $data['shape_custom_rotate'] ) ?  $data['shape_custom_rotate'] : '';
			$shape_data[]							= $new_line;
		endforeach;

	} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) && (is_array($shape) || is_object($shape)) ) {
		if ( $atts['shape'] ) :
			foreach ( $atts['shape'] as $key => $item ) :
				$new_line 								= $item;
				$new_line->shape_width					= ! empty( $item->shape_width ) ? 'width: ' . deep_pixel_separate( $item->shape_width ) . ';' : '';
				$new_line->shape_height					= ! empty( $item->shape_height ) ? 'height: ' . deep_pixel_separate( $item->shape_height ) . ';' : '';
				$new_line->shape_radius					= ! empty( $item->shape_radius ) ? 'border-radius: ' . deep_pixel_separate( $item->shape_radius ) . ';'  : '';
				$new_line->shape_background_color		= ! empty( $item->shape_background_color ) ? $item->shape_background_color : '';
				$new_line->shape_background_color_2		= ! empty( $item->shape_background_color_2 ) ? $item->shape_background_color_2 : '';
				$new_line->shape_background_color_3		= ! empty( $item->shape_background_color_3 ) ? $item->shape_background_color_3 : '';
				$new_line->shape_background_color_4		= ! empty( $item->shape_background_color_4 ) ? $item->shape_background_color_4 : '';			
				$new_line->shape_gradient_direction		= ! empty( $item->shape_gradient_direction ) ? $item->shape_gradient_direction : '';	
				$new_line->shape_background_image 		= ! empty( $item->shape_background_image ) && is_numeric( $item->shape_background_image ) ? wp_get_attachment_url( $item->shape_background_image ) : '';
				$new_line->shape_top_position			= isset( $item->shape_top_position ) ? 'top: ' . $item->shape_top_position . ';' : '';
				$new_line->shape_right_position			= isset( $item->shape_right_position ) ? 'right: ' . $item->shape_right_position . ';' : '';
				$new_line->shape_bottom_position		= isset( $item->shape_bottom_position ) ? 'bottom: ' . $item->shape_bottom_position . ';' : '';
				$new_line->shape_left_position			= isset( $item->shape_left_position ) ? 'left: ' . $item->shape_left_position . ';' : '';
				$new_line->shape_rotate					= isset( $item->shape_rotate ) ?  $item->shape_rotate : 'none';
				$new_line->shape_custom_rotate			= isset( $item->shape_custom_rotate ) ?  $item->shape_custom_rotate : '';
				$shape_data[]							= $new_line;
			endforeach;
		endif;
	}

	// Generate Shape
	$shape = '';
	$shape_count = 0;

	if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

		foreach ( $shape_data as $line ) :
			
			if ( $line['shape_rotate'] != 'custom' && $line['shape_rotate'] != 'none' ) {
				$shape_rotate_value		='transform: rotate( ' . $line['shape_rotate'] . ' );';
			} elseif ( $line['shape_rotate'] == 'custom' ) {
				$shape_rotate_value		='transform: rotate( ' . $line['shape_custom_rotate'] . ' );';
			} else {
				$shape_rotate_value = '';
			}
			
			// Background image
			$line['shape_background_image'] = ! empty( $line['shape_background_image'] ) ? 'background-image: url( ' . $line['shape_background_image'] . ' );' : '';
			
			$shape 			.= '<span class="wn-deep-title-shape after shape-coutn-' . $shape_count . '"></span>';
			$shape_gradient	= deep_gradient( $line['shape_background_color'], $line['shape_background_color_2'], $line['shape_background_color_3'], $line['shape_background_color_4'], $line['shape_gradient_direction'] );
			$shape_style	= $shape_rotate_value . $shape_gradient . $line['shape_width'] . $line['shape_height'] . $line['shape_radius'] . $line['shape_background_image'] . $line['shape_top_position'] . $line['shape_right_position'] . $line['shape_bottom_position'] . $line['shape_left_position'];

			if ( ! empty( $shape_style ) ) {

				deep_save_dyn_styles( '
					.wn-deep-title-wrap[data-id="' . $uniqid . '"] .wn-deep-title-shape.shape-coutn-' . $shape_count . ' {
						' . $shape_style . '
					}
				' );
				// live editor
				$live_page_builders_css .= '.wn-deep-title-wrap[data-id="' . $uniqid . '"] .wn-deep-title-shape.shape-coutn-' . $shape_count . ' { ' . $shape_style . ' }';

				$shape_count++;

			} 

		endforeach;

	} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) && ! empty( $shape_data ) ) {
		//print_r($shape_data);
		foreach ( $shape_data as $key => $line ) :
			if ( $line->shape_rotate != 'custom' && $line->shape_rotate != 'none' ) {
				$shape_rotate_value		='transform: rotate( ' . $line->shape_rotate . ' );';
			} elseif ( $line->shape_rotate == 'custom' ) {
				$shape_rotate_value		='transform: rotate( ' . $line->shape_custom_rotate . ' );';
			} else {
				$shape_rotate_value = '';
			}

			// Background image
			$line->shape_background_image = isset( $line->shape_background_image ) ? 'background-image: url( ' . $line->shape_background_image . ' );' : '';
			$shape .= '<span class="wn-deep-title-shape after shape-coutn-' . $shape_count . '"></span>';
			$shape_gradient	= deep_gradient( $line->shape_background_color, $line->shape_background_color_2, $line->shape_background_color_3, $line->shape_background_color_4, $line->shape_gradient_direction );
			$shape_style = $shape_gradient . $shape_rotate_value . $line->shape_width . $line->shape_height . $line->shape_radius . $line->shape_background_color . $line->shape_background_image . $line->shape_top_position . $line->shape_right_position . $line->shape_bottom_position . $line->shape_left_position;
			if ( ! empty( $shape_style ) ) {

				deep_save_dyn_styles( '
					.wn-deep-title-wrap[data-id="' . $uniqid . '"] .wn-deep-title-shape.shape-coutn-' . $shape_count . ' {
						' . $shape_style . '
					}
				' );
				// live editor
				$live_page_builders_css .= '.wn-deep-title-wrap[data-id="' . $uniqid . '"] .wn-deep-title-shape.shape-coutn-' . $shape_count . ' { ' . $shape_style . ' }';

				$shape_count++;

			}


		endforeach;
	}
		
	// Rotate
	$rotate				 = $rotate ? $rotate : '' ;
	$custom_rotate		 = $custom_rotate ? $custom_rotate : '' ;
	if ( $rotate != 'custom' ) {
		$rotate_value		= $rotate ? 'transform: rotate( ' . $rotate . ' );' : '' ;
	} elseif ( $rotate = 'custom' && $custom_rotate ) {
		$rotate_value		= $rotate ? 'transform: rotate( ' . $custom_rotate . ' );' : '' ;
	}
	$title_custom_class		= $title_custom_class ? $title_custom_class : '';
	$subtitle_custom_class	= $subtitle_custom_class ? $subtitle_custom_class : '';
	$title				= ! empty( $title ) ? '<' . $title_heading . ' class=" ' . $title_custom_class . ' wn-deep-innertitle">' . $title . '</' . $title_heading . '>' : '' ;
	$subtitle			= ! empty( $subtitle ) ? '<' . $subtitle_heading . ' class=" ' . $subtitle_custom_class . ' wn-deep-subtitle">' . $subtitle . '</' . $subtitle_heading . '>' : '' ;
	if ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
		$master_class .= implode(' ', apply_filters( 'kc-el-class', $atts ));
		$master_class .= ' wn-kc-elm';
	}
	
	// Layer Animation
	$layer_animation = $layer_animation ? $layer_animation : '';

	$out =  '
		<div class="wn-deep-title-wrap ' . $layer_animation  . ' ' . $master_class . ' ' . $shortcodeclass . '"  ' . $shortcodeid . '  data-id="' . $uniqid . '">
			<div class="wn-deep-title">
				' . $shape . $title . $subtitle . '
			</div>
		</div>';

		$style .= ! empty($text_align) ? '#wrap .wn-deep-title-wrap[data-id="' . $uniqid . '"] { ' . $text_align . ' }' : '' ;
		$style .= ! empty($rotate_value) ? '#wrap .wn-deep-title-wrap[data-id="' . $uniqid . '"] { ' . $rotate_value . ' }' : '' ;
		$style .= ! empty( $display_title ) ? '#wrap .wn-deep-title-wrap[data-id="' . $uniqid . '"] .wn-deep-innertitle { display: ' . $display_title . ';}' : '';
		$style .= ! empty( $display_sub_title ) ? '#wrap .wn-deep-title-wrap[data-id="' . $uniqid . '"] .wn-deep-subtitle { display: ' . $display_sub_title . ';}' : '';
		$style .= ! empty( $main_title_style ) ? '#wrap .wn-deep-title-wrap[data-id="' . $uniqid . '"] .wn-deep-innertitle { ' . $main_title_style . ' }' : '' ;
		$style .= ! empty( $main_subtitle_style ) ? '#wrap .wn-deep-title-wrap[data-id="' . $uniqid . '"] .wn-deep-subtitle {' . $main_subtitle_style . '}' : '' ;

	if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
		
		$title_font_size_tablet = $title_font_size_tablet ? 'font-size: ' . deep_pixel_separate( $title_font_size_tablet ) . ';' : '';
		$subtitle_font_size_tablet = $subtitle_font_size_tablet ? 'font-size: ' . deep_pixel_separate( $subtitle_font_size_tablet ) . ';' : '';
		$title_font_size_mob768 = $title_font_size_mob768 ? 'font-size: ' . deep_pixel_separate( $title_font_size_mob768 ) . ';' : '';
		$subtitle_font_size_mob768 = $subtitle_font_size_mob768 ? 'font-size: ' . deep_pixel_separate( $subtitle_font_size_mob768 ) . ';' : '';
		$title_font_size_mob480 = $title_font_size_mob480 ? 'font-size: ' . deep_pixel_separate( $title_font_size_mob480 ) . ';' : '';
		$subtitle_font_size_mob480 = $subtitle_font_size_mob480 ? 'font-size: ' . deep_pixel_separate( $subtitle_font_size_mob480 ) . ';' : '';
		$style .= ! empty( $subtitle_font_size_tablet ) ? '@media (min-width:769px) and (max-width:960px) {#wrap .wn-deep-title-wrap[data-id="' . $uniqid . '"] .wn-deep-subtitle {' . $subtitle_font_size_tablet . '} }' : '';
		$style .= ! empty( $title_font_size_tablet ) ? '@media (min-width:769px) and (max-width:960px) {#wrap .wn-deep-title-wrap[data-id="' . $uniqid . '"] .wn-deep-innertitle {' . $title_font_size_tablet . '} }' : '';
		$style .= ! empty( $title_font_size_mob768 ) ? '@media (min-width:481px) and (max-width:768px) {#wrap .wn-deep-title-wrap[data-id="' . $uniqid . '"] .wn-deep-innertitle {' . $title_font_size_mob768 . '} }' : '';
		$style .= ! empty( $subtitle_font_size_mob768 ) ? '@media (min-width:481px) and (max-width:768px) {#wrap .wn-deep-title-wrap[data-id="' . $uniqid . '"] .wn-deep-subtitle {' . $subtitle_font_size_mob768 . '} }' : '';
		$style .= ! empty( $title_font_size_mob480 ) ? '@media (max-width:480px) {#wrap .wn-deep-title-wrap[data-id="' . $uniqid . '"] .wn-deep-innertitle {' . $title_font_size_mob480 . '} }' : '';
		$style .= ! empty( $subtitle_font_size_mob480 ) ? '@media (max-width:480px) {#wrap .wn-deep-title-wrap[data-id="' . $uniqid . '"] .wn-deep-subtitle {' . $subtitle_font_size_mob480 . '} }' : '';

	}
	deep_save_dyn_styles( $style );
	deep_save_dyn_styles( $display );

	return $out;

}
add_shortcode('deep-title', 'deep_title');