<?php

add_action('init', 'deep_setup_kc_row_inner', 99 );

if ( ! function_exists( 'deep_setup_kc_row_inner' ) ) :
    function deep_setup_kc_row_inner() {
        global $kc;
        $kc->remove_map_param('kc_row_inner', 'cols_gap');
        $kc->remove_map_param('kc_row_inner', 'equal_height');
        $kc->remove_map_param('kc_row_inner', 'column_align');
        $kc->remove_map_param('kc_row_inner', 'video_bg');
        $kc->remove_map_param('kc_row_inner', 'video_bg_url');
        $kc->remove_map_param('kc_row_inner', 'video_options');
        $kc->remove_map_param('kc_row_inner', 'row_class_container');
        $kc->remove_map_param('kc_row_inner', 'row_class');
        $kc->remove_map_param('kc_row_inner', 'row_id');
        $kc->remove_map_param('kc_row_inner', 'css_custom');
        $kc->remove_map_param('kc_row_inner', 'animate');

        $kc->update_map( 
        'kc_row_inner', 
        'params',
            array(
            	'general' => array(
                    array(
                        'label'         => esc_html__( 'Full height section?', 'deep' ),
                        'type'          => 'checkbox',
                        'name'          => 'full_height',
                        'options'       => array(
                            'yes'   => 'Yes',
                        ),
                        'value'         => 'false',
                        'description'   => esc_html__( 'If checked section will be set to full height.', 'deep' ),
                    ),
                    array(
                        'label'         => esc_html__( 'Decrease height of full height section', 'deep' ),
                        'type'          => 'text',
                        'name'          => 'dec_full_height',
                        'description'   => esc_html__( 'Can be used with px. Example: 35px', 'deep' ),
                        'relation'      => array(
                            'parent'     => 'full_height',
                            'show_when'  => 'yes',
                        ),
                    ),
                    array(
                        'name'          => 'columns_placement',
                        'label'         => esc_html__('Columns position', 'deep'),
                        'type'          => 'select',
                        'options'       => array(
                            'top'      => 'Top',
                            'middle'   => 'Middle',
                            'bottom'   => 'Bottom',
                            'stretch'  => 'Stretch',
                        ),
                        'description'   => esc_html__( 'Select columns position within row.', 'deep' ),
                        'relation'      => array(
                            'parent'     => 'full_height',
                            'show_when'  => 'yes',
                        ),
                    ),
                    array(
                        'label'         => esc_html__( 'Row Height', 'deep' ),
                        'type'          => 'text',
                        'name'          => 'row_height',
                        'description'   => esc_html__( 'Set height for row. This feature doesn\'t work in "Full Height" row.', 'deep' ),
                        'relation'      => array(
                            'parent'     => 'full_height',
                            'hide_when'  => 'yes',
                        ),
                    ),
                    array(
						'name' => 'gap',
						'type' => 'css',
						'options' => array(
							array(
								'group' => array(
									array('property' => 'gap', 'label' => 'Columns Gap', 'des' => __(' The distance between the columns in this row', 'deep'), 'selector' => '>.kc_column_inner, >div>.kc_column_inner'),
								)
							)
						)
					),
                    array(
                        'name'          => 'content_placement',
                        'label'         => esc_html__( 'Content position', 'deep' ),
                        'type'          => 'select',
                        'options'       => array(
                            ''           => 'Default',
                            'top'        => 'Top',
                            'middle'     => 'Middle',
                            'bottom'     => 'Bottom',
                        ),
                        'description'   => esc_html__( 'Select content position within section.', 'deep' ),
                    ),
                    array(
                        'name'          => 'row_pattern',
                        'label'         => esc_html__('Overlay pattern', 'deep'),
                        'type'          => 'select',
                        'options'       => array(
                            ''           => 'No Pattern',
                            'max-pat'    => 'Pattern 1',
                            'max-pat2'   => 'Pattern 2',
                        ),
                        'description'   => esc_html__( 'Overlay Pattern', 'deep'),
                    ),
                    array(
                        'name'          => 'row_pattern_color',
                        'label'         => esc_html__('Overlay color', 'deep'),
                        'type'          => 'color_picker',
                        'description'   => esc_html__('Overlay color', 'deep'),
                        'value'         => '',
                    ),
                    array(
                        'name'          => 'layer_animation',
                        'label'         => esc_html__( 'Layer Animation', 'deep' ),
                        'type'          => 'select',
                        'options'       => array(
                            'none'                  => 'None',
                            'wn-layer-anim-bottom'  => 'Bottom to Top',
                            'wn-layer-anim-top'  	=> 'Top to Bottom',
                            'wn-layer-anim-left'  	=> 'Left to Right',
                            'wn-layer-anim-right'  	=> 'Right to Left',
                            'wn-layer-anim-zoom-in' => 'Zoom in',
                            'wn-layer-anim-zoom-out'=> 'Zoom out',
                            'wn-layer-anim-fade'  	=> 'Fade',
                            'wn-layer-anim-flip'  	=> 'Flip',
                        ),
                    ),
                    array(
                        'label'         => esc_html__( 'Align Center?', 'deep' ),
                        'type'          => 'checkbox',
                        'name'          => 'align_center',
                        'options'       => array(
                            'aligncenter' => 'Yes',
                        ),
                        'value'         => 'false',
                        'description'   => esc_html__('Align center content', 'deep'),
                    ),
                    array(
                        'label'         => esc_html__( 'White Text Color?', 'deep' ),
                        'type'          => 'checkbox',
                        'name'          => 'row_dark',
                        'options'       => array(
                            'yes' => 'Yes',
                        ),
                        'value'         => 'false',
                        'description'   => esc_html__( 'If you choose it, all text will be white.', 'deep' ),
                    ),
                    array(
                        'label'         => esc_html__( 'Equal height', 'deep' ),
                        'type'          => 'checkbox',
                        'name'          => 'equal_height',
                        'options'       => array(
                            'yes' => 'Yes',
                        ),
                        'value'         => 'false',
                        'description'   => esc_html__( 'If checked columns will be set to equal height.', 'deep' ),
                    ),
                    array(
                        'label'         => esc_html__( 'Remove Margin Bottom?', 'deep' ),
                        'type'          => 'checkbox',
                        'name'          => 'r_margin_bottom',
                        'options'       => array(
                            'yes' => 'Yes',
                        ),
                        'value'         => 'false',
                        'description'   => esc_html__('Remove Margin Bottom', 'deep'),
                    ),
                ),
				'styling' => array(
                    array(
                        'name'    => 'css_editor',
                        'type'    => 'css',
                        'options' => array(
                            array(
                                "screens"       => "any,1024,999,767,479",
                                'Background'    => array(
                                    array('property' => 'background', 'label' => 'Background'),
                                ),
                                'Box'    => array(
                                    array('property' => 'border', 'label' => 'Border'),
                                    array('property' => 'padding', 'label' => 'padding'),
									array('property' => 'margin', 'label' => 'Margin')
                                ),
                            ),
                        ),
                    ),
                    array(
                        'name'          => 'wn_parallax',
                        'label'         => esc_html__( 'Parallax', 'deep' ),
                        'type'          => 'select',
                        'options'       => array(
                            ''                => esc_html__( 'None', 'deep' ),
                            'content-moving'  => esc_html__( 'Parallax', 'deep' ),
                        ),
                        'description'   => esc_html__( 'Add parallax type background for row.', 'deep' ),
                    ),
                    array(
                        'name'          => 'wn_parallax_speed',
                        'label'         => esc_html__( 'Parallax Speed', 'deep' ),
                        'type'          => 'select',
                        'options'       => array(
                            '108'  => esc_html__( 'Very Slow', 'deep' ),
                            '123'  => esc_html__( 'Slow', 'deep' ),
                            '190'  => esc_html__( 'Normal', 'deep' ),
                            '225'  => esc_html__( 'Fast', 'deep' ),
                            '260'  => esc_html__( 'Very Fast', 'deep' ),
                        ),
                        'value'         => '123',
                        'description'   => esc_html__( 'Add parallax type background for row.', 'deep' ),
                        'relation'      => array(
                            'parent'     => 'arrow_type',
                            'hide_when'  => '',
                        ),
                    ),
                    array(
                        'name'          => 'responsive_bg_none',
                        'label'         => esc_html__('Background None in Mobile Size?', 'deep'),
                        'type'          => 'checkbox',
                        'options'       => array(
                            'respo-bg-none'   => 'Yes',
                        ),
                        'value'         => 'false',
                        'description'   => esc_html__('If checked background columns will be disabled in mobile.', 'deep'),
                    ),
                ),
                'Video Bg' => array(
                    array(
                        'name'          => 'video_bg_source',
                        'label'         => esc_html__( 'Video Background Source', 'deep' ),
                        'type'          => 'select',
                        'options'       => array(
                            'youtube'  => 'Youtube' ,
                            'host'     => 'Self Hosted',
                        ),
                        'description'   => esc_html__( 'Please select video type', 'deep'),
                    ),
                    array(
                        'name'          => 'video_bg_url',
                        'label'         => esc_html__( 'YouTube link', 'deep' ),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Add YouTube link.', 'deep' ),
                        'relation'      => array(
                            'parent'     => 'video_bg_source',
                            'show_when'  => 'youtube',
                        ),
                    ),
                    array(
                        'name'          => 'mp4_format',
                        'label'         => esc_html__('.MP4 Format', 'deep'),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Compatibility for Safari and IE9', 'deep'),
                        'relation'      => array(
                            'parent'     => 'video_bg_source',
                            'show_when'  => 'host',
                        ),
                    ),
                    array(
                        'name'          => 'webm_format',
                        'label'         => esc_html__('.Ogg Format', 'deep'),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Compatibility for Firefox4, Opera, and Chrome', 'deep'),
                        'relation'      => array(
                            'parent'     => 'video_bg_source',
                            'show_when'  => 'host',
                        ),
                    ),
                    array(
                        'name'          => 'ogg_format',
                        'label'         => esc_html__('.MP4 Format', 'deep'),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Compatibility for older Firefox and Opera versions', 'deep'),
                        'relation'      => array(
                            'parent'     => 'video_bg_source',
                            'show_when'  => 'host',
                        ),
                    ),
                    array(
                        'name'          => 'display_inline',
                        'label'         => esc_html__( 'Video Muted', 'deep' ),
                        'type'          => 'checkbox',
                        'options'       => array(
                            'muted'   => 'Yes',
                        ),
                        'value'         => 'muted',
                        'description'   => esc_html__( 'If checked the video will be Muted', 'deep' ),
                        'relation'      => array(
                            'parent'     => 'video_bg_source',
                            'show_when'  => 'host',
                        ),
                    ),
                ),
                'Gradient' => array(
                    array(
                        'label'         => esc_html__( 'Gradient', 'deep' ),
                        'type'          => 'checkbox',
                        'name'          => 'row_color_type',
                        'options'       => array(
                            'row_gradient'   => 'Yes',
                        ),
                        'value'         => 'false',
                    ),
                    array(
                        'name'          => 'row_grad_color_1',
                        'label'         => esc_html__( "Color 1", 'deep' ),
                        'type'          => 'color_picker',
                        'relation'      => array(
                            'parent'     => 'row_color_type',
                            'show_when'  => 'row_gradient',
                        ),
                    ),
                    array(
                        'name'          => 'row_grad_color_2',
                        'label'         => esc_html__( "Color 2", 'deep' ),
                        'type'          => 'color_picker',
                        'relation'      => array(
                            'parent'     => 'row_color_type',
                            'show_when'  => 'row_gradient',
                        ),
                    ),
                    array(
                        'name'          => 'row_grad_color_3',
                        'label'         => esc_html__( "Color 3", 'deep' ),
                        'type'          => 'color_picker',
                        'relation'      => array(
                            'parent'     => 'row_color_type',
                            'show_when'  => 'row_gradient',
                        ),
                    ),
                    array(
                        'name'          => 'row_grad_color_4',
                        'label'         => esc_html__( "Color 4", 'deep' ),
                        'type'          => 'color_picker',
                        'relation'      => array(
                            'parent'     => 'row_color_type',
                            'show_when'  => 'row_gradient',
                        ),
                    ),
                    array(
                        'name'          => 'row_grad_direction',
                        'label'         => esc_html__('Direction', 'deep'),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Gradient direction example: 70', 'deep'),
                        'relation'      => array(
                            'parent'     => 'row_color_type',
                            'show_when'  => 'row_gradient',
                        ),
                    ),
                ),
                'animate' => array(
                    array(
                        'name'    => 'animate',
                        'type'    => 'animate',
                    ),
                ),
                'Class & ID' => array(
                    array(
                        'name'          => 'el_id',
                        'label'         => esc_html__( 'Row ID', 'deep' ),
                        'type'          => 'text',
                        'description'   => wp_kses( __( 'Enter row ID (Note: make sure it is unique and valid according to <a href="http://www.w3schools.com/tags/att_global_id.asp" target="_blank">w3c specification</a>).', 'deep' ), deep_kses() ),
                    ),
                    array(
                        'name'          => 'el_class',
                        'label'         => esc_html__( 'Extra class', 'deep' ),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'deep' ),
                    ),
                ),
            )
        );

    }
endif;
?>