<?php
class DeepWPBakeryImageCarousel extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryImageCarousel
	 */
	public static $instance;

	private $style_type;

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
		add_shortcode( 'imagecarousel', array( $this, 'output' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
		add_action( 'wp_head', function() {
			echo '<script>var deep_image_carousel = {}; </script>';
		});
	}

	/**
	 * Shortcode Output.
	 *
	 *
	 * @since   1.0.0
	 */
	public function output( $atts, $content = null ) {		
		extract(
			shortcode_atts(
				array(
					'image_item_t3'  => '',
					'image_item'     => '',
					'item_carousle'  => '',
					'type'           => 'type1',
					'shortcodeclass' => '',
					'shortcodeid'    => '',
				),
				$atts
			)
		);

		switch ( $type ) {
			case 'type1':
				$style_type = 'type1';
				break;
			case 'type2':
				$style_type = 'type2';
				break;
			case 'type3':
				$style_type = 'type3';
				break;
			case 'type4':
				$style_type = 'type4';
				break;
		}

		$shortcodeclass = $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid    = $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

		
		$this->style_type  = $style_type;
		
		wp_enqueue_style( 'wn-deep-image-carousel' . $style_type, DEEP_ASSETS_URL . 'css/frontend/image-carousel/image-carousel' . $style_type . '.css' );
		add_action( 'wp_footer', function() use($style_type) {
			echo '<script>
			var element = document.getElementById("wn-deep-image-carousel'.$style_type.'-css");
			if(element && !deep_image_carousel["wn-deep-image-carousel'.$style_type.'-css"]) {
				deep_image_carousel["wn-deep-image-carousel'.$style_type.'-css"] = true;
				var wrap = document.createElement("div");
				wrap.appendChild(element.cloneNode(true));
				document.getElementsByTagName("head")[0].innerHTML = document.getElementsByTagName("head")[0].innerHTML + wrap.innerHTML;
				if(element.parentNode) {
					element.parentNode.removeChild(element);
				} else {
					element.remove(element);
				}
			}
			</script>';	
		}, 100);

		include_once ABSPATH . 'wp-admin/includes/plugin.php';
		$image_item_data = array();
		// Fetch Carousle Item Loop Variables
		if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
			$image_item = (array) vc_param_group_parse_atts( $image_item );
			foreach ( $image_item as $data ) {
				$new_line          = $data;
				$new_line['image'] = isset( $new_line['image'] ) ? $new_line['image'] : '';
				$image_item_data[] = $new_line;
			}
		} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) && ( is_array( $image_item ) || is_object( $image_item ) ) ) {
			foreach ( $atts['image_item'] as $key => $item ) {
				$new_line          = $item;
				$new_line->image   = isset( $new_line->image ) ? $new_line->image : '';
				$image_item_data[] = $new_line;
			}
		}

		if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
			// Fetch Carousle Item Loop Variables Type3
			$image_item_t3      = (array) vc_param_group_parse_atts( $image_item_t3 );
			$image_item_t3_data = array();

			foreach ( $image_item_t3 as $data ) {
				$new_line             = $data;
				$new_line['image_t3'] = isset( $new_line['image_t3'] ) ? $new_line['image_t3'] : '';
				$new_line['title_t3'] = isset( $new_line['title_t3'] ) ? $new_line['title_t3'] : '';
				$image_item_t3_data[] = $new_line;
			}
		} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) && ( is_array( $image_item_t3 ) || is_object( $image_item_t3 ) ) ) {
			$image_item_t3_data = array();

			foreach ( $atts['image_item_t3'] as $key => $data ) {
				$new_line             = $data;
				$new_line->image_t3   = isset( $new_line->image_t3 ) ? $new_line->image_t3 : '';
				$new_line->title_t3   = isset( $new_line->title_t3 ) ? $new_line->title_t3 : '';
				$image_item_t3_data[] = $new_line;
			}
		}

		$item_carousle = $item_carousle ? $item_carousle : '3';

		// Render
		if ( $type == 'type1' ) {
			$out = '
			<div class="clearfix ' . $shortcodeclass . '"  ' . $shortcodeid . ' >
				<div class="container">
					<div class="w-image-carousel owl-carousel owl-theme" data-items="' . $item_carousle . '" >';
			foreach ( $image_item_data as $line ) {
				if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
					$image_info    = is_numeric( $line['image'] ) ? wp_get_attachment_metadata( $line['image'] ) : '';
					$line['image'] = is_numeric( $line['image'] ) ? wp_get_attachment_url( $line['image'] ) : $line['image'];
					$line['image'] = $line['image'] ? '<img src="' . $line['image'] . '" alt="' . $image_info['file'] . '">' : '';

					$out .= '
								<div class="services-carousel">
									' . $line['image'] . '
								</div>';
				} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
					$image_info  = is_numeric( $line->image ) ? wp_get_attachment_metadata( $line->image ) : '';
					$line->image = is_numeric( $line->image ) ? wp_get_attachment_url( $line->image ) : $line->image;
					$line->image = $line->image ? '<img src="' . $line->image . '" alt="' . $image_info['file'] . '">' : '';

					$out .= '
								<div class="services-carousel">
									' . $line->image . '
								</div>';
				}
			}
			$out .= '
					</div>
				</div>
			</div>';
		} elseif ( $type == 'type2' ) {
			$out = '
			<div class="clearfix ' . $shortcodeclass . '"  ' . $shortcodeid . ' >
				<div class="container">
					<div class="wn-vertical-carousel w-image-carousel-type2 owl-carousel owl-theme">';
			foreach ( $image_item_data as $line ) {
				if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
					$image_info    = is_numeric( $line['image'] ) ? wp_get_attachment_metadata( $line['image'] ) : '';
					$line['image'] = is_numeric( $line['image'] ) ? wp_get_attachment_url( $line['image'] ) : $line['image'];
					$line['image'] = $line['image'] ? '<img src="' . $line['image'] . '" alt="' . $image_info['file'] . '">' : '';

					$out .= '
								<div class="services-carousel">
									' . $line['image'] . '
								</div>';
				} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
					$image_info  = is_numeric( $line->image ) ? wp_get_attachment_metadata( $line->image ) : '';
					$line->image = is_numeric( $line->image ) ? wp_get_attachment_url( $line->image ) : $line->image;
					$line->image = $line->image ? '<img src="' . $line->image . '" alt="' . $image_info['file'] . '">' : '';

					$out .= '
								<div class="services-carousel">
									' . $line->image . '
								</div>';
				}
			}
			$out .= '
					</div>
				</div>
			</div>';
		} elseif ( $type == 'type3' ) {
			$out = '
			<div class="clearfix ' . $shortcodeclass . '"  ' . $shortcodeid . ' >
				<div class="container">
					<div class="colorb">
						<div class="wn-vertical-carousel w-image-carousel-type3 owl-carousel owl-theme">';
			foreach ( $image_item_t3_data as $line ) {
				if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
					$image_info       = is_numeric( $line['image_t3'] ) ? wp_get_attachment_metadata( $line['image_t3'] ) : '';
					$line['image_t3'] = is_numeric( $line['image_t3'] ) ? wp_get_attachment_url( $line['image_t3'] ) : $line['image_t3'];
					$line['image_t3'] = $line['image_t3'] ? '<img src="' . $line['image_t3'] . '" alt="' . $image_info['file'] . '">' : '';

					$out .= '
									<div class="services-carousel">
										' . $line['image_t3'] . '
										<span class="image-title">' . $line['title_t3'] . '</span>
									</div>';
				} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
					$image_info     = is_numeric( $line->image_t3 ) ? wp_get_attachment_metadata( $line->image_t3 ) : '';
					$line->image_t3 = is_numeric( $line->image_t3 ) ? wp_get_attachment_url( $line->image_t3 ) : $line->image_t3;
					$line->image_t3 = $line->image_t3 ? '<img src="' . $line->image_t3 . '" alt="' . $image_info['file'] . '">' : '';

					$out .= '
									<div class="services-carousel">
										' . $line->image_t3 . '
										<span class="image-title">' . $line->title_t3 . '</span>
									</div>';
				}
			}

				$out .= '
						</div>
					</div>
				</div>
			</div>';
		} elseif ( $type == 'type4' ) {
			$out = '
			<div class="clearfix ' . $shortcodeclass . '"  ' . $shortcodeid . ' >
				<div class="container">
						<div class="wn-vertical-carousel w-image-carousel-type4 owl-carousel owl-theme">';
			foreach ( $image_item_data as $line ) {
				if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
					$image_info    = is_numeric( $line['image'] ) ? wp_get_attachment_metadata( $line['image'] ) : '';
					$line['image'] = is_numeric( $line['image'] ) ? wp_get_attachment_url( $line['image'] ) : $line['image'];
					$line['image'] = $line['image'] ? '<img src="' . $line['image'] . '" alt="' . $image_info['file'] . '">' : '';

					$out .= '
									<div class="services-carousel">
										' . $line['image'] . '
									</div>';
				} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
					$image_info  = is_numeric( $line->image ) ? wp_get_attachment_metadata( $line->image ) : '';
					$line->image = is_numeric( $line->image ) ? wp_get_attachment_url( $line->image ) : $line->image;
					$line->image = $line->image ? '<img src="' . $line->image . '" alt="' . $image_info . '">' : '';

					$out .= '
									<div class="services-carousel">
										' . $line->image . '
									</div>';
				}
			}
				$out .= '
					</div>
				</div>
			</div>';
		}
		return $out;

	}	

	/**
	 * Required scripts.
	 *
	 * @since   1.0.0
	 */
	public function scripts() {
		if ( self::used_shortcode_in_page( 'imagecarousel' ) ) {
			wp_enqueue_style( 'wn-deep-image-carousel0', DEEP_ASSETS_URL . 'css/frontend/image-carousel/image-carousel0.css' );			
		}
	}

} DeepWPBakeryImageCarousel::get_instance();

