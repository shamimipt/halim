"use strict";function _typeof(e){return _typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},_typeof(e)
/*!
  SerializeJSON jQuery plugin.
  https://github.com/marioizquierdo/jquery.serializeJSON
  version 3.2.1 (Feb, 2021)

  Copyright (c) 2012-2021 Mario Izquierdo
  Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
  and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
*/}!function(e){if("function"==typeof define&&define.amd)define(["jquery"],e);else if("object"===("undefined"==typeof exports?"undefined":_typeof(exports))){var n=require("jquery");module.exports=e(n)}else e(window.jQuery||window.Zepto||window.$)}((function(e){var n=/\r?\n/g,t=/^(?:submit|button|image|reset|file)$/i,r=/^(?:input|select|textarea|keygen)/i,i=/^(?:checkbox|radio)$/i;e.fn.serializeJSON=function(n){var t=e.serializeJSON,r=t.setupOpts(n),i=e.extend({},r.defaultTypes,r.customTypes),a=t.serializeArray(this,r),u={};return e.each(a,(function(n,a){var o=a.name,s=e(a.el).attr("data-value-type");if(!s&&!r.disableColonTypes){var l=t.splitType(a.name);o=l[0],s=l[1]}if("skip"!==s){s||(s=r.defaultType);var f=t.applyTypeFunc(a.name,a.value,s,a.el,i);if(f||!t.shouldSkipFalsy(a.name,o,s,a.el,r)){var p=t.splitInputNameIntoKeysArray(o);t.deepSet(u,p,f,r)}}})),u},e.serializeJSON={defaultOptions:{},defaultBaseOptions:{checkboxUncheckedValue:void 0,useIntKeysAsArrayIndex:!1,skipFalsyValuesForTypes:[],skipFalsyValuesForFields:[],disableColonTypes:!1,customTypes:{},defaultTypes:{string:function(e){return String(e)},number:function(e){return Number(e)},boolean:function(e){return-1===["false","null","undefined","","0"].indexOf(e)},null:function(e){return-1===["false","null","undefined","","0"].indexOf(e)?e:null},array:function(e){return JSON.parse(e)},object:function(e){return JSON.parse(e)},skip:null},defaultType:"string"},setupOpts:function(n){null==n&&(n={});var t=e.serializeJSON,r=["checkboxUncheckedValue","useIntKeysAsArrayIndex","skipFalsyValuesForTypes","skipFalsyValuesForFields","disableColonTypes","customTypes","defaultTypes","defaultType"];for(var i in n)if(-1===r.indexOf(i))throw new Error("serializeJSON ERROR: invalid option '"+i+"'. Please use one of "+r.join(", "));return e.extend({},t.defaultBaseOptions,t.defaultOptions,n)},serializeArray:function(a,u){null==u&&(u={});var o=e.serializeJSON;return a.map((function(){var n=e.prop(this,"elements");return n?e.makeArray(n):this})).filter((function(){var n=e(this),a=this.type;return this.name&&!n.is(":disabled")&&r.test(this.nodeName)&&!t.test(a)&&(this.checked||!i.test(a)||null!=o.getCheckboxUncheckedValue(n,u))})).map((function(t,r){var a=e(this),s=a.val(),f=this.type;return null==s?null:(i.test(f)&&!this.checked&&(s=o.getCheckboxUncheckedValue(a,u)),l(s)?e.map(s,(function(e){return{name:r.name,value:e.replace(n,"\r\n"),el:r}})):{name:r.name,value:s.replace(n,"\r\n"),el:r})})).get()},getCheckboxUncheckedValue:function(e,n){var t=e.attr("data-unchecked-value");return null==t&&(t=n.checkboxUncheckedValue),t},applyTypeFunc:function(e,n,t,r,i){var u=i[t];if(!u)throw new Error("serializeJSON ERROR: Invalid type "+t+" found in input name '"+e+"', please use one of "+a(i).join(", "));return u(n,r)},splitType:function(e){var n=e.split(":");if(n.length>1){var t=n.pop();return[n.join(":"),t]}return[e,""]},shouldSkipFalsy:function(n,t,r,i,a){var u=e(i).attr("data-skip-falsy");if(null!=u)return"false"!==u;var o=a.skipFalsyValuesForFields;if(o&&(-1!==o.indexOf(t)||-1!==o.indexOf(n)))return!0;var s=a.skipFalsyValuesForTypes;return!(!s||-1===s.indexOf(r))},splitInputNameIntoKeysArray:function(n){var t=n.split("[");return""===(t=e.map(t,(function(e){return e.replace(/\]/g,"")})))[0]&&t.shift(),t},deepSet:function(n,t,r,i){null==i&&(i={});var a=e.serializeJSON;if(o(n))throw new Error("ArgumentError: param 'o' expected to be an object or array, found undefined");if(!t||0===t.length)throw new Error("ArgumentError: param 'keys' expected to be an array with least one element");var f=t[0];if(1!==t.length){var p=t[1],c=t.slice(1);if(""===f){var y=n.length-1,d=n[y];f=u(d)&&o(a.deepGet(d,c))?y:y+1}""===p||i.useIntKeysAsArrayIndex&&s(p)?!o(n[f])&&l(n[f])||(n[f]=[]):!o(n[f])&&u(n[f])||(n[f]={}),a.deepSet(n[f],c,r,i)}else""===f?n.push(r):n[f]=r},deepGet:function(n,t){var r=e.serializeJSON;if(o(n)||o(t)||0===t.length||!u(n)&&!l(n))return n;var i=t[0];if(""!==i){if(1===t.length)return n[i];var a=t.slice(1);return r.deepGet(n[i],a)}}};var a=function(e){if(Object.keys)return Object.keys(e);var n,t=[];for(n in e)t.push(n);return t},u=function(e){return e===Object(e)},o=function(e){return void 0===e},s=function(e){return/^[0-9]+$/.test(String(e))},l=Array.isArray||function(e){return"[object Array]"===Object.prototype.toString.call(e)}}));
//# sourceMappingURL=jquery.serializejson.js.map
