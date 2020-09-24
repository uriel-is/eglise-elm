<?php
$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
$contact_forms = array();
if ( $cf7 ) {
	foreach ( $cf7 as $cform ) {
		$contact_forms[ $cform->post_title ] = $cform->ID;
	}
} else {
	$contact_forms[ esc_html__( 'No contact forms found', 'deep' ) ] = 0;
}

vc_map( array(
        "name" =>"Donate Button",
        "base" => "donate",
        "description" => "Donate Button",
        "category" => esc_html__( 'Webnus Shortcodes', 'deep' ),
        "icon" => "webnus-donate",
        "params" => array(
			array(
				"type" => "textarea",
				"heading" => esc_html__( "Content", 'deep' ),
				"param_name" => "donate_content",
				"value"=>'',
				"description" => esc_html__( "Button Text Content", 'deep'),
			),								
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Select contact form', 'deep' ),
				'param_name' => 'id',
				'value' => $contact_forms,
				'description' => esc_html__( 'Choose previously created contact form from the drop down list.', 'deep' )
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Color", 'deep' ),
				"param_name" => "color",
				"value" => array(
					"Default"	=> "default",
					"Red"		=> "red",
					"Blue"		=> "blue",
					"Gray"		=> "gray",
					"Dark gray"	=> "dark-gray",
					"Cherry"	=> "cherry",
					"Orchid"	=> "orchid",
					"Pink"		=> "pink",
					"Orange"	=> "orange",
					"Teal"		=> "teal",
					"SkyBlue"	=> "skyblue",
					"Jade"		=> "jade",
					"White"		=> "white",
					"Black"		=> "black",
				),
			"description" => esc_html__( "Button Color", 'deep')
			),					
			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Size", 'deep' ),
				"param_name" => "size",
				"value" => array(
					"Small"=>"small",
					"Medium"=>"medium",
					"Large"=>"large",
					
				),
				"description" => esc_html__( "Button Size", 'deep')
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Bordered?", 'deep' ),
				"param_name" => "border",
				"value"=>array('Normal'=>'false','Bordered'=>'true'),
				"description" => esc_html__( "Is button bordered?", 'deep')
			),
			
			array(
				"type" => "iconfonts",
				"heading" => esc_html__( "Icon", 'deep' ),
				"param_name" => "icon",
				"value"=>'',
				"description" => esc_html__( "Select Button Icon", 'deep')
			),
			// Class & ID 
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