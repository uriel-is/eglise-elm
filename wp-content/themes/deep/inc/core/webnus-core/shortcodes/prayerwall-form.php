<?php
function deep_prayer_wall_form( $atts, $content = null ) {
	extract(shortcode_atts( array(
		
	), $atts ));

?>	
		
	<div class="wn-prayer-form-sh">
		<?php echo do_shortcode('[prayer-form]'); ?>
	</div>

<?php
}
add_shortcode( 'prayerwall-form','deep_prayer_wall_form' );