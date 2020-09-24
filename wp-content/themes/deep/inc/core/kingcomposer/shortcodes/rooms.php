<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'rooms' => array(
                'name'          => esc_html__( 'Rooms', 'deep' ),
                'description'   => esc_html__( 'Hotel Rooms', 'deep' ),
                'icon'          => 'webnus-rooms',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'grid'    => __('Grid', 'deep'),
                                'list'    => __('List', 'deep'),                                
                                ),
                            'value'         => 'grid',
                            'description'   => esc_html__( 'Select Type', 'deep'),
                        ),
                        array(
                            'name'          => 'room_count',
                            'label'         => esc_html__( 'Count of Rooms', 'deep' ),
                            'type'          => 'text',
                        ),
                        array(
                            'name'          => 'number_row',
                            'label'         => esc_html__( 'Number to show items', 'deep' ),                           
                            'type'          => 'select',
                            'options'       => array(
                                'two'			=> 'Two',
                                'three'			=> 'Three',				
                                'for'			=> 'For',				
                                'six'			=> 'Six',	
                                ),
                            'value'          => 'three', 
                            'relation'       => array(
                                'parent'     => 'type',
                                'show_when'  => 'grid',
                            ),                                     
                        ),                                               
                        array(
                            'name'          => 'pagination',
                            'label'         => esc_html__( 'Enable Pagination', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'      => 'Yes',
                            ),                            
                        ),                                                        
                    ),
                )
            ),
        )
    ); // End add map
 } // End if

