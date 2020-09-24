<?php
class DeepWPBakeryCountdown extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryCountdown
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
		add_shortcode( 'countdown', array( $this, 'output' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
	}

	/**
	 * Shortcode Output.
	 *
	 *
	 * @since   1.0.0
	 */
	public function output( $attributes, $content = null ) {		
		extract(
			shortcode_atts(
				array(
					'type'           => 'modern',
					'datetime'       => 'October 13, 2029 11:13:00',
					'done'           => '',
					'content_color'  => '',
					'shortcodeclass' => '',
					'shortcodeid'    => '',
				),
				$attributes
			)
		);
		
		add_action( 'wp_enqueue_scripts', 'deep-count-down' );

		// Class & ID
		$shortcodeclass = $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid    = $shortcodeid ? ' id="' . $shortcodeid . '"' : '';
		$style          = '';
		static $uniqid  = 0;
		$uniqid++;

		if ( is_plugin_active( 'the-events-calendar/the-events-calendar.php' ) && $type == 'events' ) {
			$events = tribe_get_events(
				array(
					'posts_per_page' => 1,
					'eventDisplay'   => 'list',
				)
			);
			foreach ( $events as $event ) {
				// date_default_timezone_set(get_option('timezone_string'));
				$data_until  = strtotime( tribe_get_start_date( $event, false, 'd.m.Y H:i' ) );
				$data_future = tribe_get_start_date( $event, false, 'Y/m/d H:i' );
			}
		} else {
			$data_until  = esc_attr( strtotime( $datetime ) );
			$data_future = esc_attr( $datetime );
		}
		$data_done = esc_attr( $done );
		if ( $type == 'type-4' ) {
			wp_enqueue_script( 'jquery-flipclock', DEEP_ASSETS_URL . 'js/libraries/jquery.flipclock.js', array( 'jquery' ), false, true );
			$out    = '<div class="countdown-clock countdown-clock-' . $uniqid . '" data-future="' . $data_future . '" data-done="' . $data_done . '"></div>';
			$style .= '.wn-wrap .countdown-clock-' . $uniqid . '.flip-clock-wrapper ul li a div div.inn{ background:' . $content_color . ';}';
			$style .= '.wn-wrap .countdown-clock-' . $uniqid . '.flip-clock-wrapper .flip-clock-divider .flip-clock-label { color:' . $content_color . ';}';
		} else {
			if ( $type == 'type-3' ) {
				$label = array(
					'day'     => esc_html__( 'DAYS', 'deep' ),
					'hours'   => esc_html__( 'HRS', 'deep' ),
					'minutes' => esc_html__( 'MIN', 'deep' ),
					'seconds' => esc_html__( 'SEC', 'deep' ),
				);
			} else {
				$label = array(
					'day'     => esc_html__( 'Days', 'deep' ),
					'hours'   => esc_html__( 'Hours', 'deep' ),
					'minutes' => esc_html__( 'Minutes', 'deep' ),
					'seconds' => esc_html__( 'Seconds', 'deep' ),
				);
			}
			$out  = '<div class="countdown-w countdown-w' . $uniqid . ' ctd-' . $type . ' ' . $shortcodeclass . '"  ' . $shortcodeid . '  data-until="' . $data_until . '" data-done="' . $data_done . '" data-respond>';
			$out .= '<div class="days-w block-w"><i class="icon-w li_calendar"></i><div class="count-w"></div><div class="label-w">' . $label['day'] . '</div></div>';
			$out .= '<div class="hours-w block-w"><i class="icon-w wn-far wn-fa-clock"></i><div class="count-w"></div><div class="label-w">' . $label['hours'] . '</div></div>';
			$out .= '<div class="minutes-w block-w"><i class="icon-w li_clock"></i><div class="count-w"></div><div class="label-w">' . $label['minutes'] . '</div></div>';
			$out .= '<div class="seconds-w block-w"><i class="icon-w wn-far wn-fa-hourglass"></i><div class="count-w"></div><div class="label-w">' . $label['seconds'] . '</div></div>';
			$out .= '</div>';
		}
		$style .= ( $content_color ) ? '.countdown-w' . $uniqid . ' { color: ' . $content_color . ' } ' : '';

		deep_save_dyn_styles( $style );

		// live editor
		$live_page_builders_css = $style;

		// live editor
		if ( ! in_array( 'admin-bar', get_body_class() ) ) {

			if ( ! empty( $live_page_builders_css ) ) {

				$out     .= '<style>';
					$out .= $live_page_builders_css;
				$out     .= '</style>';

			}
		}
		return $out;
	}

	/**
	 * Required scripts.
	 *
	 * @since   1.0.0
	 */
	public function scripts() {
		if ( self::used_shortcode_in_page( 'countdown' ) ) {
			wp_enqueue_style( 'wn-deep-count-down', DEEP_ASSETS_URL . 'css/frontend/count-down/count-down.css' );
		}
	}

} DeepWPBakeryCountdown::get_instance();