<?php
vc_map( array(
        "name" =>"Webnus Certificate",
        "base" => "certificate",
        "description" => "Webnus Certificate",
		"icon" => "webnus-certificate",
        "category" => esc_html__( 'Webnus Shortcodes', 'deep' ),
        "params" => array(
						array(
							"type" => "dropdown",
							"heading" => esc_html__( "Type", 'deep' ),
							"param_name" => "type",
							"value" => array(
								"Online 1"=>"online1",
								"Online 2"=>"online2",
								"Kindergarten"=>"kids",
							),
							"description" => esc_html__( "You can choose from these pre-designed types.", 'deep')
						),
						
						array(
						"type" => 'textfield',
						"heading" => esc_html__( 'Kindergarten Name', 'deep' ),
						"param_name" => 'kindergarten_name',
						"value" => '',
						"description" => esc_html__( 'Enter Kindergarten Name.', 'deep'),
						"dependency" => array('element'=>'type','value'=>array('kids'))
						),
					
						array(
						"type" => 'textfield',
						"heading" => esc_html__( 'Certificate Title', 'deep' ),
						"param_name" => 'cer_title',
						"value" => '',
						"description" => esc_html__( 'Enter Certificate Title', 'deep')
						),
						
						array(
						"type" => 'textfield',
						"heading" => esc_html__( 'Presented Sentence Part 1', 'deep' ),
						"param_name" => 'desc_1',
						"value" => '',
						"description" => esc_html__( 'Enter Presented Sentence Part 1', 'deep'),
						"dependency" => array('element'=>'type','value'=>array('online1'))
						),
						
						array(
						"type" => 'textfield',
						"heading" => esc_html__( 'Student Name', 'deep' ),
						"param_name" => 'student_name',
						"value" => '',
						"description" => esc_html__( 'Enter Student Name. If you leave this field blank, it will print {first_name} {last_name} value which usable in lifterlms certificate.', 'deep'),
						"std" => ''
						),
						
						array(
						"type" => 'textfield',
						"heading" => esc_html__( 'Presented Sentence Part 2', 'deep' ),
						"param_name" => 'desc_2',
						"value" => '',
						"description" => esc_html__( 'Enter Presented Sentence Part 2', 'deep'),
						"dependency" => array('element'=>'type','value'=>array('online1'))
						),
						
						array(
						"type" => 'textfield',
						"heading" => esc_html__( 'Academic Director Name', 'deep' ),
						"param_name" => 'ac_director',
						"value" => '',
						"description" => esc_html__( 'Enter Academic Director Name.', 'deep')
						),
						
						array(
						"type" => 'textfield',
						"heading" => esc_html__( 'Academic Director Title', 'deep' ),
						"param_name" => 'ac_director_title',
						"value" => '',
						"description" => esc_html__( 'Enter Academic Director Title.', 'deep'),
						"dependency" => array('element'=>'type','value'=>array('online2'))
						),
						
						array(
						"type" => "attach_image",
						"heading" => esc_html__( "Academic Director Sign", 'deep' ),
						"param_name" => "ac_director_sign",
						"value" =>'',
						"description" => esc_html__( "Upload Academic Director Sign.", 'deep'),
						"dependency" => array('element'=>'type','value'=>array('kids','online1'))
						),
						
						array(
						"type" => 'textfield',
						"heading" => esc_html__( 'Course Director Name', 'deep' ),
						"param_name" => 'c_director',
						"value" => '',
						"description" => esc_html__( 'Enter Course Director Name.', 'deep'),
						"dependency" => array('element'=>'type','value'=>array('kids','online2'))
						),
						
						array(
						"type" => 'textfield',
						"heading" => esc_html__( 'Course Director Title', 'deep' ),
						"param_name" => 'c_director_title',
						"value" => '',
						"description" => esc_html__( 'Enter Course Director Title.', 'deep'),
						"dependency" => array('element'=>'type','value'=>array('online2'))
						),
						
						array(
						"type" => "attach_image",
						"heading" => esc_html__( "Course Director Sign", 'deep' ),
						"param_name" => "c_director_sign",
						"value" =>'',
						"description" => esc_html__( "Upload Course Director Sign.", 'deep'),
						"dependency" => array('element'=>'type','value'=>array('kids'))
						),
						
						
						array(
						"type" => 'textarea',
						"heading" => esc_html__( 'Certificate Description', 'deep' ),
						"param_name" => 'cer_desc',
						"value" => '',
						"description" => esc_html__( 'Enter Description for your certificate.', 'deep')
						),
			
						array(
						"type" => 'textfield',
						"heading" => esc_html__( 'Current Date', 'deep' ),
						"param_name" => 'current_date',
						"value" => '',
						"description" => esc_html__( 'Enter Current Date.If you leave this field blank, it will print {current_date} value which usable in lifterlms certificate.', 'deep'),
						"dependency" => array('element'=>'type','value'=>array('online2','online1'))
						),

						array(
						"type" => "attach_image",
						"heading" => esc_html__( "Upload background", 'deep' ),
						"param_name" => "upload_bg",
						"value" =>'',
						"description" => esc_html__( "Upload Background", 'deep')
						),						
					),      
		) );