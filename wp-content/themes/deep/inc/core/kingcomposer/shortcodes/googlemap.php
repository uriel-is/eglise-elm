<?php
$kses = array(
    'a' => array(
        'href' => array(),
        'title' => array(),
        'target' => array(),
    ),
    'br' => array(),
    'em' => array(),
    'strong' => array(),
);
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'gmap' => array(
                'name'          => esc_html__( 'GoogleMaps', 'deep' ),
                'description'   => esc_html__( 'Google Maps', 'deep' ),
                'icon'          => 'webnus-google-map',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'Map Center' => array(
                        array(
                            'name'          => 'lat_center',
                            'label'         => esc_html__('Map center Latitude', 'deep'),
                            'type'          => 'text',
                            'value'         => '39.596165',
                            'description'   => esc_html__('please enter map center Latitude', 'deep'),
                        ),
                        array(
                            'name'          => 'lon_center',
                            'label'         => esc_html__('Map center Longitude', 'deep'),
                            'type'          => 'text',
                            'value'         => '-102.810059',
                            'description'   => esc_html__('please enter map center Longitude', 'deep'),
                        ),
                    ),
                    'Options' => array(
                        array(
                            'name'          => 'zoom_map',
                            'label'         => esc_html__('Zoom', 'deep'),
                            'type'          => 'text',
                            'value'         => '9',
                            'description'   => esc_html__('Default map zoom level. (1-19)', 'deep'),
                        ),
                        array(
                            'name'          => 'zoom_click',
                            'label'         => esc_html__('Zoom After click on marker', 'deep'),
                            'type'          => 'text',
                            'value'         => '17',
                            'description'   => esc_html__('Default map zoom level after click on marker. (1-19)', 'deep'),
                        ),
                        array(
                            'name'          => 'map_type_display',
                            'label'         => esc_html__( 'Display Map Types', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes',
                            ),
                            'value'         => 'true',
                            'description'   => wp_kses( __('You can see Map Types <a href="https://developers.google.com/maps/documentation/javascript/maptypes" target="_blank">Here</a><br>', 'deep'), $kses ),
                        ),
                        array(
                            'name'          => 'map_type',
                            'label'         => esc_html__( 'Select Map Types', 'deep' ),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'roadmap'     => esc_html__( 'Roadmap', 'deep' ),
                                'terrain'     => esc_html__( 'Terrain (load with Roadmap type)', 'deep' ),
                                'satellite'   => esc_html__( 'Satellite', 'deep' ),
                                'hybrid'      => esc_html__( 'Hybrid (load with Satellite type)', 'deep' ),
                            ),
                            'value'         => 'roadmap',
                            'description'   => esc_html__('Select your map types', 'deep'),
                            'relation'      => array(
                                'parent'     => 'map_type_display',
                                'hide_when'  => 'true',
                            ),
                        ),
                        array(
                            'name'          => 'draggable',
                            'label'         => esc_html__('Enable Draggable feature', 'deep'),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes',
                            ),
                            'value'         => 'true',
                            'description'   => wp_kses( __('Enable Draggable feature. see <a href="https://developers.google.com/maps/documentation/javascript/markers#draggable" target="_blank">Here</a> for more information.<br/><br/>', 'deep'), $kses ),
                        ),
                        array(
                            'name'          => 'animation',
                            'label'         => esc_html__('Enable Drop Animation', 'deep'),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes',
                            ),
                            'value'         => 'true',
                            'description'   => wp_kses( __('Drop Animation for markers. see <a href="https://developers.google.com/maps/documentation/javascript/examples/marker-animations" target="_blank">Here</a> for more information.<br/><br/>', 'deep'), $kses ),
                        ),
                        array(
                            'name'          => 'zoom_control_display',
                            'label'         => esc_html__('Enable Zoom Control', 'deep'),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes',
                            ),
                            'value'         => 'true',
                            'description'   => wp_kses( __('The Zoom control displays "+" and "-" buttons for changing the zoom level of the map.<br/><br/>', 'deep'), $kses ),
                        ),
                        array(
                            'name'          => 'scrollwheel',
                            'label'         => esc_html__('Enable Scrollwheel', 'deep'),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes',
                            ),
                            'value'         => 'true',
                            'description'   => wp_kses( __('This feature stops zoom in/out on your map when your page scrolls up and down from Google Maps section, so only the page will scroll.<br/><br/>', 'deep'), $kses ),
                        ),
                        array(
                            'name'          => 'street_view',
                            'label'         => esc_html__('Enable Street View Control', 'deep'),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes',
                            ),
                            'value'         => 'true',
                            'description'   => wp_kses( __('You can see Documentation <a href="https://developers.google.com/maps/documentation/ios-sdk/streetview" target="_blank">Here</a><br/><br/>', 'deep'), $kses ),
                        ),
                        array(
                            'name'          => 'scale_control',
                            'label'         => esc_html__('Enable Scale Control', 'deep'),
                            'type'          => 'checkbox',
                            'options'       => array(
                                'true'   => 'Yes',
                            ),
                            'value'         => 'true',
                            'description'   => wp_kses( __('You can see Documentation <a href="https://developers.google.com/maps/documentation/javascript/controls#DefaultUI" target="_blank">Here</a><br/><br/>', 'deep'), $kses ),
                        ),
                    ),
                    'Style' => array(
                        array(
                            'name'          => 'width',
                            'label'         => esc_html__('Width', 'deep'),
                            'type'          => 'text',
                            'value'         => '0',
                            'description'   => esc_html__('Set to 0 is the full width. (0-960)', 'deep'),
                        ),
                        array(
                            'name'          => 'height',
                            'label'         => esc_html__('Height', 'deep'),
                            'type'          => 'text',
                            'value'         => '400',
                            'description'   => esc_html__('Default is 400.', 'deep'),
                        ),
                        array(
                            'name'          => 'map_style',
                            'label'         => esc_html__( 'Select Map Style', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'simple' => 'Simple',        
                                'light'  => 'Ultra Light',        
                                'gray'   => 'Subtle Grayscale',        
                                'black'  => 'Shade of Grey',        
                                'blue'   => 'Blue water',        
                            ),
                           'description'   => esc_html__( 'if you select "Simple", you see simple map and you can select "hue" color.', 'deep'),
                        ),
                        array(
                            'name'          => 'bg_color',
                            'label'         => esc_html__('Background Color', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select map background color.', 'deep'),
                        ),
                        array(
                            'name'          => 'hue',
                            'label'         => esc_html__('Hue', 'deep'),
                            'type'          => 'color_picker',
                            'description'   => wp_kses( __('You can see Hue example <a href="https://developers.google.com/maps/documentation/javascript/styling" target="_blank">Here</a><br/><br/>', 'deep'), $kses ),
                            'relation'      => array(
                                'parent'     => 'map_style',
                                'show_when'  => 'simple',
                            ),
                        ),
                    ),
                    'Custom marker' => array(
                        array(
                            'name'          => 'marker_type',
                            'label'         => esc_html__( 'Select Marker Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'img'    => 'Google Default / Image',        
                                'radar'  => 'Radar',                
                            ),
                           'description'   => esc_html__( 'if you select "Google Default / Image", you can upload image for your marker or leave it to have deafult Google Mapss icon.', 'deep'),
                        ),
                        array(
                            'name'          => 'marker_color',
                            'label'         => esc_html__( 'Marker color', 'deep' ),
                            'type'          => 'color_picker',
                            'description'   => esc_html__( 'Select Marker color.', 'deep'),
                            'relation'      => array(
                                'parent'     => 'marker_type',
                                'show_when'  => 'radar',
                            ),
                        ),
                        array(
                            'name'          => 'custom_marker',
                            'label'         => esc_html__( 'Custom Marker', 'deep' ),
                            'type'          => 'attach_image',
                            'description'   => esc_html__( 'You can select an image for your marker. if you want seperate marker for eack point, you should set it in Addresses tab.', 'deep'),
                            'relation'      => array(
                                'parent'     => 'marker_type',
                                'show_when'  => 'img',
                            ),
                        ),
                        array(
                            'name'          => 'marker_animation',
                            'label'         => esc_html__( 'Marker Animation', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                'none'    => 'None',  
                                'Drop'    => 'Drop',               
                                'BOUNCE'  => 'BOUNCE',               
                            ),
                           'description'   => esc_html__( 'You can select Drop or Bounce animation.', 'deep'),
                           'relation'      => array(
                                'parent'     => 'marker_type',
                                'show_when'  => 'img',
                            ),
                        ),
                    ),
                    'Addresses' => array(
                        array(
                            'type'          => 'group',
                            'label'         => esc_html__( 'Google Maps', 'deep' ),
                            'name'          => 'map_points',
                            'description'   => esc_html__( 'Please Add Your address', 'deep' ),
                            'options'       => array(
                                'add_text' => __('Add address', 'deep')
                            ),
                            'params' => array(
                                array(
                                    'name'          => 'latitude',
                                    'label'         => esc_html__( 'Latitude', 'deep' ),
                                    'type'          => 'text',
                                    'description'   => esc_html__( 'Please enter your Latitude', 'deep' ),
                                ),
                                array(
                                    'name'          => 'longitude',
                                    'label'         => esc_html__( 'Longitude', 'deep' ),
                                    'type'          => 'text',
                                    'description'   => esc_html__( 'Please enter your Longitude', 'deep' ),
                                ),
                                array(
                                    'name'          => 'address',
                                    'label'         => esc_html__( 'Address/Info', 'deep' ),
                                    'type'          => 'textarea',
                                    'description'   => esc_html__( 'Please enter your Address or information about this point. It Appears after click on Icon marker.', 'deep' ),
                                ),
                                array(
                                    'name'          => 'location_title',
                                    'label'         => esc_html__( 'Location Title', 'deep' ),
                                    'type'          => 'text',
                                ),
                                array(
                                    'name'          => 'location_website',
                                    'label'         => esc_html__( 'Location Website', 'deep' ),
                                    'type'          => 'text',
                                ),
                                array(
                                    'name'          => 'custom_marker_s',
                                    'label'         => esc_html__( 'Custom point Marker', 'deep' ),
                                    'type'          => 'attach_image',
                                    'description'   => esc_html__( 'You can select an image for your marker seperately', 'deep'),
                                ),
                            ),
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