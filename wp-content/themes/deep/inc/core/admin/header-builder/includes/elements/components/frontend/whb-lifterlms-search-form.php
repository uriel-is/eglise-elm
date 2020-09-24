<?php
function whb_lifterlms_search( $atts, $uniqid, $once_run_flag ) {
	extract( WHB_Helper::component_atts( array(
		'text'         => 'Search For The Courses, Software or Skills You Want to Learn...',
		'extra_class'	=> '',
	), $atts ));
	
	if ( is_plugin_active( 'lifterlms/lifterlms.php' ) ) {
		// styles
		if ( $once_run_flag ) :
			
			$dynamic_style = '';
			$dynamic_style .= whb_styling_tab_output( $atts, 'Button', '#wrap #webnus-header-builder [data-id=whb-lifterlms-search-' . esc_attr( $uniqid ) . '] .whb-lifterlms-search-btn input#searchsubmit', '#wrap #webnus-header-builder [data-id=whb-lifterlms-search-' . esc_attr( $uniqid ) . ']:hover .whb-lifterlms-search-btn input#searchsubmit');       
			$dynamic_style .= whb_styling_tab_output( $atts, 'Input', '#wrap #webnus-header-builder [data-id=whb-lifterlms-search-' . esc_attr( $uniqid ) . '] .whb-lifterlms-search-input input');       
			$dynamic_style .= whb_styling_tab_output( $atts, 'Box', '#wrap #webnus-header-builder [data-id=whb-lifterlms-search-' . esc_attr( $uniqid ) . '].whb-lifterlms-search-wrap');       				
			
			if ( $dynamic_style ) :
				WHB_Helper::set_dynamic_styles( $dynamic_style );
			endif;
		endif;

		// extra class
		$extra_class = $extra_class ? ' ' . $extra_class : '';
		$url = get_home_url();
		$text = $text ? $text : '';
		
		
		$out = '
			<div class="whb-element whb-element-wrap whb-lifterlms-search-wrap' . esc_attr( $extra_class ) . '" data-id="whb-lifterlms-search-' . esc_attr( $uniqid ) . '">
			<form role="search" action="'. $url .'" method="get" _lpchecked="1">
				<div class="whb-lifterlms-search-input">
					<input name="s" type="text" placeholder="'. esc_html( $text ) .'">
				</div>
				<input type="hidden" name="post_type" value="course">
				<div class="whb-lifterlms-search-btn">
					<input type="submit" id="searchsubmit" value="Search">
				</div>
			</form>
			</div>';
		
		return $out;
	}
}

WHB_Helper::add_element( 'lifterlms-search-form', 'whb_lifterlms_search' );
