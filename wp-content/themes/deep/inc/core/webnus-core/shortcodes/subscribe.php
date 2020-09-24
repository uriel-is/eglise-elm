<?php
class DeepWPBakerySubscribe extends DeepWPBakery {
	
	/**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     DeepWPBakerySubscribe
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
		add_shortcode( 'subscribe', array( $this, 'output' ) );
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
			'box_title'			=> '',
			'box_text'			=> '',
			'type'				=> 'boxed',
			'service'			=> 'FeedBurner',	
			'feedburner_id'		=> '',
			'mailchimp_url'		=> '',
			'input_text'		=> '',
			'subbutton'			=> '',
			'shortcodeclass' 	=> '',
			'shortcodeid' 	 	=> '',
		), $atts));		
		
		ob_start();

		$shortcodeclass = $shortcodeclass ? $shortcodeclass : '';
		$shortcodeid	= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';
		$title			= ( $box_title ) ?'<h3>'.$box_title.'</h3>':'' ;
		$email_name		= ( $service == 'FeedBurner' ) ?'email':'MERGE0' ;
		$text			= ( $box_text ) ?'<div class="subscribe-box-text"><p>'.$box_text.'</p></div>':'' ;
		$inputtext		= ( $input_text ) ? $input_text:'YOUR E-MAIL' ;
		$input			= '

		<div class="subscribe-box-input ' . $shortcodeclass . '"  ' . $shortcodeid . '>
			<input placeholder=" '. $inputtext .'" class="subscribe-box-email" type="email" name="'.$email_name.'" required>
			<button class="subscribe-box-submit button medium" type="submit">
				<span>'.esc_html__('SUBSCRIBE','deep').'</span>
			</button>
		</div>';

		if ($type=='boxed'){
			echo '
				<div class="subscribe-box ' . $shortcodeclass . '"  ' . $shortcodeid . '>
					<div class="subscribe-box-top">
						<i class="ti-rss"></i>'.$title.'
					</div>';
		} else {
			echo '<div class="subscribe-'.$type.' ' . $shortcodeclass . '"  ' . $shortcodeid . '>'.$title;
		} ?>
		<?php if ($service =='FeedBurner' || $service =='feedburner') { ?>
			<form class="subscribe-box-form" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onSubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo esc_url( $feedburner_id ); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
				<input type="hidden" value="<?php echo esc_attr($feedburner_id); ?>" name="uri"/>
				<input type="hidden" name="loc" value="en_US"/>
		<?php } elseif( $service =='mailchimp' || $service =='MailChimp' ){ ?>	
			<form action="<?php echo esc_url($mailchimp_url); ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form">
		<?php } ?>
		
		<?php if($type=='bar1'){
			if($text){
				echo '<div class="container ' . $shortcodeclass . '"  ' . $shortcodeid . '><div class="col-md-6">'.$text.'</div><div class="col-md-6">'.$input.'</div></div>';
			} else{
				echo '' . $input;
			}
		} else{
			echo '' . $text.$input;
		} ?>
			</form>	
		</div>

	<?php
		$out = ob_get_contents();
		ob_end_clean();	
		return $out;
	}

	/**
	 * Required scripts.
	 *
	 * @since   1.0.0
	 */
	public function scripts() {
		if ( self::used_shortcode_in_page( 'subscribe' ) ) {
			wp_enqueue_style( 'wn-deep-subscribe', DEEP_ASSETS_URL . 'css/frontend/subscribe/subscribe.css' );
		}
	}

} DeepWPBakerySubscribe::get_instance();
