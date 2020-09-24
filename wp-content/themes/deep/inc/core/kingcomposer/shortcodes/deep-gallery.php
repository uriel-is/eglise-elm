<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'deep_gallery' => array(
                'name'          => esc_html__( 'Deep Gallery', 'deep' ),             
                'icon'          => 'deep-gallery',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'General' => array(
                         array(
                            'name'          => 'images',
                            'label'         => esc_html__('Choose Images', 'deep'),
                            'type'          => 'attach_images',
                        ),
                        array(
                            'name'          => 'img_in_row',
                            'label'         => esc_html__('items in row', 'deep'),
                            'type'          => 'select',
                            'value'         => 'three',
                            'options' => array(  
	                        	'one'   => 'One',
	                        	'two'   => 'Two',
	                        	'three' => 'Three',
	                        	'for'   => 'For',
	                        	'five'  => 'Five',
	                        	'six'   => 'Six',
	                        	'seven' => 'Seven',
	                        	'eight' => 'Eight',
	                        	'nine'  => 'Nine',
	                        	'ten'   => 'Ten',
	                        )
                        ),
                        array(
                            'name'          => 'imgw',
                            'label'         => esc_html__('Image Width', 'deep'),
                            'type'          => 'text',
                            'value'         => '300',
                        ),
                        array(
                            'name'          => 'imgh',
                            'label'         => esc_html__('Image Height', 'deep'),
                            'type'          => 'text',
                            'value'         => '300',
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
    );
 } ?>