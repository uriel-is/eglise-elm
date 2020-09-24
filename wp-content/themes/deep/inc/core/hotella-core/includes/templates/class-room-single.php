<?php
/**
 * The template for displaying single room.
 *
 * @since   1.0.0
 * @author  Webnus
 */

// Don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
 
if ( ! class_exists( 'HTC_HB_Single_Template' ) ) :
    class HTC_HB_Single_Template {

        /**
         * Instance of this class.
         *
         * @since   1.0.0
         * @access  public
         * @var     HTC_HB_Single_Template
         */
        public static $instance;

        /**
         * Provides access to a single instance of a module using the singleton pattern.
         *
         * @since   1.0.0
         * @return	object
         */
        public static function get_instance() {
            if ( self::$instance === null ) {
                self::$instance = new self();
            }
            return self::$instance;
        }
        
        /**
         * Construction
         */
        public function __construct() {

            add_action( 'hotel_booking_before_single_room', array( $this, 'htc_whb_single' ) );
            
            // Remove Gallery Section
            remove_action( 'hotel_booking_single_room_gallery', 'hotel_booking_single_room_gallery' );

            // title
            remove_action( 'hotel_booking_single_room_title', 'hotel_booking_room_title' );

            // room details
            remove_action( 'hotel_booking_single_room_infomation', 'hotel_booking_single_room_infomation' );

            // room related
            // remove_action( 'hotel_booking_after_single_product', 'hotel_booking_single_room_related' );

        }

        /**
         * Single Room output
         */
        public function htc_whb_single() { ?>

            <div class="container htc-hb-single">
                <div class="row">
                    <div class="col-md-7">
                        <div class="htc-single-gallery-wrap">
                            <?php hotel_booking_single_room_gallery(); ?>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="htc-single-extra-wrap">
                            <?php
                            // get title
                            hotel_booking_room_title();
                            // get price
                            hotel_booking_loop_room_price(); ?>
                            <ul class="htc-extras">
                                <?php
                                $extra_product = Deep_HB_Room_Extra::instance( get_the_ID() );
                                $room_extra    = $extra_product->get_extra();

                                foreach ($room_extra as $key => $value) { ?>
                                    <li class="extra-item">
                                        <?php
                                        // icon
                                        if ( $value->icon ) : ?>
                                            <i class="colorf <?php echo esc_attr($value->icon); ?>"></i>
                                        <?php
                                        endif;
                                        // title
                                        if ( $value->title ) : ?>
                                            <p class="extra-title">
                                            <?php echo esc_attr($value->title); ?>
                                            </p>
                                        <?php endif; ?>
                                    </li>
                                <?php
                                } ?>
                            </ul>
                            <?php do_action( 'hotel_booking_single_room_title' ); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php hotel_booking_single_room_infomation(); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php $this->related_loop(); ?>
                    </div>
                </div>
            </div>
        <?php
        }

        /**
         * related loop
         */
        public function related_loop() {
            $room    = WPHB_Room::instance( get_the_ID() );
            $related = $room->get_related_rooms(); ?>
            <div class="related-rooms owl-carousel owl-theme">
                <?php while ( $related->have_posts() ) : $related->the_post(); ?>
                    <div class="room-item">
                        <?php
                        /**
                         * hotel_booking_loop_room_thumbnail hook
                         */
                        do_action( 'hotel_booking_loop_room_thumbnail' ); ?>
                        <div class="room-item-content">
                            <?php
                            /**
                             * hotel_booking_loop_room_title hook
                             */
                            do_action( 'hotel_booking_loop_room_title' );

                            /**
                             * hotel_booking_loop_room_price hook
                             */
                            do_action( 'hotel_booking_loop_room_rating' );
                            
                            /**
                             * excerpt
                             */?>
                            <p class="room-excerpt"><?php echo deep_excerpt(15); ?></p>
                            <a href="<?php the_permalink(); ?>" class="colorf room-readmore"><?php _e('All details', 'deep') ?></a>
                            <?php
                            
                            /**
                             * hotel_booking_loop_room_price hook
                             */
                            do_action( 'hotel_booking_loop_room_price' );

                             ?>
                        </div>
                    </div>
                <?php endwhile;?>
            </div>
            <?php
        }
    }
    // Run class
    HTC_HB_Single_Template::get_instance();
endif;
