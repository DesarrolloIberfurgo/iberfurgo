/*! This file is auto-generated */
this.wp=this.wp||{},this.wp.nux=function(e){var t={};function n(r){if(t[r])return t[r].exports;var i=t[r]={i:r,l:!1,exports:{}};return e[r].call(i.exports,i,i.exports,n),i.l=!0,i.exports}return n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var i in e)n.d(r,i,function(t){return e[t]}.bind(null,i));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=490)}({0:function(e,t){!function(){e.exports=this.wp.element}()},1:function(e,t){!function(){e.exports=this.wp.i18n}()},10:function(e,t){!function(){e.exports=this.wp.compose}()},12:function(e,t,n){"use strict";n.d(t,"a",(function(){return u}));var r=n(38);var i=n(31),o=n(39);function u(e,t){return Object(r.a)(e)||function(e,t){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(e)){var n=[],r=!0,i=!1,o=void 0;try{for(var u,c=e[Symbol.iterator]();!(r=(u=c.next()).done)&&(n.push(u.value),!t||n.length!==t);r=!0);}catch(e){i=!0,o=e}finally{try{r||null==c.return||c.return()}finally{if(i)throw o}}return n}}(e,t)||Object(i.a)(e,t)||Object(o.a)()}},160:function(e,t,n){"use strict";var r=n(0),i=n(7),o=Object(r.createElement)(i.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"},Object(r.createElement)(i.Path,{d:"M13 11.8l6.1-6.3-1-1-6.1 6.2-6.1-6.2-1 1 6.1 6.3-6.5 6.7 1 1 6.5-6.6 6.5 6.6 1-1z"}));t.a=o},17:function(e,t,n){"use strict";n.d(t,"a",(function(){return u}));var r=n(27);var i=n(37),o=n(31);function u(e){return function(e){if(Array.isArray(e))return Object(r.a)(e)}(e)||Object(i.a)(e)||Object(o.a)(e)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}},2:function(e,t){!function(){e.exports=this.lodash}()},27:function(e,t,n){"use strict";function r(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}n.d(t,"a",(function(){return r}))},3:function(e,t){!function(){e.exports=this.wp.components}()},31:function(e,t,n){"use strict";n.d(t,"a",(function(){return i}));var r=n(27);function i(e,t){if(e){if("string"==typeof e)return Object(r.a)(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);return"Object"===n&&e.constructor&&(n=e.constructor.name),"Map"===n||"Set"===n?Array.from(e):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?Object(r.a)(e,t):void 0}}},36:function(e,t){!function(){e.exports=this.wp.deprecated}()},37:function(e,t,n){"use strict";function r(e){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(e))return Array.from(e)}n.d(t,"a",(function(){return r}))},38:function(e,t,n){"use strict";function r(e){if(Array.isArray(e))return e}n.d(t,"a",(function(){return r}))},39:function(e,t,n){"use strict";function r(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}n.d(t,"a",(function(){return r}))},4:function(e,t){!function(){e.exports=this.wp.data}()},42:function(e,t,n){"use strict";var r,i;function o(e){return[e]}function u(){var e={clear:function(){e.head=null}};return e}function c(e,t,n){var r;if(e.length!==t.length)return!1;for(r=n;r<e.length;r++)if(e[r]!==t[r])return!1;return!0}r={},i="undefined"!=typeof WeakMap,t.a=function(e,t){var n,a;function s(){n=i?new WeakMap:u()}function f(){var n,r,i,o,u,s=arguments.length;for(o=new Array(s),i=0;i<s;i++)o[i]=arguments[i];for(u=t.apply(null,o),(n=a(u)).isUniqueByDependants||(n.lastDependants&&!c(u,n.lastDependants,0)&&n.clear(),n.lastDependants=u),r=n.head;r;){if(c(r.args,o,1))return r!==n.head&&(r.prev.next=r.next,r.next&&(r.next.prev=r.prev),r.next=n.head,r.prev=null,n.head.prev=r,n.head=r),r.val;r=r.next}return r={val:e.apply(null,o)},o[0]=null,r.args=o,n.head&&(n.head.prev=r,r.next=n.head),n.head=r,r.val}return t||(t=o),a=i?function(e){var t,i,o,c,a,s=n,f=!0;for(t=0;t<e.length;t++){if(i=e[t],!(a=i)||"object"!=typeof a){f=!1;break}s.has(i)?s=s.get(i):(o=new WeakMap,s.set(i,o),s=o)}return s.has(r)||((c=u()).isUniqueByDependants=f,s.set(r,c)),s.get(r)}:function(){return n},f.getDependants=t,f.clear=s,s(),f}},490:function(e,t,n){"use strict";n.r(t),n.d(t,"DotTip",(function(){return M}));var r={};n.r(r),n.d(r,"triggerGuide",(function(){return b})),n.d(r,"dismissTip",(function(){return v})),n.d(r,"disableTips",(function(){return y})),n.d(r,"enableTips",(function(){return h}));var i={};n.r(i),n.d(i,"getAssociatedGuide",(function(){return S})),n.d(i,"isTipVisible",(function(){return T})),n.d(i,"areTipsEnabled",(function(){return x}));var o=n(36),u=n.n(o),c=n(4),a=n(5),s=n(17);function f(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,r)}return n}function l(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?f(Object(n),!0).forEach((function(t){Object(a.a)(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):f(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}var p=Object(c.combineReducers)({areTipsEnabled:function(){var e=!(arguments.length>0&&void 0!==arguments[0])||arguments[0],t=arguments.length>1?arguments[1]:void 0;switch(t.type){case"DISABLE_TIPS":return!1;case"ENABLE_TIPS":return!0}return e},dismissedTips:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=arguments.length>1?arguments[1]:void 0;switch(t.type){case"DISMISS_TIP":return l(l({},e),{},Object(a.a)({},t.id,!0));case"ENABLE_TIPS":return{}}return e}}),d=Object(c.combineReducers)({guides:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],t=arguments.length>1?arguments[1]:void 0;switch(t.type){case"TRIGGER_GUIDE":return[].concat(Object(s.a)(e),[t.tipIds])}return e},preferences:p});function b(e){return{type:"TRIGGER_GUIDE",tipIds:e}}function v(e){return{type:"DISMISS_TIP",id:e}}function y(){return{type:"DISABLE_TIPS"}}function h(){return{type:"ENABLE_TIPS"}}var O=n(12),m=n(42),j=n(2);function g(e,t){var n;if("undefined"==typeof Symbol||null==e[Symbol.iterator]){if(Array.isArray(e)||(n=function(e,t){if(!e)return;if("string"==typeof e)return w(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);"Object"===n&&e.constructor&&(n=e.constructor.name);if("Map"===n||"Set"===n)return Array.from(e);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return w(e,t)}(e))||t&&e&&"number"==typeof e.length){n&&(e=n);var r=0,i=function(){};return{s:i,n:function(){return r>=e.length?{done:!0}:{done:!1,value:e[r++]}},e:function(e){throw e},f:i}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var o,u=!0,c=!1;return{s:function(){n=e[Symbol.iterator]()},n:function(){var e=n.next();return u=e.done,e},e:function(e){c=!0,o=e},f:function(){try{u||null==n.return||n.return()}finally{if(c)throw o}}}}function w(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}var S=Object(m.a)((function(e,t){var n,r=g(e.guides);try{for(r.s();!(n=r.n()).done;){var i=n.value;if(Object(j.includes)(i,t)){var o=Object(j.difference)(i,Object(j.keys)(e.preferences.dismissedTips)),u=Object(O.a)(o,2),c=u[0],a=void 0===c?null:c,s=u[1];return{tipIds:i,currentTipId:a,nextTipId:void 0===s?null:s}}}}catch(e){r.e(e)}finally{r.f()}return null}),(function(e){return[e.guides,e.preferences.dismissedTips]}));function T(e,t){if(!e.preferences.areTipsEnabled)return!1;if(Object(j.has)(e.preferences.dismissedTips,[t]))return!1;var n=S(e,t);return!n||n.currentTipId===t}function x(e){return e.preferences.areTipsEnabled}Object(c.registerStore)("core/nux",{reducer:d,actions:r,selectors:i,persist:["preferences"]});var I=n(0),E=n(10),A=n(3),P=n(1),_=n(160);function D(e){e.stopPropagation()}var M=Object(E.compose)(Object(c.withSelect)((function(e,t){var n=t.tipId,r=e("core/nux"),i=r.isTipVisible,o=(0,r.getAssociatedGuide)(n);return{isVisible:i(n),hasNextTip:!(!o||!o.nextTipId)}})),Object(c.withDispatch)((function(e,t){var n=t.tipId,r=e("core/nux"),i=r.dismissTip,o=r.disableTips;return{onDismiss:function(){i(n)},onDisable:function(){o()}}})))((function(e){var t=e.position,n=void 0===t?"middle right":t,r=e.children,i=e.isVisible,o=e.hasNextTip,u=e.onDismiss,c=e.onDisable,a=Object(I.useRef)(null),s=Object(I.useCallback)((function(e){a.current&&(a.current.contains(e.relatedTarget)||c())}),[c,a]);return i?Object(I.createElement)(A.Popover,{className:"nux-dot-tip",position:n,noArrow:!0,focusOnMount:"container",shouldAnchorIncludePadding:!0,role:"dialog","aria-label":Object(P.__)("Editor tips"),onClick:D,onFocusOutside:s},Object(I.createElement)("p",null,r),Object(I.createElement)("p",null,Object(I.createElement)(A.Button,{isLink:!0,onClick:u},o?Object(P.__)("See next tip"):Object(P.__)("Got it"))),Object(I.createElement)(A.Button,{className:"nux-dot-tip__disable",icon:_.a,label:Object(P.__)("Disable tips"),onClick:c})):null}));u()("wp.nux",{hint:"wp.components.Guide can be used to show a user guide."})},5:function(e,t,n){"use strict";function r(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}n.d(t,"a",(function(){return r}))},7:function(e,t){!function(){e.exports=this.wp.primitives}()}});