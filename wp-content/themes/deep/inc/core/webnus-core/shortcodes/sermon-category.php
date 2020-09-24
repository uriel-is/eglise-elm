<?php
function deep_sermon_category( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'category'          => '',
		'image'             => '',
        'thumbnail'         => '',
		'shortcodeclass'    => '',
		'shortcodeid' 	    => '',
	), $atts));

    $shortcodeclass 	= $shortcodeclass ? $shortcodeclass : '';
    $shortcodeid		= $shortcodeid ? ' id=' . $shortcodeid . '' : '';
    $category = get_term_by( 'slug', $category, 'sermon_category' );
    $image_url = ($image) ? wp_get_attachment_url($image) : '';
	if( !empty( $thumbnail ) ) {
		if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
			require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
		}
		$patt = array ( '0'  => 'x', '1'  => '*' );
		$arr = explode( chr( 1 ), str_replace( $patt, chr( 1 ), $thumbnail ) );
		$img = new Wn_Img_Maniuplate;
		$image_url = $img->m_image( $image, $image_url , $arr['0'] , $arr['1'] );
	}
    $cat_link = isset( $category ) ? get_category_link( $category ) : '';
    $out = '
        <div class="sermon-category-parent ' . esc_attr( $shortcodeclass ) . '"  ' . esc_attr( $shortcodeid ) . '>
            <a href="' . esc_url( $cat_link )  . '" title="' . esc_attr( sprintf( __( '%s category', 'deep' ), $category->name ) ) . '">
                <img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $category->name ) . '">
                <div class="sermon-overlay colorb"></div>
                <div class="sermon-category-box">
                    <div class="sermon-category-name">
                        '.esc_html( $category->name ).'
                    </div>
                    <div class="sermon-category-count">
                        '. esc_html( 'sermons' , 'deep' ) . ' ' . '(' . esc_html( $category->count ) . ')' .'
                    </div>
                </div>
            </a>
        </div>
    ';

    return $out;
}
add_shortcode( 'sermon-category', 'deep_sermon_category' );
