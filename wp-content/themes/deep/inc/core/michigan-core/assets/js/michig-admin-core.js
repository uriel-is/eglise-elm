"use strict";
 
(function ($) {
    
    jQuery(document).ready(function () {

        var michigan_admin = {
            init: function() {
                this.CourseCatIcon();
            },
            CourseCatIcon: function() {
                
                var preview = $('.cours-icons').find('input#icon').val();
                if (preview != '') {
                    $('.cours-icons').find('#icon-preview').attr('class', preview +' icon-preview');
                    $('.'+preview).attr('data-clicked', '1');
                    $('.'+preview).addClass('active');
                }

                $('.cours-icons-wrap').find('.cat-icon').on('click', function () {
                    var $this   = $(this),
                        $wrap   = $this.closest('.cours-icons'),
                        $input  = $wrap.find('input#icon'),
                        iconcls = $this.data('name'),
                        clickcn = parseInt($this.attr('data-clicked'));

                    $this.addClass('active').siblings().removeClass('active');
                    $this.attr('data-clicked', clickcn + 1 ).siblings().attr('data-clicked', 0);
                    $input.val(iconcls);

                    var inputval = $input.val(),
                        clicked  = $this.attr('data-clicked');
                    
                    $wrap.find('#icon-preview').attr('class', 'icon-preview ' + inputval);

                    if ( clicked >= '2' && $this.hasClass('active')) {
                        $this.attr('data-clicked', 0);
                        $this.removeClass('active');
                        $wrap.find('#icon-preview').attr('class', '');
                        $input.val('');
                    }
                });
            }
        }
        michigan_admin.init();
    });

})(jQuery);
