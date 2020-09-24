<?php
$deep_options = deep_options();
$user = isset($deep_options['deep_footer_instagram_username']) ? $deep_options['deep_footer_instagram_username'] : '' ;
$acess = isset($deep_options['deep_footer_instagram_access']) ? $deep_options['deep_footer_instagram_access']  : '' ;
$instagramstyle = $deep_options['deep_footer_instagram_style'] = isset($deep_options['deep_footer_instagram_style']) ? $deep_options['deep_footer_instagram_style'] : '' ;
?>
<section class="footer-instagram-bar">
	<div class="container">
		<div class="row">
			<div class="footer-instagram-text">
				<h6>
					<?php bloginfo('name') . esc_html_e(' on Instagram','deep')?>
				</h6>
			</div>
		</div>
	</div>
	<?php echo '<div class="instagram-feed ' . $instagramstyle . '">' ?>
	<?php 
	$base_url =  "https://api.instagram.com/v1/users/self/media/recent?access_token=" . $acess . "&count=1";
	$raw_content = wp_remote_get(esc_url_raw($base_url));
		if(!is_wp_error($raw_content)){
			$raw_content = $raw_content['body'];
			$json_insta = json_decode($raw_content);
			if (isset($json_insta->data[0])){
			   $id = $json_insta->data[0]->id;
			}	
			switch ( $instagramstyle ) :
				case 'default':
						if(!empty($id)){
							$url = "https://api.instagram.com/v1/users/self/media/recent?access_token=" . $acess . "&count=8";
							$raw_content = wp_remote_get(esc_url_raw($url));
							$output = '';
							if(!is_wp_error($raw_content)){
								$output .= '<ul>';	
								$raw_content = $raw_content['body'];
								$json_insta = json_decode($raw_content);
								if (isset($json_insta->data[0])){
								foreach($json_insta->data as $data){		
									$output .= '<li><a href="'.esc_url($data->link).'" target="_blank"><img alt="" src="'.esc_url($data->images->low_resolution->url).'"/></a></li>';	
								}
							}
								$output .= '</ul>';	
								echo '' . $output;
							}
						}
					break;
				case 'carousel':			
						if(!empty($id)){
							$url = "https://api.instagram.com/v1/users/self/media/recent?access_token=" . $acess . "&count=8";
							$raw_content = wp_remote_get(esc_url_raw($url));
                            $output = '';
							if(!is_wp_error($raw_content)){
								$output .= '<div class="instagram-wrap"><div class="owl-carousel-instagram owl-carousel owl-theme" data-instagram_count="1">';	
								$raw_content = $raw_content['body'];
								$json_insta = json_decode($raw_content);
								if (isset($json_insta->data[0])){
								foreach($json_insta->data as $data){		
									$output .= '<a href="'.esc_url($data->link).'" target="_blank"><img alt="" src="'.esc_url($data->images->low_resolution->url).'"/></a>';	
								}
							}
								$output .= '</div></div>';	
								echo '' . $output;
							}
							echo '<div class="instagram-text"><i class="wn-fab wn-fa-instagram"></i> Follow us @<a href="http://instagram.com/' . $user . '">' . $user .  '</a></div>';
						}
					break;
			endswitch;
	}
	else esc_html_e('An error has occoured...','deep');
	?>
		<div class="clear"></div>
	</div>	
</section>