"use strict";function _typeof(e){return _typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},_typeof(e)}function _classCallCheck(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function _defineProperties(e,t){for(var r=0;r<t.length;r++){var o=t[r];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}function _createClass(e,t,r){return t&&_defineProperties(e.prototype,t),r&&_defineProperties(e,r),Object.defineProperty(e,"prototype",{writable:!1}),e}function _get(){return _get="undefined"!=typeof Reflect&&Reflect.get?Reflect.get:function(e,t,r){var o=_superPropBase(e,t);if(o){var a=Object.getOwnPropertyDescriptor(o,t);return a.get?a.get.call(arguments.length<3?e:r):a.value}},_get.apply(this,arguments)}function _superPropBase(e,t){for(;!Object.prototype.hasOwnProperty.call(e,t)&&null!==(e=_getPrototypeOf(e)););return e}function _inherits(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),Object.defineProperty(e,"prototype",{writable:!1}),t&&_setPrototypeOf(e,t)}function _setPrototypeOf(e,t){return _setPrototypeOf=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e},_setPrototypeOf(e,t)}function _createSuper(e){var t=_isNativeReflectConstruct();return function(){var r,o=_getPrototypeOf(e);if(t){var a=_getPrototypeOf(this).constructor;r=Reflect.construct(o,arguments,a)}else r=o.apply(this,arguments);return _possibleConstructorReturn(this,r)}}function _possibleConstructorReturn(e,t){if(t&&("object"===_typeof(t)||"function"==typeof t))return t;if(void 0!==t)throw new TypeError("Derived constructors may only return object or undefined");return _assertThisInitialized(e)}function _assertThisInitialized(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}function _isNativeReflectConstruct(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}function _getPrototypeOf(e){return _getPrototypeOf=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)},_getPrototypeOf(e)}!function(e,t,r){var o={desktop:"100%",tab:"768px",mobile:"360px"},a={text:{callback:function(e){return e=e.toLowerCase(),this.get("title").toLowerCase().indexOf(e)>=0||_.any(this.get("tags"),(function(t){return t.toLowerCase().indexOf(e)>=0}))}},tags:{callback:function(e){return _.any(this.get("tags"),(function(t){return t.indexOf(e)>=0}))}},type:{},subtype:{},favorite:{}},n="elementor-add-section",i="elementor-add-absp-button",s='<div class="',l="-drag-title";e(document).ready((function(){var c=function(e){var t=arguments.length>1&&void 0!==arguments[1]&&arguments[1];return elementorCommon.translate(e,null,t,r.i18n)},p=s+n+"-area-button "+i+'" title="'+c("browse_libs")+'"> <i class="absp-lib-logo eicon-plus"></i> </div>',u=e("#tmpl-"+n);u.length&&u.html(u.html().replace(s+n+l,p+s+n+l));var d=-1,m=Backbone,f=m.Collection,b=m.Model,h=m.Radio,g=Marionette,y=g.Behavior,w=g.ItemView,v=g.CompositeView,k=g.TemplateCache,C=g.Renderer,P=b.extend({defaults:{template_id:0,title:"",type:"",thumbnail:"",url:"",tags:[],isPro:!1,favorite:!1,views:0,downloads:0}}),L=f.extend({model:P}),O=y.extend({ui:{insertButton:".absp-templates-modal__insert-button"},events:{"click @ui.insertButton":"onInsertButtonClick"},onInsertButtonClick:function(){AbspLibrary.insertTemplate({model:this.view.model})}}),x=w.extend({id:"elementor-template-library-templates-empty",template:"#tmpl-absp-templates-modal__empty",ui:{title:".elementor-template-library-blank-title",message:".elementor-template-library-blank-message"},modesStrings:{empty:{title:c("sync_error"),message:c("sync_again")},noResults:{title:c("no_result"),message:c("search_different")},noFavorites:{title:c("no_favorite"),message:c("make_favorite")}},getCurrentMode:function(){return AbspLibrary.getFilter("text")?"noResults":AbspLibrary.getFilter("favorite")?"noFavorites":"empty"},onRender:function(){var e=this.modesStrings[this.getCurrentMode()];this.ui.title.html(e.title),this.ui.message.html(e.message)}}),M=w.extend({template:"#tmpl-absp-templates-modal__template",className:"absp-templates-modal__template",ui:{previewButton:".absp-templates-modal__preview-button, .absp-templates-modal__template-preview"},events:{"click @ui.previewButton":"onPreviewButtonClick"},behaviors:{insertTemplate:{behaviorClass:O}},onPreviewButtonClick:function(){AbspLibrary.showPreviewView(this.model)}}),B=v.extend({template:"#tmpl-absp-templates-modal__templates",id:"absp-templates-modal__templates",childViewContainer:".absp-templates-modal__templates-list",emptyView:function(){return new x},ui:{templatesWindow:".absp-templates-modal__templates-window",textFilter:"#absp-templates-modal__search",tagsFilter:"#absp-templates-modal__filter-tags",filterBar:"#absp-templates-modal__toolbar-filter"},events:{"input @ui.textFilter":"onTextFilterInput","click @ui.tagsFilter li":"onTagsFilterClick"},getChildView:function(){return M},initialize:function(){this.listenTo(AbspLibrary.channels.templates,"filter:change",this._renderChildren)},filter:function(e){var t=AbspLibrary.getFilterTerms(),r=!0;return _.each(t,(function(t,o){var a=AbspLibrary.getFilter(o);if(a&&t.callback){var n=t.callback.call(e,a);return n||(r=!1),n}})),r},setMasonrySkin:function(){var e=this,t=new elementorModules.utils.Masonry({container:e.$childViewContainer,items:e.$childViewContainer.children(),columnsCount:3});e.$childViewContainer.imagesLoaded(t.run.bind(t))},onRenderCollection:function(){this.setMasonrySkin(),this.updatePerfectScrollbar()},onTextFilterInput:function(){var e=this;_.defer((function(){AbspLibrary.setFilter("text",e.ui.textFilter.val())}))},onTagsFilterClick:function(t){var r=e(t.currentTarget),o=r.data("tag");AbspLibrary.setFilter("tags",o),r.addClass("active").siblings().removeClass("active"),o=o?AbspLibrary.getTags()[o]:c("Filter"),this.ui.filterBar.find(".absp-templates-modal__filter-btn").html(o)},updatePerfectScrollbar:function(){var e=this;e.perfectScrollbar||(e.perfectScrollbar=new PerfectScrollbar(e.ui.templatesWindow[0],{suppressScrollX:!0}),e.perfectScrollbar.isRtl=!1,e.perfectScrollbar.update())},setTagsFilterHover:function(){var e=this,t=e.ui.filterBar.find(".absp-templates-modal__filter-btn i");e.ui.filterBar.hoverIntent((function(){e.ui.tagsFilter.css("display","block"),t.addClass("eicon-caret-down").removeClass("eicon-caret-right")}),(function(){e.ui.tagsFilter.css("display","none"),t.addClass("eicon-caret-right").removeClass("eicon-caret-down")}),{sensitivity:50,interval:150,timeout:100})},onRender:function(){this.setTagsFilterHover(),this.updatePerfectScrollbar()}}),T=w.extend({template:"#tmpl-absp-templates-modal__header-menu-responsive",id:"elementor-template-library-header-menu-responsive",className:"absp-templates-modal__header-menu-responsive",ui:{items:"> .elementor-component-tab"},events:{"click @ui.items":"onTabItemClick"},onTabItemClick:function(t){var r=e(t.currentTarget);AbspLibrary.channels.tabs.trigger("change:device",r.data("tab"),r)}}),V=w.extend({template:"#tmpl-absp-templates-modal__header-back",id:"elementor-template-library-header-preview-back",className:"absp-templates-modal__header-back",events:function(){return{click:"goBack"}},goBack:function(){return AbspLibrary.showBlocksView()}}),A=w.extend({template:"#tmpl-absp-templates-modal__header-insert",id:"elementor-template-library-header-preview",behaviors:{insertTemplate:{behaviorClass:O}}}),F=w.extend({template:"#tmpl-absp-templates-modal__loading",id:"absp-templates-modal__loading"}),S=w.extend({template:"#tmpl-absp-templates-modal__header-logo",className:"absp-templates-modal__header-logo",templateHelpers:function(){return{title:this.getOption("title")}}}),R=w.extend({template:"#tmpl-absp-templates-modal__header-actions",id:"elementor-template-library-header-actions",ui:{sync:"#absp-templates-modal__header-sync i"},events:{"click @ui.sync":"syncLibrary"},syncLibrary:function(){var e=this;e.ui.sync.addClass("eicon-animation-spin"),AbspLibrary.requestLibraryData({onUpdate:function(){e.ui.sync.removeClass("eicon-animation-spin"),AbspLibrary.updateBlocksView()},forceUpdate:!0,forceSync:!0})}}),j=w.extend({template:"#tmpl-absp-templates-modal__preview",className:"absp-templates-modal__preview",ui:{iframe:"> iframe"},onRender:function(){var e=this;e.ui.iframe.attr("src",e.getOption("url")).hide(),e.$el.append((new F).render().el),e.ui.iframe.on("load",(function(){e.$el.find("#absp-templates-modal__loading").remove(),e.ui.iframe.show()}))}}),D=function(t){_inherits(a,elementorModules.common.views.modal.Layout);var o=_createSuper(a);function a(){return _classCallCheck(this,a),o.apply(this,arguments)}return _createClass(a,[{key:"getModalOptions",value:function(){return{id:"absp-templates-library-modal",hide:{onOutsideClick:!1,onEscKeyPress:!0,onBackgroundClick:!1}}}},{key:"getTemplateActionButton",value:function(t){var o=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"footer",a=t.isPro&&!r.has_pro?"pro":"insert";"footer"===o&&(t.position="footer"),"pro"===a&&(t.proLink="https://absoluteplugins.com/wordpress-plugins/absolute-addons/pricing/"+"?utm_source=template-library&utm_medium=template-library&utm_campaign=get-pro&utm_content=library-".concat(o,"-get-pro"));var n=k.get("#tmpl-absp-templates-modal__".concat(a,"-button"));return C.render(n,e.extend({},{slug:a,position:o},t))}},{key:"showLogo",value:function(e){this.getHeaderView().logoArea.show(new S(e))}},{key:"showDefaultHeader",value:function(){this.showLogo({title:c("library_name")});var e=this.getHeaderView();e.tools.show(new R),e.menuArea.reset()}},{key:"showPreviewView",value:function(e){var t=this.getHeaderView();t.menuArea.show(new T),t.logoArea.show(new V),t.tools.show(new A({model:e})),this.modalContent.show(new j({url:e.get("url")}))}},{key:"showBlocksView",value:function(e){this.modalContent.show(new B({collection:e}))}},{key:"showLoadingView",value:function(){_get(_getPrototypeOf(a.prototype),"showLoadingView",this).call(this)}},{key:"hideLoadingView",value:function(){_get(_getPrototypeOf(a.prototype),"hideLoadingView",this).call(this)}},{key:"showModal",value:function(){_get(_getPrototypeOf(a.prototype),"showModal",this).call(this)}},{key:"hideModal",value:function(){_get(_getPrototypeOf(a.prototype),"hideModal",this).call(this)}}]),a}();t.AbspLibrary=new function(){var r,s,l,p,u=this;function m(){t.elementor.$previewContents.on("click.onAddTemplateButton","."+i,u.showModal.bind(u)),u.channels.tabs.on("change:device",(function(t,r){r.addClass("elementor-active").siblings().removeClass("elementor-active"),e(".absp-templates-modal__preview").css("width",o[t]||o.desktop)}))}u.channels={tabs:h.channel("tabs"),templates:h.channel("templates")},u.updateBlocksView=function(){u.setFilter("tags","",!1),u.setFilter("text","",!1),u.getModal().showBlocksView(l)},u.setFilter=function(e,t){var r=!(arguments.length>2&&void 0!==arguments[2])||arguments[2];u.channels.templates.reply("filter:"+e,t),r&&u.channels.templates.trigger("filter:change")},u.getFilter=function(e){return u.channels.templates.request("filter:"+e)},u.getFilterTerms=function(){return a},u.showModal=function(t){var r=e(t.target).closest("."+n).next(".elementor-element").data("id");r?_.each(elementor.documents.getCurrent().container.children,(function(e,t){e.id===r&&(d=t)})):d=-1,u.getModal().showModal(),u.showBlocksView()},u.closeModal=function(){return u.getModal().hideModal()},u.getModal=function(){return r||(r=new D),r},u.init=function(){elementor.loaded?m():elementor.on("preview:loaded",m.bind(this))},u.getTabs=function(){return{tabs:{blocks:{title:c("Blocks"),active:!0}}}},u.getTags=function(){return s},u.showBlocksView=function(){u.getModal().showDefaultHeader(),u.setFilter("tags","",!1),u.setFilter("text","",!1),u.loadTemplates((function(){return u.getModal().showBlocksView(l)}))},u.showPreviewView=function(e){return u.getModal().showPreviewView(e)},u.loadTemplates=function(e){u.requestLibraryData({onBeforeUpdate:u.getModal().showLoadingView.bind(u.getModal()),onUpdate:function(){u.getModal().hideLoadingView(),e&&"function"==typeof e&&e()}})},u.requestLibraryData=function(e){if(!l||e.forceUpdate){e.onBeforeUpdate&&e.onBeforeUpdate();var t={data:{},success:function(t){l=new L(t.templates),t.tags&&(s=t.tags),e.onUpdate&&e.onUpdate()}};e.forceSync&&(t.data.sync=!0),elementorCommon.ajax.addRequest("absp_library_data",t)}else e.onUpdate&&e.onUpdate()},u.requestTemplateData=function(t,r){var o={unique_id:t,data:{edit_mode:!0,display:!0,template_id:t}};r&&e.extend(!0,o,r),elementorCommon.ajax.addRequest("absp_template_data",o)},u.insertTemplate=function(e){var t=elementor.config.document.remoteLibrary.autoImportSettings,r=e.model,o=r.withPageSettings,a=void 0===o?null:o;t&&(a=!0),AbspLibrary.getModal().showLoadingView(),AbspLibrary.requestTemplateData(r.get("template_id"),{success:function(e){AbspLibrary.getModal().hideLoadingView(),AbspLibrary.getModal().hideModal();var t={};-1!==d&&(t.at=d),t.withPageSettings=a,$e.run("document/elements/import",{model:r,data:e,options:t}),d=-1},error:function(e){AbspLibrary.showErrorDialog(e)},complete:function(){AbspLibrary.getModal().hideLoadingView()}})},u.showErrorDialog=function(e){var t="";"string"==typeof e?t+="<div>"+e+"</div>":e.hasOwnProperty("responseText")?t+="<div>"+e.responseText+"</div>":e.hasOwnProperty("message")?t+="<div>"+e.message+"</div>":"object"===_typeof(e)?_.each(e,(function(e){"string"==typeof e?e.hasOwnProperty("message")&&(t+="<div>"+e.message+"</div>"):e.hasOwnProperty("message")?t+="<div>"+e.message+"</div>":console.warn(e)})):t="<div><b>&#60;"+c("unknown_err")+"&#62;</b></div>",t='<div id="elementor-template-library-error-info">'+t+"</div>",u.getErrorDialog().setMessage(c("ajax_err",[t])).show()},u.getErrorDialog=function(){return p||(p=elementorCommon.dialogsManager.createWidget("alert",{id:"elementor-template-library-error-dialog",headerMessage:c("an_err")})),p}},AbspLibrary.init(),AbspLibrary.__=c}))}(jQuery,window,AbspTemplateLibraryData);