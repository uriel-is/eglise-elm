<?php
$menus	= wp_get_nav_menus();
$menu_name = $menu_id = array();
$menu_name[] = 'Select Menu';
$menu_id[] = 'none';
if ( ! empty( $menus ) ) :
	foreach ( $menus as $item ) :
		$menu_name[] = esc_html( $item->name );
		$menu_id[] = esc_html( $item->term_id );
	endforeach;
endif;
$menu_items = array_combine($menu_name, $menu_id);
vc_map( array(
	'name'			=> esc_html__( 'Custom Menu', 'deep' ),
	'base'			=> 'custom-menu',
	'description'	=> esc_html__( 'Webnus Custom Menu', 'deep' ),
	'icon'			=> 'webnus-custom-menu',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'params'		=> array(
		array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__( 'Menu', 'deep' ),
			'param_name' 	=> 'menu',
			'value'			=> $menu_items,
			'description' 	=> esc_html__( 'Please select a menu', 'deep')
		),
		// Class & ID 
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
		
	) )
);