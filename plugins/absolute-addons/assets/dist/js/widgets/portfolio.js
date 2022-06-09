"use strict";
/**!
 * Portfolio Public Scripts
 *
 * @author AbsolutePlugins <support@absoluteplugins.com>
 * @package AbsolutePlugins
 * @version 1.0.0
 */!function(e){e(window).on("elementor/frontend/init",(function(){elementorFrontend.hooks.addAction("frontend/element_ready/absolute-portfolio.default",(function(n){ABSP.swiper(n);var i=n.find(".filter-container");new Filterizr(i[0],i.data()),n.find(".filters-group li a").on("click",(function(i){i.preventDefault(),n.find(".filters-group li a").removeClass("is-checked"),e(this).addClass("is-checked")}))}))}))}(jQuery);