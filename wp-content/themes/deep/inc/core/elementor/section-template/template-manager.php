<?php
/**
 * Elementor Template Manager.
 */

 use Elementor\TemplateLibrary;
 use Elementor\Api;
 use Elementor\Plugin as Elementor;

// Don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if ( ! class_exists( 'Deep_Plus_Elemantor_Template_Manager' ) ) {
	class Deep_Plus_Elemantor_Template_Manager {

		/**
		 * The url of the file.
		 *
		 * @access  public
		 * @var     string
		 */
		public static $url;

		/**
		 * Instance of this class.
		 *
		 * @since   1.0.0
		 * @access  public
		 * @var     Deep_Plus
		 */
		public static $instance;

		/**
		 * Provides access to a single instance of a module using the singleton pattern.
		 *
		 * @since   1.0.0
		 * @return object
		 */
		public static function get_instance() {
			if ( self::$instance === null ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Define the core functionality of the Class.
		 *
		 * @since  1.0.0
		 */
		public function __construct() {
			$this->definitions();
			$this->actions();
			$this->dependencies();
		}

		/**
		 * Global definitions.
		 *
		 * @since   1.0.0
		 */
		public function definitions() {
			self::$url = DEEP_CORE_URL . 'elementor/section-template/json/';
		}

		/**
		 * Add actions.
		 *
		 * @since   1.0.0
		 */
		public function actions() {
			if ( defined( '\Elementor\Api::LIBRARY_OPTION_KEY' ) ) {
				add_filter( 'option_' . \Elementor\Api::LIBRARY_OPTION_KEY, [ $this, 'sort_templates' ], 100 );
				add_filter( 'option_' . \Elementor\Api::LIBRARY_OPTION_KEY, [ $this, 'prepend_categories' ], 10 );
			}

			add_action( 'elementor/ajax/register_actions', array( $this, 'register_ajax_actions' ), 20 );
		}

		/**
		 * Load dependencies.
		 *
		 * @since   1.0.0
		 */
		public function dependencies() {
			Elementor::instance()->templates_manager->register_source( 'Source_deep' );
		}

		/**
		 * Fetch Deep Plus Elementor Templates
		 *
		 * @since   1.0.0
		 * @return  Array
		 */
		public static function fetch_templates() {
			$response = wp_remote_get(
				self::$url . 'templates.json',
				[
					'timeout' => 30,
				]
			);

			$response_code = wp_remote_retrieve_response_code( $response );
			if ( $response_code !== 200 ) {
				return new \WP_Error( '_response_code_error', esc_html__( 'Oops, The Request Code :', 'deep-plus' ) . $response_code );
			}

			$template_data = json_decode( wp_remote_retrieve_body( $response ), true );
			if ( isset( $template_data['error'] ) ) {
				return new \WP_Error( '_response_error', esc_html( $response['message'] ) );
			}

			if ( empty( $template_data ) ) {
				return new \WP_Error( '_response_code_error', esc_html__( 'Oops, Invalid Data', 'deep-plus' ) );
			}

			return $template_data;
		}

		/**
		 * Sort Elementor Templates
		 *
		 * @since   1.0.0
		 * @return  Array
		 */
		public static function sort_templates( $library_data ) {
			$templates_data = self::fetch_templates();
			$deep_templates = [];
			$Source_deep    = new Source_deep();

			foreach ( $templates_data as $template ) {
				foreach ( $template as $key => $value ) {
					if ( is_array( $value ) ) {
						$value = json_encode( $value );
					}
					$template[ $key ] = strval( $value );
				}

				$template['id']    = 'deep_' . @$template['id'];
				$template['title'] = 'Deep - ' . @$template['title'];
				$deep_templates[]  = $template;
			}
			$library_data['templates'] = array_merge( $deep_templates, $library_data['templates'] );
			return $library_data;
		}

		/**
		 * Fetch Deep Plus Elementor Templates
		 *
		 * @since   1.0.0
		 * @return  Array
		 */
		public static function get_template( $template_id ) {

			$template_id = str_replace( [ '-', '.', '_' ], '', intval( $template_id ) );
			$response    = wp_remote_get(
				self::$url . 'template/template-' . $template_id . '.json',
				[
					'timeout' => 30,
				]
			);

			$response_code = wp_remote_retrieve_response_code( $response );
			if ( $response_code !== 200 ) {
				return new \WP_Error( '_response_code_error', esc_html__( 'Oops, The Request Code :', 'deep-plus' ) . $response_code );
			}

			$template_data = json_decode( wp_remote_retrieve_body( $response ), true );
			if ( isset( $template_data['error'] ) ) {
				return new \WP_Error( '_response_error', esc_html( $response['message'] ) );
			}

			if ( empty( $template_data ) ) {
				return new \WP_Error( '_response_code_error', esc_html__( 'Oops, Invalid Data', 'deep-plus' ) );
			}

			return $template_data;
		}

		/**
		 * Get Categories
		 *
		 * @since   1.0.0
		 * @return  Array
		 */
		public function get_categories() {
			$response = wp_remote_get(
				self::$url . 'categories.json',
				[
					'timeout' => 30,
				]
			);

			$response_code = wp_remote_retrieve_response_code( $response );
			if ( $response_code !== 200 ) {
				return new \WP_Error( '_response_code_error', esc_html__( 'Oops, The Request Code :', 'deep-plus' ) . $response_code );
			}

			$categories_data = json_decode( wp_remote_retrieve_body( $response ), true );
			if ( isset( $categories_data['error'] ) ) {
				return new \WP_Error( '_response_error', esc_html( $response['message'] ) );
			}

			if ( empty( $categories_data ) ) {
				return new \WP_Error( '_response_code_error', esc_html__( 'Oops, Invalid Data', 'deep-plus' ) );
			}

			return $categories_data['data'];
		}


		 /**
		  * Add Deep templates to Elementor templates list
		  *
		  * @since   1.0.0
		  * @return  Array
		  */
		public function prepend_categories( $library_data ) {
			$categories = $this->get_categories();
			if ( ! empty( $categories ) ) {
				$library_data['types_data']['block']['categories'] = array_merge( $categories, $library_data['types_data']['block']['categories'] );
				return $library_data;
			} else {
				return $library_data;
			}
		}

		/**
		 * Register Ajax Actions
		 *
		 * @since   1.0.0
		 */
		public function register_ajax_actions( $ajax ) {
			if ( ! isset( $_REQUEST['actions'] ) ) {
				return;
			}

			$actions = json_decode( wp_kses_stripslashes( $_REQUEST['actions'] ), true );
			$data    = '';

			foreach ( $actions as $action ) {
				if ( ! isset( $action['get_template_data'] ) ) {
					$data = $action;
				}
			}

			if ( ! isset( $data['data'] ) ) {
				return;
			}
			$data = $data['data'];
			if ( empty( $data['template_id'] ) ) {
				return;
			}

			if ( strpos( $data['template_id'], 'deep_' ) === false ) {
				return;
			}

			$ajax->register_ajax_action( 'get_template_data', array( $this, 'get_template_data' ) );
		}

		/**
		 * Get Template Date
		 *
		 * @since   1.0.0
		 * @param  array $args Request Arguments.
		 * @return array Template Data.
		 */
		public static function get_template_data( $args ) {
			if ( ! isset( $args['template_id'] ) ) {
				return;
			}
			$args['template_id'] = intval( str_replace( 'deep_', '', $args['template_id'] ) );
			$source              = Elementor::instance()->templates_manager->get_source( 'deep' );
			return $source->get_data( $args );
		}
	} // class

	Deep_Plus_Elemantor_Template_Manager::get_instance();
}
