/*! This file is auto-generated */
this.wp=this.wp||{},this.wp.isShallowEqual=function(r){var t={};function e(n){if(t[n])return t[n].exports;var o=t[n]={i:n,l:!1,exports:{}};return r[n].call(o.exports,o,o.exports,e),o.l=!0,o.exports}return e.m=r,e.c=t,e.d=function(r,t,n){e.o(r,t)||Object.defineProperty(r,t,{enumerable:!0,get:n})},e.r=function(r){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(r,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(r,"__esModule",{value:!0})},e.t=function(r,t){if(1&t&&(r=e(r)),8&t)return r;if(4&t&&"object"==typeof r&&r&&r.__esModule)return r;var n=Object.create(null);if(e.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:r}),2&t&&"string"!=typeof r)for(var o in r)e.d(n,o,function(t){return r[t]}.bind(null,o));return n},e.n=function(r){var t=r&&r.__esModule?function(){return r.default}:function(){return r};return e.d(t,"a",t),t},e.o=function(r,t){return Object.prototype.hasOwnProperty.call(r,t)},e.p="",e(e.s=454)}({454:function(r,t,e){"use strict";var n=e(455),o=e(456),u=Array.isArray;r.exports=function(r,t){if(r&&t){if(r.constructor===Object&&t.constructor===Object)return n(r,t);if(u(r)&&u(t))return o(r,t)}return r===t},r.exports.isShallowEqualObjects=n,r.exports.isShallowEqualArrays=o},455:function(r,t,e){"use strict";var n=Object.keys;r.exports=function(r,t){var e,o,u,i,f;if(r===t)return!0;if(e=n(r),o=n(t),e.length!==o.length)return!1;for(u=0;u<e.length;){if(void 0===(f=r[i=e[u]])&&!t.hasOwnProperty(i)||f!==t[i])return!1;u++}return!0}},456:function(r,t,e){"use strict";r.exports=function(r,t){var e;if(r===t)return!0;if(r.length!==t.length)return!1;for(e=0;e<r.length;e++)if(r[e]!==t[e])return!1;return!0}}});