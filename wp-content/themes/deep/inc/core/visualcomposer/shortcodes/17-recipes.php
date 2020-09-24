<?php
if ( ! is_plugin_active( 'webnus-recipes/webnus-recipes.php' ) ) {
	return;
}
vc_map( array(
		'name'			=>'Food Recipes',
		'base'			=> 'recipes',
		'icon'			=> 'webnus-recipes',
		'description'	=> 'Webnus Recent posts',
		'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
		'params'		=> array(
			array(
				'type' 				=> 'dropdown',
				'heading' 			=> esc_html__( 'Column', 'deep' ),
				'param_name' 		=> 'column',
				'value' 			=> array(
					esc_html__( '4 column', 'deep' )	=>'3',
					esc_html__( '3 column', 'deep' )	=>'4',
					esc_html__( '2 column', 'deep' )	=>'6',
					esc_html__( '1 column', 'deep' )	=>'12',
				),
				'description' 		=> esc_html__( 'Set a column', 'deep')
			),
			array(
				'heading'		=> esc_html__( 'Post count', 'deep' ),
				'description'	=> esc_html__( 'Number of grid item(s) to show. Note: When you type nothing it puts for default 6 grid items to show.', 'deep'),
				'type'			=> 'textfield',
				'param_name'	=> 'post_count',
				'value'			=> '',
			),
			array(
				'type'			=> 'checkbox',
				'heading'		=> esc_html__('Page Navigation', 'deep') ,
				'description'	=> wp_kses( esc_html__('Enable page navigation.<br><br>', 'deep'), array( 'br' => array() ) ),
				'param_name'	=> 'pagination',
				'value'			=> array( esc_html__( 'Enable', 'deep' ) => 'enable'),
				'std'			=> '',
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
		),
) );
?>