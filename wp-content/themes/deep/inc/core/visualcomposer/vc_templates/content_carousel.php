<?php
/* main shortcode for Tab Element*/
extract( shortcode_atts( array(
	'item_num'				=> '',
	'item_margin'			=> '',
	'items_stage_padding'	=> '',
	'carousel_padding'		=> '',
	'carousel_paddin_val'	=> '',
	'dots'					=> 'false',
	'navigation'			=> 'false',
	'nav_location'			=> 'bottom_nav',
	'carousel_rtl'			=> '',
	'shortcodeclass' 		=> ' ',
	'shortcodeid' 			=> ' ',
), $atts ) );

wp_enqueue_style( 'wn-deep-content-carousel', DEEP_ASSETS_URL . 'css/frontend/content-carousel/content-carousel.css' );

$uniqid = uniqid();

ob_start(); 

$shortcodeclass 		= $shortcodeclass ? $shortcodeclass : '';
$shortcodeid 			= $shortcodeid    ? $shortcodeid : 'wn-content-carousel'.$uniqid;
$item_num				= $item_num 			? ' data-items			= "' . $item_num . '"'				: '';
$carousel_rtl			= $carousel_rtl 		? ' data-rtl 		 	= "' . $carousel_rtl . '"'				: '';
$item_margin			= $item_margin  		? ' data-margin		 	= "' . $item_margin  . '"' 		: '';
$items_stage_padding	= $items_stage_padding	? ' data-stagePadding	= "' . $items_stage_padding . '"'	: '';
$dots					= $dots 				? ' data-dots			= "' . $dots 		  . '"'			: '';
$navigation				= $navigation 			? ' data-nav			= "' . $navigation   . '"'			: '';

if ( $carousel_padding == 'true') {
	$carousel_paddin_val = $carousel_paddin_val ? $carousel_paddin_val : '';
	echo'<div class="wn-content-carousel-container" style="padding-left:' . $carousel_paddin_val . ';padding-right:' . $carousel_paddin_val . ';">';
}

if ( $nav_location == 'bottom_nav' ) {
	$nav_location = 'bottom';
} 
elseif ( $nav_location == 'sidebar_nav' ) {
	$nav_location = 'wn-cc-sidebar';
}

?>

<div id="<?php echo $shortcodeid; ?>" class=" wn-content-carousel <?php echo '' . $nav_location ?> content-carousel-<?php echo '' . $uniqid ?> <?php echo '' . $shortcodeclass; ?>" data-id="<?php echo '' . $uniqid ?>" >
	<div class="content-carousel-tab">
		<div class="tabs owl-carousel owl-theme" <?php echo '' . $carousel_rtl . $item_num . $item_margin . $items_stage_padding . $dots . $navigation?> >
			<?php echo wpb_js_remove_wpautop( $content ); ?>
		</div>
	</div>
</div>

<?php

if ( $carousel_padding == 'true') {
	echo'</div>';
}

$out = ob_get_contents();
ob_end_clean();
echo '' . $out;