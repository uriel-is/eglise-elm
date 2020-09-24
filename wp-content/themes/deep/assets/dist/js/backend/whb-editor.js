"use strict";function _createForOfIteratorHelper(e,t){var n;if("undefined"==typeof Symbol||null==e[Symbol.iterator]){if(Array.isArray(e)||(n=_unsupportedIterableToArray(e))||t&&e&&"number"==typeof e.length){n&&(e=n);var a=0,i=function(){};return{s:i,n:function(){return a>=e.length?{done:!0}:{done:!1,value:e[a++]}},e:function(e){throw e},f:i}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var l,s=!0,o=!1;return{s:function(){n=e[Symbol.iterator]()},n:function(){var e=n.next();return s=e.done,e},e:function(e){o=!0,l=e},f:function(){try{s||null==n.return||n.return()}finally{if(o)throw l}}}}function _unsupportedIterableToArray(e,t){if(e){if("string"==typeof e)return _arrayLikeToArray(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);return"Object"===n&&e.constructor&&(n=e.constructor.name),"Map"===n||"Set"===n?Array.from(e):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?_arrayLikeToArray(e,t):void 0}}function _arrayLikeToArray(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,a=new Array(t);n<t;n++)a[n]=e[n];return a}window.onload=function(){document.body.style.display="block"},function(T){T(document).ready(function(){T(window).on("load",function(){var h,b,w,f,u,p,e,a=T("body"),m=T("#wn-header-builder"),t=m.find(".whb-elements-place"),s=m.find(".whb-desktop-panel").find('.whb-columns[data-columns="row1"]').find(".whb-elements-place"),v=whb_localize.components&&!Array.isArray(whb_localize.components)?whb_localize.components:{},g=whb_localize.editor_components?whb_localize.editor_components:{},y=whb_localize.frontend_components?whb_localize.frontend_components:{},_={"desktop-view":{},"tablets-view":{},"mobiles-view":{}},l=!1;function C(){console.log("%c Components:","font-size: 18px; background: #EC9787; color: #fff;",v),console.log("%c Editor Components:","font-size: 18px; background: #6F9FD8; color: #fff;",g),console.log("%c Frontend Components:","font-size: 18px; background: #ECDB54; color: #fff;",y)}function n(e){try{JSON.parse(e)}catch(e){return}return 1}function o(){return!!a.hasClass("whb-frontend-builder-wrap")}for(var i in C(),v){v.hasOwnProperty(i)&&function(){var t=v[i];-1!=i.search("logo")&&(e=i.slice("5"),m.find('.whb-elements-item[data-element="logo"][data-unique-id="'+e+'"]').each(function(){var e=T(this);wp.media.attachment(t.logo).fetch().done(function(){e.children("a").hide().after('<img class="whb-img-placeholder-el" src="'+this.attributes.url+'" alt="">')})}))}()}var d,r,c,k=T(document).height();function x(s,o,e){var d=2<arguments.length&&void 0!==e&&e,r=s.attr("data-element"),c=s.attr("data-unique-id"),h=r+"_"+c;v.hasOwnProperty(h)||(v[h]={}),0<!m.children(".whb-spinner-wrap").length&&m.prepend('<div class="whb-spinner-wrap"><div class="whb-spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div></div>'),T.ajax({type:"POST",url:whb_localize.ajaxurl,data:{action:"whb_get_component_fields",el_name:r,nonce:whb_localize.nonce},success:function(e){0<m.children(".whb-spinner-wrap").length&&m.children(".whb-spinner-wrap").remove(),T(".wn-header-builder-wrap").append(e),(b=m.find('.whb-modal-wrap[data-element-target="'+r+'"]')).find(".whb-tabs-list").find("li").removeClass("w-active"),b.find(".whb-tab-panel").hide(),b.find(".whb-tabs-list").find("li:first").addClass("w-active"),b.find(".whb-modal-contents").children(".whb-tab-panel:first").show();var t,n,a=b.find(".whb-modal-contents").children(".whb-tab-panel");if("desktop-view"==o?a.find('.whb-tab-panel[data-id="#all"]').show():"tablets-view"==o?a.find('.whb-tab-panel[data-id="#tablets"]').show():"mobiles-view"==o?a.find('.whb-tab-panel[data-id="#mobiles"]').show():"sticky-view"==o&&a.find('.whb-tab-panel[data-id="#all"]').show(),a.find(".whb-tab-panel").find(".whb-tab-panel:first").show(),b.show(),b.find(".whb-field").each(function(){var e=T(this).find(".whb-field-input"),t=e.data("field-name"),n=void 0!==(n=e.data("field-std"))?n:"";void 0!==v[h][t]?e.attr("value",v[h][t]):(e.val(n).attr("value",n),n&&(v[h][t]=n))}),d){var i=s.find("a").find("i").attr("class");if("sticky-view"==o)g[o][f][w].push({name:r,uniqueId:c,hidden_element:!1,editor_icon:i});else for(var l in _)g[l][f][w].push({name:r,uniqueId:c,hidden_element:!1,editor_icon:i})}(t=T(".whb-modal-wrap")).find(".whb-switcher").find(".whb-field-input").on("change",function(){var e=T(this);e.is(":checked")?(e.attr("value","true"),e.attr("checked","checked")):(e.attr("value","false"),e.removeAttr("checked"))}),t.find(".whb-attach-image").each(function(){var n,a=T(this),e=a.find(".whb-add-image"),i=a.find(".whb-remove-image"),l=a.find(".whb-preview-image");e.on("click",function(e){e.preventDefault();var t=a.find("input.whb-attach-image");t.val();n||(n=wp.media({multiple:!1})).on("select",function(){var e=n.state().get("selection").first().toJSON();l.html("").append('<img src="'+e.url+'" alt="">').css("display","block"),t.attr("value",e.id),i.show()}),n.open()}),i.on("click",function(e){e.preventDefault();var t=a.find("input.whb-attach-image");l.html("").hide(),i.hide(),t.attr("value","")})}),t.find(".whb-number-unit").each(function(){var a=T(this),i=a.find('input[type="number"]'),l=a.find(".whb-opts").children("span"),s=a.find(".whb-field-input");l.on("click",function(e){e.preventDefault();var t=T(this),n=t.data("value"),a=i.val();l.removeClass("whb-active"),t.addClass("whb-active"),a&&s.attr("value",a+n)}),i.on("change",function(e){e.preventDefault();T(this);var t=a.find(".whb-opts").children("span.whb-active").data("value"),n=i.val();n?s.attr("value",n+t):s.attr("value","")})}),t.find(".whb-custom-select").find(".whb-opts").find("span").on("click",function(){var e=T(this),t=e.closest(".whb-custom-select"),n=t.find(".whb-opts").children("span"),a=t.find(".whb-field-input"),i=e.data("value");n.removeClass("whb-active"),e.addClass("whb-active"),a.attr("value",i)}),t.find(".whb-field-icons-wrap").each(function(){var e=T(this),a=e.find(".wn-icon").find("label"),i=e.find(".whb-field-input");a.on("click",function(e){e.preventDefault();var t=T(this),n=t.attr("for");a.removeClass("whb-active"),t.addClass("whb-active"),i.attr("value",n)})}),t.find(".whb-color-picker").wpColorPicker(),t.find(".whb-field").find(".whb-field-input").each(function(){var e,t,n,a,i,l,s,o,d,r,c,h=T(this);h.hasClass("whb-switcher-field")&&("true"==h.val()?h.attr("checked","checked"):h.removeAttr("checked")),h.hasClass("whb-field-custom-select")&&h.siblings(".whb-opts").find("span").each(function(){var e=T(this);e.removeClass("whb-active"),e.data("value")==h.val()&&e.addClass("whb-active")}),h.hasClass("whb-field-number-unit")&&((l=h.val())?(t=(e=h.closest(".whb-number-unit")).find('input[type="number"]'),n=e.find(".whb-opts").children("span"),a=parseFloat(l),i=l.split(a)[1],t.val(a),n.each(function(){var e=T(this),t=e.data("value");e.removeClass("whb-active"),t==i&&e.addClass("whb-active")})):h.closest(".whb-number-unit").find('input[type="number"]').val("")),h.hasClass("whb-icon-field")&&(l=h.val(),o=(s=h.closest(".whb-field-icons-wrap")).find(".wn-icon").find("label"),l?(o.removeClass("whb-active"),s.find(".wn-icon").find('label[for="'+l+'"]').addClass("whb-active")):o.removeClass("whb-active")),h.hasClass("whb-attach-image")&&(d=h.val(),r=h.siblings(".whb-remove-image"),c=h.siblings(".whb-preview-image"),d&&!wp.media.attachment(d).destroyed?(0<!b.find(".whb-modal-contents").find(".whb-spinner-wrap").length&&b.find(".whb-modal-contents").prepend('<div class="whb-spinner-wrap"><div class="whb-spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div></div>'),wp.media.attachment(d).fetch().always(function(){0<b.find(".whb-modal-contents").find(".whb-spinner-wrap").length&&b.find(".whb-modal-contents").find(".whb-spinner-wrap").remove(),c.html(""),null!=this.attributes.url&&(c.append('<img src="'+this.attributes.url+'" alt="">').css("display","block"),r.show())})):(c.html("").hide(),r.hide()))}),b.find(".whb-dependency").on("change",function(){!function l(e){var t=e.data("dependency");var s=e.find(".whb-field-input").val();T.each(t,function(e,t){for(var n=0;n<t.length;n++){var a=b.find('.whb-field-input[data-field-name="'+t[n]+'"]').closest(".whb-field").hide(),i="whb-field w-col-sm-12 whb-dependency"==a.attr("class");e==s?(a.show(),i&&l($el)):i&&T.each(a.data("dependency"),function(e,t){for(var n=0;n<t.length;n++)b.find('.whb-field-input[data-field-name="'+t[n]+'"]').closest(".whb-field").hide()})}})}(T(this))}),b.find(".whb-dependency").trigger("change"),d&&(n=s[0].outerHTML,T('.whb-elements-item[data-element="'+r+'"][data-unique-id="'+c+'"]').each(function(){T(this).replaceWith(n)})),S(b[0])}}),C()}function S(t){var n=0,a=0,i=0,l=0;function e(e){e=e||window.event,i=e.clientX,l=e.clientY,document.onmouseup=o,document.onmousemove=s}function s(e){e=e||window.event,n=i-e.clientX,a=l-e.clientY,i=e.clientX,l=e.clientY,t.style.top=t.offsetTop-a+"px",t.style.left=t.offsetLeft-n+"px"}function o(){document.onmouseup=null,document.onmousemove=null}t.getElementsByClassName("whb-modal-header")?t.getElementsByClassName("whb-modal-header")[0].onmousedown=e:t.onmousedown=e}function O(e){var t=window.frames.whbIframe.document.getElementsByTagName("head")[0],n=document.createElement("script");n.src=e,t.appendChild(n)}function D(){var i=T("#whbIframe").contents().find("#webnus-header-builder");0==i.children(".whb-spinner-wrap").length&&i.prepend('<div class="whb-spinner-wrap"><div class="whb-spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div></div>'),o()&&T(".whb_save").css({"background-color":"#4cbf67","box-shadow":"0 3px 10px -3px #4cbf67","border-color":"#4cbf67"}),T.ajax({type:"POST",url:whb_localize.ajaxurl,data:{action:"whb_save_data",nonce:whb_localize.nonce,frontendComponents:JSON.stringify(y)},success:function(e){var t,n,a;o()&&(T(".whb_save").css({"background-color":"#008aff","box-shadow":"0 3px 10px -3px #008aff","border-color":"#008aff"}),0==(t=T(e)).children(".whb-spinner-wrap").length&&t.prepend('<div class="whb-spinner-wrap"><div class="whb-spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div></div>'),i[0].outerHTML=t[0].outerHTML),l?T('.redux-action_bar input[name="redux_save"], #whb-publish').trigger("click"):o()&&T.ajax({type:"POST",url:whb_localize.ajaxurl,data:{action:"whb_live_dynamic_styles",nonce:whb_localize.nonce},success:function(e){var t;t=e,window.frames.whbIframe.document.getElementById("whb-enqueue-dynamic-style").children[0].innerHTML=t,T("#whbIframe").contents().find("#webnus-header-builder").children(".whb-spinner-wrap").remove()}}),o()&&(O((n=whb_localize.assets_url+"src/frontend/")+(a=["whb-jquery-plugins.js","whb-frontend.js"])[0]),O(n+a[1]))}})}function I(){for(var e in y=T.extend(!0,{},g))for(var t in y[e])for(var n in y[e][t]){var a=y[e][t][n];if("settings"==n){var i,l=a.element+"_"+a.uniqueId;for(var s in l in v&&Object.assign(a,v[l]),a){a.hasOwnProperty(s)&&(i=a[s],"hidden_element"!=s&&"boolean"==typeof i&&(a[s]=String(i)))}}else if(0!=a.length){var o,d=_createForOfIteratorHelper(a);try{for(d.s();!(o=d.n()).done;){var r,c=o.value,l=c.name+"_"+c.uniqueId;for(var h in l in v&&Object.assign(c,v[l]),c){c.hasOwnProperty(h)&&(r=c[h],"hidden_element"!=h&&"boolean"==typeof r&&(c[h]=String(r)))}}}catch(e){d.e(e)}finally{d.f()}}}}function q(e){z(e.target.result)}function z(e){var t;e&&(n(e)||(t=e)===Object(t))?(a.css({height:"1px",overflow:"hidden"}).prepend('<div class="whb-spinner-wrap"><div class="whb-spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div></div>'),T("#wpwrap").css("display","none"),e=n(e)?JSON.parse(e):e,v=e.whb_data_components,g=e.whb_data_editor_components,y=e.whb_data_frontend_components,l=!0,D()):alert("Header import input is empty! That's why no data can import.")}T("#whbIframe").css("height",k),T("#whbIframe").contents().find("a").on("click",function(){return!1}),m.find(".whb-tab-panel"+m.find(".whb-tabs-list").find("li.w-active").find("a").attr("href")).show(),m.on("click",".whb-tabs-list a",function(e){e.preventDefault();var t=T(this),n=t.parent(),a=t.closest("ul").find("li"),i=t.closest("ul");n.hasClass("w-active")||(a.removeClass("w-active"),n.addClass("w-active"),i.hasClass("whb-element-groups")?m.find(".whb-group-panel").hide().end().find('.whb-group-panel[data-id="'+t.attr("href")+'"]').show():i.hasClass("whb-styling-groups")?i.siblings(".whb-styling-group-panel").hide().end().siblings('.whb-styling-group-panel[data-id="'+t.attr("href")+'"]').show():i.hasClass("whb-styling-screens")?m.find(".whb-styling-screen-panel").hide().end().find('.whb-styling-screen-panel[data-id="'+t.attr("href")+'"]').show():m.find(".whb-tab-panel:not(.whb-group-panel)").hide().end().find(".whb-tab-panel"+t.attr("href")).fadeIn(300))}),T("#whb-desktop-tab, #whb-sticky-tab").on("click",function(e){e.preventDefault(),a.removeClass("whb-tablets-device whb-mobiles-device"),T(".whb-screen-view").hide(),T(".whb-desktop-view, .whb-sticky-view").show()}),T("#whb-tablets-tab").on("click",function(e){e.preventDefault(),a.removeClass("whb-mobiles-device"),a.addClass("whb-tablets-device"),T(".whb-screen-view").hide(),T(".whb-tablets-view").show()}),T("#whb-mobiles-tab").on("click",function(e){e.preventDefault(),a.removeClass("whb-tablets-device"),a.addClass("whb-mobiles-device"),T(".whb-screen-view").hide(),T(".whb-mobiles-view").show()}),m.find(".whb-full-modal-btn").on("click",function(e){e.preventDefault();var t=T(this).data("modal-target"),n=m.find('.whb-full-modal[data-modal="'+t+'"]');a.css("overflow","hidden"),n.find("textarea").val(" "),n.fadeIn(200)}),m.find(".whb-full-modal-close").on("click",function(e){e.preventDefault(),a.css("overflow","initial"),m.find(".whb-full-modal").hide()}),m.find(".whb-full-modal").on("click",function(e){e.preventDefault(),a.css("overflow","initial"),m.find(".whb-full-modal").hide()}),m.on("click",".w-add-element",function(e){e.preventDefault();var t=T(this);m.find(".whb-elements").show(),u=t.closest(".whb-tab-panel").attr("id"),f=t.closest(".whb-columns").attr("data-columns"),w=t.attr("data-align-col")}),m.on("click",".whb-modal-header i, .whb_close",function(e){e.preventDefault(),m.find(".whb-modal-wrap").hide(),m.find(".whb-modal-wrap[data-element-target]").remove()}),m.find(".whb-modal-wrap").on("click",".whb-elements-item a",function(e){e.preventDefault();var t=T(this),n=(new Date).valueOf(),a=T(this).find("i").attr("class"),i='<span class="whb-controls">\n\t\t\t\t\t\t\t\t\t\t<span class="whb-tooltip tooltip-on-top" data-tooltip="Copy to Clipboard">\n\t\t\t\t\t\t\t\t\t\t\t<i class="whb-control whb-copy-btn ti-files"></i>\n\t\t\t\t\t\t\t\t\t\t</span>\n\t\t\t\t\t\t\t\t\t\t<span class="whb-tooltip tooltip-on-top" data-tooltip="Settings">\n\t\t\t\t\t\t\t\t\t\t\t<i class="whb-control whb-edit-btn sl-pencil"></i>\n\t\t\t\t\t\t\t\t\t\t</span>\n\t\t\t\t\t\t\t\t\t\t<span class="whb-tooltip tooltip-on-top" data-tooltip="Hide">\n\t\t\t\t\t\t\t\t\t\t\t<i class="whb-control whb-hide-btn ti-eye"></i>\n\t\t\t\t\t\t\t\t\t\t</span>\n\t\t\t\t\t\t\t\t\t\t<span class="whb-tooltip tooltip-on-top" data-tooltip="Remove">\n\t\t\t\t\t\t\t\t\t\t\t<i class="whb-control whb-delete-btn ti-close"></i>\n\t\t\t\t\t\t\t\t\t\t</span>\n\t\t\t\t\t\t\t\t\t</span>';if(t.closest(".whb-elements-item").hasClass("whb-clipboard-item")){var l,s=t.parent(),o=s.data("element"),d=o+"_"+s.data("unique-id").toString(),r=o+"_"+n;for(var c in v){v.hasOwnProperty(c)&&(l=T.extend(!0,{},v[c]),d==c&&(v[r]=l))}h=p.clone().removeClass("w-col-sm-4").attr({"data-unique-id":n}).prepend(i)}else h=t.parent().clone().removeClass("w-col-sm-4").attr({"data-unique-id":n,"data-hidden_element":!1,"data-editor_icon":a}).prepend(i);m.find('.whb-columns[data-columns="'+f+'"]').find(".whb-col.col-"+w).find(".whb-elements-place").append(h),m.find(".whb-modal-wrap").hide(),x(h,u,!0)}),m.on("click",".whb-copy-btn",function(e){e.preventDefault();var t=T(this).closest(".whb-elements-item").clone();p=t.clone(),T(".whb-clipboard-item").remove(),t.removeClass("ui-sortable-handle").addClass("w-col-sm-4 whb-clipboard-item"),t.children(".whb-controls").remove().end().children("img").remove(),t.children("a").css({display:"block","background-color":"#e3e3e3"}),t.find("i").removeClass("ti-control-record").addClass("ti-clipboard").css("color","#f60"),t.find(".whb-element-name").text("Paste (Clipboard)"),T(".whb-modal-wrap.whb-elements").find(".whb-modal-contents").prepend(t)}),m.on("click",".whb-delete-btn",function(e){if(e.preventDefault(),confirm("Press OK to delete element, Cancel to leave")){var t=T(this).closest(".whb-elements-item"),n=t.data("element"),l=t.data("unique-id").toString(),a=n+"_"+l;if(u=t.closest(".whb-tab-panel").attr("id"),f=t.closest(".whb-columns").attr("data-columns"),w=t.closest(".whb-col").attr("data-align-col"),delete v[a],"sticky-view"==u)for(var i=g[u][f][w],s=0;s<i.length;s++)i[s].uniqueId==l&&i.splice(s,1);else for(var o in _){var d=g[o];!function(){for(var e in d){var t=d[e];for(var n in t)for(var a=t[n],i=0;i<a.length;i++)if(a[i].uniqueId==l)return a.splice(i,1)}}()}I(),D(),C(),m.find('.whb-elements-item[data-element="'+n+'"][data-unique-id="'+l+'"]').remove()}}),m.on("click",".whb-edit-btn",function(e){e.preventDefault();var t=T(this);m.find(".whb-modal-wrap").hide(),m.find(".whb-modal-wrap[data-element-target]").remove(),h=t.closest(".whb-elements-item"),u=t.closest(".whb-tab-panel").attr("id"),x(h,u)}),m.find(".whb-tabs-panels").find(".whb-columns").children('.whb-elements-item[data-hidden_element="true"]').find("i.whb-hide-btn").removeClass("ti-eye").addClass("wn-far wn-fa-eye-slash").closest(".whb-columns").addClass("whb-columns-hidden").css("opacity","0.45"),m.find(".whb-elements-place").find('.whb-elements-item[data-hidden_element="true"]').find("i.whb-hide-btn").removeClass("ti-eye").addClass("wn-far wn-fa-eye-slash"),m.on("click",".whb-hide-btn",function(e){e.preventDefault();var t,n=T(this),a=n.closest(".whb-elements-item"),i=a.data("element"),l=a.data("unique-id").toString();if(u=a.closest(".whb-tab-panel").attr("id"),f=a.closest(".whb-columns").attr("data-columns"),w=a.closest(".whb-col").attr("data-align-col"),"header-area"==i||"sticky-area"==i){var s=g[u][f].settings.hidden_element;g[u][f].settings.hidden_element=!s,t=!s,a.attr("data-hidden_element",!s).data("hidden_element",!s);var o=a.closest(".whb-columns");t?(n.removeClass("ti-eye").addClass("wn-far wn-fa-eye-slash"),o.addClass("whb-columns-hidden").css("opacity","0.45")):(n.removeClass("wn-far wn-fa-eye-slash").addClass("ti-eye"),o.removeClass("whb-columns-hidden").css("opacity","1"))}else{for(var d=g[u][f][w],r=0;r<d.length;r++){var c=d[r];if(c.uniqueId==l){c.hidden_element=!c.hidden_element,t=c.hidden_element,a.attr("data-hidden_element",c.hidden_element).data("hidden_element",c.hidden_element);break}}t?(n.removeClass("ti-eye").addClass("wn-far wn-fa-eye-slash"),a.find("a").css("color","#888"),a.addClass("whb-columns-hidden").css("opacity","0.45")):(n.removeClass("wn-far wn-fa-eye-slash").addClass("ti-eye"),a.find("a").css("color","#0073aa"),a.removeClass("whb-columns-hidden").css("opacity","1"))}I(),D(),C()}),m.on("click",".whb_save",function(e){e.preventDefault();T(this);var t=h.data("element"),n=h.data("unique-id"),a=t+"_"+n;b.find(".whb-field").each(function(){var e=T(this).find(".whb-field-input"),t=e.data("field-name"),n=e.val();""==n?v[a].hasOwnProperty(t)&&(v[a][t]=n):null!=n&&("string"==typeof n&&-1!=n.indexOf('"')&&(n=n.replace(/"/g,"'")),v[a][t]=n)}),I(),D(),C();var i=h[0].outerHTML,l=m.find('.whb-elements-item[data-element="'+t+'"][data-unique-id="'+n+'"]');l.each(function(){T(this).replaceWith(i)}),l=m.find('.whb-elements-item[data-element="'+t+'"][data-unique-id="'+n+'"]'),b.find(".whb-field.whb-placeholder").each(function(){var e,t,n=T(this);n.hasClass("whb-img-placeholder")&&((e=n.find(".whb-field-input").val())?wp.media.attachment(e).fetch().done(function(){0<!l.children(".whb-img-placeholder-el").length?l.attr("data-img-placeholder",e).children("a").hide().after('<img class="whb-img-placeholder-el" src="'+this.attributes.url+'" alt="" />'):l.children(".whb-img-placeholder-el").attr("src",this.attributes.url)}):l.removeAttr("data-img-placeholder").children("a").show().end().children(".whb-img-placeholder-el").remove()),n.hasClass("whb-text-placeholder")&&((t=n.find(".whb-field-input").val()).trim()?0<!l.find("a").find(".whb-text-placeholder-el").length?l.find("a").find(".whb-element-name").hide().after('<span class="whb-text-placeholder-el">'+t+"</span>"):l.find("a").find(".whb-text-placeholder-el").html(t):l.find("a").find("span.whb-element-name").show().end().end().find(".whb-text-placeholder-el").remove())}),o()||(m.find(".whb-modal-wrap").hide(),m.find(".whb-modal-wrap[data-element-target]").remove())}),t.sortable({connectWith:".whb-elements-place",placeholder:"ui-sortable-placeholder",forcePlaceholderSize:!0,tolerance:"pointer",start:function(e,t){var n=T(t.item);u=n.closest(".whb-tab-panel").attr("id"),f=n.closest(".whb-columns").attr("data-columns"),w=n.closest(".whb-col").attr("data-align-col")},beforeStop:function(e,t){for(var n=T(t.item),a=n.closest(".whb-elements-place"),i=(n.data("element"),n.data("unique-id").toString()),l=g[u][f][w],s=0;s<l.length;s++)l[s].uniqueId==i&&l.splice(s,1);f=n.closest(".whb-columns").attr("data-columns"),w=n.closest(".whb-col").attr("data-align-col");var o=a.children(".whb-elements-item").map(function(e,t){return{name:(n=T(t)).data("element"),uniqueId:n.data("unique-id").toString(),hidden_element:JSON.parse(n.data("hidden_element")),editor_icon:n.data("editor_icon")}}).get();g[u][f][w]=o,I(),D(),C()}}).disableSelection(),S(T(".whb-modal-wrap")[0]),T('.redux-action_bar input[name="redux_save"], #whb-publish').on("click",function(e){e.preventDefault(),0==m.children(".whb-spinner-wrap").length&&m.prepend('<div class="whb-spinner-wrap"><div class="whb-spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div></div>');var t=T("#whbIframe").contents().find("#webnus-header-builder");0==t.children(".whb-spinner-wrap").length&&t.prepend('<div class="whb-spinner-wrap"><div class="whb-spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div></div>'),T.ajax({type:"POST",url:whb_localize.ajaxurl,data:{action:"whb_publish",nonce:whb_localize.nonce,components:JSON.stringify(v),editorComponents:JSON.stringify(g),frontendComponents:JSON.stringify(y)},success:function(e){console.log(e),m.children(".whb-spinner-wrap").remove(),t.children(".whb-spinner-wrap").remove(),l&&location.reload()}})}),T(".whb-action-collapse").on("click",function(){var e=T(this),t=T(".wn-header-builder-wrap.whb-frontend-builder").css("bottom","-60%"),n=T(".whb-actions").css("bottom","0");e.hasClass("whb-open")?(t.css("bottom","-60%"),n.css("bottom","0"),e.removeClass("whb-open"),e.children("i").attr("class","ti-arrow-circle-up")):(t.css("bottom","0"),n.css("bottom","60%"),e.addClass("whb-open"),e.children("i").attr("class","ti-arrow-circle-down"))}),T("#whb-import").change(function(e){var t=event.target.files[0],n=new FileReader;n.onload=q,n.readAsText(t)}),m.find(".whb-prebuild-item").on("click",function(e){var t,n;e.preventDefault(),confirm("Your selected header pre-defined will apply on current elements and settings. Are you sure you want to overwrite?")&&(t=T(this).data("file-name"),T(".whb-full-modal"),n=whb_localize.prebuilds_url+t,T.ajax({dataType:"json",type:"POST",url:n,success:function(e){z(e)}}))}),"vertical"==g["desktop-view"].row1.settings.header_type&&(r=(d=m.find(".whb-tabs-panels")).find("#desktop-view").children('.whb-columns[data-columns="row1"]').children(".whb-elements-item"),c=T("#whb-vertical-header"),r.attr("data-element","vertical-area"),c.find("span").text("Horizontal Header"),d.addClass("whb-vertical-header-panel"),s.sortable({axis:"y"})),m.on("click","#whb-vertical-header",function(e){e.preventDefault();var t=T(this),n=T(".whb-tabs-list"),a=m.find(".whb-tabs-panels"),i=a.find("#desktop-view").children('.whb-columns[data-columns="row1"]').children(".whb-elements-item"),l=g["desktop-view"].row1.settings;"horizontal"==l.header_type?(l.element="vertical-area",i.attr("data-element","vertical-area"),l.header_type="vertical",t.find("span").text("Horizontal Header"),a.addClass("whb-vertical-header-panel"),s.sortable({axis:"y"})):(l.element="header-area",i.attr("data-element","header-area"),l.header_type="horizontal",t.find("span").text("Vertical Header"),a.removeClass("whb-vertical-header-panel"),s.sortable({axis:""}),T("#wrap").removeClass("whb-header-vertical-toggle")),I(),D(),C(),n.find("li").removeClass("w-active"),n.find("li:first-child").addClass("w-active"),T(".whb-tab-panel").hide(),T("#desktop-view").show()}),T(".whb-languages").length&&(T(".whb-languages").niceSelect(),T("select.whb-languages").change(function(){var e=T(this).children("option:selected").val();location.replace(window.location.href+"&lang="+e)}))})})}(jQuery);
//# sourceMappingURL=whb-editor.js.map