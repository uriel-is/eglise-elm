"use strict";

(function ($) {
    jQuery(document).ready(function () {
        $(".instructors-owl-carousel").each(function () {
            var $this = $(this),
                instructors_count = $this.data("instructors-count");

            $this.owlCarousel({
                items: instructors_count,
                dots: false,
                nav: true,
                navText: ["", ""],
            });
        });
        $(".course-carousel").owlCarousel({
            items: $(this).data("items"),
            autoPlay: true,
            dots: false,
            nav: true,
            navText: ["", ""],
        });

        $(".author-carousel").owlCarousel({
            items: 3,
            autoPlay: true,
            loop: true,
            dots: false,
            nav: true,
            navText: ["", ""],
        });

        jQuery("#more-courses.w-crsl").owlCarousel({
            items: 1,
            autoPlay: true,
            loop: true,
            dots: false,
            navText: ["", ""],
            autoHeight: true,
        });
        // Nice Select Plugin for Advanced Search
        $(".course-search-form, .taxonomy-search-form, .w-nice-select")
            .find("select")
            .niceSelect();

        // Courses list and grid
        jQuery(document).ready(function () {
            jQuery("#list").click(function (event) {
                event.preventDefault();
                jQuery(".w-courses").removeClass("course-grid-t modern-grid");
                jQuery(".w-courses").addClass("course-list-t");
                jQuery("#grid").removeClass("active");
                jQuery("#list").addClass("active");
            });
            jQuery("#grid").click(function (event) {
                event.preventDefault();
                jQuery(".w-courses").removeClass("course-list-t");
                jQuery(".w-courses").addClass("course-grid-t modern-grid");
                jQuery("#list").removeClass("active");
                jQuery("#grid").addClass("active");
            });
        });

        // Course Categories
        (function () {
            $(".course-categories")
                .find(".course-category")
                .each(function () {
                    var $this = $(this);
                    if (
                        window.location.href.indexOf(
                            $this.children("a").attr("href")
                        ) > -1
                    ) {
                        $this.on("current_cat_course", function () {
                            $this.addClass("active");
                        });
                        $this.trigger("current_cat_course");
                    }
                });
        })();

        // course syllabus
        (function () {
            $(".llms-lesson")
                .find(".lesson-title")
                .each(function () {
                    var $this = $(this);
                    if (
                        $this.children("a").attr("href") == window.location.href
                    ) {
                        $this.on("current_syllabus_course", function () {
                            $this.addClass("active");
                        });
                        $this.trigger("current_syllabus_course");
                    }
                });
        })();

        // Course Sortings
        (function () {
            $(document).on(
                "change",
                ".course-sorting-form select, .course-sorting-form input[type=radio]",
                function (e) {
                    var $course_wrapper = $(".w-courses"),
                        $course_page_nav = $(".wp-pagenavi"),
                        $course_loader = $(".course-loader");

                    $course_wrapper.css("display", "none");
                    $course_page_nav.css("display", "none");
                    $course_loader.css("display", "block");

                    var prefix_url =
                            window.location.href.indexOf("?") > -1 ? "&" : "?",
                        query_url = "",
                        $this = $(this);

                    if ($this.attr("name") == "courses_price_filter") {
                        if (
                            typeof old_order_val !== "undefined" &&
                            old_order_val != ""
                        ) {
                            if ($this.val() != "") {
                                query_url =
                                    prefix_url +
                                    old_order_val +
                                    "&" +
                                    $this.val();
                            } else {
                                query_url = prefix_url + old_order_val;
                            }
                        } else {
                            query_url = $this.val()
                                ? prefix_url + $this.val()
                                : "";
                        }

                        $.ajax({
                            url: window.location.href + query_url,
                            dataType: "html",
                            cache: false,
                            headers: { "cache-control": "no-cache" },
                            method: "POST",
                            error: function (
                                XMLHttpRequest,
                                textStatus,
                                errorThrown
                            ) {},
                            success: function (data) {
                                if (
                                    typeof $(data).find(".w-courses").html() !==
                                    "undefined"
                                ) {
                                    $course_wrapper.html(
                                        $(data).find(".w-courses").html()
                                    );
                                } else {
                                    var src = $course_wrapper.data(
                                        "empty-filter-result"
                                    );
                                    $course_wrapper.html(
                                        '<img src="' +
                                            src +
                                            '" class="empty-filter-result">'
                                    );
                                }

                                if (
                                    typeof $(data)
                                        .find(".wp-pagenavi")
                                        .html() !== "undefined"
                                ) {
                                    $course_page_nav.html(
                                        $(data).find(".wp-pagenavi").html()
                                    );
                                } else {
                                    $course_page_nav.html(" ");
                                }

                                $course_wrapper
                                    .css("display", "block")
                                    .addClass("w-start_animation");
                                $course_page_nav
                                    .css("display", "block")
                                    .addClass("w-start_animation");
                                $course_loader.css("display", "none");
                            },
                        });

                        window.old_price_val = $this.val();
                    } else {
                        if (
                            typeof old_price_val !== "undefined" &&
                            old_price_val != ""
                        ) {
                            if ($this.val() != "") {
                                query_url =
                                    prefix_url +
                                    old_price_val +
                                    "&" +
                                    $this.val();
                            } else {
                                query_url = prefix_url + old_price_val;
                            }
                        } else {
                            query_url = $this.val()
                                ? prefix_url + $this.val()
                                : "";
                        }
                        $.ajax({
                            url: window.location.href + query_url,
                            dataType: "html",
                            cache: false,
                            headers: { "cache-control": "no-cache" },
                            method: "POST",
                            error: function (
                                XMLHttpRequest,
                                textStatus,
                                errorThrown
                            ) {},
                            success: function (data) {
                                if (
                                    typeof $(data).find(".w-courses").html() !==
                                    "undefined"
                                ) {
                                    $course_wrapper.html(
                                        $(data).find(".w-courses").html()
                                    );
                                } else {
                                    var src = $course_wrapper.data(
                                        "empty-filter-result"
                                    );
                                    $course_wrapper.html(
                                        '<img src="' +
                                            src +
                                            '" class="empty-filter-result">'
                                    );
                                }

                                if (
                                    typeof $(data)
                                        .find(".wp-pagenavi")
                                        .html() !== "undefined"
                                ) {
                                    $course_page_nav.html(
                                        $(data).find(".wp-pagenavi").html()
                                    );
                                } else {
                                    $course_page_nav.html(" ");
                                }

                                $course_wrapper
                                    .css("display", "block")
                                    .addClass("w-start_animation");
                                $course_page_nav
                                    .css("display", "block")
                                    .addClass("w-start_animation");
                                $course_loader.css("display", "none");
                            },
                        });
                        window.old_order_val = $this.val();
                    }

                    e.preventDefault();
                }
            );
        })();

        // Recent Courses
        (function () {
            $(".deep-recent-courses").owlCarousel({
                items: 1,
                margin: 0,
                loop: true,
                nav: false,
                dots: false,
                nav: false,
            });
        })();
    });
})(jQuery);
