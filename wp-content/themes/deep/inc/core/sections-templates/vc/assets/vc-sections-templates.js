'use strict';

(function ($) {
    $(document).ready(function () {

        if (typeof (vc) != 'undefined') {
            vc.TemplateWindowUIPanelBackendEditor = vc.TemplatesPanelViewBackend.vcExtendUI(vc.HelperPanelViewHeaderFooter).vcExtendUI(vc.HelperTemplatesPanelViewSearch).extend({
                panelName: "template_window",
                showMessageDisabled: !1,
                initialize: function () {
                    vc.TemplateWindowUIPanelBackendEditor.__super__.initialize.call(this), this.trigger("show", this.initTemplatesTabs, this)
                },
                show: function () {

                    var $container = $('.wn-templates-sections');
                    $container.isotope({
                        filter: '*',
                        //sortBy : 'random',
                        animationOptions: {
                            duration: 750,
                            easing: 'linear',
                            queue: false,
                        }
                    });

                    $('.wn-all-section-template-categories a').click(function () {
                        var selector = $(this).attr('data-filter');
                        $container.isotope({
                            filter: selector,
                            animationOptions: {
                                duration: 750,
                                easing: 'linear',
                                queue: false,
                            }
                        });
                        return false;
                    });

                    var $optionSets = $('.wn-all-section-template-categories'),
                        $optionLinks = $optionSets.find('a');

                    $optionLinks.click(function () {
                        var $this = $(this);

                        var $optionSet = $this.parents('.wn-all-section-template-categories');
                        $optionSet.find('.wn-section-selected').removeClass('wn-section-selected');
                        $this.addClass('wn-section-selected');
                    });

                    this.clearSearch(), vc.TemplateWindowUIPanelBackendEditor.__super__.show.call(this),
                        $container.isotope({}).resize();

                    var $optionSet = $('.wn-all-section-template-categories');
                    $optionSet.find('.wn-section-selected').removeClass('wn-section-selected');
                    $optionSet.find('a[data-filter="*"]').addClass('wn-section-selected');

                    $('.vc_ui-template .wn-trigger-button').find('i').css('display', 'block');
                    $('.wn-trigger-button .loader').hide();
                    $('.wn-section-overlay').removeClass('show');
                    $('.vc_ui-template .wn-trigger-button').unbind('click').bind('click', function () {
                        $(this).find('i').css('display', 'none');
                        $(this).append('<div class="loader"></div>');
                        $(this).closest('.vc_ui-template').find('.wn-section-overlay').addClass('show');
                    });
                },
                initTemplatesTabs: function () {
                    this.$el.find('[data-vc-ui-element="panel-tabs-controls"]').vcTabsLine("moveTabs")
                },
                showMessage: function (text, type) {
                    var wrapperCssClasses;
                    if (this.showMessageDisabled) return !1;
                    wrapperCssClasses = "vc_col-xs-12 wpb_element_wrapper", this.message_box_timeout && this.$el.find("[data-vc-panel-message]").remove() && window.clearTimeout(this.message_box_timeout), this.message_box_timeout = !1;
                    var $messageBox, messageBoxTemplate = vc.template('<div class="vc_message_box vc_message_box-standard vc_message_box-rounded vc_color-<%- color %>"><div class="vc_message_box-icon"><i class="fa fa fa-<%- icon %>"></i></div><p><%- text %></p></div>');
                    switch (type) {
                        case "error":
                            $messageBox = $('<div class="' + wrapperCssClasses + '" data-vc-panel-message>').html(messageBoxTemplate({
                                color: "danger",
                                icon: "times",
                                text: text
                            }));
                            break;
                        case "warning":
                            $messageBox = $('<div class="' + wrapperCssClasses + '" data-vc-panel-message>').html(messageBoxTemplate({
                                color: "warning",
                                icon: "exclamation-triangle",
                                text: text
                            }));
                            break;
                        case "success":
                            $messageBox = $('<div class="' + wrapperCssClasses + '" data-vc-panel-message>').html(messageBoxTemplate({
                                color: "success",
                                icon: "check",
                                text: text
                            }))
                    }
                    $messageBox.prependTo(this.$el.find('[data-vc-ui-element="panel-edit-element-tab"].vc_row.vc_active')), $messageBox.fadeIn(), this.message_box_timeout = window.setTimeout(function () {
                        $messageBox.remove()
                    }, 6e3)
                },
                changeTab: function (e) {
                    e.preventDefault(), e && !e.isClearSearch && this.clearSearch();
                    var $tab = $(e.currentTarget);
                    $tab.parent().hasClass("vc_active") || (this.$el.find('[data-vc-ui-element="panel-tabs-controls"] .vc_active:not([data-vc-ui-element="panel-tabs-line-dropdown"])').removeClass("vc_active"), $tab.parent().addClass("vc_active"), this.$el.find('[data-vc-ui-element="panel-edit-element-tab"].vc_active').removeClass("vc_active"), this.$el.find($tab.data("vcUiElementTarget")).addClass("vc_active"), this.$tabsMenu && this.$tabsMenu.vcTabsLine("checkDropdownContainerActive"))
                },
                setPreviewFrameHeight: function (templateID, height) {
                    parseInt(height) < 100 && (height = 100), $('data-vc-template-preview-frame="' + templateID + '"').height(height)
                }
            }), vc.TemplateWindowUIPanelBackendEditor.prototype.events = $.extend(!0, vc.TemplateWindowUIPanelBackendEditor.prototype.events, {
                'click [data-vc-ui-element="button-save"]': "save",
                'click [data-vc-ui-element="button-close"]': "hide",
                'click [data-vc-ui-element="button-minimize"]': "toggleOpacity",
                "keyup [data-vc-templates-name-filter]": "searchTemplate",
                "search [data-vc-templates-name-filter]": "searchTemplate",
                "click .vc_template-save-btn": "saveTemplate",
                "click [data-template_id] [data-template-handler]": "loadTemplate",
                'click [data-vc-container=".vc_ui-list-bar"][data-vc-preview-handler]': "buildTemplatePreview",
                'click [data-vc-ui-delete="template-title"]': "removeTemplate",
                'click [data-vc-ui-element="panel-tab-control"]': "changeTab"
            }), vc.TemplateWindowUIPanelFrontendEditor = vc.TemplatesPanelViewFrontend.vcExtendUI(vc.HelperPanelViewHeaderFooter).vcExtendUI(vc.HelperTemplatesPanelViewSearch).extend({
                panelName: "template_window",
                showMessageDisabled: !1,
                show: function () {
                    this.clearSearch(), vc.TemplateWindowUIPanelFrontendEditor.__super__.show.call(this)
                },
                showMessage: function (text, type) {
                    if (this.showMessageDisabled) return !1;
                    this.message_box_timeout && this.$el.find("[data-vc-panel-message]").remove() && window.clearTimeout(this.message_box_timeout), this.message_box_timeout = !1;
                    var $messageBox, wrapperCssClasses, messageBoxTemplate = vc.template('<div class="vc_message_box vc_message_box-standard vc_message_box-rounded vc_color-<%- color %>"><div class="vc_message_box-icon"><i class="fa fa fa-<%- icon %>"></i></div><p><%- text %></p></div>');
                    switch (wrapperCssClasses = "vc_col-xs-12 wpb_element_wrapper", type) {
                        case "error":
                            $messageBox = $('<div class="' + wrapperCssClasses + '" data-vc-panel-message>').html(messageBoxTemplate({
                                color: "danger",
                                icon: "times",
                                text: text
                            }));
                            break;
                        case "warning":
                            $messageBox = $('<div class="' + wrapperCssClasses + '" data-vc-panel-message>').html(messageBoxTemplate({
                                color: "warning",
                                icon: "exclamation-triangle",
                                text: text
                            }));
                            break;
                        case "success":
                            $messageBox = $('<div class="' + wrapperCssClasses + '" data-vc-panel-message>').html(messageBoxTemplate({
                                color: "success",
                                icon: "check",
                                text: text
                            }))
                    }
                    $messageBox.prependTo(this.$el.find('[data-vc-ui-element="panel-edit-element-tab"].vc_row.vc_active')), $messageBox.fadeIn(), this.message_box_timeout = window.setTimeout(function () {
                        $messageBox.remove()
                    }, 6e3)
                },
                changeTab: function (e) {
                    e.preventDefault(), e && !e.isClearSearch && this.clearSearch();
                    var $tab = $(e.currentTarget);
                    $tab.parent().hasClass("vc_active") || (this.$el.find('[data-vc-ui-element="panel-tabs-controls"] .vc_active:not([data-vc-ui-element="panel-tabs-line-dropdown"])').removeClass("vc_active"), $tab.parent().addClass("vc_active"), this.$el.find('[data-vc-ui-element="panel-edit-element-tab"].vc_active').removeClass("vc_active"), this.$el.find($tab.data("vcUiElementTarget")).addClass("vc_active"), this.$tabsMenu && this.$tabsMenu.vcTabsLine("checkDropdownContainerActive"))
                }
            }), $.fn.vcAccordion.Constructor.prototype.collapseTemplate = function (showCallback) {
                var $allTriggers, $activeTriggers, $this, $triggers;
                $this = this.$element;
                var i;
                if (i = 0, $allTriggers = this.getContainer().find("[data-vc-preview-handler]").each(function () {
                        var accordion, $this;
                        $this = $(this), accordion = $this.data("vc.accordion"), void 0 === accordion && ($this.vcAccordion(), accordion = $this.data("vc.accordion")), accordion && accordion.setIndex && accordion.setIndex(i++)
                    }), $activeTriggers = $allTriggers.filter(function () {
                        var $this, accordion;
                        return $this = $(this), accordion = $this.data("vc.accordion"), accordion.getTarget().hasClass(accordion.activeClass)
                    }), $triggers = $activeTriggers.filter(function () {
                        return $this[0] !== this
                    }), $triggers.length && $.fn.vcAccordion.call($triggers, "hide"), this.isActive()) $.fn.vcAccordion.call($this, "hide");
                else {
                    $.fn.vcAccordion.call($this, "show");
                    var $triggerPanel = $this.closest(".vc_ui-list-bar-item"),
                        $wrapper = $this.closest("[data-template_id]"),
                        $panel = $wrapper.closest("[data-vc-ui-element=panel-content]").parent();
                    setTimeout(function () {
                        if (Math.round($wrapper.offset().top - $panel.offset().top) < 0) {
                            var posit = Math.round($wrapper.offset().top - $panel.offset().top + $panel.scrollTop() - $triggerPanel.height());
                            $panel.animate({
                                scrollTop: posit
                            }, 400)
                        }
                        "function" == typeof showCallback && showCallback($wrapper, $panel)
                    }, 400)
                }
            }
        }

    });
})(jQuery);