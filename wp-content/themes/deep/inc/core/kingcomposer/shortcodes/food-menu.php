<?php
if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'food_menu' => array(
                'name'          => esc_html__( 'Food Menu', 'deep' ),
                'description'   => esc_html__( 'Create Your Food Menu', 'deep' ),
                'icon'          => 'webnus-food-menu',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'type',
                            'label'         => esc_html__( 'Type', 'deep' ),
                            'type'          => 'select',
                            'options'       => array(
                                '1'  => esc_html__( 'Type 1', 'deep' ),
                                '2'  => esc_html__( 'Type 2', 'deep' ),
                                '3'  => esc_html__( 'Type 3', 'deep' ),
                                '4'  => esc_html__( 'Type 4', 'deep' ),
                                '5'  => esc_html__( 'Type 5', 'deep' ),
                            ),
                            'description'   => esc_html__( 'You can choose from these pre-designed types.', 'deep'),
                        ),
                        array(
                            'name'          => 'img',
                            'label'         => esc_html__( 'Food Menu Image', 'deep' ),
                            'type'          => 'attach_image',
                            'relation'      => array(
                                'parent'     => 'type',
                                'hide_when'  => '2',
                            ),
                        ),
                        array(
                            'name'          => 'title',
                            'label'         => esc_html__( 'Title', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Food Menu Title', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'hide_when'  => '2',
                            ),
                        ),
                        array(
                            'name'          => 'price',
                            'label'         => esc_html__( 'Price', 'deep' ),
                            'type'          => 'text',
                            'value'         => '$10',
                            'description'   => esc_html__( 'Food Menu Price', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'hide_when'  => '2',
                            ),
                        ),
                        array(
                            'name'          => 'description',
                            'label'         => esc_html__( 'Description', 'deep' ),
                            'type'          => 'text',
                            'description'   => esc_html__( 'Food Menu Description', 'deep'),
                            'relation'      => array(
                                'parent'     => 'type',
                                'hide_when'  => array( '1' , '2' ),
                            ),
                        ),
                        array(
                            'type'          => 'group',
                            'label'         => esc_html__( 'Ingredients', 'deep' ),
                            'name'          => 'ingredients',
                            'description'   => esc_html__( 'Enter Ingredients.', 'deep' ),
                            'options'       => array( 
                                'add_text' => esc_html__('Add new', 'deep')
                            ),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => '1',
                            ),
                            'params' => array(
                                array(
                                    'name'          => 'ingredient',
                                    'label'         => esc_html__( 'Ingredient', 'deep' ),
                                    'type'          => 'text',
                                ),
                            ),
                        ),
                        array(
                            'type'          => 'group',
                            'label'         => esc_html__( 'Food Items', 'deep' ),
                            'name'          => 'food_menu2',
                            'description'   => esc_html__( 'Enter Title, Price and Description.', 'deep' ),
                            'options'       => array( 
                                'add_text' => esc_html__('Add new', 'deep')
                            ),
                            'relation'      => array(
                                'parent'     => 'type',
                                'show_when'  => '2',
                            ),
                            'params' => array(
                                array(
                                    'name'          => 'title',
                                    'label'         => esc_html__( 'Title', 'deep' ),
                                    'type'          => 'text',
                                    'description'   => esc_html__( 'Food Menu Title', 'deep'),
                                ),
                                array(
                                    'name'          => 'price',
                                    'label'         => esc_html__( 'Price', 'deep' ),
                                    'type'          => 'text',
                                    'value'         => '$10',
                                    'description'   => esc_html__( 'Food Menu Price', 'deep'),
                                ),
                                array(
                                    'name'          => 'tp_color',
                                    'label'         => esc_html__('Price and Title Background color ', 'deep'),
                                    'type'          => 'color_picker',
                                    'description'   => esc_html__( 'You should choose a background color mode in any case', 'deep')
                                ),
                                array(
                                    'name'          => 'description',
                                    'label'         => esc_html__( 'Description', 'deep' ),
                                    'type'          => 'text',
                                    'value'         => 'Soup / Lemon / Garlic',
                                    'description'   => esc_html__( 'Food Menu Description', 'deep'),
                                ),
                                array(
                                    'name'          => 'food_style',
                                    'label'         => esc_html__( 'Food Item Style', 'deep' ),
                                    'type'          => 'select',
                                    'options'       => array(
                                        'default'       => esc_html__( 'Default Food Item', 'deep' ),
                                        'featured-w2'   => esc_html__( 'Featured Food Item', 'deep' ),
                                    ),
                                ),
                                array(
                                    'name'          => 'featured_text',
                                    'label'         => esc_html__( 'Featured Text', 'deep' ),
                                    'type'          => 'text',
                                    'value'         => 'Recommended',
                                    'relation'      => array(
                                        'parent'     => 'food_menu2-food_style',
                                        'show_when'  => 'featured-w2',
                                    ),
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