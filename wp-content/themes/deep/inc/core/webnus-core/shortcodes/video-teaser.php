<?php
function deep_video_background ( $atts, $content = null ) {

	extract(shortcode_atts(array(
		'video_type'		=>	'youtube',
		'video_url'			=>	'',
		'thumbnail'			=>	'',
		'width'				=>	'',
		'height'			=>	'500px',
		'thumbnail_size'	=>	'',
		'overlay_color'		=>	'',
		'action_type'		=>	'popup',
		'target_url'		=>	'',
		'shortcodeclass' 	=> '',
		'shortcodeid' 	 	=> '',
	), $atts ));

	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	$thumbnail_id = $thumbnail;
	$live_page_builders_css = '';

	$thumbnail = wp_get_attachment_url( $thumbnail );

	if ( $thumbnail ) {
		if ( ! class_exists( 'Wn_Img_Maniuplate' ) ) {
			require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
		}

		$thumb_array	= explode( 'x', $thumbnail_size ); // get width and height
		$image			= new Wn_Img_Maniuplate; // instance from settor class

		if ( $thumb_array['0'] == '' || $thumb_array['1'] == '' ) {
			$img = $thumbnail;
		} else {
			$img = $image->m_image( $thumbnail_id, $thumbnail , $thumb_array['0'] , $thumb_array['1'] ); // set required and get result
		}

	}

	static $uniqid = 0;
	$uniqid++;
	$live_page_builders_css = '';
	$width			= $width ? $width : '';
	$height			= $height ? $height : '';
	$overlay_color	= $overlay_color ? '.video-background-wrap[data-id="' . $uniqid . '"] a { background: ' . $overlay_color . '; }' : '';
	$thumbnail		= $thumbnail ? '<image src="' . esc_url( $img ) . '">' : '' ;
	if ( $action_type == 'popup' ) {
		$target_url		= $video_url ? '<a href="'. esc_url( $video_url ) .'" class="wn-popup-video"></a>' : '' ;
	} else {
		$target_url		= empty( $target_url ) ? '<a href="'. esc_url( $video_url ) .'"></a>' : '<a href="'. esc_url( $target_url ) .'"></a>' ;
	}
	$video_url		= $video_url ? $video_url : ''; 
	$youtube_id		= strstr( $video_url, 'embed/', false );
	$get_youtube_id	= explode( '/', $youtube_id );

	$internal	= ( $video_type == 'internal') ? '<div class="video-wrap">' . $target_url . '<video class="wn-bg-internal" src="' . $video_url . '" autoplay muted ></video></div>' : '' ;

	// Fetch Carousle Item Loop Variables
	if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

		wp_enqueue_script( 'vc_youtube_iframe_api_js' );
		$class_data = 'class="video-background-wrap vc_row vc_video-bg-container ' . $shortcodeclass . '"  ' . $shortcodeid . '  data-vc-video-bg="' . $video_url . '"';

	} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {

		wp_register_script('kc-youtube-iframe-api', 'https://www.youtube.com/iframe_api', null, KC_VERSION, true );
		wp_enqueue_script('kc-youtube-iframe-api');
		$class_data = 'class="video-background-wrap kc-elm kc_row kc-video-bg" data-vc-video-mute="yes" data-kc-video-bg="' . $video_url . '"';

	}

	$out = '
		<div ' . $class_data . ' data-id="' . $uniqid . '">
			' . $target_url . $internal . $thumbnail  . '
		</div>';

	deep_save_dyn_styles( '
		' . $overlay_color . '
		.video-background-wrap[data-id="' . $uniqid . '"] {
			height: ' . $height . ';
		}
		.video-background-wrap[data-id="' . $uniqid . '"] video {
			width: 100%;
			height: 100%;
		}
		.video-background-wrap.vc_row.vc_video-bg-container {
			margin: 0;
		}
	' );
    // live editor
	$live_page_builders_css .= ' ' . $overlay_color . ' .video-background-wrap[data-id="' . $uniqid . '"] { height: ' . $height . '; } .video-background-wrap[data-id="' . $uniqid . '"] video { width: 100%; height: 100%; } .video-background-wrap.vc_row.vc_video-bg-container { margin: 0; } ';
	if ( ! in_array( 'admin-bar', get_body_class() ) ) {

		if ( ! empty( $live_page_builders_css ) ) {

			$out .= '<style>';
				$out .= $live_page_builders_css;
			$out .= '</style>';

		}

	}
	return $out;
}

add_shortcode('video-background','deep_video_background');
