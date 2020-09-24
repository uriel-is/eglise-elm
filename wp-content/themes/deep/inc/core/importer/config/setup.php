<?php
/**
 * Deep Theme.
 *
 * The Demo Importer
 *
 * @since   4.2.8
 * @author  Webnus
 */

// Don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Deep_Demo_Importer {

	/**
	 * Instance of this class.
	 *
	 * @since   4.2.8
	 * @access  public
	 * @var     Deep_Demo_Importer
	 */
	public static $instance;

	private $demo;

	private $pagebuilder;

	private $path;

	private $webnus_dir;

	private $demo_dir;

	private $pages;

	private $posts;

	private $sliders;

	private $theme_opts;

	private $widgets;

	private $attachments;

	private $portfolios;

	private $contact_forms;
	
	/**
	 * Provides access to a single instance of a module using the singleton pattern.
	 *
	 * @since   4.2.8
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
	 * @since   4.2.8
	 */
	public function __construct() {		                
		add_action( 'admin_enqueue_scripts', [$this, 'scripts'] );
		add_action( 'wp_ajax_importing_demo_content', [$this, 'importing_demo_content'] );
		add_action( 'wp_ajax_nopriv_importing_demo_content', [$this, 'importing_demo_content'] );				
		add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );
	}

	/**
	 * Register Scripts.
	 *
	 * Load the dependencies.
	 *
	 * @since   4.2.8
	 */
	public function scripts(){
		wp_enqueue_script( 'one-demo-importer', DEEP_ASSETS_URL . 'js/backend/one-importer.js', array( 'jquery' ) );
		
		wp_localize_script(
		'one-demo-importer',
		'OneImporter', 
			array(
				'ajax_url'   =>  admin_url( 'admin-ajax.php' ), 
				'nonce'      => wp_create_nonce( 'one_demo_importer' ),
			)
		);
	}

	/**
	 * Importing Content.
	 *
	 * @since   4.2.8
	 */
	public function importing_demo_content() {
		
		$nonce = $_POST['nonce'];		
		if ( ! wp_verify_nonce( $nonce, 'one_demo_importer' ) )
			die ( 'Wrong nonce!');

		if( ! empty( $_POST )){

			if( isset( $_POST['demo'] ) ) {
                $this->demo = sanitize_text_field( $_POST['demo'] );
			}
								
			if ( isset( $_POST['pagebuilder'] ) ) {
                $this->pagebuilder = sanitize_text_field( $_POST['pagebuilder'] );
            }
								
			if ( isset( $_POST['pages'] ) && $_POST['pages'] == 'yes') {
                $this->pages = 'pages';
            }
								
			if ( isset( $_POST['posts'] ) && $_POST['posts'] == 'yes' ) {
                $this->posts = 'posts';
            }
								
			if ( isset( $_POST['contact_forms'] ) && $_POST['contact_forms'] == 'yes') {
                $this->contact_forms = 'contact_forms';
            }
								
			if ( isset( $_POST['portfolios'] ) && $_POST['portfolios'] = 'yes' ) {
                $this->portfolios = 'portfolios';
			}
			
			if ( isset( $_POST['import_attachments'] ) && $_POST['import_attachments'] == 'yes') {
                $this->attachments = 'attachments';
            }
								
			if ( isset( $_POST['import_widgets'] ) && $_POST['import_widgets'] == 'yes') {
                $this->widgets = 'widgets';
            }
								
			if ( isset( $_POST['import_theme_opts'] ) && $_POST['import_theme_opts'] == 'yes') {
                $this->theme_opts = 'theme_opts';
            }
								
			if ( isset( $_POST['import_sliders'] ) && $_POST['import_sliders'] == 'yes' ) {
                $this->sliders = 'sliders';
            }
            	   
		}
		
		$this->demo_setup();	
		$this->import_content();		
		wp_die();
		
	}
	
	/**
	 * Demo Setup.
	 *
	 * @since   4.2.8
	 */
	public function demo_setup() {

		$this->webnus_dir = ABSPATH.'wp-content/uploads/webnus/';
		$this->demo_dir = $this->webnus_dir . 'demo-data/';
		$this->path = $this->demo_dir . $this->demo;

		if ( wp_mkdir_p( $this->demo_dir. $this->demo ) ) {
			wp_mkdir_p( $this->demo_dir . $this->demo );
		}

		// Upload files in demo folder
		$value = '';
		
		if ( wn_check_url( deep_ssl() . 'deeptem.com/deep-downloads/demo-data/' . $this->demo . '/' . $this->demo . '.zip') ) {
			$value = deep_ssl() . 'deeptem.com/deep-downloads/demo-data/' . $this->demo . '/' . $this->demo . '.zip';
		} else {
			$value = 'http://webnus.biz/deep-downloads/demo-data/' . $this->demo . '/' . $this->demo . '.zip';
		}
		
		//$response = $http->request( $value );
		$get_file = wp_remote_get( 
			$value, 
			array(
				'timeout'     => 120,
				'user-agent'  => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36'
			)
		);
		
		$upload = wp_upload_bits( basename( $value ), '', wp_remote_retrieve_body( $get_file ) );
		if( !empty( $upload['error'] ) ) {
			return false;
		}
		
		// unzip demo files
		if ( class_exists('ZipArchive', false) == false ) {

			require_once ( 'zip-extention/zip.php' );
			$zip = new Zip();
			$zip->unzip_file( $upload['file'], $this->demo_dir . $this->demo . '/' );

		} else {

			$zip = new ZipArchive;
			$success_unzip = '';
			if ( $zip->open( $upload['file'] ) === TRUE ) {
				$zip->extractTo( $this->demo_dir . $this->demo . '/' );
				$zip->deleteAfterUnzip = true;
				$zip->close();
				$success_unzip = 'success';
			} else {
				$success_unzip = 'faild';
			}

		}
	}

	/**
	 * Import Content.
	 *
	 * @since   4.2.8
	 */
	public function import_content() {
		require_once DEEP_CORE_DIR . 'importer/one-click-demo-import/one-click-demo-import.php';

		$pg_to_import = '';
		$pg_to_import = ( $this->pagebuilder == 'Elementor' ) ? 'ele' : 'vc';
		
		$im_content = array (
			"pages"         => $this->pages,
			"posts"         => $this->posts,
			"theme_opts"    => $this->theme_opts,
			"widgets"       => $this->widgets,
			"contact_forms" => $this->contact_forms,
			"portfolios"    => $this->portfolios,
			"sliders"       => $this->sliders,
			"attachments"   => $this->attachments,
		);
		
		$cn_logger = new OCDI\Logger();
		$importing_demo = new OCDI\Importer( [
			'update_attachment_guids' => true,
			'fetch_attachments' => true
		], $cn_logger );
		
		foreach ( $im_content as $key => $item ) {
			switch ($item) {								
				case 'pages':

					if ( $pg_to_import == 'ele' ) {
						$importing_demo->import_content($this->path.'/pages-ele.xml');
						$importing_demo->import_content($this->path.'/mega-menus-ele.xml');
						$importing_demo->import_content($this->path.'/footer-ele.xml');
						$importing_demo->import_content($this->path.'/templates.xml');
						$importing_demo->import_content($this->path.'/menu-ele.xml');
					} else {
						$importing_demo->import_content($this->path.'/pages-vc.xml');
						$importing_demo->import_content($this->path.'/mega-menus-vc.xml');
						$importing_demo->import_content($this->path.'/footer-vc.xml');
						$importing_demo->import_content($this->path.'/menu-vc.xml');
					}					
								
					break;

				case 'posts':

					if ( $pg_to_import == 'ele' ) {
						$importing_demo->import_content($this->path.'/posts-ele.xml');
					} else {
						$importing_demo->import_content($this->path.'/posts-vc.xml');
					}
										
					break;

				case 'theme_opts':
					/**
					 * Theme Options
					 */		
					if ( file_exists( $this->path.'/theme_options.txt' ) ) {	
						$file_contents = file_get_contents( $this->path.'/theme_options.txt' );
						$options = json_decode($file_contents, true);
						$redux = ReduxFrameworkInstances::get_instance('deep_options');
						$redux->set_options($options);
					}

					/**
					 * Header
					 */			
					$headerFile = $this->path.'/header.json';
					if ( file_exists( $headerFile ) ) {
						$headerData = file_get_contents( $headerFile );
						$headerData = json_decode( stripslashes( $headerData ), true );
						update_option( 'whb_data_components', $headerData['whb_data_components'] );
						update_option( 'whb_data_editor_components', $headerData['whb_data_editor_components'] );
						update_option( 'whb_data_frontend_components', $headerData['whb_data_frontend_components'] );
					}
											
					break;

				case 'widgets':
					/**
					 * Widgets
					 */
					if ( file_exists( $this->path . '/widgets.json' ) ) {
						OCDI\WidgetImporter::import($this->path . '/widgets.json');
					}			
					break;				

				case 'contact_forms':

					$importing_demo->import_content($this->path.'/contact-forms.xml');		

					break;

				case 'portfolios':

					if ( is_plugin_active( 'the-grid/the-grid.php' ) ) {
						$importing_demo->import_content($this->path.'/grid.xml');
					}

					if ( $pg_to_import == 'ele' ) {
						$importing_demo->import_content($this->path.'/portfolio-ele.xml');						
						$importing_demo->import_content($this->path.'/gallery-ele.xml');						
					} else {
						$importing_demo->import_content($this->path.'/portfolio-vc.xml');
						$importing_demo->import_content($this->path.'/gallery-vc.xml');	
					}
										
					break;
				
				case 'attachments':	
								
					if ( $pg_to_import == 'ele' ) {										
						$importing_demo->import_content($this->path.'/media-ele.xml');																											
					} else {							
						$importing_demo->import_content($this->path.'/media-vc.xml');					
					}
					
					break;

				case 'sliders';	
					/**
					 * Import LayerSlider
					 */
					if ( is_plugin_active( 'LayerSlider/layerslider.php' ) ) {
						if ( file_exists( $this->path . '/layer_sliders.zip' ) ) {
							include LS_ROOT_PATH . '/classes/class.ls.importutil.php';
							$import = new LS_ImportUtil( $this->path . '/layer_sliders.zip' );
							$import->addSlider( $this->path . '/layer_sliders.zip' );
						}
					}		
					
					/**
					 * Import RevSlider
					 */
					if ( class_exists('RevSlider') ) {

						$importSlider = new RevSlider();

						switch ( $this->demo ) {
							case 'corporate':
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-corporate-main-slider.zip');
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-corporate-slider1.zip');		
								break;

							case 'shop':
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-shop-main-slider.zip');
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-shop-slider1.zip');		
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-shop-slider2.zip');		
								$importSlider->importSliderFromPost(true, true, $this->path . '/product-map-view.zip');		
								break;

							case 'startup':
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-startup-slider1.zip');				
								break;

							case 'restaurant':
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-restaurant-slider-1.zip');				
								break;

							case 'classic':
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-classic-slider1.zip');				
								break;

							case 'construction':
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-construction-slider-1.zip');				
								$importSlider->importSliderFromPost(true, true, $this->path . '/services.zip');				
								break;

							case 'web-design':
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-wd-slider1.zip');				
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-wd-slider2.zip');				
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-wd-slider3.zip');				
								break;

							case 'app':
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-app-showcase-carousel.zip');				
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-app-slider.zip');												
								break;

							case 'product-landing':
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-product-landing-slider.zip');																			
								break;

							case 'beauty':
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-beauty-slider1.zip');																			
								break;

							case 'spa':
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-spa-slider1.zip');																			
								break;

							case 'architect':
								$importSlider->importSliderFromPost(true, true, $this->path . '/architect-slider.zip');																			
								break;

							case 'boutique':
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-boutique-NUM.zip');																			
								break;

							case 'charity':
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-charity-slider1.zip');																			
								break;

							case 'crypto':
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-crypto-slider1.zip');																			
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-crypto-slider2.zip');																			
								break;

							case 'dentist':
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-dentist-main-slider.zip');																						
								break;

							case 'furniture':
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-furniture-slider1.zip');																						
								break;

							case 'language-school':
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-language-school.zip');																						
								break;

							case 'lawyer':
								$importSlider->importSliderFromPost(true, true, $this->path . '/HomeSlider.zip');																						
								break;

							case 'real-estate':
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-real-estate-slider1.zip');																						
								break;

							case 'health':
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-health-slider.zip');																						
								break;

							case 'church':
								$importSlider->importSliderFromPost(true, true, $this->path . '/discovery-slider1.zip');																						
								break;

							case 'consulting':
								$importSlider->importSliderFromPost(true, true, $this->path . '/consulting-main-slider.zip');																						
								$importSlider->importSliderFromPost(true, true, $this->path . '/cosulting-case-studies.zip');																						
								break;

							case 'cosmetic':
								$importSlider->importSliderFromPost(true, true, $this->path . '/cosmetic-slider1.zip');																																																
								break;

							case 'yoga':
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-yoga-main-slider.zip');																																																
								break;

							case 'car':
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-car-main-slider.zip');																																																
								break;

							case 'seo':
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-seo-slider1.zip');																																																
								break;

							case 'easydesign':
								$importSlider->importSliderFromPost(true, true, $this->path . '/easy-design-rev-slider11.zip');																																																
								$importSlider->importSliderFromPost(true, true, $this->path . '/easy-design-rev-slider1.zip');																																																
								break;

							case 'easyhost':
								$importSlider->importSliderFromPost(true, true, $this->path . '/Host-slider.zip');																																																					
								break;

							case 'easyseo':
								$importSlider->importSliderFromPost(true, true, $this->path . '/easyseo-whiteboard.zip');																																																					
								$importSlider->importSliderFromPost(true, true, $this->path . '/seo-rev-slider1.zip');																																																					
								break;

							case 'easysmall':
								$importSlider->importSliderFromPost(true, true, $this->path . '/easy-small-rev1.zip');																																																					
								$importSlider->importSliderFromPost(true, true, $this->path . '/seo-rev-slider1.zip');																																																					
								$importSlider->importSliderFromPost(true, true, $this->path . '/web-product-light-hero-3d4.zip');																																																					
								$importSlider->importSliderFromPost(true, true, $this->path . '/creative-freedom.zip');																																																					
								break;

							case 'easyapp':
								$importSlider->importSliderFromPost(true, true, $this->path . '/easy-app-showcase-carousel1.zip');																																																					
								$importSlider->importSliderFromPost(true, true, $this->path . '/easy-app-slider-rev1.zip');																																																																																																													
								break;

							case 'easyseo2':
								$importSlider->importSliderFromPost(true, true, $this->path . '/seo2-rev-slider.zip');																																																																																																																																																																						
								break;

							case 'pax':
								$importSlider->importSliderFromPost(true, true, $this->path . '/pax-rev-slider1.zip');																																																																																																																																																																						
								$importSlider->importSliderFromPost(true, true, $this->path . '/pax-rev-slider11.zip');																																																																																																																																																																						
								break;

							case 'discovery':
								$importSlider->importSliderFromPost(true, true, $this->path . '/discovery-slider1.zip');																																																																																																																																																																						
								$importSlider->importSliderFromPost(true, true, $this->path . '/discovery-slider2.zip');																																																																																																																																																																						
								break;

							case 'discovery':
								$importSlider->importSliderFromPost(true, true, $this->path . '/discovery-slider1.zip');																																																																																																																																																																						
								$importSlider->importSliderFromPost(true, true, $this->path . '/discovery-slider2.zip');																																																																																																																																																																						
								break;

							case 'forward':
								$importSlider->importSliderFromPost(true, true, $this->path . '/forward-slider1.zip');																																																																																																																																																																											
								break;

							case 'happypets':
								$importSlider->importSliderFromPost(true, true, $this->path . '/pets-rev-slider1.zip');																																																																																																																																																																											
								break;

							case 'babysitter':
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-babysitter-main-slider.zip');																																																																																																																																																																											
								break;

							case 'car-services':
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-car-services-main-slider.zip');																																																																																																																																																																											
								break;

							case 'home-services':
								$importSlider->importSliderFromPost(true, true, $this->path . '/deep-home-services-slider.zip');																																																																																																																																																																											
								break;

							case 'gym':
								$importSlider->importSliderFromPost(true, true, $this->path . '/gym-home-slider.zip');																																																																																																																																																																											
								break;

							case 'risotto-restaurant':
								$importSlider->importSliderFromPost(true, true, $this->path . '/risotto-rev1.zip');																																																																																																																																																																											
								break;

							case 'risotto-cafe':
								$importSlider->importSliderFromPost(true, true, $this->path . '/risotto-cafe-slider1.zip');																																																																																																																																																																											
								break;

							case 'risotto-fastfood':
								$importSlider->importSliderFromPost(true, true, $this->path . '/risotto-fastfood-slider1.zip');																																																																																																																																																																											
								break;

							case 'hotella-vienna':
								$importSlider->importSliderFromPost(true, true, $this->path . '/hotella-services-slider1.zip');																																																																																																																																																																											
								$importSlider->importSliderFromPost(true, true, $this->path . '/vienna-slider2.zip');																																																																																																																																																																											
								$importSlider->importSliderFromPost(true, true, $this->path . '/vienna-slider3.zip');																																																																																																																																																																											
								break;

							case 'hotella-athens':
								$importSlider->importSliderFromPost(true, true, $this->path . '/hotella-rev-slider01.zip');																																																																																																																																																																											
								$importSlider->importSliderFromPost(true, true, $this->path . '/hotella-services-slider1.zip');																																																																																																																																																																																																																																																																																																																																																										
								break;

							case 'hotella-rome':
								$importSlider->importSliderFromPost(true, true, $this->path . '/hotella-rome-slider11.zip');																																																																																																																																																																																
								break;

							case 'hosting':
								$importSlider->importSliderFromPost(true, true, $this->path . '/hosting-slider.zip');																																																																																																																																																																																
								break;

							case 'petshop':
								$importSlider->importSliderFromPost(true, true, $this->path . '/petshop-slider.zip');																																																																																																																																																																																
								break;

							case 'fastfood':
								$importSlider->importSliderFromPost(true, true, $this->path . '/fast-food-slider.zip');																																																																																																																																																																																
								break;

							case 'housekeeping':
								$importSlider->importSliderFromPost(true, true, $this->path . '/housekeeping-slider.zip');																																																																																																																																																																																
								break;

							case 'barber':
								$importSlider->importSliderFromPost(true, true, $this->path . '/barber-slider.zip');																																																																																																																																																																																
								break;

							case 'carwash':
								$importSlider->importSliderFromPost(true, true, $this->path . '/carwash-slider.zip');																																																																																																																																																																																
								break;

							case 'michigan-high-school':
								$importSlider->importSliderFromPost(true, true, $this->path . '/madison-rev-slider1.zip');																																																																																																																																																																																
								break;

							case 'kindergarten':
								$importSlider->importSliderFromPost(true, true, $this->path . '/excursions.zip');																																																																																																																																																																																
								$importSlider->importSliderFromPost(true, true, $this->path . '/kids-rev-slider2.zip');																																																																																																																																																																																
								$importSlider->importSliderFromPost(true, true, $this->path . '/kids-school-slider.zip');																																																																																																																																																																																
								break;

							case 'michigan-college':
								$importSlider->importSliderFromPost(true, true, $this->path . '/michigan-rev-slider1.zip');																																																																																																																																																																																
								$importSlider->importSliderFromPost(true, true, $this->path . '/michigan-rev-slider2.zip');																																																																																																																																																																																					
								break;

							case 'michigan-online-learning':
								$importSlider->importSliderFromPost(true, true, $this->path . '/Home-2-slider.zip');																																																																																																																																																																																
								$importSlider->importSliderFromPost(true, true, $this->path . '/home-6-extended-slider.zip');																																																																																																																																																																																					
								break;

							case 'sport':
								$importSlider->importSliderFromPost(true, true, $this->path . '/slider-1.zip');																																																																																																																																																																																																																																																																																																																																																																									
								break;
							
							default:
								
								break;
						}
						
					}
						
					break;
					
				default:
					
					break;
			}
		}		          
		
		/**
		 * Events
		 *
		 * @since 4.2.8
		 */		
		if ( is_plugin_active( 'modern-events-calendar-lite/mec.php' ) ) {

			if ( file_exists( $this->path.'/mec-shortcodes.xml' ) ) {
				$importing_demo->import_content($this->path.'/mec-shortcodes.xml');
			}

			if ( file_exists( $this->path.'/events.xml' ) ) {
				add_action('init', function() {
					do_action('mec_import_file', $this->path.'/events.xml');
				});
			}

		}

		/**
		 * Products
		 *
		 * @since 4.2.8
		 */	
		if ( class_exists( 'Woocommerce' ) ) {
			$importing_demo->import_content($this->path.'/products.xml');
			$importing_demo->import_content($this->path.'/ninja-popups.xml');
		}

		/**
		 * Review
		 *
		 * @since 4.2.8
		 */	
		if ( is_plugin_active( 'webnus-review/webnus-review.php' ) ) {
			$importing_demo->import_content($this->path.'/review.xml');
		}

		/**
		 * Causes
		 *
		 * @since 4.2.8
		 */	
		if ( is_plugin_active( 'webnus-causes/webnus-causes.php' ) ) {
			$importing_demo->import_content($this->path.'/causes.xml');
		}

		/**
		 * Sermons
		 *
		 * @since 4.2.8
		 */	
		if ( is_plugin_active( 'webnus-sermons/webnus-sermons.php' ) ) {
			$importing_demo->import_content($this->path.'/sermons.xml');
		}

		/**
		 * Prayer-Wall
		 *
		 * @since 4.2.8
		 */	
		if ( is_plugin_active( 'prayer-wall/wp-prayer-wall.php' ) ) {
			$importing_demo->import_content($this->path.'/prayer-wall.xml');
		}

		/**
		 * Recipes
		 *
		 * @since 4.2.8
		 */	
		if ( is_plugin_active( 'webnus-recipes/webnus-recipes.php' ) ) {
			$importing_demo->import_content($this->path.'/recipes.xml');
		}

		/**
		 * Grid
		 *
		 * @since 4.2.8
		 */	
		if ( is_plugin_active( 'the-grid/the-grid.php' ) ) {
			$importing_demo->import_content($this->path.'/grid.xml');
		}

		/**
		 * Courses
		 *
		 * @since 4.2.8
		 */	
		if ( is_plugin_active( 'lifterlms/lifterlms.php' ) ) {
			$importing_demo->import_content($this->path.'/courses.xml');
			$importing_demo->import_content($this->path.'/forums.xml');
		}

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
		 * Import pricing(s) for the current demo being imported
		 *
		 * @since 1.0.0
		 */
		if ( class_exists( 'GW_GoPricing' ) ) {
			$file_content = @file_get_contents( $this->path . '/go-pricing.txt' );
			$override     = true;
			$ids          = array();
			GW_GoPricing_Data::import( $file_content, (bool) $override, $ids );
		}

		/**
		 * Update Woocommerce Image Size
		 *
		 * @since 1.0.0
		*/
		if ( class_exists( 'Woocommerce' ) ) {
			update_option( 'woocommerce_thumbnail_cropping', 'uncropped' );
			update_option( 'woocommerce_thumbnail_image_width', '242' );
			update_option( 'woocommerce_single_image_width', '660' );
		}

		/**
		 * Update WP Hotel Booking Image Size
		 *
		 * @since 1.0.0
		*/
		if ( class_exists( 'WP_Hotel_Booking' ) ) {
			update_option( 'tp_hotel_booking_catalog_image_width', '470' );
			update_option( 'tp_hotel_booking_catalog_image_height', '470' );
		}

		$this->front_posts_page();
		
	}

	/**
	 * Assign front page and posts page.
	 *
	 * @since   4.2.8
	 */
	public function front_posts_page() {

		switch ( $this->demo ) {
			case 'corporate':
				$front_page = get_page_by_title( 'Home 1 - Corporate' );
				$blog_page  = get_page_by_title( 'Blog' );
				break;

			case 'shop':
				$front_page = get_page_by_title( 'Home 1 - Shop' );
				$blog_page  = get_page_by_title( 'blog' );
				break;

			case 'business':
				$front_page = get_page_by_title( 'Home 1 - Business' );
				$blog_page  = get_page_by_title( 'Blog' );
				break;

			case 'magazine':
				$front_page = get_page_by_title( 'Home 1 - Magazine' );
				$blog_page  = get_page_by_title( 'Blog' );
				break;

			case 'portfolio':
				$front_page = get_page_by_title( 'Home 1 - Portfolio' );
				$blog_page  = get_page_by_title( 'Blog' );
				break;

			case 'freelancer':
				$front_page = get_page_by_title( 'Home - Freelancer' );
				$blog_page  = get_page_by_title( 'Blog' );
				break;

			case 'photography':
				$front_page = get_page_by_title( 'Home - Photography' );
				$blog_page  = get_page_by_title( 'Blog' );
				break;

			case 'startup':
				$front_page = get_page_by_title( 'Home - Startup' );
				$blog_page  = get_page_by_title( 'Blog' );
				break;

			case 'restaurant':
				$front_page = get_page_by_title( 'Home 1 - Restaurant' );
				$blog_page  = get_page_by_title( 'Blog' );
				break;

			case 'classic':
				$front_page = get_page_by_title( 'Home 1 - Classic' );
				$blog_page  = get_page_by_title( 'Blog' );
				break;

			case 'construction':
				$front_page = get_page_by_title( 'Home - Construction' );
				$blog_page  = get_page_by_title( 'Blog' );
				break;

			case 'personal-blog':
				$front_page = get_page_by_title( 'Home 1 - Personal Blog' );
				$blog_page  = get_page_by_title( 'Blog' );
				break;

			case 'web-design':
				$front_page = get_page_by_title( 'Home 1 - Web Design' );
				$blog_page  = get_page_by_title( 'blog' );
				break;

			case 'app':
				$front_page = get_page_by_title( 'Home 1 - App' );
				$blog_page  = get_page_by_title( '' );
				break;

			case 'edge':
				$front_page = get_page_by_title( 'Home - Edge' );
				$blog_page  = get_page_by_title( 'Blog' );
				break;

			case 'product-landing':
				$front_page = get_page_by_title( 'Home - Product Landing' );
				$blog_page  = get_page_by_title( 'Blog' );
				break;

			case 'beauty':
				$front_page = get_page_by_title( 'Home 1 - Beauty' );
				$blog_page  = get_page_by_title( 'Blog' );
				break;

			case 'buddypress':
				$front_page = get_page_by_title( 'Home - BuddyPress' );
				$blog_page  = get_page_by_title( 'Blog' );
				break;

			case 'agency1':
				$front_page = get_page_by_title( 'Home - Agency' );
				$blog_page  = get_page_by_title( 'Blog' );
				break;

			case 'cafe':
				$front_page = get_page_by_title( 'Home 1 - Cafe' );
				$blog_page  = get_page_by_title( 'Blog' );
				break;

			case 'spa':
				$front_page = get_page_by_title( 'Home 1 - SPA' );
				$blog_page  = get_page_by_title( 'Blog' );
				break;

			case 'musician':
				$front_page = get_page_by_title( 'Home 1 - Musician' );
				$blog_page  = get_page_by_title( 'Blog' );
				break;

			case 'architect':
				$front_page = get_page_by_title( 'Home - Architect' );
				$blog_page  = get_page_by_title( '' );
				break;

			case 'boutique':
				$front_page = get_page_by_title( 'Home Boutique' );
				$blog_page  = get_page_by_title( '' );
				break;

			case 'charity':
				$front_page = get_page_by_title( 'Home 1 - Charity' );
				$blog_page  = get_page_by_title( 'Blog' );
				break;

			case 'crypto':
				$front_page = get_page_by_title( 'Home 1 Crypto' );
				$blog_page  = get_page_by_title( 'Blog' );
				break;

			case 'dentist':
				$front_page = get_page_by_title( 'Home Dentist' );
				$blog_page  = get_page_by_title( '' );
				break;

			case 'events':
				$front_page = get_page_by_title( 'Events Home 1 - Conference' );
				$blog_page  = get_page_by_title( '' );
				break;

			case 'fashion':
				$front_page = get_page_by_title( 'Home Fashion Model' );
				$blog_page  = get_page_by_title( '' );
				break;

			case 'furniture':
				$front_page = get_page_by_title( 'Home Furniture' );
				$blog_page  = get_page_by_title( '' );
				break;

			case 'insurance':
				$front_page = get_page_by_title( 'Home - Insurance' );
				$blog_page  = get_page_by_title( '' );
				break;

			case 'language-school':
				$front_page = get_page_by_title( 'Language School Home' );
				$blog_page  = get_page_by_title( '' );
				break;

			case 'mechanic':
				$front_page = get_page_by_title( 'Home - Mechanic' );
				$blog_page  = get_page_by_title( '' );
				break;

			case 'real-estate':
				$front_page = get_page_by_title( 'Home Real Estate' );
				$blog_page  = get_page_by_title( '' );
				break;

			case 'software':
				$front_page = get_page_by_title( 'Home1 - Software' );
				$blog_page  = get_page_by_title( '' );
				break;

			case 'wedding':
				$front_page = get_page_by_title( 'Home - Wedding' );
				$blog_page  = get_page_by_title( '' );
				break;

			case 'health':
				$front_page = get_page_by_title( 'Home Health' );
				$blog_page  = get_page_by_title( '' );
				break;

			case 'travel':
				$front_page = get_page_by_title( 'Travel_Home' );
				$blog_page  = get_page_by_title( '' );
				break;

			case 'petsitter':
				$front_page = get_page_by_title( 'Petsitter - Home' );
				$blog_page  = get_page_by_title( '' );
				break;

			case 'church':
				$front_page = get_page_by_title( 'Home - Church' );
				$blog_page  = get_page_by_title( '' );
				break;

			case 'consulting':
				$front_page = get_page_by_title( 'Home - Consulting' );
				$blog_page  = get_page_by_title( '' );
				break;						

			case 'rtl':
				$front_page = get_page_by_title( 'الرئيسية 1 - مجلة' );
				$blog_page  = get_page_by_title( '' );
				break;

			case 'coming-soon':
				$front_page = get_page_by_title( 'Coming Soon 1' );
				$blog_page  = get_page_by_title( '' );
				break;	

			case 'agency2':
				$front_page = get_page_by_title( 'Home - Agency 2' );
				$blog_page  = get_page_by_title( 'Blog' );
				break;	

			case 'cosmetic':
				$front_page = get_page_by_title( 'Cosmetic Home' );
				$blog_page  = get_page_by_title( '' );
				break;	

			case 'fastfood':
				$front_page = get_page_by_title( 'Fast Food - Home' );
				$blog_page  = get_page_by_title( '' );
				break;	

			case 'hotella-vienna':
				$front_page = get_page_by_title( 'Home Vienna' );
				$blog_page  = get_page_by_title( '' );
				break;	

			case 'car-services':
				$front_page = get_page_by_title( 'Home - Car Services' );
				$blog_page  = get_page_by_title( '' );
				break;	

			case 'home-services':
				$front_page = get_page_by_title( 'Home Services - Home' );
				$blog_page  = get_page_by_title( '' );
				break;	

			case 'hosting':
				$front_page = get_page_by_title( 'Hosting - Home 1' );
				$blog_page  = get_page_by_title( '' );
				break;	

			case 'cryptocoin':
				$front_page = get_page_by_title( 'CryptoCoin - Home' );
				$blog_page  = get_page_by_title( '' );
				break;	

			case 'yoga':
				$front_page = get_page_by_title( 'Yoga - Home' );
				$blog_page  = get_page_by_title( '' );
				break;	

			case 'gym':
				$front_page = get_page_by_title( 'Gym Home' );
				$blog_page  = get_page_by_title( '' );
				break;	

			case 'babysitter':
				$front_page = get_page_by_title( 'Home - BabySitter' );
				$blog_page  = get_page_by_title( '' );
				break;	

			case 'cv':
				$front_page = get_page_by_title( 'CV - Home' );
				$blog_page  = get_page_by_title( '' );
				break;	

			case 'car':
				$front_page = get_page_by_title( 'Home - Car' );
				$blog_page  = get_page_by_title( '' );
				break;	

			case 'seo':
				$front_page = get_page_by_title( 'Home - SEO' );
				$blog_page  = get_page_by_title( 'Blog' );
				break;	

			case 'yorkpress':
				$front_page = get_page_by_title( 'Home 5' );
				$blog_page  = get_page_by_title( '' );
				break;	

			case 'easydesign':
			case 'easyhost':
			case 'easyseo':
			case 'easysmall':
			case 'easyapp':
			case 'michigan-college':
			case 'easyseo2':
			case 'remittal':
			case 'pax':
			case 'solace':
			case 'trust':
			case 'michigan-online-learning':
			case 'discovery':
			case 'forward':
			case 'happypets':
			case 'risotto-restaurant':
			case 'risotto-cafe':
			case 'michigan-high-school':
			case 'kindergarten':
			case 'risotto-fastfood':
			case 'hotella-athens':
			case 'hotella-rome':
			case 'hotella-madrid':
				$front_page = get_page_by_title( 'Home 1' );
				$blog_page  = get_page_by_title( 'Blog' );
				break;
			
			case 'petshop':
			case 'dietitian':
			case 'perfume':
			case 'easyconference':
			case 'housekeeping':
			case 'carwash':
			case 'barber':
			case 'lawyer':
			case 'club':
			case 'corporate2':
			case 'sport':
			case 'events-business':
			case 'conference':
			case 'church2':
				$front_page = get_page_by_title( 'Home' );
				$blog_page  = get_page_by_title( 'Blog' );
				break;
				
			
			default:
				
				break;
		}						
		
		update_option( 'show_on_front', 'page' );
		
		if ( $front_page ) {
			update_option( 'page_on_front', $front_page->ID );
		}

		if ( $blog_page ) {
			update_option( 'page_for_posts', $blog_page->ID );
		}
			
	}
}
// Run
Deep_Demo_Importer::get_instance();