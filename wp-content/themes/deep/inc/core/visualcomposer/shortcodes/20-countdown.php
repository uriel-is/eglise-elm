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
vc_map(
	array(
        'name'			=>'Countdown',
        'base'			=> 'countdown',
        'icon'			=> 'webnus-countdown',
		'description'	=> 'Countdown',
        'category'		=> esc_html__( 'Webnus Shortcodes', 'deep' ),
        'params'		=> array(
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__( 'Style', 'deep' ),
				'param_name'	=> 'type',
				'value'			=> array(
					'Type 1'		=> 'type-1',
					'Type 2'		=> 'type-2',
					'Type 3'		=> 'type-3',
					'Type 4 (flip)'	=> 'type-4',
					'Type 5'		=> 'type-5',
				),
				'description' => wp_kses( __( 'You can choose from these pre-designed types. <a href="http://deeptem.com/features/loops/countdown/" target="_blank">View All Types</a>', 'deep'), deep_kses() ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Date and Time', 'deep' ),
				'param_name'	=> 'datetime',
				'value'			=> 'October 13, 2029 11:13:00',
				'description'	=> esc_html__( 'Enter date and time (October 13, 2018 11:13:00)', 'deep'),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Finished text', 'deep' ),
				'param_name'	=> 'done',
				'value'			=> '',
				'description'	=> esc_html__( 'Finished text', 'deep')
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Content color (leave bank for default color)', 'deep'),
				'param_name'	=> 'content_color',
				'value'			=> '',
				'description'	=> esc_html__( 'Select content color', 'deep'),
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