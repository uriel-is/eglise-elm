<?php
function michigan_webnus_certificate( $attributes, $content = null ) {
	extract(shortcode_atts(array(
	"type"			    => 'online1',
	"kindergarten_name" => '',
	"cer_title"			=> '',
	"desc_1"	        => '',
	"student_name"		=> '',
	"desc_2"		    => '',
	"ac_director"		=> '',
	"ac_director_title" => '',
	"ac_director_sign"	=> '',
	"c_director"	    => '',
	"c_director_title"	=> '',
	"c_director_sign"	=> '',
	"cer_desc"	        => '',
	"current_date"	    => '',
	"upload_bg"	        => ''
		), $attributes));
	global $current_user;
	$student_name = ($student_name)? $student_name : $current_user->user_firstname .' '. $current_user->user_lastname;
	$ac_director_sign = wp_get_attachment_url( $ac_director_sign );
	$c_director_sign = wp_get_attachment_url( $c_director_sign );
	$upload_bg = wp_get_attachment_url( $upload_bg );
	if ($type=='online1'){
		echo '<div class="w-certificate cer-'.$type.'" style="background: url('.$upload_bg.') no-repeat center center ">';
		echo '<h1 class="cer-title">'.$cer_title.'</h1>';
		echo '<h3 class="desc-1">'.$desc_1.'</h3>';
		echo '<h5 class="student-name">'.$student_name.'</h5>';
		echo '<h4 class="desc-2">'.$desc_2.'</h4>';
		echo '<div class="cer-desc">'.$cer_desc.'</div>';
		echo '<div class="clearfix">';
		echo '<div class="col-md-6 alignleft">'.$current_date.'<br>Date</div>';
		echo '<div class="col-md-6 alignright"><img src="'.$ac_director_sign.'" alt="Cetrificate Background" class="certificate-background"><div class="w-sign">'.$ac_director.'</div></div>';
		echo '</div>'; //end clearfix
		echo '</div>'; //end w-certificate
	}elseif ($type=='online2'){
		echo '<div class="w-certificate cer-'.$type.'" style="background: url('.$upload_bg.') no-repeat center center ">';
		echo '<h1 class="cer-title">'.$cer_title.'</h1>';
		echo '<h5 class="student-name">'.$student_name.'</h5>';
		echo '<div class="clearfix">';
		echo '<div class="col-md-9 aligncenter"><p class="cer-desc">'.$cer_desc.'</p><h6 class="current-date">'.$current_date.'</h6></div>';
		echo '<div class="col-md-3 aligncenter"><div class="director">'.$ac_director.'</div><div class="director-title">'.$ac_director_title.'</div><hr class="vertical-space"><div class="director">'.$c_director.'</div><div class="director-title">'.$c_director_title.'</div>';
		echo '</div>'; //end clearfix
		echo '</div>'; //end w-certificate
	}elseif ($type=='kids'){
		echo '<div class="w-certificate cer-'.$type.'" style="background: url('.$upload_bg.') no-repeat center center ">';
		echo '<h1 class="kindergarten_name">'.$kindergarten_name.'</h1>';
		echo '<h2 class="cer-title">'.$cer_title.'</h2>';
		echo '<h3 class="student-name">'.$student_name.'</h3>';
		echo '<p class="cer-desc">'.$cer_desc.'</p>';
		echo '<div class="container">';
		echo '<div class="col-md-6 alignleft"><div><img src="'.$ac_director_sign.'" alt="Cetrificate Background" class="certificate-background"></div><h5 class="w-sign">'.$ac_director.'</h5></div>';
		echo '<div class="col-md-6 alignright"><div class="right-sign"><img src="'.$c_director_sign.'" alt="Cetrificate Background" class="certificate-background"></div><h5 class="w-sign">'.$c_director.'</h5></div>';
		echo '</div>'; //end clearfix
		echo '</div>'; //end w-certificate
		
	}
	
}
add_shortcode('certificate', 'michigan_webnus_certificate');		
?>