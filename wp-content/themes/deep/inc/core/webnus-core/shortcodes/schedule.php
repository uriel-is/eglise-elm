<?php
class DeepWPBakerySchedule extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakerySchedule
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
		add_shortcode( 'schedule', array( $this, 'output' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
	}

	/**
	 * Shortcode Output.
	 *
	 *
	 * @since   1.0.0
	 */
	public function output( $attributes, $content = null ) {	
		extract( shortcode_atts( array(
			'start_date'	 => 'Feb, 2018',
			'end_date'	 	 => 'May , 2018',
			'dark_bg'	 	 => '',
			'schedule_item'	 => '',
			'shortcodeclass' => '',
			'shortcodeid' 	 => '',
		), $attributes ) );		

		// Class & ID 
		$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';
		static $uniqid = 0;
		$uniqid++;

		// schedule_item loop
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

		if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
			if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
				require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
			}
			$image = new Wn_Img_Maniuplate;
			$schedule_item		= (array) vc_param_group_parse_atts( $schedule_item );
			$schedule_item_data	= array();
			foreach ( $schedule_item as $data ) :
				$new_line 							= $data;
				$new_line['item_time']				= isset( $data['item_time'] ) ? $data['item_time'] : '';
				$new_line['item_title']				= isset( $data['item_title'] ) ? $data['item_title'] : '';
				$new_line['item_presenter_name']	= isset( $data['item_presenter_name'] ) ? $data['item_presenter_name'] : '';
				$new_line['item_presenter_image']	= isset( $data['item_presenter_image'] ) ? $image->m_image( $data['item_presenter_image'], wp_get_attachment_url( $data['item_presenter_image'] ) , '28' , '28' ) : '';
				$new_line['item_location']			= isset( $data['item_location'] ) ? $data['item_location'] : '';
				$schedule_item_data[]				= $new_line;
			endforeach;
		} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) && (is_array($schedule_item) || is_object($schedule_item)) ) {
			foreach( $attributes['schedule_item'] as $key => $data ){
				$new_line 						= $data;
				$new_line->item_time			= isset( $data->item_time ) ? $data->item_time : '';
				$new_line->item_title			= isset( $data->item_title ) ? $data->item_title : '';
				$new_line->item_presenter_name	= isset( $data->item_presenter_name ) ? $data->item_presenter_name : '';
				$new_line->item_presenter_image	= isset( $data->item_presenter_image ) ? $data->item_presenter_image : '';
				$new_line->item_location		= isset( $data->item_location ) ? $data->item_location : '';
				$schedule_item_data[]			= $new_line;
			}
		}
		if ( $dark_bg == 'yes' ) {
			$dark_class = 'w-s-darkbg';
		} else {
			$dark_class = '';
		}
		// render
		$out  = '
		<div class="wn-schedule-wrap wn-schedule-wrap-' . $uniqid . ' ' . $dark_class . ' ' . $shortcodeclass . '"  ' . $shortcodeid . '>
			<div class="wn-schedule-box">
				<div class="wn-schedule-date w-s-date-start">' . $start_date . '</div>';
				if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
					foreach ( $schedule_item_data as $line ) :

						if ( !empty ( $line['item_presenter_image'] ) ) {
							$presenter_image = '<img src="' . $line['item_presenter_image'] . '" alt="' . $line['item_presenter_name'] . '">';
						} else {
							$presenter_image = '';
						}

						$out .= '<div class="wn-schedule-event">';
							$out .=	!empty ( $line['item_time'] ) ? '<div class="wn-schedule-time">' . $line['item_time'] . '</div>' : '';
							$out .=	'<div class="wn-schedule-content">';
							$out .=	!empty ( $line['item_title'] ) ?'<div class="wn-schedule-title">' . $line['item_title'] . '</div>' : '';
							$out .=	( empty ( $presenter_image ) && empty ( $line['item_presenter_name'] ) ) ? '' : '<div class="wn-schedule-presenter"> ' . $presenter_image . ' ' . $line['item_presenter_name'] . '</div>';
							$out .=	!empty ( $line['item_location'] ) ?	'<div class="wn-schedule-location">' . $line['item_location'] . '</div>' : '';
							$out .=	'</div>';
						$out .=	'</div>';

					endforeach;
				} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
					foreach ( $schedule_item_data as $line ) :				
						if ( !empty ( $line->item_presenter_image ) ) {
							$presenter_image = '<img src="' . wp_get_attachment_url( $line->item_presenter_image ) . '" alt="' . $line->item_presenter_name . '">';
						} else {
							$presenter_image = '';
						}

						$out .= '<div class="wn-schedule-event">';
							$out .=	!empty ( $line->item_time ) ? '<div class="wn-schedule-time">' . $line->item_time . '</div>' : '';
							$out .=	'<div class="wn-schedule-content">';
							$out .=	!empty ( $line->item_title ) ?'<div class="wn-schedule-title">' . $line->item_title . '</div>' : '';
							$out .=	( empty ( $presenter_image ) && empty ( $line->item_presenter_name ) ) ? '' : '<div class="wn-schedule-presenter"> ' . $presenter_image . ' ' . $line->item_presenter_name . '</div>';
							$out .=	!empty ( $line->item_location ) ?	'<div class="wn-schedule-location">' . $line->item_location . '</div>' : '';
							$out .=	'</div>';
						$out .=	'</div>';
					endforeach;
				}
				
		$out .= '
				<div class="wn-schedule-date w-s-date-end">' . $end_date . '</div>
			</div>
		</div>';
		
		return $out;
	}

	/**
	 * Required scripts.
	 *
	 * @since   1.0.0
	 */
	public function scripts() {
		if ( self::used_shortcode_in_page( 'schedule' ) ) {
			wp_enqueue_style( 'wn-deep-schedule', DEEP_ASSETS_URL . 'css/frontend/schedule/schedule.css' );	
		}
	}

} DeepWPBakerySchedule::get_instance();
