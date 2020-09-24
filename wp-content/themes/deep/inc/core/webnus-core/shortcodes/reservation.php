<?php
class DeepWPBakeryReservation extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryReservation
	 */
	public static $instance;

	/**
	 * Provides access to a single instance of a module using the singleton pattern.
	 *
	 * @since   1.0.0
	 * @return  object
	 */
	public static function get_instance() {
		if ( self::$instance === null ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Define the core functionality of the theme.
	 *
	 * Load the dependencies.
	 *
	 * @since   1.0.0
	 */
	public function __construct() {
		add_shortcode( 'reservation', array( $this, 'output' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
	}

	/**
	 * Shortcode Output.
	 *
	 *
	 * @since   1.0.0
	 */
	public function output( $atts, $content = null ) {	
		extract(shortcode_atts(array(
			'type'  			=> '1',
			'restaurant_id'		=> '',
			'description'		=> esc_html__( 'Openning hour is 7:00 am - 11:00 pm every day on week', 'deep' ),
			'shortcodeclass' 	=> '',
			'shortcodeid' 	 	=> '',
		), $atts));		

		// Class & ID 
		$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

		$out  = '';

		switch ($type) {
			case '1':
					$out .= '
					<form action="http://www.opentable.com/restaurant-search.aspx" method="get" class="wpcf7-form ' . $shortcodeclass . '"  ' . $shortcodeid . '  >
						<div class="book-form-deep reservation-form-w">
							<div class="col-sm-12 r-deep-form r-date">
									<input name="startDate" type="text" class="open-table-date" value="" autocomplete="off">
							</div>
							<div class="col-sm-12 r-deep-form r-time">
									<select name="time" class="wn-niceselect time">';
										// Time Loop
										// @SEE: http://stackoverflow.com/questions/6530836/php-time-loop-time-one-and-half-of-hour
										$inc = 30 * 60;
										$start = ( strtotime( '00:00:00' ) ); // 6  AM
										$end = ( strtotime( '11:59PM' ) ); // 10 PM
										for ( $i = $start; $i <= $end; $i += $inc ) {
											// to the standart format
											$time      = date( 'g:i a', $i );
											$timeValue = date( 'g:ia', $i );
											$default   = "7:00pm";
											$out .= "<option value=\"$timeValue\" " . ( ( $timeValue == $default ) ? ' selected="selected" ' : "" ) . ">$time</option>" . PHP_EOL;
										}
									$out .= '
									</select>
							</div>
							<div class="col-sm-12 r-deep-form r-people">
								<select name="people" class="wn-niceselect people">
									<option value="1">' . esc_html__( '1 Person', 'deep' ) . '</option>
									<option value="2">' . esc_html__( '2 People', 'deep' ) . '</option>
									<option value="3">' . esc_html__( '3 People', 'deep' ) . '</option>
									<option value="4">' . esc_html__( '4 People', 'deep' ) . '</option>
									<option value="5">' . esc_html__( '5 People', 'deep' ) . '</option>
									<option value="6">' . esc_html__( '6 People', 'deep' ) . '</option>
									<option value="7">' . esc_html__( '7 People', 'deep' ) . '</option>
									<option value="8">' . esc_html__( '8 People', 'deep' ) . '</option>
									<option value="9">' . esc_html__( '9 People', 'deep' ) . '</option>
									<option value="10">' . esc_html__( '10 People', 'deep' ) . '</option>
								</select>
							</div>
							<div class="col-sm-12 r-deep-form r-submition">
								<input type="submit" class="colorr" value="' . esc_html__( 'FIND A TABLE', 'deep' ) . '">
							</div>
							<input type="hidden" name="RestaurantID" class="RestaurantID" value="' . $restaurant_id . '">
							<input type="hidden" name="rid" class="rid" value="' . $restaurant_id . '">
							<input type="hidden" name="GeoID" class="GeoID" value="15">
							<input type="hidden" name="txtDateFormat" class="txtDateFormat" value="MM/dd/yyyy">
							<input type="hidden" name="RestaurantReferralID" class="RestaurantReferralID" value="' . $restaurant_id . '">
							<p>' . $description . '</p>
						</div>
					</form>';	
				break;

			case '2':
					$out .= '<form action="http://www.opentable.com/restaurant-search.aspx" method="get" class="wpcf7-form ' . $shortcodeclass . '"  ' . $shortcodeid . '  target="_blank">
						<div class="reservation-form-w2">

						<div class="col-sm-6 col-md-3 col-xs1 rfw-col">
							<i class="li_calendar"></i>
							<span class="form-control-wrap">
								<input name="startDate" type="text" class="open-table-date" value="" autocomplete="off">
							</span>
						</div>

						<div class="col-sm-6 col-md-3 col-xs1 rfw-col">
							<i class="li_clock"></i>
							<span class="form-control-wrap">
									<select name="time" class=" otw-selectpicker wn-niceselect">';
										// Time Loop
										// @SEE: http://stackoverflow.com/questions/6530836/php-time-loop-time-one-and-half-of-hour
										$inc = 30 * 60;
										$start = ( strtotime( '00:00:00' ) ); // 6  AM
										$end = ( strtotime( '11:59PM' ) ); // 10 PM
										for ( $i = $start; $i <= $end; $i += $inc ) {
											// to the standart format
											$time      = date( 'g:i a', $i );
											$timeValue = date( 'g:ia', $i );
											$default   = "7:00pm";
											$out .= "<option value=\"$timeValue\" " . ( ( $timeValue == $default ) ? ' selected="selected" ' : "" ) . ">$time</option>" . PHP_EOL;
										}
									$out .= '
									</select>
							</span>
						</div>

						<div class="col-sm-6 col-md-3 col-xs1 rfw-col">
							<i class="ti-user"></i>
							<span class="form-control-wrap">
								<select name="partySize" class="otw-party-size-select wn-niceselect">
									<option value="1">' . esc_html__( '1 Person', 'deep' ) . '</option>
									<option value="2">' . esc_html__( '2 People', 'deep' ) . '</option>
									<option value="3">' . esc_html__( '3 People', 'deep' ) . '</option>
									<option value="4">' . esc_html__( '4 People', 'deep' ) . '</option>
									<option value="5">' . esc_html__( '5 People', 'deep' ) . '</option>
									<option value="6">' . esc_html__( '6 People', 'deep' ) . '</option>
									<option value="7">' . esc_html__( '7 People', 'deep' ) . '</option>
									<option value="8">' . esc_html__( '8 People', 'deep' ) . '</option>
									<option value="9">' . esc_html__( '9 People', 'deep' ) . '</option>
									<option value="10">' . esc_html__( '10 People', 'deep' ) . '</option>
								</select>
							</span>
						</div>

						<div class="col-sm-6 col-md-3 col-xs1 rfw-col">
							<input type="submit" class="colorb" value="' . esc_html__( 'FIND A TABLE', 'deep' ) . '">
						</div>

						<input type="hidden" name="RestaurantID" class="RestaurantID" value="' . $restaurant_id . '">
						<input type="hidden" name="rid" class="rid" value="' . $restaurant_id . '">
						<input type="hidden" name="GeoID" class="GeoID" value="15">
						<input type="hidden" name="txtDateFormat" class="txtDateFormat" value="MM/dd/yyyy">
						<input type="hidden" name="RestaurantReferralID" class="RestaurantReferralID" value="' . $restaurant_id . '">

						<p>' . $description . '</p>
					</div>
					</form>';
				break;

			case '3':
					$out .= '<form action="http://www.opentable.com/restaurant-search.aspx" method="get" class="wpcf7-form ' . $shortcodeclass . '"  ' . $shortcodeid . '  >
						<div class="reservation-form-w3">
							<div class="col-sm-4 r-deep-form r-date">
									<i class="ti-calendar"></i>
									<input name="startDate" type="text" class="open-table-date" value="" autocomplete="off">
							</div>
							<div class="col-sm-4 r-deep-form r-time">
									<i class="ti-time"></i>
									<select name="time" class="wn-niceselect time">';
										// Time Loop
										// @SEE: http://stackoverflow.com/questions/6530836/php-time-loop-time-one-and-half-of-hour
										$inc = 30 * 60;
										$start = ( strtotime( '00:00:00' ) ); // 6  AM
										$end = ( strtotime( '11:59PM' ) ); // 10 PM
										for ( $i = $start; $i <= $end; $i += $inc ) {
											// to the standart format
											$time      = date( 'g:i a', $i );
											$timeValue = date( 'g:ia', $i );
											$default   = "7:00pm";
											$out .= "<option value=\"$timeValue\" " . ( ( $timeValue == $default ) ? ' selected="selected" ' : "" ) . ">$time</option>" . PHP_EOL;
										}
									$out .= '
									</select>
							</div>
							<div class="col-sm-4 r-deep-form r-people">
								<i class="ti-user"></i>
								<select name="people" class="wn-niceselect people">
									<option value="1">' . esc_html__( '1 Person', 'deep' ) . '</option>
									<option value="2">' . esc_html__( '2 People', 'deep' ) . '</option>
									<option value="3">' . esc_html__( '3 People', 'deep' ) . '</option>
									<option value="4">' . esc_html__( '4 People', 'deep' ) . '</option>
									<option value="5">' . esc_html__( '5 People', 'deep' ) . '</option>
									<option value="6">' . esc_html__( '6 People', 'deep' ) . '</option>
									<option value="7">' . esc_html__( '7 People', 'deep' ) . '</option>
									<option value="8">' . esc_html__( '8 People', 'deep' ) . '</option>
									<option value="9">' . esc_html__( '9 People', 'deep' ) . '</option>
									<option value="10">' . esc_html__( '10 People', 'deep' ) . '</option>
								</select>
							</div>
							<div class="col-sm-12 r-deep-form r-submition">
								<input type="submit" value="' . esc_html__( 'FIND A TABLE', 'deep' ) . '">
							</div>
							<input type="hidden" name="RestaurantID" class="RestaurantID" value="' . $restaurant_id . '">
							<input type="hidden" name="rid" class="rid" value="' . $restaurant_id . '">
							<input type="hidden" name="GeoID" class="GeoID" value="15">
							<input type="hidden" name="txtDateFormat" class="txtDateFormat" value="MM/dd/yyyy">
							<input type="hidden" name="RestaurantReferralID" class="RestaurantReferralID" value="' . $restaurant_id . '">
							<p>' . $description . '</p>
						</div>
					</form>';
				break;
		}

		return $out;
	}

	/**
	 * Required scripts.
	 *
	 * @since   1.0.0
	 */
	public function scripts() {
		if ( self::used_shortcode_in_page( 'reservation' ) ) {
			wp_enqueue_style( 'wn-deep-reservation', DEEP_ASSETS_URL . 'css/frontend/reservation/reservation.css' );	
		}
	}

} DeepWPBakeryReservation::get_instance();
