<?php

add_action('init', 'deep_setup_kc_section', 99 );

if ( ! function_exists( 'deep_setup_kc_section' ) ) :
    function deep_setup_kc_section() {
        global $kc;
        $kc->remove_map_param('kc_row', 'cols_gap');
        $kc->remove_map_param('kc_row', 'use_container');
        $kc->remove_map_param('kc_row', 'force');
        $kc->remove_map_param('kc_row', 'full_height');
        $kc->remove_map_param('kc_row', 'content_placement');
        $kc->remove_map_param('kc_row', 'equal_height');
        $kc->remove_map_param('kc_row', 'column_align');
        $kc->remove_map_param('kc_row', 'video_bg');
        $kc->remove_map_param('kc_row', 'video_bg_url');
        $kc->remove_map_param('kc_row', 'video_options');
        $kc->remove_map_param('kc_row', 'parallax');
        $kc->remove_map_param('kc_row', 'parallax_image');
        $kc->remove_map_param('kc_row', 'container_class');
        $kc->remove_map_param('kc_row', 'row_class');
        $kc->remove_map_param('kc_row', 'row_id');
        $kc->remove_map_param('kc_row', 'css_custom');
        $kc->remove_map_param('kc_row', 'animate');

        $kc->update_map( 
        'kc_row',
        'params',
            array(
                'general' => array(
                    array(
                        'label'         => esc_html__( 'Stretch content (Full width content)', 'deep' ),
                        'type'          => 'checkbox',
                        'name'          => 'full_width',
                        'options'       => array(
                            'yes'   => 'Yes',
                        ),
                        'value'         => 'false',
                        'description'   => esc_html__( 'Select stretching options for section and content.', 'deep' ),
                    ),
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
                        'label'         => esc_html__( 'Section Height', 'deep' ),
                        'type'          => 'text',
                        'name'          => 'wn_section_height',
                        'description'   => esc_html__( 'Set height for row. This feature doesn\'t work in "Full Height" row.', 'deep' ),
                        'relation'      => array(
                            'parent'     => 'full_height',
                            'hide_when'  => 'yes',
                        ),
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
                        'name'          => 'sec_pattern',
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
                        'name'          => 'sec_pattern_color',
                        'label'         => esc_html__('Overlay color', 'deep'),
                        'type'          => 'color_picker',
                        'description'   => esc_html__('Overlay color', 'deep'),
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
                        'name'          => 'white_text_color',
                        'options'       => array(
                            'yes' => 'Yes',
                        ),
                        'value'         => 'false',
                        'description'   => esc_html__( 'If you choose it, all text will be white.', 'deep' ),
                    ),
                    array(
                        'label'         => esc_html__( 'Expandable Section', 'deep' ),
                        'type'          => 'checkbox',
                        'name'          => 'expandable_row',
                        'options'       => array(
                            '1'   => 'Yes',
                        ),
                        'value'         => 'false',
                        esc_html__( 'Make this section close on default and show plus icon for expand all of content in this section.', 'deep' ),
                    ),
                    array(
                        'label'         => esc_html__( 'Expand Text', 'deep' ),
                        'type'          => 'text',
                        'name'          => 'txt_expandable_row',
                        'description'   => esc_html__( 'Show text above of expand icon button', 'deep' ),
                        'relation'      => array(
                            'parent'     => 'expandable_row',
                            'show_when'  => '1',
                        ),
                    ),
                    array(
                        'name'          => 'color_expandable_row',
                        'label'         => esc_html__( 'Expand Button Color', 'deep' ),
                        'type'          => 'color_picker',
                        'description'   => esc_html__( 'Select Custom Background color.', 'deep' ),
                        'relation'      => array(
                            'parent'     => 'expandable_row',
                            'show_when'  => '1',
                        ),
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
                'Shape Divider' => array(
                    array(
                        'name'          => 'shape_on_top',
                        'label'         => esc_html__( 'Put shape on top of section?', 'deep' ),
                        'type'          => 'checkbox',
                        'options'       => array(
                            'yes'   => 'Yes',
                        ),
                        'value'         => 'false',
                    ),
                    array(
                        'name'          => 'top_shape_divider',
                        'label'         => esc_html__( 'Shape Divider', 'deep' ),
                        'type'          => 'radio_image',
                        'options'       => array(
                            '1'  => DEEP_CORE_URL .'kingcomposer/assets/images/divider1-top.png',        
                            '2'  => DEEP_CORE_URL .'kingcomposer/assets/images/divider2-top.png',        
                            '3'  => DEEP_CORE_URL .'kingcomposer/assets/images/divider3-top.png',        
                            '4'  => DEEP_CORE_URL .'kingcomposer/assets/images/divider4-top.png',        
                            '5'  => DEEP_CORE_URL .'kingcomposer/assets/images/divider5-top.png',        
                            '6'  => DEEP_CORE_URL .'kingcomposer/assets/images/divider6-top.png',
                            '7'  => DEEP_CORE_URL .'kingcomposer/assets/images/divider7-top.png',
                            '8'  => DEEP_CORE_URL .'kingcomposer/assets/images/divider8-top.png',
                            '9'  => DEEP_CORE_URL .'kingcomposer/assets/images/divider9-top.png',
                        ),
                        'value'           => '2',
                        'description'        => esc_html__( 'Select an image.', 'deep' ),
                        'relation'      => array(
                            'parent'     => 'shape_on_top',
                            'show_when'  => 'yes',
                        ),
                    ),
                    array(
                        'name'          => 'top_shape_bgcolor',
                        'label'         => esc_html__( 'Background color', 'deep' ),
                        'type'          => 'color_picker',
                        'description'   => esc_html__( 'Background color', 'deep'),
                        'relation'      => array(
                            'parent'     => 'shape_on_top',
                            'show_when'  => 'yes',
                        ),
                    ),
                    array(
                        'name'          => 'shape_on_bottom',
                        'label'         => esc_html__( 'Put shape on Bottom of section?', 'deep' ),
                        'type'          => 'checkbox',
                        'options'       => array(
                            'yes'   => 'Yes',
                        ),
                        'value'         => 'false',
                    ),
                    array(
                        'name'          => 'bottom_shape_divider',
                        'label'         => esc_html__( 'Shape Divider', 'deep' ),
                        'type'          => 'radio_image',
                        'options'       => array(
                            '1' => DEEP_CORE_URL .'kingcomposer/assets/images/divider1-bottom.png',        
                            '2' => DEEP_CORE_URL .'kingcomposer/assets/images/divider2-bottom.png',        
                            '3' => DEEP_CORE_URL .'kingcomposer/assets/images/divider3-bottom.png',        
                            '4' => DEEP_CORE_URL .'kingcomposer/assets/images/divider4-bottom.png',        
                            '5' => DEEP_CORE_URL .'kingcomposer/assets/images/divider5-bottom.png',        
                            '6' => DEEP_CORE_URL .'kingcomposer/assets/images/divider6-bottom.png',
                            '7' => DEEP_CORE_URL .'kingcomposer/assets/images/divider7-bottom.png',
                            '8' => DEEP_CORE_URL .'kingcomposer/assets/images/divider8-bottom.png',
                            '9' => DEEP_CORE_URL .'kingcomposer/assets/images/divider9-bottom.png',
                        ),
                        'value'           => '2',
                        'description'        => esc_html__( 'Select an image.', 'deep' ),
                        'relation'      => array(
                            'parent'     => 'shape_on_bottom',
                            'show_when'  => 'yes',
                        ),
                    ),
                    array(
                        'name'          => 'bottom_shape_bgcolor',
                        'label'         => esc_html__( 'Background color', 'deep' ),
                        'type'          => 'color_picker',
                        'description'   => esc_html__( 'Background color', 'deep'),
                        'relation'      => array(
                            'parent'     => 'shape_on_bottom',
                            'show_when'  => 'yes',
                        ),
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
                        'name'          => 'section_color_type',
                        'options'       => array(
                            'section_gradient'   => 'Yes',
                        ),
                        'value'         => 'false',
                    ),
                    array(
                        'name'          => 'section_grad_color_1',
                        'label'         => esc_html__( "Color 1", 'deep' ),
                        'type'          => 'color_picker',
                        'relation'      => array(
                            'parent'     => 'section_color_type',
                            'show_when'  => 'section_gradient',
                        ),
                    ),
                    array(
                        'name'          => 'section_grad_color_2',
                        'label'         => esc_html__( "Color 2", 'deep' ),
                        'type'          => 'color_picker',
                        'relation'      => array(
                            'parent'     => 'section_color_type',
                            'show_when'  => 'section_gradient',
                        ),
                    ),
                    array(
                        'name'          => 'section_grad_color_3',
                        'label'         => esc_html__( "Color 3", 'deep' ),
                        'type'          => 'color_picker',
                        'relation'      => array(
                            'parent'     => 'section_color_type',
                            'show_when'  => 'section_gradient',
                        ),
                    ),
                    array(
                        'name'          => 'section_grad_color_4',
                        'label'         => esc_html__( "Color 4", 'deep' ),
                        'type'          => 'color_picker',
                        'relation'      => array(
                            'parent'     => 'section_color_type',
                            'show_when'  => 'section_gradient',
                        ),
                    ),
                    array(
                        'name'          => 'section_grad_direction',
                        'label'         => esc_html__('Direction', 'deep'),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Gradient direction example: 70', 'deep'),
                        'relation'      => array(
                            'parent'     => 'section_color_type',
                            'show_when'  => 'section_gradient',
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