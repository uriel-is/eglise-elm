<?php
/* main shortcode for Tab Element*/
extract( shortcode_atts( array(
	//'maintitle' => '',
	'full_height' 			=> '',
	'autoplay' 				=> '', 
	'arrow_type' 			=> 'none',
	'bullet_type' 			=> 'none',
	'arrow_position'		=> 'wn-normal-arrow',
	'slider_speed' 			=> '500',
	'numbers'	 			=> 'none',
	'num_bg_color'	 		=> '',
	'num_color'	 			=> '',
	// Colors
	'arrow_color' 			=> '',
	'arrow_bg_color' 		=> '',
	'line_color' 			=> '',
	'bullet_color' 			=> '',
	// Desktop
	'top_space' 			=> '',
	'bottom_space' 			=> '',
	'left_space' 			=> '',
	'right_space' 			=> '',
	// Tablet
	'top_space_tablet' 		=> '',
	'bottom_space_tablet' 	=> '',
	'left_space_tablet' 	=> '',
	'right_space_tablet' 	=> '',
	// Mobile
	'top_space_mobile' 		=> '',
	'bottom_space_mobile' 	=> '',
	'left_space_mobile' 	=> '',
	'right_space_mobile' 	=> '',
	// Extra
	'el_class' 				=> '',
	'css'					=> '',
	'shortcodeclass'		=> '',
	'shortcodeid'			=> '',
), $atts ) );

wp_enqueue_style( 'wn-deep-content-slider', DEEP_ASSETS_URL . 'css/frontend/content-slider/content-slider.css' );

$content_slider_class = $live_page_builders_css = $desktop_custom_css = $tablet_custom_css = $mobile_custom_css = $wn_ba_colors = $arrow_icon_left = $arrow_icon_right = '';
$uniqid = uniqid();
$content_slider_class .= !empty($shortcodeclass ) ? ' '.$shortcodeclass : '';
$id = !empty($shortcodeid) ? $shortcodeid : 'wn-content-slider';
// Arrow Icon
if ( $arrow_type == 'arrow4' ) {
	$arrow_icon_left = '<i class=\'icon-arrows-slim-left\'></i><span>' . esc_html__( 'PRE' , 'deep' ) . '</span>';
	$arrow_icon_right = '<span>' . esc_html__( 'NXT' , 'deep' ) . '</span><i class=\'icon-arrows-slim-right\'></i>';
} else {
	$arrow_icon_left = '<i class=\'icon-arrows-left\'></i>';
	$arrow_icon_right = '<i class=\'icon-arrows-right\'></i>';
}

// Full height option
if ( ! empty( $full_height ) ) {
	$content_slider_class .= ' cs-full-height';
}

// Get arrow type
if ( ! empty( $arrow_type ) ) {
	$arrows_arrow_type = ( $arrow_type !== 'none' ) ? 'true' : 'false' ;
	$content_slider_class .= ( $arrow_type !== 'none' ) ? ' arrow-type-'.$arrow_type : '' ;
}

if ( ! empty( $bullet_type ) ) {
	$dotted_arrow_type = ( $bullet_type != 'none' ) ? 'true' : 'false' ;
	$content_slider_class .= ( $bullet_type !== 'none' ) ? ' ' . $bullet_type : '' ;
}


// Bullet Color
if ( ! empty( $bullet_color ) ) {
	$wn_ba_colors .= '
	.wn-content-slider.content-slider-'.$uniqid.' .owl-dots .owl-dot.active {
		background: ' . $bullet_color . ';
	}';
}

// Arrow Color
if ( ! empty( $arrow_color ) ) {
	$wn_ba_colors .= '
	#wrap .wn-content-slider.content-slider-'.$uniqid.' .content-slider-arrow-icon i {
		color: ' . $arrow_color . ';
	}';
	$wn_ba_colors .= '
	#wrap .wn-content-slider.content-slider-'.$uniqid.' .content-slider-arrow-icon:after {
		background-color: ' . $arrow_color . ';
	}';
}

// Arrow Line Color
if ( ! empty( $line_color ) ) {
	$wn_ba_colors .= '
	.wn-wrap .wn-content-slider.content-slider-'.$uniqid.' .content-slider-arrow-icon:before {
		background-color: ' . $line_color . ';
	}';
}

// Arrow Background Color
if ( ! empty( $arrow_bg_color ) ) {
	$wn_ba_colors .= '
	.wn-content-slider.content-slider-'.$uniqid.'.arrow-type-arrow3 .content-slider-arrow-icon i {
		background-color: ' . $arrow_bg_color . ';
	}';
}

// Numbers Color
if ( ! empty( $num_bg_color )  && $numbers != 'none' ) {
	$wn_ba_colors .= '
	.wn-content-slider-wrap-'.$uniqid.' .content-slider-num {
		background-color: ' . $num_bg_color . ';
	}';
}
if ( ! empty( $num_color )  && $numbers != 'none' ) {
	$wn_ba_colors .= '
	.wn-content-slider-wrap-'.$uniqid.' .content-slider-num span {
		color: ' . $num_color . ';
	}';
}

// Desktop Custom position
if ( ! empty( $top_space ) ) {
	$top_space = '
	.wn-content-slider.content-slider-'.$uniqid.':not(.arrow-type-arrow2) .content-slider-arrow-icon,
	.wn-content-slider.content-slider-'.$uniqid.'.arrow-type-arrow2.wn-custom-arrow .owl-nav {
		top: ' . $top_space . ';
	}';
}

if ( ! empty( $bottom_space ) ) {
	$bottom_space = '
	.wn-content-slider.content-slider-'.$uniqid.':not(.arrow-type-arrow2) .content-slider-arrow-icon,
	.wn-content-slider.content-slider-'.$uniqid.'.arrow-type-arrow2.wn-custom-arrow .owl-nav {
		bottom: ' . $bottom_space . ';
	}';
}

if ( ! empty( $left_space ) ) {
	$left_space = '
	.wn-content-slider.content-slider-'.$uniqid.':not(.arrow-type-arrow2) .wn-owl-prev,
	.wn-content-slider.content-slider-'.$uniqid.'.arrow-type-arrow2.wn-custom-arrow .owl-nav {
		left: ' . $left_space . ';
	}';
}

if ( ! empty( $right_space ) ) {
	$right_space = '
	.wn-content-slider.content-slider-'.$uniqid.':not(.arrow-type-arrow2) .wn-owl-next,
	.wn-content-slider.content-slider-'.$uniqid.'.arrow-type-arrow2.wn-custom-arrow .owl-nav {
		right: ' . $right_space . ';
	}';
}

if ( ! empty( $top_space ) || ! empty( $bottom_space ) || ! empty( $left_space ) ||  ! empty( $right_space ) ) {
	$desktop_custom_css = '
	@media (min-width:961px) {
		' . $top_space . '
		' . $bottom_space . '
		' . $left_space . '
		' . $right_space . '
	}
	';
}

// tablet Custom position
if ( ! empty( $top_space_tablet ) ) {
	$top_space_tablet = '
	.wn-content-slider.content-slider-'.$uniqid.':not(.arrow-type-arrow2) .content-slider-arrow-icon,
	.wn-content-slider.content-slider-'.$uniqid.'.arrow-type-arrow2.wn-custom-arrow .owl-nav {
		top: ' . $top_space_tablet . ';
	}';
}

if ( ! empty( $bottom_space_tablet ) ) {
	$bottom_space_tablet = '
	.wn-content-slider.content-slider-'.$uniqid.':not(.arrow-type-arrow2) .content-slider-arrow-icon,
	.wn-content-slider.content-slider-'.$uniqid.'.arrow-type-arrow2.wn-custom-arrow .owl-nav {
		bottom: ' . $bottom_space_tablet . ';
	}';
}

if ( ! empty( $left_space_tablet ) ) {
	$left_space_tablet = '
	.wn-content-slider.content-slider-'.$uniqid.':not(.arrow-type-arrow2) .wn-owl-next,
	.wn-content-slider.content-slider-'.$uniqid.'.arrow-type-arrow2.wn-custom-arrow .owl-nav {
		left: ' . $left_space_tablet . ';
	}';
}

if ( ! empty( $right_space_tablet ) ) {
	$right_space_tablet = '
	.wn-content-slider.content-slider-'.$uniqid.':not(.arrow-type-arrow2) .wn-owl-next,
	.wn-content-slider.content-slider-'.$uniqid.'.arrow-type-arrow2.wn-custom-arrow .owl-nav {
		right: ' . $right_space_tablet . ';
	}';
}

if ( ! empty( $top_space_tablet ) || ! empty( $bottom_space_tablet ) || ! empty( $left_space_tablet ) ||  ! empty( $right_space_tablet ) ) {
	$tablet_custom_css = '
	@media (min-width:481px) and (max-width:960px) {
		' . $top_space_tablet . '
		' . $bottom_space_tablet . '
		' . $left_space_tablet . '
		' . $right_space_tablet . '
	}
	';
}

// Mobile Custom position
if ( ! empty( $top_space_mobile ) ) {
	$top_space_mobile = '
	.wn-content-slider.content-slider-'.$uniqid.':not(.arrow-type-arrow2) .content-slider-arrow-icon,
	.wn-content-slider.content-slider-'.$uniqid.'.arrow-type-arrow2.wn-custom-arrow .owl-nav {
		top: ' . $top_space_mobile . ';
	}';
}

if ( ! empty( $bottom_space_mobile ) ) {
	$bottom_space_mobile = '
	.wn-content-slider.content-slider-'.$uniqid.':not(.arrow-type-arrow2) .content-slider-arrow-icon,
	.wn-content-slider.content-slider-'.$uniqid.'.arrow-type-arrow2.wn-custom-arrow .owl-nav {
		bottom: ' . $bottom_space_mobile . ';
	}';
}

if ( ! empty( $left_space_mobile ) ) {
	$left_space_mobile = '
	.wn-content-slider.content-slider-'.$uniqid.':not(.arrow-type-arrow2) .wn-owl-next,
	.wn-content-slider.content-slider-'.$uniqid.'.arrow-type-arrow2.wn-custom-arrow .owl-nav {
		left: ' . $left_space_mobile . ';
	}';
}

if ( ! empty( $right_space_mobile ) ) {
	$right_space_mobile = '
	.wn-content-slider.content-slider-'.$uniqid.':not(.arrow-type-arrow2) .wn-owl-next,
	.wn-content-slider.content-slider-'.$uniqid.'.arrow-type-arrow2.wn-custom-arrow .owl-nav {
		right: ' . $right_space_mobile . ';
	}';
}

if ( ! empty( $top_space_mobile ) || ! empty( $bottom_space_mobile ) || ! empty( $left_space_mobile ) ||  ! empty( $right_space_mobile ) ) {
	$mobile_custom_css = '
	@media (max-width:480px) {
		' . $top_space_mobile . '
		' . $bottom_space_mobile . '
		' . $left_space_mobile . '
		' . $right_space_mobile . '
	}
	';
}

ob_start(); ?>
<?php if ( ! empty( $numbers ) && $numbers != 'none' ) { ?>
<div id="wn-content-slider-wrap" class="wn-content-slider-wrap wn-content-slider-wrap-<?php echo '' . $uniqid; ?> <?php echo '' . $numbers; ?>">
<?php } ?>

	<div id="<?php echo $id; ?>" class="wn-content-slider content-slider-<?php echo '' . $uniqid ?> <?php echo '' . $content_slider_class . ' ' . $arrow_position ?> owl-carousel owl-theme" data-id="<?php echo '' . $uniqid ?>" >
		<?php echo wpb_js_remove_wpautop( $content ); ?>
	</div>

	<?php if ( ! empty( $numbers ) && $numbers != 'none' ) { ?>
	<div class="content-slider-num"></div>
</div>
<?php } ?>

<script>
(function($){
	jQuery(document).ready(function(){

	$('.content-slider-<?php echo esc_html( $uniqid ) ?>').owlCarousel({
	  	items: 1,
	    dots: <?php echo esc_html( $dotted_arrow_type ) ?>,
	    nav: <?php echo esc_html( $arrows_arrow_type ) ?>,
	    navText: ["<span class='wn-owl-prev content-slider-arrow-icon'><?php echo wp_kses( $arrow_icon_left, wp_kses_allowed_html( 'post' ) ); ?></span>","<span class='wn-owl-next content-slider-arrow-icon'><?php echo wp_kses( $arrow_icon_right, wp_kses_allowed_html( 'post' ) ); ?></span>","",""],
			speed: <?php echo esc_html( $slider_speed ) ?>,
			<?php if ( ! empty( $autoplay ) ) { // auto play 
				$autoplay = 'true'; 
			} else { 
				$autoplay = 'false';
			} ?>				
			autoplay: <?php echo esc_html( $autoplay ) ?>,
		responsiveClass:true,
		animateIn: 'fadeIn',
		animateOut: 'fadeOut',
		mouseDrag: false,
		loop: true,
	});
	<?php if ( ! empty( $numbers ) && $numbers != 'none' ) { ?>
	$('.content-slider-<?php echo '' . $uniqid ?>').each(function(index, el) {
		var totalItems 	 = $(this).find('.owl-item:not(.cloned)').length;
		if (  totalItems > 0 && totalItems < 10 ) {
			totalItems = '0' + totalItems;
		}
		var currentIndex = $(this).find('.owl-item.active').index() - 1;
		if (  currentIndex > 0 && currentIndex < 10 ) {
			currentIndex = '0' + currentIndex;
		}
		$(this).parent().find('.content-slider-num').html('<span class="content-slider-num-current">' + currentIndex + '</span><span class="content-slider-num-total">/' + totalItems + '</span>');

		$(this).on('changed.owl.carousel', function(event) {
			var currentIndex = event.item.index - 1;
			if (  currentIndex > 0 && currentIndex < 10 ) {
				currentIndex = '0' + currentIndex;
			}
			if ( currentIndex == '0' ) {
				currentIndex = totalItems;
			}
			$(this).siblings('.content-slider-num').html('<span class="content-slider-num-current">' + currentIndex + '</span><span class="content-slider-num-total">/' + totalItems + '</span>');
		});
	});
	<?php } ?>

	});
})(jQuery);
</script>

<?php
$out = ob_get_contents();
ob_end_clean();

deep_save_dyn_styles( '
	' . $desktop_custom_css . '
	' . $tablet_custom_css . '
	' . $mobile_custom_css . '
	' . $wn_ba_colors . '
' );

// live editor
$live_page_builders_css .= $desktop_custom_css . $tablet_custom_css . $mobile_custom_css . $wn_ba_colors;
if ( ! in_array( 'admin-bar', get_body_class() ) ) {

	if ( ! empty( $live_page_builders_css ) ) {

		$out .= '<style>';
			$out .= $live_page_builders_css;
		$out .= '</style>';

	}

}

echo '' . $out;