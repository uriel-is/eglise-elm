<?php
function deep_review_form( $atts, $content = null ) {
	extract(shortcode_atts( array(
		
	), $atts ));

?>	
		
	<div class="wn-deep-review_form-form-sh">
		<?php echo do_shortcode('[review-form]'); ?>
	</div>

<?php
}
add_shortcode( 'wn-review-form','deep_review_form' );