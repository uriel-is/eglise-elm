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
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'teaserbox' => array(
                'name'          => esc_html__( 'Teaser Box', 'deep' ),
                'description'   => esc_html__( 'Image and icon with text article', 'deep' ),
                'icon'          => 'webnus-teaserbox',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                '1'   => 'Type 1' ,
                                '2'   => 'Type 2' ,
                                '3'   => 'Type 3' ,
                                '4'   => 'Type 4' ,
                                '5'   => 'Type 5' ,
                                '6'   => 'Type 6' ,
                                '7'   => 'Type 7' ,
                                '8'   => 'Type 8' ,
                                '9'   => 'Type 9' ,
                                '10'  => 'Type 10',
                                '11'  => 'Type 11',
                                '12'  => 'Type 12',
                                '13'  => 'Type 13',
                                '14'  => 'Type 14',
                                '15'  => 'Type 15',
                                '16'  => 'Type 16',
                                '17'  => 'Type 17',
                                ),
                            'description' => wp_kses( __( 'You can choose from these pre-designed types. <a href="http://deeptem.com/features/boxes-elements/teaser-box/" target="_blank">View All Types</a>', 'deep'), deep_kses() ),
                        ),
                        array(
                            'name'          => 'img',
                            'label'         => esc_html__( 'Image', 'deep' ),
                            'type'          => 'attach_image',
                            'description'   => esc_html__( 'TeaserBox Image', 'deep'),
                        ),
                        array(
                            'name'          => 'thumbnail',
                            'label'         => esc_html__( 'Image Size', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Enter image size (Example: 200x100 (Width x Height)).', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'hide_when'  => '17',
                            ),
                        ),
                        array(
                            'name'          => 'img_alt',
                            'label'         => esc_html__( 'Image alt', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Enter the image alt Text.', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'hide_when'  => '17',
                            ),
                        ),
                        array(
                            'name'          => 'featured',
                            'label'         => esc_html__( 'Tag Text', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Enter your text here', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( '8' , '15' ),
                            ),
                        ),
                        array(
                            'name'          => 'time',
                            'label'         => esc_html__( 'Time', 'deep' ),
                            'type'          => 'text',
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( '17' ),
                            ),
                        ),
                        array(
                            'name'          => 'time_description',
                            'label'         => esc_html__( 'Time Description', 'deep' ),
                            'type'          => 'text',
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( '17' ),
                            ),
                        ),
                        array(
                            'name'          => 'title',
                            'label'         => esc_html__( 'Title', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Enter the Title', 'deep'),
                        ),
                        array(
                            'name'          => 'subtitle',
                            'label'         => esc_html__( 'Subtitle', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Enter the Subtitle', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'hide_when'  => array( '9' , '10' , '11' , '14' , '17' ),
                            ),
                        ),
                        array(
                            'name'          => 'teaser_btn',
                            'label'         => esc_html__( 'Teaser button', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Enter your text here', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( '8' , '15' , '16' ),
                            ),
                        ),
                        array(
                            'name'          => 'teaser_btn_bg_color',
                            'label'         => esc_html__( 'Teaser button background color', 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Please pick desired color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( '8' , '15' ),
                            ),
                        ),
                        array(
                            'name'          => 'teaser_btn_txt_color',
                            'label'         => esc_html__( 'Teaser button text color', 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Please pick desired color', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => '8',
                            ),
                        ),
                        array(
                            'name'          => 'link_url',
                            'label'         => esc_html__( 'Link URL', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Enter the link url. Example: http://yourdomain.com', 'deep'),
                            'value'         => '#',
                        ),
                        array(
                            'name'          => 'link_target',
                            'label'         => esc_html__( 'Open link in a new tab? ', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes',
                                ),
                            'value'         => 'false',
                            'description'   => esc_html__( 'Add Target = _blank', 'deep'),
                        ),
                        array(
                            'name'          => 'text_content',
                            'label'         => esc_html__('Content', 'deep'),
                            'type'          => 'textarea',
                            'description'   => esc_html__( 'Please write Content', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( '10' , '11' , '15' , '17' ),
                            ),
                        ),
                        array(
                            'name'          => 'suburl_color',
                            'label'         => esc_html__( 'link Color', 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select color for URL', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => '10',
                            ),
                        ),
                        array(
                            'name'          => 'price',
                            'label'         => esc_html__('Price', 'deep'),
                            'type'          => 'text',
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => array( '17' ),
                            ),
                        ),
                        array(
                            'type'          => 'group',
                            'label'         => esc_html__( 'Properties', 'deep' ),
                            'name'          => 'features',
                            'options'       => array( 
                                'add_text' => esc_html__('Add new', 'deep')
                            ),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => '15',
                            ),
                            'params' => array(
                                array(
                                    'name'          => 'text',
                                    'label'         => esc_html__( 'Property', 'deep' ),
                                    'type'          => 'text',
                                ),
                                array(
                                    'name'          => 'number',
                                    'label'         => esc_html__( 'Property Value', 'deep' ),
                                    'type'          => 'text',
                                ),
                            ),
                        ),
                    ),
                    'Class & ID' => array(
                        array(
                            'name'          => 'shortcodeclass',
                            'label'         => esc_html__('Extra Class', 'deep'),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'shortcodeid',
                            'label'         => esc_html__('ID', 'deep'),
                            'type'          => 'text',
                        ),
                    ),
                )
            ),
        )
    ); // End add map
 } // End if