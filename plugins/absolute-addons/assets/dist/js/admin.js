"use strict";!function(e,t,a,n,s){var i=s.nonce,r=s.i18n,o=r.okay,c=r.cancel,l=r.submit,d=r.success,u=r.warning,f=r.error,h=r.e404,p=r.something_wrong,b=r.are_you_sure,g=function(e,t){var a=arguments.length>2&&void 0!==arguments[2]?arguments[2]:"success",n=arguments.length>3&&void 0!==arguments[3]&&arguments[3];return Swal.fire({title:e,html:t,icon:a,confirmButtonText:o,timer:n?6e4:2e3,width:"450px"})},v=function(t){return e(".absp-admin-options--error").remove(),!!Object.keys(t.errors).length&&(e.each(t.errors,(function(t,a){e('[data-depend-id="'+t+'"]').after('<p class="absp-admin-options--error absp-admin-options--error-text">'+a+"</p>")})),!0)},m=function(e){e.hasOwnProperty("redirect")&&("reload"===e.redirect?t.location.reload():t.location.href=e.redirect)},w=function(e){var t="";e.hasOwnProperty("message")&&e.message?t=e.message:e.hasOwnProperty("statusText")&&(t="404"===e.status?h:p),g(f,t,"error")},_="toplevel_page_absolute_addons";if(n===_){var C=t.location.hash||"#dashboard",k=function(e){return t.location.hash=e},D=e(".absp-dashboard-tabs"),x=D.find(".absp-dashboard-tabs__nav"),y=D.find(".absp-dashboard-tabs__content"),O=e("#"+_).find(".wp-submenu"),S=e(".absp-dashboard-btn--save"),T=function(t){var a=e('a[href="'+t+'"]'),n="#tab-content-"+t.substring(1),s=y.find(n);S.toggle(s.find("form").length>0&&"#license"!==t),a.addClass("tab--is-active").siblings().removeClass("tab--is-active").blur(),s.addClass("tab--is-active").siblings().removeClass("tab--is-active"),O.find("a").filter((function(e,a){return t===a.hash})).parent().addClass("current").siblings().removeClass("current")};x.on("click",".absp-dashboard-tabs__nav-item",(function(t){var a=e(t.currentTarget),n=t.currentTarget.hash;if(a.is(".nav-item-is--link"))return!0;t.preventDefault(),k(n)})),O.on("click","a",(function(t){var a=t.currentTarget.hash;if(!a)return!0;t.preventDefault(),k(a),e(t.currentTarget).blur().parent().addClass("current").siblings().removeClass("current"),x.find('a[href="'+a+'"]').click(),e("body").focus()})),C&&(t.location.hash?(x.find('a[href="'+C+'"]').click(),T(C)):k(C)),e(t).on("hashchange",(function(e){e.preventDefault(),T(t.location.hash)})),e(".accordion").beefup({openSingle:!0,openSpeed:400,closeSpeed:400}),S.on("click",(function(t){t.preventDefault(),e(this).closest(".absp-dashboard-tabs").find(".tab--is-active form").submit()}));var B=e(".widget-item");e(a).on("click",".widget-filter a",(function(t){t.preventDefault();var a=e(this),n=a.data("filter");a.closest(".widget-filter").find("a").removeClass("active"),a.addClass("active"),"all"===n?B.show():B.show().not(".is-"+n).hide()})).on("click",".toggle-widget",(function(t){t.preventDefault();var a=s.i18n,n=a.confirm_disable_all,i=a.confirm_enable_all,r=e(this).hasClass("all-on");Swal.fire({title:b,html:r?i:n,showCancelButton:!0,allowOutsideClick:!1,showLoaderOnConfirm:!0,cancelButtonText:c,confirmButtonText:l,preConfirm:function(e){return new Promise((function(t,a){e?(B.find(".widget-switch-control").not("[disabled]").prop("checked",r),t()):a()}))}})})),e("#absp-widgets-settings").submit((function(t){t.preventDefault();var a={_wpnonce:i,widgets:{}};e(".widget-switch-control").each((function(){var t=e(this);if(!t.closest(".widget-item").hasClass("is-upcoming")){var n=t.attr("name").replace(/^widgets\[(.*)\]$/g,"$1");a.widgets["".concat(n)]=t.is(":checked")?"on":"off"}})),wp.ajax.post("absp_save_widgets",a).then((function(e){e.message&&g(d,e.message)})).fail(w)})),e("#absp-integration-settings").submit((function(t){t.preventDefault();var a={};e.extend(a,{_wpnonce:i},e(this).serializeJSON()),wp.ajax.post("absp_save_integrations",a).then((function(e){var t=v(e);e.message&&g(t?u:d,e.message,t?"warning":"success"),m(e)})).fail((function(e){w(e),v(e),m(e)}))}))}}(jQuery,window,document,pagenow,ABSP_ADMIN_DASHBOARD);