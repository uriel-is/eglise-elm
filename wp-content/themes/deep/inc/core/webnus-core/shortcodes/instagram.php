<?php
function deep_instagram($atts, $content = null) {
	extract(shortcode_atts(array(

		'type'				 => 'default',				
		'token'			     => '',
		'insta_post_number'	 => '',	
		'shortcodeclass' 	 => '',
		'shortcodeid' 	 	 => '',

	), $atts));

	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

	if ( empty( $type ) ) $type = 'default';		
	$limit				= !empty($insta_post_number) ? $insta_post_number : '9';
	
	$image_count = 0;

	if ( $token ) {
		$img_data = deep_theme_instagram($token);
		$images = json_decode($img_data['body']);	
		?>

		<div class="instagram-feed <?php echo esc_attr( $type ); ?>  <?php echo esc_attr( $shortcodeclass ); ?>" <?php echo esc_attr( $shortcodeid ); ?>>
			<div class="instagram-wrap">				
			<?php

			switch ( $type ) :
				case 'default':	
					echo '<ul>';
					foreach($images->data as $content) {
						$image_count++;																														
						
						echo '<li><a href="'. esc_url( $content->permalink ) .'"><img src="' . esc_url( $content->media_url ) .'"/></a></li>';																						

						if ( $image_count >= $limit) {
							break;
						}
							
					}
					echo '</ul>';
					
				break;

				case 'carousel':																															
					echo '<div class="owl-carousel-instagram owl-carousel owl-theme">';							
						foreach($images->data as $content) {
							$image_count++;																														
							$username = $content->username;
							echo '<li><a href="'. esc_url( $content->permalink ) .'"><img src="' . esc_url( $content->media_url ) .'"/></a></li>';																						

							if ( $image_count >= $limit) {
								break;
							}
								
						}																
					echo '</div>';																						
					echo '<div class="instagram-text"><i class="wn-fab wn-fa-instagram"></i> Follow us <a href="http://instagram.com/' . $username . '">@' . $username .  '</a></div>';									
				break;

				case 'grid':	
					echo '<ul>';							
					foreach($images->data as $content) {
						$image_count++;																														
						
						echo '<li><a href="'. esc_url( $content->permalink ) .'"><img src="' . esc_url( $content->media_url ) .'"/></a></li>';																						

						if ( $image_count >= $limit) {
							break;
						}
							
					}
					echo '</ul>';										
				break;

			endswitch;	
			
			?>

				<div class="clear"></div>
			</div>
		</div>

		<?php
	
	}

}
add_shortcode('deep-instagram', 'deep_instagram');