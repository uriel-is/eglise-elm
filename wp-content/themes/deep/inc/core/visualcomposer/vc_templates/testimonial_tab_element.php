<?php
/* main shortcode for Tab Element*/
extract( shortcode_atts( array(
    'center_align'  => '',
), $atts ) );

wp_enqueue_style( 'wn-deep-testimonial-tab', DEEP_ASSETS_URL . 'css/frontend/testimonial-tab/testimonial-tab.css' );		

$uniqid = uniqid();

ob_start(); 

$centeralign = '';
if( $center_align == 'enable') {
    $centeralign =" aligncenter";
}

?>

<div id="wn-testimonial-tab" class="testimonial-tab-<?php echo '' . $uniqid ?> " data-id="<?php echo '' . $uniqid ?>" >
    <div class="testimonial-tab-items"><div class="testimonial-tabs<?php echo '' . $centeralign ?> "><?php echo wpb_js_remove_wpautop( $content ); ?></div></div>
</div>


<?php
$out = ob_get_contents();
ob_end_clean();
echo '' . $out;