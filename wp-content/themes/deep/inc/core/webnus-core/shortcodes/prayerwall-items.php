<?php
function deep_prayer_wall_items( $atts, $content = null ) {
	extract(shortcode_atts( array(
		
	), $atts ));

?>	
		
	<div class="wn-prayer-items">
		<?php echo do_shortcode('[prayer-wall]'); ?>
	</div>

<div class="row">
	<div class="col-md-12">
		<?php
			$args = array(
				'post_type'   => 'prayerwall',
				'post_status' => 'publish',
			);
			$query = new WP_Query( $args );
			// Pagination 
			if( function_exists( 'wp_pagenavi' ) )
			wp_pagenavi( array( 'query' => $query ) );	
		?>
	</div>
</div>

<?php
}
add_shortcode( 'prayerwall-items','deep_prayer_wall_items' );