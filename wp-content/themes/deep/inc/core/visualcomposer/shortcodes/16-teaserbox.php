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
	'name' => 'Teaser Box',
	'base' => 'teaserbox',
	'category' => esc_html__( 'Webnus Shortcodes', 'deep' ),
	'description' => 'Image and icon with text article',
	'icon' => 'webnus-teaserbox',
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Type', 'deep' ),
			'param_name' => 'type',
			'value' => array(
				'Type 1' =>  '1',
				'Type 2' =>  '2',
				'Type 3' =>  '3',
				'Type 4' =>  '4',
				'Type 5' =>  '5',
				'Type 6' =>  '6',
				'Type 7' =>  '7',
				'Type 8' =>  '8',
				'Type 9' =>  '9',
				'Type 10' => '10',
				'Type 11' => '11',
				'Type 12' => '12',
				'Type 13' => '13',
				'Type 14' => '14',
				'Type 15' => '15',
				'Type 16' => '16',
				'Type 17' => '17',
				'Type 18' => '18',
			),
			'description' => wp_kses( __( 'You can choose from these pre-designed types. <a href="http://deeptem.com/features/boxes-elements/teaser-box/" target="_blank">View All Types</a>', 'deep'), deep_kses() ),
		),
		array(
			'type' => 'attach_image',
			'heading' => esc_html__( 'Image', 'deep' ),
			'param_name' => 'img',
			'value' => '',
			'description' => esc_html__( 'TeaserBox Image', 'deep' )
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Image Size', 'deep' ),
			'param_name' => 'thumbnail',
			'value' => '',
			'description' => esc_html__( 'Enter image size (Example: 200x100 (Width x Height)).', 'deep' ),
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'1',
					'2',
					'3',
					'4',
					'5',
					'6',
					'7',
					'8',
					'9',
					'10',
					'11',
					'12',
					'13',
					'15',
					'16',
				),
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Image alt', 'deep' ),
			'param_name' => 'img_alt',
			'value' => '',
			'description' => esc_html__( 'Enter the image alt Text', 'deep' ),
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'1',
					'2',
					'3',
					'4',
					'5',
					'6',
					'7',
					'8',
					'9',
					'10',
					'11',
					'12',
					'13',
					'14',
					'15',
					'16',
				),
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Tag Text', 'deep' ),
			'param_name' => 'featured',
			'value' => '',
			'description' => esc_html__( 'Enter your text here', 'deep' ),
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'8',
					'15',
				),
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'time', 'deep' ),
			'param_name' => 'time',
			'value' => '',
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'17',
				),
			),
			'description' => esc_html__( 'Enter the time', 'deep' )
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'time description', 'deep' ),
			'param_name' => 'time_description',
			'value' => '',
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'17',
				),
			),
			'description' => esc_html__( 'Enter the time description', 'deep' )
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Title', 'deep' ),
			'param_name' => 'title',
			'value' => '',
			'description' => esc_html__( 'Enter the Title', 'deep' )
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Subtitle', 'deep' ),
			'param_name' => 'subtitle',
			'value' => '',
			'description' => esc_html__( 'Enter the Subtitle', 'deep' ),
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'1',
					'2',
					'3',
					'4',
					'5',
					'6',
					'7',
					'8',
					'12',
					'13',
					'15',
					'16',
				),
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'button', 'deep' ),
			'param_name' => 'teaser_btn',
			'value' => '',
			'description' => esc_html__( 'Enter your text here', 'deep' ),
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'8',
					'15',
					'16',
				),
			),
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'button background color', 'deep' ),
			'param_name' => 'teaser_btn_bg_color',
			'value' => '',
			'description' => esc_html__( 'Please pick desired color', 'deep' ),
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'8',
				),
			),
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Teaser button text color', 'deep' ),
			'param_name' => 'teaser_btn_txt_color',
			'value' => '',
			'description' => esc_html__( 'Please pick desired color', 'deep' ),
			'dependency' => array(
				'element' => 'type',
				'value' =>   '8',
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Link URL', 'deep' ),
			'param_name' => 'link_url',
			'value' => '#',
			'description' => esc_html__( 'Enter the link url. Example: http://yourdomain.com', 'deep' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Open link in a new tab? ', 'deep' ),
			'description' => __( 'Add Target = _blank', 'deep' ),
			'param_name' => 'link_target',
			'std' => 'false',
		),
		array(
			'type' => 'textarea',
			'heading' => esc_html__( 'Content', 'deep' ),
			'param_name' => 'text_content',
			'value' => '',
			'description' => esc_html__( 'Please write Content', 'deep' ),
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'10',
					'11',
					'15',
					'17',
				),
			),
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'link Color', 'deep' ),
			'param_name' => 'suburl_color',
			'value' => '',
			'description' => esc_html__( 'Select color for URL', 'deep' ),
			'dependency' => array(
				'element' => 'type',
				'value' => '10',
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'price', 'deep' ),
			'param_name' => 'price',
			'value' => '',
			'description' => esc_html__( 'Enter the price', 'deep' ),
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'15',
					'17',
				),
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Introduction Link Text', 'deep' ),
			'param_name' => 'introduction_title',
			'value' => '',
			'description' => esc_html__( 'Enter the Title', 'deep' ),
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'18',
				),
			),			
		),	
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Introduction Link URL', 'deep' ),
			'param_name' => 'introduction_link_url',
			'value' => '',
			'description' => esc_html__( 'Enter the link url. Example: http://yourdomain.com', 'deep' ),
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'18',
				),
			),				
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Live Preview Link Text', 'deep' ),
			'param_name' => 'live_preview_title',
			'value' => '',
			'description' => esc_html__( 'Enter the Title', 'deep' ),
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'18',
				),
			),			
		),	
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Live Preview Link URL', 'deep' ),
			'param_name' => 'live_preview_link_url',
			'value' => '',
			'description' => esc_html__( 'Enter the link url. Example: http://yourdomain.com', 'deep' ),
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'18',
				),
			),				
		),		
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Buy Item Link Text', 'deep' ),
			'param_name' => 'buy_item_title',
			'value' => '',
			'description' => esc_html__( 'Enter the Title', 'deep' ),
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'18',
				),
			),			
		),	
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Buy Item Link URL', 'deep' ),
			'param_name' => 'buy_item_link_url',
			'value' => '',
			'description' => esc_html__( 'Enter the link url. Example: http://yourdomain.com', 'deep' ),
			'dependency' => array(
				'element' => 'type',
				'value' => array(
					'18',
				),
			),				
		),
		array(
			'heading' => esc_html__( 'Properties', 'deep' ),
			'type' => 'param_group',
			'param_name' => 'features',
			'dependency' => array(
				'element' => 'type',
				'value' => array( '15' ),
			),
			'params' => array(
				array(
					'heading' => esc_html__( 'Property', 'deep' ),
					'type' => 'textfield',
					'param_name' => 'text',
					'admin_label' => true,
				),
				array(
					'heading' => esc_html__( 'Property Value', 'deep' ),
					'type' => 'textfield',
					'param_name' => 'number',
					'admin_label' => true,
				),
			),
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