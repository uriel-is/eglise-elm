(function ($) {

    "use strict";


    jQuery(document).ready(function () {

        /* Sticky Header */
        var sticky_size = '';
        if (Math.max(document.documentElement.clientWidth, window.innerWidth || 0) > 960) {
            sticky_size = 'desktop';
        } else if (768 < Math.max(document.documentElement.clientWidth, window.innerWidth || 0) && Math.max(document.documentElement.clientWidth, window.innerWidth || 0) < 960) {
            sticky_size = 'tablets';
        } else if (Math.max(document.documentElement.clientWidth, window.innerWidth || 0) < 768) {
            sticky_size = 'mobiles';
        }

        $('.whb-sticky-view.both:not(.whb-sticky-fixed)').scrollMenu({
            scrollUpClass: 'is-visible',
            scrollDownClass: 'is-visible',
            scrollTopClass: 'is-top',
            scrollBottomClass: 'is-bottom',
            timeOut: 1000 / 60,
            tolleranceUp: 5,
            tolleranceDown: 5,
            scrollOffset: $('.whb-' + sticky_size + '-view').outerHeight() + 50,
            onScrollMenuUp: function () { },
            onScrollMenuDown: function () { },
            onScrollMenuTop: function () { },
            onScrollMenuBottom: function () { },
            onScrollMenuOffsetIn: function () {
                $('.whb-sticky-view:not(.whb-sticky-fixed)').addClass('header-sticky-hide');
            },
            onScrollMenuOffsetOut: function () {
                $('.whb-sticky-view:not(.whb-sticky-fixed)').removeClass('header-sticky-hide');
            }
        });

        $('.whb-sticky-view.upscroll:not(.whb-sticky-fixed)').scrollMenu({
            scrollUpClass: 'is-visible',
            scrollDownClass: 'is-hidden',
            scrollTopClass: 'is-top',
            scrollBottomClass: 'is-bottom',
            timeOut: 1000 / 60,
            tolleranceUp: 5,
            tolleranceDown: 5,
            scrollOffset: $('.whb-' + sticky_size + '-view').outerHeight() + 50,
            onScrollMenuUp: function () { },
            onScrollMenuDown: function () { },
            onScrollMenuTop: function () { },
            onScrollMenuBottom: function () { },
            onScrollMenuOffsetIn: function () {
                $('.whb-sticky-view:not(.whb-sticky-fixed)').addClass('header-sticky-hide');
            },
            onScrollMenuOffsetOut: function () {
                $('.whb-sticky-view:not(.whb-sticky-fixed)').removeClass('header-sticky-hide');
            }
        });

        $('.whb-sticky-view.downscroll:not(.whb-sticky-fixed)').scrollMenu({
            scrollUpClass: 'is-hidden',
            scrollDownClass: 'is-visible',
            scrollTopClass: 'is-top',
            scrollBottomClass: 'is-bottom',
            timeOut: 1000 / 60,
            tolleranceUp: 5,
            tolleranceDown: 5,
            scrollOffset: $('.whb-' + sticky_size + '-view').outerHeight() + 50,
            onScrollMenuUp: function () { },
            onScrollMenuDown: function () { },
            onScrollMenuTop: function () { },
            onScrollMenuBottom: function () { },
            onScrollMenuOffsetIn: function () {
                $('.whb-sticky-view:not(.whb-sticky-fixed)').addClass('header-sticky-hide');
            },
            onScrollMenuOffsetOut: function () {
                $('.whb-sticky-view:not(.whb-sticky-fixed)').removeClass('header-sticky-hide');
            }
        });


        // Navigation Current Menu
        jQuery('.nav li.current-menu-item, .nav li.current_page_item, #side-nav li.current_page_item, .nav li.current-menu-ancestor, .nav li ul li ul li.current-menu-item , #hamburger-nav li.current-menu-item, #hamburger-nav li.current_page_item, #hamburger-nav li.current-menu-ancestor, #hamburger-nav li ul li ul li.current-menu-item, .full-menu li.current-menu-item, .full-menu li.current_page_item, .full-menu li.current-menu-ancestor, .full-menu li ul li ul li.current-menu-item ').addClass('current');
        jQuery('.nav li ul li:has(ul)').addClass('submenux');

        $('.whb-header-toggle').contentToggle({
            defaultState: 'close',
            globalClose: true,
            triggerSelector: ".whb-trigger-element",
            toggleProperties: ['height', 'opacity'],
            toggleOptions: {
                duration: 300
            }
        });

        // Share modal
        var header_share = $('.header-share-modal-wrap').html();
        $('.header-share-modal-wrap').remove();
        $(".main-slide-toggle").append(header_share);

        // Social modal
        var header_social = $('.header-social-modal-wrap').html();
        $('.header-social-modal-wrap').remove();
        $(".main-slide-toggle").append(header_social);

        // Search modal Type 2
        var header_search_type2 = $('.header-search-modal-wrap').html();
        $('.header-search-modal-wrap').remove();
        $(".main-slide-toggle").append(header_search_type2);

        // Share Toggles
        $('#wn-share-modal-icon').click(function () {
            var $current_element = $(this).closest('#webnus-header-builder');
            if ($current_element.find('.wn-header-share').hasClass('opened')) {
                $current_element.find('.main-slide-toggle').slideUp('opened');
                $current_element.find('.wn-header-share').removeClass('opened');
            } else {
                $current_element.find('.main-slide-toggle').slideDown(240);
                $current_element.find('#header-search-modal').slideUp(240);
                $current_element.find('#header-social-modal').slideUp(240);
                $current_element.find('#header-share-modal').slideDown(240);
                $current_element.find('.wn-header-share').addClass('opened');
                $current_element.find('.wn-header-search').removeClass('opened');
                $current_element.find('.wn-header-social').removeClass('opened');
            }

        });

        $(document).on('click', function (e) {
            if (e.target.id == 'wn-share-modal-icon')
                return;

            var $this = $('#wn-share-modal-icon');
            if ($this.closest('#webnus-header-builder').find('.wn-header-share').hasClass('opened')) {
                $this.closest('#webnus-header-builder').find('.main-slide-toggle').slideUp('opened');
                $this.closest('#webnus-header-builder').find('.wn-header-share').removeClass('opened');
            }
        });

        // Social dropdown
        $('.whb-social').each(function (index, el) {
            $(this).find('#wn-social-dropdown-icon').on('click', function (event) {
                $(this).siblings('#header-social-dropdown-wrap').fadeToggle('fast', function () {
                    if ($("#header-social-dropdown-wrap").is(":visible")) {
                        $(document).on('click', function (e) {
                            var target = $(e.target);
                            if (target.parents('.whb-social').length)
                                return;
                            $("#header-social-dropdown-wrap").css({
                                display: 'none',
                            });
                        });
                    }
                });
            });
        });

        // social full
        $('.whb-social').find('#wn-social-slide-icon').each(function (index, el) {
            $(this).magnificPopup({
                type: 'inline',
                removalDelay: 100,
                mainClass: 'mfp-zoom-in full-social',
                midClick: true,
                showCloseBtn: true,
                closeBtnInside: false,
                closeOnBgClick: false,
            });
        });


        // Social Toggles
        $('#wn-social-modal-icon').click(function () {
            var $current_element = $(this).closest('#webnus-header-builder');
            if ($current_element.find('.wn-header-social').hasClass('opened')) {
                $current_element.find('.main-slide-toggle').slideUp('opened');
                $current_element.find('.wn-header-social').removeClass('opened');
            } else {
                $current_element.find('.main-slide-toggle').slideDown(240);
                $current_element.find('#header-search-modal').slideUp(240);
                $current_element.find('#header-share-modal').slideUp(240);
                $current_element.find('#header-social-modal').slideDown(240);
                $current_element.find('.wn-header-social').addClass('opened');
                $current_element.find('.wn-header-search').removeClass('opened');
                $current_element.find('.wn-header-share').removeClass('opened');
            }

        });

        $(document).on('click', function (e) {
            if (e.target.id == 'wn-social-modal-icon')
                return;

            var $this = $('#wn-social-modal-icon');
            if ($this.closest('#webnus-header-builder').find('.wn-header-social').hasClass('opened')) {
                $this.closest('#webnus-header-builder').find('.main-slide-toggle').slideUp('opened');
                $this.closest('#webnus-header-builder').find('.wn-header-social').removeClass('opened');
            }
        });

        // Search full
        $('.whb-header-full').find('.whb-trigger-element').find('a').each(function (index, el) {
            $(this).magnificPopup({
                type: 'inline',
                removalDelay: 100,
                mainClass: 'mfp-zoom-in full-search',
                midClick: true,
                showCloseBtn: true,
                closeBtnInside: false,
                closeOnBgClick: false,
            });
        });


        // Search Toggles
        $('.whb-header-slide').find('.whb-trigger-element').on('click', function (e) {
            var $current_element = $(this).closest('#webnus-header-builder');
            if ($current_element.find('.wn-header-search').hasClass('opened')) {
                $current_element.find('.main-slide-toggle').slideUp('opened');
                $current_element.find('.wn-header-search').removeClass('opened');
            } else {
                $current_element.find('.main-slide-toggle').slideDown(240);
                $current_element.find('#header-social-modal').slideUp(240);
                $current_element.find('#header-share-modal').slideUp(240);
                $current_element.find('#header-search-modal').slideDown(240);
                $current_element.find('.wn-header-search').addClass('opened');
                $current_element.find('.wn-header-social').removeClass('opened');
                $current_element.find('.wn-header-share').removeClass('opened');
                $current_element.find('.header-search-modal-text-box').focus();
            }

        });

        $(document).on('click', function (e) {
            //  return;
            var target = $(e.target);
            if (e.target.id == 'wn-search-modal-icon' || e.target.id == 'search-icon-trigger' || e.target.id == 'whb-trigger-element' || target.parents('.main-slide-toggle').length)
                return;

            var $this = $('.whb-header-slide').find('.whb-trigger-element');
            if ($this.closest('#webnus-header-builder').find('.wn-header-search').hasClass('opened')) {
                $this.closest('#webnus-header-builder').find('.main-slide-toggle').slideUp('opened');
                $this.closest('#webnus-header-builder').find('.wn-header-search').removeClass('opened');
            }
        });

        $(document).on('click', '#header-search-modal,#header-social-modal,#header-share-modal', function (e) {
            e.stopPropagation();
        });


        // Woocommerce Mini Cart
        $(document).on('click', '.mini_cart_item .remove', function (event) {
            var $this = $(this),
                $preloader = $('<div class="wn-circle-side-wrap"><div data-loader="wn-circle-side"></div></div>'),
                cartproductid = $this.data('product_id');
            event.preventDefault();
            $preloader.appendTo($(this).closest('.wn-header-woo-cart'));
            $.ajax({
                url: woocommerce_params.ajax_url,
                type: 'POST',
                dataType: 'html',
                data: {
                    action: 'wn_woo_ajax_update_cart',
                    cart_product_id: cartproductid,
                },
                success: function (data) {
                    $('.wn-header-woo-cart-wrap').html(data);
                    $preloader.remove();
                    $this.closest('.wn-header-woo-cart').slideDown();
                    setTimeout(function () {
                        $this.find('.wn-ajax-error').remove();
                    }, 400);
                    var cart_items = $('.wn-count-cart-product').attr('data-items');
                    $('span.header-cart-count-icon').text(cart_items);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) { }
            });

        });

        // Woocommerce Add To Cart
        $(document).on('click', '.wn-woo-add-to-cart-btn .add_to_cart_button.ajax_add_to_cart, .type-list-readmore .add_to_cart_button.ajax_add_to_cart', function (event) {
            event.preventDefault();
            var $this = $(this),
                $preloader = $('<div class="wn-circle-side-wrap"><div data-loader="wn-circle-side"></div></div>'),
                $cart = $('#webnus-header-builder').find('.whb-screen-view:not(.whb-sticky-view)').find('.wn-header-woo-cart'),
                cartproductid = $this.data('product_id');

            $("html, body").animate({
                scrollTop: 0
            }, 700);
            $cart.append($preloader);
            if (!$cart.hasClass('open-cart')) {
                $cart.addClass('is-open').slideDown();
            }
            if (!$('#wn-cart-modal-icon').hasClass('open-cart')) {
                $('#wn-cart-modal-icon').addClass('open-cart');
            }

            $.ajax({
                url: woocommerce_params.ajax_url,
                type: 'POST',
                dataType: 'html',
                data: {
                    action: 'wn_woo_ajax_add_to_cart',
                    cart_product_id: cartproductid,
                },
                success: function (data) {
                    $('.wn-header-woo-cart-wrap').html(data);
                    $cart.find('.wn-circle-side-wrap').remove();
                    var cart_items = $('.wn-count-cart-product').attr('data-items');
                    $('.whb-cart').find('.wn-cart-modal-icon').find('.header-cart-count-icon').text(cart_items).attr('data-cart_count', cart_items);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) { }
            });

        });


        // Woocommerce Icon in header
        $('#webnus-header-builder').find('.whb-cart').on('click', '#wn-cart-modal-icon', function (event) {
            event.preventDefault();
            if ($(this).hasClass('open-cart')) {
                $(this).removeClass('open-cart');
                $(this).closest('.whb-cart').removeClass('is-open');
                $(this).closest('.whb-cart').find('.wn-header-woo-cart').addClass('is-open').slideUp(300);
            } else {
                $(this).addClass('open-cart');
                $(this).closest('.whb-cart').addClass('is-open');
                $(this).closest('.whb-cart').find('.wn-header-woo-cart').removeClass('is-open').slideDown(300);
            }
        });

        $(document).click(function (e) {
            var target = $(e.target);
            if (e.target.id == 'wn-cart-modal-icon' || e.target.id == 'header-cart-icon' || e.target.id == 'header-cart-count-icon' || target.hasClass('add_to_cart_button') || target.parent().hasClass('add_to_cart_button')) {
                return;
            }

            var target_element = $('#webnus-header-builder').find('.whb-cart').find('#wn-cart-modal-icon');
            if (target_element.hasClass('open-cart')) {
                target_element.removeClass('open-cart');
                target_element.closest('.whb-cart').removeClass('is-open');
                target_element.closest('.whb-cart').find('.wn-header-woo-cart').slideUp(300);
            }
        });

        $(document).on('click', '#wn-header-woo-cart', function (e) {
            e.stopPropagation();
        });

        if ($.fn.magnificPopup) {

            // Popup map or any iframe
            $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,

                fixedContentPos: false
            });

            // Inline popups
            $('.whb-modal-element').each(function (index, el) {
                $(this).magnificPopup({
                    type: 'inline',
                    removalDelay: 500,
                    callbacks: {
                        beforeOpen: function () {
                            this.st.mainClass = this.st.el.attr('data-effect');
                        }
                    },
                    midClick: true
                });
            });

        }


        if ($.fn.niceSelect) {
            $('.wn-polylang-switcher-dropdown select').niceSelect();
        }


        if ($.fn.superfish) {
            $('.whb-area:not(.whb-vertical) ul.nav').superfish({
                delay: 300,
                hoverClass: 'wn-menu-hover',
                animation: {
                    opacity: "show",
                    height: 'show'
                },
                animationOut: {
                    opacity: "hide",
                    height: 'hide'
                },
                easing: 'easeOutQuint',
                speed: 280,
                speedOut: 0,
                pathLevels: 2,
            });
        }

        $('.whb-nav-wrap .nav li a').addClass('hcolorf');

        // Hamburger Menu
        var $hamurgerMenuWrapClone = $('.toggle').find('.hamburger-menu-wrap-cl').clone().remove();
        if ($hamurgerMenuWrapClone.length > 0) {
            $('body').find('.wn-hamuburger-bg').remove();
            $hamurgerMenuWrapClone.appendTo('body');
        }

        if ($('.hamburger-menu-wrap-cl').hasClass('toggle-right')) {
            $('body').addClass('wn-ht whmb-right');
        } else if ($('.hamburger-menu-wrap-cl').hasClass('toggle-left')) {
            $('body').addClass('wn-ht whmb-left');
        }

        //Hamburger Nicescroll
        if ($.fn.niceScroll) {
            $('.hamburger-menu-main').niceScroll({
                scrollbarid: 'whb-hamburger-scroll',
                cursorwidth: "5px",
                autohidemode: true,
            });
        }

        if ($.fn.niceScroll) {
            $('.hamburger-menu-main').mouseover(function() {
                $('.hamburger-menu-main').getNiceScroll().resize();
            });
        }

        $('.wn-ht').find('.whb-hamburger-menu.toggle').on('click', '#wn-hamburger-icon', function (event) {
            event.preventDefault();
            if ($(this).closest('.whb-hamburger-menu.toggle').hasClass('is-open')) {
                $(this).closest('.whb-hamburger-menu.toggle').removeClass('is-open');
                $(this).closest('.wn-ht').find('.hamburger-menu-wrap-cl').removeClass('hm-open');
                $(this).closest('.wn-ht').removeClass('is-open');
                if ($.fn.getNiceScroll) {
                    $('.hamburger-menu-main').getNiceScroll().resize();
                }
            } else {
                $(this).closest('.whb-hamburger-menu.toggle').addClass('is-open');
                $(this).closest('.wn-ht').find('.hamburger-menu-wrap-cl').addClass('hm-open');
                $(this).closest('.wn-ht').addClass('is-open');
                if ($.fn.getNiceScroll) {
                    $('.hamburger-menu-main').getNiceScroll().resize();
                }
            }
        });

        $('#hamburger-nav.toggle-menu').find('li').each(function () {
            var $list_item = $(this);
            
            if ($list_item.find('a').first().attr('href') == '#') {               

                $list_item.find('a').first().toggle(function () {
                    
                    $list_item.find('a').first().children('i').attr('class', 'sl-arrow-up hamburger-nav-icon');
                    $list_item.children('ul').slideDown(350);
                }, function () {
                    $list_item.find('a').first().children('i').attr('class', 'sl-arrow-down hamburger-nav-icon');
                    $list_item.children('ul').slideUp(350);
                });             
            } 

            if ($list_item.children('ul').length) {
                $list_item.children('a').append('<i class="sl-arrow-down hamburger-nav-icon"></i>');
            }

            $list_item.children('a').children('i').toggle(function () {
                $(this).attr('class', 'sl-arrow-up hamburger-nav-icon');
                $list_item.children('ul').slideDown(350);
            }, function () {
                $(this).attr('class', 'sl-arrow-down hamburger-nav-icon');
                $list_item.children('ul').slideUp(350);
            });
        });

        //Full hamburger Menu
        $('.whb-hamburger-menu.full').find('.whb-icon-element.close-button').toggle(function () {
            $(this).siblings('.wn-hamburger-wrap').addClass('open-menu');
            $(this).removeClass('close-button').addClass('open-button').find('.hamburger-icon').addClass('open');
        }, function () {
            $(this).siblings('.wn-hamburger-wrap').removeClass('open-menu');
            $(this).removeClass('open-button').addClass('close-button').find('.hamburger-icon').removeClass('open');
        });



        $('.full-menu').find('li').each(function () {
            var $list_item = $(this);

            if ($list_item.children('ul').length) {
                $list_item.children('a').append('<i class="sl-arrow-down hamburger-nav-icon"></i>');
            }

            $list_item.children('a').children('i').toggle(function () {
                $(this).attr('class', 'sl-arrow-up hamburger-nav-icon');
                $list_item.children('ul').slideDown(350);
            }, function () {
                $(this).attr('class', 'sl-arrow-down hamburger-nav-icon');
                $list_item.children('ul').slideUp(350);
            });
        });

        $(document).on('click', function (e) {
            var target = $(e.target);
            if (e.target.id == 'wn-hamburger-icon' || target.parents('#wn-hamburger-icon').length)
                return;
            var $this = $('body');
            if ($this.hasClass('is-open')) {
                $this.find('.whb-hamburger-menu.toggle').removeClass('is-open');
                $this.removeClass('is-open');
            }
        });

        $(document).on('click', '.hamburger-menu-wrap-cl', function (e) {
            e.stopPropagation();
        });


        // Topbar search form
        $('.top-search-form-icon').on('click', function () {
            $('.top-search-form-box').addClass('show-sbox');
            $('#top-search-box').focus();
        });
        $(document).on('click', function (ev) {
            var myID = ev.target.id;
            if ((myID != 'top-searchbox-icon') && myID != 'top-search-box') {
                $('.top-search-form-box').removeClass('show-sbox');
            }
        });

        // Responsive Menu
        $('.whb-responsive-menu-icon-wrap').on('click', function () {
            var $toggleMenuIcon = $(this),
                uniqid = $toggleMenuIcon.data('uniqid'),
                $responsiveMenu = $('.whb-responsive-menu-wrap[data-uniqid="' + uniqid + '"]'),
                $closeIcon = $responsiveMenu.find('.close-responsive-nav');

            if ($responsiveMenu.hasClass('open') === false) {
                $toggleMenuIcon.addClass('open-icon-wrap').children().addClass('open');
                $closeIcon.addClass('open-icon-wrap').children().addClass('open');
                $responsiveMenu.animate({
                    'left': 0
                }, 350).addClass('open');
            } else {
                $toggleMenuIcon.removeClass('open-icon-wrap').children().removeClass('open');
                $closeIcon.removeClass('open-icon-wrap').children().removeClass('open');
                $responsiveMenu.animate({
                    'left': -265
                }, 350).removeClass('open');
            }
        });

        $('.whb-responsive-menu-wrap').each(function () {
            var $this = $(this),
                uniqid = $this.data('uniqid'),
                $responsiveMenu = $this.clone(),
                $closeIcon = $responsiveMenu.find('.close-responsive-nav'),
                $toggleMenuIcon = $('.whb-responsive-menu-icon-wrap[data-uniqid="' + uniqid + '"]');

            // append responsive menu to webnus header builder wrap
            $this.remove();
            $('#webnus-header-builder').append($responsiveMenu);

            // add arrow down to parent menus
            $responsiveMenu.find('li').each(function () {
                var $list_item = $(this);

                if ($list_item.children('ul').length) {
                    $list_item.children('a').append('<i class="sl-arrow-right respo-nav-icon"></i>');
                }
                /* trigger on a custom link */
                if ($list_item.hasClass('menu-item-has-children') || $list_item.hasClass('mega')) {
                    var href = $list_item.find('a').attr('href');
                    if (href == '#' || $list_item == '') {
                        $list_item.children('a').on('click', function () {
                            $list_item.children('a').children('i').trigger('click');
                        });
                    }
                }
                $list_item.children('a').children('i').toggle(function () {
                    $(this).attr('class', 'sl-arrow-down respo-nav-icon');
                    $list_item.children('ul').slideDown(350);
                }, function () {
                    $(this).attr('class', 'sl-arrow-right respo-nav-icon');
                    $list_item.children('ul').slideUp(350);
                });
            });

            // close responsive menu
            $closeIcon.on('click', function () {
                if ($toggleMenuIcon.hasClass('open-icon-wrap')) {
                    $toggleMenuIcon.removeClass('open-icon-wrap').children().removeClass('open');
                    $closeIcon.removeClass('open-icon-wrap').children().removeClass('open');
                } else {
                    $toggleMenuIcon.addClass('open-icon-wrap').children().addClass('open');
                    $closeIcon.addClass('open-icon-wrap').children().addClass('open');
                }

                if ($responsiveMenu.hasClass('open') === true) {
                    $responsiveMenu.animate({
                        'left': -265
                    }, 350).removeClass('open');
                }
            });
        });

        // Login Dropdown
        $('.whb-login').each(function (index, el) {
            $(this).find('#wn-login-dropdown-icon').on('click', function (event) {
                $(this).siblings('#w-login').fadeToggle('fast', function () {
                    if ($("#w-login").is(":visible")) {
                        $(document).on('click', function (e) {
                            var target = $(e.target);
                            if (target.parents('.whb-login').length)
                                return;
                            $("#w-login").css({
                                display: 'none',
                            });
                        });
                    }
                });
            });
        });

        $('#loginform input[type="text"]').attr('placeholder', 'Username or Email');
        $('#loginform input[type="password"]').attr('placeholder', 'Password');


        // Contact Dropdown
        $('.whb-contact').each(function (index, el) {
            $(this).find('#wn-contact-dropdown-icon').on('click', function (event) {
                $(this).siblings('#wn-contact-form-wrap').fadeToggle('fast', function () {
                    if ($("#wn-contact-form-wrap").is(":visible")) {
                        $(document).on('click', function (e) {
                            var target = $(e.target);
                            if (target.parents('.whb-contact').length)
                                return;
                            $("#wn-contact-form-wrap").css({
                                display: 'none',
                            });
                        });
                    }
                });
            });
        });

        // Icon Menu Dropdown
        $('.whb-icon-menu-wrap').each(function (index, el) {
            $(this).find('#wn-icon-menu-trigger').on('click', function (event) {
                $(this).siblings('.whb-icon-menu-content').fadeToggle('fast', function () {
                    if ($(".whb-icon-menu-content").is(":visible")) {
                        $(document).on('click', function (e) {
                            var target = $(e.target);
                            if (target.parents('.whb-icon-menu-wrap').length)
                                return;
                            $(".whb-icon-menu-content").css({
                                display: 'none',
                            });
                        });
                    }
                });
            });
        });

        // Wishlist Dropdown
        $('.whb-wishlist').each(function (index, el) {
            $(this).find('#wn-wishlist-icon').on('click', function (event) {
                $(this).siblings('.wn-header-wishlist-wrap').fadeToggle('fast', function () {
                    if ($(".wn-header-wishlist-wrap").is(":visible")) {
                        $(document).on('click', function (e) {
                            var target = $(e.target);
                            if (target.parents('.whb-wishlist').length)
                                return;
                            $(".wn-header-wishlist-wrap").css({
                                display: 'none',
                            });
                        });
                    }
                });
            });
        });

        $('.wn-header-wishlist-content-wrap').find('.wn-wishlist-total').addClass('colorf');



        /* Weather */
        $(document).ajaxComplete(function (event, request, settings) {
            if ($('#wpc-weather').length > 0) {
                var weather_today = $('#wpc-weather').find('.today').find('.day').html();
                if ($('#wpc-weather').children('.today').length) {
                    weather_today = weather_today.replace('Today', 'Today:');
                }
                $('#wpc-weather').find('.today').find('.day').html(weather_today);
                $('#wpc-weather').find('.time_symbol').find('svg').attr('enable-background', 'new 27 27 46 46');
                $('#wpc-weather').find('.time_symbol').find('svg').removeAttr('viewBox');
                $('#wpc-weather').find('.time_symbol').find('svg').each(function () {
                    $(this)[0].setAttribute('viewBox', '27 27 46 46')
                });
            }

        });

        /* Profile Socials */
        $('.whb-profile-socials-text').hover(function () {
            $(this).closest('.whb-profile-socials-wrap').find('.whb-profile-socials-icons').removeClass('profile-socials-hide').addClass('profile-socials-show');
        }, function () {
            $(this).closest('.whb-profile-socials-wrap').find('.whb-profile-socials-icons').removeClass('profile-socials-show').addClass('profile-socials-hide');
        });


        /* Vertical Header */
        // #wrap Class vertical
        if ($('.whb-desktop-view').find('.whb-row1-area').hasClass('whb-vertical-toggle')) {
            $('#wrap').addClass('whb-header-vertical-toggle');
        } else if ($('.whb-desktop-view').find('.whb-row1-area').hasClass('whb-vertical')) {
            $('#wrap').addClass('whb-header-vertical-no-toggle');
        }

        // Toggle Vertical
        var $vertical_wrap = $('.whb-vertical.whb-vertical-toggle');
        var $vertical_contact_wrap = $('.whb-vertical-contact-form-wrap');

        $('.vertical-menu-icon-foursome').on('click', function (event) {
            event.preventDefault();

            if ($vertical_wrap.hasClass('is-open')) {
                $vertical_wrap.removeClass('is-open');
                $vertical_wrap.removeClass('whb-open-with-delay');
                $(this).siblings('.whb-vertical-logo-wrap,.vertical-contact-icon,.vertical-fullscreen-icon').removeClass('is-open');
                $(this).removeClass('is-open');
            } else {
                if ($vertical_contact_wrap.hasClass('is-open')) {
                    $vertical_contact_wrap.removeClass('is-open');
                    $vertical_wrap.addClass('whb-open-with-delay');
                    $('.vertical-contact-icon i').removeClass('is-open colorf');
                }
                $vertical_wrap.addClass('is-open');
                $(this).siblings('.whb-vertical-logo-wrap,.vertical-contact-icon,.vertical-fullscreen-icon').addClass('is-open');
                $(this).addClass('is-open');
            }

        });

        $('.vertical-menu-icon-triad').on('click', function (event) {
            event.preventDefault();

            if ($vertical_wrap.hasClass('is-open')) {
                $vertical_wrap.removeClass('is-open');
                $vertical_wrap.removeClass('whb-open-with-delay');
                $(this).removeClass('is-open');
            } else {
                if ($vertical_contact_wrap.hasClass('is-open')) {
                    $vertical_contact_wrap.removeClass('is-open');
                    $vertical_wrap.addClass('whb-open-with-delay');
                    $('.vertical-contact-icon i').removeClass('is-open colorf');
                }
                $vertical_wrap.addClass('is-open');
                $(this).addClass('is-open');
            }

        });

        // Vertical Contact Icon
        $('.vertical-contact-icon i').on('click', function (event) {
            event.preventDefault();

            if ($vertical_contact_wrap.hasClass('is-open')) {
                $vertical_contact_wrap.removeClass('is-open');
                $(this).removeClass('is-open colorf');
            } else {
                if ($vertical_wrap.hasClass('is-open')) {
                    $vertical_wrap.removeClass('is-open');
                    $vertical_contact_wrap.addClass('whb-open-with-delay');
                    $('.vertical-menu-icon-triad').removeClass('is-open colorf');
                }
                $vertical_contact_wrap.addClass('is-open');
                $(this).addClass('is-open colorf');
            }

        });

        // Vertical Nicescroll
        if ($.fn.niceScroll) {
            $('.whb-vertical').find('.whb-content-wrap').niceScroll({
                scrollbarid: 'whb-vertical-menu-scroll',
                cursorwidth: "5px",
                autohidemode: true,
            });
        }

        // Fullscreen Icon
        $('.vertical-fullscreen-icon i').toggle(function () {
            var site_document = document.documentElement,
                site_screen = site_document.requestFullScreen || site_document.webkitRequestFullScreen || site_document.mozRequestFullScreen || site_document.msRequestFullscreen;
            if (typeof site_screen != "undefined" && site_screen) {
                site_screen.call(site_document);
            } else if (typeof window.ActiveXObject != "undefined") {
                // for Internet Explorer
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript != null) {
                    wscript.SendKeys("{F11}");
                }
            }
        }, function () {
            $.fullscreen.exit();
            return false;
        });

        // Vertical Menu
        $('.whb-vertical').find('.nav').find('li').each(function () {
            var $list_item = $(this);

            if ($list_item.children('ul').length) {
                $list_item.children('a').removeClass('sf-with-ul').append('<i class="sl-arrow-down whb-vertical-nav-icon"></i>');
            }
            /* trigger on a custom link */
            if ($list_item.hasClass('menu-item-has-children') || $list_item.hasClass('mega')) {
                var href = $list_item.find('a').attr('href');
                if (href == '#' || $list_item == '') {
                    $list_item.children('a').on('click', function () {
                        $list_item.children('a').children('i').trigger('click');
                    });
                }
            }
            if ($list_item.hasClass('current-menu-parent')) {
                $('.current-menu-parent').children('.sub-menu').slideDown();
                $('.current-menu-parent').children('a').children('i').attr('class', 'sl-arrow-up whb-vertical-nav-icon');
            }
            $list_item.children('a').children('i').toggle(function () {
                $(this).attr('class', 'sl-arrow-up whb-vertical-nav-icon');
                $list_item.children('ul').slideDown(350);
            }, function () {
                $(this).attr('class', 'sl-arrow-down whb-vertical-nav-icon');
                $list_item.children('ul').slideUp(350);
            });
        });

        // Buddypress user messages
        $('.wn-bp-messages').find('#message-threads').children('li').each(function (index, el) {

            var wrap_element = $(this).data('count');
            console.log(wrap_element);

        });


    });

})(jQuery);