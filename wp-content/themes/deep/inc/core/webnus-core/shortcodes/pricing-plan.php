<?php
class DeepWPBakeryPricingPlan extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakeryPricingPlan
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
		add_shortcode( 'pricing-plan', array( $this, 'output' ) );			
		add_action( 'wp_head', function() {
			echo '<script>var deep_ricing_plan_styles = {}; </script>';
		});
	}

	/**
	 * Shortcode Output.
	 *
	 *
	 * @since   1.0.0
	 */
	public function output( $atts, $content = null ) {
	extract(shortcode_atts( array(
		'type' 				=> '1',
		'flag' 				=> 'none',
		'title' 			=> '',
		'text_content'		=> '',
		'features'			=> '',
		'img'				=> '',
		'price' 			=> '',
		'period'			=> '',
		'link_text'			=> '',
		'link_url'			=> '',
		'link_target'		=> '',
		'shortcodeclass' 	=> '',
		'shortcodeid' 	 	=> '',
	), $atts ));

	wp_enqueue_style( 'wn-deep-pricing-plan' . $type, DEEP_ASSETS_URL . 'css/frontend/pricing-plan/pricing-plan' . $type . '.css' );

	$this->type  = $type;

	add_action( 'wp_footer', function() use($type) {
		echo '<script>
		var element = document.getElementById("wn-deep-pricing-plan'.$type.'-css");
		if(element && !deep_ricing_plan_styles["wn-deep-pricing-plan'.$type.'-css"]) {
			deep_ricing_plan_styles["wn-deep-pricing-plan'.$type.'-css"] = true;
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

	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

	// features loop
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	$features_data	= array();
	// Fetch Carousle Item Loop Variables
	if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
		$features		= (array) vc_param_group_parse_atts( $features );
		foreach ( $features as $data ) :
			$new_line 					= $data;
			$new_line['feature_icon']	= isset( $data['feature_icon'] ) ? $data['feature_icon'] : '';
			$new_line['feature_item']	= isset( $data['feature_item'] ) ? $data['feature_item'] : '';
			$features_data[] 			= $new_line;
		endforeach;
	} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' )  && (is_array($features) || is_object($features)) ) {
		foreach( $atts['features'] as $key => $item ){
			$new_line 					= $item;
			$new_line->feature_icon	= isset( $item->feature_icon ) ? $item->feature_icon : '';
			$new_line->feature_item	= isset( $item->feature_item ) ? $item->feature_item : '';
			$features_data[] 			= $new_line;
		}
	}
	

	$link_target_tag = '';
	if ( $link_target == 'true' ) {
	    $link_target_tag = ' target="_blank" ';
	}
	if ( is_numeric( $img ) ) {
		$img = wp_get_attachment_url( $img );
	}
	$title = $title ? '<h4>'. esc_html($title) .'</h4>' : '' ;
	$text_content = $text_content ? '<p>'. $text_content .'</p>' : '' ;
	$price = $price ? '<span class="price">'. esc_html($price) . " " .'</span>'  : '' ;
	$period = $period ? '<span class="period">'. "/" . " " . esc_html($period) .'</span>'  : '' ;
	$img = $img ? 'background-image: url(' . esc_url($img) . ')' : '' ;
	$link_text = $link_text ? '<a href="'. esc_url($link_url) .'" class="readmore" '.$link_target_tag.'>'. esc_html($link_text) .'</a>' : '' ;

	$uniqid  = substr(uniqid(rand(),1),0,6);
	deep_save_dyn_styles( '
		.ppbg-overlay[data-id="' . $uniqid . '"] {
			' . $img . '
		}
	' );

	// live editor
	$live_page_builders_css = '.ppbg-overlay[data-id="' . $uniqid . '"] { ' . $img . ' }';

	if ( ! in_array( 'admin-bar', get_body_class() ) ) {

		if ( ! empty( $live_page_builders_css ) ) {

			echo '<style>';
				echo $live_page_builders_css;
			echo '</style>';

		}

	}

	if ($type == 1) {
		$out = '
		<div class="pricing-plan'. esc_html( $type ) .' ' . $shortcodeclass . '"  ' . $shortcodeid . '>
		 	<div class="ppheader"> ' . $title . $text_content . ' </div>
			<div class="ppfooter"> ' . $price . $link_text . ' </div> 
		</div>';
	}
	elseif ($type == 2) {
		$features_out = '<ul class="ppfeatures">';
			if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
				foreach ( $features_data as $line ) :
				$features_out .= '<li class="feature-item">';
				if ( !empty( $line['feature_icon'] ) ) {
					$features_out .= '<span class="feature-icon ' . esc_html( $line['feature_icon'] ) . '"></span>';
				}
				$features_out .= esc_html( $line['feature_item'] ) . '</li>';
				endforeach;
			} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
				foreach ( $features_data as $line ) :
				$features_out .= '<li class="feature-item"><span class="feature-icon ' . esc_html( $line->feature_icon ) . '"></span>' . esc_html( $line->feature_item ) . '</li>';
				endforeach;
			}
			
		$features_out .= '</ul>';

		$flag = ( $flag != 'none' ) ? '<div class="ppflag">' . $flag . '</div>' : '';

		$out = '
		<div class="pricing-plan'. esc_html( $type ) .'  ' . $shortcodeclass . '"  ' . $shortcodeid . '>
			' . $flag . '
		 	<div class="ppheader"> ' . $title . $features_out . ' </div>
			<div class="ppfooter"> ' . $price . $link_text . ' </div> 
		</div>';
	}
	elseif ( $type == 3 ) {
		$features_out = '<ul class="ppfeatures" >';
			if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
				foreach ( $features_data as $line ) :
				$features_out .= '<li class="feature-item"><span class="feature-icon ' . esc_html( $line['feature_icon'] ) . '"></span>' . esc_html( $line['feature_item'] ) . '</li>';
				endforeach;
			} elseif ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
				foreach ( $features_data as $line ) :
				$features_out .= '<li class="feature-item"><span class="feature-icon ' . esc_html( $line->feature_icon ) . '"></span>' . esc_html( $line->feature_item ) . '</li>';
				endforeach;
			}
			
		$features_out .= '</ul>';

		$out = '
			<div class="pricing-plan'. esc_html( $type ) .'  ' . $shortcodeclass . '"  ' . $shortcodeid . '>
				<div class="ppbg-overlay" data-id="' . $uniqid . '"></div>
				<div class="ppbc-overlay colorb"></div>
				<div class="ppcontent ">
					<div class="clearfix">
						<div class="col-lg-4 col-md-3">
							<div class="ppheader colorb"> 
								' . $title . $price . $period . ' 
							</div>
							<span class="pptriangle"></span>
						</div>
						<div class="col-lg-6 col-md-7">
							' . $features_out . ' 
						</div>
						<div class="col-lg-2">
							<div class="ppfooter"> '  . $link_text  . ' </div> 
						</div>
					</div>
				</div>
			</div>';	
	}
	
	return $out;
}
} DeepWPBakeryPricingPlan::get_instance();