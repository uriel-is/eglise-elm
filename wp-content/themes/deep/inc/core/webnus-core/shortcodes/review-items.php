<?php
function deep_review_items( $atts, $content = null ) {
	extract(shortcode_atts( array(
		
	), $atts ));

?>	
		
	<div class="wn-review-items">
		<?php echo do_shortcode('[review]'); ?>
	</div>

<?php
}
add_shortcode( 'review-items','deep_review_items' );