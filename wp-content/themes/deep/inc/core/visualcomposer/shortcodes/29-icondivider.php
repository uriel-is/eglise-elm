<?php
vc_map( array(
        "name" =>"Icon Divider",
        "base" => "icon-divider",
		"description" => "Vector font icon",
        
		"icon" => "webnus-icondivider",
        "category" => esc_html__( 'Webnus Shortcodes', 'deep' ),
        "params" => array(
           
             array(
				"type"=>'colorpicker',
				"heading"=>esc_html__('Icon color', 'deep'),
				"param_name"=> "color",
				"value"=>"",
				"description" => esc_html__( "Select icon color", 'deep')
				
			),
		
             array(
                "type" => "iconfonts",
                "heading" => esc_html__( "Icon", 'deep' ),
                "param_name" => "name",
                'value'=>'',
                "description" => esc_html__( "Select Icon", 'deep')
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
		
        
    ) );


?>