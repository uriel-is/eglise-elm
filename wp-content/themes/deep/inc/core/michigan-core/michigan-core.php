<?php
/** 
 * Plugin Name: Michigan Core
 * Plugin URI: http://webnus.net/
 * Description: Make compatiblity with Lifter LMS
 * Author: Webnus
 * Version: 1.0.0
 * Author URI: http://webnus.net
 */

// Don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
define( 'MICHIG_PHP_VERSION', '5.6' );
define( 'MICHIG_REQUIRED_WP_VERSION', '4.9.0' );
define( 'MICHIG_CORE_VERSION', '1.0.0' );
define( 'MICHIG_CORE', DEEP_CORE_DIR . 'michigan-core/' );
define( 'MICHIG_CORE_URI', DEEP_CORE_URL . 'michigan-core/' );
define( 'MICHIG_CORE_ASSETS', DEEP_CORE_DIR . 'michigan-core/assets/' );
 
add_action( 'wp_enqueue_scripts', 'deep_michigan_enqueue_script' );
add_action( 'admin_enqueue_scripts', 'deep_michigan_admin_enqueue_script' );

// single course
add_action( 'init', 'deep_michigan_shortcodes_init' );

// Course cat icon
add_action('course_cat_edit_form_fields', 'deep_michigan_course_cat_edit_form_fields' );
add_action('course_cat_add_form_fields', 'deep_michigan_course_cat_edit_form_fields' );
add_action('edited_course_cat', 'deep_michigan_course_cat_save_form_fields' , 10, 2);
add_action('created_course_cat', 'deep_michigan_course_cat_save_form_fields' , 10, 2);
add_action( 'after_setup_theme', 'deep_michigan_llmsupport' );

add_filter( 'llms_get_theme_default_sidebar', 'course_llms_sidebar_function' );
add_filter( 'llms_get_theme_default_sidebar', 'lesson_llms_sidebar_function' );

/**
* incluse WPBakery Page Builder shortcodes
*/
function deep_michigan_shortcodes_init() {
	if( is_plugin_active( 'js_composer/js_composer.php' ) ) {
		foreach( glob( MICHIG_CORE . '/shortcodes/admin/*.php' ) as $filename ) {
			require_once $filename;
		}
		foreach( glob( MICHIG_CORE . '/shortcodes/output/*.php' ) as $filename ) {
			require_once $filename;
		}
	}
}
function deep_michigan_llmsupport(){
	add_theme_support( 'lifterlms-sidebars' );
}

//LifterLMS widgets
function course_llms_sidebar_function( $id ) {
	$course_sidebar_id = 'llms_course_widgets_side'; // replace this with your theme's sidebar ID
	return $course_sidebar_id;
}

function lesson_llms_sidebar_function( $id ) {
	$lesson_sidebar_id = 'llms_lesson_widgets_side'; // replace this with your theme's sidebar ID
	return $lesson_sidebar_id;
}

function deep_michigan_enqueue_script() {
    wp_enqueue_style( 'michig-core', MICHIG_CORE_URI . 'assets/css/michig-core.css', null, MICHIG_CORE_VERSION, 'all' );
    wp_enqueue_script( 'michig-core', MICHIG_CORE_URI . 'assets/js/michig-core.js', array('jquery'), MICHIG_CORE_VERSION, true);
}

/**
* enqueue scripts
*/
function deep_michigan_admin_enqueue_script() {
    wp_enqueue_style( 'michig-admin-core', MICHIG_CORE_URI . 'assets/css/michig-admin-core.css', null, MICHIG_CORE_VERSION, 'all' );
    wp_enqueue_script( 'michig-admin-core', MICHIG_CORE_URI . 'assets/js/michig-admin-core.js', array('jquery'), MICHIG_CORE_VERSION, true);
}
/**
* Category icons
*/
function deep_michigan_course_cat_save_form_fields($term_id) {
    
    $meta_name = 'icon';
    
    if ( isset( $_POST[$meta_name] ) ) {
    
        $meta_value = $_POST[$meta_name];
    
        // This is an associative array with keys and values:
        $term_metas = get_option("taxonomy_{$term_id}_metas");
        if (!is_array($term_metas)) {
            $term_metas = Array();
        }
        
        // Save the meta value
        $term_metas[$meta_name] = $meta_value;
        
        update_option( "taxonomy_{$term_id}_metas", $term_metas );
    
    }

}

function deep_michigan_course_cat_edit_form_fields ($term_obj) {
    
    // Read in the icon from the options db
    $term_id = isset( $term_obj->term_id ) ? $term_obj->term_id : '';
    $term_metas = get_option("taxonomy_{$term_id}_metas");
    
    if ( isset($term_metas['icon']) ) {
    
        $icon = $term_metas['icon'];
    
    } else {
    
        $icon = '';
    
    } ?>
    
    <tr class="form-field">
        <th valign="top" scope="row">
            <label for="icon"><?php _e( 'Category icon', 'deep' ); ?></label>
        </th>
        <td>
            <div class="cours-icons">
                <div class="cours-icons-wrap">
                    <?php
                    require_once MICHIG_CORE . '/templates/icons.php';
                    foreach ($wn_icons as $key => $value) { ?>
                        <i class="cat-icon <?php echo esc_attr( $key ); ?>" data-name="<?php echo esc_attr( $key ); ?>" data-clicked="0"></i>
                        <?php
                    } ?>
                </div>
                <input type="hidden" id="icon" name="icon" value="<?php echo esc_attr( $icon ); ?>">
                <i id="icon-preview"></i>
            </div>
        </td>
    </tr>

<?php 
}

/**
* Get the HTML for a taxonomy term icon.
*
* @since   1.0.0
*
* @param   int  $term_id  ID of the taxonomy term.
*
* @return  string  HTML of the icon <i> element.
*/
function deep_michigan_tax_icons_output_term_icon( $term_id, $class = '' ) {

    // Attempt to get term_id of current object if not specified
    if ( ! $term_id ) {
        $term_id = get_queried_object()->term_id;
    }

    $term_meta = get_option( 'tax_term_icon_' . $term_id );

    // If we don't have a usable term, bail
    if ( empty( $term_meta ) ) {
        return false;
    }

    $icon_class = $term_meta[ 'term_icon' ];

    return '<i class="' . $icon_class . ' ' . $class . '"></i>';

}


/***************************************/
/*	 	 Webnus Instructor Update
/***************************************/

function deep_instructor_update($user_id) {
	global $wpdb;
	global $post;
	$instructor_rate_score = $instructor_rate = $course_count = $student_count = 0;
	$instructor_rate_users = 1;
	$args = array('post_type' => 'course' , 'author' => $user_id,'posts_per_page' => -1);
	$custom_posts = new WP_Query( $args );
	while ( $custom_posts->have_posts() ) : $custom_posts->the_post();
		// Course Students
		$students = $wpdb->get_results($wpdb->prepare(
			'SELECT user_id, meta_value, post_id
			FROM '.$wpdb->prefix . 'lifterlms_user_postmeta
			WHERE meta_key = "_status" AND meta_value = "Enrolled" AND post_id = %d AND EXISTS(SELECT 1 FROM ' . $wpdb->prefix . 'users WHERE ID = user_id)
			group by user_id'
		,get_the_ID()));
		// Course Rating

		if(function_exists('the_ratings')) {
			$instructor_rate_score = $instructor_rate_score + get_post_meta(get_the_ID(), 'ratings_score' , true);
			$instructor_rate_users = $instructor_rate_users + get_post_meta(get_the_ID(), 'ratings_users' , true);
		}
		// Course Count
		$course_count++;
		$student_count = $student_count + count($students);
	endwhile;
	$instructor_rate = ($instructor_rate_users)?($instructor_rate_score/$instructor_rate_users):'';
	$instructor_rate = number_format($instructor_rate, 1);
	delete_user_meta( $user_id, 'instructor_is');
	delete_user_meta( $user_id, 'instructor_courses');
	delete_user_meta( $user_id, 'instructor_students');
	delete_user_meta( $user_id, 'instructor_rate');
	if($course_count){
		add_user_meta( $user_id, 'instructor_is', true);
		add_user_meta( $user_id, 'instructor_courses', $course_count);
		add_user_meta( $user_id, 'instructor_students', $student_count);
		add_user_meta( $user_id, 'instructor_rate', $instructor_rate);
	}
	wp_reset_postdata();
}

/***************************************/
/*	 	Webnus Course Price
/***************************************/

if(!function_exists('deep_michigan_course_price')) {
	function deep_michigan_course_price(){
		$post_id = get_the_ID();
		$deep_course_price_meta = rwmb_meta('deep_course_price_meta');
		$argumants = array(
			'meta_key' => '_llms_product_id',
			'meta_value' => $post_id,
			'post_type' => 'llms_access_plan',
			'post_status' => 'publish',
			'posts_per_page' => -1,
		);
		$posts = get_posts($argumants);
		$course_is_free = '';
		$minimum_price = '';
		if( is_plugin_active( 'lifterlms/lifterlms.php' ) && ! llms_is_user_enrolled( get_current_user_id(), $post_id ) && class_exists('LLMS_Integration_WooCommerce') ){
			if ( llms_is_user_enrolled( get_current_user_id(), get_the_ID() ) ) {
				return;
			}

			$p = new LLMS_Product( get_the_ID() );

			// if it's a course, check a few restrictions first
			if ( 'course' === $p->get( 'type' ) ) { $course = new LLMS_Course( $p->post );
				if ( 'yes' === $course->get( 'enrollment_period' ) ) {
					if ( ! $course->has_date_passed( 'enrollment_start_date' ) ) {
						return llms_print_notice( $course->get( 'enrollment_opens_message' ), 'notice' );
					} elseif ( $course->has_date_passed( 'enrollment_end_date' ) ) {
						return llms_print_notice( $course->get( 'enrollment_closed_message' ), 'error' );
					}
				}
				if ( ! $course->has_capacity() ) {
					return llms_print_notice( $course->get( 'capacity_message' ), 'error' );
				}
			}
			$id = $p->get( 'wc_product_id' );

			if ( $id ) {
				global $woocommerce;
				global $product;
				$price = '';
				if ( get_post_meta($id, '_sale_price', true) ) {
					$price = get_post_meta($id, '_sale_price', true);
				}else {
					$price = get_post_meta($id, '_regular_price', true);
				}

				$minimum_price = esc_html__( 'Course Price:' , 'deep' ) . ' ' . get_lifterlms_currency_symbol() . $price ;
			}
		}elseif ( is_plugin_active( 'lifterlms/lifterlms.php' ) && ! llms_is_user_enrolled( get_current_user_id(), $post_id ) && !class_exists('LLMS_Integration_WooCommerce') ){
			if ( array_values( $posts ) ){
				for ( $i=0; $i < count($posts); $i++) {
					if ( get_post_meta($posts[$i]->ID, '_llms_is_free', true ) == 'yes' ){
							$minimum_price = esc_html__( 'This Course is FREE' , 'deep' );
							$course_is_free = true;
					}
				}
			}

			if ( array_values( $posts ) && $course_is_free != true ){
				for ( $i=0; $i < count($posts); $i++) {
					// Regula Price
					if( get_post_meta( $posts[$i]->ID, '_llms_price', true ) ){
						$meta[] = get_post_meta( $posts[$i]->ID, '_llms_price', true );
					}
					// Sale Price
					if( get_post_meta( $posts[$i]->ID, '_llms_sale_price', true ) ){
						$now 	= current_time( 'timestamp' );
						$start 	= get_post_meta( $posts[$i]->ID, '_llms_sale_start', true );
						$end 	= get_post_meta( $posts[$i]->ID, '_llms_sale_end', true );
						$start 	= ( $start ) ? strtotime( $start . ' 00:00:00' ) : $start;
						$end 	= ( $end ) ? strtotime( $end . ' 23:23:59' ) : $end;
						if ( $start && $end && $now > $start && $now < $end ){
							$meta[] = get_post_meta( $posts[$i]->ID, '_llms_sale_price', true );
						}elseif( ( $start && $now > $start ) && ! $end  ){
							$meta[] = get_post_meta( $posts[$i]->ID, '_llms_sale_price', true );
						}elseif( ( $end && $now < $end ) && ! $start ){
							$meta[] = get_post_meta( $posts[$i]->ID, '_llms_sale_price', true );
						}elseif( ! $start && ! $end ){
							$meta[] = get_post_meta( $posts[$i]->ID, '_llms_sale_price', true );
						}
					}
					// Trial Price
					if( get_post_meta( $posts[$i]->ID, '_llms_trial_price', true ) ){
						$meta[] = get_post_meta( $posts[$i]->ID, '_llms_trial_price', true );
					}
				}
				$minimum_price = esc_html__( 'Start from' , 'deep' ) . ' ' . get_lifterlms_currency_symbol() . min(array_values( $meta ));
			}

			if ( ! array_values( $posts ) ){
				$minimum_price = esc_html__( 'No access plans exist.', 'deep' );
			}
		}elseif( class_exists('LifterLMS') && llms_is_user_enrolled( get_current_user_id(), $post_id ) ){
			$minimum_price = esc_html__( "Already Enrolled the course" , "michigan");
		}else{
			$minimum_pric = $deep_course_price_meta;
		}

		echo $minimum_price;
	}
}


// Course Filter Meta Data
function deep_michigan_course_price_meta_data() {
	if ( empty( $_GET['post_type'] ) || $_GET['post_type'] != 'course' ) {
        return;
    }
	if( is_plugin_active( 'lifterlms/lifterlms.php' ) ) {
		$post_id = get_the_ID();
		$argumants = array(
			'meta_key' => '_llms_product_id',
			'meta_value' => $post_id,
			'post_type' => 'llms_access_plan',
			'post_status' => 'publish',
			'posts_per_page' => -1,
		);
		$posts = get_posts($argumants);
		if( array_values( $posts ) ){
			for( $i=0; $i < count($posts); $i++) {
				if( get_post_meta($posts[$i]->ID, '_llms_is_free', true ) == 'yes' ){
					add_post_meta( get_the_ID(), 'michigan_course_free_meta', 'free', true ) or update_post_meta( get_the_ID(), 'michigan_course_free_meta', 'free' );
					delete_post_meta( get_the_ID(), 'michigan_course_paid_meta');
					break;
				}else{
					if( ! get_post_meta( get_the_ID(), 'michigan_course_free_meta', 'free', true ) ){
					add_post_meta( get_the_ID(), 'michigan_course_paid_meta', 'paid', true ) or update_post_meta( get_the_ID(), 'michigan_course_paid_meta', 'paid' );
					}
				}
			}

		}
	}
}

function deep_michigan_set_default_meta_data($post_id){
    if ( $_GET['post_type'] = 'course' ) {
       deep_michigan_course_price_meta_data();
    }
}

/***************************************/
/*	 	 Webnus Instructor Update
/***************************************/

function michigan_webnus_instructor_update($user_id) {
	global $wpdb;
	global $post;
	$instructor_rate_score = $instructor_rate = $course_count = $student_count = 0;
	$instructor_rate_users = 1;
	$args = array('post_type' => 'course' , 'author' => $user_id,'posts_per_page' => -1);
	$custom_posts = new WP_Query( $args );
	while ( $custom_posts->have_posts() ) : $custom_posts->the_post();
		// Course Students
		$students = $wpdb->get_results($wpdb->prepare(
			'SELECT user_id, meta_value, post_id
			FROM '.$wpdb->prefix . 'lifterlms_user_postmeta
			WHERE meta_key = "_status" AND meta_value = "Enrolled" AND post_id = %d AND EXISTS(SELECT 1 FROM ' . $wpdb->prefix . 'users WHERE ID = user_id)
			group by user_id'
		,get_the_ID()));
		// Course Rating

		if(function_exists('the_ratings')) {
			$instructor_rate_score += (int)get_post_meta(get_the_ID(), 'ratings_score' , true);
			$instructor_rate_users += (int)get_post_meta(get_the_ID(), 'ratings_users' , true);
		}
		// Course Count
		$course_count++;
		$student_count = $student_count + count($students);
	endwhile;
	$instructor_rate = ($instructor_rate_users)?($instructor_rate_score/$instructor_rate_users):'';
	$instructor_rate = number_format($instructor_rate, 1);
	delete_user_meta( $user_id, 'instructor_is');
	delete_user_meta( $user_id, 'instructor_courses');
	delete_user_meta( $user_id, 'instructor_students');
	delete_user_meta( $user_id, 'instructor_rate');
	if($course_count){
		add_user_meta( $user_id, 'instructor_is', true);
		add_user_meta( $user_id, 'instructor_courses', $course_count);
		add_user_meta( $user_id, 'instructor_students', $student_count);
		add_user_meta( $user_id, 'instructor_rate', $instructor_rate);
	}
	wp_reset_postdata();
}

// count user in custom post type for advanced search
function deep_michigan_count_user_posts_by_type( $userid, $post_type = 'post' ) {
	global $wpdb;
	$where = get_posts_by_author_sql( $post_type, true, $userid );
	$count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts $where" );
	return apply_filters( 'get_usernumposts', $count, $userid );
}

// count user in custom post type for advanced search
function michigan_webnus_count_user_posts_by_type( $userid, $post_type = 'post' ) {
	global $wpdb;
	$where = get_posts_by_author_sql( $post_type, true, $userid );
	$count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts $where" );
	return apply_filters( 'get_usernumposts', $count, $userid );
}

/* widgets */
include('includes/more-courses.php');
include('includes/course-category.php');
include('includes/search-course.php');
include('includes/course-sharing-box.php');
include('includes/instructor.php');
include('includes/recent-courses.php');
