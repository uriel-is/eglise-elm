<?php
/**
 * Importer
 *
 * Radium Importer - Modified For ReduxFramework
 * @link https://github.com/FrankM1/radium-one-click-demo-install
 *
 * @package     WBC_Importer - Extension for Importing demo content
 * @author      Webcreations907
 * @version     1.0.3
 */

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// don't load directly
if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}

// Don't duplicate me!
if ( !class_exists( 'ReduxFramework_extension_wbc_importer' ) ) {
    class ReduxFramework_extension_wbc_importer {

        public static $instance;

        static $version = "1.0.3";

        protected $parent;

        private $filesystem = array();

        public $extension_url;
        public $extension_dir;
        public $demo_data_dir;

        public $wbc_import_files = array();

        public $active_import_id;
        public $active_import;
        public $pages;
        public $posts;
        public $contact_forms;
        public $portfolios;
        public $fetch_attachments;
        public $import_sliders;
        public $import_theme_opts;
        public $import_widgets;
        public $page_builder;
        private $webnus_dir;
        private $demo_dir;

        /**
         * Class Constructor
         *
         * @since       1.0
         * @access      public
         * @return      void
         */
        public function __construct( $parent ) {
            
            $this->parent = $parent;

            if ( !is_admin() ) return;

            // Hides importer section if anything but true returned. Way to abort :)
            if ( true !== apply_filters( 'wbc_importer_abort', true ) ) {
                return;
            }

            $this->webnus_dir = ABSPATH.'wp-content/uploads/webnus/';
            $this->demo_dir = $this->webnus_dir . 'demo-data/';


            if ( empty( $this->extension_dir ) ) {
                $this->extension_dir = trailingslashit( str_replace( '\\', '/', dirname( __FILE__ ) ) );
                $this->extension_url = site_url( str_replace( trailingslashit( str_replace( '\\', '/', ABSPATH ) ), '', $this->extension_dir ) );
                $this->demo_data_dir = apply_filters( "wbc_importer_dir_path", $this->demo_dir );
            }

            // Delete saved options of imported demos, for dev/testing purpose
            // delete_option('wbc_imported_demos');

            $this->getImports();

            $this->field_name = 'wbc_importer';

            self::$instance = $this;

            add_filter( 'redux/' . $this->parent->args['opt_name'] . '/field/class/' . $this->field_name, array( &$this,
                    'overload_field_path'
                ) );

            // call ajax actions
            add_action( 'wp_ajax_redux_wbc_importer', array( $this, 'ajax_importer' ) );
            add_action( 'wp_ajax_webnus_create_demo_dir', array( $this, 'create_demo_dir' ) );

            add_filter( 'redux/'.$this->parent->args['opt_name'].'/field/wbc_importer_files', array( $this, 'addImportFiles' ) );

            // Adds Importer section to panel
            // $this->add_importer_section();

            include $this->extension_dir.'inc/class-wbc-importer-progress.php';
            $wbc_progress = new Wbc_Importer_Progress( $this->parent );

            include_once 'webnus-wbc-configs.php';
        }

        /**
         * Get the demo folders/files
         * Provided fallback where some host require FTP info
         *
         * @return array list of files for demos
         */
        public function demoFiles() {
            if ( defined( 'DEEPFREE' ) ) {
                $fix_options = array(
                    'content-ele.xml' => array(
                        'name' => 'content-ele.xml',
                        'type' => 'f',
                    ),
                    'header.json' => array(
                        'name' => "header.json",
                        'type' => "f"
                    ),
                    'screen-image.jpg' => array(
                        'name' => "screen-image.jpg",
                        'type' => "f"
                    ),
                    'theme_options.txt' => array(
                        'name' => "theme_options.txt",
                        'type' => "f"
                    ),
                    'widgets.json' => array(
                        'name' => "widgets.json",
                        'type' => "f"
                    ),
                );
                $dir_array = array(
                    'agency2'       => array(
                        'name'          => 'agency2',
                        'type'          => 'd',
                        'display_name'  => 'Modern Agency',
                        'preview_url'   => 'http://deeptem.com/agency2/',
                        'import_name'   => 'wbc-import-1',
                        'files'         => $fix_options,
                    ),
                    'magazine'      => array(
                        'name'          => 'magazine',
                        'type'          => 'd',
                        'display_name'  => 'magazine',
                        'preview_url'   => 'http://deeptem.com/magazine/',
                        'import_name'   => 'wbc-import-2',
                        'files'         => $fix_options,
                    ),
                    'personal-blog' => array(
                        'name'          => 'personal-blog',
                        'type'          => 'd',
                        'display_name'  => 'personal blog',
                        'preview_url'   => 'http://deeptem.com/personal-blog/',
                        'import_name'   => 'wbc-import-3',
                        'files'         => $fix_options,
                    ),
                    'minimal-blog'  => array(
                        'name'          => 'minimal-blog',
                        'type'          => 'd',
                        'display_name'  => 'Minimal Blog',
                        'preview_url'   => 'http://deeptem.com/minimal-blog/',
                        'import_name'   => 'wbc-import-4',
                        'files'         => $fix_options,
                    ),
                    'yorkpress'     => array(
                        'name'          => 'yorkpress',
                        'type'          => 'd',
                        'display_name'  => 'Yorkpress',
                        'preview_url'   => 'http://deeptem.com/yorkpress/',
                        'import_name'   => 'wbc-import-5',
                        'files'         => $fix_options,
                    ),
                );
            } else {
                $fix_options = array(
                    'content.xml' => array(
                        'name' => 'content.xml',
                        'type' => 'f',
                    ),
                    'content-kc.xml' => array(
                        'name' => 'content-kc.xml',
                        'type' => 'f',
                    ),
                    'content-ele.xml' => array(
                        'name' => 'content-ele.xml',
                        'type' => 'f',
                    ),
                    'header.json' => array(
                        'name' => "header.json",
                        'type' => "f"
                    ),
                    'screen-image.jpg' => array(
                        'name' => "screen-image.jpg",
                        'type' => "f"
                    ),
                    'theme_options.txt' => array(
                        'name' => "theme_options.txt",
                        'type' => "f"
                    ),
                    'widgets.json' => array(
                        'name' => "widgets.json",
                        'type' => "f"
                    ),
                );
                $dir_array = array(
                    'agency2' => array(
                        'name' => 'agency2',
                        'type' => 'd',
                        'display_name' => 'Modern Agency',
                        'preview_url' => 'http://deeptem.com/agency2/',
                        'import_name' => 'wbc-import-1',
                        'files' => $fix_options,
                    ),
                    'corporate' => array(
                        'name' => 'corporate',
                        'type' => 'd',
                        'display_name' => 'corporate',
                        'preview_url' => 'http://deeptem.com/corporate/',
                        'import_name' => 'wbc-import-2',
                        'files' => array_merge($fix_options, array(
                            'deep-corporate-main-slider.zip' => array(
                                'name' => 'deep-corporate-main-slider.zip',
                                'type' => 'f',
                            ) ,
                            'deep-corporate-slider1.zip' => array(
                                'name' => "deep-corporate-slider1.zip",
                                'type' => "f"
                            ) ,
                        )) ,
                    ),
                    'shop' => array(
                        'name' => 'shop',
                        'type' => 'd',
                        'display_name' => 'shop',
                        'preview_url' => 'http://deeptem.com/shop/',
                        'import_name' => 'wbc-import-3',
                        'files' => array_merge($fix_options, array(
                            'deep-shop-main-slider.zip' => array(
                                'name' => 'deep-shop-main-slider.zip',
                                'type' => 'f',
                            ) ,
                            'deep-shop-slider1.zip' => array(
                                'name' => "deep-shop-slider1.zip",
                                'type' => "f"
                            ) ,
                            'deep-shop-slider2.zip' => array(
                                'name' => "deep-shop-slider2.zip",
                                'type' => "f"
                            ) ,
                            'product-map-view.zip' => array(
                                'name' => "product-map-view.zip",
                                'type' => "f"
                            ) ,
                        )) ,
                    ),
                    'crypto' => array(
                        'name' => 'crypto',
                        'type' => 'd',
                        'display_name' => 'crypto',
                        'preview_url' => 'http://deeptem.com/crypto/',
                        'import_name' => 'wbc-import-4',
                        'files' => array_merge($fix_options, array(
                            'deep-crypto-slider1.zip' => array(
                                'name' => 'deep-crypto-slider1.zip',
                                'type' => 'f',
                            ) ,
                            'deep-crypto-slider2.zip' => array(
                                'name' => 'deep-crypto-slider2.zip',
                                'type' => 'f',
                            ) ,
                        )) ,
                    ),
                    'business' => array(
                        'name' => 'business',
                        'type' => 'd',
                        'display_name' => 'business',
                        'preview_url' => 'http://deeptem.com/business/',
                        'import_name' => 'wbc-import-5',
                        'files' => $fix_options,
                    ),
                    'minimal-blog' => array(
                        'name' => 'minimal-blog',
                        'type' => 'd',
                        'display_name' => 'Minimal Blog',
                        'preview_url' => 'http://deeptem.com/minimal-blog/',
                        'import_name' => 'wbc-import-6',
                        'files' => $fix_options,
                    ),
                    'events' => array(
                        'name' => 'events',
                        'type' => 'd',
                        'display_name' => 'events',
                        'preview_url' => 'http://deeptem.com/events/',
                        'import_name' => 'wbc-import-7',
                        'files' => $fix_options,
                    ),
                    'magazine' => array(
                        'name' => 'magazine',
                        'type' => 'd',
                        'display_name' => 'magazine',
                        'preview_url' => 'http://deeptem.com/magazine/',
                        'import_name' => 'wbc-import-8',
                        'files' => $fix_options,
                    ),
                    'photography' => array(
                        'name' => 'photography',
                        'type' => 'd',
                        'display_name' => 'photography',
                        'preview_url' => 'http://deeptem.com/photography/',
                        'import_name' => 'wbc-import-9',
                        'files' => $fix_options,
                    ),
                    'portfolio' => array(
                        'name' => 'portfolio',
                        'type' => 'd',
                        'display_name' => 'portfolio',
                        'preview_url' => 'http://deeptem.com/portfolio/',
                        'import_name' => 'wbc-import-10',
                        'files' => $fix_options,
                    ),
                    'buddypress' => array(
                        'name' => 'buddypress',
                        'type' => 'd',
                        'display_name' => 'buddypress',
                        'preview_url' => 'http://deeptem.com/buddypress/',
                        'import_name' => 'wbc-import-11',
                        'files' => array_merge($fix_options, array(
                            'menu_icons.txt' => array(
                                'name' => "menu_icons.txt",
                                'type' => "f"
                            ),
                        )) ,
                    ),
                    'construction' => array(
                        'name' => 'construction',
                        'type' => 'd',
                        'display_name' => 'construction',
                        'preview_url' => 'http://deeptem.com/construction/',
                        'import_name' => 'wbc-import-12',
                        'files' => array_merge($fix_options, array(
                            'deep-construction-slider-1.zip' => array(
                                'name' => 'deep-construction-slider-1.zip',
                                'type' => 'f',
                            ) ,
                        )) ,
                    ),
                    'church' => array(
                        'name' => 'church',
                        'type' => 'd',
                        'display_name' => 'church',
                        'preview_url' => 'http://deeptem.com/church/',
                        'import_name' => 'wbc-import-13',
                        'files' => array_merge($fix_options, array(
                            'discovery-slider1.zip' => array(
                                'name' => 'discovery-slider1.zip',
                                'type' => 'f',
                            ) ,
                        )) ,
                    ),
                    'freelancer' => array(
                        'name' => 'freelancer',
                        'type' => 'd',
                        'display_name' => 'freelancer',
                        'preview_url' => 'http://deeptem.com/freelancer/',
                        'import_name' => 'wbc-import-14',
                        'files' => $fix_options,
                    ),
                    'startup' => array(
                        'name' => 'startup',
                        'type' => 'd',
                        'display_name' => 'startup',
                        'preview_url' => 'http://deeptem.com/startup/',
                        'import_name' => 'wbc-import-15',
                        'files' => array_merge($fix_options, array(
                            'deep-startup-slider1.zip' => array(
                                'name' => 'deep-startup-slider1.zip',
                                'type' => 'f',
                            ) ,
                            'menu_icons.txt' => array(
                                'name' => "menu_icons.txt",
                                'type' => "f"
                            ),
                        )) ,
                    ),
                    'charity' => array(
                        'name' => 'charity',
                        'type' => 'd',
                        'display_name' => 'charity',
                        'preview_url' => 'http://deeptem.com/charity/',
                        'import_name' => 'wbc-import-16',
                        'files' => array_merge($fix_options, array(
                            'deep-charity-slider1.zip' => array(
                                'name' => 'deep-charity-slider1.zip',
                                'type' => 'f',
                            ) ,
                        )) ,
                    ),
                    'restaurant' => array(
                        'name' => 'restaurant',
                        'type' => 'd',
                        'display_name' => 'restaurant',
                        'preview_url' => 'http://deeptem.com/restaurant/',
                        'import_name' => 'wbc-import-17',
                        'files' => array_merge($fix_options, array(
                            'deep-restaurant-slider-1.zip' => array(
                                'name' => 'deep-restaurant-slider-1.zip',
                                'type' => 'f',
                            ) ,
                        )) ,
                    ),
                    'edge' => array(
                        'name' => 'edge',
                        'type' => 'd',
                        'display_name' => 'Edge One-Pager',
                        'preview_url' => 'http://deeptem.com/edge/',
                        'import_name' => 'wbc-import-18',
                        'files' => $fix_options,
                    ),
                    'wedding' => array(
                        'name' => 'wedding',
                        'type' => 'd',
                        'display_name' => 'wedding',
                        'preview_url' => 'http://deeptem.com/wedding/',
                        'import_name' => 'wbc-import-19',
                        'files' => $fix_options,
                    ),
                    'fashion' => array(
                        'name' => 'fashion',
                        'type' => 'd',
                        'display_name' => 'fashion',
                        'preview_url' => 'http://deeptem.com/fashion/',
                        'import_name' => 'wbc-import-20',
                        'files' => $fix_options,
                    ),
                    'web-design' => array(
                        'name' => 'web-design',
                        'type' => 'd',
                        'display_name' => 'web design',
                        'preview_url' => 'http://deeptem.com/web-design/',
                        'import_name' => 'wbc-import-21',
                        'files' => array_merge($fix_options, array(
                            'deep-wd-slider1.zip' => array(
                                'name' => 'deep-wd-slider1.zip',
                                'type' => 'f',
                            ) ,
                            'deep-wd-slider2.zip' => array(
                                'name' => 'deep-wd-slider2.zip',
                                'type' => 'f',
                            ) ,
                            'deep-wd-slider3.zip' => array(
                                'name' => 'deep-wd-slider3.zip',
                                'type' => 'f',
                            ) ,
                        )) ,
                    ),
                    'app' => array(
                        'name' => 'app',
                        'type' => 'd',
                        'display_name' => 'App Landing',
                        'preview_url' => 'http://deeptem.com/app/',
                        'import_name' => 'wbc-import-22',
                        'files' => array_merge($fix_options, array(
                            'deep-app-slider.zip' => array(
                                'name' => 'deep-app-slider.zip',
                                'type' => 'f',
                            ) ,
                            'deep-app-showcase-carousel.zip' => array(
                                'name' => 'deep-app-showcase-carousel.zip',
                                'type' => 'f',
                            ) ,
                        )) ,
                    ),
                    'personal-blog' => array(
                        'name' => 'personal-blog',
                        'type' => 'd',
                        'display_name' => 'personal blog',
                        'preview_url' => 'http://deeptem.com/personal-blog/',
                        'import_name' => 'wbc-import-23',
                        'files' => $fix_options,
                    ),
                    'dentist' => array(
                        'name' => 'dentist',
                        'type' => 'd',
                        'display_name' => 'dentist',
                        'preview_url' => 'http://deeptem.com/dentist/',
                        'import_name' => 'wbc-import-24',
                        'files' => array_merge($fix_options, array(
                            'deep-dentist-main-slider.zip' => array(
                                'name' => 'deep-dentist-main-slider.zip',
                                'type' => 'f',
                            ) ,
                        )) ,
                    ),
                    'beauty' => array(
                        'name' => 'beauty',
                        'type' => 'd',
                        'display_name' => 'beauty',
                        'preview_url' => 'http://deeptem.com/beauty/',
                        'import_name' => 'wbc-import-25',
                        'files' => array_merge($fix_options, array(
                            'deep-beauty-slider1.zip' => array(
                                'name' => 'deep-beauty-slider1.zip',
                                'type' => 'f',
                            ) ,
                        )) ,
                    ),
                    'classic' => array(
                        'name' => 'classic',
                        'type' => 'd',
                        'display_name' => 'classic',
                        'preview_url' => 'http://deeptem.com/classic/',
                        'import_name' => 'wbc-import-26',
                        'files' => array_merge($fix_options, array(
                            'deep-classic-slider1.zip' => array(
                                'name' => 'deep-classic-slider1.zip',
                                'type' => 'f',
                            ) ,
                        )) ,
                    ),
                    'agency1' => array(
                        'name' => 'agency1',
                        'type' => 'd',
                        'display_name' => 'Agency',
                        'preview_url' => 'http://deeptem.com/agency1/',
                        'import_name' => 'wbc-import-27',
                        'files' => $fix_options,
                    ),
                    'language-school' => array(
                        'name' => 'language-school',
                        'type' => 'd',
                        'display_name' => 'language school',
                        'preview_url' => 'http://deeptem.com/language-school/',
                        'import_name' => 'wbc-import-28',
                        'files' => array_merge($fix_options, array(
                            'deep-language-school.zip' => array(
                                'name' => 'deep-language-school.zip',
                                'type' => 'f',
                            ) ,
                        )) ,
                    ),
                    'cafe' => array(
                        'name' => 'cafe',
                        'type' => 'd',
                        'display_name' => 'cafe',
                        'preview_url' => 'http://deeptem.com/cafe/',
                        'import_name' => 'wbc-import-29',
                        'files' => $fix_options,
                    ),
                    'petsitter' => array(
                        'name' => 'petsitter',
                        'type' => 'd',
                        'display_name' => 'petsitter',
                        'preview_url' => 'http://deeptem.com/petsitter/',
                        'import_name' => 'wbc-import-30',
                        'files' => $fix_options,
                    ),
                    'spa' => array(
                        'name' => 'spa',
                        'type' => 'd',
                        'display_name' => 'spa',
                        'preview_url' => 'http://deeptem.com/spa/',
                        'import_name' => 'wbc-import-31',
                        'files' => array_merge($fix_options, array(
                            'deep-spa-slider1.zip' => array(
                                'name' => 'deep-spa-slider1.zip',
                                'type' => 'f',
                            ) ,
                        )) ,
                    ),
                    'mechanic' => array(
                        'name' => 'mechanic',
                        'type' => 'd',
                        'display_name' => 'mechanic',
                        'preview_url' => 'http://deeptem.com/mechanic/',
                        'import_name' => 'wbc-import-32',
                        'files' => $fix_options,
                    ),
                    'musician' => array(
                        'name' => 'musician',
                        'type' => 'd',
                        'display_name' => 'musician',
                        'preview_url' => 'http://deeptem.com/musician/',
                        'import_name' => 'wbc-import-33',
                        'files' => $fix_options,
                    ),
                    'consulting' => array(
                        'name' => 'consulting',
                        'type' => 'd',
                        'display_name' => 'consulting',
                        'preview_url' => 'http://deeptem.com/consulting/',
                        'import_name' => 'wbc-import-34',
                        'files' => array_merge($fix_options, array(
                            'consulting-main-slider.zip' => array(
                                'name' => 'consulting-main-slider.zip',
                                'type' => 'f',
                            ) ,
                            'cosulting-case-studies.zip' => array(
                                'name' => 'cosulting-case-studies.zip',
                                'type' => 'f',
                            ) ,
                        )) ,
                    ),
                    'furniture' => array(
                        'name' => 'furniture',
                        'type' => 'd',
                        'display_name' => 'furniture',
                        'preview_url' => 'http://deeptem.com/furniture/',
                        'import_name' => 'wbc-import-35',
                        'files' => array_merge($fix_options, array(
                            'deep-furniture-slider1.zip' => array(
                                'name' => 'deep-furniture-slider1.zip',
                                'type' => 'f',
                            ) ,
                        )) ,
                    ),
                    'insurance' => array(
                        'name' => 'insurance',
                        'type' => 'd',
                        'display_name' => 'insurance',
                        'preview_url' => 'http://deeptem.com/insurance/',
                        'import_name' => 'wbc-import-36',
                        'files' => $fix_options,
                    ),
                    'product-landing' => array(
                        'name' => 'product-landing',
                        'type' => 'd',
                        'display_name' => 'Product Landing',
                        'preview_url' => 'http://deeptem.com/product-landing/',
                        'import_name' => 'wbc-import-37',
                        'files' => array_merge($fix_options, array(
                            'deep-product-landing-slider.zip' => array(
                                'name' => 'deep-product-landing-slider.zip',
                                'type' => 'f',
                            ) ,
                        )) ,
                    ),
                    'real-estate' => array(
                        'name' => 'real-estate',
                        'type' => 'd',
                        'display_name' => 'real estate',
                        'preview_url' => 'http://deeptem.com/real-estate/',
                        'import_name' => 'wbc-import-38',
                        'files' => array_merge($fix_options, array(
                            'deep-real-estate-slider1.zip' => array(
                                'name' => 'deep-real-estate-slider1.zip',
                                'type' => 'f',
                            ) ,
                        )) ,
                    ),
                    'health' => array(
                        'name' => 'health',
                        'type' => 'd',
                        'display_name' => 'health',
                        'preview_url' => 'http://deeptem.com/health/',
                        'import_name' => 'wbc-import-39',
                        'files' => array_merge($fix_options, array(
                            'deep-health-slider.zip' => array(
                                'name' => 'deep-health-slider.zip',
                                'type' => 'f',
                            ) ,
                        )) ,
                    ),
                    'architect' => array(
                        'name' => 'architect',
                        'type' => 'd',
                        'display_name' => 'architect',
                        'preview_url' => 'http://deeptem.com/architect/',
                        'import_name' => 'wbc-import-40',
                        'files' => array_merge($fix_options, array(
                            'architect-slider.zip' => array(
                                'name' => 'architect-slider.zip',
                                'type' => 'f',
                            ) ,
                        )) ,
                    ),
                    'software' => array(
                        'name' => 'software',
                        'type' => 'd',
                        'display_name' => 'software',
                        'preview_url' => 'http://deeptem.com/software/',
                        'import_name' => 'wbc-import-41',
                        'files' => $fix_options,
                    ),
                    'boutique' => array(
                        'name' => 'boutique',
                        'type' => 'd',
                        'display_name' => 'boutique',
                        'preview_url' => 'http://deeptem.com/boutique/',
                        'import_name' => 'wbc-import-42',
                        'files' => array_merge($fix_options, array(
                            'deep-boutique-NUM.zip' => array(
                                'name' => 'deep-boutique-NUM.zip',
                                'type' => 'f',
                            ) ,
                        )) ,
                    ),
                    'lawyer' => array(
                        'name' => 'lawyer',
                        'type' => 'd',
                        'display_name' => 'lawyer',
                        'preview_url' => 'http://deeptem.com/lawyer/',
                        'import_name' => 'wbc-import-43',
                        'files' => array_merge($fix_options, array(
                            'HomeSlider.zip' => array(
                                'name' => 'HomeSlider.zip',
                                'type' => 'f',
                            ) ,
                        )) ,
                    ),
                    'travel' => array(
                        'name' => 'travel',
                        'type' => 'd',
                        'display_name' => 'travel',
                        'preview_url' => 'http://deeptem.com/travel/',
                        'import_name' => 'wbc-import-44',
                        'files' => $fix_options,
                    ),
                    'rtl' => array(
                        'name' => 'rtl',
                        'type' => 'd',
                        'display_name' => 'RTL - Magazine',
                        'preview_url' => 'http://deeptem.com/rtl/',
                        'import_name' => 'wbc-import-45',
                        'files' => $fix_options,
                    ),
                    'coming-soon' => array(
                        'name' => 'coming-soon',
                        'type' => 'd',
                        'display_name' => 'Coming Soon',
                        'preview_url' => 'http://deeptem.com/coming-soon/',
                        'import_name' => 'wbc-import-46',
                        'files' => $fix_options,
                    ),
                    'cosmetic' => array(
                        'name' => 'cosmetic',
                        'type' => 'd',
                        'display_name' => 'Cosmetic',
                        'preview_url' => 'http://deeptem.com/cosmetic/',
                        'import_name' => 'wbc-import-47',
                        'files' => array_merge($fix_options, array(
                            'cosmetic-slider1.zip' => array(
                                'name' => 'cosmetic-slider1.zip',
                                'type' => 'f',
                            ) ,
                        )),
                    ),
                    'yoga' => array(
                        'name' => 'yoga',
                        'type' => 'd',
                        'display_name' => 'Yoga',
                        'preview_url' => 'http://deeptem.com/yoga/',
                        'import_name' => 'wbc-import-48',
                        'files' => array_merge($fix_options, array(
                            'deep-yoga-main-slider.zip' => array(
                                'name' => 'deep-yoga-main-slider.zip',
                                'type' => 'f',
                            ) ,
                        )),
                    ),
                    'cv' => array(
                        'name' => 'cv',
                        'type' => 'd',
                        'display_name' => 'CV',
                        'preview_url' => 'http://deeptem.com/cv/',
                        'import_name' => 'wbc-import-49',
                        'files' => $fix_options,
                    ),
                    'car' => array(
                        'name' => 'car',
                        'type' => 'd',
                        'display_name' => 'Car',
                        'preview_url' => 'http://deeptem.com/car/',
                        'import_name' => 'wbc-import-50',
                        'files' => array_merge($fix_options, array(
                            'deep-car-main-slider.zip' => array(
                                'name' => 'deep-car-main-slider.zip',
                                'type' => 'f',
                            ) ,
                        )),
                    ),
                    'seo' => array(
                        'name' => 'seo',
                        'type' => 'd',
                        'display_name' => 'SEO',
                        'preview_url' => 'http://deeptem.com/seo/',
                        'import_name' => 'wbc-import-51',
                        'files' => array_merge($fix_options, array(
                            'deep-seo-slider1.zip' => array(
                                'name' => 'deep-seo-slider1.zip',
                                'type' => 'f',
                            ) ,
                        )),
                    ),
                    'easydesign' => array(
                        'name' => 'easydesign',
                        'type' => 'd',
                        'display_name' => 'EasyDesign',
                        'preview_url' => 'http://deeptem.com/easydesign/',
                        'import_name' => 'wbc-import-52',
                        'files' => array_merge($fix_options, array(
                            'easy-design-rev-slider11.zip' => array(
                                'name' => 'easy-design-rev-slider11.zip',
                                'type' => 'f',
                            ),
                            'easy-design-rev-slider1.zip' => array(
                                'name' => 'easy-design-rev-slider1.zip',
                                'type' => 'f',
                            ),
                        )),
                    ),
                    'easyhost' => array(
                        'name' => 'easyhost',
                        'type' => 'd',
                        'display_name' => 'EasyHost',
                        'preview_url' => 'http://deeptem.com/easyhost/',
                        'import_name' => 'wbc-import-53',
                        'files' => array_merge($fix_options, array(
                            'Host-slider.zip' => array(
                                'name' => 'Host-slider.zip',
                                'type' => 'f',
                            ) ,
                        )),
                    ),
                    'easyseo' => array(
                        'name' => 'easyseo',
                        'type' => 'd',
                        'display_name' => 'EasySeo',
                        'preview_url' => 'http://deeptem.com/easyseo/',
                        'import_name' => 'wbc-import-54',
                        'files' => array_merge($fix_options, array(
                            'easyseo-whiteboard.zip' => array(
                                'name' => 'easyseo-whiteboard.zip',
                                'type' => 'f',
                            ),
                            'seo-rev-slider1.zip' => array(
                                'name' => 'seo-rev-slider1.zip',
                                'type' => 'f',
                            ),
                        )),
                    ),
                    'easysmall' => array(
                        'name' => 'easysmall',
                        'type' => 'd',
                        'display_name' => 'EasySmall',
                        'preview_url' => 'http://deeptem.com/easysmall/',
                        'import_name' => 'wbc-import-55',
                        'files' => array_merge($fix_options, array(
                            'easy-small-rev1.zip' => array(
                                'name' => 'easy-small-rev1.zip',
                                'type' => 'f',
                            ),
                            'seo-rev-slider1.zip' => array(
                                'name' => 'seo-rev-slider1.zip',
                                'type' => 'f',
                            ),
                            'web-product-light-hero-3d4.zip' => array(
                                'name' => 'web-product-light-hero-3d4.zip',
                                'type' => 'f',
                            ),
                            'creative-freedom.zip' => array(
                                'name' => 'creative-freedom.zip',
                                'type' => 'f',
                            ),
                        )),
                    ),
                    'easyconference' => array(
                        'name' => 'easyconference',
                        'type' => 'd',
                        'display_name' => 'EasyConference',
                        'preview_url' => 'http://deeptem.com/easyconference/',
                        'import_name' => 'wbc-import-56',
                        'files' => $fix_options,
                    ),
                    'easyapp' => array(
                        'name' => 'easyapp',
                        'type' => 'd',
                        'display_name' => 'EasyApp',
                        'preview_url' => 'http://deeptem.com/easyapp/',
                        'import_name' => 'wbc-import-57',
                        'files' => array_merge($fix_options, array(
                            'easy-app-slider-rev1' => array(
                                'name' => 'easy-app-slider-rev1.zip',
                                'type' => 'f',
                            ),
                            'easy-app-showcase-carousel1.zip' => array(
                                'name' => 'easy-app-showcase-carousel1.zip',
                                'type' => 'f',
                            ),
                        )),
                    ),
                    'easyseo2' => array(
                        'name' => 'easyseo2',
                        'type' => 'd',
                        'display_name' => 'EasySeo2',
                        'preview_url' => 'http://deeptem.com/easyseo2/',
                        'import_name' => 'wbc-import-58',
                        'files' => array_merge($fix_options, array(
                            'seo2-rev-slider.zip' => array(
                                'name' => 'seo2-rev-slider.zip',
                                'type' => 'f',
                            ),
                        )),
                    ),
                    'remittal' => array(
                        'name' => 'remittal',
                        'type' => 'd',
                        'display_name' => 'Remittal',
                        'preview_url' => 'http://deeptem.com/cs-remittal/',
                        'import_name' => 'wbc-import-59',
                        'files' => $fix_options,
                    ),
                    'pax' => array(
                        'name' => 'pax',
                        'type' => 'd',
                        'display_name' => 'Pax',
                        'preview_url' => 'http://deeptem.com/cs-pax/',
                        'import_name' => 'wbc-import-60',
                        'files' => array_merge($fix_options, array(
                            'pax-rev-slider1' => array(
                                'name' => 'pax-rev-slider1.zip',
                                'type' => 'f',
                            ),
                            'pax-rev-slider11.zip' => array(
                                'name' => 'pax-rev-slider11.zip',
                                'type' => 'f',
                            ),
                        )),
                    ),
                    'solace' => array(
                        'name' => 'solace',
                        'type' => 'd',
                        'display_name' => 'Solace',
                        'preview_url' => 'http://deeptem.com/cs-solace/',
                        'import_name' => 'wbc-import-61',
                        'files' => $fix_options,
                    ),
                    'trust' => array(
                        'name' => 'trust',
                        'type' => 'd',
                        'display_name' => 'Trust',
                        'preview_url' => 'http://deeptem.com/cs-trust/',
                        'import_name' => 'wbc-import-62',
                        'files' => $fix_options,
                    ),
                    'discovery' => array(
                        'name' => 'discovery',
                        'type' => 'd',
                        'display_name' => 'Discovery',
                        'preview_url' => 'http://deeptem.com/vision-discovery/',
                        'import_name' => 'wbc-import-63',
                        'files' => array_merge($fix_options, array(
                            'discovery-slider1' => array(
                                'name' => 'discovery-slider1.zip',
                                'type' => 'f',
                            ),
                            'discovery-slider2' => array(
                                'name' => 'discovery-slider2.zip',
                                'type' => 'f',
                            ),
                        )),
                    ),
                    'forward' => array(
                        'name' => 'forward',
                        'type' => 'd',
                        'display_name' => 'Forward',
                        'preview_url' => 'http://deeptem.com/vision-forward/',
                        'import_name' => 'wbc-import-64',
                        'files' => array_merge($fix_options, array(
                            'forward-slider1' => array(
                                'name' => 'forward-slider1.zip',
                                'type' => 'f',
                            ),
                        )),
                    ),
                    'happypets' => array(
                        'name' => 'happypets',
                        'type' => 'd',
                        'display_name' => 'Happypets',
                        'preview_url' => 'http://deeptem.com/happypets/',
                        'import_name' => 'wbc-import-65',
                        'files' => $fix_options,
                    ),
                    'babysitter' => array(
                        'name' => 'babysitter',
                        'type' => 'd',
                        'display_name' => 'Babysitter',
                        'preview_url' => 'http://deeptem.com/babysitter/',
                        'import_name' => 'wbc-import-66',
                        'files' => array_merge($fix_options, array(
                            'deep-babysitter-main-slider' => array(
                                'name' => 'deep-babysitter-main-slider.zip',
                                'type' => 'f',
                            ),
                        )),
                    ),
                    'car-services' => array(
                        'name' => 'car-services',
                        'type' => 'd',
                        'display_name' => 'Car Services',
                        'preview_url' => 'http://deeptem.com/car-services/',
                        'import_name' => 'wbc-import-67',
                        'files' => array_merge($fix_options, array(
                            'deep-car-services-main-slider' => array(
                                'name' => 'deep-car-services-main-slider.zip',
                                'type' => 'f',
                            ),
                        )),
                    ),
                    'cryptocoin' => array(
                        'name' => 'cryptocoin',
                        'type' => 'd',
                        'display_name' => 'Cryptocoin',
                        'preview_url' => 'http://deeptem.com/cryptocoin/',
                        'import_name' => 'wbc-import-68',
                        'files' => $fix_options,
                    ),
                    'home-services' => array(
                        'name' => 'home-services',
                        'type' => 'd',
                        'display_name' => 'Home Services',
                        'preview_url' => 'http://deeptem.com/home-services/',
                        'import_name' => 'wbc-import-69',
                        'files' => array_merge($fix_options, array(
                            'deep-home-services-slider' => array(
                                'name' => 'deep-home-services-slider.zip',
                                'type' => 'f',
                            ),
                        )),
                    ),
                    'yorkpress'         => array(
                        'name'          => 'yorkpress',
                        'type'          => 'd',
                        'display_name'  => 'Yorkpress',
                        'preview_url'   => 'http://deeptem.com/yorkpress/',
                        'import_name'   => 'wbc-import-70',
                        'files'         => $fix_options,
                    ),
                    'gym'         => array(
                        'name'          => 'gym',
                        'type'          => 'd',
                        'display_name'  => 'Gym',
                        'preview_url'   => 'http://deeptem.com/gym/',
                        'import_name'   => 'wbc-import-71',
                        'files' => array_merge($fix_options, array(
                            'gym-home-slider' => array(
                                'name' => 'gym-home-slider.zip',
                                'type' => 'f',
                            ),
                        )),
                    ),
                    'risotto-restaurant'         => array(
                        'name'          => 'risotto-restaurant',
                        'type'          => 'd',
                        'display_name'  => 'Risotto Restaurant',
                        'preview_url'   => 'http://deeptem.com/risotto-restaurant/',
                        'import_name'   => 'wbc-import-72',
                        'files' => array_merge($fix_options, array(
                            'risotto-rev1' => array(
                                'name' => 'risotto-rev1.zip',
                                'type' => 'f',
                            ),
                        )),
                    ),
                    'risotto-cafe'         => array(
                        'name'          => 'risotto-cafe',
                        'type'          => 'd',
                        'display_name'  => 'Risotto Cafe',
                        'preview_url'   => 'http://deeptem.com/risotto-cafe/',
                        'import_name'   => 'wbc-import-73',
                        'files' => array_merge($fix_options, array(
                            'risotto-cafe-slider1' => array(
                                'name' => 'risotto-cafe-slider1.zip',
                                'type' => 'f',
                            ),
                        )),
                    ),
                    'risotto-fastfood'         => array(
                        'name'          => 'risotto-fastfood',
                        'type'          => 'd',
                        'display_name'  => 'Risotto Fastfood',
                        'preview_url'   => 'http://deeptem.com/risotto-fastfood/',
                        'import_name'   => 'wbc-import-74',
                        'files' => array_merge($fix_options, array(
                            'risotto-fastfood-slider1' => array(
                                'name' => 'risotto-fastfood-slider1.zip',
                                'type' => 'f',
                            ),
                        )),
                    ),
                    'hotella-vienna'    => array(
                        'name'          => 'hotella-vienna',
                        'type'          => 'd',
                        'display_name'  => 'Hotella Vienna',
                        'preview_url'   => 'http://deeptem.com/hotella-vienna/',
                        'import_name'   => 'wbc-import-75',
                        'files' => array_merge($fix_options, array(
                            'hotella-services-slider1' => array(
                                'name' => 'hotella-services-slider1.zip',
                                'type' => 'f',
                            ),
                            'vienna-slider2' => array(
                                'name' => 'vienna-slider2.zip',
                                'type' => 'f',
                            ),
                            'vienna-slider3' => array(
                                'name' => 'vienna-slider3.zip',
                                'type' => 'f',
                            ),
                        )),
                    ),
                    'hotella-athens'         => array(
                        'name'          => 'hotella-athens',
                        'type'          => 'd',
                        'display_name'  => 'Hotella Athens',
                        'preview_url'   => 'http://deeptem.com/hotella-athens/',
                        'import_name'   => 'wbc-import-76',
                        'files' => array_merge($fix_options, array(
                            'hotella-rev-slider01' => array(
                                'name' => 'hotella-rev-slider01.zip',
                                'type' => 'f',
                            ),
                            'hotella-services-slider1' => array(
                                'name' => 'hotella-services-slider1.zip',
                                'type' => 'f',
                            ),
                        )),
                    ),
                    'hotella-rome'         => array(
                        'name'          => 'hotella-rome',
                        'type'          => 'd',
                        'display_name'  => 'Hotella Rome',
                        'preview_url'   => 'http://deeptem.com/hotella-rome/',
                        'import_name'   => 'wbc-import-77',
                        'files' => array_merge($fix_options, array(
                            'hotella-rome-slider11' => array(
                                'name' => 'hotella-rome-slider11.zip',
                                'type' => 'f',
                            ),
                        )),
                    ),
                    'hotella-madrid'         => array(
                        'name'          => 'hotella-madrid',
                        'type'          => 'd',
                        'display_name'  => 'Hotella Madrid',
                        'preview_url'   => 'http://deeptem.com/hotella-madrid/',
                        'import_name'   => 'wbc-import-78',
                        'files'         => $fix_options,
                    ),
                    'hosting'         => array(
                        'name'          => 'hosting',
                        'type'          => 'd',
                        'display_name'  => 'hosting',
                        'preview_url'   => 'http://deeptem.com/hosting/',
                        'import_name'   => 'wbc-import-79',
                        'files'         => $fix_options,
                    ),
                    'petshop'         => array(
                        'name'          => 'petshop',
                        'type'          => 'd',
                        'display_name'  => 'petshop',
                        'preview_url'   => 'http://deeptem.com/petshop/',
                        'import_name'   => 'wbc-import-80',
                        'files'         => $fix_options,
                    ),
                    'fastfood'         => array(
                        'name'          => 'fastfood',
                        'type'          => 'd',
                        'display_name'  => 'fastfood',
                        'preview_url'   => 'http://deeptem.com/fastfood/',
                        'import_name'   => 'wbc-import-81',
                        'files'         => $fix_options,
                    ),
                    'dietitian'         => array(
                        'name'          => 'dietitian',
                        'type'          => 'd',
                        'display_name'  => 'dietitian',
                        'preview_url'   => 'http://deeptem.com/dietitian/',
                        'import_name'   => 'wbc-import-82',
                        'files'         => $fix_options,
                    ),
                    'corporate2'         => array(
                        'name'          => 'corporate2',
                        'type'          => 'd',
                        'display_name'  => 'corporate2',
                        'preview_url'   => 'http://deeptem.com/corporate2/',
                        'import_name'   => 'wbc-import-83',
                        'files'         => $fix_options,
                    ),
                    'perfume'         => array(
                        'name'          => 'perfume',
                        'type'          => 'd',
                        'display_name'  => 'perfume',
                        'preview_url'   => 'http://deeptem.com/perfume/',
                        'import_name'   => 'wbc-import-84',
                        'files'         => $fix_options,
                    ),
                    'housekeeping'         => array(
                        'name'          => 'housekeeping',
                        'type'          => 'd',
                        'display_name'  => 'housekeeping',
                        'preview_url'   => 'http://deeptem.com/housekeeping/',
                        'import_name'   => 'wbc-import-85',
                        'files'         => $fix_options,
                    ),
                    'carwash'         => array(
                        'name'          => 'carwash',
                        'type'          => 'd',
                        'display_name'  => 'carwash',
                        'preview_url'   => 'http://deeptem.com/carwash/',
                        'import_name'   => 'wbc-import-86',
                        'files'         => $fix_options,
                    ),
                    'barber'         => array(
                        'name'          => 'barber',
                        'type'          => 'd',
                        'display_name'  => 'barber',
                        'preview_url'   => 'http://deeptem.com/barber/',
                        'import_name'   => 'wbc-import-87',
                        'files'         => $fix_options,
                    ),
                    'club'         => array(
                        'name'          => 'club',
                        'type'          => 'd',
                        'display_name'  => 'club',
                        'preview_url'   => 'http://deeptem.com/club/',
                        'import_name'   => 'wbc-import-88',
                        'files'         => $fix_options,
                    ),
                    'michigan-high-school' => array(
                        'name'          => 'michigan-high-school',
                        'type'          => 'd',
                        'display_name'  => 'Michigan High School',
                        'preview_url'   => 'http://deeptem.com/michigan-high-school/',
                        'import_name'   => 'wbc-import-89',
                        'files'         => $fix_options,
                    ),
                    'kindergarten' => array(
                        'name'          => 'kindergarten',
                        'type'          => 'd',
                        'display_name'  => 'Michigan Kindergarten',
                        'preview_url'   => 'http://deeptem.com/kindergarten/',
                        'import_name'   => 'wbc-import-90',
                        'files'         => $fix_options,
                    ),
                    'michigan-college' => array(
                        'name'          => 'michigan-college',
                        'type'          => 'd',
                        'display_name'  => 'Michigan College',
                        'preview_url'   => 'http://deeptem.com/michigan-college/',
                        'import_name'   => 'wbc-import-91',
                        'files'         => $fix_options,
                    ),
                    'michigan-online-learning' => array(
                        'name'          => 'michigan-online-learning',
                        'type'          => 'd',
                        'display_name'  => 'Michigan Online Learning',
                        'preview_url'   => 'http://deeptem.com/michigan-online-learning/',
                        'import_name'   => 'wbc-import-92',
                        'files'         => $fix_options,
                    ),
                    'sport' => array(
                        'name'          => 'sport',
                        'type'          => 'd',
                        'display_name'  => 'Sport',
                        'preview_url'   => 'http://deeptem.com/sport/',
                        'import_name'   => 'wbc-import-93',
                        'files'         => $fix_options,
                    ),
                    'events-business' => array(
                        'name'          => 'events-business',
                        'type'          => 'd',
                        'display_name'  => 'Events Business',
                        'preview_url'   => 'http://deeptem.com/events-business/',
                        'import_name'   => 'wbc-import-94',
                        'files'         => $fix_options,
                    ),
                    'conference' => array(
                        'name'          => 'conference',
                        'type'          => 'd',
                        'display_name'  => 'Conference',
                        'preview_url'   => 'http://deeptem.com/conference/',
                        'import_name'   => 'wbc-import-95',
                        'files'         => $fix_options,
                    ),
                    'church2' => array(
                        'name'          => 'church2',
                        'type'          => 'd',
                        'display_name'  => 'Church2',
                        'preview_url'   => 'http://deeptem.com/church2/',
                        'import_name'   => 'wbc-import-96',
                        'files'         => $fix_options,
                    ),
                );
            }
            return $dir_array;
        }

        public function getImports() {

            if ( !empty( $this->wbc_import_files ) ) {
                return $this->wbc_import_files;
            }

            $imports = $this->demoFiles();

            $imported = get_option( 'wbc_imported_demos' );

            if ( !empty( $imports ) && is_array( $imports ) ) {
                $x = 1;
                foreach ( $imports as $import ) {

                    if ( !isset( $import['files'] ) || empty( $import['files'] ) ) {
                        continue;
                    }

                    if ( $import['type'] == "d" && !empty( $import['name'] ) ) {
                        $this->wbc_import_files['wbc-import-'.$x] = isset( $this->wbc_import_files['wbc-import-'.$x] ) ? $this->wbc_import_files['wbc-import-'.$x] : array();
                        $this->wbc_import_files['wbc-import-'.$x]['directory'] = $import['name'];

                        if ( !empty( $imported ) && is_array( $imported ) ) {
                            if ( array_key_exists( 'wbc-import-'.$x, $imported ) ) {
                                $this->wbc_import_files['wbc-import-'.$x]['imported'] = 'imported';
                            }
                        }

                        foreach ( $import['files'] as $file ) {

                            switch ( $file['name'] ) {
                                case 'content.xml':
                                    $this->wbc_import_files['wbc-import-'.$x]['content_file'] = $file['name'];
                                    break;

                                case 'theme-options.txt':
                                case 'theme-options.json':
                                    $this->wbc_import_files['wbc-import-'.$x]['theme_options'] = $file['name'];
                                    break;

                                case 'widgets.json':
                                case 'widgets.txt':
                                    $this->wbc_import_files['wbc-import-'.$x]['widgets'] = $file['name'];
                                    break;

                                case 'screen-image.png':
                                case 'screen-image.jpg':
                                case 'screen-image.gif':
                                    $this->wbc_import_files['wbc-import-'.$x]['image'] = $file['name'];
                                    break;

                                case 'header.json':
                                    $this->wbc_import_files['wbc-import-'.$x]['header'] = $file['name'];
                                    break;

                                case 'go-pricing.txt':
                                    $this->wbc_import_files['wbc-import-'.$x]['header'] = $file['name'];
                                    break;
                            }

                        }

                         $this->wbc_import_files['wbc-import-'.$x]['preview'] = $import['preview_url'];
                         $this->wbc_import_files['wbc-import-'.$x]['display'] = $import['display_name'];

                    }

                    $x++;
                }

            }

        }

        public function addImportFiles( $wbc_import_files ) {

            if ( !is_array( $wbc_import_files ) || empty( $wbc_import_files ) ) {
                $wbc_import_files = array();
            }

            $wbc_import_files = wp_parse_args( $wbc_import_files, $this->wbc_import_files );

            return $wbc_import_files;
        }

        public function create_demo_dir() {

            // Add zip format to upload_filetypes
            if ( is_multisite() ) {

                // Get site option upload_filetypes
                $upload_filetypes   = explode( ' ', get_site_option( 'upload_filetypes' ) );
                $array_size         = sizeof($upload_filetypes);
                
                // add zip format to upload_filetypes
                if ( ! in_array( 'zip', $upload_filetypes ) ) {
                    
                    $upload_filetypes[$array_size] = 'zip';

                    // change format to string with one space
                    $upload_filetypes = implode( ' ', $upload_filetypes );

                    // update upload_filetypes
                    update_site_option( 'upload_filetypes', $upload_filetypes );
                
                }

            }

            $this->active_import_id     = $_REQUEST['demo_import_id'];

            // Get target importer directory
            $get_all_demoes = $this->demoFiles();
            $target_demo = '';
            foreach ( $get_all_demoes as $demo ) {
                if ( $demo['import_name'] == $this->active_import_id ) {
                    $target_demo = $demo['name'];
                }
            }

            // Create demo-data folder
            if ( wp_mkdir_p( $this->demo_dir. $target_demo ) ) {
                wp_mkdir_p( $this->demo_dir . $target_demo );
            }

            // Upload files in target folder
            //$http = new WP_Http();
            $value = '';
            
            if ( wn_check_url( deep_ssl() . 'deeptem.com/deep-downloads/demo-data/' . $target_demo . '/' . $target_demo . '.zip') ) {
                $value = deep_ssl() . 'deeptem.com/deep-downloads/demo-data/' . $target_demo . '/' . $target_demo . '.zip';
            } else {
                $value = 'http://webnus.biz/deep-downloads/demo-data/' . $target_demo . '/' . $target_demo . '.zip';
            }
            
            //$response = $http->request( $value );
            $get_file = wp_remote_get( $value, array( 'timeout' => 120, 'httpversion' => '1.1', ) );
            
            $upload = wp_upload_bits( basename( $value ), '', wp_remote_retrieve_body( $get_file ) );
            if( !empty( $upload['error'] ) ) {
                return false;
            }
            
            // unzip demo files
            if ( class_exists('ZipArchive', false) == false ) {

                require_once ( 'zip-extention/zip.php' );
                $zip = new Zip();
                $zip->unzip_file( $upload['file'], $this->demo_dir . $target_demo . '/' );

            } else {

                $zip = new ZipArchive;
                $success_unzip = '';
                if ( $zip->open( $upload['file'] ) === TRUE ) {
                    $zip->extractTo( $this->demo_dir . $target_demo . '/' );
                    $zip->deleteAfterUnzip = true;
                    $zip->close();
                    $success_unzip = 'success';
                } else {
                    $success_unzip = 'faild';
                }

            }
            

        }

        public function ajax_importer() {

            if ( is_plugin_active('wordpress-importer/wordpress-importer.php') ) {
                deactivate_plugins( '/wordpress-importer/wordpress-importer.php' );
            }

            wp_delete_post( 1, false );

            if ( !isset( $_REQUEST['nonce'] ) || !wp_verify_nonce( $_REQUEST['nonce'], "redux_{$this->parent->args['opt_name']}_wbc_importer" ) ) {
                die( 0 );
            }

            if ( isset( $_REQUEST['type'] ) && $_REQUEST['type'] == "import-demo-content" && array_key_exists( $_REQUEST['demo_import_id'], $this->wbc_import_files ) ) {                
                $reimporting = false;

                if ( isset( $_REQUEST['wbc_import'] ) && $_REQUEST['wbc_import'] == 're-importing' ) {
                    $reimporting = true;
                }

                $this->active_import_id     = $_REQUEST['demo_import_id'];
                $this->pages                = ( $_REQUEST['pages'] == 'yes' ) ? true : false;
                $this->posts                = ( $_REQUEST['posts'] == 'yes' ) ? true : false;
                $this->contact_forms        = ( $_REQUEST['contact_forms'] == 'yes' ) ? true : false;
                $this->portfolios           = ( $_REQUEST['portfolios'] == 'yes' ) ? true : false;
                $this->fetch_attachments    = ( $_REQUEST['fetch_attachments'] == 'yes' ) ? true : false;
                $this->import_sliders       = ( $_REQUEST['import_sliders'] == 'yes' ) ? true : false;
                $this->import_theme_opts    = ( $_REQUEST['import_theme_opts'] == 'yes' ) ? true : false;
                $this->import_widgets       = ( $_REQUEST['import_widgets'] == 'yes' ) ? true : false;
                $this->page_builder         = $_REQUEST['page_builder'];

                if ( $this->page_builder == 'kc' ) {
                    $this->wbc_import_files[$this->active_import_id]['content_file'] = 'content-kc.xml';
                }

                if ( $this->page_builder == 'elementor' ) {
                    $this->wbc_import_files[$this->active_import_id]['content_file'] = 'content-ele.xml';
                }
                $this->active_import = array( $this->active_import_id => $this->wbc_import_files[$this->active_import_id] );

                if ( !isset( $import_parts['imported'] ) || true === $reimporting ) {
                    include $this->extension_dir.'inc/init-installer.php';
                    $installer = new Radium_Theme_Demo_Data_Importer( $this, $this->parent );
                } else {
                    echo esc_html__( "Demo Already Imported", 'framework' );
                }

                die();
            }
                
            die();
        }

        public static function get_instance() {
            return self::$instance;
        }

        // Forces the use of the embeded field path vs what the core typically would use
        public function overload_field_path( $field ) {
            return dirname( __FILE__ ) . '/' . $this->field_name . '/field_' . $this->field_name . '.php';
        }

        function add_importer_section() {
            // Checks to see if section was set in config of redux.
            for ( $n = 0; $n <= count( $this->parent->sections ); $n++ ) {
                if ( isset( $this->parent->sections[$n]['id'] ) && $this->parent->sections[$n]['id'] == 'wbc_importer_section' ) {
                    return;
                }
            }

            $wbc_importer_label = trim( esc_html( apply_filters( 'wbc_importer_label', __( 'Demo Importer', 'framework' ) ) ) );

            $wbc_importer_label = ( !empty( $wbc_importer_label ) ) ? $wbc_importer_label : __( 'Demo Importer', 'framework' );

            $this->parent->sections[] = array(
                'id'     => 'wbc_importer_section',
                'title'  => $wbc_importer_label,
                'desc'   => '<p class="description">'. apply_filters( 'wbc_importer_description', esc_html__( 'Works best to import on a new install of WordPress', 'framework' ) ).'</p>',
                'icon'   => 'el-icon-website',
                'fields' => array(
                    array(
                        'id'   => 'wbc_demo_importer',
                        'type' => 'wbc_importer'
                    )
                )
            );
        }

    } // class
} // if
