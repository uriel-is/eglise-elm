<?php
$deep_options = deep_options();
echo '<section class="footer-subscribe-bar colorb"><div class="container"><div class="row">';
$type = isset($deep_options['deep_footer_subscribe_type']) ? $deep_options['deep_footer_subscribe_type'] : 'FeedBurner' ;
$deep_options['deep_footer_feedburner_id'] = isset($deep_options['deep_footer_feedburner_id']) ? $deep_options['deep_footer_feedburner_id'] : '' ;
$deep_options['deep_footer_mailchimp_url'] = isset($deep_options['deep_footer_mailchimp_url']) ? $deep_options['deep_footer_mailchimp_url'] : '' ;
$deep_options['deep_footer_subscribe_text'] = isset($deep_options['deep_footer_subscribe_text']) ? $deep_options['deep_footer_subscribe_text'] : '' ;
$feedburner_id = esc_html($deep_options['deep_footer_feedburner_id']);
$mailchimp_url = esc_url($deep_options['deep_footer_mailchimp_url']);
$subscribe_text = esc_html($deep_options['deep_footer_subscribe_text']);
if($type =='FeedBurner'){ 
	$email_name='email';
	echo '<form class="footer-subscribe-form" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onSubmit="window.open(\'http://feedburner.google.com/fb/a/mailverify?uri='.$feedburner_id.'\', \'popupwindow\', \'scrollbars=yes,width=550,height=520\');return true"><input type="hidden" value="'.$feedburner_id.'" name="uri"/><input type="hidden" name="loc" value="en_US"/>';
}else{ 
	$email_name='MERGE0';
	echo '<form class="footer-subscribe-form" action="'.$mailchimp_url.'" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">';
}
echo '
	<div class="footer-subscribe-text col-sm-8">
		<h6>'.esc_html__("Subscribe To Our Newsletter",'deep').'<span></span></h6>
		<p>'.$subscribe_text.'</p>
	</div>
	<div class="right-section col-sm-4">
	<div class="subscribe-boxer">
		<input placeholder="'.esc_html__('Enter Your Email','deep').'" class="footer-subscribe-email" type="text" name="'.$email_name.'"/>
		<button class="footer-subscribe-submit" type="submit">'.esc_html__('Join ','deep').'</button>
	</div>
	</div>
	</form></div></div></section>';
?>