<?php
if ( ! is_plugin_active('woocommerce/woocommerce.php') ) {
    return;
}

add_action( 'vc_before_init', 'deep_special_offers_get_id' );
function deep_special_offers_get_id() {
	$special_offers_product = array(
		'post_type'			=> 'product',
		'order'				=> 'ASC',
		'posts_per_page'	=> '-1',
		'meta_query'        => WC()->query->get_meta_query(),
		'post__in'          => array_merge( array( 0 ), wc_get_product_ids_on_sale() )
	);
	
	$spo_query = new WP_Query( $special_offers_product );
	$titles = array();
	if ( $spo_query->have_posts() ) {
		$titles[] = array( '' => esc_html__( 'Please select a product', 'deep' ), );
		while ( $spo_query->have_posts() ) {
			$spo_query->the_post();
			
			$product_has_off		= get_post_meta( get_the_id(), '_sale_price', true );
			$sale_price_dates_from	= get_post_meta( get_the_id(), '_sale_price_dates_from', true );
			$sale_price_dates_to	= get_post_meta( get_the_id(), '_sale_price_dates_to', true );

			// Get the discount
			if ( $product_has_off != '' ) {
				$titles[] = get_the_title();
			}
		}
	}
	wp_reset_postdata();

	vc_map(
		array(
			'name'			=> esc_html__( 'Special Offers', 'deep' ),
			'base'			=> 'special_offers',
			'description'	=> esc_html__( 'Special Offers', 'deep' ),
			'icon'			=> 'webnus-special-offers',
			'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
			'params'		=> array(
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Select Product ', 'deep' ),
					'description'	=> esc_html__( 'products to show should be have discount', 'deep' ),
					'param_name'	=> 'post_to_show',
					'value'			=> $titles,
				),
				array(
		            'type'          => 'checkbox',
		            'heading'       => esc_html__( 'Open link in a new tab? ', 'deep' ),
		            'description'   => esc_html__( 'Add Target = _blank', 'deep'),
		            'param_name'    => 'link_target',
		            'std'           => 'false',
				),
				array(
					'group'			=> 'Class & ID',
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Extra Class', 'deep' ),
					'param_name'	=> 'shortcodeclass',
					'value'			=> '',
					'edit_field_class'	=> 'vc_col-sm-6 vc_column paddingtop',
				),
				array(
					'group'			=> 'Class & ID',
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'ID', 'deep' ),
					'param_name'	=> 'shortcodeid',
					'value'			=> '',
					'edit_field_class'	=> 'vc_col-sm-6 vc_column paddingtop',
				),
			)
		) 
	);
}