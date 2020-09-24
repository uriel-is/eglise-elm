<?php
/**
 * WPBakery Page Builder Templates Class - Main File.
 *
 * @author  Webnus
 */

// don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}

if ( ! class_exists( 'Webnus_VC_Templates' ) ) :
	class Webnus_VC_Templates {

		/**
		 * Instance of this class
		 *
		 * @since   1.0.0
		 * @access  private
		 * @var     Webnus_VC_Templates
		 */
		private static $instance;

		/**
		 * WEBNUS templates list
		 *
		 * @since   1.0.0
		 * @access  public
		 */
		public static $templates = array();

		/**
		 * WEBNUS templates categories
		 *
		 * @since   1.0.0
		 * @access  public
		 */
		public static $templates_categories = array();

		/**
		 * Preview template image path
		 *
		 * @since   1.0.0
		 * @access  public
		 */
		public static $image_path = 'http://deeptem.com/kc-sections/';

		/**
		 * @since 1.0.0
		 * @var bool
		 */
		protected $webnus_templates = false;

		/**
		 * @since 1.0.0
		 * @var bool
		 */
		protected $initialized = false;

		/**
		 * Provides access to a single instance of a module using the singleton pattern
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
		 * Define the core functionality of the WEBNUS WPBakery Page Builder Template
		 *
		 * @since   1.0.0
		 */
		public function __construct() {
			if ( ! is_plugin_active( 'js_composer/js_composer.php' ) || $this->initialized ) {
				return;
			}

			$this->initialized = true;
			add_filter( 'vc_load_default_templates', array( $this, 'empty_default_templates' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
			add_action( 'init', array( $this, 'init' ), 21 );
			$this->load_templates();
		}

		/**
		 * Init action
		 *
		 * @since   1.0.0
		 */
		public function init() {
			add_filter( 'vc_get_all_templates', array( $this, 'addTemplatesTab' ) );
			add_filter( 'vc_templates_render_category', array( &$this, 'renderTemplateBlock' ), 10 );
			add_filter( 'vc_templates_render_template', array( &$this, 'renderTemplateWindow' ), 10, 2 );
		}

		/**
		 * Empty default templates list and initialize variable
		 *
		 * @since   1.0.0
		 */
		public function empty_default_templates( $element ) {
			return array();
		}

		/**
		 * Load webnus templates list
		 *
		 * @since   1.0.0
		 */
		public function load_templates() {
			include_once DEEP_CORE_DIR . 'sections-templates/vc/vc-templates.php';
		}

		/**
		 * Add Deep templates tab
		 *
		 * @since   1.0.0
		 */
		public function addTemplatesTab( $data ) {
			if ( vc_user_access()->part( 'templates' )->checkStateAny( true, null, 'add' )->get() ) {
				$templates = $this->displayTemplates();
				if ( ! empty( $templates ) || vc_user_access()->part( 'templates' )->checkStateAny( true, null )->get() ) {
					$newCategory = array(
						'category'        => 'webnus_templates',
						'category_name'   => __( 'Deep Templates', 'deep' ),
						'category_weight' => 1,
						'templates'       => $this->displayTemplates(),
					);
					$data[]      = $newCategory;
				}
			}

			return $data;
		}

		/**
		 * Function to get all templates for display
		 *  - with image (optional preview image)
		 *  - with unique_id (required for do something for rendering.. )
		 *  - with name (required for display?)
		 *  - with type (required for requesting data in server)
		 *  - with category key (optional/required for filtering), if no category provided it will be displayed only in
		 * "All" category type vc_filter: vc_get_user_templates - hook to override "user My Templates" vc_filter:
		 * vc_get_all_templates - hook for override return array(all templates), hook to add/modify/remove more templates,
		 *  - this depends only to displaying in panel window (more layouts)
		 *
		 * @since   1.0.0
		 */
		public function displayTemplates() {
			$category_templates = array();
			$webnus_templates   = self::$templates;
			if ( ! empty( $webnus_templates ) ) {
				foreach ( $webnus_templates as $template_id => $template_data ) {
					$category_templates[] = array(
						'unique_id'          => $template_id,
						'name'               => $template_data['name'],
						// for rendering in backend/frontend with ajax
						'type'               => 'webnus_templates',
						// preview image
						'image'              => isset( $template_data['image_path'] ) ? $template_data['image_path'] : false,
						'custom_class'       => isset( $template_data['custom_class'] ) ? $template_data['custom_class'] : false,
						// Shortcode category
						'shortcode_category' => isset( $template_data['shortcode_category'] ) ? $template_data['shortcode_category'] : false,
						// preview
						'preview'            => isset( $template_data['preview'] ) ? $template_data['preview'] : '',
						// CSS
						'css'                => isset( $template_data['css'] ) ? $template_data['css'] : '',
					);
				}
			}

			return $category_templates;
		}

		public static function set_templates_categories( $category_name ) {
			$category_slug = vc_slugify( $category_name );

			if ( isset( self::$templates_categories[ $category_slug ] ) ) {
				self::$templates_categories[ $category_slug ]['count'] ++;
			} else {
				self::$templates_categories[ $category_slug ] = array(
					'name'  => $category_name,
					'count' => 1,
				);
			}
		}

		/**
		 * Create templates categories
		 *
		 * @since   1.0.0
		 */
		public function get_templates_categories() {
			$output               = $category_all_item = $categories_items = '';
			$templates_categories = self::$templates_categories;

			// create all category
			$templates_categories['all'] = array(
				'name'  => 'All',
				'count' => 0,
			);

			foreach ( $templates_categories as $category_slug => $category ) {
				if ( $category_slug == 'all' ) {
					continue;
				}
				$templates_categories['all']['count'] += $category['count'];
				$categories_items                     .= '
					<a href="#" class="" data-filter=".' . esc_attr( $category_slug ) . '">
						<span class="sections-name">' . esc_html( $category['name'] ) . '</span>
						<span class="sections-count">' . esc_html( $category['count'] ) . '</span>
					</a>';
			}

			$category_all_item = '
				<a href="#" class="wn-section-selected" data-filter="*">
					<span class="sections-name">' . esc_html( $templates_categories['all']['name'] ) . '</span>
					<span class="sections-count">' . esc_html( $templates_categories['all']['count'] ) . '</span>
				</a>';

			$output = '
					<div class="wn-all-section-template-categories">
						' . $category_all_item . $categories_items . '
					</div>';

			return $output;
		}

		/**
		 * Render category section
		 *
		 * @since   1.0.0
		 */
		public function renderTemplateBlock( $category ) {
			if ( 'webnus_templates' === $category['category'] ) {
				$category['output'] = '<div class="wn-main-wrap-section-templates">';
					// Render categories
					$category['output'] .= $this->get_templates_categories();

					// Render template list items
					$category['output'] .= '
					<div class="vc_column vc_col-sm-12">
						<div class="vc_ui-template-list vc_templates-list-webnus_templates wn-templates-sections vc_ui-list-bar" data-vc-action="collapseAll">';
				if ( ! empty( $category['templates'] ) ) {
					foreach ( $category['templates'] as $template ) {
						$category['output'] .= $this->renderTemplateListItem( $template );
					}
				}
					$category['output'] .= '
						</div>
					</div>';

				$category['output'] .= '</div>'; // close wn main wrap
			}

			return $category;
		}

		/**
		 * Output rendered template in new panel dialog
		 *
		 * @since 1.0.0
		 *
		 * @param $template_name
		 * @param $template_data
		 *
		 * @return string
		 */
		function renderTemplateWindow( $template_name, $template_data ) {
			if ( 'webnus_templates' === $template_data['type'] ) {
				return $this->renderTemplateWindowWebnus( $template_name, $template_data );
			}

			return $template_name;
		}

		/**
		 * @since 1.0.0
		 *
		 * @param $template_name
		 * @param $template_data
		 *
		 * @return string
		 */
		public function renderTemplateWindowWebnus( $template_name, $template_data ) {
			ob_start();
			$template_id            = esc_attr( $template_data['unique_id'] );
			$template_id_hash       = md5( $template_id ); // needed for jquery target for TTA
			$template_name          = esc_html( $template_name );
			$preview_template_title = esc_attr__( 'Preview template', 'deep' );
			$add_template_title     = esc_attr__( 'Add template', 'deep' );
			$template_cat           = $template_data['shortcode_category'];

			echo <<<HTML
				<button type="button" class="vc_ui-list-bar-item-trigger" title="$add_template_title"
							data-template-handler=""
							data-vc-ui-element="template-title">$template_name</button>
							<div class="wn-template-cat">$template_cat</div>
				<div class="vc_ui-list-bar-item-actions">
					<button type="button" class="vc_general vc_ui-control-button wn-trigger-button" title="$add_template_title"
							data-template-handler="">
						<i class="vc-composer-icon vc-c-icon-add"></i>
					</button>
				</div>
HTML;

			return ob_get_clean();
		}

		/**
		 * Render
		 *
		 * @since 1.0.0
		 */
		public function renderUITemplate() {
			vc_include_template(
				'editors/popups/vc_ui-panel-templates.tpl.php',
				array(
					'box' => $this,
				)
			);

			return '';
		}

		/**
		 * Loading Any templates Shortcodes for backend by string $template_id from AJAX
		 * vc_filter: vc_templates_render_backend_template - called when unknown template requested to render in backend
		 *
		 * @since 1.0.0
		 */
		public function renderBackendTemplate() {
			vc_user_access()->checkAdminNonce()->validateDie()->wpAny( 'edit_posts', 'edit_pages' )->validateDie()->part( 'templates' )->can()->validateDie();

			$template_id   = vc_post_param( 'template_unique_id' );
			$template_type = vc_post_param( 'template_type' );

			if ( ! isset( $template_id, $template_type ) || '' === $template_id || '' === $template_type ) {
				die( 'Error: Vc_Templates_Panel_Editor::renderBackendTemplate:1' );
			}
			WPBMap::addAllMappedShortcodes();
			if ( 'webnus_templates' === $template_type ) {
				$saved_templates = get_option( $this->option_name );

				$content = trim( $saved_templates[ $template_id ]['template'] );
				$content = str_replace( '\"', '"', $content );
				$pattern = get_shortcode_regex();
				$content = preg_replace_callback( "/{$pattern}/s", 'vc_convert_shortcode', $content );
				echo $content;
				die();
			}
		}

		/**
		 * Render template list item
		 *
		 * @since 1.0.0
		 */
		public function renderTemplateListItem( $template ) {
			$name                 = isset( $template['name'] ) ? esc_html( $template['name'] ) : esc_html( __( 'No title', 'deep' ) );
			$template_id          = esc_attr( $template['unique_id'] );
			$template_id_hash     = md5( $template_id ); // needed for jquery target for TTA
			$template_name        = esc_html( $name );
			$template_name_lower  = esc_attr( vc_slugify( $template_name ) );
			$template_type        = esc_attr( isset( $template['type'] ) ? $template['type'] : 'custom' );
			$custom_class         = esc_attr( isset( $template['custom_class'] ) ? $template['custom_class'] : '' );
			$template_image       = esc_attr( isset( $template['image'] ) ? $template['image'] : '' );
			$template_preview     = esc_attr( isset( $template['preview'] ) ? $template['preview'] : '' );
			$template_css         = esc_attr( isset( $template['css'] ) ? $template['css'] : '' );
			$templates_categories = self::$templates_categories;

			$output  = <<<HTML
						<div class="vc_ui-template vc_templates-template-type-default_templates $custom_class"
							data-template_id="$template_id"
							data-template_id_hash="$template_id_hash"
							data-category="$template_type"
							data-template_unique_id="$template_id"
							data-template_name="$template_name_lower"
							data-template_css="$template_css"
							data-template_type="default_templates"
							data-vc-content=".vc_ui-template-content">
							<div class="vc_ui-list-bar-item">
HTML;
			$output .= '<div class="wn-section-overlay"></div>';
			$output .= '
			<div class="webnus-template-section-box deep-lazy">
				<!--
				<img src="' . esc_url( $template_image ) . '" alt="' . esc_attr( $name ) . '" width="300" height="200">
				-->
			</div>';

			$output .= apply_filters( 'vc_templates_render_template', $name, $template );

			if ( ! empty( $template_preview ) ) {
				$output .= '
				<div class="webnus-template-preview-link">
					<a href="' . esc_html( $template_preview ) . '" target="_blank">' . esc_html__( 'Preview', 'deep' ) . '</a>
				</div>';
			}

			$output .= <<<HTML
							</div>
							<div class="vc_ui-template-content" data-js-content> </div>
						</div>
HTML;

			return $output;
		}

		/**
		 * Register Stylesheets and JavaScripts.
		 *
		 * @since   1.0.0
		 */
		public function admin_enqueue_scripts() {
			wp_enqueue_script( 'wn-load-isotop', DEEP_ASSETS_URL . 'js/libraries/isotope.pkgd.min.js', array( 'jquery' ), null, true );
			wp_enqueue_script( 'wn-vc-templates-scripts', DEEP_CORE_URL . 'sections-templates/vc/assets/vc-sections-templates.js', array( 'jquery' ), null, true );
		}

	}

	// Run WEBNUS WPBakery Page Builder Template
	Webnus_VC_Templates::get_instance();
endif;
