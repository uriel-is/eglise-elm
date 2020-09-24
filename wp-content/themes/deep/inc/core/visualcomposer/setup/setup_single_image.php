<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if ( is_plugin_active( 'js_composer/js_composer.php' ) ) :

	if ( ! function_exists( 'deep_setup_vc_single_image' ) ) :

		add_action( 'admin_init', 'deep_setup_vc_single_image' );

		function deep_setup_vc_single_image() {
			$attributes = array(
				array(
					'group'				=> esc_html__( 'Animation Pro', 'deep' ),
					'heading'			=> esc_html__( 'Enable Animation Pro', 'deep' ),
					'param_name'		=> 'enable_animation_pro',
					'type'				=> 'checkbox',
					'std'				=> false,
					'edit_field_class'	=> 'vc_col-sm-12 wn-margin-bottom20',
				),
				array(
					'group'				=> esc_html__( 'Animation Pro', 'deep' ),
					'heading'			=> esc_html__( 'Effect Start Point', 'deep' ),
					'description'		=> esc_html__( 'Can be a number between 0 and 1 defining the position of the trigger Hook in relation to the viewport.', 'deep' ),
					'param_name'		=> 'trigger_hook',
					'type'				=> 'textfield',
					'std'				=> '0.4',
					'edit_field_class'	=> 'vc_col-sm-6 wn-margin-bottom20',
					'dependency'		=> array(
						'element'	=> 'enable_animation_pro',
						'value'		=> 'true',
					),
				),
				array(
					'group'				=> esc_html__( 'Animation Pro', 'deep' ),
					'heading'			=> esc_html__( 'Effect Length', 'deep' ),
					'description'		=> esc_html__( 'The duration of the scene. If 0 tweens will auto-play when reaching the scene start point, pins will be pinned indefinetly starting at the start position.', 'deep' ),
					'param_name'		=> 'duration',
					'type'				=> 'textfield',
					'std'				=> '100%',
					'edit_field_class'	=> 'vc_col-sm-6 wn-margin-bottom20',
					'dependency'		=> array(
						'element'	=> 'enable_animation_pro',
						'value'		=> 'true',
					),
				),
				array(
					'group'				=> esc_html__( 'Animation Pro', 'deep' ),
					'heading'			=> esc_html__( 'Vertical Movement', 'deep' ),
					'param_name'		=> 'vertical_movement',
					'type'				=> 'textfield',
					'edit_field_class'	=> 'vc_col-sm-6 wn-margin-bottom20',
					'dependency'		=> array(
						'element'	=> 'enable_animation_pro',
						'value'		=> 'true',
					),
				),
				array(
					'group'				=> esc_html__( 'Animation Pro', 'deep' ),
					'heading'			=> esc_html__( 'Horizontal Movement', 'deep' ),
					'param_name'		=> 'horizontal_movement',
					'type'				=> 'textfield',
					'edit_field_class'	=> 'vc_col-sm-6 wn-margin-bottom20',
					'dependency'		=> array(
						'element'	=> 'enable_animation_pro',
						'value'		=> 'true',
					),
				),
				array(
					'group'				=> esc_html__( 'Animation Pro', 'deep' ),
					'heading'			=> esc_html__( 'Rotation at End', 'deep' ),
					'param_name'		=> 'rotation',
					'type'				=> 'textfield',
					'edit_field_class'	=> 'vc_col-sm-6 wn-margin-bottom20',
					'dependency'		=> array(
						'element'	=> 'enable_animation_pro',
						'value'		=> 'true',
					),
				),
				array(
					'group'				=> esc_html__( 'Animation Pro', 'deep' ),
					'heading'			=> esc_html__( 'Opacity at End', 'deep' ),
					'param_name'		=> 'opacity',
					'type'				=> 'textfield',
					'edit_field_class'	=> 'vc_col-sm-6 wn-margin-bottom20',
					'dependency'		=> array(
						'element'	=> 'enable_animation_pro',
						'value'		=> 'true',
					),
				),
			);
			vc_add_params( 'vc_single_image', $attributes );
		}

	endif; // end function exists

endif; // end class exists