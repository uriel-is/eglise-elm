<?php
class DeepWPBakeryPricingTables extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryPricingTables
	 */
	public static $instance;

	private $type;

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
		add_shortcode( 'pricing-tables', array( $this, 'output' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );			
		add_action( 'wp_head', function() {
			echo '<script>var deep_pricing_table_styles = {}; </script>';
		});
	}

	/**
	 * Shortcode Output.
	 *
	 *
	 * @since   1.0.0
	 */
	public function output( $attributes, $content = null ) {
	extract( shortcode_atts( array(
		'type'				=> '1',
		'title'				=> '',
		'description'		=> '',
		'price_symbol'		=> '',
		'price'				=> '$10',
		'on_sale_price'		=> '',
		'plan_label'		=> '',
		'label_bg_color'	=> '',
		'period'			=> 'Month',
		'features'			=> '',
		'content_text'		=> '',
		'footer_text'		=> '',
		'button_text'		=> '',
		'button_url'  		=> '',
		'featured'  		=> '',
		'icon'				=> '',
		'heading_bg_color'	=> '',
		'heading_text_color'=> '',
		'link_target'		=> '',
		'shortcodeclass' 	=> '',
		'shortcodeid' 	 	=> '',
	), $attributes ) );
	
	wp_enqueue_style( 'wn-deep-pricing-table' . $type, DEEP_ASSETS_URL . 'css/frontend/pricing-table/pricing-table' . $type . '.css' );
	
	$this->type  = $type;

	add_action( 'wp_footer', function() use($type) {
		echo '<script>
		var element = document.getElementById("wn-deep-pricing-table'.$type.'-css");
		if(element && !deep_pricing_table_styles["wn-deep-pricing-table'.$type.'-css"]) {
			deep_pricing_table_styles["wn-deep-pricing-table'.$type.'-css"] = true;
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

	
	$link_target_tag = '';
	if ( $link_target == 'true' ){
	    $link_target_tag = ' target="_blank" ';
	}

	// variables
	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

	static $uniqid = 0;
	$uniqid++;
	$featured 		= $featured ? ' featured' : '';
	$footer_text	= $footer_text ? '<p>' . $footer_text . '</p>' : '';
	if ( $on_sale_price ) :
		$temp_price		= $price;
		$price			= $on_sale_price;
		$on_sale_price	= '<del>' . $temp_price . '</del>';
	endif;
	if ( $type != '6' ) { 
		$period = $period ? '<small>/' . esc_html( $period ) . '</small>' : '';
	}else{
		$period = $period ? $period : '';
	}


	// features loop
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	$features_data	= array();
	$features_out	= '';
	
	// Fetch Carousle Item Loop Variables
	if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
		$features = (array) vc_param_group_parse_atts( $features );
		foreach ( $features as $data ) :
			$new_line 					= $data;
			$new_line['feature_icon']	= isset( $data['feature_icon'] ) ? $data['feature_icon'] : '';
			$new_line['feature_item']	= isset( $data['feature_item'] ) ? $data['feature_item'] : '';
			$features_data[] 			= $new_line;
		endforeach;
		$features_out .= '<ul class="pt-features">';
			foreach ( $features_data as $line ) :
				$features_out .= '<li class="feature-item"><span class="feature-icon ' . esc_html( $line['feature_icon'] ) . '"></span>' . esc_html( $line['feature_item'] ) . '</li>';
			endforeach;
		$features_out .= '</ul>';
	} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) && (is_array($features) || is_object($features)) ) {
		foreach ( $attributes['features'] as $key => $data ) :
			$new_line 					= $data;
			$new_line->feature_icon	= isset( $data->feature_icon ) ? $data->feature_icon : '';
			$new_line->feature_item	= isset( $data->feature_item ) ? $data->feature_item : '';
			$features_data[] 			= $new_line;
		endforeach;
		$features_out .= '<ul class="pt-features">';
			foreach ( $features_data as $line ) :
				$features_out .= '<li class="feature-item"><span class="feature-icon ' . esc_html( $line->feature_icon ) . '"></span>' . esc_html( $line->feature_item ) . '</li>';
			endforeach;
		$features_out .= '</ul>';
	}
	

	// footer cache
	$background_color = "";

	if( $type == '8'){
		$background_color = "colorb";
	}

	$footer_out = '<div class="pt-footer">' . $footer_text;
	if ( !empty( $button_text ) ) {
		$footer_out .= '<a href="' . esc_url( $button_url ) . '" class="magicmore ' .$background_color. '" '.$link_target_tag.'>' . esc_html( $button_text ) . '</a>';
	}
	$footer_out .= '</div>';

	// type6
	$style		= '';
	$pt6_color 	= $heading_text_color ? ' #wrap .pt-type' . esc_html( $type ) .'.w-pricing-table-' . $uniqid . ' small, #wrap .pt-type' . esc_html( $type ) .'.w-pricing-table-' . $uniqid . ' .plan-title, #wrap .pt-type' . esc_html( $type ) .'.w-pricing-table-' . $uniqid . ' .plan-price{ color:' . $heading_text_color . ';}' : '';
	$style .= $pt6_color;
	$pt6_bg_color = $pt6_bg_border = '';
	
	if ( $heading_bg_color ) :
		$style .= ' #wrap .w-pricing-table-' . $uniqid . '.pt-type' . esc_html( $type ) . ' .pt-header { background-color: ' . $heading_bg_color . '; }';
		$style .= ' #wrap .w-pricing-table-' . $uniqid . '.pt-type' . esc_html( $type ) . ' { border-color: ' . $heading_bg_color . '; } ';
	endif;


	// render
	$out = '<div class="w-pricing-table w-pricing-table-' . $uniqid . ' pt-type' . esc_html( $type ) . esc_html( $featured ) . ' ' . $shortcodeclass . '"  ' . $shortcodeid . '>';
		switch ( $type ) :
			case '1':
			case '3':
			case '7':
			case '10':
				$plan_label	  = ( $type == 3 && $plan_label ) ? '<span class="plan-label">' . $plan_label . '</span>' : '';
				$price_symbol = ( ( $type == 7 || $type == 10 ) && $price_symbol ) ? '<span class="price-symbol">' . esc_html( $price_symbol ) . '</span>': '';
				$out .= '
				<div class="pt-header">
					<h3 class="plan-title">' . esc_html( $title ) . '</h3>
					<h4 class="plan-price">
						' . $on_sale_price . '
						' . $price_symbol . '
						<span>' . esc_html( $price ) . '</span>
						' . $period . '
					</h4>
				' . $plan_label . '
				</div>
				' . $features_out . '
				' . $footer_out . '';
			break;

			case '2':
				$out .= '
				<span class="icon vc_icon_element-icon ' . $icon . '"></span>
				<h3 class="plan-title">' . esc_html( $title ) . '</h3>
				' . $features_out . '
				<h4 class="pt-price">
					' . $on_sale_price . '
					<span>' . esc_html( $price ) . '</span>
					' . $period . '</h4>
					' . $footer_out . '';
			break;

			case '4':
				$out .= '
				<div class="pt-header">
					<h3 class="plan-title">' . esc_html( $title ) . '</h3>
					<h6 class="plan-desc">' . esc_html( $description ) . '</h6>
				</div>
				' . $features_out . '
				<div class="pt-price">
					<h4 class="plan-price"><span>' . $on_sale_price . esc_html( $price ) . '</span>' . $period . '</h4>
					
				</div>
				' . $footer_out . '';
			break;

			case '5':

				$style .= $label_bg_color ? ' #wrap .w-pricing-table-' . $uniqid . '.pt-type' . esc_html( $type ) . ' .pt-header > span { background: ' . $label_bg_color . '; }' : '' ;
				
				$plan_label  = $plan_label ? '<span>' . $plan_label . '</span>' : '';
				$out .= '
				<div class="pt-header">
					' . $plan_label . '
					<h3 class="plan-title">' . esc_html( $title ) . '</h3>
					<h4 class="plan-price"><span>' . $on_sale_price . esc_html( $price ) . '</span>' . $period . '</h4>
					
				</div>
				' . $features_out . '
				' . $footer_out . '';
			break;

			case '6':
				$out .= '
				<div class="pt-header">
					<h3 class="plan-title">' . esc_html( $title ) . '</h3>
					<h4 class="plan-price"><span>' . esc_html( $price ) . '</span><small>/' . esc_html( $period ) . '</small></h4>
					' . $on_sale_price . '
				</div>
				' . $features_out . '
				' . $footer_out . '';
			break;

			case '8':
				$out .= '
					<div class="pt-header">
					<h3 class="plan-title">' . esc_html( $title ) . '<span class="plan-title-line"></span></h3>
					<h4 class="plan-price"><span>' . esc_html( $price ) . '</span>' . $period . '</h4>
					' . $on_sale_price . '
					</div>
					<div class="pt-content">' . $content_text . '</div>
					' . $footer_out . '';
			break;

			case '9':
				$out .= '
				<h3 class="plan-title">' . esc_html( $title ) . '</h3>
				<h4 class="pt-price"><span>' . esc_html( $price ) . '</span>' . $period . '</h4>
				' . $on_sale_price . '
				' . $footer_out . '';
			break;

		endswitch;

	$out .= '</div>';

	deep_save_dyn_styles( $style );

	// live editor
	if ( ! in_array( 'admin-bar', get_body_class() ) ) {

		if ( ! empty( $style ) ) {

			$out .= '<style>';
				$out .= $style;
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
	if ( self::used_shortcode_in_page( 'pricing-tables' ) ) {			
		wp_enqueue_style( 'wn-deep-pricing-table0', DEEP_ASSETS_URL . 'css/frontend/pricing-table/pricing-table0.css' );
	}
}
} DeepWPBakeryPricingTables::get_instance();