<?php
vc_map( array(
	'name'			=> esc_html__( 'Like + View + Share', 'deep' ),
	'base'			=> 'lvs',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
	'icon'			=> 'webnus-lvs',
	'description'	=> esc_html__( 'You can put like, view and share for your pages.', 'deep' ),
	'params' => array(
		array(
            'type'          => 'checkbox',
            'heading'       => esc_html__( 'Display Like?', 'deep' ),
            'param_name'    => 'display_like',
            'std'			=> 'yes',
            'value'         => array(
                esc_html__( 'Yes', 'deep' ) => 'yes',
            ),
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => esc_html__( 'Display View?', 'deep' ),
            'param_name'    => 'display_view',
            'std'			=> 'yes',
            'value'         => array(
                esc_html__( 'Yes', 'deep' ) => 'yes',
            ),
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => esc_html__( 'Display Share?', 'deep' ),
            'param_name'    => 'display_share',
            'std'			=> 'yes',
            'value'         => array(
                esc_html__( 'Yes', 'deep' ) => 'yes',
            ),
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
	),
) );