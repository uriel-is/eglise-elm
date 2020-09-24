<?php
/**
 * Header Builder - AJAX Class.
 *
 * @author	Webnus
 */

// don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}

if ( ! class_exists( 'WHB_Ajax' ) ) :

    class WHB_Ajax {

		/**
		 * Instance of this class.
         *
		 * @since	1.0.0
		 * @access	private
		 * @var		WHB_Ajax
		 */
		private static $instance;

		/**
		 * Provides access to a single instance of a module using the singleton pattern.
		 *
		 * @since	1.0.0
		 * @return	object
		 */
		public static function get_instance() {

			if ( self::$instance === null ) {
				self::$instance = new self();
            }

			return self::$instance;

		}

		/**
		 * Constructor.
		 *
		 * @since	1.0.0
		 */
		public function __construct() {
			// Save WEBNUS Header Builder data
			add_action( 'wp_ajax_whb_save_data',					array( $this, 'save_data' ) );
			// Live styling tab in frontend
			add_action( 'wp_ajax_whb_live_dynamic_styles',			array( $this, 'live_dynamic_styles' ) );
			// Publish header
			add_action( 'wp_ajax_whb_publish',						array( $this, 'publish' ) );
			// Export header
			add_action( 'wp_ajax_whb_export',						array( $this, 'export_header' ) );
			// Get component fields
			add_action( 'wp_ajax_whb_get_component_fields',			array( $this, 'get_component_fields' ) );
			// Remove item from woocommerce cart
			add_action( 'wp_ajax_nopriv_wn_woo_ajax_update_cart',	array( $this, 'remove_item_from_cart' ) );
			add_action( 'wp_ajax_wn_woo_ajax_update_cart',			array( $this, 'remove_item_from_cart' ) );
			// Add item to woocommerce cart
			add_action( 'wp_ajax_nopriv_wn_woo_ajax_add_to_cart',	array( $this, 'add_item_to_cart' ) );
			add_action( 'wp_ajax_wn_woo_ajax_add_to_cart',			array( $this, 'add_item_to_cart' ) );

		}

		/**
		 * Save all data.
		 *
		 * @since	1.0.0
		 */
		public function save_data() {
			check_ajax_referer( 'whb-nonce', 'nonce' );
			$frontendComponents = maybe_unserialize( json_decode( stripslashes( $_POST['frontendComponents'] ), true ) );
			echo WHB_Output::output(true, $frontendComponents);
			wp_die(); // this is required to terminate immediately and return a proper response
		}

		/**
		 * Live styling tab and other dynamic styles.
		 *
		 * @since	1.0.0
		 */
		public function live_dynamic_styles() {
			check_ajax_referer( 'whb-nonce', 'nonce' );
			echo WHB_Helper::set_dynamic_styles('');
			echo WHB_Helper::get_dynamic_styles();
			wp_die(); // this is required to terminate immediately and return a proper response
		}

		/**
		 * Publish all data.
		 *
		 * @since	1.0.0
		 */
		public function publish() {
			check_ajax_referer( 'whb-nonce', 'nonce' );
			$components = maybe_unserialize( json_decode( stripslashes( $_POST['components'] ), true ) );
			$editorComponents = maybe_unserialize( json_decode( stripslashes( $_POST['editorComponents'] ), true ) );
			$frontendComponents = maybe_unserialize( json_decode( stripslashes( $_POST['frontendComponents'] ), true ) );
			if ( WHB_Multilanguage::language() ) {
				update_option( WHB_Multilanguage::language() . '_whb_data_components', $components );
				update_option( WHB_Multilanguage::language() . '_whb_data_editor_components', $editorComponents );
				update_option( WHB_Multilanguage::language() . '_whb_data_frontend_components', $frontendComponents );
			} else {
				update_option( 'whb_data_components', $components );
				update_option( 'whb_data_editor_components', $editorComponents );
				update_option( 'whb_data_frontend_components', $frontendComponents );
			}
			wp_die(); // this is required to terminate immediately and return a proper response
		}

		/**
		 * Export header.
		 * 
		 * @since	1.0.0
		 */
		public function export_header() {
			$content = array();
			$content['whb_data_components'] = get_option( 'whb_data_components' );
			$content['whb_data_editor_components'] = get_option( 'whb_data_editor_components' );
			$content['whb_data_frontend_components'] = get_option( 'whb_data_frontend_components' );
			$content = json_encode( $content );
			header( 'Content-Description: File Transfer' );
			header( 'Content-type: application/txt' );
			header( 'Content-Disposition: attachment; filename="webnus-header-builder-' . date( 'd-m-Y' ) . '.json"' );
			header( 'Content-Transfer-Encoding: binary' );
			header( 'Expires: 0' );
			header( 'Cache-Control: must-revalidate' );
			header( 'Pragma: public' );
			echo wp_unslash( $content );
			exit;
		}

		/**
		 * Get component fields.
		 *
		 * @since	1.0.0
		 */
		public function get_component_fields() {
			
			check_ajax_referer( 'whb-nonce', 'nonce' );

			$el_name = $_POST['el_name'];
			ob_start();

			include_once WHB_Helper::get_file( 'includes/elements/components/backend/' . WHB::FILE_PREFIX . $el_name . '-backend.php' );

			$output = ob_get_contents();
			ob_end_clean();

			echo '' . $output;

			wp_die(); // this is required to terminate immediately and return a proper response

		}

		/**
		 * Remove item from woocommerce cart.
		 *
		 * @since	1.0.0
		 * @return	cart items
		 */
		public function remove_item_from_cart() {

			// Set the product ID to remove
			$cart_product_id = $_POST['cart_product_id'];
			$prod_to_remove	 = array( $cart_product_id );

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ){
				$cart_item_id = $cart_item['data']->get_id();

				if ( in_array($cart_item_id, $prod_to_remove) ) {
					WC()->cart->remove_cart_item($cart_item_key);
				}
			}

			wn_mini_cart();

			wp_die(); // this is required to terminate immediately and return a proper response

		}

		/**
		 * Add item to woocommerce cart.
		 *
		 * @since   1.0.0
		 * @return  cart items
		 */
		public function add_item_to_cart() {

			WC()->cart->add_to_cart( $product_id = $_POST['cart_product_id'], $quantity = 1, $variation_id = 0, $variation = array(), $cart_item_data = array() );

			wn_mini_cart();

			wp_die(); // this is required to terminate immediately and return a proper response

		}

    }

endif;
