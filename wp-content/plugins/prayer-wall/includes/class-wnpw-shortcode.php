<?php

/**
 * Create Shortcode.
 *
 * @since      1.0.0
 * @package    Wp Prayer Wall
 *
 */

/**
*  Create Shortcode Class
*/
class Wnpw_Shortcode {
	
	public function init() {
		add_shortcode( 'prayer-form', array( $this, 'shortcode_submit' ) );
		add_shortcode( 'prayer-wall', array( $this, 'shortcode_form' ) );
	}

	public function shortcode_submit( $atts ) {

		$out = '
			<div class="wpb_wrapper">
				<div class="wpnw-submit-form" id="praybox_wrapper">
					<input type="submit" class="wn-prayer-request" value=" '.  esc_html__( 'CLOSE YOUR PRAYER REQUEST', 'wnpw' ) .' " href="#" />
					<form class="pbx-form wnpw-form" method="post">
						<input type="hidden" name="pbx_action" value="submit_request" />

						<div class="pbx-formfield col-md-3">
							<label for="pbx_first_name" style="margin-top: 0px;">'. esc_html__( 'First Name:', 'wnpw' ) .'</label>
							<input type="text" name="pbx_first_name" class="wnpw-name" />
						</div>

						<div class="pbx-formfield col-md-3">
							<label for="pbx_last_name">'. esc_html__( 'Last Name:', 'wnpw' ) .'</label>
							<input type="text" name="pbx_last_name" class="wnpw-last" />
						</div>

						<div class="pbx-formfield col-md-3">
							<label for="pbx_email">'. esc_html__( 'Email Address:', 'wnpw' ) .'</label>
							<input type="email" name="pbx_email" class="wnpw-mail" />
						</div>

						<div class="pbx-formfield col-md-3">
							<label for="pbx_title">'. esc_html__( 'Prayer Request Title:', 'wnpw' ) .'</label>
							<input type="text" name="pbx_title" class="wnpw-title" />
						</div>

						<div class="pbx-formfield col-md-12">
							<label for="pbx_body">'. esc_html__( 'Prayer Request:', 'wnpw' ) .'</label>
							<textarea name="pbx_body" class="wnpw-request"></textarea>
						</div>

						<div class="pbx-formfield">
							<input type="button" class="colorb wnpw-submit-form" value=" '. esc_html__( 'Submit My Prayer Request', 'wnpw' ) .' " />
						</div>
					</form>
				</div>
			</div>
			<span class="wnpw-succ" style="display:none;">'. esc_html__( 'Your pray is sent!', 'wnpw' ) .'</span>';
				

		return $out;
	}

	public function shortcode_form( $atts ) {

		// get prayer wall post type
		$args = array(
				'post_type'   => 'prayerwall',
				'post_status' => 'publish',
		);
		$query = new WP_Query( $args );

		//generetae excution
		$out = '';
		$out .= '<div class="wnpw-form-container">';
		$out .= '<div class="pbx-req">';

			if ( $query->have_posts() ) {
				// The Loop
				while ( $query->have_posts() ) {
					$query->the_post();
					global $post;
					$values = get_post_meta( $post->ID , 'prayer-wall-info', true );
					// get prayer count
					$prayed = get_post_meta( $post->ID , 'prayer-wall-count', true );
					$prayed = isset($prayed[0]) ? $prayed[0] : '0';
					$out .= '
							<div class="col-md-6">  
								<div class="wm-prayer-container">
									<div class="wm-prayer-inner">
										<h3><em> '. esc_html(  get_the_title() ).' </em></h3>
										<div class="wm-prayer-info">
											<span class="num-submitted">
												<i class="icon-calendar"></i>
												'. esc_html(  get_the_date() ) .'
											</span>
											<span class="num-prayers">
												<i class="icon-profile-male"></i>
												' . wp_kses( __( 'Prayed for <span class="wn-prayer-cont"> '. $prayed . ' </span> times','wnpw' ), array( 'span' => array( 'class' => array() ) ) ) . '
											</span>
										</div>
										<article class="wm-prayer-request">
											'. esc_attr( $values['4'] ) .'
										</article>
										<span class="wm-prayer-request-name">
											'. esc_attr( $values['0'] ) . esc_attr( $values['1'] ) .'
										</span>
										<a href="#" class="wm-pray-request-button" data-post=" '. $post->ID .' " data-num="'. $prayed . '" >' . esc_attr__( 'Pray for this', 'wnpw' ). '</a>
									</div>
								</div>
							</div>';	
				}
				wp_reset_postdata();
			}

		$out .= '</div>
				</div>';	

		return $out;

	}

}