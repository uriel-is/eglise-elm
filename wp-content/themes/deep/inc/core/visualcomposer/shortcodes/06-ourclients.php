<?php
$item_array = array();
global $wpdb;
if(empty($wpdb)) die('WPDB not found...!');
 $query = $wpdb->get_results($wpdb->prepare(
 "SELECT ID, post_title
 FROM $wpdb->posts
 WHERE post_type = '%s' AND post_status='publish'
 ",'client'
 ));

if(!empty($query)) {
  $item_array['All'] = 0;
  foreach ( $query as $q ) {
    $item_array[$q->post_title] = $q->ID;
  }
}else {
  $item_array['No Client Found'] = -1;
}


vc_map( array(
    'name' =>'Our Clients',
    'base' => 'ourclients',
    "description" => "Our Clients",
    'category' => esc_html__( 'Webnus Shortcodes', 'deep' ),
    "icon" => "webnus-ourclients",
    'params'=>array(
        array(
            "type"        => "dropdown",
            "heading"     => esc_html__( "Type", 'deep' ),
            "param_name"  => "type",
            "value"       => array(
                "Grid"              => "1",
                "Carousel"          => "2",
                //"Zoom"            => "3",
                "Simple"            => "4",
                "Simple Carousel"   => "5", 
                "Carousel 2"        => "6",
            ),
            "description" => esc_html__( "OurClients Type", 'deep'),
        ),
        array(
            'type'        => 'attach_images',
            'heading'     => esc_html__( 'Clients Image', 'deep' ),
            'param_name'  => 'client_images',
            'value'       => '',
            'description' => esc_html__( 'OurClients Images', 'deep'),
        ),
        array(
            'type'       => 'textfield',
            'heading'    => esc_html__( 'Image Width', 'deep' ),
            'param_name' => 'image_width',
            'value'      => '100',            
        ),
        array(
            'type'       => 'textfield',
            'heading'    => esc_html__( 'Image Height', 'deep' ),
            'param_name' => 'image_height',
            'value'      => '100',            
        ),
        array(
          'type'          => 'checkbox',
          'heading'       => esc_html__( 'Greyscale Images' , 'deep' ),
          'description'   => esc_html__( 'Set filter on images.' , 'deep'),
          'param_name'    => 'image_filter',
          'value'         => array( esc_html__( 'Enable' , 'deep') => 'enable'),
          'dependency'    => array(
              'element' => 'type',
              'value'   => array('1' , '2' , '4' , '5'),
          ),
        ),
        array(
          'type'          => 'checkbox',
          'heading'       => esc_html__( 'Show the previous and next text' , 'deep' ),          
          'param_name'    => 'show_text',
          'value'         => array( esc_html__( 'Show' , 'deep') => 'enable'),
          'dependency'    => array(
              'element' => 'type',
              'value'   => array('6'),
          ),
        ),
        array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Previous text', 'deep' ),
					'param_name'  => 'pre_txt',
					'value'       => esc_html__( 'Pre', 'deep' ),
          'admin_label' => true,
          'dependency'    => array(
              'element' => 'type',
              'value'   => array('6'),
          ),
				),			
        array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Next text', 'deep' ),
					'param_name'  => 'next_txt',
					'value'       => esc_html__( 'Next', 'deep' ),
          'admin_label' => true,
          'dependency'    => array(
              'element' => 'type',
              'value'   => array('6'),
          ),
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
    ) ) );