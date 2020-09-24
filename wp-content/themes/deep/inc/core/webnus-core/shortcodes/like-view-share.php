<?php
function deep_lvs ( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'display_like'		=> 'yes',
		'display_view'		=> 'yes',
		'display_share'		=> 'yes',
		'shortcodeclass' 	=> '',
		'shortcodeid' 	 	=> '',
	), $atts ));
	ob_start();

	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

	if ( $display_like == 'yes' || $display_view == 'yes' || $display_share == 'yes' ) {
		echo '<div class="wn-lvs-shortcode-wrap ' . $shortcodeclass . '"  ' . $shortcodeid . '>';
	}
	
		if ( $display_like == 'yes' ) {
			echo '<div class="wn-like-shortcode">';
			echo get_simple_likes_button( get_the_ID() );
			echo '</div>';
		}

		if ( $display_view == 'yes' ) {
			deep_setViews( get_the_ID() );
			echo '<div class="wn-view-shortcode">';
			echo '<div class="wn-view-shortcode-count">' . deep_getViews( get_the_ID() ) . '</div>';
			echo '<div class="wn-view-shortcode-icon"><i class="icon-basic-eye"></i></div>';
			echo '</div>';
		}

		if ( $display_share == 'yes' ) {
			$dashed_title =  sanitize_title_with_dashes ( get_the_title(get_the_ID()) );
			$post_id = get_the_ID();
			echo '<div class="wn-share-shortcode">';
			echo '<div class="wn-share-shortcode-icon hcolorb hcolorr"><i class="sl-share share"></i></div>';
			echo '<div class="wn-share-shortcode-dropdown">';
			echo '<div class="socialfollow">
					<a target="_blank" class="facebook hcolorf" href="https://www.facebook.com/sharer.php?m2w&s=100&p[url]='. get_the_permalink($post_id).'&p[images][0]='. get_the_post_thumbnail_url( $post_id, 'full' ) .'">' . esc_html__( 'FACEBOOK', 'deep' ) . '</a>
					<a target="_blank" class="twitter hcolorf" href="https://twitter.com/intent/tweet?original_referer='. get_the_permalink($post_id) .'&amp;text='. esc_html( $dashed_title ) .'&amp;tw_p=tweetbutton&amp;url='. get_the_permalink($post_id) .'">' . esc_html__( 'TWITTER', 'deep' ) . '</a>
					<a target="_blank" class="linkedin hcolorf" href="https://www.linkedin.com/shareArticle?mini=true&url='. get_the_permalink($post_id) .'&title='. get_the_title($post_id) .'&source=LinkedIn">' . esc_html__( 'LINKEDIN', 'deep' ) . '</a>
					<a target="_blank" class="email hcolorf" href="mailto:?subject='. esc_html( $dashed_title ) .'&amp;body='. get_the_permalink($post_id) .'">' . esc_html__( 'MAIL', 'deep' ) . '</a>
				  </div>';
			echo '</div>';
			echo '</div>';
		}
	if ( $display_like == 'yes' || $display_view == 'yes' || $display_share == 'yes' ) {
		echo '</div>';
	}

	$out = ob_get_contents();
    ob_end_clean();
	return $out;
}
add_shortcode( 'lvs','deep_lvs' );