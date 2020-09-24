<?php
function deep_icomoon_composer( $settings, $value ) {
	$out = '
	<div id="retinaicon-form" class="webnus-iconfonts-wrapper">
		<div class="webnus-icons-list-wrapper">
		<input id="deep_icomoon_textbox" name="' . $settings['param_name'] . '" class="wpb_vc_param_value  '
		. $settings['param_name'] . ' ' . $settings['type'] . '_field" type="hidden" value="'
				. $value . '">
		<a href="#" class="wn-choose-icon">' . __( 'Choose Icon', 'deep' ) . '</a>
			<div class="search-webnus-icons">
				<p class="wpb_element_label">' . __( 'Search', 'deep' ) . '</p>
				<input type="text">
			</div>
			<ul class="webnus-icons-list">
				<!--
				<ul class="icon-filter">
					<li class="icons-menu active" data-name="all"><a href="#">All</a></li>
					<li class="icons-menu" data-name="7-stroke"><a href="#">7-stroke</a></li>
					<li class="icons-menu" data-name="fontawesome"><a href="#">Font Awesome</a></li>
					<li class="icons-menu" data-name="linea"><a href="#">Linea</a></li>
					<li class="icons-menu" data-name="linecons"><a href="#">Linecons</a></li>
					<li class="icons-menu" data-name="simple-line"><a href="#">Simple line</a></li>
					<li class="icons-menu" data-name="themify"><a href="#">Themify</a></li>
				</ul>
				<div class="webnus-icons-holder">
					<ul class="linea-icon-fonts" data-name="linea">
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-add" ><input type="radio" name="iconfonts_name" data-name="software-add" id="icon-software-add-vectorpoint" value="icon-software-add-vectorpoint"><label for="icon-software-add-vectorpoint"><i class="icon-software-add-vectorpoint" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-box" ><input type="radio" name="iconfonts_name" data-name="software-box" id="icon-software-box-oval" value="icon-software-box-oval"><label for="icon-software-box-oval"><i class="icon-software-box-oval" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-box" ><input type="radio" name="iconfonts_name" data-name="software-box" id="icon-software-box-polygon" value="icon-software-box-polygon"><label for="icon-software-box-polygon"><i class="icon-software-box-polygon" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-box" ><input type="radio" name="iconfonts_name" data-name="software-box" id="icon-software-box-rectangle" value="icon-software-box-rectangle"><label for="icon-software-box-rectangle"><i class="icon-software-box-rectangle" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-box" ><input type="radio" name="iconfonts_name" data-name="software-box" id="icon-software-box-roundedrectangle" value="icon-software-box-roundedrectangle"><label for="icon-software-box-roundedrectangle"><i class="icon-software-box-roundedrectangle" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-character" ><input type="radio" name="iconfonts_name" data-name="software-character" id="icon-software-character" value="icon-software-character"><label for="icon-software-character"><i class="icon-software-character" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-crop" ><input type="radio" name="iconfonts_name" data-name="software-crop" id="icon-software-crop" value="icon-software-crop"><label for="icon-software-crop"><i class="icon-software-crop" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-eyedropper" ><input type="radio" name="iconfonts_name" data-name="software-eyedropper" id="icon-software-eyedropper" value="icon-software-eyedropper"><label for="icon-software-eyedropper"><i class="icon-software-eyedropper" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-font" ><input type="radio" name="iconfonts_name" data-name="software-font" id="icon-software-font-allcaps" value="icon-software-font-allcaps"><label for="icon-software-font-allcaps"><i class="icon-software-font-allcaps" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-font" ><input type="radio" name="iconfonts_name" data-name="software-font" id="icon-software-font-baseline-shift" value="icon-software-font-baseline-shift"><label for="icon-software-font-baseline-shift"><i class="icon-software-font-baseline-shift" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-font" ><input type="radio" name="iconfonts_name" data-name="software-font" id="icon-software-font-horizontal-scale" value="icon-software-font-horizontal-scale"><label for="icon-software-font-horizontal-scale"><i class="icon-software-font-horizontal-scale" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-font" ><input type="radio" name="iconfonts_name" data-name="software-font" id="icon-software-font-kerning" value="icon-software-font-kerning"><label for="icon-software-font-kerning"><i class="icon-software-font-kerning" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-font" ><input type="radio" name="iconfonts_name" data-name="software-font" id="icon-software-font-leading" value="icon-software-font-leading"><label for="icon-software-font-leading"><i class="icon-software-font-leading" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-font" ><input type="radio" name="iconfonts_name" data-name="software-font" id="icon-software-font-size" value="icon-software-font-size"><label for="icon-software-font-size"><i class="icon-software-font-size" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-font" ><input type="radio" name="iconfonts_name" data-name="software-font" id="icon-software-font-smallcapital" value="icon-software-font-smallcapital"><label for="icon-software-font-smallcapital"><i class="icon-software-font-smallcapital" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-font" ><input type="radio" name="iconfonts_name" data-name="software-font" id="icon-software-font-smallcaps" value="icon-software-font-smallcaps"><label for="icon-software-font-smallcaps"><i class="icon-software-font-smallcaps" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-font" ><input type="radio" name="iconfonts_name" data-name="software-font" id="icon-software-font-strikethrough" value="icon-software-font-strikethrough"><label for="icon-software-font-strikethrough"><i class="icon-software-font-strikethrough" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-font" ><input type="radio" name="iconfonts_name" data-name="software-font" id="icon-software-font-tracking" value="icon-software-font-tracking"><label for="icon-software-font-tracking"><i class="icon-software-font-tracking" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-font" ><input type="radio" name="iconfonts_name" data-name="software-font" id="icon-software-font-underline" value="icon-software-font-underline"><label for="icon-software-font-underline"><i class="icon-software-font-underline" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-font" ><input type="radio" name="iconfonts_name" data-name="software-font" id="icon-software-font-vertical-scale" value="icon-software-font-vertical-scale"><label for="icon-software-font-vertical-scale"><i class="icon-software-font-vertical-scale" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-horizontal" ><input type="radio" name="iconfonts_name" data-name="software-horizontal" id="icon-software-horizontal-align-center" value="icon-software-horizontal-align-center"><label for="icon-software-horizontal-align-center"><i class="icon-software-horizontal-align-center" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-horizontal" ><input type="radio" name="iconfonts_name" data-name="software-horizontal" id="icon-software-horizontal-align-left" value="icon-software-horizontal-align-left"><label for="icon-software-horizontal-align-left"><i class="icon-software-horizontal-align-left" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-horizontal" ><input type="radio" name="iconfonts_name" data-name="software-horizontal" id="icon-software-horizontal-align-right" value="icon-software-horizontal-align-right"><label for="icon-software-horizontal-align-right"><i class="icon-software-horizontal-align-right" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-horizontal" ><input type="radio" name="iconfonts_name" data-name="software-horizontal" id="icon-software-horizontal-distribute-center" value="icon-software-horizontal-distribute-center"><label for="icon-software-horizontal-distribute-center"><i class="icon-software-horizontal-distribute-center" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-horizontal" ><input type="radio" name="iconfonts_name" data-name="software-horizontal" id="icon-software-horizontal-distribute-left" value="icon-software-horizontal-distribute-left"><label for="icon-software-horizontal-distribute-left"><i class="icon-software-horizontal-distribute-left" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-horizontal" ><input type="radio" name="iconfonts_name" data-name="software-horizontal" id="icon-software-horizontal-distribute-right" value="icon-software-horizontal-distribute-right"><label for="icon-software-horizontal-distribute-right"><i class="icon-software-horizontal-distribute-right" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-indent" ><input type="radio" name="iconfonts_name" data-name="software-indent" id="icon-software-indent-firstline" value="icon-software-indent-firstline"><label for="icon-software-indent-firstline"><i class="icon-software-indent-firstline" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-indent" ><input type="radio" name="iconfonts_name" data-name="software-indent" id="icon-software-indent-left" value="icon-software-indent-left"><label for="icon-software-indent-left"><i class="icon-software-indent-left" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-indent" ><input type="radio" name="iconfonts_name" data-name="software-indent" id="icon-software-indent-right" value="icon-software-indent-right"><label for="icon-software-indent-right"><i class="icon-software-indent-right" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-lasso" ><input type="radio" name="iconfonts_name" data-name="software-lasso" id="icon-software-lasso" value="icon-software-lasso"><label for="icon-software-lasso"><i class="icon-software-lasso" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-layers1" ><input type="radio" name="iconfonts_name" data-name="software-layers1" id="icon-software-layers1" value="icon-software-layers1"><label for="icon-software-layers1"><i class="icon-software-layers1" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-layers2" ><input type="radio" name="iconfonts_name" data-name="software-layers2" id="icon-software-layers2" value="icon-software-layers2"><label for="icon-software-layers2"><i class="icon-software-layers2" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-layout" ><input type="radio" name="iconfonts_name" data-name="software-layout" id="icon-software-layout" value="icon-software-layout"><label for="icon-software-layout"><i class="icon-software-layout" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-layout" ><input type="radio" name="iconfonts_name" data-name="software-layout" id="icon-software-layout-2columns" value="icon-software-layout-2columns"><label for="icon-software-layout-2columns"><i class="icon-software-layout-2columns" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-layout" ><input type="radio" name="iconfonts_name" data-name="software-layout" id="icon-software-layout-3columns" value="icon-software-layout-3columns"><label for="icon-software-layout-3columns"><i class="icon-software-layout-3columns" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-layout" ><input type="radio" name="iconfonts_name" data-name="software-layout" id="icon-software-layout-4boxes" value="icon-software-layout-4boxes"><label for="icon-software-layout-4boxes"><i class="icon-software-layout-4boxes" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-layout" ><input type="radio" name="iconfonts_name" data-name="software-layout" id="icon-software-layout-4columns" value="icon-software-layout-4columns"><label for="icon-software-layout-4columns"><i class="icon-software-layout-4columns" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-layout" ><input type="radio" name="iconfonts_name" data-name="software-layout" id="icon-software-layout-4lines" value="icon-software-layout-4lines"><label for="icon-software-layout-4lines"><i class="icon-software-layout-4lines" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-layout" ><input type="radio" name="iconfonts_name" data-name="software-layout" id="icon-software-layout-8boxes" value="icon-software-layout-8boxes"><label for="icon-software-layout-8boxes"><i class="icon-software-layout-8boxes" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-layout" ><input type="radio" name="iconfonts_name" data-name="software-layout" id="icon-software-layout-header" value="icon-software-layout-header"><label for="icon-software-layout-header"><i class="icon-software-layout-header" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-layout" ><input type="radio" name="iconfonts_name" data-name="software-layout" id="icon-software-layout-header-2columns" value="icon-software-layout-header-2columns"><label for="icon-software-layout-header-2columns"><i class="icon-software-layout-header-2columns" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-layout" ><input type="radio" name="iconfonts_name" data-name="software-layout" id="icon-software-layout-header-3columns" value="icon-software-layout-header-3columns"><label for="icon-software-layout-header-3columns"><i class="icon-software-layout-header-3columns" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-layout" ><input type="radio" name="iconfonts_name" data-name="software-layout" id="icon-software-layout-header-4boxes" value="icon-software-layout-header-4boxes"><label for="icon-software-layout-header-4boxes"><i class="icon-software-layout-header-4boxes" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-layout" ><input type="radio" name="iconfonts_name" data-name="software-layout" id="icon-software-layout-header-4columns" value="icon-software-layout-header-4columns"><label for="icon-software-layout-header-4columns"><i class="icon-software-layout-header-4columns" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-layout" ><input type="radio" name="iconfonts_name" data-name="software-layout" id="icon-software-layout-header-complex" value="icon-software-layout-header-complex"><label for="icon-software-layout-header-complex"><i class="icon-software-layout-header-complex" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-layout" ><input type="radio" name="iconfonts_name" data-name="software-layout" id="icon-software-layout-header-complex2" value="icon-software-layout-header-complex2"><label for="icon-software-layout-header-complex2"><i class="icon-software-layout-header-complex2" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-layout" ><input type="radio" name="iconfonts_name" data-name="software-layout" id="icon-software-layout-header-complex3" value="icon-software-layout-header-complex3"><label for="icon-software-layout-header-complex3"><i class="icon-software-layout-header-complex3" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-layout" ><input type="radio" name="iconfonts_name" data-name="software-layout" id="icon-software-layout-header-complex4" value="icon-software-layout-header-complex4"><label for="icon-software-layout-header-complex4"><i class="icon-software-layout-header-complex4" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-layout" ><input type="radio" name="iconfonts_name" data-name="software-layout" id="icon-software-layout-header-sideleft" value="icon-software-layout-header-sideleft"><label for="icon-software-layout-header-sideleft"><i class="icon-software-layout-header-sideleft" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-layout" ><input type="radio" name="iconfonts_name" data-name="software-layout" id="icon-software-layout-header-sideright" value="icon-software-layout-header-sideright"><label for="icon-software-layout-header-sideright"><i class="icon-software-layout-header-sideright" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-layout" ><input type="radio" name="iconfonts_name" data-name="software-layout" id="icon-software-layout-sidebar-left" value="icon-software-layout-sidebar-left"><label for="icon-software-layout-sidebar-left"><i class="icon-software-layout-sidebar-left" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-layout" ><input type="radio" name="iconfonts_name" data-name="software-layout" id="icon-software-layout-sidebar-right" value="icon-software-layout-sidebar-right"><label for="icon-software-layout-sidebar-right"><i class="icon-software-layout-sidebar-right" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-magnete" ><input type="radio" name="iconfonts_name" data-name="software-magnete" id="icon-software-magnete" value="icon-software-magnete"><label for="icon-software-magnete"><i class="icon-software-magnete" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-pages" ><input type="radio" name="iconfonts_name" data-name="software-pages" id="icon-software-pages" value="icon-software-pages"><label for="icon-software-pages"><i class="icon-software-pages" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-paintbrush" ><input type="radio" name="iconfonts_name" data-name="software-paintbrush" id="icon-software-paintbrush" value="icon-software-paintbrush"><label for="icon-software-paintbrush"><i class="icon-software-paintbrush" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-paintbucket" ><input type="radio" name="iconfonts_name" data-name="software-paintbucket" id="icon-software-paintbucket" value="icon-software-paintbucket"><label for="icon-software-paintbucket"><i class="icon-software-paintbucket" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-paintroller" ><input type="radio" name="iconfonts_name" data-name="software-paintroller" id="icon-software-paintroller" value="icon-software-paintroller"><label for="icon-software-paintroller"><i class="icon-software-paintroller" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-paragraph" ><input type="radio" name="iconfonts_name" data-name="software-paragraph" id="icon-software-paragraph" value="icon-software-paragraph"><label for="icon-software-paragraph"><i class="icon-software-paragraph" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-paragraph" ><input type="radio" name="iconfonts_name" data-name="software-paragraph" id="icon-software-paragraph-align-left" value="icon-software-paragraph-align-left"><label for="icon-software-paragraph-align-left"><i class="icon-software-paragraph-align-left" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-paragraph" ><input type="radio" name="iconfonts_name" data-name="software-paragraph" id="icon-software-paragraph-align-right" value="icon-software-paragraph-align-right"><label for="icon-software-paragraph-align-right"><i class="icon-software-paragraph-align-right" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-paragraph" ><input type="radio" name="iconfonts_name" data-name="software-paragraph" id="icon-software-paragraph-center" value="icon-software-paragraph-center"><label for="icon-software-paragraph-center"><i class="icon-software-paragraph-center" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-paragraph" ><input type="radio" name="iconfonts_name" data-name="software-paragraph" id="icon-software-paragraph-justify-all" value="icon-software-paragraph-justify-all"><label for="icon-software-paragraph-justify-all"><i class="icon-software-paragraph-justify-all" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-paragraph" ><input type="radio" name="iconfonts_name" data-name="software-paragraph" id="icon-software-paragraph-justify-center" value="icon-software-paragraph-justify-center"><label for="icon-software-paragraph-justify-center"><i class="icon-software-paragraph-justify-center" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-paragraph" ><input type="radio" name="iconfonts_name" data-name="software-paragraph" id="icon-software-paragraph-justify-left" value="icon-software-paragraph-justify-left"><label for="icon-software-paragraph-justify-left"><i class="icon-software-paragraph-justify-left" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-paragraph" ><input type="radio" name="iconfonts_name" data-name="software-paragraph" id="icon-software-paragraph-justify-right" value="icon-software-paragraph-justify-right"><label for="icon-software-paragraph-justify-right"><i class="icon-software-paragraph-justify-right" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-paragraph" ><input type="radio" name="iconfonts_name" data-name="software-paragraph" id="icon-software-paragraph-space-after" value="icon-software-paragraph-space-after"><label for="icon-software-paragraph-space-after"><i class="icon-software-paragraph-space-after" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-paragraph" ><input type="radio" name="iconfonts_name" data-name="software-paragraph" id="icon-software-paragraph-space-before" value="icon-software-paragraph-space-before"><label for="icon-software-paragraph-space-before"><i class="icon-software-paragraph-space-before" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-pathfinder" ><input type="radio" name="iconfonts_name" data-name="software-pathfinder" id="icon-software-pathfinder-exclude" value="icon-software-pathfinder-exclude"><label for="icon-software-pathfinder-exclude"><i class="icon-software-pathfinder-exclude" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-pathfinder" ><input type="radio" name="iconfonts_name" data-name="software-pathfinder" id="icon-software-pathfinder-intersect" value="icon-software-pathfinder-intersect"><label for="icon-software-pathfinder-intersect"><i class="icon-software-pathfinder-intersect" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-pathfinder" ><input type="radio" name="iconfonts_name" data-name="software-pathfinder" id="icon-software-pathfinder-subtract" value="icon-software-pathfinder-subtract"><label for="icon-software-pathfinder-subtract"><i class="icon-software-pathfinder-subtract" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-pathfinder" ><input type="radio" name="iconfonts_name" data-name="software-pathfinder" id="icon-software-pathfinder-unite" value="icon-software-pathfinder-unite"><label for="icon-software-pathfinder-unite"><i class="icon-software-pathfinder-unite" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-pen" ><input type="radio" name="iconfonts_name" data-name="software-pen" id="icon-software-pen" value="icon-software-pen"><label for="icon-software-pen"><i class="icon-software-pen" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-pen" ><input type="radio" name="iconfonts_name" data-name="software-pen" id="icon-software-pen-add" value="icon-software-pen-add"><label for="icon-software-pen-add"><i class="icon-software-pen-add" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-pen" ><input type="radio" name="iconfonts_name" data-name="software-pen" id="icon-software-pen-remove" value="icon-software-pen-remove"><label for="icon-software-pen-remove"><i class="icon-software-pen-remove" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-pencil" ><input type="radio" name="iconfonts_name" data-name="software-pencil" id="icon-software-pencil" value="icon-software-pencil"><label for="icon-software-pencil"><i class="icon-software-pencil" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-polygonallasso" ><input type="radio" name="iconfonts_name" data-name="software-polygonallasso" id="icon-software-polygonallasso" value="icon-software-polygonallasso"><label for="icon-software-polygonallasso"><i class="icon-software-polygonallasso" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-reflect" ><input type="radio" name="iconfonts_name" data-name="software-reflect" id="icon-software-reflect-horizontal" value="icon-software-reflect-horizontal"><label for="icon-software-reflect-horizontal"><i class="icon-software-reflect-horizontal" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-reflect" ><input type="radio" name="iconfonts_name" data-name="software-reflect" id="icon-software-reflect-vertical" value="icon-software-reflect-vertical"><label for="icon-software-reflect-vertical"><i class="icon-software-reflect-vertical" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-remove" ><input type="radio" name="iconfonts_name" data-name="software-remove" id="icon-software-remove-vectorpoint" value="icon-software-remove-vectorpoint"><label for="icon-software-remove-vectorpoint"><i class="icon-software-remove-vectorpoint" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-scale" ><input type="radio" name="iconfonts_name" data-name="software-scale" id="icon-software-scale-expand" value="icon-software-scale-expand"><label for="icon-software-scale-expand"><i class="icon-software-scale-expand" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-scale" ><input type="radio" name="iconfonts_name" data-name="software-scale" id="icon-software-scale-reduce" value="icon-software-scale-reduce"><label for="icon-software-scale-reduce"><i class="icon-software-scale-reduce" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-selection" ><input type="radio" name="iconfonts_name" data-name="software-selection" id="icon-software-selection-oval" value="icon-software-selection-oval"><label for="icon-software-selection-oval"><i class="icon-software-selection-oval" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-selection" ><input type="radio" name="iconfonts_name" data-name="software-selection" id="icon-software-selection-polygon" value="icon-software-selection-polygon"><label for="icon-software-selection-polygon"><i class="icon-software-selection-polygon" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-selection" ><input type="radio" name="iconfonts_name" data-name="software-selection" id="icon-software-selection-rectangle" value="icon-software-selection-rectangle"><label for="icon-software-selection-rectangle"><i class="icon-software-selection-rectangle" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-selection" ><input type="radio" name="iconfonts_name" data-name="software-selection" id="icon-software-selection-roundedrectangle" value="icon-software-selection-roundedrectangle"><label for="icon-software-selection-roundedrectangle"><i class="icon-software-selection-roundedrectangle" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-shape" ><input type="radio" name="iconfonts_name" data-name="software-shape" id="icon-software-shape-oval" value="icon-software-shape-oval"><label for="icon-software-shape-oval"><i class="icon-software-shape-oval" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-shape" ><input type="radio" name="iconfonts_name" data-name="software-shape" id="icon-software-shape-polygon" value="icon-software-shape-polygon"><label for="icon-software-shape-polygon"><i class="icon-software-shape-polygon" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-shape" ><input type="radio" name="iconfonts_name" data-name="software-shape" id="icon-software-shape-rectangle" value="icon-software-shape-rectangle"><label for="icon-software-shape-rectangle"><i class="icon-software-shape-rectangle" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-shape" ><input type="radio" name="iconfonts_name" data-name="software-shape" id="icon-software-shape-roundedrectangle" value="icon-software-shape-roundedrectangle"><label for="icon-software-shape-roundedrectangle"><i class="icon-software-shape-roundedrectangle" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-slice" ><input type="radio" name="iconfonts_name" data-name="software-slice" id="icon-software-slice" value="icon-software-slice"><label for="icon-software-slice"><i class="icon-software-slice" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-transform" ><input type="radio" name="iconfonts_name" data-name="software-transform" id="icon-software-transform-bezier" value="icon-software-transform-bezier"><label for="icon-software-transform-bezier"><i class="icon-software-transform-bezier" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-vector" ><input type="radio" name="iconfonts_name" data-name="software-vector" id="icon-software-vector-box" value="icon-software-vector-box"><label for="icon-software-vector-box"><i class="icon-software-vector-box" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-vector" ><input type="radio" name="iconfonts_name" data-name="software-vector" id="icon-software-vector-composite" value="icon-software-vector-composite"><label for="icon-software-vector-composite"><i class="icon-software-vector-composite" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-vector" ><input type="radio" name="iconfonts_name" data-name="software-vector" id="icon-software-vector-line" value="icon-software-vector-line"><label for="icon-software-vector-line"><i class="icon-software-vector-line" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-vertical" ><input type="radio" name="iconfonts_name" data-name="software-vertical" id="icon-software-vertical-align-bottom" value="icon-software-vertical-align-bottom"><label for="icon-software-vertical-align-bottom"><i class="icon-software-vertical-align-bottom" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-vertical" ><input type="radio" name="iconfonts_name" data-name="software-vertical" id="icon-software-vertical-align-center" value="icon-software-vertical-align-center"><label for="icon-software-vertical-align-center"><i class="icon-software-vertical-align-center" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-vertical" ><input type="radio" name="iconfonts_name" data-name="software-vertical" id="icon-software-vertical-align-top" value="icon-software-vertical-align-top"><label for="icon-software-vertical-align-top"><i class="icon-software-vertical-align-top" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-vertical" ><input type="radio" name="iconfonts_name" data-name="software-vertical" id="icon-software-vertical-distribute-bottom" value="icon-software-vertical-distribute-bottom"><label for="icon-software-vertical-distribute-bottom"><i class="icon-software-vertical-distribute-bottom" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-vertical" ><input type="radio" name="iconfonts_name" data-name="software-vertical" id="icon-software-vertical-distribute-center" value="icon-software-vertical-distribute-center"><label for="icon-software-vertical-distribute-center"><i class="icon-software-vertical-distribute-center" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="software-vertical" ><input type="radio" name="iconfonts_name" data-name="software-vertical" id="icon-software-vertical-distribute-top" value="icon-software-vertical-distribute-top"><label for="icon-software-vertical-distribute-top"><i class="icon-software-vertical-distribute-top" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-anticlockwise" ><input type="radio" name="iconfonts_name" data-name="arrows-anticlockwise" id="icon-arrows-anticlockwise" value="icon-arrows-anticlockwise"><label for="icon-arrows-anticlockwise"><i class="icon-arrows-anticlockwise" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-anticlockwise" ><input type="radio" name="iconfonts_name" data-name="arrows-anticlockwise" id="icon-arrows-anticlockwise-dashed" value="icon-arrows-anticlockwise-dashed"><label for="icon-arrows-anticlockwise-dashed"><i class="icon-arrows-anticlockwise-dashed" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-button" ><input type="radio" name="iconfonts_name" data-name="arrows-button" id="icon-arrows-button-down" value="icon-arrows-button-down"><label for="icon-arrows-button-down"><i class="icon-arrows-button-down" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-button" ><input type="radio" name="iconfonts_name" data-name="arrows-button" id="icon-arrows-button-off" value="icon-arrows-button-off"><label for="icon-arrows-button-off"><i class="icon-arrows-button-off" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-button" ><input type="radio" name="iconfonts_name" data-name="arrows-button" id="icon-arrows-button-on" value="icon-arrows-button-on"><label for="icon-arrows-button-on"><i class="icon-arrows-button-on" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-button" ><input type="radio" name="iconfonts_name" data-name="arrows-button" id="icon-arrows-button-up" value="icon-arrows-button-up"><label for="icon-arrows-button-up"><i class="icon-arrows-button-up" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-check" ><input type="radio" name="iconfonts_name" data-name="arrows-check" id="icon-arrows-check" value="icon-arrows-check"><label for="icon-arrows-check"><i class="icon-arrows-check" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-circle" ><input type="radio" name="iconfonts_name" data-name="arrows-circle" id="icon-arrows-circle-check" value="icon-arrows-circle-check"><label for="icon-arrows-circle-check"><i class="icon-arrows-circle-check" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-circle" ><input type="radio" name="iconfonts_name" data-name="arrows-circle" id="icon-arrows-circle-down" value="icon-arrows-circle-down"><label for="icon-arrows-circle-down"><i class="icon-arrows-circle-down" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-circle" ><input type="radio" name="iconfonts_name" data-name="arrows-circle" id="icon-arrows-circle-downleft" value="icon-arrows-circle-downleft"><label for="icon-arrows-circle-downleft"><i class="icon-arrows-circle-downleft" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-circle" ><input type="radio" name="iconfonts_name" data-name="arrows-circle" id="icon-arrows-circle-downright" value="icon-arrows-circle-downright"><label for="icon-arrows-circle-downright"><i class="icon-arrows-circle-downright" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-circle" ><input type="radio" name="iconfonts_name" data-name="arrows-circle" id="icon-arrows-circle-left" value="icon-arrows-circle-left"><label for="icon-arrows-circle-left"><i class="icon-arrows-circle-left" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-circle" ><input type="radio" name="iconfonts_name" data-name="arrows-circle" id="icon-arrows-circle-minus" value="icon-arrows-circle-minus"><label for="icon-arrows-circle-minus"><i class="icon-arrows-circle-minus" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-circle" ><input type="radio" name="iconfonts_name" data-name="arrows-circle" id="icon-arrows-circle-plus" value="icon-arrows-circle-plus"><label for="icon-arrows-circle-plus"><i class="icon-arrows-circle-plus" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-circle" ><input type="radio" name="iconfonts_name" data-name="arrows-circle" id="icon-arrows-circle-remove" value="icon-arrows-circle-remove"><label for="icon-arrows-circle-remove"><i class="icon-arrows-circle-remove" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-circle" ><input type="radio" name="iconfonts_name" data-name="arrows-circle" id="icon-arrows-circle-right" value="icon-arrows-circle-right"><label for="icon-arrows-circle-right"><i class="icon-arrows-circle-right" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-circle" ><input type="radio" name="iconfonts_name" data-name="arrows-circle" id="icon-arrows-circle-up" value="icon-arrows-circle-up"><label for="icon-arrows-circle-up"><i class="icon-arrows-circle-up" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-circle" ><input type="radio" name="iconfonts_name" data-name="arrows-circle" id="icon-arrows-circle-upleft" value="icon-arrows-circle-upleft"><label for="icon-arrows-circle-upleft"><i class="icon-arrows-circle-upleft" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-circle" ><input type="radio" name="iconfonts_name" data-name="arrows-circle" id="icon-arrows-circle-upright" value="icon-arrows-circle-upright"><label for="icon-arrows-circle-upright"><i class="icon-arrows-circle-upright" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-clockwise" ><input type="radio" name="iconfonts_name" data-name="arrows-clockwise" id="icon-arrows-clockwise" value="icon-arrows-clockwise"><label for="icon-arrows-clockwise"><i class="icon-arrows-clockwise" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-clockwise" ><input type="radio" name="iconfonts_name" data-name="arrows-clockwise" id="icon-arrows-clockwise-dashed" value="icon-arrows-clockwise-dashed"><label for="icon-arrows-clockwise-dashed"><i class="icon-arrows-clockwise-dashed" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-compress" ><input type="radio" name="iconfonts_name" data-name="arrows-compress" id="icon-arrows-compress" value="icon-arrows-compress"><label for="icon-arrows-compress"><i class="icon-arrows-compress" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-deny" ><input type="radio" name="iconfonts_name" data-name="arrows-deny" id="icon-arrows-deny" value="icon-arrows-deny"><label for="icon-arrows-deny"><i class="icon-arrows-deny" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-diagonal" ><input type="radio" name="iconfonts_name" data-name="arrows-diagonal" id="icon-arrows-diagonal" value="icon-arrows-diagonal"><label for="icon-arrows-diagonal"><i class="icon-arrows-diagonal" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-diagonal2" ><input type="radio" name="iconfonts_name" data-name="arrows-diagonal2" id="icon-arrows-diagonal2" value="icon-arrows-diagonal2"><label for="icon-arrows-diagonal2"><i class="icon-arrows-diagonal2" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-down" ><input type="radio" name="iconfonts_name" data-name="arrows-down" id="icon-arrows-down" value="icon-arrows-down"><label for="icon-arrows-down"><i class="icon-arrows-down" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-down" ><input type="radio" name="iconfonts_name" data-name="arrows-down" id="icon-arrows-down-double" value="icon-arrows-down-double"><label for="icon-arrows-down-double"><i class="icon-arrows-down-double" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-downleft" ><input type="radio" name="iconfonts_name" data-name="arrows-downleft" id="icon-arrows-downleft" value="icon-arrows-downleft"><label for="icon-arrows-downleft"><i class="icon-arrows-downleft" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-downright" ><input type="radio" name="iconfonts_name" data-name="arrows-downright" id="icon-arrows-downright" value="icon-arrows-downright"><label for="icon-arrows-downright"><i class="icon-arrows-downright" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-drag" ><input type="radio" name="iconfonts_name" data-name="arrows-drag" id="icon-arrows-drag-down" value="icon-arrows-drag-down"><label for="icon-arrows-drag-down"><i class="icon-arrows-drag-down" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-drag" ><input type="radio" name="iconfonts_name" data-name="arrows-drag" id="icon-arrows-drag-down-dashed" value="icon-arrows-drag-down-dashed"><label for="icon-arrows-drag-down-dashed"><i class="icon-arrows-drag-down-dashed" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-drag" ><input type="radio" name="iconfonts_name" data-name="arrows-drag" id="icon-arrows-drag-horiz" value="icon-arrows-drag-horiz"><label for="icon-arrows-drag-horiz"><i class="icon-arrows-drag-horiz" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-drag" ><input type="radio" name="iconfonts_name" data-name="arrows-drag" id="icon-arrows-drag-left" value="icon-arrows-drag-left"><label for="icon-arrows-drag-left"><i class="icon-arrows-drag-left" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-drag" ><input type="radio" name="iconfonts_name" data-name="arrows-drag" id="icon-arrows-drag-left-dashed" value="icon-arrows-drag-left-dashed"><label for="icon-arrows-drag-left-dashed"><i class="icon-arrows-drag-left-dashed" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-drag" ><input type="radio" name="iconfonts_name" data-name="arrows-drag" id="icon-arrows-drag-right" value="icon-arrows-drag-right"><label for="icon-arrows-drag-right"><i class="icon-arrows-drag-right" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-drag" ><input type="radio" name="iconfonts_name" data-name="arrows-drag" id="icon-arrows-drag-right-dashed" value="icon-arrows-drag-right-dashed"><label for="icon-arrows-drag-right-dashed"><i class="icon-arrows-drag-right-dashed" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-drag" ><input type="radio" name="iconfonts_name" data-name="arrows-drag" id="icon-arrows-drag-up" value="icon-arrows-drag-up"><label for="icon-arrows-drag-up"><i class="icon-arrows-drag-up" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-drag" ><input type="radio" name="iconfonts_name" data-name="arrows-drag" id="icon-arrows-drag-up-dashed" value="icon-arrows-drag-up-dashed"><label for="icon-arrows-drag-up-dashed"><i class="icon-arrows-drag-up-dashed" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-drag" ><input type="radio" name="iconfonts_name" data-name="arrows-drag" id="icon-arrows-drag-vert" value="icon-arrows-drag-vert"><label for="icon-arrows-drag-vert"><i class="icon-arrows-drag-vert" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-exclamation" ><input type="radio" name="iconfonts_name" data-name="arrows-exclamation" id="icon-arrows-exclamation" value="icon-arrows-exclamation"><label for="icon-arrows-exclamation"><i class="icon-arrows-exclamation" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-expand" ><input type="radio" name="iconfonts_name" data-name="arrows-expand" id="icon-arrows-expand" value="icon-arrows-expand"><label for="icon-arrows-expand"><i class="icon-arrows-expand" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-expand" ><input type="radio" name="iconfonts_name" data-name="arrows-expand" id="icon-arrows-expand-diagonal1" value="icon-arrows-expand-diagonal1"><label for="icon-arrows-expand-diagonal1"><i class="icon-arrows-expand-diagonal1" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-expand" ><input type="radio" name="iconfonts_name" data-name="arrows-expand" id="icon-arrows-expand-horizontal1" value="icon-arrows-expand-horizontal1"><label for="icon-arrows-expand-horizontal1"><i class="icon-arrows-expand-horizontal1" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-expand" ><input type="radio" name="iconfonts_name" data-name="arrows-expand" id="icon-arrows-expand-vertical1" value="icon-arrows-expand-vertical1"><label for="icon-arrows-expand-vertical1"><i class="icon-arrows-expand-vertical1" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-fit" ><input type="radio" name="iconfonts_name" data-name="arrows-fit" id="icon-arrows-fit-horizontal" value="icon-arrows-fit-horizontal"><label for="icon-arrows-fit-horizontal"><i class="icon-arrows-fit-horizontal" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-fit" ><input type="radio" name="iconfonts_name" data-name="arrows-fit" id="icon-arrows-fit-vertical" value="icon-arrows-fit-vertical"><label for="icon-arrows-fit-vertical"><i class="icon-arrows-fit-vertical" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-glide" ><input type="radio" name="iconfonts_name" data-name="arrows-glide" id="icon-arrows-glide" value="icon-arrows-glide"><label for="icon-arrows-glide"><i class="icon-arrows-glide" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-glide" ><input type="radio" name="iconfonts_name" data-name="arrows-glide" id="icon-arrows-glide-horizontal" value="icon-arrows-glide-horizontal"><label for="icon-arrows-glide-horizontal"><i class="icon-arrows-glide-horizontal" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-glide" ><input type="radio" name="iconfonts_name" data-name="arrows-glide" id="icon-arrows-glide-vertical" value="icon-arrows-glide-vertical"><label for="icon-arrows-glide-vertical"><i class="icon-arrows-glide-vertical" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-hamburger1" ><input type="radio" name="iconfonts_name" data-name="arrows-hamburger1" id="icon-arrows-hamburger1" value="icon-arrows-hamburger1"><label for="icon-arrows-hamburger1"><i class="icon-arrows-hamburger1" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-hamburger" ><input type="radio" name="iconfonts_name" data-name="arrows-hamburger" id="icon-arrows-hamburger-2" value="icon-arrows-hamburger-2"><label for="icon-arrows-hamburger-2"><i class="icon-arrows-hamburger-2" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-horizontal" ><input type="radio" name="iconfonts_name" data-name="arrows-horizontal" id="icon-arrows-horizontal" value="icon-arrows-horizontal"><label for="icon-arrows-horizontal"><i class="icon-arrows-horizontal" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-info" ><input type="radio" name="iconfonts_name" data-name="arrows-info" id="icon-arrows-info" value="icon-arrows-info"><label for="icon-arrows-info"><i class="icon-arrows-info" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-keyboard" ><input type="radio" name="iconfonts_name" data-name="arrows-keyboard" id="icon-arrows-keyboard-alt" value="icon-arrows-keyboard-alt"><label for="icon-arrows-keyboard-alt"><i class="icon-arrows-keyboard-alt" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-keyboard" ><input type="radio" name="iconfonts_name" data-name="arrows-keyboard" id="icon-arrows-keyboard-cmd" value="icon-arrows-keyboard-cmd"><label for="icon-arrows-keyboard-cmd"><i class="icon-arrows-keyboard-cmd" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-keyboard" ><input type="radio" name="iconfonts_name" data-name="arrows-keyboard" id="icon-arrows-keyboard-delete" value="icon-arrows-keyboard-delete"><label for="icon-arrows-keyboard-delete"><i class="icon-arrows-keyboard-delete" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-keyboard" ><input type="radio" name="iconfonts_name" data-name="arrows-keyboard" id="icon-arrows-keyboard-down" value="icon-arrows-keyboard-down"><label for="icon-arrows-keyboard-down"><i class="icon-arrows-keyboard-down" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-keyboard" ><input type="radio" name="iconfonts_name" data-name="arrows-keyboard" id="icon-arrows-keyboard-left" value="icon-arrows-keyboard-left"><label for="icon-arrows-keyboard-left"><i class="icon-arrows-keyboard-left" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-keyboard" ><input type="radio" name="iconfonts_name" data-name="arrows-keyboard" id="icon-arrows-keyboard-return" value="icon-arrows-keyboard-return"><label for="icon-arrows-keyboard-return"><i class="icon-arrows-keyboard-return" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-keyboard" ><input type="radio" name="iconfonts_name" data-name="arrows-keyboard" id="icon-arrows-keyboard-right" value="icon-arrows-keyboard-right"><label for="icon-arrows-keyboard-right"><i class="icon-arrows-keyboard-right" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-keyboard" ><input type="radio" name="iconfonts_name" data-name="arrows-keyboard" id="icon-arrows-keyboard-shift" value="icon-arrows-keyboard-shift"><label for="icon-arrows-keyboard-shift"><i class="icon-arrows-keyboard-shift" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-keyboard" ><input type="radio" name="iconfonts_name" data-name="arrows-keyboard" id="icon-arrows-keyboard-tab" value="icon-arrows-keyboard-tab"><label for="icon-arrows-keyboard-tab"><i class="icon-arrows-keyboard-tab" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-keyboard" ><input type="radio" name="iconfonts_name" data-name="arrows-keyboard" id="icon-arrows-keyboard-up" value="icon-arrows-keyboard-up"><label for="icon-arrows-keyboard-up"><i class="icon-arrows-keyboard-up" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-left" ><input type="radio" name="iconfonts_name" data-name="arrows-left" id="icon-arrows-left" value="icon-arrows-left"><label for="icon-arrows-left"><i class="icon-arrows-left" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-left" ><input type="radio" name="iconfonts_name" data-name="arrows-left" id="icon-arrows-left-double-32" value="icon-arrows-left-double-32"><label for="icon-arrows-left-double-32"><i class="icon-arrows-left-double-32" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-minus" ><input type="radio" name="iconfonts_name" data-name="arrows-minus" id="icon-arrows-minus" value="icon-arrows-minus"><label for="icon-arrows-minus"><i class="icon-arrows-minus" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-move" ><input type="radio" name="iconfonts_name" data-name="arrows-move" id="icon-arrows-move" value="icon-arrows-move"><label for="icon-arrows-move"><i class="icon-arrows-move" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-move2" ><input type="radio" name="iconfonts_name" data-name="arrows-move2" id="icon-arrows-move2" value="icon-arrows-move2"><label for="icon-arrows-move2"><i class="icon-arrows-move2" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-move" ><input type="radio" name="iconfonts_name" data-name="arrows-move" id="icon-arrows-move-bottom" value="icon-arrows-move-bottom"><label for="icon-arrows-move-bottom"><i class="icon-arrows-move-bottom" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-move" ><input type="radio" name="iconfonts_name" data-name="arrows-move" id="icon-arrows-move-left" value="icon-arrows-move-left"><label for="icon-arrows-move-left"><i class="icon-arrows-move-left" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-move" ><input type="radio" name="iconfonts_name" data-name="arrows-move" id="icon-arrows-move-right" value="icon-arrows-move-right"><label for="icon-arrows-move-right"><i class="icon-arrows-move-right" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-move" ><input type="radio" name="iconfonts_name" data-name="arrows-move" id="icon-arrows-move-top" value="icon-arrows-move-top"><label for="icon-arrows-move-top"><i class="icon-arrows-move-top" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-plus" ><input type="radio" name="iconfonts_name" data-name="arrows-plus" id="icon-arrows-plus" value="icon-arrows-plus"><label for="icon-arrows-plus"><i class="icon-arrows-plus" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-question" ><input type="radio" name="iconfonts_name" data-name="arrows-question" id="icon-arrows-question" value="icon-arrows-question"><label for="icon-arrows-question"><i class="icon-arrows-question" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-remove" ><input type="radio" name="iconfonts_name" data-name="arrows-remove" id="icon-arrows-remove" value="icon-arrows-remove"><label for="icon-arrows-remove"><i class="icon-arrows-remove" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-right" ><input type="radio" name="iconfonts_name" data-name="arrows-right" id="icon-arrows-right" value="icon-arrows-right"><label for="icon-arrows-right"><i class="icon-arrows-right" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-right" ><input type="radio" name="iconfonts_name" data-name="arrows-right" id="icon-arrows-right-double" value="icon-arrows-right-double"><label for="icon-arrows-right-double"><i class="icon-arrows-right-double" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-rotate" ><input type="radio" name="iconfonts_name" data-name="arrows-rotate" id="icon-arrows-rotate" value="icon-arrows-rotate"><label for="icon-arrows-rotate"><i class="icon-arrows-rotate" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-rotate" ><input type="radio" name="iconfonts_name" data-name="arrows-rotate" id="icon-arrows-rotate-anti" value="icon-arrows-rotate-anti"><label for="icon-arrows-rotate-anti"><i class="icon-arrows-rotate-anti" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-rotate" ><input type="radio" name="iconfonts_name" data-name="arrows-rotate" id="icon-arrows-rotate-anti-dashed" value="icon-arrows-rotate-anti-dashed"><label for="icon-arrows-rotate-anti-dashed"><i class="icon-arrows-rotate-anti-dashed" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-rotate" ><input type="radio" name="iconfonts_name" data-name="arrows-rotate" id="icon-arrows-rotate-dashed" value="icon-arrows-rotate-dashed"><label for="icon-arrows-rotate-dashed"><i class="icon-arrows-rotate-dashed" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-shrink" ><input type="radio" name="iconfonts_name" data-name="arrows-shrink" id="icon-arrows-shrink" value="icon-arrows-shrink"><label for="icon-arrows-shrink"><i class="icon-arrows-shrink" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-shrink" ><input type="radio" name="iconfonts_name" data-name="arrows-shrink" id="icon-arrows-shrink-diagonal1" value="icon-arrows-shrink-diagonal1"><label for="icon-arrows-shrink-diagonal1"><i class="icon-arrows-shrink-diagonal1" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-shrink" ><input type="radio" name="iconfonts_name" data-name="arrows-shrink" id="icon-arrows-shrink-diagonal2" value="icon-arrows-shrink-diagonal2"><label for="icon-arrows-shrink-diagonal2"><i class="icon-arrows-shrink-diagonal2" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-shrink" ><input type="radio" name="iconfonts_name" data-name="arrows-shrink" id="icon-arrows-shrink-horizonal2" value="icon-arrows-shrink-horizonal2"><label for="icon-arrows-shrink-horizonal2"><i class="icon-arrows-shrink-horizonal2" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-shrink" ><input type="radio" name="iconfonts_name" data-name="arrows-shrink" id="icon-arrows-shrink-horizontal1" value="icon-arrows-shrink-horizontal1"><label for="icon-arrows-shrink-horizontal1"><i class="icon-arrows-shrink-horizontal1" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-shrink" ><input type="radio" name="iconfonts_name" data-name="arrows-shrink" id="icon-arrows-shrink-vertical1" value="icon-arrows-shrink-vertical1"><label for="icon-arrows-shrink-vertical1"><i class="icon-arrows-shrink-vertical1" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-shrink" ><input type="radio" name="iconfonts_name" data-name="arrows-shrink" id="icon-arrows-shrink-vertical2" value="icon-arrows-shrink-vertical2"><label for="icon-arrows-shrink-vertical2"><i class="icon-arrows-shrink-vertical2" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-sign" ><input type="radio" name="iconfonts_name" data-name="arrows-sign" id="icon-arrows-sign-down" value="icon-arrows-sign-down"><label for="icon-arrows-sign-down"><i class="icon-arrows-sign-down" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-sign" ><input type="radio" name="iconfonts_name" data-name="arrows-sign" id="icon-arrows-sign-left" value="icon-arrows-sign-left"><label for="icon-arrows-sign-left"><i class="icon-arrows-sign-left" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-sign" ><input type="radio" name="iconfonts_name" data-name="arrows-sign" id="icon-arrows-sign-right" value="icon-arrows-sign-right"><label for="icon-arrows-sign-right"><i class="icon-arrows-sign-right" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-sign" ><input type="radio" name="iconfonts_name" data-name="arrows-sign" id="icon-arrows-sign-up" value="icon-arrows-sign-up"><label for="icon-arrows-sign-up"><i class="icon-arrows-sign-up" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-slide" ><input type="radio" name="iconfonts_name" data-name="arrows-slide" id="icon-arrows-slide-down1" value="icon-arrows-slide-down1"><label for="icon-arrows-slide-down1"><i class="icon-arrows-slide-down1" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-slide" ><input type="radio" name="iconfonts_name" data-name="arrows-slide" id="icon-arrows-slide-down2" value="icon-arrows-slide-down2"><label for="icon-arrows-slide-down2"><i class="icon-arrows-slide-down2" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-slide" ><input type="radio" name="iconfonts_name" data-name="arrows-slide" id="icon-arrows-slide-left1" value="icon-arrows-slide-left1"><label for="icon-arrows-slide-left1"><i class="icon-arrows-slide-left1" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-slide" ><input type="radio" name="iconfonts_name" data-name="arrows-slide" id="icon-arrows-slide-left2" value="icon-arrows-slide-left2"><label for="icon-arrows-slide-left2"><i class="icon-arrows-slide-left2" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-slide" ><input type="radio" name="iconfonts_name" data-name="arrows-slide" id="icon-arrows-slide-right1" value="icon-arrows-slide-right1"><label for="icon-arrows-slide-right1"><i class="icon-arrows-slide-right1" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-slide" ><input type="radio" name="iconfonts_name" data-name="arrows-slide" id="icon-arrows-slide-right2" value="icon-arrows-slide-right2"><label for="icon-arrows-slide-right2"><i class="icon-arrows-slide-right2" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-slide" ><input type="radio" name="iconfonts_name" data-name="arrows-slide" id="icon-arrows-slide-up1" value="icon-arrows-slide-up1"><label for="icon-arrows-slide-up1"><i class="icon-arrows-slide-up1" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-slide" ><input type="radio" name="iconfonts_name" data-name="arrows-slide" id="icon-arrows-slide-up2" value="icon-arrows-slide-up2"><label for="icon-arrows-slide-up2"><i class="icon-arrows-slide-up2" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-slim" ><input type="radio" name="iconfonts_name" data-name="arrows-slim" id="icon-arrows-slim-down" value="icon-arrows-slim-down"><label for="icon-arrows-slim-down"><i class="icon-arrows-slim-down" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-slim" ><input type="radio" name="iconfonts_name" data-name="arrows-slim" id="icon-arrows-slim-down-dashed" value="icon-arrows-slim-down-dashed"><label for="icon-arrows-slim-down-dashed"><i class="icon-arrows-slim-down-dashed" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-slim" ><input type="radio" name="iconfonts_name" data-name="arrows-slim" id="icon-arrows-slim-left" value="icon-arrows-slim-left"><label for="icon-arrows-slim-left"><i class="icon-arrows-slim-left" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-slim" ><input type="radio" name="iconfonts_name" data-name="arrows-slim" id="icon-arrows-slim-left-dashed" value="icon-arrows-slim-left-dashed"><label for="icon-arrows-slim-left-dashed"><i class="icon-arrows-slim-left-dashed" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-slim" ><input type="radio" name="iconfonts_name" data-name="arrows-slim" id="icon-arrows-slim-right" value="icon-arrows-slim-right"><label for="icon-arrows-slim-right"><i class="icon-arrows-slim-right" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-slim" ><input type="radio" name="iconfonts_name" data-name="arrows-slim" id="icon-arrows-slim-right-dashed" value="icon-arrows-slim-right-dashed"><label for="icon-arrows-slim-right-dashed"><i class="icon-arrows-slim-right-dashed" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-slim" ><input type="radio" name="iconfonts_name" data-name="arrows-slim" id="icon-arrows-slim-up" value="icon-arrows-slim-up"><label for="icon-arrows-slim-up"><i class="icon-arrows-slim-up" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-slim" ><input type="radio" name="iconfonts_name" data-name="arrows-slim" id="icon-arrows-slim-up-dashed" value="icon-arrows-slim-up-dashed"><label for="icon-arrows-slim-up-dashed"><i class="icon-arrows-slim-up-dashed" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-square" ><input type="radio" name="iconfonts_name" data-name="arrows-square" id="icon-arrows-square-check" value="icon-arrows-square-check"><label for="icon-arrows-square-check"><i class="icon-arrows-square-check" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-square" ><input type="radio" name="iconfonts_name" data-name="arrows-square" id="icon-arrows-square-down" value="icon-arrows-square-down"><label for="icon-arrows-square-down"><i class="icon-arrows-square-down" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-square" ><input type="radio" name="iconfonts_name" data-name="arrows-square" id="icon-arrows-square-downleft" value="icon-arrows-square-downleft"><label for="icon-arrows-square-downleft"><i class="icon-arrows-square-downleft" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-square" ><input type="radio" name="iconfonts_name" data-name="arrows-square" id="icon-arrows-square-downright" value="icon-arrows-square-downright"><label for="icon-arrows-square-downright"><i class="icon-arrows-square-downright" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-square" ><input type="radio" name="iconfonts_name" data-name="arrows-square" id="icon-arrows-square-left" value="icon-arrows-square-left"><label for="icon-arrows-square-left"><i class="icon-arrows-square-left" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-square" ><input type="radio" name="iconfonts_name" data-name="arrows-square" id="icon-arrows-square-minus" value="icon-arrows-square-minus"><label for="icon-arrows-square-minus"><i class="icon-arrows-square-minus" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-square" ><input type="radio" name="iconfonts_name" data-name="arrows-square" id="icon-arrows-square-plus" value="icon-arrows-square-plus"><label for="icon-arrows-square-plus"><i class="icon-arrows-square-plus" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-square" ><input type="radio" name="iconfonts_name" data-name="arrows-square" id="icon-arrows-square-remove" value="icon-arrows-square-remove"><label for="icon-arrows-square-remove"><i class="icon-arrows-square-remove" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-square" ><input type="radio" name="iconfonts_name" data-name="arrows-square" id="icon-arrows-square-right" value="icon-arrows-square-right"><label for="icon-arrows-square-right"><i class="icon-arrows-square-right" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-square" ><input type="radio" name="iconfonts_name" data-name="arrows-square" id="icon-arrows-square-up" value="icon-arrows-square-up"><label for="icon-arrows-square-up"><i class="icon-arrows-square-up" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-square" ><input type="radio" name="iconfonts_name" data-name="arrows-square" id="icon-arrows-square-upleft" value="icon-arrows-square-upleft"><label for="icon-arrows-square-upleft"><i class="icon-arrows-square-upleft" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-square" ><input type="radio" name="iconfonts_name" data-name="arrows-square" id="icon-arrows-square-upright" value="icon-arrows-square-upright"><label for="icon-arrows-square-upright"><i class="icon-arrows-square-upright" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-squares" ><input type="radio" name="iconfonts_name" data-name="arrows-squares" id="icon-arrows-squares" value="icon-arrows-squares"><label for="icon-arrows-squares"><i class="icon-arrows-squares" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-stretch" ><input type="radio" name="iconfonts_name" data-name="arrows-stretch" id="icon-arrows-stretch-diagonal1" value="icon-arrows-stretch-diagonal1"><label for="icon-arrows-stretch-diagonal1"><i class="icon-arrows-stretch-diagonal1" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-stretch" ><input type="radio" name="iconfonts_name" data-name="arrows-stretch" id="icon-arrows-stretch-diagonal2" value="icon-arrows-stretch-diagonal2"><label for="icon-arrows-stretch-diagonal2"><i class="icon-arrows-stretch-diagonal2" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-stretch" ><input type="radio" name="iconfonts_name" data-name="arrows-stretch" id="icon-arrows-stretch-diagonal3" value="icon-arrows-stretch-diagonal3"><label for="icon-arrows-stretch-diagonal3"><i class="icon-arrows-stretch-diagonal3" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-stretch" ><input type="radio" name="iconfonts_name" data-name="arrows-stretch" id="icon-arrows-stretch-diagonal4" value="icon-arrows-stretch-diagonal4"><label for="icon-arrows-stretch-diagonal4"><i class="icon-arrows-stretch-diagonal4" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-stretch" ><input type="radio" name="iconfonts_name" data-name="arrows-stretch" id="icon-arrows-stretch-horizontal1" value="icon-arrows-stretch-horizontal1"><label for="icon-arrows-stretch-horizontal1"><i class="icon-arrows-stretch-horizontal1" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-stretch" ><input type="radio" name="iconfonts_name" data-name="arrows-stretch" id="icon-arrows-stretch-horizontal2" value="icon-arrows-stretch-horizontal2"><label for="icon-arrows-stretch-horizontal2"><i class="icon-arrows-stretch-horizontal2" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-stretch" ><input type="radio" name="iconfonts_name" data-name="arrows-stretch" id="icon-arrows-stretch-vertical1" value="icon-arrows-stretch-vertical1"><label for="icon-arrows-stretch-vertical1"><i class="icon-arrows-stretch-vertical1" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-stretch" ><input type="radio" name="iconfonts_name" data-name="arrows-stretch" id="icon-arrows-stretch-vertical2" value="icon-arrows-stretch-vertical2"><label for="icon-arrows-stretch-vertical2"><i class="icon-arrows-stretch-vertical2" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-switch" ><input type="radio" name="iconfonts_name" data-name="arrows-switch" id="icon-arrows-switch-horizontal" value="icon-arrows-switch-horizontal"><label for="icon-arrows-switch-horizontal"><i class="icon-arrows-switch-horizontal" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-switch" ><input type="radio" name="iconfonts_name" data-name="arrows-switch" id="icon-arrows-switch-vertical" value="icon-arrows-switch-vertical"><label for="icon-arrows-switch-vertical"><i class="icon-arrows-switch-vertical" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-up" ><input type="radio" name="iconfonts_name" data-name="arrows-up" id="icon-arrows-up" value="icon-arrows-up"><label for="icon-arrows-up"><i class="icon-arrows-up" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-up" ><input type="radio" name="iconfonts_name" data-name="arrows-up" id="icon-arrows-up-double-33" value="icon-arrows-up-double-33"><label for="icon-arrows-up-double-33"><i class="icon-arrows-up-double-33" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-upleft" ><input type="radio" name="iconfonts_name" data-name="arrows-upleft" id="icon-arrows-upleft" value="icon-arrows-upleft"><label for="icon-arrows-upleft"><i class="icon-arrows-upleft" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-upright" ><input type="radio" name="iconfonts_name" data-name="arrows-upright" id="icon-arrows-upright" value="icon-arrows-upright"><label for="icon-arrows-upright"><i class="icon-arrows-upright" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="arrows-vertical" ><input type="radio" name="iconfonts_name" data-name="arrows-vertical" id="icon-arrows-vertical" value="icon-arrows-vertical"><label for="icon-arrows-vertical"><i class="icon-arrows-vertical" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-bag" ><input type="radio" name="iconfonts_name" data-name="ecommerce-bag" id="icon-ecommerce-bag" value="icon-ecommerce-bag"><label for="icon-ecommerce-bag"><i class="icon-ecommerce-bag" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-bag" ><input type="radio" name="iconfonts_name" data-name="ecommerce-bag" id="icon-ecommerce-bag-check" value="icon-ecommerce-bag-check"><label for="icon-ecommerce-bag-check"><i class="icon-ecommerce-bag-check" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-bag" ><input type="radio" name="iconfonts_name" data-name="ecommerce-bag" id="icon-ecommerce-bag-cloud" value="icon-ecommerce-bag-cloud"><label for="icon-ecommerce-bag-cloud"><i class="icon-ecommerce-bag-cloud" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-bag" ><input type="radio" name="iconfonts_name" data-name="ecommerce-bag" id="icon-ecommerce-bag-download" value="icon-ecommerce-bag-download"><label for="icon-ecommerce-bag-download"><i class="icon-ecommerce-bag-download" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-bag" ><input type="radio" name="iconfonts_name" data-name="ecommerce-bag" id="icon-ecommerce-bag-minus" value="icon-ecommerce-bag-minus"><label for="icon-ecommerce-bag-minus"><i class="icon-ecommerce-bag-minus" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-bag" ><input type="radio" name="iconfonts_name" data-name="ecommerce-bag" id="icon-ecommerce-bag-plus" value="icon-ecommerce-bag-plus"><label for="icon-ecommerce-bag-plus"><i class="icon-ecommerce-bag-plus" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-bag" ><input type="radio" name="iconfonts_name" data-name="ecommerce-bag" id="icon-ecommerce-bag-refresh" value="icon-ecommerce-bag-refresh"><label for="icon-ecommerce-bag-refresh"><i class="icon-ecommerce-bag-refresh" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-bag" ><input type="radio" name="iconfonts_name" data-name="ecommerce-bag" id="icon-ecommerce-bag-remove" value="icon-ecommerce-bag-remove"><label for="icon-ecommerce-bag-remove"><i class="icon-ecommerce-bag-remove" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-bag" ><input type="radio" name="iconfonts_name" data-name="ecommerce-bag" id="icon-ecommerce-bag-search" value="icon-ecommerce-bag-search"><label for="icon-ecommerce-bag-search"><i class="icon-ecommerce-bag-search" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-bag" ><input type="radio" name="iconfonts_name" data-name="ecommerce-bag" id="icon-ecommerce-bag-upload" value="icon-ecommerce-bag-upload"><label for="icon-ecommerce-bag-upload"><i class="icon-ecommerce-bag-upload" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-banknote" ><input type="radio" name="iconfonts_name" data-name="ecommerce-banknote" id="icon-ecommerce-banknote" value="icon-ecommerce-banknote"><label for="icon-ecommerce-banknote"><i class="icon-ecommerce-banknote" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-banknotes" ><input type="radio" name="iconfonts_name" data-name="ecommerce-banknotes" id="icon-ecommerce-banknotes" value="icon-ecommerce-banknotes"><label for="icon-ecommerce-banknotes"><i class="icon-ecommerce-banknotes" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-basket" ><input type="radio" name="iconfonts_name" data-name="ecommerce-basket" id="icon-ecommerce-basket" value="icon-ecommerce-basket"><label for="icon-ecommerce-basket"><i class="icon-ecommerce-basket" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-basket" ><input type="radio" name="iconfonts_name" data-name="ecommerce-basket" id="icon-ecommerce-basket-check" value="icon-ecommerce-basket-check"><label for="icon-ecommerce-basket-check"><i class="icon-ecommerce-basket-check" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-basket" ><input type="radio" name="iconfonts_name" data-name="ecommerce-basket" id="icon-ecommerce-basket-cloud" value="icon-ecommerce-basket-cloud"><label for="icon-ecommerce-basket-cloud"><i class="icon-ecommerce-basket-cloud" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-basket" ><input type="radio" name="iconfonts_name" data-name="ecommerce-basket" id="icon-ecommerce-basket-download" value="icon-ecommerce-basket-download"><label for="icon-ecommerce-basket-download"><i class="icon-ecommerce-basket-download" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-basket" ><input type="radio" name="iconfonts_name" data-name="ecommerce-basket" id="icon-ecommerce-basket-minus" value="icon-ecommerce-basket-minus"><label for="icon-ecommerce-basket-minus"><i class="icon-ecommerce-basket-minus" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-basket" ><input type="radio" name="iconfonts_name" data-name="ecommerce-basket" id="icon-ecommerce-basket-plus" value="icon-ecommerce-basket-plus"><label for="icon-ecommerce-basket-plus"><i class="icon-ecommerce-basket-plus" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-basket" ><input type="radio" name="iconfonts_name" data-name="ecommerce-basket" id="icon-ecommerce-basket-refresh" value="icon-ecommerce-basket-refresh"><label for="icon-ecommerce-basket-refresh"><i class="icon-ecommerce-basket-refresh" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-basket" ><input type="radio" name="iconfonts_name" data-name="ecommerce-basket" id="icon-ecommerce-basket-remove" value="icon-ecommerce-basket-remove"><label for="icon-ecommerce-basket-remove"><i class="icon-ecommerce-basket-remove" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-basket" ><input type="radio" name="iconfonts_name" data-name="ecommerce-basket" id="icon-ecommerce-basket-search" value="icon-ecommerce-basket-search"><label for="icon-ecommerce-basket-search"><i class="icon-ecommerce-basket-search" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-basket" ><input type="radio" name="iconfonts_name" data-name="ecommerce-basket" id="icon-ecommerce-basket-upload" value="icon-ecommerce-basket-upload"><label for="icon-ecommerce-basket-upload"><i class="icon-ecommerce-basket-upload" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-bath" ><input type="radio" name="iconfonts_name" data-name="ecommerce-bath" id="icon-ecommerce-bath" value="icon-ecommerce-bath"><label for="icon-ecommerce-bath"><i class="icon-ecommerce-bath" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-cart" ><input type="radio" name="iconfonts_name" data-name="ecommerce-cart" id="icon-ecommerce-cart" value="icon-ecommerce-cart"><label for="icon-ecommerce-cart"><i class="icon-ecommerce-cart" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-cart" ><input type="radio" name="iconfonts_name" data-name="ecommerce-cart" id="icon-ecommerce-cart-check" value="icon-ecommerce-cart-check"><label for="icon-ecommerce-cart-check"><i class="icon-ecommerce-cart-check" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-cart" ><input type="radio" name="iconfonts_name" data-name="ecommerce-cart" id="icon-ecommerce-cart-cloud" value="icon-ecommerce-cart-cloud"><label for="icon-ecommerce-cart-cloud"><i class="icon-ecommerce-cart-cloud" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-cart" ><input type="radio" name="iconfonts_name" data-name="ecommerce-cart" id="icon-ecommerce-cart-content" value="icon-ecommerce-cart-content"><label for="icon-ecommerce-cart-content"><i class="icon-ecommerce-cart-content" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-cart" ><input type="radio" name="iconfonts_name" data-name="ecommerce-cart" id="icon-ecommerce-cart-download" value="icon-ecommerce-cart-download"><label for="icon-ecommerce-cart-download"><i class="icon-ecommerce-cart-download" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-cart" ><input type="radio" name="iconfonts_name" data-name="ecommerce-cart" id="icon-ecommerce-cart-minus" value="icon-ecommerce-cart-minus"><label for="icon-ecommerce-cart-minus"><i class="icon-ecommerce-cart-minus" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-cart" ><input type="radio" name="iconfonts_name" data-name="ecommerce-cart" id="icon-ecommerce-cart-plus" value="icon-ecommerce-cart-plus"><label for="icon-ecommerce-cart-plus"><i class="icon-ecommerce-cart-plus" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-cart" ><input type="radio" name="iconfonts_name" data-name="ecommerce-cart" id="icon-ecommerce-cart-refresh" value="icon-ecommerce-cart-refresh"><label for="icon-ecommerce-cart-refresh"><i class="icon-ecommerce-cart-refresh" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-cart" ><input type="radio" name="iconfonts_name" data-name="ecommerce-cart" id="icon-ecommerce-cart-remove" value="icon-ecommerce-cart-remove"><label for="icon-ecommerce-cart-remove"><i class="icon-ecommerce-cart-remove" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-cart" ><input type="radio" name="iconfonts_name" data-name="ecommerce-cart" id="icon-ecommerce-cart-search" value="icon-ecommerce-cart-search"><label for="icon-ecommerce-cart-search"><i class="icon-ecommerce-cart-search" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-cart" ><input type="radio" name="iconfonts_name" data-name="ecommerce-cart" id="icon-ecommerce-cart-upload" value="icon-ecommerce-cart-upload"><label for="icon-ecommerce-cart-upload"><i class="icon-ecommerce-cart-upload" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-cent" ><input type="radio" name="iconfonts_name" data-name="ecommerce-cent" id="icon-ecommerce-cent" value="icon-ecommerce-cent"><label for="icon-ecommerce-cent"><i class="icon-ecommerce-cent" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-colon" ><input type="radio" name="iconfonts_name" data-name="ecommerce-colon" id="icon-ecommerce-colon" value="icon-ecommerce-colon"><label for="icon-ecommerce-colon"><i class="icon-ecommerce-colon" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-creditcard" ><input type="radio" name="iconfonts_name" data-name="ecommerce-creditcard" id="icon-ecommerce-creditcard" value="icon-ecommerce-creditcard"><label for="icon-ecommerce-creditcard"><i class="icon-ecommerce-creditcard" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-diamond" ><input type="radio" name="iconfonts_name" data-name="ecommerce-diamond" id="icon-ecommerce-diamond" value="icon-ecommerce-diamond"><label for="icon-ecommerce-diamond"><i class="icon-ecommerce-diamond" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-dollar" ><input type="radio" name="iconfonts_name" data-name="ecommerce-dollar" id="icon-ecommerce-dollar" value="icon-ecommerce-dollar"><label for="icon-ecommerce-dollar"><i class="icon-ecommerce-dollar" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-euro" ><input type="radio" name="iconfonts_name" data-name="ecommerce-euro" id="icon-ecommerce-euro" value="icon-ecommerce-euro"><label for="icon-ecommerce-euro"><i class="icon-ecommerce-euro" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-franc" ><input type="radio" name="iconfonts_name" data-name="ecommerce-franc" id="icon-ecommerce-franc" value="icon-ecommerce-franc"><label for="icon-ecommerce-franc"><i class="icon-ecommerce-franc" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-gift" ><input type="radio" name="iconfonts_name" data-name="ecommerce-gift" id="icon-ecommerce-gift" value="icon-ecommerce-gift"><label for="icon-ecommerce-gift"><i class="icon-ecommerce-gift" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-graph1" ><input type="radio" name="iconfonts_name" data-name="ecommerce-graph1" id="icon-ecommerce-graph1" value="icon-ecommerce-graph1"><label for="icon-ecommerce-graph1"><i class="icon-ecommerce-graph1" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-graph2" ><input type="radio" name="iconfonts_name" data-name="ecommerce-graph2" id="icon-ecommerce-graph2" value="icon-ecommerce-graph2"><label for="icon-ecommerce-graph2"><i class="icon-ecommerce-graph2" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-graph3" ><input type="radio" name="iconfonts_name" data-name="ecommerce-graph3" id="icon-ecommerce-graph3" value="icon-ecommerce-graph3"><label for="icon-ecommerce-graph3"><i class="icon-ecommerce-graph3" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-graph" ><input type="radio" name="iconfonts_name" data-name="ecommerce-graph" id="icon-ecommerce-graph-decrease" value="icon-ecommerce-graph-decrease"><label for="icon-ecommerce-graph-decrease"><i class="icon-ecommerce-graph-decrease" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-graph" ><input type="radio" name="iconfonts_name" data-name="ecommerce-graph" id="icon-ecommerce-graph-increase" value="icon-ecommerce-graph-increase"><label for="icon-ecommerce-graph-increase"><i class="icon-ecommerce-graph-increase" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-guarani" ><input type="radio" name="iconfonts_name" data-name="ecommerce-guarani" id="icon-ecommerce-guarani" value="icon-ecommerce-guarani"><label for="icon-ecommerce-guarani"><i class="icon-ecommerce-guarani" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-kips" ><input type="radio" name="iconfonts_name" data-name="ecommerce-kips" id="icon-ecommerce-kips" value="icon-ecommerce-kips"><label for="icon-ecommerce-kips"><i class="icon-ecommerce-kips" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-lira" ><input type="radio" name="iconfonts_name" data-name="ecommerce-lira" id="icon-ecommerce-lira" value="icon-ecommerce-lira"><label for="icon-ecommerce-lira"><i class="icon-ecommerce-lira" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-megaphone" ><input type="radio" name="iconfonts_name" data-name="ecommerce-megaphone" id="icon-ecommerce-megaphone" value="icon-ecommerce-megaphone"><label for="icon-ecommerce-megaphone"><i class="icon-ecommerce-megaphone" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-money" ><input type="radio" name="iconfonts_name" data-name="ecommerce-money" id="icon-ecommerce-money" value="icon-ecommerce-money"><label for="icon-ecommerce-money"><i class="icon-ecommerce-money" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-naira" ><input type="radio" name="iconfonts_name" data-name="ecommerce-naira" id="icon-ecommerce-naira" value="icon-ecommerce-naira"><label for="icon-ecommerce-naira"><i class="icon-ecommerce-naira" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-pesos" ><input type="radio" name="iconfonts_name" data-name="ecommerce-pesos" id="icon-ecommerce-pesos" value="icon-ecommerce-pesos"><label for="icon-ecommerce-pesos"><i class="icon-ecommerce-pesos" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-pound" ><input type="radio" name="iconfonts_name" data-name="ecommerce-pound" id="icon-ecommerce-pound" value="icon-ecommerce-pound"><label for="icon-ecommerce-pound"><i class="icon-ecommerce-pound" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-receipt" ><input type="radio" name="iconfonts_name" data-name="ecommerce-receipt" id="icon-ecommerce-receipt" value="icon-ecommerce-receipt"><label for="icon-ecommerce-receipt"><i class="icon-ecommerce-receipt" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-receipt" ><input type="radio" name="iconfonts_name" data-name="ecommerce-receipt" id="icon-ecommerce-receipt-bath" value="icon-ecommerce-receipt-bath"><label for="icon-ecommerce-receipt-bath"><i class="icon-ecommerce-receipt-bath" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-receipt" ><input type="radio" name="iconfonts_name" data-name="ecommerce-receipt" id="icon-ecommerce-receipt-cent" value="icon-ecommerce-receipt-cent"><label for="icon-ecommerce-receipt-cent"><i class="icon-ecommerce-receipt-cent" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-receipt" ><input type="radio" name="iconfonts_name" data-name="ecommerce-receipt" id="icon-ecommerce-receipt-dollar" value="icon-ecommerce-receipt-dollar"><label for="icon-ecommerce-receipt-dollar"><i class="icon-ecommerce-receipt-dollar" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-receipt" ><input type="radio" name="iconfonts_name" data-name="ecommerce-receipt" id="icon-ecommerce-receipt-euro" value="icon-ecommerce-receipt-euro"><label for="icon-ecommerce-receipt-euro"><i class="icon-ecommerce-receipt-euro" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-receipt" ><input type="radio" name="iconfonts_name" data-name="ecommerce-receipt" id="icon-ecommerce-receipt-franc" value="icon-ecommerce-receipt-franc"><label for="icon-ecommerce-receipt-franc"><i class="icon-ecommerce-receipt-franc" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-receipt" ><input type="radio" name="iconfonts_name" data-name="ecommerce-receipt" id="icon-ecommerce-receipt-guarani" value="icon-ecommerce-receipt-guarani"><label for="icon-ecommerce-receipt-guarani"><i class="icon-ecommerce-receipt-guarani" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-receipt" ><input type="radio" name="iconfonts_name" data-name="ecommerce-receipt" id="icon-ecommerce-receipt-kips" value="icon-ecommerce-receipt-kips"><label for="icon-ecommerce-receipt-kips"><i class="icon-ecommerce-receipt-kips" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-receipt" ><input type="radio" name="iconfonts_name" data-name="ecommerce-receipt" id="icon-ecommerce-receipt-lira" value="icon-ecommerce-receipt-lira"><label for="icon-ecommerce-receipt-lira"><i class="icon-ecommerce-receipt-lira" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-receipt" ><input type="radio" name="iconfonts_name" data-name="ecommerce-receipt" id="icon-ecommerce-receipt-naira" value="icon-ecommerce-receipt-naira"><label for="icon-ecommerce-receipt-naira"><i class="icon-ecommerce-receipt-naira" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-receipt" ><input type="radio" name="iconfonts_name" data-name="ecommerce-receipt" id="icon-ecommerce-receipt-pesos" value="icon-ecommerce-receipt-pesos"><label for="icon-ecommerce-receipt-pesos"><i class="icon-ecommerce-receipt-pesos" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-receipt" ><input type="radio" name="iconfonts_name" data-name="ecommerce-receipt" id="icon-ecommerce-receipt-pound" value="icon-ecommerce-receipt-pound"><label for="icon-ecommerce-receipt-pound"><i class="icon-ecommerce-receipt-pound" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-receipt" ><input type="radio" name="iconfonts_name" data-name="ecommerce-receipt" id="icon-ecommerce-receipt-rublo" value="icon-ecommerce-receipt-rublo"><label for="icon-ecommerce-receipt-rublo"><i class="icon-ecommerce-receipt-rublo" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-receipt" ><input type="radio" name="iconfonts_name" data-name="ecommerce-receipt" id="icon-ecommerce-receipt-rupee" value="icon-ecommerce-receipt-rupee"><label for="icon-ecommerce-receipt-rupee"><i class="icon-ecommerce-receipt-rupee" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-receipt" ><input type="radio" name="iconfonts_name" data-name="ecommerce-receipt" id="icon-ecommerce-receipt-tugrik" value="icon-ecommerce-receipt-tugrik"><label for="icon-ecommerce-receipt-tugrik"><i class="icon-ecommerce-receipt-tugrik" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-receipt" ><input type="radio" name="iconfonts_name" data-name="ecommerce-receipt" id="icon-ecommerce-receipt-won" value="icon-ecommerce-receipt-won"><label for="icon-ecommerce-receipt-won"><i class="icon-ecommerce-receipt-won" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-receipt" ><input type="radio" name="iconfonts_name" data-name="ecommerce-receipt" id="icon-ecommerce-receipt-yen" value="icon-ecommerce-receipt-yen"><label for="icon-ecommerce-receipt-yen"><i class="icon-ecommerce-receipt-yen" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-receipt" ><input type="radio" name="iconfonts_name" data-name="ecommerce-receipt" id="icon-ecommerce-receipt-yen2" value="icon-ecommerce-receipt-yen2"><label for="icon-ecommerce-receipt-yen2"><i class="icon-ecommerce-receipt-yen2" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-recept" ><input type="radio" name="iconfonts_name" data-name="ecommerce-recept" id="icon-ecommerce-recept-colon" value="icon-ecommerce-recept-colon"><label for="icon-ecommerce-recept-colon"><i class="icon-ecommerce-recept-colon" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-rublo" ><input type="radio" name="iconfonts_name" data-name="ecommerce-rublo" id="icon-ecommerce-rublo" value="icon-ecommerce-rublo"><label for="icon-ecommerce-rublo"><i class="icon-ecommerce-rublo" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-rupee" ><input type="radio" name="iconfonts_name" data-name="ecommerce-rupee" id="icon-ecommerce-rupee" value="icon-ecommerce-rupee"><label for="icon-ecommerce-rupee"><i class="icon-ecommerce-rupee" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-safe" ><input type="radio" name="iconfonts_name" data-name="ecommerce-safe" id="icon-ecommerce-safe" value="icon-ecommerce-safe"><label for="icon-ecommerce-safe"><i class="icon-ecommerce-safe" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-sale" ><input type="radio" name="iconfonts_name" data-name="ecommerce-sale" id="icon-ecommerce-sale" value="icon-ecommerce-sale"><label for="icon-ecommerce-sale"><i class="icon-ecommerce-sale" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-sales" ><input type="radio" name="iconfonts_name" data-name="ecommerce-sales" id="icon-ecommerce-sales" value="icon-ecommerce-sales"><label for="icon-ecommerce-sales"><i class="icon-ecommerce-sales" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-ticket" ><input type="radio" name="iconfonts_name" data-name="ecommerce-ticket" id="icon-ecommerce-ticket" value="icon-ecommerce-ticket"><label for="icon-ecommerce-ticket"><i class="icon-ecommerce-ticket" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-tugriks" ><input type="radio" name="iconfonts_name" data-name="ecommerce-tugriks" id="icon-ecommerce-tugriks" value="icon-ecommerce-tugriks"><label for="icon-ecommerce-tugriks"><i class="icon-ecommerce-tugriks" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-wallet" ><input type="radio" name="iconfonts_name" data-name="ecommerce-wallet" id="icon-ecommerce-wallet" value="icon-ecommerce-wallet"><label for="icon-ecommerce-wallet"><i class="icon-ecommerce-wallet" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-won" ><input type="radio" name="iconfonts_name" data-name="ecommerce-won" id="icon-ecommerce-won" value="icon-ecommerce-won"><label for="icon-ecommerce-won"><i class="icon-ecommerce-won" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-yen" ><input type="radio" name="iconfonts_name" data-name="ecommerce-yen" id="icon-ecommerce-yen" value="icon-ecommerce-yen"><label for="icon-ecommerce-yen"><i class="icon-ecommerce-yen" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ecommerce-yen2" ><input type="radio" name="iconfonts_name" data-name="ecommerce-yen2" id="icon-ecommerce-yen2" value="icon-ecommerce-yen2"><label for="icon-ecommerce-yen2"><i class="icon-ecommerce-yen2" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-accelerator" ><input type="radio" name="iconfonts_name" data-name="basic-accelerator" id="icon-basic-accelerator" value="icon-basic-accelerator"><label for="icon-basic-accelerator"><i class="icon-basic-accelerator" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-alarm" ><input type="radio" name="iconfonts_name" data-name="basic-alarm" id="icon-basic-alarm" value="icon-basic-alarm"><label for="icon-basic-alarm"><i class="icon-basic-alarm" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-anchor" ><input type="radio" name="iconfonts_name" data-name="basic-anchor" id="icon-basic-anchor" value="icon-basic-anchor"><label for="icon-basic-anchor"><i class="icon-basic-anchor" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-anticlockwise" ><input type="radio" name="iconfonts_name" data-name="basic-anticlockwise" id="icon-basic-anticlockwise" value="icon-basic-anticlockwise"><label for="icon-basic-anticlockwise"><i class="icon-basic-anticlockwise" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-archive" ><input type="radio" name="iconfonts_name" data-name="basic-archive" id="icon-basic-archive" value="icon-basic-archive"><label for="icon-basic-archive"><i class="icon-basic-archive" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-archive" ><input type="radio" name="iconfonts_name" data-name="basic-archive" id="icon-basic-archive-full" value="icon-basic-archive-full"><label for="icon-basic-archive-full"><i class="icon-basic-archive-full" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-ban" ><input type="radio" name="iconfonts_name" data-name="basic-ban" id="icon-basic-ban" value="icon-basic-ban"><label for="icon-basic-ban"><i class="icon-basic-ban" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-battery" ><input type="radio" name="iconfonts_name" data-name="basic-battery" id="icon-basic-battery-charge" value="icon-basic-battery-charge"><label for="icon-basic-battery-charge"><i class="icon-basic-battery-charge" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-battery" ><input type="radio" name="iconfonts_name" data-name="basic-battery" id="icon-basic-battery-empty" value="icon-basic-battery-empty"><label for="icon-basic-battery-empty"><i class="icon-basic-battery-empty" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-battery" ><input type="radio" name="iconfonts_name" data-name="basic-battery" id="icon-basic-battery-full" value="icon-basic-battery-full"><label for="icon-basic-battery-full"><i class="icon-basic-battery-full" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-battery" ><input type="radio" name="iconfonts_name" data-name="basic-battery" id="icon-basic-battery-half" value="icon-basic-battery-half"><label for="icon-basic-battery-half"><i class="icon-basic-battery-half" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-bolt" ><input type="radio" name="iconfonts_name" data-name="basic-bolt" id="icon-basic-bolt" value="icon-basic-bolt"><label for="icon-basic-bolt"><i class="icon-basic-bolt" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-book" ><input type="radio" name="iconfonts_name" data-name="basic-book" id="icon-basic-book" value="icon-basic-book"><label for="icon-basic-book"><i class="icon-basic-book" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-book" ><input type="radio" name="iconfonts_name" data-name="basic-book" id="icon-basic-book-pen" value="icon-basic-book-pen"><label for="icon-basic-book-pen"><i class="icon-basic-book-pen" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-book" ><input type="radio" name="iconfonts_name" data-name="basic-book" id="icon-basic-book-pencil" value="icon-basic-book-pencil"><label for="icon-basic-book-pencil"><i class="icon-basic-book-pencil" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-bookmark" ><input type="radio" name="iconfonts_name" data-name="basic-bookmark" id="icon-basic-bookmark" value="icon-basic-bookmark"><label for="icon-basic-bookmark"><i class="icon-basic-bookmark" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-calculator" ><input type="radio" name="iconfonts_name" data-name="basic-calculator" id="icon-basic-calculator" value="icon-basic-calculator"><label for="icon-basic-calculator"><i class="icon-basic-calculator" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-calendar" ><input type="radio" name="iconfonts_name" data-name="basic-calendar" id="icon-basic-calendar" value="icon-basic-calendar"><label for="icon-basic-calendar"><i class="icon-basic-calendar" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-cards" ><input type="radio" name="iconfonts_name" data-name="basic-cards" id="icon-basic-cards-diamonds" value="icon-basic-cards-diamonds"><label for="icon-basic-cards-diamonds"><i class="icon-basic-cards-diamonds" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-cards" ><input type="radio" name="iconfonts_name" data-name="basic-cards" id="icon-basic-cards-hearts" value="icon-basic-cards-hearts"><label for="icon-basic-cards-hearts"><i class="icon-basic-cards-hearts" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-case" ><input type="radio" name="iconfonts_name" data-name="basic-case" id="icon-basic-case" value="icon-basic-case"><label for="icon-basic-case"><i class="icon-basic-case" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-chronometer" ><input type="radio" name="iconfonts_name" data-name="basic-chronometer" id="icon-basic-chronometer" value="icon-basic-chronometer"><label for="icon-basic-chronometer"><i class="icon-basic-chronometer" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-clessidre" ><input type="radio" name="iconfonts_name" data-name="basic-clessidre" id="icon-basic-clessidre" value="icon-basic-clessidre"><label for="icon-basic-clessidre"><i class="icon-basic-clessidre" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-clock" ><input type="radio" name="iconfonts_name" data-name="basic-clock" id="icon-basic-clock" value="icon-basic-clock"><label for="icon-basic-clock"><i class="icon-basic-clock" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-clockwise" ><input type="radio" name="iconfonts_name" data-name="basic-clockwise" id="icon-basic-clockwise" value="icon-basic-clockwise"><label for="icon-basic-clockwise"><i class="icon-basic-clockwise" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-cloud" ><input type="radio" name="iconfonts_name" data-name="basic-cloud" id="icon-basic-cloud" value="icon-basic-cloud"><label for="icon-basic-cloud"><i class="icon-basic-cloud" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-clubs" ><input type="radio" name="iconfonts_name" data-name="basic-clubs" id="icon-basic-clubs" value="icon-basic-clubs"><label for="icon-basic-clubs"><i class="icon-basic-clubs" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-compass" ><input type="radio" name="iconfonts_name" data-name="basic-compass" id="icon-basic-compass" value="icon-basic-compass"><label for="icon-basic-compass"><i class="icon-basic-compass" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-cup" ><input type="radio" name="iconfonts_name" data-name="basic-cup" id="icon-basic-cup" value="icon-basic-cup"><label for="icon-basic-cup"><i class="icon-basic-cup" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-diamonds" ><input type="radio" name="iconfonts_name" data-name="basic-diamonds" id="icon-basic-diamonds" value="icon-basic-diamonds"><label for="icon-basic-diamonds"><i class="icon-basic-diamonds" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-display" ><input type="radio" name="iconfonts_name" data-name="basic-display" id="icon-basic-display" value="icon-basic-display"><label for="icon-basic-display"><i class="icon-basic-display" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-download" ><input type="radio" name="iconfonts_name" data-name="basic-download" id="icon-basic-download" value="icon-basic-download"><label for="icon-basic-download"><i class="icon-basic-download" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-exclamation" ><input type="radio" name="iconfonts_name" data-name="basic-exclamation" id="icon-basic-exclamation" value="icon-basic-exclamation"><label for="icon-basic-exclamation"><i class="icon-basic-exclamation" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-eye" ><input type="radio" name="iconfonts_name" data-name="basic-eye" id="icon-basic-eye" value="icon-basic-eye"><label for="icon-basic-eye"><i class="icon-basic-eye" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-eye" ><input type="radio" name="iconfonts_name" data-name="basic-eye" id="icon-basic-eye-closed" value="icon-basic-eye-closed"><label for="icon-basic-eye-closed"><i class="icon-basic-eye-closed" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-female" ><input type="radio" name="iconfonts_name" data-name="basic-female" id="icon-basic-female" value="icon-basic-female"><label for="icon-basic-female"><i class="icon-basic-female" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-flag1" ><input type="radio" name="iconfonts_name" data-name="basic-flag1" id="icon-basic-flag1" value="icon-basic-flag1"><label for="icon-basic-flag1"><i class="icon-basic-flag1" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-flag2" ><input type="radio" name="iconfonts_name" data-name="basic-flag2" id="icon-basic-flag2" value="icon-basic-flag2"><label for="icon-basic-flag2"><i class="icon-basic-flag2" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-floppydisk" ><input type="radio" name="iconfonts_name" data-name="basic-floppydisk" id="icon-basic-floppydisk" value="icon-basic-floppydisk"><label for="icon-basic-floppydisk"><i class="icon-basic-floppydisk" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-folder" ><input type="radio" name="iconfonts_name" data-name="basic-folder" id="icon-basic-folder" value="icon-basic-folder"><label for="icon-basic-folder"><i class="icon-basic-folder" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-folder" ><input type="radio" name="iconfonts_name" data-name="basic-folder" id="icon-basic-folder-multiple" value="icon-basic-folder-multiple"><label for="icon-basic-folder-multiple"><i class="icon-basic-folder-multiple" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-gear" ><input type="radio" name="iconfonts_name" data-name="basic-gear" id="icon-basic-gear" value="icon-basic-gear"><label for="icon-basic-gear"><i class="icon-basic-gear" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-geolocalize" ><input type="radio" name="iconfonts_name" data-name="basic-geolocalize" id="icon-basic-geolocalize-01" value="icon-basic-geolocalize-01"><label for="icon-basic-geolocalize-01"><i class="icon-basic-geolocalize-01" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-geolocalize" ><input type="radio" name="iconfonts_name" data-name="basic-geolocalize" id="icon-basic-geolocalize-05" value="icon-basic-geolocalize-05"><label for="icon-basic-geolocalize-05"><i class="icon-basic-geolocalize-05" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-globe" ><input type="radio" name="iconfonts_name" data-name="basic-globe" id="icon-basic-globe" value="icon-basic-globe"><label for="icon-basic-globe"><i class="icon-basic-globe" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-gunsight" ><input type="radio" name="iconfonts_name" data-name="basic-gunsight" id="icon-basic-gunsight" value="icon-basic-gunsight"><label for="icon-basic-gunsight"><i class="icon-basic-gunsight" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-hammer" ><input type="radio" name="iconfonts_name" data-name="basic-hammer" id="icon-basic-hammer" value="icon-basic-hammer"><label for="icon-basic-hammer"><i class="icon-basic-hammer" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-headset" ><input type="radio" name="iconfonts_name" data-name="basic-headset" id="icon-basic-headset" value="icon-basic-headset"><label for="icon-basic-headset"><i class="icon-basic-headset" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-heart" ><input type="radio" name="iconfonts_name" data-name="basic-heart" id="icon-basic-heart" value="icon-basic-heart"><label for="icon-basic-heart"><i class="icon-basic-heart" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-heart" ><input type="radio" name="iconfonts_name" data-name="basic-heart" id="icon-basic-heart-broken" value="icon-basic-heart-broken"><label for="icon-basic-heart-broken"><i class="icon-basic-heart-broken" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-helm" ><input type="radio" name="iconfonts_name" data-name="basic-helm" id="icon-basic-helm" value="icon-basic-helm"><label for="icon-basic-helm"><i class="icon-basic-helm" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-home" ><input type="radio" name="iconfonts_name" data-name="basic-home" id="icon-basic-home" value="icon-basic-home"><label for="icon-basic-home"><i class="icon-basic-home" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-info" ><input type="radio" name="iconfonts_name" data-name="basic-info" id="icon-basic-info" value="icon-basic-info"><label for="icon-basic-info"><i class="icon-basic-info" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-ipod" ><input type="radio" name="iconfonts_name" data-name="basic-ipod" id="icon-basic-ipod" value="icon-basic-ipod"><label for="icon-basic-ipod"><i class="icon-basic-ipod" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-joypad" ><input type="radio" name="iconfonts_name" data-name="basic-joypad" id="icon-basic-joypad" value="icon-basic-joypad"><label for="icon-basic-joypad"><i class="icon-basic-joypad" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-key" ><input type="radio" name="iconfonts_name" data-name="basic-key" id="icon-basic-key" value="icon-basic-key"><label for="icon-basic-key"><i class="icon-basic-key" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-keyboard" ><input type="radio" name="iconfonts_name" data-name="basic-keyboard" id="icon-basic-keyboard" value="icon-basic-keyboard"><label for="icon-basic-keyboard"><i class="icon-basic-keyboard" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-laptop" ><input type="radio" name="iconfonts_name" data-name="basic-laptop" id="icon-basic-laptop" value="icon-basic-laptop"><label for="icon-basic-laptop"><i class="icon-basic-laptop" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-life" ><input type="radio" name="iconfonts_name" data-name="basic-life" id="icon-basic-life-buoy" value="icon-basic-life-buoy"><label for="icon-basic-life-buoy"><i class="icon-basic-life-buoy" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-lightbulb" ><input type="radio" name="iconfonts_name" data-name="basic-lightbulb" id="icon-basic-lightbulb" value="icon-basic-lightbulb"><label for="icon-basic-lightbulb"><i class="icon-basic-lightbulb" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-link" ><input type="radio" name="iconfonts_name" data-name="basic-link" id="icon-basic-link" value="icon-basic-link"><label for="icon-basic-link"><i class="icon-basic-link" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-lock" ><input type="radio" name="iconfonts_name" data-name="basic-lock" id="icon-basic-lock" value="icon-basic-lock"><label for="icon-basic-lock"><i class="icon-basic-lock" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-lock" ><input type="radio" name="iconfonts_name" data-name="basic-lock" id="icon-basic-lock-open" value="icon-basic-lock-open"><label for="icon-basic-lock-open"><i class="icon-basic-lock-open" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-magic" ><input type="radio" name="iconfonts_name" data-name="basic-magic" id="icon-basic-magic-mouse" value="icon-basic-magic-mouse"><label for="icon-basic-magic-mouse"><i class="icon-basic-magic-mouse" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-magnifier" ><input type="radio" name="iconfonts_name" data-name="basic-magnifier" id="icon-basic-magnifier" value="icon-basic-magnifier"><label for="icon-basic-magnifier"><i class="icon-basic-magnifier" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-magnifier" ><input type="radio" name="iconfonts_name" data-name="basic-magnifier" id="icon-basic-magnifier-minus" value="icon-basic-magnifier-minus"><label for="icon-basic-magnifier-minus"><i class="icon-basic-magnifier-minus" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-magnifier" ><input type="radio" name="iconfonts_name" data-name="basic-magnifier" id="icon-basic-magnifier-plus" value="icon-basic-magnifier-plus"><label for="icon-basic-magnifier-plus"><i class="icon-basic-magnifier-plus" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-mail" ><input type="radio" name="iconfonts_name" data-name="basic-mail" id="icon-basic-mail" value="icon-basic-mail"><label for="icon-basic-mail"><i class="icon-basic-mail" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-mail" ><input type="radio" name="iconfonts_name" data-name="basic-mail" id="icon-basic-mail-multiple" value="icon-basic-mail-multiple"><label for="icon-basic-mail-multiple"><i class="icon-basic-mail-multiple" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-mail" ><input type="radio" name="iconfonts_name" data-name="basic-mail" id="icon-basic-mail-open" value="icon-basic-mail-open"><label for="icon-basic-mail-open"><i class="icon-basic-mail-open" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-mail" ><input type="radio" name="iconfonts_name" data-name="basic-mail" id="icon-basic-mail-open-text" value="icon-basic-mail-open-text"><label for="icon-basic-mail-open-text"><i class="icon-basic-mail-open-text" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-male" ><input type="radio" name="iconfonts_name" data-name="basic-male" id="icon-basic-male" value="icon-basic-male"><label for="icon-basic-male"><i class="icon-basic-male" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-map" ><input type="radio" name="iconfonts_name" data-name="basic-map" id="icon-basic-map" value="icon-basic-map"><label for="icon-basic-map"><i class="icon-basic-map" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-message" ><input type="radio" name="iconfonts_name" data-name="basic-message" id="icon-basic-message" value="icon-basic-message"><label for="icon-basic-message"><i class="icon-basic-message" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-message" ><input type="radio" name="iconfonts_name" data-name="basic-message" id="icon-basic-message-multiple" value="icon-basic-message-multiple"><label for="icon-basic-message-multiple"><i class="icon-basic-message-multiple" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-message" ><input type="radio" name="iconfonts_name" data-name="basic-message" id="icon-basic-message-txt" value="icon-basic-message-txt"><label for="icon-basic-message-txt"><i class="icon-basic-message-txt" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-mixer2" ><input type="radio" name="iconfonts_name" data-name="basic-mixer2" id="icon-basic-mixer2" value="icon-basic-mixer2"><label for="icon-basic-mixer2"><i class="icon-basic-mixer2" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-mouse" ><input type="radio" name="iconfonts_name" data-name="basic-mouse" id="icon-basic-mouse" value="icon-basic-mouse"><label for="icon-basic-mouse"><i class="icon-basic-mouse" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-notebook" ><input type="radio" name="iconfonts_name" data-name="basic-notebook" id="icon-basic-notebook" value="icon-basic-notebook"><label for="icon-basic-notebook"><i class="icon-basic-notebook" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-notebook" ><input type="radio" name="iconfonts_name" data-name="basic-notebook" id="icon-basic-notebook-pen" value="icon-basic-notebook-pen"><label for="icon-basic-notebook-pen"><i class="icon-basic-notebook-pen" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-notebook" ><input type="radio" name="iconfonts_name" data-name="basic-notebook" id="icon-basic-notebook-pencil" value="icon-basic-notebook-pencil"><label for="icon-basic-notebook-pencil"><i class="icon-basic-notebook-pencil" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-paperplane" ><input type="radio" name="iconfonts_name" data-name="basic-paperplane" id="icon-basic-paperplane" value="icon-basic-paperplane"><label for="icon-basic-paperplane"><i class="icon-basic-paperplane" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-pencil" ><input type="radio" name="iconfonts_name" data-name="basic-pencil" id="icon-basic-pencil-ruler" value="icon-basic-pencil-ruler"><label for="icon-basic-pencil-ruler"><i class="icon-basic-pencil-ruler" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-pencil" ><input type="radio" name="iconfonts_name" data-name="basic-pencil" id="icon-basic-pencil-ruler-pen" value="icon-basic-pencil-ruler-pen"><label for="icon-basic-pencil-ruler-pen"><i class="icon-basic-pencil-ruler-pen" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-photo" ><input type="radio" name="iconfonts_name" data-name="basic-photo" id="icon-basic-photo" value="icon-basic-photo"><label for="icon-basic-photo"><i class="icon-basic-photo" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-picture" ><input type="radio" name="iconfonts_name" data-name="basic-picture" id="icon-basic-picture" value="icon-basic-picture"><label for="icon-basic-picture"><i class="icon-basic-picture" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-picture" ><input type="radio" name="iconfonts_name" data-name="basic-picture" id="icon-basic-picture-multiple" value="icon-basic-picture-multiple"><label for="icon-basic-picture-multiple"><i class="icon-basic-picture-multiple" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-pin1" ><input type="radio" name="iconfonts_name" data-name="basic-pin1" id="icon-basic-pin1" value="icon-basic-pin1"><label for="icon-basic-pin1"><i class="icon-basic-pin1" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-pin2" ><input type="radio" name="iconfonts_name" data-name="basic-pin2" id="icon-basic-pin2" value="icon-basic-pin2"><label for="icon-basic-pin2"><i class="icon-basic-pin2" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-postcard" ><input type="radio" name="iconfonts_name" data-name="basic-postcard" id="icon-basic-postcard" value="icon-basic-postcard"><label for="icon-basic-postcard"><i class="icon-basic-postcard" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-postcard" ><input type="radio" name="iconfonts_name" data-name="basic-postcard" id="icon-basic-postcard-multiple" value="icon-basic-postcard-multiple"><label for="icon-basic-postcard-multiple"><i class="icon-basic-postcard-multiple" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-printer" ><input type="radio" name="iconfonts_name" data-name="basic-printer" id="icon-basic-printer" value="icon-basic-printer"><label for="icon-basic-printer"><i class="icon-basic-printer" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-question" ><input type="radio" name="iconfonts_name" data-name="basic-question" id="icon-basic-question" value="icon-basic-question"><label for="icon-basic-question"><i class="icon-basic-question" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-rss" ><input type="radio" name="iconfonts_name" data-name="basic-rss" id="icon-basic-rss" value="icon-basic-rss"><label for="icon-basic-rss"><i class="icon-basic-rss" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-server" ><input type="radio" name="iconfonts_name" data-name="basic-server" id="icon-basic-server" value="icon-basic-server"><label for="icon-basic-server"><i class="icon-basic-server" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-server2" ><input type="radio" name="iconfonts_name" data-name="basic-server2" id="icon-basic-server2" value="icon-basic-server2"><label for="icon-basic-server2"><i class="icon-basic-server2" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-server" ><input type="radio" name="iconfonts_name" data-name="basic-server" id="icon-basic-server-cloud" value="icon-basic-server-cloud"><label for="icon-basic-server-cloud"><i class="icon-basic-server-cloud" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-server" ><input type="radio" name="iconfonts_name" data-name="basic-server" id="icon-basic-server-download" value="icon-basic-server-download"><label for="icon-basic-server-download"><i class="icon-basic-server-download" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-server" ><input type="radio" name="iconfonts_name" data-name="basic-server" id="icon-basic-server-upload" value="icon-basic-server-upload"><label for="icon-basic-server-upload"><i class="icon-basic-server-upload" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-settings" ><input type="radio" name="iconfonts_name" data-name="basic-settings" id="icon-basic-settings" value="icon-basic-settings"><label for="icon-basic-settings"><i class="icon-basic-settings" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-share" ><input type="radio" name="iconfonts_name" data-name="basic-share" id="icon-basic-share" value="icon-basic-share"><label for="icon-basic-share"><i class="icon-basic-share" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-sheet" ><input type="radio" name="iconfonts_name" data-name="basic-sheet" id="icon-basic-sheet" value="icon-basic-sheet"><label for="icon-basic-sheet"><i class="icon-basic-sheet" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-sheet" ><input type="radio" name="iconfonts_name" data-name="basic-sheet" id="icon-basic-sheet-multiple" value="icon-basic-sheet-multiple"><label for="icon-basic-sheet-multiple"><i class="icon-basic-sheet-multiple" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-sheet" ><input type="radio" name="iconfonts_name" data-name="basic-sheet" id="icon-basic-sheet-pen" value="icon-basic-sheet-pen"><label for="icon-basic-sheet-pen"><i class="icon-basic-sheet-pen" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-sheet" ><input type="radio" name="iconfonts_name" data-name="basic-sheet" id="icon-basic-sheet-pencil" value="icon-basic-sheet-pencil"><label for="icon-basic-sheet-pencil"><i class="icon-basic-sheet-pencil" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-sheet" ><input type="radio" name="iconfonts_name" data-name="basic-sheet" id="icon-basic-sheet-txt" value="icon-basic-sheet-txt"><label for="icon-basic-sheet-txt"><i class="icon-basic-sheet-txt" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-signs" ><input type="radio" name="iconfonts_name" data-name="basic-signs" id="icon-basic-signs" value="icon-basic-signs"><label for="icon-basic-signs"><i class="icon-basic-signs" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-smartphone" ><input type="radio" name="iconfonts_name" data-name="basic-smartphone" id="icon-basic-smartphone" value="icon-basic-smartphone"><label for="icon-basic-smartphone"><i class="icon-basic-smartphone" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-spades" ><input type="radio" name="iconfonts_name" data-name="basic-spades" id="icon-basic-spades" value="icon-basic-spades"><label for="icon-basic-spades"><i class="icon-basic-spades" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-spread" ><input type="radio" name="iconfonts_name" data-name="basic-spread" id="icon-basic-spread" value="icon-basic-spread"><label for="icon-basic-spread"><i class="icon-basic-spread" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-spread" ><input type="radio" name="iconfonts_name" data-name="basic-spread" id="icon-basic-spread-bookmark" value="icon-basic-spread-bookmark"><label for="icon-basic-spread-bookmark"><i class="icon-basic-spread-bookmark" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-spread" ><input type="radio" name="iconfonts_name" data-name="basic-spread" id="icon-basic-spread-text" value="icon-basic-spread-text"><label for="icon-basic-spread-text"><i class="icon-basic-spread-text" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-spread" ><input type="radio" name="iconfonts_name" data-name="basic-spread" id="icon-basic-spread-text-bookmark" value="icon-basic-spread-text-bookmark"><label for="icon-basic-spread-text-bookmark"><i class="icon-basic-spread-text-bookmark" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-star" ><input type="radio" name="iconfonts_name" data-name="basic-star" id="icon-basic-star" value="icon-basic-star"><label for="icon-basic-star"><i class="icon-basic-star" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-tablet" ><input type="radio" name="iconfonts_name" data-name="basic-tablet" id="icon-basic-tablet" value="icon-basic-tablet"><label for="icon-basic-tablet"><i class="icon-basic-tablet" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-target" ><input type="radio" name="iconfonts_name" data-name="basic-target" id="icon-basic-target" value="icon-basic-target"><label for="icon-basic-target"><i class="icon-basic-target" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-todo" ><input type="radio" name="iconfonts_name" data-name="basic-todo" id="icon-basic-todo" value="icon-basic-todo"><label for="icon-basic-todo"><i class="icon-basic-todo" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-todo" ><input type="radio" name="iconfonts_name" data-name="basic-todo" id="icon-basic-todo-pen" value="icon-basic-todo-pen"><label for="icon-basic-todo-pen"><i class="icon-basic-todo-pen" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-todo" ><input type="radio" name="iconfonts_name" data-name="basic-todo" id="icon-basic-todo-pencil" value="icon-basic-todo-pencil"><label for="icon-basic-todo-pencil"><i class="icon-basic-todo-pencil" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-todo" ><input type="radio" name="iconfonts_name" data-name="basic-todo" id="icon-basic-todo-txt" value="icon-basic-todo-txt"><label for="icon-basic-todo-txt"><i class="icon-basic-todo-txt" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-todolist" ><input type="radio" name="iconfonts_name" data-name="basic-todolist" id="icon-basic-todolist-pen" value="icon-basic-todolist-pen"><label for="icon-basic-todolist-pen"><i class="icon-basic-todolist-pen" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-todolist" ><input type="radio" name="iconfonts_name" data-name="basic-todolist" id="icon-basic-todolist-pencil" value="icon-basic-todolist-pencil"><label for="icon-basic-todolist-pencil"><i class="icon-basic-todolist-pencil" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-trashcan" ><input type="radio" name="iconfonts_name" data-name="basic-trashcan" id="icon-basic-trashcan" value="icon-basic-trashcan"><label for="icon-basic-trashcan"><i class="icon-basic-trashcan" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-trashcan" ><input type="radio" name="iconfonts_name" data-name="basic-trashcan" id="icon-basic-trashcan-full" value="icon-basic-trashcan-full"><label for="icon-basic-trashcan-full"><i class="icon-basic-trashcan-full" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-trashcan" ><input type="radio" name="iconfonts_name" data-name="basic-trashcan" id="icon-basic-trashcan-refresh" value="icon-basic-trashcan-refresh"><label for="icon-basic-trashcan-refresh"><i class="icon-basic-trashcan-refresh" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-trashcan" ><input type="radio" name="iconfonts_name" data-name="basic-trashcan" id="icon-basic-trashcan-remove" value="icon-basic-trashcan-remove"><label for="icon-basic-trashcan-remove"><i class="icon-basic-trashcan-remove" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-upload" ><input type="radio" name="iconfonts_name" data-name="basic-upload" id="icon-basic-upload" value="icon-basic-upload"><label for="icon-basic-upload"><i class="icon-basic-upload" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-usb" ><input type="radio" name="iconfonts_name" data-name="basic-usb" id="icon-basic-usb" value="icon-basic-usb"><label for="icon-basic-usb"><i class="icon-basic-usb" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-video" ><input type="radio" name="iconfonts_name" data-name="basic-video" id="icon-basic-video" value="icon-basic-video"><label for="icon-basic-video"><i class="icon-basic-video" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-watch" ><input type="radio" name="iconfonts_name" data-name="basic-watch" id="icon-basic-watch" value="icon-basic-watch"><label for="icon-basic-watch"><i class="icon-basic-watch" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-webpage" ><input type="radio" name="iconfonts_name" data-name="basic-webpage" id="icon-basic-webpage" value="icon-basic-webpage"><label for="icon-basic-webpage"><i class="icon-basic-webpage" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-webpage" ><input type="radio" name="iconfonts_name" data-name="basic-webpage" id="icon-basic-webpage-img-txt" value="icon-basic-webpage-img-txt"><label for="icon-basic-webpage-img-txt"><i class="icon-basic-webpage-img-txt" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-webpage" ><input type="radio" name="iconfonts_name" data-name="basic-webpage" id="icon-basic-webpage-multiple" value="icon-basic-webpage-multiple"><label for="icon-basic-webpage-multiple"><i class="icon-basic-webpage-multiple" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-webpage" ><input type="radio" name="iconfonts_name" data-name="basic-webpage" id="icon-basic-webpage-txt" value="icon-basic-webpage-txt"><label for="icon-basic-webpage-txt"><i class="icon-basic-webpage-txt" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basic-world" ><input type="radio" name="iconfonts_name" data-name="basic-world" id="icon-basic-world" value="icon-basic-world"><label for="icon-basic-world"><i class="icon-basic-world" style="font-size:30px;"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="mobile" ><input type="radio" name="iconfonts_name" data-name="mobile" id="icon-mobile" value="icon-mobile"><label for="icon-mobile"><i class="icon-mobile"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="laptop" ><input type="radio" name="iconfonts_name" data-name="laptop" id="icon-laptop" value="icon-laptop"><label for="icon-laptop"><i class="icon-laptop"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="desktop" ><input type="radio" name="iconfonts_name" data-name="desktop" id="icon-desktop" value="icon-desktop"><label for="icon-desktop"><i class="icon-desktop"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="tablet" ><input type="radio" name="iconfonts_name" data-name="tablet" id="icon-tablet" value="icon-tablet"><label for="icon-tablet"><i class="icon-tablet"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="phone" ><input type="radio" name="iconfonts_name" data-name="phone" id="icon-phone" value="icon-phone"><label for="icon-phone"><i class="icon-phone"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="document" ><input type="radio" name="iconfonts_name" data-name="document" id="icon-document" value="icon-document"><label for="icon-document"><i class="icon-document"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="documents" ><input type="radio" name="iconfonts_name" data-name="documents" id="icon-documents" value="icon-documents"><label for="icon-documents"><i class="icon-documents"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="search" ><input type="radio" name="iconfonts_name" data-name="search" id="icon-search" value="icon-search"><label for="icon-search"><i class="icon-search"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="clipboard" ><input type="radio" name="iconfonts_name" data-name="clipboard" id="icon-clipboard" value="icon-clipboard"><label for="icon-clipboard"><i class="icon-clipboard"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="newspaper" ><input type="radio" name="iconfonts_name" data-name="newspaper" id="icon-newspaper" value="icon-newspaper"><label for="icon-newspaper"><i class="icon-newspaper"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="notebook" ><input type="radio" name="iconfonts_name" data-name="notebook" id="icon-notebook" value="icon-notebook"><label for="icon-notebook"><i class="icon-notebook"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="book-open" ><input type="radio" name="iconfonts_name" data-name="book-open" id="icon-book-open" value="icon-book-open"><label for="icon-book-open"><i class="icon-book-open"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="browser" ><input type="radio" name="iconfonts_name" data-name="browser" id="icon-browser" value="icon-browser"><label for="icon-browser"><i class="icon-browser"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="calendar" ><input type="radio" name="iconfonts_name" data-name="calendar" id="icon-calendar" value="icon-calendar"><label for="icon-calendar"><i class="icon-calendar"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="presentation" ><input type="radio" name="iconfonts_name" data-name="presentation" id="icon-presentation" value="icon-presentation"><label for="icon-presentation"><i class="icon-presentation"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="picture" ><input type="radio" name="iconfonts_name" data-name="picture" id="icon-picture" value="icon-picture"><label for="icon-picture"><i class="icon-picture"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="pictures" ><input type="radio" name="iconfonts_name" data-name="pictures" id="icon-pictures" value="icon-pictures"><label for="icon-pictures"><i class="icon-pictures"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="video" ><input type="radio" name="iconfonts_name" data-name="video" id="icon-video" value="icon-video"><label for="icon-video"><i class="icon-video"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="camera" ><input type="radio" name="iconfonts_name" data-name="camera" id="icon-camera" value="icon-camera"><label for="icon-camera"><i class="icon-camera"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="printer" ><input type="radio" name="iconfonts_name" data-name="printer" id="icon-printer" value="icon-printer"><label for="icon-printer"><i class="icon-printer"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="toolbox" ><input type="radio" name="iconfonts_name" data-name="toolbox" id="icon-toolbox" value="icon-toolbox"><label for="icon-toolbox"><i class="icon-toolbox"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="briefcase" ><input type="radio" name="iconfonts_name" data-name="briefcase" id="icon-briefcase" value="icon-briefcase"><label for="icon-briefcase"><i class="icon-briefcase"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="wallet" ><input type="radio" name="iconfonts_name" data-name="wallet" id="icon-wallet" value="icon-wallet"><label for="icon-wallet"><i class="icon-wallet"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="gift" ><input type="radio" name="iconfonts_name" data-name="gift" id="icon-gift" value="icon-gift"><label for="icon-gift"><i class="icon-gift"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="bargraph" ><input type="radio" name="iconfonts_name" data-name="bargraph" id="icon-bargraph" value="icon-bargraph"><label for="icon-bargraph"><i class="icon-bargraph"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="grid" ><input type="radio" name="iconfonts_name" data-name="grid" id="icon-grid" value="icon-grid"><label for="icon-grid"><i class="icon-grid"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="expand" ><input type="radio" name="iconfonts_name" data-name="expand" id="icon-expand" value="icon-expand"><label for="icon-expand"><i class="icon-expand"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="focus" ><input type="radio" name="iconfonts_name" data-name="focus" id="icon-focus" value="icon-focus"><label for="icon-focus"><i class="icon-focus"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="edit" ><input type="radio" name="iconfonts_name" data-name="edit" id="icon-edit" value="icon-edit"><label for="icon-edit"><i class="icon-edit"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="adjustments" ><input type="radio" name="iconfonts_name" data-name="adjustments" id="icon-adjustments" value="icon-adjustments"><label for="icon-adjustments"><i class="icon-adjustments"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="ribbon" ><input type="radio" name="iconfonts_name" data-name="ribbon" id="icon-ribbon" value="icon-ribbon"><label for="icon-ribbon"><i class="icon-ribbon"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="hourglass" ><input type="radio" name="iconfonts_name" data-name="hourglass" id="icon-hourglass" value="icon-hourglass"><label for="icon-hourglass"><i class="icon-hourglass"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="lock" ><input type="radio" name="iconfonts_name" data-name="lock" id="icon-lock" value="icon-lock"><label for="icon-lock"><i class="icon-lock"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="megaphone" ><input type="radio" name="iconfonts_name" data-name="megaphone" id="icon-megaphone" value="icon-megaphone"><label for="icon-megaphone"><i class="icon-megaphone"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="shield" ><input type="radio" name="iconfonts_name" data-name="shield" id="icon-shield" value="icon-shield"><label for="icon-shield"><i class="icon-shield"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="trophy" ><input type="radio" name="iconfonts_name" data-name="trophy" id="icon-trophy" value="icon-trophy"><label for="icon-trophy"><i class="icon-trophy"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="flag" ><input type="radio" name="iconfonts_name" data-name="flag" id="icon-flag" value="icon-flag"><label for="icon-flag"><i class="icon-flag"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="map" ><input type="radio" name="iconfonts_name" data-name="map" id="icon-map" value="icon-map"><label for="icon-map"><i class="icon-map"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="puzzle" ><input type="radio" name="iconfonts_name" data-name="puzzle" id="icon-puzzle" value="icon-puzzle"><label for="icon-puzzle"><i class="icon-puzzle"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="basket" ><input type="radio" name="iconfonts_name" data-name="basket" id="icon-basket" value="icon-basket"><label for="icon-basket"><i class="icon-basket"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="envelope" ><input type="radio" name="iconfonts_name" data-name="envelope" id="icon-envelope" value="icon-envelope"><label for="icon-envelope"><i class="icon-envelope"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="streetsign" ><input type="radio" name="iconfonts_name" data-name="streetsign" id="icon-streetsign" value="icon-streetsign"><label for="icon-streetsign"><i class="icon-streetsign"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="telescope" ><input type="radio" name="iconfonts_name" data-name="telescope" id="icon-telescope" value="icon-telescope"><label for="icon-telescope"><i class="icon-telescope"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="gears" ><input type="radio" name="iconfonts_name" data-name="gears" id="icon-gears" value="icon-gears"><label for="icon-gears"><i class="icon-gears"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="key" ><input type="radio" name="iconfonts_name" data-name="key" id="icon-key" value="icon-key"><label for="icon-key"><i class="icon-key"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="paperclip" ><input type="radio" name="iconfonts_name" data-name="paperclip" id="icon-paperclip" value="icon-paperclip"><label for="icon-paperclip"><i class="icon-paperclip"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="attachment" ><input type="radio" name="iconfonts_name" data-name="attachment" id="icon-attachment" value="icon-attachment"><label for="icon-attachment"><i class="icon-attachment"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="pricetags" ><input type="radio" name="iconfonts_name" data-name="pricetags" id="icon-pricetags" value="icon-pricetags"><label for="icon-pricetags"><i class="icon-pricetags"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="lightbulb" ><input type="radio" name="iconfonts_name" data-name="lightbulb" id="icon-lightbulb" value="icon-lightbulb"><label for="icon-lightbulb"><i class="icon-lightbulb"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="layers" ><input type="radio" name="iconfonts_name" data-name="layers" id="icon-layers" value="icon-layers"><label for="icon-layers"><i class="icon-layers"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="pencil" ><input type="radio" name="iconfonts_name" data-name="pencil" id="icon-pencil" value="icon-pencil"><label for="icon-pencil"><i class="icon-pencil"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="tools" ><input type="radio" name="iconfonts_name" data-name="tools" id="icon-tools" value="icon-tools"><label for="icon-tools"><i class="icon-tools"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="tools-2" ><input type="radio" name="iconfonts_name" data-name="tools-2" id="icon-tools-2" value="icon-tools-2"><label for="icon-tools-2"><i class="icon-tools-2"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="scissors" ><input type="radio" name="iconfonts_name" data-name="scissors" id="icon-scissors" value="icon-scissors"><label for="icon-scissors"><i class="icon-scissors"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="paintbrush" ><input type="radio" name="iconfonts_name" data-name="paintbrush" id="icon-paintbrush" value="icon-paintbrush"><label for="icon-paintbrush"><i class="icon-paintbrush"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="magnifying-glass" ><input type="radio" name="iconfonts_name" data-name="magnifying-glass" id="icon-magnifying-glass" value="icon-magnifying-glass"><label for="icon-magnifying-glass"><i class="icon-magnifying-glass"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="circle-compass" ><input type="radio" name="iconfonts_name" data-name="circle-compass" id="icon-circle-compass" value="icon-circle-compass"><label for="icon-circle-compass"><i class="icon-circle-compass"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="linegraph" ><input type="radio" name="iconfonts_name" data-name="linegraph" id="icon-linegraph" value="icon-linegraph"><label for="icon-linegraph"><i class="icon-linegraph"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="mic" ><input type="radio" name="iconfonts_name" data-name="mic" id="icon-mic" value="icon-mic"><label for="icon-mic"><i class="icon-mic"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="strategy" ><input type="radio" name="iconfonts_name" data-name="strategy" id="icon-strategy" value="icon-strategy"><label for="icon-strategy"><i class="icon-strategy"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="beaker" ><input type="radio" name="iconfonts_name" data-name="beaker" id="icon-beaker" value="icon-beaker"><label for="icon-beaker"><i class="icon-beaker"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="caution" ><input type="radio" name="iconfonts_name" data-name="caution" id="icon-caution" value="icon-caution"><label for="icon-caution"><i class="icon-caution"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="recycle" ><input type="radio" name="iconfonts_name" data-name="recycle" id="icon-recycle" value="icon-recycle"><label for="icon-recycle"><i class="icon-recycle"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="anchor" ><input type="radio" name="iconfonts_name" data-name="anchor" id="icon-anchor" value="icon-anchor"><label for="icon-anchor"><i class="icon-anchor"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="profile-male" ><input type="radio" name="iconfonts_name" data-name="profile-male" id="icon-profile-male" value="icon-profile-male"><label for="icon-profile-male"><i class="icon-profile-male"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="profile-female" ><input type="radio" name="iconfonts_name" data-name="profile-female" id="icon-profile-female" value="icon-profile-female"><label for="icon-profile-female"><i class="icon-profile-female"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="bike" ><input type="radio" name="iconfonts_name" data-name="bike" id="icon-bike" value="icon-bike"><label for="icon-bike"><i class="icon-bike"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="wine" ><input type="radio" name="iconfonts_name" data-name="wine" id="icon-wine" value="icon-wine"><label for="icon-wine"><i class="icon-wine"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="hotairballoon" ><input type="radio" name="iconfonts_name" data-name="hotairballoon" id="icon-hotairballoon" value="icon-hotairballoon"><label for="icon-hotairballoon"><i class="icon-hotairballoon"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="globe" ><input type="radio" name="iconfonts_name" data-name="globe" id="icon-globe" value="icon-globe"><label for="icon-globe"><i class="icon-globe"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="genius" ><input type="radio" name="iconfonts_name" data-name="genius" id="icon-genius" value="icon-genius"><label for="icon-genius"><i class="icon-genius"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="map-pin" ><input type="radio" name="iconfonts_name" data-name="map-pin" id="icon-map-pin" value="icon-map-pin"><label for="icon-map-pin"><i class="icon-map-pin"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="dial" ><input type="radio" name="iconfonts_name" data-name="dial" id="icon-dial" value="icon-dial"><label for="icon-dial"><i class="icon-dial"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="chat" ><input type="radio" name="iconfonts_name" data-name="chat" id="icon-chat" value="icon-chat"><label for="icon-chat"><i class="icon-chat"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="heart" ><input type="radio" name="iconfonts_name" data-name="heart" id="icon-heart" value="icon-heart"><label for="icon-heart"><i class="icon-heart"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="cloud" ><input type="radio" name="iconfonts_name" data-name="cloud" id="icon-cloud" value="icon-cloud"><label for="icon-cloud"><i class="icon-cloud"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="upload" ><input type="radio" name="iconfonts_name" data-name="upload" id="icon-upload" value="icon-upload"><label for="icon-upload"><i class="icon-upload"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="download" ><input type="radio" name="iconfonts_name" data-name="download" id="icon-download" value="icon-download"><label for="icon-download"><i class="icon-download"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="target" ><input type="radio" name="iconfonts_name" data-name="target" id="icon-target" value="icon-target"><label for="icon-target"><i class="icon-target"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="hazardous" ><input type="radio" name="iconfonts_name" data-name="hazardous" id="icon-hazardous" value="icon-hazardous"><label for="icon-hazardous"><i class="icon-hazardous"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="piechart" ><input type="radio" name="iconfonts_name" data-name="piechart" id="icon-piechart" value="icon-piechart"><label for="icon-piechart"><i class="icon-piechart"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="speedometer" ><input type="radio" name="iconfonts_name" data-name="speedometer" id="icon-speedometer" value="icon-speedometer"><label for="icon-speedometer"><i class="icon-speedometer"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="global" ><input type="radio" name="iconfonts_name" data-name="global" id="icon-global" value="icon-global"><label for="icon-global"><i class="icon-global"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="compass" ><input type="radio" name="iconfonts_name" data-name="compass" id="icon-compass" value="icon-compass"><label for="icon-compass"><i class="icon-compass"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="lifesaver" ><input type="radio" name="iconfonts_name" data-name="lifesaver" id="icon-lifesaver" value="icon-lifesaver"><label for="icon-lifesaver"><i class="icon-lifesaver"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="clock" ><input type="radio" name="iconfonts_name" data-name="clock" id="icon-clock" value="icon-clock"><label for="icon-clock"><i class="icon-clock"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="aperture" ><input type="radio" name="iconfonts_name" data-name="aperture" id="icon-aperture" value="icon-aperture"><label for="icon-aperture"><i class="icon-aperture"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="quote" ><input type="radio" name="iconfonts_name" data-name="quote" id="icon-quote" value="icon-quote"><label for="icon-quote"><i class="icon-quote"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="scope" ><input type="radio" name="iconfonts_name" data-name="scope" id="icon-scope" value="icon-scope"><label for="icon-scope"><i class="icon-scope"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="alarmclock" ><input type="radio" name="iconfonts_name" data-name="alarmclock" id="icon-alarmclock" value="icon-alarmclock"><label for="icon-alarmclock"><i class="icon-alarmclock"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="refresh" ><input type="radio" name="iconfonts_name" data-name="refresh" id="icon-refresh" value="icon-refresh"><label for="icon-refresh"><i class="icon-refresh"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="happy" ><input type="radio" name="iconfonts_name" data-name="happy" id="icon-happy" value="icon-happy"><label for="icon-happy"><i class="icon-happy"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="sad" ><input type="radio" name="iconfonts_name" data-name="sad" id="icon-sad" value="icon-sad"><label for="icon-sad"><i class="icon-sad"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="googleplus" ><input type="radio" name="iconfonts_name" data-name="googleplus" id="icon-googleplus" value="icon-googleplus"><label for="icon-googleplus"><i class="icon-googleplus"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="rss" ><input type="radio" name="iconfonts_name" data-name="rss" id="icon-rss" value="icon-rss"><label for="icon-rss"><i class="icon-rss"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="tumblr" ><input type="radio" name="iconfonts_name" data-name="tumblr" id="icon-tumblr" value="icon-tumblr"><label for="icon-tumblr"><i class="icon-tumblr"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linea" data-name="dribbble" ><input type="radio" name="iconfonts_name" data-name="dribbble" id="icon-dribbble" value="icon-dribbble"><label for="icon-dribbble"><i class="icon-dribbble"></i></label></li>
					</ul>
					<ul class="themify-icon-fonts" data-name="themify">
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="wand" ><input type="radio" name="iconfonts_name" data-name="wand" id="ti-wand" value="ti-wand"><label for="ti-wand"><i class="ti-wand"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="volume" ><input type="radio" name="iconfonts_name" data-name="volume" id="ti-volume" value="ti-volume"><label for="ti-volume"><i class="ti-volume"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="user" ><input type="radio" name="iconfonts_name" data-name="user" id="ti-user" value="ti-user"><label for="ti-user"><i class="ti-user"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="unlock" ><input type="radio" name="iconfonts_name" data-name="unlock" id="ti-unlock" value="ti-unlock"><label for="ti-unlock"><i class="ti-unlock"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="unlink" ><input type="radio" name="iconfonts_name" data-name="unlink" id="ti-unlink" value="ti-unlink"><label for="ti-unlink"><i class="ti-unlink"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="trash" ><input type="radio" name="iconfonts_name" data-name="trash" id="ti-trash" value="ti-trash"><label for="ti-trash"><i class="ti-trash"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="thought" ><input type="radio" name="iconfonts_name" data-name="thought" id="ti-thought" value="ti-thought"><label for="ti-thought"><i class="ti-thought"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="target" ><input type="radio" name="iconfonts_name" data-name="target" id="ti-target" value="ti-target"><label for="ti-target"><i class="ti-target"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="tag" ><input type="radio" name="iconfonts_name" data-name="tag" id="ti-tag" value="ti-tag"><label for="ti-tag"><i class="ti-tag"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="tablet" ><input type="radio" name="iconfonts_name" data-name="tablet" id="ti-tablet" value="ti-tablet"><label for="ti-tablet"><i class="ti-tablet"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="star" ><input type="radio" name="iconfonts_name" data-name="star" id="ti-star" value="ti-star"><label for="ti-star"><i class="ti-star"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="spray" ><input type="radio" name="iconfonts_name" data-name="spray" id="ti-spray" value="ti-spray"><label for="ti-spray"><i class="ti-spray"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="signal" ><input type="radio" name="iconfonts_name" data-name="signal" id="ti-signal" value="ti-signal"><label for="ti-signal"><i class="ti-signal"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="shopping-cart" ><input type="radio" name="iconfonts_name" data-name="shopping-cart" id="ti-shopping-cart" value="ti-shopping-cart"><label for="ti-shopping-cart"><i class="ti-shopping-cart"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="shopping-cart-full" ><input type="radio" name="iconfonts_name" data-name="shopping-cart-full" id="ti-shopping-cart-full" value="ti-shopping-cart-full"><label for="ti-shopping-cart-full"><i class="ti-shopping-cart-full"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="settings" ><input type="radio" name="iconfonts_name" data-name="settings" id="ti-settings" value="ti-settings"><label for="ti-settings"><i class="ti-settings"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="search" ><input type="radio" name="iconfonts_name" data-name="search" id="ti-search" value="ti-search"><label for="ti-search"><i class="ti-search"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="zoom-in" ><input type="radio" name="iconfonts_name" data-name="zoom-in" id="ti-zoom-in" value="ti-zoom-in"><label for="ti-zoom-in"><i class="ti-zoom-in"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="zoom-out" ><input type="radio" name="iconfonts_name" data-name="zoom-out" id="ti-zoom-out" value="ti-zoom-out"><label for="ti-zoom-out"><i class="ti-zoom-out"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="cut" ><input type="radio" name="iconfonts_name" data-name="cut" id="ti-cut" value="ti-cut"><label for="ti-cut"><i class="ti-cut"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="ruler" ><input type="radio" name="iconfonts_name" data-name="ruler" id="ti-ruler" value="ti-ruler"><label for="ti-ruler"><i class="ti-ruler"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="ruler-pencil" ><input type="radio" name="iconfonts_name" data-name="ruler-pencil" id="ti-ruler-pencil" value="ti-ruler-pencil"><label for="ti-ruler-pencil"><i class="ti-ruler-pencil"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="ruler-alt" ><input type="radio" name="iconfonts_name" data-name="ruler-alt" id="ti-ruler-alt" value="ti-ruler-alt"><label for="ti-ruler-alt"><i class="ti-ruler-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="bookmark" ><input type="radio" name="iconfonts_name" data-name="bookmark" id="ti-bookmark" value="ti-bookmark"><label for="ti-bookmark"><i class="ti-bookmark"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="bookmark-alt" ><input type="radio" name="iconfonts_name" data-name="bookmark-alt" id="ti-bookmark-alt" value="ti-bookmark-alt"><label for="ti-bookmark-alt"><i class="ti-bookmark-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="reload" ><input type="radio" name="iconfonts_name" data-name="reload" id="ti-reload" value="ti-reload"><label for="ti-reload"><i class="ti-reload"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="plus" ><input type="radio" name="iconfonts_name" data-name="plus" id="ti-plus" value="ti-plus"><label for="ti-plus"><i class="ti-plus"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="pin" ><input type="radio" name="iconfonts_name" data-name="pin" id="ti-pin" value="ti-pin"><label for="ti-pin"><i class="ti-pin"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="pencil" ><input type="radio" name="iconfonts_name" data-name="pencil" id="ti-pencil" value="ti-pencil"><label for="ti-pencil"><i class="ti-pencil"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="pencil-alt" ><input type="radio" name="iconfonts_name" data-name="pencil-alt" id="ti-pencil-alt" value="ti-pencil-alt"><label for="ti-pencil-alt"><i class="ti-pencil-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="paint-roller" ><input type="radio" name="iconfonts_name" data-name="paint-roller" id="ti-paint-roller" value="ti-paint-roller"><label for="ti-paint-roller"><i class="ti-paint-roller"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="paint-bucket" ><input type="radio" name="iconfonts_name" data-name="paint-bucket" id="ti-paint-bucket" value="ti-paint-bucket"><label for="ti-paint-bucket"><i class="ti-paint-bucket"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="na" ><input type="radio" name="iconfonts_name" data-name="na" id="ti-na" value="ti-na"><label for="ti-na"><i class="ti-na"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="mobile" ><input type="radio" name="iconfonts_name" data-name="mobile" id="ti-mobile" value="ti-mobile"><label for="ti-mobile"><i class="ti-mobile"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="minus" ><input type="radio" name="iconfonts_name" data-name="minus" id="ti-minus" value="ti-minus"><label for="ti-minus"><i class="ti-minus"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="medall" ><input type="radio" name="iconfonts_name" data-name="medall" id="ti-medall" value="ti-medall"><label for="ti-medall"><i class="ti-medall"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="medall-alt" ><input type="radio" name="iconfonts_name" data-name="medall-alt" id="ti-medall-alt" value="ti-medall-alt"><label for="ti-medall-alt"><i class="ti-medall-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="marker" ><input type="radio" name="iconfonts_name" data-name="marker" id="ti-marker" value="ti-marker"><label for="ti-marker"><i class="ti-marker"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="marker-alt" ><input type="radio" name="iconfonts_name" data-name="marker-alt" id="ti-marker-alt" value="ti-marker-alt"><label for="ti-marker-alt"><i class="ti-marker-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="arrow-up" ><input type="radio" name="iconfonts_name" data-name="arrow-up" id="ti-arrow-up" value="ti-arrow-up"><label for="ti-arrow-up"><i class="ti-arrow-up"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="arrow-right" ><input type="radio" name="iconfonts_name" data-name="arrow-right" id="ti-arrow-right" value="ti-arrow-right"><label for="ti-arrow-right"><i class="ti-arrow-right"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="arrow-left" ><input type="radio" name="iconfonts_name" data-name="arrow-left" id="ti-arrow-left" value="ti-arrow-left"><label for="ti-arrow-left"><i class="ti-arrow-left"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="arrow-down" ><input type="radio" name="iconfonts_name" data-name="arrow-down" id="ti-arrow-down" value="ti-arrow-down"><label for="ti-arrow-down"><i class="ti-arrow-down"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="lock" ><input type="radio" name="iconfonts_name" data-name="lock" id="ti-lock" value="ti-lock"><label for="ti-lock"><i class="ti-lock"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="location-arrow" ><input type="radio" name="iconfonts_name" data-name="location-arrow" id="ti-location-arrow" value="ti-location-arrow"><label for="ti-location-arrow"><i class="ti-location-arrow"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="link" ><input type="radio" name="iconfonts_name" data-name="link" id="ti-link" value="ti-link"><label for="ti-link"><i class="ti-link"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout" ><input type="radio" name="iconfonts_name" data-name="layout" id="ti-layout" value="ti-layout"><label for="ti-layout"><i class="ti-layout"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layers" ><input type="radio" name="iconfonts_name" data-name="layers" id="ti-layers" value="ti-layers"><label for="ti-layers"><i class="ti-layers"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layers-alt" ><input type="radio" name="iconfonts_name" data-name="layers-alt" id="ti-layers-alt" value="ti-layers-alt"><label for="ti-layers-alt"><i class="ti-layers-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="key" ><input type="radio" name="iconfonts_name" data-name="key" id="ti-key" value="ti-key"><label for="ti-key"><i class="ti-key"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="import" ><input type="radio" name="iconfonts_name" data-name="import" id="ti-import" value="ti-import"><label for="ti-import"><i class="ti-import"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="image" ><input type="radio" name="iconfonts_name" data-name="image" id="ti-image" value="ti-image"><label for="ti-image"><i class="ti-image"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="heart" ><input type="radio" name="iconfonts_name" data-name="heart" id="ti-heart" value="ti-heart"><label for="ti-heart"><i class="ti-heart"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="heart-broken" ><input type="radio" name="iconfonts_name" data-name="heart-broken" id="ti-heart-broken" value="ti-heart-broken"><label for="ti-heart-broken"><i class="ti-heart-broken"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="hand-stop" ><input type="radio" name="iconfonts_name" data-name="hand-stop" id="ti-hand-stop" value="ti-hand-stop"><label for="ti-hand-stop"><i class="ti-hand-stop"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="hand-open" ><input type="radio" name="iconfonts_name" data-name="hand-open" id="ti-hand-open" value="ti-hand-open"><label for="ti-hand-open"><i class="ti-hand-open"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="hand-drag" ><input type="radio" name="iconfonts_name" data-name="hand-drag" id="ti-hand-drag" value="ti-hand-drag"><label for="ti-hand-drag"><i class="ti-hand-drag"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="folder" ><input type="radio" name="iconfonts_name" data-name="folder" id="ti-folder" value="ti-folder"><label for="ti-folder"><i class="ti-folder"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="flag" ><input type="radio" name="iconfonts_name" data-name="flag" id="ti-flag" value="ti-flag"><label for="ti-flag"><i class="ti-flag"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="flag-alt" ><input type="radio" name="iconfonts_name" data-name="flag-alt" id="ti-flag-alt" value="ti-flag-alt"><label for="ti-flag-alt"><i class="ti-flag-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="flag-alt-2" ><input type="radio" name="iconfonts_name" data-name="flag-alt-2" id="ti-flag-alt-2" value="ti-flag-alt-2"><label for="ti-flag-alt-2"><i class="ti-flag-alt-2"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="eye" ><input type="radio" name="iconfonts_name" data-name="eye" id="ti-eye" value="ti-eye"><label for="ti-eye"><i class="ti-eye"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="export" ><input type="radio" name="iconfonts_name" data-name="export" id="ti-export" value="ti-export"><label for="ti-export"><i class="ti-export"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="exchange-vertical" ><input type="radio" name="iconfonts_name" data-name="exchange-vertical" id="ti-exchange-vertical" value="ti-exchange-vertical"><label for="ti-exchange-vertical"><i class="ti-exchange-vertical"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="desktop" ><input type="radio" name="iconfonts_name" data-name="desktop" id="ti-desktop" value="ti-desktop"><label for="ti-desktop"><i class="ti-desktop"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="cup" ><input type="radio" name="iconfonts_name" data-name="cup" id="ti-cup" value="ti-cup"><label for="ti-cup"><i class="ti-cup"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="crown" ><input type="radio" name="iconfonts_name" data-name="crown" id="ti-crown" value="ti-crown"><label for="ti-crown"><i class="ti-crown"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="comments" ><input type="radio" name="iconfonts_name" data-name="comments" id="ti-comments" value="ti-comments"><label for="ti-comments"><i class="ti-comments"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="comment" ><input type="radio" name="iconfonts_name" data-name="comment" id="ti-comment" value="ti-comment"><label for="ti-comment"><i class="ti-comment"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="comment-alt" ><input type="radio" name="iconfonts_name" data-name="comment-alt" id="ti-comment-alt" value="ti-comment-alt"><label for="ti-comment-alt"><i class="ti-comment-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="close" ><input type="radio" name="iconfonts_name" data-name="close" id="ti-close" value="ti-close"><label for="ti-close"><i class="ti-close"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="clip" ><input type="radio" name="iconfonts_name" data-name="clip" id="ti-clip" value="ti-clip"><label for="ti-clip"><i class="ti-clip"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="angle-up" ><input type="radio" name="iconfonts_name" data-name="angle-up" id="ti-angle-up" value="ti-angle-up"><label for="ti-angle-up"><i class="ti-angle-up"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="angle-right" ><input type="radio" name="iconfonts_name" data-name="angle-right" id="ti-angle-right" value="ti-angle-right"><label for="ti-angle-right"><i class="ti-angle-right"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="angle-left" ><input type="radio" name="iconfonts_name" data-name="angle-left" id="ti-angle-left" value="ti-angle-left"><label for="ti-angle-left"><i class="ti-angle-left"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="angle-down" ><input type="radio" name="iconfonts_name" data-name="angle-down" id="ti-angle-down" value="ti-angle-down"><label for="ti-angle-down"><i class="ti-angle-down"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="check" ><input type="radio" name="iconfonts_name" data-name="check" id="ti-check" value="ti-check"><label for="ti-check"><i class="ti-check"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="check-box" ><input type="radio" name="iconfonts_name" data-name="check-box" id="ti-check-box" value="ti-check-box"><label for="ti-check-box"><i class="ti-check-box"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="camera" ><input type="radio" name="iconfonts_name" data-name="camera" id="ti-camera" value="ti-camera"><label for="ti-camera"><i class="ti-camera"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="announcement" ><input type="radio" name="iconfonts_name" data-name="announcement" id="ti-announcement" value="ti-announcement"><label for="ti-announcement"><i class="ti-announcement"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="brush" ><input type="radio" name="iconfonts_name" data-name="brush" id="ti-brush" value="ti-brush"><label for="ti-brush"><i class="ti-brush"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="briefcase" ><input type="radio" name="iconfonts_name" data-name="briefcase" id="ti-briefcase" value="ti-briefcase"><label for="ti-briefcase"><i class="ti-briefcase"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="bolt" ><input type="radio" name="iconfonts_name" data-name="bolt" id="ti-bolt" value="ti-bolt"><label for="ti-bolt"><i class="ti-bolt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="bolt-alt" ><input type="radio" name="iconfonts_name" data-name="bolt-alt" id="ti-bolt-alt" value="ti-bolt-alt"><label for="ti-bolt-alt"><i class="ti-bolt-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="blackboard" ><input type="radio" name="iconfonts_name" data-name="blackboard" id="ti-blackboard" value="ti-blackboard"><label for="ti-blackboard"><i class="ti-blackboard"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="bag" ><input type="radio" name="iconfonts_name" data-name="bag" id="ti-bag" value="ti-bag"><label for="ti-bag"><i class="ti-bag"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="move" ><input type="radio" name="iconfonts_name" data-name="move" id="ti-move" value="ti-move"><label for="ti-move"><i class="ti-move"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="arrows-vertical" ><input type="radio" name="iconfonts_name" data-name="arrows-vertical" id="ti-arrows-vertical" value="ti-arrows-vertical"><label for="ti-arrows-vertical"><i class="ti-arrows-vertical"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="arrows-horizontal" ><input type="radio" name="iconfonts_name" data-name="arrows-horizontal" id="ti-arrows-horizontal" value="ti-arrows-horizontal"><label for="ti-arrows-horizontal"><i class="ti-arrows-horizontal"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="fullscreen" ><input type="radio" name="iconfonts_name" data-name="fullscreen" id="ti-fullscreen" value="ti-fullscreen"><label for="ti-fullscreen"><i class="ti-fullscreen"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="arrow-top-right" ><input type="radio" name="iconfonts_name" data-name="arrow-top-right" id="ti-arrow-top-right" value="ti-arrow-top-right"><label for="ti-arrow-top-right"><i class="ti-arrow-top-right"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="arrow-top-left" ><input type="radio" name="iconfonts_name" data-name="arrow-top-left" id="ti-arrow-top-left" value="ti-arrow-top-left"><label for="ti-arrow-top-left"><i class="ti-arrow-top-left"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="arrow-circle-up" ><input type="radio" name="iconfonts_name" data-name="arrow-circle-up" id="ti-arrow-circle-up" value="ti-arrow-circle-up"><label for="ti-arrow-circle-up"><i class="ti-arrow-circle-up"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="arrow-circle-right" ><input type="radio" name="iconfonts_name" data-name="arrow-circle-right" id="ti-arrow-circle-right" value="ti-arrow-circle-right"><label for="ti-arrow-circle-right"><i class="ti-arrow-circle-right"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="arrow-circle-left" ><input type="radio" name="iconfonts_name" data-name="arrow-circle-left" id="ti-arrow-circle-left" value="ti-arrow-circle-left"><label for="ti-arrow-circle-left"><i class="ti-arrow-circle-left"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="arrow-circle-down" ><input type="radio" name="iconfonts_name" data-name="arrow-circle-down" id="ti-arrow-circle-down" value="ti-arrow-circle-down"><label for="ti-arrow-circle-down"><i class="ti-arrow-circle-down"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="angle-double-up" ><input type="radio" name="iconfonts_name" data-name="angle-double-up" id="ti-angle-double-up" value="ti-angle-double-up"><label for="ti-angle-double-up"><i class="ti-angle-double-up"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="angle-double-right" ><input type="radio" name="iconfonts_name" data-name="angle-double-right" id="ti-angle-double-right" value="ti-angle-double-right"><label for="ti-angle-double-right"><i class="ti-angle-double-right"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="angle-double-left" ><input type="radio" name="iconfonts_name" data-name="angle-double-left" id="ti-angle-double-left" value="ti-angle-double-left"><label for="ti-angle-double-left"><i class="ti-angle-double-left"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="angle-double-down" ><input type="radio" name="iconfonts_name" data-name="angle-double-down" id="ti-angle-double-down" value="ti-angle-double-down"><label for="ti-angle-double-down"><i class="ti-angle-double-down"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="zip" ><input type="radio" name="iconfonts_name" data-name="zip" id="ti-zip" value="ti-zip"><label for="ti-zip"><i class="ti-zip"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="world" ><input type="radio" name="iconfonts_name" data-name="world" id="ti-world" value="ti-world"><label for="ti-world"><i class="ti-world"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="wheelchair" ><input type="radio" name="iconfonts_name" data-name="wheelchair" id="ti-wheelchair" value="ti-wheelchair"><label for="ti-wheelchair"><i class="ti-wheelchair"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="view-list" ><input type="radio" name="iconfonts_name" data-name="view-list" id="ti-view-list" value="ti-view-list"><label for="ti-view-list"><i class="ti-view-list"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="view-list-alt" ><input type="radio" name="iconfonts_name" data-name="view-list-alt" id="ti-view-list-alt" value="ti-view-list-alt"><label for="ti-view-list-alt"><i class="ti-view-list-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="view-grid" ><input type="radio" name="iconfonts_name" data-name="view-grid" id="ti-view-grid" value="ti-view-grid"><label for="ti-view-grid"><i class="ti-view-grid"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="uppercase" ><input type="radio" name="iconfonts_name" data-name="uppercase" id="ti-uppercase" value="ti-uppercase"><label for="ti-uppercase"><i class="ti-uppercase"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="upload" ><input type="radio" name="iconfonts_name" data-name="upload" id="ti-upload" value="ti-upload"><label for="ti-upload"><i class="ti-upload"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="underline" ><input type="radio" name="iconfonts_name" data-name="underline" id="ti-underline" value="ti-underline"><label for="ti-underline"><i class="ti-underline"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="truck" ><input type="radio" name="iconfonts_name" data-name="truck" id="ti-truck" value="ti-truck"><label for="ti-truck"><i class="ti-truck"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="timer" ><input type="radio" name="iconfonts_name" data-name="timer" id="ti-timer" value="ti-timer"><label for="ti-timer"><i class="ti-timer"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="ticket" ><input type="radio" name="iconfonts_name" data-name="ticket" id="ti-ticket" value="ti-ticket"><label for="ti-ticket"><i class="ti-ticket"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="thumb-up" ><input type="radio" name="iconfonts_name" data-name="thumb-up" id="ti-thumb-up" value="ti-thumb-up"><label for="ti-thumb-up"><i class="ti-thumb-up"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="thumb-down" ><input type="radio" name="iconfonts_name" data-name="thumb-down" id="ti-thumb-down" value="ti-thumb-down"><label for="ti-thumb-down"><i class="ti-thumb-down"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="text" ><input type="radio" name="iconfonts_name" data-name="text" id="ti-text" value="ti-text"><label for="ti-text"><i class="ti-text"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="stats-up" ><input type="radio" name="iconfonts_name" data-name="stats-up" id="ti-stats-up" value="ti-stats-up"><label for="ti-stats-up"><i class="ti-stats-up"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="stats-down" ><input type="radio" name="iconfonts_name" data-name="stats-down" id="ti-stats-down" value="ti-stats-down"><label for="ti-stats-down"><i class="ti-stats-down"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="split-v" ><input type="radio" name="iconfonts_name" data-name="split-v" id="ti-split-v" value="ti-split-v"><label for="ti-split-v"><i class="ti-split-v"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="split-h" ><input type="radio" name="iconfonts_name" data-name="split-h" id="ti-split-h" value="ti-split-h"><label for="ti-split-h"><i class="ti-split-h"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="smallcap" ><input type="radio" name="iconfonts_name" data-name="smallcap" id="ti-smallcap" value="ti-smallcap"><label for="ti-smallcap"><i class="ti-smallcap"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="shine" ><input type="radio" name="iconfonts_name" data-name="shine" id="ti-shine" value="ti-shine"><label for="ti-shine"><i class="ti-shine"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="shift-right" ><input type="radio" name="iconfonts_name" data-name="shift-right" id="ti-shift-right" value="ti-shift-right"><label for="ti-shift-right"><i class="ti-shift-right"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="shift-left" ><input type="radio" name="iconfonts_name" data-name="shift-left" id="ti-shift-left" value="ti-shift-left"><label for="ti-shift-left"><i class="ti-shift-left"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="shield" ><input type="radio" name="iconfonts_name" data-name="shield" id="ti-shield" value="ti-shield"><label for="ti-shield"><i class="ti-shield"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="notepad" ><input type="radio" name="iconfonts_name" data-name="notepad" id="ti-notepad" value="ti-notepad"><label for="ti-notepad"><i class="ti-notepad"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="server" ><input type="radio" name="iconfonts_name" data-name="server" id="ti-server" value="ti-server"><label for="ti-server"><i class="ti-server"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="quote-right" ><input type="radio" name="iconfonts_name" data-name="quote-right" id="ti-quote-right" value="ti-quote-right"><label for="ti-quote-right"><i class="ti-quote-right"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="quote-left" ><input type="radio" name="iconfonts_name" data-name="quote-left" id="ti-quote-left" value="ti-quote-left"><label for="ti-quote-left"><i class="ti-quote-left"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="pulse" ><input type="radio" name="iconfonts_name" data-name="pulse" id="ti-pulse" value="ti-pulse"><label for="ti-pulse"><i class="ti-pulse"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="printer" ><input type="radio" name="iconfonts_name" data-name="printer" id="ti-printer" value="ti-printer"><label for="ti-printer"><i class="ti-printer"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="power-off" ><input type="radio" name="iconfonts_name" data-name="power-off" id="ti-power-off" value="ti-power-off"><label for="ti-power-off"><i class="ti-power-off"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="plug" ><input type="radio" name="iconfonts_name" data-name="plug" id="ti-plug" value="ti-plug"><label for="ti-plug"><i class="ti-plug"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="pie-chart" ><input type="radio" name="iconfonts_name" data-name="pie-chart" id="ti-pie-chart" value="ti-pie-chart"><label for="ti-pie-chart"><i class="ti-pie-chart"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="paragraph" ><input type="radio" name="iconfonts_name" data-name="paragraph" id="ti-paragraph" value="ti-paragraph"><label for="ti-paragraph"><i class="ti-paragraph"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="panel" ><input type="radio" name="iconfonts_name" data-name="panel" id="ti-panel" value="ti-panel"><label for="ti-panel"><i class="ti-panel"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="package" ><input type="radio" name="iconfonts_name" data-name="package" id="ti-package" value="ti-package"><label for="ti-package"><i class="ti-package"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="music" ><input type="radio" name="iconfonts_name" data-name="music" id="ti-music" value="ti-music"><label for="ti-music"><i class="ti-music"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="music-alt" ><input type="radio" name="iconfonts_name" data-name="music-alt" id="ti-music-alt" value="ti-music-alt"><label for="ti-music-alt"><i class="ti-music-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="mouse" ><input type="radio" name="iconfonts_name" data-name="mouse" id="ti-mouse" value="ti-mouse"><label for="ti-mouse"><i class="ti-mouse"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="mouse-alt" ><input type="radio" name="iconfonts_name" data-name="mouse-alt" id="ti-mouse-alt" value="ti-mouse-alt"><label for="ti-mouse-alt"><i class="ti-mouse-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="money" ><input type="radio" name="iconfonts_name" data-name="money" id="ti-money" value="ti-money"><label for="ti-money"><i class="ti-money"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="microphone" ><input type="radio" name="iconfonts_name" data-name="microphone" id="ti-microphone" value="ti-microphone"><label for="ti-microphone"><i class="ti-microphone"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="menu" ><input type="radio" name="iconfonts_name" data-name="menu" id="ti-menu" value="ti-menu"><label for="ti-menu"><i class="ti-menu"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="menu-alt" ><input type="radio" name="iconfonts_name" data-name="menu-alt" id="ti-menu-alt" value="ti-menu-alt"><label for="ti-menu-alt"><i class="ti-menu-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="map" ><input type="radio" name="iconfonts_name" data-name="map" id="ti-map" value="ti-map"><label for="ti-map"><i class="ti-map"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="map-alt" ><input type="radio" name="iconfonts_name" data-name="map-alt" id="ti-map-alt" value="ti-map-alt"><label for="ti-map-alt"><i class="ti-map-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="loop" ><input type="radio" name="iconfonts_name" data-name="loop" id="ti-loop" value="ti-loop"><label for="ti-loop"><i class="ti-loop"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="location-pin" ><input type="radio" name="iconfonts_name" data-name="location-pin" id="ti-location-pin" value="ti-location-pin"><label for="ti-location-pin"><i class="ti-location-pin"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="list" ><input type="radio" name="iconfonts_name" data-name="list" id="ti-list" value="ti-list"><label for="ti-list"><i class="ti-list"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="light-bulb" ><input type="radio" name="iconfonts_name" data-name="light-bulb" id="ti-light-bulb" value="ti-light-bulb"><label for="ti-light-bulb"><i class="ti-light-bulb"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="Italic" ><input type="radio" name="iconfonts_name" data-name="Italic" id="ti-Italic" value="ti-Italic"><label for="ti-Italic"><i class="ti-Italic"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="info" ><input type="radio" name="iconfonts_name" data-name="info" id="ti-info" value="ti-info"><label for="ti-info"><i class="ti-info"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="infinite" ><input type="radio" name="iconfonts_name" data-name="infinite" id="ti-infinite" value="ti-infinite"><label for="ti-infinite"><i class="ti-infinite"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="id-badge" ><input type="radio" name="iconfonts_name" data-name="id-badge" id="ti-id-badge" value="ti-id-badge"><label for="ti-id-badge"><i class="ti-id-badge"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="hummer" ><input type="radio" name="iconfonts_name" data-name="hummer" id="ti-hummer" value="ti-hummer"><label for="ti-hummer"><i class="ti-hummer"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="home" ><input type="radio" name="iconfonts_name" data-name="home" id="ti-home" value="ti-home"><label for="ti-home"><i class="ti-home"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="help" ><input type="radio" name="iconfonts_name" data-name="help" id="ti-help" value="ti-help"><label for="ti-help"><i class="ti-help"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="headphone" ><input type="radio" name="iconfonts_name" data-name="headphone" id="ti-headphone" value="ti-headphone"><label for="ti-headphone"><i class="ti-headphone"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="harddrives" ><input type="radio" name="iconfonts_name" data-name="harddrives" id="ti-harddrives" value="ti-harddrives"><label for="ti-harddrives"><i class="ti-harddrives"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="harddrive" ><input type="radio" name="iconfonts_name" data-name="harddrive" id="ti-harddrive" value="ti-harddrive"><label for="ti-harddrive"><i class="ti-harddrive"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="gift" ><input type="radio" name="iconfonts_name" data-name="gift" id="ti-gift" value="ti-gift"><label for="ti-gift"><i class="ti-gift"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="game" ><input type="radio" name="iconfonts_name" data-name="game" id="ti-game" value="ti-game"><label for="ti-game"><i class="ti-game"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="filter" ><input type="radio" name="iconfonts_name" data-name="filter" id="ti-filter" value="ti-filter"><label for="ti-filter"><i class="ti-filter"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="files" ><input type="radio" name="iconfonts_name" data-name="files" id="ti-files" value="ti-files"><label for="ti-files"><i class="ti-files"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="file" ><input type="radio" name="iconfonts_name" data-name="file" id="ti-file" value="ti-file"><label for="ti-file"><i class="ti-file"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="eraser" ><input type="radio" name="iconfonts_name" data-name="eraser" id="ti-eraser" value="ti-eraser"><label for="ti-eraser"><i class="ti-eraser"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="envelope" ><input type="radio" name="iconfonts_name" data-name="envelope" id="ti-envelope" value="ti-envelope"><label for="ti-envelope"><i class="ti-envelope"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="download" ><input type="radio" name="iconfonts_name" data-name="download" id="ti-download" value="ti-download"><label for="ti-download"><i class="ti-download"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="direction" ><input type="radio" name="iconfonts_name" data-name="direction" id="ti-direction" value="ti-direction"><label for="ti-direction"><i class="ti-direction"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="direction-alt" ><input type="radio" name="iconfonts_name" data-name="direction-alt" id="ti-direction-alt" value="ti-direction-alt"><label for="ti-direction-alt"><i class="ti-direction-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="dashboard" ><input type="radio" name="iconfonts_name" data-name="dashboard" id="ti-dashboard" value="ti-dashboard"><label for="ti-dashboard"><i class="ti-dashboard"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="control-stop" ><input type="radio" name="iconfonts_name" data-name="control-stop" id="ti-control-stop" value="ti-control-stop"><label for="ti-control-stop"><i class="ti-control-stop"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="control-shuffle" ><input type="radio" name="iconfonts_name" data-name="control-shuffle" id="ti-control-shuffle" value="ti-control-shuffle"><label for="ti-control-shuffle"><i class="ti-control-shuffle"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="control-play" ><input type="radio" name="iconfonts_name" data-name="control-play" id="ti-control-play" value="ti-control-play"><label for="ti-control-play"><i class="ti-control-play"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="control-pause" ><input type="radio" name="iconfonts_name" data-name="control-pause" id="ti-control-pause" value="ti-control-pause"><label for="ti-control-pause"><i class="ti-control-pause"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="control-forward" ><input type="radio" name="iconfonts_name" data-name="control-forward" id="ti-control-forward" value="ti-control-forward"><label for="ti-control-forward"><i class="ti-control-forward"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="control-backward" ><input type="radio" name="iconfonts_name" data-name="control-backward" id="ti-control-backward" value="ti-control-backward"><label for="ti-control-backward"><i class="ti-control-backward"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="cloud" ><input type="radio" name="iconfonts_name" data-name="cloud" id="ti-cloud" value="ti-cloud"><label for="ti-cloud"><i class="ti-cloud"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="cloud-up" ><input type="radio" name="iconfonts_name" data-name="cloud-up" id="ti-cloud-up" value="ti-cloud-up"><label for="ti-cloud-up"><i class="ti-cloud-up"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="cloud-down" ><input type="radio" name="iconfonts_name" data-name="cloud-down" id="ti-cloud-down" value="ti-cloud-down"><label for="ti-cloud-down"><i class="ti-cloud-down"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="clipboard" ><input type="radio" name="iconfonts_name" data-name="clipboard" id="ti-clipboard" value="ti-clipboard"><label for="ti-clipboard"><i class="ti-clipboard"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="car" ><input type="radio" name="iconfonts_name" data-name="car" id="ti-car" value="ti-car"><label for="ti-car"><i class="ti-car"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="calendar" ><input type="radio" name="iconfonts_name" data-name="calendar" id="ti-calendar" value="ti-calendar"><label for="ti-calendar"><i class="ti-calendar"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="book" ><input type="radio" name="iconfonts_name" data-name="book" id="ti-book" value="ti-book"><label for="ti-book"><i class="ti-book"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="bell" ><input type="radio" name="iconfonts_name" data-name="bell" id="ti-bell" value="ti-bell"><label for="ti-bell"><i class="ti-bell"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="basketball" ><input type="radio" name="iconfonts_name" data-name="basketball" id="ti-basketball" value="ti-basketball"><label for="ti-basketball"><i class="ti-basketball"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="bar-chart" ><input type="radio" name="iconfonts_name" data-name="bar-chart" id="ti-bar-chart" value="ti-bar-chart"><label for="ti-bar-chart"><i class="ti-bar-chart"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="bar-chart-alt" ><input type="radio" name="iconfonts_name" data-name="bar-chart-alt" id="ti-bar-chart-alt" value="ti-bar-chart-alt"><label for="ti-bar-chart-alt"><i class="ti-bar-chart-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="back-right" ><input type="radio" name="iconfonts_name" data-name="back-right" id="ti-back-right" value="ti-back-right"><label for="ti-back-right"><i class="ti-back-right"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="back-left" ><input type="radio" name="iconfonts_name" data-name="back-left" id="ti-back-left" value="ti-back-left"><label for="ti-back-left"><i class="ti-back-left"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="arrows-corner" ><input type="radio" name="iconfonts_name" data-name="arrows-corner" id="ti-arrows-corner" value="ti-arrows-corner"><label for="ti-arrows-corner"><i class="ti-arrows-corner"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="archive" ><input type="radio" name="iconfonts_name" data-name="archive" id="ti-archive" value="ti-archive"><label for="ti-archive"><i class="ti-archive"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="anchor" ><input type="radio" name="iconfonts_name" data-name="anchor" id="ti-anchor" value="ti-anchor"><label for="ti-anchor"><i class="ti-anchor"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="align-right" ><input type="radio" name="iconfonts_name" data-name="align-right" id="ti-align-right" value="ti-align-right"><label for="ti-align-right"><i class="ti-align-right"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="align-left" ><input type="radio" name="iconfonts_name" data-name="align-left" id="ti-align-left" value="ti-align-left"><label for="ti-align-left"><i class="ti-align-left"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="align-justify" ><input type="radio" name="iconfonts_name" data-name="align-justify" id="ti-align-justify" value="ti-align-justify"><label for="ti-align-justify"><i class="ti-align-justify"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="align-center" ><input type="radio" name="iconfonts_name" data-name="align-center" id="ti-align-center" value="ti-align-center"><label for="ti-align-center"><i class="ti-align-center"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="alert" ><input type="radio" name="iconfonts_name" data-name="alert" id="ti-alert" value="ti-alert"><label for="ti-alert"><i class="ti-alert"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="alarm-clock" ><input type="radio" name="iconfonts_name" data-name="alarm-clock" id="ti-alarm-clock" value="ti-alarm-clock"><label for="ti-alarm-clock"><i class="ti-alarm-clock"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="agenda" ><input type="radio" name="iconfonts_name" data-name="agenda" id="ti-agenda" value="ti-agenda"><label for="ti-agenda"><i class="ti-agenda"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="write" ><input type="radio" name="iconfonts_name" data-name="write" id="ti-write" value="ti-write"><label for="ti-write"><i class="ti-write"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="window" ><input type="radio" name="iconfonts_name" data-name="window" id="ti-window" value="ti-window"><label for="ti-window"><i class="ti-window"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="widgetized" ><input type="radio" name="iconfonts_name" data-name="widgetized" id="ti-widgetized" value="ti-widgetized"><label for="ti-widgetized"><i class="ti-widgetized"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="widget" ><input type="radio" name="iconfonts_name" data-name="widget" id="ti-widget" value="ti-widget"><label for="ti-widget"><i class="ti-widget"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="widget-alt" ><input type="radio" name="iconfonts_name" data-name="widget-alt" id="ti-widget-alt" value="ti-widget-alt"><label for="ti-widget-alt"><i class="ti-widget-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="wallet" ><input type="radio" name="iconfonts_name" data-name="wallet" id="ti-wallet" value="ti-wallet"><label for="ti-wallet"><i class="ti-wallet"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="video-clapper" ><input type="radio" name="iconfonts_name" data-name="video-clapper" id="ti-video-clapper" value="ti-video-clapper"><label for="ti-video-clapper"><i class="ti-video-clapper"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="video-camera" ><input type="radio" name="iconfonts_name" data-name="video-camera" id="ti-video-camera" value="ti-video-camera"><label for="ti-video-camera"><i class="ti-video-camera"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="vector" ><input type="radio" name="iconfonts_name" data-name="vector" id="ti-vector" value="ti-vector"><label for="ti-vector"><i class="ti-vector"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="themify-logo" ><input type="radio" name="iconfonts_name" data-name="themify-logo" id="ti-themify-logo" value="ti-themify-logo"><label for="ti-themify-logo"><i class="ti-themify-logo"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="themify-favicon" ><input type="radio" name="iconfonts_name" data-name="themify-favicon" id="ti-themify-favicon" value="ti-themify-favicon"><label for="ti-themify-favicon"><i class="ti-themify-favicon"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="themify-favicon-alt" ><input type="radio" name="iconfonts_name" data-name="themify-favicon-alt" id="ti-themify-favicon-alt" value="ti-themify-favicon-alt"><label for="ti-themify-favicon-alt"><i class="ti-themify-favicon-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="support" ><input type="radio" name="iconfonts_name" data-name="support" id="ti-support" value="ti-support"><label for="ti-support"><i class="ti-support"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="stamp" ><input type="radio" name="iconfonts_name" data-name="stamp" id="ti-stamp" value="ti-stamp"><label for="ti-stamp"><i class="ti-stamp"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="split-v-alt" ><input type="radio" name="iconfonts_name" data-name="split-v-alt" id="ti-split-v-alt" value="ti-split-v-alt"><label for="ti-split-v-alt"><i class="ti-split-v-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="slice" ><input type="radio" name="iconfonts_name" data-name="slice" id="ti-slice" value="ti-slice"><label for="ti-slice"><i class="ti-slice"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="shortcode" ><input type="radio" name="iconfonts_name" data-name="shortcode" id="ti-shortcode" value="ti-shortcode"><label for="ti-shortcode"><i class="ti-shortcode"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="shift-right-alt" ><input type="radio" name="iconfonts_name" data-name="shift-right-alt" id="ti-shift-right-alt" value="ti-shift-right-alt"><label for="ti-shift-right-alt"><i class="ti-shift-right-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="shift-left-alt" ><input type="radio" name="iconfonts_name" data-name="shift-left-alt" id="ti-shift-left-alt" value="ti-shift-left-alt"><label for="ti-shift-left-alt"><i class="ti-shift-left-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="ruler-alt-2" ><input type="radio" name="iconfonts_name" data-name="ruler-alt-2" id="ti-ruler-alt-2" value="ti-ruler-alt-2"><label for="ti-ruler-alt-2"><i class="ti-ruler-alt-2"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="receipt" ><input type="radio" name="iconfonts_name" data-name="receipt" id="ti-receipt" value="ti-receipt"><label for="ti-receipt"><i class="ti-receipt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="pin2" ><input type="radio" name="iconfonts_name" data-name="pin2" id="ti-pin2" value="ti-pin2"><label for="ti-pin2"><i class="ti-pin2"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="pin-alt" ><input type="radio" name="iconfonts_name" data-name="pin-alt" id="ti-pin-alt" value="ti-pin-alt"><label for="ti-pin-alt"><i class="ti-pin-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="pencil-alt2" ><input type="radio" name="iconfonts_name" data-name="pencil-alt2" id="ti-pencil-alt2" value="ti-pencil-alt2"><label for="ti-pencil-alt2"><i class="ti-pencil-alt2"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="palette" ><input type="radio" name="iconfonts_name" data-name="palette" id="ti-palette" value="ti-palette"><label for="ti-palette"><i class="ti-palette"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="more" ><input type="radio" name="iconfonts_name" data-name="more" id="ti-more" value="ti-more"><label for="ti-more"><i class="ti-more"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="more-alt" ><input type="radio" name="iconfonts_name" data-name="more-alt" id="ti-more-alt" value="ti-more-alt"><label for="ti-more-alt"><i class="ti-more-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="microphone-alt" ><input type="radio" name="iconfonts_name" data-name="microphone-alt" id="ti-microphone-alt" value="ti-microphone-alt"><label for="ti-microphone-alt"><i class="ti-microphone-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="magnet" ><input type="radio" name="iconfonts_name" data-name="magnet" id="ti-magnet" value="ti-magnet"><label for="ti-magnet"><i class="ti-magnet"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="line-double" ><input type="radio" name="iconfonts_name" data-name="line-double" id="ti-line-double" value="ti-line-double"><label for="ti-line-double"><i class="ti-line-double"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="line-dotted" ><input type="radio" name="iconfonts_name" data-name="line-dotted" id="ti-line-dotted" value="ti-line-dotted"><label for="ti-line-dotted"><i class="ti-line-dotted"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="line-dashed" ><input type="radio" name="iconfonts_name" data-name="line-dashed" id="ti-line-dashed" value="ti-line-dashed"><label for="ti-line-dashed"><i class="ti-line-dashed"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-width-full" ><input type="radio" name="iconfonts_name" data-name="layout-width-full" id="ti-layout-width-full" value="ti-layout-width-full"><label for="ti-layout-width-full"><i class="ti-layout-width-full"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-width-default" ><input type="radio" name="iconfonts_name" data-name="layout-width-default" id="ti-layout-width-default" value="ti-layout-width-default"><label for="ti-layout-width-default"><i class="ti-layout-width-default"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-width-default-alt" ><input type="radio" name="iconfonts_name" data-name="layout-width-default-alt" id="ti-layout-width-default-alt" value="ti-layout-width-default-alt"><label for="ti-layout-width-default-alt"><i class="ti-layout-width-default-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-tab" ><input type="radio" name="iconfonts_name" data-name="layout-tab" id="ti-layout-tab" value="ti-layout-tab"><label for="ti-layout-tab"><i class="ti-layout-tab"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-tab-window" ><input type="radio" name="iconfonts_name" data-name="layout-tab-window" id="ti-layout-tab-window" value="ti-layout-tab-window"><label for="ti-layout-tab-window"><i class="ti-layout-tab-window"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-tab-v" ><input type="radio" name="iconfonts_name" data-name="layout-tab-v" id="ti-layout-tab-v" value="ti-layout-tab-v"><label for="ti-layout-tab-v"><i class="ti-layout-tab-v"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-tab-min" ><input type="radio" name="iconfonts_name" data-name="layout-tab-min" id="ti-layout-tab-min" value="ti-layout-tab-min"><label for="ti-layout-tab-min"><i class="ti-layout-tab-min"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-slider" ><input type="radio" name="iconfonts_name" data-name="layout-slider" id="ti-layout-slider" value="ti-layout-slider"><label for="ti-layout-slider"><i class="ti-layout-slider"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-slider-alt" ><input type="radio" name="iconfonts_name" data-name="layout-slider-alt" id="ti-layout-slider-alt" value="ti-layout-slider-alt"><label for="ti-layout-slider-alt"><i class="ti-layout-slider-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-sidebar-right" ><input type="radio" name="iconfonts_name" data-name="layout-sidebar-right" id="ti-layout-sidebar-right" value="ti-layout-sidebar-right"><label for="ti-layout-sidebar-right"><i class="ti-layout-sidebar-right"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-sidebar-none" ><input type="radio" name="iconfonts_name" data-name="layout-sidebar-none" id="ti-layout-sidebar-none" value="ti-layout-sidebar-none"><label for="ti-layout-sidebar-none"><i class="ti-layout-sidebar-none"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-sidebar-left" ><input type="radio" name="iconfonts_name" data-name="layout-sidebar-left" id="ti-layout-sidebar-left" value="ti-layout-sidebar-left"><label for="ti-layout-sidebar-left"><i class="ti-layout-sidebar-left"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-placeholder" ><input type="radio" name="iconfonts_name" data-name="layout-placeholder" id="ti-layout-placeholder" value="ti-layout-placeholder"><label for="ti-layout-placeholder"><i class="ti-layout-placeholder"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-menu" ><input type="radio" name="iconfonts_name" data-name="layout-menu" id="ti-layout-menu" value="ti-layout-menu"><label for="ti-layout-menu"><i class="ti-layout-menu"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-menu-v" ><input type="radio" name="iconfonts_name" data-name="layout-menu-v" id="ti-layout-menu-v" value="ti-layout-menu-v"><label for="ti-layout-menu-v"><i class="ti-layout-menu-v"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-menu-separated" ><input type="radio" name="iconfonts_name" data-name="layout-menu-separated" id="ti-layout-menu-separated" value="ti-layout-menu-separated"><label for="ti-layout-menu-separated"><i class="ti-layout-menu-separated"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-menu-full" ><input type="radio" name="iconfonts_name" data-name="layout-menu-full" id="ti-layout-menu-full" value="ti-layout-menu-full"><label for="ti-layout-menu-full"><i class="ti-layout-menu-full"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-media-right-alt" ><input type="radio" name="iconfonts_name" data-name="layout-media-right-alt" id="ti-layout-media-right-alt" value="ti-layout-media-right-alt"><label for="ti-layout-media-right-alt"><i class="ti-layout-media-right-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-media-right" ><input type="radio" name="iconfonts_name" data-name="layout-media-right" id="ti-layout-media-right" value="ti-layout-media-right"><label for="ti-layout-media-right"><i class="ti-layout-media-right"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-media-overlay" ><input type="radio" name="iconfonts_name" data-name="layout-media-overlay" id="ti-layout-media-overlay" value="ti-layout-media-overlay"><label for="ti-layout-media-overlay"><i class="ti-layout-media-overlay"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-media-overlay-alt" ><input type="radio" name="iconfonts_name" data-name="layout-media-overlay-alt" id="ti-layout-media-overlay-alt" value="ti-layout-media-overlay-alt"><label for="ti-layout-media-overlay-alt"><i class="ti-layout-media-overlay-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-media-overlay-alt-2" ><input type="radio" name="iconfonts_name" data-name="layout-media-overlay-alt-2" id="ti-layout-media-overlay-alt-2" value="ti-layout-media-overlay-alt-2"><label for="ti-layout-media-overlay-alt-2"><i class="ti-layout-media-overlay-alt-2"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-media-left-alt" ><input type="radio" name="iconfonts_name" data-name="layout-media-left-alt" id="ti-layout-media-left-alt" value="ti-layout-media-left-alt"><label for="ti-layout-media-left-alt"><i class="ti-layout-media-left-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-media-left" ><input type="radio" name="iconfonts_name" data-name="layout-media-left" id="ti-layout-media-left" value="ti-layout-media-left"><label for="ti-layout-media-left"><i class="ti-layout-media-left"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-media-center-alt" ><input type="radio" name="iconfonts_name" data-name="layout-media-center-alt" id="ti-layout-media-center-alt" value="ti-layout-media-center-alt"><label for="ti-layout-media-center-alt"><i class="ti-layout-media-center-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-media-center" ><input type="radio" name="iconfonts_name" data-name="layout-media-center" id="ti-layout-media-center" value="ti-layout-media-center"><label for="ti-layout-media-center"><i class="ti-layout-media-center"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-list-thumb" ><input type="radio" name="iconfonts_name" data-name="layout-list-thumb" id="ti-layout-list-thumb" value="ti-layout-list-thumb"><label for="ti-layout-list-thumb"><i class="ti-layout-list-thumb"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-list-thumb-alt" ><input type="radio" name="iconfonts_name" data-name="layout-list-thumb-alt" id="ti-layout-list-thumb-alt" value="ti-layout-list-thumb-alt"><label for="ti-layout-list-thumb-alt"><i class="ti-layout-list-thumb-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-list-post" ><input type="radio" name="iconfonts_name" data-name="layout-list-post" id="ti-layout-list-post" value="ti-layout-list-post"><label for="ti-layout-list-post"><i class="ti-layout-list-post"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-list-large-image" ><input type="radio" name="iconfonts_name" data-name="layout-list-large-image" id="ti-layout-list-large-image" value="ti-layout-list-large-image"><label for="ti-layout-list-large-image"><i class="ti-layout-list-large-image"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-line-solid" ><input type="radio" name="iconfonts_name" data-name="layout-line-solid" id="ti-layout-line-solid" value="ti-layout-line-solid"><label for="ti-layout-line-solid"><i class="ti-layout-line-solid"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-grid4" ><input type="radio" name="iconfonts_name" data-name="layout-grid4" id="ti-layout-grid4" value="ti-layout-grid4"><label for="ti-layout-grid4"><i class="ti-layout-grid4"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-grid3" ><input type="radio" name="iconfonts_name" data-name="layout-grid3" id="ti-layout-grid3" value="ti-layout-grid3"><label for="ti-layout-grid3"><i class="ti-layout-grid3"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-grid2" ><input type="radio" name="iconfonts_name" data-name="layout-grid2" id="ti-layout-grid2" value="ti-layout-grid2"><label for="ti-layout-grid2"><i class="ti-layout-grid2"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-grid2-thumb" ><input type="radio" name="iconfonts_name" data-name="layout-grid2-thumb" id="ti-layout-grid2-thumb" value="ti-layout-grid2-thumb"><label for="ti-layout-grid2-thumb"><i class="ti-layout-grid2-thumb"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-cta-right" ><input type="radio" name="iconfonts_name" data-name="layout-cta-right" id="ti-layout-cta-right" value="ti-layout-cta-right"><label for="ti-layout-cta-right"><i class="ti-layout-cta-right"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-cta-left" ><input type="radio" name="iconfonts_name" data-name="layout-cta-left" id="ti-layout-cta-left" value="ti-layout-cta-left"><label for="ti-layout-cta-left"><i class="ti-layout-cta-left"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-cta-center" ><input type="radio" name="iconfonts_name" data-name="layout-cta-center" id="ti-layout-cta-center" value="ti-layout-cta-center"><label for="ti-layout-cta-center"><i class="ti-layout-cta-center"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-cta-btn-right" ><input type="radio" name="iconfonts_name" data-name="layout-cta-btn-right" id="ti-layout-cta-btn-right" value="ti-layout-cta-btn-right"><label for="ti-layout-cta-btn-right"><i class="ti-layout-cta-btn-right"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-cta-btn-left" ><input type="radio" name="iconfonts_name" data-name="layout-cta-btn-left" id="ti-layout-cta-btn-left" value="ti-layout-cta-btn-left"><label for="ti-layout-cta-btn-left"><i class="ti-layout-cta-btn-left"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-column4" ><input type="radio" name="iconfonts_name" data-name="layout-column4" id="ti-layout-column4" value="ti-layout-column4"><label for="ti-layout-column4"><i class="ti-layout-column4"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-column3" ><input type="radio" name="iconfonts_name" data-name="layout-column3" id="ti-layout-column3" value="ti-layout-column3"><label for="ti-layout-column3"><i class="ti-layout-column3"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-column2" ><input type="radio" name="iconfonts_name" data-name="layout-column2" id="ti-layout-column2" value="ti-layout-column2"><label for="ti-layout-column2"><i class="ti-layout-column2"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-accordion-separated" ><input type="radio" name="iconfonts_name" data-name="layout-accordion-separated" id="ti-layout-accordion-separated" value="ti-layout-accordion-separated"><label for="ti-layout-accordion-separated"><i class="ti-layout-accordion-separated"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-accordion-merged" ><input type="radio" name="iconfonts_name" data-name="layout-accordion-merged" id="ti-layout-accordion-merged" value="ti-layout-accordion-merged"><label for="ti-layout-accordion-merged"><i class="ti-layout-accordion-merged"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-accordion-list" ><input type="radio" name="iconfonts_name" data-name="layout-accordion-list" id="ti-layout-accordion-list" value="ti-layout-accordion-list"><label for="ti-layout-accordion-list"><i class="ti-layout-accordion-list"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="ink-pen" ><input type="radio" name="iconfonts_name" data-name="ink-pen" id="ti-ink-pen" value="ti-ink-pen"><label for="ti-ink-pen"><i class="ti-ink-pen"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="info-alt" ><input type="radio" name="iconfonts_name" data-name="info-alt" id="ti-info-alt" value="ti-info-alt"><label for="ti-info-alt"><i class="ti-info-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="help-alt" ><input type="radio" name="iconfonts_name" data-name="help-alt" id="ti-help-alt" value="ti-help-alt"><label for="ti-help-alt"><i class="ti-help-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="headphone-alt" ><input type="radio" name="iconfonts_name" data-name="headphone-alt" id="ti-headphone-alt" value="ti-headphone-alt"><label for="ti-headphone-alt"><i class="ti-headphone-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="hand-point-up" ><input type="radio" name="iconfonts_name" data-name="hand-point-up" id="ti-hand-point-up" value="ti-hand-point-up"><label for="ti-hand-point-up"><i class="ti-hand-point-up"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="hand-point-right" ><input type="radio" name="iconfonts_name" data-name="hand-point-right" id="ti-hand-point-right" value="ti-hand-point-right"><label for="ti-hand-point-right"><i class="ti-hand-point-right"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="hand-point-left" ><input type="radio" name="iconfonts_name" data-name="hand-point-left" id="ti-hand-point-left" value="ti-hand-point-left"><label for="ti-hand-point-left"><i class="ti-hand-point-left"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="hand-point-down" ><input type="radio" name="iconfonts_name" data-name="hand-point-down" id="ti-hand-point-down" value="ti-hand-point-down"><label for="ti-hand-point-down"><i class="ti-hand-point-down"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="gallery" ><input type="radio" name="iconfonts_name" data-name="gallery" id="ti-gallery" value="ti-gallery"><label for="ti-gallery"><i class="ti-gallery"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="face-smile" ><input type="radio" name="iconfonts_name" data-name="face-smile" id="ti-face-smile" value="ti-face-smile"><label for="ti-face-smile"><i class="ti-face-smile"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="face-sad" ><input type="radio" name="iconfonts_name" data-name="face-sad" id="ti-face-sad" value="ti-face-sad"><label for="ti-face-sad"><i class="ti-face-sad"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="credit-card" ><input type="radio" name="iconfonts_name" data-name="credit-card" id="ti-credit-card" value="ti-credit-card"><label for="ti-credit-card"><i class="ti-credit-card"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="control-skip-forward" ><input type="radio" name="iconfonts_name" data-name="control-skip-forward" id="ti-control-skip-forward" value="ti-control-skip-forward"><label for="ti-control-skip-forward"><i class="ti-control-skip-forward"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="control-skip-backward" ><input type="radio" name="iconfonts_name" data-name="control-skip-backward" id="ti-control-skip-backward" value="ti-control-skip-backward"><label for="ti-control-skip-backward"><i class="ti-control-skip-backward"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="control-record" ><input type="radio" name="iconfonts_name" data-name="control-record" id="ti-control-record" value="ti-control-record"><label for="ti-control-record"><i class="ti-control-record"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="control-eject" ><input type="radio" name="iconfonts_name" data-name="control-eject" id="ti-control-eject" value="ti-control-eject"><label for="ti-control-eject"><i class="ti-control-eject"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="comments-smiley" ><input type="radio" name="iconfonts_name" data-name="comments-smiley" id="ti-comments-smiley" value="ti-comments-smiley"><label for="ti-comments-smiley"><i class="ti-comments-smiley"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="brush-alt" ><input type="radio" name="iconfonts_name" data-name="brush-alt" id="ti-brush-alt" value="ti-brush-alt"><label for="ti-brush-alt"><i class="ti-brush-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="youtube" ><input type="radio" name="iconfonts_name" data-name="youtube" id="ti-youtube" value="ti-youtube"><label for="ti-youtube"><i class="ti-youtube"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="vimeo" ><input type="radio" name="iconfonts_name" data-name="vimeo" id="ti-vimeo" value="ti-vimeo"><label for="ti-vimeo"><i class="ti-vimeo"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="twitter" ><input type="radio" name="iconfonts_name" data-name="twitter" id="ti-twitter" value="ti-twitter"><label for="ti-twitter"><i class="ti-twitter"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="time" ><input type="radio" name="iconfonts_name" data-name="time" id="ti-time" value="ti-time"><label for="ti-time"><i class="ti-time"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="tumblr" ><input type="radio" name="iconfonts_name" data-name="tumblr" id="ti-tumblr" value="ti-tumblr"><label for="ti-tumblr"><i class="ti-tumblr"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="skype" ><input type="radio" name="iconfonts_name" data-name="skype" id="ti-skype" value="ti-skype"><label for="ti-skype"><i class="ti-skype"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="share" ><input type="radio" name="iconfonts_name" data-name="share" id="ti-share" value="ti-share"><label for="ti-share"><i class="ti-share"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="share-alt" ><input type="radio" name="iconfonts_name" data-name="share-alt" id="ti-share-alt" value="ti-share-alt"><label for="ti-share-alt"><i class="ti-share-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="rocket" ><input type="radio" name="iconfonts_name" data-name="rocket" id="ti-rocket" value="ti-rocket"><label for="ti-rocket"><i class="ti-rocket"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="pinterest" ><input type="radio" name="iconfonts_name" data-name="pinterest" id="ti-pinterest" value="ti-pinterest"><label for="ti-pinterest"><i class="ti-pinterest"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="new-window" ><input type="radio" name="iconfonts_name" data-name="new-window" id="ti-new-window" value="ti-new-window"><label for="ti-new-window"><i class="ti-new-window"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="microsoft" ><input type="radio" name="iconfonts_name" data-name="microsoft" id="ti-microsoft" value="ti-microsoft"><label for="ti-microsoft"><i class="ti-microsoft"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="list-ol" ><input type="radio" name="iconfonts_name" data-name="list-ol" id="ti-list-ol" value="ti-list-ol"><label for="ti-list-ol"><i class="ti-list-ol"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="linkedin" ><input type="radio" name="iconfonts_name" data-name="linkedin" id="ti-linkedin" value="ti-linkedin"><label for="ti-linkedin"><i class="ti-linkedin"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-sidebar-2" ><input type="radio" name="iconfonts_name" data-name="layout-sidebar-2" id="ti-layout-sidebar-2" value="ti-layout-sidebar-2"><label for="ti-layout-sidebar-2"><i class="ti-layout-sidebar-2"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-grid4-alt" ><input type="radio" name="iconfonts_name" data-name="layout-grid4-alt" id="ti-layout-grid4-alt" value="ti-layout-grid4-alt"><label for="ti-layout-grid4-alt"><i class="ti-layout-grid4-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-grid3-alt" ><input type="radio" name="iconfonts_name" data-name="layout-grid3-alt" id="ti-layout-grid3-alt" value="ti-layout-grid3-alt"><label for="ti-layout-grid3-alt"><i class="ti-layout-grid3-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-grid2-alt" ><input type="radio" name="iconfonts_name" data-name="layout-grid2-alt" id="ti-layout-grid2-alt" value="ti-layout-grid2-alt"><label for="ti-layout-grid2-alt"><i class="ti-layout-grid2-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-column4-alt" ><input type="radio" name="iconfonts_name" data-name="layout-column4-alt" id="ti-layout-column4-alt" value="ti-layout-column4-alt"><label for="ti-layout-column4-alt"><i class="ti-layout-column4-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-column3-alt" ><input type="radio" name="iconfonts_name" data-name="layout-column3-alt" id="ti-layout-column3-alt" value="ti-layout-column3-alt"><label for="ti-layout-column3-alt"><i class="ti-layout-column3-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="layout-column2-alt" ><input type="radio" name="iconfonts_name" data-name="layout-column2-alt" id="ti-layout-column2-alt" value="ti-layout-column2-alt"><label for="ti-layout-column2-alt"><i class="ti-layout-column2-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="instagram" ><input type="radio" name="iconfonts_name" data-name="instagram" id="ti-instagram" value="ti-instagram"><label for="ti-instagram"><i class="ti-instagram"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="google" ><input type="radio" name="iconfonts_name" data-name="google" id="ti-google" value="ti-google"><label for="ti-google"><i class="ti-google"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="github" ><input type="radio" name="iconfonts_name" data-name="github" id="ti-github" value="ti-github"><label for="ti-github"><i class="ti-github"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="flickr" ><input type="radio" name="iconfonts_name" data-name="flickr" id="ti-flickr" value="ti-flickr"><label for="ti-flickr"><i class="ti-flickr"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="facebook" ><input type="radio" name="iconfonts_name" data-name="facebook" id="ti-facebook" value="ti-facebook"><label for="ti-facebook"><i class="ti-facebook"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="dropbox" ><input type="radio" name="iconfonts_name" data-name="dropbox" id="ti-dropbox" value="ti-dropbox"><label for="ti-dropbox"><i class="ti-dropbox"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="dribbble" ><input type="radio" name="iconfonts_name" data-name="dribbble" id="ti-dribbble" value="ti-dribbble"><label for="ti-dribbble"><i class="ti-dribbble"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="apple" ><input type="radio" name="iconfonts_name" data-name="apple" id="ti-apple" value="ti-apple"><label for="ti-apple"><i class="ti-apple"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="android" ><input type="radio" name="iconfonts_name" data-name="android" id="ti-android" value="ti-android"><label for="ti-android"><i class="ti-android"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="save" ><input type="radio" name="iconfonts_name" data-name="save" id="ti-save" value="ti-save"><label for="ti-save"><i class="ti-save"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="save-alt" ><input type="radio" name="iconfonts_name" data-name="save-alt" id="ti-save-alt" value="ti-save-alt"><label for="ti-save-alt"><i class="ti-save-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="yahoo" ><input type="radio" name="iconfonts_name" data-name="yahoo" id="ti-yahoo" value="ti-yahoo"><label for="ti-yahoo"><i class="ti-yahoo"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="wordpress" ><input type="radio" name="iconfonts_name" data-name="wordpress" id="ti-wordpress" value="ti-wordpress"><label for="ti-wordpress"><i class="ti-wordpress"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="vimeo-alt" ><input type="radio" name="iconfonts_name" data-name="vimeo-alt" id="ti-vimeo-alt" value="ti-vimeo-alt"><label for="ti-vimeo-alt"><i class="ti-vimeo-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="twitter-alt" ><input type="radio" name="iconfonts_name" data-name="twitter-alt" id="ti-twitter-alt" value="ti-twitter-alt"><label for="ti-twitter-alt"><i class="ti-twitter-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="tumblr-alt" ><input type="radio" name="iconfonts_name" data-name="tumblr-alt" id="ti-tumblr-alt" value="ti-tumblr-alt"><label for="ti-tumblr-alt"><i class="ti-tumblr-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="trello" ><input type="radio" name="iconfonts_name" data-name="trello" id="ti-trello" value="ti-trello"><label for="ti-trello"><i class="ti-trello"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="stack-overflow" ><input type="radio" name="iconfonts_name" data-name="stack-overflow" id="ti-stack-overflow" value="ti-stack-overflow"><label for="ti-stack-overflow"><i class="ti-stack-overflow"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="soundcloud" ><input type="radio" name="iconfonts_name" data-name="soundcloud" id="ti-soundcloud" value="ti-soundcloud"><label for="ti-soundcloud"><i class="ti-soundcloud"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="sharethis" ><input type="radio" name="iconfonts_name" data-name="sharethis" id="ti-sharethis" value="ti-sharethis"><label for="ti-sharethis"><i class="ti-sharethis"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="sharethis-alt" ><input type="radio" name="iconfonts_name" data-name="sharethis-alt" id="ti-sharethis-alt" value="ti-sharethis-alt"><label for="ti-sharethis-alt"><i class="ti-sharethis-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="reddit" ><input type="radio" name="iconfonts_name" data-name="reddit" id="ti-reddit" value="ti-reddit"><label for="ti-reddit"><i class="ti-reddit"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="pinterest-alt" ><input type="radio" name="iconfonts_name" data-name="pinterest-alt" id="ti-pinterest-alt" value="ti-pinterest-alt"><label for="ti-pinterest-alt"><i class="ti-pinterest-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="microsoft-alt" ><input type="radio" name="iconfonts_name" data-name="microsoft-alt" id="ti-microsoft-alt" value="ti-microsoft-alt"><label for="ti-microsoft-alt"><i class="ti-microsoft-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="linux" ><input type="radio" name="iconfonts_name" data-name="linux" id="ti-linux" value="ti-linux"><label for="ti-linux"><i class="ti-linux"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="jsfiddle" ><input type="radio" name="iconfonts_name" data-name="jsfiddle" id="ti-jsfiddle" value="ti-jsfiddle"><label for="ti-jsfiddle"><i class="ti-jsfiddle"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="joomla" ><input type="radio" name="iconfonts_name" data-name="joomla" id="ti-joomla" value="ti-joomla"><label for="ti-joomla"><i class="ti-joomla"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="html5" ><input type="radio" name="iconfonts_name" data-name="html5" id="ti-html5" value="ti-html5"><label for="ti-html5"><i class="ti-html5"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="flickr-alt" ><input type="radio" name="iconfonts_name" data-name="flickr-alt" id="ti-flickr-alt" value="ti-flickr-alt"><label for="ti-flickr-alt"><i class="ti-flickr-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="email" ><input type="radio" name="iconfonts_name" data-name="email" id="ti-email" value="ti-email"><label for="ti-email"><i class="ti-email"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="drupal" ><input type="radio" name="iconfonts_name" data-name="drupal" id="ti-drupal" value="ti-drupal"><label for="ti-drupal"><i class="ti-drupal"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="dropbox-alt" ><input type="radio" name="iconfonts_name" data-name="dropbox-alt" id="ti-dropbox-alt" value="ti-dropbox-alt"><label for="ti-dropbox-alt"><i class="ti-dropbox-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="css3" ><input type="radio" name="iconfonts_name" data-name="css3" id="ti-css3" value="ti-css3"><label for="ti-css3"><i class="ti-css3"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="rss" ><input type="radio" name="iconfonts_name" data-name="rss" id="ti-rss" value="ti-rss"><label for="ti-rss"><i class="ti-rss"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="themify" data-name="rss-alt" ><input type="radio" name="iconfonts_name" data-name="rss-alt" id="ti-rss-alt" value="ti-rss-alt"><label for="ti-rss-alt"><i class="ti-rss-alt"></i></label></li>
					</ul>
					<ul class="7-stroke-icon-fonts" data-name="7-stroke">
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="album" ><input type="radio" name="iconfonts_name" data-name="album" id="pe-7s-album" value="pe-7s-album"><label for="pe-7s-album"><i class="pe-7s-album"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="arc" ><input type="radio" name="iconfonts_name" data-name="arc" id="pe-7s-arc" value="pe-7s-arc"><label for="pe-7s-arc"><i class="pe-7s-arc"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="back-2" ><input type="radio" name="iconfonts_name" data-name="back-2" id="pe-7s-back-2" value="pe-7s-back-2"><label for="pe-7s-back-2"><i class="pe-7s-back-2"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="bandaid" ><input type="radio" name="iconfonts_name" data-name="bandaid" id="pe-7s-bandaid" value="pe-7s-bandaid"><label for="pe-7s-bandaid"><i class="pe-7s-bandaid"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="car" ><input type="radio" name="iconfonts_name" data-name="car" id="pe-7s-car" value="pe-7s-car"><label for="pe-7s-car"><i class="pe-7s-car"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="diamond" ><input type="radio" name="iconfonts_name" data-name="diamond" id="pe-7s-diamond" value="pe-7s-diamond"><label for="pe-7s-diamond"><i class="pe-7s-diamond"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="door-lock" ><input type="radio" name="iconfonts_name" data-name="door-lock" id="pe-7s-door-lock" value="pe-7s-door-lock"><label for="pe-7s-door-lock"><i class="pe-7s-door-lock"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="eyedropper" ><input type="radio" name="iconfonts_name" data-name="eyedropper" id="pe-7s-eyedropper" value="pe-7s-eyedropper"><label for="pe-7s-eyedropper"><i class="pe-7s-eyedropper"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="female" ><input type="radio" name="iconfonts_name" data-name="female" id="pe-7s-female" value="pe-7s-female"><label for="pe-7s-female"><i class="pe-7s-female"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="gym" ><input type="radio" name="iconfonts_name" data-name="gym" id="pe-7s-gym" value="pe-7s-gym"><label for="pe-7s-gym"><i class="pe-7s-gym"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="hammer" ><input type="radio" name="iconfonts_name" data-name="hammer" id="pe-7s-hammer" value="pe-7s-hammer"><label for="pe-7s-hammer"><i class="pe-7s-hammer"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="headphones" ><input type="radio" name="iconfonts_name" data-name="headphones" id="pe-7s-headphones" value="pe-7s-headphones"><label for="pe-7s-headphones"><i class="pe-7s-headphones"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="helm" ><input type="radio" name="iconfonts_name" data-name="helm" id="pe-7s-helm" value="pe-7s-helm"><label for="pe-7s-helm"><i class="pe-7s-helm"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="hourglass" ><input type="radio" name="iconfonts_name" data-name="hourglass" id="pe-7s-hourglass" value="pe-7s-hourglass"><label for="pe-7s-hourglass"><i class="pe-7s-hourglass"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="leaf" ><input type="radio" name="iconfonts_name" data-name="leaf" id="pe-7s-leaf" value="pe-7s-leaf"><label for="pe-7s-leaf"><i class="pe-7s-leaf"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="magic-wand" ><input type="radio" name="iconfonts_name" data-name="magic-wand" id="pe-7s-magic-wand" value="pe-7s-magic-wand"><label for="pe-7s-magic-wand"><i class="pe-7s-magic-wand"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="male" ><input type="radio" name="iconfonts_name" data-name="male" id="pe-7s-male" value="pe-7s-male"><label for="pe-7s-male"><i class="pe-7s-male"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="map-2" ><input type="radio" name="iconfonts_name" data-name="map-2" id="pe-7s-map-2" value="pe-7s-map-2"><label for="pe-7s-map-2"><i class="pe-7s-map-2"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="next-2" ><input type="radio" name="iconfonts_name" data-name="next-2" id="pe-7s-next-2" value="pe-7s-next-2"><label for="pe-7s-next-2"><i class="pe-7s-next-2"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="paint-bucket" ><input type="radio" name="iconfonts_name" data-name="paint-bucket" id="pe-7s-paint-bucket" value="pe-7s-paint-bucket"><label for="pe-7s-paint-bucket"><i class="pe-7s-paint-bucket"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="pendrive" ><input type="radio" name="iconfonts_name" data-name="pendrive" id="pe-7s-pendrive" value="pe-7s-pendrive"><label for="pe-7s-pendrive"><i class="pe-7s-pendrive"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="photo" ><input type="radio" name="iconfonts_name" data-name="photo" id="pe-7s-photo" value="pe-7s-photo"><label for="pe-7s-photo"><i class="pe-7s-photo"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="piggy" ><input type="radio" name="iconfonts_name" data-name="piggy" id="pe-7s-piggy" value="pe-7s-piggy"><label for="pe-7s-piggy"><i class="pe-7s-piggy"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="plugin" ><input type="radio" name="iconfonts_name" data-name="plugin" id="pe-7s-plugin" value="pe-7s-plugin"><label for="pe-7s-plugin"><i class="pe-7s-plugin"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="refresh-2" ><input type="radio" name="iconfonts_name" data-name="refresh-2" id="pe-7s-refresh-2" value="pe-7s-refresh-2"><label for="pe-7s-refresh-2"><i class="pe-7s-refresh-2"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="rocket" ><input type="radio" name="iconfonts_name" data-name="rocket" id="pe-7s-rocket" value="pe-7s-rocket"><label for="pe-7s-rocket"><i class="pe-7s-rocket"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="settings" ><input type="radio" name="iconfonts_name" data-name="settings" id="pe-7s-settings" value="pe-7s-settings"><label for="pe-7s-settings"><i class="pe-7s-settings"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="shield" ><input type="radio" name="iconfonts_name" data-name="shield" id="pe-7s-shield" value="pe-7s-shield"><label for="pe-7s-shield"><i class="pe-7s-shield"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="smile" ><input type="radio" name="iconfonts_name" data-name="smile" id="pe-7s-smile" value="pe-7s-smile"><label for="pe-7s-smile"><i class="pe-7s-smile"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="usb" ><input type="radio" name="iconfonts_name" data-name="usb" id="pe-7s-usb" value="pe-7s-usb"><label for="pe-7s-usb"><i class="pe-7s-usb"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="vector" ><input type="radio" name="iconfonts_name" data-name="vector" id="pe-7s-vector" value="pe-7s-vector"><label for="pe-7s-vector"><i class="pe-7s-vector"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="wine" ><input type="radio" name="iconfonts_name" data-name="wine" id="pe-7s-wine" value="pe-7s-wine"><label for="pe-7s-wine"><i class="pe-7s-wine"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="cloud-upload" ><input type="radio" name="iconfonts_name" data-name="cloud-upload" id="pe-7s-cloud-upload" value="pe-7s-cloud-upload"><label for="pe-7s-cloud-upload"><i class="pe-7s-cloud-upload"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="cash" ><input type="radio" name="iconfonts_name" data-name="cash" id="pe-7s-cash" value="pe-7s-cash"><label for="pe-7s-cash"><i class="pe-7s-cash"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="close" ><input type="radio" name="iconfonts_name" data-name="close" id="pe-7s-close" value="pe-7s-close"><label for="pe-7s-close"><i class="pe-7s-close"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="bluetooth" ><input type="radio" name="iconfonts_name" data-name="bluetooth" id="pe-7s-bluetooth" value="pe-7s-bluetooth"><label for="pe-7s-bluetooth"><i class="pe-7s-bluetooth"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="cloud-download" ><input type="radio" name="iconfonts_name" data-name="cloud-download" id="pe-7s-cloud-download" value="pe-7s-cloud-download"><label for="pe-7s-cloud-download"><i class="pe-7s-cloud-download"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="way" ><input type="radio" name="iconfonts_name" data-name="way" id="pe-7s-way" value="pe-7s-way"><label for="pe-7s-way"><i class="pe-7s-way"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="close-circle" ><input type="radio" name="iconfonts_name" data-name="close-circle" id="pe-7s-close-circle" value="pe-7s-close-circle"><label for="pe-7s-close-circle"><i class="pe-7s-close-circle"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="id" ><input type="radio" name="iconfonts_name" data-name="id" id="pe-7s-id" value="pe-7s-id"><label for="pe-7s-id"><i class="pe-7s-id"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="angle-up" ><input type="radio" name="iconfonts_name" data-name="angle-up" id="pe-7s-angle-up" value="pe-7s-angle-up"><label for="pe-7s-angle-up"><i class="pe-7s-angle-up"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="wristwatch" ><input type="radio" name="iconfonts_name" data-name="wristwatch" id="pe-7s-wristwatch" value="pe-7s-wristwatch"><label for="pe-7s-wristwatch"><i class="pe-7s-wristwatch"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="angle-up-circle" ><input type="radio" name="iconfonts_name" data-name="angle-up-circle" id="pe-7s-angle-up-circle" value="pe-7s-angle-up-circle"><label for="pe-7s-angle-up-circle"><i class="pe-7s-angle-up-circle"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="world" ><input type="radio" name="iconfonts_name" data-name="world" id="pe-7s-world" value="pe-7s-world"><label for="pe-7s-world"><i class="pe-7s-world"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="angle-right" ><input type="radio" name="iconfonts_name" data-name="angle-right" id="pe-7s-angle-right" value="pe-7s-angle-right"><label for="pe-7s-angle-right"><i class="pe-7s-angle-right"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="volume" ><input type="radio" name="iconfonts_name" data-name="volume" id="pe-7s-volume" value="pe-7s-volume"><label for="pe-7s-volume"><i class="pe-7s-volume"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="angle-right-circle" ><input type="radio" name="iconfonts_name" data-name="angle-right-circle" id="pe-7s-angle-right-circle" value="pe-7s-angle-right-circle"><label for="pe-7s-angle-right-circle"><i class="pe-7s-angle-right-circle"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="users" ><input type="radio" name="iconfonts_name" data-name="users" id="pe-7s-users" value="pe-7s-users"><label for="pe-7s-users"><i class="pe-7s-users"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="angle-left" ><input type="radio" name="iconfonts_name" data-name="angle-left" id="pe-7s-angle-left" value="pe-7s-angle-left"><label for="pe-7s-angle-left"><i class="pe-7s-angle-left"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="user-female" ><input type="radio" name="iconfonts_name" data-name="user-female" id="pe-7s-user-female" value="pe-7s-user-female"><label for="pe-7s-user-female"><i class="pe-7s-user-female"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="angle-left-circle" ><input type="radio" name="iconfonts_name" data-name="angle-left-circle" id="pe-7s-angle-left-circle" value="pe-7s-angle-left-circle"><label for="pe-7s-angle-left-circle"><i class="pe-7s-angle-left-circle"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="up-arrow" ><input type="radio" name="iconfonts_name" data-name="up-arrow" id="pe-7s-up-arrow" value="pe-7s-up-arrow"><label for="pe-7s-up-arrow"><i class="pe-7s-up-arrow"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="angle-down" ><input type="radio" name="iconfonts_name" data-name="angle-down" id="pe-7s-angle-down" value="pe-7s-angle-down"><label for="pe-7s-angle-down"><i class="pe-7s-angle-down"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="switch" ><input type="radio" name="iconfonts_name" data-name="switch" id="pe-7s-switch" value="pe-7s-switch"><label for="pe-7s-switch"><i class="pe-7s-switch"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="angle-down-circle" ><input type="radio" name="iconfonts_name" data-name="angle-down-circle" id="pe-7s-angle-down-circle" value="pe-7s-angle-down-circle"><label for="pe-7s-angle-down-circle"><i class="pe-7s-angle-down-circle"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="scissors" ><input type="radio" name="iconfonts_name" data-name="scissors" id="pe-7s-scissors" value="pe-7s-scissors"><label for="pe-7s-scissors"><i class="pe-7s-scissors"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="wallet" ><input type="radio" name="iconfonts_name" data-name="wallet" id="pe-7s-wallet" value="pe-7s-wallet"><label for="pe-7s-wallet"><i class="pe-7s-wallet"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="safe" ><input type="radio" name="iconfonts_name" data-name="safe" id="pe-7s-safe" value="pe-7s-safe"><label for="pe-7s-safe"><i class="pe-7s-safe"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="volume2" ><input type="radio" name="iconfonts_name" data-name="volume2" id="pe-7s-volume2" value="pe-7s-volume2"><label for="pe-7s-volume2"><i class="pe-7s-volume2"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="volume1" ><input type="radio" name="iconfonts_name" data-name="volume1" id="pe-7s-volume1" value="pe-7s-volume1"><label for="pe-7s-volume1"><i class="pe-7s-volume1"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="voicemail" ><input type="radio" name="iconfonts_name" data-name="voicemail" id="pe-7s-voicemail" value="pe-7s-voicemail"><label for="pe-7s-voicemail"><i class="pe-7s-voicemail"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="video" ><input type="radio" name="iconfonts_name" data-name="video" id="pe-7s-video" value="pe-7s-video"><label for="pe-7s-video"><i class="pe-7s-video"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="user" ><input type="radio" name="iconfonts_name" data-name="user" id="pe-7s-user" value="pe-7s-user"><label for="pe-7s-user"><i class="pe-7s-user"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="upload" ><input type="radio" name="iconfonts_name" data-name="upload" id="pe-7s-upload" value="pe-7s-upload"><label for="pe-7s-upload"><i class="pe-7s-upload"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="unlock" ><input type="radio" name="iconfonts_name" data-name="unlock" id="pe-7s-unlock" value="pe-7s-unlock"><label for="pe-7s-unlock"><i class="pe-7s-unlock"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="umbrella" ><input type="radio" name="iconfonts_name" data-name="umbrella" id="pe-7s-umbrella" value="pe-7s-umbrella"><label for="pe-7s-umbrella"><i class="pe-7s-umbrella"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="trash" ><input type="radio" name="iconfonts_name" data-name="trash" id="pe-7s-trash" value="pe-7s-trash"><label for="pe-7s-trash"><i class="pe-7s-trash"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="tools" ><input type="radio" name="iconfonts_name" data-name="tools" id="pe-7s-tools" value="pe-7s-tools"><label for="pe-7s-tools"><i class="pe-7s-tools"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="timer" ><input type="radio" name="iconfonts_name" data-name="timer" id="pe-7s-timer" value="pe-7s-timer"><label for="pe-7s-timer"><i class="pe-7s-timer"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="ticket" ><input type="radio" name="iconfonts_name" data-name="ticket" id="pe-7s-ticket" value="pe-7s-ticket"><label for="pe-7s-ticket"><i class="pe-7s-ticket"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="target" ><input type="radio" name="iconfonts_name" data-name="target" id="pe-7s-target" value="pe-7s-target"><label for="pe-7s-target"><i class="pe-7s-target"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="sun" ><input type="radio" name="iconfonts_name" data-name="sun" id="pe-7s-sun" value="pe-7s-sun"><label for="pe-7s-sun"><i class="pe-7s-sun"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="study" ><input type="radio" name="iconfonts_name" data-name="study" id="pe-7s-study" value="pe-7s-study"><label for="pe-7s-study"><i class="pe-7s-study"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="stopwatch" ><input type="radio" name="iconfonts_name" data-name="stopwatch" id="pe-7s-stopwatch" value="pe-7s-stopwatch"><label for="pe-7s-stopwatch"><i class="pe-7s-stopwatch"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="star" ><input type="radio" name="iconfonts_name" data-name="star" id="pe-7s-star" value="pe-7s-star"><label for="pe-7s-star"><i class="pe-7s-star"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="speaker" ><input type="radio" name="iconfonts_name" data-name="speaker" id="pe-7s-speaker" value="pe-7s-speaker"><label for="pe-7s-speaker"><i class="pe-7s-speaker"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="signal" ><input type="radio" name="iconfonts_name" data-name="signal" id="pe-7s-signal" value="pe-7s-signal"><label for="pe-7s-signal"><i class="pe-7s-signal"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="shuffle" ><input type="radio" name="iconfonts_name" data-name="shuffle" id="pe-7s-shuffle" value="pe-7s-shuffle"><label for="pe-7s-shuffle"><i class="pe-7s-shuffle"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="shopbag" ><input type="radio" name="iconfonts_name" data-name="shopbag" id="pe-7s-shopbag" value="pe-7s-shopbag"><label for="pe-7s-shopbag"><i class="pe-7s-shopbag"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="share" ><input type="radio" name="iconfonts_name" data-name="share" id="pe-7s-share" value="pe-7s-share"><label for="pe-7s-share"><i class="pe-7s-share"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="server" ><input type="radio" name="iconfonts_name" data-name="server" id="pe-7s-server" value="pe-7s-server"><label for="pe-7s-server"><i class="pe-7s-server"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="search" ><input type="radio" name="iconfonts_name" data-name="search" id="pe-7s-search" value="pe-7s-search"><label for="pe-7s-search"><i class="pe-7s-search"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="film" ><input type="radio" name="iconfonts_name" data-name="film" id="pe-7s-film" value="pe-7s-film"><label for="pe-7s-film"><i class="pe-7s-film"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="science" ><input type="radio" name="iconfonts_name" data-name="science" id="pe-7s-science" value="pe-7s-science"><label for="pe-7s-science"><i class="pe-7s-science"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="disk" ><input type="radio" name="iconfonts_name" data-name="disk" id="pe-7s-disk" value="pe-7s-disk"><label for="pe-7s-disk"><i class="pe-7s-disk"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="ribbon" ><input type="radio" name="iconfonts_name" data-name="ribbon" id="pe-7s-ribbon" value="pe-7s-ribbon"><label for="pe-7s-ribbon"><i class="pe-7s-ribbon"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="repeat" ><input type="radio" name="iconfonts_name" data-name="repeat" id="pe-7s-repeat" value="pe-7s-repeat"><label for="pe-7s-repeat"><i class="pe-7s-repeat"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="refresh" ><input type="radio" name="iconfonts_name" data-name="refresh" id="pe-7s-refresh" value="pe-7s-refresh"><label for="pe-7s-refresh"><i class="pe-7s-refresh"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="add-user" ><input type="radio" name="iconfonts_name" data-name="add-user" id="pe-7s-add-user" value="pe-7s-add-user"><label for="pe-7s-add-user"><i class="pe-7s-add-user"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="refresh-cloud" ><input type="radio" name="iconfonts_name" data-name="refresh-cloud" id="pe-7s-refresh-cloud" value="pe-7s-refresh-cloud"><label for="pe-7s-refresh-cloud"><i class="pe-7s-refresh-cloud"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="paperclip" ><input type="radio" name="iconfonts_name" data-name="paperclip" id="pe-7s-paperclip" value="pe-7s-paperclip"><label for="pe-7s-paperclip"><i class="pe-7s-paperclip"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="radio" ><input type="radio" name="iconfonts_name" data-name="radio" id="pe-7s-radio" value="pe-7s-radio"><label for="pe-7s-radio"><i class="pe-7s-radio"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="note2" ><input type="radio" name="iconfonts_name" data-name="note2" id="pe-7s-note2" value="pe-7s-note2"><label for="pe-7s-note2"><i class="pe-7s-note2"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="print" ><input type="radio" name="iconfonts_name" data-name="print" id="pe-7s-print" value="pe-7s-print"><label for="pe-7s-print"><i class="pe-7s-print"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="network" ><input type="radio" name="iconfonts_name" data-name="network" id="pe-7s-network" value="pe-7s-network"><label for="pe-7s-network"><i class="pe-7s-network"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="prev" ><input type="radio" name="iconfonts_name" data-name="prev" id="pe-7s-prev" value="pe-7s-prev"><label for="pe-7s-prev"><i class="pe-7s-prev"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="mute" ><input type="radio" name="iconfonts_name" data-name="mute" id="pe-7s-mute" value="pe-7s-mute"><label for="pe-7s-mute"><i class="pe-7s-mute"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="power" ><input type="radio" name="iconfonts_name" data-name="power" id="pe-7s-power" value="pe-7s-power"><label for="pe-7s-power"><i class="pe-7s-power"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="medal" ><input type="radio" name="iconfonts_name" data-name="medal" id="pe-7s-medal" value="pe-7s-medal"><label for="pe-7s-medal"><i class="pe-7s-medal"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="portfolio" ><input type="radio" name="iconfonts_name" data-name="portfolio" id="pe-7s-portfolio" value="pe-7s-portfolio"><label for="pe-7s-portfolio"><i class="pe-7s-portfolio"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="like2" ><input type="radio" name="iconfonts_name" data-name="like2" id="pe-7s-like2" value="pe-7s-like2"><label for="pe-7s-like2"><i class="pe-7s-like2"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="plus" ><input type="radio" name="iconfonts_name" data-name="plus" id="pe-7s-plus" value="pe-7s-plus"><label for="pe-7s-plus"><i class="pe-7s-plus"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="left-arrow" ><input type="radio" name="iconfonts_name" data-name="left-arrow" id="pe-7s-left-arrow" value="pe-7s-left-arrow"><label for="pe-7s-left-arrow"><i class="pe-7s-left-arrow"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="play" ><input type="radio" name="iconfonts_name" data-name="play" id="pe-7s-play" value="pe-7s-play"><label for="pe-7s-play"><i class="pe-7s-play"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="key" ><input type="radio" name="iconfonts_name" data-name="key" id="pe-7s-key" value="pe-7s-key"><label for="pe-7s-key"><i class="pe-7s-key"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="plane" ><input type="radio" name="iconfonts_name" data-name="plane" id="pe-7s-plane" value="pe-7s-plane"><label for="pe-7s-plane"><i class="pe-7s-plane"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="joy" ><input type="radio" name="iconfonts_name" data-name="joy" id="pe-7s-joy" value="pe-7s-joy"><label for="pe-7s-joy"><i class="pe-7s-joy"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="photo-gallery" ><input type="radio" name="iconfonts_name" data-name="photo-gallery" id="pe-7s-photo-gallery" value="pe-7s-photo-gallery"><label for="pe-7s-photo-gallery"><i class="pe-7s-photo-gallery"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="pin" ><input type="radio" name="iconfonts_name" data-name="pin" id="pe-7s-pin" value="pe-7s-pin"><label for="pe-7s-pin"><i class="pe-7s-pin"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="phone" ><input type="radio" name="iconfonts_name" data-name="phone" id="pe-7s-phone" value="pe-7s-phone"><label for="pe-7s-phone"><i class="pe-7s-phone"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="plug" ><input type="radio" name="iconfonts_name" data-name="plug" id="pe-7s-plug" value="pe-7s-plug"><label for="pe-7s-plug"><i class="pe-7s-plug"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="pen" ><input type="radio" name="iconfonts_name" data-name="pen" id="pe-7s-pen" value="pe-7s-pen"><label for="pe-7s-pen"><i class="pe-7s-pen"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="right-arrow" ><input type="radio" name="iconfonts_name" data-name="right-arrow" id="pe-7s-right-arrow" value="pe-7s-right-arrow"><label for="pe-7s-right-arrow"><i class="pe-7s-right-arrow"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="paper-plane" ><input type="radio" name="iconfonts_name" data-name="paper-plane" id="pe-7s-paper-plane" value="pe-7s-paper-plane"><label for="pe-7s-paper-plane"><i class="pe-7s-paper-plane"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="delete-user" ><input type="radio" name="iconfonts_name" data-name="delete-user" id="pe-7s-delete-user" value="pe-7s-delete-user"><label for="pe-7s-delete-user"><i class="pe-7s-delete-user"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="paint" ><input type="radio" name="iconfonts_name" data-name="paint" id="pe-7s-paint" value="pe-7s-paint"><label for="pe-7s-paint"><i class="pe-7s-paint"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="bottom-arrow" ><input type="radio" name="iconfonts_name" data-name="bottom-arrow" id="pe-7s-bottom-arrow" value="pe-7s-bottom-arrow"><label for="pe-7s-bottom-arrow"><i class="pe-7s-bottom-arrow"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="notebook" ><input type="radio" name="iconfonts_name" data-name="notebook" id="pe-7s-notebook" value="pe-7s-notebook"><label for="pe-7s-notebook"><i class="pe-7s-notebook"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="note" ><input type="radio" name="iconfonts_name" data-name="note" id="pe-7s-note" value="pe-7s-note"><label for="pe-7s-note"><i class="pe-7s-note"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="next" ><input type="radio" name="iconfonts_name" data-name="next" id="pe-7s-next" value="pe-7s-next"><label for="pe-7s-next"><i class="pe-7s-next"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="news-paper" ><input type="radio" name="iconfonts_name" data-name="news-paper" id="pe-7s-news-paper" value="pe-7s-news-paper"><label for="pe-7s-news-paper"><i class="pe-7s-news-paper"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="musiclist" ><input type="radio" name="iconfonts_name" data-name="musiclist" id="pe-7s-musiclist" value="pe-7s-musiclist"><label for="pe-7s-musiclist"><i class="pe-7s-musiclist"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="music" ><input type="radio" name="iconfonts_name" data-name="music" id="pe-7s-music" value="pe-7s-music"><label for="pe-7s-music"><i class="pe-7s-music"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="mouse" ><input type="radio" name="iconfonts_name" data-name="mouse" id="pe-7s-mouse" value="pe-7s-mouse"><label for="pe-7s-mouse"><i class="pe-7s-mouse"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="more" ><input type="radio" name="iconfonts_name" data-name="more" id="pe-7s-more" value="pe-7s-more"><label for="pe-7s-more"><i class="pe-7s-more"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="moon" ><input type="radio" name="iconfonts_name" data-name="moon" id="pe-7s-moon" value="pe-7s-moon"><label for="pe-7s-moon"><i class="pe-7s-moon"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="monitor" ><input type="radio" name="iconfonts_name" data-name="monitor" id="pe-7s-monitor" value="pe-7s-monitor"><label for="pe-7s-monitor"><i class="pe-7s-monitor"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="micro" ><input type="radio" name="iconfonts_name" data-name="micro" id="pe-7s-micro" value="pe-7s-micro"><label for="pe-7s-micro"><i class="pe-7s-micro"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="menu" ><input type="radio" name="iconfonts_name" data-name="menu" id="pe-7s-menu" value="pe-7s-menu"><label for="pe-7s-menu"><i class="pe-7s-menu"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="map" ><input type="radio" name="iconfonts_name" data-name="map" id="pe-7s-map" value="pe-7s-map"><label for="pe-7s-map"><i class="pe-7s-map"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="map-marker" ><input type="radio" name="iconfonts_name" data-name="map-marker" id="pe-7s-map-marker" value="pe-7s-map-marker"><label for="pe-7s-map-marker"><i class="pe-7s-map-marker"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="mail" ><input type="radio" name="iconfonts_name" data-name="mail" id="pe-7s-mail" value="pe-7s-mail"><label for="pe-7s-mail"><i class="pe-7s-mail"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="mail-open" ><input type="radio" name="iconfonts_name" data-name="mail-open" id="pe-7s-mail-open" value="pe-7s-mail-open"><label for="pe-7s-mail-open"><i class="pe-7s-mail-open"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="mail-open-file" ><input type="radio" name="iconfonts_name" data-name="mail-open-file" id="pe-7s-mail-open-file" value="pe-7s-mail-open-file"><label for="pe-7s-mail-open-file"><i class="pe-7s-mail-open-file"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="magnet" ><input type="radio" name="iconfonts_name" data-name="magnet" id="pe-7s-magnet" value="pe-7s-magnet"><label for="pe-7s-magnet"><i class="pe-7s-magnet"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="loop" ><input type="radio" name="iconfonts_name" data-name="loop" id="pe-7s-loop" value="pe-7s-loop"><label for="pe-7s-loop"><i class="pe-7s-loop"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="look" ><input type="radio" name="iconfonts_name" data-name="look" id="pe-7s-look" value="pe-7s-look"><label for="pe-7s-look"><i class="pe-7s-look"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="lock" ><input type="radio" name="iconfonts_name" data-name="lock" id="pe-7s-lock" value="pe-7s-lock"><label for="pe-7s-lock"><i class="pe-7s-lock"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="lintern" ><input type="radio" name="iconfonts_name" data-name="lintern" id="pe-7s-lintern" value="pe-7s-lintern"><label for="pe-7s-lintern"><i class="pe-7s-lintern"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="link" ><input type="radio" name="iconfonts_name" data-name="link" id="pe-7s-link" value="pe-7s-link"><label for="pe-7s-link"><i class="pe-7s-link"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="like" ><input type="radio" name="iconfonts_name" data-name="like" id="pe-7s-like" value="pe-7s-like"><label for="pe-7s-like"><i class="pe-7s-like"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="light" ><input type="radio" name="iconfonts_name" data-name="light" id="pe-7s-light" value="pe-7s-light"><label for="pe-7s-light"><i class="pe-7s-light"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="less" ><input type="radio" name="iconfonts_name" data-name="less" id="pe-7s-less" value="pe-7s-less"><label for="pe-7s-less"><i class="pe-7s-less"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="keypad" ><input type="radio" name="iconfonts_name" data-name="keypad" id="pe-7s-keypad" value="pe-7s-keypad"><label for="pe-7s-keypad"><i class="pe-7s-keypad"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="junk" ><input type="radio" name="iconfonts_name" data-name="junk" id="pe-7s-junk" value="pe-7s-junk"><label for="pe-7s-junk"><i class="pe-7s-junk"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="info" ><input type="radio" name="iconfonts_name" data-name="info" id="pe-7s-info" value="pe-7s-info"><label for="pe-7s-info"><i class="pe-7s-info"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="home" ><input type="radio" name="iconfonts_name" data-name="home" id="pe-7s-home" value="pe-7s-home"><label for="pe-7s-home"><i class="pe-7s-home"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="help2" ><input type="radio" name="iconfonts_name" data-name="help2" id="pe-7s-help2" value="pe-7s-help2"><label for="pe-7s-help2"><i class="pe-7s-help2"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="help1" ><input type="radio" name="iconfonts_name" data-name="help1" id="pe-7s-help1" value="pe-7s-help1"><label for="pe-7s-help1"><i class="pe-7s-help1"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="graph3" ><input type="radio" name="iconfonts_name" data-name="graph3" id="pe-7s-graph3" value="pe-7s-graph3"><label for="pe-7s-graph3"><i class="pe-7s-graph3"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="graph2" ><input type="radio" name="iconfonts_name" data-name="graph2" id="pe-7s-graph2" value="pe-7s-graph2"><label for="pe-7s-graph2"><i class="pe-7s-graph2"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="graph1" ><input type="radio" name="iconfonts_name" data-name="graph1" id="pe-7s-graph1" value="pe-7s-graph1"><label for="pe-7s-graph1"><i class="pe-7s-graph1"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="graph" ><input type="radio" name="iconfonts_name" data-name="graph" id="pe-7s-graph" value="pe-7s-graph"><label for="pe-7s-graph"><i class="pe-7s-graph"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="global" ><input type="radio" name="iconfonts_name" data-name="global" id="pe-7s-global" value="pe-7s-global"><label for="pe-7s-global"><i class="pe-7s-global"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="gleam" ><input type="radio" name="iconfonts_name" data-name="gleam" id="pe-7s-gleam" value="pe-7s-gleam"><label for="pe-7s-gleam"><i class="pe-7s-gleam"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="glasses" ><input type="radio" name="iconfonts_name" data-name="glasses" id="pe-7s-glasses" value="pe-7s-glasses"><label for="pe-7s-glasses"><i class="pe-7s-glasses"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="gift" ><input type="radio" name="iconfonts_name" data-name="gift" id="pe-7s-gift" value="pe-7s-gift"><label for="pe-7s-gift"><i class="pe-7s-gift"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="folder" ><input type="radio" name="iconfonts_name" data-name="folder" id="pe-7s-folder" value="pe-7s-folder"><label for="pe-7s-folder"><i class="pe-7s-folder"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="flag" ><input type="radio" name="iconfonts_name" data-name="flag" id="pe-7s-flag" value="pe-7s-flag"><label for="pe-7s-flag"><i class="pe-7s-flag"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="filter" ><input type="radio" name="iconfonts_name" data-name="filter" id="pe-7s-filter" value="pe-7s-filter"><label for="pe-7s-filter"><i class="pe-7s-filter"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="file" ><input type="radio" name="iconfonts_name" data-name="file" id="pe-7s-file" value="pe-7s-file"><label for="pe-7s-file"><i class="pe-7s-file"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="expand1" ><input type="radio" name="iconfonts_name" data-name="expand1" id="pe-7s-expand1" value="pe-7s-expand1"><label for="pe-7s-expand1"><i class="pe-7s-expand1"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="exapnd2" ><input type="radio" name="iconfonts_name" data-name="exapnd2" id="pe-7s-exapnd2" value="pe-7s-exapnd2"><label for="pe-7s-exapnd2"><i class="pe-7s-exapnd2"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="edit" ><input type="radio" name="iconfonts_name" data-name="edit" id="pe-7s-edit" value="pe-7s-edit"><label for="pe-7s-edit"><i class="pe-7s-edit"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="drop" ><input type="radio" name="iconfonts_name" data-name="drop" id="pe-7s-drop" value="pe-7s-drop"><label for="pe-7s-drop"><i class="pe-7s-drop"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="drawer" ><input type="radio" name="iconfonts_name" data-name="drawer" id="pe-7s-drawer" value="pe-7s-drawer"><label for="pe-7s-drawer"><i class="pe-7s-drawer"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="download" ><input type="radio" name="iconfonts_name" data-name="download" id="pe-7s-download" value="pe-7s-download"><label for="pe-7s-download"><i class="pe-7s-download"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="display2" ><input type="radio" name="iconfonts_name" data-name="display2" id="pe-7s-display2" value="pe-7s-display2"><label for="pe-7s-display2"><i class="pe-7s-display2"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="display1" ><input type="radio" name="iconfonts_name" data-name="display1" id="pe-7s-display1" value="pe-7s-display1"><label for="pe-7s-display1"><i class="pe-7s-display1"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="diskette" ><input type="radio" name="iconfonts_name" data-name="diskette" id="pe-7s-diskette" value="pe-7s-diskette"><label for="pe-7s-diskette"><i class="pe-7s-diskette"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="date" ><input type="radio" name="iconfonts_name" data-name="date" id="pe-7s-date" value="pe-7s-date"><label for="pe-7s-date"><i class="pe-7s-date"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="cup" ><input type="radio" name="iconfonts_name" data-name="cup" id="pe-7s-cup" value="pe-7s-cup"><label for="pe-7s-cup"><i class="pe-7s-cup"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="culture" ><input type="radio" name="iconfonts_name" data-name="culture" id="pe-7s-culture" value="pe-7s-culture"><label for="pe-7s-culture"><i class="pe-7s-culture"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="crop" ><input type="radio" name="iconfonts_name" data-name="crop" id="pe-7s-crop" value="pe-7s-crop"><label for="pe-7s-crop"><i class="pe-7s-crop"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="credit" ><input type="radio" name="iconfonts_name" data-name="credit" id="pe-7s-credit" value="pe-7s-credit"><label for="pe-7s-credit"><i class="pe-7s-credit"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="copy-file" ><input type="radio" name="iconfonts_name" data-name="copy-file" id="pe-7s-copy-file" value="pe-7s-copy-file"><label for="pe-7s-copy-file"><i class="pe-7s-copy-file"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="config" ><input type="radio" name="iconfonts_name" data-name="config" id="pe-7s-config" value="pe-7s-config"><label for="pe-7s-config"><i class="pe-7s-config"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="compass" ><input type="radio" name="iconfonts_name" data-name="compass" id="pe-7s-compass" value="pe-7s-compass"><label for="pe-7s-compass"><i class="pe-7s-compass"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="comment" ><input type="radio" name="iconfonts_name" data-name="comment" id="pe-7s-comment" value="pe-7s-comment"><label for="pe-7s-comment"><i class="pe-7s-comment"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="coffee" ><input type="radio" name="iconfonts_name" data-name="coffee" id="pe-7s-coffee" value="pe-7s-coffee"><label for="pe-7s-coffee"><i class="pe-7s-coffee"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="cloud" ><input type="radio" name="iconfonts_name" data-name="cloud" id="pe-7s-cloud" value="pe-7s-cloud"><label for="pe-7s-cloud"><i class="pe-7s-cloud"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="clock" ><input type="radio" name="iconfonts_name" data-name="clock" id="pe-7s-clock" value="pe-7s-clock"><label for="pe-7s-clock"><i class="pe-7s-clock"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="check" ><input type="radio" name="iconfonts_name" data-name="check" id="pe-7s-check" value="pe-7s-check"><label for="pe-7s-check"><i class="pe-7s-check"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="chat" ><input type="radio" name="iconfonts_name" data-name="chat" id="pe-7s-chat" value="pe-7s-chat"><label for="pe-7s-chat"><i class="pe-7s-chat"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="cart" ><input type="radio" name="iconfonts_name" data-name="cart" id="pe-7s-cart" value="pe-7s-cart"><label for="pe-7s-cart"><i class="pe-7s-cart"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="camera" ><input type="radio" name="iconfonts_name" data-name="camera" id="pe-7s-camera" value="pe-7s-camera"><label for="pe-7s-camera"><i class="pe-7s-camera"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="call" ><input type="radio" name="iconfonts_name" data-name="call" id="pe-7s-call" value="pe-7s-call"><label for="pe-7s-call"><i class="pe-7s-call"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="calculator" ><input type="radio" name="iconfonts_name" data-name="calculator" id="pe-7s-calculator" value="pe-7s-calculator"><label for="pe-7s-calculator"><i class="pe-7s-calculator"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="browser" ><input type="radio" name="iconfonts_name" data-name="browser" id="pe-7s-browser" value="pe-7s-browser"><label for="pe-7s-browser"><i class="pe-7s-browser"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="box2" ><input type="radio" name="iconfonts_name" data-name="box2" id="pe-7s-box2" value="pe-7s-box2"><label for="pe-7s-box2"><i class="pe-7s-box2"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="box1" ><input type="radio" name="iconfonts_name" data-name="box1" id="pe-7s-box1" value="pe-7s-box1"><label for="pe-7s-box1"><i class="pe-7s-box1"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="bookmarks" ><input type="radio" name="iconfonts_name" data-name="bookmarks" id="pe-7s-bookmarks" value="pe-7s-bookmarks"><label for="pe-7s-bookmarks"><i class="pe-7s-bookmarks"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="bicycle" ><input type="radio" name="iconfonts_name" data-name="bicycle" id="pe-7s-bicycle" value="pe-7s-bicycle"><label for="pe-7s-bicycle"><i class="pe-7s-bicycle"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="bell" ><input type="radio" name="iconfonts_name" data-name="bell" id="pe-7s-bell" value="pe-7s-bell"><label for="pe-7s-bell"><i class="pe-7s-bell"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="battery" ><input type="radio" name="iconfonts_name" data-name="battery" id="pe-7s-battery" value="pe-7s-battery"><label for="pe-7s-battery"><i class="pe-7s-battery"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="ball" ><input type="radio" name="iconfonts_name" data-name="ball" id="pe-7s-ball" value="pe-7s-ball"><label for="pe-7s-ball"><i class="pe-7s-ball"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="back" ><input type="radio" name="iconfonts_name" data-name="back" id="pe-7s-back" value="pe-7s-back"><label for="pe-7s-back"><i class="pe-7s-back"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="attention" ><input type="radio" name="iconfonts_name" data-name="attention" id="pe-7s-attention" value="pe-7s-attention"><label for="pe-7s-attention"><i class="pe-7s-attention"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="anchor" ><input type="radio" name="iconfonts_name" data-name="anchor" id="pe-7s-anchor" value="pe-7s-anchor"><label for="pe-7s-anchor"><i class="pe-7s-anchor"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="albums" ><input type="radio" name="iconfonts_name" data-name="albums" id="pe-7s-albums" value="pe-7s-albums"><label for="pe-7s-albums"><i class="pe-7s-albums"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="alarm" ><input type="radio" name="iconfonts_name" data-name="alarm" id="pe-7s-alarm" value="pe-7s-alarm"><label for="pe-7s-alarm"><i class="pe-7s-alarm"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="7-stroke" data-name="airplay" ><input type="radio" name="iconfonts_name" data-name="airplay" id="pe-7s-airplay" value="pe-7s-airplay"><label for="pe-7s-airplay"><i class="pe-7s-airplay"></i></label></li>
					</ul>
					<ul class="simple-line-icon-fonts" data-name="simple-line">
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="user" ><input type="radio" name="iconfonts_name" data-name="user" id="sl-user" value="sl-user"><label for="sl-user"><i class="sl-user"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="people" ><input type="radio" name="iconfonts_name" data-name="people" id="sl-people" value="sl-people"><label for="sl-people"><i class="sl-people"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="user-female" ><input type="radio" name="iconfonts_name" data-name="user-female" id="sl-user-female" value="sl-user-female"><label for="sl-user-female"><i class="sl-user-female"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="user-follow" ><input type="radio" name="iconfonts_name" data-name="user-follow" id="sl-user-follow" value="sl-user-follow"><label for="sl-user-follow"><i class="sl-user-follow"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="user-following" ><input type="radio" name="iconfonts_name" data-name="user-following" id="sl-user-following" value="sl-user-following"><label for="sl-user-following"><i class="sl-user-following"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="user-unfollow" ><input type="radio" name="iconfonts_name" data-name="user-unfollow" id="sl-user-unfollow" value="sl-user-unfollow"><label for="sl-user-unfollow"><i class="sl-user-unfollow"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="login" ><input type="radio" name="iconfonts_name" data-name="login" id="sl-login" value="sl-login"><label for="sl-login"><i class="sl-login"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="logout" ><input type="radio" name="iconfonts_name" data-name="logout" id="sl-logout" value="sl-logout"><label for="sl-logout"><i class="sl-logout"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="emotsmile" ><input type="radio" name="iconfonts_name" data-name="emotsmile" id="sl-emotsmile" value="sl-emotsmile"><label for="sl-emotsmile"><i class="sl-emotsmile"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="phone" ><input type="radio" name="iconfonts_name" data-name="phone" id="sl-phone" value="sl-phone"><label for="sl-phone"><i class="sl-phone"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="call-end" ><input type="radio" name="iconfonts_name" data-name="call-end" id="sl-call-end" value="sl-call-end"><label for="sl-call-end"><i class="sl-call-end"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="call-in" ><input type="radio" name="iconfonts_name" data-name="call-in" id="sl-call-in" value="sl-call-in"><label for="sl-call-in"><i class="sl-call-in"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="call-out" ><input type="radio" name="iconfonts_name" data-name="call-out" id="sl-call-out" value="sl-call-out"><label for="sl-call-out"><i class="sl-call-out"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="map" ><input type="radio" name="iconfonts_name" data-name="map" id="sl-map" value="sl-map"><label for="sl-map"><i class="sl-map"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="location-pin" ><input type="radio" name="iconfonts_name" data-name="location-pin" id="sl-location-pin" value="sl-location-pin"><label for="sl-location-pin"><i class="sl-location-pin"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="direction" ><input type="radio" name="iconfonts_name" data-name="direction" id="sl-direction" value="sl-direction"><label for="sl-direction"><i class="sl-direction"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="directions" ><input type="radio" name="iconfonts_name" data-name="directions" id="sl-directions" value="sl-directions"><label for="sl-directions"><i class="sl-directions"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="compass" ><input type="radio" name="iconfonts_name" data-name="compass" id="sl-compass" value="sl-compass"><label for="sl-compass"><i class="sl-compass"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="layers" ><input type="radio" name="iconfonts_name" data-name="layers" id="sl-layers" value="sl-layers"><label for="sl-layers"><i class="sl-layers"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="menu" ><input type="radio" name="iconfonts_name" data-name="menu" id="sl-menu" value="sl-menu"><label for="sl-menu"><i class="sl-menu"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="list" ><input type="radio" name="iconfonts_name" data-name="list" id="sl-list" value="sl-list"><label for="sl-list"><i class="sl-list"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="options-vertical" ><input type="radio" name="iconfonts_name" data-name="options-vertical" id="sl-options-vertical" value="sl-options-vertical"><label for="sl-options-vertical"><i class="sl-options-vertical"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="options" ><input type="radio" name="iconfonts_name" data-name="options" id="sl-options" value="sl-options"><label for="sl-options"><i class="sl-options"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="arrow-down" ><input type="radio" name="iconfonts_name" data-name="arrow-down" id="sl-arrow-down" value="sl-arrow-down"><label for="sl-arrow-down"><i class="sl-arrow-down"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="arrow-left" ><input type="radio" name="iconfonts_name" data-name="arrow-left" id="sl-arrow-left" value="sl-arrow-left"><label for="sl-arrow-left"><i class="sl-arrow-left"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="arrow-right" ><input type="radio" name="iconfonts_name" data-name="arrow-right" id="sl-arrow-right" value="sl-arrow-right"><label for="sl-arrow-right"><i class="sl-arrow-right"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="arrow-up" ><input type="radio" name="iconfonts_name" data-name="arrow-up" id="sl-arrow-up" value="sl-arrow-up"><label for="sl-arrow-up"><i class="sl-arrow-up"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="arrow-up-circle" ><input type="radio" name="iconfonts_name" data-name="arrow-up-circle" id="sl-arrow-up-circle" value="sl-arrow-up-circle"><label for="sl-arrow-up-circle"><i class="sl-arrow-up-circle"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="arrow-left-circle" ><input type="radio" name="iconfonts_name" data-name="arrow-left-circle" id="sl-arrow-left-circle" value="sl-arrow-left-circle"><label for="sl-arrow-left-circle"><i class="sl-arrow-left-circle"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="arrow-right-circle" ><input type="radio" name="iconfonts_name" data-name="arrow-right-circle" id="sl-arrow-right-circle" value="sl-arrow-right-circle"><label for="sl-arrow-right-circle"><i class="sl-arrow-right-circle"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="arrow-down-circle" ><input type="radio" name="iconfonts_name" data-name="arrow-down-circle" id="sl-arrow-down-circle" value="sl-arrow-down-circle"><label for="sl-arrow-down-circle"><i class="sl-arrow-down-circle"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="check" ><input type="radio" name="iconfonts_name" data-name="check" id="sl-check" value="sl-check"><label for="sl-check"><i class="sl-check"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="clock" ><input type="radio" name="iconfonts_name" data-name="clock" id="sl-clock" value="sl-clock"><label for="sl-clock"><i class="sl-clock"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="plus" ><input type="radio" name="iconfonts_name" data-name="plus" id="sl-plus" value="sl-plus"><label for="sl-plus"><i class="sl-plus"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="close" ><input type="radio" name="iconfonts_name" data-name="close" id="sl-close" value="sl-close"><label for="sl-close"><i class="sl-close"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="trophy" ><input type="radio" name="iconfonts_name" data-name="trophy" id="sl-trophy" value="sl-trophy"><label for="sl-trophy"><i class="sl-trophy"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="screen-smartphone" ><input type="radio" name="iconfonts_name" data-name="screen-smartphone" id="sl-screen-smartphone" value="sl-screen-smartphone"><label for="sl-screen-smartphone"><i class="sl-screen-smartphone"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="screen-desktop" ><input type="radio" name="iconfonts_name" data-name="screen-desktop" id="sl-screen-desktop" value="sl-screen-desktop"><label for="sl-screen-desktop"><i class="sl-screen-desktop"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="plane" ><input type="radio" name="iconfonts_name" data-name="plane" id="sl-plane" value="sl-plane"><label for="sl-plane"><i class="sl-plane"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="notebook" ><input type="radio" name="iconfonts_name" data-name="notebook" id="sl-notebook" value="sl-notebook"><label for="sl-notebook"><i class="sl-notebook"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="mustache" ><input type="radio" name="iconfonts_name" data-name="mustache" id="sl-mustache" value="sl-mustache"><label for="sl-mustache"><i class="sl-mustache"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="mouse" ><input type="radio" name="iconfonts_name" data-name="mouse" id="sl-mouse" value="sl-mouse"><label for="sl-mouse"><i class="sl-mouse"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="magnet" ><input type="radio" name="iconfonts_name" data-name="magnet" id="sl-magnet" value="sl-magnet"><label for="sl-magnet"><i class="sl-magnet"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="energy" ><input type="radio" name="iconfonts_name" data-name="energy" id="sl-energy" value="sl-energy"><label for="sl-energy"><i class="sl-energy"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="disc" ><input type="radio" name="iconfonts_name" data-name="disc" id="sl-disc" value="sl-disc"><label for="sl-disc"><i class="sl-disc"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="cursor" ><input type="radio" name="iconfonts_name" data-name="cursor" id="sl-cursor" value="sl-cursor"><label for="sl-cursor"><i class="sl-cursor"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="cursor-move" ><input type="radio" name="iconfonts_name" data-name="cursor-move" id="sl-cursor-move" value="sl-cursor-move"><label for="sl-cursor-move"><i class="sl-cursor-move"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="crop" ><input type="radio" name="iconfonts_name" data-name="crop" id="sl-crop" value="sl-crop"><label for="sl-crop"><i class="sl-crop"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="chemistry" ><input type="radio" name="iconfonts_name" data-name="chemistry" id="sl-chemistry" value="sl-chemistry"><label for="sl-chemistry"><i class="sl-chemistry"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="speedometer" ><input type="radio" name="iconfonts_name" data-name="speedometer" id="sl-speedometer" value="sl-speedometer"><label for="sl-speedometer"><i class="sl-speedometer"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="shield" ><input type="radio" name="iconfonts_name" data-name="shield" id="sl-shield" value="sl-shield"><label for="sl-shield"><i class="sl-shield"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="screen-tablet" ><input type="radio" name="iconfonts_name" data-name="screen-tablet" id="sl-screen-tablet" value="sl-screen-tablet"><label for="sl-screen-tablet"><i class="sl-screen-tablet"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="magic-wand" ><input type="radio" name="iconfonts_name" data-name="magic-wand" id="sl-magic-wand" value="sl-magic-wand"><label for="sl-magic-wand"><i class="sl-magic-wand"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="hourglass" ><input type="radio" name="iconfonts_name" data-name="hourglass" id="sl-hourglass" value="sl-hourglass"><label for="sl-hourglass"><i class="sl-hourglass"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="graduation" ><input type="radio" name="iconfonts_name" data-name="graduation" id="sl-graduation" value="sl-graduation"><label for="sl-graduation"><i class="sl-graduation"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="ghost" ><input type="radio" name="iconfonts_name" data-name="ghost" id="sl-ghost" value="sl-ghost"><label for="sl-ghost"><i class="sl-ghost"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="game-controller" ><input type="radio" name="iconfonts_name" data-name="game-controller" id="sl-game-controller" value="sl-game-controller"><label for="sl-game-controller"><i class="sl-game-controller"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="fire" ><input type="radio" name="iconfonts_name" data-name="fire" id="sl-fire" value="sl-fire"><label for="sl-fire"><i class="sl-fire"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="eyeglass" ><input type="radio" name="iconfonts_name" data-name="eyeglass" id="sl-eyeglass" value="sl-eyeglass"><label for="sl-eyeglass"><i class="sl-eyeglass"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="envelope-open" ><input type="radio" name="iconfonts_name" data-name="envelope-open" id="sl-envelope-open" value="sl-envelope-open"><label for="sl-envelope-open"><i class="sl-envelope-open"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="envelope-letter" ><input type="radio" name="iconfonts_name" data-name="envelope-letter" id="sl-envelope-letter" value="sl-envelope-letter"><label for="sl-envelope-letter"><i class="sl-envelope-letter"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="bell" ><input type="radio" name="iconfonts_name" data-name="bell" id="sl-bell" value="sl-bell"><label for="sl-bell"><i class="sl-bell"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="badge" ><input type="radio" name="iconfonts_name" data-name="badge" id="sl-badge" value="sl-badge"><label for="sl-badge"><i class="sl-badge"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="anchor" ><input type="radio" name="iconfonts_name" data-name="anchor" id="sl-anchor" value="sl-anchor"><label for="sl-anchor"><i class="sl-anchor"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="wallet" ><input type="radio" name="iconfonts_name" data-name="wallet" id="sl-wallet" value="sl-wallet"><label for="sl-wallet"><i class="sl-wallet"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="vector" ><input type="radio" name="iconfonts_name" data-name="vector" id="sl-vector" value="sl-vector"><label for="sl-vector"><i class="sl-vector"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="speech" ><input type="radio" name="iconfonts_name" data-name="speech" id="sl-speech" value="sl-speech"><label for="sl-speech"><i class="sl-speech"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="puzzle" ><input type="radio" name="iconfonts_name" data-name="puzzle" id="sl-puzzle" value="sl-puzzle"><label for="sl-puzzle"><i class="sl-puzzle"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="printer" ><input type="radio" name="iconfonts_name" data-name="printer" id="sl-printer" value="sl-printer"><label for="sl-printer"><i class="sl-printer"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="present" ><input type="radio" name="iconfonts_name" data-name="present" id="sl-present" value="sl-present"><label for="sl-present"><i class="sl-present"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="playlist" ><input type="radio" name="iconfonts_name" data-name="playlist" id="sl-playlist" value="sl-playlist"><label for="sl-playlist"><i class="sl-playlist"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="pin" ><input type="radio" name="iconfonts_name" data-name="pin" id="sl-pin" value="sl-pin"><label for="sl-pin"><i class="sl-pin"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="picture" ><input type="radio" name="iconfonts_name" data-name="picture" id="sl-picture" value="sl-picture"><label for="sl-picture"><i class="sl-picture"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="handbag" ><input type="radio" name="iconfonts_name" data-name="handbag" id="sl-handbag" value="sl-handbag"><label for="sl-handbag"><i class="sl-handbag"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="globe-alt" ><input type="radio" name="iconfonts_name" data-name="globe-alt" id="sl-globe-alt" value="sl-globe-alt"><label for="sl-globe-alt"><i class="sl-globe-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="globe" ><input type="radio" name="iconfonts_name" data-name="globe" id="sl-globe" value="sl-globe"><label for="sl-globe"><i class="sl-globe"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="folder-alt" ><input type="radio" name="iconfonts_name" data-name="folder-alt" id="sl-folder-alt" value="sl-folder-alt"><label for="sl-folder-alt"><i class="sl-folder-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="folder" ><input type="radio" name="iconfonts_name" data-name="folder" id="sl-folder" value="sl-folder"><label for="sl-folder"><i class="sl-folder"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="film" ><input type="radio" name="iconfonts_name" data-name="film" id="sl-film" value="sl-film"><label for="sl-film"><i class="sl-film"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="feed" ><input type="radio" name="iconfonts_name" data-name="feed" id="sl-feed" value="sl-feed"><label for="sl-feed"><i class="sl-feed"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="drop" ><input type="radio" name="iconfonts_name" data-name="drop" id="sl-drop" value="sl-drop"><label for="sl-drop"><i class="sl-drop"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="drawer" ><input type="radio" name="iconfonts_name" data-name="drawer" id="sl-drawer" value="sl-drawer"><label for="sl-drawer"><i class="sl-drawer"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="minus" ><input type="radio" name="iconfonts_name" data-name="minus" id="sl-minus" value="sl-minus"><label for="sl-minus"><i class="sl-minus"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="event" ><input type="radio" name="iconfonts_name" data-name="event" id="sl-event" value="sl-event"><label for="sl-event"><i class="sl-event"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="exclamation" ><input type="radio" name="iconfonts_name" data-name="exclamation" id="sl-exclamation" value="sl-exclamation"><label for="sl-exclamation"><i class="sl-exclamation"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="organization" ><input type="radio" name="iconfonts_name" data-name="organization" id="sl-organization" value="sl-organization"><label for="sl-organization"><i class="sl-organization"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="docs" ><input type="radio" name="iconfonts_name" data-name="docs" id="sl-docs" value="sl-docs"><label for="sl-docs"><i class="sl-docs"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="doc" ><input type="radio" name="iconfonts_name" data-name="doc" id="sl-doc" value="sl-doc"><label for="sl-doc"><i class="sl-doc"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="diamond" ><input type="radio" name="iconfonts_name" data-name="diamond" id="sl-diamond" value="sl-diamond"><label for="sl-diamond"><i class="sl-diamond"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="cup" ><input type="radio" name="iconfonts_name" data-name="cup" id="sl-cup" value="sl-cup"><label for="sl-cup"><i class="sl-cup"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="calculator" ><input type="radio" name="iconfonts_name" data-name="calculator" id="sl-calculator" value="sl-calculator"><label for="sl-calculator"><i class="sl-calculator"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="bubbles" ><input type="radio" name="iconfonts_name" data-name="bubbles" id="sl-bubbles" value="sl-bubbles"><label for="sl-bubbles"><i class="sl-bubbles"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="briefcase" ><input type="radio" name="iconfonts_name" data-name="briefcase" id="sl-briefcase" value="sl-briefcase"><label for="sl-briefcase"><i class="sl-briefcase"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="book-open" ><input type="radio" name="iconfonts_name" data-name="book-open" id="sl-book-open" value="sl-book-open"><label for="sl-book-open"><i class="sl-book-open"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="basket-loaded" ><input type="radio" name="iconfonts_name" data-name="basket-loaded" id="sl-basket-loaded" value="sl-basket-loaded"><label for="sl-basket-loaded"><i class="sl-basket-loaded"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="basket" ><input type="radio" name="iconfonts_name" data-name="basket" id="sl-basket" value="sl-basket"><label for="sl-basket"><i class="sl-basket"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="bag" ><input type="radio" name="iconfonts_name" data-name="bag" id="sl-bag" value="sl-bag"><label for="sl-bag"><i class="sl-bag"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="action-undo" ><input type="radio" name="iconfonts_name" data-name="action-undo" id="sl-action-undo" value="sl-action-undo"><label for="sl-action-undo"><i class="sl-action-undo"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="action-redo" ><input type="radio" name="iconfonts_name" data-name="action-redo" id="sl-action-redo" value="sl-action-redo"><label for="sl-action-redo"><i class="sl-action-redo"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="wrench" ><input type="radio" name="iconfonts_name" data-name="wrench" id="sl-wrench" value="sl-wrench"><label for="sl-wrench"><i class="sl-wrench"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="umbrella" ><input type="radio" name="iconfonts_name" data-name="umbrella" id="sl-umbrella" value="sl-umbrella"><label for="sl-umbrella"><i class="sl-umbrella"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="trash" ><input type="radio" name="iconfonts_name" data-name="trash" id="sl-trash" value="sl-trash"><label for="sl-trash"><i class="sl-trash"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="tag" ><input type="radio" name="iconfonts_name" data-name="tag" id="sl-tag" value="sl-tag"><label for="sl-tag"><i class="sl-tag"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="support" ><input type="radio" name="iconfonts_name" data-name="support" id="sl-support" value="sl-support"><label for="sl-support"><i class="sl-support"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="frame" ><input type="radio" name="iconfonts_name" data-name="frame" id="sl-frame" value="sl-frame"><label for="sl-frame"><i class="sl-frame"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="size-fullscreen" ><input type="radio" name="iconfonts_name" data-name="size-fullscreen" id="sl-size-fullscreen" value="sl-size-fullscreen"><label for="sl-size-fullscreen"><i class="sl-size-fullscreen"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="size-actual" ><input type="radio" name="iconfonts_name" data-name="size-actual" id="sl-size-actual" value="sl-size-actual"><label for="sl-size-actual"><i class="sl-size-actual"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="shuffle" ><input type="radio" name="iconfonts_name" data-name="shuffle" id="sl-shuffle" value="sl-shuffle"><label for="sl-shuffle"><i class="sl-shuffle"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="share-alt" ><input type="radio" name="iconfonts_name" data-name="share-alt" id="sl-share-alt" value="sl-share-alt"><label for="sl-share-alt"><i class="sl-share-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="share" ><input type="radio" name="iconfonts_name" data-name="share" id="sl-share" value="sl-share"><label for="sl-share"><i class="sl-share"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="rocket" ><input type="radio" name="iconfonts_name" data-name="rocket" id="sl-rocket" value="sl-rocket"><label for="sl-rocket"><i class="sl-rocket"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="question" ><input type="radio" name="iconfonts_name" data-name="question" id="sl-question" value="sl-question"><label for="sl-question"><i class="sl-question"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="pie-chart" ><input type="radio" name="iconfonts_name" data-name="pie-chart" id="sl-pie-chart" value="sl-pie-chart"><label for="sl-pie-chart"><i class="sl-pie-chart"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="pencil" ><input type="radio" name="iconfonts_name" data-name="pencil" id="sl-pencil" value="sl-pencil"><label for="sl-pencil"><i class="sl-pencil"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="note" ><input type="radio" name="iconfonts_name" data-name="note" id="sl-note" value="sl-note"><label for="sl-note"><i class="sl-note"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="loop" ><input type="radio" name="iconfonts_name" data-name="loop" id="sl-loop" value="sl-loop"><label for="sl-loop"><i class="sl-loop"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="home" ><input type="radio" name="iconfonts_name" data-name="home" id="sl-home" value="sl-home"><label for="sl-home"><i class="sl-home"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="grid" ><input type="radio" name="iconfonts_name" data-name="grid" id="sl-grid" value="sl-grid"><label for="sl-grid"><i class="sl-grid"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="graph" ><input type="radio" name="iconfonts_name" data-name="graph" id="sl-graph" value="sl-graph"><label for="sl-graph"><i class="sl-graph"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="microphone" ><input type="radio" name="iconfonts_name" data-name="microphone" id="sl-microphone" value="sl-microphone"><label for="sl-microphone"><i class="sl-microphone"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="music-tone-alt" ><input type="radio" name="iconfonts_name" data-name="music-tone-alt" id="sl-music-tone-alt" value="sl-music-tone-alt"><label for="sl-music-tone-alt"><i class="sl-music-tone-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="music-tone" ><input type="radio" name="iconfonts_name" data-name="music-tone" id="sl-music-tone" value="sl-music-tone"><label for="sl-music-tone"><i class="sl-music-tone"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="earphones-alt" ><input type="radio" name="iconfonts_name" data-name="earphones-alt" id="sl-earphones-alt" value="sl-earphones-alt"><label for="sl-earphones-alt"><i class="sl-earphones-alt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="earphones" ><input type="radio" name="iconfonts_name" data-name="earphones" id="sl-earphones" value="sl-earphones"><label for="sl-earphones"><i class="sl-earphones"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="equalizer" ><input type="radio" name="iconfonts_name" data-name="equalizer" id="sl-equalizer" value="sl-equalizer"><label for="sl-equalizer"><i class="sl-equalizer"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="like" ><input type="radio" name="iconfonts_name" data-name="like" id="sl-like" value="sl-like"><label for="sl-like"><i class="sl-like"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="dislike" ><input type="radio" name="iconfonts_name" data-name="dislike" id="sl-dislike" value="sl-dislike"><label for="sl-dislike"><i class="sl-dislike"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="control-start" ><input type="radio" name="iconfonts_name" data-name="control-start" id="sl-control-start" value="sl-control-start"><label for="sl-control-start"><i class="sl-control-start"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="control-rewind" ><input type="radio" name="iconfonts_name" data-name="control-rewind" id="sl-control-rewind" value="sl-control-rewind"><label for="sl-control-rewind"><i class="sl-control-rewind"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="control-play" ><input type="radio" name="iconfonts_name" data-name="control-play" id="sl-control-play" value="sl-control-play"><label for="sl-control-play"><i class="sl-control-play"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="control-pause" ><input type="radio" name="iconfonts_name" data-name="control-pause" id="sl-control-pause" value="sl-control-pause"><label for="sl-control-pause"><i class="sl-control-pause"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="control-forward" ><input type="radio" name="iconfonts_name" data-name="control-forward" id="sl-control-forward" value="sl-control-forward"><label for="sl-control-forward"><i class="sl-control-forward"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="control-end" ><input type="radio" name="iconfonts_name" data-name="control-end" id="sl-control-end" value="sl-control-end"><label for="sl-control-end"><i class="sl-control-end"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="volume-1" ><input type="radio" name="iconfonts_name" data-name="volume-1" id="sl-volume-1" value="sl-volume-1"><label for="sl-volume-1"><i class="sl-volume-1"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="volume-2" ><input type="radio" name="iconfonts_name" data-name="volume-2" id="sl-volume-2" value="sl-volume-2"><label for="sl-volume-2"><i class="sl-volume-2"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="volume-off" ><input type="radio" name="iconfonts_name" data-name="volume-off" id="sl-volume-off" value="sl-volume-off"><label for="sl-volume-off"><i class="sl-volume-off"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="calendar" ><input type="radio" name="iconfonts_name" data-name="calendar" id="sl-calendar" value="sl-calendar"><label for="sl-calendar"><i class="sl-calendar"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="bulb" ><input type="radio" name="iconfonts_name" data-name="bulb" id="sl-bulb" value="sl-bulb"><label for="sl-bulb"><i class="sl-bulb"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="chart" ><input type="radio" name="iconfonts_name" data-name="chart" id="sl-chart" value="sl-chart"><label for="sl-chart"><i class="sl-chart"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="ban" ><input type="radio" name="iconfonts_name" data-name="ban" id="sl-ban" value="sl-ban"><label for="sl-ban"><i class="sl-ban"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="bubble" ><input type="radio" name="iconfonts_name" data-name="bubble" id="sl-bubble" value="sl-bubble"><label for="sl-bubble"><i class="sl-bubble"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="camrecorder" ><input type="radio" name="iconfonts_name" data-name="camrecorder" id="sl-camrecorder" value="sl-camrecorder"><label for="sl-camrecorder"><i class="sl-camrecorder"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="camera" ><input type="radio" name="iconfonts_name" data-name="camera" id="sl-camera" value="sl-camera"><label for="sl-camera"><i class="sl-camera"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="cloud-download" ><input type="radio" name="iconfonts_name" data-name="cloud-download" id="sl-cloud-download" value="sl-cloud-download"><label for="sl-cloud-download"><i class="sl-cloud-download"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="cloud-upload" ><input type="radio" name="iconfonts_name" data-name="cloud-upload" id="sl-cloud-upload" value="sl-cloud-upload"><label for="sl-cloud-upload"><i class="sl-cloud-upload"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="envelope" ><input type="radio" name="iconfonts_name" data-name="envelope" id="sl-envelope" value="sl-envelope"><label for="sl-envelope"><i class="sl-envelope"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="eye" ><input type="radio" name="iconfonts_name" data-name="eye" id="sl-eye" value="sl-eye"><label for="sl-eye"><i class="sl-eye"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="flag" ><input type="radio" name="iconfonts_name" data-name="flag" id="sl-flag" value="sl-flag"><label for="sl-flag"><i class="sl-flag"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="heart" ><input type="radio" name="iconfonts_name" data-name="heart" id="sl-heart" value="sl-heart"><label for="sl-heart"><i class="sl-heart"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="info" ><input type="radio" name="iconfonts_name" data-name="info" id="sl-info" value="sl-info"><label for="sl-info"><i class="sl-info"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="key" ><input type="radio" name="iconfonts_name" data-name="key" id="sl-key" value="sl-key"><label for="sl-key"><i class="sl-key"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="link" ><input type="radio" name="iconfonts_name" data-name="link" id="sl-link" value="sl-link"><label for="sl-link"><i class="sl-link"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="lock" ><input type="radio" name="iconfonts_name" data-name="lock" id="sl-lock" value="sl-lock"><label for="sl-lock"><i class="sl-lock"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="lock-open" ><input type="radio" name="iconfonts_name" data-name="lock-open" id="sl-lock-open" value="sl-lock-open"><label for="sl-lock-open"><i class="sl-lock-open"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="magnifier" ><input type="radio" name="iconfonts_name" data-name="magnifier" id="sl-magnifier" value="sl-magnifier"><label for="sl-magnifier"><i class="sl-magnifier"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="magnifier-add" ><input type="radio" name="iconfonts_name" data-name="magnifier-add" id="sl-magnifier-add" value="sl-magnifier-add"><label for="sl-magnifier-add"><i class="sl-magnifier-add"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="magnifier-remove" ><input type="radio" name="iconfonts_name" data-name="magnifier-remove" id="sl-magnifier-remove" value="sl-magnifier-remove"><label for="sl-magnifier-remove"><i class="sl-magnifier-remove"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="paper-clip" ><input type="radio" name="iconfonts_name" data-name="paper-clip" id="sl-paper-clip" value="sl-paper-clip"><label for="sl-paper-clip"><i class="sl-paper-clip"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="paper-plane" ><input type="radio" name="iconfonts_name" data-name="paper-plane" id="sl-paper-plane" value="sl-paper-plane"><label for="sl-paper-plane"><i class="sl-paper-plane"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="power" ><input type="radio" name="iconfonts_name" data-name="power" id="sl-power" value="sl-power"><label for="sl-power"><i class="sl-power"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="refresh" ><input type="radio" name="iconfonts_name" data-name="refresh" id="sl-refresh" value="sl-refresh"><label for="sl-refresh"><i class="sl-refresh"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="reload" ><input type="radio" name="iconfonts_name" data-name="reload" id="sl-reload" value="sl-reload"><label for="sl-reload"><i class="sl-reload"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="settings" ><input type="radio" name="iconfonts_name" data-name="settings" id="sl-settings" value="sl-settings"><label for="sl-settings"><i class="sl-settings"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="star" ><input type="radio" name="iconfonts_name" data-name="star" id="sl-star" value="sl-star"><label for="sl-star"><i class="sl-star"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="symbol-female" ><input type="radio" name="iconfonts_name" data-name="symbol-female" id="sl-symbol-female" value="sl-symbol-female"><label for="sl-symbol-female"><i class="sl-symbol-female"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="symbol-male" ><input type="radio" name="iconfonts_name" data-name="symbol-male" id="sl-symbol-male" value="sl-symbol-male"><label for="sl-symbol-male"><i class="sl-symbol-male"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="target" ><input type="radio" name="iconfonts_name" data-name="target" id="sl-target" value="sl-target"><label for="sl-target"><i class="sl-target"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="credit-card" ><input type="radio" name="iconfonts_name" data-name="credit-card" id="sl-credit-card" value="sl-credit-card"><label for="sl-credit-card"><i class="sl-credit-card"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="paypal" ><input type="radio" name="iconfonts_name" data-name="paypal" id="sl-paypal" value="sl-paypal"><label for="sl-paypal"><i class="sl-paypal"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="social-tumblr" ><input type="radio" name="iconfonts_name" data-name="social-tumblr" id="sl-social-tumblr" value="sl-social-tumblr"><label for="sl-social-tumblr"><i class="sl-social-tumblr"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="social-twitter" ><input type="radio" name="iconfonts_name" data-name="social-twitter" id="sl-social-twitter" value="sl-social-twitter"><label for="sl-social-twitter"><i class="sl-social-twitter"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="social-facebook" ><input type="radio" name="iconfonts_name" data-name="social-facebook" id="sl-social-facebook" value="sl-social-facebook"><label for="sl-social-facebook"><i class="sl-social-facebook"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="social-instagram" ><input type="radio" name="iconfonts_name" data-name="social-instagram" id="sl-social-instagram" value="sl-social-instagram"><label for="sl-social-instagram"><i class="sl-social-instagram"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="social-linkedin" ><input type="radio" name="iconfonts_name" data-name="social-linkedin" id="sl-social-linkedin" value="sl-social-linkedin"><label for="sl-social-linkedin"><i class="sl-social-linkedin"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="social-pinterest" ><input type="radio" name="iconfonts_name" data-name="social-pinterest" id="sl-social-pinterest" value="sl-social-pinterest"><label for="sl-social-pinterest"><i class="sl-social-pinterest"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="social-github" ><input type="radio" name="iconfonts_name" data-name="social-github" id="sl-social-github" value="sl-social-github"><label for="sl-social-github"><i class="sl-social-github"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="social-google" ><input type="radio" name="iconfonts_name" data-name="social-google" id="sl-social-google" value="sl-social-google"><label for="sl-social-google"><i class="sl-social-google"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="social-reddit" ><input type="radio" name="iconfonts_name" data-name="social-reddit" id="sl-social-reddit" value="sl-social-reddit"><label for="sl-social-reddit"><i class="sl-social-reddit"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="social-skype" ><input type="radio" name="iconfonts_name" data-name="social-skype" id="sl-social-skype" value="sl-social-skype"><label for="sl-social-skype"><i class="sl-social-skype"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="social-dribbble" ><input type="radio" name="iconfonts_name" data-name="social-dribbble" id="sl-social-dribbble" value="sl-social-dribbble"><label for="sl-social-dribbble"><i class="sl-social-dribbble"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="social-behance" ><input type="radio" name="iconfonts_name" data-name="social-behance" id="sl-social-behance" value="sl-social-behance"><label for="sl-social-behance"><i class="sl-social-behance"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="social-foursqare" ><input type="radio" name="iconfonts_name" data-name="social-foursqare" id="sl-social-foursqare" value="sl-social-foursqare"><label for="sl-social-foursqare"><i class="sl-social-foursqare"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="social-soundcloud" ><input type="radio" name="iconfonts_name" data-name="social-soundcloud" id="sl-social-soundcloud" value="sl-social-soundcloud"><label for="sl-social-soundcloud"><i class="sl-social-soundcloud"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="social-spotify" ><input type="radio" name="iconfonts_name" data-name="social-spotify" id="sl-social-spotify" value="sl-social-spotify"><label for="sl-social-spotify"><i class="sl-social-spotify"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="social-stumbleupon" ><input type="radio" name="iconfonts_name" data-name="social-stumbleupon" id="sl-social-stumbleupon" value="sl-social-stumbleupon"><label for="sl-social-stumbleupon"><i class="sl-social-stumbleupon"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="social-youtube" ><input type="radio" name="iconfonts_name" data-name="social-youtube" id="sl-social-youtube" value="sl-social-youtube"><label for="sl-social-youtube"><i class="sl-social-youtube"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="simple-line" data-name="social-dropbox" ><input type="radio" name="iconfonts_name" data-name="social-dropbox" id="sl-social-dropbox" value="sl-social-dropbox"><label for="sl-social-dropbox"><i class="sl-social-dropbox"></i></label></li>
					</ul>
					<ul class="linecons-icon-fonts" data-name="linecons">
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="heart" ><input type="radio" name="iconfonts_name" data-name="heart" id="li_heart" value="li_heart"><label for="li_heart"><i class="li_heart"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="cloud" ><input type="radio" name="iconfonts_name" data-name="cloud" id="li_cloud" value="li_cloud"><label for="li_cloud"><i class="li_cloud"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="star" ><input type="radio" name="iconfonts_name" data-name="star" id="li_star" value="li_star"><label for="li_star"><i class="li_star"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="tv" ><input type="radio" name="iconfonts_name" data-name="tv" id="li_tv" value="li_tv"><label for="li_tv"><i class="li_tv"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="sound" ><input type="radio" name="iconfonts_name" data-name="sound" id="li_sound" value="li_sound"><label for="li_sound"><i class="li_sound"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="video" ><input type="radio" name="iconfonts_name" data-name="video" id="li_video" value="li_video"><label for="li_video"><i class="li_video"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="trash" ><input type="radio" name="iconfonts_name" data-name="trash" id="li_trash" value="li_trash"><label for="li_trash"><i class="li_trash"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="user" ><input type="radio" name="iconfonts_name" data-name="user" id="li_user" value="li_user"><label for="li_user"><i class="li_user"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="key" ><input type="radio" name="iconfonts_name" data-name="key" id="li_key" value="li_key"><label for="li_key"><i class="li_key"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="search" ><input type="radio" name="iconfonts_name" data-name="search" id="li_search" value="li_search"><label for="li_search"><i class="li_search"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="settings" ><input type="radio" name="iconfonts_name" data-name="settings" id="li_settings" value="li_settings"><label for="li_settings"><i class="li_settings"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="camera" ><input type="radio" name="iconfonts_name" data-name="camera" id="li_camera" value="li_camera"><label for="li_camera"><i class="li_camera"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="tag" ><input type="radio" name="iconfonts_name" data-name="tag" id="li_tag" value="li_tag"><label for="li_tag"><i class="li_tag"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="lock" ><input type="radio" name="iconfonts_name" data-name="lock" id="li_lock" value="li_lock"><label for="li_lock"><i class="li_lock"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="bulb" ><input type="radio" name="iconfonts_name" data-name="bulb" id="li_bulb" value="li_bulb"><label for="li_bulb"><i class="li_bulb"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="pen" ><input type="radio" name="iconfonts_name" data-name="pen" id="li_pen" value="li_pen"><label for="li_pen"><i class="li_pen"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="diamond" ><input type="radio" name="iconfonts_name" data-name="diamond" id="li_diamond" value="li_diamond"><label for="li_diamond"><i class="li_diamond"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="display" ><input type="radio" name="iconfonts_name" data-name="display" id="li_display" value="li_display"><label for="li_display"><i class="li_display"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="location" ><input type="radio" name="iconfonts_name" data-name="location" id="li_location" value="li_location"><label for="li_location"><i class="li_location"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="eye" ><input type="radio" name="iconfonts_name" data-name="eye" id="li_eye" value="li_eye"><label for="li_eye"><i class="li_eye"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="bubble" ><input type="radio" name="iconfonts_name" data-name="bubble" id="li_bubble" value="li_bubble"><label for="li_bubble"><i class="li_bubble"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="stack" ><input type="radio" name="iconfonts_name" data-name="stack" id="li_stack" value="li_stack"><label for="li_stack"><i class="li_stack"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="cup" ><input type="radio" name="iconfonts_name" data-name="cup" id="li_cup" value="li_cup"><label for="li_cup"><i class="li_cup"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="phone" ><input type="radio" name="iconfonts_name" data-name="phone" id="li_phone" value="li_phone"><label for="li_phone"><i class="li_phone"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="news" ><input type="radio" name="iconfonts_name" data-name="news" id="li_news" value="li_news"><label for="li_news"><i class="li_news"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="mail" ><input type="radio" name="iconfonts_name" data-name="mail" id="li_mail" value="li_mail"><label for="li_mail"><i class="li_mail"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="like" ><input type="radio" name="iconfonts_name" data-name="like" id="li_like" value="li_like"><label for="li_like"><i class="li_like"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="photo" ><input type="radio" name="iconfonts_name" data-name="photo" id="li_photo" value="li_photo"><label for="li_photo"><i class="li_photo"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="note" ><input type="radio" name="iconfonts_name" data-name="note" id="li_note" value="li_note"><label for="li_note"><i class="li_note"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="clock" ><input type="radio" name="iconfonts_name" data-name="clock" id="li_clock" value="li_clock"><label for="li_clock"><i class="li_clock"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="paperplane" ><input type="radio" name="iconfonts_name" data-name="paperplane" id="li_paperplane" value="li_paperplane"><label for="li_paperplane"><i class="li_paperplane"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="params" ><input type="radio" name="iconfonts_name" data-name="params" id="li_params" value="li_params"><label for="li_params"><i class="li_params"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="banknote" ><input type="radio" name="iconfonts_name" data-name="banknote" id="li_banknote" value="li_banknote"><label for="li_banknote"><i class="li_banknote"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="data" ><input type="radio" name="iconfonts_name" data-name="data" id="li_data" value="li_data"><label for="li_data"><i class="li_data"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="music" ><input type="radio" name="iconfonts_name" data-name="music" id="li_music" value="li_music"><label for="li_music"><i class="li_music"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="megaphone" ><input type="radio" name="iconfonts_name" data-name="megaphone" id="li_megaphone" value="li_megaphone"><label for="li_megaphone"><i class="li_megaphone"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="study" ><input type="radio" name="iconfonts_name" data-name="study" id="li_study" value="li_study"><label for="li_study"><i class="li_study"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="lab" ><input type="radio" name="iconfonts_name" data-name="lab" id="li_lab" value="li_lab"><label for="li_lab"><i class="li_lab"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="food" ><input type="radio" name="iconfonts_name" data-name="food" id="li_food" value="li_food"><label for="li_food"><i class="li_food"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="t-shirt" ><input type="radio" name="iconfonts_name" data-name="t-shirt" id="li_t-shirt" value="li_t-shirt"><label for="li_t-shirt"><i class="li_t-shirt"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="fire" ><input type="radio" name="iconfonts_name" data-name="fire" id="li_fire" value="li_fire"><label for="li_fire"><i class="li_fire"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="clip" ><input type="radio" name="iconfonts_name" data-name="clip" id="li_clip" value="li_clip"><label for="li_clip"><i class="li_clip"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="shop" ><input type="radio" name="iconfonts_name" data-name="shop" id="li_shop" value="li_shop"><label for="li_shop"><i class="li_shop"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="calendar" ><input type="radio" name="iconfonts_name" data-name="calendar" id="li_calendar" value="li_calendar"><label for="li_calendar"><i class="li_calendar"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="vallet" ><input type="radio" name="iconfonts_name" data-name="vallet" id="li_vallet" value="li_vallet"><label for="li_vallet"><i class="li_vallet"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="vynil" ><input type="radio" name="iconfonts_name" data-name="vynil" id="li_vynil" value="li_vynil"><label for="li_vynil"><i class="li_vynil"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="truck" ><input type="radio" name="iconfonts_name" data-name="truck" id="li_truck" value="li_truck"><label for="li_truck"><i class="li_truck"></i></label></li>
						<li class="wn-icon deep-lazy" icon-name="linecons" data-name="world" ><input type="radio" name="iconfonts_name" data-name="world" id="li_world" value="li_world"><label for="li_world"><i class="li_world"></i></label></li>
					</ul>
					<ul class="fontawesome-icon-fonts" data-name="fontawesome">
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="500px" >
							<input type="radio" name="iconfonts_name" data-name="500px" id="wn-fab wn-fa-500px" value="wn-fa-500px">
							<label for="wn-fab wn-fa-500px"><i class="wn-fab wn-fa-500px"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="accessible-icon" >
							<input type="radio" name="iconfonts_name" data-name="accessible-icon" id="wn-fab wn-fa-accessible-icon" value="wn-fa-accessible-icon">
							<label for="wn-fab wn-fa-accessible-icon"><i class="wn-fab wn-fa-accessible-icon"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="accusoft" >
							<input type="radio" name="iconfonts_name" data-name="accusoft" id="wn-fab wn-fa-accusoft" value="wn-fa-accusoft">
							<label for="wn-fab wn-fa-accusoft"><i class="wn-fab wn-fa-accusoft"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="adn" >
							<input type="radio" name="iconfonts_name" data-name="adn" id="wn-fab wn-fa-adn" value="wn-fa-adn">
							<label for="wn-fab wn-fa-adn"><i class="wn-fab wn-fa-adn"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="adversal" >
							<input type="radio" name="iconfonts_name" data-name="adversal" id="wn-fab wn-fa-adversal" value="wn-fa-adversal">
							<label for="wn-fab wn-fa-adversal"><i class="wn-fab wn-fa-adversal"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="affiliatetheme" >
							<input type="radio" name="iconfonts_name" data-name="affiliatetheme" id="wn-fab wn-fa-affiliatetheme" value="wn-fa-affiliatetheme">
							<label for="wn-fab wn-fa-affiliatetheme"><i class="wn-fab wn-fa-affiliatetheme"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="algolia" >
							<input type="radio" name="iconfonts_name" data-name="algolia" id="wn-fab wn-fa-algolia" value="wn-fa-algolia">
							<label for="wn-fab wn-fa-algolia"><i class="wn-fab wn-fa-algolia"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="amazon" >
							<input type="radio" name="iconfonts_name" data-name="amazon" id="wn-fab wn-fa-amazon" value="wn-fa-amazon">
							<label for="wn-fab wn-fa-amazon"><i class="wn-fab wn-fa-amazon"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="amazon-pay" >
							<input type="radio" name="iconfonts_name" data-name="amazon-pay" id="wn-fab wn-fa-amazon-pay" value="wn-fa-amazon-pay">
							<label for="wn-fab wn-fa-amazon-pay"><i class="wn-fab wn-fa-amazon-pay"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="amilia" >
							<input type="radio" name="iconfonts_name" data-name="amilia" id="wn-fab wn-fa-amilia" value="wn-fa-amilia">
							<label for="wn-fab wn-fa-amilia"><i class="wn-fab wn-fa-amilia"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="android" >
							<input type="radio" name="iconfonts_name" data-name="android" id="wn-fab wn-fa-android" value="wn-fa-android">
							<label for="wn-fab wn-fa-android"><i class="wn-fab wn-fa-android"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="angellist" >
							<input type="radio" name="iconfonts_name" data-name="angellist" id="wn-fab wn-fa-angellist" value="wn-fa-angellist">
							<label for="wn-fab wn-fa-angellist"><i class="wn-fab wn-fa-angellist"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="angrycreative" >
							<input type="radio" name="iconfonts_name" data-name="angrycreative" id="wn-fab wn-fa-angrycreative" value="wn-fa-angrycreative">
							<label for="wn-fab wn-fa-angrycreative"><i class="wn-fab wn-fa-angrycreative"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="angular" >
							<input type="radio" name="iconfonts_name" data-name="angular" id="wn-fab wn-fa-angular" value="wn-fa-angular">
							<label for="wn-fab wn-fa-angular"><i class="wn-fab wn-fa-angular"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="app-store" >
							<input type="radio" name="iconfonts_name" data-name="app-store" id="wn-fab wn-fa-app-store" value="wn-fa-app-store">
							<label for="wn-fab wn-fa-app-store"><i class="wn-fab wn-fa-app-store"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="app-store-ios" >
							<input type="radio" name="iconfonts_name" data-name="app-store-ios" id="wn-fab wn-fa-app-store-ios" value="wn-fa-app-store-ios">
							<label for="wn-fab wn-fa-app-store-ios"><i class="wn-fab wn-fa-app-store-ios"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="apper" >
							<input type="radio" name="iconfonts_name" data-name="apper" id="wn-fab wn-fa-apper" value="wn-fa-apper">
							<label for="wn-fab wn-fa-apper"><i class="wn-fab wn-fa-apper"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="apple" >
							<input type="radio" name="iconfonts_name" data-name="apple" id="wn-fab wn-fa-apple" value="wn-fa-apple">
							<label for="wn-fab wn-fa-apple"><i class="wn-fab wn-fa-apple"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="apple-pay" >
							<input type="radio" name="iconfonts_name" data-name="apple-pay" id="wn-fab wn-fa-apple-pay" value="wn-fa-apple-pay">
							<label for="wn-fab wn-fa-apple-pay"><i class="wn-fab wn-fa-apple-pay"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="asymmetrik" >
							<input type="radio" name="iconfonts_name" data-name="asymmetrik" id="wn-fab wn-fa-asymmetrik" value="wn-fa-asymmetrik">
							<label for="wn-fab wn-fa-asymmetrik"><i class="wn-fab wn-fa-asymmetrik"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="audible" >
							<input type="radio" name="iconfonts_name" data-name="audible" id="wn-fab wn-fa-audible" value="wn-fa-audible">
							<label for="wn-fab wn-fa-audible"><i class="wn-fab wn-fa-audible"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="autoprefixer" >
							<input type="radio" name="iconfonts_name" data-name="autoprefixer" id="wn-fab wn-fa-autoprefixer" value="wn-fa-autoprefixer">
							<label for="wn-fab wn-fa-autoprefixer"><i class="wn-fab wn-fa-autoprefixer"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="avianex" >
							<input type="radio" name="iconfonts_name" data-name="avianex" id="wn-fab wn-fa-avianex" value="wn-fa-avianex">
							<label for="wn-fab wn-fa-avianex"><i class="wn-fab wn-fa-avianex"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="aviato" >
							<input type="radio" name="iconfonts_name" data-name="aviato" id="wn-fab wn-fa-aviato" value="wn-fa-aviato">
							<label for="wn-fab wn-fa-aviato"><i class="wn-fab wn-fa-aviato"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="aws" >
							<input type="radio" name="iconfonts_name" data-name="aws" id="wn-fab wn-fa-aws" value="wn-fa-aws">
							<label for="wn-fab wn-fa-aws"><i class="wn-fab wn-fa-aws"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="bandcamp" >
							<input type="radio" name="iconfonts_name" data-name="bandcamp" id="wn-fab wn-fa-bandcamp" value="wn-fa-bandcamp">
							<label for="wn-fab wn-fa-bandcamp"><i class="wn-fab wn-fa-bandcamp"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="behance" >
							<input type="radio" name="iconfonts_name" data-name="behance" id="wn-fab wn-fa-behance" value="wn-fa-behance">
							<label for="wn-fab wn-fa-behance"><i class="wn-fab wn-fa-behance"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="behance-square" >
							<input type="radio" name="iconfonts_name" data-name="behance-square" id="wn-fab wn-fa-behance-square" value="wn-fa-behance-square">
							<label for="wn-fab wn-fa-behance-square"><i class="wn-fab wn-fa-behance-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="bimobject" >
							<input type="radio" name="iconfonts_name" data-name="bimobject" id="wn-fab wn-fa-bimobject" value="wn-fa-bimobject">
							<label for="wn-fab wn-fa-bimobject"><i class="wn-fab wn-fa-bimobject"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="bitbucket" >
							<input type="radio" name="iconfonts_name" data-name="bitbucket" id="wn-fab wn-fa-bitbucket" value="wn-fa-bitbucket">
							<label for="wn-fab wn-fa-bitbucket"><i class="wn-fab wn-fa-bitbucket"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="bitcoin" >
							<input type="radio" name="iconfonts_name" data-name="bitcoin" id="wn-fab wn-fa-bitcoin" value="wn-fa-bitcoin">
							<label for="wn-fab wn-fa-bitcoin"><i class="wn-fab wn-fa-bitcoin"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="bity" >
							<input type="radio" name="iconfonts_name" data-name="bity" id="wn-fab wn-fa-bity" value="wn-fa-bity">
							<label for="wn-fab wn-fa-bity"><i class="wn-fab wn-fa-bity"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="black-tie" >
							<input type="radio" name="iconfonts_name" data-name="black-tie" id="wn-fab wn-fa-black-tie" value="wn-fa-black-tie">
							<label for="wn-fab wn-fa-black-tie"><i class="wn-fab wn-fa-black-tie"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="blackberry" >
							<input type="radio" name="iconfonts_name" data-name="blackberry" id="wn-fab wn-fa-blackberry" value="wn-fa-blackberry">
							<label for="wn-fab wn-fa-blackberry"><i class="wn-fab wn-fa-blackberry"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="blogger" >
							<input type="radio" name="iconfonts_name" data-name="blogger" id="wn-fab wn-fa-blogger" value="wn-fa-blogger">
							<label for="wn-fab wn-fa-blogger"><i class="wn-fab wn-fa-blogger"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="blogger-b" >
							<input type="radio" name="iconfonts_name" data-name="blogger-b" id="wn-fab wn-fa-blogger-b" value="wn-fa-blogger-b">
							<label for="wn-fab wn-fa-blogger-b"><i class="wn-fab wn-fa-blogger-b"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="bluetooth" >
							<input type="radio" name="iconfonts_name" data-name="bluetooth" id="wn-fab wn-fa-bluetooth" value="wn-fa-bluetooth">
							<label for="wn-fab wn-fa-bluetooth"><i class="wn-fab wn-fa-bluetooth"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="bluetooth-b" >
							<input type="radio" name="iconfonts_name" data-name="bluetooth-b" id="wn-fab wn-fa-bluetooth-b" value="wn-fa-bluetooth-b">
							<label for="wn-fab wn-fa-bluetooth-b"><i class="wn-fab wn-fa-bluetooth-b"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="btc" >
							<input type="radio" name="iconfonts_name" data-name="btc" id="wn-fab wn-fa-btc" value="wn-fa-btc">
							<label for="wn-fab wn-fa-btc"><i class="wn-fab wn-fa-btc"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="buromobelexperte" >
							<input type="radio" name="iconfonts_name" data-name="buromobelexperte" id="wn-fab wn-fa-buromobelexperte" value="wn-fa-buromobelexperte">
							<label for="wn-fab wn-fa-buromobelexperte"><i class="wn-fab wn-fa-buromobelexperte"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="buysellads" >
							<input type="radio" name="iconfonts_name" data-name="buysellads" id="wn-fab wn-fa-buysellads" value="wn-fa-buysellads">
							<label for="wn-fab wn-fa-buysellads"><i class="wn-fab wn-fa-buysellads"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="cc-amazon-pay" >
							<input type="radio" name="iconfonts_name" data-name="cc-amazon-pay" id="wn-fab wn-fa-cc-amazon-pay" value="wn-fa-cc-amazon-pay">
							<label for="wn-fab wn-fa-cc-amazon-pay"><i class="wn-fab wn-fa-cc-amazon-pay"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="cc-amex" >
							<input type="radio" name="iconfonts_name" data-name="cc-amex" id="wn-fab wn-fa-cc-amex" value="wn-fa-cc-amex">
							<label for="wn-fab wn-fa-cc-amex"><i class="wn-fab wn-fa-cc-amex"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="cc-apple-pay" >
							<input type="radio" name="iconfonts_name" data-name="cc-apple-pay" id="wn-fab wn-fa-cc-apple-pay" value="wn-fa-cc-apple-pay">
							<label for="wn-fab wn-fa-cc-apple-pay"><i class="wn-fab wn-fa-cc-apple-pay"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="cc-diners-club" >
							<input type="radio" name="iconfonts_name" data-name="cc-diners-club" id="wn-fab wn-fa-cc-diners-club" value="wn-fa-cc-diners-club">
							<label for="wn-fab wn-fa-cc-diners-club"><i class="wn-fab wn-fa-cc-diners-club"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="cc-discover" >
							<input type="radio" name="iconfonts_name" data-name="cc-discover" id="wn-fab wn-fa-cc-discover" value="wn-fa-cc-discover">
							<label for="wn-fab wn-fa-cc-discover"><i class="wn-fab wn-fa-cc-discover"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="cc-jcb" >
							<input type="radio" name="iconfonts_name" data-name="cc-jcb" id="wn-fab wn-fa-cc-jcb" value="wn-fa-cc-jcb">
							<label for="wn-fab wn-fa-cc-jcb"><i class="wn-fab wn-fa-cc-jcb"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="cc-mastercard" >
							<input type="radio" name="iconfonts_name" data-name="cc-mastercard" id="wn-fab wn-fa-cc-mastercard" value="wn-fa-cc-mastercard">
							<label for="wn-fab wn-fa-cc-mastercard"><i class="wn-fab wn-fa-cc-mastercard"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="cc-paypal" >
							<input type="radio" name="iconfonts_name" data-name="cc-paypal" id="wn-fab wn-fa-cc-paypal" value="wn-fa-cc-paypal">
							<label for="wn-fab wn-fa-cc-paypal"><i class="wn-fab wn-fa-cc-paypal"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="cc-stripe" >
							<input type="radio" name="iconfonts_name" data-name="cc-stripe" id="wn-fab wn-fa-cc-stripe" value="wn-fa-cc-stripe">
							<label for="wn-fab wn-fa-cc-stripe"><i class="wn-fab wn-fa-cc-stripe"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="cc-visa" >
							<input type="radio" name="iconfonts_name" data-name="cc-visa" id="wn-fab wn-fa-cc-visa" value="wn-fa-cc-visa">
							<label for="wn-fab wn-fa-cc-visa"><i class="wn-fab wn-fa-cc-visa"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="centercode" >
							<input type="radio" name="iconfonts_name" data-name="centercode" id="wn-fab wn-fa-centercode" value="wn-fa-centercode">
							<label for="wn-fab wn-fa-centercode"><i class="wn-fab wn-fa-centercode"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="chrome" >
							<input type="radio" name="iconfonts_name" data-name="chrome" id="wn-fab wn-fa-chrome" value="wn-fa-chrome">
							<label for="wn-fab wn-fa-chrome"><i class="wn-fab wn-fa-chrome"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="cloudscale" >
							<input type="radio" name="iconfonts_name" data-name="cloudscale" id="wn-fab wn-fa-cloudscale" value="wn-fa-cloudscale">
							<label for="wn-fab wn-fa-cloudscale"><i class="wn-fab wn-fa-cloudscale"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="cloudsmith" >
							<input type="radio" name="iconfonts_name" data-name="cloudsmith" id="wn-fab wn-fa-cloudsmith" value="wn-fa-cloudsmith">
							<label for="wn-fab wn-fa-cloudsmith"><i class="wn-fab wn-fa-cloudsmith"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="cloudversify" >
							<input type="radio" name="iconfonts_name" data-name="cloudversify" id="wn-fab wn-fa-cloudversify" value="wn-fa-cloudversify">
							<label for="wn-fab wn-fa-cloudversify"><i class="wn-fab wn-fa-cloudversify"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="codepen" >
							<input type="radio" name="iconfonts_name" data-name="codepen" id="wn-fab wn-fa-codepen" value="wn-fa-codepen">
							<label for="wn-fab wn-fa-codepen"><i class="wn-fab wn-fa-codepen"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="codiepie" >
							<input type="radio" name="iconfonts_name" data-name="codiepie" id="wn-fab wn-fa-codiepie" value="wn-fa-codiepie">
							<label for="wn-fab wn-fa-codiepie"><i class="wn-fab wn-fa-codiepie"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="connectdevelop" >
							<input type="radio" name="iconfonts_name" data-name="connectdevelop" id="wn-fab wn-fa-connectdevelop" value="wn-fa-connectdevelop">
							<label for="wn-fab wn-fa-connectdevelop"><i class="wn-fab wn-fa-connectdevelop"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="contao" >
							<input type="radio" name="iconfonts_name" data-name="contao" id="wn-fab wn-fa-contao" value="wn-fa-contao">
							<label for="wn-fab wn-fa-contao"><i class="wn-fab wn-fa-contao"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="cpanel" >
							<input type="radio" name="iconfonts_name" data-name="cpanel" id="wn-fab wn-fa-cpanel" value="wn-fa-cpanel">
							<label for="wn-fab wn-fa-cpanel"><i class="wn-fab wn-fa-cpanel"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="creative-commons" >
							<input type="radio" name="iconfonts_name" data-name="creative-commons" id="wn-fab wn-fa-creative-commons" value="wn-fa-creative-commons">
							<label for="wn-fab wn-fa-creative-commons"><i class="wn-fab wn-fa-creative-commons"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="creative-commons-by" >
							<input type="radio" name="iconfonts_name" data-name="creative-commons-by" id="wn-fab wn-fa-creative-commons-by" value="wn-fa-creative-commons-by">
							<label for="wn-fab wn-fa-creative-commons-by"><i class="wn-fab wn-fa-creative-commons-by"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="creative-commons-nc" >
							<input type="radio" name="iconfonts_name" data-name="creative-commons-nc" id="wn-fab wn-fa-creative-commons-nc" value="wn-fa-creative-commons-nc">
							<label for="wn-fab wn-fa-creative-commons-nc"><i class="wn-fab wn-fa-creative-commons-nc"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="creative-commons-nc-eu" >
							<input type="radio" name="iconfonts_name" data-name="creative-commons-nc-eu" id="wn-fab wn-fa-creative-commons-nc-eu" value="wn-fa-creative-commons-nc-eu">
							<label for="wn-fab wn-fa-creative-commons-nc-eu"><i class="wn-fab wn-fa-creative-commons-nc-eu"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="creative-commons-nc-jp" >
							<input type="radio" name="iconfonts_name" data-name="creative-commons-nc-jp" id="wn-fab wn-fa-creative-commons-nc-jp" value="wn-fa-creative-commons-nc-jp">
							<label for="wn-fab wn-fa-creative-commons-nc-jp"><i class="wn-fab wn-fa-creative-commons-nc-jp"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="creative-commons-nd" >
							<input type="radio" name="iconfonts_name" data-name="creative-commons-nd" id="wn-fab wn-fa-creative-commons-nd" value="wn-fa-creative-commons-nd">
							<label for="wn-fab wn-fa-creative-commons-nd"><i class="wn-fab wn-fa-creative-commons-nd"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="creative-commons-pd" >
							<input type="radio" name="iconfonts_name" data-name="creative-commons-pd" id="wn-fab wn-fa-creative-commons-pd" value="wn-fa-creative-commons-pd">
							<label for="wn-fab wn-fa-creative-commons-pd"><i class="wn-fab wn-fa-creative-commons-pd"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="creative-commons-pd-alt" >
							<input type="radio" name="iconfonts_name" data-name="creative-commons-pd-alt" id="wn-fab wn-fa-creative-commons-pd-alt" value="wn-fa-creative-commons-pd-alt">
							<label for="wn-fab wn-fa-creative-commons-pd-alt"><i class="wn-fab wn-fa-creative-commons-pd-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="creative-commons-remix" >
							<input type="radio" name="iconfonts_name" data-name="creative-commons-remix" id="wn-fab wn-fa-creative-commons-remix" value="wn-fa-creative-commons-remix">
							<label for="wn-fab wn-fa-creative-commons-remix"><i class="wn-fab wn-fa-creative-commons-remix"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="creative-commons-sa" >
							<input type="radio" name="iconfonts_name" data-name="creative-commons-sa" id="wn-fab wn-fa-creative-commons-sa" value="wn-fa-creative-commons-sa">
							<label for="wn-fab wn-fa-creative-commons-sa"><i class="wn-fab wn-fa-creative-commons-sa"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="creative-commons-sampling" >
							<input type="radio" name="iconfonts_name" data-name="creative-commons-sampling" id="wn-fab wn-fa-creative-commons-sampling" value="wn-fa-creative-commons-sampling">
							<label for="wn-fab wn-fa-creative-commons-sampling"><i class="wn-fab wn-fa-creative-commons-sampling"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="creative-commons-sampling-plus" >
							<input type="radio" name="iconfonts_name" data-name="creative-commons-sampling-plus" id="wn-fab wn-fa-creative-commons-sampling-plus" value="wn-fa-creative-commons-sampling-plus">
							<label for="wn-fab wn-fa-creative-commons-sampling-plus"><i class="wn-fab wn-fa-creative-commons-sampling-plus"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="creative-commons-share" >
							<input type="radio" name="iconfonts_name" data-name="creative-commons-share" id="wn-fab wn-fa-creative-commons-share" value="wn-fa-creative-commons-share">
							<label for="wn-fab wn-fa-creative-commons-share"><i class="wn-fab wn-fa-creative-commons-share"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="css3" >
							<input type="radio" name="iconfonts_name" data-name="css3" id="wn-fab wn-fa-css3" value="wn-fa-css3">
							<label for="wn-fab wn-fa-css3"><i class="wn-fab wn-fa-css3"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="css3-alt" >
							<input type="radio" name="iconfonts_name" data-name="css3-alt" id="wn-fab wn-fa-css3-alt" value="wn-fa-css3-alt">
							<label for="wn-fab wn-fa-css3-alt"><i class="wn-fab wn-fa-css3-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="cuttlefish" >
							<input type="radio" name="iconfonts_name" data-name="cuttlefish" id="wn-fab wn-fa-cuttlefish" value="wn-fa-cuttlefish">
							<label for="wn-fab wn-fa-cuttlefish"><i class="wn-fab wn-fa-cuttlefish"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="d-and-d" >
							<input type="radio" name="iconfonts_name" data-name="d-and-d" id="wn-fab wn-fa-d-and-d" value="wn-fa-d-and-d">
							<label for="wn-fab wn-fa-d-and-d"><i class="wn-fab wn-fa-d-and-d"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="dashcube" >
							<input type="radio" name="iconfonts_name" data-name="dashcube" id="wn-fab wn-fa-dashcube" value="wn-fa-dashcube">
							<label for="wn-fab wn-fa-dashcube"><i class="wn-fab wn-fa-dashcube"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="delicious" >
							<input type="radio" name="iconfonts_name" data-name="delicious" id="wn-fab wn-fa-delicious" value="wn-fa-delicious">
							<label for="wn-fab wn-fa-delicious"><i class="wn-fab wn-fa-delicious"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="deploydog" >
							<input type="radio" name="iconfonts_name" data-name="deploydog" id="wn-fab wn-fa-deploydog" value="wn-fa-deploydog">
							<label for="wn-fab wn-fa-deploydog"><i class="wn-fab wn-fa-deploydog"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="deskpro" >
							<input type="radio" name="iconfonts_name" data-name="deskpro" id="wn-fab wn-fa-deskpro" value="wn-fa-deskpro">
							<label for="wn-fab wn-fa-deskpro"><i class="wn-fab wn-fa-deskpro"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="deviantart" >
							<input type="radio" name="iconfonts_name" data-name="deviantart" id="wn-fab wn-fa-deviantart" value="wn-fa-deviantart">
							<label for="wn-fab wn-fa-deviantart"><i class="wn-fab wn-fa-deviantart"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="digg" >
							<input type="radio" name="iconfonts_name" data-name="digg" id="wn-fab wn-fa-digg" value="wn-fa-digg">
							<label for="wn-fab wn-fa-digg"><i class="wn-fab wn-fa-digg"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="digital-ocean" >
							<input type="radio" name="iconfonts_name" data-name="digital-ocean" id="wn-fab wn-fa-digital-ocean" value="wn-fa-digital-ocean">
							<label for="wn-fab wn-fa-digital-ocean"><i class="wn-fab wn-fa-digital-ocean"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="discord" >
							<input type="radio" name="iconfonts_name" data-name="discord" id="wn-fab wn-fa-discord" value="wn-fa-discord">
							<label for="wn-fab wn-fa-discord"><i class="wn-fab wn-fa-discord"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="discourse" >
							<input type="radio" name="iconfonts_name" data-name="discourse" id="wn-fab wn-fa-discourse" value="wn-fa-discourse">
							<label for="wn-fab wn-fa-discourse"><i class="wn-fab wn-fa-discourse"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="dochub" >
							<input type="radio" name="iconfonts_name" data-name="dochub" id="wn-fab wn-fa-dochub" value="wn-fa-dochub">
							<label for="wn-fab wn-fa-dochub"><i class="wn-fab wn-fa-dochub"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="docker" >
							<input type="radio" name="iconfonts_name" data-name="docker" id="wn-fab wn-fa-docker" value="wn-fa-docker">
							<label for="wn-fab wn-fa-docker"><i class="wn-fab wn-fa-docker"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="draft2digital" >
							<input type="radio" name="iconfonts_name" data-name="draft2digital" id="wn-fab wn-fa-draft2digital" value="wn-fa-draft2digital">
							<label for="wn-fab wn-fa-draft2digital"><i class="wn-fab wn-fa-draft2digital"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="dribbble" >
							<input type="radio" name="iconfonts_name" data-name="dribbble" id="wn-fab wn-fa-dribbble" value="wn-fa-dribbble">
							<label for="wn-fab wn-fa-dribbble"><i class="wn-fab wn-fa-dribbble"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="dribbble-square" >
							<input type="radio" name="iconfonts_name" data-name="dribbble-square" id="wn-fab wn-fa-dribbble-square" value="wn-fa-dribbble-square">
							<label for="wn-fab wn-fa-dribbble-square"><i class="wn-fab wn-fa-dribbble-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="dropbox" >
							<input type="radio" name="iconfonts_name" data-name="dropbox" id="wn-fab wn-fa-dropbox" value="wn-fa-dropbox">
							<label for="wn-fab wn-fa-dropbox"><i class="wn-fab wn-fa-dropbox"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="drupal" >
							<input type="radio" name="iconfonts_name" data-name="drupal" id="wn-fab wn-fa-drupal" value="wn-fa-drupal">
							<label for="wn-fab wn-fa-drupal"><i class="wn-fab wn-fa-drupal"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="dyalog" >
							<input type="radio" name="iconfonts_name" data-name="dyalog" id="wn-fab wn-fa-dyalog" value="wn-fa-dyalog">
							<label for="wn-fab wn-fa-dyalog"><i class="wn-fab wn-fa-dyalog"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="earlybirds" >
							<input type="radio" name="iconfonts_name" data-name="earlybirds" id="wn-fab wn-fa-earlybirds" value="wn-fa-earlybirds">
							<label for="wn-fab wn-fa-earlybirds"><i class="wn-fab wn-fa-earlybirds"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="ebay" >
							<input type="radio" name="iconfonts_name" data-name="ebay" id="wn-fab wn-fa-ebay" value="wn-fa-ebay">
							<label for="wn-fab wn-fa-ebay"><i class="wn-fab wn-fa-ebay"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="edge" >
							<input type="radio" name="iconfonts_name" data-name="edge" id="wn-fab wn-fa-edge" value="wn-fa-edge">
							<label for="wn-fab wn-fa-edge"><i class="wn-fab wn-fa-edge"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="elementor" >
							<input type="radio" name="iconfonts_name" data-name="elementor" id="wn-fab wn-fa-elementor" value="wn-fa-elementor">
							<label for="wn-fab wn-fa-elementor"><i class="wn-fab wn-fa-elementor"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="ember" >
							<input type="radio" name="iconfonts_name" data-name="ember" id="wn-fab wn-fa-ember" value="wn-fa-ember">
							<label for="wn-fab wn-fa-ember"><i class="wn-fab wn-fa-ember"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="empire" >
							<input type="radio" name="iconfonts_name" data-name="empire" id="wn-fab wn-fa-empire" value="wn-fa-empire">
							<label for="wn-fab wn-fa-empire"><i class="wn-fab wn-fa-empire"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="envira" >
							<input type="radio" name="iconfonts_name" data-name="envira" id="wn-fab wn-fa-envira" value="wn-fa-envira">
							<label for="wn-fab wn-fa-envira"><i class="wn-fab wn-fa-envira"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="erlang" >
							<input type="radio" name="iconfonts_name" data-name="erlang" id="wn-fab wn-fa-erlang" value="wn-fa-erlang">
							<label for="wn-fab wn-fa-erlang"><i class="wn-fab wn-fa-erlang"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="ethereum" >
							<input type="radio" name="iconfonts_name" data-name="ethereum" id="wn-fab wn-fa-ethereum" value="wn-fa-ethereum">
							<label for="wn-fab wn-fa-ethereum"><i class="wn-fab wn-fa-ethereum"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="etsy" >
							<input type="radio" name="iconfonts_name" data-name="etsy" id="wn-fab wn-fa-etsy" value="wn-fa-etsy">
							<label for="wn-fab wn-fa-etsy"><i class="wn-fab wn-fa-etsy"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="expeditedssl" >
							<input type="radio" name="iconfonts_name" data-name="expeditedssl" id="wn-fab wn-fa-expeditedssl" value="wn-fa-expeditedssl">
							<label for="wn-fab wn-fa-expeditedssl"><i class="wn-fab wn-fa-expeditedssl"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="facebook" >
							<input type="radio" name="iconfonts_name" data-name="facebook" id="wn-fab wn-fa-facebook" value="wn-fa-facebook">
							<label for="wn-fab wn-fa-facebook"><i class="wn-fab wn-fa-facebook"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="facebook-f" >
							<input type="radio" name="iconfonts_name" data-name="facebook-f" id="wn-fab wn-fa-facebook-f" value="wn-fa-facebook-f">
							<label for="wn-fab wn-fa-facebook-f"><i class="wn-fab wn-fa-facebook-f"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="facebook-messenger" >
							<input type="radio" name="iconfonts_name" data-name="facebook-messenger" id="wn-fab wn-fa-facebook-messenger" value="wn-fa-facebook-messenger">
							<label for="wn-fab wn-fa-facebook-messenger"><i class="wn-fab wn-fa-facebook-messenger"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="facebook-square" >
							<input type="radio" name="iconfonts_name" data-name="facebook-square" id="wn-fab wn-fa-facebook-square" value="wn-fa-facebook-square">
							<label for="wn-fab wn-fa-facebook-square"><i class="wn-fab wn-fa-facebook-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="firefox" >
							<input type="radio" name="iconfonts_name" data-name="firefox" id="wn-fab wn-fa-firefox" value="wn-fa-firefox">
							<label for="wn-fab wn-fa-firefox"><i class="wn-fab wn-fa-firefox"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="first-order" >
							<input type="radio" name="iconfonts_name" data-name="first-order" id="wn-fab wn-fa-first-order" value="wn-fa-first-order">
							<label for="wn-fab wn-fa-first-order"><i class="wn-fab wn-fa-first-order"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="first-order-alt" >
							<input type="radio" name="iconfonts_name" data-name="first-order-alt" id="wn-fab wn-fa-first-order-alt" value="wn-fa-first-order-alt">
							<label for="wn-fab wn-fa-first-order-alt"><i class="wn-fab wn-fa-first-order-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="firstdraft" >
							<input type="radio" name="iconfonts_name" data-name="firstdraft" id="wn-fab wn-fa-firstdraft" value="wn-fa-firstdraft">
							<label for="wn-fab wn-fa-firstdraft"><i class="wn-fab wn-fa-firstdraft"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="flickr" >
							<input type="radio" name="iconfonts_name" data-name="flickr" id="wn-fab wn-fa-flickr" value="wn-fa-flickr">
							<label for="wn-fab wn-fa-flickr"><i class="wn-fab wn-fa-flickr"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="flipboard" >
							<input type="radio" name="iconfonts_name" data-name="flipboard" id="wn-fab wn-fa-flipboard" value="wn-fa-flipboard">
							<label for="wn-fab wn-fa-flipboard"><i class="wn-fab wn-fa-flipboard"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="fly" >
							<input type="radio" name="iconfonts_name" data-name="fly" id="wn-fab wn-fa-fly" value="wn-fa-fly">
							<label for="wn-fab wn-fa-fly"><i class="wn-fab wn-fa-fly"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="font-awesome" >
							<input type="radio" name="iconfonts_name" data-name="font-awesome" id="wn-fab wn-fa-font-awesome" value="wn-fa-font-awesome">
							<label for="wn-fab wn-fa-font-awesome"><i class="wn-fab wn-fa-font-awesome"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="font-awesome-alt" >
							<input type="radio" name="iconfonts_name" data-name="font-awesome-alt" id="wn-fab wn-fa-font-awesome-alt" value="wn-fa-font-awesome-alt">
							<label for="wn-fab wn-fa-font-awesome-alt"><i class="wn-fab wn-fa-font-awesome-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="font-awesome-flag" >
							<input type="radio" name="iconfonts_name" data-name="font-awesome-flag" id="wn-fab wn-fa-font-awesome-flag" value="wn-fa-font-awesome-flag">
							<label for="wn-fab wn-fa-font-awesome-flag"><i class="wn-fab wn-fa-font-awesome-flag"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="fonticons" >
							<input type="radio" name="iconfonts_name" data-name="fonticons" id="wn-fab wn-fa-fonticons" value="wn-fa-fonticons">
							<label for="wn-fab wn-fa-fonticons"><i class="wn-fab wn-fa-fonticons"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="fonticons-fi" >
							<input type="radio" name="iconfonts_name" data-name="fonticons-fi" id="wn-fab wn-fa-fonticons-fi" value="wn-fa-fonticons-fi">
							<label for="wn-fab wn-fa-fonticons-fi"><i class="wn-fab wn-fa-fonticons-fi"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="fort-awesome" >
							<input type="radio" name="iconfonts_name" data-name="fort-awesome" id="wn-fab wn-fa-fort-awesome" value="wn-fa-fort-awesome">
							<label for="wn-fab wn-fa-fort-awesome"><i class="wn-fab wn-fa-fort-awesome"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="fort-awesome-alt" >
							<input type="radio" name="iconfonts_name" data-name="fort-awesome-alt" id="wn-fab wn-fa-fort-awesome-alt" value="wn-fa-fort-awesome-alt">
							<label for="wn-fab wn-fa-fort-awesome-alt"><i class="wn-fab wn-fa-fort-awesome-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="forumbee" >
							<input type="radio" name="iconfonts_name" data-name="forumbee" id="wn-fab wn-fa-forumbee" value="wn-fa-forumbee">
							<label for="wn-fab wn-fa-forumbee"><i class="wn-fab wn-fa-forumbee"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="foursquare" >
							<input type="radio" name="iconfonts_name" data-name="foursquare" id="wn-fab wn-fa-foursquare" value="wn-fa-foursquare">
							<label for="wn-fab wn-fa-foursquare"><i class="wn-fab wn-fa-foursquare"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="free-code-camp" >
							<input type="radio" name="iconfonts_name" data-name="free-code-camp" id="wn-fab wn-fa-free-code-camp" value="wn-fa-free-code-camp">
							<label for="wn-fab wn-fa-free-code-camp"><i class="wn-fab wn-fa-free-code-camp"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="freebsd" >
							<input type="radio" name="iconfonts_name" data-name="freebsd" id="wn-fab wn-fa-freebsd" value="wn-fa-freebsd">
							<label for="wn-fab wn-fa-freebsd"><i class="wn-fab wn-fa-freebsd"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="fulcrum" >
							<input type="radio" name="iconfonts_name" data-name="fulcrum" id="wn-fab wn-fa-fulcrum" value="wn-fa-fulcrum">
							<label for="wn-fab wn-fa-fulcrum"><i class="wn-fab wn-fa-fulcrum"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="galactic-republic" >
							<input type="radio" name="iconfonts_name" data-name="galactic-republic" id="wn-fab wn-fa-galactic-republic" value="wn-fa-galactic-republic">
							<label for="wn-fab wn-fa-galactic-republic"><i class="wn-fab wn-fa-galactic-republic"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="galactic-senate" >
							<input type="radio" name="iconfonts_name" data-name="galactic-senate" id="wn-fab wn-fa-galactic-senate" value="wn-fa-galactic-senate">
							<label for="wn-fab wn-fa-galactic-senate"><i class="wn-fab wn-fa-galactic-senate"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="get-pocket" >
							<input type="radio" name="iconfonts_name" data-name="get-pocket" id="wn-fab wn-fa-get-pocket" value="wn-fa-get-pocket">
							<label for="wn-fab wn-fa-get-pocket"><i class="wn-fab wn-fa-get-pocket"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="gg" >
							<input type="radio" name="iconfonts_name" data-name="gg" id="wn-fab wn-fa-gg" value="wn-fa-gg">
							<label for="wn-fab wn-fa-gg"><i class="wn-fab wn-fa-gg"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="gg-circle" >
							<input type="radio" name="iconfonts_name" data-name="gg-circle" id="wn-fab wn-fa-gg-circle" value="wn-fa-gg-circle">
							<label for="wn-fab wn-fa-gg-circle"><i class="wn-fab wn-fa-gg-circle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="git" >
							<input type="radio" name="iconfonts_name" data-name="git" id="wn-fab wn-fa-git" value="wn-fa-git">
							<label for="wn-fab wn-fa-git"><i class="wn-fab wn-fa-git"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="git-square" >
							<input type="radio" name="iconfonts_name" data-name="git-square" id="wn-fab wn-fa-git-square" value="wn-fa-git-square">
							<label for="wn-fab wn-fa-git-square"><i class="wn-fab wn-fa-git-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="github" >
							<input type="radio" name="iconfonts_name" data-name="github" id="wn-fab wn-fa-github" value="wn-fa-github">
							<label for="wn-fab wn-fa-github"><i class="wn-fab wn-fa-github"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="github-alt" >
							<input type="radio" name="iconfonts_name" data-name="github-alt" id="wn-fab wn-fa-github-alt" value="wn-fa-github-alt">
							<label for="wn-fab wn-fa-github-alt"><i class="wn-fab wn-fa-github-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="github-square" >
							<input type="radio" name="iconfonts_name" data-name="github-square" id="wn-fab wn-fa-github-square" value="wn-fa-github-square">
							<label for="wn-fab wn-fa-github-square"><i class="wn-fab wn-fa-github-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="gitkraken" >
							<input type="radio" name="iconfonts_name" data-name="gitkraken" id="wn-fab wn-fa-gitkraken" value="wn-fa-gitkraken">
							<label for="wn-fab wn-fa-gitkraken"><i class="wn-fab wn-fa-gitkraken"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="gitlab" >
							<input type="radio" name="iconfonts_name" data-name="gitlab" id="wn-fab wn-fa-gitlab" value="wn-fa-gitlab">
							<label for="wn-fab wn-fa-gitlab"><i class="wn-fab wn-fa-gitlab"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="gitter" >
							<input type="radio" name="iconfonts_name" data-name="gitter" id="wn-fab wn-fa-gitter" value="wn-fa-gitter">
							<label for="wn-fab wn-fa-gitter"><i class="wn-fab wn-fa-gitter"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="glide" >
							<input type="radio" name="iconfonts_name" data-name="glide" id="wn-fab wn-fa-glide" value="wn-fa-glide">
							<label for="wn-fab wn-fa-glide"><i class="wn-fab wn-fa-glide"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="glide-g" >
							<input type="radio" name="iconfonts_name" data-name="glide-g" id="wn-fab wn-fa-glide-g" value="wn-fa-glide-g">
							<label for="wn-fab wn-fa-glide-g"><i class="wn-fab wn-fa-glide-g"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="gofore" >
							<input type="radio" name="iconfonts_name" data-name="gofore" id="wn-fab wn-fa-gofore" value="wn-fa-gofore">
							<label for="wn-fab wn-fa-gofore"><i class="wn-fab wn-fa-gofore"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="goodreads" >
							<input type="radio" name="iconfonts_name" data-name="goodreads" id="wn-fab wn-fa-goodreads" value="wn-fa-goodreads">
							<label for="wn-fab wn-fa-goodreads"><i class="wn-fab wn-fa-goodreads"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="goodreads-g" >
							<input type="radio" name="iconfonts_name" data-name="goodreads-g" id="wn-fab wn-fa-goodreads-g" value="wn-fa-goodreads-g">
							<label for="wn-fab wn-fa-goodreads-g"><i class="wn-fab wn-fa-goodreads-g"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="google" >
							<input type="radio" name="iconfonts_name" data-name="google" id="wn-fab wn-fa-google" value="wn-fa-google">
							<label for="wn-fab wn-fa-google"><i class="wn-fab wn-fa-google"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="google-drive" >
							<input type="radio" name="iconfonts_name" data-name="google-drive" id="wn-fab wn-fa-google-drive" value="wn-fa-google-drive">
							<label for="wn-fab wn-fa-google-drive"><i class="wn-fab wn-fa-google-drive"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="google-play" >
							<input type="radio" name="iconfonts_name" data-name="google-play" id="wn-fab wn-fa-google-play" value="wn-fa-google-play">
							<label for="wn-fab wn-fa-google-play"><i class="wn-fab wn-fa-google-play"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="google-plus" >
							<input type="radio" name="iconfonts_name" data-name="google-plus" id="wn-fab wn-fa-google-plus" value="wn-fa-google-plus">
							<label for="wn-fab wn-fa-google-plus"><i class="wn-fab wn-fa-google-plus"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="google-plus-g" >
							<input type="radio" name="iconfonts_name" data-name="google-plus-g" id="wn-fab wn-fa-google-plus-g" value="wn-fa-google-plus-g">
							<label for="wn-fab wn-fa-google-plus-g"><i class="wn-fab wn-fa-google-plus-g"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="google-plus-square" >
							<input type="radio" name="iconfonts_name" data-name="google-plus-square" id="wn-fab wn-fa-google-plus-square" value="wn-fa-google-plus-square">
							<label for="wn-fab wn-fa-google-plus-square"><i class="wn-fab wn-fa-google-plus-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="google-wallet" >
							<input type="radio" name="iconfonts_name" data-name="google-wallet" id="wn-fab wn-fa-google-wallet" value="wn-fa-google-wallet">
							<label for="wn-fab wn-fa-google-wallet"><i class="wn-fab wn-fa-google-wallet"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="gratipay" >
							<input type="radio" name="iconfonts_name" data-name="gratipay" id="wn-fab wn-fa-gratipay" value="wn-fa-gratipay">
							<label for="wn-fab wn-fa-gratipay"><i class="wn-fab wn-fa-gratipay"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="grav" >
							<input type="radio" name="iconfonts_name" data-name="grav" id="wn-fab wn-fa-grav" value="wn-fa-grav">
							<label for="wn-fab wn-fa-grav"><i class="wn-fab wn-fa-grav"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="gripfire" >
							<input type="radio" name="iconfonts_name" data-name="gripfire" id="wn-fab wn-fa-gripfire" value="wn-fa-gripfire">
							<label for="wn-fab wn-fa-gripfire"><i class="wn-fab wn-fa-gripfire"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="grunt" >
							<input type="radio" name="iconfonts_name" data-name="grunt" id="wn-fab wn-fa-grunt" value="wn-fa-grunt">
							<label for="wn-fab wn-fa-grunt"><i class="wn-fab wn-fa-grunt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="gulp" >
							<input type="radio" name="iconfonts_name" data-name="gulp" id="wn-fab wn-fa-gulp" value="wn-fa-gulp">
							<label for="wn-fab wn-fa-gulp"><i class="wn-fab wn-fa-gulp"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hacker-news" >
							<input type="radio" name="iconfonts_name" data-name="hacker-news" id="wn-fab wn-fa-hacker-news" value="wn-fa-hacker-news">
							<label for="wn-fab wn-fa-hacker-news"><i class="wn-fab wn-fa-hacker-news"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hacker-news-square" >
							<input type="radio" name="iconfonts_name" data-name="hacker-news-square" id="wn-fab wn-fa-hacker-news-square" value="wn-fa-hacker-news-square">
							<label for="wn-fab wn-fa-hacker-news-square"><i class="wn-fab wn-fa-hacker-news-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hips" >
							<input type="radio" name="iconfonts_name" data-name="hips" id="wn-fab wn-fa-hips" value="wn-fa-hips">
							<label for="wn-fab wn-fa-hips"><i class="wn-fab wn-fa-hips"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hire-a-helper" >
							<input type="radio" name="iconfonts_name" data-name="hire-a-helper" id="wn-fab wn-fa-hire-a-helper" value="wn-fa-hire-a-helper">
							<label for="wn-fab wn-fa-hire-a-helper"><i class="wn-fab wn-fa-hire-a-helper"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hooli" >
							<input type="radio" name="iconfonts_name" data-name="hooli" id="wn-fab wn-fa-hooli" value="wn-fa-hooli">
							<label for="wn-fab wn-fa-hooli"><i class="wn-fab wn-fa-hooli"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hotjar" >
							<input type="radio" name="iconfonts_name" data-name="hotjar" id="wn-fab wn-fa-hotjar" value="wn-fa-hotjar">
							<label for="wn-fab wn-fa-hotjar"><i class="wn-fab wn-fa-hotjar"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="houzz" >
							<input type="radio" name="iconfonts_name" data-name="houzz" id="wn-fab wn-fa-houzz" value="wn-fa-houzz">
							<label for="wn-fab wn-fa-houzz"><i class="wn-fab wn-fa-houzz"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="html5" >
							<input type="radio" name="iconfonts_name" data-name="html5" id="wn-fab wn-fa-html5" value="wn-fa-html5">
							<label for="wn-fab wn-fa-html5"><i class="wn-fab wn-fa-html5"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hubspot" >
							<input type="radio" name="iconfonts_name" data-name="hubspot" id="wn-fab wn-fa-hubspot" value="wn-fa-hubspot">
							<label for="wn-fab wn-fa-hubspot"><i class="wn-fab wn-fa-hubspot"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="imdb" >
							<input type="radio" name="iconfonts_name" data-name="imdb" id="wn-fab wn-fa-imdb" value="wn-fa-imdb">
							<label for="wn-fab wn-fa-imdb"><i class="wn-fab wn-fa-imdb"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="instagram" >
							<input type="radio" name="iconfonts_name" data-name="instagram" id="wn-fab wn-fa-instagram" value="wn-fa-instagram">
							<label for="wn-fab wn-fa-instagram"><i class="wn-fab wn-fa-instagram"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="internet-explorer" >
							<input type="radio" name="iconfonts_name" data-name="internet-explorer" id="wn-fab wn-fa-internet-explorer" value="wn-fa-internet-explorer">
							<label for="wn-fab wn-fa-internet-explorer"><i class="wn-fab wn-fa-internet-explorer"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="ioxhost" >
							<input type="radio" name="iconfonts_name" data-name="ioxhost" id="wn-fab wn-fa-ioxhost" value="wn-fa-ioxhost">
							<label for="wn-fab wn-fa-ioxhost"><i class="wn-fab wn-fa-ioxhost"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="itunes" >
							<input type="radio" name="iconfonts_name" data-name="itunes" id="wn-fab wn-fa-itunes" value="wn-fa-itunes">
							<label for="wn-fab wn-fa-itunes"><i class="wn-fab wn-fa-itunes"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="itunes-note" >
							<input type="radio" name="iconfonts_name" data-name="itunes-note" id="wn-fab wn-fa-itunes-note" value="wn-fa-itunes-note">
							<label for="wn-fab wn-fa-itunes-note"><i class="wn-fab wn-fa-itunes-note"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="java" >
							<input type="radio" name="iconfonts_name" data-name="java" id="wn-fab wn-fa-java" value="wn-fa-java">
							<label for="wn-fab wn-fa-java"><i class="wn-fab wn-fa-java"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="jedi-order" >
							<input type="radio" name="iconfonts_name" data-name="jedi-order" id="wn-fab wn-fa-jedi-order" value="wn-fa-jedi-order">
							<label for="wn-fab wn-fa-jedi-order"><i class="wn-fab wn-fa-jedi-order"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="jenkins" >
							<input type="radio" name="iconfonts_name" data-name="jenkins" id="wn-fab wn-fa-jenkins" value="wn-fa-jenkins">
							<label for="wn-fab wn-fa-jenkins"><i class="wn-fab wn-fa-jenkins"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="joget" >
							<input type="radio" name="iconfonts_name" data-name="joget" id="wn-fab wn-fa-joget" value="wn-fa-joget">
							<label for="wn-fab wn-fa-joget"><i class="wn-fab wn-fa-joget"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="joomla" >
							<input type="radio" name="iconfonts_name" data-name="joomla" id="wn-fab wn-fa-joomla" value="wn-fa-joomla">
							<label for="wn-fab wn-fa-joomla"><i class="wn-fab wn-fa-joomla"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="js" >
							<input type="radio" name="iconfonts_name" data-name="js" id="wn-fab wn-fa-js" value="wn-fa-js">
							<label for="wn-fab wn-fa-js"><i class="wn-fab wn-fa-js"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="js-square" >
							<input type="radio" name="iconfonts_name" data-name="js-square" id="wn-fab wn-fa-js-square" value="wn-fa-js-square">
							<label for="wn-fab wn-fa-js-square"><i class="wn-fab wn-fa-js-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="jsfiddle" >
							<input type="radio" name="iconfonts_name" data-name="jsfiddle" id="wn-fab wn-fa-jsfiddle" value="wn-fa-jsfiddle">
							<label for="wn-fab wn-fa-jsfiddle"><i class="wn-fab wn-fa-jsfiddle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="keybase" >
							<input type="radio" name="iconfonts_name" data-name="keybase" id="wn-fab wn-fa-keybase" value="wn-fa-keybase">
							<label for="wn-fab wn-fa-keybase"><i class="wn-fab wn-fa-keybase"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="keycdn" >
							<input type="radio" name="iconfonts_name" data-name="keycdn" id="wn-fab wn-fa-keycdn" value="wn-fa-keycdn">
							<label for="wn-fab wn-fa-keycdn"><i class="wn-fab wn-fa-keycdn"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="kickstarter" >
							<input type="radio" name="iconfonts_name" data-name="kickstarter" id="wn-fab wn-fa-kickstarter" value="wn-fa-kickstarter">
							<label for="wn-fab wn-fa-kickstarter"><i class="wn-fab wn-fa-kickstarter"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="kickstarter-k" >
							<input type="radio" name="iconfonts_name" data-name="kickstarter-k" id="wn-fab wn-fa-kickstarter-k" value="wn-fa-kickstarter-k">
							<label for="wn-fab wn-fa-kickstarter-k"><i class="wn-fab wn-fa-kickstarter-k"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="korvue" >
							<input type="radio" name="iconfonts_name" data-name="korvue" id="wn-fab wn-fa-korvue" value="wn-fa-korvue">
							<label for="wn-fab wn-fa-korvue"><i class="wn-fab wn-fa-korvue"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="laravel" >
							<input type="radio" name="iconfonts_name" data-name="laravel" id="wn-fab wn-fa-laravel" value="wn-fa-laravel">
							<label for="wn-fab wn-fa-laravel"><i class="wn-fab wn-fa-laravel"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="lastfm" >
							<input type="radio" name="iconfonts_name" data-name="lastfm" id="wn-fab wn-fa-lastfm" value="wn-fa-lastfm">
							<label for="wn-fab wn-fa-lastfm"><i class="wn-fab wn-fa-lastfm"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="lastfm-square" >
							<input type="radio" name="iconfonts_name" data-name="lastfm-square" id="wn-fab wn-fa-lastfm-square" value="wn-fa-lastfm-square">
							<label for="wn-fab wn-fa-lastfm-square"><i class="wn-fab wn-fa-lastfm-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="leanpub" >
							<input type="radio" name="iconfonts_name" data-name="leanpub" id="wn-fab wn-fa-leanpub" value="wn-fa-leanpub">
							<label for="wn-fab wn-fa-leanpub"><i class="wn-fab wn-fa-leanpub"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="less" >
							<input type="radio" name="iconfonts_name" data-name="less" id="wn-fab wn-fa-less" value="wn-fa-less">
							<label for="wn-fab wn-fa-less"><i class="wn-fab wn-fa-less"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="line" >
							<input type="radio" name="iconfonts_name" data-name="line" id="wn-fab wn-fa-line" value="wn-fa-line">
							<label for="wn-fab wn-fa-line"><i class="wn-fab wn-fa-line"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="linkedin" >
							<input type="radio" name="iconfonts_name" data-name="linkedin" id="wn-fab wn-fa-linkedin" value="wn-fa-linkedin">
							<label for="wn-fab wn-fa-linkedin"><i class="wn-fab wn-fa-linkedin"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="linkedin-in" >
							<input type="radio" name="iconfonts_name" data-name="linkedin-in" id="wn-fab wn-fa-linkedin-in" value="wn-fa-linkedin-in">
							<label for="wn-fab wn-fa-linkedin-in"><i class="wn-fab wn-fa-linkedin-in"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="linode" >
							<input type="radio" name="iconfonts_name" data-name="linode" id="wn-fab wn-fa-linode" value="wn-fa-linode">
							<label for="wn-fab wn-fa-linode"><i class="wn-fab wn-fa-linode"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="linux" >
							<input type="radio" name="iconfonts_name" data-name="linux" id="wn-fab wn-fa-linux" value="wn-fa-linux">
							<label for="wn-fab wn-fa-linux"><i class="wn-fab wn-fa-linux"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="lyft" >
							<input type="radio" name="iconfonts_name" data-name="lyft" id="wn-fab wn-fa-lyft" value="wn-fa-lyft">
							<label for="wn-fab wn-fa-lyft"><i class="wn-fab wn-fa-lyft"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="magento" >
							<input type="radio" name="iconfonts_name" data-name="magento" id="wn-fab wn-fa-magento" value="wn-fa-magento">
							<label for="wn-fab wn-fa-magento"><i class="wn-fab wn-fa-magento"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="mandalorian" >
							<input type="radio" name="iconfonts_name" data-name="mandalorian" id="wn-fab wn-fa-mandalorian" value="wn-fa-mandalorian">
							<label for="wn-fab wn-fa-mandalorian"><i class="wn-fab wn-fa-mandalorian"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="mastodon" >
							<input type="radio" name="iconfonts_name" data-name="mastodon" id="wn-fab wn-fa-mastodon" value="wn-fa-mastodon">
							<label for="wn-fab wn-fa-mastodon"><i class="wn-fab wn-fa-mastodon"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="maxcdn" >
							<input type="radio" name="iconfonts_name" data-name="maxcdn" id="wn-fab wn-fa-maxcdn" value="wn-fa-maxcdn">
							<label for="wn-fab wn-fa-maxcdn"><i class="wn-fab wn-fa-maxcdn"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="medapps" >
							<input type="radio" name="iconfonts_name" data-name="medapps" id="wn-fab wn-fa-medapps" value="wn-fa-medapps">
							<label for="wn-fab wn-fa-medapps"><i class="wn-fab wn-fa-medapps"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="medium" >
							<input type="radio" name="iconfonts_name" data-name="medium" id="wn-fab wn-fa-medium" value="wn-fa-medium">
							<label for="wn-fab wn-fa-medium"><i class="wn-fab wn-fa-medium"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="medium-m" >
							<input type="radio" name="iconfonts_name" data-name="medium-m" id="wn-fab wn-fa-medium-m" value="wn-fa-medium-m">
							<label for="wn-fab wn-fa-medium-m"><i class="wn-fab wn-fa-medium-m"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="medrt" >
							<input type="radio" name="iconfonts_name" data-name="medrt" id="wn-fab wn-fa-medrt" value="wn-fa-medrt">
							<label for="wn-fab wn-fa-medrt"><i class="wn-fab wn-fa-medrt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="meetup" >
							<input type="radio" name="iconfonts_name" data-name="meetup" id="wn-fab wn-fa-meetup" value="wn-fa-meetup">
							<label for="wn-fab wn-fa-meetup"><i class="wn-fab wn-fa-meetup"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="microsoft" >
							<input type="radio" name="iconfonts_name" data-name="microsoft" id="wn-fab wn-fa-microsoft" value="wn-fa-microsoft">
							<label for="wn-fab wn-fa-microsoft"><i class="wn-fab wn-fa-microsoft"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="mix" >
							<input type="radio" name="iconfonts_name" data-name="mix" id="wn-fab wn-fa-mix" value="wn-fa-mix">
							<label for="wn-fab wn-fa-mix"><i class="wn-fab wn-fa-mix"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="mixcloud" >
							<input type="radio" name="iconfonts_name" data-name="mixcloud" id="wn-fab wn-fa-mixcloud" value="wn-fa-mixcloud">
							<label for="wn-fab wn-fa-mixcloud"><i class="wn-fab wn-fa-mixcloud"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="mizuni" >
							<input type="radio" name="iconfonts_name" data-name="mizuni" id="wn-fab wn-fa-mizuni" value="wn-fa-mizuni">
							<label for="wn-fab wn-fa-mizuni"><i class="wn-fab wn-fa-mizuni"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="modx" >
							<input type="radio" name="iconfonts_name" data-name="modx" id="wn-fab wn-fa-modx" value="wn-fa-modx">
							<label for="wn-fab wn-fa-modx"><i class="wn-fab wn-fa-modx"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="monero" >
							<input type="radio" name="iconfonts_name" data-name="monero" id="wn-fab wn-fa-monero" value="wn-fa-monero">
							<label for="wn-fab wn-fa-monero"><i class="wn-fab wn-fa-monero"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="napster" >
							<input type="radio" name="iconfonts_name" data-name="napster" id="wn-fab wn-fa-napster" value="wn-fa-napster">
							<label for="wn-fab wn-fa-napster"><i class="wn-fab wn-fa-napster"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="nintendo-switch" >
							<input type="radio" name="iconfonts_name" data-name="nintendo-switch" id="wn-fab wn-fa-nintendo-switch" value="wn-fa-nintendo-switch">
							<label for="wn-fab wn-fa-nintendo-switch"><i class="wn-fab wn-fa-nintendo-switch"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="node" >
							<input type="radio" name="iconfonts_name" data-name="node" id="wn-fab wn-fa-node" value="wn-fa-node">
							<label for="wn-fab wn-fa-node"><i class="wn-fab wn-fa-node"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="node-js" >
							<input type="radio" name="iconfonts_name" data-name="node-js" id="wn-fab wn-fa-node-js" value="wn-fa-node-js">
							<label for="wn-fab wn-fa-node-js"><i class="wn-fab wn-fa-node-js"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="npm" >
							<input type="radio" name="iconfonts_name" data-name="npm" id="wn-fab wn-fa-npm" value="wn-fa-npm">
							<label for="wn-fab wn-fa-npm"><i class="wn-fab wn-fa-npm"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="ns8" >
							<input type="radio" name="iconfonts_name" data-name="ns8" id="wn-fab wn-fa-ns8" value="wn-fa-ns8">
							<label for="wn-fab wn-fa-ns8"><i class="wn-fab wn-fa-ns8"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="nutritionix" >
							<input type="radio" name="iconfonts_name" data-name="nutritionix" id="wn-fab wn-fa-nutritionix" value="wn-fa-nutritionix">
							<label for="wn-fab wn-fa-nutritionix"><i class="wn-fab wn-fa-nutritionix"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="odnoklassniki" >
							<input type="radio" name="iconfonts_name" data-name="odnoklassniki" id="wn-fab wn-fa-odnoklassniki" value="wn-fa-odnoklassniki">
							<label for="wn-fab wn-fa-odnoklassniki"><i class="wn-fab wn-fa-odnoklassniki"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="odnoklassniki-square" >
							<input type="radio" name="iconfonts_name" data-name="odnoklassniki-square" id="wn-fab wn-fa-odnoklassniki-square" value="wn-fa-odnoklassniki-square">
							<label for="wn-fab wn-fa-odnoklassniki-square"><i class="wn-fab wn-fa-odnoklassniki-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="old-republic" >
							<input type="radio" name="iconfonts_name" data-name="old-republic" id="wn-fab wn-fa-old-republic" value="wn-fa-old-republic">
							<label for="wn-fab wn-fa-old-republic"><i class="wn-fab wn-fa-old-republic"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="opencart" >
							<input type="radio" name="iconfonts_name" data-name="opencart" id="wn-fab wn-fa-opencart" value="wn-fa-opencart">
							<label for="wn-fab wn-fa-opencart"><i class="wn-fab wn-fa-opencart"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="openid" >
							<input type="radio" name="iconfonts_name" data-name="openid" id="wn-fab wn-fa-openid" value="wn-fa-openid">
							<label for="wn-fab wn-fa-openid"><i class="wn-fab wn-fa-openid"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="opera" >
							<input type="radio" name="iconfonts_name" data-name="opera" id="wn-fab wn-fa-opera" value="wn-fa-opera">
							<label for="wn-fab wn-fa-opera"><i class="wn-fab wn-fa-opera"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="optin-monster" >
							<input type="radio" name="iconfonts_name" data-name="optin-monster" id="wn-fab wn-fa-optin-monster" value="wn-fa-optin-monster">
							<label for="wn-fab wn-fa-optin-monster"><i class="wn-fab wn-fa-optin-monster"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="osi" >
							<input type="radio" name="iconfonts_name" data-name="osi" id="wn-fab wn-fa-osi" value="wn-fa-osi">
							<label for="wn-fab wn-fa-osi"><i class="wn-fab wn-fa-osi"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="page4" >
							<input type="radio" name="iconfonts_name" data-name="page4" id="wn-fab wn-fa-page4" value="wn-fa-page4">
							<label for="wn-fab wn-fa-page4"><i class="wn-fab wn-fa-page4"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="pagelines" >
							<input type="radio" name="iconfonts_name" data-name="pagelines" id="wn-fab wn-fa-pagelines" value="wn-fa-pagelines">
							<label for="wn-fab wn-fa-pagelines"><i class="wn-fab wn-fa-pagelines"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="palfed" >
							<input type="radio" name="iconfonts_name" data-name="palfed" id="wn-fab wn-fa-palfed" value="wn-fa-palfed">
							<label for="wn-fab wn-fa-palfed"><i class="wn-fab wn-fa-palfed"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="patreon" >
							<input type="radio" name="iconfonts_name" data-name="patreon" id="wn-fab wn-fa-patreon" value="wn-fa-patreon">
							<label for="wn-fab wn-fa-patreon"><i class="wn-fab wn-fa-patreon"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="paypal" >
							<input type="radio" name="iconfonts_name" data-name="paypal" id="wn-fab wn-fa-paypal" value="wn-fa-paypal">
							<label for="wn-fab wn-fa-paypal"><i class="wn-fab wn-fa-paypal"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="periscope" >
							<input type="radio" name="iconfonts_name" data-name="periscope" id="wn-fab wn-fa-periscope" value="wn-fa-periscope">
							<label for="wn-fab wn-fa-periscope"><i class="wn-fab wn-fa-periscope"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="phabricator" >
							<input type="radio" name="iconfonts_name" data-name="phabricator" id="wn-fab wn-fa-phabricator" value="wn-fa-phabricator">
							<label for="wn-fab wn-fa-phabricator"><i class="wn-fab wn-fa-phabricator"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="phoenix-framework" >
							<input type="radio" name="iconfonts_name" data-name="phoenix-framework" id="wn-fab wn-fa-phoenix-framework" value="wn-fa-phoenix-framework">
							<label for="wn-fab wn-fa-phoenix-framework"><i class="wn-fab wn-fa-phoenix-framework"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="phoenix-squadron" >
							<input type="radio" name="iconfonts_name" data-name="phoenix-squadron" id="wn-fab wn-fa-phoenix-squadron" value="wn-fa-phoenix-squadron">
							<label for="wn-fab wn-fa-phoenix-squadron"><i class="wn-fab wn-fa-phoenix-squadron"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="php" >
							<input type="radio" name="iconfonts_name" data-name="php" id="wn-fab wn-fa-php" value="wn-fa-php">
							<label for="wn-fab wn-fa-php"><i class="wn-fab wn-fa-php"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="pied-piper" >
							<input type="radio" name="iconfonts_name" data-name="pied-piper" id="wn-fab wn-fa-pied-piper" value="wn-fa-pied-piper">
							<label for="wn-fab wn-fa-pied-piper"><i class="wn-fab wn-fa-pied-piper"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="pied-piper-alt" >
							<input type="radio" name="iconfonts_name" data-name="pied-piper-alt" id="wn-fab wn-fa-pied-piper-alt" value="wn-fa-pied-piper-alt">
							<label for="wn-fab wn-fa-pied-piper-alt"><i class="wn-fab wn-fa-pied-piper-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="pied-piper-hat" >
							<input type="radio" name="iconfonts_name" data-name="pied-piper-hat" id="wn-fab wn-fa-pied-piper-hat" value="wn-fa-pied-piper-hat">
							<label for="wn-fab wn-fa-pied-piper-hat"><i class="wn-fab wn-fa-pied-piper-hat"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="pied-piper-pp" >
							<input type="radio" name="iconfonts_name" data-name="pied-piper-pp" id="wn-fab wn-fa-pied-piper-pp" value="wn-fa-pied-piper-pp">
							<label for="wn-fab wn-fa-pied-piper-pp"><i class="wn-fab wn-fa-pied-piper-pp"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="pinterest" >
							<input type="radio" name="iconfonts_name" data-name="pinterest" id="wn-fab wn-fa-pinterest" value="wn-fa-pinterest">
							<label for="wn-fab wn-fa-pinterest"><i class="wn-fab wn-fa-pinterest"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="pinterest-p" >
							<input type="radio" name="iconfonts_name" data-name="pinterest-p" id="wn-fab wn-fa-pinterest-p" value="wn-fa-pinterest-p">
							<label for="wn-fab wn-fa-pinterest-p"><i class="wn-fab wn-fa-pinterest-p"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="pinterest-square" >
							<input type="radio" name="iconfonts_name" data-name="pinterest-square" id="wn-fab wn-fa-pinterest-square" value="wn-fa-pinterest-square">
							<label for="wn-fab wn-fa-pinterest-square"><i class="wn-fab wn-fa-pinterest-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="playstation" >
							<input type="radio" name="iconfonts_name" data-name="playstation" id="wn-fab wn-fa-playstation" value="wn-fa-playstation">
							<label for="wn-fab wn-fa-playstation"><i class="wn-fab wn-fa-playstation"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="product-hunt" >
							<input type="radio" name="iconfonts_name" data-name="product-hunt" id="wn-fab wn-fa-product-hunt" value="wn-fa-product-hunt">
							<label for="wn-fab wn-fa-product-hunt"><i class="wn-fab wn-fa-product-hunt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="pushed" >
							<input type="radio" name="iconfonts_name" data-name="pushed" id="wn-fab wn-fa-pushed" value="wn-fa-pushed">
							<label for="wn-fab wn-fa-pushed"><i class="wn-fab wn-fa-pushed"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="python" >
							<input type="radio" name="iconfonts_name" data-name="python" id="wn-fab wn-fa-python" value="wn-fa-python">
							<label for="wn-fab wn-fa-python"><i class="wn-fab wn-fa-python"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="qq" >
							<input type="radio" name="iconfonts_name" data-name="qq" id="wn-fab wn-fa-qq" value="wn-fa-qq">
							<label for="wn-fab wn-fa-qq"><i class="wn-fab wn-fa-qq"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="quinscape" >
							<input type="radio" name="iconfonts_name" data-name="quinscape" id="wn-fab wn-fa-quinscape" value="wn-fa-quinscape">
							<label for="wn-fab wn-fa-quinscape"><i class="wn-fab wn-fa-quinscape"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="quora" >
							<input type="radio" name="iconfonts_name" data-name="quora" id="wn-fab wn-fa-quora" value="wn-fa-quora">
							<label for="wn-fab wn-fa-quora"><i class="wn-fab wn-fa-quora"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="r-project" >
							<input type="radio" name="iconfonts_name" data-name="r-project" id="wn-fab wn-fa-r-project" value="wn-fa-r-project">
							<label for="wn-fab wn-fa-r-project"><i class="wn-fab wn-fa-r-project"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="ravelry" >
							<input type="radio" name="iconfonts_name" data-name="ravelry" id="wn-fab wn-fa-ravelry" value="wn-fa-ravelry">
							<label for="wn-fab wn-fa-ravelry"><i class="wn-fab wn-fa-ravelry"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="react" >
							<input type="radio" name="iconfonts_name" data-name="react" id="wn-fab wn-fa-react" value="wn-fa-react">
							<label for="wn-fab wn-fa-react"><i class="wn-fab wn-fa-react"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="readme" >
							<input type="radio" name="iconfonts_name" data-name="readme" id="wn-fab wn-fa-readme" value="wn-fa-readme">
							<label for="wn-fab wn-fa-readme"><i class="wn-fab wn-fa-readme"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="rebel" >
							<input type="radio" name="iconfonts_name" data-name="rebel" id="wn-fab wn-fa-rebel" value="wn-fa-rebel">
							<label for="wn-fab wn-fa-rebel"><i class="wn-fab wn-fa-rebel"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="red-river" >
							<input type="radio" name="iconfonts_name" data-name="red-river" id="wn-fab wn-fa-red-river" value="wn-fa-red-river">
							<label for="wn-fab wn-fa-red-river"><i class="wn-fab wn-fa-red-river"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="reddit" >
							<input type="radio" name="iconfonts_name" data-name="reddit" id="wn-fab wn-fa-reddit" value="wn-fa-reddit">
							<label for="wn-fab wn-fa-reddit"><i class="wn-fab wn-fa-reddit"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="reddit-alien" >
							<input type="radio" name="iconfonts_name" data-name="reddit-alien" id="wn-fab wn-fa-reddit-alien" value="wn-fa-reddit-alien">
							<label for="wn-fab wn-fa-reddit-alien"><i class="wn-fab wn-fa-reddit-alien"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="reddit-square" >
							<input type="radio" name="iconfonts_name" data-name="reddit-square" id="wn-fab wn-fa-reddit-square" value="wn-fa-reddit-square">
							<label for="wn-fab wn-fa-reddit-square"><i class="wn-fab wn-fa-reddit-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="rendact" >
							<input type="radio" name="iconfonts_name" data-name="rendact" id="wn-fab wn-fa-rendact" value="wn-fa-rendact">
							<label for="wn-fab wn-fa-rendact"><i class="wn-fab wn-fa-rendact"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="renren" >
							<input type="radio" name="iconfonts_name" data-name="renren" id="wn-fab wn-fa-renren" value="wn-fa-renren">
							<label for="wn-fab wn-fa-renren"><i class="wn-fab wn-fa-renren"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="replyd" >
							<input type="radio" name="iconfonts_name" data-name="replyd" id="wn-fab wn-fa-replyd" value="wn-fa-replyd">
							<label for="wn-fab wn-fa-replyd"><i class="wn-fab wn-fa-replyd"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="researchgate" >
							<input type="radio" name="iconfonts_name" data-name="researchgate" id="wn-fab wn-fa-researchgate" value="wn-fa-researchgate">
							<label for="wn-fab wn-fa-researchgate"><i class="wn-fab wn-fa-researchgate"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="resolving" >
							<input type="radio" name="iconfonts_name" data-name="resolving" id="wn-fab wn-fa-resolving" value="wn-fa-resolving">
							<label for="wn-fab wn-fa-resolving"><i class="wn-fab wn-fa-resolving"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="rocketchat" >
							<input type="radio" name="iconfonts_name" data-name="rocketchat" id="wn-fab wn-fa-rocketchat" value="wn-fa-rocketchat">
							<label for="wn-fab wn-fa-rocketchat"><i class="wn-fab wn-fa-rocketchat"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="rockrms" >
							<input type="radio" name="iconfonts_name" data-name="rockrms" id="wn-fab wn-fa-rockrms" value="wn-fa-rockrms">
							<label for="wn-fab wn-fa-rockrms"><i class="wn-fab wn-fa-rockrms"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="safari" >
							<input type="radio" name="iconfonts_name" data-name="safari" id="wn-fab wn-fa-safari" value="wn-fa-safari">
							<label for="wn-fab wn-fa-safari"><i class="wn-fab wn-fa-safari"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sass" >
							<input type="radio" name="iconfonts_name" data-name="sass" id="wn-fab wn-fa-sass" value="wn-fa-sass">
							<label for="wn-fab wn-fa-sass"><i class="wn-fab wn-fa-sass"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="schlix" >
							<input type="radio" name="iconfonts_name" data-name="schlix" id="wn-fab wn-fa-schlix" value="wn-fa-schlix">
							<label for="wn-fab wn-fa-schlix"><i class="wn-fab wn-fa-schlix"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="scribd" >
							<input type="radio" name="iconfonts_name" data-name="scribd" id="wn-fab wn-fa-scribd" value="wn-fa-scribd">
							<label for="wn-fab wn-fa-scribd"><i class="wn-fab wn-fa-scribd"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="searchengin" >
							<input type="radio" name="iconfonts_name" data-name="searchengin" id="wn-fab wn-fa-searchengin" value="wn-fa-searchengin">
							<label for="wn-fab wn-fa-searchengin"><i class="wn-fab wn-fa-searchengin"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sellcast" >
							<input type="radio" name="iconfonts_name" data-name="sellcast" id="wn-fab wn-fa-sellcast" value="wn-fa-sellcast">
							<label for="wn-fab wn-fa-sellcast"><i class="wn-fab wn-fa-sellcast"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sellsy" >
							<input type="radio" name="iconfonts_name" data-name="sellsy" id="wn-fab wn-fa-sellsy" value="wn-fa-sellsy">
							<label for="wn-fab wn-fa-sellsy"><i class="wn-fab wn-fa-sellsy"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="servicestack" >
							<input type="radio" name="iconfonts_name" data-name="servicestack" id="wn-fab wn-fa-servicestack" value="wn-fa-servicestack">
							<label for="wn-fab wn-fa-servicestack"><i class="wn-fab wn-fa-servicestack"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="shirtsinbulk" >
							<input type="radio" name="iconfonts_name" data-name="shirtsinbulk" id="wn-fab wn-fa-shirtsinbulk" value="wn-fa-shirtsinbulk">
							<label for="wn-fab wn-fa-shirtsinbulk"><i class="wn-fab wn-fa-shirtsinbulk"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="simplybuilt" >
							<input type="radio" name="iconfonts_name" data-name="simplybuilt" id="wn-fab wn-fa-simplybuilt" value="wn-fa-simplybuilt">
							<label for="wn-fab wn-fa-simplybuilt"><i class="wn-fab wn-fa-simplybuilt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sistrix" >
							<input type="radio" name="iconfonts_name" data-name="sistrix" id="wn-fab wn-fa-sistrix" value="wn-fa-sistrix">
							<label for="wn-fab wn-fa-sistrix"><i class="wn-fab wn-fa-sistrix"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sith" >
							<input type="radio" name="iconfonts_name" data-name="sith" id="wn-fab wn-fa-sith" value="wn-fa-sith">
							<label for="wn-fab wn-fa-sith"><i class="wn-fab wn-fa-sith"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="skyatlas" >
							<input type="radio" name="iconfonts_name" data-name="skyatlas" id="wn-fab wn-fa-skyatlas" value="wn-fa-skyatlas">
							<label for="wn-fab wn-fa-skyatlas"><i class="wn-fab wn-fa-skyatlas"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="skype" >
							<input type="radio" name="iconfonts_name" data-name="skype" id="wn-fab wn-fa-skype" value="wn-fa-skype">
							<label for="wn-fab wn-fa-skype"><i class="wn-fab wn-fa-skype"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="slack" >
							<input type="radio" name="iconfonts_name" data-name="slack" id="wn-fab wn-fa-slack" value="wn-fa-slack">
							<label for="wn-fab wn-fa-slack"><i class="wn-fab wn-fa-slack"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="slack-hash" >
							<input type="radio" name="iconfonts_name" data-name="slack-hash" id="wn-fab wn-fa-slack-hash" value="wn-fa-slack-hash">
							<label for="wn-fab wn-fa-slack-hash"><i class="wn-fab wn-fa-slack-hash"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="slideshare" >
							<input type="radio" name="iconfonts_name" data-name="slideshare" id="wn-fab wn-fa-slideshare" value="wn-fa-slideshare">
							<label for="wn-fab wn-fa-slideshare"><i class="wn-fab wn-fa-slideshare"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="snapchat" >
							<input type="radio" name="iconfonts_name" data-name="snapchat" id="wn-fab wn-fa-snapchat" value="wn-fa-snapchat">
							<label for="wn-fab wn-fa-snapchat"><i class="wn-fab wn-fa-snapchat"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="snapchat-ghost" >
							<input type="radio" name="iconfonts_name" data-name="snapchat-ghost" id="wn-fab wn-fa-snapchat-ghost" value="wn-fa-snapchat-ghost">
							<label for="wn-fab wn-fa-snapchat-ghost"><i class="wn-fab wn-fa-snapchat-ghost"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="snapchat-square" >
							<input type="radio" name="iconfonts_name" data-name="snapchat-square" id="wn-fab wn-fa-snapchat-square" value="wn-fa-snapchat-square">
							<label for="wn-fab wn-fa-snapchat-square"><i class="wn-fab wn-fa-snapchat-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="soundcloud" >
							<input type="radio" name="iconfonts_name" data-name="soundcloud" id="wn-fab wn-fa-soundcloud" value="wn-fa-soundcloud">
							<label for="wn-fab wn-fa-soundcloud"><i class="wn-fab wn-fa-soundcloud"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="speakap" >
							<input type="radio" name="iconfonts_name" data-name="speakap" id="wn-fab wn-fa-speakap" value="wn-fa-speakap">
							<label for="wn-fab wn-fa-speakap"><i class="wn-fab wn-fa-speakap"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="spotify" >
							<input type="radio" name="iconfonts_name" data-name="spotify" id="wn-fab wn-fa-spotify" value="wn-fa-spotify">
							<label for="wn-fab wn-fa-spotify"><i class="wn-fab wn-fa-spotify"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="stack-exchange" >
							<input type="radio" name="iconfonts_name" data-name="stack-exchange" id="wn-fab wn-fa-stack-exchange" value="wn-fa-stack-exchange">
							<label for="wn-fab wn-fa-stack-exchange"><i class="wn-fab wn-fa-stack-exchange"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="stack-overflow" >
							<input type="radio" name="iconfonts_name" data-name="stack-overflow" id="wn-fab wn-fa-stack-overflow" value="wn-fa-stack-overflow">
							<label for="wn-fab wn-fa-stack-overflow"><i class="wn-fab wn-fa-stack-overflow"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="staylinked" >
							<input type="radio" name="iconfonts_name" data-name="staylinked" id="wn-fab wn-fa-staylinked" value="wn-fa-staylinked">
							<label for="wn-fab wn-fa-staylinked"><i class="wn-fab wn-fa-staylinked"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="steam" >
							<input type="radio" name="iconfonts_name" data-name="steam" id="wn-fab wn-fa-steam" value="wn-fa-steam">
							<label for="wn-fab wn-fa-steam"><i class="wn-fab wn-fa-steam"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="steam-square" >
							<input type="radio" name="iconfonts_name" data-name="steam-square" id="wn-fab wn-fa-steam-square" value="wn-fa-steam-square">
							<label for="wn-fab wn-fa-steam-square"><i class="wn-fab wn-fa-steam-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="steam-symbol" >
							<input type="radio" name="iconfonts_name" data-name="steam-symbol" id="wn-fab wn-fa-steam-symbol" value="wn-fa-steam-symbol">
							<label for="wn-fab wn-fa-steam-symbol"><i class="wn-fab wn-fa-steam-symbol"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sticker-mule" >
							<input type="radio" name="iconfonts_name" data-name="sticker-mule" id="wn-fab wn-fa-sticker-mule" value="wn-fa-sticker-mule">
							<label for="wn-fab wn-fa-sticker-mule"><i class="wn-fab wn-fa-sticker-mule"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="strava" >
							<input type="radio" name="iconfonts_name" data-name="strava" id="wn-fab wn-fa-strava" value="wn-fa-strava">
							<label for="wn-fab wn-fa-strava"><i class="wn-fab wn-fa-strava"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="stripe" >
							<input type="radio" name="iconfonts_name" data-name="stripe" id="wn-fab wn-fa-stripe" value="wn-fa-stripe">
							<label for="wn-fab wn-fa-stripe"><i class="wn-fab wn-fa-stripe"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="stripe-s" >
							<input type="radio" name="iconfonts_name" data-name="stripe-s" id="wn-fab wn-fa-stripe-s" value="wn-fa-stripe-s">
							<label for="wn-fab wn-fa-stripe-s"><i class="wn-fab wn-fa-stripe-s"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="studiovinari" >
							<input type="radio" name="iconfonts_name" data-name="studiovinari" id="wn-fab wn-fa-studiovinari" value="wn-fa-studiovinari">
							<label for="wn-fab wn-fa-studiovinari"><i class="wn-fab wn-fa-studiovinari"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="stumbleupon" >
							<input type="radio" name="iconfonts_name" data-name="stumbleupon" id="wn-fab wn-fa-stumbleupon" value="wn-fa-stumbleupon">
							<label for="wn-fab wn-fa-stumbleupon"><i class="wn-fab wn-fa-stumbleupon"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="stumbleupon-circle" >
							<input type="radio" name="iconfonts_name" data-name="stumbleupon-circle" id="wn-fab wn-fa-stumbleupon-circle" value="wn-fa-stumbleupon-circle">
							<label for="wn-fab wn-fa-stumbleupon-circle"><i class="wn-fab wn-fa-stumbleupon-circle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="superpowers" >
							<input type="radio" name="iconfonts_name" data-name="superpowers" id="wn-fab wn-fa-superpowers" value="wn-fa-superpowers">
							<label for="wn-fab wn-fa-superpowers"><i class="wn-fab wn-fa-superpowers"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="supple" >
							<input type="radio" name="iconfonts_name" data-name="supple" id="wn-fab wn-fa-supple" value="wn-fa-supple">
							<label for="wn-fab wn-fa-supple"><i class="wn-fab wn-fa-supple"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="teamspeak" >
							<input type="radio" name="iconfonts_name" data-name="teamspeak" id="wn-fab wn-fa-teamspeak" value="wn-fa-teamspeak">
							<label for="wn-fab wn-fa-teamspeak"><i class="wn-fab wn-fa-teamspeak"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="telegram" >
							<input type="radio" name="iconfonts_name" data-name="telegram" id="wn-fab wn-fa-telegram" value="wn-fa-telegram">
							<label for="wn-fab wn-fa-telegram"><i class="wn-fab wn-fa-telegram"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="telegram-plane" >
							<input type="radio" name="iconfonts_name" data-name="telegram-plane" id="wn-fab wn-fa-telegram-plane" value="wn-fa-telegram-plane">
							<label for="wn-fab wn-fa-telegram-plane"><i class="wn-fab wn-fa-telegram-plane"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="tencent-weibo" >
							<input type="radio" name="iconfonts_name" data-name="tencent-weibo" id="wn-fab wn-fa-tencent-weibo" value="wn-fa-tencent-weibo">
							<label for="wn-fab wn-fa-tencent-weibo"><i class="wn-fab wn-fa-tencent-weibo"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="themeisle" >
							<input type="radio" name="iconfonts_name" data-name="themeisle" id="wn-fab wn-fa-themeisle" value="wn-fa-themeisle">
							<label for="wn-fab wn-fa-themeisle"><i class="wn-fab wn-fa-themeisle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="trade-federation" >
							<input type="radio" name="iconfonts_name" data-name="trade-federation" id="wn-fab wn-fa-trade-federation" value="wn-fa-trade-federation">
							<label for="wn-fab wn-fa-trade-federation"><i class="wn-fab wn-fa-trade-federation"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="trello" >
							<input type="radio" name="iconfonts_name" data-name="trello" id="wn-fab wn-fa-trello" value="wn-fa-trello">
							<label for="wn-fab wn-fa-trello"><i class="wn-fab wn-fa-trello"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="tripadvisor" >
							<input type="radio" name="iconfonts_name" data-name="tripadvisor" id="wn-fab wn-fa-tripadvisor" value="wn-fa-tripadvisor">
							<label for="wn-fab wn-fa-tripadvisor"><i class="wn-fab wn-fa-tripadvisor"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="tumblr" >
							<input type="radio" name="iconfonts_name" data-name="tumblr" id="wn-fab wn-fa-tumblr" value="wn-fa-tumblr">
							<label for="wn-fab wn-fa-tumblr"><i class="wn-fab wn-fa-tumblr"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="tumblr-square" >
							<input type="radio" name="iconfonts_name" data-name="tumblr-square" id="wn-fab wn-fa-tumblr-square" value="wn-fa-tumblr-square">
							<label for="wn-fab wn-fa-tumblr-square"><i class="wn-fab wn-fa-tumblr-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="twitch" >
							<input type="radio" name="iconfonts_name" data-name="twitch" id="wn-fab wn-fa-twitch" value="wn-fa-twitch">
							<label for="wn-fab wn-fa-twitch"><i class="wn-fab wn-fa-twitch"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="twitter" >
							<input type="radio" name="iconfonts_name" data-name="twitter" id="wn-fab wn-fa-twitter" value="wn-fa-twitter">
							<label for="wn-fab wn-fa-twitter"><i class="wn-fab wn-fa-twitter"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="twitter-square" >
							<input type="radio" name="iconfonts_name" data-name="twitter-square" id="wn-fab wn-fa-twitter-square" value="wn-fa-twitter-square">
							<label for="wn-fab wn-fa-twitter-square"><i class="wn-fab wn-fa-twitter-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="typo3" >
							<input type="radio" name="iconfonts_name" data-name="typo3" id="wn-fab wn-fa-typo3" value="wn-fa-typo3">
							<label for="wn-fab wn-fa-typo3"><i class="wn-fab wn-fa-typo3"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="uber" >
							<input type="radio" name="iconfonts_name" data-name="uber" id="wn-fab wn-fa-uber" value="wn-fa-uber">
							<label for="wn-fab wn-fa-uber"><i class="wn-fab wn-fa-uber"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="uikit" >
							<input type="radio" name="iconfonts_name" data-name="uikit" id="wn-fab wn-fa-uikit" value="wn-fa-uikit">
							<label for="wn-fab wn-fa-uikit"><i class="wn-fab wn-fa-uikit"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="uniregistry" >
							<input type="radio" name="iconfonts_name" data-name="uniregistry" id="wn-fab wn-fa-uniregistry" value="wn-fa-uniregistry">
							<label for="wn-fab wn-fa-uniregistry"><i class="wn-fab wn-fa-uniregistry"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="untappd" >
							<input type="radio" name="iconfonts_name" data-name="untappd" id="wn-fab wn-fa-untappd" value="wn-fa-untappd">
							<label for="wn-fab wn-fa-untappd"><i class="wn-fab wn-fa-untappd"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="usb" >
							<input type="radio" name="iconfonts_name" data-name="usb" id="wn-fab wn-fa-usb" value="wn-fa-usb">
							<label for="wn-fab wn-fa-usb"><i class="wn-fab wn-fa-usb"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="ussunnah" >
							<input type="radio" name="iconfonts_name" data-name="ussunnah" id="wn-fab wn-fa-ussunnah" value="wn-fa-ussunnah">
							<label for="wn-fab wn-fa-ussunnah"><i class="wn-fab wn-fa-ussunnah"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="vaadin" >
							<input type="radio" name="iconfonts_name" data-name="vaadin" id="wn-fab wn-fa-vaadin" value="wn-fa-vaadin">
							<label for="wn-fab wn-fa-vaadin"><i class="wn-fab wn-fa-vaadin"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="viacoin" >
							<input type="radio" name="iconfonts_name" data-name="viacoin" id="wn-fab wn-fa-viacoin" value="wn-fa-viacoin">
							<label for="wn-fab wn-fa-viacoin"><i class="wn-fab wn-fa-viacoin"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="viadeo" >
							<input type="radio" name="iconfonts_name" data-name="viadeo" id="wn-fab wn-fa-viadeo" value="wn-fa-viadeo">
							<label for="wn-fab wn-fa-viadeo"><i class="wn-fab wn-fa-viadeo"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="viadeo-square" >
							<input type="radio" name="iconfonts_name" data-name="viadeo-square" id="wn-fab wn-fa-viadeo-square" value="wn-fa-viadeo-square">
							<label for="wn-fab wn-fa-viadeo-square"><i class="wn-fab wn-fa-viadeo-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="viber" >
							<input type="radio" name="iconfonts_name" data-name="viber" id="wn-fab wn-fa-viber" value="wn-fa-viber">
							<label for="wn-fab wn-fa-viber"><i class="wn-fab wn-fa-viber"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="vimeo" >
							<input type="radio" name="iconfonts_name" data-name="vimeo" id="wn-fab wn-fa-vimeo" value="wn-fa-vimeo">
							<label for="wn-fab wn-fa-vimeo"><i class="wn-fab wn-fa-vimeo"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="vimeo-square" >
							<input type="radio" name="iconfonts_name" data-name="vimeo-square" id="wn-fab wn-fa-vimeo-square" value="wn-fa-vimeo-square">
							<label for="wn-fab wn-fa-vimeo-square"><i class="wn-fab wn-fa-vimeo-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="vimeo-v" >
							<input type="radio" name="iconfonts_name" data-name="vimeo-v" id="wn-fab wn-fa-vimeo-v" value="wn-fa-vimeo-v">
							<label for="wn-fab wn-fa-vimeo-v"><i class="wn-fab wn-fa-vimeo-v"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="vine" >
							<input type="radio" name="iconfonts_name" data-name="vine" id="wn-fab wn-fa-vine" value="wn-fa-vine">
							<label for="wn-fab wn-fa-vine"><i class="wn-fab wn-fa-vine"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="vk" >
							<input type="radio" name="iconfonts_name" data-name="vk" id="wn-fab wn-fa-vk" value="wn-fa-vk">
							<label for="wn-fab wn-fa-vk"><i class="wn-fab wn-fa-vk"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="vnv" >
							<input type="radio" name="iconfonts_name" data-name="vnv" id="wn-fab wn-fa-vnv" value="wn-fa-vnv">
							<label for="wn-fab wn-fa-vnv"><i class="wn-fab wn-fa-vnv"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="vuejs" >
							<input type="radio" name="iconfonts_name" data-name="vuejs" id="wn-fab wn-fa-vuejs" value="wn-fa-vuejs">
							<label for="wn-fab wn-fa-vuejs"><i class="wn-fab wn-fa-vuejs"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="weibo" >
							<input type="radio" name="iconfonts_name" data-name="weibo" id="wn-fab wn-fa-weibo" value="wn-fa-weibo">
							<label for="wn-fab wn-fa-weibo"><i class="wn-fab wn-fa-weibo"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="weixin" >
							<input type="radio" name="iconfonts_name" data-name="weixin" id="wn-fab wn-fa-weixin" value="wn-fa-weixin">
							<label for="wn-fab wn-fa-weixin"><i class="wn-fab wn-fa-weixin"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="whatsapp" >
							<input type="radio" name="iconfonts_name" data-name="whatsapp" id="wn-fab wn-fa-whatsapp" value="wn-fa-whatsapp">
							<label for="wn-fab wn-fa-whatsapp"><i class="wn-fab wn-fa-whatsapp"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="whatsapp-square" >
							<input type="radio" name="iconfonts_name" data-name="whatsapp-square" id="wn-fab wn-fa-whatsapp-square" value="wn-fa-whatsapp-square">
							<label for="wn-fab wn-fa-whatsapp-square"><i class="wn-fab wn-fa-whatsapp-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="whmcs" >
							<input type="radio" name="iconfonts_name" data-name="whmcs" id="wn-fab wn-fa-whmcs" value="wn-fa-whmcs">
							<label for="wn-fab wn-fa-whmcs"><i class="wn-fab wn-fa-whmcs"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="wikipedia-w" >
							<input type="radio" name="iconfonts_name" data-name="wikipedia-w" id="wn-fab wn-fa-wikipedia-w" value="wn-fa-wikipedia-w">
							<label for="wn-fab wn-fa-wikipedia-w"><i class="wn-fab wn-fa-wikipedia-w"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="windows" >
							<input type="radio" name="iconfonts_name" data-name="windows" id="wn-fab wn-fa-windows" value="wn-fa-windows">
							<label for="wn-fab wn-fa-windows"><i class="wn-fab wn-fa-windows"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="wolf-pack-battalion" >
							<input type="radio" name="iconfonts_name" data-name="wolf-pack-battalion" id="wn-fab wn-fa-wolf-pack-battalion" value="wn-fa-wolf-pack-battalion">
							<label for="wn-fab wn-fa-wolf-pack-battalion"><i class="wn-fab wn-fa-wolf-pack-battalion"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="wordpress" >
							<input type="radio" name="iconfonts_name" data-name="wordpress" id="wn-fab wn-fa-wordpress" value="wn-fa-wordpress">
							<label for="wn-fab wn-fa-wordpress"><i class="wn-fab wn-fa-wordpress"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="wordpress-simple" >
							<input type="radio" name="iconfonts_name" data-name="wordpress-simple" id="wn-fab wn-fa-wordpress-simple" value="wn-fa-wordpress-simple">
							<label for="wn-fab wn-fa-wordpress-simple"><i class="wn-fab wn-fa-wordpress-simple"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="wpbeginner" >
							<input type="radio" name="iconfonts_name" data-name="wpbeginner" id="wn-fab wn-fa-wpbeginner" value="wn-fa-wpbeginner">
							<label for="wn-fab wn-fa-wpbeginner"><i class="wn-fab wn-fa-wpbeginner"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="wpexplorer" >
							<input type="radio" name="iconfonts_name" data-name="wpexplorer" id="wn-fab wn-fa-wpexplorer" value="wn-fa-wpexplorer">
							<label for="wn-fab wn-fa-wpexplorer"><i class="wn-fab wn-fa-wpexplorer"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="wpforms" >
							<input type="radio" name="iconfonts_name" data-name="wpforms" id="wn-fab wn-fa-wpforms" value="wn-fa-wpforms">
							<label for="wn-fab wn-fa-wpforms"><i class="wn-fab wn-fa-wpforms"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="xbox" >
							<input type="radio" name="iconfonts_name" data-name="xbox" id="wn-fab wn-fa-xbox" value="wn-fa-xbox">
							<label for="wn-fab wn-fa-xbox"><i class="wn-fab wn-fa-xbox"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="xing" >
							<input type="radio" name="iconfonts_name" data-name="xing" id="wn-fab wn-fa-xing" value="wn-fa-xing">
							<label for="wn-fab wn-fa-xing"><i class="wn-fab wn-fa-xing"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="xing-square" >
							<input type="radio" name="iconfonts_name" data-name="xing-square" id="wn-fab wn-fa-xing-square" value="wn-fa-xing-square">
							<label for="wn-fab wn-fa-xing-square"><i class="wn-fab wn-fa-xing-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="y-combinator" >
							<input type="radio" name="iconfonts_name" data-name="y-combinator" id="wn-fab wn-fa-y-combinator" value="wn-fa-y-combinator">
							<label for="wn-fab wn-fa-y-combinator"><i class="wn-fab wn-fa-y-combinator"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="yahoo" >
							<input type="radio" name="iconfonts_name" data-name="yahoo" id="wn-fab wn-fa-yahoo" value="wn-fa-yahoo">
							<label for="wn-fab wn-fa-yahoo"><i class="wn-fab wn-fa-yahoo"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="yandex" >
							<input type="radio" name="iconfonts_name" data-name="yandex" id="wn-fab wn-fa-yandex" value="wn-fa-yandex">
							<label for="wn-fab wn-fa-yandex"><i class="wn-fab wn-fa-yandex"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="yandex-international" >
							<input type="radio" name="iconfonts_name" data-name="yandex-international" id="wn-fab wn-fa-yandex-international" value="wn-fa-yandex-international">
							<label for="wn-fab wn-fa-yandex-international"><i class="wn-fab wn-fa-yandex-international"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="yelp" >
							<input type="radio" name="iconfonts_name" data-name="yelp" id="wn-fab wn-fa-yelp" value="wn-fa-yelp">
							<label for="wn-fab wn-fa-yelp"><i class="wn-fab wn-fa-yelp"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="yoast" >
							<input type="radio" name="iconfonts_name" data-name="yoast" id="wn-fab wn-fa-yoast" value="wn-fa-yoast">
							<label for="wn-fab wn-fa-yoast"><i class="wn-fab wn-fa-yoast"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="youtube" >
							<input type="radio" name="iconfonts_name" data-name="youtube" id="wn-fab wn-fa-youtube" value="wn-fa-youtube">
							<label for="wn-fab wn-fa-youtube"><i class="wn-fab wn-fa-youtube"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="youtube-square" >
							<input type="radio" name="iconfonts_name" data-name="youtube-square" id="wn-fab wn-fa-youtube-square" value="wn-fa-youtube-square">
							<label for="wn-fab wn-fa-youtube-square"><i class="wn-fab wn-fa-youtube-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="address-book" >
							<input type="radio" name="iconfonts_name" data-name="address-book" id="wn-fas wn-fa-address-book" value="wn-fa-address-book">
							<label for="wn-fas wn-fa-address-book"><i class="wn-fas wn-fa-address-book"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="address-card" >
							<input type="radio" name="iconfonts_name" data-name="address-card" id="wn-fas wn-fa-address-card" value="wn-fa-address-card">
							<label for="wn-fas wn-fa-address-card"><i class="wn-fas wn-fa-address-card"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="adjust" >
							<input type="radio" name="iconfonts_name" data-name="adjust" id="wn-fas wn-fa-adjust" value="wn-fa-adjust">
							<label for="wn-fas wn-fa-adjust"><i class="wn-fas wn-fa-adjust"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="align-center" >
							<input type="radio" name="iconfonts_name" data-name="align-center" id="wn-fas wn-fa-align-center" value="wn-fa-align-center">
							<label for="wn-fas wn-fa-align-center"><i class="wn-fas wn-fa-align-center"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="align-justify" >
							<input type="radio" name="iconfonts_name" data-name="align-justify" id="wn-fas wn-fa-align-justify" value="wn-fa-align-justify">
							<label for="wn-fas wn-fa-align-justify"><i class="wn-fas wn-fa-align-justify"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="align-left" >
							<input type="radio" name="iconfonts_name" data-name="align-left" id="wn-fas wn-fa-align-left" value="wn-fa-align-left">
							<label for="wn-fas wn-fa-align-left"><i class="wn-fas wn-fa-align-left"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="align-right" >
							<input type="radio" name="iconfonts_name" data-name="align-right" id="wn-fas wn-fa-align-right" value="wn-fa-align-right">
							<label for="wn-fas wn-fa-align-right"><i class="wn-fas wn-fa-align-right"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="allergies" >
							<input type="radio" name="iconfonts_name" data-name="allergies" id="wn-fas wn-fa-allergies" value="wn-fa-allergies">
							<label for="wn-fas wn-fa-allergies"><i class="wn-fas wn-fa-allergies"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="ambulance" >
							<input type="radio" name="iconfonts_name" data-name="ambulance" id="wn-fas wn-fa-ambulance" value="wn-fa-ambulance">
							<label for="wn-fas wn-fa-ambulance"><i class="wn-fas wn-fa-ambulance"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="american-sign-language-interpreting" >
							<input type="radio" name="iconfonts_name" data-name="american-sign-language-interpreting" id="wn-fas wn-fa-american-sign-language-interpreting" value="wn-fa-american-sign-language-interpreting">
							<label for="wn-fas wn-fa-american-sign-language-interpreting"><i class="wn-fas wn-fa-american-sign-language-interpreting"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="anchor" >
							<input type="radio" name="iconfonts_name" data-name="anchor" id="wn-fas wn-fa-anchor" value="wn-fa-anchor">
							<label for="wn-fas wn-fa-anchor"><i class="wn-fas wn-fa-anchor"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="angle-double-down" >
							<input type="radio" name="iconfonts_name" data-name="angle-double-down" id="wn-fas wn-fa-angle-double-down" value="wn-fa-angle-double-down">
							<label for="wn-fas wn-fa-angle-double-down"><i class="wn-fas wn-fa-angle-double-down"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="angle-double-left" >
							<input type="radio" name="iconfonts_name" data-name="angle-double-left" id="wn-fas wn-fa-angle-double-left" value="wn-fa-angle-double-left">
							<label for="wn-fas wn-fa-angle-double-left"><i class="wn-fas wn-fa-angle-double-left"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="angle-double-right" >
							<input type="radio" name="iconfonts_name" data-name="angle-double-right" id="wn-fas wn-fa-angle-double-right" value="wn-fa-angle-double-right">
							<label for="wn-fas wn-fa-angle-double-right"><i class="wn-fas wn-fa-angle-double-right"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="angle-double-up" >
							<input type="radio" name="iconfonts_name" data-name="angle-double-up" id="wn-fas wn-fa-angle-double-up" value="wn-fa-angle-double-up">
							<label for="wn-fas wn-fa-angle-double-up"><i class="wn-fas wn-fa-angle-double-up"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="angle-down" >
							<input type="radio" name="iconfonts_name" data-name="angle-down" id="wn-fas wn-fa-angle-down" value="wn-fa-angle-down">
							<label for="wn-fas wn-fa-angle-down"><i class="wn-fas wn-fa-angle-down"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="angle-left" >
							<input type="radio" name="iconfonts_name" data-name="angle-left" id="wn-fas wn-fa-angle-left" value="wn-fa-angle-left">
							<label for="wn-fas wn-fa-angle-left"><i class="wn-fas wn-fa-angle-left"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="angle-right" >
							<input type="radio" name="iconfonts_name" data-name="angle-right" id="wn-fas wn-fa-angle-right" value="wn-fa-angle-right">
							<label for="wn-fas wn-fa-angle-right"><i class="wn-fas wn-fa-angle-right"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="angle-up" >
							<input type="radio" name="iconfonts_name" data-name="angle-up" id="wn-fas wn-fa-angle-up" value="wn-fa-angle-up">
							<label for="wn-fas wn-fa-angle-up"><i class="wn-fas wn-fa-angle-up"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="archive" >
							<input type="radio" name="iconfonts_name" data-name="archive" id="wn-fas wn-fa-archive" value="wn-fa-archive">
							<label for="wn-fas wn-fa-archive"><i class="wn-fas wn-fa-archive"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="arrow-alt-circle-down" >
							<input type="radio" name="iconfonts_name" data-name="arrow-alt-circle-down" id="wn-fas wn-fa-arrow-alt-circle-down" value="wn-fa-arrow-alt-circle-down">
							<label for="wn-fas wn-fa-arrow-alt-circle-down"><i class="wn-fas wn-fa-arrow-alt-circle-down"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="arrow-alt-circle-left" >
							<input type="radio" name="iconfonts_name" data-name="arrow-alt-circle-left" id="wn-fas wn-fa-arrow-alt-circle-left" value="wn-fa-arrow-alt-circle-left">
							<label for="wn-fas wn-fa-arrow-alt-circle-left"><i class="wn-fas wn-fa-arrow-alt-circle-left"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="arrow-alt-circle-right" >
							<input type="radio" name="iconfonts_name" data-name="arrow-alt-circle-right" id="wn-fas wn-fa-arrow-alt-circle-right" value="wn-fa-arrow-alt-circle-right">
							<label for="wn-fas wn-fa-arrow-alt-circle-right"><i class="wn-fas wn-fa-arrow-alt-circle-right"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="arrow-alt-circle-up" >
							<input type="radio" name="iconfonts_name" data-name="arrow-alt-circle-up" id="wn-fas wn-fa-arrow-alt-circle-up" value="wn-fa-arrow-alt-circle-up">
							<label for="wn-fas wn-fa-arrow-alt-circle-up"><i class="wn-fas wn-fa-arrow-alt-circle-up"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="arrow-circle-down" >
							<input type="radio" name="iconfonts_name" data-name="arrow-circle-down" id="wn-fas wn-fa-arrow-circle-down" value="wn-fa-arrow-circle-down">
							<label for="wn-fas wn-fa-arrow-circle-down"><i class="wn-fas wn-fa-arrow-circle-down"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="arrow-circle-left" >
							<input type="radio" name="iconfonts_name" data-name="arrow-circle-left" id="wn-fas wn-fa-arrow-circle-left" value="wn-fa-arrow-circle-left">
							<label for="wn-fas wn-fa-arrow-circle-left"><i class="wn-fas wn-fa-arrow-circle-left"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="arrow-circle-right" >
							<input type="radio" name="iconfonts_name" data-name="arrow-circle-right" id="wn-fas wn-fa-arrow-circle-right" value="wn-fa-arrow-circle-right">
							<label for="wn-fas wn-fa-arrow-circle-right"><i class="wn-fas wn-fa-arrow-circle-right"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="arrow-circle-up" >
							<input type="radio" name="iconfonts_name" data-name="arrow-circle-up" id="wn-fas wn-fa-arrow-circle-up" value="wn-fa-arrow-circle-up">
							<label for="wn-fas wn-fa-arrow-circle-up"><i class="wn-fas wn-fa-arrow-circle-up"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="arrow-down" >
							<input type="radio" name="iconfonts_name" data-name="arrow-down" id="wn-fas wn-fa-arrow-down" value="wn-fa-arrow-down">
							<label for="wn-fas wn-fa-arrow-down"><i class="wn-fas wn-fa-arrow-down"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="arrow-left" >
							<input type="radio" name="iconfonts_name" data-name="arrow-left" id="wn-fas wn-fa-arrow-left" value="wn-fa-arrow-left">
							<label for="wn-fas wn-fa-arrow-left"><i class="wn-fas wn-fa-arrow-left"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="arrow-right" >
							<input type="radio" name="iconfonts_name" data-name="arrow-right" id="wn-fas wn-fa-arrow-right" value="wn-fa-arrow-right">
							<label for="wn-fas wn-fa-arrow-right"><i class="wn-fas wn-fa-arrow-right"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="arrow-up" >
							<input type="radio" name="iconfonts_name" data-name="arrow-up" id="wn-fas wn-fa-arrow-up" value="wn-fa-arrow-up">
							<label for="wn-fas wn-fa-arrow-up"><i class="wn-fas wn-fa-arrow-up"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="arrows-alt" >
							<input type="radio" name="iconfonts_name" data-name="arrows-alt" id="wn-fas wn-fa-arrows-alt" value="wn-fa-arrows-alt">
							<label for="wn-fas wn-fa-arrows-alt"><i class="wn-fas wn-fa-arrows-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="arrows-alt-h" >
							<input type="radio" name="iconfonts_name" data-name="arrows-alt-h" id="wn-fas wn-fa-arrows-alt-h" value="wn-fa-arrows-alt-h">
							<label for="wn-fas wn-fa-arrows-alt-h"><i class="wn-fas wn-fa-arrows-alt-h"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="arrows-alt-v" >
							<input type="radio" name="iconfonts_name" data-name="arrows-alt-v" id="wn-fas wn-fa-arrows-alt-v" value="wn-fa-arrows-alt-v">
							<label for="wn-fas wn-fa-arrows-alt-v"><i class="wn-fas wn-fa-arrows-alt-v"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="assistive-listening-systems" >
							<input type="radio" name="iconfonts_name" data-name="assistive-listening-systems" id="wn-fas wn-fa-assistive-listening-systems" value="wn-fa-assistive-listening-systems">
							<label for="wn-fas wn-fa-assistive-listening-systems"><i class="wn-fas wn-fa-assistive-listening-systems"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="asterisk" >
							<input type="radio" name="iconfonts_name" data-name="asterisk" id="wn-fas wn-fa-asterisk" value="wn-fa-asterisk">
							<label for="wn-fas wn-fa-asterisk"><i class="wn-fas wn-fa-asterisk"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="at" >
							<input type="radio" name="iconfonts_name" data-name="at" id="wn-fas wn-fa-at" value="wn-fa-at">
							<label for="wn-fas wn-fa-at"><i class="wn-fas wn-fa-at"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="audio-description" >
							<input type="radio" name="iconfonts_name" data-name="audio-description" id="wn-fas wn-fa-audio-description" value="wn-fa-audio-description">
							<label for="wn-fas wn-fa-audio-description"><i class="wn-fas wn-fa-audio-description"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="backward" >
							<input type="radio" name="iconfonts_name" data-name="backward" id="wn-fas wn-fa-backward" value="wn-fa-backward">
							<label for="wn-fas wn-fa-backward"><i class="wn-fas wn-fa-backward"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="balance-scale" >
							<input type="radio" name="iconfonts_name" data-name="balance-scale" id="wn-fas wn-fa-balance-scale" value="wn-fa-balance-scale">
							<label for="wn-fas wn-fa-balance-scale"><i class="wn-fas wn-fa-balance-scale"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="ban" >
							<input type="radio" name="iconfonts_name" data-name="ban" id="wn-fas wn-fa-ban" value="wn-fa-ban">
							<label for="wn-fas wn-fa-ban"><i class="wn-fas wn-fa-ban"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="band-aid" >
							<input type="radio" name="iconfonts_name" data-name="band-aid" id="wn-fas wn-fa-band-aid" value="wn-fa-band-aid">
							<label for="wn-fas wn-fa-band-aid"><i class="wn-fas wn-fa-band-aid"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="barcode" >
							<input type="radio" name="iconfonts_name" data-name="barcode" id="wn-fas wn-fa-barcode" value="wn-fa-barcode">
							<label for="wn-fas wn-fa-barcode"><i class="wn-fas wn-fa-barcode"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="bars" >
							<input type="radio" name="iconfonts_name" data-name="bars" id="wn-fas wn-fa-bars" value="wn-fa-bars">
							<label for="wn-fas wn-fa-bars"><i class="wn-fas wn-fa-bars"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="baseball-ball" >
							<input type="radio" name="iconfonts_name" data-name="baseball-ball" id="wn-fas wn-fa-baseball-ball" value="wn-fa-baseball-ball">
							<label for="wn-fas wn-fa-baseball-ball"><i class="wn-fas wn-fa-baseball-ball"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="basketball-ball" >
							<input type="radio" name="iconfonts_name" data-name="basketball-ball" id="wn-fas wn-fa-basketball-ball" value="wn-fa-basketball-ball">
							<label for="wn-fas wn-fa-basketball-ball"><i class="wn-fas wn-fa-basketball-ball"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="bath" >
							<input type="radio" name="iconfonts_name" data-name="bath" id="wn-fas wn-fa-bath" value="wn-fa-bath">
							<label for="wn-fas wn-fa-bath"><i class="wn-fas wn-fa-bath"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="battery-empty" >
							<input type="radio" name="iconfonts_name" data-name="battery-empty" id="wn-fas wn-fa-battery-empty" value="wn-fa-battery-empty">
							<label for="wn-fas wn-fa-battery-empty"><i class="wn-fas wn-fa-battery-empty"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="battery-full" >
							<input type="radio" name="iconfonts_name" data-name="battery-full" id="wn-fas wn-fa-battery-full" value="wn-fa-battery-full">
							<label for="wn-fas wn-fa-battery-full"><i class="wn-fas wn-fa-battery-full"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="battery-half" >
							<input type="radio" name="iconfonts_name" data-name="battery-half" id="wn-fas wn-fa-battery-half" value="wn-fa-battery-half">
							<label for="wn-fas wn-fa-battery-half"><i class="wn-fas wn-fa-battery-half"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="battery-quarter" >
							<input type="radio" name="iconfonts_name" data-name="battery-quarter" id="wn-fas wn-fa-battery-quarter" value="wn-fa-battery-quarter">
							<label for="wn-fas wn-fa-battery-quarter"><i class="wn-fas wn-fa-battery-quarter"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="battery-three-quarters" >
							<input type="radio" name="iconfonts_name" data-name="battery-three-quarters" id="wn-fas wn-fa-battery-three-quarters" value="wn-fa-battery-three-quarters">
							<label for="wn-fas wn-fa-battery-three-quarters"><i class="wn-fas wn-fa-battery-three-quarters"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="bed" >
							<input type="radio" name="iconfonts_name" data-name="bed" id="wn-fas wn-fa-bed" value="wn-fa-bed">
							<label for="wn-fas wn-fa-bed"><i class="wn-fas wn-fa-bed"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="beer" >
							<input type="radio" name="iconfonts_name" data-name="beer" id="wn-fas wn-fa-beer" value="wn-fa-beer">
							<label for="wn-fas wn-fa-beer"><i class="wn-fas wn-fa-beer"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="bell" >
							<input type="radio" name="iconfonts_name" data-name="bell" id="wn-fas wn-fa-bell" value="wn-fa-bell">
							<label for="wn-fas wn-fa-bell"><i class="wn-fas wn-fa-bell"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="bell-slash" >
							<input type="radio" name="iconfonts_name" data-name="bell-slash" id="wn-fas wn-fa-bell-slash" value="wn-fa-bell-slash">
							<label for="wn-fas wn-fa-bell-slash"><i class="wn-fas wn-fa-bell-slash"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="bicycle" >
							<input type="radio" name="iconfonts_name" data-name="bicycle" id="wn-fas wn-fa-bicycle" value="wn-fa-bicycle">
							<label for="wn-fas wn-fa-bicycle"><i class="wn-fas wn-fa-bicycle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="binoculars" >
							<input type="radio" name="iconfonts_name" data-name="binoculars" id="wn-fas wn-fa-binoculars" value="wn-fa-binoculars">
							<label for="wn-fas wn-fa-binoculars"><i class="wn-fas wn-fa-binoculars"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="birthday-cake" >
							<input type="radio" name="iconfonts_name" data-name="birthday-cake" id="wn-fas wn-fa-birthday-cake" value="wn-fa-birthday-cake">
							<label for="wn-fas wn-fa-birthday-cake"><i class="wn-fas wn-fa-birthday-cake"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="blender" >
							<input type="radio" name="iconfonts_name" data-name="blender" id="wn-fas wn-fa-blender" value="wn-fa-blender">
							<label for="wn-fas wn-fa-blender"><i class="wn-fas wn-fa-blender"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="blind" >
							<input type="radio" name="iconfonts_name" data-name="blind" id="wn-fas wn-fa-blind" value="wn-fa-blind">
							<label for="wn-fas wn-fa-blind"><i class="wn-fas wn-fa-blind"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="bold" >
							<input type="radio" name="iconfonts_name" data-name="bold" id="wn-fas wn-fa-bold" value="wn-fa-bold">
							<label for="wn-fas wn-fa-bold"><i class="wn-fas wn-fa-bold"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="bolt" >
							<input type="radio" name="iconfonts_name" data-name="bolt" id="wn-fas wn-fa-bolt" value="wn-fa-bolt">
							<label for="wn-fas wn-fa-bolt"><i class="wn-fas wn-fa-bolt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="bomb" >
							<input type="radio" name="iconfonts_name" data-name="bomb" id="wn-fas wn-fa-bomb" value="wn-fa-bomb">
							<label for="wn-fas wn-fa-bomb"><i class="wn-fas wn-fa-bomb"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="book" >
							<input type="radio" name="iconfonts_name" data-name="book" id="wn-fas wn-fa-book" value="wn-fa-book">
							<label for="wn-fas wn-fa-book"><i class="wn-fas wn-fa-book"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="book-open" >
							<input type="radio" name="iconfonts_name" data-name="book-open" id="wn-fas wn-fa-book-open" value="wn-fa-book-open">
							<label for="wn-fas wn-fa-book-open"><i class="wn-fas wn-fa-book-open"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="bookmark" >
							<input type="radio" name="iconfonts_name" data-name="bookmark" id="wn-fas wn-fa-bookmark" value="wn-fa-bookmark">
							<label for="wn-fas wn-fa-bookmark"><i class="wn-fas wn-fa-bookmark"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="bowling-ball" >
							<input type="radio" name="iconfonts_name" data-name="bowling-ball" id="wn-fas wn-fa-bowling-ball" value="wn-fa-bowling-ball">
							<label for="wn-fas wn-fa-bowling-ball"><i class="wn-fas wn-fa-bowling-ball"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="box" >
							<input type="radio" name="iconfonts_name" data-name="box" id="wn-fas wn-fa-box" value="wn-fa-box">
							<label for="wn-fas wn-fa-box"><i class="wn-fas wn-fa-box"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="box-open" >
							<input type="radio" name="iconfonts_name" data-name="box-open" id="wn-fas wn-fa-box-open" value="wn-fa-box-open">
							<label for="wn-fas wn-fa-box-open"><i class="wn-fas wn-fa-box-open"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="boxes" >
							<input type="radio" name="iconfonts_name" data-name="boxes" id="wn-fas wn-fa-boxes" value="wn-fa-boxes">
							<label for="wn-fas wn-fa-boxes"><i class="wn-fas wn-fa-boxes"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="braille" >
							<input type="radio" name="iconfonts_name" data-name="braille" id="wn-fas wn-fa-braille" value="wn-fa-braille">
							<label for="wn-fas wn-fa-braille"><i class="wn-fas wn-fa-braille"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="briefcase" >
							<input type="radio" name="iconfonts_name" data-name="briefcase" id="wn-fas wn-fa-briefcase" value="wn-fa-briefcase">
							<label for="wn-fas wn-fa-briefcase"><i class="wn-fas wn-fa-briefcase"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="briefcase-medical" >
							<input type="radio" name="iconfonts_name" data-name="briefcase-medical" id="wn-fas wn-fa-briefcase-medical" value="wn-fa-briefcase-medical">
							<label for="wn-fas wn-fa-briefcase-medical"><i class="wn-fas wn-fa-briefcase-medical"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="broadcast-tower" >
							<input type="radio" name="iconfonts_name" data-name="broadcast-tower" id="wn-fas wn-fa-broadcast-tower" value="wn-fa-broadcast-tower">
							<label for="wn-fas wn-fa-broadcast-tower"><i class="wn-fas wn-fa-broadcast-tower"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="broom" >
							<input type="radio" name="iconfonts_name" data-name="broom" id="wn-fas wn-fa-broom" value="wn-fa-broom">
							<label for="wn-fas wn-fa-broom"><i class="wn-fas wn-fa-broom"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="bug" >
							<input type="radio" name="iconfonts_name" data-name="bug" id="wn-fas wn-fa-bug" value="wn-fa-bug">
							<label for="wn-fas wn-fa-bug"><i class="wn-fas wn-fa-bug"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="building" >
							<input type="radio" name="iconfonts_name" data-name="building" id="wn-fas wn-fa-building" value="wn-fa-building">
							<label for="wn-fas wn-fa-building"><i class="wn-fas wn-fa-building"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="bullhorn" >
							<input type="radio" name="iconfonts_name" data-name="bullhorn" id="wn-fas wn-fa-bullhorn" value="wn-fa-bullhorn">
							<label for="wn-fas wn-fa-bullhorn"><i class="wn-fas wn-fa-bullhorn"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="bullseye" >
							<input type="radio" name="iconfonts_name" data-name="bullseye" id="wn-fas wn-fa-bullseye" value="wn-fa-bullseye">
							<label for="wn-fas wn-fa-bullseye"><i class="wn-fas wn-fa-bullseye"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="burn" >
							<input type="radio" name="iconfonts_name" data-name="burn" id="wn-fas wn-fa-burn" value="wn-fa-burn">
							<label for="wn-fas wn-fa-burn"><i class="wn-fas wn-fa-burn"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="bus" >
							<input type="radio" name="iconfonts_name" data-name="bus" id="wn-fas wn-fa-bus" value="wn-fa-bus">
							<label for="wn-fas wn-fa-bus"><i class="wn-fas wn-fa-bus"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="calculator" >
							<input type="radio" name="iconfonts_name" data-name="calculator" id="wn-fas wn-fa-calculator" value="wn-fa-calculator">
							<label for="wn-fas wn-fa-calculator"><i class="wn-fas wn-fa-calculator"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="calendar" >
							<input type="radio" name="iconfonts_name" data-name="calendar" id="wn-fas wn-fa-calendar" value="wn-fa-calendar">
							<label for="wn-fas wn-fa-calendar"><i class="wn-fas wn-fa-calendar"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="calendar-alt" >
							<input type="radio" name="iconfonts_name" data-name="calendar-alt" id="wn-fas wn-fa-calendar-alt" value="wn-fa-calendar-alt">
							<label for="wn-fas wn-fa-calendar-alt"><i class="wn-fas wn-fa-calendar-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="calendar-check" >
							<input type="radio" name="iconfonts_name" data-name="calendar-check" id="wn-fas wn-fa-calendar-check" value="wn-fa-calendar-check">
							<label for="wn-fas wn-fa-calendar-check"><i class="wn-fas wn-fa-calendar-check"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="calendar-minus" >
							<input type="radio" name="iconfonts_name" data-name="calendar-minus" id="wn-fas wn-fa-calendar-minus" value="wn-fa-calendar-minus">
							<label for="wn-fas wn-fa-calendar-minus"><i class="wn-fas wn-fa-calendar-minus"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="calendar-plus" >
							<input type="radio" name="iconfonts_name" data-name="calendar-plus" id="wn-fas wn-fa-calendar-plus" value="wn-fa-calendar-plus">
							<label for="wn-fas wn-fa-calendar-plus"><i class="wn-fas wn-fa-calendar-plus"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="calendar-times" >
							<input type="radio" name="iconfonts_name" data-name="calendar-times" id="wn-fas wn-fa-calendar-times" value="wn-fa-calendar-times">
							<label for="wn-fas wn-fa-calendar-times"><i class="wn-fas wn-fa-calendar-times"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="camera" >
							<input type="radio" name="iconfonts_name" data-name="camera" id="wn-fas wn-fa-camera" value="wn-fa-camera">
							<label for="wn-fas wn-fa-camera"><i class="wn-fas wn-fa-camera"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="camera-retro" >
							<input type="radio" name="iconfonts_name" data-name="camera-retro" id="wn-fas wn-fa-camera-retro" value="wn-fa-camera-retro">
							<label for="wn-fas wn-fa-camera-retro"><i class="wn-fas wn-fa-camera-retro"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="capsules" >
							<input type="radio" name="iconfonts_name" data-name="capsules" id="wn-fas wn-fa-capsules" value="wn-fa-capsules">
							<label for="wn-fas wn-fa-capsules"><i class="wn-fas wn-fa-capsules"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="car" >
							<input type="radio" name="iconfonts_name" data-name="car" id="wn-fas wn-fa-car" value="wn-fa-car">
							<label for="wn-fas wn-fa-car"><i class="wn-fas wn-fa-car"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="caret-down" >
							<input type="radio" name="iconfonts_name" data-name="caret-down" id="wn-fas wn-fa-caret-down" value="wn-fa-caret-down">
							<label for="wn-fas wn-fa-caret-down"><i class="wn-fas wn-fa-caret-down"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="caret-left" >
							<input type="radio" name="iconfonts_name" data-name="caret-left" id="wn-fas wn-fa-caret-left" value="wn-fa-caret-left">
							<label for="wn-fas wn-fa-caret-left"><i class="wn-fas wn-fa-caret-left"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="caret-right" >
							<input type="radio" name="iconfonts_name" data-name="caret-right" id="wn-fas wn-fa-caret-right" value="wn-fa-caret-right">
							<label for="wn-fas wn-fa-caret-right"><i class="wn-fas wn-fa-caret-right"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="caret-square-down" >
							<input type="radio" name="iconfonts_name" data-name="caret-square-down" id="wn-fas wn-fa-caret-square-down" value="wn-fa-caret-square-down">
							<label for="wn-fas wn-fa-caret-square-down"><i class="wn-fas wn-fa-caret-square-down"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="caret-square-left" >
							<input type="radio" name="iconfonts_name" data-name="caret-square-left" id="wn-fas wn-fa-caret-square-left" value="wn-fa-caret-square-left">
							<label for="wn-fas wn-fa-caret-square-left"><i class="wn-fas wn-fa-caret-square-left"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="caret-square-right" >
							<input type="radio" name="iconfonts_name" data-name="caret-square-right" id="wn-fas wn-fa-caret-square-right" value="wn-fa-caret-square-right">
							<label for="wn-fas wn-fa-caret-square-right"><i class="wn-fas wn-fa-caret-square-right"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="caret-square-up" >
							<input type="radio" name="iconfonts_name" data-name="caret-square-up" id="wn-fas wn-fa-caret-square-up" value="wn-fa-caret-square-up">
							<label for="wn-fas wn-fa-caret-square-up"><i class="wn-fas wn-fa-caret-square-up"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="caret-up" >
							<input type="radio" name="iconfonts_name" data-name="caret-up" id="wn-fas wn-fa-caret-up" value="wn-fa-caret-up">
							<label for="wn-fas wn-fa-caret-up"><i class="wn-fas wn-fa-caret-up"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="cart-arrow-down" >
							<input type="radio" name="iconfonts_name" data-name="cart-arrow-down" id="wn-fas wn-fa-cart-arrow-down" value="wn-fa-cart-arrow-down">
							<label for="wn-fas wn-fa-cart-arrow-down"><i class="wn-fas wn-fa-cart-arrow-down"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="cart-plus" >
							<input type="radio" name="iconfonts_name" data-name="cart-plus" id="wn-fas wn-fa-cart-plus" value="wn-fa-cart-plus">
							<label for="wn-fas wn-fa-cart-plus"><i class="wn-fas wn-fa-cart-plus"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="certificate" >
							<input type="radio" name="iconfonts_name" data-name="certificate" id="wn-fas wn-fa-certificate" value="wn-fa-certificate">
							<label for="wn-fas wn-fa-certificate"><i class="wn-fas wn-fa-certificate"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="chalkboard" >
							<input type="radio" name="iconfonts_name" data-name="chalkboard" id="wn-fas wn-fa-chalkboard" value="wn-fa-chalkboard">
							<label for="wn-fas wn-fa-chalkboard"><i class="wn-fas wn-fa-chalkboard"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="chalkboard-teacher" >
							<input type="radio" name="iconfonts_name" data-name="chalkboard-teacher" id="wn-fas wn-fa-chalkboard-teacher" value="wn-fa-chalkboard-teacher">
							<label for="wn-fas wn-fa-chalkboard-teacher"><i class="wn-fas wn-fa-chalkboard-teacher"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="chart-area" >
							<input type="radio" name="iconfonts_name" data-name="chart-area" id="wn-fas wn-fa-chart-area" value="wn-fa-chart-area">
							<label for="wn-fas wn-fa-chart-area"><i class="wn-fas wn-fa-chart-area"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="chart-bar" >
							<input type="radio" name="iconfonts_name" data-name="chart-bar" id="wn-fas wn-fa-chart-bar" value="wn-fa-chart-bar">
							<label for="wn-fas wn-fa-chart-bar"><i class="wn-fas wn-fa-chart-bar"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="chart-line" >
							<input type="radio" name="iconfonts_name" data-name="chart-line" id="wn-fas wn-fa-chart-line" value="wn-fa-chart-line">
							<label for="wn-fas wn-fa-chart-line"><i class="wn-fas wn-fa-chart-line"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="chart-pie" >
							<input type="radio" name="iconfonts_name" data-name="chart-pie" id="wn-fas wn-fa-chart-pie" value="wn-fa-chart-pie">
							<label for="wn-fas wn-fa-chart-pie"><i class="wn-fas wn-fa-chart-pie"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="check" >
							<input type="radio" name="iconfonts_name" data-name="check" id="wn-fas wn-fa-check" value="wn-fa-check">
							<label for="wn-fas wn-fa-check"><i class="wn-fas wn-fa-check"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="check-circle" >
							<input type="radio" name="iconfonts_name" data-name="check-circle" id="wn-fas wn-fa-check-circle" value="wn-fa-check-circle">
							<label for="wn-fas wn-fa-check-circle"><i class="wn-fas wn-fa-check-circle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="check-square" >
							<input type="radio" name="iconfonts_name" data-name="check-square" id="wn-fas wn-fa-check-square" value="wn-fa-check-square">
							<label for="wn-fas wn-fa-check-square"><i class="wn-fas wn-fa-check-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="chess" >
							<input type="radio" name="iconfonts_name" data-name="chess" id="wn-fas wn-fa-chess" value="wn-fa-chess">
							<label for="wn-fas wn-fa-chess"><i class="wn-fas wn-fa-chess"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="chess-bishop" >
							<input type="radio" name="iconfonts_name" data-name="chess-bishop" id="wn-fas wn-fa-chess-bishop" value="wn-fa-chess-bishop">
							<label for="wn-fas wn-fa-chess-bishop"><i class="wn-fas wn-fa-chess-bishop"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="chess-board" >
							<input type="radio" name="iconfonts_name" data-name="chess-board" id="wn-fas wn-fa-chess-board" value="wn-fa-chess-board">
							<label for="wn-fas wn-fa-chess-board"><i class="wn-fas wn-fa-chess-board"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="chess-king" >
							<input type="radio" name="iconfonts_name" data-name="chess-king" id="wn-fas wn-fa-chess-king" value="wn-fa-chess-king">
							<label for="wn-fas wn-fa-chess-king"><i class="wn-fas wn-fa-chess-king"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="chess-knight" >
							<input type="radio" name="iconfonts_name" data-name="chess-knight" id="wn-fas wn-fa-chess-knight" value="wn-fa-chess-knight">
							<label for="wn-fas wn-fa-chess-knight"><i class="wn-fas wn-fa-chess-knight"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="chess-pawn" >
							<input type="radio" name="iconfonts_name" data-name="chess-pawn" id="wn-fas wn-fa-chess-pawn" value="wn-fa-chess-pawn">
							<label for="wn-fas wn-fa-chess-pawn"><i class="wn-fas wn-fa-chess-pawn"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="chess-queen" >
							<input type="radio" name="iconfonts_name" data-name="chess-queen" id="wn-fas wn-fa-chess-queen" value="wn-fa-chess-queen">
							<label for="wn-fas wn-fa-chess-queen"><i class="wn-fas wn-fa-chess-queen"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="chess-rook" >
							<input type="radio" name="iconfonts_name" data-name="chess-rook" id="wn-fas wn-fa-chess-rook" value="wn-fa-chess-rook">
							<label for="wn-fas wn-fa-chess-rook"><i class="wn-fas wn-fa-chess-rook"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="chevron-circle-down" >
							<input type="radio" name="iconfonts_name" data-name="chevron-circle-down" id="wn-fas wn-fa-chevron-circle-down" value="wn-fa-chevron-circle-down">
							<label for="wn-fas wn-fa-chevron-circle-down"><i class="wn-fas wn-fa-chevron-circle-down"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="chevron-circle-left" >
							<input type="radio" name="iconfonts_name" data-name="chevron-circle-left" id="wn-fas wn-fa-chevron-circle-left" value="wn-fa-chevron-circle-left">
							<label for="wn-fas wn-fa-chevron-circle-left"><i class="wn-fas wn-fa-chevron-circle-left"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="chevron-circle-right" >
							<input type="radio" name="iconfonts_name" data-name="chevron-circle-right" id="wn-fas wn-fa-chevron-circle-right" value="wn-fa-chevron-circle-right">
							<label for="wn-fas wn-fa-chevron-circle-right"><i class="wn-fas wn-fa-chevron-circle-right"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="chevron-circle-up" >
							<input type="radio" name="iconfonts_name" data-name="chevron-circle-up" id="wn-fas wn-fa-chevron-circle-up" value="wn-fa-chevron-circle-up">
							<label for="wn-fas wn-fa-chevron-circle-up"><i class="wn-fas wn-fa-chevron-circle-up"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="chevron-down" >
							<input type="radio" name="iconfonts_name" data-name="chevron-down" id="wn-fas wn-fa-chevron-down" value="wn-fa-chevron-down">
							<label for="wn-fas wn-fa-chevron-down"><i class="wn-fas wn-fa-chevron-down"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="chevron-left" >
							<input type="radio" name="iconfonts_name" data-name="chevron-left" id="wn-fas wn-fa-chevron-left" value="wn-fa-chevron-left">
							<label for="wn-fas wn-fa-chevron-left"><i class="wn-fas wn-fa-chevron-left"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="chevron-right" >
							<input type="radio" name="iconfonts_name" data-name="chevron-right" id="wn-fas wn-fa-chevron-right" value="wn-fa-chevron-right">
							<label for="wn-fas wn-fa-chevron-right"><i class="wn-fas wn-fa-chevron-right"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="chevron-up" >
							<input type="radio" name="iconfonts_name" data-name="chevron-up" id="wn-fas wn-fa-chevron-up" value="wn-fa-chevron-up">
							<label for="wn-fas wn-fa-chevron-up"><i class="wn-fas wn-fa-chevron-up"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="child" >
							<input type="radio" name="iconfonts_name" data-name="child" id="wn-fas wn-fa-child" value="wn-fa-child">
							<label for="wn-fas wn-fa-child"><i class="wn-fas wn-fa-child"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="church" >
							<input type="radio" name="iconfonts_name" data-name="church" id="wn-fas wn-fa-church" value="wn-fa-church">
							<label for="wn-fas wn-fa-church"><i class="wn-fas wn-fa-church"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="circle" >
							<input type="radio" name="iconfonts_name" data-name="circle" id="wn-fas wn-fa-circle" value="wn-fa-circle">
							<label for="wn-fas wn-fa-circle"><i class="wn-fas wn-fa-circle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="circle-notch" >
							<input type="radio" name="iconfonts_name" data-name="circle-notch" id="wn-fas wn-fa-circle-notch" value="wn-fa-circle-notch">
							<label for="wn-fas wn-fa-circle-notch"><i class="wn-fas wn-fa-circle-notch"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="clipboard" >
							<input type="radio" name="iconfonts_name" data-name="clipboard" id="wn-fas wn-fa-clipboard" value="wn-fa-clipboard">
							<label for="wn-fas wn-fa-clipboard"><i class="wn-fas wn-fa-clipboard"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="clipboard-check" >
							<input type="radio" name="iconfonts_name" data-name="clipboard-check" id="wn-fas wn-fa-clipboard-check" value="wn-fa-clipboard-check">
							<label for="wn-fas wn-fa-clipboard-check"><i class="wn-fas wn-fa-clipboard-check"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="clipboard-list" >
							<input type="radio" name="iconfonts_name" data-name="clipboard-list" id="wn-fas wn-fa-clipboard-list" value="wn-fa-clipboard-list">
							<label for="wn-fas wn-fa-clipboard-list"><i class="wn-fas wn-fa-clipboard-list"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="clock" >
							<input type="radio" name="iconfonts_name" data-name="clock" id="wn-fas wn-fa-clock" value="wn-fa-clock">
							<label for="wn-fas wn-fa-clock"><i class="wn-fas wn-fa-clock"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="clone" >
							<input type="radio" name="iconfonts_name" data-name="clone" id="wn-fas wn-fa-clone" value="wn-fa-clone">
							<label for="wn-fas wn-fa-clone"><i class="wn-fas wn-fa-clone"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="closed-captioning" >
							<input type="radio" name="iconfonts_name" data-name="closed-captioning" id="wn-fas wn-fa-closed-captioning" value="wn-fa-closed-captioning">
							<label for="wn-fas wn-fa-closed-captioning"><i class="wn-fas wn-fa-closed-captioning"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="cloud" >
							<input type="radio" name="iconfonts_name" data-name="cloud" id="wn-fas wn-fa-cloud" value="wn-fa-cloud">
							<label for="wn-fas wn-fa-cloud"><i class="wn-fas wn-fa-cloud"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="cloud-download-alt" >
							<input type="radio" name="iconfonts_name" data-name="cloud-download-alt" id="wn-fas wn-fa-cloud-download-alt" value="wn-fa-cloud-download-alt">
							<label for="wn-fas wn-fa-cloud-download-alt"><i class="wn-fas wn-fa-cloud-download-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="cloud-upload-alt" >
							<input type="radio" name="iconfonts_name" data-name="cloud-upload-alt" id="wn-fas wn-fa-cloud-upload-alt" value="wn-fa-cloud-upload-alt">
							<label for="wn-fas wn-fa-cloud-upload-alt"><i class="wn-fas wn-fa-cloud-upload-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="code" >
							<input type="radio" name="iconfonts_name" data-name="code" id="wn-fas wn-fa-code" value="wn-fa-code">
							<label for="wn-fas wn-fa-code"><i class="wn-fas wn-fa-code"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="code-branch" >
							<input type="radio" name="iconfonts_name" data-name="code-branch" id="wn-fas wn-fa-code-branch" value="wn-fa-code-branch">
							<label for="wn-fas wn-fa-code-branch"><i class="wn-fas wn-fa-code-branch"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="coffee" >
							<input type="radio" name="iconfonts_name" data-name="coffee" id="wn-fas wn-fa-coffee" value="wn-fa-coffee">
							<label for="wn-fas wn-fa-coffee"><i class="wn-fas wn-fa-coffee"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="cog" >
							<input type="radio" name="iconfonts_name" data-name="cog" id="wn-fas wn-fa-cog" value="wn-fa-cog">
							<label for="wn-fas wn-fa-cog"><i class="wn-fas wn-fa-cog"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="cogs" >
							<input type="radio" name="iconfonts_name" data-name="cogs" id="wn-fas wn-fa-cogs" value="wn-fa-cogs">
							<label for="wn-fas wn-fa-cogs"><i class="wn-fas wn-fa-cogs"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="coins" >
							<input type="radio" name="iconfonts_name" data-name="coins" id="wn-fas wn-fa-coins" value="wn-fa-coins">
							<label for="wn-fas wn-fa-coins"><i class="wn-fas wn-fa-coins"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="columns" >
							<input type="radio" name="iconfonts_name" data-name="columns" id="wn-fas wn-fa-columns" value="wn-fa-columns">
							<label for="wn-fas wn-fa-columns"><i class="wn-fas wn-fa-columns"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="comment" >
							<input type="radio" name="iconfonts_name" data-name="comment" id="wn-fas wn-fa-comment" value="wn-fa-comment">
							<label for="wn-fas wn-fa-comment"><i class="wn-fas wn-fa-comment"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="comment-alt" >
							<input type="radio" name="iconfonts_name" data-name="comment-alt" id="wn-fas wn-fa-comment-alt" value="wn-fa-comment-alt">
							<label for="wn-fas wn-fa-comment-alt"><i class="wn-fas wn-fa-comment-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="comment-dots" >
							<input type="radio" name="iconfonts_name" data-name="comment-dots" id="wn-fas wn-fa-comment-dots" value="wn-fa-comment-dots">
							<label for="wn-fas wn-fa-comment-dots"><i class="wn-fas wn-fa-comment-dots"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="comment-slash" >
							<input type="radio" name="iconfonts_name" data-name="comment-slash" id="wn-fas wn-fa-comment-slash" value="wn-fa-comment-slash">
							<label for="wn-fas wn-fa-comment-slash"><i class="wn-fas wn-fa-comment-slash"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="comments" >
							<input type="radio" name="iconfonts_name" data-name="comments" id="wn-fas wn-fa-comments" value="wn-fa-comments">
							<label for="wn-fas wn-fa-comments"><i class="wn-fas wn-fa-comments"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="compact-disc" >
							<input type="radio" name="iconfonts_name" data-name="compact-disc" id="wn-fas wn-fa-compact-disc" value="wn-fa-compact-disc">
							<label for="wn-fas wn-fa-compact-disc"><i class="wn-fas wn-fa-compact-disc"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="compass" >
							<input type="radio" name="iconfonts_name" data-name="compass" id="wn-fas wn-fa-compass" value="wn-fa-compass">
							<label for="wn-fas wn-fa-compass"><i class="wn-fas wn-fa-compass"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="compress" >
							<input type="radio" name="iconfonts_name" data-name="compress" id="wn-fas wn-fa-compress" value="wn-fa-compress">
							<label for="wn-fas wn-fa-compress"><i class="wn-fas wn-fa-compress"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="copy" >
							<input type="radio" name="iconfonts_name" data-name="copy" id="wn-fas wn-fa-copy" value="wn-fa-copy">
							<label for="wn-fas wn-fa-copy"><i class="wn-fas wn-fa-copy"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="copyright" >
							<input type="radio" name="iconfonts_name" data-name="copyright" id="wn-fas wn-fa-copyright" value="wn-fa-copyright">
							<label for="wn-fas wn-fa-copyright"><i class="wn-fas wn-fa-copyright"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="couch" >
							<input type="radio" name="iconfonts_name" data-name="couch" id="wn-fas wn-fa-couch" value="wn-fa-couch">
							<label for="wn-fas wn-fa-couch"><i class="wn-fas wn-fa-couch"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="credit-card" >
							<input type="radio" name="iconfonts_name" data-name="credit-card" id="wn-fas wn-fa-credit-card" value="wn-fa-credit-card">
							<label for="wn-fas wn-fa-credit-card"><i class="wn-fas wn-fa-credit-card"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="crop" >
							<input type="radio" name="iconfonts_name" data-name="crop" id="wn-fas wn-fa-crop" value="wn-fa-crop">
							<label for="wn-fas wn-fa-crop"><i class="wn-fas wn-fa-crop"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="crosshairs" >
							<input type="radio" name="iconfonts_name" data-name="crosshairs" id="wn-fas wn-fa-crosshairs" value="wn-fa-crosshairs">
							<label for="wn-fas wn-fa-crosshairs"><i class="wn-fas wn-fa-crosshairs"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="crow" >
							<input type="radio" name="iconfonts_name" data-name="crow" id="wn-fas wn-fa-crow" value="wn-fa-crow">
							<label for="wn-fas wn-fa-crow"><i class="wn-fas wn-fa-crow"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="crown" >
							<input type="radio" name="iconfonts_name" data-name="crown" id="wn-fas wn-fa-crown" value="wn-fa-crown">
							<label for="wn-fas wn-fa-crown"><i class="wn-fas wn-fa-crown"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="cube" >
							<input type="radio" name="iconfonts_name" data-name="cube" id="wn-fas wn-fa-cube" value="wn-fa-cube">
							<label for="wn-fas wn-fa-cube"><i class="wn-fas wn-fa-cube"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="cubes" >
							<input type="radio" name="iconfonts_name" data-name="cubes" id="wn-fas wn-fa-cubes" value="wn-fa-cubes">
							<label for="wn-fas wn-fa-cubes"><i class="wn-fas wn-fa-cubes"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="cut" >
							<input type="radio" name="iconfonts_name" data-name="cut" id="wn-fas wn-fa-cut" value="wn-fa-cut">
							<label for="wn-fas wn-fa-cut"><i class="wn-fas wn-fa-cut"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="database" >
							<input type="radio" name="iconfonts_name" data-name="database" id="wn-fas wn-fa-database" value="wn-fa-database">
							<label for="wn-fas wn-fa-database"><i class="wn-fas wn-fa-database"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="deaf" >
							<input type="radio" name="iconfonts_name" data-name="deaf" id="wn-fas wn-fa-deaf" value="wn-fa-deaf">
							<label for="wn-fas wn-fa-deaf"><i class="wn-fas wn-fa-deaf"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="desktop" >
							<input type="radio" name="iconfonts_name" data-name="desktop" id="wn-fas wn-fa-desktop" value="wn-fa-desktop">
							<label for="wn-fas wn-fa-desktop"><i class="wn-fas wn-fa-desktop"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="diagnoses" >
							<input type="radio" name="iconfonts_name" data-name="diagnoses" id="wn-fas wn-fa-diagnoses" value="wn-fa-diagnoses">
							<label for="wn-fas wn-fa-diagnoses"><i class="wn-fas wn-fa-diagnoses"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="dice" >
							<input type="radio" name="iconfonts_name" data-name="dice" id="wn-fas wn-fa-dice" value="wn-fa-dice">
							<label for="wn-fas wn-fa-dice"><i class="wn-fas wn-fa-dice"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="dice-five" >
							<input type="radio" name="iconfonts_name" data-name="dice-five" id="wn-fas wn-fa-dice-five" value="wn-fa-dice-five">
							<label for="wn-fas wn-fa-dice-five"><i class="wn-fas wn-fa-dice-five"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="dice-four" >
							<input type="radio" name="iconfonts_name" data-name="dice-four" id="wn-fas wn-fa-dice-four" value="wn-fa-dice-four">
							<label for="wn-fas wn-fa-dice-four"><i class="wn-fas wn-fa-dice-four"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="dice-one" >
							<input type="radio" name="iconfonts_name" data-name="dice-one" id="wn-fas wn-fa-dice-one" value="wn-fa-dice-one">
							<label for="wn-fas wn-fa-dice-one"><i class="wn-fas wn-fa-dice-one"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="dice-six" >
							<input type="radio" name="iconfonts_name" data-name="dice-six" id="wn-fas wn-fa-dice-six" value="wn-fa-dice-six">
							<label for="wn-fas wn-fa-dice-six"><i class="wn-fas wn-fa-dice-six"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="dice-three" >
							<input type="radio" name="iconfonts_name" data-name="dice-three" id="wn-fas wn-fa-dice-three" value="wn-fa-dice-three">
							<label for="wn-fas wn-fa-dice-three"><i class="wn-fas wn-fa-dice-three"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="dice-two" >
							<input type="radio" name="iconfonts_name" data-name="dice-two" id="wn-fas wn-fa-dice-two" value="wn-fa-dice-two">
							<label for="wn-fas wn-fa-dice-two"><i class="wn-fas wn-fa-dice-two"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="divide" >
							<input type="radio" name="iconfonts_name" data-name="divide" id="wn-fas wn-fa-divide" value="wn-fa-divide">
							<label for="wn-fas wn-fa-divide"><i class="wn-fas wn-fa-divide"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="dna" >
							<input type="radio" name="iconfonts_name" data-name="dna" id="wn-fas wn-fa-dna" value="wn-fa-dna">
							<label for="wn-fas wn-fa-dna"><i class="wn-fas wn-fa-dna"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="dollar-sign" >
							<input type="radio" name="iconfonts_name" data-name="dollar-sign" id="wn-fas wn-fa-dollar-sign" value="wn-fa-dollar-sign">
							<label for="wn-fas wn-fa-dollar-sign"><i class="wn-fas wn-fa-dollar-sign"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="dolly" >
							<input type="radio" name="iconfonts_name" data-name="dolly" id="wn-fas wn-fa-dolly" value="wn-fa-dolly">
							<label for="wn-fas wn-fa-dolly"><i class="wn-fas wn-fa-dolly"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="dolly-flatbed" >
							<input type="radio" name="iconfonts_name" data-name="dolly-flatbed" id="wn-fas wn-fa-dolly-flatbed" value="wn-fa-dolly-flatbed">
							<label for="wn-fas wn-fa-dolly-flatbed"><i class="wn-fas wn-fa-dolly-flatbed"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="donate" >
							<input type="radio" name="iconfonts_name" data-name="donate" id="wn-fas wn-fa-donate" value="wn-fa-donate">
							<label for="wn-fas wn-fa-donate"><i class="wn-fas wn-fa-donate"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="door-closed" >
							<input type="radio" name="iconfonts_name" data-name="door-closed" id="wn-fas wn-fa-door-closed" value="wn-fa-door-closed">
							<label for="wn-fas wn-fa-door-closed"><i class="wn-fas wn-fa-door-closed"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="door-open" >
							<input type="radio" name="iconfonts_name" data-name="door-open" id="wn-fas wn-fa-door-open" value="wn-fa-door-open">
							<label for="wn-fas wn-fa-door-open"><i class="wn-fas wn-fa-door-open"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="dot-circle" >
							<input type="radio" name="iconfonts_name" data-name="dot-circle" id="wn-fas wn-fa-dot-circle" value="wn-fa-dot-circle">
							<label for="wn-fas wn-fa-dot-circle"><i class="wn-fas wn-fa-dot-circle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="dove" >
							<input type="radio" name="iconfonts_name" data-name="dove" id="wn-fas wn-fa-dove" value="wn-fa-dove">
							<label for="wn-fas wn-fa-dove"><i class="wn-fas wn-fa-dove"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="download" >
							<input type="radio" name="iconfonts_name" data-name="download" id="wn-fas wn-fa-download" value="wn-fa-download">
							<label for="wn-fas wn-fa-download"><i class="wn-fas wn-fa-download"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="dumbbell" >
							<input type="radio" name="iconfonts_name" data-name="dumbbell" id="wn-fas wn-fa-dumbbell" value="wn-fa-dumbbell">
							<label for="wn-fas wn-fa-dumbbell"><i class="wn-fas wn-fa-dumbbell"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="edit" >
							<input type="radio" name="iconfonts_name" data-name="edit" id="wn-fas wn-fa-edit" value="wn-fa-edit">
							<label for="wn-fas wn-fa-edit"><i class="wn-fas wn-fa-edit"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="eject" >
							<input type="radio" name="iconfonts_name" data-name="eject" id="wn-fas wn-fa-eject" value="wn-fa-eject">
							<label for="wn-fas wn-fa-eject"><i class="wn-fas wn-fa-eject"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="ellipsis-h" >
							<input type="radio" name="iconfonts_name" data-name="ellipsis-h" id="wn-fas wn-fa-ellipsis-h" value="wn-fa-ellipsis-h">
							<label for="wn-fas wn-fa-ellipsis-h"><i class="wn-fas wn-fa-ellipsis-h"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="ellipsis-v" >
							<input type="radio" name="iconfonts_name" data-name="ellipsis-v" id="wn-fas wn-fa-ellipsis-v" value="wn-fa-ellipsis-v">
							<label for="wn-fas wn-fa-ellipsis-v"><i class="wn-fas wn-fa-ellipsis-v"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="envelope" >
							<input type="radio" name="iconfonts_name" data-name="envelope" id="wn-fas wn-fa-envelope" value="wn-fa-envelope">
							<label for="wn-fas wn-fa-envelope"><i class="wn-fas wn-fa-envelope"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="envelope-open" >
							<input type="radio" name="iconfonts_name" data-name="envelope-open" id="wn-fas wn-fa-envelope-open" value="wn-fa-envelope-open">
							<label for="wn-fas wn-fa-envelope-open"><i class="wn-fas wn-fa-envelope-open"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="envelope-square" >
							<input type="radio" name="iconfonts_name" data-name="envelope-square" id="wn-fas wn-fa-envelope-square" value="wn-fa-envelope-square">
							<label for="wn-fas wn-fa-envelope-square"><i class="wn-fas wn-fa-envelope-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="equals" >
							<input type="radio" name="iconfonts_name" data-name="equals" id="wn-fas wn-fa-equals" value="wn-fa-equals">
							<label for="wn-fas wn-fa-equals"><i class="wn-fas wn-fa-equals"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="eraser" >
							<input type="radio" name="iconfonts_name" data-name="eraser" id="wn-fas wn-fa-eraser" value="wn-fa-eraser">
							<label for="wn-fas wn-fa-eraser"><i class="wn-fas wn-fa-eraser"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="euro-sign" >
							<input type="radio" name="iconfonts_name" data-name="euro-sign" id="wn-fas wn-fa-euro-sign" value="wn-fa-euro-sign">
							<label for="wn-fas wn-fa-euro-sign"><i class="wn-fas wn-fa-euro-sign"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="exchange-alt" >
							<input type="radio" name="iconfonts_name" data-name="exchange-alt" id="wn-fas wn-fa-exchange-alt" value="wn-fa-exchange-alt">
							<label for="wn-fas wn-fa-exchange-alt"><i class="wn-fas wn-fa-exchange-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="exclamation" >
							<input type="radio" name="iconfonts_name" data-name="exclamation" id="wn-fas wn-fa-exclamation" value="wn-fa-exclamation">
							<label for="wn-fas wn-fa-exclamation"><i class="wn-fas wn-fa-exclamation"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="exclamation-circle" >
							<input type="radio" name="iconfonts_name" data-name="exclamation-circle" id="wn-fas wn-fa-exclamation-circle" value="wn-fa-exclamation-circle">
							<label for="wn-fas wn-fa-exclamation-circle"><i class="wn-fas wn-fa-exclamation-circle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="exclamation-triangle" >
							<input type="radio" name="iconfonts_name" data-name="exclamation-triangle" id="wn-fas wn-fa-exclamation-triangle" value="wn-fa-exclamation-triangle">
							<label for="wn-fas wn-fa-exclamation-triangle"><i class="wn-fas wn-fa-exclamation-triangle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="expand" >
							<input type="radio" name="iconfonts_name" data-name="expand" id="wn-fas wn-fa-expand" value="wn-fa-expand">
							<label for="wn-fas wn-fa-expand"><i class="wn-fas wn-fa-expand"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="expand-arrows-alt" >
							<input type="radio" name="iconfonts_name" data-name="expand-arrows-alt" id="wn-fas wn-fa-expand-arrows-alt" value="wn-fa-expand-arrows-alt">
							<label for="wn-fas wn-fa-expand-arrows-alt"><i class="wn-fas wn-fa-expand-arrows-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="external-link-alt" >
							<input type="radio" name="iconfonts_name" data-name="external-link-alt" id="wn-fas wn-fa-external-link-alt" value="wn-fa-external-link-alt">
							<label for="wn-fas wn-fa-external-link-alt"><i class="wn-fas wn-fa-external-link-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="external-link-square-alt" >
							<input type="radio" name="iconfonts_name" data-name="external-link-square-alt" id="wn-fas wn-fa-external-link-square-alt" value="wn-fa-external-link-square-alt">
							<label for="wn-fas wn-fa-external-link-square-alt"><i class="wn-fas wn-fa-external-link-square-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="eye" >
							<input type="radio" name="iconfonts_name" data-name="eye" id="wn-fas wn-fa-eye" value="wn-fa-eye">
							<label for="wn-fas wn-fa-eye"><i class="wn-fas wn-fa-eye"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="eye-dropper" >
							<input type="radio" name="iconfonts_name" data-name="eye-dropper" id="wn-fas wn-fa-eye-dropper" value="wn-fa-eye-dropper">
							<label for="wn-fas wn-fa-eye-dropper"><i class="wn-fas wn-fa-eye-dropper"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="eye-slash" >
							<input type="radio" name="iconfonts_name" data-name="eye-slash" id="wn-fas wn-fa-eye-slash" value="wn-fa-eye-slash">
							<label for="wn-fas wn-fa-eye-slash"><i class="wn-fas wn-fa-eye-slash"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="fast-backward" >
							<input type="radio" name="iconfonts_name" data-name="fast-backward" id="wn-fas wn-fa-fast-backward" value="wn-fa-fast-backward">
							<label for="wn-fas wn-fa-fast-backward"><i class="wn-fas wn-fa-fast-backward"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="fast-forward" >
							<input type="radio" name="iconfonts_name" data-name="fast-forward" id="wn-fas wn-fa-fast-forward" value="wn-fa-fast-forward">
							<label for="wn-fas wn-fa-fast-forward"><i class="wn-fas wn-fa-fast-forward"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="fax" >
							<input type="radio" name="iconfonts_name" data-name="fax" id="wn-fas wn-fa-fax" value="wn-fa-fax">
							<label for="wn-fas wn-fa-fax"><i class="wn-fas wn-fa-fax"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="feather" >
							<input type="radio" name="iconfonts_name" data-name="feather" id="wn-fas wn-fa-feather" value="wn-fa-feather">
							<label for="wn-fas wn-fa-feather"><i class="wn-fas wn-fa-feather"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="female" >
							<input type="radio" name="iconfonts_name" data-name="female" id="wn-fas wn-fa-female" value="wn-fa-female">
							<label for="wn-fas wn-fa-female"><i class="wn-fas wn-fa-female"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="fighter-jet" >
							<input type="radio" name="iconfonts_name" data-name="fighter-jet" id="wn-fas wn-fa-fighter-jet" value="wn-fa-fighter-jet">
							<label for="wn-fas wn-fa-fighter-jet"><i class="wn-fas wn-fa-fighter-jet"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="file" >
							<input type="radio" name="iconfonts_name" data-name="file" id="wn-fas wn-fa-file" value="wn-fa-file">
							<label for="wn-fas wn-fa-file"><i class="wn-fas wn-fa-file"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="file-alt" >
							<input type="radio" name="iconfonts_name" data-name="file-alt" id="wn-fas wn-fa-file-alt" value="wn-fa-file-alt">
							<label for="wn-fas wn-fa-file-alt"><i class="wn-fas wn-fa-file-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="file-archive" >
							<input type="radio" name="iconfonts_name" data-name="file-archive" id="wn-fas wn-fa-file-archive" value="wn-fa-file-archive">
							<label for="wn-fas wn-fa-file-archive"><i class="wn-fas wn-fa-file-archive"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="file-audio" >
							<input type="radio" name="iconfonts_name" data-name="file-audio" id="wn-fas wn-fa-file-audio" value="wn-fa-file-audio">
							<label for="wn-fas wn-fa-file-audio"><i class="wn-fas wn-fa-file-audio"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="file-code" >
							<input type="radio" name="iconfonts_name" data-name="file-code" id="wn-fas wn-fa-file-code" value="wn-fa-file-code">
							<label for="wn-fas wn-fa-file-code"><i class="wn-fas wn-fa-file-code"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="file-excel" >
							<input type="radio" name="iconfonts_name" data-name="file-excel" id="wn-fas wn-fa-file-excel" value="wn-fa-file-excel">
							<label for="wn-fas wn-fa-file-excel"><i class="wn-fas wn-fa-file-excel"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="file-image" >
							<input type="radio" name="iconfonts_name" data-name="file-image" id="wn-fas wn-fa-file-image" value="wn-fa-file-image">
							<label for="wn-fas wn-fa-file-image"><i class="wn-fas wn-fa-file-image"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="file-medical" >
							<input type="radio" name="iconfonts_name" data-name="file-medical" id="wn-fas wn-fa-file-medical" value="wn-fa-file-medical">
							<label for="wn-fas wn-fa-file-medical"><i class="wn-fas wn-fa-file-medical"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="file-medical-alt" >
							<input type="radio" name="iconfonts_name" data-name="file-medical-alt" id="wn-fas wn-fa-file-medical-alt" value="wn-fa-file-medical-alt">
							<label for="wn-fas wn-fa-file-medical-alt"><i class="wn-fas wn-fa-file-medical-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="file-pdf" >
							<input type="radio" name="iconfonts_name" data-name="file-pdf" id="wn-fas wn-fa-file-pdf" value="wn-fa-file-pdf">
							<label for="wn-fas wn-fa-file-pdf"><i class="wn-fas wn-fa-file-pdf"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="file-powerpoint" >
							<input type="radio" name="iconfonts_name" data-name="file-powerpoint" id="wn-fas wn-fa-file-powerpoint" value="wn-fa-file-powerpoint">
							<label for="wn-fas wn-fa-file-powerpoint"><i class="wn-fas wn-fa-file-powerpoint"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="file-video" >
							<input type="radio" name="iconfonts_name" data-name="file-video" id="wn-fas wn-fa-file-video" value="wn-fa-file-video">
							<label for="wn-fas wn-fa-file-video"><i class="wn-fas wn-fa-file-video"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="file-word" >
							<input type="radio" name="iconfonts_name" data-name="file-word" id="wn-fas wn-fa-file-word" value="wn-fa-file-word">
							<label for="wn-fas wn-fa-file-word"><i class="wn-fas wn-fa-file-word"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="film" >
							<input type="radio" name="iconfonts_name" data-name="film" id="wn-fas wn-fa-film" value="wn-fa-film">
							<label for="wn-fas wn-fa-film"><i class="wn-fas wn-fa-film"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="filter" >
							<input type="radio" name="iconfonts_name" data-name="filter" id="wn-fas wn-fa-filter" value="wn-fa-filter">
							<label for="wn-fas wn-fa-filter"><i class="wn-fas wn-fa-filter"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="fire" >
							<input type="radio" name="iconfonts_name" data-name="fire" id="wn-fas wn-fa-fire" value="wn-fa-fire">
							<label for="wn-fas wn-fa-fire"><i class="wn-fas wn-fa-fire"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="fire-extinguisher" >
							<input type="radio" name="iconfonts_name" data-name="fire-extinguisher" id="wn-fas wn-fa-fire-extinguisher" value="wn-fa-fire-extinguisher">
							<label for="wn-fas wn-fa-fire-extinguisher"><i class="wn-fas wn-fa-fire-extinguisher"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="first-aid" >
							<input type="radio" name="iconfonts_name" data-name="first-aid" id="wn-fas wn-fa-first-aid" value="wn-fa-first-aid">
							<label for="wn-fas wn-fa-first-aid"><i class="wn-fas wn-fa-first-aid"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="flag" >
							<input type="radio" name="iconfonts_name" data-name="flag" id="wn-fas wn-fa-flag" value="wn-fa-flag">
							<label for="wn-fas wn-fa-flag"><i class="wn-fas wn-fa-flag"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="flag-checkered" >
							<input type="radio" name="iconfonts_name" data-name="flag-checkered" id="wn-fas wn-fa-flag-checkered" value="wn-fa-flag-checkered">
							<label for="wn-fas wn-fa-flag-checkered"><i class="wn-fas wn-fa-flag-checkered"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="flask" >
							<input type="radio" name="iconfonts_name" data-name="flask" id="wn-fas wn-fa-flask" value="wn-fa-flask">
							<label for="wn-fas wn-fa-flask"><i class="wn-fas wn-fa-flask"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="folder" >
							<input type="radio" name="iconfonts_name" data-name="folder" id="wn-fas wn-fa-folder" value="wn-fa-folder">
							<label for="wn-fas wn-fa-folder"><i class="wn-fas wn-fa-folder"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="folder-open" >
							<input type="radio" name="iconfonts_name" data-name="folder-open" id="wn-fas wn-fa-folder-open" value="wn-fa-folder-open">
							<label for="wn-fas wn-fa-folder-open"><i class="wn-fas wn-fa-folder-open"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="font" >
							<input type="radio" name="iconfonts_name" data-name="font" id="wn-fas wn-fa-font" value="wn-fa-font">
							<label for="wn-fas wn-fa-font"><i class="wn-fas wn-fa-font"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="football-ball" >
							<input type="radio" name="iconfonts_name" data-name="football-ball" id="wn-fas wn-fa-football-ball" value="wn-fa-football-ball">
							<label for="wn-fas wn-fa-football-ball"><i class="wn-fas wn-fa-football-ball"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="forward" >
							<input type="radio" name="iconfonts_name" data-name="forward" id="wn-fas wn-fa-forward" value="wn-fa-forward">
							<label for="wn-fas wn-fa-forward"><i class="wn-fas wn-fa-forward"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="frog" >
							<input type="radio" name="iconfonts_name" data-name="frog" id="wn-fas wn-fa-frog" value="wn-fa-frog">
							<label for="wn-fas wn-fa-frog"><i class="wn-fas wn-fa-frog"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="frown" >
							<input type="radio" name="iconfonts_name" data-name="frown" id="wn-fas wn-fa-frown" value="wn-fa-frown">
							<label for="wn-fas wn-fa-frown"><i class="wn-fas wn-fa-frown"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="futbol" >
							<input type="radio" name="iconfonts_name" data-name="futbol" id="wn-fas wn-fa-futbol" value="wn-fa-futbol">
							<label for="wn-fas wn-fa-futbol"><i class="wn-fas wn-fa-futbol"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="gamepad" >
							<input type="radio" name="iconfonts_name" data-name="gamepad" id="wn-fas wn-fa-gamepad" value="wn-fa-gamepad">
							<label for="wn-fas wn-fa-gamepad"><i class="wn-fas wn-fa-gamepad"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="gas-pump" >
							<input type="radio" name="iconfonts_name" data-name="gas-pump" id="wn-fas wn-fa-gas-pump" value="wn-fa-gas-pump">
							<label for="wn-fas wn-fa-gas-pump"><i class="wn-fas wn-fa-gas-pump"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="gavel" >
							<input type="radio" name="iconfonts_name" data-name="gavel" id="wn-fas wn-fa-gavel" value="wn-fa-gavel">
							<label for="wn-fas wn-fa-gavel"><i class="wn-fas wn-fa-gavel"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="gem" >
							<input type="radio" name="iconfonts_name" data-name="gem" id="wn-fas wn-fa-gem" value="wn-fa-gem">
							<label for="wn-fas wn-fa-gem"><i class="wn-fas wn-fa-gem"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="genderless" >
							<input type="radio" name="iconfonts_name" data-name="genderless" id="wn-fas wn-fa-genderless" value="wn-fa-genderless">
							<label for="wn-fas wn-fa-genderless"><i class="wn-fas wn-fa-genderless"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="gift" >
							<input type="radio" name="iconfonts_name" data-name="gift" id="wn-fas wn-fa-gift" value="wn-fa-gift">
							<label for="wn-fas wn-fa-gift"><i class="wn-fas wn-fa-gift"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="glass-martini" >
							<input type="radio" name="iconfonts_name" data-name="glass-martini" id="wn-fas wn-fa-glass-martini" value="wn-fa-glass-martini">
							<label for="wn-fas wn-fa-glass-martini"><i class="wn-fas wn-fa-glass-martini"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="glasses" >
							<input type="radio" name="iconfonts_name" data-name="glasses" id="wn-fas wn-fa-glasses" value="wn-fa-glasses">
							<label for="wn-fas wn-fa-glasses"><i class="wn-fas wn-fa-glasses"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="globe" >
							<input type="radio" name="iconfonts_name" data-name="globe" id="wn-fas wn-fa-globe" value="wn-fa-globe">
							<label for="wn-fas wn-fa-globe"><i class="wn-fas wn-fa-globe"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="golf-ball" >
							<input type="radio" name="iconfonts_name" data-name="golf-ball" id="wn-fas wn-fa-golf-ball" value="wn-fa-golf-ball">
							<label for="wn-fas wn-fa-golf-ball"><i class="wn-fas wn-fa-golf-ball"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="graduation-cap" >
							<input type="radio" name="iconfonts_name" data-name="graduation-cap" id="wn-fas wn-fa-graduation-cap" value="wn-fa-graduation-cap">
							<label for="wn-fas wn-fa-graduation-cap"><i class="wn-fas wn-fa-graduation-cap"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="greater-than" >
							<input type="radio" name="iconfonts_name" data-name="greater-than" id="wn-fas wn-fa-greater-than" value="wn-fa-greater-than">
							<label for="wn-fas wn-fa-greater-than"><i class="wn-fas wn-fa-greater-than"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="greater-than-equal" >
							<input type="radio" name="iconfonts_name" data-name="greater-than-equal" id="wn-fas wn-fa-greater-than-equal" value="wn-fa-greater-than-equal">
							<label for="wn-fas wn-fa-greater-than-equal"><i class="wn-fas wn-fa-greater-than-equal"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="h-square" >
							<input type="radio" name="iconfonts_name" data-name="h-square" id="wn-fas wn-fa-h-square" value="wn-fa-h-square">
							<label for="wn-fas wn-fa-h-square"><i class="wn-fas wn-fa-h-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hand-holding" >
							<input type="radio" name="iconfonts_name" data-name="hand-holding" id="wn-fas wn-fa-hand-holding" value="wn-fa-hand-holding">
							<label for="wn-fas wn-fa-hand-holding"><i class="wn-fas wn-fa-hand-holding"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hand-holding-heart" >
							<input type="radio" name="iconfonts_name" data-name="hand-holding-heart" id="wn-fas wn-fa-hand-holding-heart" value="wn-fa-hand-holding-heart">
							<label for="wn-fas wn-fa-hand-holding-heart"><i class="wn-fas wn-fa-hand-holding-heart"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hand-holding-usd" >
							<input type="radio" name="iconfonts_name" data-name="hand-holding-usd" id="wn-fas wn-fa-hand-holding-usd" value="wn-fa-hand-holding-usd">
							<label for="wn-fas wn-fa-hand-holding-usd"><i class="wn-fas wn-fa-hand-holding-usd"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hand-lizard" >
							<input type="radio" name="iconfonts_name" data-name="hand-lizard" id="wn-fas wn-fa-hand-lizard" value="wn-fa-hand-lizard">
							<label for="wn-fas wn-fa-hand-lizard"><i class="wn-fas wn-fa-hand-lizard"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hand-paper" >
							<input type="radio" name="iconfonts_name" data-name="hand-paper" id="wn-fas wn-fa-hand-paper" value="wn-fa-hand-paper">
							<label for="wn-fas wn-fa-hand-paper"><i class="wn-fas wn-fa-hand-paper"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hand-peace" >
							<input type="radio" name="iconfonts_name" data-name="hand-peace" id="wn-fas wn-fa-hand-peace" value="wn-fa-hand-peace">
							<label for="wn-fas wn-fa-hand-peace"><i class="wn-fas wn-fa-hand-peace"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hand-point-down" >
							<input type="radio" name="iconfonts_name" data-name="hand-point-down" id="wn-fas wn-fa-hand-point-down" value="wn-fa-hand-point-down">
							<label for="wn-fas wn-fa-hand-point-down"><i class="wn-fas wn-fa-hand-point-down"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hand-point-left" >
							<input type="radio" name="iconfonts_name" data-name="hand-point-left" id="wn-fas wn-fa-hand-point-left" value="wn-fa-hand-point-left">
							<label for="wn-fas wn-fa-hand-point-left"><i class="wn-fas wn-fa-hand-point-left"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hand-point-right" >
							<input type="radio" name="iconfonts_name" data-name="hand-point-right" id="wn-fas wn-fa-hand-point-right" value="wn-fa-hand-point-right">
							<label for="wn-fas wn-fa-hand-point-right"><i class="wn-fas wn-fa-hand-point-right"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hand-point-up" >
							<input type="radio" name="iconfonts_name" data-name="hand-point-up" id="wn-fas wn-fa-hand-point-up" value="wn-fa-hand-point-up">
							<label for="wn-fas wn-fa-hand-point-up"><i class="wn-fas wn-fa-hand-point-up"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hand-pointer" >
							<input type="radio" name="iconfonts_name" data-name="hand-pointer" id="wn-fas wn-fa-hand-pointer" value="wn-fa-hand-pointer">
							<label for="wn-fas wn-fa-hand-pointer"><i class="wn-fas wn-fa-hand-pointer"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hand-rock" >
							<input type="radio" name="iconfonts_name" data-name="hand-rock" id="wn-fas wn-fa-hand-rock" value="wn-fa-hand-rock">
							<label for="wn-fas wn-fa-hand-rock"><i class="wn-fas wn-fa-hand-rock"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hand-scissors" >
							<input type="radio" name="iconfonts_name" data-name="hand-scissors" id="wn-fas wn-fa-hand-scissors" value="wn-fa-hand-scissors">
							<label for="wn-fas wn-fa-hand-scissors"><i class="wn-fas wn-fa-hand-scissors"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hand-spock" >
							<input type="radio" name="iconfonts_name" data-name="hand-spock" id="wn-fas wn-fa-hand-spock" value="wn-fa-hand-spock">
							<label for="wn-fas wn-fa-hand-spock"><i class="wn-fas wn-fa-hand-spock"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hands" >
							<input type="radio" name="iconfonts_name" data-name="hands" id="wn-fas wn-fa-hands" value="wn-fa-hands">
							<label for="wn-fas wn-fa-hands"><i class="wn-fas wn-fa-hands"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hands-helping" >
							<input type="radio" name="iconfonts_name" data-name="hands-helping" id="wn-fas wn-fa-hands-helping" value="wn-fa-hands-helping">
							<label for="wn-fas wn-fa-hands-helping"><i class="wn-fas wn-fa-hands-helping"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="handshake" >
							<input type="radio" name="iconfonts_name" data-name="handshake" id="wn-fas wn-fa-handshake" value="wn-fa-handshake">
							<label for="wn-fas wn-fa-handshake"><i class="wn-fas wn-fa-handshake"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hashtag" >
							<input type="radio" name="iconfonts_name" data-name="hashtag" id="wn-fas wn-fa-hashtag" value="wn-fa-hashtag">
							<label for="wn-fas wn-fa-hashtag"><i class="wn-fas wn-fa-hashtag"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hdd" >
							<input type="radio" name="iconfonts_name" data-name="hdd" id="wn-fas wn-fa-hdd" value="wn-fa-hdd">
							<label for="wn-fas wn-fa-hdd"><i class="wn-fas wn-fa-hdd"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="heading" >
							<input type="radio" name="iconfonts_name" data-name="heading" id="wn-fas wn-fa-heading" value="wn-fa-heading">
							<label for="wn-fas wn-fa-heading"><i class="wn-fas wn-fa-heading"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="headphones" >
							<input type="radio" name="iconfonts_name" data-name="headphones" id="wn-fas wn-fa-headphones" value="wn-fa-headphones">
							<label for="wn-fas wn-fa-headphones"><i class="wn-fas wn-fa-headphones"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="heart" >
							<input type="radio" name="iconfonts_name" data-name="heart" id="wn-fas wn-fa-heart" value="wn-fa-heart">
							<label for="wn-fas wn-fa-heart"><i class="wn-fas wn-fa-heart"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="heartbeat" >
							<input type="radio" name="iconfonts_name" data-name="heartbeat" id="wn-fas wn-fa-heartbeat" value="wn-fa-heartbeat">
							<label for="wn-fas wn-fa-heartbeat"><i class="wn-fas wn-fa-heartbeat"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="helicopter" >
							<input type="radio" name="iconfonts_name" data-name="helicopter" id="wn-fas wn-fa-helicopter" value="wn-fa-helicopter">
							<label for="wn-fas wn-fa-helicopter"><i class="wn-fas wn-fa-helicopter"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="history" >
							<input type="radio" name="iconfonts_name" data-name="history" id="wn-fas wn-fa-history" value="wn-fa-history">
							<label for="wn-fas wn-fa-history"><i class="wn-fas wn-fa-history"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hockey-puck" >
							<input type="radio" name="iconfonts_name" data-name="hockey-puck" id="wn-fas wn-fa-hockey-puck" value="wn-fa-hockey-puck">
							<label for="wn-fas wn-fa-hockey-puck"><i class="wn-fas wn-fa-hockey-puck"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="home" >
							<input type="radio" name="iconfonts_name" data-name="home" id="wn-fas wn-fa-home" value="wn-fa-home">
							<label for="wn-fas wn-fa-home"><i class="wn-fas wn-fa-home"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hospital" >
							<input type="radio" name="iconfonts_name" data-name="hospital" id="wn-fas wn-fa-hospital" value="wn-fa-hospital">
							<label for="wn-fas wn-fa-hospital"><i class="wn-fas wn-fa-hospital"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hospital-alt" >
							<input type="radio" name="iconfonts_name" data-name="hospital-alt" id="wn-fas wn-fa-hospital-alt" value="wn-fa-hospital-alt">
							<label for="wn-fas wn-fa-hospital-alt"><i class="wn-fas wn-fa-hospital-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hospital-symbol" >
							<input type="radio" name="iconfonts_name" data-name="hospital-symbol" id="wn-fas wn-fa-hospital-symbol" value="wn-fa-hospital-symbol">
							<label for="wn-fas wn-fa-hospital-symbol"><i class="wn-fas wn-fa-hospital-symbol"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hourglass" >
							<input type="radio" name="iconfonts_name" data-name="hourglass" id="wn-fas wn-fa-hourglass" value="wn-fa-hourglass">
							<label for="wn-fas wn-fa-hourglass"><i class="wn-fas wn-fa-hourglass"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hourglass-end" >
							<input type="radio" name="iconfonts_name" data-name="hourglass-end" id="wn-fas wn-fa-hourglass-end" value="wn-fa-hourglass-end">
							<label for="wn-fas wn-fa-hourglass-end"><i class="wn-fas wn-fa-hourglass-end"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hourglass-half" >
							<input type="radio" name="iconfonts_name" data-name="hourglass-half" id="wn-fas wn-fa-hourglass-half" value="wn-fa-hourglass-half">
							<label for="wn-fas wn-fa-hourglass-half"><i class="wn-fas wn-fa-hourglass-half"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hourglass-start" >
							<input type="radio" name="iconfonts_name" data-name="hourglass-start" id="wn-fas wn-fa-hourglass-start" value="wn-fa-hourglass-start">
							<label for="wn-fas wn-fa-hourglass-start"><i class="wn-fas wn-fa-hourglass-start"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="i-cursor" >
							<input type="radio" name="iconfonts_name" data-name="i-cursor" id="wn-fas wn-fa-i-cursor" value="wn-fa-i-cursor">
							<label for="wn-fas wn-fa-i-cursor"><i class="wn-fas wn-fa-i-cursor"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="id-badge" >
							<input type="radio" name="iconfonts_name" data-name="id-badge" id="wn-fas wn-fa-id-badge" value="wn-fa-id-badge">
							<label for="wn-fas wn-fa-id-badge"><i class="wn-fas wn-fa-id-badge"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="id-card" >
							<input type="radio" name="iconfonts_name" data-name="id-card" id="wn-fas wn-fa-id-card" value="wn-fa-id-card">
							<label for="wn-fas wn-fa-id-card"><i class="wn-fas wn-fa-id-card"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="id-card-alt" >
							<input type="radio" name="iconfonts_name" data-name="id-card-alt" id="wn-fas wn-fa-id-card-alt" value="wn-fa-id-card-alt">
							<label for="wn-fas wn-fa-id-card-alt"><i class="wn-fas wn-fa-id-card-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="image" >
							<input type="radio" name="iconfonts_name" data-name="image" id="wn-fas wn-fa-image" value="wn-fa-image">
							<label for="wn-fas wn-fa-image"><i class="wn-fas wn-fa-image"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="images" >
							<input type="radio" name="iconfonts_name" data-name="images" id="wn-fas wn-fa-images" value="wn-fa-images">
							<label for="wn-fas wn-fa-images"><i class="wn-fas wn-fa-images"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="inbox" >
							<input type="radio" name="iconfonts_name" data-name="inbox" id="wn-fas wn-fa-inbox" value="wn-fa-inbox">
							<label for="wn-fas wn-fa-inbox"><i class="wn-fas wn-fa-inbox"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="indent" >
							<input type="radio" name="iconfonts_name" data-name="indent" id="wn-fas wn-fa-indent" value="wn-fa-indent">
							<label for="wn-fas wn-fa-indent"><i class="wn-fas wn-fa-indent"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="industry" >
							<input type="radio" name="iconfonts_name" data-name="industry" id="wn-fas wn-fa-industry" value="wn-fa-industry">
							<label for="wn-fas wn-fa-industry"><i class="wn-fas wn-fa-industry"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="infinity" >
							<input type="radio" name="iconfonts_name" data-name="infinity" id="wn-fas wn-fa-infinity" value="wn-fa-infinity">
							<label for="wn-fas wn-fa-infinity"><i class="wn-fas wn-fa-infinity"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="info" >
							<input type="radio" name="iconfonts_name" data-name="info" id="wn-fas wn-fa-info" value="wn-fa-info">
							<label for="wn-fas wn-fa-info"><i class="wn-fas wn-fa-info"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="info-circle" >
							<input type="radio" name="iconfonts_name" data-name="info-circle" id="wn-fas wn-fa-info-circle" value="wn-fa-info-circle">
							<label for="wn-fas wn-fa-info-circle"><i class="wn-fas wn-fa-info-circle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="italic" >
							<input type="radio" name="iconfonts_name" data-name="italic" id="wn-fas wn-fa-italic" value="wn-fa-italic">
							<label for="wn-fas wn-fa-italic"><i class="wn-fas wn-fa-italic"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="key" >
							<input type="radio" name="iconfonts_name" data-name="key" id="wn-fas wn-fa-key" value="wn-fa-key">
							<label for="wn-fas wn-fa-key"><i class="wn-fas wn-fa-key"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="keyboard" >
							<input type="radio" name="iconfonts_name" data-name="keyboard" id="wn-fas wn-fa-keyboard" value="wn-fa-keyboard">
							<label for="wn-fas wn-fa-keyboard"><i class="wn-fas wn-fa-keyboard"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="kiwi-bird" >
							<input type="radio" name="iconfonts_name" data-name="kiwi-bird" id="wn-fas wn-fa-kiwi-bird" value="wn-fa-kiwi-bird">
							<label for="wn-fas wn-fa-kiwi-bird"><i class="wn-fas wn-fa-kiwi-bird"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="language" >
							<input type="radio" name="iconfonts_name" data-name="language" id="wn-fas wn-fa-language" value="wn-fa-language">
							<label for="wn-fas wn-fa-language"><i class="wn-fas wn-fa-language"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="laptop" >
							<input type="radio" name="iconfonts_name" data-name="laptop" id="wn-fas wn-fa-laptop" value="wn-fa-laptop">
							<label for="wn-fas wn-fa-laptop"><i class="wn-fas wn-fa-laptop"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="leaf" >
							<input type="radio" name="iconfonts_name" data-name="leaf" id="wn-fas wn-fa-leaf" value="wn-fa-leaf">
							<label for="wn-fas wn-fa-leaf"><i class="wn-fas wn-fa-leaf"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="lemon" >
							<input type="radio" name="iconfonts_name" data-name="lemon" id="wn-fas wn-fa-lemon" value="wn-fa-lemon">
							<label for="wn-fas wn-fa-lemon"><i class="wn-fas wn-fa-lemon"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="less-than" >
							<input type="radio" name="iconfonts_name" data-name="less-than" id="wn-fas wn-fa-less-than" value="wn-fa-less-than">
							<label for="wn-fas wn-fa-less-than"><i class="wn-fas wn-fa-less-than"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="less-than-equal" >
							<input type="radio" name="iconfonts_name" data-name="less-than-equal" id="wn-fas wn-fa-less-than-equal" value="wn-fa-less-than-equal">
							<label for="wn-fas wn-fa-less-than-equal"><i class="wn-fas wn-fa-less-than-equal"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="level-down-alt" >
							<input type="radio" name="iconfonts_name" data-name="level-down-alt" id="wn-fas wn-fa-level-down-alt" value="wn-fa-level-down-alt">
							<label for="wn-fas wn-fa-level-down-alt"><i class="wn-fas wn-fa-level-down-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="level-up-alt" >
							<input type="radio" name="iconfonts_name" data-name="level-up-alt" id="wn-fas wn-fa-level-up-alt" value="wn-fa-level-up-alt">
							<label for="wn-fas wn-fa-level-up-alt"><i class="wn-fas wn-fa-level-up-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="life-ring" >
							<input type="radio" name="iconfonts_name" data-name="life-ring" id="wn-fas wn-fa-life-ring" value="wn-fa-life-ring">
							<label for="wn-fas wn-fa-life-ring"><i class="wn-fas wn-fa-life-ring"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="lightbulb" >
							<input type="radio" name="iconfonts_name" data-name="lightbulb" id="wn-fas wn-fa-lightbulb" value="wn-fa-lightbulb">
							<label for="wn-fas wn-fa-lightbulb"><i class="wn-fas wn-fa-lightbulb"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="link" >
							<input type="radio" name="iconfonts_name" data-name="link" id="wn-fas wn-fa-link" value="wn-fa-link">
							<label for="wn-fas wn-fa-link"><i class="wn-fas wn-fa-link"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="lira-sign" >
							<input type="radio" name="iconfonts_name" data-name="lira-sign" id="wn-fas wn-fa-lira-sign" value="wn-fa-lira-sign">
							<label for="wn-fas wn-fa-lira-sign"><i class="wn-fas wn-fa-lira-sign"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="list" >
							<input type="radio" name="iconfonts_name" data-name="list" id="wn-fas wn-fa-list" value="wn-fa-list">
							<label for="wn-fas wn-fa-list"><i class="wn-fas wn-fa-list"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="list-alt" >
							<input type="radio" name="iconfonts_name" data-name="list-alt" id="wn-fas wn-fa-list-alt" value="wn-fa-list-alt">
							<label for="wn-fas wn-fa-list-alt"><i class="wn-fas wn-fa-list-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="list-ol" >
							<input type="radio" name="iconfonts_name" data-name="list-ol" id="wn-fas wn-fa-list-ol" value="wn-fa-list-ol">
							<label for="wn-fas wn-fa-list-ol"><i class="wn-fas wn-fa-list-ol"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="list-ul" >
							<input type="radio" name="iconfonts_name" data-name="list-ul" id="wn-fas wn-fa-list-ul" value="wn-fa-list-ul">
							<label for="wn-fas wn-fa-list-ul"><i class="wn-fas wn-fa-list-ul"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="location-arrow" >
							<input type="radio" name="iconfonts_name" data-name="location-arrow" id="wn-fas wn-fa-location-arrow" value="wn-fa-location-arrow">
							<label for="wn-fas wn-fa-location-arrow"><i class="wn-fas wn-fa-location-arrow"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="lock" >
							<input type="radio" name="iconfonts_name" data-name="lock" id="wn-fas wn-fa-lock" value="wn-fa-lock">
							<label for="wn-fas wn-fa-lock"><i class="wn-fas wn-fa-lock"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="lock-open" >
							<input type="radio" name="iconfonts_name" data-name="lock-open" id="wn-fas wn-fa-lock-open" value="wn-fa-lock-open">
							<label for="wn-fas wn-fa-lock-open"><i class="wn-fas wn-fa-lock-open"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="long-arrow-alt-down" >
							<input type="radio" name="iconfonts_name" data-name="long-arrow-alt-down" id="wn-fas wn-fa-long-arrow-alt-down" value="wn-fa-long-arrow-alt-down">
							<label for="wn-fas wn-fa-long-arrow-alt-down"><i class="wn-fas wn-fa-long-arrow-alt-down"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="long-arrow-alt-left" >
							<input type="radio" name="iconfonts_name" data-name="long-arrow-alt-left" id="wn-fas wn-fa-long-arrow-alt-left" value="wn-fa-long-arrow-alt-left">
							<label for="wn-fas wn-fa-long-arrow-alt-left"><i class="wn-fas wn-fa-long-arrow-alt-left"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="long-arrow-alt-right" >
							<input type="radio" name="iconfonts_name" data-name="long-arrow-alt-right" id="wn-fas wn-fa-long-arrow-alt-right" value="wn-fa-long-arrow-alt-right">
							<label for="wn-fas wn-fa-long-arrow-alt-right"><i class="wn-fas wn-fa-long-arrow-alt-right"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="long-arrow-alt-up" >
							<input type="radio" name="iconfonts_name" data-name="long-arrow-alt-up" id="wn-fas wn-fa-long-arrow-alt-up" value="wn-fa-long-arrow-alt-up">
							<label for="wn-fas wn-fa-long-arrow-alt-up"><i class="wn-fas wn-fa-long-arrow-alt-up"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="low-vision" >
							<input type="radio" name="iconfonts_name" data-name="low-vision" id="wn-fas wn-fa-low-vision" value="wn-fa-low-vision">
							<label for="wn-fas wn-fa-low-vision"><i class="wn-fas wn-fa-low-vision"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="magic" >
							<input type="radio" name="iconfonts_name" data-name="magic" id="wn-fas wn-fa-magic" value="wn-fa-magic">
							<label for="wn-fas wn-fa-magic"><i class="wn-fas wn-fa-magic"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="magnet" >
							<input type="radio" name="iconfonts_name" data-name="magnet" id="wn-fas wn-fa-magnet" value="wn-fa-magnet">
							<label for="wn-fas wn-fa-magnet"><i class="wn-fas wn-fa-magnet"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="male" >
							<input type="radio" name="iconfonts_name" data-name="male" id="wn-fas wn-fa-male" value="wn-fa-male">
							<label for="wn-fas wn-fa-male"><i class="wn-fas wn-fa-male"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="map" >
							<input type="radio" name="iconfonts_name" data-name="map" id="wn-fas wn-fa-map" value="wn-fa-map">
							<label for="wn-fas wn-fa-map"><i class="wn-fas wn-fa-map"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="map-marker" >
							<input type="radio" name="iconfonts_name" data-name="map-marker" id="wn-fas wn-fa-map-marker" value="wn-fa-map-marker">
							<label for="wn-fas wn-fa-map-marker"><i class="wn-fas wn-fa-map-marker"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="map-marker-alt" >
							<input type="radio" name="iconfonts_name" data-name="map-marker-alt" id="wn-fas wn-fa-map-marker-alt" value="wn-fa-map-marker-alt">
							<label for="wn-fas wn-fa-map-marker-alt"><i class="wn-fas wn-fa-map-marker-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="map-pin" >
							<input type="radio" name="iconfonts_name" data-name="map-pin" id="wn-fas wn-fa-map-pin" value="wn-fa-map-pin">
							<label for="wn-fas wn-fa-map-pin"><i class="wn-fas wn-fa-map-pin"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="map-signs" >
							<input type="radio" name="iconfonts_name" data-name="map-signs" id="wn-fas wn-fa-map-signs" value="wn-fa-map-signs">
							<label for="wn-fas wn-fa-map-signs"><i class="wn-fas wn-fa-map-signs"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="mars" >
							<input type="radio" name="iconfonts_name" data-name="mars" id="wn-fas wn-fa-mars" value="wn-fa-mars">
							<label for="wn-fas wn-fa-mars"><i class="wn-fas wn-fa-mars"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="mars-double" >
							<input type="radio" name="iconfonts_name" data-name="mars-double" id="wn-fas wn-fa-mars-double" value="wn-fa-mars-double">
							<label for="wn-fas wn-fa-mars-double"><i class="wn-fas wn-fa-mars-double"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="mars-stroke" >
							<input type="radio" name="iconfonts_name" data-name="mars-stroke" id="wn-fas wn-fa-mars-stroke" value="wn-fa-mars-stroke">
							<label for="wn-fas wn-fa-mars-stroke"><i class="wn-fas wn-fa-mars-stroke"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="mars-stroke-h" >
							<input type="radio" name="iconfonts_name" data-name="mars-stroke-h" id="wn-fas wn-fa-mars-stroke-h" value="wn-fa-mars-stroke-h">
							<label for="wn-fas wn-fa-mars-stroke-h"><i class="wn-fas wn-fa-mars-stroke-h"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="mars-stroke-v" >
							<input type="radio" name="iconfonts_name" data-name="mars-stroke-v" id="wn-fas wn-fa-mars-stroke-v" value="wn-fa-mars-stroke-v">
							<label for="wn-fas wn-fa-mars-stroke-v"><i class="wn-fas wn-fa-mars-stroke-v"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="medkit" >
							<input type="radio" name="iconfonts_name" data-name="medkit" id="wn-fas wn-fa-medkit" value="wn-fa-medkit">
							<label for="wn-fas wn-fa-medkit"><i class="wn-fas wn-fa-medkit"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="meh" >
							<input type="radio" name="iconfonts_name" data-name="meh" id="wn-fas wn-fa-meh" value="wn-fa-meh">
							<label for="wn-fas wn-fa-meh"><i class="wn-fas wn-fa-meh"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="memory" >
							<input type="radio" name="iconfonts_name" data-name="memory" id="wn-fas wn-fa-memory" value="wn-fa-memory">
							<label for="wn-fas wn-fa-memory"><i class="wn-fas wn-fa-memory"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="mercury" >
							<input type="radio" name="iconfonts_name" data-name="mercury" id="wn-fas wn-fa-mercury" value="wn-fa-mercury">
							<label for="wn-fas wn-fa-mercury"><i class="wn-fas wn-fa-mercury"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="microchip" >
							<input type="radio" name="iconfonts_name" data-name="microchip" id="wn-fas wn-fa-microchip" value="wn-fa-microchip">
							<label for="wn-fas wn-fa-microchip"><i class="wn-fas wn-fa-microchip"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="microphone" >
							<input type="radio" name="iconfonts_name" data-name="microphone" id="wn-fas wn-fa-microphone" value="wn-fa-microphone">
							<label for="wn-fas wn-fa-microphone"><i class="wn-fas wn-fa-microphone"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="microphone-alt" >
							<input type="radio" name="iconfonts_name" data-name="microphone-alt" id="wn-fas wn-fa-microphone-alt" value="wn-fa-microphone-alt">
							<label for="wn-fas wn-fa-microphone-alt"><i class="wn-fas wn-fa-microphone-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="microphone-alt-slash" >
							<input type="radio" name="iconfonts_name" data-name="microphone-alt-slash" id="wn-fas wn-fa-microphone-alt-slash" value="wn-fa-microphone-alt-slash">
							<label for="wn-fas wn-fa-microphone-alt-slash"><i class="wn-fas wn-fa-microphone-alt-slash"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="microphone-slash" >
							<input type="radio" name="iconfonts_name" data-name="microphone-slash" id="wn-fas wn-fa-microphone-slash" value="wn-fa-microphone-slash">
							<label for="wn-fas wn-fa-microphone-slash"><i class="wn-fas wn-fa-microphone-slash"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="minus" >
							<input type="radio" name="iconfonts_name" data-name="minus" id="wn-fas wn-fa-minus" value="wn-fa-minus">
							<label for="wn-fas wn-fa-minus"><i class="wn-fas wn-fa-minus"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="minus-circle" >
							<input type="radio" name="iconfonts_name" data-name="minus-circle" id="wn-fas wn-fa-minus-circle" value="wn-fa-minus-circle">
							<label for="wn-fas wn-fa-minus-circle"><i class="wn-fas wn-fa-minus-circle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="minus-square" >
							<input type="radio" name="iconfonts_name" data-name="minus-square" id="wn-fas wn-fa-minus-square" value="wn-fa-minus-square">
							<label for="wn-fas wn-fa-minus-square"><i class="wn-fas wn-fa-minus-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="mobile" >
							<input type="radio" name="iconfonts_name" data-name="mobile" id="wn-fas wn-fa-mobile" value="wn-fa-mobile">
							<label for="wn-fas wn-fa-mobile"><i class="wn-fas wn-fa-mobile"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="mobile-alt" >
							<input type="radio" name="iconfonts_name" data-name="mobile-alt" id="wn-fas wn-fa-mobile-alt" value="wn-fa-mobile-alt">
							<label for="wn-fas wn-fa-mobile-alt"><i class="wn-fas wn-fa-mobile-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="money-bill" >
							<input type="radio" name="iconfonts_name" data-name="money-bill" id="wn-fas wn-fa-money-bill" value="wn-fa-money-bill">
							<label for="wn-fas wn-fa-money-bill"><i class="wn-fas wn-fa-money-bill"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="money-bill-alt" >
							<input type="radio" name="iconfonts_name" data-name="money-bill-alt" id="wn-fas wn-fa-money-bill-alt" value="wn-fa-money-bill-alt">
							<label for="wn-fas wn-fa-money-bill-alt"><i class="wn-fas wn-fa-money-bill-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="money-bill-wave" >
							<input type="radio" name="iconfonts_name" data-name="money-bill-wave" id="wn-fas wn-fa-money-bill-wave" value="wn-fa-money-bill-wave">
							<label for="wn-fas wn-fa-money-bill-wave"><i class="wn-fas wn-fa-money-bill-wave"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="money-bill-wave-alt" >
							<input type="radio" name="iconfonts_name" data-name="money-bill-wave-alt" id="wn-fas wn-fa-money-bill-wave-alt" value="wn-fa-money-bill-wave-alt">
							<label for="wn-fas wn-fa-money-bill-wave-alt"><i class="wn-fas wn-fa-money-bill-wave-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="money-check" >
							<input type="radio" name="iconfonts_name" data-name="money-check" id="wn-fas wn-fa-money-check" value="wn-fa-money-check">
							<label for="wn-fas wn-fa-money-check"><i class="wn-fas wn-fa-money-check"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="money-check-alt" >
							<input type="radio" name="iconfonts_name" data-name="money-check-alt" id="wn-fas wn-fa-money-check-alt" value="wn-fa-money-check-alt">
							<label for="wn-fas wn-fa-money-check-alt"><i class="wn-fas wn-fa-money-check-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="moon" >
							<input type="radio" name="iconfonts_name" data-name="moon" id="wn-fas wn-fa-moon" value="wn-fa-moon">
							<label for="wn-fas wn-fa-moon"><i class="wn-fas wn-fa-moon"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="motorcycle" >
							<input type="radio" name="iconfonts_name" data-name="motorcycle" id="wn-fas wn-fa-motorcycle" value="wn-fa-motorcycle">
							<label for="wn-fas wn-fa-motorcycle"><i class="wn-fas wn-fa-motorcycle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="mouse-pointer" >
							<input type="radio" name="iconfonts_name" data-name="mouse-pointer" id="wn-fas wn-fa-mouse-pointer" value="wn-fa-mouse-pointer">
							<label for="wn-fas wn-fa-mouse-pointer"><i class="wn-fas wn-fa-mouse-pointer"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="music" >
							<input type="radio" name="iconfonts_name" data-name="music" id="wn-fas wn-fa-music" value="wn-fa-music">
							<label for="wn-fas wn-fa-music"><i class="wn-fas wn-fa-music"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="neuter" >
							<input type="radio" name="iconfonts_name" data-name="neuter" id="wn-fas wn-fa-neuter" value="wn-fa-neuter">
							<label for="wn-fas wn-fa-neuter"><i class="wn-fas wn-fa-neuter"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="newspaper" >
							<input type="radio" name="iconfonts_name" data-name="newspaper" id="wn-fas wn-fa-newspaper" value="wn-fa-newspaper">
							<label for="wn-fas wn-fa-newspaper"><i class="wn-fas wn-fa-newspaper"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="not-equal" >
							<input type="radio" name="iconfonts_name" data-name="not-equal" id="wn-fas wn-fa-not-equal" value="wn-fa-not-equal">
							<label for="wn-fas wn-fa-not-equal"><i class="wn-fas wn-fa-not-equal"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="notes-medical" >
							<input type="radio" name="iconfonts_name" data-name="notes-medical" id="wn-fas wn-fa-notes-medical" value="wn-fa-notes-medical">
							<label for="wn-fas wn-fa-notes-medical"><i class="wn-fas wn-fa-notes-medical"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="object-group" >
							<input type="radio" name="iconfonts_name" data-name="object-group" id="wn-fas wn-fa-object-group" value="wn-fa-object-group">
							<label for="wn-fas wn-fa-object-group"><i class="wn-fas wn-fa-object-group"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="object-ungroup" >
							<input type="radio" name="iconfonts_name" data-name="object-ungroup" id="wn-fas wn-fa-object-ungroup" value="wn-fa-object-ungroup">
							<label for="wn-fas wn-fa-object-ungroup"><i class="wn-fas wn-fa-object-ungroup"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="outdent" >
							<input type="radio" name="iconfonts_name" data-name="outdent" id="wn-fas wn-fa-outdent" value="wn-fa-outdent">
							<label for="wn-fas wn-fa-outdent"><i class="wn-fas wn-fa-outdent"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="paint-brush" >
							<input type="radio" name="iconfonts_name" data-name="paint-brush" id="wn-fas wn-fa-paint-brush" value="wn-fa-paint-brush">
							<label for="wn-fas wn-fa-paint-brush"><i class="wn-fas wn-fa-paint-brush"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="palette" >
							<input type="radio" name="iconfonts_name" data-name="palette" id="wn-fas wn-fa-palette" value="wn-fa-palette">
							<label for="wn-fas wn-fa-palette"><i class="wn-fas wn-fa-palette"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="pallet" >
							<input type="radio" name="iconfonts_name" data-name="pallet" id="wn-fas wn-fa-pallet" value="wn-fa-pallet">
							<label for="wn-fas wn-fa-pallet"><i class="wn-fas wn-fa-pallet"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="paper-plane" >
							<input type="radio" name="iconfonts_name" data-name="paper-plane" id="wn-fas wn-fa-paper-plane" value="wn-fa-paper-plane">
							<label for="wn-fas wn-fa-paper-plane"><i class="wn-fas wn-fa-paper-plane"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="paperclip" >
							<input type="radio" name="iconfonts_name" data-name="paperclip" id="wn-fas wn-fa-paperclip" value="wn-fa-paperclip">
							<label for="wn-fas wn-fa-paperclip"><i class="wn-fas wn-fa-paperclip"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="parachute-box" >
							<input type="radio" name="iconfonts_name" data-name="parachute-box" id="wn-fas wn-fa-parachute-box" value="wn-fa-parachute-box">
							<label for="wn-fas wn-fa-parachute-box"><i class="wn-fas wn-fa-parachute-box"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="paragraph" >
							<input type="radio" name="iconfonts_name" data-name="paragraph" id="wn-fas wn-fa-paragraph" value="wn-fa-paragraph">
							<label for="wn-fas wn-fa-paragraph"><i class="wn-fas wn-fa-paragraph"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="parking" >
							<input type="radio" name="iconfonts_name" data-name="parking" id="wn-fas wn-fa-parking" value="wn-fa-parking">
							<label for="wn-fas wn-fa-parking"><i class="wn-fas wn-fa-parking"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="paste" >
							<input type="radio" name="iconfonts_name" data-name="paste" id="wn-fas wn-fa-paste" value="wn-fa-paste">
							<label for="wn-fas wn-fa-paste"><i class="wn-fas wn-fa-paste"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="pause" >
							<input type="radio" name="iconfonts_name" data-name="pause" id="wn-fas wn-fa-pause" value="wn-fa-pause">
							<label for="wn-fas wn-fa-pause"><i class="wn-fas wn-fa-pause"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="pause-circle" >
							<input type="radio" name="iconfonts_name" data-name="pause-circle" id="wn-fas wn-fa-pause-circle" value="wn-fa-pause-circle">
							<label for="wn-fas wn-fa-pause-circle"><i class="wn-fas wn-fa-pause-circle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="paw" >
							<input type="radio" name="iconfonts_name" data-name="paw" id="wn-fas wn-fa-paw" value="wn-fa-paw">
							<label for="wn-fas wn-fa-paw"><i class="wn-fas wn-fa-paw"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="pen-square" >
							<input type="radio" name="iconfonts_name" data-name="pen-square" id="wn-fas wn-fa-pen-square" value="wn-fa-pen-square">
							<label for="wn-fas wn-fa-pen-square"><i class="wn-fas wn-fa-pen-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="pencil-alt" >
							<input type="radio" name="iconfonts_name" data-name="pencil-alt" id="wn-fas wn-fa-pencil-alt" value="wn-fa-pencil-alt">
							<label for="wn-fas wn-fa-pencil-alt"><i class="wn-fas wn-fa-pencil-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="people-carry" >
							<input type="radio" name="iconfonts_name" data-name="people-carry" id="wn-fas wn-fa-people-carry" value="wn-fa-people-carry">
							<label for="wn-fas wn-fa-people-carry"><i class="wn-fas wn-fa-people-carry"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="percent" >
							<input type="radio" name="iconfonts_name" data-name="percent" id="wn-fas wn-fa-percent" value="wn-fa-percent">
							<label for="wn-fas wn-fa-percent"><i class="wn-fas wn-fa-percent"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="percentage" >
							<input type="radio" name="iconfonts_name" data-name="percentage" id="wn-fas wn-fa-percentage" value="wn-fa-percentage">
							<label for="wn-fas wn-fa-percentage"><i class="wn-fas wn-fa-percentage"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="phone" >
							<input type="radio" name="iconfonts_name" data-name="phone" id="wn-fas wn-fa-phone" value="wn-fa-phone">
							<label for="wn-fas wn-fa-phone"><i class="wn-fas wn-fa-phone"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="phone-slash" >
							<input type="radio" name="iconfonts_name" data-name="phone-slash" id="wn-fas wn-fa-phone-slash" value="wn-fa-phone-slash">
							<label for="wn-fas wn-fa-phone-slash"><i class="wn-fas wn-fa-phone-slash"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="phone-square" >
							<input type="radio" name="iconfonts_name" data-name="phone-square" id="wn-fas wn-fa-phone-square" value="wn-fa-phone-square">
							<label for="wn-fas wn-fa-phone-square"><i class="wn-fas wn-fa-phone-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="phone-volume" >
							<input type="radio" name="iconfonts_name" data-name="phone-volume" id="wn-fas wn-fa-phone-volume" value="wn-fa-phone-volume">
							<label for="wn-fas wn-fa-phone-volume"><i class="wn-fas wn-fa-phone-volume"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="piggy-bank" >
							<input type="radio" name="iconfonts_name" data-name="piggy-bank" id="wn-fas wn-fa-piggy-bank" value="wn-fa-piggy-bank">
							<label for="wn-fas wn-fa-piggy-bank"><i class="wn-fas wn-fa-piggy-bank"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="pills" >
							<input type="radio" name="iconfonts_name" data-name="pills" id="wn-fas wn-fa-pills" value="wn-fa-pills">
							<label for="wn-fas wn-fa-pills"><i class="wn-fas wn-fa-pills"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="plane" >
							<input type="radio" name="iconfonts_name" data-name="plane" id="wn-fas wn-fa-plane" value="wn-fa-plane">
							<label for="wn-fas wn-fa-plane"><i class="wn-fas wn-fa-plane"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="play" >
							<input type="radio" name="iconfonts_name" data-name="play" id="wn-fas wn-fa-play" value="wn-fa-play">
							<label for="wn-fas wn-fa-play"><i class="wn-fas wn-fa-play"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="play-circle" >
							<input type="radio" name="iconfonts_name" data-name="play-circle" id="wn-fas wn-fa-play-circle" value="wn-fa-play-circle">
							<label for="wn-fas wn-fa-play-circle"><i class="wn-fas wn-fa-play-circle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="plug" >
							<input type="radio" name="iconfonts_name" data-name="plug" id="wn-fas wn-fa-plug" value="wn-fa-plug">
							<label for="wn-fas wn-fa-plug"><i class="wn-fas wn-fa-plug"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="plus" >
							<input type="radio" name="iconfonts_name" data-name="plus" id="wn-fas wn-fa-plus" value="wn-fa-plus">
							<label for="wn-fas wn-fa-plus"><i class="wn-fas wn-fa-plus"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="plus-circle" >
							<input type="radio" name="iconfonts_name" data-name="plus-circle" id="wn-fas wn-fa-plus-circle" value="wn-fa-plus-circle">
							<label for="wn-fas wn-fa-plus-circle"><i class="wn-fas wn-fa-plus-circle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="plus-square" >
							<input type="radio" name="iconfonts_name" data-name="plus-square" id="wn-fas wn-fa-plus-square" value="wn-fa-plus-square">
							<label for="wn-fas wn-fa-plus-square"><i class="wn-fas wn-fa-plus-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="podcast" >
							<input type="radio" name="iconfonts_name" data-name="podcast" id="wn-fas wn-fa-podcast" value="wn-fa-podcast">
							<label for="wn-fas wn-fa-podcast"><i class="wn-fas wn-fa-podcast"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="poo" >
							<input type="radio" name="iconfonts_name" data-name="poo" id="wn-fas wn-fa-poo" value="wn-fa-poo">
							<label for="wn-fas wn-fa-poo"><i class="wn-fas wn-fa-poo"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="portrait" >
							<input type="radio" name="iconfonts_name" data-name="portrait" id="wn-fas wn-fa-portrait" value="wn-fa-portrait">
							<label for="wn-fas wn-fa-portrait"><i class="wn-fas wn-fa-portrait"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="pound-sign" >
							<input type="radio" name="iconfonts_name" data-name="pound-sign" id="wn-fas wn-fa-pound-sign" value="wn-fa-pound-sign">
							<label for="wn-fas wn-fa-pound-sign"><i class="wn-fas wn-fa-pound-sign"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="power-off" >
							<input type="radio" name="iconfonts_name" data-name="power-off" id="wn-fas wn-fa-power-off" value="wn-fa-power-off">
							<label for="wn-fas wn-fa-power-off"><i class="wn-fas wn-fa-power-off"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="prescription-bottle" >
							<input type="radio" name="iconfonts_name" data-name="prescription-bottle" id="wn-fas wn-fa-prescription-bottle" value="wn-fa-prescription-bottle">
							<label for="wn-fas wn-fa-prescription-bottle"><i class="wn-fas wn-fa-prescription-bottle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="prescription-bottle-alt" >
							<input type="radio" name="iconfonts_name" data-name="prescription-bottle-alt" id="wn-fas wn-fa-prescription-bottle-alt" value="wn-fa-prescription-bottle-alt">
							<label for="wn-fas wn-fa-prescription-bottle-alt"><i class="wn-fas wn-fa-prescription-bottle-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="print" >
							<input type="radio" name="iconfonts_name" data-name="print" id="wn-fas wn-fa-print" value="wn-fa-print">
							<label for="wn-fas wn-fa-print"><i class="wn-fas wn-fa-print"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="procedures" >
							<input type="radio" name="iconfonts_name" data-name="procedures" id="wn-fas wn-fa-procedures" value="wn-fa-procedures">
							<label for="wn-fas wn-fa-procedures"><i class="wn-fas wn-fa-procedures"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="project-diagram" >
							<input type="radio" name="iconfonts_name" data-name="project-diagram" id="wn-fas wn-fa-project-diagram" value="wn-fa-project-diagram">
							<label for="wn-fas wn-fa-project-diagram"><i class="wn-fas wn-fa-project-diagram"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="puzzle-piece" >
							<input type="radio" name="iconfonts_name" data-name="puzzle-piece" id="wn-fas wn-fa-puzzle-piece" value="wn-fa-puzzle-piece">
							<label for="wn-fas wn-fa-puzzle-piece"><i class="wn-fas wn-fa-puzzle-piece"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="qrcode" >
							<input type="radio" name="iconfonts_name" data-name="qrcode" id="wn-fas wn-fa-qrcode" value="wn-fa-qrcode">
							<label for="wn-fas wn-fa-qrcode"><i class="wn-fas wn-fa-qrcode"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="question" >
							<input type="radio" name="iconfonts_name" data-name="question" id="wn-fas wn-fa-question" value="wn-fa-question">
							<label for="wn-fas wn-fa-question"><i class="wn-fas wn-fa-question"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="question-circle" >
							<input type="radio" name="iconfonts_name" data-name="question-circle" id="wn-fas wn-fa-question-circle" value="wn-fa-question-circle">
							<label for="wn-fas wn-fa-question-circle"><i class="wn-fas wn-fa-question-circle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="quidditch" >
							<input type="radio" name="iconfonts_name" data-name="quidditch" id="wn-fas wn-fa-quidditch" value="wn-fa-quidditch">
							<label for="wn-fas wn-fa-quidditch"><i class="wn-fas wn-fa-quidditch"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="quote-left" >
							<input type="radio" name="iconfonts_name" data-name="quote-left" id="wn-fas wn-fa-quote-left" value="wn-fa-quote-left">
							<label for="wn-fas wn-fa-quote-left"><i class="wn-fas wn-fa-quote-left"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="quote-right" >
							<input type="radio" name="iconfonts_name" data-name="quote-right" id="wn-fas wn-fa-quote-right" value="wn-fa-quote-right">
							<label for="wn-fas wn-fa-quote-right"><i class="wn-fas wn-fa-quote-right"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="random" >
							<input type="radio" name="iconfonts_name" data-name="random" id="wn-fas wn-fa-random" value="wn-fa-random">
							<label for="wn-fas wn-fa-random"><i class="wn-fas wn-fa-random"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="receipt" >
							<input type="radio" name="iconfonts_name" data-name="receipt" id="wn-fas wn-fa-receipt" value="wn-fa-receipt">
							<label for="wn-fas wn-fa-receipt"><i class="wn-fas wn-fa-receipt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="recycle" >
							<input type="radio" name="iconfonts_name" data-name="recycle" id="wn-fas wn-fa-recycle" value="wn-fa-recycle">
							<label for="wn-fas wn-fa-recycle"><i class="wn-fas wn-fa-recycle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="redo" >
							<input type="radio" name="iconfonts_name" data-name="redo" id="wn-fas wn-fa-redo" value="wn-fa-redo">
							<label for="wn-fas wn-fa-redo"><i class="wn-fas wn-fa-redo"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="redo-alt" >
							<input type="radio" name="iconfonts_name" data-name="redo-alt" id="wn-fas wn-fa-redo-alt" value="wn-fa-redo-alt">
							<label for="wn-fas wn-fa-redo-alt"><i class="wn-fas wn-fa-redo-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="registered" >
							<input type="radio" name="iconfonts_name" data-name="registered" id="wn-fas wn-fa-registered" value="wn-fa-registered">
							<label for="wn-fas wn-fa-registered"><i class="wn-fas wn-fa-registered"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="reply" >
							<input type="radio" name="iconfonts_name" data-name="reply" id="wn-fas wn-fa-reply" value="wn-fa-reply">
							<label for="wn-fas wn-fa-reply"><i class="wn-fas wn-fa-reply"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="reply-all" >
							<input type="radio" name="iconfonts_name" data-name="reply-all" id="wn-fas wn-fa-reply-all" value="wn-fa-reply-all">
							<label for="wn-fas wn-fa-reply-all"><i class="wn-fas wn-fa-reply-all"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="retweet" >
							<input type="radio" name="iconfonts_name" data-name="retweet" id="wn-fas wn-fa-retweet" value="wn-fa-retweet">
							<label for="wn-fas wn-fa-retweet"><i class="wn-fas wn-fa-retweet"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="ribbon" >
							<input type="radio" name="iconfonts_name" data-name="ribbon" id="wn-fas wn-fa-ribbon" value="wn-fa-ribbon">
							<label for="wn-fas wn-fa-ribbon"><i class="wn-fas wn-fa-ribbon"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="road" >
							<input type="radio" name="iconfonts_name" data-name="road" id="wn-fas wn-fa-road" value="wn-fa-road">
							<label for="wn-fas wn-fa-road"><i class="wn-fas wn-fa-road"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="robot" >
							<input type="radio" name="iconfonts_name" data-name="robot" id="wn-fas wn-fa-robot" value="wn-fa-robot">
							<label for="wn-fas wn-fa-robot"><i class="wn-fas wn-fa-robot"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="rocket" >
							<input type="radio" name="iconfonts_name" data-name="rocket" id="wn-fas wn-fa-rocket" value="wn-fa-rocket">
							<label for="wn-fas wn-fa-rocket"><i class="wn-fas wn-fa-rocket"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="rss" >
							<input type="radio" name="iconfonts_name" data-name="rss" id="wn-fas wn-fa-rss" value="wn-fa-rss">
							<label for="wn-fas wn-fa-rss"><i class="wn-fas wn-fa-rss"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="rss-square" >
							<input type="radio" name="iconfonts_name" data-name="rss-square" id="wn-fas wn-fa-rss-square" value="wn-fa-rss-square">
							<label for="wn-fas wn-fa-rss-square"><i class="wn-fas wn-fa-rss-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="ruble-sign" >
							<input type="radio" name="iconfonts_name" data-name="ruble-sign" id="wn-fas wn-fa-ruble-sign" value="wn-fa-ruble-sign">
							<label for="wn-fas wn-fa-ruble-sign"><i class="wn-fas wn-fa-ruble-sign"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="ruler" >
							<input type="radio" name="iconfonts_name" data-name="ruler" id="wn-fas wn-fa-ruler" value="wn-fa-ruler">
							<label for="wn-fas wn-fa-ruler"><i class="wn-fas wn-fa-ruler"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="ruler-combined" >
							<input type="radio" name="iconfonts_name" data-name="ruler-combined" id="wn-fas wn-fa-ruler-combined" value="wn-fa-ruler-combined">
							<label for="wn-fas wn-fa-ruler-combined"><i class="wn-fas wn-fa-ruler-combined"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="ruler-horizontal" >
							<input type="radio" name="iconfonts_name" data-name="ruler-horizontal" id="wn-fas wn-fa-ruler-horizontal" value="wn-fa-ruler-horizontal">
							<label for="wn-fas wn-fa-ruler-horizontal"><i class="wn-fas wn-fa-ruler-horizontal"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="ruler-vertical" >
							<input type="radio" name="iconfonts_name" data-name="ruler-vertical" id="wn-fas wn-fa-ruler-vertical" value="wn-fa-ruler-vertical">
							<label for="wn-fas wn-fa-ruler-vertical"><i class="wn-fas wn-fa-ruler-vertical"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="rupee-sign" >
							<input type="radio" name="iconfonts_name" data-name="rupee-sign" id="wn-fas wn-fa-rupee-sign" value="wn-fa-rupee-sign">
							<label for="wn-fas wn-fa-rupee-sign"><i class="wn-fas wn-fa-rupee-sign"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="save" >
							<input type="radio" name="iconfonts_name" data-name="save" id="wn-fas wn-fa-save" value="wn-fa-save">
							<label for="wn-fas wn-fa-save"><i class="wn-fas wn-fa-save"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="school" >
							<input type="radio" name="iconfonts_name" data-name="school" id="wn-fas wn-fa-school" value="wn-fa-school">
							<label for="wn-fas wn-fa-school"><i class="wn-fas wn-fa-school"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="screwdriver" >
							<input type="radio" name="iconfonts_name" data-name="screwdriver" id="wn-fas wn-fa-screwdriver" value="wn-fa-screwdriver">
							<label for="wn-fas wn-fa-screwdriver"><i class="wn-fas wn-fa-screwdriver"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="search" >
							<input type="radio" name="iconfonts_name" data-name="search" id="wn-fas wn-fa-search" value="wn-fa-search">
							<label for="wn-fas wn-fa-search"><i class="wn-fas wn-fa-search"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="search-minus" >
							<input type="radio" name="iconfonts_name" data-name="search-minus" id="wn-fas wn-fa-search-minus" value="wn-fa-search-minus">
							<label for="wn-fas wn-fa-search-minus"><i class="wn-fas wn-fa-search-minus"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="search-plus" >
							<input type="radio" name="iconfonts_name" data-name="search-plus" id="wn-fas wn-fa-search-plus" value="wn-fa-search-plus">
							<label for="wn-fas wn-fa-search-plus"><i class="wn-fas wn-fa-search-plus"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="seedling" >
							<input type="radio" name="iconfonts_name" data-name="seedling" id="wn-fas wn-fa-seedling" value="wn-fa-seedling">
							<label for="wn-fas wn-fa-seedling"><i class="wn-fas wn-fa-seedling"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="server" >
							<input type="radio" name="iconfonts_name" data-name="server" id="wn-fas wn-fa-server" value="wn-fa-server">
							<label for="wn-fas wn-fa-server"><i class="wn-fas wn-fa-server"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="share" >
							<input type="radio" name="iconfonts_name" data-name="share" id="wn-fas wn-fa-share" value="wn-fa-share">
							<label for="wn-fas wn-fa-share"><i class="wn-fas wn-fa-share"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="share-alt" >
							<input type="radio" name="iconfonts_name" data-name="share-alt" id="wn-fas wn-fa-share-alt" value="wn-fa-share-alt">
							<label for="wn-fas wn-fa-share-alt"><i class="wn-fas wn-fa-share-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="share-alt-square" >
							<input type="radio" name="iconfonts_name" data-name="share-alt-square" id="wn-fas wn-fa-share-alt-square" value="wn-fa-share-alt-square">
							<label for="wn-fas wn-fa-share-alt-square"><i class="wn-fas wn-fa-share-alt-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="share-square" >
							<input type="radio" name="iconfonts_name" data-name="share-square" id="wn-fas wn-fa-share-square" value="wn-fa-share-square">
							<label for="wn-fas wn-fa-share-square"><i class="wn-fas wn-fa-share-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="shekel-sign" >
							<input type="radio" name="iconfonts_name" data-name="shekel-sign" id="wn-fas wn-fa-shekel-sign" value="wn-fa-shekel-sign">
							<label for="wn-fas wn-fa-shekel-sign"><i class="wn-fas wn-fa-shekel-sign"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="shield-alt" >
							<input type="radio" name="iconfonts_name" data-name="shield-alt" id="wn-fas wn-fa-shield-alt" value="wn-fa-shield-alt">
							<label for="wn-fas wn-fa-shield-alt"><i class="wn-fas wn-fa-shield-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="ship" >
							<input type="radio" name="iconfonts_name" data-name="ship" id="wn-fas wn-fa-ship" value="wn-fa-ship">
							<label for="wn-fas wn-fa-ship"><i class="wn-fas wn-fa-ship"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="shipping-fast" >
							<input type="radio" name="iconfonts_name" data-name="shipping-fast" id="wn-fas wn-fa-shipping-fast" value="wn-fa-shipping-fast">
							<label for="wn-fas wn-fa-shipping-fast"><i class="wn-fas wn-fa-shipping-fast"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="shoe-prints" >
							<input type="radio" name="iconfonts_name" data-name="shoe-prints" id="wn-fas wn-fa-shoe-prints" value="wn-fa-shoe-prints">
							<label for="wn-fas wn-fa-shoe-prints"><i class="wn-fas wn-fa-shoe-prints"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="shopping-bag" >
							<input type="radio" name="iconfonts_name" data-name="shopping-bag" id="wn-fas wn-fa-shopping-bag" value="wn-fa-shopping-bag">
							<label for="wn-fas wn-fa-shopping-bag"><i class="wn-fas wn-fa-shopping-bag"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="shopping-basket" >
							<input type="radio" name="iconfonts_name" data-name="shopping-basket" id="wn-fas wn-fa-shopping-basket" value="wn-fa-shopping-basket">
							<label for="wn-fas wn-fa-shopping-basket"><i class="wn-fas wn-fa-shopping-basket"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="shopping-cart" >
							<input type="radio" name="iconfonts_name" data-name="shopping-cart" id="wn-fas wn-fa-shopping-cart" value="wn-fa-shopping-cart">
							<label for="wn-fas wn-fa-shopping-cart"><i class="wn-fas wn-fa-shopping-cart"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="shower" >
							<input type="radio" name="iconfonts_name" data-name="shower" id="wn-fas wn-fa-shower" value="wn-fa-shower">
							<label for="wn-fas wn-fa-shower"><i class="wn-fas wn-fa-shower"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sign" >
							<input type="radio" name="iconfonts_name" data-name="sign" id="wn-fas wn-fa-sign" value="wn-fa-sign">
							<label for="wn-fas wn-fa-sign"><i class="wn-fas wn-fa-sign"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sign-in-alt" >
							<input type="radio" name="iconfonts_name" data-name="sign-in-alt" id="wn-fas wn-fa-sign-in-alt" value="wn-fa-sign-in-alt">
							<label for="wn-fas wn-fa-sign-in-alt"><i class="wn-fas wn-fa-sign-in-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sign-language" >
							<input type="radio" name="iconfonts_name" data-name="sign-language" id="wn-fas wn-fa-sign-language" value="wn-fa-sign-language">
							<label for="wn-fas wn-fa-sign-language"><i class="wn-fas wn-fa-sign-language"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sign-out-alt" >
							<input type="radio" name="iconfonts_name" data-name="sign-out-alt" id="wn-fas wn-fa-sign-out-alt" value="wn-fa-sign-out-alt">
							<label for="wn-fas wn-fa-sign-out-alt"><i class="wn-fas wn-fa-sign-out-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="signal" >
							<input type="radio" name="iconfonts_name" data-name="signal" id="wn-fas wn-fa-signal" value="wn-fa-signal">
							<label for="wn-fas wn-fa-signal"><i class="wn-fas wn-fa-signal"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sitemap" >
							<input type="radio" name="iconfonts_name" data-name="sitemap" id="wn-fas wn-fa-sitemap" value="wn-fa-sitemap">
							<label for="wn-fas wn-fa-sitemap"><i class="wn-fas wn-fa-sitemap"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="skull" >
							<input type="radio" name="iconfonts_name" data-name="skull" id="wn-fas wn-fa-skull" value="wn-fa-skull">
							<label for="wn-fas wn-fa-skull"><i class="wn-fas wn-fa-skull"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sliders-h" >
							<input type="radio" name="iconfonts_name" data-name="sliders-h" id="wn-fas wn-fa-sliders-h" value="wn-fa-sliders-h">
							<label for="wn-fas wn-fa-sliders-h"><i class="wn-fas wn-fa-sliders-h"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="smile" >
							<input type="radio" name="iconfonts_name" data-name="smile" id="wn-fas wn-fa-smile" value="wn-fa-smile">
							<label for="wn-fas wn-fa-smile"><i class="wn-fas wn-fa-smile"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="smoking" >
							<input type="radio" name="iconfonts_name" data-name="smoking" id="wn-fas wn-fa-smoking" value="wn-fa-smoking">
							<label for="wn-fas wn-fa-smoking"><i class="wn-fas wn-fa-smoking"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="smoking-ban" >
							<input type="radio" name="iconfonts_name" data-name="smoking-ban" id="wn-fas wn-fa-smoking-ban" value="wn-fa-smoking-ban">
							<label for="wn-fas wn-fa-smoking-ban"><i class="wn-fas wn-fa-smoking-ban"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="snowflake" >
							<input type="radio" name="iconfonts_name" data-name="snowflake" id="wn-fas wn-fa-snowflake" value="wn-fa-snowflake">
							<label for="wn-fas wn-fa-snowflake"><i class="wn-fas wn-fa-snowflake"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sort" >
							<input type="radio" name="iconfonts_name" data-name="sort" id="wn-fas wn-fa-sort" value="wn-fa-sort">
							<label for="wn-fas wn-fa-sort"><i class="wn-fas wn-fa-sort"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sort-alpha-down" >
							<input type="radio" name="iconfonts_name" data-name="sort-alpha-down" id="wn-fas wn-fa-sort-alpha-down" value="wn-fa-sort-alpha-down">
							<label for="wn-fas wn-fa-sort-alpha-down"><i class="wn-fas wn-fa-sort-alpha-down"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sort-alpha-up" >
							<input type="radio" name="iconfonts_name" data-name="sort-alpha-up" id="wn-fas wn-fa-sort-alpha-up" value="wn-fa-sort-alpha-up">
							<label for="wn-fas wn-fa-sort-alpha-up"><i class="wn-fas wn-fa-sort-alpha-up"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sort-amount-down" >
							<input type="radio" name="iconfonts_name" data-name="sort-amount-down" id="wn-fas wn-fa-sort-amount-down" value="wn-fa-sort-amount-down">
							<label for="wn-fas wn-fa-sort-amount-down"><i class="wn-fas wn-fa-sort-amount-down"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sort-amount-up" >
							<input type="radio" name="iconfonts_name" data-name="sort-amount-up" id="wn-fas wn-fa-sort-amount-up" value="wn-fa-sort-amount-up">
							<label for="wn-fas wn-fa-sort-amount-up"><i class="wn-fas wn-fa-sort-amount-up"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sort-down" >
							<input type="radio" name="iconfonts_name" data-name="sort-down" id="wn-fas wn-fa-sort-down" value="wn-fa-sort-down">
							<label for="wn-fas wn-fa-sort-down"><i class="wn-fas wn-fa-sort-down"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sort-numeric-down" >
							<input type="radio" name="iconfonts_name" data-name="sort-numeric-down" id="wn-fas wn-fa-sort-numeric-down" value="wn-fa-sort-numeric-down">
							<label for="wn-fas wn-fa-sort-numeric-down"><i class="wn-fas wn-fa-sort-numeric-down"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sort-numeric-up" >
							<input type="radio" name="iconfonts_name" data-name="sort-numeric-up" id="wn-fas wn-fa-sort-numeric-up" value="wn-fa-sort-numeric-up">
							<label for="wn-fas wn-fa-sort-numeric-up"><i class="wn-fas wn-fa-sort-numeric-up"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sort-up" >
							<input type="radio" name="iconfonts_name" data-name="sort-up" id="wn-fas wn-fa-sort-up" value="wn-fa-sort-up">
							<label for="wn-fas wn-fa-sort-up"><i class="wn-fas wn-fa-sort-up"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="space-shuttle" >
							<input type="radio" name="iconfonts_name" data-name="space-shuttle" id="wn-fas wn-fa-space-shuttle" value="wn-fa-space-shuttle">
							<label for="wn-fas wn-fa-space-shuttle"><i class="wn-fas wn-fa-space-shuttle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="spinner" >
							<input type="radio" name="iconfonts_name" data-name="spinner" id="wn-fas wn-fa-spinner" value="wn-fa-spinner">
							<label for="wn-fas wn-fa-spinner"><i class="wn-fas wn-fa-spinner"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="square" >
							<input type="radio" name="iconfonts_name" data-name="square" id="wn-fas wn-fa-square" value="wn-fa-square">
							<label for="wn-fas wn-fa-square"><i class="wn-fas wn-fa-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="square-full" >
							<input type="radio" name="iconfonts_name" data-name="square-full" id="wn-fas wn-fa-square-full" value="wn-fa-square-full">
							<label for="wn-fas wn-fa-square-full"><i class="wn-fas wn-fa-square-full"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="star" >
							<input type="radio" name="iconfonts_name" data-name="star" id="wn-fas wn-fa-star" value="wn-fa-star">
							<label for="wn-fas wn-fa-star"><i class="wn-fas wn-fa-star"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="star-half" >
							<input type="radio" name="iconfonts_name" data-name="star-half" id="wn-fas wn-fa-star-half" value="wn-fa-star-half">
							<label for="wn-fas wn-fa-star-half"><i class="wn-fas wn-fa-star-half"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="step-backward" >
							<input type="radio" name="iconfonts_name" data-name="step-backward" id="wn-fas wn-fa-step-backward" value="wn-fa-step-backward">
							<label for="wn-fas wn-fa-step-backward"><i class="wn-fas wn-fa-step-backward"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="step-forward" >
							<input type="radio" name="iconfonts_name" data-name="step-forward" id="wn-fas wn-fa-step-forward" value="wn-fa-step-forward">
							<label for="wn-fas wn-fa-step-forward"><i class="wn-fas wn-fa-step-forward"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="stethoscope" >
							<input type="radio" name="iconfonts_name" data-name="stethoscope" id="wn-fas wn-fa-stethoscope" value="wn-fa-stethoscope">
							<label for="wn-fas wn-fa-stethoscope"><i class="wn-fas wn-fa-stethoscope"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sticky-note" >
							<input type="radio" name="iconfonts_name" data-name="sticky-note" id="wn-fas wn-fa-sticky-note" value="wn-fa-sticky-note">
							<label for="wn-fas wn-fa-sticky-note"><i class="wn-fas wn-fa-sticky-note"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="stop" >
							<input type="radio" name="iconfonts_name" data-name="stop" id="wn-fas wn-fa-stop" value="wn-fa-stop">
							<label for="wn-fas wn-fa-stop"><i class="wn-fas wn-fa-stop"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="stop-circle" >
							<input type="radio" name="iconfonts_name" data-name="stop-circle" id="wn-fas wn-fa-stop-circle" value="wn-fa-stop-circle">
							<label for="wn-fas wn-fa-stop-circle"><i class="wn-fas wn-fa-stop-circle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="stopwatch" >
							<input type="radio" name="iconfonts_name" data-name="stopwatch" id="wn-fas wn-fa-stopwatch" value="wn-fa-stopwatch">
							<label for="wn-fas wn-fa-stopwatch"><i class="wn-fas wn-fa-stopwatch"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="store" >
							<input type="radio" name="iconfonts_name" data-name="store" id="wn-fas wn-fa-store" value="wn-fa-store">
							<label for="wn-fas wn-fa-store"><i class="wn-fas wn-fa-store"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="store-alt" >
							<input type="radio" name="iconfonts_name" data-name="store-alt" id="wn-fas wn-fa-store-alt" value="wn-fa-store-alt">
							<label for="wn-fas wn-fa-store-alt"><i class="wn-fas wn-fa-store-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="stream" >
							<input type="radio" name="iconfonts_name" data-name="stream" id="wn-fas wn-fa-stream" value="wn-fa-stream">
							<label for="wn-fas wn-fa-stream"><i class="wn-fas wn-fa-stream"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="street-view" >
							<input type="radio" name="iconfonts_name" data-name="street-view" id="wn-fas wn-fa-street-view" value="wn-fa-street-view">
							<label for="wn-fas wn-fa-street-view"><i class="wn-fas wn-fa-street-view"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="strikethrough" >
							<input type="radio" name="iconfonts_name" data-name="strikethrough" id="wn-fas wn-fa-strikethrough" value="wn-fa-strikethrough">
							<label for="wn-fas wn-fa-strikethrough"><i class="wn-fas wn-fa-strikethrough"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="stroopwafel" >
							<input type="radio" name="iconfonts_name" data-name="stroopwafel" id="wn-fas wn-fa-stroopwafel" value="wn-fa-stroopwafel">
							<label for="wn-fas wn-fa-stroopwafel"><i class="wn-fas wn-fa-stroopwafel"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="subscript" >
							<input type="radio" name="iconfonts_name" data-name="subscript" id="wn-fas wn-fa-subscript" value="wn-fa-subscript">
							<label for="wn-fas wn-fa-subscript"><i class="wn-fas wn-fa-subscript"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="subway" >
							<input type="radio" name="iconfonts_name" data-name="subway" id="wn-fas wn-fa-subway" value="wn-fa-subway">
							<label for="wn-fas wn-fa-subway"><i class="wn-fas wn-fa-subway"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="suitcase" >
							<input type="radio" name="iconfonts_name" data-name="suitcase" id="wn-fas wn-fa-suitcase" value="wn-fa-suitcase">
							<label for="wn-fas wn-fa-suitcase"><i class="wn-fas wn-fa-suitcase"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sun" >
							<input type="radio" name="iconfonts_name" data-name="sun" id="wn-fas wn-fa-sun" value="wn-fa-sun">
							<label for="wn-fas wn-fa-sun"><i class="wn-fas wn-fa-sun"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="superscript" >
							<input type="radio" name="iconfonts_name" data-name="superscript" id="wn-fas wn-fa-superscript" value="wn-fa-superscript">
							<label for="wn-fas wn-fa-superscript"><i class="wn-fas wn-fa-superscript"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sync" >
							<input type="radio" name="iconfonts_name" data-name="sync" id="wn-fas wn-fa-sync" value="wn-fa-sync">
							<label for="wn-fas wn-fa-sync"><i class="wn-fas wn-fa-sync"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sync-alt" >
							<input type="radio" name="iconfonts_name" data-name="sync-alt" id="wn-fas wn-fa-sync-alt" value="wn-fa-sync-alt">
							<label for="wn-fas wn-fa-sync-alt"><i class="wn-fas wn-fa-sync-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="syringe" >
							<input type="radio" name="iconfonts_name" data-name="syringe" id="wn-fas wn-fa-syringe" value="wn-fa-syringe">
							<label for="wn-fas wn-fa-syringe"><i class="wn-fas wn-fa-syringe"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="table" >
							<input type="radio" name="iconfonts_name" data-name="table" id="wn-fas wn-fa-table" value="wn-fa-table">
							<label for="wn-fas wn-fa-table"><i class="wn-fas wn-fa-table"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="table-tennis" >
							<input type="radio" name="iconfonts_name" data-name="table-tennis" id="wn-fas wn-fa-table-tennis" value="wn-fa-table-tennis">
							<label for="wn-fas wn-fa-table-tennis"><i class="wn-fas wn-fa-table-tennis"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="tablet" >
							<input type="radio" name="iconfonts_name" data-name="tablet" id="wn-fas wn-fa-tablet" value="wn-fa-tablet">
							<label for="wn-fas wn-fa-tablet"><i class="wn-fas wn-fa-tablet"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="tablet-alt" >
							<input type="radio" name="iconfonts_name" data-name="tablet-alt" id="wn-fas wn-fa-tablet-alt" value="wn-fa-tablet-alt">
							<label for="wn-fas wn-fa-tablet-alt"><i class="wn-fas wn-fa-tablet-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="tablets" >
							<input type="radio" name="iconfonts_name" data-name="tablets" id="wn-fas wn-fa-tablets" value="wn-fa-tablets">
							<label for="wn-fas wn-fa-tablets"><i class="wn-fas wn-fa-tablets"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="tachometer-alt" >
							<input type="radio" name="iconfonts_name" data-name="tachometer-alt" id="wn-fas wn-fa-tachometer-alt" value="wn-fa-tachometer-alt">
							<label for="wn-fas wn-fa-tachometer-alt"><i class="wn-fas wn-fa-tachometer-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="tag" >
							<input type="radio" name="iconfonts_name" data-name="tag" id="wn-fas wn-fa-tag" value="wn-fa-tag">
							<label for="wn-fas wn-fa-tag"><i class="wn-fas wn-fa-tag"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="tags" >
							<input type="radio" name="iconfonts_name" data-name="tags" id="wn-fas wn-fa-tags" value="wn-fa-tags">
							<label for="wn-fas wn-fa-tags"><i class="wn-fas wn-fa-tags"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="tape" >
							<input type="radio" name="iconfonts_name" data-name="tape" id="wn-fas wn-fa-tape" value="wn-fa-tape">
							<label for="wn-fas wn-fa-tape"><i class="wn-fas wn-fa-tape"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="tasks" >
							<input type="radio" name="iconfonts_name" data-name="tasks" id="wn-fas wn-fa-tasks" value="wn-fa-tasks">
							<label for="wn-fas wn-fa-tasks"><i class="wn-fas wn-fa-tasks"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="taxi" >
							<input type="radio" name="iconfonts_name" data-name="taxi" id="wn-fas wn-fa-taxi" value="wn-fa-taxi">
							<label for="wn-fas wn-fa-taxi"><i class="wn-fas wn-fa-taxi"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="terminal" >
							<input type="radio" name="iconfonts_name" data-name="terminal" id="wn-fas wn-fa-terminal" value="wn-fa-terminal">
							<label for="wn-fas wn-fa-terminal"><i class="wn-fas wn-fa-terminal"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="text-height" >
							<input type="radio" name="iconfonts_name" data-name="text-height" id="wn-fas wn-fa-text-height" value="wn-fa-text-height">
							<label for="wn-fas wn-fa-text-height"><i class="wn-fas wn-fa-text-height"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="text-width" >
							<input type="radio" name="iconfonts_name" data-name="text-width" id="wn-fas wn-fa-text-width" value="wn-fa-text-width">
							<label for="wn-fas wn-fa-text-width"><i class="wn-fas wn-fa-text-width"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="th" >
							<input type="radio" name="iconfonts_name" data-name="th" id="wn-fas wn-fa-th" value="wn-fa-th">
							<label for="wn-fas wn-fa-th"><i class="wn-fas wn-fa-th"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="th-large" >
							<input type="radio" name="iconfonts_name" data-name="th-large" id="wn-fas wn-fa-th-large" value="wn-fa-th-large">
							<label for="wn-fas wn-fa-th-large"><i class="wn-fas wn-fa-th-large"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="th-list" >
							<input type="radio" name="iconfonts_name" data-name="th-list" id="wn-fas wn-fa-th-list" value="wn-fa-th-list">
							<label for="wn-fas wn-fa-th-list"><i class="wn-fas wn-fa-th-list"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="thermometer" >
							<input type="radio" name="iconfonts_name" data-name="thermometer" id="wn-fas wn-fa-thermometer" value="wn-fa-thermometer">
							<label for="wn-fas wn-fa-thermometer"><i class="wn-fas wn-fa-thermometer"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="thermometer-empty" >
							<input type="radio" name="iconfonts_name" data-name="thermometer-empty" id="wn-fas wn-fa-thermometer-empty" value="wn-fa-thermometer-empty">
							<label for="wn-fas wn-fa-thermometer-empty"><i class="wn-fas wn-fa-thermometer-empty"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="thermometer-full" >
							<input type="radio" name="iconfonts_name" data-name="thermometer-full" id="wn-fas wn-fa-thermometer-full" value="wn-fa-thermometer-full">
							<label for="wn-fas wn-fa-thermometer-full"><i class="wn-fas wn-fa-thermometer-full"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="thermometer-half" >
							<input type="radio" name="iconfonts_name" data-name="thermometer-half" id="wn-fas wn-fa-thermometer-half" value="wn-fa-thermometer-half">
							<label for="wn-fas wn-fa-thermometer-half"><i class="wn-fas wn-fa-thermometer-half"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="thermometer-quarter" >
							<input type="radio" name="iconfonts_name" data-name="thermometer-quarter" id="wn-fas wn-fa-thermometer-quarter" value="wn-fa-thermometer-quarter">
							<label for="wn-fas wn-fa-thermometer-quarter"><i class="wn-fas wn-fa-thermometer-quarter"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="thermometer-three-quarters" >
							<input type="radio" name="iconfonts_name" data-name="thermometer-three-quarters" id="wn-fas wn-fa-thermometer-three-quarters" value="wn-fa-thermometer-three-quarters">
							<label for="wn-fas wn-fa-thermometer-three-quarters"><i class="wn-fas wn-fa-thermometer-three-quarters"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="thumbs-down" >
							<input type="radio" name="iconfonts_name" data-name="thumbs-down" id="wn-fas wn-fa-thumbs-down" value="wn-fa-thumbs-down">
							<label for="wn-fas wn-fa-thumbs-down"><i class="wn-fas wn-fa-thumbs-down"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="thumbs-up" >
							<input type="radio" name="iconfonts_name" data-name="thumbs-up" id="wn-fas wn-fa-thumbs-up" value="wn-fa-thumbs-up">
							<label for="wn-fas wn-fa-thumbs-up"><i class="wn-fas wn-fa-thumbs-up"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="thumbtack" >
							<input type="radio" name="iconfonts_name" data-name="thumbtack" id="wn-fas wn-fa-thumbtack" value="wn-fa-thumbtack">
							<label for="wn-fas wn-fa-thumbtack"><i class="wn-fas wn-fa-thumbtack"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="ticket-alt" >
							<input type="radio" name="iconfonts_name" data-name="ticket-alt" id="wn-fas wn-fa-ticket-alt" value="wn-fa-ticket-alt">
							<label for="wn-fas wn-fa-ticket-alt"><i class="wn-fas wn-fa-ticket-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="times" >
							<input type="radio" name="iconfonts_name" data-name="times" id="wn-fas wn-fa-times" value="wn-fa-times">
							<label for="wn-fas wn-fa-times"><i class="wn-fas wn-fa-times"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="times-circle" >
							<input type="radio" name="iconfonts_name" data-name="times-circle" id="wn-fas wn-fa-times-circle" value="wn-fa-times-circle">
							<label for="wn-fas wn-fa-times-circle"><i class="wn-fas wn-fa-times-circle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="tint" >
							<input type="radio" name="iconfonts_name" data-name="tint" id="wn-fas wn-fa-tint" value="wn-fa-tint">
							<label for="wn-fas wn-fa-tint"><i class="wn-fas wn-fa-tint"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="toggle-off" >
							<input type="radio" name="iconfonts_name" data-name="toggle-off" id="wn-fas wn-fa-toggle-off" value="wn-fa-toggle-off">
							<label for="wn-fas wn-fa-toggle-off"><i class="wn-fas wn-fa-toggle-off"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="toggle-on" >
							<input type="radio" name="iconfonts_name" data-name="toggle-on" id="wn-fas wn-fa-toggle-on" value="wn-fa-toggle-on">
							<label for="wn-fas wn-fa-toggle-on"><i class="wn-fas wn-fa-toggle-on"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="toolbox" >
							<input type="radio" name="iconfonts_name" data-name="toolbox" id="wn-fas wn-fa-toolbox" value="wn-fa-toolbox">
							<label for="wn-fas wn-fa-toolbox"><i class="wn-fas wn-fa-toolbox"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="trademark" >
							<input type="radio" name="iconfonts_name" data-name="trademark" id="wn-fas wn-fa-trademark" value="wn-fa-trademark">
							<label for="wn-fas wn-fa-trademark"><i class="wn-fas wn-fa-trademark"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="train" >
							<input type="radio" name="iconfonts_name" data-name="train" id="wn-fas wn-fa-train" value="wn-fa-train">
							<label for="wn-fas wn-fa-train"><i class="wn-fas wn-fa-train"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="transgender" >
							<input type="radio" name="iconfonts_name" data-name="transgender" id="wn-fas wn-fa-transgender" value="wn-fa-transgender">
							<label for="wn-fas wn-fa-transgender"><i class="wn-fas wn-fa-transgender"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="transgender-alt" >
							<input type="radio" name="iconfonts_name" data-name="transgender-alt" id="wn-fas wn-fa-transgender-alt" value="wn-fa-transgender-alt">
							<label for="wn-fas wn-fa-transgender-alt"><i class="wn-fas wn-fa-transgender-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="trash" >
							<input type="radio" name="iconfonts_name" data-name="trash" id="wn-fas wn-fa-trash" value="wn-fa-trash">
							<label for="wn-fas wn-fa-trash"><i class="wn-fas wn-fa-trash"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="trash-alt" >
							<input type="radio" name="iconfonts_name" data-name="trash-alt" id="wn-fas wn-fa-trash-alt" value="wn-fa-trash-alt">
							<label for="wn-fas wn-fa-trash-alt"><i class="wn-fas wn-fa-trash-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="tree" >
							<input type="radio" name="iconfonts_name" data-name="tree" id="wn-fas wn-fa-tree" value="wn-fa-tree">
							<label for="wn-fas wn-fa-tree"><i class="wn-fas wn-fa-tree"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="trophy" >
							<input type="radio" name="iconfonts_name" data-name="trophy" id="wn-fas wn-fa-trophy" value="wn-fa-trophy">
							<label for="wn-fas wn-fa-trophy"><i class="wn-fas wn-fa-trophy"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="truck" >
							<input type="radio" name="iconfonts_name" data-name="truck" id="wn-fas wn-fa-truck" value="wn-fa-truck">
							<label for="wn-fas wn-fa-truck"><i class="wn-fas wn-fa-truck"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="truck-loading" >
							<input type="radio" name="iconfonts_name" data-name="truck-loading" id="wn-fas wn-fa-truck-loading" value="wn-fa-truck-loading">
							<label for="wn-fas wn-fa-truck-loading"><i class="wn-fas wn-fa-truck-loading"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="truck-moving" >
							<input type="radio" name="iconfonts_name" data-name="truck-moving" id="wn-fas wn-fa-truck-moving" value="wn-fa-truck-moving">
							<label for="wn-fas wn-fa-truck-moving"><i class="wn-fas wn-fa-truck-moving"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="tshirt" >
							<input type="radio" name="iconfonts_name" data-name="tshirt" id="wn-fas wn-fa-tshirt" value="wn-fa-tshirt">
							<label for="wn-fas wn-fa-tshirt"><i class="wn-fas wn-fa-tshirt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="tty" >
							<input type="radio" name="iconfonts_name" data-name="tty" id="wn-fas wn-fa-tty" value="wn-fa-tty">
							<label for="wn-fas wn-fa-tty"><i class="wn-fas wn-fa-tty"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="tv" >
							<input type="radio" name="iconfonts_name" data-name="tv" id="wn-fas wn-fa-tv" value="wn-fa-tv">
							<label for="wn-fas wn-fa-tv"><i class="wn-fas wn-fa-tv"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="umbrella" >
							<input type="radio" name="iconfonts_name" data-name="umbrella" id="wn-fas wn-fa-umbrella" value="wn-fa-umbrella">
							<label for="wn-fas wn-fa-umbrella"><i class="wn-fas wn-fa-umbrella"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="underline" >
							<input type="radio" name="iconfonts_name" data-name="underline" id="wn-fas wn-fa-underline" value="wn-fa-underline">
							<label for="wn-fas wn-fa-underline"><i class="wn-fas wn-fa-underline"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="undo" >
							<input type="radio" name="iconfonts_name" data-name="undo" id="wn-fas wn-fa-undo" value="wn-fa-undo">
							<label for="wn-fas wn-fa-undo"><i class="wn-fas wn-fa-undo"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="undo-alt" >
							<input type="radio" name="iconfonts_name" data-name="undo-alt" id="wn-fas wn-fa-undo-alt" value="wn-fa-undo-alt">
							<label for="wn-fas wn-fa-undo-alt"><i class="wn-fas wn-fa-undo-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="universal-access" >
							<input type="radio" name="iconfonts_name" data-name="universal-access" id="wn-fas wn-fa-universal-access" value="wn-fa-universal-access">
							<label for="wn-fas wn-fa-universal-access"><i class="wn-fas wn-fa-universal-access"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="university" >
							<input type="radio" name="iconfonts_name" data-name="university" id="wn-fas wn-fa-university" value="wn-fa-university">
							<label for="wn-fas wn-fa-university"><i class="wn-fas wn-fa-university"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="unlink" >
							<input type="radio" name="iconfonts_name" data-name="unlink" id="wn-fas wn-fa-unlink" value="wn-fa-unlink">
							<label for="wn-fas wn-fa-unlink"><i class="wn-fas wn-fa-unlink"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="unlock" >
							<input type="radio" name="iconfonts_name" data-name="unlock" id="wn-fas wn-fa-unlock" value="wn-fa-unlock">
							<label for="wn-fas wn-fa-unlock"><i class="wn-fas wn-fa-unlock"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="unlock-alt" >
							<input type="radio" name="iconfonts_name" data-name="unlock-alt" id="wn-fas wn-fa-unlock-alt" value="wn-fa-unlock-alt">
							<label for="wn-fas wn-fa-unlock-alt"><i class="wn-fas wn-fa-unlock-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="upload" >
							<input type="radio" name="iconfonts_name" data-name="upload" id="wn-fas wn-fa-upload" value="wn-fa-upload">
							<label for="wn-fas wn-fa-upload"><i class="wn-fas wn-fa-upload"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="user" >
							<input type="radio" name="iconfonts_name" data-name="user" id="wn-fas wn-fa-user" value="wn-fa-user">
							<label for="wn-fas wn-fa-user"><i class="wn-fas wn-fa-user"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="user-alt" >
							<input type="radio" name="iconfonts_name" data-name="user-alt" id="wn-fas wn-fa-user-alt" value="wn-fa-user-alt">
							<label for="wn-fas wn-fa-user-alt"><i class="wn-fas wn-fa-user-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="user-alt-slash" >
							<input type="radio" name="iconfonts_name" data-name="user-alt-slash" id="wn-fas wn-fa-user-alt-slash" value="wn-fa-user-alt-slash">
							<label for="wn-fas wn-fa-user-alt-slash"><i class="wn-fas wn-fa-user-alt-slash"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="user-astronaut" >
							<input type="radio" name="iconfonts_name" data-name="user-astronaut" id="wn-fas wn-fa-user-astronaut" value="wn-fa-user-astronaut">
							<label for="wn-fas wn-fa-user-astronaut"><i class="wn-fas wn-fa-user-astronaut"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="user-check" >
							<input type="radio" name="iconfonts_name" data-name="user-check" id="wn-fas wn-fa-user-check" value="wn-fa-user-check">
							<label for="wn-fas wn-fa-user-check"><i class="wn-fas wn-fa-user-check"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="user-circle" >
							<input type="radio" name="iconfonts_name" data-name="user-circle" id="wn-fas wn-fa-user-circle" value="wn-fa-user-circle">
							<label for="wn-fas wn-fa-user-circle"><i class="wn-fas wn-fa-user-circle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="user-clock" >
							<input type="radio" name="iconfonts_name" data-name="user-clock" id="wn-fas wn-fa-user-clock" value="wn-fa-user-clock">
							<label for="wn-fas wn-fa-user-clock"><i class="wn-fas wn-fa-user-clock"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="user-cog" >
							<input type="radio" name="iconfonts_name" data-name="user-cog" id="wn-fas wn-fa-user-cog" value="wn-fa-user-cog">
							<label for="wn-fas wn-fa-user-cog"><i class="wn-fas wn-fa-user-cog"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="user-edit" >
							<input type="radio" name="iconfonts_name" data-name="user-edit" id="wn-fas wn-fa-user-edit" value="wn-fa-user-edit">
							<label for="wn-fas wn-fa-user-edit"><i class="wn-fas wn-fa-user-edit"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="user-friends" >
							<input type="radio" name="iconfonts_name" data-name="user-friends" id="wn-fas wn-fa-user-friends" value="wn-fa-user-friends">
							<label for="wn-fas wn-fa-user-friends"><i class="wn-fas wn-fa-user-friends"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="user-graduate" >
							<input type="radio" name="iconfonts_name" data-name="user-graduate" id="wn-fas wn-fa-user-graduate" value="wn-fa-user-graduate">
							<label for="wn-fas wn-fa-user-graduate"><i class="wn-fas wn-fa-user-graduate"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="user-lock" >
							<input type="radio" name="iconfonts_name" data-name="user-lock" id="wn-fas wn-fa-user-lock" value="wn-fa-user-lock">
							<label for="wn-fas wn-fa-user-lock"><i class="wn-fas wn-fa-user-lock"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="user-md" >
							<input type="radio" name="iconfonts_name" data-name="user-md" id="wn-fas wn-fa-user-md" value="wn-fa-user-md">
							<label for="wn-fas wn-fa-user-md"><i class="wn-fas wn-fa-user-md"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="user-minus" >
							<input type="radio" name="iconfonts_name" data-name="user-minus" id="wn-fas wn-fa-user-minus" value="wn-fa-user-minus">
							<label for="wn-fas wn-fa-user-minus"><i class="wn-fas wn-fa-user-minus"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="user-ninja" >
							<input type="radio" name="iconfonts_name" data-name="user-ninja" id="wn-fas wn-fa-user-ninja" value="wn-fa-user-ninja">
							<label for="wn-fas wn-fa-user-ninja"><i class="wn-fas wn-fa-user-ninja"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="user-plus" >
							<input type="radio" name="iconfonts_name" data-name="user-plus" id="wn-fas wn-fa-user-plus" value="wn-fa-user-plus">
							<label for="wn-fas wn-fa-user-plus"><i class="wn-fas wn-fa-user-plus"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="user-secret" >
							<input type="radio" name="iconfonts_name" data-name="user-secret" id="wn-fas wn-fa-user-secret" value="wn-fa-user-secret">
							<label for="wn-fas wn-fa-user-secret"><i class="wn-fas wn-fa-user-secret"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="user-shield" >
							<input type="radio" name="iconfonts_name" data-name="user-shield" id="wn-fas wn-fa-user-shield" value="wn-fa-user-shield">
							<label for="wn-fas wn-fa-user-shield"><i class="wn-fas wn-fa-user-shield"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="user-slash" >
							<input type="radio" name="iconfonts_name" data-name="user-slash" id="wn-fas wn-fa-user-slash" value="wn-fa-user-slash">
							<label for="wn-fas wn-fa-user-slash"><i class="wn-fas wn-fa-user-slash"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="user-tag" >
							<input type="radio" name="iconfonts_name" data-name="user-tag" id="wn-fas wn-fa-user-tag" value="wn-fa-user-tag">
							<label for="wn-fas wn-fa-user-tag"><i class="wn-fas wn-fa-user-tag"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="user-tie" >
							<input type="radio" name="iconfonts_name" data-name="user-tie" id="wn-fas wn-fa-user-tie" value="wn-fa-user-tie">
							<label for="wn-fas wn-fa-user-tie"><i class="wn-fas wn-fa-user-tie"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="user-times" >
							<input type="radio" name="iconfonts_name" data-name="user-times" id="wn-fas wn-fa-user-times" value="wn-fa-user-times">
							<label for="wn-fas wn-fa-user-times"><i class="wn-fas wn-fa-user-times"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="users" >
							<input type="radio" name="iconfonts_name" data-name="users" id="wn-fas wn-fa-users" value="wn-fa-users">
							<label for="wn-fas wn-fa-users"><i class="wn-fas wn-fa-users"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="users-cog" >
							<input type="radio" name="iconfonts_name" data-name="users-cog" id="wn-fas wn-fa-users-cog" value="wn-fa-users-cog">
							<label for="wn-fas wn-fa-users-cog"><i class="wn-fas wn-fa-users-cog"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="utensil-spoon" >
							<input type="radio" name="iconfonts_name" data-name="utensil-spoon" id="wn-fas wn-fa-utensil-spoon" value="wn-fa-utensil-spoon">
							<label for="wn-fas wn-fa-utensil-spoon"><i class="wn-fas wn-fa-utensil-spoon"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="utensils" >
							<input type="radio" name="iconfonts_name" data-name="utensils" id="wn-fas wn-fa-utensils" value="wn-fa-utensils">
							<label for="wn-fas wn-fa-utensils"><i class="wn-fas wn-fa-utensils"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="venus" >
							<input type="radio" name="iconfonts_name" data-name="venus" id="wn-fas wn-fa-venus" value="wn-fa-venus">
							<label for="wn-fas wn-fa-venus"><i class="wn-fas wn-fa-venus"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="venus-double" >
							<input type="radio" name="iconfonts_name" data-name="venus-double" id="wn-fas wn-fa-venus-double" value="wn-fa-venus-double">
							<label for="wn-fas wn-fa-venus-double"><i class="wn-fas wn-fa-venus-double"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="venus-mars" >
							<input type="radio" name="iconfonts_name" data-name="venus-mars" id="wn-fas wn-fa-venus-mars" value="wn-fa-venus-mars">
							<label for="wn-fas wn-fa-venus-mars"><i class="wn-fas wn-fa-venus-mars"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="vial" >
							<input type="radio" name="iconfonts_name" data-name="vial" id="wn-fas wn-fa-vial" value="wn-fa-vial">
							<label for="wn-fas wn-fa-vial"><i class="wn-fas wn-fa-vial"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="vials" >
							<input type="radio" name="iconfonts_name" data-name="vials" id="wn-fas wn-fa-vials" value="wn-fa-vials">
							<label for="wn-fas wn-fa-vials"><i class="wn-fas wn-fa-vials"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="video" >
							<input type="radio" name="iconfonts_name" data-name="video" id="wn-fas wn-fa-video" value="wn-fa-video">
							<label for="wn-fas wn-fa-video"><i class="wn-fas wn-fa-video"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="video-slash" >
							<input type="radio" name="iconfonts_name" data-name="video-slash" id="wn-fas wn-fa-video-slash" value="wn-fa-video-slash">
							<label for="wn-fas wn-fa-video-slash"><i class="wn-fas wn-fa-video-slash"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="volleyball-ball" >
							<input type="radio" name="iconfonts_name" data-name="volleyball-ball" id="wn-fas wn-fa-volleyball-ball" value="wn-fa-volleyball-ball">
							<label for="wn-fas wn-fa-volleyball-ball"><i class="wn-fas wn-fa-volleyball-ball"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="volume-down" >
							<input type="radio" name="iconfonts_name" data-name="volume-down" id="wn-fas wn-fa-volume-down" value="wn-fa-volume-down">
							<label for="wn-fas wn-fa-volume-down"><i class="wn-fas wn-fa-volume-down"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="volume-off" >
							<input type="radio" name="iconfonts_name" data-name="volume-off" id="wn-fas wn-fa-volume-off" value="wn-fa-volume-off">
							<label for="wn-fas wn-fa-volume-off"><i class="wn-fas wn-fa-volume-off"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="volume-up" >
							<input type="radio" name="iconfonts_name" data-name="volume-up" id="wn-fas wn-fa-volume-up" value="wn-fa-volume-up">
							<label for="wn-fas wn-fa-volume-up"><i class="wn-fas wn-fa-volume-up"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="walking" >
							<input type="radio" name="iconfonts_name" data-name="walking" id="wn-fas wn-fa-walking" value="wn-fa-walking">
							<label for="wn-fas wn-fa-walking"><i class="wn-fas wn-fa-walking"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="wallet" >
							<input type="radio" name="iconfonts_name" data-name="wallet" id="wn-fas wn-fa-wallet" value="wn-fa-wallet">
							<label for="wn-fas wn-fa-wallet"><i class="wn-fas wn-fa-wallet"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="warehouse" >
							<input type="radio" name="iconfonts_name" data-name="warehouse" id="wn-fas wn-fa-warehouse" value="wn-fa-warehouse">
							<label for="wn-fas wn-fa-warehouse"><i class="wn-fas wn-fa-warehouse"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="weight" >
							<input type="radio" name="iconfonts_name" data-name="weight" id="wn-fas wn-fa-weight" value="wn-fa-weight">
							<label for="wn-fas wn-fa-weight"><i class="wn-fas wn-fa-weight"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="wheelchair" >
							<input type="radio" name="iconfonts_name" data-name="wheelchair" id="wn-fas wn-fa-wheelchair" value="wn-fa-wheelchair">
							<label for="wn-fas wn-fa-wheelchair"><i class="wn-fas wn-fa-wheelchair"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="wifi" >
							<input type="radio" name="iconfonts_name" data-name="wifi" id="wn-fas wn-fa-wifi" value="wn-fa-wifi">
							<label for="wn-fas wn-fa-wifi"><i class="wn-fas wn-fa-wifi"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="window-close" >
							<input type="radio" name="iconfonts_name" data-name="window-close" id="wn-fas wn-fa-window-close" value="wn-fa-window-close">
							<label for="wn-fas wn-fa-window-close"><i class="wn-fas wn-fa-window-close"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="window-maximize" >
							<input type="radio" name="iconfonts_name" data-name="window-maximize" id="wn-fas wn-fa-window-maximize" value="wn-fa-window-maximize">
							<label for="wn-fas wn-fa-window-maximize"><i class="wn-fas wn-fa-window-maximize"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="window-minimize" >
							<input type="radio" name="iconfonts_name" data-name="window-minimize" id="wn-fas wn-fa-window-minimize" value="wn-fa-window-minimize">
							<label for="wn-fas wn-fa-window-minimize"><i class="wn-fas wn-fa-window-minimize"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="window-restore" >
							<input type="radio" name="iconfonts_name" data-name="window-restore" id="wn-fas wn-fa-window-restore" value="wn-fa-window-restore">
							<label for="wn-fas wn-fa-window-restore"><i class="wn-fas wn-fa-window-restore"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="wine-glass" >
							<input type="radio" name="iconfonts_name" data-name="wine-glass" id="wn-fas wn-fa-wine-glass" value="wn-fa-wine-glass">
							<label for="wn-fas wn-fa-wine-glass"><i class="wn-fas wn-fa-wine-glass"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="won-sign" >
							<input type="radio" name="iconfonts_name" data-name="won-sign" id="wn-fas wn-fa-won-sign" value="wn-fa-won-sign">
							<label for="wn-fas wn-fa-won-sign"><i class="wn-fas wn-fa-won-sign"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="wrench" >
							<input type="radio" name="iconfonts_name" data-name="wrench" id="wn-fas wn-fa-wrench" value="wn-fa-wrench">
							<label for="wn-fas wn-fa-wrench"><i class="wn-fas wn-fa-wrench"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="x-ray" >
							<input type="radio" name="iconfonts_name" data-name="x-ray" id="wn-fas wn-fa-x-ray" value="wn-fa-x-ray">
							<label for="wn-fas wn-fa-x-ray"><i class="wn-fas wn-fa-x-ray"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="yen-sign" >
							<input type="radio" name="iconfonts_name" data-name="yen-sign" id="wn-fas wn-fa-yen-sign" value="wn-fa-yen-sign">
							<label for="wn-fas wn-fa-yen-sign"><i class="wn-fas wn-fa-yen-sign"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="address-book" >
							<input type="radio" name="iconfonts_name" data-name="address-book" id="wn-far wn-fa-address-book" value="wn-fa-address-book">
							<label for="wn-far wn-fa-address-book"><i class="wn-far wn-fa-address-book"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="address-card" >
							<input type="radio" name="iconfonts_name" data-name="address-card" id="wn-far wn-fa-address-card" value="wn-fa-address-card">
							<label for="wn-far wn-fa-address-card"><i class="wn-far wn-fa-address-card"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="arrow-alt-circle-down" >
							<input type="radio" name="iconfonts_name" data-name="arrow-alt-circle-down" id="wn-far wn-fa-arrow-alt-circle-down" value="wn-fa-arrow-alt-circle-down">
							<label for="wn-far wn-fa-arrow-alt-circle-down"><i class="wn-far wn-fa-arrow-alt-circle-down"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="arrow-alt-circle-left" >
							<input type="radio" name="iconfonts_name" data-name="arrow-alt-circle-left" id="wn-far wn-fa-arrow-alt-circle-left" value="wn-fa-arrow-alt-circle-left">
							<label for="wn-far wn-fa-arrow-alt-circle-left"><i class="wn-far wn-fa-arrow-alt-circle-left"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="arrow-alt-circle-right" >
							<input type="radio" name="iconfonts_name" data-name="arrow-alt-circle-right" id="wn-far wn-fa-arrow-alt-circle-right" value="wn-fa-arrow-alt-circle-right">
							<label for="wn-far wn-fa-arrow-alt-circle-right"><i class="wn-far wn-fa-arrow-alt-circle-right"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="arrow-alt-circle-up" >
							<input type="radio" name="iconfonts_name" data-name="arrow-alt-circle-up" id="wn-far wn-fa-arrow-alt-circle-up" value="wn-fa-arrow-alt-circle-up">
							<label for="wn-far wn-fa-arrow-alt-circle-up"><i class="wn-far wn-fa-arrow-alt-circle-up"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="bell" >
							<input type="radio" name="iconfonts_name" data-name="bell" id="wn-far wn-fa-bell" value="wn-fa-bell">
							<label for="wn-far wn-fa-bell"><i class="wn-far wn-fa-bell"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="bell-slash" >
							<input type="radio" name="iconfonts_name" data-name="bell-slash" id="wn-far wn-fa-bell-slash" value="wn-fa-bell-slash">
							<label for="wn-far wn-fa-bell-slash"><i class="wn-far wn-fa-bell-slash"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="bookmark" >
							<input type="radio" name="iconfonts_name" data-name="bookmark" id="wn-far wn-fa-bookmark" value="wn-fa-bookmark">
							<label for="wn-far wn-fa-bookmark"><i class="wn-far wn-fa-bookmark"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="building" >
							<input type="radio" name="iconfonts_name" data-name="building" id="wn-far wn-fa-building" value="wn-fa-building">
							<label for="wn-far wn-fa-building"><i class="wn-far wn-fa-building"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="calendar" >
							<input type="radio" name="iconfonts_name" data-name="calendar" id="wn-far wn-fa-calendar" value="wn-fa-calendar">
							<label for="wn-far wn-fa-calendar"><i class="wn-far wn-fa-calendar"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="calendar-alt" >
							<input type="radio" name="iconfonts_name" data-name="calendar-alt" id="wn-far wn-fa-calendar-alt" value="wn-fa-calendar-alt">
							<label for="wn-far wn-fa-calendar-alt"><i class="wn-far wn-fa-calendar-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="calendar-check" >
							<input type="radio" name="iconfonts_name" data-name="calendar-check" id="wn-far wn-fa-calendar-check" value="wn-fa-calendar-check">
							<label for="wn-far wn-fa-calendar-check"><i class="wn-far wn-fa-calendar-check"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="calendar-minus" >
							<input type="radio" name="iconfonts_name" data-name="calendar-minus" id="wn-far wn-fa-calendar-minus" value="wn-fa-calendar-minus">
							<label for="wn-far wn-fa-calendar-minus"><i class="wn-far wn-fa-calendar-minus"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="calendar-plus" >
							<input type="radio" name="iconfonts_name" data-name="calendar-plus" id="wn-far wn-fa-calendar-plus" value="wn-fa-calendar-plus">
							<label for="wn-far wn-fa-calendar-plus"><i class="wn-far wn-fa-calendar-plus"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="calendar-times" >
							<input type="radio" name="iconfonts_name" data-name="calendar-times" id="wn-far wn-fa-calendar-times" value="wn-fa-calendar-times">
							<label for="wn-far wn-fa-calendar-times"><i class="wn-far wn-fa-calendar-times"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="caret-square-down" >
							<input type="radio" name="iconfonts_name" data-name="caret-square-down" id="wn-far wn-fa-caret-square-down" value="wn-fa-caret-square-down">
							<label for="wn-far wn-fa-caret-square-down"><i class="wn-far wn-fa-caret-square-down"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="caret-square-left" >
							<input type="radio" name="iconfonts_name" data-name="caret-square-left" id="wn-far wn-fa-caret-square-left" value="wn-fa-caret-square-left">
							<label for="wn-far wn-fa-caret-square-left"><i class="wn-far wn-fa-caret-square-left"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="caret-square-right" >
							<input type="radio" name="iconfonts_name" data-name="caret-square-right" id="wn-far wn-fa-caret-square-right" value="wn-fa-caret-square-right">
							<label for="wn-far wn-fa-caret-square-right"><i class="wn-far wn-fa-caret-square-right"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="caret-square-up" >
							<input type="radio" name="iconfonts_name" data-name="caret-square-up" id="wn-far wn-fa-caret-square-up" value="wn-fa-caret-square-up">
							<label for="wn-far wn-fa-caret-square-up"><i class="wn-far wn-fa-caret-square-up"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="chart-bar" >
							<input type="radio" name="iconfonts_name" data-name="chart-bar" id="wn-far wn-fa-chart-bar" value="wn-fa-chart-bar">
							<label for="wn-far wn-fa-chart-bar"><i class="wn-far wn-fa-chart-bar"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="check-circle" >
							<input type="radio" name="iconfonts_name" data-name="check-circle" id="wn-far wn-fa-check-circle" value="wn-fa-check-circle">
							<label for="wn-far wn-fa-check-circle"><i class="wn-far wn-fa-check-circle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="check-square" >
							<input type="radio" name="iconfonts_name" data-name="check-square" id="wn-far wn-fa-check-square" value="wn-fa-check-square">
							<label for="wn-far wn-fa-check-square"><i class="wn-far wn-fa-check-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="circle" >
							<input type="radio" name="iconfonts_name" data-name="circle" id="wn-far wn-fa-circle" value="wn-fa-circle">
							<label for="wn-far wn-fa-circle"><i class="wn-far wn-fa-circle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="clipboard" >
							<input type="radio" name="iconfonts_name" data-name="clipboard" id="wn-far wn-fa-clipboard" value="wn-fa-clipboard">
							<label for="wn-far wn-fa-clipboard"><i class="wn-far wn-fa-clipboard"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="clock" >
							<input type="radio" name="iconfonts_name" data-name="clock" id="wn-far wn-fa-clock" value="wn-fa-clock">
							<label for="wn-far wn-fa-clock"><i class="wn-far wn-fa-clock"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="clone" >
							<input type="radio" name="iconfonts_name" data-name="clone" id="wn-far wn-fa-clone" value="wn-fa-clone">
							<label for="wn-far wn-fa-clone"><i class="wn-far wn-fa-clone"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="closed-captioning" >
							<input type="radio" name="iconfonts_name" data-name="closed-captioning" id="wn-far wn-fa-closed-captioning" value="wn-fa-closed-captioning">
							<label for="wn-far wn-fa-closed-captioning"><i class="wn-far wn-fa-closed-captioning"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="comment" >
							<input type="radio" name="iconfonts_name" data-name="comment" id="wn-far wn-fa-comment" value="wn-fa-comment">
							<label for="wn-far wn-fa-comment"><i class="wn-far wn-fa-comment"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="comment-alt" >
							<input type="radio" name="iconfonts_name" data-name="comment-alt" id="wn-far wn-fa-comment-alt" value="wn-fa-comment-alt">
							<label for="wn-far wn-fa-comment-alt"><i class="wn-far wn-fa-comment-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="comment-dots" >
							<input type="radio" name="iconfonts_name" data-name="comment-dots" id="wn-far wn-fa-comment-dots" value="wn-fa-comment-dots">
							<label for="wn-far wn-fa-comment-dots"><i class="wn-far wn-fa-comment-dots"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="comments" >
							<input type="radio" name="iconfonts_name" data-name="comments" id="wn-far wn-fa-comments" value="wn-fa-comments">
							<label for="wn-far wn-fa-comments"><i class="wn-far wn-fa-comments"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="compass" >
							<input type="radio" name="iconfonts_name" data-name="compass" id="wn-far wn-fa-compass" value="wn-fa-compass">
							<label for="wn-far wn-fa-compass"><i class="wn-far wn-fa-compass"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="copy" >
							<input type="radio" name="iconfonts_name" data-name="copy" id="wn-far wn-fa-copy" value="wn-fa-copy">
							<label for="wn-far wn-fa-copy"><i class="wn-far wn-fa-copy"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="copyright" >
							<input type="radio" name="iconfonts_name" data-name="copyright" id="wn-far wn-fa-copyright" value="wn-fa-copyright">
							<label for="wn-far wn-fa-copyright"><i class="wn-far wn-fa-copyright"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="credit-card" >
							<input type="radio" name="iconfonts_name" data-name="credit-card" id="wn-far wn-fa-credit-card" value="wn-fa-credit-card">
							<label for="wn-far wn-fa-credit-card"><i class="wn-far wn-fa-credit-card"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="dot-circle" >
							<input type="radio" name="iconfonts_name" data-name="dot-circle" id="wn-far wn-fa-dot-circle" value="wn-fa-dot-circle">
							<label for="wn-far wn-fa-dot-circle"><i class="wn-far wn-fa-dot-circle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="edit" >
							<input type="radio" name="iconfonts_name" data-name="edit" id="wn-far wn-fa-edit" value="wn-fa-edit">
							<label for="wn-far wn-fa-edit"><i class="wn-far wn-fa-edit"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="envelope" >
							<input type="radio" name="iconfonts_name" data-name="envelope" id="wn-far wn-fa-envelope" value="wn-fa-envelope">
							<label for="wn-far wn-fa-envelope"><i class="wn-far wn-fa-envelope"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="envelope-open" >
							<input type="radio" name="iconfonts_name" data-name="envelope-open" id="wn-far wn-fa-envelope-open" value="wn-fa-envelope-open">
							<label for="wn-far wn-fa-envelope-open"><i class="wn-far wn-fa-envelope-open"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="eye" >
							<input type="radio" name="iconfonts_name" data-name="eye" id="wn-far wn-fa-eye" value="wn-fa-eye">
							<label for="wn-far wn-fa-eye"><i class="wn-far wn-fa-eye"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="eye-slash" >
							<input type="radio" name="iconfonts_name" data-name="eye-slash" id="wn-far wn-fa-eye-slash" value="wn-fa-eye-slash">
							<label for="wn-far wn-fa-eye-slash"><i class="wn-far wn-fa-eye-slash"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="file" >
							<input type="radio" name="iconfonts_name" data-name="file" id="wn-far wn-fa-file" value="wn-fa-file">
							<label for="wn-far wn-fa-file"><i class="wn-far wn-fa-file"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="file-alt" >
							<input type="radio" name="iconfonts_name" data-name="file-alt" id="wn-far wn-fa-file-alt" value="wn-fa-file-alt">
							<label for="wn-far wn-fa-file-alt"><i class="wn-far wn-fa-file-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="file-archive" >
							<input type="radio" name="iconfonts_name" data-name="file-archive" id="wn-far wn-fa-file-archive" value="wn-fa-file-archive">
							<label for="wn-far wn-fa-file-archive"><i class="wn-far wn-fa-file-archive"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="file-audio" >
							<input type="radio" name="iconfonts_name" data-name="file-audio" id="wn-far wn-fa-file-audio" value="wn-fa-file-audio">
							<label for="wn-far wn-fa-file-audio"><i class="wn-far wn-fa-file-audio"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="file-code" >
							<input type="radio" name="iconfonts_name" data-name="file-code" id="wn-far wn-fa-file-code" value="wn-fa-file-code">
							<label for="wn-far wn-fa-file-code"><i class="wn-far wn-fa-file-code"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="file-excel" >
							<input type="radio" name="iconfonts_name" data-name="file-excel" id="wn-far wn-fa-file-excel" value="wn-fa-file-excel">
							<label for="wn-far wn-fa-file-excel"><i class="wn-far wn-fa-file-excel"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="file-image" >
							<input type="radio" name="iconfonts_name" data-name="file-image" id="wn-far wn-fa-file-image" value="wn-fa-file-image">
							<label for="wn-far wn-fa-file-image"><i class="wn-far wn-fa-file-image"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="file-pdf" >
							<input type="radio" name="iconfonts_name" data-name="file-pdf" id="wn-far wn-fa-file-pdf" value="wn-fa-file-pdf">
							<label for="wn-far wn-fa-file-pdf"><i class="wn-far wn-fa-file-pdf"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="file-powerpoint" >
							<input type="radio" name="iconfonts_name" data-name="file-powerpoint" id="wn-far wn-fa-file-powerpoint" value="wn-fa-file-powerpoint">
							<label for="wn-far wn-fa-file-powerpoint"><i class="wn-far wn-fa-file-powerpoint"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="file-video" >
							<input type="radio" name="iconfonts_name" data-name="file-video" id="wn-far wn-fa-file-video" value="wn-fa-file-video">
							<label for="wn-far wn-fa-file-video"><i class="wn-far wn-fa-file-video"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="file-word" >
							<input type="radio" name="iconfonts_name" data-name="file-word" id="wn-far wn-fa-file-word" value="wn-fa-file-word">
							<label for="wn-far wn-fa-file-word"><i class="wn-far wn-fa-file-word"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="flag" >
							<input type="radio" name="iconfonts_name" data-name="flag" id="wn-far wn-fa-flag" value="wn-fa-flag">
							<label for="wn-far wn-fa-flag"><i class="wn-far wn-fa-flag"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="folder" >
							<input type="radio" name="iconfonts_name" data-name="folder" id="wn-far wn-fa-folder" value="wn-fa-folder">
							<label for="wn-far wn-fa-folder"><i class="wn-far wn-fa-folder"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="folder-open" >
							<input type="radio" name="iconfonts_name" data-name="folder-open" id="wn-far wn-fa-folder-open" value="wn-fa-folder-open">
							<label for="wn-far wn-fa-folder-open"><i class="wn-far wn-fa-folder-open"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="frown" >
							<input type="radio" name="iconfonts_name" data-name="frown" id="wn-far wn-fa-frown" value="wn-fa-frown">
							<label for="wn-far wn-fa-frown"><i class="wn-far wn-fa-frown"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="futbol" >
							<input type="radio" name="iconfonts_name" data-name="futbol" id="wn-far wn-fa-futbol" value="wn-fa-futbol">
							<label for="wn-far wn-fa-futbol"><i class="wn-far wn-fa-futbol"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="gem" >
							<input type="radio" name="iconfonts_name" data-name="gem" id="wn-far wn-fa-gem" value="wn-fa-gem">
							<label for="wn-far wn-fa-gem"><i class="wn-far wn-fa-gem"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hand-lizard" >
							<input type="radio" name="iconfonts_name" data-name="hand-lizard" id="wn-far wn-fa-hand-lizard" value="wn-fa-hand-lizard">
							<label for="wn-far wn-fa-hand-lizard"><i class="wn-far wn-fa-hand-lizard"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hand-paper" >
							<input type="radio" name="iconfonts_name" data-name="hand-paper" id="wn-far wn-fa-hand-paper" value="wn-fa-hand-paper">
							<label for="wn-far wn-fa-hand-paper"><i class="wn-far wn-fa-hand-paper"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hand-peace" >
							<input type="radio" name="iconfonts_name" data-name="hand-peace" id="wn-far wn-fa-hand-peace" value="wn-fa-hand-peace">
							<label for="wn-far wn-fa-hand-peace"><i class="wn-far wn-fa-hand-peace"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hand-point-down" >
							<input type="radio" name="iconfonts_name" data-name="hand-point-down" id="wn-far wn-fa-hand-point-down" value="wn-fa-hand-point-down">
							<label for="wn-far wn-fa-hand-point-down"><i class="wn-far wn-fa-hand-point-down"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hand-point-left" >
							<input type="radio" name="iconfonts_name" data-name="hand-point-left" id="wn-far wn-fa-hand-point-left" value="wn-fa-hand-point-left">
							<label for="wn-far wn-fa-hand-point-left"><i class="wn-far wn-fa-hand-point-left"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hand-point-right" >
							<input type="radio" name="iconfonts_name" data-name="hand-point-right" id="wn-far wn-fa-hand-point-right" value="wn-fa-hand-point-right">
							<label for="wn-far wn-fa-hand-point-right"><i class="wn-far wn-fa-hand-point-right"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hand-point-up" >
							<input type="radio" name="iconfonts_name" data-name="hand-point-up" id="wn-far wn-fa-hand-point-up" value="wn-fa-hand-point-up">
							<label for="wn-far wn-fa-hand-point-up"><i class="wn-far wn-fa-hand-point-up"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hand-pointer" >
							<input type="radio" name="iconfonts_name" data-name="hand-pointer" id="wn-far wn-fa-hand-pointer" value="wn-fa-hand-pointer">
							<label for="wn-far wn-fa-hand-pointer"><i class="wn-far wn-fa-hand-pointer"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hand-rock" >
							<input type="radio" name="iconfonts_name" data-name="hand-rock" id="wn-far wn-fa-hand-rock" value="wn-fa-hand-rock">
							<label for="wn-far wn-fa-hand-rock"><i class="wn-far wn-fa-hand-rock"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hand-scissors" >
							<input type="radio" name="iconfonts_name" data-name="hand-scissors" id="wn-far wn-fa-hand-scissors" value="wn-fa-hand-scissors">
							<label for="wn-far wn-fa-hand-scissors"><i class="wn-far wn-fa-hand-scissors"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hand-spock" >
							<input type="radio" name="iconfonts_name" data-name="hand-spock" id="wn-far wn-fa-hand-spock" value="wn-fa-hand-spock">
							<label for="wn-far wn-fa-hand-spock"><i class="wn-far wn-fa-hand-spock"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="handshake" >
							<input type="radio" name="iconfonts_name" data-name="handshake" id="wn-far wn-fa-handshake" value="wn-fa-handshake">
							<label for="wn-far wn-fa-handshake"><i class="wn-far wn-fa-handshake"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hdd" >
							<input type="radio" name="iconfonts_name" data-name="hdd" id="wn-far wn-fa-hdd" value="wn-fa-hdd">
							<label for="wn-far wn-fa-hdd"><i class="wn-far wn-fa-hdd"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="heart" >
							<input type="radio" name="iconfonts_name" data-name="heart" id="wn-far wn-fa-heart" value="wn-fa-heart">
							<label for="wn-far wn-fa-heart"><i class="wn-far wn-fa-heart"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hospital" >
							<input type="radio" name="iconfonts_name" data-name="hospital" id="wn-far wn-fa-hospital" value="wn-fa-hospital">
							<label for="wn-far wn-fa-hospital"><i class="wn-far wn-fa-hospital"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="hourglass" >
							<input type="radio" name="iconfonts_name" data-name="hourglass" id="wn-far wn-fa-hourglass" value="wn-fa-hourglass">
							<label for="wn-far wn-fa-hourglass"><i class="wn-far wn-fa-hourglass"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="id-badge" >
							<input type="radio" name="iconfonts_name" data-name="id-badge" id="wn-far wn-fa-id-badge" value="wn-fa-id-badge">
							<label for="wn-far wn-fa-id-badge"><i class="wn-far wn-fa-id-badge"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="id-card" >
							<input type="radio" name="iconfonts_name" data-name="id-card" id="wn-far wn-fa-id-card" value="wn-fa-id-card">
							<label for="wn-far wn-fa-id-card"><i class="wn-far wn-fa-id-card"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="image" >
							<input type="radio" name="iconfonts_name" data-name="image" id="wn-far wn-fa-image" value="wn-fa-image">
							<label for="wn-far wn-fa-image"><i class="wn-far wn-fa-image"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="images" >
							<input type="radio" name="iconfonts_name" data-name="images" id="wn-far wn-fa-images" value="wn-fa-images">
							<label for="wn-far wn-fa-images"><i class="wn-far wn-fa-images"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="keyboard" >
							<input type="radio" name="iconfonts_name" data-name="keyboard" id="wn-far wn-fa-keyboard" value="wn-fa-keyboard">
							<label for="wn-far wn-fa-keyboard"><i class="wn-far wn-fa-keyboard"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="lemon" >
							<input type="radio" name="iconfonts_name" data-name="lemon" id="wn-far wn-fa-lemon" value="wn-fa-lemon">
							<label for="wn-far wn-fa-lemon"><i class="wn-far wn-fa-lemon"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="life-ring" >
							<input type="radio" name="iconfonts_name" data-name="life-ring" id="wn-far wn-fa-life-ring" value="wn-fa-life-ring">
							<label for="wn-far wn-fa-life-ring"><i class="wn-far wn-fa-life-ring"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="lightbulb" >
							<input type="radio" name="iconfonts_name" data-name="lightbulb" id="wn-far wn-fa-lightbulb" value="wn-fa-lightbulb">
							<label for="wn-far wn-fa-lightbulb"><i class="wn-far wn-fa-lightbulb"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="list-alt" >
							<input type="radio" name="iconfonts_name" data-name="list-alt" id="wn-far wn-fa-list-alt" value="wn-fa-list-alt">
							<label for="wn-far wn-fa-list-alt"><i class="wn-far wn-fa-list-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="map" >
							<input type="radio" name="iconfonts_name" data-name="map" id="wn-far wn-fa-map" value="wn-fa-map">
							<label for="wn-far wn-fa-map"><i class="wn-far wn-fa-map"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="meh" >
							<input type="radio" name="iconfonts_name" data-name="meh" id="wn-far wn-fa-meh" value="wn-fa-meh">
							<label for="wn-far wn-fa-meh"><i class="wn-far wn-fa-meh"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="minus-square" >
							<input type="radio" name="iconfonts_name" data-name="minus-square" id="wn-far wn-fa-minus-square" value="wn-fa-minus-square">
							<label for="wn-far wn-fa-minus-square"><i class="wn-far wn-fa-minus-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="money-bill-alt" >
							<input type="radio" name="iconfonts_name" data-name="money-bill-alt" id="wn-far wn-fa-money-bill-alt" value="wn-fa-money-bill-alt">
							<label for="wn-far wn-fa-money-bill-alt"><i class="wn-far wn-fa-money-bill-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="moon" >
							<input type="radio" name="iconfonts_name" data-name="moon" id="wn-far wn-fa-moon" value="wn-fa-moon">
							<label for="wn-far wn-fa-moon"><i class="wn-far wn-fa-moon"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="newspaper" >
							<input type="radio" name="iconfonts_name" data-name="newspaper" id="wn-far wn-fa-newspaper" value="wn-fa-newspaper">
							<label for="wn-far wn-fa-newspaper"><i class="wn-far wn-fa-newspaper"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="object-group" >
							<input type="radio" name="iconfonts_name" data-name="object-group" id="wn-far wn-fa-object-group" value="wn-fa-object-group">
							<label for="wn-far wn-fa-object-group"><i class="wn-far wn-fa-object-group"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="object-ungroup" >
							<input type="radio" name="iconfonts_name" data-name="object-ungroup" id="wn-far wn-fa-object-ungroup" value="wn-fa-object-ungroup">
							<label for="wn-far wn-fa-object-ungroup"><i class="wn-far wn-fa-object-ungroup"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="paper-plane" >
							<input type="radio" name="iconfonts_name" data-name="paper-plane" id="wn-far wn-fa-paper-plane" value="wn-fa-paper-plane">
							<label for="wn-far wn-fa-paper-plane"><i class="wn-far wn-fa-paper-plane"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="pause-circle" >
							<input type="radio" name="iconfonts_name" data-name="pause-circle" id="wn-far wn-fa-pause-circle" value="wn-fa-pause-circle">
							<label for="wn-far wn-fa-pause-circle"><i class="wn-far wn-fa-pause-circle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="play-circle" >
							<input type="radio" name="iconfonts_name" data-name="play-circle" id="wn-far wn-fa-play-circle" value="wn-fa-play-circle">
							<label for="wn-far wn-fa-play-circle"><i class="wn-far wn-fa-play-circle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="plus-square" >
							<input type="radio" name="iconfonts_name" data-name="plus-square" id="wn-far wn-fa-plus-square" value="wn-fa-plus-square">
							<label for="wn-far wn-fa-plus-square"><i class="wn-far wn-fa-plus-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="question-circle" >
							<input type="radio" name="iconfonts_name" data-name="question-circle" id="wn-far wn-fa-question-circle" value="wn-fa-question-circle">
							<label for="wn-far wn-fa-question-circle"><i class="wn-far wn-fa-question-circle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="registered" >
							<input type="radio" name="iconfonts_name" data-name="registered" id="wn-far wn-fa-registered" value="wn-fa-registered">
							<label for="wn-far wn-fa-registered"><i class="wn-far wn-fa-registered"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="save" >
							<input type="radio" name="iconfonts_name" data-name="save" id="wn-far wn-fa-save" value="wn-fa-save">
							<label for="wn-far wn-fa-save"><i class="wn-far wn-fa-save"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="share-square" >
							<input type="radio" name="iconfonts_name" data-name="share-square" id="wn-far wn-fa-share-square" value="wn-fa-share-square">
							<label for="wn-far wn-fa-share-square"><i class="wn-far wn-fa-share-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="smile" >
							<input type="radio" name="iconfonts_name" data-name="smile" id="wn-far wn-fa-smile" value="wn-fa-smile">
							<label for="wn-far wn-fa-smile"><i class="wn-far wn-fa-smile"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="snowflake" >
							<input type="radio" name="iconfonts_name" data-name="snowflake" id="wn-far wn-fa-snowflake" value="wn-fa-snowflake">
							<label for="wn-far wn-fa-snowflake"><i class="wn-far wn-fa-snowflake"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="square" >
							<input type="radio" name="iconfonts_name" data-name="square" id="wn-far wn-fa-square" value="wn-fa-square">
							<label for="wn-far wn-fa-square"><i class="wn-far wn-fa-square"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="star" >
							<input type="radio" name="iconfonts_name" data-name="star" id="wn-far wn-fa-star" value="wn-fa-star">
							<label for="wn-far wn-fa-star"><i class="wn-far wn-fa-star"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="star-half" >
							<input type="radio" name="iconfonts_name" data-name="star-half" id="wn-far wn-fa-star-half" value="wn-fa-star-half">
							<label for="wn-far wn-fa-star-half"><i class="wn-far wn-fa-star-half"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sticky-note" >
							<input type="radio" name="iconfonts_name" data-name="sticky-note" id="wn-far wn-fa-sticky-note" value="wn-fa-sticky-note">
							<label for="wn-far wn-fa-sticky-note"><i class="wn-far wn-fa-sticky-note"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="stop-circle" >
							<input type="radio" name="iconfonts_name" data-name="stop-circle" id="wn-far wn-fa-stop-circle" value="wn-fa-stop-circle">
							<label for="wn-far wn-fa-stop-circle"><i class="wn-far wn-fa-stop-circle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="sun" >
							<input type="radio" name="iconfonts_name" data-name="sun" id="wn-far wn-fa-sun" value="wn-fa-sun">
							<label for="wn-far wn-fa-sun"><i class="wn-far wn-fa-sun"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="thumbs-down" >
							<input type="radio" name="iconfonts_name" data-name="thumbs-down" id="wn-far wn-fa-thumbs-down" value="wn-fa-thumbs-down">
							<label for="wn-far wn-fa-thumbs-down"><i class="wn-far wn-fa-thumbs-down"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="thumbs-up" >
							<input type="radio" name="iconfonts_name" data-name="thumbs-up" id="wn-far wn-fa-thumbs-up" value="wn-fa-thumbs-up">
							<label for="wn-far wn-fa-thumbs-up"><i class="wn-far wn-fa-thumbs-up"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="times-circle" >
							<input type="radio" name="iconfonts_name" data-name="times-circle" id="wn-far wn-fa-times-circle" value="wn-fa-times-circle">
							<label for="wn-far wn-fa-times-circle"><i class="wn-far wn-fa-times-circle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="trash-alt" >
							<input type="radio" name="iconfonts_name" data-name="trash-alt" id="wn-far wn-fa-trash-alt" value="wn-fa-trash-alt">
							<label for="wn-far wn-fa-trash-alt"><i class="wn-far wn-fa-trash-alt"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="user" >
							<input type="radio" name="iconfonts_name" data-name="user" id="wn-far wn-fa-user" value="wn-fa-user">
							<label for="wn-far wn-fa-user"><i class="wn-far wn-fa-user"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="user-circle" >
							<input type="radio" name="iconfonts_name" data-name="user-circle" id="wn-far wn-fa-user-circle" value="wn-fa-user-circle">
							<label for="wn-far wn-fa-user-circle"><i class="wn-far wn-fa-user-circle"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="window-close" >
							<input type="radio" name="iconfonts_name" data-name="window-close" id="wn-far wn-fa-window-close" value="wn-fa-window-close">
							<label for="wn-far wn-fa-window-close"><i class="wn-far wn-fa-window-close"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="window-maximize" >
							<input type="radio" name="iconfonts_name" data-name="window-maximize" id="wn-far wn-fa-window-maximize" value="wn-fa-window-maximize">
							<label for="wn-far wn-fa-window-maximize"><i class="wn-far wn-fa-window-maximize"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="window-minimize" >
							<input type="radio" name="iconfonts_name" data-name="window-minimize" id="wn-far wn-fa-window-minimize" value="wn-fa-window-minimize">
							<label for="wn-far wn-fa-window-minimize"><i class="wn-far wn-fa-window-minimize"></i></label>
						</li>
						<li class="wn-icon deep-lazy" icon-name="fontawesome" data-name="window-restore" >
							<input type="radio" name="iconfonts_name" data-name="window-restore" id="wn-far wn-fa-window-restore" value="wn-fa-window-restore">
							<label for="wn-far wn-fa-window-restore"><i class="wn-far wn-fa-window-restore"></i></label>
						</li>
					</ul>
				</div>
				-->
			</ul>
		</div>
	</div>';
	return $out;
}

if ( class_exists( 'Vc_Manager' ) ) :
	vc_add_shortcode_param( 'iconfonts', 'deep_icomoon_composer', WEBNUS_CORE_URL . 'shortcodes/assets/js/webnus-core.js' );
endif;
