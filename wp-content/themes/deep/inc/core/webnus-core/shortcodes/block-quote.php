<?php
function deep_block_quote( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'type'					=> '1',
		'background_image'		=> '',
		'background_image_alt'	=> '',
		'block_content'			=> '',
		'author_image'			=> '',
		'author_image_alt'		=> '',
		'author_name'			=> '',
		'shortcodeclass' 		=> '',
		'shortcodeid' 	 		=> '',

	), $atts ) );

	// Class & ID 
	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

	$background_image_id = $background_image;
	
	if ( is_numeric( $background_image ) ) {
		$background_image = wp_get_attachment_url( $background_image );
		if( !empty( $background_image ) ) {
			if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
				require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
			}
			$image = new Wn_Img_Maniuplate; // instance from settor class
			$background_image = $image->m_image( $background_image_id, $background_image , '600' , '600' ); // set required and get result
		}
	}

	if ( is_numeric( $author_image ) ) {
		$author_image_url = wp_get_attachment_url( $author_image ); 
	}
	
	if( !empty( $author_image_url ) ) {
		
		// if main class not exist get it
		if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
			require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
		}

		$image = new Wn_Img_Maniuplate; // instance from settor class
		$author_image_url_1 = $image->m_image( $author_image, $author_image_url , '50' , '50' ); // set required and get result
		$author_image_url_2 = $image->m_image( $author_image, $author_image_url , '90' , '90' ); // set required and get result
	}

	$type					= $type ? $type : '' ;
	$block_content			= $block_content ? '<p class="content">' . $block_content . '</p>' : '' ;
	$author_name			= $author_name ? '<p class="author-name">' . $author_name . '</p>' : '' ;
	$background_image_alt	= $background_image_alt ? $background_image_alt : '' ;
	$author_image_alt		= $author_image_alt ? $author_image_alt : '' ;
	$background_image		= $background_image ? '<img src="' . $background_image . '" alt="' . $background_image_alt . '">' : '' ;
	$author_image_url_1		= ! empty( $author_image_url_1 ) ? '<img src="' . $author_image_url_1 . '" alt="' . $author_image_alt . '">' : '' ;
	$author_image_url_2		= ! empty( $author_image_url_2 ) ? '<img src="' . $author_image_url_2 . '" alt="' . $author_image_alt . '">' : '' ;
	$author_box 			= ( !empty( $author_image_url_1 ) && !empty( $author_name ) ) ? '<div class="authorbox">' . $author_image_url_1 . $author_name . '</div>' : '';

	if ( $type == '1' ) {

		$out = '
			<div class="wn-block-quote wn-block-quote-' . $type . ' ' . $shortcodeclass . '"  ' . $shortcodeid . ' >
				<div class="block-quote-content-wrap">
					<div class="image-wrap">' . $background_image . '</div>
					<div class="block-quote-content">
						' . $block_content . $author_box .'
					</div>
				</div>
			</div>';

	} elseif ( $type == '2' ) {
		$out = '
			<div class="wn-block-quote wn-block-quote-' . $type . ' ' . $shortcodeclass . '"  ' . $shortcodeid . ' >
				<div class="wn-block-quote-content colorb">' . $block_content . $author_name . '</div>
				<div class="block-quote-author">' . $author_image_url_2 .'</div>
			</div>';
	}
		
	return $out;
}

add_shortcode( 'block-quote', 'deep_block_quote' );