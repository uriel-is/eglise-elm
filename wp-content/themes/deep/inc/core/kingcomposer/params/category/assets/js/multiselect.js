jQuery(document).ready(function($) {
	(function(){

		// make array to save checked list
		var		checked_list 	= {};
		// check box process
		$('.cat-item').find('.wn-checkbox-multi-state').on('click', function() {

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
			console.log($saved_value.val().toString());
		});


	})();
});