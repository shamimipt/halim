"use strict";function _typeof(t){return _typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},_typeof(t)}!function(t,r){"function"==typeof define&&define.amd?define(r):"object"===("undefined"==typeof exports?"undefined":_typeof(exports))?module.exports=r():t.Sifter=r()}("undefined"!=typeof window?window:void 0,(function(){var t=function(t,r){this.items=t,this.settings=r||{diacritics:!0}};t.prototype.tokenize=function(t,r){if(!(t=o(String(t||"").toLowerCase()))||!t.length)return[];var e,n,f,u,c=[],p=t.split(/ +/);for(e=0,n=p.length;e<n;e++){if(f=i(p[e]),this.settings.diacritics)for(u in s)s.hasOwnProperty(u)&&(f=f.replace(new RegExp(u,"g"),s[u]));r&&(f="\\b"+f),c.push({string:p[e],regex:new RegExp(f,"i")})}return c},t.prototype.iterator=function(t,r){var e;e=f(t)?Array.prototype.forEach||function(t){for(var r=0,e=this.length;r<e;r++)t(this[r],r,this)}:function(t){for(var r in this)this.hasOwnProperty(r)&&t(this[r],r,this)},e.apply(t,[r])},t.prototype.getScoreFunction=function(t,r){var e,o,i,f;t=this.prepareSearch(t,r),o=t.tokens,e=t.options.fields,i=o.length,f=t.options.nesting;var s,u=function(t,r){var e,n;return t?-1===(n=(t=String(t||"")).search(r.regex))?0:(e=r.string.length/t.length,0===n&&(e+=.5),e):0},c=(s=e.length)?1===s?function(t,r){return u(n(r,e[0],f),t)}:function(t,r){for(var o=0,i=0;o<s;o++)i+=u(n(r,e[o],f),t);return i/s}:function(){return 0};return i?1===i?function(t){return c(o[0],t)}:"and"===t.options.conjunction?function(t){for(var r,e=0,n=0;e<i;e++){if((r=c(o[e],t))<=0)return 0;n+=r}return n/i}:function(t){for(var r=0,e=0;r<i;r++)e+=c(o[r],t);return e/i}:function(){return 0}},t.prototype.getSortFunction=function(t,e){var o,i,f,s,u,c,p,a,l,h,y;if(y=!(t=(f=this).prepareSearch(t,e)).query&&e.sort_empty||e.sort,l=function(t,r){return"$score"===t?r.score:n(f.items[r.id],t,e.nesting)},u=[],y)for(o=0,i=y.length;o<i;o++)(t.query||"$score"!==y[o].field)&&u.push(y[o]);if(t.query){for(h=!0,o=0,i=u.length;o<i;o++)if("$score"===u[o].field){h=!1;break}h&&u.unshift({field:"$score",direction:"desc"})}else for(o=0,i=u.length;o<i;o++)if("$score"===u[o].field){u.splice(o,1);break}for(a=[],o=0,i=u.length;o<i;o++)a.push("desc"===u[o].direction?-1:1);return(c=u.length)?1===c?(s=u[0].field,p=a[0],function(t,e){return p*r(l(s,t),l(s,e))}):function(t,e){var n,o,i;for(n=0;n<c;n++)if(i=u[n].field,o=a[n]*r(l(i,t),l(i,e)))return o;return 0}:null},t.prototype.prepareSearch=function(t,r){if("object"===_typeof(t))return t;var n=(r=e({},r)).fields,o=r.sort,i=r.sort_empty;return n&&!f(n)&&(r.fields=[n]),o&&!f(o)&&(r.sort=[o]),i&&!f(i)&&(r.sort_empty=[i]),{options:r,query:String(t||"").toLowerCase(),tokens:this.tokenize(t,r.respect_word_boundaries),total:0,items:[]}},t.prototype.search=function(t,r){var e,n,o,i,f=this;return n=this.prepareSearch(t,r),r=n.options,t=n.query,i=r.score||f.getScoreFunction(n),t.length?f.iterator(f.items,(function(t,o){e=i(t),(!1===r.filter||e>0)&&n.items.push({score:e,id:o})})):f.iterator(f.items,(function(t,r){n.items.push({score:1,id:r})})),(o=f.getSortFunction(n,r))&&n.items.sort(o),n.total=n.items.length,"number"==typeof r.limit&&(n.items=n.items.slice(0,r.limit)),n};var r=function(t,r){return"number"==typeof t&&"number"==typeof r?t>r?1:t<r?-1:0:(t=u(String(t||"")))>(r=u(String(r||"")))?1:r>t?-1:0},e=function(t,r){var e,n,o,i;for(e=1,n=arguments.length;e<n;e++)if(i=arguments[e])for(o in i)i.hasOwnProperty(o)&&(t[o]=i[o]);return t},n=function(t,r,e){if(t&&r){if(!e)return t[r];for(var n=r.split(".");n.length&&(t=t[n.shift()]););return t}},o=function(t){return(t+"").replace(/^\s+|\s+$|/g,"")},i=function(t){return(t+"").replace(/([.?*+^$[\]\\(){}|-])/g,"\\$1")},f=Array.isArray||"undefined"!=typeof $&&$.isArray||function(t){return"[object Array]"===Object.prototype.toString.call(t)},s={a:"[aḀḁĂăÂâǍǎȺⱥȦȧẠạÄäÀàÁáĀāÃãÅåąĄÃąĄ]",b:"[b␢βΒB฿𐌁ᛒ]",c:"[cĆćĈĉČčĊċC̄c̄ÇçḈḉȻȼƇƈɕᴄＣｃ]",d:"[dĎďḊḋḐḑḌḍḒḓḎḏĐđD̦d̦ƉɖƊɗƋƌᵭᶁᶑȡᴅＤｄð]",e:"[eÉéÈèÊêḘḙĚěĔĕẼẽḚḛẺẻĖėËëĒēȨȩĘęᶒɆɇȄȅẾếỀềỄễỂểḜḝḖḗḔḕȆȇẸẹỆệⱸᴇＥｅɘǝƏƐε]",f:"[fƑƒḞḟ]",g:"[gɢ₲ǤǥĜĝĞğĢģƓɠĠġ]",h:"[hĤĥĦħḨḩẖẖḤḥḢḣɦʰǶƕ]",i:"[iÍíÌìĬĭÎîǏǐÏïḮḯĨĩĮįĪīỈỉȈȉȊȋỊịḬḭƗɨɨ̆ᵻᶖİiIıɪＩｉ]",j:"[jȷĴĵɈɉʝɟʲ]",k:"[kƘƙꝀꝁḰḱǨǩḲḳḴḵκϰ₭]",l:"[lŁłĽľĻļĹĺḶḷḸḹḼḽḺḻĿŀȽƚⱠⱡⱢɫɬᶅɭȴʟＬｌ]",n:"[nŃńǸǹŇňÑñṄṅŅņṆṇṊṋṈṉN̈n̈ƝɲȠƞᵰᶇɳȵɴＮｎŊŋ]",o:"[oØøÖöÓóÒòÔôǑǒŐőŎŏȮȯỌọƟɵƠơỎỏŌōÕõǪǫȌȍՕօ]",p:"[pṔṕṖṗⱣᵽƤƥᵱ]",q:"[qꝖꝗʠɊɋꝘꝙq̃]",r:"[rŔŕɌɍŘřŖŗṘṙȐȑȒȓṚṛⱤɽ]",s:"[sŚśṠṡṢṣꞨꞩŜŝŠšŞşȘșS̈s̈]",t:"[tŤťṪṫŢţṬṭƮʈȚțṰṱṮṯƬƭ]",u:"[uŬŭɄʉỤụÜüÚúÙùÛûǓǔŰűŬŭƯưỦủŪūŨũŲųȔȕ∪]",v:"[vṼṽṾṿƲʋꝞꝟⱱʋ]",w:"[wẂẃẀẁŴŵẄẅẆẇẈẉ]",x:"[xẌẍẊẋχ]",y:"[yÝýỲỳŶŷŸÿỸỹẎẏỴỵɎɏƳƴ]",z:"[zŹźẐẑŽžŻżẒẓẔẕƵƶ]"},u=function(){var t,r,e,n,o="",i={};for(e in s)if(s.hasOwnProperty(e))for(o+=n=s[e].substring(2,s[e].length-1),t=0,r=n.length;t<r;t++)i[n.charAt(t)]=e;var f=new RegExp("["+o+"]","g");return function(t){return t.replace(f,(function(t){return i[t]})).toLowerCase()}}();return t}));
//# sourceMappingURL=sifter.js.map
