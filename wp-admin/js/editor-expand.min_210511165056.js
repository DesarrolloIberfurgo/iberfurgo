/*! This file is auto-generated */
!function(F,I){"use strict";var L=I(F),M=I(document),V=I("#wpadminbar"),N=I("#wpfooter");I(function(){var g,e,u=I("#postdivrich"),h=I("#wp-content-wrap"),m=I("#wp-content-editor-tools"),w=I(),H=I(),b=I("#ed_toolbar"),v=I("#content"),i=v[0],o=0,x=I("#post-status-info"),y=I(),T=I(),B=I("#side-sortables"),C=I("#postbox-container-1"),S=I("#post-body"),O=F.wp.editor&&F.wp.editor.fullscreen,r=function(){},l=function(){},z=!1,E=!1,k=!1,A=!1,W=0,K=56,R=20,Y=300,n=h.hasClass("tmce-active")?"tinymce":"html",U=!!parseInt(F.getUserSetting("hidetb"),10),D={windowHeight:0,windowWidth:0,adminBarHeight:0,toolsHeight:0,menuBarHeight:0,visualTopHeight:0,textTopHeight:0,bottomHeight:0,statusBarHeight:0,sideSortablesHeight:0},s=F._.throttle(function(){var t=F.scrollX||document.documentElement.scrollLeft,e=F.scrollY||document.documentElement.scrollTop,o=parseInt(i.style.height,10);i.style.height=Y+"px",i.scrollHeight>Y&&(i.style.height=i.scrollHeight+"px"),void 0!==t&&F.scrollTo(t,e),i.scrollHeight<o&&p()},300);function P(){var t=i.value.length;g&&!g.isHidden()||!g&&"tinymce"===n||(t<o?s():parseInt(i.style.height,10)<i.scrollHeight&&(i.style.height=Math.ceil(i.scrollHeight)+"px",p()),o=t)}function p(t){var e,o,i,n,s,f,a,d,c,u,r,l,p;O&&O.settings.visible||(e=L.scrollTop(),o="scroll"!==(r=t&&t.type),i=g&&!g.isHidden(),n=Y,s=S.offset().top,f=h.width(),!o&&D.windowHeight||(p=L.width(),(D={windowHeight:L.height(),windowWidth:p,adminBarHeight:600<p?V.outerHeight():0,toolsHeight:m.outerHeight()||0,menuBarHeight:y.outerHeight()||0,visualTopHeight:w.outerHeight()||0,textTopHeight:b.outerHeight()||0,bottomHeight:x.outerHeight()||0,statusBarHeight:T.outerHeight()||0,sideSortablesHeight:B.height()||0}).menuBarHeight<3&&(D.menuBarHeight=0)),i||"resize"!==r||P(),u=i?(a=w,l=H,D.visualTopHeight):(a=b,l=v,D.textTopHeight),(i||a.length)&&(p=a.parent().offset().top,r=l.offset().top,l=l.outerHeight(),(i?Y+u:Y+20)+5<l?((!z||o)&&e>=p-D.toolsHeight-D.adminBarHeight&&e<=p-D.toolsHeight-D.adminBarHeight+l-n?(z=!0,m.css({position:"fixed",top:D.adminBarHeight,width:f}),i&&y.length&&y.css({position:"fixed",top:D.adminBarHeight+D.toolsHeight,width:f-2-(i?0:a.outerWidth()-a.width())}),a.css({position:"fixed",top:D.adminBarHeight+D.toolsHeight+D.menuBarHeight,width:f-2-(i?0:a.outerWidth()-a.width())})):(z||o)&&(e<=p-D.toolsHeight-D.adminBarHeight?(z=!1,m.css({position:"absolute",top:0,width:f}),i&&y.length&&y.css({position:"absolute",top:0,width:f-2}),a.css({position:"absolute",top:D.menuBarHeight,width:f-2-(i?0:a.outerWidth()-a.width())})):e>=p-D.toolsHeight-D.adminBarHeight+l-n&&(z=!1,m.css({position:"absolute",top:l-n,width:f}),i&&y.length&&y.css({position:"absolute",top:l-n,width:f-2}),a.css({position:"absolute",top:l-n+D.menuBarHeight,width:f-2-(i?0:a.outerWidth()-a.width())}))),(!E||o&&U)&&e+D.windowHeight<=r+l+D.bottomHeight+D.statusBarHeight+1?t&&0<t.deltaHeight&&t.deltaHeight<100?F.scrollBy(0,t.deltaHeight):i&&U&&(E=!0,T.css({position:"fixed",bottom:D.bottomHeight,visibility:"",width:f-2}),x.css({position:"fixed",bottom:0,width:f})):(!U&&E||(E||o)&&e+D.windowHeight>r+l+D.bottomHeight+D.statusBarHeight-1)&&(E=!1,T.attr("style",U?"":"visibility: hidden;"),x.attr("style",""))):o&&(m.css({position:"absolute",top:0,width:f}),i&&y.length&&y.css({position:"absolute",top:0,width:f-2}),a.css({position:"absolute",top:D.menuBarHeight,width:f-2-(i?0:a.outerWidth()-a.width())}),T.attr("style",U?"":"visibility: hidden;"),x.attr("style","")),C.width()<300&&600<D.windowWidth&&M.height()>B.height()+s+120&&D.windowHeight<l?(D.sideSortablesHeight+K+R>D.windowHeight||k||A?e+K<=s?(B.attr("style",""),k=A=!1):W<e?k?(k=!1,d=B.offset().top-D.adminBarHeight,(c=N.offset().top)<d+D.sideSortablesHeight+R&&(d=c-D.sideSortablesHeight-12),B.css({position:"absolute",top:d,bottom:""})):!A&&D.sideSortablesHeight+B.offset().top+R<e+D.windowHeight&&(A=!0,B.css({position:"fixed",top:"auto",bottom:R})):e<W&&(A?(A=!1,d=B.offset().top-R,(c=N.offset().top)<d+D.sideSortablesHeight+R&&(d=c-D.sideSortablesHeight-12),B.css({position:"absolute",top:d,bottom:""})):!k&&B.offset().top>=e+K&&(k=!0,B.css({position:"fixed",top:K,bottom:""}))):(s-K<=e?B.css({position:"fixed",top:K}):B.attr("style",""),k=A=!1),W=e):(B.attr("style",""),k=A=!1),o&&(h.css({paddingTop:D.toolsHeight}),i?H.css({paddingTop:D.visualTopHeight+D.menuBarHeight}):v.css({marginTop:D.textTopHeight}))))}function f(){P(),p()}function X(t){for(var e=1;e<6;e++)setTimeout(t,500*e)}function t(){F.pageYOffset&&130<F.pageYOffset&&F.scrollTo(F.pageXOffset,0),u.addClass("wp-editor-expand"),L.on("scroll.editor-expand resize.editor-expand",function(t){p(t.type),clearTimeout(e),e=setTimeout(p,100)}),M.on("wp-collapse-menu.editor-expand postboxes-columnchange.editor-expand editor-classchange.editor-expand",p).on("postbox-toggled.editor-expand postbox-moved.editor-expand",function(){!k&&!A&&F.pageYOffset>K&&(A=!0,F.scrollBy(0,-1),p(),F.scrollBy(0,1)),p()}).on("wp-window-resized.editor-expand",function(){g&&!g.isHidden()?g.execCommand("wpAutoResize"):P()}),v.on("focus.editor-expand input.editor-expand propertychange.editor-expand",P),r(),O&&O.pubsub.subscribe("hidden",f),g&&(g.settings.wp_autoresize_on=!0,g.execCommand("wpAutoResizeOn"),g.isHidden()||g.execCommand("wpAutoResize")),g&&!g.isHidden()||P(),p(),M.trigger("editor-expand-on")}function a(){var t=parseInt(F.getUserSetting("ed_size",300),10);t<50?t=50:5e3<t&&(t=5e3),F.pageYOffset&&130<F.pageYOffset&&F.scrollTo(F.pageXOffset,0),u.removeClass("wp-editor-expand"),L.off(".editor-expand"),M.off(".editor-expand"),v.off(".editor-expand"),l(),O&&O.pubsub.unsubscribe("hidden",f),I.each([w,b,m,y,x,T,h,H,v,B],function(t,e){e&&e.attr("style","")}),z=E=k=A=!1,g&&(g.settings.wp_autoresize_on=!1,g.execCommand("wpAutoResizeOff"),g.isHidden()||(v.hide(),t&&g.theme.resizeTo(null,t))),t&&v.height(t),M.trigger("editor-expand-off")}M.on("tinymce-editor-init.editor-expand",function(t,f){var a=F.tinymce.util.VK,e=_.debounce(function(){I(".mce-floatpanel:hover").length||F.tinymce.ui.FloatPanel.hideAll(),I(".mce-tooltip").hide()},1e3,!0);function o(t){t=t.keyCode;t<=47&&t!==a.SPACEBAR&&t!==a.ENTER&&t!==a.DELETE&&t!==a.BACKSPACE&&t!==a.UP&&t!==a.LEFT&&t!==a.DOWN&&t!==a.UP||91<=t&&t<=93||112<=t&&t<=123||144===t||145===t||i(t)}function i(t){var e,o,i,n,s=function(){var t,e,o,i=f.selection.getNode();if(f.wp&&f.wp.getView&&(e=f.wp.getView(i)))o=e.getBoundingClientRect();else{t=f.selection.getRng();try{o=t.getClientRects()[0]}catch(t){}o=o||i.getBoundingClientRect()}return!!o.height&&o}();s&&(o=(e=s.top+f.iframeElement.getBoundingClientRect().top)+s.height,e-=50,o+=50,i=D.adminBarHeight+D.toolsHeight+D.menuBarHeight+D.visualTopHeight,(n=D.windowHeight-(U?D.bottomHeight+D.statusBarHeight:0))-i<s.height||(e<i&&(t===a.UP||t===a.LEFT||t===a.BACKSPACE)?F.scrollTo(F.pageXOffset,e+F.pageYOffset-i):n<o&&F.scrollTo(F.pageXOffset,o+F.pageYOffset-n)))}function n(t){t.state||p()}function s(){L.on("scroll.mce-float-panels",e),setTimeout(function(){f.execCommand("wpAutoResize"),p()},300)}function d(){L.off("scroll.mce-float-panels"),setTimeout(function(){var t=h.offset().top;F.pageYOffset>t&&F.scrollTo(F.pageXOffset,t-D.adminBarHeight),P(),p()},100),p()}function c(){U=!U}"content"===f.id&&((g=f).settings.autoresize_min_height=Y,w=h.find(".mce-toolbar-grp"),H=h.find(".mce-edit-area"),T=h.find(".mce-statusbar"),y=h.find(".mce-menubar"),r=function(){f.on("keyup",o),f.on("show",s),f.on("hide",d),f.on("wp-toolbar-toggle",c),f.on("setcontent wp-autoresize wp-toolbar-toggle",p),f.on("undo redo",i),f.on("FullscreenStateChanged",n),L.off("scroll.mce-float-panels").on("scroll.mce-float-panels",e)},l=function(){f.off("keyup",o),f.off("show",s),f.off("hide",d),f.off("wp-toolbar-toggle",c),f.off("setcontent wp-autoresize wp-toolbar-toggle",p),f.off("undo redo",i),f.off("FullscreenStateChanged",n),L.off("scroll.mce-float-panels")},u.hasClass("wp-editor-expand")&&(r(),X(p)))}),u.hasClass("wp-editor-expand")&&(t(),h.hasClass("html-active")&&X(function(){p(),P()})),I("#adv-settings .editor-expand").show(),I("#editor-expand-toggle").on("change.editor-expand",function(){I(this).prop("checked")?(t(),F.setUserSetting("editor_expand","on")):(a(),F.setUserSetting("editor_expand","off"))}),F.editorExpand={on:t,off:a}}),I(function(){var i,n,t,s,f,a,d,c,u,r,l,p=I(document.body),o=I("#wpcontent"),g=I("#post-body-content"),e=I("#title"),h=I("#content"),m=I(document.createElement("DIV")),w=I("#edit-slug-box"),H=w.find("a").add(w.find("button")).add(w.find("input")),b=I("#adminmenuwrap"),v=(I(),I(),"on"===F.getUserSetting("editor_expand","on")),x=!!v&&"on"===F.getUserSetting("post_dfw"),y=0,T=0,B=20;function C(){(s=g.offset()).right=s.left+g.outerWidth(),s.bottom=s.top+g.outerHeight()}function S(){v||(v=!0,M.trigger("dfw-activate"),h.on("keydown.focus-shortcut",Y))}function O(){v&&(E(),v=!1,M.trigger("dfw-deactivate"),h.off("keydown.focus-shortcut"))}function z(){!x&&v&&(x=!0,h.on("keydown.focus",k),e.add(h).on("blur.focus",W),k(),F.setUserSetting("post_dfw","on"),M.trigger("dfw-on"))}function E(){x&&(x=!1,e.add(h).off(".focus"),A(),g.off(".focus"),F.setUserSetting("post_dfw","off"),M.trigger("dfw-off"))}function _(){(x?E:z)()}function k(t){var e,o=t&&t.keyCode;F.navigator.platform&&(e=-1<F.navigator.platform.indexOf("Mac")),27===o||87===o&&t.altKey&&(!e&&t.shiftKey||e&&t.ctrlKey)?A(t):t&&(t.metaKey||t.ctrlKey&&!t.altKey||t.altKey&&t.shiftKey||o&&(o<=47&&8!==o&&13!==o&&32!==o&&46!==o||91<=o&&o<=93||112<=o&&o<=135||144<=o&&o<=150||224<=o))||(i||(i=!0,clearTimeout(r),r=setTimeout(function(){m.show()},600),g.css("z-index",9998),m.on("mouseenter.focus",function(){C(),L.on("scroll.focus",function(){var t=F.pageYOffset;c&&d&&c!==t&&(d<s.top-B||d>s.bottom+B)&&A(),c=t})}).on("mouseleave.focus",function(){f=a=null,y=T=0,L.off("scroll.focus")}).on("mousemove.focus",function(t){var e=t.clientX,o=t.clientY,i=F.pageYOffset,t=F.pageXOffset;if(f&&a&&(e!==f||o!==a))if(o<=a&&o<s.top-i||a<=o&&o>s.bottom-i||e<=f&&e<s.left-t||f<=e&&e>s.right-t){if(y+=Math.abs(f-e),T+=Math.abs(a-o),(o<=s.top-B-i||o>=s.bottom+B-i||e<=s.left-B-t||e>=s.right+B-t)&&(10<y||10<T))return A(),f=a=null,void(y=T=0)}else y=T=0;f=e,a=o}).on("touchstart.focus",function(t){t.preventDefault(),A()}),g.off("mouseenter.focus"),u&&(clearTimeout(u),u=null),p.addClass("focus-on").removeClass("focus-off")),!n&&i&&(n=!0,V.on("mouseenter.focus",function(){V.addClass("focus-off")}).on("mouseleave.focus",function(){V.removeClass("focus-off")})),K())}function A(t){i&&(i=!1,clearTimeout(r),r=setTimeout(function(){m.hide()},200),g.css("z-index",""),m.off("mouseenter.focus mouseleave.focus mousemove.focus touchstart.focus"),void 0===t&&g.on("mouseenter.focus",function(){(I.contains(g.get(0),document.activeElement)||l)&&k()}),u=setTimeout(function(){u=null,g.off("mouseenter.focus")},1e3),p.addClass("focus-off").removeClass("focus-on")),n&&(n=!1,V.off(".focus")),R()}function W(){setTimeout(function(){var t=document.activeElement.compareDocumentPosition(g.get(0));function e(t){return I.contains(t.get(0),document.activeElement)}2!==t&&4!==t||!(e(b)||e(o)||e(N))||A()},0)}function K(){t||!i||w.find(":focus").length||(t=!0,w.stop().fadeTo("fast",.3).on("mouseenter.focus",R).off("mouseleave.focus"),H.on("focus.focus",R).off("blur.focus"))}function R(){t&&(t=!1,w.stop().fadeTo("fast",1).on("mouseleave.focus",K).off("mouseenter.focus"),H.on("blur.focus",K).off("focus.focus"))}function Y(t){t.altKey&&t.shiftKey&&87===t.keyCode&&_()}p.append(m),m.css({display:"none",position:"fixed",top:V.height(),right:0,bottom:0,left:0,"z-index":9997}),g.css({position:"relative"}),L.on("mousemove.focus",function(t){d=t.pageY}),I("#postdivrich").hasClass("wp-editor-expand")&&h.on("keydown.focus-shortcut",Y),M.on("tinymce-editor-setup.focus",function(t,e){e.addButton("dfw",{active:x,classes:"wp-dfw btn widget",disabled:!v,onclick:_,onPostRender:function(){var t=this;e.on("init",function(){t.disabled()&&t.hide()}),M.on("dfw-activate.focus",function(){t.disabled(!1),t.show()}).on("dfw-deactivate.focus",function(){t.disabled(!0),t.hide()}).on("dfw-on.focus",function(){t.active(!0)}).on("dfw-off.focus",function(){t.active(!1)})},tooltip:"Distraction-free writing mode",shortcut:"Alt+Shift+W"}),e.addCommand("wpToggleDFW",_),e.addShortcut("access+w","","wpToggleDFW")}),M.on("tinymce-editor-init.focus",function(t,e){var o,i;function n(){l=!0}function s(){l=!1}"content"===e.id&&(I(e.getWin()),I(e.getContentAreaContainer()).find("iframe"),o=function(){e.on("keydown",k),e.on("blur",W),e.on("focus",n),e.on("blur",s),e.on("wp-autoresize",C)},i=function(){e.off("keydown",k),e.off("blur",W),e.off("focus",n),e.off("blur",s),e.off("wp-autoresize",C)},x&&o(),M.on("dfw-on.focus",o).on("dfw-off.focus",i),e.on("click",function(t){t.target===e.getDoc().documentElement&&e.focus()}))}),M.on("quicktags-init",function(t,e){var o;e.settings.buttons&&-1!==(","+e.settings.buttons+",").indexOf(",dfw,")&&(o=I("#"+e.name+"_dfw"),I(document).on("dfw-activate",function(){o.prop("disabled",!1)}).on("dfw-deactivate",function(){o.prop("disabled",!0)}).on("dfw-on",function(){o.addClass("active")}).on("dfw-off",function(){o.removeClass("active")}))}),M.on("editor-expand-on.focus",S).on("editor-expand-off.focus",O),x&&(h.on("keydown.focus",k),e.add(h).on("blur.focus",W)),F.wp=F.wp||{},F.wp.editor=F.wp.editor||{},F.wp.editor.dfw={activate:S,deactivate:O,isActive:function(){return v},on:z,off:E,toggle:_,isOn:function(){return x}}})}(window,window.jQuery);