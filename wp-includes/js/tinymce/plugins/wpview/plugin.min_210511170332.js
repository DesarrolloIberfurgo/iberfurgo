!function(c){c.PluginManager.add("wpview",function(o){function e(){}var n=window.wp;return n&&n.mce&&n.mce.views?(o.on("init",function(){var e=window.MutationObserver||window.WebKitMutationObserver;e&&new e(function(){o.fire("wp-body-class-change")}).observe(o.getBody(),{attributes:!0,attributeFilter:["class"]}),o.on("wp-body-class-change",function(){var n=o.getBody().className;o.$('iframe[class="wpview-sandbox"]').each(function(e,t){if(!t.src||'javascript:""'===t.src)try{t.contentWindow.document.body.className=n}catch(e){}})})}),o.on("beforesetcontent",function(e){var t;if(e.selection||n.mce.views.unbind(),e.content){if(!e.load&&(t=o.selection.getNode())&&t!==o.getBody()&&/^\s*https?:\/\/\S+\s*$/i.test(e.content)){if(!(t=o.dom.getParent(t,"p"))||!/^[\s\uFEFF\u00A0]*$/.test(o.$(t).text()||""))return;t.innerHTML=""}e.content=n.mce.views.setMarkers(e.content,o)}}),o.on("setcontent",function(){n.mce.views.render()}),o.on("preprocess hide",function(e){o.$("div[data-wpview-text], p[data-wpview-marker]",e.node).each(function(e,t){t.innerHTML="."})},!0),o.on("postprocess",function(e){e.content=a(e.content)}),o.on("beforeaddundo",function(e){var t=e.level.content||e.level.fragments&&e.level.fragments.join(""),n=e.lastLevel?e.lastLevel.content||e.lastLevel.fragments&&e.lastLevel.fragments.join(""):o.startContent;t&&n&&-1!==t.indexOf(" data-wpview-")&&-1!==n.indexOf(" data-wpview-")&&a(n)===a(t)&&e.preventDefault()}),o.on("drop objectselected",function(e){i(e.targetClone)&&(e.targetClone=o.getDoc().createTextNode(window.decodeURIComponent(o.dom.getAttrib(e.targetClone,"data-wpview-text"))))}),o.on("pastepreprocess",function(e){var t=e.content;t&&(t=c.trim(t.replace(/<[^>]+>/g,"")),/^https?:\/\/\S+$/i.test(t)&&(e.content=t))}),o.on("resolvename",function(e){i(e.target)&&(e.name=o.dom.getAttrib(e.target,"data-wpview-type")||"object")}),o.on("click keyup",function(){var e=o.selection.getNode();i(e)&&o.dom.getAttrib(e,"data-mce-selected")&&e.setAttribute("data-mce-selected","2")}),o.addButton("wp_view_edit",{tooltip:"Edit|button",icon:"dashicon dashicons-edit",onclick:function(){var e=o.selection.getNode();i(e)&&n.mce.views.edit(o,e)}}),o.addButton("wp_view_remove",{tooltip:"Remove",icon:"dashicon dashicons-no",onclick:function(){o.fire("cut")}}),o.once("preinit",function(){var t;o.wp&&o.wp._createToolbar&&(t=o.wp._createToolbar(["wp_view_edit","wp_view_remove"]),o.on("wptoolbar",function(e){!e.collapsed&&i(e.element)&&(e.toolbar=t)}))}),o.wp=o.wp||{},o.wp.getView=e,{getView:o.wp.setViewCursor=e}):{getView:e};function i(e){return o.dom.hasClass(e,"wpview")}function a(e){function t(e,t){return"<p>"+window.decodeURIComponent(t)+"</p>"}return e&&-1!==e.indexOf(" data-wpview-")?e.replace(/<div[^>]+data-wpview-text="([^"]+)"[^>]*>(?:\.|[\s\S]+?wpview-end[^>]+>\s*<\/span>\s*)?<\/div>/g,t).replace(/<p[^>]+data-wpview-marker="([^"]+)"[^>]*>[\s\S]*?<\/p>/g,t):e}})}(window.tinymce);