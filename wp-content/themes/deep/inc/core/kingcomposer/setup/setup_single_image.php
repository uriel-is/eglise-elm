<?php

add_action('init', 'deep_setup_kc_single_image', 99 );

if ( ! function_exists( 'deep_setup_kc_single_image' ) ) :
    function deep_setup_kc_single_image() {
        global $kc;

        $kc->update_map( 
        'kc_single_image', 
        'params',
            array(
            	'Animation Pro' => array(
                    array(
                        'name'          => 'enable_animation_pro',
                        'label'         => esc_html__( 'Enable Animation Pro', 'deep' ),
                        'type'          => 'checkbox',
                        'options'       => array(
                            'true'   => 'Yes',
                        ),
                        'value'         => 'false',
                    ),
                    array(
                        'name'          => 'trigger_hook',
                        'label'         => esc_html__( 'Effect Start Point', 'deep' ),
                        'type'          => 'text',
                        'description'   => esc_html__( 'Can be a number between 0 and 1 defining the position of the trigger Hook in relation to the viewport.', 'deep' ),
                        'value'         => '0.4',
                        'relation'      => array(
                            'parent'     => 'enable_animation_pro',
                            'show_when'  => 'true',
                        ),
                    ),
                    array(
                        'name'          => 'duration',
                        'label'         => esc_html__( 'Effect Length', 'deep' ),
                        'type'          => 'text',
                        'description'   => esc_html__( 'The duration of the scene. If 0 tweens will auto-play when reaching the scene start point, pins will be pinned indefinetly starting at the start position.', 'deep' ),
                        'value'         => '100%',
                        'relation'      => array(
                            'parent'     => 'enable_animation_pro',
                            'show_when'  => 'true',
                        ),
                    ),
                    array(
                        'name'          => 'vertical_movement',
                        'label'         => esc_html__( 'Vertical Movement', 'deep' ),
                        'type'          => 'text',
                        'relation'      => array(
                            'parent'     => 'enable_animation_pro',
                            'show_when'  => 'true',
                        ),
                    ),
                    array(
                        'name'          => 'horizontal_movement',
                        'label'         => esc_html__( 'Horizontal Movement', 'deep' ),
                        'type'          => 'text',
                        'relation'      => array(
                            'parent'     => 'enable_animation_pro',
                            'show_when'  => 'true',
                        ),
                    ),
                    array(
                        'name'          => 'rotation',
                        'label'         => esc_html__( 'Rotation at End', 'deep' ),
                        'type'          => 'text',
                        'relation'      => array(
                            'parent'     => 'enable_animation_pro',
                            'show_when'  => 'true',
                        ),
                    ),
                    array(
                        'name'          => 'opacity',
                        'label'         => esc_html__( 'Opacity at End', 'deep' ),
                        'type'          => 'text',
                        'relation'      => array(
                            'parent'     => 'enable_animation_pro',
                            'show_when'  => 'true',
                        ),
                    ),
                ),
            )
        );

    }
endif;
?>