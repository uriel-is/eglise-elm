<?php

$attributes = array(
			"type"=>'colorpicker',
			"heading"=>esc_html__('Icon color', 'deep'),
			"param_name"=> "icon_color",
			"value"=>"",
			"description" => esc_html__( "Select icon color", 'deep')
);
vc_add_param('vc_tab', $attributes);

$attributes = array(
			"type" => "iconfonts",
			"heading" => esc_html__( "Icon", 'deep' ),
			"param_name" => "icon_name",
			'value'=>'',
			"description" => esc_html__( "Select Icon", 'deep')
);
vc_add_param('vc_tab', $attributes);

$attributes =   array(
                "type" => "dropdown",
                "heading" => esc_html__( "Type", 'deep' ),
                "param_name" => "tabs_type",
                "value" => array(
				"Type 1"=>'',
				"Type 2"=>'2',
				),
                "description" => esc_html__( "Select Tabs Type", 'deep')
);
vc_add_param('vc_tabs', $attributes);

$attributes =   array(
                "type" => "dropdown",
                "heading" => esc_html__( "Type", 'deep' ),
                "param_name" => "tabs_type",
                "value" => array(
				"Type 1"=>'',
				"Type 2"=>'2',
				),
                "description" => esc_html__( "Select Tabs Type", 'deep')
);
vc_add_param('vc_tour', $attributes);
?>