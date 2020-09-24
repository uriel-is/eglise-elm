<?php

add_action('init', 'deep_setup_kc_column_inner', 99 );

if ( ! function_exists( 'deep_setup_kc_column_inner' ) ) :
    function deep_setup_kc_column_inner() {
        global $kc;

        $kc->update_map( 
        'kc_column_inner', 
        'params',
            array(
            	'Inner Scroll' => array(
                    array(
                        'name'          => 'inner_scroll',
                        'label'         => esc_html__( 'Inner Scroll?', 'deep' ),
                        'type'          => 'checkbox',
                        'options'       => array(
                            'yes'   => 'Yes',
                        ),
                        'value'         => 'false',
                        'description'   => esc_html__( 'Do you want to have inner scroll in this column?', 'deep' ),
                    ),
                    array(
                        'name'          => 'scroll_height_desktop',
                        'label'         => esc_html__( 'Height Value in Desktop size', 'deep' ),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Please enter your value with "px". Like: 900px', 'deep' ),
                        'relation'      => array(
                            'parent'     => 'inner_scroll',
                            'show_when'  => 'yes',
                        ),
                    ),
                    array(
                        'name'          => 'scroll_height_tablet',
                        'label'         => esc_html__( 'Height Value in Tablet size', 'deep' ),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Please enter your value with "px". Like: 900px', 'deep' ),
                        'relation'      => array(
                            'parent'     => 'inner_scroll',
                            'show_when'  => 'yes',
                        ),
                    ),
                    array(
                        'name'          => 'scroll_height_mobile',
                        'label'         => esc_html__( 'Height Value in Mobile size', 'deep' ),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Please enter your value with "px". Like: 900px', 'deep' ),
                        'relation'      => array(
                            'parent'     => 'inner_scroll',
                            'show_when'  => 'yes',
                        ),
                    ),
                ),
                'Toggle' => array(
                    array(
                        'name'          => 'toggle',
                        'label'         => esc_html__( 'Toggle?', 'deep' ),
                        'type'          => 'checkbox',
                        'options'       => array(
                            'yes'   => 'Yes',
                        ),
                        'value'         => 'false',
                        'description'   => esc_html__( 'Do you want to have toggle in this column?', 'deep' ),
                    ),
                    array(
                        'name'          => 'toggle_width_open',
                        'label'         => esc_html__( 'Width Value When Opened', 'deep' ),
                        'type'          => 'text',
                        'description'   =>esc_html__( 'Please enter your value with "px". Like: 900px', 'deep' ),
                        'relation'      => array(
                            'parent'     => 'toggle',
                            'show_when'  => 'yes',
                        ),
                    ),
                    array(
                        'name'          => 'toggle_height_open',
                        'label'         => esc_html__( 'Height Value When Opened', 'deep' ),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Please enter your value with "px". Like: 900px', 'deep' ),
                        'relation'      => array(
                            'parent'     => 'toggle',
                            'show_when'  => 'yes',
                        ),
                    ),
                    array(
                        'name'          => 'toggle_width_close',
                        'label'         => esc_html__( 'Width Value When Closed', 'deep' ),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Please enter your value with "px". Like: 900px', 'deep' ),
                        'relation'      => array(
                            'parent'     => 'toggle',
                            'show_when'  => 'yes',
                        ),
                    ),
                    array(
                        'name'          => 'toggle_height_close',
                        'label'         => esc_html__( 'Height Value When Closed', 'deep' ),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Please enter your value with "px". Like: 900px', 'deep' ),
                        'relation'      => array(
                            'parent'     => 'toggle',
                            'show_when'  => 'yes',
                        ),
                    ),
                ),
                'Gradient' => array(
                    array(
                        'name'          => 'column_color_type',
                        'label'         => esc_html__( 'Gradient', 'deep' ),
                        'type'          => 'checkbox',
                        'options'       => array(
                            'column_gradient'   => 'Yes',
                        ),
                        'value'         => 'false',
                    ),
                    array(
                        'name'          => 'column_grad_color_1',
                        'label'         => esc_html__('color 1', 'deep'),
                        'type'          => 'color_picker',
                        'relation'      => array(
                            'parent'     => 'column_color_type',
                            'show_when'  => 'column_gradient',
                        ),
                    ),
                    array(
                        'name'          => 'column_grad_color_2',
                        'label'         => esc_html__('color 2', 'deep'),
                        'type'          => 'color_picker',
                        'relation'      => array(
                            'parent'     => 'column_color_type',
                            'show_when'  => 'column_gradient',
                        ),
                    ),
                    array(
                        'name'          => 'column_grad_color_3',
                        'label'         => esc_html__('color 3', 'deep'),
                        'type'          => 'color_picker',
                        'relation'      => array(
                            'parent'     => 'column_color_type',
                            'show_when'  => 'column_gradient',
                        ),
                    ),
                    array(
                        'name'          => 'column_grad_color_4',
                        'label'         => esc_html__('color 4', 'deep'),
                        'type'          => 'color_picker',
                        'relation'      => array(
                            'parent'     => 'column_color_type',
                            'show_when'  => 'column_gradient',
                        ),
                    ),
                    array(
                        'name'          => 'column_grad_direction',
                        'label'         => esc_html__( 'Direction', 'deep' ),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Gradient direction example: 70', 'deep'),
                        'relation'      => array(
                            'parent'     => 'column_color_type',
                            'show_when'  => 'column_gradient',
                        ),
                    ),
                ),
            )
        );

    }
endif;
?>