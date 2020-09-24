<?php
extract( shortcode_atts( array(
  'title'        => '',
  'img'          => '',
  'name'         => '',
  'job'          => '',
), $atts ) );


$thumbnail_url = wp_get_attachment_url($img);
if( !empty( $thumbnail_url ) ) {
  // if main class not exist get it
  if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
    require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
  }
  $image = new Wn_Img_Maniuplate; // instance from settor class
  $thumbnail_url = $image->m_image( $img , $thumbnail_url , '90' , '90' ); // set required and get result
}
else {
  $thumbnail_url =  DEEP_ASSETS_URL . 'images/no_speaker.jpg ';
}

$maincontent ='';
$img_attach = '<img src="'. $thumbnail_url .'" alt="'. $name .'">';
$notice = ! empty( $notice ) ? $notice : '';
$maincontent .= ($content=='' || $content==' ') ? __($notice, "deep") : "\n\t\t\t\t". wpb_js_remove_wpautop($content)  ;

$counter = uniqid();
$output .= '<div class="testimonial-tab-item">';
$output .= '<input type="radio" name="css-tabs" id="tab-' .  $counter . '" class="testimonial-tab-switch">';
$output .= '<div class="testimonial-tab-info">';
$output .= '<label for="tab-' . $counter . '" class="testimonial-tab-label">' . $img_attach . '</label>';
$output .= '<div class="testimonial-tab-name"> ' . $name . ' </div>';
$output .= '<div class="testimonial-tab-job"> ' . $job . ' </div>';
$output .= '</div>';
$output .= '<div class="testimonial-tab-content">' . $maincontent . '</div>';
$output .= '</div>';
 
echo '' . $output;