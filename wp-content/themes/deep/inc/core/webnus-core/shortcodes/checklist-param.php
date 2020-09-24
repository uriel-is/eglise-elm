<?php
function deep_checklist_custom_param($settings, $value) {

   $output = '<div class="deep_checklistbox_container" style="border:2px solid #ccc; width:100%; height: 100px; overflow-y: scroll;display:block">';
   $output .= '<input id="deep_checklist" name="'.$settings['param_name']
             .'" class="wpb_vc_param_value wpb-textinput '
             .$settings['param_name'].' '.$settings['type'].'_field" type="hidden" value="'
             .$value.'">';
   
   if(is_array($settings['value']))
   	$params = $settings['value'];
   else {
       $params = array();
   }
   
   // For check the checkboxes in load,select previous values
   $values = array();
   
   if(!empty($value))
   		$values  = explode(',', $value);
   
   
   
   foreach($params as $param=>$val){
   	 	
	if(in_array($val, $values))	
   	 	$output .= "<p><input checked='checked' type='checkbox' name='{$settings['param_name']}' value='$val' class='checkbox deep_checklist' /> <span style='display:width:90%'>$param </span></p>";
	else
		$output .= "<p><input  type='checkbox' name='{$settings['param_name']}' value='$val' class='checkbox deep_checklist' /> <span style='display:width:90%'>$param </span></p>";	
   }
   $output .= '</div>';
   
   $output .= '<script  >jQuery(document).ready(function(){
   	
	jQuery(".deep_checklist").click(function(){
		
		
	
	
	var listbox_values = [];
	
	jQuery(".deep_checklist:checked").each(function(index){
		
		listbox_values.push(jQuery(this).val());
		
	});
	
	jQuery("#deep_checklist").val(listbox_values);
	
	});
	
   });</script>';
   
   return $output;
}
if ( class_exists( 'Vc_Manager' ) ) :
  vc_add_shortcode_param('checklist', 'deep_checklist_custom_param');
endif;