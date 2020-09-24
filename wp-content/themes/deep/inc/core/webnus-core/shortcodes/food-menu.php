<?php
class DeepWPBakeryFoodMenu extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryFoodMenu
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
		add_shortcode( 'food_menu', array( $this, 'output' ) );
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
			'type'		  		=> '1',
			'img'		  		=> '',
			'title'		  		=> '',
			'price'		  		=> '$10',
			'description' 		=> '',
			'ingredients' 		=> '',
			'food_menu2'  		=> '',
			'price_color' 		=> '',
			'shortcodeclass' 	=> '',
			'shortcodeid' 	 	=> '',
		), $atts));		
		
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		
		// Class & ID 
		$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

		$food_menu2_data = array();
		static $uniqid = 0;
		$uniqid++;
		$live_page_builders_css = '';
		if( ! empty( $img ) ) {
			if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
				require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
			}
			if( is_numeric( $img ) ) {
				$url = wp_get_attachment_url( $img );
			}
			if ( $type == 1 ) {
				$arr = array( '200', '200' );
			} elseif ( $type == 3 ) {
				$arr = array( '58', '58' );
			} elseif ( $type == 4 ) {
				$arr = array( '500', '500' );
			} elseif ( $type == 5 ) {
				$arr = array( '136', '136' );
			}
			$image = new Wn_Img_Maniuplate; // instance from settor class
			$img = $image->m_image( $img, $url , $arr['0'] , $arr['1'] ); // set required and get result
		}
		$out  = '';

			switch ( $type ) :
				// type 1 or 3 or 4 or 5
				case '1':
				case '3':
				case '4':
					$ingredients_data = '';
					if ( $type == 1 ) : 
						if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
							$ingredients = (array) vc_param_group_parse_atts( $ingredients );
							foreach ( $ingredients as $data ) :
								$ingredients_data .= isset( $data['ingredient'] ) ? $data['ingredient'] . '<br>' : '';
							endforeach;
						} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) && (is_array($ingredients) || is_object($ingredients)) ) {
							foreach( $atts['ingredients'] as $key => $item ){
								$ingredients_data .= isset( $item->ingredient ) ? $item->ingredient . '<br>' : '';
							}
						}
						$ingredients_data = '<p>' . wp_kses( $ingredients_data, array( 'br' => array() ) ) . '</p>';
						$menu_class = 'menu-dts-'.$type;
					else :
						$description = $description ? '<div class="w' . $type . '-menu-dts">' . $description . '</div>' : '';
						$menu_class = 'w' . $type . '-menu-top';
					endif;
					$out .= '
					<div class="food-menu-w' . $type . ' ' . $shortcodeclass . '"  ' . $shortcodeid . ' >
						<img src="' . esc_url( $img ) . '" alt="' . esc_html( $title ) . '">
						<div class="' . $menu_class . ' space">
							<h3>' . esc_html( $title ) . '</h3>
							<h5>' . esc_html( $price ) . '</h5>
							' . $ingredients_data . '
						</div>
						' . $description . '
					</div>';
				break;

				case '5':
					$menu_class = 'menu-dts-'.$type ;
					$out .= '
					<div class="food-menu-w' . $type . ' colorb ' . $shortcodeclass . '"  ' . $shortcodeid . ' >
						<div class="' . $menu_class . '">
							<h3>' . esc_html( $title ) . '</h3>
							<h5>' . esc_html( $price ) . '</h5>
						</div>
						<div class="border-' . $type . ' ">	 
							<img src="' . esc_url( $img ) . '" alt="' . esc_html( $title ) . '" class="fmt-5">
						</div>
						<div class="background-5">
							<p><strong>' . esc_html( $title ) . ' ingredients: </strong>' . $description . '</p>
						</div>
					</div>';
				break;
				// type 2
				case '2':
					if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
						$food_menu2 = (array) vc_param_group_parse_atts( $food_menu2 );
						foreach ( $food_menu2 as $data ) :
							$new_line = $data;
							$new_line['title'] = isset( $data['title'] ) ? $data['title'] : '';
							$new_line['price'] = isset( $data['price'] ) ? $data['price'] : '';
							$new_line['tp_color'] = isset( $data['tp_color'] ) ? ' .food-menu-w' . $type . '.food-menu-w2-' . $uniqid . ', .food-menu-w' . $type . '.food-menu-w2-' . $uniqid . ' .fm-w2-name { background :'.$data['tp_color'].';} .food-menu-w' . $type . '.food-menu-w2-' . $uniqid . ' .fm-w2-price { background :'.$data['tp_color'].';}':'';
							$new_line['description'] = isset( $data['description'] ) ? $data['description'] : '';
							$new_line['food_style'] = isset( $data['food_style'] ) && $data['food_style'] == 'featured-w2' ? ' colorr ' . $data['food_style'] : '';
							$new_line['featured_text'] = isset( $data['featured_text'] ) ? $data['featured_text'] : '';
							$food_menu2_data[] = $new_line;
						endforeach;
					} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) && (is_array($food_menu2) || is_object($food_menu2)) ) {
						array_shift($atts['food_menu2']);
						foreach( $atts['food_menu2'] as $key => $data ){
							$new_line = $data;
							$new_line->title = isset( $data->title ) ? $data->title : '';
							$new_line->price = isset( $data->price ) ? $data->price : '';
							$new_line->tp_color = isset( $data->tp_color ) ? ' .food-menu-w2-' . $uniqid . ', .food-menu-w2-' . $uniqid . ' .fm-w2-name { background :'.$data->tp_color.';} .food-menu-w2-' . $uniqid . ' .fm-w2-price { background :'.$data->tp_color.';}':'';
							$new_line->description = isset( $data->description ) ? $data->description : '';
							$new_line->food_style = isset( $data->food_style ) && $data->food_style == 'featured-w2' ? ' colorr ' . $data->food_style : '';
							$new_line->featured_text = isset( $data->featured_text ) ? $data->featured_text : '';
							$food_menu2_data[] = $new_line;
						}
					}
					
					$out .= '<div class="food-menu-w2 food-menu-w2-' . $uniqid . ' ' . $shortcodeclass . '"  ' . $shortcodeid . ' >';
					if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
						foreach ( $food_menu2_data as $line ) :
							deep_save_dyn_styles( $line['tp_color'] );
							// live editor
							$live_page_builders_css .= $line['tp_color'];
							$featured_text = $line['food_style'] ? '<span class="fm-w2-featured colorb">' . $line['featured_text'] . '</span>' : '';
							$out .= '
							<div class="fm-w2-item' . $line['food_style'] . '">
								<div class="fm-w2-top space">
									<span class="fm-w2-name">' . $line['title'] . '</span>
									<span class="fm-w2-price" >' . $line['price'] . '</span>
								</div>
								<div class="fm-w2-des">' . $line['description'] . '</div>
								' . $featured_text . '
							</div>';
						endforeach;
					} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
						foreach ( $food_menu2_data as $line ) :
							deep_save_dyn_styles( $line->tp_color );
							// live editor
							$live_page_builders_css .= $line->tp_color;
							$featured_text = $line->food_style ? '<span class="fm-w2-featured colorb">' . $line->featured_text . '</span>' : '';
							$out .= '
							<div class="fm-w2-item' . $line->food_style . '">
								<div class="fm-w2-top space">
									<span class="fm-w2-name">' . $line->title . '</span>
									<span class="fm-w2-price">' . $line->price . '</span>
								</div>
								<div class="fm-w2-des">' . $line->description . '</div>
								' . $featured_text . '
							</div>';
						endforeach;
					}
					
					$out .= '</div>';
				break;
			endswitch;

		// live editor
		if ( ! in_array( 'admin-bar', get_body_class() ) ) {

			if ( ! empty( $live_page_builders_css ) ) {

				$out .= '<style>';
					$out .= $live_page_builders_css;
				$out .= '</style>';

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
		if ( self::used_shortcode_in_page( 'food_menu' ) ) {
			wp_enqueue_style( 'wn-deep-food-menu', DEEP_ASSETS_URL . 'css/frontend/food-menu/food-menu.css' );
		}
	}

} DeepWPBakeryFoodMenu::get_instance();
