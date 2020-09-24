<?php
$menus  = wp_get_nav_menus();
$menu_name = $menu_id = array();
$menu_name[] = 'Select Menu';
$menu_id[] = 'none';
if ( ! empty( $menus ) ) :
    foreach ( $menus as $item ) :
        $menu_name[] = esc_html( $item->name );
        $menu_id[] = esc_html( $item->term_id );
    endforeach;
endif;
$menu_items = array_combine($menu_id, $menu_name);

if (function_exists('kc_add_map')) { 
    kc_add_map(
        array(
            'custom-menu' => array(
                'name'          => esc_html__( 'Custom Menu', 'deep' ),
                'description'   => esc_html__( 'Webnus Custom Menu', 'deep' ),
                'icon'          => 'webnus-custom-menu',
                'category'      => esc_html__( 'Webnus Shortcodes', 'deep' ),
                'params'        => array(
                    'general' => array(
                        array(
                            'name'          => 'menu',
                            'label'         => esc_html__( 'Menu', 'deep' ),
                            'type'          => 'select',
                            'options'       => $menu_items,
                            'description'   => esc_html__( 'Please select a menu', 'deep'),
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