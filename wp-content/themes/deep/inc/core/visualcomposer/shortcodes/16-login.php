<?php
if ( ! function_exists( 'deep_kses' )) {
	function deep_kses() {
		return array(
			'a' => array(
				'href' => array(),
				'title' => array(),
				'target' => array(),
				'style' => array(),
				'class' => array(),
			),
			'br' => array(),
			'em' => array(),
			'strong' => array(),
			'span' => array(
				'class' => array(),
			),
		);
	}
}
vc_map( array(
	'name' => 'Login',
	'base' => 'deep-login',
	'category' => esc_html__( 'Webnus Shortcodes', 'deep' ),
	'description' => 'Login',
	'icon' => 'webnus-login',
	'params' => array(
		array(
			'type' => 'attach_image',
			'heading' => esc_html__( 'Image', 'deep' ),
			'param_name' => 'img',
			'value' => '',
			'description' => esc_html__( 'Login Image', 'deep' )
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Title', 'deep' ),
			'param_name' => 'title',
			'value' => '',
			'description' => esc_html__( 'Enter the title', 'deep' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Subtitle', 'deep' ),
			'param_name' => 'subtitle',
			'value' => '',
			'description' => esc_html__( 'Enter the Subtitle', 'deep' )
		),
		array(
			'type' => 'textarea',
			'heading' => esc_html__( 'Content', 'deep' ),
			'param_name' => 'bpcontent',
			'value' => '',
			'description' => esc_html__( 'Enter the Content', 'deep' )
		),
		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Hide login with Facebook or Google + ?', 'deep' ),
			'param_name'	=> 'bottom_text',
			'value'			=> array( esc_html__( 'Yes', 'deep' ) => 'yes' ),
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
)
);
