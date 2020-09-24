<!-- modal date edit -->
<div class="whb-modal-wrap whb-modal-edit" data-element-target="menu-location">

	<div class="whb-modal-header">
		<h4><?php esc_html_e( 'Menu Location', 'deep' ); ?></h4>
		<i class="ti-close"></i>
	</div>

	<div class="whb-modal-contents-wrap">
		<div class="whb-modal-contents w-row">
			<ul class="whb-tabs-list whb-element-groups wp-clearfix">
				<li class="whb-tab w-active">
					<a href="#general">
						<span><?php esc_html_e( 'General', 'deep' ); ?></span>
					</a>
				</li>							
			</ul> <!-- end .whb-tabs-list -->
			
			<?php

				whb_textfield( array(
					'title'			=> esc_html__( 'Location Name', 'deep' ),
					'id'			=> 'location_name',
					'default'		=> 'Header Location',
				));

				esc_html_e( 'When you added this widget, it\'s will create a new menu location and you can use it in Appearance -> Menus -> Manage Locations', 'deep' );
			?>		
		</div>
	</div> <!-- end whb-modal-contents-wrap -->

	<div class="whb-modal-footer">
		<input type="button" class="whb_close button" value="<?php esc_html_e( 'Close', 'deep' ); ?>">
		<input type="button" class="whb_save button button-primary" value="<?php esc_html_e( 'Save Changes', 'deep' ); ?>">
	</div>

</div> <!-- end whb-elements -->