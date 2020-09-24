(function ($) {
	'use strict';
	$(document).ready(function () {
		$('.search-webnus-icons').hide();
		$('.webnus-icons-list-wrapper').find('.wn-choose-icon').on('click', function (e) {
			e.preventDefault();
			var $this = $(this),
				$wrap = $this.closest('.webnus-icons-list-wrapper'),
				icons = $wrap.find('.webnus-icons-list').html();

			icons = icons.replace('<!--', '').replace();
			icons = icons.replace('-->', '').replace();

			$wrap.find('.webnus-icons-list').html(icons);
			$wrap.find('.search-webnus-icons').show();
			$this.hide();

			// define global scope vars
			var count, f = '';

			// add class for recognzation
			$('.webnus-iconfonts-wrapper').each(function (i, obj) {
				count = i;
				var $this = $(this);
				var cname = $this.addClass('wbi_confonts' + (count + 1));
				var dname = $this.attr('data-id', count + 1);
			});

			// click on vc duplicate
			$(document).on('click', '.vc_param_group-add_content , .vc_control.column_clone', function () {
				var cname, las = 0;
				las = $('.webnus-iconfonts-wrapper').last().attr('data-id');
				if (typeof las === 'undefined') {
					las = $('.webnus-iconfonts-wrapper').eq(-2).attr('data-id');
				}
				las = ++las;
				setTimeout(function () {
					$('.webnus-iconfonts-wrapper').last().addClass('wbi_confonts' + (las));
					$('.webnus-iconfonts-wrapper').last().attr('data-id', (las));
					run();
				}, 4000);
				count = las;
			});

			// Selected after save
			var current_icon = $this.prev("#deep_icomoon_textbox").val();
			if ($this.prev("#deep_icomoon_textbox").val() != '') {
				$wrap.find('.webnus-icons-list').find('li.wn-icon').children('label[for="' + current_icon + '"]').css({
					background: '#f3abb2',
					border: '1px solid #e53f51 !important',
					color: '#222'
				}).addClass('activated');
			}

			// run iconparam on vc duplicate handler
			function run() {
				for (f = 1; f < count + 2; f++) {
					var cname = '.wbi_confonts' + f + ' .webnus-icons-list-wrapper .webnus-icons-list label';
					$(cname).click(function () {
						$('.webnus-icons-list label').attr('style', '');
						var $thiscname = $(this);
						var iconval = $thiscname.attr('for');
						var id = $thiscname.parent().parent().parent().parent().attr('data-id');
						$('.wbi_confonts' + id + ' .webnus-icons-list-wrapper .webnus-icons-list label').removeAttr('style');
						$thiscname.siblings().hide();
						$thiscname.closest('.webnus-icons-list-wrapper').find('#deep_icomoon_textbox').val(iconval);
					});
				}
			}
			run();

			// iconparam search 
			$('.search-webnus-icons').find('input[type="text"]').on('keyup', function () {
				var search_value = $(this).val();
				if (search_value !== '') {
					$('li[data-name]').hide();
					$('li[data-name*=' + search_value + ']').show();
				} else {
					$('li[data-name]').show();
				}
				if (search_value == '') {
					$('li[data-name]').show();
					$('.icon-filter').find('.icons-menu[data-name="all"]').children('a').trigger('click');
				}
			});

			$('.icon-filter').find('.icons-menu').children('a').on('click', function (e) {
				e.preventDefault();
				var filter_value = $(this).closest('.icons-menu').data('name');

				$(this).closest('.icons-menu').addClass('active').siblings().removeClass('active');
				$('#deep_icomoon_textbox').attr('data-icon-menu', filter_value);
				if (filter_value) {
					$('ul[data-name]').fadeOut();
					$('ul[data-name*=' + filter_value + ']').fadeIn();
				} else {
					$('ul[data-name]').fadeIn();
				}
				if (filter_value == 'all') {
					$('ul[data-name]').fadeIn();
				}
			});
		});
	});
	$('.vc_param_group-collapsed').find('.column_toggle').on('click', function () {
		$('.search-webnus-icons').hide();
		$('.webnus-icons-list-wrapper').find('.wn-choose-icon').on('click', function (e) {
			e.preventDefault();
			var $this = $(this),
				$wrap = $this.closest('.webnus-icons-list-wrapper'),
				icons = $wrap.find('.webnus-icons-list').html();

			icons = icons.replace('<!--', '').replace();
			icons = icons.replace('-->', '').replace();

			$wrap.find('.webnus-icons-list').html(icons);
			$wrap.find('.search-webnus-icons').show();
			$this.hide();

			// define global scope vars
			var count, f = '';

			// add class for recognzation
			$('.webnus-iconfonts-wrapper').each(function (i, obj) {
				count = i;
				var $this = $(this);
				var cname = $this.addClass('wbi_confonts' + (count + 1));
				var dname = $this.attr('data-id', count + 1);
			});

			// click on vc duplicate
			$(document).on('click', '.vc_param_group-add_content , .vc_control.column_clone', function () {
				var cname, las = 0;
				las = $('.webnus-iconfonts-wrapper').last().attr('data-id');
				if (typeof las === 'undefined') {
					las = $('.webnus-iconfonts-wrapper').eq(-2).attr('data-id');
				}
				las = ++las;
				setTimeout(function () {
					$('.webnus-iconfonts-wrapper').last().addClass('wbi_confonts' + (las));
					$('.webnus-iconfonts-wrapper').last().attr('data-id', (las));
					run();
				}, 4000);
				count = las;
			});

			// Selected after save
			var current_icon = $this.prev("#deep_icomoon_textbox").val();
			if ($this.prev("#deep_icomoon_textbox").val() != '') {
				$wrap.find('.webnus-icons-list').find('li.wn-icon').children('label[for="' + current_icon + '"]').css({
					background: '#f3abb2',
					border: '1px solid #e53f51 !important',
					color: '#222'
				}).addClass('activated');
			}

			// run iconparam on vc duplicate handler
			function run() {
				for (f = 1; f < count + 2; f++) {
					var cname = '.wbi_confonts' + f + ' .webnus-icons-list-wrapper .webnus-icons-list label';
					$(cname).click(function () {
						$('.webnus-icons-list label').attr('style', '');
						var $thiscname = $(this);
						var iconval = $thiscname.attr('for');
						var id = $thiscname.parent().parent().parent().parent().attr('data-id');
						$('.wbi_confonts' + id + ' .webnus-icons-list-wrapper .webnus-icons-list label').removeAttr('style');
						$thiscname.siblings().hide();
						$thiscname.closest('.webnus-icons-list-wrapper').find('#deep_icomoon_textbox').val(iconval);
					});
				}
			}
			run();

			// iconparam search 
			$('.search-webnus-icons').find('input[type="text"]').on('keyup', function () {
				var search_value = $(this).val();
				if (search_value !== '') {
					$('li[data-name]').hide();
					$('li[data-name*=' + search_value + ']').show();
				} else {
					$('li[data-name]').show();
				}
				if (search_value == '') {
					$('li[data-name]').show();
					$('.icon-filter').find('.icons-menu[data-name="all"]').children('a').trigger('click');
				}
			});

			$('.icon-filter').find('.icons-menu').children('a').on('click', function (e) {
				e.preventDefault();
				var filter_value = $(this).closest('.icons-menu').data('name');

				$(this).closest('.icons-menu').addClass('active').siblings().removeClass('active');
				$('#deep_icomoon_textbox').attr('data-icon-menu', filter_value);
				if (filter_value) {
					$('ul[data-name]').fadeOut();
					$('ul[data-name*=' + filter_value + ']').fadeIn();
				} else {
					$('ul[data-name]').fadeIn();
				}
				if (filter_value == 'all') {
					$('ul[data-name]').fadeIn();
				}
			});
		});
	});
})(jQuery);