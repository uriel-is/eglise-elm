(function ($, window, document, undefined) {

    $(document).ready(function () {

        "use strict";

        $('#activity-filter-select , .widget .field_selectbox').find('select').niceSelect();
        var activity_filter_everything_text = $('#activity-filter-select').find('.nice-select').find('span.current').text();
        activity_filter_everything_text = activity_filter_everything_text.replace('— ', '');
        activity_filter_everything_text = activity_filter_everything_text.replace(' —', '');
        $('#activity-filter-select').find('.nice-select').find('span.current').text(activity_filter_everything_text);

        // Buddypress member navigation
        (function(){

            if ( $('#buddypress').find('#item-nav').find('.item-list-tabs').length >= 1 ) {

                // Variables
                var $member_nav_wrap    = $('#buddypress').find('#item-nav').find('.item-list-tabs'),
                    $member_nav_items   = $('#buddypress').find('#item-nav').find('.item-list-tabs').children('ul'),
                    $member_nav_item    = $('#buddypress').find('#item-nav').find('.item-list-tabs').children('ul').find('li'),
                    extra_nav_item     = '<li class="extra_nav_items"><a><i class="ti-more"></i></a></li>';

                if ( $member_nav_item.length >= 8 ) {
                    
                    // Add exter menu item to buddypress member nav
                    $(extra_nav_item).appendTo($member_nav_items);
                    
                    // Get clone from nav items to extra_nav_items
                    if ( $('.extra_nav_items').length > 0 ) {
                        
                        $member_nav_items.clone().prependTo('.extra_nav_items');

                        // Hide responsive nav
                        $member_nav_items.children('li.extra_nav_items').find('ul').hide();

                        // Show/Hide toggle responsive nav
                        $member_nav_items.children('li.extra_nav_items').on( 'click', (function(){

                            $(this).find('ul').fadeToggle('400');

                        }));

                    }

                }                    

            }

        })();
        
        (function() {

            if ($('#buddypress').find('#item-body').find('.item-list-tabs').length >= 1) {

                var $nav_wrap       = $('#item-body').find('.item-list-tabs').children('ul'),
                    $nav_item       = $nav_wrap.children('li:not(.last)'),
                    $nav_lst_item   = $nav_wrap.children('li.last'),
                    extra_nav_item  = '<li class="extra_nav_items_2"><ul></ul><a><i class="ti-more"></i></a></li>';

                    if ( $nav_item.length >= 4 ) {
                        
                        $(extra_nav_item).insertBefore($nav_lst_item);
                        
                        // Get clone from nav items to extra_nav_items_2
                        if ( $('.extra_nav_items_2').length > 0 ) {

                           $nav_item.clone().prependTo('.extra_nav_items_2 > ul');

                            // Hide responsive nav
                            $nav_wrap.children('li.extra_nav_items_2').find('ul').hide();

                            // Show/Hide toggle responsive nav
                            $nav_wrap.children('li.extra_nav_items_2').on('click', (function () {

                                $(this).find('ul').fadeToggle('400');

                            }));

                        }
                    }

            }

        })();

        // Profile message buttons
        (function(){

            // Variables
            var $public_message = $('#item-header-cover-image').find('.wn-profile-btns').children('#post-mention'),
                $private_message = $('#item-header-cover-image').find('.wn-profile-btns').children('#send-private-message');

            if ( $public_message.length > 0 && $private_message.length > 0 ) {

                // Add toggle message icon
                $public_message.before('<i class="ti-comments colorf"></i>');

                // invisible public & private message
                $public_message.hide();
                $private_message.hide();

                // Make toggle message btns
                $('.wn-profile-btns').find('i.ti-comments').on('click', (function(){

                    // Variables
                    var $this = $(this);
                        $public_message = $this.closest('.wn-profile-btns').children('#post-mention'),
                        $private_message = $this.closest('.wn-profile-btns').children('#send-private-message');

                        // 
                        $public_message.fadeToggle('700');
                        $private_message.fadeToggle('700');

                }));
            }

        })();
    });

    $(function () {

        $('.section.vertical').each(function () {
            $(this).find('ul.wn-tabs + div.wn-box').css('display', 'block');
        });

        $('.wn-profile-loop').each(function () {

            $(this).find('li:first-child').addClass('is-active').siblings().removeClass('is-active');

            $(this).find('li').each(function (i) {

                $(this).click(function () {

                    $(this).addClass('is-active').siblings().removeClass('is-active')
                        .parents('div.section').find('div.wn-profile-loop').eq($(this).index()).fadeIn(150).siblings('div.wn-profile-loop').hide();
                });
            });
        });
    });

    /** Register Page **/

    $(function () {
        $('#basic-details-section input').each(function () {
            $(this).attr('placeholder', $('[for="' + $(this).attr('id') + '"]').text());
        });
    });

    $(function () {
        $('#profile-details-section input').each(function () {
            $(this).attr('placeholder', $('[id="' + $(this).attr('aria-labelledby') + '"]').text().replace(/\s/g, ''));
        });
    });

    $(function () {
        $('#profile-details-section .visibility-toggle-link').each(function () {
            $(this).contents().filter(function () { return this.nodeType == 3; }).remove();
        });
    });

    $(function () {
        $('#wn-reset-password input').each(function () {
            $(this).attr('placeholder', $('[for="' + $(this).attr('id') + '"]').text());
        });
    });

    $(function () {
        $('.wn-masonry-item .action').each(function () {
            $(this).find('#send-private-message').remove().clone().appendTo($(this).find('.wn-dropdown-content'));
            $(this).find('.follow-button').remove().clone().appendTo($(this).find('.wn-dropdown-content'));
        });

        $('.wn-masonry-item .action').each(function () {
            $(this).find('.wn-dropdown-content').hide();
            $(this).find('.wn-dropdown-btn').click(function (e) {
                e.preventDefault();
                $(this).siblings('.wn-dropdown').find('.wn-dropdown-content').fadeToggle('700');
            });
        });

    });

    // recently active
    jQuery(".wn-avatar-block").owlCarousel({
        items: 5,
        autoPlay: true,
        margin: 9,
        dots: false,
        nav: true,
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        autoHeight: true,
        navText: ['<i class="icon-arrows-left"></i>', '<i class="icon-arrows-right"></i>'],
        responsiveClass: true,
        responsive: {
            0: {
                items: 4,
                nav: true,
            },
            600: {
                items: 5,
                nav: true,
            },
            1200: {
                items: 5,
                nav: true,
            }
        }
    });

})(jQuery, window, document);