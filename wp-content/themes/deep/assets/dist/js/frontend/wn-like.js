!function(e){function n(e,d){d(document).on("click",".wn-like-button",function(){var e=d(this),n=e.attr("data-post-id"),t=e.attr("data-nonce"),o=e.attr("data-iscomment"),l=d("1"===o?".wn-like-comment-button-"+n:".wn-like-button-"+n),a=l.next("#wn-like-loader");return""!==n&&d.ajax({type:"POST",url:deep_localize.deep_ajax,data:{action:"process_simple_like",post_id:n,nonce:t,is_comment:o},beforeSend:function(){a.html('&nbsp;<div class="loader">Loading...</div>'),d(".wn-like-counter").hide()},success:function(e){var n,t,o=e.icon,i=e.count;l.html(o+i),"unliked"===e.status?(n=deep_localize.like,l.prop("title",n),l.removeClass("liked")):(t=deep_localize.unlike,l.prop("title",t),l.addClass("liked")),a.empty(),d(".wn-like-counter").show()}}),!1})}e(window).on("elementor/frontend/init",function(){elementorFrontend.hooks.addAction("frontend/element_ready/lvs.default",n)})}(jQuery);