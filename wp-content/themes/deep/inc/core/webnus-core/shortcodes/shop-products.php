<?php
function deep_shop_products( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'number_of_columns'		=> '',
		'shortcodeclass'	 	=> '',
		'shortcodeid' 	 		=> '',

	), $atts));

	$shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
	$shortcodeid		= $shortcodeid ? ' id="' . $shortcodeid . '"' : '';

	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	ob_start();
    if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) :
    	echo '<div class="wn-shop-products-shortocde post-type-archive-product ' . $shortcodeclass . '"  ' . $shortcodeid . '>';
		echo '<div id="wn-woo-wrap" class="wn-woo-wrap wn-woo-has-left-sidebar clearfix">';

			$deep_options = deep_options(); 
			$product_columns = isset( $deep_options['deep_woo_shop_products_in_shop'] ) ? 'columns-' . $deep_options['deep_woo_shop_products_in_shop'] : ''; 
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'product',
                'paged' => $paged,
                );
            $loop = new WP_Query( $args );
            if ( $loop->have_posts() ) {
            	do_action( 'woocommerce_before_shop_loop' );
            	echo '<ul class="products ' . $product_columns . ' ">';
                while ( $loop->have_posts() ) : $loop->the_post();
                    wc_get_template_part( 'content', 'product' );
                endwhile;
                echo '</ul>';
        		// Display numbered pagination
        		echo '<nav class="woocommerce-pagination">';
        		echo paginate_links( array(
        			'base'        	=> esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
        			'format'		=> '?paged=%#%',
        			'add_args'    	=> false,
        			'current' 	  	=> max( 1, get_query_var('paged') ),
        			'total' 	  	=> $loop->max_num_pages,
        			'prev_text'   	=> '&larr;',
        			'next_text'   	=> '&rarr;',
        			'type'        	=> 'list',
        			'end_size'    	=> 3,
        			'mid_size'    	=> 3
        		) );
        		echo '</nav>';
            } else {
                esc_html_e( 'No products found' , 'deep' );
            }
            wp_reset_postdata();
    	echo '</div>';
    	echo '</div>';
    endif;
	$out = ob_get_contents();
	ob_end_clean();
	wp_reset_postdata();
	return $out;
}

add_shortcode('shop_products', 'deep_shop_products');