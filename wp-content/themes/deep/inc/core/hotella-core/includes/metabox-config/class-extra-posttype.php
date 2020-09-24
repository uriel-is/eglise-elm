<?php
/**
 * 
 * 
 * 
 */
if ( is_plugin_active( 'wp-hotel-booking/wp-hotel-booking.php' ) && ! class_exists( 'HTC_HB_Extra_Post_Type' )  ) {
	/**
	 * Class HB_Extra_Post_Type
	 */
	class HTC_HB_Extra_Post_Type {

		/**
		 * @var null
		 */
		static $_instance = null;

		/**
		 * HB_Extra_Post_Type constructor.
		 */
		public function __construct() {

			// update admin extra columns
			add_filter( 'manage_hb_extra_room_posts_columns', array( $this, 'extra_columns' ) );

			add_action( 'admin_init', array( $this, 'settings_meta_box' ) );


		}


		/**
		 * @param $columns
		 *
		 * @return mixed
		 */
		public function extra_columns( $columns ) {

			$columns['icon']    = __( 'Icon', 'deep' );
			return $columns;

        }

		/**
		 * Extra room meta box
		 */
		public function settings_meta_box() {
			include_once HOTELLA_CORE . 'includes/metabox-config/icons.php';
			WPHB_Meta_Box::instance(
				'extra_settings',
				array(
					'title'           => __( 'Extra Settings', 'wp-hotel-booking' ),
					'post_type'       => 'hb_extra_room',
					'meta_key_prefix' => 'tp_hb_extra_room_',
					'priority'        => 'high'
				),
				array()
			)->add_field(
				array(
					'name'    => 'icon',
					'label'   => __( 'Icon', 'wp-hotel-booking' ),
					'desc'    => __( 'Choose an icon for this package', 'wp-hotel-booking' ),
					'type'    => 'select',
					'options' => $wn_icons,
				)
			);
		}

		/**
		 * Get instance return self instead of new Class()
		 *
		 * @return HB_Extra_Post_Type|null
		 */
		static function instance() {
			if ( self::$_instance ) {
				return self::$_instance;
			}

			return new self();
		}

    }

    HTC_HB_Extra_Post_Type::instance();
}