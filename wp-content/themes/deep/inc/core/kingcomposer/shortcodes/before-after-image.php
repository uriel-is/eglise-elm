<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'beforeafter' => array(
                'name'          => esc_html__( 'Before After Image ( Comparison )', 'deep' ),
                'description'   => esc_html__( 'You can choose 2 images to compare.', 'deep' ),
                'icon'          => 'webnus-beforeafter',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'Images' => array(
                        array(
                            'name'          => 'img1',
                            'label'         => esc_html__( '"Before" image', 'deep' ),
                            'type'          => 'attach_image',
                        ),
                        array(
                            'name'          => 'img1_alt',
                            'label'         => esc_html__( 'Image ALT', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Set a custom after label', 'deep'),
                        ),
                        array(
                            'name'          => 'img2',
                            'label'         => esc_html__( '"After" image', 'deep' ),
                            'type'          => 'attach_image',
                        ),
                        array(
                            'name'          => 'img2_alt',
                            'label'         => esc_html__( 'Image ALT', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Set a custom after label', 'deep'),
                        ),
                    ),
                    'Options' => array(
                        array(
                            'name'          => 'arrow_type',
                            'label'         => esc_html__('Arrow type', 'deep'),
                            'type'          => 'select',
                            'options'       => array(
                                'circle'  => 'Circle',
                                'square'  => 'Square',
                            ),
                        ),
                        array(
                            'name'          => 'no_middle_line',
                            'label'         => esc_html__( 'Remove Middle line?', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'yes'   => 'Yes',
                            ),
                            'value'         => 'false',
                        ),
                        array(
                            'name'          => 'visible_value',
                            'label'         => esc_html__('Visible "Before" image value', 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( 'How much of the "before" image is visible when the page loads? Please enter between 0 - 1. Default is 0.5', 'deep'),
                            'value'         => '0.5',
                        ),
                        array(
                            'name'          => 'orientation_type',
                            'label'         => esc_html__('Orientation type', 'deep'),
                            'type'          => 'select',
                            'options'       => array(
                                'horizontal' => 'Horizontal',
                                'vertical'   => 'Vertical',
                            ),
                            'description'   => esc_html__( 'Orientation of the before and after images', 'deep'),
                        ),
                        array(
                            'name'          => 'no_overlay',
                            'label'         => esc_html__( 'Display Overlay?', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'yes'   => 'Yes',
                            ),
                            'value'         => 'false',
                        ),
                        array(
                            'name'          => 'before_label',
                            'label'         => esc_html__('Before label', 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Set a custom before label', 'deep'),
                            'relation'      => array(
                                'parent'     => 'no_overlay',
                                'show_when'  => 'yes',
                            ),
                        ),
                        array(
                            'name'          => 'after_label',
                            'label'         => esc_html__('After label', 'deep'),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Set a custom after label', 'deep'),
                            'relation'      => array(
                                'parent'     => 'no_overlay',
                                'show_when'  => 'yes',
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