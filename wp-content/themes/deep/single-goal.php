<?php
/******************/
/**  Single Goal
 /******************/
get_header();
$deep_options                            = deep_options();
$goal_features                           = isset( $deep_options['deep_webnus_goal_features'] ) ? $deep_options['deep_webnus_goal_features'] : '';
$deep_options['deep_webnus_donate_form'] = isset( $deep_options['deep_webnus_donate_form'] ) ? $deep_options['deep_webnus_donate_form'] : '';
?>
<section class="container page-content" >
<hr class="vertical-space2">
<?php
$progressbar = $goal_days = $goal_donate = '';
$percentage  = 0;
$received    = rwmb_meta( 'deep_goal_amount_received_meta' ) ? rwmb_meta( 'deep_goal_amount_received_meta' ) : 0;
$amount      = rwmb_meta( 'deep_goal_amount_meta' );
$end         = rwmb_meta( 'deep_goal_end_meta' );
$currency    = isset( $deep_options['deep_webnus_currency'] ) ? $deep_options['deep_webnus_currency'] : '';
if ( $amount ) {
	$percentage  = ( $received / $amount ) * 100;
	$percentage  = round( $percentage );
	$out         = $percentage . '% DONATED OF ' . $currency . $amount;
	$progressbar = '
	<div class="wn-recived-goal">
		' . $out . '
		<div class="donates" style="margin: 7px 0px; position: relative; display: block; padding: 10px; background: #eee; border-radius: 50px; overflow: hidden;">
			<span class="progressbar colorb" style="width:' . $percentage . '%;position: absolute; height: 100%; top: 0; left: 0; transition: all .5s ease-in-out;"><span>
		</div>
	</div>';

}
$now       = date( 'Y-m-d 23:59:59' );
$now       = strtotime( $now );
$end_date  = $end . ' 23:59:59';
$your_date = strtotime( $end_date );
$datediff  = $your_date - $now;
$days_left = floor( $datediff / ( 60 * 60 * 24 ) );
$date_msg  = '';
if ( $days_left == 0 ) {
	$date_msg = '1';} elseif ( $days_left < 0 ) {
	$date_msg = 'No';
	} else {
		$date_msg = $days_left + '1' . '';}
	$goal_days = ( $percentage < 100 ) ? '<span>' . $date_msg . '</span> ' . esc_html__( 'Days left to achieve target', 'deep' ) : esc_html__( 'Thank You', 'deep' );
	if ( $deep_options['deep_webnus_singlegoal_sidebar'] == '1' ) {
		?>
	<aside class="col-md-3 sidebar leftside">
		<?php
		if ( is_active_sidebar( 'Left Sidebar' ) ) {
			dynamic_sidebar( 'Left Sidebar' );}
		?>
	</aside>
<?php } ?>
<section class="<?php echo ( $deep_options['deep_webnus_singlegoal_sidebar'] == '0' ) ? 'col-md-12' : 'col-md-9 cntt-w'; ?>">
<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>
<article class="blog-single-post">
			<?php
			deep_setViews( get_the_ID() );
			$content = get_the_content();
			?>
<div class="post-trait-w"> 
			<?php
			if ( ! isset( $background ) ) {
				?>
<h2 class="goal-title"><?php the_title(); ?></h2> 
										  <?php
			}
			?>
</div>
<div <?php post_class( 'post' ); ?>>
<div class="row">
	<div class="col-md-8">
	<div class="postmetadata">
		<ul class="goal-metadata">
		<?php if ( isset( $goal_features['date'] ) && $goal_features['date'] ) { ?>
		<li class="goal-date"> <i class="fa fa-calendar-o"></i><span><?php the_time( get_option( 'date_format' ) ); ?></span> </li>
			<?php
		}
		if ( isset( $goal_features['category'] ) && $goal_features['category'] ) {
			?>
		<li class="goal-cats"> <i class="fa fa-folder"></i><span><?php the_terms( get_the_id(), 'goal_category', '', ' | ', '' ); ?></span> </li>
			<?php
		}
		if ( isset( $goal_features['views'] ) && $goal_features['views'] ) {
			?>
		<li  class="goal-views"> <i class="fa fa-eye"></i><span><?php echo deep_getViews( get_the_ID() ); ?></span><?php esc_html_e( ' Views', 'deep' ); ?></li>
		<?php } ?>
		</ul>
	</div>
			<?php
			if ( isset( $goal_features['category'] ) && $goal_features['category'] && ! isset( $background ) ) {
				get_the_image(
					array(
						'meta_key'     => array( 'Full', 'Full' ),
						'size'         => 'Full',
						'link_to_post' => false,
					)
				);
			}
			echo apply_filters( 'the_content', $content );
			?>
	</div>
	<div class="col-md-4">
	<div class="goal-box">
			<?php

			echo $progressbar . '<p class="goal-days">' . $goal_days . '</p>';
			if ( $days_left >= 0 && $percentage < 100 && $deep_options['deep_webnus_donate_form'] ) {
				echo deep_modal_donate();
			} else {
				echo '<p class="goal-completed">' . esc_html__( 'Has been completed', 'deep' ) . '</p>';
			}
			if ( isset( $goal_features['sharing'] ) && $goal_features['sharing'] ) {
				?>
			<div class="goal-sharing">
				<i class="goal-sharing-icon colorf fa fa-share-alt"></i>
				<div class="goal-social">
				<a class="facebook hcolorf" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>" target="blank"><?php esc_html_e( 'FACEBOOK', 'deep' ); ?></a>
				<a class="google hcolorf" href="https://plusone.google.com/_/+1/confirm?hl=en-US&amp;url=<?php the_permalink(); ?>" target="_blank"><?php esc_html_e( 'GOOGLE+', 'deep' ); ?></a>
				<a class="twitter hcolorf" href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&amp;tw_p=tweetbutton&amp;url=<?php the_permalink(); ?><?php echo isset( $twitter_user ) ? '&amp;via=' . $twitter_user : ''; ?>" target="_blank"><?php esc_html_e( 'TWITTER', 'deep' ); ?></a>
				</div>
			</div>
			<?php } ?>
	</div>
	</div>
</div>
<br class="clear">
			<?php the_tags( '<div class="post-tags"><i class="fa fa-tags"></i>', '', '</div>' ); ?><!-- End Tags -->
<div class="next-prev-posts">
			<?php
			$args = array(
				'before'           => '',
				'after'            => '',
				'link_before'      => '',
				'link_after'       => '',
				'next_or_number'   => 'next',
				'nextpagelink'     => '&nbsp;&nbsp; ' . esc_html__( 'Next Page', 'deep' ),
				'previouspagelink' => esc_html__( 'Previous Page', 'deep' ) . '&nbsp;&nbsp;',
				'pagelink'         => '%',
				'echo'             => 1,
			);
			wp_link_pages( $args );
			?>
</div><!-- End next-prev post -->

</div>
</article>
			<?php
endwhile;
endif;
if ( isset( $goal_features['comment'] ) && $goal_features['comment'] ) {
	comments_template();
}
?>
</section>
<!-- end-main-conten -->

<?php
if ( $deep_options['deep_webnus_singlegoal_sidebar'] == '2' ) {
	?>
	<aside class="col-md-3 sidebar">
		<?php
		if ( is_active_sidebar( 'Right Sidebar' ) ) {
			dynamic_sidebar( 'Right Sidebar' );}
		?>
	</aside>
<?php } ?>

<div class="white-space"></div>
</section>
<?php
get_footer();
?>
