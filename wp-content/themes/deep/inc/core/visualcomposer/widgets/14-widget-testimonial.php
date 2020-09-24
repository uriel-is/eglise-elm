<?php
vc_map( array(
	'name'			=> esc_html__( 'Widget testimonial', 'deep' ),
	'base'			=> 'widget-testimonial',
	'category'		=> esc_html__( 'Webnus widgets', 'deep' ),
	'icon'			=> 'webnus-widgets',
	'params'		=> array(
		array(
			'type'			=> 'attach_images',
			'heading'		=> esc_html__( 'Image URL:', 'deep' ),
			'param_name'	=> 'img_testimonial',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Name:', 'deep' ),
			'param_name'	=> 'name_testimonial',
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Subtitle:', 'deep' ),
			'param_name'	=> 'subtitle_testimonial',
		),
		array(
			'type'			=> 'textarea',
			'heading'		=> esc_html__( 'Text:', 'deep' ),
			'param_name'	=> 'textarea_testimonial',
		),
	),
) );
