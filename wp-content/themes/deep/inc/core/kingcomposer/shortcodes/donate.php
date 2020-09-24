<?php
$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
$contact_forms_id = array();
$contact_forms_name = array();
if ( $cf7 ) {
    foreach ( $cf7 as $cform ) {
        $contact_forms_id[ $cform->post_title ] = $cform->ID;
        $contact_forms_name[ $cform->post_title ] = $cform->post_title;
    }
} else {
    $contact_forms_id[ esc_html__( 'No contact forms found', 'deep' ) ] = 0;
    $contact_forms_name[ esc_html__( 'No contact forms found', 'deep' ) ] = esc_html__( 'No contact forms found', 'deep' );
}
$contact_forms_array  = array_combine($contact_forms_id, $contact_forms_name);

if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'donate' => array(
                'name'          => esc_html__( 'Donate Button', 'deep' ),
                'description'   => esc_html__( 'Donate Button', 'deep' ),
                'icon'          => 'webnus-donate',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'donate_content',
                            'label'         => esc_html__( 'Content', 'deep' ),
                            'type'          => 'textarea',
                            'description'   => esc_html__( 'Button Text Content', 'deep'),
                        ),
                        array(
                            'name'          => 'id',
                            'label'         => esc_html__( 'Select contact form', 'deep' ),
                            'type'          => 'select',
                            'options'       => $contact_forms_array,
                            'description'   => esc_html__( 'Choose previously created contact form from the drop down list.', 'deep' ),
                        ),
                        array(
                            'name'          => 'color',
                            'label'         => esc_html__( 'Color', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'default'    => 'Default',
                                'red'        => 'Red',
                                'blue'       => 'Blue',
                                'gray'       => 'Gray',
                                'dark-gray'  => 'Dark gray',
                                'cherry'     => 'Cherry',
                                'orchid'     => 'Orchid',
                                'pink'       => 'Pink',
                                'orange'     => 'Orange',
                                'teal'       => 'Teal',
                                'skyblue'    => 'SkyBlue',
                                'jade'       => 'Jade',
                                'white'      => 'White',
                                'black'      => 'Black',
                            ),
                            'description'   => esc_html__( 'Button Color', 'deep'),
                        ),
                        array(
                            'name'          => 'size',
                            'label'         => esc_html__( 'Size', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'small'   => 'Small',
                                'Medium'  => 'Medium',
                                'large'   => 'Large',
                            ),
                            'description'   => esc_html__( 'Button Size', 'deep'),
                        ),
                        array(
                            'name'          => 'border',
                            'label'         => esc_html__( 'Bordered?', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'false'   => 'Normal',
                                'true'    => 'Bordered',
                            ),
                            'description'   => esc_html__( 'Is button bordered?', 'deep'),
                        ),
                        array(
                            'name'          => 'icon',
                            'label'         => esc_html__('Icon', 'deep'),
                            'type'          => 'icon_picker',
                            'description'   => esc_html__( 'Select Button Icon', 'deep'),
                            'value'         => 'none',
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
    ); // End add map
 } // End if