(function ($) {
    
    "use strict";
    
    
    jQuery(document).ready(function () {
        
        // twitter carousel
        $('.related-rooms').owlCarousel({
            items: 3,
            autoPlay: true,
            dots: false,
            nav: true,
            loop: true,
            slideSpeed: 600,
            margin: 15,
            stagePadding: 11,
            navText: ["<i class='ti-arrow-left'></i>", "<i class='ti-arrow-right'></i>", "", ""],
            responsive: {
                0: {
                    items: 1,
                },
                480: {
                    items: 2,
                },
                992: {
                    items: 3,
                },
                1200: {
                    items: 3,
                }
            }
        });
        
        $('.list-room-extra').find('li').on('click', function (event) {
            var $this   = $(this),
            $checkbox   = $this.find('.hb_optional_quantity_selected');
            
            if ($(event.target).attr('class') == 'hb_optional_quantity') {
                return;
            }

            if ( $checkbox.length > 0 ) {
                $this.toggleClass('selected');
                $checkbox.prop("checked", !$checkbox.prop("checked"));
            }

        });

        // Booking Form For Header
        $(function () {

            $(".whb-wrap-booking-header .booking-header-icon-res").on("click", function () {
                $(".whb-wrap-booking-header .htc-booking.horizontal").fadeToggle("fast", "linear");
            });

            if ($(window).width() >= 961) {
                $(".whb-wrap-booking-header .htc-booking.horizontal").removeClass("htc-booking-res");
            }

            if ($(window).width() <= 960) {
                $(".whb-wrap-booking-header .htc-booking.horizontal").addClass("htc-booking-res");
            }

            $(window).resize(function () {
                if ($(window).width() >= 961) {
                    $(".whb-wrap-booking-header .htc-booking.horizontal").removeClass("htc-booking-res");
                }

                if ($(window).width() <= 960) {
                    $(".whb-wrap-booking-header .htc-booking.horizontal").addClass("htc-booking-res");
                }
            });
        });

    });
    
})(jQuery);