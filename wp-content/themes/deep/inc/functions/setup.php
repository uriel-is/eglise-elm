<?php
/**
 * Deep Free setup functions
 * @package free
 * @author webnus
 * @since 1.0.0
 */

// Don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( defined( 'DEEP_CORE_DIR' ) ) {
    return;
}

class DeepFreeFunctions {
    /**
	 * Instance of this class.
	 *
	 * @since   1.0.0
	 * @access  public
	 * @var     WN_Core_Templates
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
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'after_setup_theme', array( $this, 'setup' ) );
		add_action( 'widgets_init', array( $this, 'widgets_init' ) );
		add_action( 'after_setup_theme', array( $this, 'content_width' ), 0 );
		add_action( 'wp_print_footer_scripts', array( $this, 'skip_link_focus_fix' ) );
		add_action( 'admin_notices', array( $this, 'deepcorestup' ) );
		$this->includs();
	}
	
    /**
	 * Enqueue scripts.
	 *
	 * @since   1.0.0
	 */
    public function deepcorestup() {
		$out = '<div class="notice notice-success is-dismissible">';
		$out .= '<h3>' . __( 'Recommended', 'deep' ) . '</h3>';
		$out .= '<p>' . __( 'For more features you can install deep core', 'deep' ) . '</p>';
		$out .= '<a href="' . admin_url( 'themes.php?page=tgmpa-install-plugins' ) . '">' . __( 'Install Now', 'deep' ) . '</a>';
		$out .= '<br><br>';
		$out .= '</div>';
		echo wp_kses_post( $out );
	}

    /**
	 * Enqueue scripts.
	 *
	 * @since   1.0.0
	 */
    public function enqueue_scripts() {
        wp_enqueue_style( 'deep-stylesheet', get_template_directory_uri() . '/style.css' );
        $main_min_style_uri = DEEP_URL . '/assets/dist/css/frontend/base/wn-master.css';
        wp_register_style( 'deep-main-min-style', $main_min_style_uri, 'deep-preloader' );
        wp_enqueue_style( 'wn-iconfonts', DEEP_ASSETS_URL . 'css/frontend/base/07-iconfonts.css' );
        wp_enqueue_style( 'deep-main-min-style' );
	}

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	public function setup() {
		/*
			* Make theme available for translation.
			* Translations can be filed in the /languages/ directory.
			* If you're building a theme based on Twenty Nineteen, use a find and replace
			* to change 'deep free' to the name of your theme in all the template files.
			*/
		load_theme_textdomain( 'deep', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
			* Let WordPress manage the document title.
			* By adding theme support, we declare that this theme does not use a
			* hard-coded <title> tag in the document head, and expect WordPress to
			* provide it for us.
			*/
		add_theme_support( 'title-tag' );

		/*
			* Enable support for Post Thumbnails on posts and pages.
			*
			* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
			*/
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'deep' ),
			)
		);

		/*
			* Switch default core markup for search form, comment form, and comments
			* to output valid HTML5.
			*/
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'deep' ),
					'shortName' => __( 'S', 'deep' ),
					'size'      => 19.5,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'deep' ),
					'shortName' => __( 'M', 'deep' ),
					'size'      => 22,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'deep' ),
					'shortName' => __( 'L', 'deep' ),
					'size'      => 36.5,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'deep' ),
					'shortName' => __( 'XL', 'deep' ),
					'size'      => 49.5,
					'slug'      => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary', 'deep' ),
					'slug'  => 'primary',
					'color' => deep_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 33 ),
				),
				array(
					'name'  => __( 'Secondary', 'deep' ),
					'slug'  => 'secondary',
					'color' => deep_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 23 ),
				),
				array(
					'name'  => __( 'Dark Gray', 'deep' ),
					'slug'  => 'dark-gray',
					'color' => '#111',
				),
				array(
					'name'  => __( 'Light Gray', 'deep' ),
					'slug'  => 'light-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __( 'White', 'deep' ),
					'slug'  => 'white',
					'color' => '#FFF',
				),
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}

	/**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	public function widgets_init() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Left Sidebar', 'deep' ),
				'id'            => 'left-sidebar',
				'description'   => esc_html__( 'Appears in left side in the blog page.', 'deep' ),
				'before_widget' => '<div class="widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="subtitle-wrap"><h4 class="subtitle">',
				'after_title'   => '</h4></div>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Right Sidebar', 'deep' ),
				'id'            => 'right-sidebar',
				'description'   => esc_html__( 'Appears in right side in the blog page.', 'deep' ),
				'before_widget' => '<div class="widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="subtitle-wrap"><h4 class="subtitle">',
				'after_title'   => '</h4></div>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Section 1', 'deep' ),
				'id'            => 'footer-section-1',
				'description'   => esc_html__( 'Appears in footer section 1', 'deep' ),
				'before_widget' => '<div class="widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="subtitle">',
				'after_title'   => '</h5>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Section 2', 'deep' ),
				'id'            => 'footer-section-2',
				'description'   => esc_html__( 'Appears in footer section 2', 'deep' ),
				'before_widget' => '<div class="widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="subtitle">',
				'after_title'   => '</h5>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Section 3', 'deep' ),
				'id'            => 'footer-section-3',
				'description'   => esc_html__( 'Appears in footer section 3', 'deep' ),
				'before_widget' => '<div class="widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="subtitle">',
				'after_title'   => '</h5>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Section 4', 'deep' ),
				'id'            => 'footer-section-4',
				'description'   => esc_html__( 'Appears in footer section 4', 'deep' ),
				'before_widget' => '<div class="widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="subtitle">',
				'after_title'   => '</h5>',
			)
		);
	}

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width Content width.
	 */
	function content_width() {
		// This variable is intended to be overruled from themes.
		// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
		$GLOBALS['content_width'] = apply_filters( 'content_width', 640 );
	}

	/**
	 * Fix skip link focus in IE11.
	 *
	 * This does not enqueue the script because it is tiny and because it is only for IE11,
	 * thus it does not warrant having an entire dedicated blocking script being loaded.
	 *
	 * @link https://git.io/vWdr2
	 */
	function skip_link_focus_fix() {
		// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
		?>
		<script>
		/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
		</script>
		<?php
	}
	/**
	 * Includs.
	 *
	 * @since   1.0.0
	 */
	public function includs() {
		require get_template_directory() . '/inc/functions/template-functions.php';
		require get_template_directory() . '/inc/functions/template-tags.php';
		require get_template_directory() . '/inc/functions/customizer.php';
	}

}

// Run
DeepFreeFunctions::get_instance();