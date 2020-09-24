<?php 

add_action( 'admin_enqueue_scripts', 'deep_category_param_scripts' );
function deep_category_param_scripts() {
	// css
	wp_enqueue_style( 'css-deep-category-param', DEEP_CORE_URL . 'visualcomposer/params/category/assets/css/category-param.css' );
}

// category param
vc_add_shortcode_param( 'category_param', 'category_param_settings_field' );

function category_param_settings_field( $settings, $value ) {
	$settings['type']			= isset ( $settings['type'] ) ? $settings['type'] : '' ;
	$settings['param_name']		= isset ( $settings['param_name'] ) ? $settings['param_name'] : '' ;
	$settings['value']			= isset ( $settings['value'] ) ? $settings['value'] : '' ; ?>
		<div class="wpb_element_label"><?php esc_html_e( 'Select desired category', 'deep' ); ?></div>
		<div class="wn-categories-wrap">
			<input
			type="hidden"
			name="<?php echo esc_attr( $settings['param_name'] ); ?>"
			class="wpb_vc_param_value"
			value="<?php echo esc_attr( $value ); ?>"
			>
			<ul class="wn-categories-list">
				<?php
				class WN_Term_Select extends Walker_Category {

					public $primary_term_id;

					public function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
						$deep_cat_name = apply_filters( 'list_cats', esc_attr( $category->name ), $category );
						if ( $deep_cat_name ) {
							$output .= '
								<li class="cat-item cat-item-' . $category->term_id . '" data-id="' . $category->term_id . '">
									' . $this->deep_categories_lists( $category, $args['input_name'] ) . ' 
									<span class="cat-name"> ' . $deep_cat_name . ' </span>
								</li>';
						}
					}

					function deep_categories_lists( $term ) {
						ob_start();
						?>
						<div class="wpb_vc_param_value wn-checkbox" data-id="<?php echo $term->term_id; ?>">
							<span class="wn-checkbox-active">
								<i class="wn-fa wn-fa-check" aria-hidden="true"></i>
							</span>
						</div>
						<?php
						$out = ob_get_contents();
						ob_end_clean();
						return $out;
					}
				}

				wp_list_categories( array(
					'style'          => 'list',
					'title_li'       => FALSE,
					'taxonomy'       => 'category',
					'walker'         => new WN_Term_Select,
					'selected_terms' => isset( $options['value'] ) ? $options['value'] : '',
					'input_name'     => 'wn-term-select',
					'hide_empty'     => FALSE,
				) );
				?>
			</ul>
	</div>

	<script>
		jQuery(document).ready(function($) {
			(function(){

				// make array to save checked list
				var	checked_list		= {},
					$input_saved		= $('.wn-categories-wrap').find('.wpb_vc_param_value');
					get_saved_value		= $input_saved.val(),
					data_id 			= $('.cat-item').find('.wn-checkbox').data('id'),
					value				= get_saved_value.toString();

				// Remove '[' and ']'
				value = value.replace( '[', '' ).replace( ']', '' );

				// Change to string to array
				value_array = value.split(',');

				// check box process
				$('.cat-item').find('.wn-checkbox').on('click', function() {

					var $this				= $(this),
						checkbox_id			= $this.data('id'),
						$saved_value		= $this.closest('.wn-categories-wrap').find('.wpb_vc_param_value');

					if ( ! $this.hasClass('active') ) {
						$this.addClass('active');
						checked_list[checkbox_id] = checkbox_id;
					} else {
						$this.removeClass('active');
						delete checked_list[checkbox_id];
					}

					$saved_value.val( JSON.stringify( Object.values(checked_list) ) );
					
				});
				
				for ( var i = 0; i < value_array.length; i++ ) {
					$('.cat-item').find( '.wn-checkbox[data-id="' + value_array[i] + '"]' ).trigger('click');
				}

				// Save selected category
				$input_saved.val(value_array);

			})();
		});
	</script>

	<?php

} // end image select func