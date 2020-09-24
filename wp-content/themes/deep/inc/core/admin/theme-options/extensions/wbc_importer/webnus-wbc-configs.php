<?php
// Way to set menu, import revolution slider, set blog page and set home page
if ( ! function_exists( 'deep_wbc_extended' ) ) :

	/**
	 *  Delete Defult mec posts.
	 */
	add_action( 'import_start', 'deep_wbc_mec_options', 10, 2 );

	function deep_wbc_mec_options() {
		$post_type = array(
			'0' => 'mec_calendars',
			'1' => 'mec-events',
		);

		foreach ( $post_type as $key => $value ) {

			$args = array(
				'post_type' => $value,
			);

			$query = new WP_Query( $args );

			if ( $query->have_posts() ) {
				// The 2nd Loop
				while ( $query->have_posts() ) {

					$query->the_post();
					wp_delete_post( $query->post->ID );

				}
				wp_reset_postdata();
			}
		}
	}

	//add_action( 'import_end', 'deep_remove_duplicated_menu_item' );
	function deep_remove_duplicated_menu_item() {

		$nav_menus = wp_get_nav_menus();
		$navs      = array();

		for ( $i = 0; $i < sizeof( $nav_menus ); $i++ ) {

			for ( $j = 0; $j < sizeof( wp_get_nav_menu_items( $nav_menus[ $i ]->term_id ) ); $j++ ) {

				$navs[ wp_get_nav_menu_items( $nav_menus[ $i ]->term_id )[ $j ]->ID ] = wp_get_nav_menu_items( $nav_menus[ $i ]->term_id )[ $j ]->title;

			}
		}

		foreach ( array_diff_assoc( $navs, array_unique( $navs ) ) as $key => $value ) {
			wp_delete_post( $key );
		}

	}

	add_action( 'wbc_importer_after_content_import', 'deep_wbc_extended', 10, 4 );
	function deep_wbc_extended( $demo_active_import, $demo_directory_path, $import_sliders, $import_theme_opts ) {

		reset( $demo_active_import );
		$current_key = key( $demo_active_import );

		if ( isset( $demo_active_import[ $current_key ]['directory'] ) && ! empty( $demo_active_import[ $current_key ]['directory'] ) ) :

			/**
			 * Import Header
			 *
			 * @author  WEBNUS
			 * @since   1.0.0
			 */
			$headerFile = $demo_directory_path . 'header.json';
			if ( file_exists( $headerFile ) ) {
				$headerData = file_get_contents( $headerFile );
				$headerData = json_decode( stripslashes( $headerData ), true );
				update_option( 'whb_data_components', $headerData['whb_data_components'] );
				update_option( 'whb_data_editor_components', $headerData['whb_data_editor_components'] );
				update_option( 'whb_data_frontend_components', $headerData['whb_data_frontend_components'] );
			}

			/**
			 * Import theme options
			 *
			 * @since 1.0.0
			 */
			if ( $import_theme_opts ) {
				// Get file contents and decode
				$file = $demo_directory_path . 'theme_options.txt';
				if ( file_exists( $file ) ) {
					$data = file_get_contents( $file );
					$data = json_decode( $data, true );
					$data = maybe_unserialize( $data );
					update_option( 'deep_options', $data );
				}
			}

			/**
			 * Set HomePage
			 *
			 * @since 1.0.0
			 */
			$wbc_home_pages = array(
				// folder name
				'corporate'          => 'Home 1 - Corporate',
				'shop'               => 'Home 1 - Shop',
				'business'           => 'Home 1 - Business',
				'magazine'           => 'Home 1 - Magazine',
				'portfolio'          => 'Home 1 - Portfolio',
				'freelancer'         => 'Home - Freelancer',
				'photography'        => 'Home - Photography',
				'startup'            => 'Home - Startup',
				'restaurant'         => 'Home 1 - Restaurant',
				'classic'            => 'Home 1 - Classic',
				'construction'       => 'Home - Construction',
				'personal-blog'      => 'Home 1 - Personal Blog',
				'web-design'         => 'Home 1 - Web Design',
				'app'                => 'Home 1 - App',
				'edge'               => 'Home - Edge',
				'product-landing'    => 'Home - Product Landing',
				'beauty'             => 'Home 1 - Beauty',
				'buddypress'         => 'Home - BuddyPress',
				'agency1'            => 'Home - Agency',
				'cafe'               => 'Home 1 - Cafe',
				'spa'                => 'Home 1 - SPA',
				'musician'           => 'Home 1 - Musician',
				'architect'          => 'Home - Architect',
				'boutique'           => 'Home Boutique',
				'charity'            => 'Home 1 - Charity',
				'crypto'             => 'Home 1 Crypto',
				'dentist'            => 'Home Dentist',
				'events'             => 'Events Home 1 - Conference',
				'fashion'            => 'Home Fashion Model',
				'furniture'          => 'Home Furniture',
				'insurance'          => 'Home - Insurance',
				'language-school'    => 'Language School Home',
				'lawyer'             => 'Home',
				'mechanic'           => 'Home - Mechanic',
				'real-estate'        => 'Home Real Estate',
				'software'           => 'Home1 - Software',
				'wedding'            => 'Home - Wedding',
				'health'             => 'Home Health',
				'travel'             => 'Travel_Home',
				'petsitter'          => 'Petsitter - Home',
				'church'             => 'Home - Church',
				'consulting'         => 'Home - Consulting',
				'rtl'                => 'الرئيسية 1 - مجلة',
				'coming-soon'        => 'Coming Soon 1',
				'cosmetic'           => 'Cosmetic Home',
				'yoga'               => 'Yoga - Home',
				'cv'                 => 'CV - Home',
				'car'                => 'Home - Car',
				'seo'                => 'Home - SEO',
				'easydesign'         => 'Home 1',
				'easyhost'           => 'Home 1',
				'easyseo'            => 'Home 1',
				'easysmall'          => 'Home 1',
				'easyconference'     => 'Home',
				'easyapp'            => 'Home 1',
				'easyseo2'           => 'Home 1',
				'remittal'           => 'Home 1',
				'pax'                => 'Home 1',
				'solace'             => 'Home 1',
				'trust'              => 'Home 1',
				'discovery'          => 'Home 1',
				'forward'            => 'Home 1',
				'agency2'            => 'Home - Agency 2',
				'happypets'          => 'Home 1',
				'babysitter'         => 'Home - BabySitter',
				'car-services'       => 'Home - Car Services',
				'cryptocoin'         => 'CryptoCoin - Home',
				'home-services'      => 'Home Services - Home',
				'yorkpress'          => 'Home 5',
				'gym'                => 'Gym Home',
				'risotto-restaurant' => 'Home 1',
				'risotto-cafe'       => 'Home 1',
				'risotto-fastfood'   => 'Home 1',
				'hotella-vienna'     => 'Home Vienna',
				'hotella-athens'     => 'Home 1',
				'hotella-rome'       => 'Home 1',
				'hotella-madrid'     => 'Home 1',
				'hosting'            => 'Hosting - Home 1',
				'petshop'            => 'Home',
				'fastfood'           => 'Fast Food - Home',
				'dietitian'          => 'Home',
				'perfume'            => 'Home',
				'housekeeping'       => 'Home',
				'carwash'            => 'Home',
				'barber'             => 'Home',
				'club'               => 'Home',
				'corporate2'         => 'Home',
				'kindergarten'       => 'Home 1',
				'michigan-college'   => 'Home 1',
				'michigan-high-school'     => 'Home 1',
				'michigan-online-learning' => 'Home 1',
				'sport'              => 'Home',
				'events-business'    => 'Home',
				'conference'         => 'Home',
				'church2'            => 'Home',
			);

			if ( array_key_exists( $demo_active_import[ $current_key ]['directory'], $wbc_home_pages ) ) :
				$home_page = get_page_by_title( $wbc_home_pages[ $demo_active_import[ $current_key ]['directory'] ] );
				if ( isset( $home_page->ID ) ) :
					update_option( 'page_on_front', $home_page->ID );
					update_option( 'show_on_front', 'page' );
				endif;
			endif;

			/**
			 * Select category source for the grid
			 *
			 * @since 1.0.0
			 */

			$the_grid_cats = array(
				'furniture' => '205|gallery_category:5',
			);

			if ( array_key_exists( $demo_active_import[ $current_key ]['directory'], $the_grid_cats ) ) :
				foreach ( $the_grid_cats as $key => $value ) {
					$data = ( explode( '|', $the_grid_cats[ $key ] ) );
					update_post_meta( $data['0'], 'the_grid_categories', $data['1'], '' );
				}
			endif;

			/**
			 * Set BlogPage
			 *
			 * @since 1.0.0
			 */
			$wbc_blog_pages = array(
				// folder name
				'corporate'          => 'Blog',
				'shop'               => 'blog',
				'business'           => 'Blog',
				'magazine'           => 'Blog',
				'portfolio'          => 'Blog',
				'freelancer'         => 'Blog',
				'photography'        => 'Blog',
				'startup'            => 'Blog',
				'restaurant'         => 'Blog',
				'classic'            => 'Blog',
				'construction'       => 'Blog',
				'personal-blog'      => 'Blog',
				'web-design'         => 'blog',
				'app'                => '',
				'edge'               => 'Blog',
				'product-landing'    => 'Blog',
				'beauty'             => 'Blog',
				'buddypress'         => 'Blog',
				'agency1'            => 'Blog',
				'cafe'               => 'Blog',
				'spa'                => 'Blog',
				'musician'           => 'Blog',
				'architect'          => '',
				'boutique'           => '',
				'charity'            => 'Blog',
				'crypto'             => 'Blog',
				'dentist'            => '',
				'events'             => '',
				'fashion'            => '',
				'furniture'          => '',
				'insurance'          => '',
				'language-school'    => '',
				'lawyer'             => '',
				'mechanic'           => '',
				'real-estate'        => '',
				'software'           => '',
				'wedding'            => '',
				'health'             => '',
				'travel'             => '',
				'patsitter'          => '',
				'church'             => '',
				'consulting'         => '',
				'rtl'                => '',
				'coming-soon'        => '',
				'cosmetic'           => '',
				'yoga'               => '',
				'cv'                 => '',
				'car'                => '',
				'seo'                => 'Blog',
				'easydesign'         => 'Blog',
				'easyhost'           => 'Blog',
				'easyseo'            => 'Blog',
				'easysmall'          => 'Blog',
				'easyconference'     => '',
				'easyapp'            => '',
				'easyseo2'           => 'Blog',
				'remittal'           => 'Blog',
				'pax'                => 'Blog',
				'solace'             => 'Blog',
				'trust'              => 'Blog',
				'discovery'          => 'Blog',
				'forward'            => 'Blog',
				'agency2'            => 'Blog',
				'happypets'          => '',
				'babysitter'         => '',
				'car-services'       => '',
				'cryptocoin'         => '',
				'home-services'      => '',
				'yorkpress'          => '',
				'gym'                => '',
				'risotto-restaurant' => 'Blog',
				'risotto-cafe'       => '',
				'risotto-fastfood'   => '',
				'hotella-vienna'     => '',
				'hotella-athens'     => 'Blog',
				'hotella-rome'       => 'Blog',
				'hotella-madrid'     => 'Blog',
				'hosting'            => '',
				'petshop'            => '',
				'fastfood'           => '',
				'perfume'            => '',
				'housekeeping'       => '',
				'carwash'            => '',
				'barber'             => '',
				'club'               => '',
				'michigan-high-school' => '',
				'kindergarten'       => '',
				'michigan-college'   => 'Blog',
				'michigan-online-learning' => 'Blog',
				'sport'              => '',
				'events-business'    => '',
				'conference'         => '',
				'church2'            => '',
			);

			/**
			 * Import MEC posts
			 *
			 * @since 1.0.0
			 */
			if ( is_plugin_active( 'modern-events-calendar-lite/mec.php' ) ) {
				if ( file_exists( $demo_directory_path . 'events.xml' ) ) {
					do_action( 'mec_import_file', $demo_directory_path . 'events.xml' );
				}
			}

			/**
			 * Import eforms
			 *
			 * @since 1.0.0
			 */
			// if ( is_plugin_active( 'wp-fsqm-pro/ipt_fsqm.php' ) ) {
			// if ( file_exists( $demo_directory_path . 'eform.php' ) ) {
			// include_once ( $demo_directory_path . 'eform.php' );
			// foreach ( $eforms as $eform ) {
			// global $wpdb, $ipt_fsqm_info;
			// $form = maybe_unserialize( base64_decode( $eform['code'] ) );
			// $form['name'] = strip_tags( $form['name'] );
			// $get_table = $wpdb->prefix . 'fsq_form';
			// $eform_check = $wpdb->get_results("SELECT * FROM $get_table WHERE name= '".$form['name']."'");
			// if( !($wpdb->num_rows > 0)) {
			// $wpdb->insert( $ipt_fsqm_info['form_table'], array(
			// 'name'     => $form['name'],
			// 'settings' => $form['settings'],
			// 'layout'   => $form['layout'],
			// 'design'   => $form['design'],
			// 'mcq'      => $form['mcq'],
			// 'freetype' => $form['freetype'],
			// 'pinfo'    => $form['pinfo'],
			// 'type'     => $form['type'],
			// 'category' => 0,
			// ), '%s' );
			// $new_form_id = $wpdb->insert_id;
			// }
			// }
			// }
			// }

			/**
			 * Create Hostspot Post in Database
			 *
			 * @since 1.0.0
			 */
			if ( is_plugin_active( 'devvn-image-hotspot/devvn-image-hotspot.php' ) ) {
				// Check if post exist
				if ( ! function_exists( 'check_post_exist' ) ) {
					function check_post_exist( $title ) {
						global $wpdb;
						$return = $wpdb->get_row( "SELECT ID FROM wp_posts WHERE post_title = '" . $title . "' && post_status = 'publish' && post_type = 'points_image' ", 'ARRAY_N' );
						if ( empty( $return ) ) {
							return false;
						} else {
							return true;
						}
					}
				}

				if ( ! check_post_exist( 'Image Hotspot' ) ) {
					$hotspot_post = array(
						'post_title'   => wp_strip_all_tags( 'Image Hotspot' ),
						'post_content' => 'a:5:{s:11:\"maps_images\";s:71:\"http://deeptem.com/product-landing/wp-content/uploads/2018/01/apple.png\";s:10:\"pins_image\";s:69:\"http://deeptem.com/product-landing/wp-content/uploads/2018/05/pin.png\";s:16:\"pins_image_hover\";s:0:\"\";s:16:\"pins_more_option\";a:6:{s:8:\"position\";s:13:\"center_center\";s:10:\"custom_top\";s:2:\"20\";s:11:\"custom_left\";s:2:\"20\";s:16:\"custom_hover_top\";s:1:\"0\";s:17:\"custom_hover_left\";s:1:\"0\";s:14:\"pins_animation\";s:5:\"pulse\";}s:11:\"data_points\";a:4:{i:0;a:10:{s:7:\"content\";s:147:\"<div class=\"colorf\"><strong>Sensetive Screen</strong></div>\r\nApple watch comes with a<br>pearly, lustrous finish that<br>won’t scratch or tarnish\";s:8:\"linkpins\";s:0:\"\";s:11:\"link_target\";s:5:\"_self\";s:17:\"pins_image_custom\";s:0:\"\";s:23:\"pins_image_hover_custom\";s:0:\"\";s:9:\"placement\";s:1:\"s\";s:7:\"pins_id\";s:0:\"\";s:10:\"pins_class\";s:0:\"\";s:3:\"top\";s:5:\"21.03\";s:4:\"left\";s:5:\"14.77\";}i:1;a:10:{s:7:\"content\";s:141:\"<div class=\"colorf\"><strong>Switch Wheel</strong></div>\r\nUse this switcher to access<br>furthur settings of your watch<br>with smooth motion.\";s:8:\"linkpins\";s:0:\"\";s:11:\"link_target\";s:5:\"_self\";s:17:\"pins_image_custom\";s:0:\"\";s:23:\"pins_image_hover_custom\";s:0:\"\";s:9:\"placement\";s:1:\"s\";s:7:\"pins_id\";s:0:\"\";s:10:\"pins_class\";s:0:\"\";s:3:\"top\";s:5:\"28.71\";s:4:\"left\";s:5:\"54.39\";}i:2;a:10:{s:7:\"content\";s:151:\"<div class=\"colorf\"><strong>White Ceramic</strong></div>\r\nHigh-strength zirconia powder<br>that’s combined with alumina<br>to achieve its white color\";s:8:\"linkpins\";s:0:\"\";s:11:\"link_target\";s:5:\"_self\";s:17:\"pins_image_custom\";s:0:\"\";s:23:\"pins_image_hover_custom\";s:0:\"\";s:9:\"placement\";s:1:\"s\";s:7:\"pins_id\";s:0:\"\";s:10:\"pins_class\";s:0:\"\";s:3:\"top\";s:5:\"50.25\";s:4:\"left\";s:5:\"50.46\";}i:3;a:10:{s:7:\"content\";s:137:\"<div class=\"colorf\"><strong>Extra-long Band</strong></div>\r\nThis amazing hand carfted<br>band wraps elegantly twice<br>around the wrist .\";s:8:\"linkpins\";s:0:\"\";s:11:\"link_target\";s:5:\"_self\";s:17:\"pins_image_custom\";s:0:\"\";s:23:\"pins_image_hover_custom\";s:0:\"\";s:9:\"placement\";s:1:\"s\";s:7:\"pins_id\";s:0:\"\";s:10:\"pins_class\";s:0:\"\";s:3:\"top\";s:5:\"34.56\";s:4:\"left\";s:5:\"89.53\";}}}',
						'post_status'  => 'publish',
						'post_author'  => 1,
						'post_type'    => 'points_image',
					);

					// Insert the post into the database
					wp_insert_post( $hotspot_post );
				}
			}

			/**
			 * Footer Builder KC
			 *
			 * @since 1.0.0
			 */
			if ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) :

				$deep_options     = get_option( 'deep_options' );
				$footerBuilder_id = isset( $deep_options['deep_footer_builder_select'] ) ? $deep_options['deep_footer_builder_select'] : '';
				if ( ! empty( $footerBuilder_id ) ) {
					$getFooterPost = get_post( $footerBuilder_id );
					$content       = $getFooterPost->post_content;

					if ( empty( $getFooterPost->post_content_filtered ) ) {

						global $wpdb,$kc;
						$content_processed = $kc->do_shortcode( $content );

						if ( empty( $content_processed ) ) {

							$content_processed = $content_processed;

							$content_processed = str_replace(
								array( "\n", 'body.kc-css-system' ),
								array( '', 'html body' ),
								$content_processed
							);

						}
						$data = array(
							'ID'                    => $footerBuilder_id,
							'post_content'          => $content_processed,
							'post_content_filtered' => $content,
						);
						$wpdb->update(

							$wpdb->prefix . 'posts',
							$data,
							array( 'ID' => $footerBuilder_id )
						);

					}
				}
			endif;

			/**
			 * Import pricing(s) for the current demo being imported
			 *
			 * @since 1.0.0
			 */
			if ( class_exists( 'GW_GoPricing' ) ) {
				$file_content = @file_get_contents( $demo_directory_path . 'go-pricing.txt' );
				$override     = true;
				$ids          = array();
				GW_GoPricing_Data::import( $file_content, (bool) $override, $ids );
			}

			/**
			 * Import LayerSlider
			 *
			 * @since 1.0.0
			 */
			if ( is_plugin_active( 'LayerSlider/layerslider.php' ) ) {
				if ( file_exists( $demo_directory_path . 'layer_sliders.zip' ) ) {
					include LS_ROOT_PATH . '/classes/class.ls.importutil.php';
					$import = new LS_ImportUtil( $demo_directory_path . 'layer_sliders.zip' );
					$import->addSlider( $demo_directory_path . 'layer_sliders.zip' );
				}
			}

			/**
			 * Import slider(s) for the current demo being imported
			 *
			 * @since 1.0.0
			 */
			if ( $import_sliders && class_exists( 'RevSlider' ) ) :

				// Set sliders zip name
				$wbc_sliders_array = array(
					// folder name
					'corporate'          => array( 'deep-corporate-main-slider.zip', 'deep-corporate-slider1.zip' ),
					'shop'               => array( 'deep-shop-main-slider.zip', 'deep-shop-slider1.zip', 'deep-shop-slider2.zip', 'product-map-view.zip' ),
					'business'           => '',
					'magazine'           => '',
					'portfolio'          => '',
					'freelancer'         => '',
					'photography'        => '',
					'startup'            => array( 'deep-startup-slider1.zip' ),
					'restaurant'         => array( 'deep-restaurant-slider-1.zip' ),
					'classic'            => array( 'deep-classic-slider1.zip' ),
					'construction'       => array( 'deep-construction-slider-1.zip', 'services.zip' ),
					'personal-blog'      => '',
					'web-design'         => array( 'deep-wd-slider1.zip', 'deep-wd-slider2.zip', 'deep-wd-slider3.zip' ),
					'app'                => array( 'deep-app-showcase-carousel.zip', 'deep-app-slider.zip' ),
					'edge'               => '',
					'product-landing'    => array( 'deep-product-landing-slider.zip' ),
					'beauty'             => array( 'deep-beauty-slider1.zip' ),
					'buddypress'         => '',
					'agency1'            => '',
					'cafe'               => '',
					'spa'                => array( 'deep-spa-slider1.zip' ),
					'musician'           => '',
					'architect'          => array( 'architect-slider.zip' ),
					'boutique'           => array( 'deep-boutique-NUM.zip' ),
					'charity'            => array( 'deep-charity-slider1.zip' ),
					'crypto'             => array( 'deep-crypto-slider1.zip', 'deep-crypto-slider2.zip' ),
					'dentist'            => array( 'deep-dentist-main-slider.zip' ),
					'events'             => array( '' ),
					'fashion'            => array( '' ),
					'furniture'          => array( 'deep-furniture-slider1.zip' ),
					'insurance'          => array( '' ),
					'language-school'    => array( 'deep-language-school.zip' ),
					'lawyer'             => array( 'HomeSlider.zip' ),
					'mechanic'           => array( '' ),
					'real-estate'        => array( 'deep-real-estate-slider1.zip' ),
					'software'           => array( '' ),
					'wedding'            => array( '' ),
					'health'             => array( 'deep-health-slider.zip' ),
					'travel'             => array( '' ),
					'patsitter'          => array( '' ),
					'rtl'                => array( '' ),
					'coming-soon'        => array( '' ),
					'church'             => array( 'discovery-slider1.zip' ),
					'consulting'         => array( 'consulting-main-slider.zip', 'cosulting-case-studies.zip' ),
					'cosmetic'           => array( 'cosmetic-slider1.zip' ),
					'yoga'               => array( 'deep-yoga-main-slider.zip' ),
					'cv'                 => array( '' ),
					'car'                => array( 'deep-car-main-slider.zip' ),
					'seo'                => array( 'deep-seo-slider1.zip' ),
					'easydesign'         => array( 'easy-design-rev-slider11.zip', 'easy-design-rev-slider1.zip' ),
					'easyhost'           => array( 'Host-slider.zip' ),
					'easyseo'            => array( 'easyseo-whiteboard.zip', 'seo-rev-slider1.zip' ),
					'easysmall'          => array( 'easy-small-rev1.zip', 'seo-rev-slider1.zip', 'web-product-light-hero-3d4.zip', 'creative-freedom.zip' ),
					'easyconference'     => '',
					'easyapp'            => array( 'easy-app-showcase-carousel1.zip', 'easy-app-slider-rev1.zip' ),
					'easyseo2'           => array( 'seo2-rev-slider.zip' ),
					'remittal'           => array( '' ),
					'pax'                => array( 'pax-rev-slider1.zip', 'pax-rev-slider11.zip' ),
					'solace'             => array( '' ),
					'trust'              => array( '' ),
					'discovery'          => array( 'discovery-slider1.zip', 'discovery-slider2.zip' ),
					'forward'            => array( 'forward-slider1.zip' ),
					'agency2'            => '',
					'happypets'          => array( 'pets-rev-slider1.zip' ),
					'babysitter'         => array( 'deep-babysitter-main-slider.zip' ),
					'car-services'       => array( 'deep-car-services-main-slider.zip' ),
					'cryptocoin'         => '',
					'home-services'      => array( 'deep-home-services-slider.zip' ),
					'yorkpress'          => '',
					'gym'                => array( 'gym-home-slider.zip' ),
					'risotto-restaurant' => array( 'risotto-rev1.zip' ),
					'risotto-cafe'       => array( 'risotto-cafe-slider1.zip' ),
					'risotto-fastfood'   => array( 'risotto-fastfood-slider1.zip' ),
					'hotella-vienna'     => array( 'hotella-services-slider1.zip', 'vienna-slider2.zip', 'vienna-slider3.zip' ),
					'hotella-athens'     => array( 'hotella-rev-slider01.zip', 'hotella-services-slider1.zip' ),
					'hotella-rome'       => array( 'hotella-rome-slider11.zip' ),
					'hotella-madrid'     => '',
					'hosting'            => array( 'hosting-slider.zip' ),
					'petshop'            => array( 'petshop-slider.zip' ),
					'fastfood'           => array( 'fast-food-slider.zip' ),
					'dietitian'          => '',
					'corporate2'         => '',
					'housekeeping'       => array( 'housekeeping-slider.zip' ),
					'barber'             => array( 'barber-slider.zip' ),
					'carwash'            => array( 'carwash-slider.zip' ),
					'michigan-high-school' => array( 'madison-rev-slider1.zip' ),
					'kindergarten'       => array( 'excursions.zip', 'kids-rev-slider2.zip', 'kids-school-slider.zip' ),
					'michigan-college'   => array( 'michigan-rev-slider1.zip', 'michigan-rev-slider2.zip' ),
					'michigan-online-learning' => array( 'Home-2-slider.zip', 'home-6-extended-slider.zip' ),
					'sport'              => array( 'slider-1.zip' ),
				);
				// rev slider
				if ( array_key_exists( $demo_active_import[ $current_key ]['directory'], $wbc_sliders_array ) ) :
					$wbc_slider_imports = $wbc_sliders_array[ $demo_active_import[ $current_key ]['directory'] ];
					if ( is_array( $wbc_slider_imports ) ) :
						foreach ( $wbc_slider_imports as $wbc_slider_import ) :
							if ( file_exists( $demo_directory_path . $wbc_slider_import ) ) :
								$slider = new RevSlider();
								$slider->importSliderFromPost( true, true, $demo_directory_path . $wbc_slider_import );
							endif;
						endforeach;
					endif;
				endif;

			endif; // end Import slider(s)

			/**
			 * Import menu items icon
			 *
			 * @version 1.0.0
			*/
			if ( file_exists( $demo_directory_path . 'menu_icons.txt' ) ) {

				$file         = $demo_directory_path . 'menu_icons.txt';
				$data         = file_get_contents( $file );
				$demo_icons   = json_decode( $data, true );
				$menus        = wp_get_nav_menus();
				$menus_counts = sizeof( $menus );

				for ( $i = 0; $i < $menus_counts; $i++ ) {

					foreach ( wp_get_nav_menu_items( $menus[ $i ] ) as $menu_item ) {

						update_post_meta(
							$menu_item->ID,
							'_menu_item_icon',
							$demo_icons[ $menu_item->title ],
							''
						);

					}
				}
			}

		endif;

		/**
		 * Update Woocommerce Image Size
		 *
		 * @version 1.0.0
		*/
		if ( class_exists( 'Woocommerce' ) ) {
			update_option( 'woocommerce_thumbnail_cropping', 'uncropped' );
			update_option( 'woocommerce_thumbnail_image_width', '242' );
			update_option( 'woocommerce_single_image_width', '660' );
		}

		/**
		 * Update WP Hotel Booking Image Size
		 *
		 * @version 1.0.0
		*/
		if ( class_exists( 'WP_Hotel_Booking' ) ) {
			update_option( 'tp_hotel_booking_catalog_image_width', '470' );
			update_option( 'tp_hotel_booking_catalog_image_height', '470' );
		}

		/**
		 * Set  permaline on /%postname%/
		 *
		 * @author Webnus
		 * @version 1.0.0
		 */
		function wn_set_permalinks() {
			global $wp_rewrite;
			$wp_rewrite->set_permalink_structure( '/%postname%/' );
		}
		add_action( 'init', 'wn_set_permalinks' );

		/**
		 * Set  "no" value for beadcrumb
		 *
		 * @author Webnus
		 * @version 1.0.0
		*/
		$args  = array(
			'sort_order'   => 'asc',
			'sort_column'  => 'post_title',
			'hierarchical' => 1,
			'child_of'     => 0,
			'parent'       => -1,
			'post_type'    => 'page',
			'post_status'  => 'publish',
		);
		$pages = get_pages( $args );
		foreach ( $pages as $page ) {
			update_post_meta( $page->ID, 'deep_breadcrumb_meta', 'no' );
		}

	} // end deep_wbc_extended function

endif;

/**
 * Required plugins
 *
 * @author  Webnus
 */
function deep_demo_plugins( $demo_id ) {
	if ( ! defined( 'DEEPFREE' ) ) {
		$main_plugins = array(
			'js_composer',
			'kingcomposer',
			'kc_pro',
			'elementor',
			'contact-form-7',
		);
		$plugins_array = array(
			// Agency2
			'wbc-import-1'  => array_merge( $main_plugins, array( 'wp-pagenavi' ) ),
			// corporate
			'wbc-import-2'  => array_merge( $main_plugins, array( 'revslider', 'the-grid', 'webnus-portfolio', 'webnus-gallery', 'wp-pagenavi' ) ),
			// shop
			'wbc-import-3'  => array_merge( $main_plugins, array( 'revslider', 'the-grid', 'webnus-portfolio', 'webnus-gallery', 'woocommerce', 'variation-swatches-for-woocommerce', 'wp-pagenavi', 'yith-woocommerce-best-sellers', 'yith-woocommerce-compare', 'yith-woocommerce-quick-view', 'yith-woocommerce-wishlist' ) ),
			// crypto
			'wbc-import-4'  => array_merge( $main_plugins, array( 'go_pricing', 'revslider', 'the-grid', 'webnus-portfolio', 'webnus-gallery', 'modern-events-calendar-lite' ) ),
			// business
			'wbc-import-5'  => array_merge( $main_plugins, array( 'the-grid', 'webnus-portfolio', 'webnus-gallery' ) ),
			// minimal blog
			'wbc-import-6'  => array_merge( $main_plugins, array( 'wp-pagenavi' ) ),
			// events
			'wbc-import-7'  => array_merge( $main_plugins, array( 'modern-events-calendar-lite' ) ),
			// magazine
			'wbc-import-8'  => array_merge( $main_plugins, array( 'post-ratings', 'social-count-plus', 'wp-cloudy', 'wp-pagenavi' ) ),
			// photography
			'wbc-import-9'  => array_merge( $main_plugins, array( 'modulobox', 'the-grid', 'webnus-portfolio', 'webnus-gallery', 'wp-pagenavi' ) ),
			// portfolio
			'wbc-import-10' => array_merge( $main_plugins, array( 'modulobox', 'post-ratings', 'revslider', 'social-count-plus', 'the-grid', 'webnus-gallery', 'webnus-portfolio', 'wp-pagenavi' ) ),
			// buddypress
			'wbc-import-11' => array_merge( $main_plugins, array( 'buddypress', 'bbpress', 'bp-default-data', 'buddypress-media', 'bp-profile-search', 'buddy-community-stats', 'buddypress-followers', 'invite-anyone', 'social-articles', 'super-socializer', 'wp-ulike' ) ),
			// construction
			'wbc-import-12' => array_merge( $main_plugins, array( 'revslider', 'the-grid', 'modulobox', 'webnus-portfolio', 'webnus-gallery', 'wp-pagenavi' ) ),
			// church
			'wbc-import-13' => array_merge( $main_plugins, array( 'modern-events-calendar-lite', 'prayer-wall', 'revslider', 'webnus-causes', 'webnus-sermons', 'social-count-plus' ) ),
			// freelancer
			'wbc-import-14' => array_merge( $main_plugins, array( 'the-grid', 'webnus-gallery', 'webnus-portfolio', 'wp-pagenavi' ) ),
			// startup
			'wbc-import-15' => array_merge( $main_plugins, array( 'revslider' ) ),
			// charity
			'wbc-import-16' => array_merge( $main_plugins, array( 'modern-events-calendar-lite', 'webnus-gallery', 'webnus-causes', 'the-grid', 'webnus-portfolio', 'revslider', 'wp-pagenavi' ) ),
			// restaurant
			'wbc-import-17' => array_merge( $main_plugins, array( 'revslider', 'modern-events-calendar-lite', 'webnus-recipes', 'social-count-plus' ) ),
			// edge
			'wbc-import-18' => array_merge( $main_plugins, array( 'the-grid', 'webnus-portfolio', 'webnus-gallery' ) ),
			// wedding
			'wbc-import-19' => array_merge( $main_plugins, array( 'webnus-gallery', 'webnus-portfolio', 'modulobox', 'the-grid' ) ),
			// fashion
			'wbc-import-20' => array_merge( $main_plugins, array( 'mailchimp-for-wp', 'the-grid', 'webnus-portfolio', 'webnus-gallery' ) ),
			// web-design
			'wbc-import-21' => array_merge( $main_plugins, array( 'revslider', 'the-grid', 'webnus-portfolio', 'webnus-gallery' ) ),
			// app
			'wbc-import-22' => array_merge( $main_plugins, array( 'revslider' ) ),
			// personal-blog
			'wbc-import-23' => array_merge( $main_plugins, array( 'post-ratings', 'social-count-plus', 'wp-pagenavi' ) ),
			// dentist
			'wbc-import-24' => array_merge( $main_plugins, array( 'mailchimp-for-wp', 'revslider' ) ),
			// beauty
			'wbc-import-25' => array_merge( $main_plugins, array( 'the-grid', 'webnus-portfolio', 'webnus-gallery', 'revslider' ) ),
			// classic
			'wbc-import-26' => array_merge( $main_plugins, array( 'revslider', 'the-grid', 'webnus-portfolio', 'webnus-gallery', 'wp-pagenavi' ) ),
			// agency1
			'wbc-import-27' => array_merge( $main_plugins, array( 'social-count-plus', 'webnus-gallery', 'webnus-portfolio' ) ),
			// language school
			'wbc-import-28' => array_merge( $main_plugins, array( 'modern-events-calendar-lite', 'mailchimp-for-wp', 'revslider', 'mp-timetable' ) ),
			// cafe
			'wbc-import-29' => array_merge( $main_plugins, array( 'the-grid', 'webnus-portfolio', 'webnus-gallery' ) ),
			// patsitter
			'wbc-import-30' => array_merge( $main_plugins, array( '' ) ),
			// spa
			'wbc-import-31' => array_merge( $main_plugins, array( 'revslider' ) ),
			// mechanic
			'wbc-import-32' => array_merge( $main_plugins, array( '' ) ),
			// musician
			'wbc-import-33' => array_merge( $main_plugins, array( 'modern-events-calendar-lite' ) ),
			// consulting
			'wbc-import-34' => array_merge( $main_plugins, array( 'revslider', 'the-grid', 'webnus-portfolio', 'webnus-gallery' ) ),
			// furniture
			'wbc-import-35' => array_merge( $main_plugins, array( 'revslider', 'the-grid', 'webnus-portfolio', 'webnus-gallery' ) ),
			// insurance
			'wbc-import-36' => array_merge( $main_plugins, array( '' ) ),
			// product-landing
			'wbc-import-37' => array_merge( $main_plugins, array( 'revslider', 'devvn-image-hotspot' ) ),
			// real estate
			'wbc-import-38' => array_merge( $main_plugins, array( 'revslider', 'the-grid', 'webnus-portfolio', 'wp-pagenavi', 'webnus-gallery' ) ),
			// health
			'wbc-import-39' => array_merge( $main_plugins, array( 'mailchimp-for-wp', 'revslider', 'webnus-time-table', 'mp-timetable' ) ),
			// architect
			'wbc-import-40' => array_merge( $main_plugins, array( 'revslider', 'the-grid', 'webnus-portfolio', 'modulobox', 'webnus-gallery' ) ),
			// software
			'wbc-import-41' => array_merge( $main_plugins, array( '' ) ),
			// boutique
			'wbc-import-42' => array_merge( $main_plugins, array( 'revslider', 'the-grid', 'woocommerce', 'webnus-portfolio', 'webnus-gallery', 'variation-swatches-for-woocommerce', 'yith-woocommerce-compare', 'yith-woocommerce-quick-view', 'yith-woocommerce-wishlist' ) ),
			// lawyer
			'wbc-import-43' => array_merge( $main_plugins, array( 'revslider' ) ),
			// travel
			'wbc-import-44' => array_merge( $main_plugins, array( 'mailchimp-for-wp' ) ),
			// RTL magazine
			'wbc-import-45' => array_merge( $main_plugins, array( 'post-ratings', 'social-count-plus', 'wp-cloudy', 'wp-pagenavi' ) ),
			// Coming Soon
			'wbc-import-46' => array_merge( $main_plugins, array( '' ) ),
			// cosmetic
			'wbc-import-47' => array_merge( $main_plugins, array( 'revslider', 'woocommerce', 'yith-woocommerce-compare', 'yith-woocommerce-quick-view', 'yith-woocommerce-wishlist' ) ),
			// Yoga
			'wbc-import-48' => array_merge( $main_plugins, array( 'revslider', 'mp-timetable' ) ),
			// CV
			'wbc-import-49' => array_merge( $main_plugins, array( 'the-grid', 'webnus-portfolio', 'webnus-gallery' ) ),
			// CAR
			'wbc-import-50' => array_merge( $main_plugins, array( 'revslider', 'woocommerce', 'yith-woocommerce-compare', 'yith-woocommerce-quick-view', 'yith-woocommerce-wishlist' ) ),
			// SEO
			'wbc-import-51' => array_merge( $main_plugins, array( 'revslider', 'tablepress', 'the-grid', 'webnus-portfolio', 'webnus-gallery', 'wp-pagenavi', 'cf7-ui-slider' ) ),
			// Easydesign
			'wbc-import-52' => array_merge( $main_plugins, array( 'revslider', 'the-grid', 'webnus-portfolio', 'webnus-gallery', 'social-count-plus' ) ),
			// Easyhost
			'wbc-import-53' => array_merge( $main_plugins, array( 'revslider', 'the-grid', 'webnus-portfolio', 'webnus-gallery', 'tablepress', 'wp-domain-checker' ) ),
			// Easyseo
			'wbc-import-54' => array_merge( $main_plugins, array( 'revslider', 'the-grid', 'webnus-portfolio', 'webnus-gallery', 'tablepress', 'wp-domain-checker' ) ),
			// Easysmall
			'wbc-import-55' => array_merge( $main_plugins, array( 'revslider', 'the-grid', 'webnus-portfolio', 'webnus-gallery', 'wp-pagenavi' ) ),
			// Easyconference
			'wbc-import-56' => array_merge( $main_plugins, array( '' ) ),
			// Easyapp
			'wbc-import-57' => array_merge( $main_plugins, array( 'revslider' ) ),
			// EasySeo2
			'wbc-import-58' => array_merge( $main_plugins, array( 'revslider', 'the-grid', 'webnus-portfolio', 'webnus-gallery', 'wp-pagenavi', 'tablepress', 'woocommerce', 'wp-domain-checker', 'social-count-plus' ) ),
			// Remittal
			'wbc-import-59' => array_merge( $main_plugins, array( 'LayerSlider', 'modern-events-calendar-lite', 'the-grid', 'webnus-portfolio', 'webnus-gallery', 'social-count-plus', 'webnus-causes', 'webnus-sermons', 'woocommerce', 'variation-swatches-for-woocommerce', 'yith-woocommerce-best-sellers', 'yith-woocommerce-compare', 'yith-woocommerce-quick-view', 'yith-woocommerce-wishlist', 'wp-pagenavi' ) ),
			// Pax
			'wbc-import-60' => array_merge( $main_plugins, array( 'modern-events-calendar-lite', 'revslider', 'social-count-plus', 'the-grid', 'webnus-portfolio', 'webnus-gallery', 'webnus-causes', 'webnus-sermons', 'woocommerce', 'wp-pagenavi' ) ),
			// Solace
			'wbc-import-61' => array_merge( $main_plugins, array( 'modern-events-calendar-lite', 'social-count-plus', 'the-grid', 'webnus-portfolio', 'webnus-gallery', 'webnus-causes', 'webnus-sermons', 'wp-pagenavi' ) ),
			// Trust
			'wbc-import-62' => array_merge( $main_plugins, array( 'LayerSlider', 'modern-events-calendar-lite', 'the-grid', 'webnus-portfolio', 'webnus-gallery', 'webnus-causes', 'webnus-sermons' ) ),
			// Discovery
			'wbc-import-63' => array_merge( $main_plugins, array( 'modern-events-calendar-lite', 'revslider', 'the-grid', 'webnus-portfolio', 'webnus-gallery', 'webnus-causes', 'webnus-sermons', 'prayer-wall', 'wp-pagenavi', 'social-count-plus' ) ),
			// Forward
			'wbc-import-64' => array_merge( $main_plugins, array( 'modern-events-calendar-lite', 'revslider', 'the-grid', 'webnus-portfolio', 'webnus-gallery', 'webnus-causes', 'webnus-sermons', 'prayer-wall', 'wp-pagenavi', 'social-count-plus' ) ),
			// happypets
			'wbc-import-65' => array_merge( $main_plugins, array( 'wp-pagenavi', 'webnus-gallery', 'the-grid', 'social-count-plus', 'LayerSlider', 'revslider', 'modern-events-calendar-lite' ) ),
			// babysitter
			'wbc-import-66' => array_merge( $main_plugins, array( 'webnus-review', 'revslider' ) ),
			// car-services
			'wbc-import-67' => array_merge( $main_plugins, array( 'webnus-review', 'revslider' ) ),
			// cryptocoin
			'wbc-import-68' => array_merge( $main_plugins, array( 'the-grid', 'go_pricing', 'modern-events-calendar-lite', 'webnus-portfolio', 'webnus-gallery' ) ),
			// home-services
			'wbc-import-69' => array_merge( $main_plugins, array( 'webnus-review', 'revslider' ) ),
			// yorkpress
			'wbc-import-70' => array_merge( $main_plugins, array( 'wp-postviews', 'wp-pagenavi', 'woocommerce' ) ),
			// Gym
			'wbc-import-71' => array_merge( $main_plugins, array( 'mailchimp-for-wp', 'revslider', 'tablepress', 'mp-timetable', 'the-grid', 'webnus-portfolio', 'webnus-gallery', 'wp-pagenavi', 'woocommerce', 'yith-woocommerce-best-sellers', 'yith-woocommerce-compare', 'yith-woocommerce-quick-view', 'yith-woocommerce-wishlist' ) ),
			// Risotto Restaurant
			'wbc-import-72' => array_merge( $main_plugins, array( 'modern-events-calendar-lite', 'revslider', 'the-grid', 'webnus-portfolio', 'webnus-gallery', 'webnus-recipes', 'wp-pagenavi' ) ),
			// Risotto Cafe
			'wbc-import-73' => array_merge( $main_plugins, array( 'modern-events-calendar-lite', 'modulobox', 'revslider', 'the-grid', 'webnus-portfolio', 'webnus-gallery' ) ),
			// Risotto Fastfood
			'wbc-import-74' => array_merge( $main_plugins, array( 'revslider', 'the-grid', 'webnus-portfolio', 'webnus-gallery' ) ),
			// Hotella Vienna
			'wbc-import-75' => array_merge( $main_plugins, array( 'revslider', 'modern-events-calendar-lite', 'social-count-plus', 'the-grid', 'webnus-review', 'webnus-portfolio', 'webnus-gallery', 'woocommerce', 'wp-cloudy', 'wp-hotel-booking', 'wp-hotel-booking-coupon', 'wp-hotel-booking-woocommerce', 'wp-pagenavi', 'wp-postratings' ) ),
			// Hotella Athens
			'wbc-import-76' => array_merge( $main_plugins, array( 'revslider', 'modern-events-calendar-lite', 'the-grid', 'webnus-review', 'webnus-portfolio', 'webnus-gallery', 'woocommerce', 'wp-hotel-booking', 'wp-hotel-booking-coupon', 'wp-hotel-booking-woocommerce' ) ),
			// Hotella Rome
			'wbc-import-77' => array_merge( $main_plugins, array( 'revslider', 'modern-events-calendar-lite', 'social-count-plus', 'the-grid', 'webnus-review', 'webnus-portfolio', 'webnus-gallery', 'woocommerce', 'wp-hotel-booking', 'wp-hotel-booking-coupon', 'wp-hotel-booking-woocommerce', 'wp-pagenavi', 'wp-postratings' ) ),
			// Hotella Madrid
			'wbc-import-78' => array_merge( $main_plugins, array( 'revslider', 'modern-events-calendar-lite', 'modulobox', 'the-grid', 'webnus-review', 'webnus-portfolio', 'webnus-gallery', 'woocommerce', 'wp-cloudy', 'wp-hotel-booking', 'wp-hotel-booking-coupon', 'wp-hotel-booking-woocommerce', 'wp-pagenavi', 'wp-postratings' ) ),
			// Hosting
			'wbc-import-79' => array_merge( $main_plugins, array( 'revslider', 'tablepress', 'wp-pagenavi', 'wp-postratings', 'wp-domain-checker' ) ),
			// Petshop
			'wbc-import-80' => array_merge( $main_plugins, array( 'revslider', 'wp-pagenavi', 'wp-postratings', 'yith-woocommerce-quick-view', 'yith-woocommerce-wishlist', 'woocommerce', 'woocommerce-services' ) ),
			// Fastfood
			'wbc-import-81' => array_merge( $main_plugins, array( 'revslider', 'wp-pagenavi', 'wp-postratings', 'webnus-gallery', 'the-grid', 'webnus-recipes' ) ),
			// Dietitian
			'wbc-import-82' => array_merge( $main_plugins, array( 'wp-pagenavi', 'wp-postratings', 'webnus-recipes' ) ),
			// Corporate2
			'wbc-import-83' => array_merge( $main_plugins, array( 'wp-pagenavi', 'wp-postratings' ) ),
			// Perfume
			'wbc-import-84' => array_merge( $main_plugins, array( 'wp-pagenavi', 'wp-postratings', 'woocommerce', 'yith-woocommerce-wishlist', 'yith-woocommerce-quick-view' ) ),
			// Housekeeping
			'wbc-import-85' => array_merge( $main_plugins, array( 'wp-pagenavi', 'wp-postratings', 'webnus-review', 'revslider' ) ),
			// Carwash
			'wbc-import-86' => array_merge( $main_plugins, array( 'wp-pagenavi', 'wp-postratings', 'webnus-review', 'revslider', 'webnus-gallery', 'the-grid' ) ),
			// Barber
			'wbc-import-87' => array_merge( $main_plugins, array( 'wp-pagenavi', 'wp-postratings', 'revslider', 'webnus-gallery', 'the-grid' ) ),
			// Club
			'wbc-import-88' => array_merge( $main_plugins, array( 'wp-pagenavi', 'wp-postratings', 'webnus-gallery', 'the-grid', 'modern-events-calendar-lite' ) ),
			// Michigan High School
			'wbc-import-89' => array_merge( $main_plugins, array( 'webnus-gallery', 'the-grid', 'modern-events-calendar-lite', 'revslider' ) ),
			// Michigan Kindergarten
			'wbc-import-90' => array_merge( $main_plugins, array( 'wp-pagenavi', 'wp-postratings', 'webnus-gallery', 'the-grid', 'modern-events-calendar-lite', 'revslider', 'mp-timetable', 'lifterlms' ) ),
			// Michigan College
			'wbc-import-91' => array_merge( $main_plugins, array( 'webnus-gallery', 'the-grid', 'modern-events-calendar-lite', 'revslider', 'lifterlms', 'webnus-causes', 'woocommerce', 'wp-pagenavi' ) ),
			// Michigan Online Learning
			'wbc-import-92' => array_merge( $main_plugins, array( 'webnus-gallery', 'the-grid', 'modern-events-calendar-lite', 'revslider', 'buddypress', 'bbpress', 'lifterlms', 'wp-pagenavi', 'wp-postratings' ) ),
			// Sport
			'wbc-import-93' => array_merge( $main_plugins, array( 'revslider', 'modern-events-calendar-lite', 'mec-fluent-layouts' ) ),
			// Events Business
			'wbc-import-94' => array_merge( $main_plugins, array( 'modern-events-calendar-lite', 'mec-fluent-layouts' ) ),
			// Conference
			'wbc-import-95' => array_merge( $main_plugins, array( 'modern-events-calendar-lite', 'mec-fluent-layouts' ) ),			
			// Church2
			'wbc-import-96' => array_merge( $main_plugins, array( 'modern-events-calendar-lite', 'mec-fluent-layouts' ) ),
		);
	} else {
		$main_plugins = array(
			'elementor',
			'contact-form-7',
		);
		$plugins_array = array(
			// Agency2
			'wbc-import-1'  => array_merge( $main_plugins, array( 'wp-pagenavi' ) ),
			// magazine
			'wbc-import-2'  => array_merge( $main_plugins, array( 'post-ratings', 'social-count-plus', 'wp-cloudy', 'wp-pagenavi' ) ),
			// personal-blog
			'wbc-import-3'	=> array_merge( $main_plugins, array( 'social-count-plus', 'wp-pagenavi' ) ),
			// minimal blog
			'wbc-import-4'	=> array_merge( $main_plugins, array( 'wp-pagenavi' ) ),
			// yorkpress
			'wbc-import-5'	=> array_merge( $main_plugins, array( 'wp-postviews', 'wp-pagenavi', 'woocommerce' ) ),
		);
	}
	return $plugins_array[ $demo_id ];
}

/**
 * Post types
 *
 * @author  Webnus
 */
function deep_importer_post_types( $demo_id ) {
	$main_post_types = array( 'pages', 'posts', 'contact forms', );

	if ( ! defined( 'DEEPFREE' ) ) {
		$post_types_array = array(
			// Agency2
			'wbc-import-1'  => array_merge( $main_post_types, array() ),
			// corporate
			'wbc-import-2'  => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// shop
			'wbc-import-3'  => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// crypto
			'wbc-import-4'  => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// business
			'wbc-import-5'  => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// minimal blog
			'wbc-import-6'  => array_merge( $main_post_types, array() ),
			// events
			'wbc-import-7'  => array_merge( $main_post_types, array() ),
			// magazine
			'wbc-import-8'  => array_merge( $main_post_types, array() ),
			// photography
			'wbc-import-9'  => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// portfolio
			'wbc-import-10' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// buddypress
			'wbc-import-11' => array_merge( $main_post_types, array() ),
			// construction
			'wbc-import-12' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// church
			'wbc-import-13' => array_merge( $main_post_types, array() ),
			// freelancer
			'wbc-import-14' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// startup
			'wbc-import-15' => array_merge( $main_post_types, array() ),
			// charity
			'wbc-import-16' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// restaurant
			'wbc-import-17' => array_merge( $main_post_types, array() ),
			// edge
			'wbc-import-18' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// wedding
			'wbc-import-19' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// fashion
			'wbc-import-20' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// web-design
			'wbc-import-21' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// app
			'wbc-import-22' => array_merge( $main_post_types, array() ),
			// personal-blog
			'wbc-import-23' => array_merge( $main_post_types, array() ),
			// dentist
			'wbc-import-24' => array_merge( $main_post_types, array() ),
			// beauty
			'wbc-import-25' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// classic
			'wbc-import-26' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// agency1
			'wbc-import-27' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// language school
			'wbc-import-28' => array_merge( $main_post_types, array() ),
			// cafe
			'wbc-import-29' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// patsitter
			'wbc-import-30' => array_merge( $main_post_types, array() ),
			// spa
			'wbc-import-31' => array_merge( $main_post_types, array() ),
			// mechanic
			'wbc-import-32' => array_merge( $main_post_types, array() ),
			// musician
			'wbc-import-33' => array_merge( $main_post_types, array() ),
			// consulting
			'wbc-import-34' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// furniture
			'wbc-import-35' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// insurance
			'wbc-import-36' => array_merge( $main_post_types, array() ),
			// product-landing
			'wbc-import-37' => array_merge( $main_post_types, array() ),
			// real estate
			'wbc-import-38' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// health
			'wbc-import-39' => array_merge( $main_post_types, array() ),
			// architect
			'wbc-import-40' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// software
			'wbc-import-41' => array_merge( $main_post_types, array() ),
			// boutique
			'wbc-import-42' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// lawyer
			'wbc-import-43' => array_merge( $main_post_types, array() ),
			// travel
			'wbc-import-44' => array_merge( $main_post_types, array() ),
			// RTL magazine
			'wbc-import-45' => array_merge( $main_post_types, array() ),
			// Coming Soon
			'wbc-import-46' => array_merge( $main_post_types, array() ),
			// cosmetic
			'wbc-import-47' => array_merge( $main_post_types, array() ),
			// yoga
			'wbc-import-48' => array_merge( $main_post_types, array() ),
			// CV
			'wbc-import-49' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// CAR
			'wbc-import-50' => array_merge( $main_post_types, array() ),
			// SEO
			'wbc-import-51' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// Easydesign
			'wbc-import-52' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// Easyhost
			'wbc-import-53' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// Easyseo
			'wbc-import-54' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// Easysmall
			'wbc-import-55' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// Easyconference
			'wbc-import-56' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// Easyapp
			'wbc-import-57' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// Easyseo2
			'wbc-import-58' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// Remittal
			'wbc-import-59' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// Pax
			'wbc-import-60' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// Solace
			'wbc-import-61' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// Trust
			'wbc-import-62' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// Discovery
			'wbc-import-63' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// Forward
			'wbc-import-64' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// happypets
			'wbc-import-65' => array_merge( $main_post_types, array() ),
			// babysitter
			'wbc-import-66' => array_merge( $main_post_types, array() ),
			// car-services
			'wbc-import-67' => array_merge( $main_post_types, array() ),
			// cryptocoin
			'wbc-import-68' => array_merge( $main_post_types, array() ),
			// Home Services
			'wbc-import-69' => array_merge( $main_post_types, array() ),
			// yorkpress
			'wbc-import-70' => array_merge( $main_post_types, array() ),
			// Gym
			'wbc-import-71' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// Risotto Restaurant
			'wbc-import-72' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// Risotto Cafe
			'wbc-import-73' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// Risotto Fastfood
			'wbc-import-74' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// Hotella Vienna
			'wbc-import-75' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// Hotella Athens
			'wbc-import-76' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// Hotella Rome
			'wbc-import-77' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// Hotella Madrid
			'wbc-import-78' => array_merge( $main_post_types, array( 'portfolios + galleries' ) ),
			// Hosting
			'wbc-import-79' => array_merge( $main_post_types, array() ),
			// Petshop
			'wbc-import-80' => array_merge( $main_post_types, array() ),
			// Fastfood
			'wbc-import-81' => array_merge( $main_post_types, array() ),
			// Dietitian
			'wbc-import-82' => array_merge( $main_post_types, array() ),
			// corporate2
			'wbc-import-83' => array_merge( $main_post_types, array() ),
			// Perfume
			'wbc-import-84' => array_merge( $main_post_types, array() ),
			// Housekeeping
			'wbc-import-85' => array_merge( $main_post_types, array() ),
			// Carwash
			'wbc-import-86' => array_merge( $main_post_types, array() ),
			// Barber
			'wbc-import-87' => array_merge( $main_post_types, array() ),
			// Club
			'wbc-import-88' => array_merge( $main_post_types, array() ),
			// Michigan High School
			'wbc-import-89' => array_merge( $main_post_types, array() ),
			// Michigan Kindergarten
			'wbc-import-90' => array_merge( $main_post_types, array() ),
			// Michigan College
			'wbc-import-91' => array_merge( $main_post_types, array() ),
			// Michigan Online Learning
			'wbc-import-92' => array_merge( $main_post_types, array() ),
			// Sport
			'wbc-import-93' => array_merge( $main_post_types, array() ),
			// Events Business
			'wbc-import-94' => array_merge( $main_post_types, array() ),
			// Conference
			'wbc-import-95' => array_merge( $main_post_types, array() ),
			// Church2
			'wbc-import-96' => array_merge( $main_post_types, array() ),
		);
	} else {
		$post_types_array = array(
			// Agency2
			'wbc-import-1'  => array_merge( $main_post_types, array() ),
			// magazine
			'wbc-import-2'  => array_merge( $main_post_types, array() ),
			// personal-blog
			'wbc-import-3' => array_merge( $main_post_types, array() ),
			// minimal blog
			'wbc-import-4'  => array_merge( $main_post_types, array() ),
			// yorkpress
			'wbc-import-5' => array_merge( $main_post_types, array() ),
		);
	}
	return $post_types_array[ $demo_id ];
}
