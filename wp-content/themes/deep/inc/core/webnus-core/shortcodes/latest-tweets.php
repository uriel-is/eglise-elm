<?php
function deep_webnus_twitterfeed ( $atts, $content = null ) {

	extract(shortcode_atts(array(
		'title'					=> '',
		'username'				=> '',
		'count' 				=> '1',
		'access_token'			=> '',
		'access_token_secret'	=> '',	
		'consumer_key'			=> '',	
		'consumer_secret'		=> '',	
		'background_image'		=> '',
		'shortcodeclass' 		=> '',
		'shortcodeid' 	 		=> '',	
	), $atts));

	ob_start();
	
	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

	?>

	<section class="wn-wrap-tweets-carousel <?php echo '' . $shortcodeclass; ?>"  <?php echo $shortcodeid; ?>>
		
		<div class="wn-tweets-carousel">
			<i class="wn-fab wn-fa-twitter colorf"></i>
			<?php
			if ( !class_exists( 'TwitterAPIExchange' ) ) {
				require_once DEEP_CORE_DIR . 'helper-classes/twitter-api.php';
			}

			/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
			$settings = array(
				'oauth_access_token'		=> $access_token,
				'oauth_access_token_secret'	=> $access_token_secret,
				'consumer_key'				=> $consumer_key,
				'consumer_secret'			=> $consumer_secret
			);

			$url			= "https://api.twitter.com/1.1/statuses/user_timeline.json";
			$requestMethod	= "GET";
			$getfield		= "?screen_name=$username&count=$count";
			$twitter		= new TwitterAPIExchange($settings);
			$tweets			= json_decode($twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest(),$assoc = TRUE);

			if( isset( $tweets['errors'][0]['message'] ) && $tweets['errors'][0]['message'] != '' ) :
				echo '
				<div class="wn-twitter-error">
					<h3>' . esc_html__( 'Sorry, there was a problem.', 'deep' ) . '</h3>
					<p>' . esc_html__( 'Twitter returned the following error message:', 'deep' ) . '</p>
					<p><em>' . $tweets['errors'][0]['message'] . '</em></p>
				</div>';

			else :
				if ( $count > 1 ) {
					echo '<div class="tweets-owl-carousel owl-carousel owl-theme">';
				}
				if ( isset( $tweets ) ) {
					foreach( $tweets as $tweet ) :
						
						// Convert attags to twitter profiles in <a> links
						$tweet['text'] = preg_replace("/@([A-Za-z0-9\/\.]*)/", "<a href=\"http://www.twitter.com/$1\">@$1</a>", $tweet['text']);
						// Formatting Twitter’s Date/Time
						$tweet['created_at'] = date("l M j \- g:ia",strtotime($tweet['created_at']));
						
						echo '<p>' . $tweet['text'] . '</p>';
						
					endforeach;

				}

				if ( $count > 1 ) {
					echo '</div>';
				}
				get_template_part( 'inc/templates/social' );
			endif; ?>

		</div>

	</section>

	<?php
	$out = ob_get_contents();
	ob_end_clean();
	$out = str_replace('<p></p>','',$out);
	return $out;
}

add_shortcode( 'twitterfeed', 'deep_webnus_twitterfeed' );